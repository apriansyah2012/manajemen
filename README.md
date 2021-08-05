# Khanza-Lite
Khanza Lite Ini adalah Versi Custom dari Khanza Lite 1, di sesuaikan dengan RS saya

Catatan :
Mapping Kategori Penjamin/Cara Bayar (Sesuaikan dengan Keadaan di tempat Masing-masing) dengan menambahkan Query dibawah ini di dalam database :

"ALTER TABLE penjab  ADD COLUMN kategori enum('ASURANSI','PERUSAHAAN','TUNAI','BPJS','BPJSTK','JAMSOS','KEMKES','DLL') AFTER attn"



Kemudian Tambahkan Tabel berikut :

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
