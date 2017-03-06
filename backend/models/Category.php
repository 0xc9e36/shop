<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_category".
 *
 * @property integer $id
 * @property string $cat_name
 * @property integer $pid
 * @property string $unit
 * @property integer $is_show
 * @property integer $price_area
 * @property string $des
 */
class Category extends \yii\db\ActiveRecord {

     /**
      * @inheritdoc
      */
     public static function tableName() {
          return 'shop_category';
     }

     /**
      * @inheritdoc
      */
     public function rules() {
          return [
              [['cat_name', 'pid', 'is_show', 'price_area'], 'required'],
              [['pid', 'is_show', 'price_area'], 'integer'],
              [['cat_name'], 'string', 'max' => 30],
              [['unit'], 'string', 'max' => 10],
              [['des'], 'string', 'max' => 100],
              [['cat_name'], 'checkCategoryName'], //新增数据时  验证分类名是否合法 (同一级别下 分类名不能重复)     
          ];
     }

     /**
      * @inheritdoc
      */
     public function attributeLabels() {
          return [
              'id' => 'ID',
              'cat_name' => '分类名称',
              'pid' => '上级分类',
              'unit' => '单位',
              'is_show' => '是否显示',
              'price_area' => '价格区间',
              'des' => '分类描述',
          ];
     }

     /**
      * 数据验证
      * @param type $attribute
      * @param type $params
      */
     public function checkCategoryName($attribute, $params) {
          $input = Yii::$app->request->post();
          $pid = $input['Category']['pid'];
          $categoryname = $input['Category']['cat_name'];
          //编辑的数据和原来数据库中的比较
          if ($this->id) {
               $cat_name = Category::findBySql("SELECT cat_name FROM shop_category WHERE id={$this->id}")->asArray()->all()[0]['cat_name'];
               if ($cat_name == $categoryname) {
                    return true;
               }
          }


          $res = $this->getCategoryName($pid);
          $arr = array();
          //分类名数组集
          if ($res) {
               foreach ($res as $k1 => $v1) {
                    foreach ($v1 as $k2 => $v2) {
                         $arr[] = $v2;
                    }
               }
          }
          //var_dump($categoryname,$arr);          //debug  
          //该分类名已经存在
          if (in_array($categoryname, $arr)) {
               $this->addError($attribute, '该分类名已经存在');
          }
     }

     /**
      * 查找同一级别分类下所有分类名
      * @param type $id
      * @return type
      */
     public function getCategoryName($id) {
          $res = Category::find()->select('cat_name')->where(['pid' => $id])->asArray()->all();
          return $res;
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

     /**
      * 找出所有分类
      * @param type $p_id
      * @return type
      */
     public function getTreeList($p_id = 0) {
          $sql = "SELECT *FROM shop_category WHERE 1";
          $list = Category::findBySql($sql)->asArray()->all();
          return $this->getTree($list, $p_id, 0);
     }

     /**
      * 找出所有子分类
      * @param type $pid
      * @return type
      */
     public function getChildList($pid) {
          $sql = "SELECT *FROM shop_category ORDER BY id ASC";
          $list = Category::findBySql($sql)->asArray()->all();
          return $this->getTree($list, $pid, 0);
     }

}
