<?php
return [
    'adminEmail' => 'admin@example.com',
    'pagesize'  =>  8,  //商品分页展示条数
    'publinInfo' => '分辨真假商品, 谨防上当受骗',
    'post'  => [
        '0' => [
            'name'  => '顺丰快递',
            'desc'  => '顺丰快递描述',
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
            'desc'  => '支付宝接口',
            'class' =>  'Pay',
        ],
        '1' => [
        'name'  => '网银在线',
        'desc'  => '网银在线接口',
        'class' =>  'OlinePay',
        ],
    ],
];
