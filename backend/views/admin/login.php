<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: #278296;color:white">
<?php
use yii\widgets\ActiveForm;
$form = ActiveForm::begin();
?>
    <table cellspacing="0" cellpadding="0" style="margin-top:100px" align="center">
        <tr>
            <td>
                <img src="/Images/login.png" width="178" height="256" border="0" alt="ECSHOP" />
            </td>
            <td style="padding-left: 50px">
                <table>
                    <tr>
                        <td>登录名：</td>
                        <td>
                            <?= $form->field($model, 'username')->textInput([ 'style' => 'width:120px;'])->label("") ?>
                        </td>
                    </tr>
                    <tr>
                        <td>密码：</td>
                        <td>
                            <?= $form->field($model, 'password')->passwordInput([ 'style' => 'width:120px;'])->label("") ?>
                        </td>
                    </tr>
                    <!--
                    <tr>
                        <td>验证码：</td>
                        <td>
                            <input type="text" name="captcha" class="capital" style="width: 120px"/>
                        </td>
                    </tr>
                    -->
                    <tr>
                        <td colspan="2" align="right">
                            <img src="" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" value="进入管理中心" class="button" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
<?php ActiveForm::end(); ?>
    <input type="hidden" name="act" value="signin" />
</form>
</body>