<?php
use yii;
use yii\widgets\ActiveForm;
$view=Yii::$app->getView();
$view->params['title']='添加角色';
$view->params['menu']= array(
    'link'     =>   '角色列表',
    'url'      =>   'index.php?r=role/index',
);
?>
<div class="main-div">

    <?php
    $form = ActiveForm::begin();
    ?>
    <table width="100%" id="general-table">
        <tr>
            <td class="label">角色名称:</td>
            <td>
                <?= $form->field($model, 'name')->textInput([ 'style' => 'width:200px;'])->label("") ?>
            </td>
        </tr>
        <tr>
            <td class="label">角色描述:</td>
            <td>
                <?= $form->field($model, 'description')->textInput([ 'style' => 'width:200px;'])->label("") ?>
            </td>
        </tr>
    </table>
    <div class="button-div">
        <input type="submit" value=" 确定 " />
        <input type="reset" value=" 重置 " />
    </div>

    <?php ActiveForm::end(); ?>
</div>
