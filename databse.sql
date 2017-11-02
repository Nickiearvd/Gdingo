-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2017 at 06:31 PM
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
  `DrinkReceipt` text NOT NULL,
  `DrinkSaved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Drinks`
--

INSERT INTO `Drinks` (`DrinkId`, `DrinkName`, `DrinkAuthor`, `DrinkPicture`, `DrinkReceipt`, `DrinkSaved`) VALUES
(1, 'Mojito', 'Nickie', 'mojitop.jpg', 'In a tall thin glass, crush some mint with a fork to coat the inside. Add 2 tsp sugar and 3 tbsp lemon juice and stir thoroughly. Top with ice. Add 1 1/2 oz rum and mix. Top off with *chilled* club soda (or seltzer). Add a lemon slice and the remaining mint, and serve. \r\nServe in \"Parfait Glass\"', 1),
(2, 'Nickiedrink', 'Nickie', 'mojitorp.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `DrinksIng`
--

CREATE TABLE `DrinksIng` (
  `DrinkId` int(11) NOT NULL,
  `IngId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DrinksIng`
--

INSERT INTO `DrinksIng` (`DrinkId`, `IngId`) VALUES
(1, 3),
(1, 6),
(1, 7),
(2, 1),
(2, 6),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Ingredients`
--

CREATE TABLE `Ingredients` (
  `IngId` int(11) NOT NULL,
  `NameIng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ingredients`
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
(12, 'Sugar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Drinks`
--
ALTER TABLE `Drinks`
  ADD PRIMARY KEY (`DrinkId`);

--
-- Indexes for table `DrinksIng`
--
ALTER TABLE `DrinksIng`
  ADD KEY `IngId` (`IngId`),
  ADD KEY `DrinkId` (`DrinkId`);

--
-- Indexes for table `Ingredients`
--
ALTER TABLE `Ingredients`
  ADD PRIMARY KEY (`IngId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Drinks`
--
ALTER TABLE `Drinks`
  MODIFY `DrinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Ingredients`
--
ALTER TABLE `Ingredients`
  MODIFY `IngId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `DrinksIng`
--
ALTER TABLE `DrinksIng`
  ADD CONSTRAINT `DrinkId` FOREIGN KEY (`DrinkId`) REFERENCES `Drinks` (`DrinkId`),
  ADD CONSTRAINT `IngId` FOREIGN KEY (`IngId`) REFERENCES `Ingredients` (`IngId`);