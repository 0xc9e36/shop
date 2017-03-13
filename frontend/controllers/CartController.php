<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public $layout = "order_style.php";
     //关闭Csrf
     public $enableCsrfValidation = false;
     
     public function actionSubmitorder()
     {
          return $this->renderPartial('submitorder');
     }    
     
     public function actionCheckorder()
     {
          return $this->render('checkorder');
     }  
     
     public function actionMycart()
     {
          return $this->renderPartial('mycart');
     }  
}