#商品分类表
create table shop_category(
     id int unsigned not null primary key auto_increment,
     cat_name varchar(30) not null comment '分类名称',
     pid int  not null default 0 comment '上级分类id',
     unit varchar(10) default ' ' comment '分类单位',
     sort tinyint default 50 comment '排序',
     is_show tinyint default 1 comment '是否显示',
     price_area tinyint default 0 comment '价格区间个数',
     des varchar(100) default ' ' comment '分类描述'
)engine=myisam,default charset=utf8;

#商品类型表
create table shop_goodstype(
     id int unsigned not null primary key auto_increment,
     goodstype_name varchar(30) comment '商品类型名称'
)engine=myisam, default charset=utf8;

#商品属性表
create table shop_goodsattr(
     id int unsigned not null primary key auto_increment,
     goodstype_id tinyint comment '商品类型id',
     attr_name varchar(20) not null comment '属性名称',
     attr_type tinyint default 1 comment '属性类型',
     attr_value varchar(20) not null comment '属性值'
)engine=myisam, default charset=utf8;

#商品品牌表
create table shop_brand(
     id int unsigned not null primary key auto_increment,
     brand_name varchar(32) not null comment '品牌名称',
     brand_link varchar(32) not null comment '品牌网址',
     brand_logo varchar(32) not null comment '品牌logo',
     brand_explain text not null comment '品牌描述',
     brand_sort int default 50 comment '排序',
     is_show tinyint default 1 comment '是否显示'
)engine=myisam, default charset=utf8;

#商品表
create table shop_goods(
     id int unsigned not null primary key auto_increment,
     goods_name varchar(20) not null comment '商品名称',
     goods_sn char(11) not null comment '商品货号',
     goodscat_id int unsigned not null  comment '商品分类id',
     goods_brand int default -1 comment '商品品牌id',
     shop_price decimal(10,2) default 0.00 comment '本店价',
     mark_price decimal(10,2) default 0.00 comment '市场价',
     level_mark int default -1  comment '赠送1等级积分,默认为-1则表示按价格赠送',
     is_discount tinyint default 0 comment '是否促销',
     sales_price decimal(10,2) default 0.00 comment '促销价',
     sales_start datetime not null comment '促销开始时间',
     sales_end datetime not null comment '促销结束时间',
     primary_img varchar(32) not null comment '商品原图',
     big_img varchar(32) not null comment '商品大图',
     medium_img varchar(32) not null comment '商品中图',
     small_img varchar(32) not null comment '商品小图',
     des text not null comment '商品描述',
     weight varchar(10) default '' comment '商品重量',
     count int default 1 comment '商品库存',
     warn_count int default 1 comment '商品警告库存',
     is_sale tinyint default 1 comment '是否上架',
     post_free tinyint default 1 comment '是否包邮',
     is_delete tinyint  default 0 comment '是否删除',
     is_recycle tinyint default 0 comment '回收站商品'
)engine=myisam,default charset=utf8;

#会员级别价格表
create table shop_memberprice(
     id int unsigned not null primary key auto_increment,
     goods_id int unsigned not null comment '商品id',    
     member_level int unsigned not null comment '会员级别id',
     member_price decimal(10,2) default -1 comment '该级别的价格,默认为-1 表示根据折扣率来算,否则直接根据价格计算'
)engine=myisam, default charset=utf8;

#会员级别表
create table shop_memberlevel(
     id int unsigned not null primary key auto_increment,
     level_name varchar(32) comment '级别名称',
     mark_max  int unsigned comment '积分上限',
     mark_min int unsigned comment '积分下限',
     rate tinyint default 100 comment'初始折扣率'
)engine=myisam, default charset=utf8;

#商品优惠价格表
create table shop_discount(
     id int unsigned not null primary key auto_increment,
     goods_id int unsigned not null comment '商品id',    
     count tinyint unsigned comment '优惠数量',
     price decimal(10,2) comment '优惠价格'
)engine=myisam, default charset=utf8;

#商品属性价格表
create table shop_attrprice(
     id int unsigned not null primary key auto_increment,
     goods_id int unsigned not null comment '商品id',    
     attr_id int unsigned not null comment '属性id',
     attr_value int unsigned not null comment '属性值',
     attr_prince decimal(10,2) default '0.00' comment '该属性价格'
)engine=myisam, default charset=utf8;

#商品相册表
create table shop_goodsimg(
     id int unsigned not null primary key auto_increment,
     goods_id int unsigned not null comment '商品id',
     primary_img varchar(32) not null comment '商品原图',
     big_img varchar(32) not null comment '商品大图',
     medium_img varchar(32) not null comment '商品中图',
     small_img varchar(32) not null comment '商品小图'
)engine=myisam, default charset=utf8;

#货品表
create table shop_product(
     id int unsigned not null primary key auto_increment,
     product_sn char(11) not null comment '货品货号',
      goods_id int unsigned not null comment '商品id',    
      attr_value varchar(20) default '' comment '商品属性集合',
     count int default 0 comment '库存量'
)engine=myisam, default charset=utf8;
