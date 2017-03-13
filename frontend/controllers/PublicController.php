<?php
namespace frontend\controllers;

use yii\web\Controller;

class PublicController extends Controller
{
    /*路由错误*/
    public function actionError()
    {
        return $this->renderPartial('/public/error');
    }

    /*逻辑错误*/
    public function jump($msg = '操作有误', $time = 10, $gotoUrl = null)
    {
        return $this->renderPartial('/public/jump', ['msg' => $msg, 'time' => $time, 'gotoUrl' => $gotoUrl]);
        exit;
    }
}