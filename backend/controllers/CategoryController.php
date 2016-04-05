<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\controllers\PublicController;

class CategoryController extends PublicController {

     public function actionIndex() {
          $model = new Category();
          //查询分类数据
          $data = $model->getTreeList();
//          echo "<pre>";
//          print_r($data);
//          echo "</pre>";
          return $this->render('index', [
                      'data' => $data
          ]);
     }

     public function actionAdd() {
          $model = new Category();
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index']);
          } else {
               $data = $model->getTreeList();
               $model->is_show = 1;     //设置默认选中显示
               return $this->render('add', [
                           'model' => $model,
                           'data' => $data,
               ]);
          }
     }

     /**
      * Updates an existing Category model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id) {
          $id = intval($id);
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['index']);
          } else {
               $child = $model->getChildList($id);
               $all = $model->getTreeList();
               $data = $all ;
               foreach ($all  as $k1 => $v1)
               {
                    foreach ($child as $k2 => $v2)
                    {
                         if($v1['id'] == $v2['id'])
                         {
                              unset($data[$k1]);
                              break;
                         }
                    }
               }
               $pid = Category::findBySql("SELECT pid FROM shop_category WHERE id=$id")->asArray()->all();
               $res = Category::findBySql("SELECT id,cat_name FROM shop_category WHERE id={$pid[0]['pid']}")->asArray()->all();
               
               if ($res) {
                    $pid['cat_name'] = $res[0]['cat_name'];
                    $pid['id'] = $res[0]['id'];
               } else {
                    $pid['id'] = 0;
               }
               
               return $this->render('update', [
                           'model' => $model,
                           'data' => $data,
                           'pid_info' => $pid,
               ]);
          }
     }

     /**
      * Deletes an existing Category model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id) {
          $model = new Category();
          $data = $model->getTreeList($id);
          $ids = array($id);
          foreach ($data as $k => $v) {
               $ids[] = $v['id'];
          }
          $ids = implode($ids, ',');
          $connection = Yii::$app->db;
          $sql = "delete from shop_category where id in($ids)";
          $command = $connection->createCommand($sql);
          if ($result = $command->execute()) {
               echo "<script>alert('删除出错')</script>";
          }
          return $this->redirect(['index']);
     }

     /**
      * Finds the Category model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Category the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id) {
          if (($model = Category::findOne($id)) !== null) {
               return $model;
          } else {
               throw new NotFoundHttpException('The requested page does not exist.');
          }
     }

}
