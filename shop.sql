-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('goods::picture','3',1488711921),('goods::trash','3',1488705824),('goods::update','3',1488705830),('goodsattr::editattr','3',1488705830),('goodsattr::getattr','3',1488713852),('会员管理','3',1488705789),('会员管理','4',1488760211),('商品分类管理','3',1488705789),('商品品牌管理','3',1488705789),('商品管理','3',1488705789),('商品类型管理','3',1488705789),('超级管理员','3',1488705789);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('admin::add',2,'创建了 admin::add 许可',NULL,NULL,1488697126,1488697126),('admin::delete',2,'创建了 admin::delete 许可',NULL,NULL,1488699924,1488699924),('admin::error',2,'创建了 admin::error 许可',NULL,NULL,1488702202,1488702202),('admin::index',2,'创建了 admin::index 许可',NULL,NULL,1488694824,1488694824),('admin::login',2,'创建了 admin::login 许可',NULL,NULL,1488694894,1488694894),('admin::logout',2,'创建了 admin::logout 许可',NULL,NULL,1488694894,1488694894),('admin::role',2,'创建了 admin::role 许可',NULL,NULL,1488694825,1488694825),('brand::add',2,'创建了 brand::add 许可',NULL,NULL,1488693889,1488693889),('brand::delete',2,'创建了 brand::delete 许可',NULL,NULL,1488703946,1488703946),('brand::index',2,'创建了 brand::index 许可',NULL,NULL,1488693888,1488693888),('brand::update',2,'创建了 brand::update 许可',NULL,NULL,1488704360,1488704360),('brand::uploadimg',2,'创建了 brand::uploadimg 许可',NULL,NULL,1488704148,1488704148),('category::add',2,'创建了 category::add 许可',NULL,NULL,1488693883,1488693883),('category::delete',2,'创建了 category::delete 许可',NULL,NULL,1488701596,1488701596),('category::index',2,'创建了 category::index 许可',NULL,NULL,1488693882,1488693882),('category::update',2,'创建了 category::update 许可',NULL,NULL,1488701586,1488701586),('goods::add',2,'创建了 goods::add 许可',NULL,NULL,1488693891,1488693891),('goods::index',2,'创建了 goods::index 许可',NULL,NULL,1488693890,1488693890),('goods::picture',2,'创建了 goods::picture 许可',NULL,NULL,1488711920,1488711920),('goods::trash',2,'创建了 goods::trash 许可',NULL,NULL,1488705824,1488705824),('goods::trashindex',2,'创建了 goods::trashindex 许可',NULL,NULL,1488693895,1488693895),('goods::update',2,'创建了 goods::update 许可',NULL,NULL,1488705830,1488705830),('goodsattr::add',2,'创建了 goodsattr::add 许可',NULL,NULL,1488701992,1488701992),('goodsattr::delete',2,'创建了 goodsattr::delete 许可',NULL,NULL,1488702392,1488702392),('goodsattr::editattr',2,'创建了 goodsattr::editattr 许可',NULL,NULL,1488705830,1488705830),('goodsattr::getattr',2,'创建了 goodsattr::getattr 许可',NULL,NULL,1488713852,1488713852),('goodsattr::index',2,'创建了 goodsattr::index 许可',NULL,NULL,1488702043,1488702043),('goodsattr::update',2,'创建了 goodsattr::update 许可',NULL,NULL,1488702126,1488702126),('goodstype::add',2,'创建了 goodstype::add 许可',NULL,NULL,1488693887,1488693887),('goodstype::delete',2,'创建了 goodstype::delete 许可',NULL,NULL,1488702060,1488702060),('goodstype::index',2,'创建了 goodstype::index 许可',NULL,NULL,1488693885,1488693885),('goodstype::update',2,'创建了 goodstype::update 许可',NULL,NULL,1488702055,1488702055),('index::index',2,'创建了 index::index 许可',NULL,NULL,1488686743,1488686743),('index::main',2,'创建了 index::main 许可',NULL,NULL,1488693953,1488693953),('index::menu',2,'创建了 index::menu 许可',NULL,NULL,1488693953,1488693953),('index::top',2,'创建了 index::top 许可',NULL,NULL,1488693953,1488693953),('memberlevel::add',2,'创建了 memberlevel::add 许可',NULL,NULL,1488704737,1488704737),('memberlevel::delete',2,'创建了 memberlevel::delete 许可',NULL,NULL,1488704770,1488704770),('memberlevel::index',2,'创建了 memberlevel::index 许可',NULL,NULL,1488693779,1488693779),('memberlevel::update',2,'创建了 memberlevel::update 许可',NULL,NULL,1488704784,1488704784),('product::index',2,'创建了 product::index 许可',NULL,NULL,1488693893,1488693893),('role::add',2,'创建了 role::add 许可',NULL,NULL,1488694831,1488694831),('role::delete',2,'创建了 role::delete 许可',NULL,NULL,1488698343,1488698343),('role::index',2,'创建了 role::index 许可',NULL,NULL,1488693774,1488693774),('role::rolenode',2,'创建了 role::rolenode 许可',NULL,NULL,1488693904,1488693904),('role::update',2,'创建了 role::update 许可',NULL,NULL,1488696863,1488696863),('会员管理',1,'创建了 会员管理角色、部门、权限组',NULL,NULL,1488704721,1488704721),('商品分类管理',1,'创建了 商品分类管理角色、部门、权限组',NULL,NULL,1488701562,1488701562),('商品品牌管理',1,'创建了 商品品牌管理角色、部门、权限组',NULL,NULL,1488703918,1488703918),('商品管理',1,'创建了 商品管理角色、部门、权限组',NULL,NULL,1488705771,1488705771),('商品类型管理',1,'创建了 商品类型管理角色、部门、权限组',NULL,NULL,1488701916,1488701916),('超级管理员',1,'创建了 超级管理员角色、部门、权限组',NULL,NULL,1488688103,1488688103);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('超级管理员','admin::add'),('超级管理员','admin::delete'),('超级管理员','admin::error'),('超级管理员','admin::index'),('超级管理员','admin::login'),('超级管理员','admin::logout'),('超级管理员','admin::role'),('商品品牌管理','brand::add'),('超级管理员','brand::add'),('商品品牌管理','brand::delete'),('超级管理员','brand::delete'),('商品品牌管理','brand::index'),('超级管理员','brand::index'),('超级管理员','brand::update'),('超级管理员','brand::uploadimg'),('商品分类管理','category::add'),('超级管理员','category::add'),('商品分类管理','category::delete'),('商品管理','category::delete'),('超级管理员','category::delete'),('商品分类管理','category::index'),('商品管理','category::index'),('超级管理员','category::index'),('商品管理','category::update'),('超级管理员','category::update'),('商品管理','goods::add'),('超级管理员','goods::add'),('商品管理','goods::index'),('超级管理员','goods::index'),('超级管理员','goods::picture'),('超级管理员','goods::trash'),('超级管理员','goods::trashindex'),('超级管理员','goods::update'),('商品类型管理','goodsattr::add'),('超级管理员','goodsattr::add'),('超级管理员','goodsattr::delete'),('超级管理员','goodsattr::editattr'),('超级管理员','goodsattr::getattr'),('商品类型管理','goodsattr::index'),('超级管理员','goodsattr::index'),('商品类型管理','goodsattr::update'),('超级管理员','goodsattr::update'),('商品类型管理','goodstype::add'),('超级管理员','goodstype::add'),('商品类型管理','goodstype::delete'),('超级管理员','goodstype::delete'),('商品类型管理','goodstype::index'),('超级管理员','goodstype::index'),('商品类型管理','goodstype::update'),('超级管理员','goodstype::update'),('会员管理','index::index'),('超级管理员','index::index'),('会员管理','index::main'),('超级管理员','index::main'),('会员管理','index::menu'),('超级管理员','index::menu'),('会员管理','index::top'),('超级管理员','index::top'),('会员管理','memberlevel::add'),('超级管理员','memberlevel::add'),('会员管理','memberlevel::delete'),('超级管理员','memberlevel::delete'),('会员管理','memberlevel::index'),('超级管理员','memberlevel::index'),('会员管理','memberlevel::update'),('超级管理员','memberlevel::update'),('超级管理员','product::index'),('超级管理员','role::add'),('超级管理员','role::delete'),('超级管理员','role::index'),('超级管理员','role::rolenode'),('超级管理员','role::update');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_attrprice`
--

DROP TABLE IF EXISTS `shop_attrprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_attrprice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `attr_id` int(10) unsigned NOT NULL COMMENT '属性id',
  `attr_value` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '属性值',
  `attr_price` decimal(10,2) DEFAULT '0.00' COMMENT '该属性价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_attrprice`
--

LOCK TABLES `shop_attrprice` WRITE;
/*!40000 ALTER TABLE `shop_attrprice` DISABLE KEYS */;
INSERT INTO `shop_attrprice` VALUES (283,18,37,'蛤蛤',0.00),(282,18,36,'25',0.00),(281,18,35,'妇女出版社',60.00),(280,18,35,'人民出版社',50.00),(255,17,38,'200',0.00),(254,17,39,'红色',6000.00),(253,17,39,'绿色',5900.00),(252,17,39,'白色',5800.00);
/*!40000 ALTER TABLE `shop_attrprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_brand`
--

DROP TABLE IF EXISTS `shop_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(32) NOT NULL COMMENT '品牌名称',
  `brand_link` varchar(32) NOT NULL COMMENT '品牌网址',
  `brand_logo` varchar(50) NOT NULL COMMENT '品牌logo',
  `brand_explain` text NOT NULL COMMENT '品牌描述',
  `brand_sort` int(11) DEFAULT '50' COMMENT '排序',
  `is_show` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_brand`
--

LOCK TABLES `shop_brand` WRITE;
/*!40000 ALTER TABLE `shop_brand` DISABLE KEYS */;
INSERT INTO `shop_brand` VALUES (11,'苹果','http://www.apple.com','uploads/20170305/1488723094small7680.png','',50,1);
/*!40000 ALTER TABLE `shop_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_category`
--

DROP TABLE IF EXISTS `shop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `unit` varchar(10) DEFAULT ' ' COMMENT '分类单位',
  `is_show` tinyint(4) DEFAULT '1' COMMENT '是否显示',
  `price_area` tinyint(4) DEFAULT '0' COMMENT '价格区间个数',
  `des` varchar(100) DEFAULT ' ' COMMENT '分类描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (11,'功能手机',9,'',1,0,''),(10,'智能手机',9,'',1,0,''),(9,'手机',0,'台',1,0,''),(12,'家电',0,'',1,0,''),(13,'冰箱',12,'',1,0,''),(14,'洗衣机',12,'',1,0,''),(15,'图书',0,'本',1,1,'');
/*!40000 ALTER TABLE `shop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_discount`
--

DROP TABLE IF EXISTS `shop_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_discount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `count` tinyint(3) unsigned DEFAULT NULL COMMENT '优惠数量',
  `price` decimal(10,2) DEFAULT NULL COMMENT '优惠价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_discount`
--

LOCK TABLES `shop_discount` WRITE;
/*!40000 ALTER TABLE `shop_discount` DISABLE KEYS */;
INSERT INTO `shop_discount` VALUES (101,18,200,20.00),(100,18,100,10.00),(87,17,20,2500.00);
/*!40000 ALTER TABLE `shop_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_goods`
--

DROP TABLE IF EXISTS `shop_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_goods` (
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goods`
--

LOCK TABLES `shop_goods` WRITE;
/*!40000 ALTER TABLE `shop_goods` DISABLE KEYS */;
INSERT INTO `shop_goods` VALUES (18,'新华字典','1488726331',15,0,14,20.00,25.00,-1,1,20.00,'Mar 1, 2017','Mar 4, 2017','uploads/20170305/1488726289primary7926.png','uploads/20170305/1488726289big4922.png','uploads/20170305/1488726289median7549.png','uploads/20170305/1488726289small1378.png','字典大全','',1000,10,1,1,0,0),(17,'苹果7','1488723250',10,11,15,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170305/1488726209primary3137.png','uploads/20170305/1488726209big7231.png','uploads/20170305/1488726209median8965.png','uploads/20170305/1488726209small5780.png','最好用的手机','',100,20,1,1,0,0);
/*!40000 ALTER TABLE `shop_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_goodsattr`
--

DROP TABLE IF EXISTS `shop_goodsattr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_goodsattr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodstype_id` tinyint(4) DEFAULT NULL COMMENT '商品类型id',
  `attr_name` varchar(20) NOT NULL COMMENT '属性名称',
  `attr_type` tinyint(4) DEFAULT '1' COMMENT '属性类型',
  `attr_value` varchar(20) NOT NULL COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsattr`
--

LOCK TABLES `shop_goodsattr` WRITE;
/*!40000 ALTER TABLE `shop_goodsattr` DISABLE KEYS */;
INSERT INTO `shop_goodsattr` VALUES (39,15,'颜色',1,'红色,白色,绿色'),(37,14,'作者',0,''),(38,15,'重量',0,''),(36,14,'价格',0,''),(35,14,'出版社',1,'青年出版社,人民出版社,妇女出版社');
/*!40000 ALTER TABLE `shop_goodsattr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_goodsimg`
--

DROP TABLE IF EXISTS `shop_goodsimg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_goodsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `primary_img` varchar(50) NOT NULL COMMENT '商品原图',
  `big_img` varchar(50) NOT NULL COMMENT '商品大图',
  `medium_img` varchar(50) NOT NULL COMMENT '商品中图',
  `small_img` varchar(50) NOT NULL COMMENT '商品小图',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsimg`
--

LOCK TABLES `shop_goodsimg` WRITE;
/*!40000 ALTER TABLE `shop_goodsimg` DISABLE KEYS */;
INSERT INTO `shop_goodsimg` VALUES (124,18,'uploads/20170305/1488726324primary4716.png','uploads/20170305/1488726325big5683.png','uploads/20170305/1488726324median1487.png','uploads/20170305/1488726324small5088.png      '),(114,17,'uploads/20170305/1488725333primary5622.png','uploads/20170305/1488725333big9662.png','uploads/20170305/1488725333median3091.png','uploads/20170305/1488725333small4595.png          '),(115,17,'uploads/20170305/1488725337primary9246.png','uploads/20170305/1488725338big4912.png','uploads/20170305/1488725338median9734.png','uploads/20170305/1488725337small3209.png          ');
/*!40000 ALTER TABLE `shop_goodsimg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_goodstype`
--

DROP TABLE IF EXISTS `shop_goodstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_goodstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodstype_name` varchar(30) DEFAULT NULL COMMENT '商品类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodstype`
--

LOCK TABLES `shop_goodstype` WRITE;
/*!40000 ALTER TABLE `shop_goodstype` DISABLE KEYS */;
INSERT INTO `shop_goodstype` VALUES (15,'手机'),(14,'书籍');
/*!40000 ALTER TABLE `shop_goodstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_memberlevel`
--

DROP TABLE IF EXISTS `shop_memberlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_memberlevel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(32) DEFAULT NULL COMMENT '级别名称',
  `mark_max` int(10) unsigned DEFAULT NULL COMMENT '积分上限',
  `mark_min` int(10) unsigned DEFAULT NULL COMMENT '积分下限',
  `rate` tinyint(4) DEFAULT '100' COMMENT '初始折扣率',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_memberlevel`
--

LOCK TABLES `shop_memberlevel` WRITE;
/*!40000 ALTER TABLE `shop_memberlevel` DISABLE KEYS */;
INSERT INTO `shop_memberlevel` VALUES (9,'二级会员',10000,1000,80),(7,'一级会员',1000,0,90),(11,'三级会员',100000,10000,50);
/*!40000 ALTER TABLE `shop_memberlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_memberprice`
--

DROP TABLE IF EXISTS `shop_memberprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_memberprice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `member_level` int(10) unsigned NOT NULL COMMENT '会员级别id',
  `member_price` decimal(10,2) DEFAULT '-1.00' COMMENT '该级别的价格,默认为-1 表示根据折扣率来算,否则直接根据价格计算',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_memberprice`
--

LOCK TABLES `shop_memberprice` WRITE;
/*!40000 ALTER TABLE `shop_memberprice` DISABLE KEYS */;
INSERT INTO `shop_memberprice` VALUES (47,18,11,-1.00),(46,18,9,-1.00),(45,18,7,-1.00),(44,17,11,-1.00),(43,17,9,5000.00),(42,17,7,-1.00);
/*!40000 ALTER TABLE `shop_memberprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product`
--

DROP TABLE IF EXISTS `shop_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_sn` char(30) NOT NULL,
  `goods_id` int(10) unsigned DEFAULT NULL,
  `attr_value` varchar(30) DEFAULT NULL COMMENT '商品属性集合',
  `count` int(11) DEFAULT '0' COMMENT '库存量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (23,'30',17,'254',80),(22,'10',18,'263',10),(24,'40',17,'253',80),(25,'90',17,'252',40);
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_user`
--

DROP TABLE IF EXISTS `shop_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_user`
--

LOCK TABLES `shop_user` WRITE;
/*!40000 ALTER TABLE `shop_user` DISABLE KEYS */;
INSERT INTO `shop_user` VALUES (3,'admin','iNCd0v-Udo9choWd0KxnR7_5H1mCKNsx','$2y$13$0z5xk9j0xk7TrX852s36aOJ8RbwBGhhPrTDFLI9eQ4qWt4cSGdpNC','2698143402@qq.com','2017-03-05 04:06:27','2017-03-05 04:06:27'),(4,'root','QzAJWm75cjoCFdnPrcFS6lpvzK_ucQX-','$2y$13$cTnXHwifezU75To45i.Mg.tYXoI2.BpBXAJn2ixodIMh7AD27hbce','root@qq.com','2017-03-06 00:30:05','2017-03-06 00:30:05');
/*!40000 ALTER TABLE `shop_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-06  9:48:41
