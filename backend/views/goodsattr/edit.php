<?php
//echo "<pre>";
//print_r($attrprice);
//echo "</pre>";
//echo "<hr />";
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//die;
foreach ($data as $k => $v) {
    //唯一类型
     if ($v['attr_type'] == 0) {
          //取出唯一值属性
          $value = NULL;   //初始化
          foreach ($attrprice as $k1 => $v1) {
               if ($v1['attr_id'] == $v['id']) {
                    $value = $v1['attr_value'];
                    break;
               }
          }
          echo "<tr>";
          echo "<td class=\"label\">{$v['attr_name']}：</td>";
          //input框
          if ($v['attr_value'] === '') {
               echo "<td><input type='text' value=\"$value\"  name=\"radio_attr_value[{$v['id']}][]\"></td></tr>";
          } else {
               $attr_arr = explode(',', $v['attr_value']);
               //唯一下拉列表
               echo "<td><select name=\"radio_attr_value[{$v['id']}][]\">";
               foreach ($attr_arr as $k1 => $v1) {
                    //默认选中
                    if ($v1 == $value)
                         echo "<option value=\"{$v1}\" selected=\"selected\">$v1</option>";
                    else
                         echo "<option value=\"{$v1}\">$v1</option>";
               }
               echo "</select></td></tr>";
          }
     } else {
          $has = array();
          foreach ($attrprice as $k2 => $v2) {
               if($v2['attr_id']!=$v['id']){
                    continue;
               }
               if(!in_array($v['id'], $has)){
                    $has[] = $v['id'];
                    $a = '[+]';
               }else{
                    $a = '[-]'; 
               }
               //单选属性
               echo "<tr><td class=\"label\"><a href='#'  onclick='addAttr(this)'>{$a}</a>{$v['attr_name']}：<input type='hidden' name='radio_attr_id'  value=\"{$v['id']}\"/></td>";
               echo "<td><select name=\"radio_attr_value[{$v['id']}][]\">";
               $attr_arr = explode(',', $v['attr_value']);
               foreach ($attr_arr as $k1 => $v1) {
                    if($v1==$v2['attr_value'])
                          echo "<option value=\"{$v1}\" selected=\"selected\">$v1</option>";
                     else
                         echo "<option value=\"{$v1}\">$v1</option>";
               }
               echo "</select> 属性价格<input type='text'  value=\"{$v2['attr_price']}\" name=\"radio_attr_price[{$v['id']}][]\" size=5 /></td></tr>";
          }
     }
}

