<?php
use \yii\helpers\Html;
use yii\helpers\Url;
?>
<!doctype html>
<htmllang="en">
<title>ECSHOP 管理中心 - 广告管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Styles/main.css" rel="stylesheet" type="text/css" />
<script src="/Js/jquery.min.js"></script>
</head>
<body>

<iframe style="display:none;" width="600" height="500" name="iframe"></iframe>
<h1>
    <span class="action-span"><a href="/index.php?r=adver/add">添加广告</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 广告管理 </span>
    <div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>广告类型</th>
                <th>广告标题</th>
                <th>链接地址</th>
                <th>操作</th>
            </tr>
            <?php foreach ($data as $k => $v): ?>
                <tr>
                    <td class="first-cell" align='center'>
                        <?php
                            if($v['type_id'] == 0) echo '文字广告';
                            else if($v['type_id'] == 1) echo '图片广告';
                            else echo '轮播图广告';
                        ?>
                    </td>
                    <td class="first-cell" align='center'><?= Html::encode($v['title']) ?></td>
                    <td class="first-cell" align='center'><?=  Html::encode($v['url']) ?></td>
                    <td align="center">
                        <a href="<?= Url::toRoute(['adver/update', 'id' => $v['id']])?>" title="编辑">编辑</a> |
                        <a href="<?= Url::toRoute(['adver/delete', 'id' => $v['id']])?>" title="编辑">移除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</form>
