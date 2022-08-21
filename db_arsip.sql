# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2018-02-22 18:44:16
# Generator: MySQL-Front 5.3  (Build 5.39)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "disposisi"
#

DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi` (
  `no_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `kepada` varchar(30) DEFAULT NULL,
  `keterangan` text,
  `status_surat` varchar(30) DEFAULT NULL,
  `tanggapan` varchar(12) DEFAULT '',
  `keputusan` varchar(7) DEFAULT NULL,
  `id_sm` int(11) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_disposisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "disposisi"
#

INSERT INTO `disposisi` VALUES (1,'Sekretariat PLN P2B','buatkan surat tanggapan','Sudah ditanggapi','Tindak Lanju','ACC',1,1,3);

#
# Structure for table "jenis_surat"
#

DROP TABLE IF EXISTS `jenis_surat`;
CREATE TABLE `jenis_surat` (
  `id_jenissurat` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenissurat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

#
# Data for table "jenis_surat"
#

INSERT INTO `jenis_surat` VALUES (1,'Surat Pemberitahuan'),(2,'Surat Keputusan'),(3,'Surat Perintah'),(4,'Surat Permintaan'),(5,'Surat Panggilan'),(6,'Surat Peringatan'),(7,'Surat Perjanjian'),(8,'Surat Laporan'),(9,'Surat Pengantar'),(10,'Surat Penawaran'),(11,'Surat Pemesanan'),(12,'Surat Undangan');

#
# Structure for table "loker"
#

DROP TABLE IF EXISTS `loker`;
CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL AUTO_INCREMENT,
  `loker` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_loker`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "loker"
#

INSERT INTO `loker` VALUES (1,'Loker 1'),(2,'Loker 2'),(3,'Loker 3'),(4,'Loker 4');

#
# Structure for table "surat_keluar"
#

DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kirim` date DEFAULT NULL,
  `no_surat` varchar(15) DEFAULT NULL,
  `penerima` varchar(30) DEFAULT NULL,
  `perihal` varchar(30) DEFAULT NULL,
  `pict` blob,
  `id_jenissurat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "surat_keluar"
#

INSERT INTO `surat_keluar` VALUES (1,'0000-00-00','SMK/XVII/765','Sekretariat PLN P2B','Balasan Peminjaman Panggung',X'',1);

#
# Structure for table "surat_masuk"
#

DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_terima` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `no_surat` varchar(15) DEFAULT NULL,
  `pengirim` varchar(30) DEFAULT NULL,
  `perihal` varchar(30) DEFAULT NULL,
  `pict` blob,
  `id_jenissurat` int(11) DEFAULT NULL,
  `id_loker` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "surat_masuk"
#

INSERT INTO `surat_masuk` VALUES (1,'2018-02-22','2018-02-21','SMK/XVII/765','PLN P2B','Peminjaman Panggung',X'',1,1);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(30) DEFAULT NULL,
  `nama_belakang` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(15) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'Dominic','Archiver','admin','202cb962ac59075b964b07152d234b70','Aktif','Admin'),(2,'Abdi','Karya','ak17','202cb962ac59075b964b07152d234b70','Tidak Aktif','User'),(3,'Demo','Susanto','abdi','e10adc3949ba59abbe56e057f20f883e','Aktif','User');
