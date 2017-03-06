<?php
namespace backend\controllers;
use backend\controllers\AdminController;
use backend\models\Admin;

class IndexController extends AdminController
{
     public function behaviors()
     {
          return [
              \backend\components\behavior\PermissionBehavior::className(),
          ];
     }
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
