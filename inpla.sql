-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: inpla
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `se_menu`
--

DROP TABLE IF EXISTS `se_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu` (
  `COD_MENU_W` int(11) NOT NULL DEFAULT '0',
  `DSC_MENU_W` varchar(100) DEFAULT NULL,
  `NME_CONTROLLER` varchar(1000) DEFAULT NULL,
  `IND_MENU_ATIVO_W` char(1) DEFAULT NULL,
  `COD_MENU_PAI_W` int(11) DEFAULT NULL,
  `NME_METHOD` varchar(50) DEFAULT NULL,
  `DSC_CAMINHO_IMAGEM` varchar(1000) DEFAULT NULL,
  `IND_ATALHO` char(1) DEFAULT NULL,
  `ind_visible` char(1) DEFAULT 'S',
  PRIMARY KEY (`COD_MENU_W`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu`
--

LOCK TABLES `se_menu` WRITE;
/*!40000 ALTER TABLE `se_menu` DISABLE KEYS */;
INSERT INTO `se_menu` VALUES (1,'Restrito','','S',0,'','','N','S'),(2,'Menu','Menu','S',1,'ChamaView',NULL,NULL,'S'),(3,'PermissÃ£o de Menu','PermissaoMenu','S',1,'ChamaView','','N','S'),(4,'Menu Principal','MenuPrincipal','S',0,'ChamaView',NULL,'N','N'),(5,'Verificar SessÃ£o','MenuPrincipal','S',0,'VerificaSessao','','N','N'),(6,'Carregar Atalhos','MenuPrincipal','S',0,'CarregaAtalhos',NULL,'N','N'),(7,'Carregar Menu','MenuPrincipal','S',0,'CarregaMenuNew',NULL,'N','N'),(8,'Listar Menu','Menu','S',0,'ListarMenusGrid',NULL,'N','N'),(9,'Atualiza Menu','Menu','S',0,'UpdateMenu',NULL,'N','N'),(10,'Insere Menu','Menu','S',0,'AddMenu',NULL,'N','N'),(11,'Combo Menu','Menu','S',0,'ListaMenus',NULL,'N','N');
/*!40000 ALTER TABLE `se_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_menu_perfil`
--

DROP TABLE IF EXISTS `se_menu_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu_perfil` (
  `COD_MENU_PERFIL` int(11) NOT NULL AUTO_INCREMENT,
  `COD_PERFIL_W` int(11) DEFAULT NULL,
  `COD_MENU_W` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_MENU_PERFIL`),
  KEY `se_menu_perfil_se_perfil_fk` (`COD_PERFIL_W`),
  KEY `se_menu_perfil_se_menu_fk` (`COD_MENU_W`),
  CONSTRAINT `se_menu_perfil_se_menu_fk` FOREIGN KEY (`COD_MENU_W`) REFERENCES `se_menu` (`COD_MENU_W`),
  CONSTRAINT `se_menu_perfil_se_perfil_fk` FOREIGN KEY (`COD_PERFIL_W`) REFERENCES `se_perfil` (`COD_PERFIL_W`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu_perfil`
--

LOCK TABLES `se_menu_perfil` WRITE;
/*!40000 ALTER TABLE `se_menu_perfil` DISABLE KEYS */;
INSERT INTO `se_menu_perfil` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11);
/*!40000 ALTER TABLE `se_menu_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_perfil`
--

DROP TABLE IF EXISTS `se_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_perfil` (
  `COD_PERFIL_W` int(11) NOT NULL,
  `DSC_PERFIL_W` varchar(50) DEFAULT NULL,
  `IND_ATIVO` char(1) DEFAULT NULL,
  PRIMARY KEY (`COD_PERFIL_W`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_perfil`
--

LOCK TABLES `se_perfil` WRITE;
/*!40000 ALTER TABLE `se_perfil` DISABLE KEYS */;
INSERT INTO `se_perfil` VALUES (1,'Administrador','S');
/*!40000 ALTER TABLE `se_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_usuario`
--

DROP TABLE IF EXISTS `se_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_usuario` (
  `COD_USUARIO` int(11) NOT NULL,
  `NME_USUARIO` varchar(50) DEFAULT NULL,
  `NME_USUARIO_COMPLETO` varchar(60) DEFAULT NULL,
  `TXT_SENHA_W` varchar(1000) DEFAULT NULL,
  `NRO_TEL_CELULAR` varchar(50) DEFAULT NULL,
  `TXT_EMAIL` varchar(60) DEFAULT NULL,
  `DTA_INATIVO` datetime DEFAULT NULL,
  `COD_PERFIL_W` int(11) DEFAULT NULL,
  `IND_ATIVO` char(1) DEFAULT NULL,
  PRIMARY KEY (`COD_USUARIO`),
  UNIQUE KEY `se_usuario_un` (`NME_USUARIO`),
  KEY `se_usuario_se_perfil_fk` (`COD_PERFIL_W`),
  FULLTEXT KEY `NME_USUARIO_COMPLETO` (`NME_USUARIO_COMPLETO`),
  CONSTRAINT `se_usuario_se_perfil_fk` FOREIGN KEY (`COD_PERFIL_W`) REFERENCES `se_perfil` (`COD_PERFIL_W`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_usuario`
--

LOCK TABLES `se_usuario` WRITE;
/*!40000 ALTER TABLE `se_usuario` DISABLE KEYS */;
INSERT INTO `se_usuario` VALUES (8,'adm','adm','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,1,'S'),(19,'rafael.gerente','Rafael Gerente','c4ca4238a0b923820dcc509a6f75849b','','',NULL,1,'S');
/*!40000 ALTER TABLE `se_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-09 15:21:48
