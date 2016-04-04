<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class GoodsController extends Controller
{
     
     public function actionDetail()
     {
          return $this->renderPartial('detail');
     }
     
    
}