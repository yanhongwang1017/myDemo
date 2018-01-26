/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : db

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-07-10 14:06:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ajax_data`
-- ----------------------------
DROP TABLE IF EXISTS `ajax_data`;
CREATE TABLE `ajax_data` (
  `c_a` varchar(255) DEFAULT NULL,
  `c_b` varchar(255) DEFAULT NULL,
  `c_c` varchar(255) DEFAULT NULL,
  `c_d` varchar(255) DEFAULT NULL,
  `c_e` varchar(255) DEFAULT NULL,
  `c_g` varchar(255) DEFAULT NULL,
  `c_h` varchar(255) DEFAULT NULL,
  `c_f` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ajax_data
-- ----------------------------
INSERT INTO `ajax_data` VALUES ('君', '不', '见', '，', '黄', '河', '之', '水', '1');
INSERT INTO `ajax_data` VALUES ('天', '上', '来', '，', '奔', '流', '到', '海', '2');
INSERT INTO `ajax_data` VALUES ('不', '复', '还', '。', '君', '不', '见', '，', '3');
INSERT INTO `ajax_data` VALUES ('高', '堂', '明', '镜', '悲', '白', '发', '。', '4');
INSERT INTO `ajax_data` VALUES ('如', '青', '丝', '暮', '成', '雪', '。', '人', '5');
