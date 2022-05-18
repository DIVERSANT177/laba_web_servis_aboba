-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2022 г., 20:44
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exhibition`
--

-- --------------------------------------------------------

--
-- Структура таблицы `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `halls`
--

INSERT INTO `halls` (`id`, `title`) VALUES
(1, 'Пейзажи'),
(2, 'Картиночки'),
(3, 'Пикассо');

-- --------------------------------------------------------

--
-- Структура таблицы `paintings`
--

CREATE TABLE `paintings` (
  `id` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `id_halls` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `paintings`
--

INSERT INTO `paintings` (`id`, `image`, `name`, `id_halls`, `description`, `dates`) VALUES
(57, '1.jpg', 'Котики2323!!кОТИКИ', 2, 'Они такие красивыеlflf очень красивые', '2022-03-03'),
(58, '2.jpg', 'Еще котятки', 1, 'Много котиков не бывает', '2022-03-04'),
(59, 'asdf.jpg', 'Лисичка', 3, 'Какая же она красивая', '2022-03-12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` varchar(50) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` smallint(10) NOT NULL,
  `Date_birth` date NOT NULL,
  `Interests` varchar(255) NOT NULL,
  `VK` varchar(100) NOT NULL,
  `Group_blood` smallint(10) NOT NULL,
  `RH_factor` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `FIO`, `Login`, `Password`, `Address`, `Gender`, `Date_birth`, `Interests`, `VK`, `Group_blood`, `RH_factor`) VALUES
('61a932dcb94e2', 'ывад выа лавыа', 'a@a', 'e66648c5072b57483a49c0e3a507cf73', 'gdfs', 0, '2021-11-11', 'sd', 'gs', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `paintings`
--
ALTER TABLE `paintings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_halls` (`id_halls`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `paintings`
--
ALTER TABLE `paintings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `paintings`
--
ALTER TABLE `paintings`
  ADD CONSTRAINT `paintings_ibfk_1` FOREIGN KEY (`id_halls`) REFERENCES `halls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
