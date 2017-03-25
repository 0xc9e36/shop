<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_goods".
 *
 * @property integer $id
 * @property string $goods_name
 * @property string $goods_sn
 * @property integer $goodscat_id
 * @property integer $goods_brand
 * @property string $shop_price
 * @property string $mark_price
 * @property integer $level_mark
 * @property integer $is_discount
 * @property string $sales_price
 * @property string $sales_start
 * @property string $sales_end
 * @property string $primary_img
 * @property string $big_img
 * @property string $medium_img
 * @property string $small_img
 * @property string $des
 * @property string $weight
 * @property integer $count
 * @property integer $warn_count
 * @property integer $is_sale
 * @property integer $post_free
 * @property integer $is_delete
 * @property integer $is_recycle
 */
class Goods extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_name','shop_price', 'des', 'mark_price', 'count', 'warn_count', 'is_sale'], 'required'],
            [['goodscat_id', 'goods_brand', 'goodstype_id', 'level_mark', 'is_discount', 'count', 'warn_count', 'is_sale', 'post_free', 'is_delete', 'is_recycle'], 'integer'],
            [['shop_price', 'mark_price', 'sales_price'], 'number'],
            [['sales_start', 'sales_end'], 'safe'],
            [['des', 'goods_sn'], 'string'],
            [['goods_name'], 'string', 'max' => 200],
            [['primary_img', 'big_img', 'medium_img', 'small_img'], 'string', 'max' => 50],
            [['weight'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_name' => '商品名称',
            'goods_sn' => '商品货号',
            'goodscat_id' => '商品分类',
            'goods_brand' => '商品品牌',
            'shop_price' => '本店售价',
            'mark_price' => '市场售价',
            'level_mark' => '会员价格',
            'is_discount' => '是否促销',
            'sales_price' => '促销价格',
            'sales_start' => '促销开始日期',
            'sales_end' => '促销结束日期',
            'primary_img' => '商品原图',
            'big_img' => '商品大图',
            'medium_img' => '商品中图',
            'small_img' => '商品缩略图',
            'des' => '商品描述',
            'weight' => '商品重量',
            'count' => '商品库存',
            'warn_count' => '商品库存警告价格',
            'is_sale' => '是否商家',
            'post_free' => '是否包邮',
            'is_delete' => '是否已删除',
            'is_recycle' => '是否加入回收站',
        ];
    }
}
