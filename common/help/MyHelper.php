<?php
namespace common\help;
class MyHelper
{
    //字符串截取函数, 解决乱码
    static function chinesesubstr($str, $start, $len)
    {
        $tmpstr = '';
        $strlen = $len - $start;
        for ($i = 0; $i < $strlen; $i++) {
            if (ord(substr($str, $i, 1)) > 0xa0) {
                $tmpstr .= substr($str, $i, 3);
                $i += 2;
            } else {
                $tmpstr .= substr($str, $i, 1);
            }

        }
        return $tmpstr;
    }

    static function DS(){
        return DIRECTORY_SEPARATOR;
    }
}