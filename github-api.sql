-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 22 2013 г., 11:51
-- Версия сервера: 5.1.67-rel14.3-log
-- Версия PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `github-api`
--

-- --------------------------------------------------------

--
-- Структура таблицы `respo_like`
--

CREATE TABLE IF NOT EXISTS `respo_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_respo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `respo_like`
--

INSERT INTO `respo_like` (`id`, `id_user`, `id_respo`) VALUES
(1, 5269085, 3451238),
(8, 5269085, 5875642),
(6, 5269085, 2576930);

-- --------------------------------------------------------

--
-- Структура таблицы `users_like`
--

CREATE TABLE IF NOT EXISTS `users_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `users_like_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `users_like`
--

INSERT INTO `users_like` (`id`, `id_user`, `users_like_id`) VALUES
(25, 5269085, 47294),
(21, 5269085, 1482054),
(28, 5269085, 209837);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
