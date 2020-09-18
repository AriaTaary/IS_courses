# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.7.28)
# Схема: lab_pis_exam
# Время создания: 2020-06-07 15:49:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы directions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `directions`;

CREATE TABLE `directions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;

INSERT INTO `directions` (`id`, `code`, `name`, `description`, `price`)
VALUES
	(1,'09.03.01','Веб-технологии','Направление учит анализировать проблемы и предлагать современные и эффективные веб-решения, проектировать веб-сервисы и приложения, программировать на Python, PHP, Java, Unity, Javascript и других языках.',170000),
	(2,'09.03.02','Интегрирование и программирование в САПР','Направление учит разрабатывать специализированные мобильные, облачные и веб-ориентированные приложения с использованием языков программирования С++, С#, JS, Python; платформ Autodesk Forge, Unity, С3D; технологий AR/VR и других, профессионально работать в современных CAD/CAE системах, всем необходимым знаниям для инженера, по стандартам Индустрии 4.0 и цифрового производства.',150000),
	(3,'10.03.01','Прикладная кибербезопасность','Направление учит аудиту безопасности информационных систем, обеспечению защиты программного обеспечения, автоматизированных систем и баз данных, программированию и реверс-инжинирингу на C, C++, Python, PHP, JavaScript и других, веб-технологиям: HTTP, HTML, CSS, PWA и прочим.',200000),
	(4,'10.03.02','Корпоративные информационные системы','Направление учит анализировать, моделировать, проектировать и проводить реинжиниринг бизнес-процессов, внедрять и настраивать КИС для компаний разных отраслей и масштабности, проектировать, разрабатывать и тестировать настольные, веб и мобильные приложения, автоматизирующие широкий класс бизнес-задач.',170000),
	(5,'01.03.01','Киберфизические системы','Направление учит строить и программировать беспилотные наземные и летательные аппараты, внедрять роботизированное производство и технологии интернета вещей, программировать и использовать AVR Assembler, AVR C/C++, STM C, Wiring (Arduino), Ms C++/C#, LabView, Python, MatLAB, Verilog (FPGA), KAREL (Fanuc), Node.Js (PTC ThingWorx), фреймворки OpenCV, Tensorflow, OpenGL, ROS, технологии передачи данных в сетях, микроэлектронику и многое другое.',150000),
	(6,'01.03.02','Большие и открытые данные','Направление учит работать с хранилищами данных разных типов и с инструментами анализа больших данных, использовать методы математического анализа, статистики и теории вероятности для обработки данных, создавать модели с помощью классического машинного обучения и нейронных сетей для решения задач.',200000);

/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы gender
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;

INSERT INTO `gender` (`id`, `name`)
VALUES
	(1,'Мужской'),
	(2,'Женский');

/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(11) NOT NULL DEFAULT '',
  `direction_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`direction_id`),
  UNIQUE KEY `number_UNIQUE` (`number`),
  KEY `fk_groups_directions1_idx` (`direction_id`),
  CONSTRAINT `fk_groups_directions1` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `number`, `direction_id`)
VALUES
	(1,'161-311',5),
	(4,'161-332',1),
	(3,'171-311',5),
	(5,'171-332',1);

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;

INSERT INTO `payment` (`id`, `name`)
VALUES
	(1,'Оплачено'),
	(2,'Не оплачено');

/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы professors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `professors`;

CREATE TABLE `professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `patronym` varchar(45) NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`gender_id`),
  KEY `fk_professors_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_professors_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `professors` WRITE;
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;

INSERT INTO `professors` (`id`, `surname`, `name`, `patronym`, `gender_id`)
VALUES
	(1,'Алексеев','Алексей','Алексеевич',1),
	(2,'Павлов','Павел','Павлович',1),
	(3,'Иванов','Иван','Иванович',1),
	(4,'Александров','Александр','Александрович',1),
	(5,'Михайлов','Михаил','Михайлович',1),
	(6,'Сергеев','Сергей','Сергеевич',1);

/*!40000 ALTER TABLE `professors` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы professors_has_subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `professors_has_subjects`;

CREATE TABLE `professors_has_subjects` (
  `professor_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `subject_direction_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`professor_id`,`subject_id`,`subject_direction_id`),
  KEY `fk_professors_has_subjects_subjects1_idx` (`subject_id`,`subject_direction_id`),
  KEY `fk_professors_has_subjects_professors1_idx` (`professor_id`),
  KEY `fk_direction_id` (`subject_direction_id`),
  CONSTRAINT `fk_direction_id` FOREIGN KEY (`subject_direction_id`) REFERENCES `directions` (`id`),
  CONSTRAINT `fk_professors_has_subjects_professors1` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subjects_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `professors_has_subjects` WRITE;
/*!40000 ALTER TABLE `professors_has_subjects` DISABLE KEYS */;

INSERT INTO `professors_has_subjects` (`professor_id`, `subject_id`, `subject_direction_id`)
VALUES
	(1,2,1),
	(2,4,1),
	(3,25,1),
	(4,24,1),
	(5,23,1),
	(5,27,3);

/*!40000 ALTER TABLE `professors_has_subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `runame` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;

INSERT INTO `status` (`id`, `name`, `runame`)
VALUES
	(1,'administrator','Администратор'),
	(2,'rector','Ректор'),
	(3,'edu_counsil','Учебно-методический совет'),
	(4,'students_center','Центр по работе со студентами');

/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `patronym` varchar(45) NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `payment_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`gender_id`,`payment_id`,`group_id`),
  KEY `fk_students_gender_idx` (`gender_id`),
  KEY `fk_students_payment1_idx` (`payment_id`),
  KEY `fk_students_groups1_idx` (`group_id`),
  CONSTRAINT `fk_students_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `surname`, `name`, `patronym`, `gender_id`, `payment_id`, `group_id`)
VALUES
	(1,'Игорев','Игорь','Игоревич',1,1,1),
	(2,'Николаев','Николай','Николаевич',1,2,4),
	(3,'Никитов','Никита','Никитич',1,1,3),
	(4,'Олегов','Олег','Олегович',1,2,5);

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `direction_id` int(10) unsigned NOT NULL,
  `type_exam_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`direction_id`,`type_exam_id`),
  KEY `fk_subjects_type_exam1_idx` (`type_exam_id`),
  CONSTRAINT `fk_subjects_type_exam1` FOREIGN KEY (`type_exam_id`) REFERENCES `type_exam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `name`, `description`, `direction_id`, `type_exam_id`)
VALUES
	(2,'Математическая логика','-',1,1),
	(4,'Проектирование информационных систем','',1,1),
	(23,'Иностранный язык','',1,1),
	(24,'Разработка в КИС','',1,1),
	(25,'Трехмерные модели в веб-приложениях','',1,2),
	(27,'Веб-аналитика','',1,2);

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы type_exam
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type_exam`;

CREATE TABLE `type_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `type_exam` WRITE;
/*!40000 ALTER TABLE `type_exam` DISABLE KEYS */;

INSERT INTO `type_exam` (`id`, `name`)
VALUES
	(1,'Экзамен'),
	(2,'Зачёт');

/*!40000 ALTER TABLE `type_exam` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `fathername` varchar(25) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `auth_token` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`,`status_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_status1_idx` (`status_id`),
  CONSTRAINT `fk_users_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `name`, `surname`, `fathername`, `status_id`, `auth_token`)
VALUES
	(7,'admin@admin.ru','2db9a2cd5d3cdab76651c22b6d60df58992ab5c140899a320d017dda3c763cf0c60eee24cb80e306f9038d986c5b259b3cae6b6d6abf9d79deb376298daa2c9d','LHNNREGOQIMJMXQASMNOFWOBIFJHXQVNZUKYZXWKHIRBW','Admin','Admin','Admin',1,'294007b7c9b30fae877811a45f83bf040f635135f89d60a135d8e3bb12ad5a37');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
