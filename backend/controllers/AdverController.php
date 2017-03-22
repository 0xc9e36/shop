<?php

namespace backend\controllers;

use Yii;
use backend\models\Adver;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * AdverController implements the CRUD actions for Adver model.
 */
class AdverController extends AdminController
{
    public function behaviors()
    {
        return [
            \backend\components\behavior\PermissionBehavior::className(),
        ];
    }
    /**
     * Lists all Adver models.
     * @return mixed
     */
    public function actionIndex()
    {
        $data = Adver::find()->asArray()->all();
        return $this->renderPartial('index', [
            'data'     =>   $data
        ]);
    }

    /**
     * Displays a single Adver model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Adver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new Adver();
        $model_upload = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('add', [
                'model' => $model,
                'model_upload'     =>   $model_upload ,
            ]);
        }
    }

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
     * Deletes an existing Adver model.
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
     * Finds the Adver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adver::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUploadimg()
    {
        $model_upload = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model_upload->imageFile = UploadedFile::getInstance($model_upload, 'imageFile');
            $size['middle']['height'] = 70;
            $size['middle']['width'] = 310;
            $size['big']['height'] = 400;
            $size['big']['width'] = 670;
            if ($dir = $model_upload->upload($size)) {
                $url = $dir['median'];
                $big = $dir['big'];
                // 文件上传成功
                $str = "<img src=$url />";
                echo "<script src=\"/Js/jquery.min.js\"></script>";
                echo "<script>parent.$('#adver-small_img').val(\"$url\");</script>";
                echo "<script>parent.$('#adver-big_img').val(\"$big\");</script>";
                echo "<script>parent. $(\"#dialog\" ).dialog( \"close\" );</script>";
                // echo "<script>parent. $(\"#fileupload\" ).reset('fileupload');</script>";
                echo "<script>parent.document.getElementById('logoimg').innerHTML=\"$str\";</script>";
            }
        }else{
            $this->jump('图片上传错误');
            return ;
        }

    }
}
