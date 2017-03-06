<?php

namespace backend\controllers;

use Yii;
use backend\models\Memberlevel;
use yii\data\ActiveDataProvider;
use backend\controllers\AdminController;
use yii\web\NotFoundHttpException;

/**
 * MemberlevelController implements the CRUD actions for Memberlevel model.
 */
class MemberlevelController extends AdminController
{
    public function behaviors()
    {
        return [
            \backend\components\behavior\PermissionBehavior::className(),

        ];
    }
    /**
     * Lists all Memberlevel models.
     * @return mixed
     */
    public function actionIndex()
    {
          $sql = "SELECT *FROM shop_memberlevel WHERE 1";
          $data = Memberlevel::findBySql( $sql)
                  ->asArray()
                  ->all();
          return $this->render('index', [
              'data'     =>   $data,
          ]);     
    }

    /**
     * Creates a new Memberlevel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Memberlevel();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index']);
        } else {
            return $this->render('add', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Memberlevel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Memberlevel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Memberlevel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Memberlevel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memberlevel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
