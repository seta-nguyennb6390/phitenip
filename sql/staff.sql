/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-01-14 14:36:59
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `del_flg` smallint(6) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`group_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', '1', 'admin', '', '$2y$13$yFvGF8rF8n2wu2KX/65DkOcXwh8LsoNvLcbPxlOQJeba27TMQD8kW', null, '123', '0', 'xx', 'yy', '1', '1');
