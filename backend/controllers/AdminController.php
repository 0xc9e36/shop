<?php
namespace backend\controllers;

use yii\web\Controller;

class AdminController extends Controller
{
     
     //后台登陆页面
     public function actionLogin()
     {
          return $this->renderPartial('login');
     }
}