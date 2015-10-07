/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : linhphukienstores

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-08-01 22:28:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('0', 'phanthanhhai07t1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', null, null);

-- ----------------------------
-- Table structure for block_categories
-- ----------------------------
DROP TABLE IF EXISTS `block_categories`;
CREATE TABLE `block_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_categories
-- ----------------------------
INSERT INTO `block_categories` VALUES ('1', 'page', 'Trang riêng', null, 'Category lưu các trang riêng', null, null, '0', '2015-08-01 19:18:46', '2015-08-01 19:18:50');
INSERT INTO `block_categories` VALUES ('2', 'quang-cao', 'category quảng cáo', null, null, null, null, '0', '2015-08-01 19:19:24', '2015-08-01 19:19:26');
INSERT INTO `block_categories` VALUES ('3', null, null, null, null, null, null, '0', null, null);

-- ----------------------------
-- Table structure for block_contents
-- ----------------------------
DROP TABLE IF EXISTS `block_contents`;
CREATE TABLE `block_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `content` text,
  `block_category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_contents
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_details
-- ----------------------------

-- ----------------------------
-- Table structure for page_lists
-- ----------------------------
DROP TABLE IF EXISTS `page_lists`;
CREATE TABLE `page_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `code` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `type` tinyint(2) DEFAULT '0' COMMENT '0:dynamic: 1 :static',
  `url` varchar(1024) DEFAULT NULL,
  `content` text,
  `publish` tinyint(2) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_lists
-- ----------------------------
INSERT INTO `page_lists` VALUES ('1', null, 'trang-chu', 'Trang chủ', '1', '/', null, '1', '1', '0', '2015-08-01 22:14:42', '2015-08-01 22:14:45');
INSERT INTO `page_lists` VALUES ('2', null, 'lien-he', 'Liên hệ', '1', '/lien-he', null, '1', '2', '0', '2015-08-01 22:17:49', '2015-08-01 22:17:52');
INSERT INTO `page_lists` VALUES ('3', null, 'gioi-thieu', 'Giới thiệu', '0', '/gioi-thieu', null, '1', '3', '0', '2015-08-01 22:19:55', '2015-08-01 22:19:57');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `detail_short` varchar(255) DEFAULT NULL,
  `detail` text,
  `image` varchar(255) DEFAULT NULL,
  `image_large` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'iphone-6', '1', 'iphone 6', null, null, null, 'test', '1438399210.png', null, '1000', null, '1', '1', '2015-08-01 05:20:10', '2015-08-01 05:20:10');

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT '',
  `lang_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '0' COMMENT 'vi tri sap xep',
  `publish` tinyint(2) DEFAULT NULL COMMENT '1: publish, 0: unpublish',
  `status` tinyint(2) DEFAULT '0' COMMENT '0:nomal,1:deleted',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('1', 'dien-thoai-di-dong', 'Điện thoại di động', null, '', null, '1', '1', '1', '2015-08-01 05:03:01', '2015-08-01 13:22:21');
INSERT INTO `product_categories` VALUES ('2', 'may-tinh-bang', 'Máy tính bảng', '1', '', null, '2', '0', '1', '2015-08-01 05:03:29', '2015-08-01 11:42:08');
INSERT INTO `product_categories` VALUES ('3', 'linh-kien', 'Linh kiện', '1', '', null, '3', '1', '0', '2015-08-01 05:03:40', '2015-08-01 05:03:40');
INSERT INTO `product_categories` VALUES ('4', 'phu-kien', 'Phụ kiện', null, '', null, '4', '1', '0', '2015-08-01 05:03:57', '2015-08-01 13:45:25');
INSERT INTO `product_categories` VALUES ('5', 'phu-kien-dien-tu', 'Phụ kiện điện tử', null, 'test', null, '5', '1', '0', '2015-08-01 09:57:35', '2015-08-01 09:57:35');
INSERT INTO `product_categories` VALUES ('6', 'aaaaa', 'aaaaa', null, '', null, '6', '0', '1', '2015-08-01 10:24:13', '2015-08-01 10:24:13');
INSERT INTO `product_categories` VALUES ('8', 'aaaaaaaaa', 'aaaaaaaaa', null, '', null, '1', '1', '1', '2015-08-01 13:20:27', '2015-08-01 13:20:27');

-- ----------------------------
-- Table structure for product_news
-- ----------------------------
DROP TABLE IF EXISTS `product_news`;
CREATE TABLE `product_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_news
-- ----------------------------

-- ----------------------------
-- Table structure for product_special
-- ----------------------------
DROP TABLE IF EXISTS `product_special`;
CREATE TABLE `product_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_special
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `type_regist` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
