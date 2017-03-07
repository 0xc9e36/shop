<?php

namespace backend\controllers;

use backend\models\Goodsattr;
use Yii;
use backend\models\Goods;
use backend\models\Brand;
use backend\models\Category;
use backend\models\Goodstype;
use backend\models\Discount;
use backend\models\Memberprice;
use backend\models\Memberlevel;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Controller;
use backend\models\UploadForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends AdminController {

     public function behaviors()
     {
          return [
              \backend\components\behavior\PermissionBehavior::className(),
          ];
     }
     /**
      * Lists all Goods models.
      * @return mixed
      */
     public function actionIndex() {
          $query = Goods::find()->where(['is_recycle' => 0]);
          $countQuery = clone $query;
          $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => '1']);
          $models = $query->offset($pages->offset)
              ->limit($pages->limit)
              ->all();
          return $this->renderPartial('index', [
              'model' => $models,
              'pages' => $pages,
          ]);
     }

     /**
      * Creates a new Goods model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionAdd() {
          $model = new Goods();
          //商品表单
          $request = Yii::$app->request;
          if ($model->load($request->post())) {
               //商品基本信息验证合法
               if ($model->validate()) {
                    //自动生成商品货号
                    $model->goods_sn = !empty($model->goods_sn) ? $model->goods_sn : time();
                    //是否促销
                    if (isset($_POST['is_sale']) && 'ok' === $_POST['is_sale']) {
                         $model->is_discount = 1; //促销
                    }
                    //添加商品
                    if ($model->save()) {
                         //商品id
                         $goods_id = $model->getPrimaryKey();
                         //连接数据库
                         $connection = Yii::$app->db;
                         /*****************************商品相册************************************ */
                         $simg = !empty($request->post('simg')) ? $request->post('simg') : array();
                         $mimg = !empty($request->post('mimg')) ? $request->post('mimg') : array();
                         $bimg = !empty($request->post('bimg')) ? $request->post('bimg') : array();
                         $pimg = !empty($request->post('pimg')) ? $request->post('pimg') : array();
                         foreach ($simg as $k => $v) {
                              $small_img = $v;
                              $medium_img = $mimg[$k];
                              $big_img = $bimg[$k];
                              $primary_img = $pimg[$k];
                              $sql = "INSERT INTO shop_goodsimg  VALUES(NULL,'$goods_id','$primary_img','$big_img','$medium_img','$small_img')";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }
                         /**************************商品折扣表***************************************** */
                         $counts = !empty($_POST['sale_count'][0]) ? $_POST['sale_count'] : array();
                         $prices = !empty($_POST['sale_prices'][0]) ? $_POST['sale_prices'] : array();

                         foreach ($counts as $k => $v) {
                              $count = $v;
                              $price = $prices[$k];
                              $sql = "INSERT INTO shop_discount VALUES(NULL,$goods_id,$count,$price)";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }

                         /****************************会员级别价格***************************** */
                         foreach ($_POST['id'] as $k => $v) {
                              $member_level = $v;
                              $member_price = $_POST['price'][$k];
                              $sql = "INSERT INTO shop_memberprice VALUES(NULL,$goods_id,$member_level,$member_price)";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }
                         /*******************************商品属性价格表************************************* */
                         $attr_value = !empty($_POST['radio_attr_value']) ? $_POST['radio_attr_value'] : array();
                         $attr_price = !empty($_POST['radio_attr_price']) ? $_POST['radio_attr_price'] : array();
                         foreach ($attr_value as $k => $v) {
                              if (array_key_exists($k, $attr_price)) {
                                   foreach ($v as $k1 => $v1) {
                                        $value = $v1;
                                        $price = !empty($attr_price[$k][$k1]) ? $attr_price[$k][$k1] : 0.00;
                                        $sql = "INSERT INTO shop_attrprice VALUES(NULL,$goods_id,$k,'$value',$price)";
                                        $command = $connection->createCommand($sql);
                                        $command->execute();
                                   }
                              } else {
                                   $value = $attr_value[$k][0];
                                   $price = 0.00;
                                   $sql = "INSERT INTO shop_attrprice VALUES(NULL,$goods_id,$k,'$value',$price)";
                                   $command = $connection->createCommand($sql);
                                   $command->execute();
                              }
                         }
                    } else {
                         $this->jump('添加商品出了点麻烦~ 错误信息 : '. $model->getErrors());
                    }
                    return $this->redirect(['index']);
               }
          } else {
               //商品分类列表
               $cat_model = new Category();
               $cat_list = $cat_model->getTreeList();

               //商品品牌列表
               $sql = "SELECT brand_name,id FROM shop_brand WHERE 1 ORDER BY id";
               $brand_list = Brand::findBySql($sql)->asArray()->all();

               //所有会员种类
               $sql = "SELECT id,level_name  FROM shop_memberlevel WHERE 1 ORDER BY id";
               $memberlevel_list = Memberlevel::findBySql($sql)->asArray()->all();

               //上传图片模型
               $model_upload = new UploadForm();

               //商品类型
               $sql = "SELECT * FROM shop_goodstype WHERE 1";
               $goodstype_list = Goodstype::findBySql($sql)->asArray()->all();

               return $this->renderAjax('add', [
                           'model' => $model,
                           'cat_model' => $cat_model,
                           'cat_list' => $cat_list,
                           'brand_list' => $brand_list,
                           'memberlevel_list' => $memberlevel_list,
                           'model_upload' => $model_upload,
                           'goodstype_list' => $goodstype_list,
               ]);
          }
     }

     /**
      * Updates an existing Goods model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id) {
          $model = $this->findModel($id);
          //商品表单
          $request = Yii::$app->request;
          if ($model->load($request->post())) {
               //商品基本信息验证
               if ($model->validate()) {
                    //自动生成商品货号
                    $model->goods_sn = !empty($model->goods_sn) ? $model->goods_sn : time();
                    if (isset($_POST['is_sale']) && 'ok' === $_POST['is_sale']) {
                         $model->is_discount = 1;
                    }
                    //添加商品
                    if ($model->save()) {
                         $goods_id = $model->getPrimaryKey();
                         //连接数据库
                         $connection = Yii::$app->db;
                         /** ***************************商品相册表************************************ */
                         $simg = !empty($_POST['simg']) ? $_POST['simg'] : array();
                         $mimg = !empty($_POST['mimg']) ? $_POST['mimg'] : array();
                         $bimg = !empty($_POST['bimg']) ? $_POST['bimg'] : array();
                         $pimg = !empty($_POST['pimg']) ? $_POST['pimg'] : array();
                         //先删除该商品所有相册
                         $sql = "DELETE FROM shop_goodsimg WHERE goods_id={$goods_id}";
                         $command = $connection->createCommand($sql);
                         $command->execute();
                         foreach ($simg as $k => $v) {
                              $small_img = $v;
                              $medium_img = $mimg[$k];
                              $big_img = $bimg[$k];
                              $primary_img = $pimg[$k];
                              $sql = "INSERT INTO shop_goodsimg  VALUES(NULL,'$goods_id','$primary_img','$big_img','$medium_img','$small_img')";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }
                         /***************************商品折扣表***************************************** */
                         //先删除该商品所有折扣
                         $sql = "DELETE FROM shop_discount WHERE goods_id=$goods_id";
                         $command = $connection->createCommand($sql);
                         $command->execute();
                         $counts = !empty($_POST['sale_count'][0]) ? $_POST['sale_count'] : array();
                         $prices = !empty($_POST['sale_prices'][0]) ? $_POST['sale_prices'] : array();
                         foreach ($counts as $k => $v) {
                              $count = $v;
                              $price = $prices[$k];
                              $sql = "INSERT INTO shop_discount VALUES(NULL,$goods_id,$count,$price)";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }

                         /********************会员级别价格***************************** */
                         foreach ($_POST['id'] as $k => $v) {
                              $member_level = $v;
                              $member_price = $_POST['price'][$k];
                              $sql = "UPDATE shop_memberprice SET member_price=$member_price WHERE (goods_id=$goods_id AND member_level=$member_level)";
                              $command = $connection->createCommand($sql);
                              $command->execute();
                         }
                         /*********************************商品属性价格表************************************* */
                         $attr_value = !empty($_POST['radio_attr_value']) ? $_POST['radio_attr_value'] : array();
                         $attr_price = !empty($_POST['radio_attr_price']) ? $_POST['radio_attr_price'] : array();

                         $sql = "DELETE FROM shop_attrprice WHERE goods_id=$goods_id";
                         $command = $connection->createCommand($sql);
                         $command->execute();
                         foreach ($attr_value as $k => $v) {
                              if (array_key_exists($k, $attr_price)) {
                                   foreach ($v as $k1 => $v1) {
                                        $value = $v1;
                                        $price = !empty($attr_price[$k][$k1]) ? $attr_price[$k][$k1] : 0.00;
                                        $sql = "INSERT INTO shop_attrprice VALUES(NULL,$goods_id,$k,'$value',$price)";
                                        $command = $connection->createCommand($sql);
                                        $command->execute();
                                   }
                              } else {
                                   $value = $attr_value[$k][0];
                                   $price = 0.00;
                                   $sql = "INSERT INTO shop_attrprice VALUES(NULL,$goods_id,$k,'$value',$price)";
                                   $command = $connection->createCommand($sql);
                                   $command->execute();
                              }
                         }
                    } else {
                         $this->jump('修改商品出了点麻烦~'.$model->getErrors());
                    }
                    return $this->redirect(['index']);
               }
          } else {
               //商品分类列表
               $cat_model = new Category();
               $cat_list = $cat_model->getTreeList();

               //商品品牌列表
               $sql = "SELECT brand_name,id FROM shop_brand WHERE 1 ORDER BY id";
               $brand_list = Brand::findBySql($sql)->asArray()->all();

               //所有会员种类
               $sql = "SELECT id,level_name  FROM shop_memberlevel WHERE 1 ORDER BY id";
               $memberlevel_list = Memberlevel::findBySql($sql)->asArray()->all();

               //取出会员价格
               $memberPriceInfo = Memberlevel::findBySql("SELECT member_level,member_price FROM shop_memberprice WHERE goods_id={$id}")->asArray()->all();

               //上传图片模型
               $model_upload = new UploadForm();

               //商品类型
               $sql = "SELECT * FROM shop_goodstype WHERE 1";
               $goodstype_list = Goodstype::findBySql($sql)->asArray()->all();

               //商品优惠价格表
               $sql = "SELECT * FROM shop_discount WHERE goods_id={$id}";
               $discountList = Discount::findBySql($sql)->asArray()->all();

               //商品相册
               $sql = "SELECT * FROM shop_goodsimg WHERE goods_id={$id}";
               $imageList = Goods::findBySql($sql)->asArray()->all();

               return $this->renderAjax('update', [
                           'model' => $model,
                           'cat_model' => $cat_model,
                           'cat_list' => $cat_list,
                           'brand_list' => $brand_list,
                           'memberlevel_list' => $memberlevel_list,
                           'model_upload' => $model_upload,
                           'goodstype_list' => $goodstype_list,
                           'memberPriceInfo' => $memberPriceInfo,
                           'discountList' => $discountList,
                           'imageList' => $imageList,
               ]);
          }
     }

     /**
      * Deletes an existing Goods model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id) {
          $this->findModel($id)->delete();

          return $this->redirect(['index']);
     }

     /**
      * Finds the Goods model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Goods the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id) {
          if (($model = Goods::findOne($id)) !== null) {
               return $model;
          } else {
               throw new NotFoundHttpException('The requested page does not exist.');
          }
     }

     //添加商品时获取属性接口
     public function actionGetattr() {
          $id = intval(Yii::$app->request->post('id'));
          $sql = "SELECT id,attr_type,attr_name,attr_value FROM shop_goodsattr WHERE goodstype_id={$id}";
          $data = Goodsattr::findBySql($sql)->asArray()->all();
          if ($data) {
               return $this->renderPartial('_attr', [
                   'data' => $data,
               ]);
          } else {
               //请求出错
               return false;
          }
     }
     /**
      * 图片上传
      * @return type
      */
     public function actionUploadimg() {
          $model_upload = new UploadForm();
          if (Yii::$app->request->isPost) {
               $model_upload->imageFile = UploadedFile::getInstance($model_upload, 'imageFile');
               if ($dir = $model_upload->upload()) {
                    $small = $dir['small'];
                    $big = $dir['big'];
                    $medium = $dir['median'];
                    $primary = $dir['primary'];
                    // 文件上传成功
                    $str = "<img src=$small />";
                    echo "<script src=\"/Js/jquery.min.js\"></script>";
                    echo "<script>parent. $(\"#dialog\" ).dialog( \"close\" );</script>";
                    echo "<script>parent.document.getElementById('logoimg').innerHTML=\"$str\";</script>";
                    echo "<script>parent.document.getElementById('small_img').value=\"$small\";</script>";
                    echo "<script>parent.document.getElementById('big_img').value=\"$big\";</script>";
                    echo "<script>parent.document.getElementById('medium_img').value=\"$medium\";</script>";
                    echo "<script>parent.document.getElementById('primary_img').value=\"$primary\";</script>";
               }
          } else {
               echo "<script>alert('上传错误,请重新再试')；history.go(-1);</script>";
               return;
          }
     }

     /**
      * 图片上传
      * @return type
      */
     public function actionPicture() {

          $model_upload = new UploadForm();
          if (Yii::$app->request->isPost) {
               $model_upload->imageFile = UploadedFile::getInstance($model_upload, 'imageFile');
               if ($dir = $model_upload->upload()) {
                    // 文件上传成功
                    return $this->renderPartial('picture', [
                                'dir' => $dir,
                    ]);
               }
          } else {
               echo "<script>alert('上传错误,请重新再试')；history.go(-1);</script>";
               return;
          }
     }

     //商品回收站 移入
     public function actionTrash($id) {
          $model = $this->findModel($id);
          $model->is_recycle = 1;
          if($model->save()){
               return $this->redirect(['index']);
          }else{
               var_dump($model->getErrors());
          }
     }

     //商品回收站 首页
     public function actionTrashindex() {
          $query = Goods::find()->where(['is_recycle' => 1]);
          $countQuery = clone $query;
          $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => '1']);
          $models = $query->offset($pages->offset)
              ->limit($pages->limit)
              ->all();
          return $this->renderPartial('trash', [
              'model' => $models,
              'pages' => $pages,
          ]);
     }

     //商品回收站 删除
     public function actionTrashdelete($id) {
          if ($this->findModel($id)->delete()) {
               return $this->redirect(['trashindex']);
          }
     }

     //商品回收站　还原
     public function actionTrashrenew($id) {
          $model = $this->findModel($id);
          $model->is_recycle = 0;
          if($model->save()){
               return $this->redirect(['trashindex']);
          }else{
               var_dump($model->getErrors());
          }
     }

}
