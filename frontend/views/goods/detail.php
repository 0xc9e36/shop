<html>
<head>
<link rel="stylesheet" href="style/goods.css" type="text/css">
<link rel="stylesheet" href="style/common.css" type="text/css">
<!--引入jqzoom css -->
<link rel="stylesheet" href="style/jqzoom.css" type="text/css">
<script type="text/javascript" src="js/goods.js"></script>
<script type="text/javascript" src="js/jqzoom-core.js"></script>
<!--引入配置文件-->
<script type="text/javascript" src="js/config.js"></script>
	<script type="text/javascript" src="js/getPriceAndNum.js"></script>
<!-- jqzoom 效果 -->
<script type="text/javascript">
	$(function(){
		$('.jqzoom').jqzoom({
			zoomType: 'standard',
			lens:true,
			preloadImages: false,
			alwaysOn:false,
			title:false,
			zoomWidth:400,
			zoomHeight:400
		});
	})
</script>
</head>
<body>
<input type="hidden" id="goods_id" value="<?= $goods->id; ?>">
<!-- 商品页面主体 start -->
<div class="main w1210 mt10 bc">
	<!-- 主体页面左侧内容 start -->
	<div class="goods_left fl">
		<!-- 相关分类 start -->
		<div class="related_cat leftbar mt10">
			<h2><strong>相关分类</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<?php foreach ($likely as $k => $v){
						echo "<li><a href='index.php?r=goods/cat&id={$v['id']}'>{$v['cat_name']}</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
		<!-- 相关分类 end -->

		<!-- 相关品牌 start -->
		<div class="related_cat	leftbar mt10">
			<h2><strong>商品品牌</strong></h2>
			<div class="leftbar_wrap">
				<ul>
				<?php
					if($brand){
						echo $brand['brand_name'];
					}else{
						echo "暂未添加";
					}
				?>
				</ul>
			</div>
		</div>
		<!-- 相关品牌 end -->

		<!-- 热销商品  start 注：因为和list页面newgoods样式相同，故加入了该class -->
		<div class="related_view newgoods leftbar mt10">
			<h2><strong>热销商品</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li>
						<dl>
							<dt><a href=""><img src="images/relate_view1.jpg" alt="" /></a></dt>
							<dd><a href="">ThinkPad E431(62771A7) 14英寸笔记本电脑 (i5-3230 4G 1TB 2G独显 蓝牙 win8)</a></dd>
							<dd><strong>￥5199.00</strong></dd>
						</dl>
					</li>


					<li>
						<dl>
							<dt><a href=""><img src="images/relate_view4.jpg" alt="" /></a></dt>
							<dd><a href="">联想（Lenovo） Y510p 15.6英寸笔记本电脑（i5-4200M 4G 1T 2G独显 摄像头 DVD刻录 Win8）黑色</a></dd>
							<dd><strong>￥6199.00</strong></dd>
						</dl>
					</li>

					<li class="last">
						<dl>
							<dt><a href=""><img src="images/relate_view5.jpg" alt="" /></a></dt>
							<dd><a href="">ThinkPad E530c(33662D0) 15.6英寸笔记本电脑 （i5-3210M 4G 500G NV610M 1G独显 摄像头 Win8）</a></dd>
							<dd><strong>￥4399.00</strong></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		<!-- 热销  end -->

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
	<!-- 主体页面左侧内容 end -->

	<!-- 商品信息内容 start -->
	<div class="goods_content fl mt10 ml10">
		<!-- 商品概要信息 start -->
		<div class="summary">
			<h3><strong><?= $goods->goods_name; ?></strong></h3>
			<!-- 图片预览区域 start -->
			<div class="preview fl">
				<?php
				if(!$first){
					//无商品相册,  取商品logo显示
					$first['small_img'] = $goods->small_img;
					$first['medium_img'] = $goods->medium_img;
					$first['big_img'] = $goods->big_img;
				}
				$small = Yii::$app->params['upload_url'].'/'.$first['small_img'];
				$middle = Yii::$app->params['upload_url'].'/'.$first['medium_img'];
				$big = Yii::$app->params['upload_url'].'/'.$first['big_img'];
				?>
				<div class="midpic">
					<a href="<?= $big; ?>" class="jqzoom" rel="gal1">   <!-- 第一幅图片的大图 class 和 rel属性不能更改 -->
						<img src="<?= $middle; ?>" alt="" />               <!-- 第一幅图片的中图 -->
					</a>
				</div>
				<!--使用说明：此处的预览图效果有三种类型的图片，大图，中图，和小图，取得图片之后，分配到模板的时候，把第一幅图片分配到 上面的midpic 中，其中大图分配到 a 标签的href属性，中图分配到 img 的src上。 下面的smallpic 则表示小图区域，格式固定，在 a 标签的 rel属性中，分别指定了中图（smallimage）和大图（largeimage），img标签则显示小图，按此格式循环生成即可，但在第一个li上，要加上cur类，同时在第一个li 的a标签中，添加类 zoomThumbActive  -->
				<div class="smallpic">
					<a href="javascript:(0);" id="backward" class="off"></a>
					<a href="javascript:(0);" id="forward" class="on"></a>
					<div class="smallpic_wrap">
						<ul>
							<?php
							foreach ($images as $k => $v){
								$cur = "";
								$class = "";
								if($k == 0){
									$cur = "class = 'cur'";
									$class = "class = 'zoomThumbActive'";
								}
								$small = Yii::$app->params['upload_url'].'/'.$v['small_img'];
								$middle = Yii::$app->params['upload_url'].'/'.$v['medium_img'];
								$big= Yii::$app->params['upload_url'].'/'.$v['big_img'];
								?>

								<li <?= $cur ?>>
									<a <?= $class ?>  href="javascript:(0);" rel="{gallery: 'gal1', smallimage: '<?= $middle; ?>',largeimage: '<?= $big; ?>'}">
										<img src="<?= $small ?>"></a>
								</li>

							<?php  } ?>


						</ul>
					</div>
				</div>
			</div>

			<!-- 图片预览区域 end -->
			<!-- 商品基本信息区域 start -->
			<div class="goodsinfo fl ml10">
				<ul>
					<li><span>商品编号： </span><?= $goods->goods_sn; ?></li>
					<li class="market_price"><span>市场价：</span><em>￥<?= $goods->mark_price; ?></em></li>
					<li class="shop_price"><span>本店价：</span> ￥<strong id="shop_price"></strong> </li>
					<li class="shop_price"><span>库存量：</span> <strong id="num"></strong> </li>
					<li><span>是否包邮： </span><?= $goods->post_free == 1 ? '包邮' : '不包邮'; ?></li>
					<li><span>积分： </span><?= $goods->level_mark == -1 ? $goods->mark_price : $goods->level_mark; ?></li>
				</ul>
				<form action="" method="post" class="choose">
					<input type="hidden" class="attr" name="attr" value="">
                    <ul>
						<?php
							foreach ($allAttr as $k => $v){
								//唯一属性
								if($v['attr_type'] == 0){
									echo <<< eod
<li><span>{$v['attr_name']}： </span>{$attrs[$v['id']][0]['attr_value']}</li>
eod;
								}else{
									echo <<< eod
						<li class="product">
							<dl>
								<dt>{$v['attr_name']}：</dt>

								<dd>
eod;
?>
									<?php
									//排序输出--
									//sort($attrs[$v['attr_id']]);
									foreach ($attrs[$v['id']] as $k1 => $v1) {
										if ($k1 == 0)
											echo "<a href='javascript:void(0);' class='selected'>{$v1['attr_value']}<input class='goodsatt' name='_{$v['id']}' type='radio' checked='checked'  value='{$v1['id']}' /></a>";
										else
											echo "<a href='javascript:void(0);' >{$v1['attr_value']}<input class='goodsatt' name='_{$v['id']}' type='radio'  value='{$v1['id']}' /></a>";
									}
									?>
								</dd>

							</dl>
						</li>
						<?php
								}
							}
						?>

						<li>
							<dl>
								<dt>购买数量：</dt>
								<dd>
									<a href="javascript:void(0);" id="reduce_num"></a>
									<input type="text" name="goodsnum" value="1" class="amount"/>
									<a href="javascript:void(0);" id="add_num"></a>
								</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>&nbsp;</dt>
								<dd>
									<input type="button" value="" class="add_btn" />
								</dd>
							</dl>
						</li>

					</ul>
				</form>
			</div>
			<!-- 商品基本信息区域 end -->
		</div>
		<!-- 商品概要信息 end -->

		<div style="clear:both;"></div>

		<!-- 商品详情 start -->
		<div class="detail">
			<div class="detail_hd">
				<ul>
					<li class="on"><span>商品详细说明</span></li>
				</ul>
			</div>
			<div class="detail_bd"><?= $goods->des; ?></div>
		</div>
		<!-- 商品详情 end -->


	</div>
	<!-- 商品信息内容 end -->


</div>
<!-- 商品页面主体 end -->
</body>
</html>
<script type="text/javascript">
	document.execCommand("BackgroundImageCache", false, true);
</script>
