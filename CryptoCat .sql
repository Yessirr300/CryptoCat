-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 25 2023 г., 16:07
-- Версия сервера: 10.3.36-MariaDB
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CryptoCat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `Img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `Img`, `Title`, `Text`) VALUES
(25, '/img/image5.png', 'How to Build the Infrastructure of Web3 With Decentralized Data and Services', 'In December 2021, CoinDesk Indices launched its Digital Asset Classification Standard (DACS) to set the standard for defining the industries of digital assets. Every one of the top 500 digital assets by market capitalization is assigned to an industry, defined by DACS'),
(26, '/img/image4.png', 'Bitcoin NFTs — How the Ordinals Protocol Works', 'The Bitcoin Ordinals protocol has been surging, with inscriptions reaching over fourteen million at the time of writing. Read on to find out how this new protocol is making it possible to mint non-fungible tokens (NFTs) directly onto the Bitcoin blockchain.\r\n'),
(27, '/img/image6.png', 'How AI Data Sets Work – And How Artists Can Use It', 'For creatives, tackling machine learning requires an understanding of how to best feed it data and refine its algorithm to complement one’s artistic endeavors.');

-- --------------------------------------------------------

--
-- Структура таблицы `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coins`
--

INSERT INTO `coins` (`id`, `img`, `title`) VALUES
(3, '/img/ZJZZK5B2ZNF25LYQHMUTBTOMLU.png', 'Ethereum'),
(5, '/img/tether.png', 'Tether');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `Img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `Img`, `Title`, `Text`, `Date`) VALUES
(2, '/img/image.png', 'What Is ActivityPub? Understanding the Social-Media Protocol Meta’s Threads Plans to Use', 'The new Twitter-like social media service from Mark Zuckerberg’s Meta, Threads, was released in July 2023 and quickly racked up tens of millions of downloads. ', '2023-07-07'),
(3, '/img/image1.png', 'Paradigm Counsel Accuses SEC of Overreach in Crypto Market Regulation', 'Crypto investment firm Paradigm has submitted an amicus brief in the ongoing US SEC vs crypto exchange Bittrex case. ', '2023-07-21'),
(4, '/img/image2.png', 'Bitcoin Price Prediction as US Core Inflation Data is Released – Time to Buy?', 'The price of Bitcoin is steady at around $30,600, reflecting a nearly 0.50% increase on Wednesday.The consumer price index saw a 0.2% rise in June. ', '2023-07-21'),
(5, '/img/image3.png', 'AI Coins Pump as Elon Musk Launches ChatGPT Competitor – Where Next for RNDR and AGIX?', 'Musk’s official re-entry into the AI race brings fresh attention to the fast-evolving technological sector, thus bringing fresh attention ', '2023-07-21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
