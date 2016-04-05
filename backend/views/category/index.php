<?php          
use yii;
use yii\helpers\Html;
$view=Yii::$app->getView();
$view->params['title']='商品分类';
$view->params['menu']= array(
    'link'     =>   '添加分类',
    'url'      =>   'index.php?r=category/add',
);
?>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table width="100%" cellspacing="1" cellpadding="2" id="list-table">
            <tr>
                <th>分类名称</th>
                <th>数量单位</th>
                <th>是否显示</th>
                 <th>价格分级</th>
                <th>操作</th>
            </tr>
            <?php foreach($data as $k => $v){ ?>
            <tr align="center" class="0">
                <td align="left" class="first-cell" >
               <img src="Images/menu_minus.gif" width="9" height="9" border="0" style="margin-left:0em" />
               <span><a href="javascript:void(0)"><?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $v['deep']).Html::encode($v['cat_name']) ; ?></a></span>
                </td>
                 <td width="15%"><?php echo $v['unit']; ?></td>
                 <td width="15%">
                     <?php if($v['is_show']==1){ ?>
                     <img src="/Images/yes.gif" />
                     <?php }else{ ?>
                     <img src="/Images/no.gif" />
                     <?php } ?>
                 </td>
                 <td width="15%"><?php echo $v['price_area']; ?></td>
                <td width="20%" align="center">
                    <a href="/index.php?r=category/update&id=<?php echo $v['id']; ?>">编辑</a> |
                <a href="/index.php?r=category/delete&id=<?php echo $v['id']; ?>" title="移除" onclick="return confirm('该分类下的商品也将被删除,确定要删除吗?')">移除</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</form>