/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : bbb_nom035

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 27/05/2021 11:57:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_images
-- ----------------------------
DROP TABLE IF EXISTS `tbl_images`;
CREATE TABLE `tbl_images`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fcreate` datetime(6) NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_images
-- ----------------------------
INSERT INTO `tbl_images` VALUES (1, 'testimonial-3.jpg', 'Laura Medrano Vázquez  Lopez', '2021-05-26 12:46:26.253745');
INSERT INTO `tbl_images` VALUES (2, 'team-1.jpg', 'Juan Rodriguez Sánchez', '2021-05-26 12:47:02.897348');
INSERT INTO `tbl_images` VALUES (3, 'testimonial-2.jpg', 'Isabela Montes Juárez', '2021-05-26 12:47:31.038641');
INSERT INTO `tbl_images` VALUES (4, 'testimonial-1.jpg', 'Samuel Lopez Quintillo', '2021-05-26 12:47:47.438992');
INSERT INTO `tbl_images` VALUES (5, 'homero.jpg', 'Homero Francisco Resendiz Garcia', '2021-05-26 12:48:17.255760');
INSERT INTO `tbl_images` VALUES (6, 'team-3.jpg', 'Alberto Garcia Gómez', '2021-05-26 12:49:08.403139');

-- ----------------------------
-- Table structure for tbl_roles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE `tbl_roles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_roles
-- ----------------------------
INSERT INTO `tbl_roles` VALUES (8, 'admin');
INSERT INTO `tbl_roles` VALUES (9, 'user');

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `role_id` int UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  INDEX `fk_roles`(`role_id`) USING BTREE,
  CONSTRAINT `fk_roles` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'emir', 'Emir Hernandez', '$2y$10$p5LeJerLXcSx/5CeBPWupOeDFM5yPHzZjjSxqqDLY7EpKY5PZGUaO', 8, '2021-05-05 13:55:07');
INSERT INTO `tbl_users` VALUES (2, 'homero', 'Homero Resendiz', '$2y$10$5GeNFxsVEIGokGQnasu2X.cgH0FNuoWebAdbe1tw0UHznViV.QUGa', 8, '2021-05-05 13:55:23');
INSERT INTO `tbl_users` VALUES (3, 'david', 'David Reyes', '$2y$10$5GeNFxsVEIGokGQnasu2X.cgH0FNuoWebAdbe1tw0UHznViV.QUGa', 8, '2021-05-05 14:02:37');
INSERT INTO `tbl_users` VALUES (4, 'cesar', 'Cesar', '$2y$10$5GeNFxsVEIGokGQnasu2X.cgH0FNuoWebAdbe1tw0UHznViV.QUGa', 8, '2021-05-25 09:17:00');

SET FOREIGN_KEY_CHECKS = 1;
