<?php

namespace frontend\models;

use Yii;
use common\help\MyHelper;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name','user_address'], 'filter', 'filter' => 'trim'],
            ['user_name', 'required', 'message' => '收货人不能为空'],
            ['user_name', 'string', 'length' => [2,25], 'tooShort'   => '收货人过短', 'tooLong'   => '收货人过长'],
            ['user_address', 'required', 'message' => '收货地址不能为空'],
            ['user_address', 'string', 'length' => [5,25], 'tooShort'   => '地址过短', 'tooLong'   => '地址人过长'],
            ['user_tel', 'required', 'message' => '手机号不能为空'],
            [['user_tel'], 'string', 'length' => [5,25], 'tooShort'   => '手机号过短', 'tooLong'   => '手机号过长'],
            [['addTime'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['order_status'], 'default', 'value' => 0],
            [['pay_status'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_name' => '收货人',
        ];
    }

    //提交订单
    public function submit()
    {
        // 调用validate方法对表单数据进行验证，验证规则参考上面的rules方法
        $request = Yii::$app->request;
        //下订单 , 失败
        if(!$sn = $this->getOrderSn()) return false;
        //订单号
        $this->order_sn = $sn;
        //支付方式
        $this->pay_id = intval($request->post('pay_id'));
        //配送方式
        $this->post_id = intval($request->post('post_id'));
        //邮费
        $this->postage = $request->post('mypost');
        //商品价格
        $this->goods_price = $request->post('myprice');
        //商品总价
        $this->total_price	= bcadd($this->goods_price, $this->postage, 2);
        $this->user_id = Yii::$app->user->identity->id;
        $this->save();
        $order_id = $this->id;
        if(!$order_id) return false;
        //插入订单商品表
        $this->addTo($order_id);
        //返回订单id
        return $order_id;
    }

    public function addTo($order_id, $cartModel = null){
        if(!$cartModel) $cartModel = new Cart();
        $carts = $cartModel->getCarts();
        $arr = [];
        //循环购物车中商品
        foreach ($carts as $k => $v){
            $arr[$k]['id'] = null;
            $arr[$k]['order_id'] = $order_id;
            $arr[$k]['goodsid'] = $v['goodsid'];
            $arr[$k]['attr'] = $v['attr'];
            $arr[$k]['goodsnum'] = $v['goodsnum'];
            $arr[$k]['goodsprice'] = $v['price'];
            $arr[$k]['attr_str'] = $v['attrstr'];
        }
        if($arr) {
            $connection = Yii::$app->db;
            $column = ['id', 'order_id','goods_id','attr','goodsnum','goodsprice','attr_str'];
            $command = $connection->createCommand()->batchInsert('shop_ordergoods', $column ,$arr)->execute();
            //清空购物车
            $cartModel->clear();
        }
    }
    /*获取订单号*/
    public function getOrderSn(){
        if(MyHelper::lock('order_sn')) {
            $sn = substr(time(), 4);
            $maxId = (new \yii\db\Query())->select(['max(id)'])->from('shop_order')->scalar();
            if (!$maxId) $maxId = 1;
            $sn = $sn.$maxId;
            //释放锁
            MyHelper::unlock('order_sn');
            return $sn;
        }else{
            return false;
        }
    }
}
