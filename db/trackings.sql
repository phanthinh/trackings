/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : trackings

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-11-13 17:39:42
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `name` varchar(200) DEFAULT NULL,
  `image_id` binary(16) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `created` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  CONSTRAINT `image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (0x52834F84911C48A198831BBF78787878, 'Jquery', 0x52834F81D9784878BC6360B478787878, 'jquery', '1384337269');
INSERT INTO `categories` VALUES (0x52834FBFC4FC407F9BE7165278787878, 'PHP', 0x52834FBD511448F5B03A6E0978787878, 'php', '1384337330');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `name` varchar(200) NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (0x502A71209B244A32966E147C78787878, 'Admin', '0');
INSERT INTO `groups` VALUES (0x502BCC25D378467487CC15C878787878, 'User', '1');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `name` varchar(200) DEFAULT NULL,
  `created` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (0x52834F140C744F47B33F6B7878787878, '35007ce0bdad045506f5839df46dab50.png', '1384337172', '0');
INSERT INTO `images` VALUES (0x52834F81D9784878BC6360B478787878, 'cdf749a44636a17cefebc36f4c8192e3.png', '1384337281', '0');
INSERT INTO `images` VALUES (0x52834FBD511448F5B03A6E0978787878, 'ac5af9f0ab85a393b01d189e8ab3a278.png', '1384337341', '0');

-- ----------------------------
-- Table structure for `map_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `map_permissions`;
CREATE TABLE `map_permissions` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `group_id` binary(16) DEFAULT NULL,
  `permission_id` binary(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_permissions
-- ----------------------------
INSERT INTO `map_permissions` VALUES (0x503187CB5B704FB385AE11C878787878, 0x502A71837D044E23A778147C78787878, 0x00000000000000000000000000000000);
INSERT INTO `map_permissions` VALUES (0x5032669ED92C49BFAB2E020878787878, 0x502BCC25D378467487CC15C878787878, 0x00000000000000000000000000000000);
INSERT INTO `map_permissions` VALUES (0x5033835B572449398A4010C078787878, 0x502A71209B244A32966E147C78787878, 0x00000000000000000000000000000000);

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `name` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (0x5030664D387C4CCCB695125078787878, 'Create', 'create');
INSERT INTO `permissions` VALUES (0x5030666BA394466BA29B125078787878, 'Update', 'update');
INSERT INTO `permissions` VALUES (0x503067B9B8F44FA78E4D125078787878, 'Remove', 'remove');
INSERT INTO `permissions` VALUES (0x50306834CE0C46D18A1B125078787878, 'View', 'view');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `module` varchar(200) DEFAULT NULL,
  `controller` varchar(200) DEFAULT NULL,
  `view` varchar(200) DEFAULT NULL,
  `group_id` binary(16) DEFAULT NULL,
  `map_per` binary(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (0x50318763BDA84BD18BC011C878787878, null, 'Site', 'Error', 0x502A71837D044E23A778147C78787878, 0x503187638078446C8ECF11C878787878);
INSERT INTO `roles` VALUES (0x50318763C0F44CE599F611C878787878, null, 'Site', 'Index', 0x502A71837D044E23A778147C78787878, 0x503187638078446C8ECF11C878787878);
INSERT INTO `roles` VALUES (0x503187CB72084B58A78B11C878787878, null, 'Site', 'Contact', 0x502A71837D044E23A778147C78787878, 0x503187CB5B704FB385AE11C878787878);
INSERT INTO `roles` VALUES (0x503187CB82C046638D2411C878787878, null, 'Site', 'Index', 0x502A71837D044E23A778147C78787878, 0x503187CB5B704FB385AE11C878787878);
INSERT INTO `roles` VALUES (0x5032669E8AD442A4BAE1020878787878, null, 'Site', 'Index', 0x502BCC25D378467487CC15C878787878, 0x5032669ED92C49BFAB2E020878787878);
INSERT INTO `roles` VALUES (0x5033835B9BAC439BBEAC10C078787878, null, 'Site', 'Index', 0x502A71209B244A32966E147C78787878, 0x5033835B572449398A4010C078787878);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `actived` tinyint(4) DEFAULT '0',
  `birth` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `lastvisit` int(11) DEFAULT NULL,
  `password` text NOT NULL,
  `is_closed` tinyint(4) DEFAULT '0',
  `identity_card` int(10) DEFAULT NULL,
  `group_id` binary(16) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT '0',
  `username` varchar(200) DEFAULT NULL,
  `superuser` int(11) DEFAULT '0',
  `public_id` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0x502D14A7266445749E7811B078787878, 'Administrator', '', '0', '1989-09-08', '2012-10-02 15:24:29', 'sadmin@tickgoals.com', '1357032845', 'b0731a6e5c87a7edaa610b02c5186a54957e9195', '0', '201576599', 0x502A71209B244A32966E147C78787878, '934477703', null, 'admin', '1', '13496698352588.jpg');
INSERT INTO `users` VALUES (0x502D257398104517A7F011B078787878, 'Phan', 'Quốc Thịnh', '0', '2012-08-14', '2012-08-30 17:24:05', 'thinhpq@appdev.vn', '1357569585', '9f849b5d8b757f9c87a725e1ecdfc6dc1e935d2d', '0', null, 0x502BCC25D378467487CC15C878787878, null, null, null, '0', '13496115462044.jpg');
INSERT INTO `users` VALUES (0x50E2DBED6DF847BAB44D764978787878, 'Trương', 'Phì', '0', null, '2013-01-01 13:51:57', 'funnylove_ofme@yahoo.com', '1357455776', '38cbbca80693909a0c465321469034c896af83fe', '0', null, 0x502BCC25D378467487CC15C878787878, null, '0', null, '0', null);
INSERT INTO `users` VALUES (0x50E2DCA443304CB28770059778787878, 'Nguyễn Như Bảo ', 'Ngọc Lợi', '0', '2013-01-01', '2013-01-01 13:55:00', 'baonn@webdev.vn', null, 'b0731a6e5c87a7edaa610b02c5186a54957e9195', '0', null, 0x502BCC25D378467487CC15C878787878, null, '0', null, '0', null);
INSERT INTO `users` VALUES (0x50E715DB067C4949B12E590278787878, 'linh', 'test', '0', '2013-01-04', '2013-01-04 18:48:11', 'linhdv@appdev.vn', '1357323677', '0d282cda4da6a379928eb2c520bd669906135a3f', '0', null, 0x502BCC25D378467487CC15C878787878, null, '0', null, '0', null);
INSERT INTO `users` VALUES (0x50EAC8FA150441F89CF2246378787878, 'thinhpq', 'Twitter', '0', null, '2013-01-07 14:09:14', 'thinhpq1@twitter.com', '1357572478', 'eed744901e41f9313d6201578802326f2a1af58c', '0', null, 0x502BCC25D378467487CC15C878787878, null, '0', null, '0', null);
