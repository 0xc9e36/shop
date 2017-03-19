<?php
namespace frontend\controllers;

use frontend\models\Cart;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class CartController extends PublicController
{
    public $layout = "cart_style.php";
     //关闭Csrf
     //public $enableCsrfValidation = false;
    
     
     public function actionAddcart($goodsid, $attr = "", $goodsnum = false)
     {
         $request = Yii::$app->request;
         $goodsnum = !$goodsnum ? intval($request->post('goodsnum')) : $goodsnum;
         //已经登录过
        if(!Yii::$app->user->isGuest){
            $query = new \yii\db\Query();
            $userid = Yii::$app->user->identity->id;

            if(!$attr) $attr = " ";
            $has = $query->select('id, num')->from('shop_cart')->where(['goods_id' => $goodsid, 'user_id' => $userid, 'attr' => $attr])->one();
            //存在则更新数量
            if($has){
                $has['num'] += $goodsnum;
                $sql = 'UPDATE `shop_cart` SET num = '.$has['num'].' WHERE id = '.$has['id'];
            }else{
                $sql = "INSERT INTO `shop_cart` VALUES(NULL, $userid, $goodsid, '$attr', $goodsnum)";
            }
            $command = Yii::$app->db->createCommand($sql)->execute();
        }else{
            $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : [];
            if($cart) $cart = unserialize($cart);
            //添加商品
            $key = $goodsid.'-'.$attr;
            //存在直接相加
            if(array_key_exists($key, $cart))  $cart[$key] += $goodsnum;
            else    $cart[$key] = $goodsnum;
            //存储购物车到cookie
            setcookie('cart', serialize($cart), time() + 24 * 3600); //默认存储一天
        }
        //return $this->jump('success', '添加成功, 3秒后自动跳转到购物车', 3, 'cart/mycart');
     }

    public function actionMycart(){

        $model = new Cart();
        $list = $model->getCarts();
        $front = isset($_COOKIE['front']) ? $_COOKIE['front'] : '/';
        return $this->render('mycart',[
            'list'  => $list,
            'front' => $front,
        ]);
    }


    /*商品从cookies移动到数据库*/
    public function actionMove()
    {
        $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : [];
        if(Yii::$app->user->isGuest){
            return $this->jump();
        }
        if($cart){
            $cart = unserialize($cart);
            foreach ($cart as $k => $v){
                $key = explode('-', $k);
                //加入购物车
                $this->actionAddcart($key[0], $key[1], $v);
            }
        }
        //清空cookies
        setcookie('cart', '');
    }

    
    //从购物车中删除单件商品
    public function actionDelete($goodsid, $attr){
        $request = Yii::$app->request;
        $goodsid = $request->get('goodsid');
        $attr = trim($request->get('attr'));
        //已登录
        if(!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->identity->id;
            Yii::$app->db->createCommand('DELETE FROM shop_cart WHERE user_id=:user_id AND goods_id =:goods_id AND attr =:attr')
                ->bindValue(':user_id', $user_id)
                ->bindValue(':goods_id', $goodsid)
                ->bindValue(':attr', $attr)
                ->execute();
        }else{
            //未登录直接清cookie
            $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
            var_dump($cart);
            $key = $goodsid.'-'.$attr;
            echo $key;
            unset($cart[$key]);
            setcookie('cart', serialize($cart), time() + 24 * 3600); //默认存储一天
        }
    }

    public function actionUpdate(){
        $request = Yii::$app->request;
        $goodsid = $request->get('goodsid');
        $attr = $request->get('attr');
        $num = $request->get('num');
        //已登录
        if(!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->identity->id;
            Yii::$app->db->createCommand("UPDATE shop_cart SET num = $num WHERE user_id= $user_id AND goods_id = $goodsid AND attr = '$attr'")
                ->execute();
        }else{
            //未登录直接清cookie
            $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
            $cart[$goodsid.'-'.$attr] = $num;
            setcookie('cart', serialize($cart));
        }
    }


}