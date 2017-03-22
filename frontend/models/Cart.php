<?php

namespace frontend\models;

use Yii;



class Cart extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'shop_cart';
    }

    public function getCarts(){
        //已经登录
        if(!Yii::$app->user->isGuest){
            //取出购物车
            $user_id = Yii::$app->user->identity->id;
            $carts = (new \yii\db\Query())
                ->select(['*'])
                ->from('shop_cart')
                ->where(['user_id' => $user_id])
                ->all();
        }else{  //未登录  从cookie中获取
            $carts = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
        }
        //购物车列表数组
        $list = [];
        //循环购物车取出商品
        foreach ($carts as $k => $cart) {
            //已经登录, 从数据库获取
            if(!Yii::$app->user->isGuest){
                $goodsid = $cart['goods_id'];
                $attrstr = trim($cart['attr']);
                $goodsnum = $cart['num'];
            }else{
                //从cookie中获取
                $key = explode('-', $k);
                $goodsid = $key[0];
                $attrstr = trim($key[1]);
                $goodsnum =$cart;
            }
            $goods = (new \yii\db\Query())
                ->select(['*'])
                ->from('shop_goods')
                ->where(['id' => $goodsid])
                ->one();
            $attrVal = '';
            //取出属性名称和值
            if ($attrstr) {
                $attr = $this->getAttrInfo($attrstr);
                foreach ($attr as $v) {
                    $attrVal .= $v['attr_name'] . ' : ' . $v['attr_value'] . '<br />';
                }
            }
            //计算商品价格
            $price = Yii::$app->runAction('goods/getprice', ['id' => $goodsid, 'attr' => $attrstr]);
            //计算商品库存
            $count = Yii::$app->runAction('goods/getnum', ['id' => $goodsid, 'attr' => $attrstr]);
            //库存不足
            if($count < $goodsnum)  $countInfo = '缺货';
            else $countInfo = '有货';
            $list[] = [
                'goodsid' => $goodsid,
                'logo'  =>  $goods['small_img'],
                'goods_name'   => $goods['goods_name'],
                'count' => $count,  //库存
                'goodsnum'  => $goodsnum,
                'countInfo' => $countInfo,
                'price' => $price,
                'attr'  => $attrVal,
                'attrstr' => $attrstr,
            ];
        }
        return $list;
    }

    /*根据属性id集合获取属性名字和属性值*/
    public function getAttrInfo($attr){
        $sql = "SELECT b.attr_name, a.attr_value
                FROM shop_attrprice a 
                LEFT JOIN shop_goodsattr b
                ON a.attr_id = b.id
                WHERE a.id IN($attr)";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    //清空购物车
    public function clear(){
        //已登录
        if(!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->identity->id;
            Yii::$app->db->createCommand('DELETE FROM shop_cart WHERE user_id=:user_id')
                ->bindValue(':user_id', $user_id)
                ->execute();
        }else{
            //未登录直接清cookie
            setcookie('cart', '');
        }
    }
    
}
