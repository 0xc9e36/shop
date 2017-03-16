<?php

namespace frontend\models;

use Yii;



class Goods extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'shop_goods';
    }

    //获取会员价格
    public function getMemberPrice($id){
        $rate = Yii::$app->session['rate'];
        if(!$rate) $rate = 1;
        $level_id = (int)Yii::$app->session['level_id'];
        //保留了两位小数
        $sql = 'SELECT truncate(IFNULL(b.member_price, a.shop_price *'.$rate.'), 2) price
                FROM shop_goods a
                LEFT JOIN shop_memberprice b
                ON a.id = b.goods_id AND b.member_level ='.$level_id.
                ' WHERE a.id ='. $id;
        return Yii::$app->db->createCommand($sql)->query()->read()['price'];
    }

    public function getGoodsNum($goodsid, $attr){
        if($attr){
            $attr = explode(',', $attr);
            sort($attr);
            $attr = implode(',', $attr);
        }
        $num = (new \yii\db\Query())
            ->select(['count'])
            ->from('shop_product')
            ->where(['goods_id' => $goodsid, 'attr_value' => $attr])
            ->one();
        //否则直接取库存量
        if(!$num){
            $num = (new \yii\db\Query())
                ->select(['count'])
                ->from('shop_goods')
                ->where(['goods_id' => $goodsid])
                ->one();
        }
        echo $num;
        die;
    }
}
