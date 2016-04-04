<!-- $Id: goods_trash.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品回收站 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./Styles/general.css" rel="stylesheet" type="text/css" />
<link href="./Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span">
        <a href="index.php?r=goods/index">商品列表</a>
    </span>
    <span class="action-span1"><a href="index.php?r=index/index">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 商品回收站 </span>
    <div style="clear:both"></div>
</h1>

<!-- 商品列表 -->
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>货号</th>
                <th>价格</th>
                <th>操作</th>
            </tr>
           <?php foreach($data as $k => $v){ ?>
            <tr>
                <td><?php echo $v['id'] ;?></td>
                <td><?php echo $v['goods_name'] ;?></td>
                <td><?php echo $v['goods_sn'] ;?></td>
                <td align="right"><?php echo $v['shop_price'] ;?></td>
                <td align="center"><a href="index.php?r=goods/trashrenew&id=<?php echo $v['id'] ?>">还原</a> | <a href="index.php?r=goods/trashdelete&id=<?php echo $v['id'] ?>">删除</a></td>
            </tr>
           <?php } ?>
        </table>
    </div>
</form>
<div id="footer">
共执行 7 个查询，用时 0.160230 秒，Gzip 已禁用，内存占用 3.197 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>