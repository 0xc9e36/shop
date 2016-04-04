<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;

class UploadForm extends Model {

     /**
      * @var UploadedFile
      */
     public $imageFile;

     public function rules() {
          return [
              [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg'],
          ];
     }

     /**
      * 返回图片路径
      * @return boolean|string
      */
     public function upload() {
          if ($this->validate()) {
               $upDir = 'uploads/' . date('Ymd') . '/';
               if (!is_dir($upDir)) {
                    mkdir($upDir, 0777);
               }
               //原图
               $praimaryName = time() . 'primary' . rand(0, 9999) . '.' . $this->imageFile->extension;
               $url['primary'] = $upDir . $praimaryName;
               $this->imageFile->saveAs($url['primary']);
               //缩略图
               $smallName = time() . 'small' . rand(0, 9999) . '.' . $this->imageFile->extension;
               $url['small'] = $upDir . $smallName;
               Image::thumbnail($url['primary'], 100, 100)->save($url['small'], ['quality' => 50]);
               //中等图
               $medianName = time() . 'median' . rand(0, 9999) . '.' . $this->imageFile->extension;
               $url['median'] = $upDir . $medianName;
               Image::thumbnail($url['primary'], 300, 300)->save($url['median'], ['quality' => 50]);
               //大图
               $bigName = time() . 'big' . rand(0, 9999) . '.' . $this->imageFile->extension;
               $url['big'] = $upDir . $bigName;
               Image::thumbnail($url['primary'], 600, 600)->save($url['big'], ['quality' => 50]);
               return $url;
          } else {
               return false;
          }
     }

}
