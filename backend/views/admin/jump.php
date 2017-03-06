<?php
use yii\helpers\Html;
?>
<div class="site-error">
    <div class="alert alert-danger page-none-alert">
        <p>
                <span class="glyphicon glyphicon-remove-sign text-danger"></span>
                <?php echo '<h5>'.$msg.'</h5>';?>
        </p>
        <p class="text-muted" >该页将在<?php echo $time; ?>秒后自动跳转!</p>
        <p>
            <?php if(isset($gotoUrl)):?>
                <a href="<?php echo $gotoUrl?>">立即跳转</a>
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