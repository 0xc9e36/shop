<?php
namespace backend\controllers;
use backend\controllers\AdminController;
use Yii;
use backend\models\Admin;
use yii\base\Object;
use yii\bootstrap\Tabs;

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
          $connect = Yii::$app->db;
          $goods = [];
          $goods['count'] = $connect->createCommand("SELECT count(*) FROM shop_goods")->queryScalar();
          $goods['is_discount'] = $connect->createCommand("SELECT count(*) FROM shop_goods WHERE is_discount = 1")->queryScalar();
          $info = [];
          $info['system'] = PHP_OS;
          $info['web'] = $_SERVER ['SERVER_SOFTWARE'];
          $info['php_version'] = PHP_VERSION;
          $info['max_upload'] = get_cfg_var ("upload_max_filesize");
          $info['mysql_version'] = $connect->createCommand("SELECT VERSION() AS s")->queryOne()['s'];
          return $this->renderPartial('main', [
               'goods'   =>   $goods,
               'info'    =>   $info,
          ]);
     }     
}
