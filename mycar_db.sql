/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : mycar_db

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 27/09/2022 14:18:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_cars
-- ----------------------------
DROP TABLE IF EXISTS `tb_cars`;
CREATE TABLE `tb_cars`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `vat` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_cars
-- ----------------------------
INSERT INTO `tb_cars` VALUES (1, 'Toyota', 'vigo', 1000000.00, NULL);
INSERT INTO `tb_cars` VALUES (2, 'Honda', 'Civic', 8000000.00, NULL);
INSERT INTO `tb_cars` VALUES (3, 'Mg', 'ZS', 9000000.00, NULL);
INSERT INTO `tb_cars` VALUES (4, 'Toyotasgsg', 'AA', 999.00, 69.93);
INSERT INTO `tb_cars` VALUES (5, 'Toyota3', 'VIGOss', 111.00, 7.77);
INSERT INTO `tb_cars` VALUES (6, 'ssss', 'ss', 10000.00, 700.00);

-- ----------------------------
-- Table structure for tb_customer
-- ----------------------------
DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_customer
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
