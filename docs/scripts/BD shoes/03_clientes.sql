DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `clientcod` bigint NOT NULL AUTO_INCREMENT,
  `clientname` varchar(128) DEFAULT NULL,
  `clientgender` char(3) DEFAULT NULL,
  `clientphone1` varchar(255) DEFAULT NULL,
  `clientemail` varchar(255) DEFAULT NULL,
  `clientstatus` char(3) DEFAULT NULL,
  `clientdatecrt` datetime DEFAULT NULL,
  `clientusercreates` bigint DEFAULT NULL,
  PRIMARY KEY (`clientcod`),
  UNIQUE KEY `unique_clientname` (`clientname`),
  UNIQUE KEY `unique_clientemail` (`clientemail`),
  UNIQUE KEY `unique_clientphone1` (`clientphone1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
