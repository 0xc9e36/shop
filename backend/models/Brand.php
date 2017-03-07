<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_brand".
 *
 * @property integer $id
 * @property string $brand_name
 * @property string $brand_link
 * @property string $brand_logo
 * @property string $brand_explain
 * @property integer $brand_sort
 * @property integer $is_show
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name', 'brand_link', 'brand_logo'], 'required'],
            [['brand_name'] ,'unique' ],
            [['brand_link'] ,'url' ],
            [['brand_explain'], 'string'],
            [['brand_sort', 'is_show'], 'integer'],
            [[ 'brand_logo'], 'string', 'max' => 50],
            [['brand_name', 'brand_link', ], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => '品牌名称',
            'brand_link' => '品牌网址',
            'brand_logo' => '品牌LOGO',
            'brand_explain' => '品牌描述',
            'brand_sort' => '品牌排序',
            'is_show' => '是否显示',
        ];
    }
    
}
