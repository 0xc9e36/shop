<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='商品分类';
$view->params['menu']= array(
    'link'     =>   '分类列表',
    'url'      =>   'index.php?r=category/add',
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

    <?php $form = ActiveForm::begin([
               'options'  => ['name' => 'theForm'],
            ]); ?>
        <table width="100%" id="general-table">
            <tr>
                <td class="label">分类名称:</td>
                <td>
                   <?= $form->field($model, 'cat_name')->textInput([ 'style'  => 'width:200px;'])->label("") ?> 
                </td>
            </tr>
            
            <tr>
                <td class="label">上级分类:</td>
                <td>
                    <select name="Category[pid]">
                        <option value="0" <?php if($pid_info==0) echo "selected='selected'" ?> >顶级分类</option>
                        <?php foreach($data as $k => $v){ ?>
                        <option value="<?php echo $v['id']; ?>"   <?php if($v['id']==$pid_info['id']) echo "selected='selected'" ?>  ><?php echo str_repeat("&nbsp;&nbsp;", $v['deep']).Html::encode($v['cat_name']); ?></option>
                        <?php } ?>
                    </select>
                </td>        
            </tr>
            
            <tr>
                <td class="label">数量单位:</td>
                <td>
                       <?= $form->field($model, 'unit')->textInput([ 'style'  => 'width:120px;'])->label("") ?>
                </td>
            </tr>
            
            <tr>
                <td class="label">价格区间个数:</td>
                <td>
                     <?= $form->field($model, 'price_area')->textInput([ 'style'  => 'width:400px;', 'value'  => 0])->hint('该选项表示该分类下商品最低价与最高价之间的划分的等级个数，默认为0表示不做分级，最多不能超过10个。')->label("") ?>
                </td>
            </tr>
            
            <tr>
                <td class="label">是否显示:</td>
                <td>
                    <?=$form->field($model, 'is_show')->radioList(['1'=>'是','0'=>'否'])->label("")?>
                </td>
            </tr>
            
      <tr>
        <td class="label">分类描述:</td>
        <td>
          <?= $form->field($model, 'des')->textarea(['rows'=>7,'cols' => 60])->label("") ?>
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
