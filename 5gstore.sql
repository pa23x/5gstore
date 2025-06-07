-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2025 at 02:25 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `5gstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`) VALUES
(7, ' iPhone 16 دو سیم‌ کارت CH ظرفیت 128 گیگابایت و رم 8 گیگابایت', 'باطری 100 درصد ( اکبند پلمپ )', 'images/1747749689_28343.webp', 60000000),
(8, 'هندزفری بلوتوث Goaltage مدل HP-06', 'اگر به دنبال یک هدست بلوتوثی خوب و باکیفیت ولی در عین حال با قیمت متوسط و مناسب می‌گردید، هدفون بلوتوثی Goaltage مدل HP06 یک گزینه خوب و کاربردی برای شماست.', 'images/1749192614_4630.webp', 2000000),
(9, 'ساعت هوشمند مدل H23 Ultra 2', 'ساعت هوشمند مدل H23 Ultra 2 یک پکیج جذاب از ساعت هوشمند ، چند بند مختلف و هندزفری بلوتوثی است .', 'images/1739998840_91616.webp', 6000000),
(10, 'لپ تاپ برند HP مدل ProBook 445 G7 ( استوک گرید A )', 'لپ تاپ HP ProBook 445 G7 یکی از محصولات جدید کمپانی اچ پی است که در سال 2023 به بازار عرضه شده است.', 'images/1748697653_3952.webp', 34000000),
(11, 'پاوربانک 100000 میلی آمپر 22.5 وات کانفلون مدل A45Q', 'شارژ شدن سریع پاوربانک با شدت جریان 20 آمپر به بالا', 'images/1745223484_82975.webp', 2000000),
(12, 'اسپیکر بلوتوث برند ZQS مدل 8210', 'یکی از مدرن‌ترین و با کیفیت‌ترین اسپیکرهای موجود در بازار', 'images/1716237263_38127.webp', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(7, 'shahrzad', 'shah1234', 'admin'),
(3, 'pariya', '1234', 'user'),
(6, 'pa87hm00', '90867', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
