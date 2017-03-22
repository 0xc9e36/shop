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
    public function jump($type = 'error', $msg = '抱歉，你要访问的页面不存在或已被删除!', $time = 5, $gotoUrl = 'index')
    {
        return $this->renderPartial('/public/jump', ['type' => $type, 'msg' => $msg, 'time' => $time, 'gotoUrl' => Url::toRoute($gotoUrl)]);
    }

    public function getNews(){
        $new= (new \yii\db\Query())
            ->select(['id', 'goods_name', 'small_img','shop_price'])
            ->from('shop_goods')
            ->where(['is_new' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
            ->limit(5)
            ->all();
        return $new;
    }

    public function getBest(){
        $bestsale= (new \yii\db\Query())
            ->select(['id', 'goods_name', 'small_img','shop_price'])
            ->from('shop_goods')
            ->where(['is_bestsale' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
            ->limit(5)
            ->all();
        return $bestsale;
    }
    
}