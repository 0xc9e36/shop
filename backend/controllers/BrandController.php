<?php

namespace backend\controllers;

use Yii;
use backend\models\Brand;
use backend\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use backend\models\UploadForm;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends AdminController
{
    public function behaviors()
    {
        return [
            \backend\components\behavior\PermissionBehavior::className(),
        ];
    }
    // public $layout = false;
     /**
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex()
    {
           
          $sql = "SELECT *FROM shop_brand WHERE 1";
          $data = Brand::findBySql( $sql)->asArray()->all();
          return $this->renderPartial('index', [
              'data'     =>   $data
          ]);        
    }

   
    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Brand();
        $model_upload = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index']);
        } else {
            $model->is_show = 1;
            return $this->renderAjax('add', [
                'model' => $model,
                'model_upload'     =>   $model_upload ,
            ]);
        }
    }

    /**
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $id = intval($id);
        $model = $this->findModel($id);
         $model_upload = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'model_upload'     =>   $model_upload ,
            ]);
        }
    }

    /**
     * Deletes an existing Brand model.
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
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * 图片上传
     * @return type
     */
              
    public function actionUploadimg()
    {
        $model_upload = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model_upload->imageFile = UploadedFile::getInstance($model_upload, 'imageFile');
            if ($dir = $model_upload->upload()) {   
                $url = $dir['small'];
                // 文件上传成功
               $str = "<img src=$url />";
               echo "<script src=\"/Js/jquery.min.js\"></script>";
               echo "<script>parent.$('#brand-brand_logo').val(\"$url\");</script>";
               echo "<script>parent. $(\"#dialog\" ).dialog( \"close\" );</script>";
               echo "<script>parent. $(\"#fileupload\" ).reset('fileupload');</script>";
               echo "<script>parent.document.getElementById('logoimg').innerHTML=\"$str\";</script>";
                 /************/
            }
        }else{
            $this->jump('图片上传错误');
             return ;
        }    
         
    }
    
}

