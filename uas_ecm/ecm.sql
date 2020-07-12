/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3308
 Source Schema         : ecm

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 06/05/2020 23:15:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `cart_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `users_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int(5) NOT NULL,
  `product_price` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`cart_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `category_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE,
  UNIQUE INDEX `category_name`(`category_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('A0003', 'High-End');
INSERT INTO `category` VALUES ('A0001', 'Low-End');
INSERT INTO `category` VALUES ('A0002', 'Mid-End');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customers_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customers_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customers_email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customers_phone` float NOT NULL,
  `customers_country` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customers_city` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customers_zip` int(10) NOT NULL,
  `customers_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customers_id`) USING BTREE,
  UNIQUE INDEX `customers_name`(`customers_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `username` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP(0)
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('andaaree', '::1', 'Mengubah produk Lumia', 'P00001', '2020-05-05 13:45:57');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Y12', 'P00002', '2020-05-05 13:58:08');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Galaxy S5', 'P00003', '2020-05-05 13:58:59');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Reno 2F', 'P00004', '2020-05-05 13:59:56');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Z1 Pro', 'P00005', '2020-05-05 14:14:58');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk XPERIA Z1 Com', 'P00006', '2020-05-05 17:07:37');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk P30 Pro', 'P00007', '2020-05-05 17:10:30');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Realme 5 Pro', 'P00008', '2020-05-05 17:11:14');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Galaxy S10', 'P00009', '2020-05-05 17:14:05');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk iPhone XR MAX', 'P00010', '2020-05-05 17:14:33');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk G3', 'P00011', '2020-05-06 03:42:17');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk ZenFone Max P', 'P00012', '2020-05-06 03:45:40');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menghapus kategori Flagship', 'A0004', '2020-05-06 04:25:08');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk OneScribe', 'P00013', '2020-05-06 09:12:08');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menghapus produk OneScribe', 'P00013', '2020-05-06 09:12:20');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk OneScribe', 'P00013', '2020-05-06 09:12:58');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menghapus produk OneScribe', 'P00013', '2020-05-06 09:15:49');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk OnePhone', 'P00013', '2020-05-06 09:26:11');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menambahkan produk Z6', 'P00014', '2020-05-06 10:01:36');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menghapus brand Smartfren', 'V0007', '2020-05-06 10:08:11');
INSERT INTO `log` VALUES ('andaaree', '::1', 'Menghapus brand Evercoss', 'V0013', '2020-05-06 10:08:15');

-- ----------------------------
-- Table structure for orderitems
-- ----------------------------
DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE `orderitems`  (
  `order_num` int(32) NOT NULL AUTO_INCREMENT,
  `order_item` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`order_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `order_num` int(32) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `customers_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`order_num`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_qty` int(4) NOT NULL,
  `product_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_vendor` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_category` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` decimal(10, 2) NOT NULL,
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('P00001', 'Lumia', 22, 'andaaree-P00001.png', 'V0005', 'A0001', 1270000.00, 'Low-End');
INSERT INTO `products` VALUES ('P00002', 'Y12', 12, 'andaaree-P00002.png', 'V0009', 'A0001', 1200000.00, '2/16 VIVO Y12');
INSERT INTO `products` VALUES ('P00003', 'Galaxy S5', 5, 'andaaree-P00003.png', 'V0012', 'A0001', 1350000.00, 'Old  Galaxy S5 1.5GB/16GB');
INSERT INTO `products` VALUES ('P00004', 'Reno 2F', 6, 'andaaree-P00004.png', 'V0015', 'A0003', 6500000.00, 'Reno 2f 6/64');
INSERT INTO `products` VALUES ('P00005', 'Z1 Pro', 31, 'andaaree-P00005.png', 'V0009', 'A0002', 2789000.00, 'Z1 Pro 4/64');
INSERT INTO `products` VALUES ('P00006', 'XPERIA Z1 Compact', 14, 'andaaree-P00006.png', 'V0004', 'A0002', 1210000.00, 'Compact phone 2/16');
INSERT INTO `products` VALUES ('P00007', 'P30 Pro', 8, 'andaaree-P00007.png', 'V0011', 'A0003', 9399000.00, '6/128');
INSERT INTO `products` VALUES ('P00008', 'Realme 5 Pro', 19, 'andaaree-P00008.png', 'V0015', 'A0002', 4130000.00, 'Realme 5 Pro 4/64');
INSERT INTO `products` VALUES ('P00009', 'Galaxy S10', 6, 'andaaree-P00009.png', 'V0012', 'A0003', 12000000.00, 'The real classy S10');
INSERT INTO `products` VALUES ('P00010', 'iPhone XR MAX', 5, 'andaaree-P00010.png', 'V0003', 'A0003', 14499999.00, 'XR MAX');
INSERT INTO `products` VALUES ('P00011', 'G3', 20, 'andaaree-P00011.png', 'V0001', 'A0002', 1150000.00, 'Memori Internal: 64 GB, 4 GB RAM');
INSERT INTO `products` VALUES ('P00012', 'ZenFone Max Pro (M2)', 16, 'andaaree-P00012.png', 'V0002', 'A0002', 2799999.00, '3/32, 4/64, 6/64');
INSERT INTO `products` VALUES ('P00013', 'OnePhone', 20, 'andaaree-P00013.png', 'V0008', 'A0001', 549000.00, 'Smartphone Android Kitkat dengan ukuran display 5 inch, koneksi 3G, bisa BBM dan Whatsapp');
INSERT INTO `products` VALUES ('P00014', 'Z6', 11, 'andaaree-P00014.png', 'V0014', 'A0002', 3650000.00, 'CPU: Octa-core (2×2.2 GHz Kryo 470 Gold & 6×1.8 GHz Kryo 470 Silver)\r\nGPU: Adreno 618\r\nRAM: 6 GB, 8 GB RAM\r\nMemori Internal: 64 GB, 128 GB ROM');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `users_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`users_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('ADM0001', 'andaaree', 'andaaree@gmail.com', '625bba720fcf26c8e9c45895e4ad8c97', '0');

-- ----------------------------
-- Table structure for vendor
-- ----------------------------
DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor`  (
  `vendor_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendor_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`vendor_id`) USING BTREE,
  UNIQUE INDEX `vendor_name`(`vendor_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vendor
-- ----------------------------
INSERT INTO `vendor` VALUES ('V0001', 'Advan');
INSERT INTO `vendor` VALUES ('V0003', 'Apple');
INSERT INTO `vendor` VALUES ('V0002', 'ASUS');
INSERT INTO `vendor` VALUES ('V0011', 'Huawei');
INSERT INTO `vendor` VALUES ('V0014', 'Lenovo');
INSERT INTO `vendor` VALUES ('V0005', 'Nokia');
INSERT INTO `vendor` VALUES ('V0015', 'Oppo');
INSERT INTO `vendor` VALUES ('V0012', 'Samsung');
INSERT INTO `vendor` VALUES ('V0004', 'Sony');
INSERT INTO `vendor` VALUES ('V0009', 'VIVO');
INSERT INTO `vendor` VALUES ('V0010', 'Xiaomi');
INSERT INTO `vendor` VALUES ('V0008', 'Zyrex');

SET FOREIGN_KEY_CHECKS = 1;
