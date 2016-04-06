-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-04-06 10:13:05
-- 服务器版本: 5.5.47-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `shop_attrprice`
--

CREATE TABLE IF NOT EXISTS `shop_attrprice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `attr_id` int(10) unsigned NOT NULL COMMENT '属性id',
  `attr_value` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '属性值',
  `attr_price` decimal(10,2) DEFAULT '0.00' COMMENT '该属性价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- 转存表中的数据 `shop_attrprice`
--

INSERT INTO `shop_attrprice` (`id`, `goods_id`, `attr_id`, `attr_value`, `attr_price`) VALUES
(94, 4, 10, '4800', 0.00),
(93, 4, 11, '江西', 0.00),
(92, 4, 11, '湖南', 0.00),
(91, 4, 11, '湖北', 0.00),
(90, 4, 12, '女', 0.00),
(89, 4, 12, '男', 0.00),
(88, 3, 15, '台式', 0.00),
(87, 3, 14, '17', 0.00),
(95, 4, 9, '白色', 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `shop_brand`
--

CREATE TABLE IF NOT EXISTS `shop_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(32) NOT NULL COMMENT '品牌名称',
  `brand_link` varchar(32) NOT NULL COMMENT '品牌网址',
  `brand_logo` varchar(50) NOT NULL COMMENT '品牌logo',
  `brand_explain` text NOT NULL COMMENT '品牌描述',
  `brand_sort` int(11) DEFAULT '50' COMMENT '排序',
  `is_show` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `shop_brand`
--

INSERT INTO `shop_brand` (`id`, `brand_name`, `brand_link`, `brand_logo`, `brand_explain`, `brand_sort`, `is_show`) VALUES
(6, '鸿基', 'http://www.jhk.com', 'uploads/20160405/1459846841small7448.png', '啊呜ｇ', 89, 1),
(5, '戴尔', 'http://www.daie.com', 'uploads/20160405/1459846802small1119.png', '世界上第二好用的电脑', 50, 1);

-- --------------------------------------------------------

--
-- 表的结构 `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `unit` varchar(10) DEFAULT ' ' COMMENT '分类单位',
  `is_show` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  `price_area` tinyint(4) DEFAULT '0' COMMENT '价格区间个数',
  `des` varchar(100) DEFAULT ' ' COMMENT '分类描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `shop_category`
--

INSERT INTO `shop_category` (`id`, `cat_name`, `pid`, `unit`, `is_show`, `price_area`, `des`) VALUES
(7, '<script>alert(1)</script>', 0, '', 1, 0, ''),
(6, '书籍', 0, '本', 1, 0, ''),
(5, '服装', 0, '件', 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `shop_discount`
--

CREATE TABLE IF NOT EXISTS `shop_discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `count` tinyint(3) unsigned DEFAULT NULL COMMENT '优惠数量',
  `price` decimal(10,2) DEFAULT NULL COMMENT '优惠价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `shop_discount`
--

INSERT INTO `shop_discount` (`id`, `goods_id`, `count`, `price`) VALUES
(34, 3, 10, 100.00);

-- --------------------------------------------------------

--
-- 表的结构 `shop_goods`
--

CREATE TABLE IF NOT EXISTS `shop_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(20) NOT NULL COMMENT '商品名称',
  `goods_sn` char(11) DEFAULT NULL COMMENT '商品货号',
  `goodscat_id` int(10) unsigned NOT NULL COMMENT '商品分类id',
  `goods_brand` int(11) DEFAULT NULL COMMENT '商品品牌id',
  `goodstype_id` int(11) NOT NULL DEFAULT '0',
  `shop_price` decimal(10,2) DEFAULT '0.00' COMMENT '本店价',
  `mark_price` decimal(10,2) DEFAULT '0.00' COMMENT '市场价',
  `level_mark` int(11) DEFAULT '-1' COMMENT '赠送1等级积分,默认为-1则表示按价格赠送',
  `is_discount` tinyint(4) DEFAULT '0' COMMENT '是否促销',
  `sales_price` decimal(10,2) DEFAULT NULL COMMENT '促销价',
  `sales_start` varchar(20) DEFAULT NULL COMMENT '促销开始时间',
  `sales_end` varchar(20) DEFAULT NULL COMMENT '促销结束时间',
  `primary_img` varchar(50) DEFAULT NULL COMMENT '商品原图',
  `big_img` varchar(50) DEFAULT NULL COMMENT '商品大图',
  `medium_img` varchar(50) DEFAULT NULL COMMENT '商品中图',
  `small_img` varchar(50) DEFAULT NULL COMMENT '商品小图',
  `des` varchar(600) DEFAULT '' COMMENT '商品描述',
  `weight` varchar(10) DEFAULT '' COMMENT '商品重量',
  `count` int(11) DEFAULT '1' COMMENT '商品库存',
  `warn_count` int(11) DEFAULT '1' COMMENT '商品警告库存',
  `is_sale` tinyint(4) DEFAULT '1' COMMENT '是否上架',
  `post_free` tinyint(4) DEFAULT '1' COMMENT '是否包邮',
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '是否删除',
  `is_recycle` tinyint(4) DEFAULT '0' COMMENT '回收站商品',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `shop_goods`
--

INSERT INTO `shop_goods` (`id`, `goods_name`, `goods_sn`, `goodscat_id`, `goods_brand`, `goodstype_id`, `shop_price`, `mark_price`, `level_mark`, `is_discount`, `sales_price`, `sales_start`, `sales_end`, `primary_img`, `big_img`, `medium_img`, `small_img`, `des`, `weight`, `count`, `warn_count`, `is_sale`, `post_free`, `is_delete`, `is_recycle`) VALUES
(4, '撒网', '1459860307', 0, 0, 3, 4800.00, NULL, -1, 0, NULL, NULL, NULL, 'uploads/20160405/1459860285primary2901.png', 'uploads/20160405/1459860286big2659.png', 'uploads/20160405/1459860286median2693.png', 'uploads/20160405/1459860285small1432.png', '', '', NULL, NULL, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `shop_goodsattr`
--

CREATE TABLE IF NOT EXISTS `shop_goodsattr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodstype_id` tinyint(4) DEFAULT NULL COMMENT '商品类型id',
  `attr_name` varchar(20) NOT NULL COMMENT '属性名称',
  `attr_type` tinyint(4) DEFAULT '1' COMMENT '属性类型',
  `attr_value` varchar(20) NOT NULL COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `shop_goodsattr`
--

INSERT INTO `shop_goodsattr` (`id`, `goodstype_id`, `attr_name`, `attr_type`, `attr_value`) VALUES
(13, 4, '地区', 1, '湖南,湖北,河南'),
(12, 3, '用途', 1, '男,女'),
(11, 3, '地区', 1, '湖南,湖北,江西'),
(10, 3, '设计者', 0, ''),
(9, 3, '颜色', 1, '红色,白色,蓝色'),
(14, 4, '尺寸', 0, '17,18,19'),
(15, 4, '类型', 0, '笔记本,台式');

-- --------------------------------------------------------

--
-- 表的结构 `shop_goodsimg`
--

CREATE TABLE IF NOT EXISTS `shop_goodsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `primary_img` varchar(50) NOT NULL COMMENT '商品原图',
  `big_img` varchar(50) NOT NULL COMMENT '商品大图',
  `medium_img` varchar(50) NOT NULL COMMENT '商品中图',
  `small_img` varchar(50) NOT NULL COMMENT '商品小图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `shop_goodsimg`
--

INSERT INTO `shop_goodsimg` (`id`, `goods_id`, `primary_img`, `big_img`, `medium_img`, `small_img`) VALUES
(48, 3, 'uploads/20160405/1459847271primary3858.png', 'uploads/20160405/1459847272big3595.png', 'uploads/20160405/1459847272median4273.png', 'uploads/20160405/1459847271small8633.png       '),
(47, 3, 'uploads/20160405/1459847277primary1618.png', 'uploads/20160405/1459847277big5471.png', 'uploads/20160405/1459847277median1216.png', 'uploads/20160405/1459847277small8815.png       '),
(46, 3, 'uploads/20160405/1459847281primary9919.png', 'uploads/20160405/1459847281big5851.png', 'uploads/20160405/1459847281median6049.png', 'uploads/20160405/1459847281small8550.png       ');

-- --------------------------------------------------------

--
-- 表的结构 `shop_goodstype`
--

CREATE TABLE IF NOT EXISTS `shop_goodstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodstype_name` varchar(30) DEFAULT NULL COMMENT '商品类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `shop_goodstype`
--

INSERT INTO `shop_goodstype` (`id`, `goodstype_name`) VALUES
(4, '电脑'),
(3, '服饰类');

-- --------------------------------------------------------

--
-- 表的结构 `shop_memberlevel`
--

CREATE TABLE IF NOT EXISTS `shop_memberlevel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(32) DEFAULT NULL COMMENT '级别名称',
  `mark_max` int(10) unsigned DEFAULT NULL COMMENT '积分上限',
  `mark_min` int(10) unsigned DEFAULT NULL COMMENT '积分下限',
  `rate` tinyint(4) DEFAULT '100' COMMENT '初始折扣率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `shop_memberlevel`
--

INSERT INTO `shop_memberlevel` (`id`, `level_name`, `mark_max`, `mark_min`, `rate`) VALUES
(6, 'vip用户', 1000, 100, 90),
(5, '注册用户', 100, 0, 100);

-- --------------------------------------------------------

--
-- 表的结构 `shop_memberprice`
--

CREATE TABLE IF NOT EXISTS `shop_memberprice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `member_level` int(10) unsigned NOT NULL COMMENT '会员级别id',
  `member_price` decimal(10,2) DEFAULT '-1.00' COMMENT '该级别的价格,默认为-1 表示根据折扣率来算,否则直接根据价格计算',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `shop_memberprice`
--

INSERT INTO `shop_memberprice` (`id`, `goods_id`, `member_level`, `member_price`) VALUES
(8, 4, 5, 0.00),
(7, 4, 6, 0.00),
(6, 3, 5, 0.00),
(5, 3, 6, 4500.00);

-- --------------------------------------------------------

--
-- 表的结构 `shop_product`
--

CREATE TABLE IF NOT EXISTS `shop_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_sn` char(30) NOT NULL,
  `goods_id` int(10) unsigned DEFAULT NULL,
  `attr_value` varchar(30) DEFAULT NULL COMMENT '商品属性集合',
  `count` int(11) DEFAULT '0' COMMENT '库存量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `shop_product`
--

INSERT INTO `shop_product` (`id`, `product_sn`, `goods_id`, `attr_value`, `count`) VALUES
(14, '430122', 3, '79', 200);

--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
