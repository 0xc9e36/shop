<?php
namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends PublicController
{
     public $layout = "home_style.php";
     public function actionIndex()
     {
         //获取分类信息

          return $this->render('index');
     }
}