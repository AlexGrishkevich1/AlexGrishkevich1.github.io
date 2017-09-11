-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 11 2017 г., 10:01
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `author_music`
--

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id_music` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  `format` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id_music`, `name`, `author`, `format`) VALUES
(24, '124', 1, 'mp3'),
(26, '700', 1, 'mp3'),
(27, 'tat', 1, 'mp3'),
(28, 'seven', 1, 'mp3'),
(29, '900', 1, 'mp3'),
(30, 'pow', 1, 'mp3'),
(31, '1111', 2, 'mp3'),
(32, 'tete', 7, 'mp3'),
(41, 'fafa', 26, 'mp3'),
(45, '11', 28, 'mp3'),
(46, '12', 28, 'mp3'),
(47, '44', 28, 'mp3'),
(48, '55', 28, 'mp3'),
(49, '16', 28, 'mp3');

-- --------------------------------------------------------

--
-- Структура таблицы `music_genre`
--

CREATE TABLE `music_genre` (
  `id_music` int(10) UNSIGNED NOT NULL,
  `id_genre` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `login`, `password`, `name`) VALUES
(1, 'leshik1101@mail.ru', 'Alex', '101010101', 'one'),
(2, 'abba@mail.ru', 'abba', '101', 'abba'),
(7, 'tete@tut.by', 'tete', '101', 'tete'),
(26, 'papa@mail.ru', 'paps', '$2y$10$vGHkcAiNGtS2v5V2Z9rCGOSqFMCyfSV8QFCJhlhVMmDz5Bn1htxmi', 'papas'),
(27, 'batya@mail.ru', 'batya', '$2y$10$4iuvW3.lGo.yueHUx7e.Qud9iyo3mbgkYTwhwEl.DA2knp/K4C09.', 'batya'),
(28, 'lesha1@mail.ru', 'lesha', '$2y$10$BFyv2C92j/9ROv53/EyWY.GdERYOWQACbNsivcZjduBS6agqHW7Re', 'lesha'),
(29, 'bobo@mail.ru', 'bobo', '$2y$10$A1TcVq81FIGSEXF.VFfCN.KGNooOW5vUd/zBA/ePwDQgV9/WLEs92', 'bobo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `music_genre`
--
ALTER TABLE `music_genre`
  ADD KEY `id_music` (`id_music`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `music_genre`
--
ALTER TABLE `music_genre`
  ADD CONSTRAINT `music_genre_ibfk_1` FOREIGN KEY (`id_music`) REFERENCES `music` (`id_music`),
  ADD CONSTRAINT `music_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
