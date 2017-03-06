<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_memberlevel".
 *
 * @property integer $id
 * @property string $level_name
 * @property integer $mark_max
 * @property integer $mark_min
 * @property integer $rate
 */
class Memberlevel extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_memberlevel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mark_max', 'mark_min', 'level_name','rate'], 'required'],
            [['mark_max', 'mark_min', 'rate'], 'integer'],
            [['level_name'], 'string', 'max' => 32],
            [['level_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_name' => '会员等级名称',
            'mark_max' => '积分上限',
            'mark_min' => '积分下限',
            'rate' => '初始折扣率',
        ];
    }
}
