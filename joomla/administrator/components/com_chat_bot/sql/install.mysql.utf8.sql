CREATE TABLE IF NOT EXISTS `#__logchatbot` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`codrespuesta` INT(11) NOT NULL,
	`pregunta` VARCHAR(255) NOT NULL,
	`created_by` INT(11) NOT NULL,
	`state` INT(11) NOT NULL,
	`ordering` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB COMMENT="" DEFAULT COLLATE=utf8_general_ci;
