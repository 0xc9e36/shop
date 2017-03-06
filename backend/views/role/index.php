<?php
use \yii\helpers\Html;

$view=Yii::$app->getView();
$view->params['title']='角色管理';
$view->params['menu']= array(
    'link'     =>   '添加角色',
    'url'      =>   'index.php?r=role/add',
);
?>
<div class="main-div">
    <table width="100%" cellspacing="0">
        <thead>
        <tr>
            <th align="center">角色名称</th>
            <th align="center">角色描述</th>
            <th align="center">操 作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($roles as $v): ?>
            <tr>
                <td align="center"><?= Html::encode($v->name)?></td>
                <td align="center"><?= Html::encode($v->description) ?></td>
                <td  align="center">
                    <a href="index.php?r=role/update&name=<?=Html::encode($v->name) ?>">修改</a>
                    &nbsp;
                    <a href="index.php?r=role/rolenode&name=<?=Html::encode($v->name) ?>">权限</a>
                    <a href="index.php?r=role/delete&name=<?=Html::encode($v->name) ?>" onclick="return confirm('确定要删除吗?')">删除</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>