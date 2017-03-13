<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CatController extends Controller
{
     public $layout = "home_style.php";
     public function actionList()
     {
          return $this->render('list');
     }
}