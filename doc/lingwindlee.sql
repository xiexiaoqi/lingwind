/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : lingwindlee

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-09-04 00:09:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for family
-- ----------------------------
DROP TABLE IF EXISTS `family`;
CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '名字',
  `alias` varchar(255) DEFAULT '' COMMENT '别名',
  `type` enum('member','admin') DEFAULT 'member' COMMENT '成员类型',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='家庭成员表';

-- ----------------------------
-- Records of family
-- ----------------------------
INSERT INTO `family` VALUES ('1', '谢小琪', '爸爸', 'admin');
INSERT INTO `family` VALUES ('2', '李玲风', '妈妈', 'member');

-- ----------------------------
-- Table structure for weight
-- ----------------------------
DROP TABLE IF EXISTS `weight`;
CREATE TABLE `weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '家庭成员id',
  `weight` float(5,2) NOT NULL COMMENT '重量',
  `pic` varchar(150) DEFAULT '' COMMENT '图片',
  `date` varchar(45) NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='记录体重表';

-- ----------------------------
-- Records of weight
-- ----------------------------
INSERT INTO `weight` VALUES ('1', '1', '62.00', '', '1440855089');
INSERT INTO `weight` VALUES ('2', '1', '62.00', '', '1440864000');
INSERT INTO `weight` VALUES ('3', '1', '63.00', '', '1440950400');
INSERT INTO `weight` VALUES ('4', '1', '62.70', '', '1441036800');
INSERT INTO `weight` VALUES ('5', '1', '62.70', '', '1441123200');
INSERT INTO `weight` VALUES ('6', '1', '30.00', '', '1441209600');
INSERT INTO `weight` VALUES ('7', '1', '62.10', '', '1213372800');
INSERT INTO `weight` VALUES ('11', '1', '65.00', '', '1441296000');
