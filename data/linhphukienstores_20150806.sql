-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 05 Août 2015 à 19:03
-- Version du serveur :  5.6.21
-- Version de PHP :  5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `linhphukienstores`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created`, `updated`) VALUES
(0, 'phanthanhhai07t1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `block_categories`
--

CREATE TABLE IF NOT EXISTS `block_categories` (
`id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `block_categories`
--

INSERT INTO `block_categories` (`id`, `code`, `name`, `parent`, `description`, `position`, `publish`, `status`, `created`, `updated`) VALUES
(1, 'support-online', 'support online', NULL, NULL, NULL, 1, 0, '2015-08-02 14:49:58', '2015-08-02 14:50:01'),
(2, 'adv-top', 'adv top', NULL, 'block quảng cáo top page', NULL, NULL, 0, '2015-08-02 14:51:55', '2015-08-02 14:51:59'),
(3, 'adv-top-left', 'adv top left', NULL, 'block quảng cáo phía trên bên trái', NULL, 0, 0, '2015-08-02 14:52:01', '2015-08-02 10:29:01'),
(4, 'adv-bottom-left', 'adv bottom left', NULL, 'block quảng cáo ', NULL, NULL, 0, NULL, NULL),
(5, NULL, 'aaaaaa', NULL, 'ssssssss', 1, 1, 1, '2015-08-02 10:18:38', '2015-08-02 10:18:38'),
(6, 'aaaaaaaaa', 'aaaaaaaaa', 3, 'aaaaaaa', 22, 1, 1, '2015-08-02 10:20:59', '2015-08-05 18:11:05'),
(7, 'test-12323', 'test 12323', NULL, '', 2, 1, 1, '2015-08-02 10:21:35', '2015-08-02 10:27:54');

-- --------------------------------------------------------

--
-- Structure de la table `block_contents`
--

CREATE TABLE IF NOT EXISTS `block_contents` (
`id` int(11) NOT NULL,
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
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `block_contents`
--

INSERT INTO `block_contents` (`id`, `code`, `name`, `type`, `description`, `content`, `block_category_id`, `image`, `file`, `position`, `publish`, `status`, `created`, `updated`) VALUES
(1, 'yahoo', 'yahoo', 1, 'aaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n', 1, NULL, NULL, 1, 1, 0, '2015-08-02 11:27:34', '2015-08-02 11:38:48'),
(2, 'test', 'test', 1, '', '<p>aaaaaaaaaaaaaaaa</p>\r\n', 2, NULL, NULL, 1, 1, 1, '2015-08-02 11:39:03', '2015-08-02 11:39:03'),
(3, 'aaaaaaaaa', 'aaaaaaaaa', 1, 'aaaaaaaaaaaaaa', '<p>sssssssssssssssssssssssssssss</p>\r\n', 3, NULL, NULL, 22, 1, 1, '2015-08-02 11:39:28', '2015-08-02 11:40:06'),
(4, 'yahoo-support', 'yahoo-support', 1, '', '&lt;a href=&quot;ymsgr:sendim?dung_nguyen11001&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=dung_nguyen11001&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Kinh doanh 1&lt;/a&gt;&lt;a href=&quot;ymsgr:sendim?d_khanh2004&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=d_khanh2004&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Kinh doanh 2&lt;/a&gt;&lt;a href=&quot;ymsgr:sendim?nhattin_lethanhnghi18&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=nhattin_lethanhnghi18&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Kiểm tra vận đơn&lt;/a&gt;&lt;a href=&quot;ymsgr:sendim?nhattinlethanhnghi&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=nhattinlethanhnghi&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Kế To&aacute;n 1&lt;/a&gt;&lt;a href=&quot;ymsgr:sendim?nvthinh88&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=nvthinh88&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Hỗ trợ kỹ thuật 1&lt;/a&gt;&lt;a href=&quot;ymsgr:sendim?nvthinh88&amp;amp;m=http://nhattin.vn+ gi&uacute;p m&igrave;nh?&quot; style=&quot;background:url(http://opi.yahoo.com/online?u=nvthinh88&amp;amp;m=g&amp;amp;t=1) no-repeat center top;&quot; rel=&quot;nofollow&quot;&gt;Hỗ trợ kỹ thuật 2&lt;/a&gt;', 1, NULL, NULL, 1, 1, 0, '2015-08-05 18:13:31', '2015-08-05 18:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `content` text,
  `type` int(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `publish` tinyint(2) DEFAULT NULL,
  `news_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `code`, `title`, `description`, `content`, `type`, `status`, `publish`, `news_category_id`, `created`, `updated`) VALUES
(1, NULL, 'test abc', 'test', '<p>test abc</p>\r\n', NULL, NULL, 1, NULL, '2015-08-02 13:02:28', '2015-08-02 13:02:28'),
(2, 'sssss', 'sssss', 'sssssssssssssssss', '<p>dddddddd</p>\r\n', NULL, 1, 0, 3, '2015-08-02 13:03:06', '2015-08-02 13:11:51'),
(3, 'testabcc', 'testabcc', 'test', '<p>testccccc</p>\r\n', NULL, 0, 1, 4, '2015-08-02 13:04:43', '2015-08-02 13:10:31'),
(4, 'aaa', 'aaa', '', '<p>sdddddddddddddd</p>\r\n', NULL, 1, 1, 4, '2015-08-02 13:09:52', '2015-08-02 13:10:28');

-- --------------------------------------------------------

--
-- Structure de la table `news_categories`
--

CREATE TABLE IF NOT EXISTS `news_categories` (
`id` int(11) NOT NULL,
  `code` varchar(1024) DEFAULT NULL,
  `name` varchar(1024) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `publish` tinyint(2) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news_categories`
--

INSERT INTO `news_categories` (`id`, `code`, `name`, `status`, `publish`, `created`, `updated`) VALUES
(1, 'testabc', 'testabc', 1, 1, '2015-08-02 12:35:09', '2015-08-02 12:43:36'),
(2, 'testabc1d-test', 'testabc1đ test', 1, 1, '2015-08-02 12:41:44', '2015-08-02 12:41:44'),
(3, 'thong-tin-cong-nghe', 'Thông tin công nghệ', 0, 1, '2015-08-02 12:43:50', '2015-08-02 12:43:56'),
(4, 'thong-tin-khuyen-mai', 'Thông tin khuyến mãi', 0, 1, '2015-08-02 12:44:05', '2015-08-02 12:44:05');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `page_lists`
--

CREATE TABLE IF NOT EXISTS `page_lists` (
`id` int(11) NOT NULL,
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
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `page_lists`
--

INSERT INTO `page_lists` (`id`, `parent`, `code`, `name`, `type`, `url`, `content`, `publish`, `position`, `status`, `created`, `updated`) VALUES
(1, NULL, 'trang-chu', 'Trang chủ', 1, '/', '<p>aaaaaaaaaaaaaaa</p>\r\n', 1, 1, 0, '2015-08-01 22:14:42', '2015-08-02 09:36:49'),
(2, 3, 'lien-he', 'Liên hệ', 1, '/lien-he', '<p><strong>C&Ocirc;NG TY TNHH THƯƠNG MẠI DỊCH VỤ TIN HỌC NHẤT T&Iacute;N</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;&nbsp;<strong>Địa chỉ: </strong>Số 18 L&ecirc; Thanh Nghị - Hai B&agrave; Trưng - H&agrave; Nội<br />\r\n<strong>&nbsp; &nbsp; &nbsp; Điện thoại:</strong> 04.3868 3905 - 04.66 58 68 58 - 0912 80 80 81<br />\r\n&nbsp; &nbsp; &nbsp;<strong>Fax:</strong> 04.38683905<br />\r\n&nbsp; &nbsp; &nbsp;<strong>Website:</strong> http://nhattin.vn</p>\r\n\r\n<p>&nbsp; <strong>&nbsp; Trụ sở ch&iacute;nh: Số 18 L&ecirc; Thanh Nghị, Hai B&agrave; Trưng, H&agrave; Nội</strong><br />\r\n&nbsp; &nbsp; Điện thoại: 0912 80 80 81<br />\r\n&nbsp; &nbsp; Người đại diện: (Mr) PHẠM DUY KHANH - Gi&aacute;m đốc</p>\r\n\r\n<p><iframe frameborder="0" scrolling="no" src="http://nhattin.vn/js/map.aspx" style="height:300px;width:100%;"></iframe></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch li&ecirc;n hệ với ch&uacute;ng t&ocirc;i bằng c&aacute;ch điền v&agrave;o mẫu Form dưới đ&acirc;y v&agrave; gửi cho ch&uacute;ng t&ocirc;i. Th&ocirc;ng tin của qu&yacute; kh&aacute;ch sẽ được xem x&eacute;t v&agrave; trả lời trong thời gian sớm nhất.<br />\r\nGhi ch&uacute;: Những &ocirc; c&oacute; dấu (*) l&agrave; những &ocirc; y&ecirc;u cầu nhập đầy đủ th&ocirc;ng tin</p>\r\n', 1, 2, 0, '2015-08-01 22:17:49', '2015-08-02 09:47:43'),
(3, NULL, 'gioi-thieu', 'Giới thiệu', 0, '/gioi-thieu', '<h2>&nbsp;Quảng Ninh vừa hứng chịu một trận mưa lịch sử k&eacute;o d&agrave;i suốt mấy ng&agrave;y, g&acirc;y lũ qu&eacute;t, sạt lở, ngập nặng, vỡ đập... cướp đi gần 20 sinh mạng v&agrave; cuốn phăng hơn 2.000 tỉ đồng. Kh&ocirc;ng chỉ Quảng Ninh, trong những ng&agrave;y qua to&agrave;n miền Bắc c&ugrave;ng &quot;lao đao&quot; v&igrave; mưa lũ.<br />\r\n<a href="http://dantri.com.vn/xa-hoi/quang-ninh-mat-trang-2-000-ti-dong-do-mua-lu-20150801081131538.htm" style="margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);" title="Quảng Ninh mất trắng 2.000 tỉ đồng do mưa lũ">&nbsp;&gt;&gt;&nbsp;Quảng Ninh mất trắng 2.000 tỉ đồng do mưa lũ</a><br />\r\n<a href="http://dantri.com.vn/xa-hoi/dau-xe-long-tien-dua-8-nguoi-trong-mot-gia-dinh-thiet-mang-do-mua-lu-20150730064406047.htm" style="margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);" title="Đau xé lòng tiễn đưa 8 người trong một gia đình thiệt mạng do mưa lũ">&nbsp;&gt;&gt;&nbsp;Đau x&eacute; l&ograve;ng tiễn đưa 8 người trong một gia đ&igrave;nh thiệt mạng do mưa lũ</a><br />\r\n<a href="http://dantri.com.vn/xa-hoi/dot-mua-lu-gay-thiet-hai-nang-ne-voi-ca-dat-lien-va-tren-bien-20150729110030273.htm" style="margin: 0px; padding: 0px; outline: 0px; text-decoration: none; color: rgb(0, 65, 117);" title="Đợt mưa lũ gây thiệt hại nặng nề với cả đất liền và trên biển">&nbsp;&gt;&gt;&nbsp;Đợt mưa lũ g&acirc;y thiệt hại nặng nề với cả đất liền v&agrave; tr&ecirc;n biển</a></h2>\r\n\r\n<div class="fon34 mt3 mr2 fon43 detail-content" id="divNewsContent" style="margin: 15px 10px 9.390625px 0px; padding: 0px; outline: 0px; font-stretch: normal; font-size: 12pt; font-family: ''Times New Roman''; color: rgb(0, 0, 0); line-height: 20px !important;">\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="4-b152e" class="VCSortableInPreviewMode" id="img_9709" src="http://dantri4.vcmedia.vn/k:thumb_w/640/701ef85ab3/2015/08/01/5-d4d6b/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="4-b152e" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Người d&acirc;n sống tr&ecirc;n đường Định C&ocirc;ng (Ho&agrave;ng Mai, H&agrave; Nội) &quot;be bờ, đắp đập&quot; ngăn nước tr&agrave;n v&agrave;o nh&agrave;. (Ảnh chụp chiều ng&agrave;y 1/8: Hữu Nghị).</p>\r\n</div>\r\n</div>\r\n\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="28-2-eba36" class="VCSortableInPreviewMode" id="img_9723" src="http://dantri4.vcmedia.vn/k:eba11ac2e5/2015/07/28/28-2-eba36/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="28-2-eba36" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Cơn mưa lịch sử lớn nhất trong v&ograve;ng 40 năm qua đ&atilde; nhấn ch&igrave;m Quảng Ninh trong biển nước. (Ảnh: Tuấn Hợp)</p>\r\n</div>\r\n</div>\r\n\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="Sạt lở kinh hoàng tại tổ 44, khu 4, phường Cao Thắng, TP Hạ Long khiến 3 ngôi nhà bị sập, 9 người bị vùi lấp, trong đó 8 người tử vong. (Ảnh: VietNamnet)." id="img_9771" src="http://dantri4.vcmedia.vn/k:2015/luqn1-1438445941418/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Sạt lở kinh ho&agrave;ng tại tổ 44, khu 4, phường Cao Thắng, TP Hạ Long khiến 3 ng&ocirc;i nh&agrave; bị sập, 9 người bị v&ugrave;i lấp, trong đ&oacute; 8 người tử vong. (Ảnh: VietNamnet).</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="Lũ đổ về xã Bản Sen, huyện Vân Đồn, tỉnh Quảng Ninh. (Ảnh: VietNamnet)" id="img_9770" src="http://dantri4.vcmedia.vn/k:thumb_w/640/2015/luqn-1438445802190/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Lũ đổ về x&atilde; Bản Sen, huyện V&acirc;n Đồn, tỉnh Quảng Ninh. (Ảnh: VietNamnet)</p>\r\n</div>\r\n</div>\r\n\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="Nhiều tuyến đường tỉnh lộ, liên xã tại huyện Mường Tè, tỉnh Lai Châu bị sạt lở nghiêm trọng, khiến giao thông gần như tê liệt. (Ảnh: VOV)" id="img_9726" src="http://dantri4.vcmedia.vn/k:2015/laichau-1438444874897/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Nhiều tuyến đường tỉnh lộ, li&ecirc;n x&atilde; tại huyện Mường T&egrave;, tỉnh Lai Ch&acirc;u bị sạt lở nghi&ecirc;m trọng, khiến giao th&ocirc;ng gần như t&ecirc; liệt. (Ảnh: VOV)</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<div class="VCSortableInPreviewMode" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; display: inline-block; width: 460px; text-align: center; box-sizing: border-box;">\r\n<div style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; float: none; width: auto;"><img alt="Một đàn 19 con trâu bị sét đánh chết hết trong mưa giông ở Hà Giang. (Ảnh: TTXVN)" id="img_9780" src="http://dantri4.vcmedia.vn/k:2015/trau1w-1438409481493/ca-mien-bac-lao-dao-vi-mua-lu.jpg" style="border:0px; display:block; margin:0px auto; max-width:100%; outline:0px; padding:0px" title="" /></div>\r\n\r\n<div class="PhotoCMS_Caption" style="margin: 0px; padding: 0px; outline: 0px; max-width: 100%; font-size: 14px; font-style: italic; float: none; width: auto;">\r\n<p>Một đ&agrave;n 19 con tr&acirc;u bị s&eacute;t đ&aacute;nh chết hết trong mưa gi&ocirc;ng ở H&agrave; Giang. (Ảnh: TTXVN)</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 1, 3, 0, '2015-08-01 22:19:55', '2015-08-02 06:07:21'),
(4, NULL, NULL, '', 0, NULL, '', 1, NULL, NULL, '2015-08-02 05:18:28', '2015-08-02 05:18:28'),
(5, NULL, NULL, '', 0, NULL, '', 1, NULL, NULL, '2015-08-02 05:18:34', '2015-08-02 05:18:34'),
(6, NULL, NULL, '', 0, NULL, '', 1, NULL, NULL, '2015-08-02 05:19:23', '2015-08-02 05:19:23'),
(7, NULL, NULL, '', 0, NULL, '', 1, NULL, NULL, '2015-08-02 05:19:35', '2015-08-02 05:19:35'),
(8, NULL, NULL, 'aaaaaaaaa', 0, NULL, '', 1, 1, NULL, '2015-08-02 05:23:50', '2015-08-02 05:23:50'),
(9, 3, NULL, 'test', 0, '', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n', 1, 1, 1, '2015-08-02 05:34:22', '2015-08-02 05:50:37'),
(10, 1, NULL, 'test', 0, 'test', '<p>testaaaa</p>\r\n', 1, 1, 1, '2015-08-02 09:39:00', '2015-08-02 09:39:00');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
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
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `code`, `product_category_id`, `name`, `parent`, `subject`, `detail_short`, `detail`, `image`, `image_large`, `price`, `lang_id`, `status`, `sort`, `created`, `updated`) VALUES
(2, 'dau-cap-chuyen-doi-v', 4, 'Đầu cáp chuyển đổi VGA + Audio sang HDMI CB01, hỗ trợ full HD1080p + có hình ảnh và âm thanh', NULL, NULL, 'Số lượng đã bán: 10\r\nXuất xứ/nguồn hàng: Chính hãng\r\nBảo hành: 12 tháng (1 đổi 1)\r\nTình trạng: Còn hàng', '<h2><span style="font-family:inherit">Đầu c&aacute;p chuyển đổi VGA + Audio sang HDMI&nbsp;CB01 hỗ trợ full HD1080p + c&oacute; h&igrave;nh ảnh v&agrave; &acirc;m thanh&nbsp;</span></h2>\r\n\r\n<div class="title_detail" style="box-sizing: border-box; border: 0px; font-family: Tahoma, Geneva, sans-serif; margin: 0px; outline: 0px; padding: 0px; overflow: hidden; color: rgb(68, 68, 68); line-height: 22.1000003814697px;">\r\n<p style="text-align:justify">Th&ocirc;ng tin Đầu c&aacute;p chuyển đổi VGA + Audio sang HDMI CB01<br />\r\n- Chuyển đổi t&iacute;n hiệu chuẩn VGA sang t&iacute;n hiệu chuẩn HDMI<br />\r\n- Đầu v&agrave;o: 1 Cổng VGA + Audio 3.5mm + C&aacute;p Micro USB cấp nguồn<br />\r\n- Đầu ra: 1 cổng HDMI chuẩn 1.4. Hỗ trợ độ ph&acirc;n giải full HD 1080p, 720p...<br />\r\n- Chuyển h&igrave;nh ảnh từ m&aacute;y t&iacute;nh b&agrave;n, laptop ra m&aacute;y chiếu, Tivi, m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh...<br />\r\n- Chất lượng h&igrave;nh ảnh sắc n&eacute;t, cắm l&agrave; chạy ngay kh&ocirc;ng cần c&agrave;i đặt tr&igrave;nh điều khiển<br />\r\n- T&iacute;n hiệu đầu ra cổng HDMI bao gồm h&igrave;nh ảnh v&agrave; &acirc;m thanh</p>\r\n</div>\r\n\r\n<h2>Lưu &yacute;: kh&ocirc;ng chuyển được ngược lại</h2>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">- C&aacute;p d&agrave;i&nbsp;20cm</span></span></p>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">- Hệ điều h&agrave;nh: Windows XP, Vista, 7 (32bit, 64 bit), 8, 8.1 (32bit, 64bit)</span></span></p>\r\n\r\n<h3><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">H&igrave;nh ảnh c&aacute;p chuyển đổi&nbsp;<a href="" style="box-sizing: border-box; color: rgb(68, 68, 68); text-decoration: none; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; background-color: transparent;">VGA sang HDMI</a>&nbsp;</span>&nbsp;</span>CB01</h3>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-1.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" /></span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-2.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" />&nbsp;</span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="Đầu cáp chuyển đổi VGA + Audio sang HDMI CB01, hỗ trợ full HD1080p + có hình ảnh và âm thanh" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-2.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" />&nbsp;</span></span></p>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><span style="background-color:rgb(255, 255, 153); font-family:inherit"><strong>Địa chỉ: 18 L&ecirc; Thanh Nghị - Hai B&agrave; Trưng - H&agrave; Nội&nbsp;</strong>&nbsp;</span><br />\r\nĐiện thoại: 04.3868 3905 - 04.66 58 68 58 &nbsp;Hỗ trợ kỹ thuật:&nbsp;0164 2287922<br />\r\nWebsite:&nbsp;&nbsp;</span></span><a href="" style="box-sizing: border-box; color: rgb(68, 68, 68); text-decoration: none; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; background-color: transparent;"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">http://nhattin.vn</span>&nbsp;</span></a><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">&nbsp;&nbsp; Email:&nbsp;maytinhnhattin@gmail.com<br />\r\nThời gian l&agrave;m việc: Từ 8h - 18h30 - Cả tuần trừ lễ Tết</span></span></p>\r\n', '/img/product/dau-cap-chuyen-doi-vga-audio-sang-hdmi-cb01-ho-tro-full-hd1080p-co-hinh-anh-va-am-thanh-2335.jpg', '', 500000, NULL, 0, 1, '2015-08-05 18:00:56', '2015-08-05 18:00:56'),
(3, 'dau-cap-chuyen-doi-v', 4, 'Đầu cáp chuyển đổi VGA + Audio sang HDMI CB01, hỗ trợ full HD1080p + có hình ảnh và âm thanh', NULL, NULL, 'Số lượng đã bán: 10\r\nXuất xứ/nguồn hàng: Chính hãng\r\nBảo hành: 12 tháng (1 đổi 1)\r\nTình trạng: Còn hàng', '<h2><span style="font-family:inherit">Đầu c&aacute;p chuyển đổi VGA + Audio sang HDMI&nbsp;CB01 hỗ trợ full HD1080p + c&oacute; h&igrave;nh ảnh v&agrave; &acirc;m thanh&nbsp;</span></h2>\r\n\r\n<div class="title_detail" style="box-sizing: border-box; border: 0px; font-family: Tahoma, Geneva, sans-serif; margin: 0px; outline: 0px; padding: 0px; overflow: hidden; color: rgb(68, 68, 68); line-height: 22.1000003814697px;">\r\n<p style="text-align:justify">Th&ocirc;ng tin Đầu c&aacute;p chuyển đổi VGA + Audio sang HDMI CB01<br />\r\n- Chuyển đổi t&iacute;n hiệu chuẩn VGA sang t&iacute;n hiệu chuẩn HDMI<br />\r\n- Đầu v&agrave;o: 1 Cổng VGA + Audio 3.5mm + C&aacute;p Micro USB cấp nguồn<br />\r\n- Đầu ra: 1 cổng HDMI chuẩn 1.4. Hỗ trợ độ ph&acirc;n giải full HD 1080p, 720p...<br />\r\n- Chuyển h&igrave;nh ảnh từ m&aacute;y t&iacute;nh b&agrave;n, laptop ra m&aacute;y chiếu, Tivi, m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh...<br />\r\n- Chất lượng h&igrave;nh ảnh sắc n&eacute;t, cắm l&agrave; chạy ngay kh&ocirc;ng cần c&agrave;i đặt tr&igrave;nh điều khiển<br />\r\n- T&iacute;n hiệu đầu ra cổng HDMI bao gồm h&igrave;nh ảnh v&agrave; &acirc;m thanh</p>\r\n</div>\r\n\r\n<h2>Lưu &yacute;: kh&ocirc;ng chuyển được ngược lại</h2>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">- C&aacute;p d&agrave;i&nbsp;20cm</span></span></p>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">- Hệ điều h&agrave;nh: Windows XP, Vista, 7 (32bit, 64 bit), 8, 8.1 (32bit, 64bit)</span></span></p>\r\n\r\n<h3><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">H&igrave;nh ảnh c&aacute;p chuyển đổi&nbsp;<a href="" style="box-sizing: border-box; color: rgb(68, 68, 68); text-decoration: none; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; background-color: transparent;">VGA sang HDMI</a>&nbsp;</span>&nbsp;</span>CB01</h3>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-1.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" /></span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-2.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" />&nbsp;</span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><img alt="Đầu cáp chuyển đổi VGA + Audio sang HDMI CB01, hỗ trợ full HD1080p + có hình ảnh và âm thanh" class="image_detail imagesizeauto" src="file:///D:/www/template/linhphukien/html_v3/images/chitietsanpham/vga-audio-sang-hdmi-cb01-2.jpg" style="border:0px; box-sizing:border-box; max-width:450px; vertical-align:middle; width:450px" />&nbsp;</span></span></p>\r\n\r\n<p><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman"><span style="background-color:rgb(255, 255, 153); font-family:inherit"><strong>Địa chỉ: 18 L&ecirc; Thanh Nghị - Hai B&agrave; Trưng - H&agrave; Nội&nbsp;</strong>&nbsp;</span><br />\r\nĐiện thoại: 04.3868 3905 - 04.66 58 68 58 &nbsp;Hỗ trợ kỹ thuật:&nbsp;0164 2287922<br />\r\nWebsite:&nbsp;&nbsp;</span></span><a href="" style="box-sizing: border-box; color: rgb(68, 68, 68); text-decoration: none; border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; background-color: transparent;"><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">http://nhattin.vn</span>&nbsp;</span></a><span style="font-family:inherit; font-size:16px"><span style="font-family:times new roman">&nbsp;&nbsp; Email:&nbsp;maytinhnhattin@gmail.com<br />\r\nThời gian l&agrave;m việc: Từ 8h - 18h30 - Cả tuần trừ lễ Tết</span></span></p>\r\n', '/img/product/dau-cap-chuyen-doi-vga-audio-sang-hdmi-cb01-ho-tro-full-hd1080p-co-hinh-anh-va-am-thanh-2335.jpg', '', 500000, NULL, 0, 1, '2015-08-05 18:01:32', '2015-08-05 18:01:32'),
(4, 'hop-dung-o-cung-di-d', 4, 'Hộp đựng ổ cứng di động USB 2.0 Orico 2588 series Chính ', NULL, NULL, '', 'test', '/img/product/hop-dung-o-cung-di-dong-usb-2-0-orico-2588us-bk-chinh-hang-2858.jpg', '', 220000, NULL, 0, 2, '2015-08-05 18:02:54', '2015-08-05 18:02:54'),
(5, 'thiet-bi-thu-phat-hd', 4, 'Thiết bị thu phát hdmi không dây khoảng cách 10m đến ', NULL, NULL, '', 'test', '/img/product/302.jpg', '', 6800000, NULL, 0, NULL, '2015-08-05 18:03:37', '2015-08-05 18:03:37'),
(6, 'cap-chuyen-doi-usb-3', 4, 'Cáp chuyển đổi USB 3.0 Gigabit + 1 đầu USB chuẩn C ', NULL, NULL, '', '', '/img/product/cap-chuyen-doi-usb-3-0-gigabit-1-dau-usb-chuan-c-chinh-hang-unitek-y-3464a-2849.jpg', '', 650000, NULL, 0, 4, '2015-08-05 18:04:26', '2015-08-05 18:04:26'),
(7, 'kinh-3d-thuc-te-ao-v', 4, 'Kính 3D thực tế ảo VR BOX', NULL, NULL, '', '', '/img/product/kinh-3d-thuc-te-ao-vr-box-2832.jpg', '', 850000, NULL, 0, 5, '2015-08-05 18:05:07', '2015-08-05 18:05:07'),
(8, 'cap-chia-2-cong-audi', 4, 'Cáp chia 2 cổng Audio 3,5mm dài 20cm chính hãng Ugreen ', NULL, NULL, '', '', '/img/product/cap-chia-2-cong-audio-3-5mm-dai-20cm-ugreen-ug-10532-2831.jpg', '', 120000, NULL, 0, 5, '2015-08-05 18:05:37', '2015-08-05 18:05:37'),
(9, 'bo-chia-cong-usb-3-c', 4, 'Bộ chia cổng USB 3 cổng 3.0 tích hợp Lan Gigabit chính ', NULL, NULL, '', '', '/img/product/bo-chia-cong-usb-3-0-co-3-cong-mic-audio-ho-tro-macbook-hang-chinh-hang-hagibis-2829.jpg', '', 72000, NULL, 0, 5, '2015-08-05 18:06:23', '2015-08-05 18:06:23'),
(10, 'bo-chia-cong-usb-30-', 4, 'Bộ chia cổng USB 3.0 có 3 cổng + Mic + Audio Hỗ trợ ', NULL, NULL, '', '', '/img/product/bo-chia-cong-usb-3-cong-3-0-tich-hop-lan-gigabit-chinh-hang-hagibis-2830.jpg', '', 670000, NULL, 0, NULL, '2015-08-05 18:06:55', '2015-08-05 18:06:55'),
(11, 'bo-chia-cong-usb-30-', 4, 'Bộ chia cổng USB 3.0 có 3 cổng + Mic + Audio Hỗ trợ 2', NULL, NULL, '', '', '/img/product/bo-chia-cong-usb-3-0-co-3-cong-mic-audio-ho-tro-macbook-hang-chinh-hang-hagibis-2829.jpg', '', 670000, NULL, 0, NULL, '2015-08-05 18:07:40', '2015-08-05 18:07:40'),
(12, 'bo-chia-cong-usb-30-', 4, 'Bộ chia cổng USB 3.0 có 3 cổng + Mic + Au3io Hỗ trợ ', NULL, NULL, '', '', '/img/product/97.jpg', '', 67000, NULL, 0, NULL, '2015-08-05 18:08:25', '2015-08-05 18:08:25'),
(13, 'bo-chia-cong-usb-30-', 4, 'Bộ chia cổng USB 3.0 có 3 cổng + Mic + Audio Hỗ5', NULL, NULL, '', '', '/img/product/cap-chuyen-doi-usb-3-0-gigabit-1-dau-usb-chuan-c-chinh-hang-unitek-y-3464a-2849.jpg', '', 670000, NULL, 0, NULL, '2015-08-05 18:08:59', '2015-08-05 18:08:59');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
`id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT '',
  `lang_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '0' COMMENT 'vi tri sap xep',
  `publish` tinyint(2) DEFAULT NULL COMMENT '1: publish, 0: unpublish',
  `status` tinyint(2) DEFAULT '0' COMMENT '0:nomal,1:deleted',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product_categories`
--

INSERT INTO `product_categories` (`id`, `code`, `name`, `parent`, `description`, `lang_id`, `position`, `publish`, `status`, `created`, `updated`) VALUES
(1, 'dien-thoai-di-dong', 'Điện thoại di động', NULL, '', NULL, 1, 1, 0, '2015-08-01 05:03:01', '2015-08-01 13:22:21'),
(2, 'may-tinh-bang', 'Máy tính bảng', 1, '', NULL, 2, 0, 0, '2015-08-01 05:03:29', '2015-08-01 11:42:08'),
(3, 'linh-kien', 'Linh kiện', NULL, '', NULL, 3, 1, 0, '2015-08-01 05:03:40', '2015-08-01 17:31:17'),
(4, 'phu-kien', 'Phụ kiện', NULL, '', NULL, 4, 1, 0, '2015-08-01 05:03:57', '2015-08-01 13:45:25'),
(5, 'phu-kien-dien-tu', 'Phụ kiện điện tử', NULL, '', NULL, 5, 1, 0, '2015-08-01 09:57:35', '2015-08-01 09:57:35');

-- --------------------------------------------------------

--
-- Structure de la table `product_news`
--

CREATE TABLE IF NOT EXISTS `product_news` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT '1',
  `status` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product_news`
--

INSERT INTO `product_news` (`id`, `product_id`, `sort`, `publish`, `status`, `created`, `updated`) VALUES
(1, 2, 1, 1, 0, '2015-08-05 18:09:05', '2015-08-05 18:10:04'),
(2, 3, 1, 1, 0, '2015-08-05 18:09:09', '2015-08-05 18:10:06'),
(3, 4, 2, 1, 0, '2015-08-05 18:09:13', '2015-08-05 18:10:10'),
(4, 5, NULL, 1, 0, '2015-08-05 18:09:17', '2015-08-05 18:09:59'),
(5, 5, NULL, 1, 0, '2015-08-05 18:09:20', '2015-08-05 18:10:02'),
(6, 6, 4, 1, 0, '2015-08-05 18:09:24', '2015-08-05 18:10:13');

-- --------------------------------------------------------

--
-- Structure de la table `product_special`
--

CREATE TABLE IF NOT EXISTS `product_special` (
`id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `publish` tinyint(2) DEFAULT '1',
  `status` tinyint(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product_special`
--

INSERT INTO `product_special` (`id`, `product_id`, `sort`, `publish`, `status`, `created`, `updated`) VALUES
(1, 2, 1, 1, 0, '2015-08-05 18:09:07', '2015-08-05 18:10:27'),
(2, 3, 1, 1, 0, '2015-08-05 18:09:11', '2015-08-05 18:10:29'),
(3, 4, 2, 1, 0, '2015-08-05 18:09:15', '2015-08-05 18:10:31'),
(4, 4, 2, 1, 0, '2015-08-05 18:09:18', '2015-08-05 18:10:33'),
(5, 4, 2, 1, 0, '2015-08-05 18:09:22', '2015-08-05 18:10:35'),
(6, 6, 4, 1, 0, '2015-08-05 18:09:28', '2015-08-05 18:10:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
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
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `block_categories`
--
ALTER TABLE `block_categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `block_contents`
--
ALTER TABLE `block_contents`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news_categories`
--
ALTER TABLE `news_categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page_lists`
--
ALTER TABLE `page_lists`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_categories`
--
ALTER TABLE `product_categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_news`
--
ALTER TABLE `product_news`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_special`
--
ALTER TABLE `product_special`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `block_categories`
--
ALTER TABLE `block_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `block_contents`
--
ALTER TABLE `block_contents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `news_categories`
--
ALTER TABLE `news_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `page_lists`
--
ALTER TABLE `page_lists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `product_categories`
--
ALTER TABLE `product_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `product_news`
--
ALTER TABLE `product_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `product_special`
--
ALTER TABLE `product_special`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
