<?php
\backend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ECSHOP 管理中心 - 商品列表 </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->head() ?>
        <link href="./Styles/general.css" rel="stylesheet" type="text/css" />
        <link href="./Styles/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <?php $this->beginBody() ?>
        <h1>
            <span class="action-span"><a href="index.php?r=goods/add">添加新商品</a></span>
            <span class="action-span1"><a href="index.php?r=index/index">ECSHOP 管理中心</a></span>
            <span id="search_id" class="action-span1"> - 商品列表 </span>
            <div style="clear:both"></div>
        </h1>
        <!-- 商品列表 -->
        <form method="post" action="" name="listForm" onsubmit="">
            <div class="list-div" id="listDiv">
                <table cellpadding="3" cellspacing="1">
                    <tr>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>货号</th>
                        <th>价格</th>
                        <th>上架</th>
                        <th>库存</th>
                        <th>操作</th>
                    </tr>
                    <?php  foreach($model as $key=>$val) : ?>
                        <tr>
                            <td align="center"><?php echo $val['id']; ?></td>
                            <td align="center" class="first-cell"><span><?php echo $val['goods_name']; ?></span></td>
                            <td align="center"><span onclick=""><?php echo $val['goods_sn']; ?></span></td>
                            <td align="center"><span><?php echo $val['shop_price']; ?></span></td>
                            <td align="center"><?php echo $val['is_sale']; ?></td>
                            <td align="center"><span><?php echo $val['count']; ?></span></td>
                            <td align="center">
                                <a href="index.php?r=goods/update&id=<?php echo $val['id']; ?>"  title="查看">编辑</a>
                                <a href="index.php?r=product/index&id=<?php echo $val['id']; ?>" onclick="" title="回收站">货品列表</a>
                                <a href="index.php?r=goods/trash&id=<?php echo $val['id']; ?>" onclick="" title="回收站">移入回收站</a></td>
                        </tr>
                    <?php    endforeach;?>


                </table>
                <!-- 分页开始 -->
                <table id="page-table" cellspacing="0">
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                    ]); ?>
                </table>
                <style>
                    .pagination{
                        margin-left: 400px;
                    }
                </style>
                <!-- 分页结束 -->
            </div>
        </form>

        <div id="footer">
            共执行 7 个查询，用时 0.028849 秒，Gzip 已禁用，内存占用 3.219 MB<br />
            版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>