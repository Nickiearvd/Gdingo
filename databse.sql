-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 08 nov 2017 kl 21:41
-- Serverversion: 5.6.35
-- PHP-version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `Gd`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Drinks`
--

CREATE TABLE `Drinks` (
  `DrinkId` int(11) NOT NULL,
  `DrinkName` varchar(255) NOT NULL,
  `DrinkAuthor` varchar(255) NOT NULL,
  `DrinkPicture` varchar(255) NOT NULL,
  `DrinkReceipt` text NOT NULL,
  `DrinkSaved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Drinks`
--

INSERT INTO `Drinks` (`DrinkId`, `DrinkName`, `DrinkAuthor`, `DrinkPicture`, `DrinkReceipt`, `DrinkSaved`) VALUES
(1, 'Mojito', 'Nickie', 'mojitop.jpg', 'In a tall thin glass, crush some mint with a fork to coat the inside. Add 2 tsp sugar and 3 tbsp lemon juice and stir thoroughly. Top with ice. Add 1 1/2 oz rum and mix. Top off with *chilled* club soda (or seltzer). Add a lemon slice and the remaining mint, and serve. \r\nServe in \"Parfait Glass\"', 1),
(2, 'Nickiedrink', 'Nickie', 'mojitorp.jpg', '', 0),
(3, 'Adios Motherfucker', 'Julia Petersson', 'adiosMotherfucker.jpg', '\r\n\r\n- 1/2 oz vodka\r\n- 1/2 oz rum\r\n- 1/2 oz tequila\r\n- 1/2 oz gin\r\n- 1/2 oz blue curacao liqueur\r\n- 2 oz sweet and sour mix\r\n- 2 oz soda (7-up, sprite)\r\n\r\nPour all ingredients except the 7-Up into a chilled glass filled with ice cubes. Top with 7-Up and stir gently. \r\nServe in \"Highball Glass\". ', 1),
(4, 'French Kiss', 'Julia Petersson', 'FrenchKissP.jpg', '- 1 oz vodka\r\n- 1 oz raspberry liqueur\r\n- 1/2 oz orange liqueur (cointreau, grand marnier...)\r\n- 1 oz whipping cream\r\n\r\nShake and strain into a champagne flute. Garnish with a speared cherry or raspberry, and serve. \r\nServe in \"Champagne Flute\"', 1),
(5, 'Sex Appeal', 'Julia Petersson', 'SexAppealP.jpg', '- 1/2 oz rum (white)\r\n- 1/2 oz coconut rum (malibu)\r\n- 1/2 oz melon liqueur\r\n- 1/2 oz peach schnapps\r\n- 1/2 oz blue curacao liqueur\r\n- fill with sweet and sour mix\r\n- 1 splash lemonade\r\n- 1 lemon\r\n\r\nMix two rums, melon, peach and blue curacao in a mixing tin with the sour mix. Pour into a collins glass with ice and add a dash of lemonade. Garnish with lemon squeeze. ', 1),
(6, 'Woo Woo ', 'Julia Petersson', 'WooWooP.jpg', ' 1 1/2 oz peach schnapps\r\n- 1 1/2 oz vodka\r\n- 3 1/2 oz cranberry juice\r\n\r\n\r\nPour all ingredients into a highball glass over ice cubes, stir, and serve. \r\nServe in \"Highball Glass\" Garnish: No  ', 0),
(7, 'Like Hand Grenade', 'Julia Petersson', 'LikeHandGrenadeP.jpg', '\r\n- 1 1/2 oz gin\r\n- 1 1/2 oz grain alcohol\r\n- 1 1/2 oz melon liqueur\r\n- 1 1/2 oz rum\r\n- 1 1/2 oz vodka\r\n\r\nStir ingredients together in a collins glass filled with ice cubes. Add water and sugar if desired, to taste, and serve. \r\nServe in \"Collins Glass\" Garnish: No  ', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `DrinksIng`
--

CREATE TABLE `DrinksIng` (
  `DrinkId` int(11) NOT NULL,
  `IngId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `DrinksIng`
--

INSERT INTO `DrinksIng` (`DrinkId`, `IngId`) VALUES
(1, 3),
(1, 6),
(1, 7),
(2, 1),
(2, 6),
(2, 10),
(3, 1),
(3, 3),
(3, 2),
(3, 5),
(3, 10),
(3, 13),
(3, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 1),
(5, 21),
(5, 10),
(5, 13),
(5, 18),
(5, 3),
(5, 19),
(5, 20),
(5, 19),
(5, 14),
(5, 21),
(6, 22),
(6, 20),
(6, 1),
(7, 23),
(7, 5),
(7, 19),
(7, 1),
(7, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `Ingredients`
--

CREATE TABLE `Ingredients` (
  `IngId` int(11) NOT NULL,
  `NameIng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Ingredients`
--

INSERT INTO `Ingredients` (`IngId`, `NameIng`) VALUES
(1, 'Vodka'),
(2, 'Tequila'),
(3, 'Rum'),
(4, 'Bacardi razz'),
(5, 'Gin'),
(6, 'Lime'),
(7, 'Mint leaves'),
(8, 'Soda water'),
(9, 'Crushed ice'),
(10, 'sprite'),
(11, 'Bacardi Carta Blanca'),
(12, 'Sugar'),
(13, 'Blue Curacao'),
(14, 'sweet and sour mix'),
(15, 'Whipping cream'),
(16, 'Raspberry liqueur'),
(17, 'Orange liqueur'),
(18, 'Malibu'),
(19, 'Melon liqueur'),
(20, 'Peach schnapps'),
(21, 'Lemon'),
(22, 'Cranberry Juice'),
(23, 'Grain alcohol'),
(24, 'yes');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `rate`, `user_id`) VALUES
(1, 3, '837ec5754f503cfaaee0929fd48974e7');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Drinks`
--
ALTER TABLE `Drinks`
  ADD PRIMARY KEY (`DrinkId`);

--
-- Index för tabell `DrinksIng`
--
ALTER TABLE `DrinksIng`
  ADD KEY `IngId` (`IngId`),
  ADD KEY `DrinkId` (`DrinkId`);

--
-- Index för tabell `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`IngId`);

--
-- Index för tabell `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Drinks`
--
ALTER TABLE `Drinks`
  MODIFY `DrinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT för tabell `Ingredients`
--
ALTER TABLE `Ingredients`
  MODIFY `IngId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT för tabell `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `DrinksIng`
--
ALTER TABLE `DrinksIng`
  ADD CONSTRAINT `DrinkId` FOREIGN KEY (`DrinkId`) REFERENCES `Drinks` (`DrinkId`),
  ADD CONSTRAINT `IngId` FOREIGN KEY (`IngId`) REFERENCES `Ingredients` (`IngId`);
