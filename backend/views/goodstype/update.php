<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='商品类型';
$view->params['menu']= array(
    'link'     =>   '类型列表',
    'url'      =>   'index.php?r=goodstype/index',
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
                <td class="label">商品类型名称:</td>
                <td>
<?= $form->field($model, 'goodstype_name')->textInput([ 'style' => 'width:200px;'])->label("") ?> 
                </td>
            </tr>                 
        </table>
        <div class="button-div">
            <input type="submit" value=" 确定 " />
            <input type="reset" value=" 重置 " />
        </div>

<?php ActiveForm::end(); ?>


    </div>
