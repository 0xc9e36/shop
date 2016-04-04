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
class Attrprice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_attrprice';
    }


}
