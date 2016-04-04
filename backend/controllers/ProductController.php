<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use yii\data\ActiveDataProvider;
use backend\controllers\PublicController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends PublicController {

     public $enableCsrfValidation = false;

     /**
      * Lists all Product models.
      * @return mixed
      */
     public function actionIndex($id) {
          $connection = Yii::$app->db;
          $sql = "SELECT "
                  . "a.*,b.attr_type,b.attr_name "
                  . "FROM shop_attrprice AS a "
                  . "INNER JOIN shop_goodsattr AS b "
                  . "ON a.attr_id=b.id WHERE a.goods_id=$id AND b.attr_type=1";
          $command = $connection->createCommand($sql);
          $data = $command->queryAll();

          $sql = "SELECT * FROM shop_product WHERE goods_id=$id";
          $command = $connection->createCommand($sql);
          $product = $command->queryAll();
////// 
//          echo "<pre>";
//          print_r($product);
//          echo "</pre>";

          return $this->render('index', [
                      'data' => $data,
                      'id' => $id,
                      'product' => $product,
          ]);
     }

     /**
      * Creates a new Product model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionAdd() {
//                         echo "<pre>";
//               print_r($_POST);
//               echo "</pre>";
          $model = new Product();
          $connection = Yii::$app->db;
          if ($_POST) {
               $goods_id = $_POST['goods_id'];
               //删除之前的货品
               $sql = "DELETE FROM shop_product WHERE goods_id=$goods_id ";
               $command = $connection->createCommand($sql);
               $command->execute();
               $ids = array();
               foreach ($_POST['sn'] as $k => $v) {
                    foreach ($_POST['attrid'] as $k1 => $v1) {
                         $ids[] = $_POST['attr_value'][$v1][$k];
                    }
                    sort($ids);
                    $str_ids = implode(',', $ids);
                    $count = $_POST['num'][$k];
                    $sql = "INSERT INTO shop_product VALUES(NULL,'$v',$goods_id,'$str_ids',$count) ";
                    $command = $connection->createCommand($sql);
                    $command->execute();
                    $ids = array();
               }
               return $this->redirect('index.php?r=goods/index');
          }
     }

     /**
      * Updates an existing Product model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id) {
          $model = $this->findModel($id);

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->id]);
          } else {
               return $this->render('update', [
                           'model' => $model,
               ]);
          }
     }

     /**
      * Deletes an existing Product model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id) {
          $this->findModel($id)->delete();

          return $this->redirect(['index']);
     }

     /**
      * Finds the Product model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Product the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id) {
          if (($model = Product::findOne($id)) !== null) {
               return $model;
          } else {
               throw new NotFoundHttpException('The requested page does not exist.');
          }
     }

}
