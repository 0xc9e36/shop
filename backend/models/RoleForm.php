<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\rbac\Role;

class RoleForm extends Model
{
    public $name;
    public $description;

    public function rules(){
        return [
            [['name'],'string','max'=>20],
            [['name','description'],'required'],
            ['description','filter','filter'=>function($value){
                return Html::encode($value);
            }],
        ];
    }

    //自动设置 created_at updated_at
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),  //自动设置 created_at updated_at
        ];
    }


    public function attributeLabels(){
        return [
            'name'=>'角色名称',
            'description'=>'角色描述',
        ];
    }

    public function save(){
        if($this->validate()){
            $authManager = Yii::$app->authManager;
            $role = $authManager->createRole($this->name);
            $role->description = '创建了 ' . $this->name. '角色、部门、权限组';
            $authManager->add($role);
            return true;
        }else{
            return false;
        }
    }

    public function update($name){
        if($this->validate()){
            $authManager = Yii::$app->authManager;
            $role = $authManager->getRole($name);
            if(!$role) return false;
            $authManager->remove($role);

            $role = $authManager->createRole($this->name);
            $role->description = $this->description;
            $authManager->add($role);
            return true;
        }
        return false;
    }


}