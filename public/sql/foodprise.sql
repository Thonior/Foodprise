-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2013 a las 22:58:37
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `foodprise`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edge`
--

CREATE TABLE IF NOT EXISTS `edge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `context` varchar(45) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `destowner` int(11) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `node`
--

INSERT INTO `node` (`id`, `title`, `description`, `img`, `user_id`, `created`) VALUES
(1, 'Hola', 'hola', 'bfab30006f3c723347115ff70afacc76.jpg', 0, 0),
(2, 'Nodo con tags', 'Nodo con tags', '35e221e3ebd787de0636cac049b9461d.jpg', 0, 0),
(3, 'Nodo con tags', 'Nodo con tags', '35e221e3ebd787de0636cac049b9461d1.jpg', 0, 0),
(4, 'Nodo con tags', 'Nodo con tags', '35e221e3ebd787de0636cac049b9461d2.jpg', 0, 0),
(5, 'Nodo con tags', 'Nodo con tags', '35e221e3ebd787de0636cac049b9461d3.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `category` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tag`
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
(25, 'media', 'Media', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_node`
--

CREATE TABLE IF NOT EXISTS `tag_node` (
  `id_tag` int(11) NOT NULL,
  `id_node` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_node`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `created`, `email`, `password`, `role`, `twitter`, `city`, `language`, `age`, `genre`, `bio`, `username`) VALUES
(1, NULL, NULL, 0, 'julio.perdiguer@gmail.com', 'b592ceea0c06a8f19816a7a5a4d64101', 'ROLE_USER', NULL, NULL, NULL, NULL, NULL, NULL, 'Thonior');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
