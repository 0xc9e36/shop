<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='会员等级';
$view->params['menu']= array(
    'link'     =>   '会员列表',
    'url'      =>   'index.php?r=memberlevel/index',
);
?>
<div class="main-div">
<?php

use yii\helpers\Html;
use yii\jui\Dialog;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>


<?php
$form = ActiveForm::begin();
?>
<table width="100%" id="general-table">
    <tr>
        <td class="label">会员等级名称:</td>
        <td>
            <?= $form->field($model, 'level_name')->textInput([ 'style' => 'width:200px;'])->label("") ?> 
        </td>
    </tr>
    <tr>
        <td class="label">积分下限:</td>
        <td>
            <?= $form->field($model, 'mark_min')->textInput([ 'style' => 'width:100px;'])->label("") ?>  
        </td>
    </tr>

    <tr>
        <td class="label">积分上限:</td>
        <td>
            <?= $form->field($model, 'mark_max')->textInput([ 'style' => 'width:100px;'])->label("") ?>  
        </td>
    </tr>           


    <tr>
        <td class="label">初始折扣率:</td>
        <td>
            <?= $form->field($model, 'rate')->textInput([ 'style' => 'width:100px;'])->hint('请输入1-100整数,如90表示打9折')->label("") ?>  
        </td>
    </tr>                  
</table>
<div class="button-div">
    <input type="submit" value=" 确定 " />
    <input type="reset" value=" 重置 " />
</div>
<?php ActiveForm::end(); ?>
</div>

