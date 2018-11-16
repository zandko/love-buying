-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: love_buying
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,NULL,'2018-11-07 06:07:50'),(2,0,15,'系统管理','fa-tasks',NULL,NULL,NULL,'2018-11-15 09:39:07'),(3,2,16,'管理员','fa-users','auth/users',NULL,NULL,'2018-11-15 09:39:07'),(4,2,17,'角色','fa-user','auth/roles',NULL,NULL,'2018-11-15 09:39:07'),(5,2,18,'权限','fa-ban','auth/permissions',NULL,NULL,'2018-11-15 09:39:07'),(6,2,19,'菜单','fa-bars','auth/menu',NULL,NULL,'2018-11-15 09:39:07'),(7,2,20,'操作日志','fa-history','auth/logs',NULL,NULL,'2018-11-15 09:39:07'),(8,0,4,'分类管理','fa-bars','/categories',NULL,'2018-11-07 16:13:28','2018-11-14 17:59:52'),(9,0,5,'商品管理','fa-cubes','/products',NULL,'2018-11-07 17:59:03','2018-11-14 17:59:52'),(10,0,7,'优惠卷管理','fa-money','/coupon_codes',NULL,'2018-11-08 08:41:49','2018-11-14 17:59:52'),(11,0,2,'用户管理','fa-users','/users',NULL,'2018-11-09 21:09:15','2018-11-09 21:09:21'),(12,0,6,'订单管理','fa-first-order','/orders',NULL,'2018-11-11 20:18:58','2018-11-14 17:59:52'),(13,0,3,'广告模块','fa-file-image-o','/focus',NULL,'2018-11-14 17:59:42','2018-11-14 18:01:46'),(14,0,8,'日志查看','fa-file-text-o','logs',NULL,'2018-11-15 09:28:00','2018-11-15 09:40:56'),(15,0,9,'Redis 管理','fa-database','redis',NULL,'2018-11-15 09:34:25','2018-11-15 09:39:07'),(16,0,10,'帮助工具','fa-gears',NULL,NULL,'2018-11-15 09:35:28','2018-11-15 09:39:07'),(17,16,11,'脚手架工具','fa-keyboard-o','helpers/scaffold',NULL,'2018-11-15 09:35:28','2018-11-15 09:39:07'),(18,16,12,'数据库命令行','fa-database','helpers/terminal/database',NULL,'2018-11-15 09:35:28','2018-11-15 09:39:07'),(19,16,13,'artisan命令行','fa-terminal','helpers/terminal/artisan',NULL,'2018-11-15 09:35:28','2018-11-15 09:39:07'),(20,16,14,'路由列表','fa-list-alt','helpers/routes',NULL,'2018-11-15 09:35:28','2018-11-15 09:39:07');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'Logs','ext.log-viewer',NULL,'/logs*','2018-11-15 09:28:00','2018-11-15 09:28:00'),(7,'Redis Manager','ext.redis-manager',NULL,'/redis*','2018-11-15 09:34:25','2018-11-15 09:34:25'),(8,'Admin helpers','ext.helpers',NULL,'/helpers/*','2018-11-15 09:35:28','2018-11-15 09:35:28');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-11-07 04:20:20','2018-11-07 04:20:20');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$Jgan/ubWQEsUgYKS3emRUujKc6SyjAxDTwLjm.dRrtbniewkku.qK','Administrator',NULL,NULL,'2018-11-07 04:20:20','2018-11-07 04:20:20');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-16  8:32:02
