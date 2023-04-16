DROP TABLE IF EXISTS `funciones_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funciones_roles` (
  `rolescod` varchar(15) NOT NULL,
  `fncod` varchar(255) NOT NULL,
  `fnrolest` char(3) DEFAULT NULL,
  `fnexp` datetime DEFAULT NULL,
  PRIMARY KEY (`rolescod`,`fncod`),
  KEY `rol_funcion_key_idx` (`fncod`),
  CONSTRAINT `funcion_rol_key` FOREIGN KEY (`rolescod`) REFERENCES `roles` (`rolescod`),
  CONSTRAINT `rol_funcion_key` FOREIGN KEY (`fncod`) REFERENCES `funciones` (`fncod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funciones_roles`
--

LOCK TABLES `funciones_roles` WRITE;
/*!40000 ALTER TABLE `funciones_roles` DISABLE KEYS */;
INSERT INTO `funciones_roles` VALUES ('ADMIN','Controllers\\Admin\\Admin','ACT','2022-04-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Departamentos','ACT','2022-06-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Funciones','ACT','2022-06-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Marcas','ACT','2022-06-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Roles','ACT','2022-06-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Tallas','ACT','2022-06-23 00:00:00'),('ADMIN','Controllers\\Mnt\\Usuarios','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntDepartamentos','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntFunciones','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntFuncionesRoles','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntHistorialTransacciones','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntMarcas','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntPedidos','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntRoles','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntRolesUsuarios','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntTallas','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntUsuarios','ACT','2022-06-23 00:00:00'),('ADMIN','Menu_MntZapatos','ACT','2022-06-23 00:00:00'),('ADMIN','mnt_usuarios_delete','ACT','2022-06-23 00:00:00'),('ADMIN','mnt_usuarios_edit','ACT','2022-06-23 00:00:00'),('ADMIN','mnt_usuarios_new','ACT','2022-06-23 00:00:00'),('ADMIN','mnt_usuarios_view','ACT','2022-06-23 00:00:00');
/*!40000 ALTER TABLE `funciones_roles` ENABLE KEYS */;
UNLOCK TABLES;