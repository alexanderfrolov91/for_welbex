-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 15 2020 г., 20:20
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `z`
--

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `date`, `title`, `quantity`, `distance`) VALUES
(1, '2020-08-02', 't', 1, 20),
(2, '2020-08-03', 's', 2, 19),
(3, '2020-08-04', 'r', 3, 18),
(4, '2020-08-05', 'q', 4, 17),
(5, '2020-08-06', 'p', 5, 16),
(6, '2020-08-07', 'o', 6, 15),
(7, '2020-08-08', 'n', 7, 14),
(8, '2020-08-09', 'm', 8, 13),
(9, '2020-08-10', 'l', 9, 12),
(10, '2020-08-11', 'k', 10, 11),
(11, '2020-08-12', 'j', 11, 10),
(12, '2020-08-13', 'i', 12, 9),
(13, '2020-08-14', 'h', 13, 8),
(14, '2020-08-15', 'g', 14, 7),
(15, '2020-08-16', 'f', 15, 6),
(16, '2020-08-17', 'e', 16, 5),
(17, '2020-08-18', 'd', 17, 4),
(18, '2020-08-19', 'c', 18, 3),
(19, '2020-08-20', 'b', 19, 2),
(20, '2020-08-21', 'a', 20, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
