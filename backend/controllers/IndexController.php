<?php
namespace backend\controllers;
use backend\controllers\PublicController;

class IndexController extends PublicController
{

     public function actionIndex()
     {
          return $this->renderPartial('index');
     }
     
     public function actionTop()
     {
          return $this->renderPartial('top');          
     }
     
     public function actionMenu()
     {
          return $this->renderPartial('menu');          
     }
     
     public function actionMain()
     {
          return $this->renderPartial('main');          
     }     
}
