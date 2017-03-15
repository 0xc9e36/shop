<div class="topnav">
    <div class="topnav_bd w1210 bc">
        <div class="topnav_left">

        </div>
        <?php if(Yii::$app->user->isGuest):  ?>
        <div class="topnav_right fr">
            <ul>
                <li><a href="/index.php?r=user/index">您好</a>，欢迎来到京西！[<a href="/index.php?r=user/login">登录</a>] [<a href="/index.php?r=user/regist">免费注册</a>] </li>
                <li class="line">|</li>
                <li>我的订单</li>
                <li class="line">|</li>
                <li>客户服务</li>
            </ul>
        </div>
        <?php else : ?>
        <div class="topnav_right fr">
            <ul>
                <li>您好,&nbsp;[<a href="/index.php?r=user/index" style="color: red"><?= Yii::$app->user->identity->username; ?></a>]&nbsp;欢迎来到京西！[<a href="/index.php?r=user/logout">退出登录</a>]  </li>
                <li class="line">|</li>
                <li>我的订单</li>
                <li class="line">|</li>
                <li>客户服务</li>

            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>