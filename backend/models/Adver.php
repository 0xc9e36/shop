<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_adver".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $url
 * @property string $small_img
 * @property string $big_img
 */
class Adver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_adver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'url'], 'required'],
            [['type_id'], 'integer'],
            [['title'], 'string', 'max' => 600],
            ['url', 'url'],
            [['url', 'small_img', 'big_img'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => '类型',
            'title' => '标题',
            'url' => '链接地址',
            'small_img' => 'Small Img',
            'big_img' => 'Big Img',
        ];
    }
}
