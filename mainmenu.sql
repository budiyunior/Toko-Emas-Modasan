/*
Navicat MySQL Data Transfer

Source Server         : SERVER_LARAGON
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tokoemas

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-10-27 16:54:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mainmenu
-- ----------------------------
DROP TABLE IF EXISTS `mainmenu`;
CREATE TABLE `mainmenu` (
  `seq` int(11) NOT NULL AUTO_INCREMENT,
  `idmenu` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `active_menu` varchar(50) DEFAULT NULL,
  `icon_class` varchar(50) DEFAULT NULL,
  `link_menu` varchar(50) DEFAULT NULL,
  `menu_akses` varchar(12) DEFAULT NULL,
  `entry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(50) DEFAULT NULL,
  `sts` enum('A','W') DEFAULT 'W',
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mainmenu
-- ----------------------------
INSERT INTO `mainmenu` VALUES ('1', '1', 'Dashboard', '', 'ico fa fa-home', 'C_home', '', '2020-10-19 09:19:13', null, 'W');
INSERT INTO `mainmenu` VALUES ('2', '2', 'Barang', '', 'ico fa fa-book ', 'C_barang', '', '2020-10-19 09:19:21', null, 'W');
INSERT INTO `mainmenu` VALUES ('3', '3', 'Pelanggan', '', 'ico fa fa fa-users', 'C_pelanggan', '', '2020-10-19 09:19:27', null, 'W');
INSERT INTO `mainmenu` VALUES ('6', '6', 'Penjualan', '', 'ico fa fa-bar-chart', 'C_penjualan', '', '2020-10-19 09:19:48', null, 'W');
INSERT INTO `mainmenu` VALUES ('4', '4', 'Sales', '', 'ico fa fa fa-user', 'C_sales', '', '2020-10-19 09:19:35', null, 'W');
INSERT INTO `mainmenu` VALUES ('5', '5', 'Pembelian', null, 'ico fa fa-pie-chart', 'C_pembelian', null, '2020-10-19 09:19:42', null, 'W');
INSERT INTO `mainmenu` VALUES ('7', '7', 'Lap. Jual', null, 'ico fa fa-cart-plus', 'C_lapenjualan', null, '2020-10-19 09:20:07', null, 'W');
INSERT INTO `mainmenu` VALUES ('9', '9', 'Pengaturan', null, 'ico fa fa-cog', 'C_pengaturan', null, '2020-10-19 09:20:21', null, 'W');
INSERT INTO `mainmenu` VALUES ('8', '8', 'Lap. Beli', null, 'ico fa fa-cart-arrow-down', 'C_lapembelian', null, '2020-10-19 09:20:15', null, 'W');

-- ----------------------------
-- Table structure for submenu
-- ----------------------------
DROP TABLE IF EXISTS `submenu`;
CREATE TABLE `submenu` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) DEFAULT NULL,
  `mainmenu_idmenu` int(11) DEFAULT NULL,
  `active_sub` varchar(20) DEFAULT NULL,
  `icon_class` varchar(100) DEFAULT NULL,
  `link_sub` varchar(50) DEFAULT NULL,
  `sub_akses` varchar(12) DEFAULT NULL,
  `entry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(20) DEFAULT NULL,
  `sts` enum('W','A') DEFAULT 'W',
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submenu
-- ----------------------------

-- ----------------------------
-- Table structure for tab_akses_mainmenu
-- ----------------------------
DROP TABLE IF EXISTS `tab_akses_mainmenu`;
CREATE TABLE `tab_akses_mainmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `fc_userid` char(30) DEFAULT NULL,
  `c` int(11) DEFAULT '0',
  `r` int(11) DEFAULT '0',
  `u` int(11) DEFAULT '0',
  `d` int(11) DEFAULT '0',
  `entry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tab_akses_mainmenu
-- ----------------------------
INSERT INTO `tab_akses_mainmenu` VALUES ('1', '1', '1', '1', '1', '1', '1', '2020-10-27 16:03:05', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('8', '2', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('9', '3', '1', '0', '1', '1', '1', '2020-10-27 16:14:58', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('10', '4', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('11', '5', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('24', '6', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('25', '7', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('26', '8', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('27', '9', '1', '1', '1', '1', '1', '2020-10-27 16:03:06', 'admin');

-- ----------------------------
-- Table structure for tab_akses_submenu
-- ----------------------------
DROP TABLE IF EXISTS `tab_akses_submenu`;
CREATE TABLE `tab_akses_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub_menu` int(11) DEFAULT NULL,
  `fc_userid` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT '0',
  `r` int(11) DEFAULT '0',
  `u` int(11) DEFAULT '0',
  `d` int(11) DEFAULT '0',
  `entry_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `entry_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tab_akses_submenu
-- ----------------------------
