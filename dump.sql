-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cakedb
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.12.04.1

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `idactivity` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_local` varchar(100) NOT NULL,
  `activity_hours` varchar(10) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `abstract` text NOT NULL,
  `date` date NOT NULL,
  `path` varchar(90) NOT NULL,
  `users_iduser` int(11) NOT NULL,
  `classification_id` int(11) NOT NULL,
  `avaliation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idactivity`),
  KEY `fk_activities_users1_idx` (`users_iduser`),
  KEY `fk_activities_classifications1_idx` (`classification_id`),
  KEY `fk_activities_avaliations1_idx` (`avaliation_id`),
  CONSTRAINT `fk_activities_avaliations1` FOREIGN KEY (`avaliation_id`) REFERENCES `avaliations` (`idavalation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activities_classifications1` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`idclassification`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_activities_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (4,'UFSM','10','2','1dsafhdwjkhfiujnkd','2015-05-09','nulo',10,1,1),(7,'UNIFRA','9','1','Acg tese','0000-00-00','nulo',10,1,2),(8,'ULBRA','20','1','outro teste','0000-00-00','nulo',1,1,2),(9,'FAMES','12','2','Está é uma atividade','2015-05-09','nulo',1,1,1),(10,'UFSM','3','2','testestesteste','2015-05-09','nulo',10,1,1);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliations`
--

DROP TABLE IF EXISTS `avaliations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliations` (
  `idavalation` int(11) NOT NULL AUTO_INCREMENT,
  `situation` int(1) NOT NULL,
  `observation` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idavalation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliations`
--

LOCK TABLES `avaliations` WRITE;
/*!40000 ALTER TABLE `avaliations` DISABLE KEYS */;
INSERT INTO `avaliations` VALUES (1,1,'efrf',NULL),(2,2,'ded',NULL);
/*!40000 ALTER TABLE `avaliations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classifications`
--

DROP TABLE IF EXISTS `classifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classifications` (
  `idclassification` int(11) NOT NULL AUTO_INCREMENT,
  `classification_name` varchar(45) NOT NULL,
  PRIMARY KEY (`idclassification`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classifications`
--

LOCK TABLES `classifications` WRITE;
/*!40000 ALTER TABLE `classifications` DISABLE KEYS */;
INSERT INTO `classifications` VALUES (1,'Participação em Eventos'),(2,'Atuação em Núcleos Temáticos'),(3,'Atividades de Extensão'),(4,'Atividades de Extensão'),(5,'Estágios extra-curriculares'),(6,'Atividade de Iniciação Científica'),(7,'Publicação de Trabalhos'),(8,'Participação em Órgãos de Colegiado'),(9,'Monitoria'),(10,'Outras Atividades');
/*!40000 ALTER TABLE `classifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `idcourse` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  PRIMARY KEY (`idcourse`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Sistemas de Informação'),(2,'Ciência da Computação');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_users_courses_idx` (`course_id`),
  CONSTRAINT `fk_users_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`idcourse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Otávio Bergmann Cassel','cassel@inf.ufsm.br','201221000','$2y$10$sj1qHp9a7YnftE/GhjudoeI358U0bXoaRQgBw5v.SqfsNp3K6dYeW',1,1),(2,'Raphael Vieira Miollo','rmiollo@inf.ufsm.br','201220519','$2y$10$6sTxeRmfQLFfrS2nKKY79utDxqdG6SyJr8VsT7pLblbFk1PnYPE9a',2,1),(3,'Luizi Jovasque','ljovasque@inf.ufsm.br','201122400','$2y$10$jmyrFxTvCMQXunZHggUC0.tGpYn08aQPlSddRr1AjrUzv.SoXldC2',1,1),(9,'Teste Usuario','user@user.com','201220123','$2y$10$jblnkMnR03i4WWSqKNRE0.3do1yoZoMjtMaqwpd2I.7.0qf9mr2O2',1,1),(10,'Raphael Aluno','aluno@aluno.com','001','$2y$10$PfJbW0dy4dflWMhqdV5s3uOh55C.dHdKFH1rZ9tYsIZgysAhzte1K',1,1),(11,'Coordenação Usuário','coordenacao@coordenacao.com','002','$2y$10$b6QbYWklf4WEEQWpq37ZxuUCT.bFKygjXuEZRtr9h3WIEXbqvBOQ6',2,1),(12,'Administrador Usuário','administrador@administrador.com','004','$2y$10$BwSXXHOozE64NQHEnoy/ZuRtyGS7C63yZXFBhj8bz8L4NrbYpIrXG',4,1),(13,'Colegiado Usuário','colegiado@colegiado.com','003','$2y$10$F1Y00OzBws7reKXzPzcFb.FgN6sajeLdjr1XvO0RwvG8/OqEfMoki',3,1),(14,'Lisandra','lisandram@teste.com','006','$2y$10$fuJHyJFJvIpLqDR6N.hTp.Xdf4gd4NQSrV8IrjlyBL7iOb5Amu2eG',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cakedb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-11  0:26:17
