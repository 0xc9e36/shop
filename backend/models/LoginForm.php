<?php

namespace backend\models;

use  Yii;
use backend\models\Admin as User;


class LoginForm extends  \yii\base\Model
{
    public $username;
    public $rememberMe;
    public $password;
    public $_user;
    /**
     * @inheritdoc
     * 对表单数据进行验证的rule
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels(){
        return [
            'username'=>'用户名',
            'password'=>'密码',
            'rememberMe'=>'30天内免登录',
        ];
    }
    /**
     * 自定义的密码认证方法
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        // hasErrors方法，用于获取rule失败的数据
        if (!$this->hasErrors()) {
        // 调用当前模型的getUser方法获取用户
            $user = $this->getUser();

            // 获取到用户信息，然后校验用户的密码对不对，校验密码调用的是 backend\models\Admin 的validatePassword方法，
            // 这个我们下面会在UserBackend方法里增加
            if (!$user || !$user->validatePassword($this->password)) {
            // 验证失败，调用addError方法给用户提醒信息
                $this->addError($attribute, '用户名或者密码错误.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
      // 调用validate方法 进行rule的校验，其中包括用户是否存在和密码是否正确的校验
        if ($this->validate()) {
     // 校验成功后，session保存用户信息                                             /*默认记住30天*/
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * 根据用户名获取用户的认证信息
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
    // 根据用户名 调用认证类 backend\models\Admin 的 findByUsername 获取用户认证信息
    // 这个我们下面会在UserBackend增加一个findByUsername方法对其实现
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}