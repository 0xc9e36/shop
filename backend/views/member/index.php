<?php

use \yii\helpers\Html;
$view=Yii::$app->getView();
$view->params['title']='管理员';
$view->params['menu']= array(
    'link'     =>   '注册会员',
    'url'      =>   '#',
);
?>
<div class="main-div">
    <table width="100%" cellspacing="0">
        <thead>
        <tr>
            <th align="center">用户名</th>
            <th align="center">用户邮箱</th>
            <th align="center">创建时间</th>
            <th align="center">操 作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $v): ?>
            <tr>
                <td align="center"><?=  Html::encode($v['username']); ?></td>
                <td align="center"><?=  Html::encode($v['email']) ?></td>
                <td align="center"><?=  Html::encode($v['created_at'])?></td>
                <td  align="center">
                    <a href="#">查看</a>
                    <a href="index.php?r=member/delete&id=<?=$v['id']?>" onclick="return confirm('确定要删除该会员吗?')">删除</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>