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
INSERT INTO `auth_assignment` VALUES ('goods::trashrenew','6',1488887143),('member::index','6',1489475686),('超级管理员','3',1488765549),('超级管理员','5',1490369364),('超级管理员','6',1488878544);
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
INSERT INTO `auth_item` VALUES ('admin::add',2,'创建了 admin::add 许可',NULL,NULL,1488697126,1488697126),('admin::delete',2,'创建了 admin::delete 许可',NULL,NULL,1488699924,1488699924),('admin::error',2,'创建了 admin::error 许可',NULL,NULL,1488702202,1488702202),('admin::index',2,'创建了 admin::index 许可',NULL,NULL,1488694824,1488694824),('admin::login',2,'创建了 admin::login 许可',NULL,NULL,1488694894,1488694894),('admin::logout',2,'创建了 admin::logout 许可',NULL,NULL,1488694894,1488694894),('admin::role',2,'创建了 admin::role 许可',NULL,NULL,1488694825,1488694825),('adver::add',2,'创建了 adver::add 许可',NULL,NULL,1489983549,1489983549),('adver::delete',2,'创建了 adver::delete 许可',NULL,NULL,1490003704,1490003704),('adver::index',2,'创建了 adver::index 许可',NULL,NULL,1489983106,1489983106),('adver::update',2,'创建了 adver::update 许可',NULL,NULL,1489987493,1489987493),('adver::uploadimg',2,'创建了 adver::uploadimg 许可',NULL,NULL,1489984249,1489984249),('brand::add',2,'创建了 brand::add 许可',NULL,NULL,1488693889,1488693889),('brand::delete',2,'创建了 brand::delete 许可',NULL,NULL,1488703946,1488703946),('brand::index',2,'创建了 brand::index 许可',NULL,NULL,1488693888,1488693888),('brand::update',2,'创建了 brand::update 许可',NULL,NULL,1488704360,1488704360),('brand::uploadimg',2,'创建了 brand::uploadimg 许可',NULL,NULL,1488704148,1488704148),('category::add',2,'创建了 category::add 许可',NULL,NULL,1488693883,1488693883),('category::delete',2,'创建了 category::delete 许可',NULL,NULL,1488701596,1488701596),('category::index',2,'创建了 category::index 许可',NULL,NULL,1488693882,1488693882),('category::update',2,'创建了 category::update 许可',NULL,NULL,1488701586,1488701586),('goods::add',2,'创建了 goods::add 许可',NULL,NULL,1488693891,1488693891),('goods::editattr',2,'创建了 goods::editattr 许可',NULL,NULL,1488815420,1488815420),('goods::getattr',2,'创建了 goods::getattr 许可',NULL,NULL,1488814869,1488814869),('goods::index',2,'创建了 goods::index 许可',NULL,NULL,1488693890,1488693890),('goods::picture',2,'创建了 goods::picture 许可',NULL,NULL,1488711920,1488711920),('goods::trash',2,'创建了 goods::trash 许可',NULL,NULL,1488705824,1488705824),('goods::trashdelete',2,'创建了 goods::trashdelete 许可',NULL,NULL,1488850209,1488850209),('goods::trashindex',2,'创建了 goods::trashindex 许可',NULL,NULL,1488693895,1488693895),('goods::trashrenew',2,'创建了 goods::trashrenew 许可',NULL,NULL,1488887142,1488887142),('goods::update',2,'创建了 goods::update 许可',NULL,NULL,1488705830,1488705830),('goods::uploadimg',2,'创建了 goods::uploadimg 许可',NULL,NULL,1488813289,1488813289),('goodsattr::add',2,'创建了 goodsattr::add 许可',NULL,NULL,1488701992,1488701992),('goodsattr::delete',2,'创建了 goodsattr::delete 许可',NULL,NULL,1488702392,1488702392),('goodsattr::editattr',2,'创建了 goodsattr::editattr 许可',NULL,NULL,1488705830,1488705830),('goodsattr::getattr',2,'创建了 goodsattr::getattr 许可',NULL,NULL,1488713852,1488713852),('goodsattr::index',2,'创建了 goodsattr::index 许可',NULL,NULL,1488702043,1488702043),('goodsattr::update',2,'创建了 goodsattr::update 许可',NULL,NULL,1488702126,1488702126),('goodstype::add',2,'创建了 goodstype::add 许可',NULL,NULL,1488693887,1488693887),('goodstype::delete',2,'创建了 goodstype::delete 许可',NULL,NULL,1488702060,1488702060),('goodstype::index',2,'创建了 goodstype::index 许可',NULL,NULL,1488693885,1488693885),('goodstype::update',2,'创建了 goodstype::update 许可',NULL,NULL,1488702055,1488702055),('index::index',2,'创建了 index::index 许可',NULL,NULL,1488686743,1488686743),('index::main',2,'创建了 index::main 许可',NULL,NULL,1488693953,1488693953),('index::menu',2,'创建了 index::menu 许可',NULL,NULL,1488693953,1488693953),('index::top',2,'创建了 index::top 许可',NULL,NULL,1488693953,1488693953),('member::delete',2,'创建了 member::delete 许可',NULL,NULL,1489480259,1489480259),('member::index',2,'创建了 member::index 许可',NULL,NULL,1489475686,1489475686),('memberlevel::add',2,'创建了 memberlevel::add 许可',NULL,NULL,1488704737,1488704737),('memberlevel::delete',2,'创建了 memberlevel::delete 许可',NULL,NULL,1488704770,1488704770),('memberlevel::index',2,'创建了 memberlevel::index 许可',NULL,NULL,1488693779,1488693779),('memberlevel::update',2,'创建了 memberlevel::update 许可',NULL,NULL,1488704784,1488704784),('product::add',2,'创建了 product::add 许可',NULL,NULL,1488768991,1488768991),('product::index',2,'创建了 product::index 许可',NULL,NULL,1488693893,1488693893),('role::add',2,'创建了 role::add 许可',NULL,NULL,1488694831,1488694831),('role::delete',2,'创建了 role::delete 许可',NULL,NULL,1488698343,1488698343),('role::index',2,'创建了 role::index 许可',NULL,NULL,1488693774,1488693774),('role::rolenode',2,'创建了 role::rolenode 许可',NULL,NULL,1488693904,1488693904),('role::update',2,'创建了 role::update 许可',NULL,NULL,1488696863,1488696863),('超级管理员',1,'创建了 超级管理员角色、部门、权限组',NULL,NULL,1488688103,1488688103);
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
INSERT INTO `auth_item_child` VALUES ('超级管理员','admin::add'),('超级管理员','admin::delete'),('超级管理员','admin::error'),('超级管理员','admin::index'),('超级管理员','admin::login'),('超级管理员','admin::logout'),('超级管理员','admin::role'),('超级管理员','adver::add'),('超级管理员','adver::delete'),('超级管理员','adver::index'),('超级管理员','adver::update'),('超级管理员','adver::uploadimg'),('超级管理员','brand::add'),('超级管理员','brand::delete'),('超级管理员','brand::index'),('超级管理员','brand::update'),('超级管理员','brand::uploadimg'),('超级管理员','category::add'),('超级管理员','category::delete'),('超级管理员','category::index'),('超级管理员','category::update'),('超级管理员','goods::add'),('超级管理员','goods::editattr'),('超级管理员','goods::getattr'),('超级管理员','goods::index'),('超级管理员','goods::picture'),('超级管理员','goods::trash'),('超级管理员','goods::trashdelete'),('超级管理员','goods::trashindex'),('超级管理员','goods::trashrenew'),('超级管理员','goods::update'),('超级管理员','goods::uploadimg'),('超级管理员','goodsattr::add'),('超级管理员','goodsattr::delete'),('超级管理员','goodsattr::editattr'),('超级管理员','goodsattr::getattr'),('超级管理员','goodsattr::index'),('超级管理员','goodsattr::update'),('超级管理员','goodstype::add'),('超级管理员','goodstype::delete'),('超级管理员','goodstype::index'),('超级管理员','goodstype::update'),('超级管理员','index::index'),('超级管理员','index::main'),('超级管理员','index::menu'),('超级管理员','index::top'),('超级管理员','member::delete'),('超级管理员','member::index'),('超级管理员','memberlevel::add'),('超级管理员','memberlevel::delete'),('超级管理员','memberlevel::index'),('超级管理员','memberlevel::update'),('超级管理员','product::add'),('超级管理员','product::index'),('超级管理员','role::add'),('超级管理员','role::delete'),('超级管理员','role::index'),('超级管理员','role::rolenode'),('超级管理员','role::update');
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
-- Table structure for table `shop_adver`
--

DROP TABLE IF EXISTS `shop_adver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_adver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned NOT NULL,
  `title` varchar(600) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `small_img` varchar(50) NOT NULL DEFAULT '',
  `big_img` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_adver`
--

LOCK TABLES `shop_adver` WRITE;
/*!40000 ALTER TABLE `shop_adver` DISABLE KEYS */;
INSERT INTO `shop_adver` VALUES (9,0,'电脑数码双11爆品抢不停','http://www.tw1996.com/index.php?r=goods/detail&id=37','',''),(10,0,'家具家装全场低至3折','http://www.tw1996.com/index.php?r=goods/detail&id=38','',''),(11,0,'享生活 疯狂周期购！','http://www.tw1996.com/index.php?r=goods/detail&id=51','',''),(12,1,'','http://www.tw1996.com/index.php?r=goods/detail&id=42','uploads/20170320/1490004671median8370.jpg','uploads/20170320/1490004671big6487.jpg'),(14,2,'','http://www.tw1996.com/index.php?r=goods/detail&id=37','uploads/20170324/1490363479median7855.jpg','uploads/20170324/1490363479big325.jpg'),(19,2,'','http://www.shop.com/index.php?r=goods/detail&id=36','uploads/20170324/1490363492median8894.jpg','uploads/20170324/1490363492big9012.jpg'),(20,2,'','http://www.shop.com/index.php?r=goods/detail&id=42','uploads/20170324/1490363504median7890.jpg','uploads/20170324/1490363504big2648.jpg'),(21,0,'周末宅吃，低至5折！','http://www.shop.com/index.php?r=goods/detail&id=37','',''),(22,0,'买电视最高减3000','http://www.shop.com/index.php?r=goods/detail&id=45','','');
/*!40000 ALTER TABLE `shop_adver` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=1683 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_attrprice`
--

LOCK TABLES `shop_attrprice` WRITE;
/*!40000 ALTER TABLE `shop_attrprice` DISABLE KEYS */;
INSERT INTO `shop_attrprice` VALUES (1682,54,59,'3.8kg',0.00),(1581,53,58,'美国进口',100.00),(1580,53,58,'中国大陆',0.00),(760,41,51,'液晶',0.00),(759,41,50,'600',0.00),(758,41,49,'白色',6700.00),(1594,38,49,'黑色',0.00),(1593,38,49,'红色',100.00),(1592,38,48,'16G',500.00),(1636,36,51,'液晶',0.00),(755,41,48,'4G',6300.00),(756,41,48,'8G',6500.00),(757,41,49,'红色',6600.00),(1591,38,48,'8G',0.00),(1615,37,51,'液晶',0.00),(1614,37,50,'2.3kg',0.00),(1613,37,49,'黑色',100.00),(1612,37,49,'红色',0.00),(1611,37,48,'16G',200.00),(1610,37,48,'8G',100.00),(1609,37,48,'4G',0.00),(1635,36,50,'1000',0.00),(1634,36,49,'白色',300.00),(1633,36,49,'黑色',300.00),(1632,36,48,'4G',100.00),(646,30,38,'56',0.00),(645,27,43,'电信5G',0.00),(644,27,39,'白色',6800.00),(643,27,39,'红色',6500.00),(417,24,43,'移动3G',0.00),(416,24,39,'绿色',14.00),(415,24,39,'红色',13.00),(414,24,39,'白色',12.00),(413,24,38,'45',0.00),(642,27,38,'500',0.00),(409,25,37,'1',30.00),(410,25,36,'300',0.00),(411,25,35,'青年出版社',20.00),(412,25,35,'人民出版社',30.00),(481,26,39,'红色',0.00),(480,26,38,'',0.00),(482,26,43,'移动3G',0.00),(648,30,39,'绿色',58.00),(649,30,39,'白色',67.00),(650,30,43,'联通4G',0.00),(651,31,38,'43534',0.00),(652,31,39,'红色',3453.00),(653,31,39,'白色',345.00),(654,31,43,'联通4G',0.00),(655,29,38,'1',0.00),(656,29,39,'红色',0.00),(657,29,43,'移动3G',0.00),(658,32,38,'54',0.00),(659,32,39,'红色',345.00),(660,32,39,'白色',435.00),(661,32,43,'移动3G',0.00),(662,33,38,'345',0.00),(663,33,39,'红色',345.00),(664,33,39,'白色',345.00),(665,33,43,'移动3G',0.00),(666,23,38,'200',0.00),(667,23,39,'红色',5500.00),(668,23,39,'白色',5600.00),(669,23,43,'电信5G',0.00),(670,34,38,'200',0.00),(671,34,39,'红色',5400.00),(672,34,39,'白色',6500.00),(673,34,43,'移动3G',0.00),(674,35,38,'200',0.00),(675,35,39,'红色',6200.00),(676,35,39,'白色',6500.00),(677,35,43,'联通4G',0.00),(678,35,44,'4.7寸',6300.00),(679,35,44,'6.0寸',7300.00),(680,35,44,'5.7寸',6500.00),(1579,53,57,'8.5米',0.00),(1578,53,57,'5米',0.00),(1621,43,51,'液晶',0.00),(1620,43,50,'1.5kg',0.00),(1617,43,48,'8G',200.00),(1618,43,49,'红色',100.00),(1661,44,48,'4G',100.00),(1665,44,50,'300',0.00),(1664,44,49,'白色',200.00),(1663,44,49,'红色',100.00),(1619,43,49,'白色',300.00),(1577,53,57,'3.5米',0.00),(1576,53,56,'三级能效',0.00),(1575,53,56,'二级能效',0.00),(1574,53,56,'一级能效',500.00),(1573,53,55,'50寸',0.00),(1572,53,55,'60寸',100.00),(1616,43,48,'4G',100.00),(1590,42,51,'液晶',0.00),(1589,42,50,'3.6kg',0.00),(1588,42,49,'白色',1000.00),(1587,42,49,'红色',0.00),(1586,42,49,'黑色',600.00),(1585,42,48,'16G',400.00),(1584,42,48,'8G',200.00),(1583,42,48,'4G',0.00),(1571,53,55,'70寸以上',200.00),(1681,54,58,'美国进口',500.00),(1680,54,58,'中国大陆',0.00),(1679,54,57,'3.5米',0.00),(1678,54,56,'二级能效',0.00),(1677,54,56,'一级能效',0.00),(1517,55,58,'中国大陆',0.00),(1516,55,57,'5米',0.00),(1515,55,57,'3.5米',0.00),(1514,55,56,'二级能效',0.00),(1513,55,56,'一级能效',500.00),(1512,55,55,'40寸',0.00),(1511,55,55,'50寸',100.00),(1518,55,59,'2.68kg',0.00),(1676,54,55,'60寸',0.00),(1582,53,59,'3.78kg',0.00),(1595,38,50,'2.5kg',0.00),(1596,38,51,'液晶',0.00),(1662,44,48,'8G',200.00),(1649,51,48,'4G',0.00),(1650,51,49,'红色',0.00),(1651,51,50,'0.5kg',0.00),(1652,51,51,'液晶',0.00),(1659,46,50,'1.5kg',0.00),(1658,46,49,'黑色',0.00),(1657,46,48,'4G',0.00),(1660,46,51,'液晶',0.00),(1666,44,51,'液晶',0.00),(1675,54,55,'70寸以上',0.00);
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_brand`
--

LOCK TABLES `shop_brand` WRITE;
/*!40000 ALTER TABLE `shop_brand` DISABLE KEYS */;
INSERT INTO `shop_brand` VALUES (26,'乐视','http://www.leshi.com','uploads/20170309/1489057013small8319.png','',50,1),(25,'苹果','http://www.apple.com','uploads/20170307/1488892456small4391.png','',50,1),(24,'小米','http://www.xiaomi.com','uploads/20170307/1488878166small5315.png','',60,1),(27,'联想','http://www.lenov.com','uploads/20170315/1489571899small9211.jpg','',50,1),(28,'戴尔','http://www.daier.com','uploads/20170316/1489656889small8828.jpg','',50,1),(29,'康佳','http://www.kanjia.com','uploads/20170324/1490365865small3147.jpg','',50,1),(30,'海信','http://www.haixing.com','uploads/20170324/1490365928small2243.jpg','',50,1);
/*!40000 ALTER TABLE `shop_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `attr` varchar(100) NOT NULL DEFAULT '',
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`goods_id`),
  KEY `arrt` (`attr`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (32,28,37,'1612,1609',3);
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_category`
--

LOCK TABLES `shop_category` WRITE;
/*!40000 ALTER TABLE `shop_category` DISABLE KEYS */;
INSERT INTO `shop_category` VALUES (12,'家用电器',0,'',1,0,''),(57,'鼠标',49,'',1,0,''),(14,'电视',12,'',1,0,''),(17,'手机,数码',0,'',1,0,''),(18,'手机通讯',17,'',1,0,''),(19,'手机配件',17,'',1,0,''),(55,'显示器',48,'',1,0,''),(21,'数码配件',17,'',1,0,''),(62,'存储卡',21,'',1,0,''),(23,'手机',18,'',1,0,''),(24,'对讲机',18,'',1,0,''),(25,'手机维修',18,'',1,0,''),(26,'手机壳',19,'',1,0,''),(27,'贴膜',19,'',1,0,''),(56,'CPU',48,'',1,0,''),(28,'互联网品牌',14,'',1,0,''),(29,'笔记本电脑',47,'',1,0,''),(30,'台式电脑',47,'',1,0,''),(31,'男装,女装,童装,内衣',0,'',1,0,''),(32,'女装',31,'',1,0,''),(33,'男装',31,'',1,0,''),(34,'内衣',31,'',1,0,''),(35,'商场同款',32,'',1,0,''),(36,'当季热卖',32,'',1,0,''),(37,'2017新品',32,'',1,0,''),(38,'夹克',33,'',1,0,''),(39,'卫衣',33,'',1,0,''),(40,'毛绒大衣',33,'',1,0,''),(41,'文胸',34,'',1,0,''),(42,'配饰',34,'',1,0,''),(45,'合资品牌',14,'',1,0,''),(46,'电脑,办公',0,'',1,0,''),(47,'电脑整机',46,'',1,0,''),(48,'电脑配件',46,'',1,0,''),(49,'外设产品',46,'',1,0,''),(61,'柜式空调',59,'',1,0,''),(60,'壁挂式空调',59,'',1,0,''),(59,'空调',12,'',1,0,''),(58,'键盘',49,'',1,0,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=289 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_discount`
--

LOCK TABLES `shop_discount` WRITE;
/*!40000 ALTER TABLE `shop_discount` DISABLE KEYS */;
INSERT INTO `shop_discount` VALUES (284,55,10,5000.00),(288,36,2,1000.00);
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
  `goods_name` varchar(200) NOT NULL COMMENT '商品名称',
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
  `is_bestsale` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `is_crazy` tinyint(4) NOT NULL DEFAULT '0' COMMENT '疯狂抢购',
  `is_recomend` tinyint(4) NOT NULL DEFAULT '0' COMMENT '推荐商品',
  `is_new` tinyint(4) NOT NULL DEFAULT '0' COMMENT '新品上架',
  `is_guess` tinyint(4) NOT NULL DEFAULT '0' COMMENT '猜您喜欢',
  `is_first` tinyint(4) NOT NULL DEFAULT '0' COMMENT '网站首发',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goods`
--

LOCK TABLES `shop_goods` WRITE;
/*!40000 ALTER TABLE `shop_goods` DISABLE KEYS */;
INSERT INTO `shop_goods` VALUES (40,'戴尔电脑','1489580166',29,27,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170315/1489580267primary6807.jpg','uploads/20170315/1489580267big9986.jpg','uploads/20170315/1489580267median1487.jpg','uploads/20170315/1489580267small5827.jpg','最便宜的电脑','',122,12,1,1,1,1,0,0,0,0,0,0),(41,'鸿基电脑','1489580232',29,27,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170315/1489580192primary191.jpg','uploads/20170315/1489580192big2608.jpg','uploads/20170315/1489580192median3607.jpg','uploads/20170315/1489580192small1555.jpg','最烂的电脑','',122,12,1,1,1,1,0,0,0,0,0,0),(42,'联想(Lenovo)小新Air ','1489580395',29,27,19,5800.00,6300.00,-1,1,6000.00,'三月 2, 2017','三月 9, 2017','uploads/20170324/1490368274primary1301.jpg','uploads/20170324/1490368274big4091.jpg','uploads/20170324/1490368274median5576.jpg','uploads/20170324/1490368274small7857.jpg',' 厂家服务\r\n本产品全国联保，享受三包服务，质保期为：二年质保\r\n如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！\r\n(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.lenovo.com.cn/\r\n售后服务电话：400-990-8888\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！','',999,10,1,1,0,0,0,0,0,0,0,1),(38,'联想(Lenovo)天逸310标配版','1489554648',29,27,19,12000.00,15000.00,-1,0,NULL,NULL,NULL,'uploads/20170315/1489554857primary9386.jpg','uploads/20170315/1489554857big187.jpg','uploads/20170315/1489554857median3002.jpg','uploads/20170315/1489554857small1743.jpg','本产品全国联保，享受三包服务，质保期为：二年质保\r\n如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！\r\n(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.lenovo.com.cn/\r\n售后服务电话：400-990-8888\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！','',998,10,1,1,0,0,0,0,0,0,0,0),(39,'鸿基电脑','1489580105',29,27,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170315/1489580103primary8768.jpg','uploads/20170315/1489580103big5138.jpg','uploads/20170315/1489580103median2313.jpg','uploads/20170315/1489580103small3197.jpg','最烂的电脑','',122,12,1,1,1,1,0,0,0,0,0,0),(37,'联想（Lenovo）H3060 台式办公电脑整机','1489554588',30,27,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170316/1489638794primary8523.jpg','uploads/20170316/1489638794big5221.jpg','uploads/20170316/1489638794median101.jpg','uploads/20170316/1489638794small5794.jpg','本产品全国联保，享受三包服务，质保期为：三年质保\r\n如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！\r\n(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.lenovo.com.cn/\r\n售后服务电话：400-990-8888\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！','',100,10,1,1,0,0,1,0,0,0,0,0),(36,'联想ThinkPad','1489552748',30,27,19,6800.00,7500.00,-1,0,NULL,NULL,NULL,'uploads/20170315/1489571770primary6745.jpg','uploads/20170315/1489571770big4798.jpg','uploads/20170315/1489571770median3860.jpg','uploads/20170315/1489571770small6923.jpg','联想经典款电脑','',50,5,1,1,0,0,0,0,0,0,0,0),(43,'外星人电脑','1489623814',30,25,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490368746primary9568.jpg','uploads/20170324/1490368746big706.jpg','uploads/20170324/1490368746median5806.jpg','uploads/20170324/1490368746small1729.jpg','游戏电脑','',100,10,1,1,1,1,0,0,0,1,0,0),(44,'戴尔(DELL)灵越飞匣','1489624702',29,28,19,12000.00,13000.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490368996primary3564.jpg','uploads/20170324/1490368997big4752.jpg','uploads/20170324/1490368997median2183.jpg','uploads/20170324/1490368996small422.jpg','本产品全国联保，享受三包服务，质保期为：全国联保二年\r\n如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！\r\n(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.dell.com.cn/\r\n售后服务电话：8008582969\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！\r\n正品行货\r\n京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。','',23,2,1,1,0,0,0,0,0,1,0,0),(45,'神州笔记本','1489630572',29,0,0,1500.00,1800.00,-1,0,NULL,NULL,NULL,'uploads/20170316/1489631006primary9398.jpg','uploads/20170316/1489631006big1902.jpg','uploads/20170316/1489631006median5244.jpg','uploads/20170316/1489631006small7022.jpg','垃圾','',435,345,1,1,0,0,0,0,0,0,1,0),(46,'戴尔DELL灵越燃7000','1489677255',29,0,19,5800.00,6300.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490369344primary2931.jpg','uploads/20170324/1490369344big781.jpg','uploads/20170324/1490369344median8750.jpg','uploads/20170324/1490369344small2409.jpg','电脑本产品全国联保，享受三包服务，质保期为：全国联保二年\r\n如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！\r\n(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.dell.com.cn/\r\n售后服务电话：8008582969\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！','',123,12,1,1,0,0,0,0,0,0,0,0),(47,'苹果8','1489816127',10,25,0,5600.01,7300.00,-1,0,NULL,NULL,NULL,'uploads/20170318/1489816040primary8406.jpg','uploads/20170318/1489816040big2617.jpg','uploads/20170318/1489816040median670.jpg','uploads/20170318/1489816040small1404.jpg','最好用的手机','',500,10,1,1,1,1,0,0,0,0,0,0),(48,'4653246','346346',52,0,0,346436.00,346.00,-1,0,NULL,NULL,NULL,'','','','','346','',346,346,1,1,1,1,0,0,0,0,0,0),(50,'35235235','235235',0,0,0,235235.00,235.00,-1,0,NULL,NULL,NULL,'','','','','235','',235,235,1,1,1,1,0,0,0,0,0,0),(51,'中柏（jumper）14英寸轻薄','1489977499',30,27,19,13150.00,15000.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490369129primary5728.jpg','uploads/20170324/1490369129big8570.jpg','uploads/20170324/1490369129median8942.jpg','uploads/20170324/1490369129small9865.jpg',' 卖家服务\r\n本产品全国联保，享受三包服务，质保期为：一年质保\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！\r\n正品行货\r\n京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。','',234,20,1,1,0,0,0,0,0,0,1,0),(52,'235235','235235',0,0,0,235235.00,325.00,-1,0,NULL,NULL,NULL,'','','','','235','',235,235,1,1,1,1,0,0,0,0,0,1),(53,'海信（Hisense）LED65EC780UC 65英寸 曲面4','1490366471',45,30,21,7999.00,8999.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490366354primary4785.jpg','uploads/20170324/1490366354big3288.jpg','uploads/20170324/1490366354median1674.jpg','uploads/20170324/1490366354small9507.jpg','权利声明：\r\n京东上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东重要的经营资源，未经许可，禁止非法转载使用。\r\n注：本站商品信息均来自于合作方，其真实性、准确性和合法性由信息拥有者（合作方）负责。本站不提供任何保证，并不承担任何法律责任。\r\n\r\n价格说明：\r\n京东价：京东价为商品的销售价，是您最终决定是否购买商品的依据。\r\n划线价：商品展示的划横线价格为参考价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在京东平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。\r\n折扣：如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。\r\n异常问题：商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。\r\n\r\n能效标识说明：\r\n根据国家相关能效标识法规和标准的要求，京东自营在售商品的能效标识图样，将会逐步替换为新版能源效率标识贴；受能效标识标准变化影响，部分产品的新版和旧版能效标识，在能效等级、测试值等方面会有差','',1000,10,1,1,0,0,0,0,0,0,0,1),(54,'康佳（KONKA）S55U 55英寸','1490367246',45,29,21,2999.00,3999.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490367169primary8390.jpg','uploads/20170324/1490367169big6983.jpg','uploads/20170324/1490367169median6862.jpg','uploads/20170324/1490367169small9306.jpg',' 厂家服务\r\n本产品全国联保，享受三包服务，质保期为：一年质保\r\n本产品提供上门安装调试、提供上门检测和维修等售后服务，自收到商品之日起，如您所购买家电商品出现质量问题，请先联系厂家进行检测，凭厂商提供的故障检测证明，在“我的京东-客户服务-返修退换货”页面提交退换申请，将有专业售后人员提供服务。京东承诺您：30天内产品出现质量问题可退货，180天内产品出现质量问题可换货，超过180天按国家三包规定享受服务。\r\n您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.konka.com/\r\n售后服务电话：400-880-0016\r\n 京东承诺\r\n京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！\r\n注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！\r\n正品行货\r\n京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。\r\n全国联保\r\n凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东商城还为您提','',500,50,1,1,0,0,1,0,0,0,0,0),(55,'乐视超级电视X49 49吋智能高清液晶电视（标配底座）','1490367572',28,26,21,2969.00,3000.00,-1,0,NULL,NULL,NULL,'uploads/20170324/1490367491primary8248.jpg','uploads/20170324/1490367491big3550.jpg','uploads/20170324/1490367491median8366.jpg','uploads/20170324/1490367491small1367.jpg','本产品全国联保，享受三包服务，质保期为：一年质保\r\n本产品提供上门安装调试、提供上门检测和维修等售后服务，自收到商品之日起，如您所购买家电商品出现质量问题，请先联系厂家进行检测，凭厂商提供的故障检测证明，在“我的京东-客户服务-返修退换货”页面提交退换申请，将有专业售后人员提供服务。京东承诺您：30天内产品出现质量问题可退货，180天内产品出现质量问题可换货，超过180天按国家三包规定享受服务。\r\n您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......\r\n\r\n品牌官方网站：http://www.lemall.com/\r\n售后服务电话：10109000','',5000,10,1,1,0,0,0,0,0,0,0,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsattr`
--

LOCK TABLES `shop_goodsattr` WRITE;
/*!40000 ALTER TABLE `shop_goodsattr` DISABLE KEYS */;
INSERT INTO `shop_goodsattr` VALUES (51,19,'材质',0,'液晶,普通'),(50,19,'重量',0,''),(49,19,'颜色',1,'红色,白色,黑色'),(47,18,'阅读方式',0,'电子版,纸质版'),(48,19,'内存',1,'4G,8G,16G'),(46,18,'作者',0,''),(45,18,'出版社',1,'人民出版社,教育出版社,青年出版社'),(52,20,'颜色',1,'土豪金,银色,白色'),(53,20,'内存',1,'4G,8G,16G'),(54,20,'屏幕大小',1,'4.7寸,5.1寸,7.0大屏'),(55,21,'屏幕尺寸',1,'70寸以上,60寸,50寸,40寸'),(56,21,'能效等级',1,'一级能效,二级能效,三级能效'),(57,21,'观看距离',1,'3.5米,5米,8.5米'),(58,21,'商品产地',1,'中国大陆,美国进口'),(59,21,'商品毛重',0,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=735 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodsimg`
--

LOCK TABLES `shop_goodsimg` WRITE;
/*!40000 ALTER TABLE `shop_goodsimg` DISABLE KEYS */;
INSERT INTO `shop_goodsimg` VALUES (682,53,'uploads/20170324/1490366459primary8802.jpg','uploads/20170324/1490366459big8795.jpg','uploads/20170324/1490366459median454.jpg','uploads/20170324/1490366459small4318.jpg   '),(643,47,'uploads/20170318/1489816120primary5960.jpg','uploads/20170318/1489816120big147.jpg','uploads/20170318/1489816120median4870.jpg','uploads/20170318/1489816120small1648.jpg  '),(642,47,'uploads/20170318/1489816126primary3398.jpg','uploads/20170318/1489816126big8244.jpg','uploads/20170318/1489816126median6328.jpg','uploads/20170318/1489816126small2408.jpg  '),(723,46,'uploads/20170316/1489677235primary5042.jpg','uploads/20170316/1489677235big6919.jpg','uploads/20170316/1489677235median2732.jpg','uploads/20170316/1489677235small1241.jpg      '),(722,46,'uploads/20170316/1489677253primary4033.jpg','uploads/20170316/1489677253big4693.jpg','uploads/20170316/1489677253median3785.jpg','uploads/20170316/1489677253small9807.jpg      '),(721,46,'uploads/20170316/1489677240primary5190.jpg','uploads/20170316/1489677240big3027.jpg','uploads/20170316/1489677240median9679.jpg','uploads/20170316/1489677240small7797.jpg      '),(688,38,'uploads/20170324/1490368535primary5381.jpg','uploads/20170324/1490368535big8525.jpg','uploads/20170324/1490368535median3434.jpg','uploads/20170324/1490368535small2362.jpg'),(687,42,'uploads/20170316/1489634532primary1604.jpg','uploads/20170316/1489634532big8491.jpg','uploads/20170316/1489634532median5219.jpg','uploads/20170316/1489634532small8978.jpg          '),(686,42,'uploads/20170316/1489635292primary7348.jpg','uploads/20170316/1489635292big1172.jpg','uploads/20170316/1489635292median3073.jpg','uploads/20170316/1489635292small6964.jpg          '),(685,42,'uploads/20170316/1489637504primary1315.jpg','uploads/20170316/1489637504big5458.jpg','uploads/20170316/1489637504median95.jpg','uploads/20170316/1489637504small1880.jpg          '),(684,42,'uploads/20170316/1489636656primary9339.jpg','uploads/20170316/1489636656big6306.jpg','uploads/20170316/1489636656median3348.jpg','uploads/20170316/1489636656small3879.jpg          '),(683,53,'uploads/20170324/1490366469primary9974.jpg','uploads/20170324/1490366469big7142.jpg','uploads/20170324/1490366469median2260.jpg','uploads/20170324/1490366469small1824.jpg   '),(681,53,'uploads/20170324/1490366464primary8086.jpg','uploads/20170324/1490366464big8350.jpg','uploads/20170324/1490366464median142.jpg','uploads/20170324/1490366464small6280.jpg   '),(734,54,'uploads/20170324/1490367229primary1539.jpg','uploads/20170324/1490367229big6546.jpg','uploads/20170324/1490367229median4432.jpg','uploads/20170324/1490367229small2506.jpg    '),(733,54,'uploads/20170324/1490367234primary1010.jpg','uploads/20170324/1490367234big1331.jpg','uploads/20170324/1490367234median7549.jpg','uploads/20170324/1490367234small6327.jpg    '),(732,54,'uploads/20170324/1490367240primary5608.jpg','uploads/20170324/1490367240big1704.jpg','uploads/20170324/1490367240median7597.jpg','uploads/20170324/1490367240small8658.jpg    '),(731,54,'uploads/20170324/1490367244primary7528.jpg','uploads/20170324/1490367244big2354.jpg','uploads/20170324/1490367244median8033.jpg','uploads/20170324/1490367244small8526.jpg    '),(654,55,'uploads/20170324/1490367787primary2965.jpg','uploads/20170324/1490367787big674.jpg','uploads/20170324/1490367787median942.jpg','uploads/20170324/1490367787small8985.jpg'),(655,55,'uploads/20170324/1490367794primary7870.jpg','uploads/20170324/1490367794big2630.jpg','uploads/20170324/1490367794median6502.jpg','uploads/20170324/1490367794small1301.jpg'),(656,55,'uploads/20170324/1490367850primary6250.jpg','uploads/20170324/1490367850big1858.jpg','uploads/20170324/1490367850median1954.jpg','uploads/20170324/1490367850small2853.jpg'),(657,55,'uploads/20170324/1490367856primary5466.jpg','uploads/20170324/1490367856big5914.jpg','uploads/20170324/1490367856median773.jpg','uploads/20170324/1490367856small4137.jpg'),(689,38,'uploads/20170324/1490368541primary3142.jpg','uploads/20170324/1490368541big1673.jpg','uploads/20170324/1490368541median6724.jpg','uploads/20170324/1490368541small3714.jpg'),(690,38,'uploads/20170324/1490368547primary6601.jpg','uploads/20170324/1490368547big7217.jpg','uploads/20170324/1490368547median9439.jpg','uploads/20170324/1490368547small5406.jpg'),(696,37,'uploads/20170324/1490368670primary4372.jpg','uploads/20170324/1490368670big7587.jpg','uploads/20170324/1490368670median762.jpg','uploads/20170324/1490368670small4464.jpg '),(695,37,'uploads/20170324/1490368664primary187.jpg','uploads/20170324/1490368664big7044.jpg','uploads/20170324/1490368664median439.jpg','uploads/20170324/1490368664small7341.jpg '),(694,37,'uploads/20170324/1490368658primary2279.jpg','uploads/20170324/1490368658big4447.jpg','uploads/20170324/1490368658median6693.jpg','uploads/20170324/1490368658small8769.jpg '),(697,43,'uploads/20170324/1490368771primary8378.jpg','uploads/20170324/1490368771big2351.jpg','uploads/20170324/1490368771median7850.jpg','uploads/20170324/1490368771small6524.jpg'),(698,43,'uploads/20170324/1490368778primary5221.jpg','uploads/20170324/1490368778big6722.jpg','uploads/20170324/1490368778median3897.jpg','uploads/20170324/1490368778small9675.jpg'),(699,43,'uploads/20170324/1490368787primary7806.jpg','uploads/20170324/1490368787big663.jpg','uploads/20170324/1490368787median9433.jpg','uploads/20170324/1490368787small5890.jpg'),(708,36,'uploads/20170324/1490368920primary2728.jpg','uploads/20170324/1490368920big7908.jpg','uploads/20170324/1490368920median1173.jpg','uploads/20170324/1490368920small2742.jpg'),(707,36,'uploads/20170324/1490368913primary73.jpg','uploads/20170324/1490368913big7509.jpg','uploads/20170324/1490368913median3983.jpg','uploads/20170324/1490368913small5333.jpg'),(706,36,'uploads/20170324/1490368909primary6163.jpg','uploads/20170324/1490368909big3767.jpg','uploads/20170324/1490368909median8451.jpg','uploads/20170324/1490368909small4765.jpg'),(725,44,'uploads/20170324/1490369042primary1597.jpg','uploads/20170324/1490369042big4642.jpg','uploads/20170324/1490369042median4779.jpg','uploads/20170324/1490369042small185.jpg  '),(726,44,'uploads/20170324/1490369037primary975.jpg','uploads/20170324/1490369037big927.jpg','uploads/20170324/1490369037median2629.jpg','uploads/20170324/1490369037small2792.jpg  '),(724,44,'uploads/20170324/1490369049primary2920.jpg','uploads/20170324/1490369049big2729.jpg','uploads/20170324/1490369049median7857.jpg','uploads/20170324/1490369049small6623.jpg  '),(715,51,'uploads/20170324/1490369175primary3623.jpg','uploads/20170324/1490369175big256.jpg','uploads/20170324/1490369175median305.jpg','uploads/20170324/1490369175small2668.jpg'),(716,51,'uploads/20170324/1490369180primary998.jpg','uploads/20170324/1490369180big3506.jpg','uploads/20170324/1490369180median2813.jpg','uploads/20170324/1490369180small5931.jpg'),(717,51,'uploads/20170324/1490369192primary6961.jpg','uploads/20170324/1490369192big809.jpg','uploads/20170324/1490369192median3257.jpg','uploads/20170324/1490369192small194.jpg');
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goodstype`
--

LOCK TABLES `shop_goodstype` WRITE;
/*!40000 ALTER TABLE `shop_goodstype` DISABLE KEYS */;
INSERT INTO `shop_goodstype` VALUES (21,'电视'),(18,'书籍'),(19,'电脑'),(20,'手机');
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
  `rank` int(11) DEFAULT '0' COMMENT '会员积分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_member`
--

LOCK TABLES `shop_member` WRITE;
/*!40000 ALTER TABLE `shop_member` DISABLE KEYS */;
INSERT INTO `shop_member` VALUES (28,'tw1996','Rt-SYauGqY4lhzvdjFeS9OBUPkuQ_Lzm','$2y$13$tGz03smvGsLnkwVuGZOPfegaHRUNItNBvO/ZZz96/a9ItEeD.7mMC','2698143402@qq.com','2017-03-24 05:24:09','2017-03-24 05:24:09','a2f61b8555795ba8f608dd7bb53cf469',1,0);
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
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_memberprice`
--

LOCK TABLES `shop_memberprice` WRITE;
/*!40000 ALTER TABLE `shop_memberprice` DISABLE KEYS */;
INSERT INTO `shop_memberprice` VALUES (208,44,11,16000.00),(205,42,7,5600.00),(110,41,11,-1.00),(109,41,9,-1.00),(108,41,7,-1.00),(201,47,7,5500.01);
/*!40000 ALTER TABLE `shop_memberprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` char(12) NOT NULL,
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0交易中, 1完成',
  `pay_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未支付,1已经支付',
  `post_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未发货,1已经发货',
  `post_id` int(10) unsigned NOT NULL COMMENT '配送方式id',
  `pay_id` int(10) unsigned NOT NULL COMMENT '支付方式id',
  `postage` decimal(10,2) NOT NULL COMMENT '运费id',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品总价',
  `total_price` decimal(10,2) NOT NULL COMMENT '总价',
  `user_name` varchar(20) NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_sn` (`order_sn`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_order`
--

LOCK TABLES `shop_order` WRITE;
/*!40000 ALTER TABLE `shop_order` DISABLE KEYS */;
INSERT INTO `shop_order` VALUES (41,'4919801',0,0,0,0,0,35.00,24437.30,24472.30,'435346346','36346346','346346',28,'2017-03-26 01:33:00'),(42,'49259341',0,0,0,0,0,35.00,5220.00,5255.00,'23444444444444444','4234234444444444444','23444444444444444',28,'2017-03-26 01:43:13'),(43,'49259742',0,0,0,0,0,35.00,5220.00,5255.00,'23444444444444444','4234234444444444444','23444444444444444',28,'2017-03-26 01:43:16');
/*!40000 ALTER TABLE `shop_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_ordergoods`
--

DROP TABLE IF EXISTS `shop_ordergoods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `attr` varchar(500) DEFAULT '',
  `goodsnum` int(10) unsigned NOT NULL,
  `goodsprice` decimal(10,2) NOT NULL,
  `attr_str` varchar(50) DEFAULT '' COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_ordergoods`
--

LOCK TABLES `shop_ordergoods` WRITE;
/*!40000 ALTER TABLE `shop_ordergoods` DISABLE KEYS */;
INSERT INTO `shop_ordergoods` VALUES (22,41,54,'屏幕尺寸 : 70寸以上<br />能效等级 : 一级能效<br />观看距离 : 3.5米<br />商品产地 : 中国大陆<br />',1,2699.10,'1675,1677,1679,1680'),(23,41,37,'内存 : 8G<br />颜色 : 黑色<br />',1,5420.00,'1613,1610'),(24,41,37,'内存 : 4G<br />颜色 : 红色<br />',1,5220.00,'1612,1609'),(25,41,54,'屏幕尺寸 : 60寸<br />能效等级 : 一级能效<br />观看距离 : 3.5米<br />商品产地 : 美国进口<br />',1,3199.10,'1676,1677,1679,1681'),(26,41,53,'屏幕尺寸 : 70寸以上<br />能效等级 : 一级能效<br />观看距离 : 3.5米<br />商品产地 : 中国大陆<br />',1,7899.10,'1571,1574,1577,1580'),(27,42,37,'内存 : 4G<br />颜色 : 红色<br />',1,5220.00,'1612,1609');
/*!40000 ALTER TABLE `shop_ordergoods` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (211,'1489816160',47,'1340,1345,1346',60),(210,'1489816160',47,'1342,1344,1347',50),(209,'1489816160',47,'1342,1345,1347',100),(205,'1489720008',36,'1335,1337',60),(219,'1490454820',37,'1609,1612',5),(217,'1489713390',42,'1585,1588',600);
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_session`
--

DROP TABLE IF EXISTS `shop_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_session`
--

LOCK TABLES `shop_session` WRITE;
/*!40000 ALTER TABLE `shop_session` DISABLE KEYS */;
INSERT INTO `shop_session` VALUES ('f08v5m0mggfdp9vi2sdcev9sc2',1490495702,'__flash|a:0:{}'),('nfllh4en67ukkdekm74qmpo1q6',1490495777,'__flash|a:0:{}return|s:31:\"/index.php?r=order%2Fcheckorder\";__captcha/user/captcha|s:6:\"rehuqe\";__captcha/user/captchacount|i:1;__id|i:28;level_id|s:1:\"7\";rate|d:0.90000000000000002;');
/*!40000 ALTER TABLE `shop_session` ENABLE KEYS */;
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

-- Dump completed on 2017-03-26 10:43:29
