<?php
namespace frontend\controllers;

use yii\helpers\Url;
use yii\web\Controller;

class PublicController extends Controller
{
    /*路由错误*/
    public function actionError()
    {
        return $this->renderPartial('404');
    }

    /*逻辑错误*/
    public function jump($type = 'error', $msg = '抱歉，你要访问的页面不存在或已被删除!', $time = 5, $gotoUrl = null)
    {
        return $this->renderPartial('/public/jump', ['type' => $type, 'msg' => $msg, 'time' => $time, 'gotoUrl' => Url::toRoute($gotoUrl)]);
    }
    
}