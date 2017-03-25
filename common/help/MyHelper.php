<?php
namespace common\help;
class MyHelper
{
    private static $_lockFP = [];
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
    /*获取锁*/
    static function lock($file_name){
        self::$_lockFP[$file_name] = $fp = fopen(dirname(dirname(__FILE__)).'/lock/'.$file_name, 'r');
        if(!$fp) return false;
        $try = 10;
        $lock = false;
        do{
            $lock = flock($fp, LOCK_EX);
            if($lock) usleep(50000);   // 0.05s
        }while(!$lock && --$try > 0);
        return $lock;
    }

    static function unlock($lock_file){
        if(isset(self::$_lockFP[$lock_file]))
        {
            @flock(self::$_lockFP[$lock_file], LOCK_UN);
            @fclose(self::$_lockFP[$lock_file]);
        }
    }
}