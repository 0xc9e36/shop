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
         return $this->render('detail',[
             'goods'    => $goods,
             'first'    => $first,
             'images'   => $images, //商品相册
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
    public function actionGetpriceandnum($id, $attr){
        $id = intval($id);
        $model = new Goods();
        $price = $model->getMemberPrice($id);
        $num = $model->getGoodsNum($id, $attr);
        $data = json_encode([
            'price' => $price,
            'num'   => $num,
        ]);
        echo $data;
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
