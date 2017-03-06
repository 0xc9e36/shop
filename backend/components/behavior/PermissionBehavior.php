<?php
    namespace backend\components\behavior;

    use backend\controllers\PublicController;
    use Yii;
    use yii\base\Behavior;
    use yii\web\Controller;
    use yii\web\ForbiddenHttpException;

class PermissionBehavior extends Behavior
{

    public $actions = [];

    public function events()
    {
        return [
             Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
    *
    * @param \yii\base\ActionEvent $event
    * @throws ForbiddenHttpException
    * @return boolean
    */
    public function beforeAction($event)
    {
        $access = $event->action->controller->id."::".$event->action->id;
        $auth = Yii::$app->authManager;
        if (!$a=$auth->getPermission($access)) {
            $a = $auth->createPermission($access);
            $a->description = '创建了 ' .$access. ' 许可';
            $auth->add($a);
            $auth->assign($a, Yii::$app->user->id); //添加许可
        }

        if ($access == "admin::login" || Yii::$app->user->id==1) return true;

        if (!Yii::$app->user->can($access)) {
            header("Content-type: text/html; charset=utf-8");
            echo "<script>alert('权限不足'); history.go(-1)</script>";
            exit;
        }
        return true;
    }

}