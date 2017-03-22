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
          $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pagesize']]);
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
                    //如果没有商品货号自动生成
                    $model->goods_sn = !empty($model->goods_sn) ? $model->goods_sn : (string)time();
                    //是否促销
                    if (isset($_POST['is_sale']) && 'ok' === $_POST['is_sale']) $model->is_discount = 1; //促销
                    $model->is_bestsale = isset($request->post('Goods')['is_bestsale']) ? $request->post('Goods')['is_bestsale'] : 0;
                    $model->is_crazy = isset($request->post('Goods')['is_crazy']) ? $request->post('Goods')['is_crazy'] : 0;
                    $model->is_recomend = isset($request->post('Goods')['is_recomend']) ? $request->post('Goods')['is_recomend'] : 0;
                    $model->is_new = isset($request->post('Goods')['is_new']) ? $request->post('Goods')['is_new'] : 0;
                    $model->is_guess = isset($request->post('Goods')['is_guess']) ? $request->post('Goods')['is_guess'] : 0;
                    $model->is_first = isset($request->post('Goods')['is_first']) ? $request->post('Goods')['is_first'] : 0;
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
                              Yii::$app->db->createCommand()->insert('shop_goodsimg', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'primary_img'  =>   $request->post('pimg')[$k],
                                  'big_img'      =>   $request->post('bimg')[$k],
                                  'medium_img'   =>   $request->post('mimg')[$k],
                                  'small_img'    =>   $v,

                              ])->execute();
                         }
                         /**************************商品折扣表***************************************** */

                         $counts = !empty($_POST['sale_count'][0]) ? $_POST['sale_count'] : array();
                         $prices = !empty($_POST['sale_prices'][0]) ? $_POST['sale_prices'] : array();

                         foreach ($counts as $k => $v) {
                              Yii::$app->db->createCommand()->insert('shop_discount', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'count'        =>   $v,
                                  'price'       =>   $prices[$k]
                              ])->execute();
                         }

                         /****************************会员级别价格***************************** */
                         foreach ($request->post('id') as $k => $v) {
                              //不设置会员价格,根据折扣率计算
                              if($request->post('price')[$k] == '-1') continue;
                              Yii::$app->db->createCommand()->insert('shop_memberprice', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'member_level' =>   $v,
                                  'member_price' =>   $request->post('price')[$k]

                              ])->execute();
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
                         var_dump($model->getErrors());
                         $this->jump('添加商品出了点麻烦~ 错误信息 : ' );
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
                    $model->goods_sn = !empty($model->goods_sn) ? $model->goods_sn : (string)time();
                    if (isset($_POST['is_sale']) && 'ok' === $_POST['is_sale']) {
                         $model->is_discount = 1;
                    }
                    $model->is_bestsale = isset($request->post('Goods')['is_bestsale']) ? $request->post('Goods')['is_bestsale'] : 0;
                    $model->is_crazy = isset($request->post('Goods')['is_crazy']) ? $request->post('Goods')['is_crazy'] : 0;
                    $model->is_recomend = isset($request->post('Goods')['is_recomend']) ? $request->post('Goods')['is_recomend'] : 0;
                    $model->is_new = isset($request->post('Goods')['is_new']) ? $request->post('Goods')['is_new'] : 0;
                    $model->is_guess = isset($request->post('Goods')['is_guess']) ? $request->post('Goods')['is_guess'] : 0;
                    $model->is_first = isset($request->post('Goods')['is_first']) ? $request->post('Goods')['is_first'] : 0;
                    //添加商品
                    if ($model->save()) {
                         $goods_id = $model->getPrimaryKey();
                         //连接数据库
                         $connection = Yii::$app->db;
                         /** ***************************商品相册表*************************************/
                         $simg = !is_null($request->post('simg')) ? $request->post('simg') : array();
                         $mimg = !is_null($request->post('mimg')) ? $request->post('mimg') : array();
                         $bimg = !is_null($request->post('bimg')) ? $request->post('bimg') : array();
                         $pimg = !is_null($request->post('pimg')) ? $request->post('pimg') : array();
                         //先清空该商品相册表
                         Yii::$app->db->createCommand()->delete('shop_goodsimg', "goods_id = $goods_id")->execute();
                         //循环插入
                         foreach ($simg as $k => $v) {
                              Yii::$app->db->createCommand()->insert('shop_goodsimg', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'primary_img'  =>   $request->post('pimg')[$k],
                                  'big_img'      =>   $request->post('bimg')[$k],
                                  'medium_img'   =>   $request->post('mimg')[$k],
                                  'small_img'    =>   $v,

                              ])->execute();
                         }
                         /***************************商品折扣表***************************************** */
                         //先删除该商品所有折扣
                         Yii::$app->db->createCommand()->delete('shop_discount', "goods_id = $goods_id")->execute();
                         $counts = !empty($_POST['sale_count'][0]) ? $_POST['sale_count'] : array();
                         $prices = !empty($_POST['sale_prices'][0]) ? $_POST['sale_prices'] : array();
                         foreach ($counts as $k => $v) {
                              Yii::$app->db->createCommand()->insert('shop_discount', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'count'        =>   $v,
                                   'price'       =>   $prices[$k]

                              ])->execute();
                         }
                         //先删除该商品所有会员价格
                         Yii::$app->db->createCommand()->delete('shop_memberprice', "goods_id = $goods_id")->execute();
                         /********************会员级别价格***************************** */
                         foreach ($request->post('id') as $k => $v) {
                              $member_price = $request->post('price')[$k];
                              if($member_price == -1) continue;
                              Yii::$app->db->createCommand()->insert('shop_memberprice', [
                                  'id'           =>   null,
                                  'goods_id'     =>   $goods_id,
                                  'member_level'        =>   $v,
                                  'member_price'       =>   $member_price

                              ])->execute();
                         }
                         /*********************************商品属性价格表************************************* */
                         $attr_value = !empty($_POST['radio_attr_value']) ? $_POST['radio_attr_value'] : array();
                         $attr_price = !empty($_POST['radio_attr_price']) ? $_POST['radio_attr_price'] : array();
                         Yii::$app->db->createCommand()->delete('shop_attrprice', "goods_id = $goods_id")->execute();
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
                         var_dump($model->getErrors());
                         die;
                         $this->jump('修改商品出了点麻烦~');
                    }
                    return $this->redirect(['index']);
               }
          } else {
               $id = intval($id);
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
               $memberprice = [];
               $memberPriceInfo = Memberlevel::findBySql("SELECT member_level,member_price FROM shop_memberprice WHERE goods_id={$id}")->asArray()->all();
               foreach ($memberPriceInfo as $k => $v){
                    $memberprice[$v['member_level']] = $v['member_price'];
               }
               //上传图片模型
               $model_upload = new UploadForm();

               //商品类型
               $sql = "SELECT * FROM shop_goodstype WHERE 1";
               $goodstype_list = Goodstype::findBySql($sql)->asArray()->all();

               //商品优惠价格表
               $sql = "SELECT * FROM shop_discount WHERE goods_id={$id} ORDER BY id";
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
                           'memberPriceInfo' => $memberprice,
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
      * 相册上传
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
          $model->save();
          return $this->redirect(['index']);
     }

     //商品回收站 首页
     public function actionTrashindex() {
          $query = Goods::find()->where(['is_recycle' => 1, 'is_delete' => 0]);
          $countQuery = clone $query;
          $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pagesize']]);
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
         $model = $this->findModel($id);
         $model->is_delete = 1;
         $model->save();
         return $this->redirect(['trashindex']);
     }

     //商品回收站　还原
     public function actionTrashrenew($id) {
          $model = $this->findModel($id);
          $model->is_recycle = 0;
          $model->save();
          return $this->redirect(['trashindex']);
     }

}
