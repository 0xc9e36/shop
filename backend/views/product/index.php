<?php

use yii;
use yii\helpers\Html;

$view = Yii::$app->getView();
$view->params['title'] = '货品列表';
$view->params['menu'] = array(
    'link' => '商品列表',
    'url' => 'index.php?r=goods/index',
);
?>
<div class="list-div" id="listDiv">

    <form action="index.php?r=product/add" method="post">
        <input type="hidden" name="goods_id" value="<?php echo $id; ?>">
        <table cellpadding="3" cellspacing="1" id="form">

            <tr>
                <?php
                $has = array();
                $attrList = array();
                foreach ($data as $k1 => $v1) {
                     $attrList[$v1['attr_id']][$v1['id']] = $v1['attr_value'];
                          if (!key_exists($v1['attr_id'], $has)) {
                               echo "<th>{$v1['attr_name']}</th>";
                               $has[$v1['attr_id']] = $v1;
                          }
                }
                ?>
                <th>货号</th>
                <th colspan="2">库存</th>
            </tr>
<?php foreach ($has as $k3 => $v3)
{
	echo '<input type="hidden" name="attrid[]" value="'.$v3['attr_id'].'" />';
}
?>
            <!------------------------------------------循环货品列表-------------------------------------------------------------------->
            <?php  $first = false;   foreach($product as $key => $value){  
                         if($first){
                              $a = '[-]';
                         }else{
                              $a = '[+]';
                              $first = true;
                         }
                 //取出货品属性值
                 $product_attr = explode(',', $value['attr_value']);  
                 
                 ?>
            
            <tr>
                <?php
                foreach ($has as $k => $v) {
                     echo "<td><select name=\"attr_value[$k][]\"]>";
                     foreach ($attrList[$v['attr_id']] as $k2=>$v2) {
                          if(in_array($k2, $product_attr))
                                echo "<option value={$k2} selected='selected'>{$v2}</option>";
                          else
                               echo "<option value={$k2}>{$v2}</option>";
                     }
                     echo "</select></td>";
                }
                ?>
                <td><input type="text" size="15" class='sn' name="sn[]" value="<?php echo $value['product_sn']; ?>"></th>
                <td><input type="text" size="5" class='num' name="num[]" value="<?php echo $value['count']; ?>"></th>
                <td><a href="#" class="add" ><?php echo $a; ?></a></th>
            </tr>
            
            <?php } ?>
          <!---------------------------------------------------------------------------------------------------------------------------------------------------->  
            
            <?php  if(!$product){ ?>
                        <tr>
                <?php
                foreach ($has as $k => $v) {
                     echo "<td><select name=\"attr_value[$k][]\"]>";
                     foreach ($attrList[$v['attr_id']] as $k2=>$v2) {
                               echo "<option value={$k2}>{$v2}</option>";
                     }
                     echo "</select></td>";
                }
                ?>
                <td><input type="text" size="15" class='sn' name="sn[]" ></th>
                <td><input type="text" size="5" class='num' name="num[]" ></th>
                <td><a href="#" class="add" >[+]</a></th>
            </tr>
            
            <?php } ?>
        </table>
        <div class="button-div">
            <input type="submit" value=" 确定 " />
            <input type="reset" value=" 重置 " />
        </div>
    </form>
</div>
<script>
     $('#form').on('click', '.add', function () {
         if ($(this).html() == '[+]') {
             line = $('#form tr:eq(1)').clone();
             line.find('a').html('[-]');
             line.find('.sn').val('');
             line.find('.num').val('');
             last = $('#form tr').last()
             line.insertAfter(last);
         } else {
             $(this).parent().parent().remove();
         }

     });
</script>