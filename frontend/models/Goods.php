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

    //获取会员折扣率
    public function getMemberPrice(){
        $mark = Yii::$app->user->identity->rank;
        $sql= "SELECT rate FROM shop_memberlevel WHERE $mark BETWEEN mark_min AND mark_max";
        $rank = Yii::$app->db->createCommand($sql)->query()->read();
        return $rank['rate'];
    }

}
