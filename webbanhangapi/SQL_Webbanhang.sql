-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~2 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(4, 'admin', 'admin', '$2y$12$j9s.Hi/uINvEbTghX8Raye1kkWypVcUPRz18XkUediQSXVSUKVlZG', 'admin'),
	(5, 'user', 'user', '$2y$12$2fW06RrLtkLNIkqFmomQGemUAObaCmuSIUyKEmINk2PQfMIfNO4p2', 'user');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~4 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Áo thun', 'Danh mục các loại áo thun'),
	(2, 'Hoodie', 'Danh mục các loại hoodie'),
	(3, 'Sweater', 'Danh mục các loại sweater'),
	(4, 'Nón', 'Danh mục nón'),
	(5, 'Túi', 'Danh mục túi'),
	(6, 'Quần', 'Danh mục các loại quần');


-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` enum('new','processing','completed') DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
-- Dumping data for table my_store.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `status`, `created_at`) VALUES
	(1, 'hhh', '12121', 'asaa', 'new', '2025-03-17 09:07:46');

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~0 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
	(1, 1, 1, 1, 1212111.00);

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,products
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~0 rows (approximately)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(1, 'Iphone 15 PRO MAX 512GB', 'TÍNH NĂNG NỔI BẬT\r\n\r\nThiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ, bền cùng viền cạnh mỏng cảm mán thoải mái\r\nHiệu năng Pro chiến game thả ga - Chip A17 Pro mang lại hiệu năng đồ họa vô cùng sống động và chân thực\r\nThỏa sức sáng tạo và quay phim chuyên nghiệp - Cụm 3 camera sau đến 48MP và nhiều chế độ tiên tiến\r\nNút tác vụ mới giúp nhanh chóng kích hoạt tính năng yêu thích của bạn', 31000000.00, 'uploads/iphone-15-pro-max-black-thumbnew-600x600.jpg', 1),
   (2, 'Xiaomi 15 ULTRA', 'TÍNH NĂNG NỔI BẬT\r\n\r\nHiệu năng Xiaomi Mi 15 Ultra vượt trội Snapdragon 8 Elite với hai lõi Oryon 2 cho khả năng xử lý mượt mà các tác vụ nặng\r\nCụm camera sau 200 MP với khả năng zoom kỹ thuật số đến 120x, cho phép chụp ảnh sắc nét trong mọi điều kiện ánh sáng\r\nHyperOS 2 hệ điều hành tối ưu hóa trải nghiệm sử dụng, giảm độ trễ và xử lý đa nhiệm mượt mà\r\nTính năng HyperAI hỗ trợ nhận diện giọng nói, dịch ngôn ngữ thời gian thực và chỉnh sửa hình ảnh/video ngay trên thiết bị', 31990000.00, 'uploads/xiaomi-15-ultra-1-1.png', 1),
	(3, 'SamSung Galaxy S25 Ultra', 'TÍNH NĂNG NỔI BẬT\r\nChuẩn IP68 trên Samsung S25 Ultra 5G – Chống nước, chống bụi, thiết kế cao cấp, sang trọng.\r\nÂm thanh Dolby Atmos, loa kép AKG – Trải nghiệm âm thanh sống động, chân thực.\r\nMàn hình S25 Ultra Dynamic AMOLED 2X 6.9 inch, 120Hz – Hiển thị sắc nét, mượt mà, tiết kiệm pin.\r\nCamera 200MP + Zoom 100X – Cảm biến lớn, chụp thiếu sáng tốt, zoom xa chi tiết.', 28490000.00, 'uploads/2_54303.jpg', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;