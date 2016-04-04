<?php

namespace backend\controllers;

use Yii;
use backend\models\Goodstype;
use backend\controllers\PublicController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * GoodstypeController implements the CRUD actions for Goodstype model.
 */
class GoodstypeController extends PublicController {

     /**
      * Lists all Goodstype models.
      * @return mixed
      */
     public function actionIndex() {
          $sql = "SELECT a.*,count(b.id) as num FROM shop_goodstype AS a LEFT JOIN shop_goodsattr AS b ON a.id=b.goodstype_id GROUP BY a.id";
          
          $data = Goodstype::findBySql($sql)->asArray()->all();
          
          return $this->render('index', [
                      'data' => $data
          ]);
     }

     /**
      * Creates a new Goodstype model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionAdd() {
          $model = new Goodstype();

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index']);
          } else {
               return $this->render('add', [
                           'model' => $model,
               ]);
          }
     }

     /**
      * Updates an existing Goodstype model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id) {
          $model = $this->findModel($id);

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index']);
          } else {
               return $this->render('update', [
                           'model' => $model,
               ]);
          }
     }

     /**
      * Deletes an existing Goodstype model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id) {
          $id = intval($id);
          $this->findModel($id)->delete();
          //移除该商品类型的属性
          $connection = \Yii::$app->db;
          $connection->createCommand()->delete('shop_goodsattr', "goodstype_id = {$id}")->execute();
          return $this->redirect(['index']);
     }

     /**
      * Finds the Goodstype model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Goodstype the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id) {
          if (($model = Goodstype::findOne($id)) !== null) {
               return $model;
          } else {
               throw new NotFoundHttpException('The requested page does not exist.');
          }
     }

}
