<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'goods_name',
            'goods_sn',
            'goodscat_id',
            'goods_brand',
            'shop_price',
            'mark_price',
            'level_mark',
            'is_discount',
            'sales_price',
            'sales_start',
            'sales_end',
            'primary_img',
            'big_img',
            'medium_img',
            'small_img',
            'des:ntext',
            'weight',
            'count',
            'warn_count',
            'is_sale',
            'post_free',
            'is_delete',
            'is_recycle',
        ],
    ]) ?>

</div>
