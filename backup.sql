-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: idl
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `contributor`
--

DROP TABLE IF EXISTS `contributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contributor` (
  `u_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `commit` int(5) DEFAULT '0',
  `edit` int(5) DEFAULT '0',
  `review` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributor`
--

LOCK TABLES `contributor` WRITE;
/*!40000 ALTER TABLE `contributor` DISABLE KEYS */;
INSERT INTO `contributor` VALUES (15,4,9,5,16),(19,1,0,0,0),(4,1,0,0,0);
/*!40000 ALTER TABLE `contributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin'),(2,'Manager'),(3,'Contributor');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roleuser`
--

DROP TABLE IF EXISTS `roleuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roleuser` (
  `u_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roleuser`
--

LOCK TABLES `roleuser` WRITE;
/*!40000 ALTER TABLE `roleuser` DISABLE KEYS */;
INSERT INTO `roleuser` VALUES (1,1),(2,2),(3,2),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,2),(17,1),(18,1),(19,3),(20,1),(21,1),(22,1),(23,3),(24,3),(25,3);
/*!40000 ALTER TABLE `roleuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(30) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'kkr',2),(2,'csk',52),(3,'RCB',7),(4,'RCB',16);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `dob` varchar(12) DEFAULT NULL,
  `doj` varchar(12) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `drupal` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'bumba','gourab.dutta','2014-11-14','2014-11-13',9433379640,'M','delhi','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','gourabcena@gmail.com',0),(2,'Priyanka Dutta','mickey','2014-11-15','2014-11-15',9874561235,'F','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','r@gmail.com',1),(3,'Sabdick','sabu','2014-11-01','2014-11-29',8794561234,'M','chennai','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','sabdick@gmail.com',2),(4,'Ankan Ghosh','rintu','2014-11-14','2014-11-28',7894561234,'M','mumbai','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','a@fgai.com',1),(5,'Shayani','piu','2014-11-20','2014-11-15',1234567897,'F','delhi','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','s@ymail.com',1),(6,'Sohini','so@gmail.com','2014-11-14','2014-08-15',47894561235,'F','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','sohini@gmail.com',1),(7,'Sounak','rishi','2014-11-19','2014-11-21',987564123,'M','delhi','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','sounak@gmail.com',2),(8,'foo','f','','',789456135,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','go@gmail.com',2),(9,'g','g','','',7894561235,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com','g@g.com',2),(10,'Jyotsna Anand','doll','2014-11-06','2014-11-22',962587414,'M','delhi','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','doll@gmail.com',1),(11,'Pooja Sen','pooj','','',8974568123,'F','delhi','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com/pooj','pooja@gmail.com',2),(12,'Tinni','so','','',8974561234,'F','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','sohini@gmail.com',1),(13,'Toni','t','','',8785,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','t@gmail.com',2),(14,'Sachin','sa','','',87956,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','sac@gmail.com',2),(15,'Anindita Pal','ani','2013-01-04','2014-11-28',9784561235,'F','chennai','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/ani20','an@gmail.com',1),(16,'Gofdwtft','go','2014-11-14','2014-11-07',87558458,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','d@d.c',1),(17,'Ankan','de','','',455,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com/pooj','df@c.c',0),(19,'Khusbu','ko','','',87962,'F','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','ksaj@felksmfklm.c',1),(20,'raju','ra','','',7894561235,'F','delhi','d41d8cd98f00b204e9800998ecf8427e','http://drupal.com/sabu','ra@d.c',0),(21,'Ekta Jain','ekta','2014-11-04','2014-11-06',9874561235,'F','mumbai','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com/ekta','ekta@gmail.com',0),(22,'Ahona','ahona','1995-02-05','2012-02-23',879456125,'F','delhi','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com/ahona','ahona@gmail.com',0),(23,'Rupsha Moitra','rupu','2014-11-06','2014-11-20',8974568,'F','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','rup@gmail.com',0),(24,'Sarthak','gatku','1993-01-01','2014-07-25',9433379610,'M','chennai','b1f4f9a523e36fd969f4573e25af4540','http://www.drupal.com/sarthak','sarthak@gmail.com',0),(25,'989898','kjkjkj','2014-11-05','2014-11-26',0,'M','kolkata','b1f4f9a523e36fd969f4573e25af4540','http://drupal.org/mukesh.agarwal17','hftyfytf@f',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-05 13:01:33
