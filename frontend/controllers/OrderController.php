<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use frontend\models\Cart;
use frontend\models\Order;
use yii\web\Controller;

class OrderController extends PublicController
{
    public $layout = "cart_style.php";
    public function actionCheckorder()
    {
        $model = new Order();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $order_id = $model->submit();
            if(!$order_id) return $this->jump('success', '下单失败, 请重试', 3, 'index/index');
            return $this->render('submitorder');
        }else {
            if (!Yii::$app->user->isGuest) {
                $list = (new Cart())->getCarts();
                if(!$list)return $this->jump('success', '购物车为空, 先购物', 3, 'index/index');

                //邮递方式
                $post = Yii::$app->params['post'];
                //支付方式
                $pay = Yii::$app->params['pay'];
                return $this->render('checkorder', [
                    'list' => $list,
                    'post' => $post,
                    'pay' => $pay,
                    'model' => $model,
                ]);
            } else {
                Yii::$app->session['return'] = \Yii::$app->request->url;
                return $this->jump('success', '请先登录, 3秒后自动跳转到登录页面', 3, 'user/login');
            }
        }
    }

}