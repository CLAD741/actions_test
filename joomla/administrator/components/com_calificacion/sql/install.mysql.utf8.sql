CREATE TABLE IF NOT EXISTS `#__calificacion_notas` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255) NOT NULL,
	`correo` VARCHAR(255) NOT NULL,
	`comentario` VARCHAR(255) NOT NULL,
	`nota` VARCHAR(255) NOT NULL,
	`fecha` VARCHAR(255) NOT NULL,
	`usuario` VARCHAR(255) NOT NULL,
	`created_by` INT(11) NOT NULL,
	`state` INT(11) NOT NULL,
	`ordering` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT="" DEFAULT COLLATE=utf8_general_ci;
