<?php          
use yii;
$view=Yii::$app->getView();
$view->params['title']='属性列表';
$view->params['menu']= array(
    'link'     =>   '添加属性',
    'url'      =>   "index.php?r=goodsattr/add&typeid=$typeid",
);
?>
        <form method="post" action="" name="listForm">
            <div class="list-div" id="listDiv">
                <table cellpadding="3" cellspacing="1">
                    <tr>
                        <th>属性ID</th>
                        <th>属性名称</th>
                        <th>商品类型</th>
                        <th>属性类型(  0:唯一属性 1: 单选属性)</th>
                        <th>属性可选值</th>
                        <th>操作</th>
                    </tr>
            <?php foreach ($data as $k => $v): ?>
                         <tr>
                             <td class="first-cell" align='center'>
                                 <span style="align:center"><?php echo $v['id']; ?></span>
                                 <span></span>
                             </td>
                             <td align="center">
                                 <a href="" target="_brank"><?php echo $v['attr_name']; ?></a>
                             </td>
                             <td align="center">
                                 <a href="" target="_brank"><?php echo $v['goodstype_name']; ?></a>
                             </td>       

                             <td align="center">
                                 <a href="" target="_brank"><?php echo $v['attr_type']; ?></a>
                             </td>    
                             
                              <td align="center">
                                 <a href="" target="_brank"><?php echo $v['attr_value']; ?></a>
                             </td>                               
                             <td align="center">
                                 <a href="index.php?r=goodsattr/update&&id=<?php echo $v['id']; ?>&typeid=<?php echo $typeid; ?>" title="编辑">编辑</a> |
                                 <a href="index.php?r=goodsattr/delete&&id=<?php echo $v['id']; ?>&typeid=<?php echo $typeid; ?>" onclick="return confirm('确定要删除改属性吗?')">移除</a> 
                             </td>
                         </tr>
            <?php endforeach; ?>
                </table>
            </div>
        </form>