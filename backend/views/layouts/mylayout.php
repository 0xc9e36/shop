<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - 会员等级 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Styles/main.css" rel="stylesheet" type="text/css" />
     <script src="Js/jquery.min.js"></script>
     <style>
         .help-block{
             color: red;
         }
     </style>
</head>
<body>
    <h1>
        <span class="action-span"><a href="/<?php echo $this->params['menu']['url']; ?>"><?php echo $this->params['menu']['link']; ?></a></span>
        <span class="action-span1"><a href="/index.php?r=index/index">ECSHOP 管理中心</a></span>
        <span id="search_id" class="action-span1"> -<?php echo $this->params['title']; ?></span>
        <div style="clear:both"></div>
    </h1>

    <?php echo $content; ?>

    <div id="footer">
        共执行 3 个查询，用时 0.021251 秒，Gzip 已禁用，内存占用 2.194 MB<br />
        版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
    </div>
</body>
</html>