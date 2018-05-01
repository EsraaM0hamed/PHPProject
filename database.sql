-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: SocialDB
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'sport','add'),(2,'art','add'),(3,'design','delete'),(4,'science','delete'),(5,'politics','delete'),(6,'religion','delete'),(7,'economy','delete'),(8,'any category','delete'),(9,'ds','delete'),(10,'x','delete');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `content` text,
  `status` enum('draft','approved','deleted') DEFAULT NULL,
  `sReason` text,
  `pos_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pos_id` (`pos_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pos_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'first comment','any content','draft',NULL,1,5),(2,'another comment','another content','draft',NULL,4,5);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `content` text,
  `c_image` varchar(1024) DEFAULT NULL,
  `published` datetime DEFAULT NULL,
  `status` enum('draft','approved','deleted') DEFAULT NULL,
  `sreason` varchar(50) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'first post','hi from first post','two.png','2010-01-11 12:14:00','draft','old',1,5),(2,'second','hi from second','three.png','2018-02-12 00:00:00','draft','kda',2,5),(3,'hello three',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'4th post','any content','1.jpg','2018-02-18 06:28:43','deleted','xxxx',1,6),(5,'5th post','content of post 5th','1.jpg','2018-02-18 16:33:28','draft','any reason',1,6);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `reason` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'samar',NULL,'0','samar@gmail.com','inactive','12345678912',NULL),(6,'samarNasef',NULL,'$2y$10$5lYvldon0op/cZokZHBC.OmYU6dAnfyBPzbrqdWZcQKUqhihX/hGq','samarnasef@gmail.com','active','12365478963',NULL),(7,'y',NULL,'$2y$10$tpQFocVULJQmMDC46QlpyuOpHAjmLyUzgI1wNbl08D0tiNRV45wfK','y@gmail.com','deleted','12345698741',NULL),(8,'sa',NULL,'$2y$10$8DbH7UvwPKyPi2XdyPeE4OU8JSFwuLudHUtPmzagL8ZOV05tL/RFG','ds@g.gh','active','12365478963',NULL),(9,'smsm',NULL,'$2y$10$Z6ITtUz9faYIZz4vOSsvG.FdyqWiUVM0kA7pavgPZelj73LBa6caq','ggv@hg.djk','active','12365478963',NULL),(10,'s',NULL,'$2y$10$p3hGGGE8i51jAJNB.5ueLuEGamYAZS3dIFqjfpsRmEmkaZylePOFW','s@gmail.com','active','12365478963',NULL),(11,'admin',NULL,'$2y$10$BeHmq0owtPE6Bz3ej1.b4uOj0pybK8goQX7CQ4Kowpr0duzBamCJC','admin@gmail.com','active','12365478963',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22  8:52:41
