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
                            <dt><a href="<?= \yii\helpers\Url::toRoute(['goods/detail', 'id' => $v['id']]) ?>"><img src="<?= YIi::$app->params['upload_url'].'/'.$v['small_img'] ?>" alt="" /></a></dt>
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
                            <dt><a href="<?= \yii\helpers\Url::toRoute(['goods/detail', 'id' => $v['id']]) ?>"><img src="<?= Yii::$app->params['upload_url'].'/'.$v['small_img']?>" alt="" /></a></dt>
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

        <!-- 商品筛选 start -->
        <!--
        <div class="filter mt10">
            <h2><a href="">重置筛选条件</a> <strong>商品筛选</strong></h2>
            <div class="filter_wrap">
                <dl>
                    <dt>品牌：</dt>
                    <dd class="cur"><a href="">不限</a></dd>
                    <dd><a href="">联想（ThinkPad）</a></dd>
                    <dd><a href="">联想（Lenovo）</a></dd>
                    <dd><a href="">宏碁（acer）</a></dd>
                    <dd><a href="">华硕（ASUS）</a></dd>
                    <dd><a href="">戴尔（DELL）</a></dd>
                    <dd><a href="">索尼（SONY）</a></dd>
                    <dd><a href="">惠普（HP）</a></dd>
                    <dd><a href="">三星（SAMSUNG）</a></dd>
                    <dd><a href="">优派（ViewSonic）</a></dd>
                    <dd><a href="">苹果（Apple）</a></dd>
                    <dd><a href="">富士通（Fujitsu）</a></dd>
                </dl>

                <dl>
                    <dt>价格：</dt>
                    <dd class="cur"><a href="">不限</a></dd>
                    <dd><a href="">1000-1999</a></dd>
                    <dd><a href="">2000-2999</a></dd>
                    <dd><a href="">3000-3499</a></dd>
                    <dd><a href="">3500-3999</a></dd>
                    <dd><a href="">4000-4499</a></dd>
                    <dd><a href="">4500-4999</a></dd>
                    <dd><a href="">5000-5999</a></dd>
                    <dd><a href="">6000-6999</a></dd>
                    <dd><a href="">7000-7999</a></dd>
                </dl>

                <dl>
                    <dt>尺寸：</dt>
                    <dd class="cur"><a href="">不限</a></dd>
                    <dd><a href="">10.1英寸及以下</a></dd>
                    <dd><a href="">11英寸</a></dd>
                    <dd><a href="">12英寸</a></dd>
                    <dd><a href="">13英寸</a></dd>
                    <dd><a href="">14英寸</a></dd>
                    <dd><a href="">15英寸</a></dd>
                </dl>

                <dl class="last">
                    <dt>处理器：</dt>
                    <dd class="cur"><a href="">不限</a></dd>
                    <dd><a href="">intel i3</a></dd>
                    <dd><a href="">intel i5</a></dd>
                    <dd><a href="">intel i7</a></dd>
                    <dd><a href="">AMD A6</a></dd>
                    <dd><a href="">AMD A8</a></dd>
                    <dd><a href="">AMD A10</a></dd>
                    <dd><a href="">其它intel平台</a></dd>
                </dl>
            </div>
        </div>
        <!-- 商品筛选 end -->

        <div style="clear:both;"></div>

        <!-- 排序 start -->
        <!--
        <div class="sort mt10">
            <dl>
                <dt>排序：</dt>
                <dd class="cur"><a href="">销量</a></dd>
                <dd><a href="">价格</a></dd>
                <dd><a href="">评论数</a></dd>
                <dd><a href="">上架时间</a></dd>
            </dl>
        </div>
        <!-- 排序 end -->

        <div style="clear:both;"></div>

        <!-- 商品列表 start-->
        <div class="goodslist mt10">
            <ul>
                <?php foreach ($goods as $good): ?>
                <li>
                    <dl>
                        <dt><a href="<?= 'index.php?r=goods/detail&id='.$good['id']; ?>"><img src="<?= Yii::$app->params['upload_url'].'/'.$good['small_img']; ?>" alt="" /></a></dt>
                        <dd><a href=""><?= $good['goods_name']; ?></a></dt>
                        <dd><strong>￥<?= $good['shop_price']; ?></strong></dt>
                        <dd><a href="#"><em>市场价 : </em></a><?= $good['mark_price']; ?></dt>
                    </dl>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- 商品列表 end-->

        <!-- 分页信息 start -->
        <!--
        <div class="page mt20">
            <a href="">首页</a>
            <a href="">上一页</a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="" class="cur">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">下一页</a>
            <a href="">尾页</a>&nbsp;&nbsp;
				<span>
					<em>共8页&nbsp;&nbsp;到第 <input type="text" class="page_num" value="3"/> 页</em>
					<a href="" class="skipsearch" href="javascript:;">确定</a>
				</span>
        </div>

        <!-- 分页信息 end -->

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