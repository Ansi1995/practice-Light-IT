-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 25 2018 г., 19:08
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `weather`
--

-- --------------------------------------------------------

--
-- Структура таблицы `danye`
--

CREATE TABLE IF NOT EXISTS `danye` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_pogod` varchar(11) NOT NULL,
  `name_gorod` varchar(50) NOT NULL,
  `temperature` varchar(50) NOT NULL,
  `pressure` varchar(50) NOT NULL,
  `humidity` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`date_pogod`,`name_gorod`,`temperature`,`pressure`,`humidity`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `danye`
--

INSERT INTO `danye` (`id`, `date_pogod`, `name_gorod`, `temperature`, `pressure`, `humidity`) VALUES
(33, '21-01-2018', 'Kiev', '-1°C', '757мм рт. ст.', '98%'),
(34, '21-01-2018', 'Melitopol', '-1°C', '764мм рт. ст.', '97%'),
(35, '21-01-2018', 'Cornas', '7°C', '732мм рт. ст.', '91%'),
(39, '21-01-2018', 'Париж', '-5°C', '755мм рт. ст.', '87%');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
