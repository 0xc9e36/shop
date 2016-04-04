<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_memberprice".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property integer $member_level
 * @property string $member_price
 */
class Memberprice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_memberprice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'member_level'], 'required'],
            [['goods_id', 'member_level'], 'integer'],
            [['member_price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => '商品ID',
            'member_level' => '会员名称',
            'member_price' => '会员价格',
        ];
    }
}
