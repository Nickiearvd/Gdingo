-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 12 nov 2017 kl 20:58
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
  `DrinkReceipt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Drinks`
--

INSERT INTO `Drinks` (`DrinkId`, `DrinkName`, `DrinkAuthor`, `DrinkPicture`, `DrinkReceipt`) VALUES
(1, 'Mojito', 'Nickie', 'mojitop.jpg', 'In a tall thin glass, crush some mint with a fork to coat the inside. Add 2 tsp sugar and 3 tbsp lemon juice and stir thoroughly. Top with ice. Add 1 1/2 oz rum and mix. Top off with *chilled* club soda (or seltzer). Add a lemon slice and the remaining mint, and serve. \r\nServe in \"Parfait Glass\"'),
(3, 'Adios Motherfucker', 'Julia', 'adiosMotherfucker.jpg', '\r\n\r\n- 1/2 oz vodka\r\n- 1/2 oz rum\r\n- 1/2 oz tequila\r\n- 1/2 oz gin\r\n- 1/2 oz blue curacao liqueur\r\n- 2 oz sweet and sour mix\r\n- 2 oz soda (7-up, sprite)\r\n\r\nPour all ingredients except the 7-Up into a chilled glass filled with ice cubes. Top with 7-Up and stir gently. \r\nServe in \"Highball Glass\". '),
(4, 'French Kiss', 'Julia', 'FrenchKissP.jpg', '- 1 oz vodka\r\n- 1 oz raspberry liqueur\r\n- 1/2 oz orange liqueur (cointreau, grand marnier...)\r\n- 1 oz whipping cream\r\n\r\nShake and strain into a champagne flute. Garnish with a speared cherry or raspberry, and serve. \r\nServe in \"Champagne Flute\"'),
(6, 'Woo Woo ', 'Julia', 'WooWooP.jpg', ' 1 1/2 oz peach schnapps\r\n- 1 1/2 oz vodka\r\n- 3 1/2 oz cranberry juice\r\n\r\n\r\nPour all ingredients into a highball glass over ice cubes, stir, and serve. \r\nServe in \"Highball Glass\" Garnish: No  '),
(7, 'Like Hand Grenade', 'Julia', 'LikeHandGrenadeP.jpg', '\r\n- 1 1/2 oz gin\r\n- 1 1/2 oz grain alcohol\r\n- 1 1/2 oz melon liqueur\r\n- 1 1/2 oz rum\r\n- 1 1/2 oz vodka\r\n\r\nStir ingredients together in a collins glass filled with ice cubes. Add water and sugar if desired, to taste, and serve. \r\nServe in \"Collins Glass\" Garnish: No  '),
(8, 'Party Mimosa', 'Julia', 'PartyMimosaP.jpg', '-1 (12 ounce) can apricot-mango nectar \r\n-1 (12 ounce) can pineapple juice 3/4 cup cold water \r\n-1 (6 ounce) can frozen orange juice concentrate, thawed and undiluted \r\n-1 (750 milliliter) bottle cold champagne\r\n\r\nStir together apricot nectar, pineapple juice, water, and orange juice concentrate in a large pitcher until combined. Pour in bottle of sparkling wine just before serving.'),
(9, 'Pina Colada', 'Julia', 'PinaColadaP.jpg', '-1/2 cup crushed ice \r\n-6 fluid ounces pineapple juice \r\n-2 fluid ounces rum \r\n-1 fluid ounce sweetened coconut cream \r\n-1 fluid ounce heavy cream \r\n-1 pineapple wedge\r\n\r\nIn a blender, combine ice, pineapple juice, rum, coconut cream and heavy cream. Blend until smooth. Pour into glass and garnish with pineapple wedge and cherry.'),
(10, 'Tequila Sunrise', 'Julia', 'TequilaSunriseP.jpg', '-1 1/2 cups ice \r\n-2 fluid ounces tequila \r\n-4 fluid ounces orange juice \r\n-1 cup ice \r\n-3/4 fluid ounce grenadine syrup\r\n\r\nFill a highball glass with 1 1/2 cups ice and set aside.\r\nCombine tequila and orange juice in a cocktail mixing glass. Add 1 cup ice, stir, and strain into the prepared highball glass. Slowly pour in grenadine and let settle.\r\nStir before drinking.'),
(11, 'Strawberry Sauza Rita', 'Julia', 'StrawberrySauzaRitaP.jpg', '-1 (12 ounce) can frozen limeade concentrate \r\n-12 ounces champagne \r\n-8 ounces Sauza® Blanco Tequila \r\n-4 ounces DeKuyper® Strawberry Liqueur -12 ounces water\r\n\r\nPour limeade into pitcher with ice. Fill limeade can with champagne and pour into pitcher. Then fill limeade can with 2/3 Sauza Blanco Tequila and 1/3 DeKuyper Strawberry and pour in. Lastly, add a can of water, stir and serve over ice. Makes 9 delicious drinks, perfect for any ladies night in.\r\nLooking for a lighter option? Swap soda water for the champagne and 2 cups of sliced strawberries for the Strawberry Liqueur.'),
(19, 'Sex Appeal', 'Julia', 'SexAppealP.jpg', '- 1/2 oz rum (white) - 1/2 oz coconut rum (malibu) - 1/2 oz melon liqueur - 1/2 oz peach schnapps - 1/2 oz blue curacao liqueur - fill with sweet and sour mix - 1 splash lemonade - 1 lemon Mix two rums, melon, peach and blue curacao in a mixing tin with the sour mix. Pour into a collins glass with ice and add a dash of lemonade. Garnish with lemon squeeze.'),
(20, 'Annas Drink', 'Julia', 'anna.jpg', 'Shake it up, top with passionfruit and fresh mint leaves.'),
(21, 'Julias Drink', 'Julia', 'JTP-WO-WM-Peach-Raspberrie-Spritzer-8847.jpg', 'Mix well and drink fast!'),
(22, 'Watermelon schnaps', 'Julia', 'vodka-watermelon-cooler-1.jpg', 'Mix in blender until smoooooth. '),
(23, 'Nicke Drink', 'Julia', 'mojitorp.jpg', 'Mix everything in to a big can, so that you don\\\'t have to mix any more drinks for the rest of the night! '),
(24, 'Peach Dream', 'Julia', 'pink-grapefruit-jars.jpg', 'Pour everything in to a shaker, shake and drink. Top with mint leaves and suger around the edge of the glass. '),
(25, 'Strawberry Cream', 'Julia', 'cheescake-smoothie.jpg', 'Blend in a mixer, serve cold with whipped cream and strawberries on top.'),
(26, 'Cranberry Happiness', 'Julia', 'sparkling-grapefruit-cocktails.jpg', 'Mix everything in a shaker and garnish with a lemon on top.'),
(27, 'Pomegranate bowl', 'Julia', 'Pomegranate-Ginger-Paloma-1.jpg', 'mix well and topp with pomegrenade and orange slices.');

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
(6, 22),
(6, 20),
(6, 1),
(7, 23),
(7, 5),
(7, 19),
(7, 1),
(7, 3),
(8, 29),
(8, 28),
(8, 27),
(8, 26),
(8, 25),
(9, 30),
(9, 15),
(9, 3),
(9, 25),
(9, 9),
(10, 2),
(10, 9),
(10, 32),
(10, 31),
(11, 2),
(11, 29),
(11, 27),
(11, 34),
(11, 33),
(19, 3),
(19, 18),
(19, 19),
(19, 20),
(19, 13),
(19, 14),
(19, 10),
(19, 21),
(20, 3),
(20, 134),
(20, 135),
(20, 31),
(20, 7),
(21, 4),
(21, 132),
(21, 9),
(21, 10),
(21, 21),
(22, 5),
(22, 9),
(22, 8),
(22, 19),
(22, 133),
(22, 7),
(23, 1),
(23, 10),
(23, 6),
(23, 132),
(24, 1),
(24, 20),
(24, 18),
(24, 8),
(24, 7),
(24, 12),
(24, 2),
(25, 9),
(25, 12),
(25, 15),
(25, 16),
(25, 18),
(25, 30),
(25, 133),
(26, 1),
(26, 21),
(26, 22),
(26, 14),
(26, 9),
(26, 10),
(27, 1),
(27, 136),
(27, 26),
(27, 31);

-- --------------------------------------------------------

--
-- Tabellstruktur `Favo`
--

CREATE TABLE `Favo` (
  `DrinkId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Favo`
--

INSERT INTO `Favo` (`DrinkId`, `username`) VALUES
(4, 'anna'),
(3, 'anna'),
(5, 'anna'),
(2, 'Nickie'),
(1, 'Nickie'),
(9, 'Nickie'),
(4, 'Nickie'),
(3, 'Nickie'),
(3, 'Julia'),
(4, 'Julia'),
(7, 'Julia'),
(1, 'Julia');

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
(10, 'Sprite'),
(11, 'Bacardi Carta Blanca'),
(12, 'Sugar'),
(13, 'Blue Curacao'),
(14, 'Sweet and sour mix'),
(15, 'Whipping cream'),
(16, 'Raspberry liqueur'),
(17, 'Orange liqueur'),
(18, 'Malibu'),
(19, 'Melon liqueur'),
(20, 'Peach schnapps'),
(21, 'Lemon'),
(22, 'Cranberry Juice'),
(23, 'Grain alcohol'),
(25, 'Pineapple juice'),
(26, 'Apricot-mango nectar'),
(27, 'Cold water'),
(28, 'Frozen orange juice '),
(29, 'Cold champagne'),
(30, 'Sweetened coconut cream'),
(31, 'Orange Juice'),
(32, 'Grenadine'),
(33, 'Strawberry Liqueur'),
(34, 'Frozen limeade concentrate'),
(35, 'Cola'),
(132, 'Raspberries'),
(133, 'Strawberries'),
(134, 'Passionfruit'),
(135, 'passionfruit juice'),
(136, 'Pomegranade');

-- --------------------------------------------------------

--
-- Tabellstruktur `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `resetToken` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `resetComplete` varchar(3) COLLATE utf8mb4_bin DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumpning av Data i tabell `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(1, 'anna', '$2y$10$RmPFNyg58PW6MLT.Byf3euOTSXmM32Zzr1DeS4.VpmUML9Eg5fJE.', 'darner.96@hotmail.com', '', NULL, 'No'),
(2, 'Nickie', '$2y$10$fmX0RUCHsIvYB.V5MOlzN.OEM9rdw0EfLmGlxZ/CmE2ykSJPTyi/e', 'arvidssonnickie@gmail.com', '', NULL, 'No'),
(3, 'Julia', '$2y$10$Yfk.nl.MN1Ry/XNXgUTUpu0g7MNJCpDO4/tXcND0ph1XBbiBYSFBy', 'julia.petersson@outlook.com', '', NULL, 'No');

-- --------------------------------------------------------

--
-- Tabellstruktur `Rating`
--

CREATE TABLE `Rating` (
  `RateId` int(11) NOT NULL,
  `DrinkId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Rating`
--

INSERT INTO `Rating` (`RateId`, `DrinkId`, `username`, `Rate`) VALUES
(1, 11, 'Nickie', 3),
(2, 3, 'Nickie', 4),
(3, 8, 'Nickie', 4),
(4, 4, 'anna', 4),
(5, 3, 'anna', 4),
(6, 1, 'Nickie', 5),
(7, 3, 'Julia', 2),
(8, 4, 'Julia', 4),
(9, 7, 'Julia', 3),
(10, 1, 'Julia', 2),
(11, 8, 'Julia', 3),
(12, 9, 'Julia', 2),
(13, 19, 'Julia', 5),
(14, 11, 'Julia', 3),
(15, 10, 'Julia', 3),
(16, 6, 'Julia', 3),
(17, 20, 'Julia', 2),
(18, 21, 'Julia', 5),
(19, 22, 'Julia', 4),
(20, 23, 'Julia', 3),
(21, 24, 'Julia', 3),
(22, 25, 'Julia', 4),
(23, 26, 'Julia', 2),
(24, 27, 'Julia', 5);

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
-- Index för tabell `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Index för tabell `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`RateId`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Drinks`
--
ALTER TABLE `Drinks`
  MODIFY `DrinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT för tabell `Ingredients`
--
ALTER TABLE `Ingredients`
  MODIFY `IngId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT för tabell `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `Rating`
--
ALTER TABLE `Rating`
  MODIFY `RateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `DrinksIng`
--
ALTER TABLE `DrinksIng`
  ADD CONSTRAINT `DrinkId` FOREIGN KEY (`DrinkId`) REFERENCES `Drinks` (`DrinkId`),
  ADD CONSTRAINT `IngId` FOREIGN KEY (`IngId`) REFERENCES `Ingredients` (`IngId`);
