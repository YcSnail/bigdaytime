/*
 Navicat Premium Data Transfer

 Source Server         : 新站
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : 47.97.111.165:3306
 Source Schema         : www.yuanxu.top

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : 65001

 Date: 06/11/2018 18:31:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for yc_time
-- ----------------------------
DROP TABLE IF EXISTS `yc_time`;
CREATE TABLE `yc_time`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `create_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
