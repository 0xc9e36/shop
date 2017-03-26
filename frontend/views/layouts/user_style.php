<?php
use \yii\helpers\Url;
?>
<?php echo $this->render('home_header'); ?>

<div style="clear:both;"></div>

<!-- 页面主体 start -->
<div class="main w1210 bc mt10">
    <div class="crumb w1210">
        <h2><strong>用户中心</strong></h2>
    </div>
    <!-- 左侧导航菜单 start -->
    <div class="menu fl">
        <h3>我的XX</h3>
        <div class="menu_wrap">
            <dl>
                <dt>订单中心 <b></b></dt>
                <dd class="cur"><b>.</b><a href="<?= Url::toRoute('user/order')?>">我的订单</a></dd>
            </dl>

            <dl>
                <dt>账户中心 <b></b></dt>
                <dd class="cur"><b>.</b><a href="<?= Url::toRoute('user/index')?>">账户信息</a></dd>
            </dl>
        </div>
    </div>
    <!-- 左侧导航菜单 end -->
    <?= $content ?>
</div>
<!-- 页面主体 end-->



<div style="clear:both;"></div>

<?php echo $this->render('footer'); ?>

