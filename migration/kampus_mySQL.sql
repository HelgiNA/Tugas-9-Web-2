/*
 Navicat Premium Dump SQL
 Target Server Type    : MySQL / MariaDB (Universal Compatible)
 File Encoding         : 65001
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_dosen
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dosen`;
CREATE TABLE `tbl_dosen`  (
  `nidn` int(11) NOT NULL,
  `nama` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prodi` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nidn`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_dosen
-- ----------------------------
INSERT INTO `tbl_dosen` VALUES (101, 'Ricak Agus Setiawan, M.SI', 'TRPL', 'ricak@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (102, 'Heti Mulyani, M.Kom', 'TRPL', 'heti@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (103, 'Sukrina Herman, M.Kom', 'TRPL', 'sukrina@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (104, 'Halimil Fathi, M.Kom', 'TRPL', 'halimil@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (105, 'Musawarman, M.M.S.I', 'TRPL', 'musawarman@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (106, 'Widya Andayani, M. Pd', 'Umum', 'widya@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (107, 'Muhammad Nugraha, M. Eng.', 'TRPL', 'nugraha@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (108, 'Endang, M.Pd', 'Umum', 'endang@kampus.ac.id');
INSERT INTO `tbl_dosen` VALUES (109, 'Ridwan Alfian, M.Sos', 'Umum', 'ridwan@kampus.ac.id');

-- ----------------------------
-- Table structure for tbl_mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mahasiswa`;
CREATE TABLE `tbl_mahasiswa`  (
  `nim` int(11) NOT NULL,
  `nama` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prodi` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `angkatan` int(11) NULL DEFAULT NULL,
  `email` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nim`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_mahasiswa
-- ----------------------------
INSERT INTO `tbl_mahasiswa` VALUES (202404001, 'FIKRI RAMDANI', 'TRPL', 2024, '202404001@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404002, 'DYAN PUTRI AGUSTIN', 'TRPL', 2024, '202404002@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404004, 'SALMAN ALFARIDZI', 'TRPL', 2024, '202404004@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404005, 'JOSH WINSTON IMANUEL', 'TRPL', 2024, '202404005@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404007, 'INTAN SRI DAYANTI', 'TRPL', 2024, '202404007@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404008, 'MUHAMAD GILANG RAMADAN', 'TRPL', 2024, '202404008@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404009, 'KIRANA LARASATI DEWI', 'TRPL', 2024, '202404009@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404010, 'HELGI NUR ALLAMSYAH', 'TRPL', 2024, '202404010@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404011, 'KHAIKAL IKSANUDDIN', 'TRPL', 2024, '202404011@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404012, 'MUHAMMAD APIRANSYAH RAMDHANI', 'TRPL', 2024, '202404012@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404013, 'MUHAMAD SARWAN AL BARIZY', 'TRPL', 2024, '202404013@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404014, 'SITI FATIMATUZZAHRO', 'TRPL', 2024, '202404014@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404016, 'UMAR MAULANA SIDIQ', 'TRPL', 2024, '202404016@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404017, 'KEISYA FEBRI SABILA', 'TRPL', 2024, '202404017@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404018, 'DHAFI EBSAN YURIZAL', 'TRPL', 2024, '202404018@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404019, 'ZAHRA AYU TRISNA', 'TRPL', 2024, '202404019@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404020, 'AL AMANI ABAS', 'TRPL', 2024, '202404020@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404021, 'REZA ASRIANO MAULANA', 'TRPL', 2024, '202404021@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404022, 'SATRIO ILHAM SYAHPUTRA', 'TRPL', 2024, '202404022@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404023, 'SUBANI MAULANA', 'TRPL', 2024, '202404023@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404024, 'SHEVADINA AULIA RAHMA', 'TRPL', 2024, '202404024@std.kampus.ac.id');
INSERT INTO `tbl_mahasiswa` VALUES (202404025, 'DIVA ORYZA SATIVA', 'TRPL', 2024, '202404025@std.kampus.ac.id');

-- ----------------------------
-- Table structure for tbl_matkul
-- ----------------------------
DROP TABLE IF EXISTS `tbl_matkul`;
CREATE TABLE `tbl_matkul`  (
  `kodeMatkul` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namaMatkul` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sks` int(11) NULL DEFAULT NULL,
  `nidn` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`kodeMatkul`) USING BTREE,
  INDEX `nidn`(`nidn` ASC) USING BTREE,
  CONSTRAINT `tbl_matkul_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `tbl_dosen` (`nidn`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_matkul
-- ----------------------------
INSERT INTO `tbl_matkul` VALUES ('GC801', 'Kewarganegaraan', 2, 108);
INSERT INTO `tbl_matkul` VALUES ('GC802', 'Pancasila', 2, 108);
INSERT INTO `tbl_matkul` VALUES ('GC803', 'Pendidikan Agama', 2, 109);
INSERT INTO `tbl_matkul` VALUES ('MKK101', 'Pengantar Manufaktur Tekstil', 1, 101);
INSERT INTO `tbl_matkul` VALUES ('MKU103', 'Bahasa Indonesia', 2, 103);
INSERT INTO `tbl_matkul` VALUES ('SE803', 'Technopreneur', 2, 103);
INSERT INTO `tbl_matkul` VALUES ('TRPL201', 'Bahasa Inggris 2', 2, 106);
INSERT INTO `tbl_matkul` VALUES ('TRPL202', 'Kalkulus', 2, 102);
INSERT INTO `tbl_matkul` VALUES ('TRPL203', 'Komunikasi Data dan Jaringan Komputer', 1, 104);
INSERT INTO `tbl_matkul` VALUES ('TRPL204', 'Pengantar Rekayasa Perangkat Lunak', 2, 101);
INSERT INTO `tbl_matkul` VALUES ('TRPL205', 'Praktikum Komunikasi Data dan Jaringan Komputer', 2, 104);
INSERT INTO `tbl_matkul` VALUES ('TRPL206', 'Praktikum Sistem Basis Data', 2, 103);
INSERT INTO `tbl_matkul` VALUES ('TRPL207', 'Praktikum Struktur Data dan Algoritma', 2, 102);
INSERT INTO `tbl_matkul` VALUES ('TRPL208', 'Sistem Basis Data', 1, 103);
INSERT INTO `tbl_matkul` VALUES ('TRPL209', 'Struktur Data dan Algoritma', 1, 102);
INSERT INTO `tbl_matkul` VALUES ('TRPL210', 'Teknik Presentasi', 2, 106);
INSERT INTO `tbl_matkul` VALUES ('TRPL211', 'Workshop Pemrograman Web 1', 3, 107);
INSERT INTO `tbl_matkul` VALUES ('TRPL401', 'Bahasa Inggris 4', 2, 106);
INSERT INTO `tbl_matkul` VALUES ('TRPL402', 'Etika Profesi', 2, 103);
INSERT INTO `tbl_matkul` VALUES ('TRPL403', 'Workshop Cloud Computing', 2, 104);
INSERT INTO `tbl_matkul` VALUES ('TRPL404', 'Workshop Keamanan Basis Data', 2, 104);
INSERT INTO `tbl_matkul` VALUES ('TRPL405', 'Workshop Pemrograman Android 1', 3, 105);
INSERT INTO `tbl_matkul` VALUES ('TRPL406', 'Workshop Pemrograman Web 3', 3, 107);
INSERT INTO `tbl_matkul` VALUES ('TRPL601', 'Data Mining', 1, 102);
INSERT INTO `tbl_matkul` VALUES ('TRPL602', 'Enterprise Resource Planning', 1, 101);
INSERT INTO `tbl_matkul` VALUES ('TRPL603', 'Praktikum Data Mining', 2, 102);
INSERT INTO `tbl_matkul` VALUES ('TRPL604', 'Praktikum Enterprise Resource Planning', 2, 101);
INSERT INTO `tbl_matkul` VALUES ('TRPL606', 'Workshop Pemrograman IOS', 2, 105);
INSERT INTO `tbl_matkul` VALUES ('TRPL607', 'Workshop Sistem Terdistribusi', 2, 101);

-- ----------------------------
-- Table structure for tbl_nilai
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nilai`;
CREATE TABLE `tbl_nilai`  (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` double NULL DEFAULT NULL,
  `nilaiHuruf` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kodeMatkul` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nim` int(11) NULL DEFAULT NULL,
  `nidn` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai`) USING BTREE,
  INDEX `kodeMatkul`(`kodeMatkul` ASC) USING BTREE,
  INDEX `nim`(`nim` ASC) USING BTREE,
  INDEX `nidn`(`nidn` ASC) USING BTREE,
  CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`kodeMatkul`) REFERENCES `tbl_matkul` (`kodeMatkul`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`nidn`) REFERENCES `tbl_dosen` (`nidn`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_nilai
-- ----------------------------
INSERT INTO `tbl_nilai` VALUES (1, 85, 'A', 'TRPL204', 202404020, 101);
INSERT INTO `tbl_nilai` VALUES (2, 78.5, 'B', 'TRPL209', 202404020, 102);
INSERT INTO `tbl_nilai` VALUES (3, 90, 'A', 'TRPL208', 202404018, 103);
INSERT INTO `tbl_nilai` VALUES (4, 65, 'C', 'TRPL202', 202404018, 102);
INSERT INTO `tbl_nilai` VALUES (5, 88, 'A', 'TRPL211', 202404025, 107);
INSERT INTO `tbl_nilai` VALUES (6, 92, 'A', 'GC802', 202404002, 108);
INSERT INTO `tbl_nilai` VALUES (7, 70, 'B', 'TRPL204', 202404001, 101);
INSERT INTO `tbl_nilai` VALUES (8, 81, 'A', 'TRPL203', 202404010, 104);
INSERT INTO `tbl_nilai` VALUES (9, 75, 'B', 'TRPL210', 202404007, 106);
INSERT INTO `tbl_nilai` VALUES (10, 89.5, 'A', 'TRPL206', 202404005, 103);

SET FOREIGN_KEY_CHECKS = 1;