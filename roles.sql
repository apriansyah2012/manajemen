/*
 Navicat Premium Data Transfer

 Source Server         : SERVER_ONLINE
 Source Server Type    : MySQL
 Source Server Version : 100146
 Source Host           : rskaryahusada.net:3306
 Source Schema         : rskh_simrs2020

 Target Server Type    : MySQL
 Target Server Version : 100146
 File Encoding         : 65001

 Date: 05/08/2021 23:44:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `username` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cap` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `module` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
