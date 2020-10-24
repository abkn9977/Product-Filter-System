-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 08:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `seller` varchar(50) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `title`, `price`, `color`, `brand`, `image`, `seller`, `stock`, `category`) VALUES
(1, 'maxi dress', 1319, 'red', 'athena', 'ethnic1.webp', 'big bazar', 'in stock', 'women'),
(2, 'rayon printed culottes', 450, 'blue', 'mufti', 'ethnic2.jpg', 'city style', 'in stock', 'women'),
(3, 'sleeveless top', 550, 'blue', 'mufti', 'ethnic3.webp', 'big bazar', 'in stock', 'women'),
(4, 'print top', 625, 'yellow', 'mufti', 'ethnic4.webp', 'v2 mall', 'in stock', 'women'),
(5, 'washed mid-rise jeans', 650, 'blue', 'levi\'s', 'jeans1.jpg', 'city style', 'in stock', 'kid'),
(6, 'fit wrangler jeans', 1250, 'gray', 'wrangler', 'jeans2.webp', 'bazar kolkata', 'in stock', 'women'),
(7, 'women jeans', 980, 'light blue', 'lee', 'jeans3.jpg', 'big bazar', 'in stock', 'women'),
(8, 'full fit jeans', 750, 'gray', 'monte carlo', 'jeans4.webp', 'city style', 'in stock', 'women'),
(9, 'new released jeans', 640, 'blue', 'mufti', 'jeans5.jpg', 'city style', 'out stock', 'women'),
(10, 'full body jeans', 1230, 'light blue', 'lee', 'jeans6.jpg', 'v2 mall', 'in stock', 'women'),
(11, 'full fit jeans', 899, 'gray', 'wrangler', 'jeans7.webp', 'bazar kolkata', 'in stock', 'women'),
(12, 'slim jeans', 789, 'dark gray', 'mufti', 'jeans8.jpg', 'city style', 'in stock', 'men'),
(13, 'light color jeans', 99, 'light blue', 'levi\'s', 'jeans10.jpg', 'big bazar', 'in stock', 'men'),
(14, 'stylish black jeans', 1199, 'black', 'lee', 'jeans11.jpg', 'big bazar', 'in stock', 'men'),
(15, 'light weight jeasn', 989, 'light blue', 'monte carlo', 'jeans12.jpg', 'bazar kolkata', 'in stock', 'men'),
(16, 'stylish black jeans', 1199, 'black', 'lee', 'jeans13.jpg', 'v2 mall', 'in stock', 'men'),
(17, 'night wear men', 450, 'black', 'mufti', 'night1.jpg', 'big bazar', 'in stock', 'men'),
(18, 'night wear women', 399, 'pink', 'mufti', 'night2.jpg', 'm2 mall', 'in stock', 'women'),
(19, 'night wear women', 299, 'black', 'mufti', 'night3.jpg', 'm2 mall', 'in stock', 'women'),
(20, 'men blue shirt', 1299, 'blue', 'lee', 'shirt1.jpg', 'm2 mall', 'in stock', 'men'),
(21, 'men full sleeve shirt', 1099, 'white', 'levi\'s', 'shirt2.jpg', 'city style', 'in stock', 'men'),
(22, 'check shirt', 655, 'maroon', 'mufti', 'shirt3.webp', 'v2 mall', 'in stock', 'men'),
(23, 'simple white shirt', 1499, 'white', 'levi\'s', 'shirt6.jpg', 'bazar kolkata', 'in stock', 'men'),
(24, 'full set for kid', 599, 'blue', 'mufti', 'tshirt1.jpg', 'm2 mall', 'in stock', 'kid'),
(25, 'stylish tshirt', 655, 'gray', 'wrangler', 'tshirt2.jpg', 'bazar kolkata', 'in stock', 'men'),
(26, 'stylish tshirt', 799, 'black', 'wrangler', 'tshirt3.jpg', 'bazar kolkata', 'out stock', 'men'),
(27, 'check red tshirt', 599, 'red', 'mufti', 'tshirt4.jpg', 'city style', 'in stock', 'men');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `pid`, `size`) VALUES
(1, 1, 'M'),
(2, 1, 'M'),
(3, 1, 'L'),
(4, 2, 'XL'),
(5, 2, 'XL'),
(6, 2, 'L'),
(7, 3, 'M'),
(8, 3, 'M'),
(9, 3, 'S'),
(10, 4, 'XL'),
(11, 4, 'XL'),
(12, 4, 'M'),
(13, 5, 'M'),
(14, 5, 'M'),
(15, 5, 'M'),
(16, 6, 'L'),
(17, 6, 'XL'),
(18, 6, 'L'),
(19, 7, 'S'),
(20, 7, 'S'),
(21, 7, 'L'),
(22, 8, 'XL'),
(23, 8, 'XL'),
(24, 8, 'L'),
(25, 9, 'S'),
(26, 9, 'L'),
(27, 9, 'M'),
(28, 10, 'XL'),
(29, 10, 'XL'),
(30, 10, 'M'),
(31, 11, 'M'),
(32, 11, 'M'),
(33, 11, 'M'),
(34, 12, 'M'),
(35, 12, 'L'),
(36, 12, 'XL'),
(37, 13, 'M'),
(38, 13, 'M'),
(39, 13, 'M'),
(40, 14, 'M'),
(41, 14, 'XL'),
(42, 14, 'XL'),
(43, 15, 'XL'),
(44, 15, 'M'),
(45, 15, 'XL'),
(46, 16, 'M'),
(47, 16, 'L'),
(48, 16, 'S'),
(49, 17, 'S'),
(50, 17, 'XL'),
(51, 17, 'XL'),
(52, 18, 'XL'),
(53, 18, 'XL'),
(54, 18, 'S'),
(55, 19, 'M'),
(56, 19, 'S'),
(57, 19, 'L'),
(58, 20, 'S'),
(59, 20, 'XL'),
(60, 20, 'XL'),
(61, 21, 'M'),
(62, 21, 'L'),
(63, 21, 'XL'),
(64, 22, 'M'),
(65, 22, 'M'),
(66, 22, 'XL'),
(67, 23, 'XL'),
(68, 23, 'M'),
(69, 23, 'L'),
(70, 24, 'S'),
(71, 24, 'L'),
(72, 24, 'M'),
(73, 25, 'S'),
(74, 25, 'XL'),
(75, 25, 'M'),
(76, 26, 'S'),
(77, 26, 'XL'),
(78, 26, 'L'),
(79, 27, 'L'),
(80, 27, 'L'),
(81, 27, 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
