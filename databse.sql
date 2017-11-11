-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2017 at 07:11 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Gd`
--

-- --------------------------------------------------------

--
-- Table structure for table `Drinks`
--

CREATE TABLE `Drinks` (
  `DrinkId` int(11) NOT NULL,
  `DrinkName` varchar(255) NOT NULL,
  `DrinkAuthor` varchar(255) NOT NULL,
  `DrinkPicture` varchar(255) NOT NULL,
  `DrinkReceipt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Drinks`
--

INSERT INTO `Drinks` (`DrinkId`, `DrinkName`, `DrinkAuthor`, `DrinkPicture`, `DrinkReceipt`) VALUES
(1, 'Mojito', 'Nickie', 'mojitop.jpg', 'In a tall thin glass, crush some mint with a fork to coat the inside. Add 2 tsp sugar and 3 tbsp lemon juice and stir thoroughly. Top with ice. Add 1 1/2 oz rum and mix. Top off with *chilled* club soda (or seltzer). Add a lemon slice and the remaining mint, and serve. \r\nServe in \"Parfait Glass\"'),
(2, 'Nickiedrink', 'Nickie', 'mojitorp.jpg', ''),
(3, 'Adios Motherfucker', 'Julia', 'adiosMotherfucker.jpg', '\r\n\r\n- 1/2 oz vodka\r\n- 1/2 oz rum\r\n- 1/2 oz tequila\r\n- 1/2 oz gin\r\n- 1/2 oz blue curacao liqueur\r\n- 2 oz sweet and sour mix\r\n- 2 oz soda (7-up, sprite)\r\n\r\nPour all ingredients except the 7-Up into a chilled glass filled with ice cubes. Top with 7-Up and stir gently. \r\nServe in \"Highball Glass\". '),
(4, 'French Kiss', 'Julia', 'FrenchKissP.jpg', '- 1 oz vodka\r\n- 1 oz raspberry liqueur\r\n- 1/2 oz orange liqueur (cointreau, grand marnier...)\r\n- 1 oz whipping cream\r\n\r\nShake and strain into a champagne flute. Garnish with a speared cherry or raspberry, and serve. \r\nServe in \"Champagne Flute\"'),
(5, 'Sex Appeal', 'Julia', 'SexAppealP.jpg', '- 1/2 oz rum (white)\r\n- 1/2 oz coconut rum (malibu)\r\n- 1/2 oz melon liqueur\r\n- 1/2 oz peach schnapps\r\n- 1/2 oz blue curacao liqueur\r\n- fill with sweet and sour mix\r\n- 1 splash lemonade\r\n- 1 lemon\r\n\r\nMix two rums, melon, peach and blue curacao in a mixing tin with the sour mix. Pour into a collins glass with ice and add a dash of lemonade. Garnish with lemon squeeze. '),
(6, 'Woo Woo ', 'Julia', 'WooWooP.jpg', ' 1 1/2 oz peach schnapps\r\n- 1 1/2 oz vodka\r\n- 3 1/2 oz cranberry juice\r\n\r\n\r\nPour all ingredients into a highball glass over ice cubes, stir, and serve. \r\nServe in \"Highball Glass\" Garnish: No  '),
(7, 'Like Hand Grenade', 'Julia', 'LikeHandGrenadeP.jpg', '\r\n- 1 1/2 oz gin\r\n- 1 1/2 oz grain alcohol\r\n- 1 1/2 oz melon liqueur\r\n- 1 1/2 oz rum\r\n- 1 1/2 oz vodka\r\n\r\nStir ingredients together in a collins glass filled with ice cubes. Add water and sugar if desired, to taste, and serve. \r\nServe in \"Collins Glass\" Garnish: No  '),
(8, 'Party Mimosa', 'Julia', 'PartyMimosaP.jpg', '-1 (12 ounce) can apricot-mango nectar \r\n-1 (12 ounce) can pineapple juice 3/4 cup cold water \r\n-1 (6 ounce) can frozen orange juice concentrate, thawed and undiluted \r\n-1 (750 milliliter) bottle cold champagne\r\n\r\nStir together apricot nectar, pineapple juice, water, and orange juice concentrate in a large pitcher until combined. Pour in bottle of sparkling wine just before serving.'),
(9, 'Pina Colada', 'Julia', 'PinaColadaP.jpg', '-1/2 cup crushed ice \r\n-6 fluid ounces pineapple juice \r\n-2 fluid ounces rum \r\n-1 fluid ounce sweetened coconut cream \r\n-1 fluid ounce heavy cream \r\n-1 pineapple wedge\r\n\r\nIn a blender, combine ice, pineapple juice, rum, coconut cream and heavy cream. Blend until smooth. Pour into glass and garnish with pineapple wedge and cherry.'),
(10, 'Tequila Sunrise', 'Julia', 'TequilaSunriseP.jpg', '-1 1/2 cups ice \r\n-2 fluid ounces tequila \r\n-4 fluid ounces orange juice \r\n-1 cup ice \r\n-3/4 fluid ounce grenadine syrup\r\n\r\nFill a highball glass with 1 1/2 cups ice and set aside.\r\nCombine tequila and orange juice in a cocktail mixing glass. Add 1 cup ice, stir, and strain into the prepared highball glass. Slowly pour in grenadine and let settle.\r\nStir before drinking.'),
(11, 'Strawberry Sauza Rita', 'Julia', 'StrawberrySauzaRitaP.jpg', '-1 (12 ounce) can frozen limeade concentrate \r\n-12 ounces champagne \r\n-8 ounces Sauza® Blanco Tequila \r\n-4 ounces DeKuyper® Strawberry Liqueur -12 ounces water\r\n\r\nPour limeade into pitcher with ice. Fill limeade can with champagne and pour into pitcher. Then fill limeade can with 2/3 Sauza Blanco Tequila and 1/3 DeKuyper Strawberry and pour in. Lastly, add a can of water, stir and serve over ice. Makes 9 delicious drinks, perfect for any ladies night in.\r\nLooking for a lighter option? Swap soda water for the champagne and 2 cups of sliced strawberries for the Strawberry Liqueur.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Drinks`
--
ALTER TABLE `Drinks`
  ADD PRIMARY KEY (`DrinkId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Drinks`
--
ALTER TABLE `Drinks`
  MODIFY `DrinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;