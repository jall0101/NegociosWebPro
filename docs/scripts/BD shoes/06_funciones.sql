DROP TABLE IF EXISTS `funciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funciones` (
  `fncod` varchar(255) NOT NULL,
  `fndsc` varchar(45) DEFAULT NULL,
  `fnest` char(3) DEFAULT NULL,
  `fntyp` char(3) DEFAULT NULL,
  PRIMARY KEY (`fncod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funciones`
--

LOCK TABLES `funciones` WRITE;
/*!40000 ALTER TABLE `funciones` DISABLE KEYS */;
INSERT INTO `funciones` VALUES ('Controllers\\Admin\\Admin','Controllers\\Admin\\Admin','ACT','CTR'),('Controllers\\Mnt\\Departamentos','Controllers\\Mnt\\Departamentos','ACT','CTR'),('Controllers\\Mnt\\Funciones','Controllers\\Mnt\\Funciones','ACT','CTR'),('Controllers\\Mnt\\FuncionesRoles','Controllers\\Mnt\\FuncionesRoles','ACT','CTR'),('Controllers\\Mnt\\Marca','Controllers\\Mnt\\Marca','ACT','CTR'),('Controllers\\Mnt\\Marcas','Controllers\\Mnt\\Marcas','ACT','CTR'),('Controllers\\Mnt\\Roles','Controllers\\Mnt\\Roles','ACT','CTR'),('Controllers\\Mnt\\Tallas','Controllers\\Mnt\\Tallas','ACT','CTR'),('Controllers\\Mnt\\Usuario','Controllers\\Mnt\\Usuario','ACT','CTR'),('Controllers\\Mnt\\Usuarios','Controllers\\Mnt\\Usuarios','ACT','CTR'),('Menu_MntCategorias','Menu_MntCategorias','ACT','CTR'),('Menu_MntDepartamentos','Menu_MntDepartamentos','ACT','CTR'),('Menu_MntFunciones','Menu_MntFunciones','ACT','CTR'),('Menu_MntFuncionesRoles','Menu_MntFuncionesRoles','ACT','CTR'),('Menu_MntHistorialTransacciones','Menu_MntHistorialTransacciones','ACT','CTR'),('Menu_MntMarcas','Menu_MntMarcas','ACT','CTR'),('Menu_MntPedidos','Menu_MntPedidos','ACT','CTR'),('Menu_MntQuotes','Menu_MntQuotes','ACT','CTR'),('Menu_MntRoles','Menu_MntRoles','ACT','CTR'),('Menu_MntRolesUsuarios','Menu_MntRolesUsuarios','ACT','CTR'),('Menu_MntTallas','Menu_MntTallas','ACT','CTR'),('Menu_MntUsuarios','Menu_MntUsuarios','ACT','CTR'),('Menu_MntZapatos','Menu_MntZapatos','ACT','CTR'),('Menu_PaymentCheckout','Menu_PaymentCheckout','ACT','CTR'),('Menu_Perfil','Menu_Perfil','ACT','CTR'),('mnt_departamentos_delete','mnt_departamentos_delete','ACT','CTR'),('mnt_departamentos_edit','mnt_departamentos_edit','ACT','CTR'),('mnt_departamentos_new','mnt_departamentos_new','ACT','CTR'),('mnt_departamentos_view','mnt_departamentos_view','ACT','CTR'),('mnt_funciones_delete','mnt_funciones_delete','ACT','CTR'),('mnt_funciones_edit','mnt_funciones_edit','ACT','CTR'),('mnt_funciones_new','mnt_funciones_new','ACT','CTR'),('mnt_funciones_view','mnt_funciones_view','ACT','CTR'),('mnt_roles_delete','mnt_roles_delete','ACT','CTR'),('mnt_roles_edit','mnt_roles_edit','ACT','CTR'),('mnt_roles_new','mnt_roles_new','ACT','CTR'),('mnt_roles_view','mnt_roles_view','ACT','CTR'),('mnt_tallas_delete','mnt_tallas_delete','ACT','CTR'),('mnt_tallas_edit','mnt_tallas_edit','ACT','CTR'),('mnt_tallas_new','mnt_tallas_new','ACT','CTR'),('mnt_tallas_view','mnt_tallas_view','ACT','CTR'),('mnt_usuarios_delete','mnt_usuarios_delete','ACT','CTR'),('mnt_usuarios_edit','mnt_usuarios_edit','ACT','CTR'),('mnt_usuarios_new','mnt_usuarios_new','ACT','CTR'),('mnt_usuarios_view','mnt_usuarios_view','ACT','CTR');
/*!40000 ALTER TABLE `funciones` ENABLE KEYS */;
UNLOCK TABLES;