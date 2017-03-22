<?php
namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends PublicController
{
     public $layout = "home_style.php";
     public function actionIndex()
     {
          $query = new \yii\db\Query();
          /**********取前五条信息********/
          /*疯狂抢购*/
          $crazy= $query
              ->select(['id', 'goods_name', 'small_img','shop_price'])
              ->from('shop_goods')
              ->where(['is_crazy' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
              ->limit(5)
              ->all();
          /*热卖商品*/
          $bestsale= $this->getBest();
          /*推荐商品*/
          $recomend= $query
              ->select(['id', 'goods_name', 'small_img','shop_price'])
              ->from('shop_goods')
              ->where(['is_recomend' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
              ->limit(5)
              ->all();
          /*新品上架*/
          $new= $this->getNews();
          /*猜您喜欢*/
          $guess= $query
              ->select(['id', 'goods_name', 'small_img','shop_price'])
              ->from('shop_goods')
              ->where(['is_guess' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
              ->limit(5)
              ->all();

          /*轮播图*/
          $carousel= $query
              ->select(['id', 'url', 'big_img'])
              ->from('shop_adver')
              ->where(['type_id' => '2'])
              ->all();
          $count = count($carousel);
          /*图片广告*/
          $images = $query
              ->select(['id', 'url', 'big_img'])
              ->from('shop_adver')
              ->where(['type_id' => '1'])
              ->one();
          /*文字广告*/
          $txtAd = $query
              ->select(['id', 'title', 'url'])
              ->from('shop_adver')
              ->where(['type_id' => '0'])
              ->limit(5)
              ->all();
          /*网站首发*/
          $siteFirst= $query
              ->select(['id', 'goods_name', 'small_img','shop_price', 'des'])
              ->from('shop_goods')
              ->where(['is_first' => '1', 'is_delete' => 0, 'is_sale' => 1, 'is_recycle' => 0])
              ->limit(2)
              ->all();
          return $this->render('index',[
               'crazy'  => $crazy,
               'bestsale' => $bestsale,
               'recomend' => $recomend,
               'new'     => $new,
               'guess' => $guess,
               'carousel'     =>  $carousel,
               'count'   => $count,
               'images'  => $images,
               'txtAd' => $txtAd,
               'siteFirst'   => $siteFirst,
          ]);
     }

}