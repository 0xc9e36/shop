<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='商品类型';
$view->params['menu']= array(
    'link'     =>   '添加类型',
    'url'      =>   'index.php?r=goodstype/add',
);
?>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>商品类型名称</th>
                <th>属性数</th>
                <th>操作</th>
            </tr>
            <?php foreach($data as $k => $v) : ?>
             <tr>
                 <td class="first-cell" align='center'>
                     <span style="align:center"><?= \yii\helpers\Html::encode($v['goodstype_name']); ?></span>
                    <span></span>
                </td>
                <td align="center">
                    <a href="" target="_brank"><?= $v['num']; ?></a>
                </td>
                <td align="center">
                    <a href="/index.php?r=goodsattr/index&id=<?= $v['id']; ?>" title="编辑">属性列表</a> |
                    <a href="/index.php?r=goodstype/update&id=<?= $v['id']; ?>" title="编辑">编辑</a> |
                    <a href="index.php?r=goodstype/delete&id=<?= $v['id']; ?>" title="编辑"  onclick="return confirm('该商品类型下的属性也将被删除,确定删除?')">移除</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</form>
