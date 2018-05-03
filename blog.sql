/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 03/05/2018 10:10:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for xk_admin
-- ----------------------------
DROP TABLE IF EXISTS `xk_admin`;
CREATE TABLE `xk_admin`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_admin
-- ----------------------------
INSERT INTO `xk_admin` VALUES (4, 'xiaoming', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `xk_admin` VALUES (5, 'xiaohong', '200820e3227815ed1756a6b531e7e0d2');
INSERT INTO `xk_admin` VALUES (6, 'xiaohong2', 'd3fefe762f0a3a397c504f968af3a2cc');
INSERT INTO `xk_admin` VALUES (7, 'xiaoming1', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for xk_article
-- ----------------------------
DROP TABLE IF EXISTS `xk_article`;
CREATE TABLE `xk_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` float(20, 0) NULL DEFAULT NULL,
  `update_time` float(20, 0) NULL DEFAULT NULL,
  `contents` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_article
-- ----------------------------
INSERT INTO `xk_article` VALUES (1, '小可老师111', '是时候学习PHP10了', '20180421\\ff5fe8f362a301f8dc09808f488adce2.jpg', 1524281600, 1524308096, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 hahah');
INSERT INTO `xk_article` VALUES (2, '小可老师', '是时候学习PHP7了', '20180421\\4d74d6afe92a8958906a84e9da79f28e.jpg', 1524281600, 1524304384, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (3, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (4, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (5, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (6, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (7, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (8, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (9, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (10, '小可老师', '是时候学习PHP7了', '20180421\\aab7024aade5b426d8173de3c0774c55.jpg', 1524281600, 1524281600, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');
INSERT INTO `xk_article` VALUES (11, '小可老师', '是时候学习PHP7了', '20180421\\799f2abb6e9912cd235441653af3052d.jpg', 1524304128, 1524304128, '标量类型声明 有两种模式: 强制 (默认) 和 严格模式。 现在可以使用下列类型参数（无论用强制模式还是严格模式）： 字符串(string), 整数 (int), 浮点数 (float), 以及布尔值 (bool)。它们扩充了PHP5中引入的其他类型：类名，接口，数组和 回调类型。 ');

-- ----------------------------
-- Table structure for xk_article_tags
-- ----------------------------
DROP TABLE IF EXISTS `xk_article_tags`;
CREATE TABLE `xk_article_tags`  (
  `article_id` int(11) NULL DEFAULT NULL,
  `tags_id` int(11) NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of xk_article_tags
-- ----------------------------
INSERT INTO `xk_article_tags` VALUES (4, 14);

-- ----------------------------
-- Table structure for xk_messages
-- ----------------------------
DROP TABLE IF EXISTS `xk_messages`;
CREATE TABLE `xk_messages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `msg` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(9) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xk_tags
-- ----------------------------
DROP TABLE IF EXISTS `xk_tags`;
CREATE TABLE `xk_tags`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xk_tags
-- ----------------------------
INSERT INTO `xk_tags` VALUES (1, 'HTML4');
INSERT INTO `xk_tags` VALUES (2, 'PHP');
INSERT INTO `xk_tags` VALUES (5, 'JavaScript');
INSERT INTO `xk_tags` VALUES (6, 'VUE');
INSERT INTO `xk_tags` VALUES (7, 'CSS3');
INSERT INTO `xk_tags` VALUES (8, 'Bootstrap');
INSERT INTO `xk_tags` VALUES (9, 'JSP');
INSERT INTO `xk_tags` VALUES (10, 'ASP');
INSERT INTO `xk_tags` VALUES (11, 'C++');
INSERT INTO `xk_tags` VALUES (12, 'Java');
INSERT INTO `xk_tags` VALUES (13, 'C#');
INSERT INTO `xk_tags` VALUES (14, 'python');
INSERT INTO `xk_tags` VALUES (15, 'Ajax');
INSERT INTO `xk_tags` VALUES (16, 'Template');

SET FOREIGN_KEY_CHECKS = 1;
