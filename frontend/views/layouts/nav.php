<?php use yii\helpers\Url; ?>
<div class="topnav">
    <div class="topnav_bd w1210 bc">
        <div class="topnav_left">
        </div>

        <div class="topnav_right fr">
            <ul>
                <?php if(Yii::$app->user->isGuest):  ?>
                <li>您好，欢迎来到京西！[<a href="<?= Url::toRoute(['user/login']) ?>">登录</a>] [<a href="<?= Url::toRoute(['user/regist']) ?>">免费注册</a>] </li>
                <?php else : ?>
                <li>您好,&nbsp;[<a href="/index.php?r=user/index" style="color: red"><?= Yii::$app->user->identity->username; ?></a>]&nbsp;欢迎来到京西！[<a href="/index.php?r=user/logout">退出登录</a>]  </li>
                <?php endif; ?>
                <li class="line">|</li>
                <li><a href="<?= Url::toRoute(['user/order'])?>">我的订单</a></li>
                <li class="line">|</li>
            </ul>
        </div>

    </div>
</div>