<?php
use yii\helpers\Html;
?>
<html>
<head>
    <title>京西商城</title>
    <style type="text/css">
        body{ margin:0px; padding:0px; background:#fff;}
        .main{ width:998px; height:525px; border:1px solid #d9d9d9; margin:10px auto; background:url(<?= Yii::$app->params['front']."/images/bkpic.jpg" ?>) no-repeat 156px 126px;}
        .main .mat{ width:552px; margin:146px 0px 0px 235px; }
        .main .mat p{ font:bold 16px/24px simsun; text-align:center; margin-bottom:80px;}
        .main .mat p span{ color:#ba2835; padding-right:10px;}
        .main .mat .tit{ font:normal 12px simsun; color:#515151; padding-left:20px; height:28px; background:url(<?= Yii::$app->params['front']."/images/bklin.gif" ?>) repeat-x left bottom;}
        .main .mat ul{ margin:5px 20px; padding:0px;}
        .main .mat ul li{ background:url(<?= Yii::$app->params['front']."/images/picli.gif" ?>) no-repeat left center; height:20px; list-style:none; font:normal 14px/20px simsun; padding-left:12px;}
        a:link{color:#004276; text-decoration:none;}
        a:visited{color:#004276; text-decoration:none;}
        a:hover{text-decoration:underline;color:#ba2636}
    </style>
</head>
<body>
    <?php if($type === 'success'): ?>
    <div class="main">
        <div class="mat">
            <p><?= $msg; ?>  ~!<br><span id="xm"><?= $time; ?></span>秒后自动跳转</p>
            <div class="tit">您还可以：</div>
            <ul>
                <li><a href="<?= $gotoUrl; ?>">立即跳转</a></li>
            </ul>
        </div>
    </div>
    <?php elseif ($type === 'error'): ?>
    <div class="main">
        <div class="mat">
            <p><?= $msg ; ?><br><span id="xm"><?= $time; ?></span>秒后返回商城首页</p>
            <div class="tit">您还可以：</div>
            <ul>
                <li><a href="<?= Yii::$app->params['front']; ?>">进入首页</a></li>
                <li><a href="javascript:void(0)" onclick="history.go(-1)">返回</a></li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

<input type="hidden" id="time" value="<?= $time; ?>">
<input type="hidden" id="url" value="<?= $gotoUrl != null ? $gotoUrl : Yii::$app->params['front']; ?>">
</body>
</html>

<script type="text/javascript">
    var i = eval(document.getElementById('time')).value;
    var url = eval(document.getElementById('url')).value;
    var intervalid;
    var xm = document.getElementById("xm");
    intervalid = setInterval("fun()", 1000);
    function fun() {
        if (i == 0){
            window.location.href = url;
            clearInterval(intervalid);
        }
        xm.innerHTML = i;
        i--;
    }
</script>