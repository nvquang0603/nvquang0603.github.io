-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 07:43 AM
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
(1, 'Totoro', 'assets/images/totoro.gif', 'https://vi.wikipedia.org/wiki/Studio_Ghibli'),
(2, 'Minion', 'assets/images/minion.jpg', 'https://vi.wikipedia.org/wiki/Minions'),
(3, 'Kumamon', 'assets/images/kumamon.jpg', 'https://vi.wikipedia.org/wiki/Kumamon'),
(4, 'Pusheen', 'assets/images/pusheen.jpg', 'http://pusheen.com/'),
(5, 'Rilakkuma', 'assets/images/rilakkuma.jpg', 'https://iprice.vn/rilakkuma/'),
(7, 'Faceless', 'assets/images/faceless.jpg', 'http://studio-ghibli.wikia.com/wiki/No-Face'),
(8, 'Doraemon', 'assets/images/doraemon.jpg', 'https://vi.wikipedia.org/wiki/Doraemon'),
(9, 'Shin', 'assets/images/shin.jpg', 'https://vi.wikipedia.org/wiki/Shin_%E2%80%93_C%E1%BA%ADu_b%C3%A9_b%C3%BAt_ch%C3%AC');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Totoro', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Totoro'),
(2, 'Shinoshuke', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Shinoshuke'),
(3, 'Minion', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Minion'),
(4, 'Kumamon', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Kumamon'),
(5, 'Pusheen', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Pusheen'),
(6, 'Rilakkuma', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Rilakkuma'),
(8, 'Stich', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Stitch'),
(9, 'Faceless', 'Đồ chơi, gối ôm, quần áo, phụ kiện, thú bông mang hình ảnh Vô Diện');

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
(23, 'quangvhk123@gmail.com', 'Nhìn đẹp quá. Bên shop còn hàng loại này không? Mình muốn đặt 12783283563485 sản phẩm :) ', 25),
(38, 'quangvhk123@gmail.com', 'Một ông sao sáng hai ông sáng sao', 34),
(41, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(42, 'quangvhk123@gmail.com', '<script> alert(\"haha\");</script>', 34),
(43, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(64, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(65, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(66, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(67, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(68, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(69, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(70, 'quangvhk123@gmail.com', 'hahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahhhahahahahahh', 35),
(71, 'quangvhk123@yahoo.com', 'hahahahahaasdasdasdasdasdasd', 34),
(72, 'quangvhk123@gmail.com', 'jkshdfkjhsdkjfhskjdfhkjsdhfkjhsdfkjhskdjfhksjdfhkjshdfkjshdfkjshdfkjhsdf', 34);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `phone_number`, `content`) VALUES
(9, 'Nguyễn Viết Quang', 'quangvhk123@yahoo.com', '01653690011', 'xcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcvxcv'),
(10, 'Nguyễn Viết Quang', 'quangvhk123@yahoo.com', '01653690011', 'dsfsdfsdfsdfsdfsdfáđâdầdgdfgdfgdfg');

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
(9, 1, 'Gối ôm Totoro mịn', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm<b></b>\r\nGối ôm mang hình dáng Totoro siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 180000, 165000, 'assets/images/totoro-bong-min.jpg', 1, 64),
(10, 1, 'Xe bus mèo - Catbus', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/xe-bus-meo.jpg', 1, 83),
(11, 1, 'Totoro tốt nghiệp', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Totoro siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 250000, 230000, 'assets/images/totoro-tot-nghiep.jpg', 0, 72),
(12, 1, 'Mashi đội Totoro', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/mashi.jpg', 1, 47),
(13, 1, 'Gối lưỡi liềm Totoro', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Totoro siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 180000, 165000, 'assets/images/goi-luoi-liem-totoro.jpg', 1, 33),
(14, 1, 'Hạt đậu Totoro Chibi', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/totoro-chibi.jpg', 0, 77),
(15, 1, 'Totoro lông xù cầm lá', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Totoro siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 250000, 230000, 'assets/images/totoro-cam-la.jpg', 1, 60),
(16, 1, 'Gối massage Totoro', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/goi-massage-totoro.jpg', 1, 45),
(17, 9, 'Vô diện đan len', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/vo-dien-dan-len.jpg', 1, 96),
(18, 9, 'Gối ôm Vô Diện 60cm', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/goi-om-vo-dien.jpg', 1, 77),
(19, 6, 'Gối Rilakkuma có chăn', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Rilakkuma siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 160000, 155000, 'assets/images/goi-om-rilakkuma.jpg', 1, 96),
(20, 6, 'Rilakkuma trắng', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 540000, 500000, 'assets/images/rilakkuma-trang.jpg', 1, 76),
(21, 6, 'Rilakkuma 20cm', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Rilakkuma siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 80000, 75000, 'assets/images/rilakkuma-20.jpg', 1, 126),
(22, 6, 'Rilakkuma bông siêu lớn', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 910000, 900000, 'assets/images/rilakkuma-xl.jpg', 1, 53),
(23, 2, 'Shinosuke 50cm', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 270000, 265000, 'assets/images/shin-50.jpg', 1, 43),
(24, 2, 'Tượng Shin', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 40000, 38000, 'assets/images/shin-tuong.jpg', 1, 42),
(25, 3, 'Tượng Minion bộ to', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 180000, 160000, 'assets/images/minion-tuong-xl.jpg', 1, 51),
(26, 3, 'Tượng Minion bộ nhỏ', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 180000, 160000, 'assets/images/minion-tuong-xs.jpg', 1, 42),
(27, 3, 'Minion Mùa đông', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 290000, 260000, 'assets/images/minion-winter.jpg', 1, 134),
(28, 3, 'Minion Cosplay', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 290000, 260000, 'assets/images/minion-hero.jpg', 1, 70),
(29, 4, 'Chăn trong gối 4 in 1 Kumamon', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 280000, 260000, 'assets/images/kumamon-4-in-1.jpg', 1, 64),
(30, 4, 'Kumamon cầm tay', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 65000, 60000, 'assets/images/kumamon-cam-tay.jpg', 1, 71),
(31, 4, 'Đèn ngủ Kumamon', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 140000, 130000, 'assets/images/kumamon-den-ngu.jpg', 1, 25),
(32, 5, 'Mèo Pusheen bông 35cm', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 140000, 130000, 'assets/images/pusheen-35.jpg', 1, 47),
(33, 8, 'Đồ chơi Stitch căn ngón tay', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 165000, 130000, 'assets/images/stitch-crunch.jpg', 1, 132),
(34, 8, 'Bộ 6 mô hình Stitch', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 165000, 130000, 'assets/images/stitch-figure.jpg', 1, 229),
(35, 8, 'Stitch má hồng', 'Chất liệu: Cotton\r\nKích thước: 30cm x 20cm\r\nGối ôm mang hình dáng Xe Bus Mèo siêu mập siêu cute chắc chắn sẽ là người bạn thân thiết với mỗi người trong dịp mùa đông thì sắp tới mà chưa được nắm tay ai. Chất liệu cotton siêu mịn siêu ấm và đặc biệt là giặt siêu dễ chắc chắn sẽ khiến bạn không khỏi thích thú.', 180000, 160000, 'assets/images/stitch-ma-hong.jpg', 0, 234);

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `image`, `description`, `url`, `status`, `order_number`) VALUES
(1, 'assets/images/slide1.jpg', '', 'http://localhost/web204_quangnvph05487/product_detail.php?id=9', 1, 4),
(2, 'assets/images/slide2.jpg', '', 'http://localhost/web204_quangnvph05487/product_detail.php?id=22', 1, 3),
(3, 'assets/images/slide3.jpg', '', 'http://localhost/web204_quangnvph05487/single-category.php?id=1', 1, 1),
(4, 'assets/images/slide4.jpg', '', 'http://localhost/web204_quangnvph05487/single-category.php?id=9', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '3',
  `address` varchar(1000) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT '1',
  `phone_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `role`, `address`, `avatar`, `gender`, `phone_number`) VALUES
(1, 'quangvhk123@gmail.com', 'Nguyễn Viết Quang', '$2y$10$m.lKbdk1yLdarPvHXmdP0OJaCDo6d/6J5031k1Ktp7/ezGsvnpI2q', 1, 'Mỹ Đình', 'assets/images/sample_image/default-avatar.jpg', 1, '01653690011'),
(5, 'quangvhk123@yahoo.com', 'Văn Quang', '$2y$10$CrVSD5vzvV9GPaILHCFBTOOznWDJccsFQk5H4Fak4jaZNwub6X7du', 3, '', 'assets/images/sample_image/default-avatar.jpg', 0, ''),
(7, 'nvquang0603@gmail.com', 'Nguyễn Văn Quang', '$2y$10$yOpbBsa8HU36QQrHO3ayLOeIb4cgYgAlmivf1lP2cVYeEU5EPTVVm', 2, 'Mỹ Đình', 'assets/images/sample_image/default-avatar.jpg', 1, '01653690011');

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
('assets/images/logo.jpg', '01295194665', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59584.32061862894!2d105.7499333683412!3d21.03188419099638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4a0960d67f%3A0xc47f9f2ef7623be7!2sTotoro+1988!5e0!3m2!1svi!2s!4v1539573206467\" width=\"300\" height=\"300\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'nvquang0603@gmail.com', '<div class=\"fb-page\" data-href=\"https://www.facebook.com/totoro1988/\" data-tabs=\"timeline\" data-height=\"300\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"false\"><blockquote cite=\"https://www.facebook.com/totoro1988/\" class=\"fb-xfbml-parse-ignore\"><a href=\"https://www.facebook.com/totoro1988/\">TOTORO 1988</a></blockquote></div>');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
