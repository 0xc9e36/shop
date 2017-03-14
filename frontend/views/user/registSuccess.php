<div style="margin-top: 150px; margin-bottom: 150px; font-family: 微软雅黑; font-size: 14px">
    <?php if($flag === 'wait'): ?>
    <center>恭喜 !~  <font color="red">注册成功</font>, 已发送邮件,  登录邮箱激活即可登录!</center>
    <?php elseif($flag === 'success'): ?>
    <center>恭喜 !~  <font color="red">激活成功</font>, 现在可以直接进行<a href="index.php?r=user/login" style="color: blue">登录</a>!</center>
    <?php elseif ($flag === 'repeat'): ?>
        <center>已经<font color="red">激活</font>过了~, 不必重复 !~ 可以直接进行<a href="index.php?r=user/login" style="color: blue">登录</a>!</center> </center>
    <?php endif; ?>
</div>