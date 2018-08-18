-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2018 г., 19:56
-- Версия сервера: 5.6.38-log
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` smallint(8) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `author` varchar(32) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ISBN` int(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `data`, `ISBN`) VALUES
(1, 'Автостопом по галактике', 'Гавриленко', '2018-03-12', 1119477),
(2, 'Автостопом по галактике', 'Гавриленко', '2018-03-12', 1119477),
(3, 'Русский язык для начинающих', 'Лешик', '2018-03-12', 1111947);

-- --------------------------------------------------------

--
-- Структура таблицы `booksrubrics`
--

CREATE TABLE `booksrubrics` (
  `id` smallint(8) NOT NULL,
  `id_books` smallint(8) DEFAULT NULL,
  `id_rubrics` smallint(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `booksrubrics`
--

INSERT INTO `booksrubrics` (`id`, `id_books`, `id_rubrics`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1534520160),
('m180817_152252_books', 1534520163),
('m180817_152323_rubrics', 1534520163),
('m180817_153654_booksrubrics', 1534521381),
('m180818_155039_user', 1534607485);

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE `rubrics` (
  `id` smallint(8) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rubrics`
--

INSERT INTO `rubrics` (`id`, `name`) VALUES
(1, 'Математика'),
(2, 'Физика'),
(3, 'География ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` smallint(8) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `access_toke` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `access_toke`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', ''),
(6, 'dima', '0f5b25cd58319cde0e6e33715b66db4c', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `booksrubrics`
--
ALTER TABLE `booksrubrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chain_to_books` (`id_books`),
  ADD KEY `chain_to_rubrics` (`id_rubrics`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `booksrubrics`
--
ALTER TABLE `booksrubrics`
  MODIFY `id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `booksrubrics`
--
ALTER TABLE `booksrubrics`
  ADD CONSTRAINT `chain_to_books` FOREIGN KEY (`id_books`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chain_to_rubrics` FOREIGN KEY (`id_rubrics`) REFERENCES `rubrics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
