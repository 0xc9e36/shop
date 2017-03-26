<?php
use \yii\helpers\Html;
?>
		<div class="content fl ml10">
			<div class="user_hd">
				<h3>账户信息</h3>
			</div>
			<div class="user_bd mt10">
				<form action="" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<strong><?= Html::encode($model->username) ?></strong>
						</li>
						<li>
							<label for="">邮箱：</label>
							<strong><?= Html::encode($model->email) ?></strong>
						</li>
                        <li>
                            <label for="">创建时间：</label>
                            <strong><?= Html::encode($model->created_at) ?></strong>
                        </li>
                        <li>
                            <label for="">积分：</label>
                            <strong><?= Html::encode($model->rank) ?></strong>
                        </li>
                        <li>
                            <label for="">会员等级：</label>
                            <strong><?= Html::encode(Yii::$app->session['level_name']) ?></strong>
                        </li>
					</ul>
				</form>
			</div>
		</div>
