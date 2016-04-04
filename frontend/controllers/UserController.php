<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class UserController extends Controller
{
     
     public function actionIndex()
     {
          return $this->renderPartial('index');
     }     
     
     public function actionLogin()
     {
          return $this->renderPartial('login');
     }
     
     public function actionRegist()
     {
          return $this->renderPartial('regist');
     }     
     
     public function actionOrder()
     {
          return $this->renderPartial('order');
     }  
     
     public function actionAddress()
     {
          return $this->renderPartial('address');
     }  
}