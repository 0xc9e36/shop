<!doctype html>
<html lang="en">
<title>ECSHOP 管理中心 - 添加品牌 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./Styles/general.css" rel="stylesheet" type="text/css" />
<link href="./Styles/main.css" rel="stylesheet" type="text/css" />
<script src="./Js/jquery.min.js"></script>
<style>
    .help-block{  color: red; }
</style>
</head>
<body>

<iframe style="display:none;" width="600" height="500" name="iframe"></iframe>
<h1>
    <span class="action-span"><a href="/index.php?r=brand/index">商品品牌</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 添加品牌 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <?php
    use yii\helpers\Html;
    use yii\jui\Dialog;
    use yii\helpers\ArrayHelper;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin([
            'options' => ['name' => 'theForm'],
    ]);
    ?>
    <table width="100%" id="general-table">
        <tr>
            <td class="label">广告类型:</td>
            <td>
                <?= $form->field($model, 'type_id')->label('')->dropDownList(
                        ['0'=>'文字广告','1'=>'图片广告','2' => '轮播广告'],
                        ['prompt' => '请选择']
                ) ?>
            </td>
        </tr>
        <tr>
            <td class="label">链接地址:</td>
            <td>
                <?= $form->field($model, 'url')->textInput([ 'style' => 'width:200px;'])->label("") ?>
            </td>
        </tr>
        <tr>
            <td class="label">广告标题(可选):</td>
            <td>
                <?= $form->field($model, 'title')->textInput([ 'style' => 'width:200px;'])->label("") ?>
            </td>
        </tr>

        <tr>
            <td class="label">广告图片(可选):</td>
            <td>
                <?php
                if(!empty($model->small_img)) :
                    echo "已有图片,再次<span id='upload' onclick=\"remove()\"><font color='black' size=\"4px\">上传图片</font></span>将会覆盖" ;
                else:
                    echo "<span id='upload' onclick=\"remove()\"><font color='black' size=\"4px\">上传图片</font></span>";
                endif;
                ?>
                <?= $form->field($model, 'small_img')->hiddenInput()->label("") ?>
                <?= $form->field($model, 'big_img')->hiddenInput()->label("") ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> <span id="logoimg"><img src="<?php echo $model->small_img; ?>" /></span></td>
        </tr>

    </table>
    <div class="button-div">
        <input type="submit" value=" 确定 " />
    </div>

    <?php ActiveForm::end(); ?>


</div>

<div id="footer">
    共执行 1 个查询，用时 0.018952 秒，Gzip 已禁用，内存占用 2.197 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>

</body>
</html>
<script>
    $(document).ready(function(){
        $("#upload").bind('click', function(){
            $( "#dialog" ).dialog( "open" );
        });

    });
</script>
<?php
Dialog::begin([
        'id'  =>   'dialog',
        'clientOptions' => [
                'modal' => true,
                'autoOpen' => false,
        ],
]);
?>

<?php $form = ActiveForm::begin([ 'action' => ['adver/uploadimg'],'method'=>'post' ,'options' => ['enctype' => 'multipart/form-data', 'id'  => 'fileupload' ,'target'  => 'iframe']]) ?>

<?= $form->field($model_upload, 'imageFile')->fileInput()->label("") ?>

<button>上传</button>

<?php ActiveForm::end() ?>

<?php
Dialog::end();
?>

<script>
    function remove(){
        var file = jQuery('#uploadform-imagefile');
        file.after(file.clone().val(''));
        file.remove();
    }
</script>

