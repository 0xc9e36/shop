<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_goodsattr".
 *
 * @property integer $id
 * @property integer $goodstype_id
 * @property string $attr_name
 * @property integer $attr_type
 * @property string $attr_value
 */
class Goodsattr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_goodsattr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goodstype_id', 'attr_type'], 'integer'],
            [['attr_name',], 'required'],
            [['attr_name', 'attr_value'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goodstype_id' => '属性id',
            'attr_name' => '属性名',
            'attr_type' => '属性类型',
            'attr_value' => '属性值',
        ];
    }
}
