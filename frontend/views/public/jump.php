<?php
use yii\helpers\Html;
?>
<html>
<head>
    <style>
        body{
            background: #dad9d7
        }
    </style>
</head>
<div class="site-error" xmlns="http://www.w3.org/1999/html" >
    <div class="alert alert-danger page-none-alert">
        <p>
            <span class="glyphicon glyphicon-remove-sign text-danger"><font color = red size="3px"><?php echo $msg ;?></font></span>
        </p>
        <p class="text-muted" ><font size="3px"> 该页将在<?php echo $time; ?>秒后自动跳转!</font></p>
            <?php if(isset($gotoUrl)):?>
                <a href="<?php echo $gotoUrl?>"><font size="3px">立即跳转</font></a>
            <?php else:?>
                <a href="javascript:void(0)" onclick="history.go(-1)">返回</a>
            <?php endif;?>
        </p>
    </div>
    <style>
        .page-none-alert{margin: 100px 0 !important;
            text-align: center !important;
            font-size: 20px !important;}
    </style>
</div>
<script>
    <?php if(!isset($gotoUrl)):?>
    setInterval("history.go(-1);",<?php echo $time;?>000);
    <?php else:?>
    setInterval("window.location.href='<?php echo  $gotoUrl;?>'",<?php echo $time;?>000);
    <?php endif;?>

</script>

<body>
</html>

