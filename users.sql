CREATE TABLE `users` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `email` varchar(25) NOT NULL,
   `password` varchar(50) NOT NULL,
   `updated_at` timestamp NULL DEFAULT NULL,
   `created_at` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1