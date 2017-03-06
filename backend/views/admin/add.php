<?php
use yii;
use yii\widgets\ActiveForm;
$view=Yii::$app->getView();
$view->params['title']='管理员列表';
$view->params['menu']= array(
    'link'     =>   '管理员列表',
    'url'      =>   'index.php?r=admin/index',
);
?>
<div class="main-div">

    <?php
    $form = ActiveForm::begin();
    ?>
    <table width="100%" id="general-table">
        <tr>
            <td class="label">用户名:</td>
            <td>
                <?= $form->field($model, 'username')->label('')->textInput(['autofocus' => true]) ?>
            </td>
        </tr>
        <tr>
            <td class="label">邮箱:</td>
            <td>
                <?= $form->field($model, 'email')->label('') ?>
            </td>
        </tr>
        <tr>
            <td class="label">密码:</td>
            <td>
                <?= $form->field($model, 'password')->label('')->passwordInput() ?>
            </td>
        </tr>
    </table>
    <div class="button-div">
        <input type="submit" value=" 确定 " />
        <input type="reset" value=" 重置 " />
    </div>

    <?php ActiveForm::end(); ?>

</div>
