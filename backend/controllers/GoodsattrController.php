<?php

namespace backend\controllers;

use Yii;
use backend\models\Attrprice;
use backend\models\Goodstype;
use backend\models\Goodsattr;
use yii\data\ActiveDataProvider;
use backend\controllers\AdminController;
use yii\web\NotFoundHttpException;

/**
 * GoodsattrController implements the CRUD actions for Goodsattr model.
 */
class GoodsattrController extends AdminController {

     public $enableCsrfValidation = false;   //关闭cfrf

     public function behaviors()
     {
          return [
              \backend\components\behavior\PermissionBehavior::className(),
          ];
     }
     /**
      * Lists all Goodsattr models.
      * @return mixed
      */
     public function actionIndex() {
          $id = intval(Yii::$app->request->get('id'));
          $sql = "SELECT attr.* ,type.goodstype_name FROM shop_goodsattr AS attr LEFT JOIN shop_goodstype AS type ON attr.goodstype_id=type.id WHERE type.id={$id}";
          $data = Goodsattr::findBySql($sql)->asArray()->all();
          return $this->render('index', [
                      'data' => $data,
                      'typeid' => $id,
          ]);
     }

     /**
      * Creates a new Goodsattr model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionAdd() {
          $typeid = intval(Yii::$app->request->get('typeid'));
          $command = Yii::$app->db->createCommand("SELECT id FROM shop_goodstype where id = {$typeid}");
          $posts = $command->queryOne();
          $model = new Goodsattr();
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index', 'id' => $typeid]);
          } else {
               $model->attr_type = 0;     //设置默认选中显示
               return $this->render('add', [
                           'model' => $model,
                           'typeid' => $typeid,
               ]);
          }
     }

     /**
      * Updates an existing Goodsattr model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id) {
          $id = intval($id);
          $typeid = intval(Yii::$app->request->get('typeid'));
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index', 'id' => $typeid]);
          } else {
               return $this->render('update', [
                           'model' => $model,
                           'typeid' => $typeid,
               ]);
          }
     }

     /**
      * Deletes an existing Goodsattr model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id) {
          $id = intval($id);
          $typeid = intval(Yii::$app->request->post('typeid'));
          $this->findModel($id)->delete();
          return $this->redirect(['index', 'id' => $typeid]);
     }

     /**
      * Finds the Goodsattr model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Goodsattr the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id) {
          if (($model = Goodsattr::findOne($id)) !== null) {
               return $model;
          } else {
               throw new NotFoundHttpException('The requested page does not exist.');
          }
     }
     //添加商品时获取属性接口
     public function actionGetattr() {
          $id = intval(Yii::$app->request->post('id'));
          $cond = ['goodstype_id'  => $id];
          $data = Goodsattr::find()->where($cond)->orderBy('id')->all();
          if ($data) {
               return $this->renderPartial('_attr', [
                   'data' => $data,
               ]);
          } else {
               //请求出错
               return false;
          }
     }
     //修改商品时获取属性接口
     public function actionEditattr() {
          $id = intval(Yii::$app->request->post('id'));
          $goods_id = intval(Yii::$app->request->post('goods_id'));
          $cond = ['goodstype_id'  => $id];
          $data = Goodsattr::find()->where($cond)->orderBy('id')->all();
          $co = ['goods_id'  => $goods_id];
          $attrprice = Attrprice::find()->where($co)->orderBy('id')->all();
          if ($data) {
               return $this->renderPartial('edit', [
                   'data' => $data,
                   'attrprice' => $attrprice,
               ]);
          } else {
               //请求出错
               return false;
          }
     }

}
