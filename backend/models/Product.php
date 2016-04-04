<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_product".
 *
 * @property integer $id
 * @property string $product_sn
 * @property integer $goods_id
 * @property string $attr_value
 * @property integer $count
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_sn', 'goods_id'], 'required'],
            [['goods_id', 'count'], 'integer'],
            [['product_sn'], 'string', 'max' => 11],
            [['attr_value'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_sn' => 'Product Sn',
            'goods_id' => 'Goods ID',
            'attr_value' => 'Attr Value',
            'count' => 'Count',
        ];
    }
}
