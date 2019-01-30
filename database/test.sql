-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2019 г., 01:06
-- Версия сервера: 5.5.53
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--


--
-- Структура таблицы `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `ssn` varchar(20) NOT NULL,
  `current_employee` tinyint(2) UNSIGNED DEFAULT '1',
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT '',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `name`, `birthdate`, `ssn`, `current_employee`, `email`, `phone`, `address`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 'Javid Karimov', '1990-01-11', '123456789', 1, 'k.cavidd@gmail.com', '994553606263', 'Baku, Azerbaijan', 'Javid', '2019-01-29 21:50:09', 'Elmar', '2019-01-30 20:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `employee_information`
--

DROP TABLE IF EXISTS `employee_information`;
CREATE TABLE `employee_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT '0',
  `language_id` bigint(20) UNSIGNED DEFAULT '1',
  `introduction` text,
  `experience` text,
  `education` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employee_information`
--

INSERT INTO `employee_information` (`id`, `employee_id`, `language_id`, `introduction`, `experience`, `education`) VALUES
(1, 1, 1, 'Introduction in English', 'Experience in English', 'Education in English'),
(2, 1, 2, 'Introduction in Spanish', 'Experience in Spanish', 'Education in Spanish'),
(3, 1, 3, 'Introduction in French', 'Experience in French', 'Education in French');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`) VALUES
(1, 'English', 'en'),
(2, 'Spanish', 'es'),
(3, 'French', 'fr');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `ssn_unique` (`ssn`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Индексы таблицы `employee_information`
--
ALTER TABLE `employee_information`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `employee_information_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_information_language_id_foreign` (`language_id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `employee_information`
--
ALTER TABLE `employee_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee_information`
--
ALTER TABLE `employee_information`
  ADD CONSTRAINT `employee_information_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_information_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
