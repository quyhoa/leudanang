/*
Navicat MySQL Data Transfer

Source Server         : Butchigho
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : dulichviet

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-09-30 14:36:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `orther` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('5', 'quyhoait@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Lê Quang Quý Hòa', '0', '2015-09-14 08:36:45', '2015-09-14 08:36:45', 'le-quang-quy-hoa', null, '05- cầm bá Thước- Hải Châu _ Đà Nẵng', '01686137003', null);

-- ----------------------------
-- Table structure for `banners`
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT '1',
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('1', 'test', '/img/banner/20150813160407.jpg', 'http://dantri.com', '1', '1', '1', '2015-08-13 16:04:07', '2015-08-13 16:07:37');
INSERT INTO `banners` VALUES ('2', 'test', '/img/banner/20150813170159.jpg', 'http://dantri.com', '1', '1', '0', '2015-08-13 16:11:44', '2015-08-13 17:01:59');
INSERT INTO `banners` VALUES ('3', 'test2', '/img/banner/20150813170102.jpg', 'http://dantri.com', '1', null, '0', '2015-08-13 17:01:02', '2015-08-13 17:01:02');
INSERT INTO `banners` VALUES ('4', 'test 3', '/img/banner/20150813170345.jpg', 'http://dantri.com', '1', null, '0', '2015-08-13 17:03:45', '2015-08-13 17:03:45');
INSERT INTO `banners` VALUES ('5', 'test333', '/img/banner/20150813172743.jpg', 'http://dantri.com', '1', '1212', '0', '2015-08-13 17:27:43', '2015-08-13 17:27:43');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` bigint(20) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `price_date` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Lều 2', '1', null, null, 'leu-2', null, '20000', '8');
INSERT INTO `categories` VALUES ('2', 'Lều 4', '1', null, null, 'leu-4', null, '20000', '8');
INSERT INTO `categories` VALUES ('3', 'Lều 6', '1', null, null, 'leu-6', null, '20000', '8');
INSERT INTO `categories` VALUES ('4', 'Lều 8', '1', null, null, 'leu-8', null, '20000', '8');
INSERT INTO `categories` VALUES ('5', 'Lều 10', '1', null, null, 'leu-10', null, '20000', '8');
INSERT INTO `categories` VALUES ('6', 'Lều 12', '1', null, null, 'leu-12', null, '20000', '8');
INSERT INTO `categories` VALUES ('7', 'Lều 14', '1', null, null, 'leu-14', null, '20000', '8');
INSERT INTO `categories` VALUES ('8', 'Lều', '1', null, null, 'leu', null, '20000', '0');
INSERT INTO `categories` VALUES ('13', 'Áo phao người lớn', '0', '2015-09-21 06:48:26', '2015-09-22 10:52:59', 'ao-phao-nguoi-lon', null, '333', '0');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `brow_date` datetime DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('5', '220000', '2015-09-17 08:04:28', '2015-09-18 08:57:52', '5', null, '2015-09-17 14:47:46', '2015-09-19 14:47:53', '1', '0');
INSERT INTO `orders` VALUES ('6', '220000', '2015-09-17 08:09:19', '2015-09-18 09:02:15', '5', null, null, null, '1', '0');
INSERT INTO `orders` VALUES ('7', '220000', '2015-09-17 08:13:41', '2015-09-17 09:40:29', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('8', '540000', '2015-09-17 08:15:38', '2015-09-17 09:44:05', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('9', '540000', '2015-09-17 08:17:44', '2015-09-17 09:44:07', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('10', '2000000', '2015-09-18 06:32:42', '2015-09-18 06:32:42', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('11', '2000000', '2015-09-18 06:58:12', '2015-09-18 06:58:12', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('12', '2180000', '2015-09-18 06:58:51', '2015-09-18 06:58:51', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('13', '4000000', '2015-09-18 09:03:54', '2015-09-18 09:03:54', '5', null, null, null, '0', '0');
INSERT INTO `orders` VALUES ('14', '220000', '2015-09-18 09:05:24', '2015-09-18 09:05:24', '5', null, '2015-03-12 00:00:00', '2015-03-12 00:00:00', '0', '0');
INSERT INTO `orders` VALUES ('15', '2180000', '2015-09-18 09:07:35', '2015-09-18 09:07:35', '5', null, null, null, '0', '1');
INSERT INTO `orders` VALUES ('16', '420000', '2015-09-18 10:46:14', '2015-09-18 10:46:14', '5', null, '2015-03-12 00:00:00', '2015-03-12 00:00:00', '0', '0');
INSERT INTO `orders` VALUES ('17', '180000', '2015-09-30 06:28:36', '2015-09-30 06:28:36', '5', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0');

-- ----------------------------
-- Table structure for `order_products`
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_products
-- ----------------------------
INSERT INTO `order_products` VALUES ('7', '6', '6', '1', '0', '2015-09-17 08:09:19', '2015-09-17 08:09:19', null);
INSERT INTO `order_products` VALUES ('8', '7', '6', '1', '0', '2015-09-17 08:13:41', '2015-09-17 08:13:41', null);
INSERT INTO `order_products` VALUES ('9', '8', '6', '1', '0', '2015-09-17 08:15:38', '2015-09-17 08:15:38', null);
INSERT INTO `order_products` VALUES ('10', '8', '4', '1', '0', '2015-09-17 08:15:38', '2015-09-17 08:15:38', null);
INSERT INTO `order_products` VALUES ('11', '8', '5', '1', '0', '2015-09-17 08:15:38', '2015-09-17 08:15:38', null);
INSERT INTO `order_products` VALUES ('12', '9', '6', '2', '0', '2015-09-17 08:17:44', '2015-09-17 08:17:44', null);
INSERT INTO `order_products` VALUES ('13', '9', '4', '1', '0', '2015-09-17 08:17:44', '2015-09-17 08:17:44', null);
INSERT INTO `order_products` VALUES ('14', '11', '6', '1', '0', '2015-09-18 06:58:12', '2015-09-18 06:58:12', null);
INSERT INTO `order_products` VALUES ('15', '12', '6', '1', '0', '2015-09-18 06:58:51', '2015-09-18 06:58:51', null);
INSERT INTO `order_products` VALUES ('16', '12', '5', '1', '0', '2015-09-18 06:58:51', '2015-09-18 06:58:51', null);
INSERT INTO `order_products` VALUES ('17', '13', '6', '2', '0', '2015-09-18 09:03:54', '2015-09-18 09:03:54', null);
INSERT INTO `order_products` VALUES ('18', '14', '6', '1', '0', '2015-09-18 09:05:24', '2015-09-18 09:05:24', null);
INSERT INTO `order_products` VALUES ('19', '15', '6', '1', '0', '2015-09-18 09:07:35', '2015-09-18 09:07:35', null);
INSERT INTO `order_products` VALUES ('20', '15', '5', '1', '0', '2015-09-18 09:07:35', '2015-09-18 09:07:35', null);
INSERT INTO `order_products` VALUES ('21', '16', '6', '2', '0', '2015-09-18 10:46:14', '2015-09-18 10:46:14', null);
INSERT INTO `order_products` VALUES ('22', '17', '6', '1', '0', '2015-09-30 06:28:36', '2015-09-30 06:28:36', null);

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` bigint(20) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `price_brow` int(11) DEFAULT NULL,
  `price_sales` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `image_large` varchar(255) DEFAULT NULL,
  `num_view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'demo', '0', null, '2015-09-29 05:33:13', 'demo', '1', '/img/thumbnail/20150917095718.png', '', '', '180000', '240000', null, '1', '10', '/img/product/20150917095718.png', '7');
INSERT INTO `products` VALUES ('3', 'butchigho', '0', '2015-09-04 04:19:14', '2015-09-04 05:40:51', 'butchigho', '3', '/img/thumbnail/20150904053723.png', 'Th&ocirc;ng tin m&ocirc; tả mơi nhất', '<strong>Nội dung chi tiết</strong><br />\r\nĐ&acirc;y l&agrave; sản phẩm mới nhất được tạo ra với mục đ&iacute;ch g&acirc;y tiếng cười cho ọi người', '18000', null, null, null, null, '/img/product/20150904053723.png', null);
INSERT INTO `products` VALUES ('4', 'Lều dành cho 2 người', '0', '2015-09-11 05:27:23', '2015-09-29 06:20:29', 'leu-danh-cho-2-nguoi', '1', '/img/thumbnail/20150911052722.png', '', '', '100000', '100000', null, null, null, '/img/product/20150911052722.png', '11');
INSERT INTO `products` VALUES ('5', 'Lều dành cho 8 người', '0', '2015-09-11 06:00:41', '2015-09-29 06:37:34', 'leu-danh-cho-8-nguoi', '1', '/img/thumbnail/20150911060040.jpg', '', '', '180000', '180000', null, null, null, '/img/product/20150911060040.jpg', '11');
INSERT INTO `products` VALUES ('6', 'Lều dành cho 8 người mới', '0', '2015-09-11 06:15:33', '2015-09-29 08:41:12', 'leu-danh-cho-8-nguoi-moi', '4', '/img/thumbnail/20150911061533.jpg', '', '', '200000', '2000000', null, null, null, '/img/product/20150911061533.jpg', '91');
INSERT INTO `products` VALUES ('7', 'Lều 12 người ateka', '0', '2015-09-30 09:13:33', '2015-09-30 09:16:23', 'leu-12-nguoi-ateka', '6', '/img/thumbnail/20150930091333.jpg', '<strong>Lều 10 người c&oacute; ph&ograve;ng</strong><br />\r\n( 1 ph&ograve;ng ngủ v&agrave; 1 ph&ograve;ng kh&aacute;ch) ph&ograve;ng ngủ c&oacute; thể th&aacute;o rời.<br />\r\n<strong>K&iacute;ch thước</strong> :&nbsp;530*300*200', '<strong>Lều 10 người c&oacute; ph&ograve;ng</strong><br />\r\n( 1 ph&ograve;ng ngủ v&agrave; 1 ph&ograve;ng kh&aacute;ch) ph&ograve;ng ngủ c&oacute; thể th&aacute;o rời.<br />\r\n<strong>K&iacute;ch thước</strong>&nbsp;:&nbsp;530*300*200', '200000', '2500000', null, null, null, '/img/product/20150930091333.jpg', '2');
INSERT INTO `products` VALUES ('8', 'Lều 8 areka', '0', '2015-09-30 09:26:39', '2015-09-30 09:26:39', 'leu-8-areka', '4', '/img/thumbnail/20150930092638.jpg', 'Th&ocirc;ng tin đang được cập nhật', '', '180000', '2200000', null, null, null, '/img/product/20150930092638.jpg', null);
INSERT INTO `products` VALUES ('9', 'Lều 8 người ateka', '0', '2015-09-30 09:28:19', '2015-09-30 09:28:19', 'leu-8-nguoi-ateka', '4', '/img/thumbnail/20150930092819.jpg', '', '', '180000', '2200000', null, null, null, '/img/product/20150930092819.jpg', null);
INSERT INTO `products` VALUES ('10', 'Lều 14 areka', '0', '2015-09-30 09:29:47', '2015-09-30 09:29:47', 'leu-14-areka', '7', '/img/thumbnail/20150930092947.jpg', 'Th&ocirc;ng tin đăng được cập nhật ...', '', '200000', '3000000', null, null, null, '/img/product/20150930092947.jpg', null);
INSERT INTO `products` VALUES ('11', 'Lều 12 cho các tiểu đội', '0', '2015-09-30 09:32:23', '2015-09-30 09:32:23', 'leu-12-cho-cac-tieu-doi', '6', '/img/thumbnail/20150930093222.jpg', '', '', '200000', '2700000', null, null, null, '/img/product/20150930093222.jpg', null);
INSERT INTO `products` VALUES ('12', 'Lêu đôi tình yêu', '0', '2015-09-30 09:34:33', '2015-09-30 09:34:33', 'leu-doi-tinh-yeu', '1', '/img/thumbnail/20150930093433.jpg', 'Th&ocirc;ng tin đang được cập nhật...', '', '100000', '1350000', null, null, null, '/img/product/20150930093433.jpg', null);
INSERT INTO `products` VALUES ('13', 'Lều đôi 2 lớp', '0', '2015-09-30 09:35:40', '2015-09-30 09:35:40', 'leu-doi-2-lop', '1', '/img/thumbnail/20150930093540.jpg', 'Lều cấu tạo 2 lớp chống thấm nước tuyệt đối.', '', '10000', '140000', null, null, null, '/img/product/20150930093540.jpg', null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '1', null, null);
INSERT INTO `roles` VALUES ('2', 'manager', '1', null, null);
INSERT INTO `roles` VALUES ('3', 'guest', '1', null, null);
INSERT INTO `roles` VALUES ('4', 'user', '1', null, null);

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'ban', 'ban', null, null);
INSERT INTO `types` VALUES ('2', 'thue', 'thue', null, null);
