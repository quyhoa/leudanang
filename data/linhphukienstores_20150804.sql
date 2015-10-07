/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : linhphukienstores

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-08-04 07:18:57
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_categories
-- ----------------------------
INSERT INTO `block_categories` VALUES ('1', 'support-online', 'support online', null, null, null, '1', '0', '2015-08-02 14:49:58', '2015-08-02 14:50:01');
INSERT INTO `block_categories` VALUES ('2', 'adv-top', 'adv top', null, 'block quảng cáo top page', null, null, '0', '2015-08-02 14:51:55', '2015-08-02 14:51:59');
INSERT INTO `block_categories` VALUES ('3', 'adv-top-left', 'adv top left', null, 'block quảng cáo phía trên bên trái', null, '0', '0', '2015-08-02 14:52:01', '2015-08-02 10:29:01');
INSERT INTO `block_categories` VALUES ('4', 'adv-bottom-left', 'adv bottom left', null, 'block quảng cáo ', null, null, '0', null, null);
INSERT INTO `block_categories` VALUES ('5', null, 'aaaaaa', null, 'ssssssss', '1', '1', '1', '2015-08-02 10:18:38', '2015-08-02 10:18:38');
INSERT INTO `block_categories` VALUES ('6', 'aaaaaaaaa', 'aaaaaaaaa', '3', 'aaaaaaa', '22', '1', '0', '2015-08-02 10:20:59', '2015-08-02 10:26:52');
INSERT INTO `block_categories` VALUES ('7', 'test-12323', 'test 12323', null, '', '2', '1', '1', '2015-08-02 10:21:35', '2015-08-02 10:27:54');

-- ----------------------------
-- Table structure for block_contents
-- ----------------------------
DROP TABLE IF EXISTS `block_contents`;
CREATE TABLE `block_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(1024) DEFAULT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `content` text,
  `block_category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT '1',
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block_contents
-- ----------------------------
INSERT INTO `block_contents` VALUES ('1', 'yahoo', 'yahoo', '1', 'aaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n', '1', null, null, '1', '1', '0', '2015-08-02 11:27:34', '2015-08-02 11:38:48');
INSERT INTO `block_contents` VALUES ('2', 'test', 'test', '1', '', '<p>aaaaaaaaaaaaaaaa</p>\r\n', '2', null, null, '1', '1', '1', '2015-08-02 11:39:03', '2015-08-02 11:39:03');
INSERT INTO `block_contents` VALUES ('3', 'aaaaaaaaa', 'aaaaaaaaa', '1', 'aaaaaaaaaaaaaa', '<p>sssssssssssssssssssssssssssss</p>\r\n', '3', null, null, '22', '1', '1', '2015-08-02 11:39:28', '2015-08-02 11:40:06');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `content` text,
  `type` int(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `publish` tinyint(2) DEFAULT NULL,
  `news_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', null, 'test abc', 'test', '<p>test abc</p>\r\n', null, null, '1', null, '2015-08-02 13:02:28', '2015-08-02 13:02:28');
INSERT INTO `news` VALUES ('2', 'sssss', 'sssss', 'sssssssssssssssss', '<p>dddddddd</p>\r\n', null, '1', '0', '3', '2015-08-02 13:03:06', '2015-08-02 13:11:51');
INSERT INTO `news` VALUES ('3', 'testabcc', 'testabcc', 'test', '<p>testccccc</p>\r\n', null, '0', '1', '4', '2015-08-02 13:04:43', '2015-08-02 13:10:31');
INSERT INTO `news` VALUES ('4', 'aaa', 'aaa', '', '<p>sdddddddddddddd</p>\r\n', null, '1', '1', '4', '2015-08-02 13:09:52', '2015-08-02 13:10:28');

-- ----------------------------
-- Table structure for news_categories
-- ----------------------------
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(1024) DEFAULT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `publish` tinyint(2) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_categories
-- ----------------------------
INSERT INTO `news_categories` VALUES ('1', 'testabc', 'testabc', '1', '1', '2015-08-02 12:35:09', '2015-08-02 12:43:36');
INSERT INTO `news_categories` VALUES ('2', 'testabc1d-test', 'testabc1đ test', '1', '1', '2015-08-02 12:41:44', '2015-08-02 12:41:44');
INSERT INTO `news_categories` VALUES ('3', 'thong-tin-cong-nghe', 'Thông tin công nghệ', '0', '1', '2015-08-02 12:43:50', '2015-08-02 12:43:56');
INSERT INTO `news_categories` VALUES ('4', 'thong-tin-khuyen-mai', 'Thông tin khuyến mãi', '0', '1', '2015-08-02 12:44:05', '2015-08-02 12:44:05');

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
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_lists
-- ----------------------------
INSERT INTO `page_lists` VALUES ('1', null, 'trang-chu', 'Trang chủ', '1', '/', '<p>aaaaaaaaaaaaaaa</p>\r\n', '1', '1', '0', '2015-08-01 22:14:42', '2015-08-02 09:36:49');
INSERT INTO `page_lists` VALUES ('2', '3', 'lien-he', 'Liên hệ', '1', '/lien-he', '<p><strong>C&Ocirc;NG TY TNHH THƯƠNG MẠI DỊCH VỤ TIN HỌC NHẤT T&Iacute;N</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<strong>Địa chỉ: </strong>Số 18 L&ecirc; Thanh Nghị - Hai B&agrave; Trưng - H&agrave; Nội<br />\r\n<strong>&nbsp; &nbsp; &nbsp; Điện thoại:</strong> 04.3868 3905 - 04.66 58 68 58 - 0912 80 80 81<br />\r\n&nbsp; &nbsp; &nbsp;<strong>Fax:</strong> 04.38683905<br />\r\n&nbsp; &nbsp; &nbsp;<strong>Website:</strong> http://nhattin.vn</p>\r\n\r\n<p>&nbsp; <strong>&nbsp; Trụ sở ch&iacute;nh: Số 18 L&ecirc; Thanh Nghị, Hai B&agrave; Trưng, H&agrave; Nội</strong><br />\r\n&nbsp; &nbsp; Điện thoại: 0912 80 80 81<br />\r\n&nbsp; &nbsp; Người đại diện: (Mr) PHẠM DUY KHANH - Gi&aacute;m đốc</p>\r\n\r\n<p><iframe frameborder=\"0\" scrolling=\"no\" src=\"http://nhattin.vn/js/map.aspx\" style=\"height:300px;width:100%;\"></iframe></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch li&ecirc;n hệ với ch&uacute;ng t&ocirc;i bằng c&aacute;ch điền v&agrave;o mẫu Form dưới đ&acirc;y v&agrave; gửi cho ch&uacute;ng t&ocirc;i. Th&ocirc;ng tin của qu&yacute; kh&aacute;ch sẽ được xem x&eacute;t v&agrave; trả lời trong thời gian sớm nhất.<br />\r\nGhi ch&uacute;: Những &ocirc; c&oacute; dấu (*) l&agrave; những &ocirc; y&ecirc;u cầu nhập đầy đủ th&ocirc;ng tin</p>\r\n', '1', '2', '0', '2015-08-01 22:17:49', '2015-08-02 09:47:43');
INSERT INTO `page_lists` VALUES ('3', null, 'gioi-thieu', 'Giới thiệu', '0', '/gioi-thieu', '<h2>&nbsp;Quảng Ninh vừa hứng chịu một trận mưa lịch sử k&eacute;o d&agrave;i suốt mấy ng&agrave;y, g&acirc;y lũ qu&eacute;t, sạt lở, ngập nặng, vỡ đập... cướp đi gần 20 sinh mạng v&agrave; cuốn phăng hơn 2.000 tỉ đồng. Kh&ocirc;ng chỉ Quảng Ninh, trong những ng&agrave;y qua to&agrave;n miền Bắc c&ugrave;ng &quot;lao đao&quot; v&igrave; mưa lũ.<br />\r\n<a href=\"http://dantri.com.vn/xa-hoi/quang-ninh-mat-trang-2-000-ti-dong-do-mua-lu-20150801081131538.htm\" style=\"margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);\" title=\"Quảng Ninh mất trắng 2.000 tỉ đồng do mưa lũ\">&nbsp;&gt;&gt;&nbsp;Quảng Ninh mất trắng 2.000 tỉ đồng do mưa lũ</a><br />\r\n<a href=\"http://dantri.com.vn/xa-hoi/dau-xe-long-tien-dua-8-nguoi-trong-mot-gia-dinh-thiet-mang-do-mua-lu-20150730064406047.htm\" style=\"margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);\" title=\"Đau xé lòng tiễn đưa 8 người trong một gia đình thiệt mạng do mưa lũ\">&nbsp;&gt;&gt;&nbsp;Đau x&eacute; l&ograve;ng tiễn đưa 8 người trong một gia đ&igrave;nh thiệt mạng do mưa lũ</a><br />\r\n<a href=\"http://dantri.com.vn/xa-hoi/dot-mua-lu-gay-thiet-hai-nang-ne-voi-ca-dat-lien-va-tren-bien-20150729110030273.htm\" style=\"margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);\" title=\"Đợt mưa lũ gây thiệt hại nặng nề với cả đất liền và trên biển\">&nbsp;&gt;&gt;&nbsp;Đợt mưa lũ g&acirc;y thiệt hại nặng nề với cả đất liền v&agrave; tr&ecirc;n biển</a></h2>\r\n\r\n<div class=\"fon34 mt3 mr2 fon43 detail-content\" id=\"divNewsContent\" style=\"margin: 15px 10px 9.390625px 0px; padding: 0px; outline: 0px; font-stretch: normal; font-size: 12pt; font-family: \'Times New Roman\'; color: rgb(0, 0, 0); line-height: 20px !important;\">\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"4-b152e\" class=\"VCSortableInPreviewMode\" id=\"img_9709\" src=\"http://dantri4.vcmedia.vn/k:thumb_w/640/701ef85ab3/2015/08/01/5-d4d6b/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"4-b152e\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Người d&acirc;n sống tr&ecirc;n đường Định C&ocirc;ng (Ho&agrave;ng Mai, H&agrave; Nội) &quot;be bờ, đắp đập&quot; ngăn nước tr&agrave;n v&agrave;o nh&agrave;. (Ảnh chụp chiều ng&agrave;y 1/8: Hữu Nghị).</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"28-2-eba36\" class=\"VCSortableInPreviewMode\" id=\"img_9723\" src=\"http://dantri4.vcmedia.vn/k:eba11ac2e5/2015/07/28/28-2-eba36/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"28-2-eba36\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Cơn mưa lịch sử lớn nhất trong v&ograve;ng 40 năm qua đ&atilde; nhấn ch&igrave;m Quảng Ninh trong biển nước. (Ảnh: Tuấn Hợp)</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"Sạt lở kinh hoàng tại tổ 44, khu 4, phường Cao Thắng, TP Hạ Long khiến 3 ngôi nhà bị sập, 9 người bị vùi lấp, trong đó 8 người tử vong. (Ảnh: VietNamnet).\" id=\"img_9771\" src=\"http://dantri4.vcmedia.vn/k:2015/luqn1-1438445941418/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Sạt lở kinh ho&agrave;ng tại tổ 44, khu 4, phường Cao Thắng, TP Hạ Long khiến 3 ng&ocirc;i nh&agrave; bị sập, 9 người bị v&ugrave;i lấp, trong đ&oacute; 8 người tử vong. (Ảnh: VietNamnet).</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"Lũ đổ về xã Bản Sen, huyện Vân Đồn, tỉnh Quảng Ninh. (Ảnh: VietNamnet)\" id=\"img_9770\" src=\"http://dantri4.vcmedia.vn/k:thumb_w/640/2015/luqn-1438445802190/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Lũ đổ về x&atilde; Bản Sen, huyện V&acirc;n Đồn, tỉnh Quảng Ninh. (Ảnh: VietNamnet)</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"Nhiều tuyến đường tỉnh lộ, liên xã tại huyện Mường Tè, tỉnh Lai Châu bị sạt lở nghiêm trọng, khiến giao thông gần như tê liệt. (Ảnh: VOV)\" id=\"img_9726\" src=\"http://dantri4.vcmedia.vn/k:2015/laichau-1438444874897/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Nhiều tuyến đường tỉnh lộ, li&ecirc;n x&atilde; tại huyện Mường T&egrave;, tỉnh Lai Ch&acirc;u bị sạt lở nghi&ecirc;m trọng, khiến giao th&ocirc;ng gần như t&ecirc; liệt. (Ảnh: VOV)</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"VCSortableInPreviewMode\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;\">\r\n<div style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;\"><img alt=\"Một đàn 19 con trâu bị sét đánh chết hết trong mưa giông ở Hà Giang. (Ảnh: TTXVN)\" id=\"img_9780\" src=\"http://dantri4.vcmedia.vn/k:2015/trau1w-1438409481493/ca-mien-bac-lao-dao-vi-mua-lu.jpg\" style=\"border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px\" title=\"\" /></div>\r\n\r\n<div class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;\">\r\n<p>Một đ&agrave;n 19 con tr&acirc;u bị s&eacute;t đ&aacute;nh chết hết trong mưa gi&ocirc;ng ở H&agrave; Giang. (Ảnh: TTXVN)</p>\r\n</div>\r\n</div>\r\n</div>\r\n', '1', '3', '0', '2015-08-01 22:19:55', '2015-08-02 06:07:21');
INSERT INTO `page_lists` VALUES ('4', null, null, '', '0', null, '', '1', null, null, '2015-08-02 05:18:28', '2015-08-02 05:18:28');
INSERT INTO `page_lists` VALUES ('5', null, null, '', '0', null, '', '1', null, null, '2015-08-02 05:18:34', '2015-08-02 05:18:34');
INSERT INTO `page_lists` VALUES ('6', null, null, '', '0', null, '', '1', null, null, '2015-08-02 05:19:23', '2015-08-02 05:19:23');
INSERT INTO `page_lists` VALUES ('7', null, null, '', '0', null, '', '1', null, null, '2015-08-02 05:19:35', '2015-08-02 05:19:35');
INSERT INTO `page_lists` VALUES ('8', null, null, 'aaaaaaaaa', '0', null, '', '1', '1', null, '2015-08-02 05:23:50', '2015-08-02 05:23:50');
INSERT INTO `page_lists` VALUES ('9', '3', null, 'test', '0', '', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n', '1', '1', '1', '2015-08-02 05:34:22', '2015-08-02 05:50:37');
INSERT INTO `page_lists` VALUES ('10', '1', null, 'test', '0', 'test', '<p>testaaaa</p>\r\n', '1', '1', '1', '2015-08-02 09:39:00', '2015-08-02 09:39:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('1', 'dien-thoai-di-dong', 'Điện thoại di động', null, '', null, '1', '1', '0', '2015-08-01 05:03:01', '2015-08-01 13:22:21');
INSERT INTO `product_categories` VALUES ('2', 'may-tinh-bang', 'Máy tính bảng', '1', '', null, '2', '0', '0', '2015-08-01 05:03:29', '2015-08-01 11:42:08');
INSERT INTO `product_categories` VALUES ('3', 'linh-kien', 'Linh kiện', null, '', null, '3', '1', '0', '2015-08-01 05:03:40', '2015-08-01 17:31:17');
INSERT INTO `product_categories` VALUES ('4', 'phu-kien', 'Phụ kiện', null, '', null, '4', '1', '0', '2015-08-01 05:03:57', '2015-08-01 13:45:25');
INSERT INTO `product_categories` VALUES ('5', 'phu-kien-dien-tu', 'Phụ kiện điện tử', null, '', null, '5', '1', '0', '2015-08-01 09:57:35', '2015-08-01 09:57:35');

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
