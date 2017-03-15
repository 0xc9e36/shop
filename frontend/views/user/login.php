<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>登录商城</title>
	<link rel="stylesheet" href="style/base.css" type="text/css">
	<link rel="stylesheet" href="style/global.css" type="text/css">
	<link rel="stylesheet" href="style/header.css" type="text/css">
	<link rel="stylesheet" href="style/login.css" type="text/css">
	<link rel="stylesheet" href="style/footer.css" type="text/css">
	<style>
		.help-block{
			color: red;
			margin-left: 60px;
		}
	</style>
	<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10">
		<div class="login_hd">
			<h2>用户登录</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<?php
				use yii\widgets\ActiveForm;
				$form = ActiveForm::begin(['id' => 'form-signup']); ?>
					<ul>
						<li>
							<label for="">用户名：</label>
							<?= $form->field($model, 'username', ['inputOptions'    => ['class' => 'txt']])->textInput()->label('') ?>
						</li>
						<li>
							<label for="">密码：</label>
							<?= $form->field($model, 'password', ['inputOptions'    => ['class' => 'txt']])->passwordInput()->label('') ?>
							<a href=""><!--忘记密码?--></a>
						</li>
						<li class="checkcode">
							<?= $form->field($model, 'verifyCode')->label('')->widget(\yii\captcha\Captcha::className(), [
								'captchaAction'=>'/user/captcha',
								'template' => "<label for=''>验证码: </label><span style='margin-left: 8px; margin-right: 8px;'>{input}</span>{image}",
							]) ?>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" name="LoginForm[rememberMe]" class="chb"  value="1"/>&nbsp;保存登录信息30天
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				<?php ActiveForm::end(); ?>

				<div class="coagent mt15">
					<dl>
						<dt>使用合作网站登录商城：</dt>
						<dd class="qq"><a href=""><span></span>QQ</a></dd>
						<dd class="weibo"><a href=""><span></span>新浪微博</a></dd>
						<dd class="yi"><a href=""><span></span>网易</a></dd>
						<dd class="renren"><a href=""><span></span>人人</a></dd>
						<dd class="qihu"><a href=""><span></span>奇虎360</a></dd>
						<dd class=""><a href=""><span></span>百度</a></dd>
						<dd class="douban"><a href=""><span></span>豆瓣</a></dd>
					</dl>
				</div>
			</div>

			<div class="guide fl">
				<h3>还不是商城用户</h3>
				<p>现在免费注册成为商城用户，便能立刻享受便宜又放心的购物乐趣，心动不如行动，赶紧加入吧!</p>

				<a href="index.php?r=user/regist" class="reg_btn">免费注册 >></a>
			</div>

		</div>
	</div>
	<!-- 登录主体部分end -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>