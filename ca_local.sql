CREATE DATABASE IF NOT EXISTS `ca_local`;

USE `ca_local`;

CREATE TABLE IF NOT EXISTS `ca_local`.`data_user`(
	`id_data_user` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`nombre` varchar(25) NOT NULL,
	`apellido` varchar(25) NOT NULL,
	`correo` varchar(25) NOT NULL,
	`telefono` varchar(25) NOT NULL,
	`sexo` BOOLEAN NOT NULL COMMENT '1 MASCULINO 0 FEMENINO',
	`direccion` varchar(100) NOT NULL
);
INSERT INTO `ca_local`.`tipo_user`(`id_tipo_user`,`name_tipo_user`)VALUES
(NULL,'admin','admin','admin@admin.com','0000-0000000',1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit.');

CREATE TABLE IF NOT EXISTS `ca_local`.`tipo_user`(
	`id_tipo_user` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name_tipo_user` varchar(25) NOT NULL
);

INSERT INTO `ca_local`.`tipo_user`(`id_tipo_user`,`name_tipo_user`)VALUES
(NULL,'ADMINISTRADOR'),
(NULL,'SUPERVISOR'),
(NULL,'GERENTE'),
(NULL,'EMPLEADO');

CREATE TABLE IF NOT EXISTS `ca_local`.`usuarios`(
	`id_user` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name_user` varchar(25) NOT NULL,
	`pass_user` varchar(60) NOT NULL,
	`forgot_pass` varchar(25) NOT NULL,
	`statud_user` tinyint(1) NOT NULL COMMENT '1 ACTIVO 2 INACTIVO',
	`id_data_user` INT(11) NOT NULL,
	`id_tipo_user` INT(11) NOT NULL,
	FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`),
	FOREIGN KEY (`id_tipo_user`) REFERENCES `tipo_user` (`id_tipo_user`)
);

INSERT INTO `ca_local`.`usuarios`(`id_user`,`name_user`,`pass_user`,`forgot_pass`,`statud_user`,`id_data_user`,`id_tipo_user`) VALUES
(NULL,'admin','$2y$10$K59QWqBc6BHEUjJEwKUIv.Wy05/R.Ke3jsHyBFPPYb5DHtrRCjGCC','admin',1,1,1);
CREATE TABLE IF NOT EXISTS `ca_local`.`tipo_reportes`(
	`id_tipo_reporte` INT(11) PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE IF NOT EXISTS `ca_local`.`reportes`(
	`id_reporte` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`id_tipo_reporte` INT(11) NOT NULL,
	`id_user` INT(11) NOT NULL,
	FOREIGN KEY (`id_tipo_reporte`) REFERENCES `tipo_reportes` (`id_tipo_reporte`),
	FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`)
);

