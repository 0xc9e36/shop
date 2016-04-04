<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_discount".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property integer $count
 * @property string $price
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id'], 'required'],
            [['goods_id', 'count'], 'integer'],
            [['price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'count' => 'Count',
            'price' => 'Price',
        ];
    }
}
