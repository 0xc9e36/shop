<?php
use yii;
use yii\helpers\Html;

$view=Yii::$app->getView();
$view->params['title']='管理员列表';
$view->params['menu']= array(
    'link'     =>   '类型列表',
    'url'      =>   'index.php?r=admin/index',
);
?>
    <div class="main-div">
        <?=Html::beginForm() ?>
        <table width="100%" class="lr10">
            <thead>
            <tr>
                <th  align="center">选择</th>
                <th  align="center">角色、部门、权限组名称</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($roles as $role): ?>
            <tr>
                <td  align="center">
                    <?= Html::checkbox('roles[]',in_array($role->name,$roleNames),['value'=>$role->name,'id'=>$role->name]) ?>
                </td>
                <td  align="center">
                    <?= Html::label($role->name) ?>
                </td>
            <tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" align="center">
                    <input type="hidden" value="<?php echo $uid; ?>" name="uid">
                    <input type="submit" value="确定">
                    <input type="button" onclick="javascript:history.back(-1);" value="返回">
                </td>
            <tr>
            </tfoot>
        </table>
        <?= Html::endForm() ?>
    </div>
