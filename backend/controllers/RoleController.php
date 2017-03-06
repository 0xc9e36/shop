<?php
namespace backend\controllers;

use Yii;
use backend\models\RoleForm;
use yii\web\Controller;

class RoleController extends AdminController
{
    public function behaviors()
    {
        return [
            \backend\components\behavior\PermissionBehavior::className(),

        ];
    }
    public function actionIndex($userid=null)
    {
        $authManager = Yii::$app->authManager;
        $roles = $authManager->getRoles();
        return $this->render('index',[
            'roles'=>$roles,
            'uid'=>$userid
        ]);
    }

    //创建角色
    public function actionAdd(){
        $model = new RoleForm();
        if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['index']);
            }
        return $this->render('add',['model'=>$model,]);
    }

    //修改角色
    public function actionUpdate($name,$userid=NULL){
        $authManager = Yii::$app->authManager;
        //是否有下级
        $child = $authManager->getChildren($name);
        //如果有下级不允许修改
        if($child) return $this->jump('角色有用户,不能修改',5,'/index.php?r=role/index');
        //获取角色
        $role = $authManager->getRole($name);
        if(!$role) return false;

        //角色表单
        $model = new RoleForm();
        //角色名称
        $model->name = $role->name;
        //角色描述
        $model->description = $role->description;
        if($model->load(\Yii::$app->request->post()) && $model->update($name)) return $this->redirect(['index']);
        return $this->render('update',['model'=>$model]);
    }
    //删除角色
    public function actionDelete($name,$userid=NULL){
        $authManager = \Yii::$app->authManager;
        //是否有子角色
        $child = $authManager->getChildren($name);
        //有子角色不能删除
        if($child)  return $this->jump('有子节点, 无法删除',5,'/index.php?r=role/index');
        //获取角色
        $role = $authManager->getRole($name);
        if(!$role) return false;
        if($authManager->remove($role)) return $this->redirect(['index']);
        return $this->jump('无法删除',5,'/index.php?r=role/index');
    }

    //为角色赋予权限
    public function actionRolenode($name)
    {
        $authManager = \Yii::$app->authManager;
        $role = $authManager->getRole($name);
        if(!$role){
            return  $this->jump('节点未找到', 3);
        }
        if(\Yii::$app->request->isPost){
            $nodes = \Yii::$app->request->post('node');
            $authManager->removeChildren($role);
            if($nodes)
            foreach($nodes as $v){
                $node = $authManager->getPermission($v);
                if(!$node)continue;
                $authManager->addChild($role,$node);
            }
            return $this->redirect(['/role/index']);
        }
        /*展示所有权限*/
        $roleNodes = $authManager->getPermissionsByRole($name);
        $roleNodes = array_keys($roleNodes);
        $nodes = $authManager->getPermissions();
        return $this->render('rolenode',[
            'nodes'=>$nodes,
            'roleNodes'=>$roleNodes,
            'name'=>$name,
        ]);
    }

}