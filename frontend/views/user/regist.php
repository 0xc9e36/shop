<?php $this->beginPage() ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>用户注册</title>
        <style>
            .regist .login_form p{
                color: red;
                FONT-FAMILY: "微软雅黑";
            }
        </style>
        <link rel="stylesheet" href="style/login.css" type="text/css">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php
    use yii\helpers\Html;
    use yii\captcha\Captcha;
    use yii\bootstrap\ActiveForm;
    ?>
    <!-- 登录主体部分start -->
    <div class="login w990 bc mt10 regist">
        <div class="login_hd">
            <h2>用户注册</h2>
            <b></b>
        </div>
        <div class="login_bd">

            <div class="login_form fl">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <ul>
                    <li>
                        <label for="">用户名：</label>
                        <?= $form->field($model, 'username', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
                    </li>
                    <li>
                        <label for="">邮箱：</label>
                        <?= $form->field($model, 'email', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
                    </li>
                    <li>
                        <label for="">密码：</label>
                        <?= $form->field($model, 'password', ['inputOptions'    => ['class' => 'txt']])->passwordInput()->label('') ?>
                    </li>
                    <li>
                        <label for="">确认密码：</label>
                        <?= $form->field($model, 'verifyPassword', ['inputOptions'    => ['class' => 'txt']])->passwordInput()->label('') ?>
                    </li>
                    <li class="checkcode">
                        <?= $form->field($model, 'verifyCode')->label('')->widget(Captcha::className(), [
                            'captchaAction'=>'/user/captcha',
                            'template' => "<label for=''>验证码: </label><span style='margin-left: 8px; margin-right: 8px;'>{input}</span>{image}",
                        ]) ?>
                    </li>
                    <li>
                        <label for="">&nbsp;</label>
                        <input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
                    </li>
                    <li>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="" class="login_btn" />
                    </li>
                </ul>
                <?php ActiveForm::end(); ?>


            </div>

            <div class="mobile fl">
                <h3>手机快速注册</h3>
                <p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
                <p><strong>1069099988</strong></p>
            </div>

        </div>
    </div>
    <!-- 登录主体部分end -->


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>