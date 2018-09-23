-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2018 at 06:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web204_quangnvph05487`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `url`) VALUES
(1, 'Totoro', 'public/assets/images/totoro.gif', NULL),
(2, 'Minion', 'public/assets/images/minion.jpg', NULL),
(3, 'Kumamon', 'public/assets/images/kumamon.jpg', NULL),
(4, 'Pusheen', 'public/assets/images/pusheen.jpg', NULL),
(5, 'Rilakkuma', 'public/assets/images/rilakkuma.jpg', NULL),
(6, 'Stitch', 'public/assets/images/stitch.jpg', NULL),
(7, 'Faceless', 'public/assets/images/faceless.jpg', NULL),
(8, 'Doraemon', 'public/assets/images/doraemon.jpg', NULL),
(9, 'Shin', 'public/assets/images/shin.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`) VALUES
(1, 'Danh mục 1', 'Là danh mục 1 thôi mà :\"> '),
(2, 'Danh mục 2', 'Là danh mục 2 thôi mà :\"> '),
(3, 'Danh mục 3', 'Là danh mục 3 thôi mà :\"> '),
(4, 'Danh mục 4', 'Là danh mục 4 thôi mà :\"> '),
(5, 'Danh mục 5', 'Là danh mục 5 thôi mà :\"> ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `content`, `product_id`) VALUES
(15, 'asd', 'asd', 7),
(16, 'quangvhk123@gmail.com', 'd', 7),
(17, 'aliwirgloxina@gmail.com', 'ddddd', 7),
(18, 'sdasd', 'asd', 7),
(19, 'asd', 'asd', 7),
(20, 'quangvhk123@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus dolore molestiae atque saepe cumque voluptatem a quo mollitia eos inventore illum fugit, minus, odio, ipsum reiciendis id numquam vel voluptates? Dolore laborum, ut quidem delectus ipsa inventore provident, asperiores facere adipisci ipsum ab voluptatum obcaecati cum aut voluptas repellat vitae!', 3),
(21, 'quangvhk123@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `detail` text,
  `list_price` int(11) DEFAULT '0',
  `sell_price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `product_name`, `detail`, `list_price`, `sell_price`, `image`, `status`, `views`) VALUES
(1, 1, 'Sản phẩm 1', 'Sản phẩm 1 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 122),
(2, 3, 'Sản phẩm 2', 'Sản phẩm 2 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 144),
(3, 1, 'Sản phẩm 3', 'Sản phẩm 3 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 166),
(4, 1, 'Sản phẩm 4', 'Sản phẩm 4 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 165),
(5, 4, 'Sản phẩm 5', 'Sản phẩm 1 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 175),
(6, 4, 'Sản phẩm 6', 'Sản phẩm 2 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 178),
(7, 1, 'Sản phẩm 7', 'Sản phẩm 3 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 112),
(8, 1, 'Sản phẩm 8', 'Sản phẩm 4 nè', 120000, 110000, 'public/assets/images/dog.jpg', 1, 109);

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` text,
  `url` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `image`, `desc`, `url`, `status`, `order_number`) VALUES
(1, 'public/assets/images/dog.jpg', NULL, NULL, 0, NULL),
(2, 'public/assets/images/dog.jpg', NULL, NULL, 0, NULL),
(3, 'public/assets/images/dog.jpg', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '1',
  `address` varchar(1000) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT '1',
  `phone_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `logo` varchar(255) NOT NULL,
  `hotline` varchar(11) NOT NULL,
  `map` text,
  `email` varchar(255) DEFAULT NULL,
  `fb` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`logo`, `hotline`, `map`, `email`, `fb`) VALUES
('public/assets/images/logo.jpg', '01653690011', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.588426743965!2d105.83674931534546!3d21.009128993823094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7f0dce6683%3A0xf93cb2d2713953b6!2sTotoro+1988!5e0!3m2!1svi!2s!4v1536851669655\" height=\"300px\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'quangvhk123@gmail.com', '<div class=\"fb-page\" data-href=\"https://www.facebook.com/d15071958/\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"true\"><blockquote cite=\"https://www.facebook.com/d15071958/\" class=\"fb-xfbml-parse-ignore\"><a href=\"https://www.facebook.com/d15071958/\">Test Stream</a></blockquote></div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`hotline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
