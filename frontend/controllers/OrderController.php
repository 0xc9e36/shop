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
        if ($model->load(Yii::$app->request->post())) {
            if(!$order_id = $model->submit()){
                return $this->jump('error', '下订单失败');
            }
            return $this->render('submitorder');
        }else {
            if (!Yii::$app->user->isGuest) {
                $list = (new Cart())->getCarts();
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

    public function actionSubmitorder()
    {

    }

}