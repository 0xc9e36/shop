<?php
return [
    'adminEmail' => 'admin@example.com',
    'menu'  =>  array(
        '商品管理'  => array(
            '商品分类' => '/index.php?r=category/index',
            '商品类型' => '/index.php?r=goodstype/index',
            '商品品牌' => '/index.php?r=brand/index',
            '商品列表' => '/index.php?r=goods/index',
            '商品回收站' => '/index.php?r=goods/trashindex',
        ),
        '会员管理'  => array(
            '会员等级' => '/index.php?r=memberlevel/index',
        ),        
    ),
];
