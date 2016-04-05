<!doctype html>
<html lang="en">
    <title>ECSHOP 管理中心 - 添加品牌 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="./Styles/main.css" rel="stylesheet" type="text/css" />
    <script src="./Js/jquery.min.js"></script>
</head>
<body>
    
    <iframe style="display:none;" width="600" height="500" name="iframe"></iframe>
    <h1>
        <span class="action-span"><a href="/index.php?r=brand/add">添加商品</a></span>
        <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
        <span id="search_id" class="action-span1"> - 商品品牌 </span>
        <div style="clear:both"></div>
    </h1>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>品牌名称</th>
                <th>品牌网址</th>
                <th>品牌描述</th>
                <th>排序</th>
                <th>是否显示</th>
                <th>操作</th>
            </tr>
            <?php foreach ($data as $k => $v){ ?>
             <tr>
                 <td class="first-cell" align='center'>
                    <span style="align:center"><?php echo yii\helpers\Html::encode($v['brand_name']);?></span>
                    <span></span>
                </td>
                <td align="center">
                    <a href="<?php echo $v['brand_link'];?>" target="_brank"><?php echo  $v['brand_link'];?></a>
                </td>
                 <td align="center"><?php echo  yii\helpers\Html::encode($v['brand_explain']); ?></td>
                <td align="center"><span><?php echo $v['brand_sort'];?></span></td>
                <td align="center"><?php echo $v['is_show'];?></td>
                <td align="center">
                    <a href="/index.php?r=brand/update&id=<?php echo $v['id'];?>" title="编辑">编辑</a> |
                <a href="index.php?r=brand/delete&id=<?php echo $v['id'];?>" title="编辑">移除</a> 
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</form>
