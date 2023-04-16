DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `ventacod` bigint NOT NULL AUTO_INCREMENT,
  `usercod` bigint NOT NULL,
  `fechaventa` datetime DEFAULT CURRENT_TIMESTAMP,
  `isv` float NOT NULL,
  `cantidadBruta` float NOT NULL,
  `comisionPayPal` float NOT NULL,
  `cantidadNeta` float NOT NULL,
  PRIMARY KEY (`ventacod`),
  KEY `usercod` (`usercod`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usercod`) REFERENCES `usuario` (`usercod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;