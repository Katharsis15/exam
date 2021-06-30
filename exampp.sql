-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 30 2021 г., 19:49
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exampp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `path`) VALUES
(17, '1622400101_cas.jpg'),
(18, '1622400159_rabbits.jpg'),
(19, '1622400175_20190911_214129.jpg'),
(20, '1622401750_20190715_152559.jpg'),
(21, '1623350306_shark.jpg'),
(23, '1625071920_tulen.jpg'),
(24, '1625073128_tulen.jpg'),
(25, '1625073767_tulen.jpg'),
(26, '1625073980_tulen.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `master_type_price`
--

CREATE TABLE `master_type_price` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `master_type_price`
--

INSERT INTO `master_type_price` (`id`, `type_id`, `master_id`, `price`) VALUES
(1, 1, 1, 700),
(2, 2, 1, 700),
(3, 3, 1, 700),
(4, 4, 1, 700),
(5, 1, 3, 700),
(6, 2, 3, 700),
(7, 3, 3, 700),
(8, 4, 3, 700);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `master_type_price_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `master_type_price_id`, `date`, `time`) VALUES
(17, 2, 5, '2021-06-30', '19:00-20:00'),
(18, 4, 1, '2021-06-30', '19:00-20:00'),
(19, 4, 3, '2021-07-01', '10:00-11:00'),
(20, 2, 7, '2021-07-01', '10:00-11:00'),
(23, 13, 1, '2021-07-01', '20:00-21:00');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `kind` varchar(35) NOT NULL,
  `covering` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `kind`, `covering`) VALUES
(1, 'shellac', 'glossy'),
(2, 'shellac', 'matt'),
(3, 'gel_polish', 'glossy'),
(4, 'gel_polish', 'matt');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `surname` varchar(35) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `phone`, `login`, `password`, `status`) VALUES
(1, 'Катарина', 'Петрова', 79119119191, 'kata', '123', 'master'),
(2, 'Катарина', 'Петрова', 79119119191, 'kata', '123', 'client'),
(3, 'София', 'Иванова', 79119119191, 'sofa', '123', 'master'),
(4, 'София', 'Иванова', 79119119191, 'sofa', '123', 'client'),
(13, 'Ольга', 'Сидорова', 79119119191, 'ola', '123', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `master_type_price`
--
ALTER TABLE `master_type_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`,`master_type_price_id`),
  ADD KEY `master_type_price_id` (`master_type_price_id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `master_type_price`
--
ALTER TABLE `master_type_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `master_type_price`
--
ALTER TABLE `master_type_price`
  ADD CONSTRAINT `master_type_price_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `master_type_price_ibfk_2` FOREIGN KEY (`master_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`master_type_price_id`) REFERENCES `master_type_price` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
