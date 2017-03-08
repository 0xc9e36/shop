
<!----详细描述---->
<table width="90%" id="detail-table" align="center">
    <tr>
        <td>
            <?= $form->field($model, 'des')->textarea(['rows' => 20, 'cols' => 100])->label("") ?>
        </td>
    </tr>
</table>

<!--其他信息-->
<table width="90%" id="other-table" align="center">
    <tr>
        <td class="label">商品库存量 : </td>
        <td>
            <?= $form->field($model, 'count')->textInput([ 'style' => 'width:200px;'])->label("") ?>
        </td>
    </tr>

    <tr>
        <td class="label">警告库存量：</td>
        <td>
            <?= $form->field($model, 'warn_count')->textInput([ 'style' => 'width:200px;'])->label("") ?>
        </td>
    </tr>

    <tr>
        <td class="label">是否上架：</td>
        <td>
            <input type="radio" name="Goods[is_sale]" value="1" checked="checked"/> 是
            <input type="radio" name="Goods[is_sale]" value="0"/> 否
        </td>
    </tr>

    <tr>
        <td class="label">是否免运费：</td>
        <td>
            <input type="radio" name="Goods[post_free]" value="1" checked="checked"/> 是
            <input type="radio" name="Goods[post_free]" value="0"/> 否
        </td>
    </tr>
</table>

<!--商品属性-->
<table width="90%" align="center" id="attribute-table">
    <tr id="first-line">
        <td class="label">商品类型：</td>
        <td>
            <select name="Goods[goodstype_id]" id="good_attr">
                <option value="0" selected="selected">请选择</option>
                <?php foreach ($goodstype_list as $k => $v) : ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo Html::encode($v['goodstype_name']); ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <script>
    </script>
</table>

<!----商品相册-->
<table width="90%" id="image-table" align="center">
    <tr>
        <td>
            <div id='picture'>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <span class='img_upload'><font color='red'>上传图片</font></span>
        </td>
    </tr>

</table>
<script>
    changeTab('general-tab', 'general-table');
</script>
<div class="button-div">
    <input type="submit" value=" 确定 " class="button"/>
    <input type="reset" value=" 重置 " class="button" />
</div>
<?php ActiveForm::end(); ?>
</div>
<!----表单结束--->
</div>
<div id="footer">
    共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
<?php
Dialog::begin([
    'id' => 'dialog',
    'clientOptions' => [
        'modal' => true,
        'autoOpen' => false,
    ],
]);
?>

<?php $form = ActiveForm::begin([ 'action' => ['goods/uploadimg'], 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data', 'id' => 'fileupload', 'target' => 'iframe']]) ?>
<?= $form->field($model_upload, 'imageFile')->fileInput()->label("") ?>
<button>上传</button>
<?php ActiveForm::end() ?>
<?php
Dialog::end();
?>

<?php
Dialog::begin([
    'id' => 'mydialog',
    'clientOptions' => [
        'modal' => true,
        'autoOpen' => false,
    ],
]);
?>
<?php $form = ActiveForm::begin([ 'action' => ['goods/picture'], 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data', 'id' => 'fileupload', 'target' => 'iframe']]) ?>
<?= $form->field($model_upload, 'imageFile')->fileInput()->label("") ?>
<button>上传</button>

<?php
Dialog::end();
?>
<script>
    //删除图片
    $('#image-table').on('click', '.deleteImg', function () {
        $(this).parent().remove();
    });
    //上传图片弹出框
    $(".upload").bind('click', function () {
        $("#dialog").dialog("open");
    });
    //上传相册弹出框
    $('#image-table').on('click', '.img_upload', function () {
        $("#mydialog").dialog("open");
    });
    //商品属性
    $('#good_attr').change(function () {
        //清空所有属性
        var allAttr = $("#attribute-table tr:gt(0)");
        allAttr.remove();
        id = $(this).val();
        //ajax请求商品属性
        $.ajax({
            type: "POST",
            url: "index.php?r=goodsattr/getattr",
            data: {'id': id},
            success: function (msg) {
                if (msg) {
                    $(msg).insertAfter('#first-line');
                }
            }
        });
    });
    function addAttr(obj) {
        // 转化成jquery对象
        var jqa = $(obj);
        var parent = jqa.parent().parent();
        if (jqa.html() === '[+]')
        {
            var newd = parent.clone();
            newd.find('input').val('');
            newd.find('a').html('[-]');
            parent.last().after(newd);
        }
        else
        {
            parent.remove();
        }
    }
    $('#sales_price').click(function () {
        if ($(this).is(':checked')) {
            $('#goods-sales_price').removeAttr('disabled');
            $('#goods-sales_start').removeAttr('disabled');
            $('#goods-sales_end').removeAttr('disabled');
        } else {
            $('#goods-sales_price').attr('disabled', 'disabled');
            $('#goods-sales_start').attr('disabled', 'disabled');
            $('#goods-sales_end').attr('disabled', 'disabled');
        }
    });

</script>
