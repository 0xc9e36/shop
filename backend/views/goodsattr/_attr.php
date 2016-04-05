
<?php

foreach ($data as $k => $v) {
     echo "<tr>";
//唯一类型
     if ($v['attr_type'] == 0) {
          echo "<td class=\"label\">{$v['attr_name']}：</td>";
          if ($v['attr_value'] === '') {
               echo "<td><input type='text' name=\"radio_attr_value[{$v['id']}][]\"></td>";
          } else {
               $attr_arr = explode(',', $v['attr_value']);
               echo "<td><select name=\"radio_attr_value[{$v['id']}][]\">";
               foreach ($attr_arr as $k1 => $v1) {
                    echo "<option value=\"{$v1}\">$v1</option>";
               }
               echo "</select></td>";
          }
     } else {
          //单选属性
          echo "<td class=\"label\"><a href='#'  onclick='addAttr(this)'>[+]</a>{$v['attr_name']}：<input type='hidden' name='radio_attr_id'  value=\"{$v['id']}\"/></td>";
          echo "<td><select name=\"radio_attr_value[{$v['id']}][]\">";
          $attr_arr = explode(',', $v['attr_value']);
          foreach ($attr_arr as $k1 => $v1) {
               echo "<option value=\"{$v1}\">$v1</option>";
          }
          echo "</select> 属性价格<input type='text'  name=\"radio_attr_price[{$v['id']}][]\" size=5 /></td>";
     }
     echo "</tr>";
}

