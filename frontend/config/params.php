<?php
return [
    'adminEmail' => 'admin@example.com',
    'pagesize'  =>  10,  //商品分页展示条数
    'post'  => [
        '0' => [
            'name'  => '顺丰快递',
            'desc'  => '每张订单不满499.00元,运费40.00元, 订单',
            'class' =>  'SF',
            'price' => 35,
        ],
        '1' => [
            'name'  => 'ems',
            'desc'  => 'ems描述',
            'class' =>  'Ems',
            'price' => 15,
        ]
    ],
    'pay'  => [
        '0' => [
            'name'  => '支付宝',
            'desc'  => '谁都在用......',
            'class' =>  'Pay',
        ],
        '1' => [
        'name'  => '网银在线',
        'desc'  => '垃圾......',
        'class' =>  'OlinePay',
        ],
    ],
];
