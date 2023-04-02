-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: payroll_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `attendance_sheet_emp`
--

DROP TABLE IF EXISTS `attendance_sheet_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance_sheet_emp` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Time In` time DEFAULT NULL,
  `Time Out` time DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance_sheet_emp`
--

LOCK TABLES `attendance_sheet_emp` WRITE;
/*!40000 ALTER TABLE `attendance_sheet_emp` DISABLE KEYS */;
INSERT INTO `attendance_sheet_emp` VALUES (1,'Rachel Johnson',NULL,'09:10:10','18:30:00','2023-03-12'),(2,'Anthony Rodriguez',NULL,'08:45:00','17:30:00','2023-03-12'),(3,'Emily Chen',NULL,'08:30:00','17:45:00','2023-03-12'),(4,'Michael Patel',NULL,'09:15:00','18:45:00','2023-03-12'),(5,'Sarah Kim',NULL,'09:00:00','17:00:00','2023-03-12'),(6,'Matthew Lee',NULL,'08:15:00','17:00:00','2023-03-12'),(7,'Jessica Nguyen',NULL,'09:30:00','17:30:00','2023-03-12'),(8,'David Jackson',NULL,'08:30:00','17:30:00','2023-03-12'),(9,'Jennifer Wu',NULL,'08:45:00','17:15:00','2023-03-12'),(10,'Daniel Kim',NULL,'09:00:00','18:30:00','2023-03-12'),(11,'Elizabeth Chen',NULL,'08:30:00','17:30:00','2023-03-12'),(12,'William Davis',NULL,'09:15:00','18:00:00','2023-03-12'),(13,'Victoria Johnson',NULL,'08:45:00','17:00:00','2023-03-12'),(14,'Christopher Kim',NULL,'08:30:00','18:00:00','2023-03-12'),(15,'Samantha Nguyen',NULL,'09:30:00','17:30:00','2023-03-12'),(16,'James Rodriguez',NULL,'08:30:00','17:30:00','2023-03-12'),(17,'Madison Lee',NULL,'08:45:00','17:15:00','2023-03-12'),(18,'Benjamin Patel',NULL,'09:00:00','18:30:00','2023-03-12'),(19,'Olivia Jackson',NULL,'08:30:00','17:30:00','2023-03-12'),(20,'Alexander Wu',NULL,'09:15:00','18:00:00','2023-03-12'),(21,'Alexander Wu',NULL,'09:15:00','18:00:00','2023-03-18');
/*!40000 ALTER TABLE `attendance_sheet_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_privdata`
--

DROP TABLE IF EXISTS `emp_privdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_privdata` (
  `Emp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `ContactNo:` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Emp_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_privdata`
--

LOCK TABLES `emp_privdata` WRITE;
/*!40000 ALTER TABLE `emp_privdata` DISABLE KEYS */;
INSERT INTO `emp_privdata` VALUES (1,'qwe','qwe','qwe','qwe23','qwe2','qwe'),(7,'qwe','qwe','qwe','johnmark.guillero@my.jru.edu','qwe','qwe1'),(8,'Mark','blk','123123','johnmarkguillero1@gmail.com','qwe123','qwe123');
/*!40000 ALTER TABLE `emp_privdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_data`
--

DROP TABLE IF EXISTS `employee_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_data` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(45) NOT NULL,
  `Hours_Work` int(11) NOT NULL DEFAULT 0,
  `Deduction` int(11) DEFAULT 0,
  `Basic_Rate` decimal(11,0) NOT NULL DEFAULT 0,
  `Overtime` int(11) DEFAULT 0,
  `Salary` int(11) DEFAULT 0,
  `Role` varchar(45) DEFAULT NULL,
  `Time_In` time DEFAULT NULL,
  `Time_Out` time DEFAULT NULL,
  `Present` int(11) DEFAULT NULL,
  `Absent` int(11) DEFAULT NULL,
  `Late` int(11) DEFAULT NULL,
  `SSS` int(11) DEFAULT NULL,
  `Phil_Health` int(11) DEFAULT NULL,
  `Pag_Ibig` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  UNIQUE KEY `Phil_Health_UNIQUE` (`Phil_Health`),
  UNIQUE KEY `Pag_Ibig_UNIQUE` (`Pag_Ibig`),
  UNIQUE KEY `SSS_UNIQUE` (`SSS`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_data`
--

LOCK TABLES `employee_data` WRITE;
/*!40000 ALTER TABLE `employee_data` DISABLE KEYS */;
INSERT INTO `employee_data` VALUES (2,'Anthony Rodriguez',38,20,1566,0,2676,'Role_0','08:48:00','16:40:00',8,3,2,1641,509,1761),(3,'Emily Chen',42,75,1548,1,28301,'Role_7','09:19:00','17:46:00',21,4,0,2595,2177,2176),(4,'Michael Patel',45,100,1541,5,20510,'Role_7','13:59:00','18:19:00',16,1,9,3390,2291,1602),(5,'Sarah Kim',36,10,1560,9,21739,'Role_9','12:47:00','19:22:00',0,4,8,1551,899,1170),(6,'Matthew Lee',44,60,1678,2,23782,'Role_0','10:39:00','19:02:00',19,4,7,1651,2013,764),(7,'Jessica Nguyen',39,30,1711,1,23437,'Role_2','12:52:00','17:12:00',23,0,2,3127,1237,2404),(8,'David Jackson',41,40,1520,0,22618,'Role_2','12:18:00','17:45:00',19,2,5,1029,1706,2485),(9,'Jennifer Wu',37,15,1970,7,28048,'Role_7','12:31:00','18:15:00',14,0,5,5008,1173,1936),(10,'Daniel Kim',43,90,1787,9,24350,'Role_4','17:44:00','17:16:00',12,3,7,4176,632,1129),(11,'Elizabeth Chen',40,25,1529,4,22638,'Role_9','10:55:00','16:33:00',14,1,5,4768,1300,646),(12,'William Davis',42,50,1782,5,26038,'Role_3','17:06:00','16:03:00',1,0,1,4289,2862,2427),(13,'Victoria Johnson',38,10,1825,4,23893,'Role_5','16:53:00','17:39:00',12,2,1,1592,1007,1481),(14,'Christopher Kim',44,80,1779,9,22607,'Role_4','14:17:00','19:20:00',4,4,8,4966,1375,660),(15,'Samantha Nguyen',39,30,1920,5,23816,'Role_3','14:38:00','18:16:00',11,2,8,5019,2153,1187),(16,'James Rodriguez',41,40,1763,0,22936,'Role_2','13:37:00','18:15:00',10,2,7,2868,2637,1381),(17,'Madison Lee',37,15,1557,0,20147,'Role_8','11:56:00','19:08:00',7,0,5,3460,2904,1562),(18,'Benjamin Patel',43,90,1996,2,26633,'Role_5','17:25:00','18:07:00',14,2,7,2276,603,1314),(19,'Olivia Jackson',40,25,1808,9,24397,'Role_4','16:14:00','16:00:00',14,4,4,4193,3283,1947),(20,'Alexander Wu',42,50,1553,8,20016,'Role_5','14:04:00','19:54:00',2,3,2,5872,1209,1018),(22,'Rachel Johnson',40,50,1558,6,1112668,'Role_0','14:27:00','19:42:00',1,1,0,4131,3145,1559),(26,'q',12,12,12,12,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `employee_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'payroll_db'
--

--
-- Dumping routines for database 'payroll_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-02 23:36:24
