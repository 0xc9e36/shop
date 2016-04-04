<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='属性列表';
$view->params['menu']= array(
    'link'     =>   '属性列表',
    'url'      =>   "index.php?r=goodsattr/index&id=$typeid",
);
?>
<div class="main-div">
    <!--
         <?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>
     <!--------------->
<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
        <table width="100%" id="general-table">
            <tr>
                <td class="label">属性名称:</td>
                <td>
                    <input type="hidden" name='Goodsattr[goodstype_id]' value="<?php echo $typeid;?>"/>
                   <?= $form->field($model, 'attr_name')->textInput([ 'style'  => 'width:200px;'])->label("") ?> 
                </td>
            </tr>
            
             <tr>
                <td class="label">属性类型:</td>
                <td>
<?= $form->field($model, 'attr_type')->radioList(['1' => '单选', '0' => '唯一'])->label("") ?>
                </td>
            </tr>           
            
            <tr>
                <td class="label">属性可选值:</td>
                <td>
                   <?= $form->field($model, 'attr_value')->textInput([ 'style'  => 'width:200px;'])->hint("多个用值用逗号隔开")->label("") ?> 
                </td>
            </tr>
        </table>
        <div class="button-div">
            <input type="submit" value=" 确定 " />
            <input type="reset" value=" 重置 " />
        </div>

    <?php ActiveForm::end(); ?>

</div>
    
</div>
