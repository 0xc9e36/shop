<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./Styles/general.css" rel="stylesheet" type="text/css" />
<link href="./Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span>
    <span id="search_id" class="action-span1"></span>
    <div style="clear:both"></div>
</h1>
<br />
<!-- start goods statistics -->
<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title">实体商品统计信息</th>
        </tr>
        <tr>
            <td width="20%">商品总数:</td>
            <td width="30%"><strong><?=$goods['count'];?></strong></td>
            <td width="20%"><a href="#">促销商品数:</a></td>
            <td width="30%"><strong style="color:red"><?=$goods['is_discount'];?></strong></td>
        </tr>
    </table>
</div>
<!-- end order statistics -->
<br />
<!-- start system information -->
<div class="list-div">
    <table cellspacing='1' cellpadding='3'>
        <tr>
            <th colspan="4" class="group-title">系统信息</th>
        </tr>
        <tr>
            <td width="20%">服务器操作系统:</td>
            <td width="30%"><?=$info['system'];?></td>
            <td width="20%">Web 服务器:</td>
            <td width="30%"><?=$info['web'];?></td>
        </tr>
        <tr>
            <td>PHP 版本:</td>
            <td><?=$info['php_version'];?></td>
            <td>最大上传文件限制:</td>
            <td><?=$info['max_upload'];?></td>
        </tr>
        <tr>
            <td>MYSQL 版本:</td>
            <td><?=$info['mysql_version'];?></td>
        </tr>
    </table>
</div>
<div id="footer">
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>