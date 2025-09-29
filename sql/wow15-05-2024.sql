-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 15 2024 г., 17:21
-- Версия сервера: 10.4.26-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `claim_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negative` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'Друид'),
(2, 'Охотник'),
(3, 'Маг'),
(4, 'Паладин'),
(5, 'Жрец'),
(6, 'Разбойник'),
(7, 'Шаман'),
(8, 'Чернокнижник'),
(9, 'Воин');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dungeon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_level` tinyint(1) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dungeon_list`
--

CREATE TABLE `dungeon_list` (
  `id` int(11) NOT NULL,
  `dungeon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dungeon_list`
--

INSERT INTO `dungeon_list` (`id`, `dungeon_name`, `d_type`) VALUES
(1, 'Бастионы Адского Пламени', 0),
(2, 'Кузня Крови', 0),
(12, 'Узилище', 0),
(13, 'Нижетопь', 0),
(14, 'Гробницы маны', 0),
(15, 'Аукенайские гробницы', 0),
(16, 'Старые предгорья Хилсбрада', 0),
(17, 'Сетеккские залы', 0),
(18, 'Механар', 0),
(19, 'Черные топи', 0),
(20, 'Аркатрац', 0),
(21, 'Терраса Магистров', 0),
(22, 'Паровое подземелье', 0),
(23, 'Ботаника', 0),
(24, 'Разрушенные залы', 0),
(25, 'Темный лабиринт', 0),
(26, 'Каражан', 1),
(27, 'Логово Груула', 1),
(28, 'Логово Магтеридона', 1),
(29, 'Змеиное святилище', 1),
(30, 'Крепость Бурь', 1),
(31, 'Вершина Хиджала', 1),
(32, 'Черный храм', 1),
(33, 'Зул\'Аман', 1),
(34, 'Плато Солнечного Колодца', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `text_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `positive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `text_note`, `role`, `positive`) VALUES
(1, 'плохо ориентируется в данже', 0, 0),
(2, 'хорошо ориентируется в данже', 0, 1),
(3, 'дает нужную инфу в чате', 0, 1),
(4, 'неуместные сообщения в чате', 0, 0),
(5, 'высокая выживаемость', 1, 1),
(6, 'низкая выживаемость', 1, 0),
(7, 'держит агро', 1, 1),
(8, 'агро не держится', 1, 0),
(9, 'хорошо хилит', 2, 1),
(10, 'плохо хилит', 2, 0),
(11, 'высокий урон', 3, 1),
(12, 'низкий урон', 3, 0),
(13, 'Ничего не запомнилось/ничего выдающегося', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `player_card`
--

CREATE TABLE `player_card` (
  `id` int(11) NOT NULL,
  `tier_score` double NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fraction` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `player_card`
--

INSERT INTO `player_card` (`id`, `tier_score`, `nickname`, `role`, `class`, `race`, `fraction`) VALUES
(1, 3.87, 'Shkalnik', 'Танк', 'Воин', 'Человек', 0),
(2, 4.1, 'Lipetsk', 'Хил', 'Жрец', 'Человек', 0),
(3, 2.65, 'Bazhen', 'ДД', 'Чернокнижник', 'Человек', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `praise`
--

CREATE TABLE `praise` (
  `id` int(11) NOT NULL,
  `praise_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `race`
--

CREATE TABLE `race` (
  `id` int(11) NOT NULL,
  `race_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fraction` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `race`
--

INSERT INTO `race` (`id`, `race_name`, `fraction`) VALUES
(1, 'Человек', 0),
(2, 'Дворф', 0),
(3, 'Гном', 0),
(4, 'Ночной эльф', 0),
(5, 'Дреней', 0),
(6, 'Орк', 1),
(7, 'Тролль', 1),
(8, 'Таурен', 1),
(9, 'Нежить', 1),
(10, 'Эльф крови', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Танк'),
(2, 'Хил'),
(3, 'ДД');

-- --------------------------------------------------------

--
-- Структура таблицы `tier`
--

CREATE TABLE `tier` (
  `id` int(11) NOT NULL,
  `tier_name` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` double NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tier`
--

INSERT INTO `tier` (`id`, `tier_name`, `score`, `points`) VALUES
(1, 'S', 4.51, 5),
(2, 'A', 3.51, 4),
(3, 'B', 2.51, 3),
(4, 'C', 1.51, 2),
(5, 'D', 0.51, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dungeon_list`
--
ALTER TABLE `dungeon_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `player_card`
--
ALTER TABLE `player_card`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `praise`
--
ALTER TABLE `praise`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tier`
--
ALTER TABLE `tier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `dungeon_list`
--
ALTER TABLE `dungeon_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `player_card`
--
ALTER TABLE `player_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `praise`
--
ALTER TABLE `praise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `race`
--
ALTER TABLE `race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tier`
--
ALTER TABLE `tier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
