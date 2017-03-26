<?php
    use common\help\MyHelper;
    use yii\helpers\Url;
?>
	<link rel="stylesheet" href="style/home.css" type="text/css">
	<link rel="stylesheet" href="style/order.css" type="text/css">

	<script type="text/javascript" src="js/home.js"></script>

		<!-- 右侧内容区域 start -->
		<div class="content fl ml10">
            <div class="order_hd">
                <h3>我的订单</h3>
            </div>
			<div class="order_bd mt10">
				<table class="orders">
					<thead>
						<tr>
							<th width="10%">订单号</th>
							<th width="20%">订单商品</th>
							<th width="10%">收货人</th>
							<th width="20%">订单金额</th>
							<th width="20%">下单时间</th>
							<th width="10%">订单状态</th>
						</tr>
					</thead>
					<tbody>
                    <?php foreach ($orders as $k => $v):  ?>
						<tr>
							<td><a href=""><?= $v['order_sn'] ?></a></td>
							<td><a href="<?= Url::toRoute(['goods/detail', 'id' => $v['goods_id']]) ?>"><img src="<?= Yii::$app->params['admin'].MyHelper::DS().$v['small_img'] ?>" alt="" /></a></td>
							<td><?= $v['user_name'] ?></td>
							<td>￥<?= $v['total_price'] ?></td>
							<td><?= $v['addTime'] ?></td>
							<td>
                                <?php
                                    if($v['order_status'] == 1) echo '完成';
                                    else    echo '交易中';
                                ?>
                            </td>
						</tr>
                    <?php endforeach; ?>
					</tbody> 
				</table>
			</div>
		</div>
		<!-- 右侧内容区域 end -->
