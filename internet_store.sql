-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 08 2018 г., 15:34
-- Версия сервера: 5.7.22-0ubuntu0.16.04.1
-- Версия PHP: 7.0.30-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `internet_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(3, 'AUDI'),
(1, 'BMW'),
(6, 'NISSAN'),
(7, 'TOYOTA');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `categories_id` int(20) DEFAULT NULL,
  `price` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `url`, `image`, `categories_id`, `price`) VALUES
(242, 'Руль', ' Руль на какую то модель BMW', 'rul', '/uploads/1530963576.jpg', 1, 200),
(243, 'Двигатель', 'Мотор в сборе для автомобиля BMW', 'dvigatel', '/uploads/1530961348.jpg', 1, 5000),
(244, 'КПП', 'Коробка переключения передач для автомобиля BMW', 'kpp', '/uploads/1530961386.jpg', 1, 2000),
(245, 'Зеркало заднего вида', ' Зеркало правое подходит для каких то там моделей.', 'zerkalo-zadnego-vida-', '/uploads/1530964350.jpg', 1, 200),
(246, 'Шильд', ' Значек на капот автомобиля', 'shildik', '/uploads/1530964713.jpg', 1, 20),
(251, 'Сцепление', 'Корзина и диск', 'sceplenie', '/uploads/1531050951.JPG', 3, 150),
(252, 'Стойка стабилизатора', 'Усиленная стойка стабилизатора', 'stoyka-stabilizatora', '/uploads/1531051010.jpg', 3, 20),
(253, 'Поддон картера', 'Поддон картера на какую то модель.', 'poddon-kartera', '/uploads/1531051071.jpeg', 3, 190),
(254, 'Поршень', 'поршень ремонтного размера', 'porshen', '/uploads/1531051171.jpeg', 3, 50),
(255, 'Крыло', 'Переднее левое некрашенное', 'krylo', '/uploads/1531051361.jpg', 6, 120),
(256, 'Фара', 'Передняя правая', 'phara', '/uploads/1531051404.jpeg', 6, 215),
(257, 'Салон автомобиля', 'Комплект сидений', 'salon-avtomobilya', '/uploads/1531051435.jpeg', 6, 500),
(258, 'Бампер', 'передний бампер на Toyota Land Cruiser Prado', 'bamper', '/uploads/1531051635.jpg', 7, 300),
(259, 'Диск', 'Диск с резиной на 16', 'disk', '/uploads/1531051675.jpeg', 7, 140),
(260, 'Руль мультимедийный', 'Без подушки безопасности, с доп. клавишами', 'rul-multimediynyy', '/uploads/1531051793.jpeg', 7, 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `login`, `email`, `password`, `role`) VALUES
(1, 'Дмитрий', 'Миколенко', 'admin', 'Dimidi07@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(77, 'Иван', 'Иванов', 'Ivan', 'Ivan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `title_2` (`title`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
