<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CatController extends Controller
{
     public function actionList()
     {
          return $this->renderPartial('list');
     }
}