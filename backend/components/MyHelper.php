<?php

namespace yii\helpers;

class MyHelper extends BaseArrayHelper
{
     public static function output($data){
          echo "<pre>";
          print_r($data);
          echo "</pre>";
     }
}
