<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ECSHOP 管理中心 - 添加新商品 </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./Styles/general.css" rel="stylesheet" type="text/css" />
        <link href="./Styles/main.css" rel="stylesheet" type="text/css" />
        <script src="./Js/jquery.min.js"></script>
        <style>
            .help-block{
                color:red;
            }
            .imgarea{
                margin-left: 15px;
            }
            .changeCount{
                cursor: pointer ;                            
            }
        </style>
    </head>
    <body onload="init()">
        <iframe  style="display:none" width="1000" height="300" name="iframe"></iframe>
        <h1>
            <span class="action-span"><a href="index.php?r=goods/index">商品列表</a>
            </span>
            <span class="action-span1"><a href="index.php?r=index/index">ECSHOP 管理中心</a></span>
            <span id="search_id" class="action-span1"> - 添加新商品 </span>
            <div style="clear:both"></div>
        </h1>
        <?php

        use yii;
        use yii\helpers\Html;
        use yii\jui\Dialog;
        use yii\helpers\ArrayHelper;
        use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
        /* @var $model frontend\models\Country */
        /* @var $form yii\widgets\ActiveForm */
        ?>

        <?php
        $form = ActiveForm::begin([
                    'options' => ['id' => 'goodsForm'],
        ]);
        ?>
        <div class="tab-div">
            <!-----选项列表--->
            <div id="tabbar-div">
                <p>
                    <span class="tab-back" id="general-tab" onclick="changeTab(this.id, 'general-table')">通用信息</span>
                    <span class="tab-back" id="detail-tab" onclick="changeTab(this.id, 'detail-table')">详细描述</span>
                    <span class="tab-back" id="other-tab" onclick="changeTab(this.id, 'other-table')">其他描述</span>
                    <span class="tab-back" id="attribute-tab" onclick="changeTab(this.id, 'attribute-table')">商品属性</span>
                    <span class="tab-back" id="image-tab" onclick="changeTab(this.id, 'image-table')">商品相册</span>
                </p>
            </div>
            <!-----商品表单------>
            <div id="tabbody-div">
                <table width="90%" id="general-table" align="center" >
                    <tr>
                        <td class="label">商品名称：</td>
                        <td>
                            <?= $form->field($model, 'goods_name')->textInput([ 'style' => 'width:200px;'])->label("") ?>  
                            <input type="hidden" id="goods_id" value="<?php echo $model->id; ?>">
                                <input type="hidden" id="goodstype_id" value="<?php echo $model->goodstype_id; ?>">
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="label">商品货号： </td>
                                        <td>
                                            <?= $form->field($model, 'goods_sn')->textInput([ 'style' => 'width:200px;'])->hint("如果您不输入商品货号，系统将自动生成一个唯一的货号。")->label("") ?>  
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">商品分类:</td>
                                        <td>
                                            <select name="Goods[goodscat_id]">
                                                <option value="0"  <?php if ($model->goodscat_id == 0) echo "selected='selected'"; ?>>请选择</option>
                                                <?php foreach ($cat_list as $k => $v) { ?>
                                                     <option value="<?php echo $v['id']; ?>"  <?php if ($model->goodscat_id == $v['id']) echo "selected='selected'"; ?> ><?php echo str_repeat("&nbsp;&nbsp;", $v['deep']) . Html::encode($v['cat_name']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">商品品牌：</td>
                                        <td>
                                            <select name="Goods[goods_brand]">
                                                <option value="0" <?php if ($model->goods_brand == 0) echo "selected='selected'"; ?>>请选择</option>
                                                <?php foreach ($brand_list as $k => $v) { ?>
                                                     <option value="<?php echo $v['id']; ?>"  <?php if ($model->goods_brand == $v['id']) echo "selected='selected'"; ?>><?php echo Html::encode($v['brand_name']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="label">本店售价：</td>
                                        <td>
                                            <?= $form->field($model, 'shop_price')->textInput([ 'style' => 'width:200px;'])->label("") ?>  
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">会员价格：</td>
                                        <td>
                                            <?php foreach ($memberlevel_list as $k => $v) { ?>
                                                 <font color="blue"><?php echo $v['level_name']; ?><input type="hidden"  name="id[]" value="<?php echo $v['id']; ?>"/></font>
                                                 <?php foreach ($memberPriceInfo as $k1 => $v1) { ?>
                                                      <?php if ($v['id'] == $v1['member_level']) { ?>
                                                           <input type="text" name="price[]"  value="<?php echo $v1['member_price']; ?>" style="width:40px" /> 
                                                           <?php
                                                      }
                                                 }
                                            }
                                            ?>
                                            <div>会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</div>
                                        </td>
                                    </tr>                  

                                    <tr>
                                        <td class="label">商品优惠价格：</td>
                                        <td id="priceArea">

                                            <?php
                                            if ($discountList) {
                                                 foreach ($discountList as $k => $v) {
                                                      if ($k == 0) {
                                                           $a = '[+]';
                                                      } else {
                                                           $a = '[-]';
                                                      }
                                                      ?>
                                                      <div  id = "box" class="box1"> 
                                                          <a class="changeCount"><?php echo $a; ?></a><font color="blue" >优惠数量</font><input type="text"  class = "count"  value="<?php echo $v['count']; ?>" name="sale_count[]"   style="width:50px" />   <font color="blue"> 优惠价格</font><input type="text"  class="price"  value="<?php echo $v['price']; ?>"  name="sale_prices[]" style="width:50px" /><br /> 
                                                      </div>
                                                      <?php
                                                 }
                                            } else {
                                                 ?>
                                                 <div  id = "box" class="box1"> <a class="changeCount">[+]</a><font color="blue" >优惠数量</font><input type="text"  class = "count" name="sale_count[]"   style="width:50px" />   <font color="blue"> 优惠价格</font><input type="text"  class="price" name="sale_prices[]" style="width:50px" /> </div>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">市场售价：</td>
                                        <td>
                                            <?= $form->field($model, 'mark_price')->textInput([ 'style' => 'width:200px;'])->label("") ?> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label"><input type="checkbox" id="sales_price"  name="is_sale" value="ok">促销价：</td>
                                        <td>
                                            <?=
                                            $form->field($model, 'sales_price')->textInput([
                                                'style' => 'width:200px;',
                                                'disabled' => 'disabled', //默认不可用
                                            ])->label("")
                                            ?> 
                                        </td>
                                    </tr>                   

                                    <tr>
                                        <td class="label">促销日期：</td>
                                        <td>                          
                                            <?php

                                            use yii\jui\DatePicker;
                                            ?>
                                            促销开始
                                            <?=
                                            DatePicker::widget([
                                                'model' => $model,
                                                'attribute' => 'sales_start',
                                                'language' => 'en',
                                                'clientOptions' => [
                                                    'dateFormat' => 'yy-mm-dd',
                                                ],
                                            ])
                                            ?>
                                            促销结束
                                            <?=
                                            DatePicker::widget([
                                                'model' => $model,
                                                'attribute' => 'sales_end',
                                                'language' => 'en',
                                                'clientOptions' => [
                                                    'dateFormat' => 'yy-mm-dd',
                                                ],
                                            ])
                                            ?>
                                        </td>
                                    </tr>                        

                                    <tr>
                                        <td class="label">商品图片：</td>
                                        <td>
                                            <div class="upload"><font color='red'>点击上传</div>
                                            <input type="hidden" name="Goods[small_img]" id='small_img'>
                                                <input type="hidden" name="Goods[primary_img]" id='primary_img'>
                                                    <input type="hidden" name="Goods[big_img]" id='big_img'>
                                                        <input type="hidden" name="Goods[medium_img]" id='medium_img'></input>
                                                        </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" align='center'> <div id="logoimg">
                                                                    <?php
                                                                    if ($model->attributes['small_img'])
                                                                         echo "<img src='{$model->attributes['small_img']}' />";
                                                                    ?>
                                                                </div></td>
                                                        </tr>
                                                        </table>

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
                                                                    <input type="radio" name="Goods[is_sale]" value="1"  <?php if ($model->is_sale == 1) { ?> checked="checked" <?php } ?> /> 是
                                                                    <input type="radio" name="Goods[is_sale]" value="0" <?php if ($model->is_sale == 0) { ?> checked="checked" <?php } ?>/> 否
                                                                </td>
                                                            </tr>       

                                                            <tr>
                                                                <td class="label">是否免运费：</td>
                                                                <td>
                                                                    <input type="radio" name="Goods[post_free]" value="1" <?php if ($model->post_free == 1) { ?> checked="checked" <?php } ?>/> 是
                                                                    <input type="radio" name="Goods[post_free]" value="0" <?php if ($model->post_free == 0) { ?> checked="checked" <?php } ?>/> 否
                                                                </td>
                                                            </tr>                           
                                                        </table>


                                                        <!--商品属性-->
                                                        <table width="90%" align="center" id="attribute-table">
                                                            <tr id="first-line">
                                                                <td class="label">商品类型：</td>
                                                                <td>
                                                                    <select name="Goods[goodstype_id]" id="good_attr">
                                                                        <option value="0"  <?php if ($model->goodstype_id == 0) echo "selected='selected'"; ?>>请选择</option>
                                                                        <?php foreach ($goodstype_list as $k => $v) { ?>
                                                                             <option value="<?php echo $v['id']; ?>"  <?php if ($model->goodstype_id == $v['id']) echo "selected='selected'"; ?>><?php echo Html::encode($v['goodstype_name']); ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <script>
                                                                     (function () {
                                                                         o = $('#good_attr').find('option:selected');
                                                                         id = o.val();
                                                                         goods_id = $('#goods_id').val();
                                                                         o.select(function () {
                                                                             $.ajax({
                                                                                 type: "POST",
                                                                                 url: "index.php?r=goodsattr/editattr",
                                                                                 data: {'id': id, 'goods_id': goods_id},
                                                                                 success: function (msg) {
                                                                                     if (msg) {
                                                                                         $(msg).insertAfter('#first-line');
                                                                                     }
                                                                                 }
                                                                             });
                                                                         });
                                                                         o.trigger('select');
                                                                     })()

                                                                     //商品属性
                                                                     $('#good_attr').on('change', function () {
                                                                         //清空所有属性
                                                                         var allAttr = $("#attribute-table tr:gt(0)");
                                                                         allAttr.remove();
                                                                         id = $(this).val();
                                                                         goods_id = $('#goods_id').val();
                                                                         goodstype_id = $('#goodstype_id').val();

                                                                         if (id === goodstype_id) {
                                                                             //该商品类型下属性
                                                                             $.ajax({
                                                                                 type: "POST",
                                                                                 url: "index.php?r=goodsattr/editattr",
                                                                                 data: {'id': id, 'goods_id': goods_id},
                                                                                 success: function (msg) {
                                                                                     if (msg) {
                                                                                         $(msg).insertAfter('#first-line');
                                                                                     }
                                                                                 }
                                                                             });
                                                                         } else {
                                                                             //非该商品类型下属性
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
                                                                         }
                                                                     });
                                                                </script>
                                                        </table>

                                                        <!----商品相册-->
                                                        <table width="90%" id="image-table" align="center">
                                                            <tr>
                                                                <td>
                                                                    <?php foreach ($imageList as $k => $v) { ?>
                                                                         <span class='imgarea'>
                                                                             <span class='s1'><img src="<?php echo $v['small_img']; ?>"/></span>
                                                                             <a class='deleteImg'  href='#'>[-]</a>
                                                                             <input id='small' type='hidden' name='simg[]'  value="<?php echo $v['small_img']; ?> "/>
                                                                             <input type='hidden' id='big' name='bimg[]' value="<?php echo $v['big_img']; ?>"/>
                                                                             <input type='hidden'  id='medium'  name='mimg[]'  value="<?php echo $v['medium_img']; ?>"/> 
                                                                             <input type='hidden' id='primary'  name='pimg[]'  value="<?php echo $v['primary_img']; ?>"/>
                                                                         </span>
                                                                    <?php } ?>
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
                                                        </body>
                                                        </html>

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

                                                        <?php ActiveForm::end() ?>

                                                        <?php
                                                        Dialog::end();
                                                        ?>

                                                        <script>
                                                             //删除图片
                                                             $('#image-table').on('click', '.deleteImg', function () {
                                                                 $(this).parent().remove();
                                                             });
                                                             //上传文件弹出框
                                                             $(".upload").bind('click', function () {
                                                                 $("#dialog").dialog("open");
                                                             });
                                                             //上传文件弹出框
                                                             $('#image-table').on('click', '.img_upload', function () {
                                                                 $("#mydialog").dialog("open");
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

                                                             //页面初始化操作
                                                             function init() {
                                                                 //初始化tab选项卡
                                                                 changeTab('general-tab', 'general-table');
                                                                 //促销时间初始化
                                                                 $('#goods-sales_start').attr('disabled', 'disabled');
                                                                 $('#goods-sales_end').attr('disabled', 'disabled');
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
                                                             //切换选项卡
                                                             function changeTab(id, content)
                                                             {
                                                                 $('#general-table').css('display', 'none');
                                                                 $('#detail-table').css('display', 'none');
                                                                 $('#other-table').css('display', 'none');
                                                                 $('#attribute-table').css('display', 'none');
                                                                 $('#image-table').css('display', 'none');
                                                                 $('#general-tab').attr('class', 'tab-back')
                                                                 $('#detail-tab').attr('class', 'tab-back')
                                                                 $('#other-tab').attr('class', 'tab-back')
                                                                 $('#attribute-tab').attr('class', 'tab-back')
                                                                 $('#image-tab').attr('class', 'tab-back')

                                                                 $('#' + content).css('display', 'block');
                                                                 $("#" + id).attr('class', 'tab-front');
                                                             }

                                                             $('#priceArea').on('click', '.changeCount', function () {
                                                                 //增加
                                                                 if ($(this).text() == '[+]')
                                                                 {
                                                                     //查找最后id
                                                                     lastBox = $("#priceArea div").last();
                                                                     last = lastBox.attr("class");
                                                                     id = last.substr(3, 1);
                                                                     flag = true;
                                                                     //判断所有的输入框是否有值
                                                                     $("#priceArea").find('input').each(function () {
                                                                         if ($(this).val() === '') {
                                                                             flag = false;
                                                                         }
                                                                     });
                                                                     if (flag)
                                                                     {
                                                                         //生成框
                                                                         newBox = $("#priceArea div").last().clone();
                                                                         id++;
                                                                         newClass = 'box' + id;
                                                                         newBox = newBox.attr('class', newClass);
                                                                         newBox.find('a').html('[-]');
                                                                         newBox.find('input').val('');
                                                                         $("#priceArea").append(newBox);
                                                                     } else {
                                                                         alert('输入不能为空');
                                                                     }
                                                                 } else {
                                                                     $(this).parent().remove();
                                                                     //减少
                                                                 }
                                                             });
                                                        </script>
