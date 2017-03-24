<?php
use \yii\helpers\Url;
use common\help\MyHelper;
?>
<!-- 综合区域 start 包括幻灯展示，商城快报 -->
<div class="colligate w1210 bc mt10">
    <!-- 幻灯区域 start -->
    <div class="slide fl">
        <div class="area">
            <div class="slide_items">
                <ul>
                    <?php foreach ($carousel as $k => $v): ?>
                    <li><a href="<?= $v['url']; ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['big_img']; ?>" alt="" /></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="slide_controls">
                <ul>
                    <?php
                        for($i = 1; $i <= $count; $i++){
                            if($i == 1) echo "<li class='on'>{$i}</li>";
                            else echo "<li>{$i}</li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 幻灯区域 end-->

    <!-- 快报区域 start-->
    <div class="coll_right fl ml10">
        <div class="ad"><a href="<?= $images['url']; ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$images['big_img']; ?>" alt="" /></a></div>
        <div class="news mt10">
            <h2><strong>广告商品</strong></h2>
            <ul>
                <?php foreach ($txtAd as $k => $v): ?>
                <li class="odd"><a href="<?= $v['url']; ?>"><?= $v['title']; ?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="news mt10">
            <h2><strong>网站公告</strong></h2>
            <?= Yii::$app->params['publinInfo']  ?>
        </div>
    </div>
    <!-- 快报区域 end-->
</div>
<!-- -综合区域 end -->

<div style="clear:both;"></div>

<!-- 导购区域 start -->
<div class="guide w1210 bc mt15">
    <!-- 导购左边区域 start -->
    <div class="guide_content fl">
        <h2>
            <span class="on">疯狂抢购</span>
            <span>热卖商品</span>
            <span>推荐商品</span>
            <span>新品上架</span>
            <span class="last">猜您喜欢</span>
        </h2>

        <div class="guide_wrap">
            <!-- 疯狂抢购 start-->
            <div class="crazy">
                <ul>
                    <?php foreach ($crazy as $k => $v) :?>
                    <li>
                        <dl>
                            <dt><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']; ?>" alt="" /></a></dt>
                            <dd><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name'] ?></a></dd>
                            <dd><span>售价：</span><strong> ￥<?= $v['shop_price'] ?></strong></dd>
                        </dl>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <!-- 疯狂抢购 end-->

            <!-- 热卖商品 start -->
            <div class="hot none">
                <ul>
                    <?php foreach ($bestsale as $k => $v) :?>
                        <li>
                            <dl>
                                <dt><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']; ?>" alt="" /></a></dt>
                                <dd><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name'] ?></a></dd>
                                <dd><span>售价：</span><strong> ￥<?= $v['shop_price'] ?></strong></dd>
                            </dl>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!-- 热卖商品 end -->

            <!-- 推荐商品 atart -->
            <div class="recommend none">
                <ul>
                    <?php foreach ($recomend as $k => $v) :?>
                        <li>
                            <dl>
                                <dt><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']; ?>" alt="" /></a></dt>
                                <dd><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name'] ?></a></dd>
                                <dd><span>售价：</span><strong> ￥<?= $v['shop_price'] ?></strong></dd>
                            </dl>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!-- 推荐商品 end -->

            <!-- 新品上架 start-->
            <div class="new none">
                <ul>
                    <?php foreach ($new as $k => $v) :?>
                        <li>
                            <dl>
                                <dt><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']; ?>" alt="" /></a></dt>
                                <dd><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name'] ?></a></dd>
                                <dd><span>售价：</span><strong> ￥<?= $v['shop_price'] ?></strong></dd>
                            </dl>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!-- 新品上架 end-->

            <!-- 猜您喜欢 start -->
            <div class="guess none">
                <ul>
                    <?php foreach ($guess as $k => $v) :?>
                        <li>
                            <dl>
                                <dt><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']; ?>" alt="" /></a></dt>
                                <dd><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name'] ?></a></dd>
                                <dd><span>售价：</span><strong> ￥<?= $v['shop_price'] ?></strong></dd>
                            </dl>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!-- 猜您喜欢 end -->

        </div>

    </div>
    <!-- 导购左边区域 end -->

    <!-- 侧栏 网站首发 start-->
    <div class="sidebar fl ml10">
        <h2><strong>网站首发</strong></h2>
        <div class="sidebar_wrap">
            <?php foreach ($siteFirst as $k => $v): ?>
            <dl class="first">
                <dt class="fl"><a href=""><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img'] ?>" alt="" /></a></dt>
                <dd><strong><a href="<?=  Url::toRoute(['goods/detail', 'id' => $v['id']])?>"><?= $v['goods_name']; ?></a></strong> <em>首发</em></dd>
                <dd><?= \common\help\MyHelper::chinesesubstr($v['des'], 0, 100) ?></dd>
            </dl>
            <?php endforeach; ?>
        </div>


    </div>
    <!-- 侧栏 网站首发 end -->

</div>
<!-- 导购区域 end -->


