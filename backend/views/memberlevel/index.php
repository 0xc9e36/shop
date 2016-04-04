<?php          
use yii;
use yii\helpers\Html;
$view=Yii::$app->getView();
$view->params['title']='会员等级';
$view->params['menu']= array(
    'link'     =>   '添加会员',
    'url'      =>   'index.php?r=memberlevel/add',
);
?>
<div class="list-div" id="listDiv">
    <table cellpadding="3" cellspacing="1">
        <tr>
            <th>会员等级名称</th>
            <th>积分下限</th>
            <th>积分上限</th>
            <th>初始折扣率</th>
            <th>操作</th>
        </tr>
        <?php foreach($data as $k => $v) { ?>
         <tr>
             <td class="first-cell" align='center'>
                <span style="align:center"><?php echo Html::encode($v['level_name']); ?></span>
                <span></span>
            </td>
            <td align="center">
                <a href="" target="_brank"><?php echo $v['mark_min']; ?></a>
            </td>
             <td align="center"><?php echo $v['mark_max']; ?></td>
            <td align="center"><span><?php echo $v['rate']; ?></span></td>
            <td align="center">
                <a href="/index.php?r=memberlevel/update&id=<?php echo $v['id']; ?>" title="编辑">编辑</a> |
            <a href="/index.php?r=memberlevel/delete&id=<?php echo $v['id']; ?>" title="编辑">移除</a> 
            </td>
        </tr>
        <?php } ?>
    </table>
</div>