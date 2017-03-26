<?php
namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use frontend\models\User;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;

class UserController extends PublicController
{
     public $layout = "order_style.php";

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0x000000,//背景颜色
                'maxLength' => 6, //最大显示个数
                'minLength' => 5,//最少显示个数
                'padding' => 5,//间距
                'height'=>40,//高度
                'width' => 100,  //宽度
                'foreColor'=>0xffffff,     //字体颜色
                'offset'=>4,        //设置字符偏移量 有效果
            ],
        ];
    }

     public function actionIndex()
     {
         // 判断用户是访客还是认证用户
         // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
         if (Yii::$app->user->isGuest) {
            // return $this->jump('success', '请先登录, 3秒后自动跳转到登录页面', 3, 'user/login');
         }
         $this->layout = "home_style.php";
         return $this->render('index');
     }     
     
     public function actionLogin()
     {
         // 判断用户是访客还是认证用户
         // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
         if (!Yii::$app->user->isGuest) {
             return $this->redirect('user/index');
         }

         $model = new \frontend\models\LoginForm();
         // 接收表单数据并调用LoginForm的login方法
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
             //登录成功, 设置会员级别, 会员积分
             $mark = Yii::$app->user->identity->rank;
             $sql = "SELECT id, rate FROM shop_memberlevel WHERE $mark BETWEEN mark_min AND mark_max";
             $info = Yii::$app->db->createCommand($sql)->query()->read();
             Yii::$app->session['level_id'] = $info['id'];
             Yii::$app->session['rate'] = $info['rate'] / 100.00;
             /*添加cookies到购物车数据库*/
             Yii::$app->runAction('cart/move');
             if(isset(Yii::$app->session['return'])){
                 return $this->redirect(Yii::$app->session['return']);
             }
             return $this->redirect('index.php?r=user/index');
         }
         // 非post直接渲染登录表单
         else {
             return $this->render('login', [
                 'model' => $model,
             ]);
         }
     }

    public function actionLogout(){
        Yii::$app->user->logout();  //这里把session和cookie一起删除了
        return $this->redirect('/index.php');
    }

     public function actionRegist()
     {
         $model = new \frontend\models\SignupForm();
         if ($model->load(Yii::$app->request->post()) && $user = $model->signup()) {
             $id = $user->id;
             $check_code = $user->check_code;
             $url = Yii::$app->params['front'].Url::to(['user/activate']).'&id='.$id.'&code='.$check_code;
             /*发送激活邮件*/
             $mail = Yii::$app->mailer->compose()
                 ->setFrom(['13873120673@163.com' => '京西商城注册'])
                 ->setTo('qydzweb@foxmail.com')
                 ->setSubject('京西商城账号激活')
                 ->setHtmlBody("<br>你好, 点击以下链接即可激活你的账号！$url'")    //发布可以带html标签的文本
                 ->send();
             if($mail)
             return $this->render('registSuccess', [
                 'flag' => 'wait',
             ]);
         }

         // 渲染添加新用户的表单
         return $this->render('regist', [
             'model' => $model,
         ]);
     }     
     
     public function actionOrder()
     {
         // 判断用户是访客还是认证用户
         // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
         if (Yii::$app->user->isGuest) {
             // return $this->jump('success', '请先登录, 3秒后自动跳转到登录页面', 3, 'user/login');
         }
         $this->layout = "home_style.php";
         return $this->render('order');
     }  


    public function actionActivate(){
        $id = intval(Yii::$app->request->get('id'));
        $code = Yii::$app->request->get('code');
        if(!$id || !$code) return $this->jump();
        $check = User::find()->select(['check_code', 'status'])->where(['id' => $id])->asArray()->one();
        if(!$check) return fasle;
        if($check['status'] === '1')   return $this->render('registSuccess', ['flag' => 'repeat',]);
        if($code === $check['check_code'] && $check['status'] === '0'){
            Yii::$app->db->createCommand()->update('shop_member', ['status' => 1], "id = $id")->execute();
            return $this->render('registSuccess', [
                'flag' => 'success',
            ]);
        }
        return $this->jump();
    }
}