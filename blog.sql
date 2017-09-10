-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 30 2017 г., 16:59
-- Версия сервера: 5.5.53-log
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pas` varchar(32) NOT NULL,
  `cookie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `email`, `pas`, `cookie`) VALUES
(1, 'readfree@ukr.net', '12345', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Ситибайк'),
(2, 'Маунтинбайк'),
(3, 'Найнер');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `entry_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `entry_id`, `date`, `author`, `content`) VALUES
(5, 3, 1503912253, 'Detrix', 'Таму там'),
(6, 5, 1503912253, 'Detrix', '1213'),
(7, 5, 1503942294, '243', 'zczxczxcz');

-- --------------------------------------------------------

--
-- Структура таблицы `entry`
--

CREATE TABLE `entry` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `content` longtext,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `entry`
--

INSERT INTO `entry` (`id`, `author`, `date`, `header`, `content`, `image`, `category_id`) VALUES
(3, 'dertix', 1503949341, 'Discovery Attack 29″ 2017', 'Основа модели базируется на стальной раме, прочной и мощной. Амортизационная вилка превосходно справляется со своей задачей, полностью поглощает неровности дорожного полотна. Ardis Jetix MTB 26″ имеет большой выбор скоростных режимов, благодаря чему Вы можете настроить байк непосредственно под свои возможности.', '/img/3.jpg', 1),
(4, 'testo', 1503949341, 'Formula Smart 24″ ', 'Основа модели базируется на стальной раме, прочной и мощной. Амортизационная вилка превосходно справляется со своей задачей, полностью поглощает неровности дорожного полотна. Ardis Jetix MTB 26″ имеет большой выбор скоростных режимов, благодаря чему Вы можете настроить байк непосредственно под свои возможности.', '/img/4.jpg', 3),
(5, 'dertix', 1503949341, 'Ardis Jetix MTB 26″ ', 'Ardis Jetix MTB 26″- это великолепный горный велосипед, лучшее решение для активного отдыха в горной местности. Основа модели базируется на стальной раме, прочной и мощной. Амортизационная вилка превосходно справляется со своей задачей, полностью поглощает неровности дорожного полотна. Ardis Jetix MTB 26″ имеет большой выбор скоростных режимов, благодаря чему Вы можете настроить байк непосредственно под свои возможности.', '/img/3.jpg', 1),
(6, 'dertix', 1503942489, 'Titan Egoist 26″ 2017 ', 'Остановив свой выбор на таком взрослом горном велосипеде, как Titan Egoist 26″ 2017, Вы достаточно быстро сможете оценить все его достоинства. Titan Egoist 26″ 2017 имеет хорошо сбалансированную конструкцию с внешне привлекательным дизайном и отличными эксплуатационными характеристиками.', '/img/4.jpg', 2),
(7, 'Петрович', 1503949341, 'Mustang Upland 26″ ', 'Остановив свой выбор на таком взрослом горном велосипеде, как Titan Egoist 26″ 2017, Вы достаточно быстро сможете оценить все его достоинства. Titan Egoist 26″ 2017 имеет хорошо сбалансированную конструкцию с внешне привлекательным дизайном и отличными эксплуатационными характеристиками. ', '/img/3.jpg', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_id` (`entry_id`);

--
-- Индексы таблицы `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
