<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>用户注册</title>
    <style>
        p {  color: red;  }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<!-- 页面头部 start -->
<div class="header w990 bc mt15">
    <div class="logo w990">
        <h2 class="fl"><a href="index.html"><img src="images/logo.png" alt="京西商城"></a></h2>
        <div class="flow fr flow2">
            <ul>
                <li>1.我的购物车</li>
                <li class="cur">2.填写核对订单信息</li>
                <li>3.成功提交订单</li>
            </ul>
        </div>
    </div>
</div>
<!-- 页面头部 end -->

<div style="clear:both;"></div>
<?php
use common\help\MyHelper;
?>

<?php $form = ActiveForm::begin(['id' => 'order_form']); ?>
<!-- 主体部分 start -->
<div class="fillin w990 bc mt15">
    <div class="fillin_hd">
        <h2>填写并核对订单信息</h2>
    </div>
    <div class="fillin_bd">
        <!-- 收货人信息  start-->
        <div class="address">
            <h3>收货人信息</h3>
            <ul>
                <li>
                    <label for=""><span>*</span>收 货 人：</label>
                    <?= $form->field($model, 'user_name', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
                </li>
                <li>
                    <label for=""><span>*</span>详细地址：</label>
                    <?= $form->field($model, 'user_address', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
                </li>
                <li>
                    <label for=""><span>*</span>手机号码：</label>
                    <?= $form->field($model, 'user_tel', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
                </li>
            </ul>
        </div>
        <!-- 收货人信息  end-->

        <!-- 配送方式 start -->
        <div class="delivery">
            <h3>送货方式</h3>
            <div class="delivery_select">
                <table>
                    <thead>
                    <tr>
                        <th class="col1">送货方式</th>
                        <th class="col2">运费</th>
                        <th class="col3">运费标准</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($post as $k => $v): ?>
                            <?php $checked = " ";  ?>
                    <tr>
                        <td><input type="radio" name="Order[post_id]" <?= $checked; ?> price="<?= $v['price']?>" class="postPrice" value="<?= $k; ?>"/><?= $v['name']?></td>
                        <td>￥<?= $v['price']?></td>
                        <td><?= $v['desc']?>4...</td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- 配送方式 end -->

        <!-- 支付方式  start-->
        <div class="pay">
            <h3>支付方式 </h3>
            <div class="pay_select">
                <table>
                    <?php foreach ($pay as $k => $v): ?>
                        <?php if($k == 0) $checked = "checked='checked'"; else $checked = " ";  ?>
                    <tr>
                        <td class="col1" ><input name="Order[pay_id]" value="<?= $k; ?>"   type="radio" <?= $checked; ?> /><?= $v['name']?></td>
                        <td class="col2"><?= $v['desc']?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- 支付方式  end-->
        <!-- 商品清单 start -->
        <div class="goods">
            <h3>商品清单</h3>
            <table>
                <thead>
                <tr>
                    <th class="col1">商品</th>
                    <th class="col2">规格</th>
                    <th class="col3">价格</th>
                    <th class="col4">数量</th>
                    <th class="col5">小计</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    $count = 0;
                    $sum = 0.00;
                    $total = 0.00;
                ?>

                <?php foreach ($list as $k => $v) : ?>
                <tr>
                    <?php
                    $count +=  $v['goodsnum'];
                    $s = bcmul($v['price'], $v['goodsnum'], 2);
                    $sum = bcadd($s, $sum, 2);
                    $total = $sum;
                    ?>
                    <td class="col1"><a href="<?= Url::to(['goods/detail', 'id' => $v['goodsid']]) ?>"><img src="<?= Yii::$app->params['admin'].'/'.$v['logo']; ?>" alt="" /></a>  <strong><a href="<?= Url::to(['goods/detail', 'id' => $v['goodsid']]) ?>"><?= $v['goods_name']; ?></a></strong></td>
                    <td class="col2"> <?= $v['attr'] ?> </td>
                    <td class="col3">￥<?= $v['price'] ?></td>
                    <td class="col4"> <?= $v['goodsnum'] ?></td>
                    <td class="col5"><span>￥<?= $s; ?></span></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
                        <ul>
                            <li>
                                <span><?= $count ?> 件商品</span>
                            </li>
                            <li>
                                <span>运费：</span>
                                <input hidden="" id="mypost" name="mypost" value="0.00" />
                                <input hidden="" id="myprice" name="myprice" value="<?= $sum; ?>" />
                                <em id="post">0.00</em>
                            </li>
                        </ul>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- 商品清单 end -->

    </div>

    <div class="fillin_ft">
        <a style="cursor: pointer;" onclick="sent()"><span>提交订单</span></a>
        <script>
        function sent() {
            var form=document.getElementById("order_form");
            form.submit();
        }
            $('.postPrice').click(function(){
                price = $(this).attr('price');
                sum = $("#total").attr('value');
                $("#post").html(price);
                total = (parseFloat(sum) + parseFloat(price)).toFixed(2);
                $("#post").html(price);
                $("#sum").html(total);
                $("#mypost").attr('value', price);
            });
        </script>
        <input type="hidden" id="total" value="<?= $total; ?>">
        <p>应付总额：<strong>￥<span id="sum"><?= $sum ?></span> 元</strong></p>

    </div>
</div>
<?php ActiveForm::end(); ?>
<!-- 主体部分 end -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
