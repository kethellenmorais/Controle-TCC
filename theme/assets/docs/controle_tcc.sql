CREATE DATABASE controle_tcc;
USE controle_tcc;
-- DROP DATABASE controle_tcc;

CREATE TABLE IF NOT EXISTS `usuarios` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(120) NOT NULL,
  `access` CHAR(1) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS `grupos` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(120) NOT NULL, 
  `description` VARCHAR(255) NOT NULL,
  `user_id_group` INT,
  `teacher_id_group` INT
);

CREATE TABLE IF NOT EXISTS `entregas` (
	`id` INT PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(120) NOT NULL,
  `user` VARCHAR(120),
	`date` DATE NOT NULL,
	`date_delivery` DATE,
  `note` VARCHAR(5),
  `filename` VARCHAR(120),
	`group_id` INT
);

ALTER TABLE `entregas` ADD CONSTRAINT `group_task_fk` FOREIGN KEY (`group_id`) REFERENCES 
`grupos` (`id`) ON DELETE CASCADE;

ALTER TABLE `grupos` ADD CONSTRAINT `group_user_fk` FOREIGN KEY (`user_id_group`) REFERENCES 
`usuarios` (`id`) ON DELETE CASCADE;

ALTER TABLE `grupos` ADD CONSTRAINT `group_teacher_fk` FOREIGN KEY (`teacher_id_group`) REFERENCES 
`usuarios` (`id`) ON DELETE CASCADE;

SELECT * FROM usuarios;
SELECT * FROM `grupos`;

INSERT INTO `grupos` (name, description, user_id_group, teacher_id_group) VALUES ("Action Grupo", " O marketing é uma ferramenta estratégica voltada para o posicionamento mercadológico que atua, inclusive na atribuição de valor.", 1, 2);