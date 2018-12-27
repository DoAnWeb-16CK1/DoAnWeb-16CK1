/*
Navicat MySQL Data Transfer

Source Server         : XAMPP
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : qlbh

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-28 03:58:44
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `chitietdathang`
-- ----------------------------
DROP TABLE IF EXISTS `chitietdathang`;
CREATE TABLE `chitietdathang` (
  `ID` int(11) DEFAULT NULL,
  `DatHangID` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` decimal(10,0) DEFAULT NULL,
  `TinhTrang` int(11) DEFAULT NULL,
  `NgayDuKienGiaoHang` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chitietdathang
-- ----------------------------

-- ----------------------------
-- Table structure for `danhmuc`
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of danhmuc
-- ----------------------------
INSERT INTO `danhmuc` VALUES ('1', 'Áo');
INSERT INTO `danhmuc` VALUES ('2', 'Giày');
INSERT INTO `danhmuc` VALUES ('3', 'Vòng');
INSERT INTO `danhmuc` VALUES ('4', 'Nhẫn');
INSERT INTO `danhmuc` VALUES ('5', 'Điện thoại');
INSERT INTO `danhmuc` VALUES ('6', 'Tủ Lạnh');
INSERT INTO `danhmuc` VALUES ('7', 'Máy Giặt');
INSERT INTO `danhmuc` VALUES ('8', 'Bàn');
INSERT INTO `danhmuc` VALUES ('9', 'Ghế');
INSERT INTO `danhmuc` VALUES ('10', 'Cặp Sách');

-- ----------------------------
-- Table structure for `dathang`
-- ----------------------------
DROP TABLE IF EXISTS `dathang`;
CREATE TABLE `dathang` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TongGia` decimal(10,0) DEFAULT NULL,
  `LoaiGiaoHang` int(11) DEFAULT NULL,
  `TinhTrang` int(11) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NgayDuKienGiaoHang` datetime DEFAULT NULL,
  `DiaChiNhanHangID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dathang
-- ----------------------------
INSERT INTO `dathang` VALUES ('0', '1', '50000000', null, null, '2018-12-28 02:09:42', null, null);

-- ----------------------------
-- Table structure for `diachinhanhang`
-- ----------------------------
DROP TABLE IF EXISTS `diachinhanhang`;
CREATE TABLE `diachinhanhang` (
  `ID` int(11) DEFAULT NULL,
  `NguoiDungID` int(11) DEFAULT NULL,
  `TenNguoiNhan` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) DEFAULT NULL,
  `DiaChiGiaoHang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of diachinhanhang
-- ----------------------------

-- ----------------------------
-- Table structure for `nguoidung`
-- ----------------------------
DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE `nguoidung` (
  `ID` int(11) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `Quyen` int(11) DEFAULT NULL,
  PRIMARY KEY (`SoDienThoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nguoidung
-- ----------------------------
INSERT INTO `nguoidung` VALUES ('1', 'quocnhat', '123456', '012345678', '123 abc', 'nhat@gmai.com', null, '1');

-- ----------------------------
-- Table structure for `nhasanxuat`
-- ----------------------------
DROP TABLE IF EXISTS `nhasanxuat`;
CREATE TABLE `nhasanxuat` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nhasanxuat
-- ----------------------------
INSERT INTO `nhasanxuat` VALUES ('1001', 'Việt Nam');
INSERT INTO `nhasanxuat` VALUES ('1002', 'Trung Quốc');

-- ----------------------------
-- Table structure for `sanpham`
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `MaSP` varchar(255) NOT NULL,
  `TenSP` varchar(255) DEFAULT NULL,
  `LoaiSP` int(11) DEFAULT NULL,
  `NhaSanXuatID` int(11) DEFAULT NULL,
  `XuatXu` varchar(255) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `Gia` decimal(10,0) DEFAULT NULL,
  `LuotXem` int(11) DEFAULT NULL,
  `TinhTrang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`,`MaSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
INSERT INTO `sanpham` VALUES ('1', '199811', 'Áo', '1', '1002', 'Trung Quốc', 'hàng mới ', '2018-12-27 22:52:13', '100', null, '50000000', '30', 'Còn hàng');
INSERT INTO `sanpham` VALUES ('2', '199821', 'Giày', '2', '1001', 'Việt Nam', 'hàng mới ', '2018-12-27 23:05:13', '500', null, '90000000', '1', 'Hết hàng');
INSERT INTO `sanpham` VALUES ('3', '199831', 'Vòng', '3', '1002', 'Trung Quốc', 'hàng mới ', '2018-12-28 01:34:12', '20', null, '50000000', '1', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('4', '199841', 'Nokia 1280', '5', '1002', 'Trung Quốc', 'Mới', '2018-12-28 01:37:36', '40', null, '5400000', '1', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('11', '199812', 'Áo sơ mi', '1', '1001', 'Việt Nam', 'Mới', '2018-12-28 02:43:54', '50', null, '200000', '50', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('12', '199813', 'Áo thun', '1', '1001', 'Việt Nam', 'Mới', '2018-12-28 02:57:44', '100', null, '250000', '10', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('13', '199814', 'Áo Thun Loại 1', '1', '1001', 'Việt Nam', 'Cũ', '2018-11-29 03:19:50', '50', null, '8000000', '4', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('14', '199815', 'Áo Thu Loại 2', '1', '1001', 'Việt Nam', 'Cũ', '2018-11-29 03:21:39', '40', null, '6000000', '9', 'Còn hàng');
INSERT INTO `sanpham` VALUES ('15', '199816', 'Áo Thu Loại 3', '1', '1001', 'Việt Nam ', 'Cũ', '2018-11-29 03:22:45', '50', null, '800000', '11', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('16', '199822', 'Giày Cao Gót', '2', '1002', 'Trung Quốc', 'Cũ', '2018-11-29 03:27:28', '10', null, '500000', '41', 'Còn Hàng');
INSERT INTO `sanpham` VALUES ('17', '199832', 'Vòng Loại 1', '3', '1001', 'Việt Nam', 'Mới ', '2018-11-30 03:29:08', '40', null, '9000000', '74', 'Còn Hàng');
