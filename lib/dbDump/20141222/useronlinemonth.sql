/*
Navicat MySQL Data Transfer

Source Server         : locale
Source Server Version : 50536
Source Host           : 127.0.0.1:3306
Source Database       : sister_siadu

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2014-12-22 13:42:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for useronlinemonth
-- ----------------------------
DROP TABLE IF EXISTS `useronlinemonth`;
CREATE TABLE `useronlinemonth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipproxy` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `ipanda` varchar(100) DEFAULT NULL,
  `proxyserver` varchar(100) DEFAULT NULL,
  `timevisit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ipanda` (`ipanda`),
  KEY `timevisit` (`timevisit`),
  KEY `ipproxy` (`ipproxy`)
) ENGINE=MyISAM AUTO_INCREMENT=3874 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of useronlinemonth
-- ----------------------------
INSERT INTO `useronlinemonth` VALUES ('3873', '::1', 'WEB-SERVER', '::1', '', '1414070042');
