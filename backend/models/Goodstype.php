<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_goodstype".
 *
 * @property integer $id
 * @property string $goodstype_name
 */
class Goodstype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_goodstype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goodstype_name'], 'required'],
             [['goodstype_name'], 'unique'],
            [['goodstype_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goodstype_name' => '商品类型名称',
        ];
    }
}
