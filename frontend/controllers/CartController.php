<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
     //关闭Csrf
     public $enableCsrfValidation = false;
     
     public function actionSubmitorder()
     {
          return $this->renderPartial('submitorder');
     }    
     
     public function actionCheckorder()
     {
          return $this->renderPartial('checkorder');
     }  
     
     public function actionMycart()
     {
          return $this->renderPartial('mycart');
     }  
}