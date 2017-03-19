<?php
namespace frontend\controllers;

use Codeception\Lib\Generator\Helper;
use frontend\models\Goods;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GoodsController extends PublicController
{
     public $layout = "home_style.php";
     
     public function actionDetail($id)
     {
         $id = intval($id);
         $goods = $this->findModel($id);
         $images = (new \yii\db\Query())
             ->select(['*'])
             ->from('shop_goodsimg')
             ->where(['goods_id' => $id])
             ->all();
         $first = null;
         //第一张图片
         if($images) $first = $images[0];
         //该商品属性
         $sql = "SELECT  a.*
                 FROM shop_attrprice a
                 LEFT JOIN shop_goodsattr b
                 ON b.id = a.attr_id
                 WHERE a.goods_id = $id";
         $res = Yii::$app->db->createCommand($sql)->queryAll();
         $attrs = [];
         foreach ($res as $k => $v){
             $attrs[$v['attr_id']][] = $v;
         }/*
         echo "<pre>";
         var_dump($attrs);
         echo "</pre>";*/
         //该类型商品属性
         $sql = "SELECT id, attr_name,attr_type, attr_value FROM shop_goodsattr WHERE goodstype_id = $goods->goodstype_id";
         $allAttr = Yii::$app->db->createCommand($sql)->queryAll();
         //相关分类
         $sql = 'SELECT pid FROM shop_category WHERE id = (SELECT pid FROM shop_category WHERE id ='.$goods->goodscat_id.')';
         $catPid = Yii::$app->db->createCommand($sql)->queryOne();
         $likely = (new \yii\db\Query())
             ->select(['*'])
             ->from('shop_category')
             ->where(['pid' => $catPid])
             ->orderBy('id')
             ->all();
         //商品品牌
         $brand = (new \yii\db\Query())
             ->select(['brand_name'])
             ->from('shop_brand')
             ->where(['id' => $goods['goods_brand']])
             ->one();
         return $this->render('detail',[
             'goods'    => $goods,
             'first'    => $first,
             'images'   => $images, //商品相册
             'likely' => $likely,
             'brand'    => $brand,
             'attrs' => $attrs,
             'allAttr'  => $allAttr,
         ]);
     }

     public function actionCat()
     {
         $catid = intval(Yii::$app->request->get('id'));

         $cur = (new \yii\db\Query())
             ->select(['cat_name', 'id', 'pid'])
             ->from('shop_category')
             ->where(['id' => $catid])
             ->one();
         if(!$cur) return $this->jump();
         $curInfo = $cur;

         $top = $cur;
         while($cur['pid'] != '0'){
             $cur = (new \yii\db\Query())
                 ->select(['id', 'pid', 'cat_name'])
                 ->from('shop_category')
                 ->where(['id' => $cur['pid']])
                 ->one();
             $top = $cur;
         }
         $list = (new \yii\db\Query())
             ->select(['id', 'pid', 'cat_name'])
             ->from('shop_category')
             ->all();
         if(!$list) return $this->jump();
         $rows = $this->getTree($list, $catid, 0);
         $ids = [];
         $ids[] = $catid;
         foreach($rows as $k => $v) $ids[] = $v['id'];

         //当前分类及子分类所有商品
         $query = (new \yii\db\Query())
             ->select(['id', 'goods_name', 'goodstype_id', 'shop_price', 'small_img', 'mark_price'])
             ->from('shop_goods')
             ->where(['is_delete' => 0, 'is_recycle' => 0, 'goodscat_id' => $ids])
             ->orderBy('id');
         $countQuery = clone $query;
         $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pagesize']]);
         $goods = $query->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
         setcookie('front', Yii::$app->request->url);
         return $this->render('cat',[
             'goods'  =>  $goods,
             'top'   => $top,
             'curInfo'   => $curInfo,
             'pages' => $pages,
         ]);
     }
    /**
     * 找出所有子分类及每级分类深度
     * @staticvar array $tree
     * @param type $arr
     * @param type $p_id
     * @param type $deep
     * @return type
     */
    public function getTree($arr, $p_id, $deep = 0) {
        static $tree = array();
        foreach ($arr as $key =>  $row) {
            if ($row['pid'] == $p_id) {
                $row['deep'] = $deep;
                $tree[] = $row;
                unset($arr[$key]);  /*此元素已经查找过, 可以删除*/
                $this->getTree($arr, $row['id'], $deep + 1);
            }
        }
        return $tree;
    }

    //获取商品价格
    public function actionGetprice($id, $attr){
        $id = intval($id);
        $model = new Goods();
        $price = $model->getPrice($id, $attr);
        return  $price;
    }
    //获取商品库存
    public function actionGetnum($id, $attr){
        $id = intval($id);
        $model = new Goods();
        $num = $model->getGoodsNum($id, $attr);
        return  $num;
    }
    /**
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
