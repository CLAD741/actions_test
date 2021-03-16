CREATE TABLE IF NOT EXISTS `#__preguntas_frecuentes_tema` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(655) NULL,
  `created_by` datetime NULL,
  `state` INT NULL,
  `ordering` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__preguntas_frecuentes_preguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(655) NULL,
  `respuesta` VARCHAR(655) NULL,
  `created_by` datetime NULL,
  `state` INT NULL,
  `ordering` INT NULL,
  `dsit_preguntas_frecuentes_tema_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dsit_preguntas_frecuentes_preguntas_dsit_preguntas_frecu_idx` (`dsit_preguntas_frecuentes_tema_id` ASC),
  CONSTRAINT `fk_dsit_preguntas_frecuentes_preguntas_dsit_preguntas_frecuen1`
    FOREIGN KEY (`dsit_preguntas_frecuentes_tema_id`)
    REFERENCES `#__preguntas_frecuentes_tema` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__preguntas_frecuentes_calificacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `calificacion` INT NULL,
  `created_by` datetime NULL,
  `state` INT NULL,
  `ordering` INT NULL,
  `dsit_preguntas_frecuentes_preguntas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dsit_preguntas_frecuentes_calificacion_dsit_preguntas_fr_idx` (`dsit_preguntas_frecuentes_preguntas_id` ASC),
  CONSTRAINT `fk_dsit_preguntas_frecuentes_calificacion_dsit_preguntas_frec`
    FOREIGN KEY (`dsit_preguntas_frecuentes_preguntas_id`)
    REFERENCES `#__preguntas_frecuentes_preguntas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;