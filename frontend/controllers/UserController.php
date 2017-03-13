<?php
namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\SignupForm;
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
          return $this->render('index');
     }     
     
     public function actionLogin()
     {
          return $this->renderPartial('login');
     }

     public function actionRegist()
     {
         $model = new \frontend\models\SignupForm();
         if ($model->load(Yii::$app->request->post()) && $model->signup()) {
             return $this->redirect('/');
             //这里要邮箱激活
             //return $this->registSuccess();
         }

         // 渲染添加新用户的表单
         return $this->render('regist', [
             'model' => $model,
         ]);
     }     
     
     public function actionOrder()
     {
          return $this->renderPartial('order');
     }  
     
     public function actionAddress()
     {
          return $this->renderPartial('address');
     }

     public function registSuccess(){
        return $this->render('registSuccess');
     }

     public function actionSent(){
         $mail = \Yii::$app->mailer->compose()
             ->setFrom(['13873120673@163.com' => '京西商城注册'])
             ->setTo('2698143402@qq.com')
             ->setSubject('邮件发送配置')
             //->setTextBody('Yii中文网教程真好 www.yii-china.com')   //发布纯文字文本
             ->setHtmlBody("<br>Yii中文网教程真好！www.yii-china.com")    //发布可以带html标签的文本
             ->send();
         if($mail)
             echo 'success';
         else
             echo 'fail';
     }
}