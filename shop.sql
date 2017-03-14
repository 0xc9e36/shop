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
INSERT INTO `auth_assignment` VALUES ('goods::trashrenew','6',1488887143),('member::delete','5',1489480260),('member::index','6',1489475686),('超级管理员','3',1488765549),('超级管理员','5',1488878479),('超级管理员','6',1488878544);
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
INSERT INTO `auth_item` VALUES ('admin::add',2,'创建了 admin::add 许可',NULL,NULL,1488697126,1488697126),('admin::delete',2,'创建了 admin::delete 许可',NULL,NULL,1488699924,1488699924),('admin::error',2,'创建了 admin::error 许可',NULL,NULL,1488702202,1488702202),('admin::index',2,'创建了 admin::index 许可',NULL,NULL,1488694824,1488694824),('admin::login',2,'创建了 admin::login 许可',NULL,NULL,1488694894,1488694894),('admin::logout',2,'创建了 admin::logout 许可',NULL,NULL,1488694894,1488694894),('admin::role',2,'创建了 admin::role 许可',NULL,NULL,1488694825,1488694825),('brand::add',2,'创建了 brand::add 许可',NULL,NULL,1488693889,1488693889),('brand::delete',2,'创建了 brand::delete 许可',NULL,NULL,1488703946,1488703946),('brand::index',2,'创建了 brand::index 许可',NULL,NULL,1488693888,1488693888),('brand::update',2,'创建了 brand::update 许可',NULL,NULL,1488704360,1488704360),('brand::uploadimg',2,'创建了 brand::uploadimg 许可',NULL,NULL,1488704148,1488704148),('category::add',2,'创建了 category::add 许可',NULL,NULL,1488693883,1488693883),('category::delete',2,'创建了 category::delete 许可',NULL,NULL,1488701596,1488701596),('category::index',2,'创建了 category::index 许可',NULL,NULL,1488693882,1488693882),('category::update',2,'创建了 category::update 许可',NULL,NULL,1488701586,1488701586),('goods::add',2,'创建了 goods::add 许可',NULL,NULL,1488693891,1488693891),('goods::editattr',2,'创建了 goods::editattr 许可',NULL,NULL,1488815420,1488815420),('goods::getattr',2,'创建了 goods::getattr 许可',NULL,NULL,1488814869,1488814869),('goods::index',2,'创建了 goods::index 许可',NULL,NULL,1488693890,1488693890),('goods::picture',2,'创建了 goods::picture 许可',NULL,NULL,1488711920,1488711920),('goods::trash',2,'创建了 goods::trash 许可',NULL,NULL,1488705824,1488705824),('goods::trashdelete',2,'创建了 goods::trashdelete 许可',NULL,NULL,1488850209,1488850209),('goods::trashindex',2,'创建了 goods::trashindex 许可',NULL,NULL,1488693895,1488693895),('goods::trashrenew',2,'创建了 goods::trashrenew 许可',NULL,NULL,1488887142,1488887142),('goods::update',2,'创建了 goods::update 许可',NULL,NULL,1488705830,1488705830),('goods::uploadimg',2,'创建了 goods::uploadimg 许可',NULL,NULL,1488813289,1488813289),('goodsattr::add',2,'创建了 goodsattr::add 许可',NULL,NULL,1488701992,1488701992),('goodsattr::delete',2,'创建了 goodsattr::delete 许可',NULL,NULL,1488702392,1488702392),('goodsattr::editattr',2,'创建了 goodsattr::editattr 许可',NULL,NULL,1488705830,1488705830),('goodsattr::getattr',2,'创建了 goodsattr::getattr 许可',NULL,NULL,1488713852,1488713852),('goodsattr::index',2,'创建了 goodsattr::index 许可',NULL,NULL,1488702043,1488702043),('goodsattr::update',2,'创建了 goodsattr::update 许可',NULL,NULL,1488702126,1488702126),('goodstype::add',2,'创建了 goodstype::add 许可',NULL,NULL,1488693887,1488693887),('goodstype::delete',2,'创建了 goodstype::delete 许可',NULL,NULL,1488702060,1488702060),('goodstype::index',2,'创建了 goodstype::index 许可',NULL,NULL,1488693885,1488693885),('goodstype::update',2,'创建了 goodstype::update 许可',NULL,NULL,1488702055,1488702055),('index::index',2,'创建了 index::index 许可',NULL,NULL,1488686743,1488686743),('index::main',2,'创建了 index::main 许可',NULL,NULL,1488693953,1488693953),('index::menu',2,'创建了 index::menu 许可',NULL,NULL,1488693953,1488693953),('index::top',2,'创建了 index::top 许可',NULL,NULL,1488693953,1488693953),('member::delete',2,'创建了 member::delete 许可',NULL,NULL,1489480259,1489480259),('member::index',2,'创建了 member::index 许可',NULL,NULL,1489475686,1489475686),('memberlevel::add',2,'创建了 memberlevel::add 许可',NULL,NULL,1488704737,1488704737),('memberlevel::delete',2,'创建了 memberlevel::delete 许可',NULL,NULL,1488704770,1488704770),('memberlevel::index',2,'创建了 memberlevel::index 许可',NULL,NULL,1488693779,1488693779),('memberlevel::update',2,'创建了 memberlevel::update 许可',NULL,NULL,1488704784,1488704784),('product::add',2,'创建了 product::add 许可',NULL,NULL,1488768991,1488768991),('product::index',2,'创建了 product::index 许可',NULL,NULL,1488693893,1488693893),('role::add',2,'创建了 role::add 许可',NULL,NULL,1488694831,1488694831),('role::delete',2,'创建了 role::delete 许可',NULL,NULL,1488698343,1488698343),('role::index',2,'创建了 role::index 许可',NULL,NULL,1488693774,1488693774),('role::rolenode',2,'创建了 role::rolenode 许可',NULL,NULL,1488693904,1488693904),('role::update',2,'创建了 role::update 许可',NULL,NULL,1488696863,1488696863),('超级管理员',1,'创建了 超级管理员角色、部门、权限组',NULL,NULL,1488688103,1488688103);
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
INSERT INTO `auth_item_child` VALUES ('超级管理员','admin::add'),('超级管理员','admin::delete'),('超级管理员','admin::error'),('超级管理员','admin::index'),('超级管理员','admin::login'),('超级管理员','admin::logout'),('超级管理员','admin::role'),('超级管理员','brand::add'),('超级管理员','brand::delete'),('超级管理员','brand::index'),('超级管理员','brand::update'),('超级管理员','brand::uploadimg'),('超级管理员','category::add'),('超级管理员','category::delete'),('超级管理员','category::index'),('超级管理员','category::update'),('超级管理员','goods::add'),('超级管理员','goods::editattr'),('超级管理员','goods::getattr'),('超级管理员','goods::index'),('超级管理员','goods::picture'),('超级管理员','goods::trash'),('超级管理员','goods::trashdelete'),('超级管理员','goods::trashindex'),('超级管理员','goods::trashrenew'),('超级管理员','goods::update'),('超级管理员','goods::uploadimg'),('超级管理员','goodsattr::add'),('超级管理员','goodsattr::delete'),('超级管理员','goodsattr::editattr'),('超级管理员','goodsattr::getattr'),('超级管理员','goodsattr::index'),('超级管理员','goodsattr::update'),('超级管理员','goodstype::add'),('超级管理员','goodstype::delete'),('超级管理员','goodstype::index'),('超级管理员','goodstype::update'),('超级管理员','index::index'),('超级管理员','index::main'),('超级管理员','index::menu'),('超级管理员','index::top'),('超级管理员','member::index'),('超级管理员','memberlevel::add'),('超级管理员','memberlevel::delete'),('超级管理员','memberlevel::index'),('超级管理员','memberlevel::update'),('超级管理员','product::add'),('超级管理员','product::index'),('超级管理员','role::add'),('超级管理员','role::delete'),('超级管理员','role::index'),('超级管理员','role::rolenode'),('超级管理员','role::update');
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
) ENGINE=MyISAM AUTO_INCREMENT=681 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_attrprice`
--

LOCK TABLES `shop_attrprice` WRITE;
/*!40000 ALTER TABLE `shop_attrprice` DISABLE KEYS */;
INSERT INTO `shop_attrprice` VALUES (312,18,35,'人民出版社',50.00),(311,18,35,'妇女出版社',60.00),(310,18,36,'25',0.00),(309,18,37,'2',200.00),(308,18,37,'1',100.00),(287,17,38,'300',0.00),(286,17,39,'白色',5800.00),(285,17,39,'绿色',5900.00),(284,17,39,'红色',6000.00),(321,19,38,'200',0.00),(320,19,39,'白色',6400.00),(319,19,39,'红色',6500.00),(318,19,39,'绿色',6300.00),(322,19,43,'联通4G',0.00),(362,20,43,'移动3G',0.00),(361,20,38,'200',0.00),(360,20,39,'白色',5800.00),(359,20,39,'绿色',6100.00),(358,20,39,'红色',6000.00),(363,22,39,'红色',1500.00),(364,22,39,'绿色',1400.00),(365,22,39,'白色',1300.00),(366,22,38,'200',0.00),(367,22,43,'移动3G',0.00),(647,30,39,'红色',56.00),(646,30,38,'56',0.00),(645,27,43,'电信5G',0.00),(644,27,39,'白色',6800.00),(643,27,39,'红色',6500.00),(417,24,43,'移动3G',0.00),(416,24,39,'绿色',14.00),(415,24,39,'红色',13.00),(414,24,39,'白色',12.00),(413,24,38,'45',0.00),(642,27,38,'500',0.00),(409,25,37,'1',30.00),(410,25,36,'300',0.00),(411,25,35,'青年出版社',20.00),(412,25,35,'人民出版社',30.00),(481,26,39,'红色',0.00),(480,26,38,'',0.00),(482,26,43,'移动3G',0.00),(648,30,39,'绿色',58.00),(649,30,39,'白色',67.00),(650,30,43,'联通4G',0.00),(651,31,38,'43534',0.00),(652,31,39,'红色',3453.00),(653,31,39,'白色',345.00),(654,31,43,'联通4G',0.00),(655,29,38,'1',0.00),(656,29,39,'红色',0.00),(657,29,43,'移动3G',0.00),(658,32,38,'54',0.00),(659,32,39,'红色',345.00),(660,32,39,'白色',435.00),(661,32,43,'移动3G',0.00),(662,33,38,'345',0.00),(663,33,39,'红色',345.00),(664,33,39,'白色',345.00),(665,33,43,'移动3G',0.00),(666,23,38,'200',0.00),(667,23,39,'红色',5500.00),(668,23,39,'白色',5600.00),(669,23,43,'电信5G',0.00),(670,34,38,'200',0.00),(671,34,39,'红色',5400.00),(672,34,39,'白色',6500.00),(673,34,43,'移动3G',0.00),(674,35,38,'200',0.00),(675,35,39,'红色',6200.00),(676,35,39,'白色',6500.00),(677,35,43,'联通4G',0.00),(678,35,44,'4.7寸',6300.00),(679,35,44,'6.0寸',7300.00),(680,35,44,'5.7寸',6500.00);
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_brand`
--

LOCK TABLES `shop_brand` WRITE;
/*!40000 ALTER TABLE `shop_brand` DISABLE KEYS */;
INSERT INTO `shop_brand` VALUES (26,'纸质书','http://www.book.com','uploads/20170309/1489057013small8319.png','',50,1),(25,'苹果','http://www.apple.com','uploads/20170307/1488892456small4391.png','',50,1),(24,'小米','http://www.xiaomi.com','uploads/20170307/1488878166small5315.png','',60,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (11,'功能手机',9,'',1,0,''),(10,'智能手机',9,'',1,0,''),(9,'手机',0,'台',1,0,''),(12,'家电',0,'',1,0,''),(13,'冰箱',12,'',1,0,''),(14,'洗衣机',12,'',1,0,''),(15,'图书',0,'本',0,0,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_discount`
--

LOCK TABLES `shop_discount` WRITE;
/*!40000 ALTER TABLE `shop_discount` DISABLE KEYS */;
INSERT INTO `shop_discount` VALUES (268,28,1,100.00),(267,27,3,1000.00),(145,25,100,1000.00),(271,23,40,600.00),(270,23,30,500.00),(132,20,10,1000.00),(131,20,20,3000.00),(116,19,2,200.00),(115,19,4,500.00),(112,18,100,10.00),(111,18,200,20.00),(102,17,20,2500.00),(269,28,2,200.00),(272,34,2,100.00),(273,34,5,300.00),(274,35,10,1100.00),(275,35,20,3000.00);
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goods`
--

LOCK TABLES `shop_goods` WRITE;
/*!40000 ALTER TABLE `shop_goods` DISABLE KEYS */;
INSERT INTO `shop_goods` VALUES (23,'外星人','1489053700',9,25,15,3800.00,6500.00,-1,0,NULL,NULL,NULL,'uploads/20170309/1489052704primary7540.png','uploads/20170309/1489052704big5447.png','uploads/20170309/1489052704median7636.png','uploads/20170309/1489052704small6196.png','<script>alert(111);</script>','',50,65,1,1,0,1),(28,'awgawg','1489054414',0,0,0,3252.00,4545.00,-1,0,NULL,NULL,NULL,'','','','','ewtwet','',45,45,1,1,0,1),(34,'苹果8','1489056284',10,25,15,6300.00,6500.00,-1,0,NULL,NULL,NULL,'','','','','最好用的手机','',50,50,1,1,0,1),(29,'34534','5345',0,0,15,345345.00,345345.00,-1,0,NULL,NULL,NULL,'','','','','34534','',34534,5345345,1,1,0,1),(30,'45645','6456456',0,0,15,456456.00,546456.00,-1,0,NULL,NULL,NULL,'','','','','546456','',5464,56456,1,1,0,1),(31,'34545','345345',0,0,15,345345.00,345345.00,-1,0,NULL,NULL,NULL,'','','','','34534','',345,345,1,1,0,1),(33,'354','345345',0,0,15,345345.00,345.00,-1,0,NULL,NULL,NULL,'','','','','345','',345,345,1,1,0,1),(35,'苹果8','1489056640',10,25,15,6200.00,6500.00,-1,0,NULL,NULL,NULL,'','','','','最好用的手机','',20,30,1,1,0,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsattr`
--

LOCK TABLES `shop_goodsattr` WRITE;
/*!40000 ALTER TABLE `shop_goodsattr` DISABLE KEYS */;
INSERT INTO `shop_goodsattr` VALUES (39,15,'颜色',1,'红色,白色,绿色'),(37,14,'作者',0,''),(38,15,'重量',0,''),(36,14,'价格',0,''),(35,14,'出版社',1,'青年出版社,人民出版社,妇女出版社'),(44,15,'屏幕大小',1,'4.7寸,5.7寸,6.0寸'),(43,15,'制式',0,'移动3G,联通4G,电信5G');
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
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsimg`
--

LOCK TABLES `shop_goodsimg` WRITE;
/*!40000 ALTER TABLE `shop_goodsimg` DISABLE KEYS */;
INSERT INTO `shop_goodsimg` VALUES (133,18,'temp/1488816127primary7967.png','temp/1488816127big2138.png','temp/1488816127median4030.png','temp/1488816127small5628.png'),(201,27,'uploads/20170309/1489054170primary9644.png','uploads/20170309/1489054171big2206.png','uploads/20170309/1489054171median5613.png','uploads/20170309/1489054170small395.png '),(162,25,'uploads/20170307/1488880126primary3475.png','uploads/20170307/1488880127big4141.png','uploads/20170307/1488880127median6860.png','uploads/20170307/1488880126small1813.png'),(125,17,'uploads/20170305/1488725333primary5622.png','uploads/20170305/1488725333big9662.png','uploads/20170305/1488725333median3091.png','uploads/20170305/1488725333small4595.png          '),(126,17,'uploads/20170305/1488725337primary9246.png','uploads/20170305/1488725338big4912.png','uploads/20170305/1488725338median9734.png','uploads/20170305/1488725337small3209.png          '),(153,21,'uploads/20170307/1488853070primary3397.png','uploads/20170307/1488853070big3443.png','uploads/20170307/1488853070median5698.png','uploads/20170307/1488853070small385.png'),(155,22,'uploads/20170307/1488853082primary5119.png','uploads/20170307/1488853082big3393.png','uploads/20170307/1488853082median1646.png','uploads/20170307/1488853082small663.png '),(169,26,'uploads/20170309/1489050644primary1567.png','uploads/20170309/1489050645big553.png','uploads/20170309/1489050645median6898.png','uploads/20170309/1489050644small1658.png '),(170,26,'uploads/20170309/1489050655primary1929.png','uploads/20170309/1489050655big7588.png','uploads/20170309/1489050655median7664.png','uploads/20170309/1489050655small9039.png'),(171,26,'uploads/20170309/1489050659primary8754.png','uploads/20170309/1489050660big2113.png','uploads/20170309/1489050659median7196.png','uploads/20170309/1489050659small3229.png'),(202,23,'uploads/20170309/1489052712primary4341.png','uploads/20170309/1489052713big3323.png','uploads/20170309/1489052713median7897.png','uploads/20170309/1489052712small7939.png          ');
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
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
-- Table structure for table `shop_member`
--

DROP TABLE IF EXISTS `shop_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `check_code` char(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '校验值',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态, 0未激活,1已激活',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_member`
--

LOCK TABLES `shop_member` WRITE;
/*!40000 ALTER TABLE `shop_member` DISABLE KEYS */;
INSERT INTO `shop_member` VALUES (21,'tw1996','A1QVozJjIZQilh0etL07RINq-wPecgu8','$2y$13$SkvJxY/jjGU8ASdYBneuAuuRWuQcF3WV8AHZqY5wH8ccJ4eunmDFC','2698143402@qq.com','2017-03-14 12:56:52','2017-03-14 12:56:52','bf8fcbf9f66ffc6535014f11d0093790',1);
/*!40000 ALTER TABLE `shop_member` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
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
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_memberprice`
--

LOCK TABLES `shop_memberprice` WRITE;
/*!40000 ALTER TABLE `shop_memberprice` DISABLE KEYS */;
INSERT INTO `shop_memberprice` VALUES (60,23,7,-1.00),(59,22,11,-1.00),(58,22,9,-1.00),(57,22,7,-1.00),(56,21,11,-1.00),(55,21,9,-1.00),(54,21,7,-1.00),(53,20,11,-1.00),(52,20,9,5300.00),(51,20,7,-1.00),(50,19,11,6500.00),(49,19,9,-1.00),(48,19,7,-1.00),(47,18,11,-1.00),(46,18,9,-1.00),(45,18,7,-1.00),(44,17,11,-1.00),(43,17,9,5000.00),(42,17,7,-1.00),(61,23,9,2800.00),(62,23,11,-1.00),(63,24,7,-1.00),(64,24,9,-1.00),(65,24,11,-1.00),(66,25,7,-1.00),(67,25,9,-1.00),(68,25,11,-1.00),(69,26,7,-1.00),(70,26,9,-1.00),(71,26,11,-1.00),(72,27,7,-1.00),(73,27,9,-1.00),(74,27,11,6100.00),(75,28,7,-1.00),(76,28,9,-1.00),(77,28,11,-1.00),(78,29,7,3200.00),(79,29,9,4500.00),(80,29,11,-1.00),(81,30,7,-1.00),(82,30,9,-1.00),(83,30,11,-1.00),(84,31,7,-1.00),(85,31,9,-1.00),(86,31,11,-1.00),(87,32,7,-1.00),(88,32,9,-1.00),(89,32,11,-1.00),(90,33,7,-1.00),(91,33,9,-1.00),(92,33,11,-1.00),(93,34,7,-1.00),(94,34,9,6100.00),(95,34,11,-1.00),(96,35,7,-1.00),(97,35,9,6000.00),(98,35,11,-1.00);
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
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (23,'30',17,'254',80),(24,'40',17,'253',80),(25,'90',17,'252',40),(28,'10',18,'288,291',10),(29,'20',18,'289,292',10),(119,'1489056886',35,'676,678',1),(60,'1488854752',24,'400,402',30),(76,'15',34,'672',60),(59,'1488854720',24,'401,402',35),(75,'12',34,'671',30),(118,'1489056677',35,'675,680',1),(117,'1489056677',35,'675,679',1),(116,'1489056677',35,'675,678',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_user`
--

LOCK TABLES `shop_user` WRITE;
/*!40000 ALTER TABLE `shop_user` DISABLE KEYS */;
INSERT INTO `shop_user` VALUES (5,'admin','WaS3K8-L3MQVITLZ3DxSeaGQfy6pAaZU','$2y$13$HTeV5GkBybGanNEBwo/nt.4guZlK4HGWK37uK98BXN.hnvUZKkXpC','admin@qq.com','2017-03-06 01:59:57','2017-03-06 01:59:57'),(6,'root','c3U3epKa7oTzaqrr59bdbMM6PbWSvBNV','$2y$13$18zSqxPv6J/7FrYADg9E..iXhVoA7sNNE3EoNmhKaEo3oQO5RB9kS','root@qq.com','2017-03-07 09:22:15','2017-03-07 09:22:15');
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

-- Dump completed on 2017-03-14 23:41:58
