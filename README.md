# Khanza-Lite Manajemen
1. Tambahkan Table Roles. 

         CREATE TABLE roles (
           username varchar(60) NOT NULL,
           role varchar(45) NOT NULL,
           cap varchar(20) NOT NULL
         ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

         INSERT INTO roles VALUES username = 'ISIKANDENGANUSERNAMEANDA', role='Admin', cap=''
         
2. Isikan table roles dengan Id User yang ada di Khanza Desktop
3. Tambahkan field kategori di table penjab dengan type data enum ('ASURANSI','PERUSAHAAN','TUNAI','BPJS','BPJSTK','JAMSOS','KEMKES','DLL')
4. Tambahkan Table Surveilence  
         
          DROP TABLE IF EXISTS `surveilans`;
          CREATE TABLE `surveilans`  (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `kd_bangsal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            PRIMARY KEY (`id`) USING BTREE
          ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;
          SET FOREIGN_KEY_CHECKS = 1;
