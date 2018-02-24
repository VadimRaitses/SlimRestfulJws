CREATE TABLE `entities`.`entity` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(45) DEFAULT NULL,
   `text` varchar(45) DEFAULT NULL,
   `updated_at` timestamp NULL DEFAULT NULL,
   `created_at` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1