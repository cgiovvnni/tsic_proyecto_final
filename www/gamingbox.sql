DROP TABLE IF EXISTS `tarjetas`;
CREATE TABLE `tarjetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ventas` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `mes` int(2) NOT NULL,
  `año` int(2) NOT NULL,
  `tarjeta` varchar(255) NOT NULL,
  `cvc` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tarjetas` WRITE;
INSERT INTO `tarjetas` VALUES (12,1,'Rodrigo',12,24,'3243234323434324',435,'2022-05-28 19:04:26'),(13,2,'Rodrigo',12,24,'4234 4324 4234 4325',545,'2022-05-28 19:05:29'),(14,3,'Rodrigo',12,24,'4234 4324 4234 4325',656,'2022-05-28 19:06:19'),(15,4,'Rodrigo',12,24,'4234 4324 4234 4325',535,'2022-05-28 19:08:59'),(16,5,'Rodrigo',12,24,'1231254321567823',535,'2022-05-28 19:16:26'),(17,6,'Rodrigo',12,25,'4234 4324 4234 4324',435,'2022-05-28 19:21:55'),(18,7,'Rodrigo',11,24,'4234 4324 4234 4324',123,'2022-05-28 20:00:20'),(19,8,'Rodrigo',12,24,'4234 4324 4234 4325',123,'2022-05-28 20:20:14');
UNLOCK TABLES;

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_videojuego` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(5) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4;


LOCK TABLES `ventas` WRITE;
INSERT INTO `ventas` VALUES (109,1,'Fifa 22',900,1,NULL,NULL,'2022-05-31 05:31:11');
UNLOCK TABLES;


DROP TABLE IF EXISTS `videojuegos`;
CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `inventario` int(5) NOT NULL,
  `categoria` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;


LOCK TABLES `videojuegos` WRITE;
INSERT INTO `videojuegos` VALUES (1,'Fifa 22',900,5,'ps5','images/fifa_22_ps5.jpg','2022-05-31 05:25:20'),(2,'Spiderman',800,3,'ps5','images/spiderman_ps5.jpg','2022-05-31 05:25:21'),(3,'GTA V',700,8,'ps5','images/gta_ps5.jpg','2022-05-31 05:25:21'),(4,'Gran Turismo 7',1200,10,'ps5','images/gran_turismo_ps5.jpg','2022-05-31 05:25:21'),(5,'Horizon Forbidden',1300,5,'ps5','images/horizon_ps5.jpg','2022-05-31 05:25:21'),(6,'God of War',1500,5,'ps5','images/god_of_war_ps5.jpg','2022-05-31 05:25:21'),(7,'Gears of War',700,7,'xbox','images/gears_xbox.jpg','2022-05-31 05:25:21'),(8,'Call of Duty',600,5,'xbox','images/cod_xbox.jpeg','2022-05-31 05:25:21'),(9,'Red Dead Redemption',900,8,'xbox','images/rdr2_xbox.jpg','2022-05-31 05:25:21'),(10,'Borderlands',900,4,'xbox','images/border_xbox.jpg','2022-05-31 05:25:21'),(11,'Halo',1000,5,'xbox','images/halo_xbox.jpg','2022-05-31 05:25:21'),(12,'Battlefield',1200,9,'xbox','images/battle_xbox.jpg','2022-05-31 05:25:21'),(13,'Audifonos',850,8,'accesorios','images/audifonos.jpg','2022-05-31 05:25:21'),(14,'Silla Gamer',2000,9,'accesorios','images/silla.jpg','2022-05-31 05:25:21'),(15,'Control Xbox',1300,10,'accesorios','images/xbox_control.jpg','2022-05-31 05:25:21'),(16,'Control Playstation',1500,8,'accesorios','images/control_ps5.jpg','2022-05-31 05:25:21'),(17,'Bocinas',900,5,'accesorios','images/bocinas.jpg','2022-05-31 05:25:21');
UNLOCK TABLES;
