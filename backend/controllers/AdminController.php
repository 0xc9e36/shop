<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\SignupForm;
use backend\models\LoginForm;


class AdminController extends Controller
{

    public $title;
    public $link;
    public $layout = "mylayout.php";


    public function behaviors()
    {
        return [
            \backend\components\behavior\PermissionBehavior::className(),
        ];
    }

    public function actionLogin()
    {
        // 判断用户是访客还是认证用户
        // isGuest为真表示访客，isGuest非真表示认证用户，认证过的用户表示已经登录了，这里跳转到主页面
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->redirect('index.php?r=index/index');
        }

        // 实例化登录模型 common\models\LoginForm
        $model = new LoginForm();

        // 接收表单数据并调用LoginForm的login方法
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index.php?r=index/index');
        }

        // 非post直接渲染登录表单
        else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout(){
        Yii::$app->user->logout();  //这里把session和cookie一起删除了
        return $this->redirect('/index.php?r=admin/login');
    }
    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sql = "SELECT *FROM shop_user WHERE 1";
        $data = Admin::findBySql( $sql)
            ->asArray()
            ->all();
        return $this->render('index', [
            'users'     =>   $data,
        ]);
    }

    /**
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($id == 1) echo "<script>alert('超级管理员禁止删除!')</script>";
        else $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*分配用户角色*/
    public function actionRole($uid){
        $authManager = Yii::$app->authManager;
        if(Yii::$app->request->isPost){
            $uid = (int)Yii::$app->request->post('uid');
            $roleNames=Yii::$app->request->post('roles');
            $authManager->revokeAll($uid);
            if(!empty($roleNames)&&is_array($roleNames)){
                foreach($roleNames as $roleName){
                    $role=$authManager->getRole($roleName);
                    if(!$role){
                        continue;
                    }
                    $authManager->assign($role,$uid);
                }
            }
            return  $this->redirect('index.php?r=admin/index');

        }else{
            $userRoles=$authManager->getRolesByUser($uid);
            $roleNames=\yii\helpers\ArrayHelper::getColumn(\yii\helpers\ArrayHelper::toArray($userRoles),'name');
            $roles=$authManager->getRoles();
            return $this->render('role',['roles'=>$roles,'roleNames'=>$roleNames, 'uid' => $uid]);
        }
    }

    /*路由错误*/
    public function actionError()
    {
        $message = '此资源并不存在';
        $time = 30;
        return $this->renderPartial('/admin/error', ['mes' => $message, 'time' => $time]);
    }

    /*逻辑错误*/
    public function jump($msg = '操作有误', $time = 10, $gotoUrl = null)
    {
        return $this->renderPartial('/admin/jump', ['msg' => $msg, 'time' => $time, 'gotoUrl' => $gotoUrl]);
        exit;
    }
}
