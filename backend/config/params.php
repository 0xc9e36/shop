<?php
return [
    'adminEmail' => 'admin@example.com',
    'temp'  => 'temp/',   //临时文件目录
    'upload'   => 'uploads/',    //上传文件目录
    'pagesize'   => 2,    //每页显示条数
    'menu'  =>  array(
        '商品管理'  => array(
            '商品分类' => '/index.php?r=category/index',
            '商品类型' => '/index.php?r=goodstype/index',
            '商品品牌' => '/index.php?r=brand/index',
            '商品列表' => '/index.php?r=goods/index',
            '商品回收站' => '/index.php?r=goods/trashindex',
        ),
        '用户管理'  => array(
            '管理员'   =>  '/index.php?r=admin/index',
            '角色管理'   =>  '/index.php?r=role/index',
            '会员列表' => '/index.php?r=member/index',
            '会员等级' => '/index.php?r=memberlevel/index',
        ),
    ),
];
