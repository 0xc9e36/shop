<?php
namespace frontend\models;
use yii\base\Model;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyPassword;
    public $verifyCode;
    public $created_at;
    public $updated_at;
    /**
     * @inheritdoc
     * 对数据的校验规则
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'string', 'length' => [6,15], 'tooShort'   => '用户名长度为6-15个字符', 'tooLong'   => '用户名长度为6-15个字符'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '用户名已存在.'],
            // 下面的规则基本上都同上，不解释了
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => '邮箱不可以为空'],
            ['email', 'email', 'message'    =>  '邮箱格式不对'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '邮箱已经被设置了.'],
            ['password', 'required', 'message' => '密码不可以为空'],
            ['password', 'string', 'min' => 6, 'tooShort' => '密码至少填写6位'],
            ['verifyPassword', 'compare', 'compareAttribute'=>'password',  'message' =>  '两次密码不一致'],
            ['verifyPassword', 'required', 'message' => '确认密码不可以为空'],
            // default 默认在没有数据的时候才会进行赋值
            [['created_at', 'updated_at'], 'default', 'value' => date('Y-m-d H:i:s')],
            ['verifyCode', 'captcha', 'message'=>'验证码错误', 'captchaAction'=>'/user/captcha'],//指定模块、控制器
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * Signs user up.
     *
     * @return true|false 添加成功或者添加失败
     */
    public function signup()
    {
        // 调用validate方法对表单数据进行验证，验证规则参考上面的rules方法
        if (!$this->validate()) {
            return null;
        }
        // 实现数据入库操作
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;
        $user->check_code = md5(uniqid());  //邮件激活校验码
        // 设置密码，密码肯定要加密，暂时我们还没有实现，看下面我们有实现的代码
        $user->setPassword($this->password);
        // 生成 "remember me" 认证key
        $user->generateAuthKey();
        // save(false)的意思是：不调用Admin再做校验并实现数据入库操作
        // 这里这个false如果不加，save底层会调用User的rules方法再对数据进行一次校验，因为我们上面已经调用Signup的rules校验过了，这里就没必要在用User的rules校验了
        $user->save(false);
        return $user;
    }
}