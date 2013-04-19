-- phpMyAdmin SQL Dump
-- version 2.9.0
-- http://www.phpmyadmin.net
-- 
-- Servidor: hl158.dinaserver.com
-- Tiempo de generación: 19-04-2013 a las 16:27:06
-- Versión del servidor: 5.1.67
-- Versión de PHP: 5.2.11
-- 
-- Base de datos: `foodprise`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `edge`
-- 

CREATE TABLE `edge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `context` varchar(45) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `destowner` int(11) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `edge`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `node`
-- 

CREATE TABLE `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `original` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `large` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Volcar la base de datos para la tabla `node`
-- 

INSERT INTO `node` (`id`, `title`, `description`, `original`, `user_id`, `created`, `thumb`, `large`) VALUES 
(12, 'Test', 'Test', 'vichyssoise_0.jpg', 1, 1366378899, 'thumb_vichyssoise_0.jpg', ''),
(13, 'Test', 'Test', 'vichyssoise_01.jpg', 1, 1366378978, 'thumb_vichyssoise_01.jpg', ''),
(14, 'fdasfa', 'dsafasdf', '20130210_1338261.jpg', 1, 1366379055, 'thumb_20130210_1338261.jpg', ''),
(15, 'gasfdsaf', 'asdfasdf', '20130210_1338262.jpg', 1, 1366379105, 'thumb_20130210_1338262.jpg', ''),
(16, 'gasfdsaf', 'asdfasdf', '<', 1, 1366379179, 'thumb_<', ''),
(17, 'asfdsafdas', 'fadsfasdfas', '<', 1, 1366379198, 'thumb_<', ''),
(18, 'asfdsafdas', 'fadsfasdfas', '20130324_1910501.jpg', 1, 1366379253, 'thumb_20130324_1910501.jpg', ''),
(19, 'asfdsafdas', 'fadsfasdfas', '20130324_1910503.jpg', 1, 1366379881, 'thumb_20130324_1910503.jpg', '20130324_1910503.jpg'),
(20, 'Node con category', 'Node con category', '20130210_1338263.jpg', 1, 1366380623, 'thumb_20130210_1338263.jpg', '20130210_1338263.jpg'),
(21, 'dsadfsa', 'dsfafdsafa', '20130210_1338264.jpg', 1, 1366380664, 'thumb_20130210_1338264.jpg', '20130210_1338264.jpg'),
(22, 'dsadfsa', 'dsfafdsafa', '20130210_1338265.jpg', 1, 1366380897, 'thumb_20130210_1338265.jpg', '20130210_1338265.jpg'),
(23, 'dsadfsa', 'dsfafdsafa', '20130210_1338266.jpg', 1, 1366380919, 'thumb_20130210_1338266.jpg', '20130210_1338266.jpg'),
(24, 'dsadfsa', 'dsfafdsafa', '20130210_1338267.jpg', 1, 1366380959, 'thumb_20130210_1338267.jpg', '20130210_1338267.jpg'),
(25, 'dsadfsa', 'dsfafdsafa', '20130210_1338268.jpg', 1, 1366380979, 'thumb_20130210_1338268.jpg', '20130210_1338268.jpg'),
(26, 'dsadfsa', 'dsfafdsafa', '20130210_1338269.jpg', 1, 1366381026, 'thumb_20130210_1338269.jpg', '20130210_1338269.jpg'),
(27, 'dsadfsa', 'dsfafdsafa', '20130210_13382610.jpg', 1, 1366381045, 'thumb_20130210_13382610.jpg', '20130210_13382610.jpg'),
(28, 'dsadfsa', 'dsfafdsafa', '20130210_13382611.jpg', 1, 1366381118, 'thumb_20130210_13382611.jpg', '20130210_13382611.jpg'),
(29, 'fasdfasdf', 'dfsafdsa', '20130210_13382612.jpg', 1, 1366381163, 'thumb_20130210_13382612.jpg', '20130210_13382612.jpg'),
(30, 'fasdfasdf', 'dfsafdsa', '20130210_13382613.jpg', 1, 1366381446, 'thumb_20130210_13382613.jpg', '20130210_13382613.jpg');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tag`
-- 

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `category` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Volcar la base de datos para la tabla `tag`
-- 

INSERT INTO `tag` (`id`, `slug`, `tag`, `category`) VALUES 
(4, 'food', 'Food', 1),
(5, 'drinks', 'Drinks', 1),
(6, 'gadgets', 'Gadgets', 1),
(7, 'kitchens', 'Kitchens', 1),
(8, 'appliances', 'Appliances', 1),
(9, 'publications', 'Publications', 1),
(10, 'restaurants & bars', 'Restaurants & Bars', 1),
(11, 'recipes', 'Recipes', 1),
(12, 'video / media', 'Video / Media', 1),
(13, 'photography', 'Photography', 1),
(14, 'illustration', 'Illustration', 1),
(15, 'design', 'Design', 1),
(16, 'travel', 'Travel', 1),
(17, 'shops', 'Shops', 1),
(18, 'courses', 'Courses', 1),
(19, 'jobs', 'Jobs', 1),
(20, 'associations', 'Associations', 1),
(21, 'others', 'Othres', 1),
(22, 'restaurants', 'Restaurants', 0),
(23, 'bars', 'Bars', 0),
(24, 'video', 'Video', 0),
(25, 'media', 'Media', 0),
(26, 'tortilla', 'Tortilla', 0),
(27, '', '', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tag_node`
-- 

CREATE TABLE `tag_node` (
  `id_tag` int(11) NOT NULL,
  `id_node` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_node`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `tag_node`
-- 

INSERT INTO `tag_node` (`id_tag`, `id_node`) VALUES 
(4, 12),
(4, 13),
(5, 23),
(5, 29),
(5, 30),
(27, 4),
(27, 9),
(27, 10),
(27, 11);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'ROLE_USER',
  `twitter` varchar(45) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `user`
-- 

INSERT INTO `user` (`id`, `name`, `lastname`, `created`, `email`, `password`, `role`, `twitter`, `city`, `language`, `age`, `genre`, `bio`, `username`) VALUES 
(1, NULL, NULL, 0, 'julio.perdiguer@gmail.com', 'b592ceea0c06a8f19816a7a5a4d64101', 'ROLE_USER', NULL, NULL, NULL, NULL, NULL, NULL, 'Thonior');
