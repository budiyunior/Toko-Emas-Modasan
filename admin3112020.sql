/*
Navicat MySQL Data Transfer

Source Server         : SERVER_LARAGON
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tokoemas

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-11-03 10:10:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_userid` char(30) DEFAULT NULL,
  `fv_username` varchar(100) NOT NULL,
  `fv_password` text NOT NULL,
  `fv_view_password` text,
  `fc_kdposisi` char(30) DEFAULT NULL,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'USR002', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0001');

-- ----------------------------
-- Table structure for t_setup
-- ----------------------------
DROP TABLE IF EXISTS `t_setup`;
CREATE TABLE `t_setup` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fc_param` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fc_kode` char(3) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fc_isi` char(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of t_setup
-- ----------------------------
INSERT INTO `t_setup` VALUES ('1', 'BANNER', 'A', 'C:\\MUKA\\temp\\banner.jpg');
INSERT INTO `t_setup` VALUES ('6', 'LVLUSER', 'A', 'ADMINISTRATOR');
INSERT INTO `t_setup` VALUES ('7', 'LVLUSER', 'B', 'OPERATOR');
INSERT INTO `t_setup` VALUES ('9', 'LVLUSER', 'D', 'SUPERVISOR');
INSERT INTO `t_setup` VALUES ('10', 'LVLUSER', 'E', 'MANAJER');
INSERT INTO `t_setup` VALUES ('11', 'MASAKAS', 'A', '201201');
INSERT INTO `t_setup` VALUES ('17', 'PJGKODE', 'A', '6');
INSERT INTO `t_setup` VALUES ('104', 'RESTOMAX', '', '500');
INSERT INTO `t_setup` VALUES ('32', 'WARNAISI', 'A', 'clInfobk');
INSERT INTO `t_setup` VALUES ('33', 'WARNAGRID', 'A', 'clMoneyGreen');
INSERT INTO `t_setup` VALUES ('34', 'FONTISI', 'A', '8');
INSERT INTO `t_setup` VALUES ('35', 'FONTSTYLEISI', '', 'Arial');
INSERT INTO `t_setup` VALUES ('36', 'FONTLABEL', '', '9');
INSERT INTO `t_setup` VALUES ('37', 'FONTSTYLELABEL', '', 'Arial Rounded MT');
INSERT INTO `t_setup` VALUES ('38', 'FONTBOLDLABEL', '', 'Y');
INSERT INTO `t_setup` VALUES ('39', 'DIRDUMP', '', 'D:\\xampp\\mysql\\bin\\mysqldump');
INSERT INTO `t_setup` VALUES ('40', 'DIRTARGET', '', 'D:\\Data');
INSERT INTO `t_setup` VALUES ('102', 'PSW_OPNAME', '', '12345');
INSERT INTO `t_setup` VALUES ('101', 'PRINTPAYMODEL', '', 'C');
INSERT INTO `t_setup` VALUES ('115', 'FULLBARCODE', '', 'Y');
INSERT INTO `t_setup` VALUES ('97', 'KOTA', '', 'KEDIRI');
INSERT INTO `t_setup` VALUES ('47', 'VERSI', '', '1.0');
INSERT INTO `t_setup` VALUES ('48', 'PATHSHARE', '', 'Z:\\Install MUKA.exe');
INSERT INTO `t_setup` VALUES ('49', 'CEKVERSI', '', 'N');
INSERT INTO `t_setup` VALUES ('96', 'NPWP', '', '');
INSERT INTO `t_setup` VALUES ('51', 'DIRPHOTO', '', 'C:\\MUKA\\Photo\\');
INSERT INTO `t_setup` VALUES ('52', 'PHOTO_TINGGI', '', '185');
INSERT INTO `t_setup` VALUES ('53', 'PHOTO_LEBAR', '', '103');
INSERT INTO `t_setup` VALUES ('54', 'DIRTTD', '', 'C:\\MUKA\\Photo\\');
INSERT INTO `t_setup` VALUES ('98', 'PERIODE_SO', '', '20161026');
INSERT INTO `t_setup` VALUES ('56', 'DIRPHOTO2', '', 'Z:\\');
INSERT INTO `t_setup` VALUES ('57', 'DIRTEMP', '', 'C:\\MUKA\\Temp\\');
INSERT INTO `t_setup` VALUES ('95', 'EMAIL', '', 'info@muka.com');
INSERT INTO `t_setup` VALUES ('94', 'HP', '', '');
INSERT INTO `t_setup` VALUES ('93', 'TELP', '', '031-');
INSERT INTO `t_setup` VALUES ('92', 'ALAMAT', '', 'Jl. Kawi Perum Mojorot Regency A-1');
INSERT INTO `t_setup` VALUES ('91', 'NAMA', '', 'PT MUKA');
INSERT INTO `t_setup` VALUES ('90', 'BATASCLOSING', '', '20');
INSERT INTO `t_setup` VALUES ('89', 'PERSENFEE', '', '15');
INSERT INTO `t_setup` VALUES ('88', 'POTONGFEE', '', '2');
INSERT INTO `t_setup` VALUES ('87', 'PSW_VOID', '', '1');
INSERT INTO `t_setup` VALUES ('81', 'WARNAISI', 'A', 'clInfobk');
INSERT INTO `t_setup` VALUES ('82', 'WARNAGRID', 'A', 'clMoneyGreen');
INSERT INTO `t_setup` VALUES ('83', 'FONTISI', 'A', '8');
INSERT INTO `t_setup` VALUES ('84', 'FONTSTYLEISI', 'A', 'Arial');
INSERT INTO `t_setup` VALUES ('85', 'FONTLABEL', 'A', '9');
INSERT INTO `t_setup` VALUES ('86', 'FONTBOLDLABEL', 'A', 'Y');
INSERT INTO `t_setup` VALUES ('105', 'PERSENJUAL', '', '10');
INSERT INTO `t_setup` VALUES ('106', 'REQ_MINDISC', '', '100000000');
INSERT INTO `t_setup` VALUES ('107', 'COST_PACKING', '', '5000');
INSERT INTO `t_setup` VALUES ('108', 'REPRINT_LIMIT', '', '2');
INSERT INTO `t_setup` VALUES ('109', 'JNSCETAK', '', '1');
INSERT INTO `t_setup` VALUES ('110', 'FILESTRUK', '', 'C:\\STRUK.TXT');
INSERT INTO `t_setup` VALUES ('111', 'PERIODEKAS', '', '201508');
INSERT INTO `t_setup` VALUES ('112', 'SALT', '', 'MUKA');
INSERT INTO `t_setup` VALUES ('113', 'SMSFOOT', '', 'Terima Kasih');
INSERT INTO `t_setup` VALUES ('116', 'BK', '', '2');
INSERT INTO `t_setup` VALUES ('117', 'PPN', '', '10');
INSERT INTO `t_setup` VALUES ('126', 'MINBONUS', '1', '20000000');
INSERT INTO `t_setup` VALUES ('127', 'PRESENTASEBONUS', '1', '0,1');
INSERT INTO `t_setup` VALUES ('122', 'BONUS', '1', '1000');
INSERT INTO `t_setup` VALUES ('123', 'BATASBOLOS', '1', '3');
INSERT INTO `t_setup` VALUES ('124', 'DENDABOLOS', '1', '50000');
INSERT INTO `t_setup` VALUES ('125', 'UANGMAKAN', '1', '30000');
INSERT INTO `t_setup` VALUES ('128', 'IPLOGIN', '1', '36.82.100.206');
INSERT INTO `t_setup` VALUES ('129', 'DISPENSASI', '1', '15');
INSERT INTO `t_setup` VALUES ('130', 'JAMMASUK', '1', '07:00:00');
INSERT INTO `t_setup` VALUES ('131', 'JAMKELUAR', '1', '23:00:00');
INSERT INTO `t_setup` VALUES ('132', 'NAMATOKO', '1', 'Modasan');
INSERT INTO `t_setup` VALUES ('133', 'ALAMATTOKO', '1', 'Jl. Sersan Harun 16 Malang');
INSERT INTO `t_setup` VALUES ('134', 'TELPTOKO', '1', 'Telp. 0341-364762');
INSERT INTO `t_setup` VALUES ('135', 'LOGOTOKO', '1', 'logo_modasan.png');
INSERT INTO `t_setup` VALUES ('136', 'INTEGRATION', '1', 'WebServiceIntegration');
INSERT INTO `t_setup` VALUES ('137', 'PORT', '1', '91');
INSERT INTO `t_setup` VALUES ('138', 'PRINTERNAME', '1', 'POSTEK C168/200s');

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
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tab_akses_mainmenu
-- ----------------------------
INSERT INTO `tab_akses_mainmenu` VALUES ('1', '1', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('8', '2', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('9', '3', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:40', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('10', '4', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('11', '5', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('24', '6', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('25', '7', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('26', '8', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
INSERT INTO `tab_akses_mainmenu` VALUES ('27', '9', 'USR002', '1', '1', '1', '1', '2020-11-02 15:20:36', 'admin');
