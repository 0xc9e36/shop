<?php
use yii;
use yii\helpers\Html;
$view=Yii::$app->getView();
$view->params['title']='管理员操作';
$view->params['menu']= array(
    'link'     =>   '管理员列表',
    'url'      =>   'index.php?r=memberlevel/index',
);
?>

<div class="main-div">
    <?= Html::beginForm(['/role/rolenode','name'=>$name],'post')?>
    <table width="100%" class="lr10">
        <thead>
        <tr>
            <th align="center"><?= Html::checkbox('check',false,['id'=>'check_all'])?></th>
            <th align="center"><h3>权限名称</h3></th>
            <th align="center"><h3>标记</h3></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($nodes as $v): ?>
            <tr>
                <td align="center"><?= Html::checkbox('node[]',in_array($v->name,$roleNodes)?true:false,['value'=>$v->name,'class'=>'node_check'])?></td>
                <td align="center"><?= $v->name?></td>
                <td align="center"><?= $v->description?></td>
            </tr>
        <?php endforeach; ?>


        <tr>
            <td align="center" colspan="3">
                <input type="submit" value="提交">
            </td>
        </tr>
        </tbody>
    </table>
    <?= Html::endForm()?>
</div>
