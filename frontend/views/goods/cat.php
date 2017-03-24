<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>商品列表页</title>
    <link rel="stylesheet" href="style/list.css" type="text/css">
    <link rel="stylesheet" href="style/common.css" type="text/css">

    <script type="text/javascript" src="js/list.js"></script>
</head>
<body>
<?php
    use common\help\MyHelper;
    /*二级分类信息*/
    $second = (new \yii\db\Query())->select(['id', 'cat_name', 'pid'])->from('shop_category')->where(['pid' => $top['id']])->orderBy('id')->all();
    $secondIds = [];
    foreach($second as $k => $v)  $secondIds[] = $v['id'];
    /*三级分类信息*/
    $three = (new \yii\db\Query())->select(['id', 'cat_name', 'pid'])->from('shop_category')->where(['pid' => $secondIds])->orderBy('id')->all();
?>


<!-- 列表主体 start -->
<div class="list w1210 bc mt10">
    <!-- 面包屑导航 start -->
    <div class="breadcrumb">
        <h2>当前位置：<a href="/">首页</a> > <a href=""><?= $curInfo['cat_name'];?></a></h2>
    </div>
    <!-- 面包屑导航 end -->
    <!-- 左侧内容 start -->
    <div class="list_left fl mt10">
        <!-- 分类列表 start -->
        <div class="catlist">
            <h2><?= $top['cat_name']; ?></h2>
            <div class="catlist_wrap">
                <?php foreach ($second as $sVal): ?>
                <div class="child">
                    <?php
                        if($curInfo['id'] == $sVal['id'] || $curInfo['pid'] ==  $sVal['id']){
                            $open = "class = 'on'";
                            $show = "";
                        }else{
                            $open = " ";
                            $show = "class = 'none' ";
                        }
                    ?>
                    <h3 <?= $open; ?>><b></b><?= $sVal['cat_name']; ?></h3>

                    <ul <?= $show; ?>>
                        <?php foreach ($three as $tVal): ?>
                            <?php if($tVal['pid'] == $sVal['id']): ?>
                            <li><a href="<?= 'index.php?r=goods/cat&id='.$tVal['id'] ?>"><?= $tVal['cat_name']; ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>

            </div>

            <div style="clear:both; height:1px;"></div>
        </div>
        <!-- 分类列表 end -->

        <div style="clear:both;"></div>

        <!-- 新品推荐 start -->
        <div class="newgoods leftbar mt10">
            <h2><strong>新品推荐</strong></h2>
            <div class="leftbar_wrap">
                <ul>
                    <?php foreach ($news as $k => $v): ?>
                    <li>
                        <dl>
                            <dt><a href="<?= \yii\helpers\Url::toRoute(['goods/detail', 'id' => $v['id']]) ?>"><img src="<?= YIi::$app->params['admin'].MyHelper::DS().$v['small_img'] ?>" alt="" /></a></dt>
                            <dd><a href=""><?= $v['goods_name']?></a></dd>
                            <dd><strong>￥<?= $v['shop_price']?></strong></dd>
                        </dl>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- 新品推荐 end -->


        <!-- 最近浏览 start -->
        <div class="viewd leftbar mt10">
            <h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>
            <div class="leftbar_wrap">
                <dl>
                    <dt><a href=""><img src="images/hpG4.jpg" alt="" /></a></dt>
                    <dd><a href="">惠普G4-1332TX 14英寸笔记...</a></dd>
                </dl>

                <dl class="last">
                    <dt><a href=""><img src="images/crazy4.jpg" alt="" /></a></dt>
                    <dd><a href="">直降200元！TCL正1.5匹空调</a></dd>
                </dl>
            </div>
        </div>
        <!-- 最近浏览 end -->
    </div>
    <!-- 左侧内容 end -->

    <!-- 列表内容 start -->
    <div class="list_bd fl ml10 mt10">
        <!-- 热卖、促销 start -->
        <div class="list_top">
            <!-- 热卖推荐 start -->
            <div class="hotsale fl">
                <h2><strong><span class="none">热卖推荐</span></strong></h2>
                <ul>
                    <?php  foreach ($hot as $k => $v) : ?>
                    <li>
                        <dl>
                            <dt><a href="<?= \yii\helpers\Url::toRoute(['goods/detail', 'id' => $v['id']]) ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img']?>" alt="" /></a></dt>
                            <dd class="name"><a href="<?= \yii\helpers\Url::toRoute(['goods/detail', 'id' => $v['id']]) ?>"><?= $v['goods_name']?></a></dd>
                            <dd class="price">特价：<strong>￥<?= $v['shop_price']?></strong></dd>
                        </dl>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- 热卖推荐 end -->
            
        </div>
        <!-- 热卖、促销 end -->

        <div style="clear:both;"></div>



        <!-- 商品列表 start-->
        <div class="goodslist mt10">
            <ul>
                <?php foreach ($goods as $good): ?>
                <li>
                    <dl>
                        <dt><a href="<?= 'index.php?r=goods/detail&id='.$good['id']; ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$good['small_img']; ?>" alt="" /></a></dt>
                        <dd><a href=""><?= $good['goods_name']; ?></a></dt>
                        <dd><strong>￥<?= $good['shop_price']; ?></strong></dt>
                        <dd><a href="#"><em>市场价 : </em></a><?= $good['mark_price']; ?></dt>
                    </dl>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- 商品列表 end-->


        <div class="page mt20">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                'nextPageLabel' => '下一页',
                'prevPageLabel' => '上一页',
                'options' => ['class' => 'm-pagination'],
            ]); ?>
        </div>
        <style>
            .m-pagination{
                margin-left: 300px;
            }
            .m-pagination li:hover{
                border:1px solid #3e89fa;
                background: #3e89fa;
                cursor:pointer;
            }
            .active{
                background: red;
            }
            .m-pagination li{
                float: left;
                width: 53px;
                font-size: 14px;
                margin-left: 10px;
                height: 25px;
                line-height: 25px;
                text-align:center;
                background-color: #eee;
                border:1px solid #ccc;
            }
        </style>

    </div>
    <!-- 列表内容 end -->
</div>
<!-- 列表主体 end-->

</body>
</html>