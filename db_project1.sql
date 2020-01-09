-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2020 at 03:28 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_bagian_pekerjaan`
--

DROP TABLE IF EXISTS `m_bagian_pekerjaan`;
CREATE TABLE IF NOT EXISTS `m_bagian_pekerjaan` (
  `id_bag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_bag` varchar(150) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bagian_pekerjaan`
--

INSERT INTO `m_bagian_pekerjaan` (`id_bag`, `nama_bag`, `keterangan`) VALUES
(1, 'Pengawas', 'Mengawasi Pekerjaan'),
(2, 'Arsitek', 'Membuat Desain Rumah'),
(3, 'Marketing', 'Mempromosikan Perumahan');

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

DROP TABLE IF EXISTS `m_customer`;
CREATE TABLE IF NOT EXISTS `m_customer` (
  `id_cus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_cus` varchar(150) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_card` varchar(100) DEFAULT NULL,
  `hp_no` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id_cus`, `nama_cus`, `alamat`, `id_card`, `hp_no`, `keterangan`) VALUES
(1, 'Customer 1', 'Jl. Tukad Banyusari', '', '081245127368', ''),
(2, 'Customer 2', 'Jl. Tunas Mekar', '', '089090909090', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_gudang`
--

DROP TABLE IF EXISTS `m_gudang`;
CREATE TABLE IF NOT EXISTS `m_gudang` (
  `id_gud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_gud` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_gud`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_gudang`
--

INSERT INTO `m_gudang` (`id_gud`, `nama_gud`, `keterangan`) VALUES
(1, 'Gudang Cozy Home Sukur', 'Untuk perumahan cozy home sukur'),
(2, 'Gudang Cozy Home Mapanget', 'Untuk perumahan cozy home mapanget');

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

DROP TABLE IF EXISTS `m_item`;
CREATE TABLE IF NOT EXISTS `m_item` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_gudang` (`gudang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_karyawan`
--

DROP TABLE IF EXISTS `m_karyawan`;
CREATE TABLE IF NOT EXISTS `m_karyawan` (
  `id_kar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kar` varchar(150) NOT NULL,
  `bagian_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp_no` varchar(20) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kar`),
  KEY `bagian_id` (`bagian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_karyawan`
--

INSERT INTO `m_karyawan` (`id_kar`, `nama_kar`, `bagian_id`, `alamat`, `hp_no`, `keterangan`) VALUES
(1, 'Pengawas 1', 1, 'Jl. Sean', '081245127368', ''),
(2, 'Marketing 1', 3, 'Jl. Tunas Mekar', '089908924315', ''),
(5, 'Arsitek 1', 2, 'Jl. Bersama Orang Tua', '088213582770', ''),
(7, 'Pengawas 2', 1, 'Jl. Anggrek', '090909090909', ''),
(8, 'Marketing 2', 3, 'Jl. Tunas Mekar', '081245127368', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori_material`
--

DROP TABLE IF EXISTS `m_kategori_material`;
CREATE TABLE IF NOT EXISTS `m_kategori_material` (
  `id_katmet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_mat` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_katmet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori_material`
--

INSERT INTO `m_kategori_material` (`id_katmet`, `kategori_mat`, `keterangan`) VALUES
(1, 'Atap', NULL),
(2, 'Batu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori_pekerjaan`
--

DROP TABLE IF EXISTS `m_kategori_pekerjaan`;
CREATE TABLE IF NOT EXISTS `m_kategori_pekerjaan` (
  `id_katpek` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pek` varchar(150) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_katpek`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori_pekerjaan`
--

INSERT INTO `m_kategori_pekerjaan` (`id_katpek`, `kategori_pek`, `keterangan`) VALUES
(1, 'Kat Pekerjaan 1', NULL),
(2, 'Kat Pekerjaan 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_material`
--

DROP TABLE IF EXISTS `m_material`;
CREATE TABLE IF NOT EXISTS `m_material` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_material`
--

INSERT INTO `m_material` (`id`, `kode`, `kategori_id`, `nama_brg`, `satuan`, `harga`, `keterangan`) VALUES
(5, '001', 1, 'Genteng', 'cm', 19000, ''),
(6, '002', 2, 'Kerikil', 'kg', 4000, ''),
(7, '003', 1, 'Test', 'btg', 123500, ''),
(8, '004', 2, 'Batu Gunung', 'M3', 40000, ''),
(9, '005', 1, 'Seng Gelombang', 'Lbr', 12500, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_pekerja`
--

DROP TABLE IF EXISTS `m_pekerja`;
CREATE TABLE IF NOT EXISTS `m_pekerja` (
  `id_pek` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pek` varchar(150) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hp_no` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pek`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pekerja`
--

INSERT INTO `m_pekerja` (`id_pek`, `nama_pek`, `alamat`, `hp_no`, `keterangan`) VALUES
(1, 'Pekerja 1', 'Jln. Sesama', '080890903030', ''),
(2, 'Pekerja 2', 'Jl. Tunas Mekar', '089090909090', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_pekerjaan`
--

DROP TABLE IF EXISTS `m_pekerjaan`;
CREATE TABLE IF NOT EXISTS `m_pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `std_harga` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pekerjaan`
--

INSERT INTO `m_pekerjaan` (`id`, `kategori_id`, `pekerjaan`, `satuan`, `std_harga`, `keterangan`) VALUES
(4, 1, 'Pekerjaan 1', 'kg', 28000, ''),
(5, 1, 'Pekerjaan 2', 'kg', 29000, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_proyek`
--

DROP TABLE IF EXISTS `m_proyek`;
CREATE TABLE IF NOT EXISTS `m_proyek` (
  `id_pro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama_pro` varchar(50) NOT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `anggaran` int(11) NOT NULL DEFAULT '0',
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Aktif','Selesai') NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_proyek`
--

INSERT INTO `m_proyek` (`id_pro`, `kode`, `nama_pro`, `lokasi`, `owner`, `anggaran`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(5, '002', 'Proyek 2', 'Bitung', 'Ayuni Febrianty', 29000000, '2019-08-29', '2020-03-29', 'Selesai'),
(6, '001', 'Proyek 1', 'Manado', 'Aditya Dewantara', 80000000, '2019-12-31', '0000-00-00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `m_rab_material_bytype`
--

DROP TABLE IF EXISTS `m_rab_material_bytype`;
CREATE TABLE IF NOT EXISTS `m_rab_material_bytype` (
  `id_rmbt` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rmbt`),
  UNIQUE KEY `typematerial-idx` (`type_id`,`material_id`),
  KEY `type_id` (`type_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rab_material_bytype`
--

INSERT INTO `m_rab_material_bytype` (`id_rmbt`, `type_id`, `material_id`, `qty`, `price`) VALUES
(10, 1, 5, '2.00', 19000),
(11, 1, 6, '6.00', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `m_rab_material_byunit`
--

DROP TABLE IF EXISTS `m_rab_material_byunit`;
CREATE TABLE IF NOT EXISTS `m_rab_material_byunit` (
  `id_rmbu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(10) NOT NULL DEFAULT '0',
  `pake_qty` int(10) DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rmbu`),
  UNIQUE KEY `unitmaterial-idx` (`unit_id`,`material_id`),
  KEY `unit_id` (`unit_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rab_material_byunit`
--

INSERT INTO `m_rab_material_byunit` (`id_rmbu`, `unit_id`, `material_id`, `qty`, `pake_qty`, `price`) VALUES
(5, 3, 6, 89, 0, 4000),
(6, 3, 9, 78, 0, 12500);

-- --------------------------------------------------------

--
-- Table structure for table `m_rab_pekerjaan_bytype`
--

DROP TABLE IF EXISTS `m_rab_pekerjaan_bytype`;
CREATE TABLE IF NOT EXISTS `m_rab_pekerjaan_bytype` (
  `id_rpbt` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rpbt`),
  KEY `fk_rabpekerjaanbytype_type` (`type_id`),
  KEY `fk_rabpekerjaanbytype_pekerjaan` (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rab_pekerjaan_bytype`
--

INSERT INTO `m_rab_pekerjaan_bytype` (`id_rpbt`, `type_id`, `pekerjaan_id`, `qty`, `price`) VALUES
(9, 1, 4, '0.00', 28000);

-- --------------------------------------------------------

--
-- Table structure for table `m_rab_pekerjaan_byunit`
--

DROP TABLE IF EXISTS `m_rab_pekerjaan_byunit`;
CREATE TABLE IF NOT EXISTS `m_rab_pekerjaan_byunit` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(10) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `unit_id` (`unit_id`),
  KEY `pekerjaan_id` (`pekerjaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

DROP TABLE IF EXISTS `m_supplier`;
CREATE TABLE IF NOT EXISTS `m_supplier` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `hp_no` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`id`, `nama`, `alamat`, `hp_no`, `keterangan`) VALUES
(1, 'PT. Indramayu Banyuwangi', 'Jl. Tukad Banyusari', '081245127368', ''),
(2, 'PT. Manado Karya', 'Jl. Binginsari', '081245127368', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_typerumah`
--

DROP TABLE IF EXISTS `m_typerumah`;
CREATE TABLE IF NOT EXISTS `m_typerumah` (
  `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_type` varchar(50) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_typerumah`
--

INSERT INTO `m_typerumah` (`id_type`, `nama_type`, `luas_tanah`, `luas_bangunan`, `keterangan`) VALUES
(1, '35 Commercial', 67, 57, NULL),
(2, '67 Commercial', 90, 56, ''),
(3, '78 Commercial', 15, 78, ''),
(4, '88 Commercial', 67, 67, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_unitrumah`
--

DROP TABLE IF EXISTS `m_unitrumah`;
CREATE TABLE IF NOT EXISTS `m_unitrumah` (
  `id_unit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `proyek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `status_pekerjaan` varchar(20) NOT NULL,
  `status_progress` varchar(20) NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_beli` varchar(20) DEFAULT NULL,
  `mulai_bangun` date DEFAULT NULL,
  `selesai_bangun` date DEFAULT NULL,
  `tst_kunci` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `pekerja_id` bigint(20) UNSIGNED DEFAULT NULL,
  `arsitek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pengawas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marketing_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_unit`),
  UNIQUE KEY `proyekrumah_idx` (`proyek_id`,`alamat`),
  KEY `arsitek_id` (`arsitek_id`),
  KEY `type_id` (`type_id`),
  KEY `proyek_id` (`proyek_id`),
  KEY `pekerja_id` (`pekerja_id`),
  KEY `pengawas_id` (`pengawas_id`),
  KEY `marketing_id` (`marketing_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_unitrumah`
--

INSERT INTO `m_unitrumah` (`id_unit`, `type_id`, `proyek_id`, `alamat`, `luas_bangunan`, `luas_tanah`, `status_pekerjaan`, `status_progress`, `customer_id`, `status_beli`, `mulai_bangun`, `selesai_bangun`, `tst_kunci`, `keterangan`, `pekerja_id`, `arsitek_id`, `pengawas_id`, `marketing_id`) VALUES
(3, 3, 5, 'Jl. Anggrek Raya 7, No. 6, Manado.', 29, 30, 'Perluasan/Penambahan', 'Progress', 2, 'Booking', '2020-01-23', '2020-01-21', '2020-01-26', NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_beli_detail`
--

DROP TABLE IF EXISTS `t_beli_detail`;
CREATE TABLE IF NOT EXISTS `t_beli_detail` (
  `id_tbd` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` int(11) NOT NULL,
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_tbd`),
  UNIQUE KEY `faktur_material_pk` (`no_faktur`,`material_id`),
  KEY `fk_beli_material` (`material_id`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_beli_detail`
--

INSERT INTO `t_beli_detail` (`id_tbd`, `no_faktur`, `material_id`, `qty`, `price`, `stock_id`) VALUES
(83, '1508605024', 5, '3.00', 19000, 83),
(93, '1508605024', 6, '12.00', 4000, 78),
(94, '1508605024', 8, '21.00', 40000, 81);

--
-- Triggers `t_beli_detail`
--
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCKMASUK_PEMBELIAN`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCKMASUK_PEMBELIAN` AFTER INSERT ON `t_beli_detail` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock_masuk=qty_stock_masuk+NEW.qty
    WHERE id_stomat=NEW.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCKMASUK_PEMBELIAN_HAPUS`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCKMASUK_PEMBELIAN_HAPUS` AFTER DELETE ON `t_beli_detail` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock_masuk = qty_stock_masuk - OLD.qty
    WHERE id_stomat = OLD.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCK_PEMBELIAN`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCK_PEMBELIAN` AFTER INSERT ON `t_beli_detail` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock=qty_stock+NEW.qty
    WHERE id_stomat=NEW.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCK_PEMBELIAN_HAPUS`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCK_PEMBELIAN_HAPUS` AFTER DELETE ON `t_beli_detail` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock = qty_stock - OLD.qty
    WHERE id_stomat=OLD.stock_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_beli_master`
--

DROP TABLE IF EXISTS `t_beli_master`;
CREATE TABLE IF NOT EXISTS `t_beli_master` (
  `id_tbm` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jatuh_tempo` int(5) DEFAULT '0',
  `supplier_id` bigint(20) NOT NULL,
  `gudang_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tbm`),
  UNIQUE KEY `no_faktur_beli_pk` (`no_faktur`) USING BTREE,
  KEY `fk_belimaster_gudang` (`gudang_id`),
  KEY `fk_belimaster_supplier` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_beli_master`
--

INSERT INTO `t_beli_master` (`id_tbm`, `no_faktur`, `tgl_beli`, `jatuh_tempo`, `supplier_id`, `gudang_id`, `keterangan`) VALUES
(160, '1508605024', '2020-01-16', 9, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_opname_progress`
--

DROP TABLE IF EXISTS `t_opname_progress`;
CREATE TABLE IF NOT EXISTS `t_opname_progress` (
  `id_op` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_progress` date NOT NULL,
  `rpbu_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `persentase` int(11) NOT NULL,
  `price` int(11) DEFAULT '0',
  PRIMARY KEY (`id_op`),
  KEY `rpbu_id` (`rpbu_id`,`unit_id`,`pekerjaan_id`),
  KEY `fk_pekerjaan_idpek` (`pekerjaan_id`),
  KEY `fk_unit_id` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pakai_material`
--

DROP TABLE IF EXISTS `t_pakai_material`;
CREATE TABLE IF NOT EXISTS `t_pakai_material` (
  `id_pake` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_pake` date NOT NULL,
  `rmbu_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(10) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pake`),
  KEY `rmbu_id` (`rmbu_id`,`unit_id`,`material_id`),
  KEY `fk_unit_idunit` (`unit_id`),
  KEY `fk_material_idmat` (`material_id`),
  KEY `stock_id` (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Triggers `t_pakai_material`
--
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCKKELUAR_PEMAKAIAN`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCKKELUAR_PEMAKAIAN` AFTER INSERT ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock_keluar=qty_stock_keluar+NEW.qty
    WHERE id_stomat=NEW.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCKKELUAR_PEMAKAIAN_HAPUS`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCKKELUAR_PEMAKAIAN_HAPUS` AFTER DELETE ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock_keluar=qty_stock_keluar-OLD.qty
    WHERE id_stomat=OLD.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCK_PEMAKAIAN`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCK_PEMAKAIAN` AFTER INSERT ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock=qty_stock-NEW.qty
    WHERE id_stomat=NEW.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIALSTOCK_PEMAKAIAN_HAPUS`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIALSTOCK_PEMAKAIAN_HAPUS` AFTER DELETE ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE t_stock_material SET qty_stock=qty_stock+OLD.qty
    WHERE id_stomat=OLD.stock_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIAL_PAKAI`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIAL_PAKAI` AFTER INSERT ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE m_rab_material_byunit SET qty=qty-NEW.qty
    WHERE id_rmbu=NEW.rmbu_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `TG_QTYMATERIAL_PAKAI_TAMBAH`;
DELIMITER $$
CREATE TRIGGER `TG_QTYMATERIAL_PAKAI_TAMBAH` AFTER INSERT ON `t_pakai_material` FOR EACH ROW BEGIN
	UPDATE m_rab_material_byunit SET pake_qty=pake_qty+NEW.qty
    WHERE id_rmbu=NEW.rmbu_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_stock_material`
--

DROP TABLE IF EXISTS `t_stock_material`;
CREATE TABLE IF NOT EXISTS `t_stock_material` (
  `id_stomat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gudang_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `qty_stock` int(10) DEFAULT '0',
  `qty_stock_masuk` int(10) DEFAULT '0',
  `qty_stock_keluar` int(10) DEFAULT '0',
  PRIMARY KEY (`id_stomat`),
  KEY `gudang_id` (`gudang_id`,`material_id`,`supplier_id`),
  KEY `fk_material_id` (`material_id`),
  KEY `fk_supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock_material`
--

INSERT INTO `t_stock_material` (`id_stomat`, `gudang_id`, `material_id`, `supplier_id`, `keterangan`, `qty_stock`, `qty_stock_masuk`, `qty_stock_keluar`) VALUES
(77, 2, 9, 1, '-', 0, 0, 0),
(78, 2, 6, 1, '-', 12, 12, 0),
(81, 2, 8, 1, '-', 21, 21, 0),
(83, 2, 5, 1, '-', 3, 3, 0),
(84, 2, 7, 1, '-', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(99) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('operator','supervisor','manager') DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `fullname`, `username`, `password`, `role`) VALUES
(9, 'Aditya Dewantara', 'eradityardy', '123456', 'manager'),
(10, 'Linda Safitri', 'lindasafitri', 'sayalinda', 'supervisor'),
(11, 'Bimasena Abimanyu', 'bimabima', '123456', 'operator');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_material_supplier`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_material_supplier`;
CREATE TABLE IF NOT EXISTS `vw_material_supplier` (
`id` bigint(20) unsigned
,`kode` varchar(10)
,`kategori_mat` varchar(50)
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`harga` int(11)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pekerjaan`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_pekerjaan`;
CREATE TABLE IF NOT EXISTS `vw_pekerjaan` (
`kategori_pek` varchar(150)
,`pekerjaan` varchar(150)
,`satuan` varchar(10)
,`std_harga` int(11)
,`keterangan` varchar(255)
,`id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_material_by_typerumah_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_material_by_typerumah_detail`;
CREATE TABLE IF NOT EXISTS `vw_rab_material_by_typerumah_detail` (
`id_type` bigint(20) unsigned
,`nama_type` varchar(50)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`qty` decimal(10,2)
,`price` int(11)
,`id_rmbt` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_material_by_typerumah_summary`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_material_by_typerumah_summary`;
CREATE TABLE IF NOT EXISTS `vw_rab_material_by_typerumah_summary` (
`id_type` bigint(20) unsigned
,`nama_type` varchar(50)
,`sum_rab` decimal(42,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_material_by_unitrumah_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_material_by_unitrumah_detail`;
CREATE TABLE IF NOT EXISTS `vw_rab_material_by_unitrumah_detail` (
`id_unit` bigint(20) unsigned
,`nama_pro` varchar(50)
,`alamat` varchar(100)
,`nama_cus` varchar(150)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`qty` int(10)
,`price` int(11)
,`id_rmbu` bigint(20) unsigned
,`pake_qty` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_material_by_unitrumah_summary`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_material_by_unitrumah_summary`;
CREATE TABLE IF NOT EXISTS `vw_rab_material_by_unitrumah_summary` (
`id_unit` bigint(20) unsigned
,`nama_pro` varchar(50)
,`alamat` varchar(100)
,`nama_cus` varchar(150)
,`sum_rab` decimal(42,0)
,`sum_pake_rab` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_pekerjaan_by_typerumah_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_pekerjaan_by_typerumah_detail`;
CREATE TABLE IF NOT EXISTS `vw_rab_pekerjaan_by_typerumah_detail` (
`id_type` bigint(20) unsigned
,`nama_type` varchar(50)
,`pekerjaan_id` bigint(20) unsigned
,`qty` decimal(10,2)
,`price` int(11)
,`pekerjaan` varchar(150)
,`satuan` varchar(10)
,`id_rpbt` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_pekerjaan_by_typerumah_summary`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_pekerjaan_by_typerumah_summary`;
CREATE TABLE IF NOT EXISTS `vw_rab_pekerjaan_by_typerumah_summary` (
`id_type` bigint(20) unsigned
,`nama_type` varchar(50)
,`sum_rab` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_pekerjaan_by_unitrumah_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_pekerjaan_by_unitrumah_detail`;
CREATE TABLE IF NOT EXISTS `vw_rab_pekerjaan_by_unitrumah_detail` (
`id_unit` bigint(20) unsigned
,`nama_pro` varchar(50)
,`alamat` varchar(100)
,`nama_cus` varchar(150)
,`pekerjaan_id` bigint(20) unsigned
,`pekerjaan` varchar(150)
,`qty` int(10)
,`price` int(11)
,`id` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rab_pekerjaan_by_unitrumah_summary`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_rab_pekerjaan_by_unitrumah_summary`;
CREATE TABLE IF NOT EXISTS `vw_rab_pekerjaan_by_unitrumah_summary` (
`id_unit` bigint(20) unsigned
,`nama_pro` varchar(50)
,`alamat` varchar(100)
,`nama_cus` varchar(150)
,`sum_rab` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_stock_material`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_stock_material`;
CREATE TABLE IF NOT EXISTS `vw_stock_material` (
`id_stomat` bigint(20) unsigned
,`gudang_id` bigint(20) unsigned
,`nama_gud` varchar(150)
,`material_id` bigint(20) unsigned
,`kode` varchar(10)
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`supplier_id` bigint(20)
,`nama` varchar(150)
,`qty_stock` int(10)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_tambah_pake`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_tambah_pake`;
CREATE TABLE IF NOT EXISTS `vw_tambah_pake` (
`id_rmbu` bigint(20) unsigned
,`unit_id` bigint(20) unsigned
,`alamat` varchar(100)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`qty` int(10)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_tambah_progress`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_tambah_progress`;
CREATE TABLE IF NOT EXISTS `vw_tambah_progress` (
`id` bigint(20) unsigned
,`unit_id` bigint(20) unsigned
,`alamat` varchar(100)
,`pekerjaan_id` bigint(20) unsigned
,`pekerjaan` varchar(150)
,`satuan` varchar(10)
,`qty` int(10)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_t_beli_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_t_beli_detail`;
CREATE TABLE IF NOT EXISTS `vw_t_beli_detail` (
`id_tbd` bigint(20)
,`no_faktur` varchar(50)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`qty` decimal(10,2)
,`price` int(11)
,`sub_total` decimal(42,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_t_beli_master`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_t_beli_master`;
CREATE TABLE IF NOT EXISTS `vw_t_beli_master` (
`id_tbm` bigint(20)
,`no_faktur` varchar(50)
,`tgl_beli` date
,`supplier_id` bigint(20)
,`gudang_id` bigint(20) unsigned
,`keterangan` varchar(255)
,`nama` varchar(150)
,`nama_gud` varchar(150)
,`sub_total` decimal(42,2)
,`jatuh_tempo` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_t_beli_masterdetail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_t_beli_masterdetail`;
CREATE TABLE IF NOT EXISTS `vw_t_beli_masterdetail` (
`no_faktur` varchar(50)
,`tgl_beli` date
,`supplier_id` bigint(20)
,`gudang_id` bigint(20) unsigned
,`nama` varchar(150)
,`nama_gud` varchar(150)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`satuan` varchar(10)
,`qty` decimal(10,2)
,`price` int(11)
,`sub_total` decimal(42,2)
,`id_tbm` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_t_opname_progress`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_t_opname_progress`;
CREATE TABLE IF NOT EXISTS `vw_t_opname_progress` (
`id_op` bigint(20) unsigned
,`tgl_progress` date
,`rpbu_id` bigint(20) unsigned
,`unit_id` bigint(20) unsigned
,`alamat` varchar(100)
,`nama_pro` varchar(50)
,`nama_cus` varchar(150)
,`pekerjaan_id` bigint(20) unsigned
,`pekerjaan` varchar(150)
,`persentase` int(11)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_t_pake_material`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_t_pake_material`;
CREATE TABLE IF NOT EXISTS `vw_t_pake_material` (
`id_pake` bigint(20) unsigned
,`tgl_pake` date
,`rmbu_id` bigint(20) unsigned
,`unit_id` bigint(20) unsigned
,`alamat` varchar(100)
,`nama_pro` varchar(50)
,`nama_cus` varchar(150)
,`material_id` bigint(20) unsigned
,`nama_brg` varchar(100)
,`qty` int(10)
,`satuan` varchar(10)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_unitrumah`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_unitrumah`;
CREATE TABLE IF NOT EXISTS `vw_unitrumah` (
`id_unit` bigint(20) unsigned
,`nama_type` varchar(50)
,`nama_pro` varchar(50)
,`alamat` varchar(100)
,`luas_bangunan` int(11)
,`luas_tanah` int(11)
,`status_pekerjaan` varchar(20)
,`status_progress` varchar(20)
,`status_beli` varchar(20)
,`nama_cus` varchar(150)
,`mulai_bangun` date
,`selesai_bangun` date
,`tst_kunci` date
,`nama_pek` varchar(150)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_material_supplier`
--
DROP TABLE IF EXISTS `vw_material_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_material_supplier`  AS  select `m_material`.`id` AS `id`,`m_material`.`kode` AS `kode`,`m_kategori_material`.`kategori_mat` AS `kategori_mat`,`m_material`.`nama_brg` AS `nama_brg`,`m_material`.`satuan` AS `satuan`,`m_material`.`harga` AS `harga`,`m_material`.`keterangan` AS `keterangan` from (`m_material` join `m_kategori_material` on((`m_material`.`kategori_id` = `m_kategori_material`.`id_katmet`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pekerjaan`
--
DROP TABLE IF EXISTS `vw_pekerjaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pekerjaan`  AS  select `m_kategori_pekerjaan`.`kategori_pek` AS `kategori_pek`,`m_pekerjaan`.`pekerjaan` AS `pekerjaan`,`m_pekerjaan`.`satuan` AS `satuan`,`m_pekerjaan`.`std_harga` AS `std_harga`,`m_pekerjaan`.`keterangan` AS `keterangan`,`m_pekerjaan`.`id` AS `id` from (`m_kategori_pekerjaan` join `m_pekerjaan` on((`m_pekerjaan`.`kategori_id` = `m_kategori_pekerjaan`.`id_katpek`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_material_by_typerumah_detail`
--
DROP TABLE IF EXISTS `vw_rab_material_by_typerumah_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_material_by_typerumah_detail`  AS  select `m_typerumah`.`id_type` AS `id_type`,`m_typerumah`.`nama_type` AS `nama_type`,`m_rab_material_bytype`.`material_id` AS `material_id`,`m_material`.`nama_brg` AS `nama_brg`,`m_material`.`satuan` AS `satuan`,`m_rab_material_bytype`.`qty` AS `qty`,`m_rab_material_bytype`.`price` AS `price`,`m_rab_material_bytype`.`id_rmbt` AS `id_rmbt` from ((`m_typerumah` left join `m_rab_material_bytype` on((`m_rab_material_bytype`.`type_id` = `m_typerumah`.`id_type`))) left join `m_material` on((`m_rab_material_bytype`.`material_id` = `m_material`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_material_by_typerumah_summary`
--
DROP TABLE IF EXISTS `vw_rab_material_by_typerumah_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_material_by_typerumah_summary`  AS  select `a`.`id_type` AS `id_type`,`a`.`nama_type` AS `nama_type`,coalesce(sum((`a`.`qty` * `a`.`price`)),0) AS `sum_rab` from `vw_rab_material_by_typerumah_detail` `a` group by `a`.`id_type`,`a`.`nama_type` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_material_by_unitrumah_detail`
--
DROP TABLE IF EXISTS `vw_rab_material_by_unitrumah_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_material_by_unitrumah_detail`  AS  select `m_unitrumah`.`id_unit` AS `id_unit`,`m_proyek`.`nama_pro` AS `nama_pro`,`m_unitrumah`.`alamat` AS `alamat`,`m_customer`.`nama_cus` AS `nama_cus`,`m_rab_material_byunit`.`material_id` AS `material_id`,`m_material`.`nama_brg` AS `nama_brg`,`m_rab_material_byunit`.`qty` AS `qty`,`m_rab_material_byunit`.`price` AS `price`,`m_rab_material_byunit`.`id_rmbu` AS `id_rmbu`,`m_rab_material_byunit`.`pake_qty` AS `pake_qty` from ((((`m_unitrumah` left join `m_proyek` on((`m_unitrumah`.`proyek_id` = `m_proyek`.`id_pro`))) left join `m_customer` on((`m_unitrumah`.`customer_id` = `m_customer`.`id_cus`))) left join `m_rab_material_byunit` on((`m_rab_material_byunit`.`unit_id` = `m_unitrumah`.`id_unit`))) left join `m_material` on((`m_rab_material_byunit`.`material_id` = `m_material`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_material_by_unitrumah_summary`
--
DROP TABLE IF EXISTS `vw_rab_material_by_unitrumah_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_material_by_unitrumah_summary`  AS  select `b`.`id_unit` AS `id_unit`,`b`.`nama_pro` AS `nama_pro`,`b`.`alamat` AS `alamat`,`b`.`nama_cus` AS `nama_cus`,coalesce(sum((`b`.`qty` * `b`.`price`)),0) AS `sum_rab`,coalesce(sum((`b`.`pake_qty` * `b`.`price`)),0) AS `sum_pake_rab` from `vw_rab_material_by_unitrumah_detail` `b` group by `b`.`id_unit`,`b`.`nama_pro`,`b`.`alamat`,`b`.`nama_cus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_pekerjaan_by_typerumah_detail`
--
DROP TABLE IF EXISTS `vw_rab_pekerjaan_by_typerumah_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_pekerjaan_by_typerumah_detail`  AS  select `m_typerumah`.`id_type` AS `id_type`,`m_typerumah`.`nama_type` AS `nama_type`,`m_rab_pekerjaan_bytype`.`pekerjaan_id` AS `pekerjaan_id`,`m_rab_pekerjaan_bytype`.`qty` AS `qty`,`m_rab_pekerjaan_bytype`.`price` AS `price`,`m_pekerjaan`.`pekerjaan` AS `pekerjaan`,`m_pekerjaan`.`satuan` AS `satuan`,`m_rab_pekerjaan_bytype`.`id_rpbt` AS `id_rpbt` from ((`m_typerumah` left join `m_rab_pekerjaan_bytype` on((`m_rab_pekerjaan_bytype`.`type_id` = `m_typerumah`.`id_type`))) left join `m_pekerjaan` on((`m_rab_pekerjaan_bytype`.`pekerjaan_id` = `m_pekerjaan`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_pekerjaan_by_typerumah_summary`
--
DROP TABLE IF EXISTS `vw_rab_pekerjaan_by_typerumah_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_pekerjaan_by_typerumah_summary`  AS  select `c`.`id_type` AS `id_type`,`c`.`nama_type` AS `nama_type`,coalesce(sum((`c`.`price` * 1)),0) AS `sum_rab` from `vw_rab_pekerjaan_by_typerumah_detail` `c` group by `c`.`id_type`,`c`.`nama_type` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_pekerjaan_by_unitrumah_detail`
--
DROP TABLE IF EXISTS `vw_rab_pekerjaan_by_unitrumah_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_pekerjaan_by_unitrumah_detail`  AS  select `m_unitrumah`.`id_unit` AS `id_unit`,`m_proyek`.`nama_pro` AS `nama_pro`,`m_unitrumah`.`alamat` AS `alamat`,`m_customer`.`nama_cus` AS `nama_cus`,`m_rab_pekerjaan_byunit`.`pekerjaan_id` AS `pekerjaan_id`,`m_pekerjaan`.`pekerjaan` AS `pekerjaan`,`m_rab_pekerjaan_byunit`.`qty` AS `qty`,`m_rab_pekerjaan_byunit`.`price` AS `price`,`m_rab_pekerjaan_byunit`.`id` AS `id` from ((((`m_unitrumah` left join `m_proyek` on((`m_unitrumah`.`proyek_id` = `m_proyek`.`id_pro`))) left join `m_customer` on((`m_unitrumah`.`customer_id` = `m_customer`.`id_cus`))) left join `m_rab_pekerjaan_byunit` on((`m_rab_pekerjaan_byunit`.`unit_id` = `m_unitrumah`.`id_unit`))) left join `m_pekerjaan` on((`m_rab_pekerjaan_byunit`.`pekerjaan_id` = `m_pekerjaan`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rab_pekerjaan_by_unitrumah_summary`
--
DROP TABLE IF EXISTS `vw_rab_pekerjaan_by_unitrumah_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rab_pekerjaan_by_unitrumah_summary`  AS  select `d`.`id_unit` AS `id_unit`,`d`.`nama_pro` AS `nama_pro`,`d`.`alamat` AS `alamat`,`d`.`nama_cus` AS `nama_cus`,coalesce(sum((`d`.`price` * 1)),0) AS `sum_rab` from `vw_rab_pekerjaan_by_unitrumah_detail` `d` group by `d`.`id_unit`,`d`.`nama_pro`,`d`.`alamat`,`d`.`nama_cus` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_stock_material`
--
DROP TABLE IF EXISTS `vw_stock_material`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_stock_material`  AS  select `t_stock_material`.`id_stomat` AS `id_stomat`,`t_stock_material`.`gudang_id` AS `gudang_id`,`m_gudang`.`nama_gud` AS `nama_gud`,`t_stock_material`.`material_id` AS `material_id`,`m_material`.`kode` AS `kode`,`m_material`.`nama_brg` AS `nama_brg`,`m_material`.`satuan` AS `satuan`,`t_stock_material`.`supplier_id` AS `supplier_id`,`m_supplier`.`nama` AS `nama`,`t_stock_material`.`qty_stock` AS `qty_stock`,`t_stock_material`.`keterangan` AS `keterangan` from (((`t_stock_material` left join `m_gudang` on((`t_stock_material`.`gudang_id` = `m_gudang`.`id_gud`))) left join `m_material` on((`t_stock_material`.`material_id` = `m_material`.`id`))) join `m_supplier` on((`t_stock_material`.`supplier_id` = `m_supplier`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_tambah_pake`
--
DROP TABLE IF EXISTS `vw_tambah_pake`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tambah_pake`  AS  select `m_rab_material_byunit`.`id_rmbu` AS `id_rmbu`,`m_rab_material_byunit`.`unit_id` AS `unit_id`,`m_unitrumah`.`alamat` AS `alamat`,`m_rab_material_byunit`.`material_id` AS `material_id`,`m_material`.`nama_brg` AS `nama_brg`,`m_material`.`satuan` AS `satuan`,`m_rab_material_byunit`.`qty` AS `qty`,`m_rab_material_byunit`.`price` AS `price` from ((`m_rab_material_byunit` join `m_unitrumah` on((`m_rab_material_byunit`.`unit_id` = `m_unitrumah`.`id_unit`))) join `m_material` on((`m_rab_material_byunit`.`material_id` = `m_material`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_tambah_progress`
--
DROP TABLE IF EXISTS `vw_tambah_progress`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tambah_progress`  AS  select `m_rab_pekerjaan_byunit`.`id` AS `id`,`m_rab_pekerjaan_byunit`.`unit_id` AS `unit_id`,`m_unitrumah`.`alamat` AS `alamat`,`m_rab_pekerjaan_byunit`.`pekerjaan_id` AS `pekerjaan_id`,`m_pekerjaan`.`pekerjaan` AS `pekerjaan`,`m_pekerjaan`.`satuan` AS `satuan`,`m_rab_pekerjaan_byunit`.`qty` AS `qty`,`m_rab_pekerjaan_byunit`.`price` AS `price` from ((`m_rab_pekerjaan_byunit` join `m_unitrumah` on((`m_rab_pekerjaan_byunit`.`unit_id` = `m_unitrumah`.`id_unit`))) join `m_pekerjaan` on((`m_rab_pekerjaan_byunit`.`pekerjaan_id` = `m_pekerjaan`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_t_beli_detail`
--
DROP TABLE IF EXISTS `vw_t_beli_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_t_beli_detail`  AS  select `t_beli_detail`.`id_tbd` AS `id_tbd`,`t_beli_master`.`no_faktur` AS `no_faktur`,`t_beli_detail`.`material_id` AS `material_id`,`m_material`.`nama_brg` AS `nama_brg`,`m_material`.`satuan` AS `satuan`,`t_beli_detail`.`qty` AS `qty`,`t_beli_detail`.`price` AS `price`,sum((`t_beli_detail`.`qty` * `t_beli_detail`.`price`)) AS `sub_total` from ((`t_beli_detail` left join `t_beli_master` on((`t_beli_detail`.`no_faktur` = `t_beli_master`.`no_faktur`))) left join `m_material` on((`t_beli_detail`.`material_id` = `m_material`.`id`))) group by `t_beli_detail`.`id_tbd`,`t_beli_master`.`no_faktur`,`m_material`.`nama_brg`,`m_material`.`satuan`,`t_beli_detail`.`qty`,`t_beli_detail`.`price` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_t_beli_master`
--
DROP TABLE IF EXISTS `vw_t_beli_master`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_t_beli_master`  AS  select `t_beli_master`.`id_tbm` AS `id_tbm`,`t_beli_master`.`no_faktur` AS `no_faktur`,`t_beli_master`.`tgl_beli` AS `tgl_beli`,`t_beli_master`.`supplier_id` AS `supplier_id`,`t_beli_master`.`gudang_id` AS `gudang_id`,`t_beli_master`.`keterangan` AS `keterangan`,`m_supplier`.`nama` AS `nama`,`m_gudang`.`nama_gud` AS `nama_gud`,sum((`a`.`qty` * `a`.`price`)) AS `sub_total`,`t_beli_master`.`jatuh_tempo` AS `jatuh_tempo` from (((`t_beli_master` left join `t_beli_detail` `a` on((`a`.`no_faktur` = `t_beli_master`.`no_faktur`))) left join `m_supplier` on((`t_beli_master`.`supplier_id` = `m_supplier`.`id`))) left join `m_gudang` on((`t_beli_master`.`gudang_id` = `m_gudang`.`id_gud`))) group by `t_beli_master`.`id_tbm`,`t_beli_master`.`no_faktur`,`t_beli_master`.`tgl_beli`,`t_beli_master`.`supplier_id`,`t_beli_master`.`gudang_id`,`t_beli_master`.`keterangan`,`m_supplier`.`nama`,`m_gudang`.`nama_gud` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_t_beli_masterdetail`
--
DROP TABLE IF EXISTS `vw_t_beli_masterdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_t_beli_masterdetail`  AS  select `vw_t_beli_master`.`no_faktur` AS `no_faktur`,`vw_t_beli_master`.`tgl_beli` AS `tgl_beli`,`vw_t_beli_master`.`supplier_id` AS `supplier_id`,`vw_t_beli_master`.`gudang_id` AS `gudang_id`,`vw_t_beli_master`.`nama` AS `nama`,`vw_t_beli_master`.`nama_gud` AS `nama_gud`,`vw_t_beli_detail`.`material_id` AS `material_id`,`vw_t_beli_detail`.`nama_brg` AS `nama_brg`,`vw_t_beli_detail`.`satuan` AS `satuan`,`vw_t_beli_detail`.`qty` AS `qty`,`vw_t_beli_detail`.`price` AS `price`,`vw_t_beli_master`.`sub_total` AS `sub_total`,`vw_t_beli_master`.`id_tbm` AS `id_tbm` from (`vw_t_beli_master` join `vw_t_beli_detail`) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_t_opname_progress`
--
DROP TABLE IF EXISTS `vw_t_opname_progress`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_t_opname_progress`  AS  select `t_opname_progress`.`id_op` AS `id_op`,`t_opname_progress`.`tgl_progress` AS `tgl_progress`,`t_opname_progress`.`rpbu_id` AS `rpbu_id`,`m_rab_pekerjaan_byunit`.`unit_id` AS `unit_id`,`m_unitrumah`.`alamat` AS `alamat`,`m_proyek`.`nama_pro` AS `nama_pro`,`m_customer`.`nama_cus` AS `nama_cus`,`m_rab_pekerjaan_byunit`.`pekerjaan_id` AS `pekerjaan_id`,`m_pekerjaan`.`pekerjaan` AS `pekerjaan`,`t_opname_progress`.`persentase` AS `persentase`,`t_opname_progress`.`price` AS `price` from (((((`t_opname_progress` join `m_rab_pekerjaan_byunit` on((`t_opname_progress`.`rpbu_id` = `m_rab_pekerjaan_byunit`.`id`))) join `m_unitrumah` on(((`t_opname_progress`.`unit_id` = `m_unitrumah`.`id_unit`) and (`m_rab_pekerjaan_byunit`.`unit_id` = `m_unitrumah`.`id_unit`)))) join `m_proyek` on((`m_unitrumah`.`proyek_id` = `m_proyek`.`id_pro`))) join `m_customer` on((`m_unitrumah`.`customer_id` = `m_customer`.`id_cus`))) join `m_pekerjaan` on(((`t_opname_progress`.`pekerjaan_id` = `m_pekerjaan`.`id`) and (`m_rab_pekerjaan_byunit`.`pekerjaan_id` = `m_pekerjaan`.`id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_t_pake_material`
--
DROP TABLE IF EXISTS `vw_t_pake_material`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_t_pake_material`  AS  select `t_pakai_material`.`id_pake` AS `id_pake`,`t_pakai_material`.`tgl_pake` AS `tgl_pake`,`t_pakai_material`.`rmbu_id` AS `rmbu_id`,`m_rab_material_byunit`.`unit_id` AS `unit_id`,`m_unitrumah`.`alamat` AS `alamat`,`m_proyek`.`nama_pro` AS `nama_pro`,`m_customer`.`nama_cus` AS `nama_cus`,`m_rab_material_byunit`.`material_id` AS `material_id`,`m_material`.`nama_brg` AS `nama_brg`,`t_pakai_material`.`qty` AS `qty`,`m_material`.`satuan` AS `satuan`,`t_pakai_material`.`price` AS `price` from (((((`t_pakai_material` join `m_rab_material_byunit` on((`t_pakai_material`.`rmbu_id` = `m_rab_material_byunit`.`id_rmbu`))) join `m_unitrumah` on(((`t_pakai_material`.`unit_id` = `m_unitrumah`.`id_unit`) and (`m_rab_material_byunit`.`unit_id` = `m_unitrumah`.`id_unit`)))) join `m_proyek` on((`m_unitrumah`.`proyek_id` = `m_proyek`.`id_pro`))) join `m_customer` on((`m_unitrumah`.`customer_id` = `m_customer`.`id_cus`))) join `m_material` on(((`t_pakai_material`.`material_id` = `m_material`.`id`) and (`m_rab_material_byunit`.`material_id` = `m_material`.`id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_unitrumah`
--
DROP TABLE IF EXISTS `vw_unitrumah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_unitrumah`  AS  select `m_unitrumah`.`id_unit` AS `id_unit`,`m_typerumah`.`nama_type` AS `nama_type`,`m_proyek`.`nama_pro` AS `nama_pro`,`m_unitrumah`.`alamat` AS `alamat`,`m_unitrumah`.`luas_bangunan` AS `luas_bangunan`,`m_unitrumah`.`luas_tanah` AS `luas_tanah`,`m_unitrumah`.`status_pekerjaan` AS `status_pekerjaan`,`m_unitrumah`.`status_progress` AS `status_progress`,`m_unitrumah`.`status_beli` AS `status_beli`,`m_customer`.`nama_cus` AS `nama_cus`,`m_unitrumah`.`mulai_bangun` AS `mulai_bangun`,`m_unitrumah`.`selesai_bangun` AS `selesai_bangun`,`m_unitrumah`.`tst_kunci` AS `tst_kunci`,`m_pekerja`.`nama_pek` AS `nama_pek`,`m_unitrumah`.`keterangan` AS `keterangan` from ((((`m_unitrumah` join `m_typerumah` on((`m_unitrumah`.`type_id` = `m_typerumah`.`id_type`))) join `m_proyek` on((`m_unitrumah`.`proyek_id` = `m_proyek`.`id_pro`))) join `m_customer` on((`m_unitrumah`.`customer_id` = `m_customer`.`id_cus`))) join `m_pekerja` on((`m_unitrumah`.`pekerja_id` = `m_pekerja`.`id_pek`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_item`
--
ALTER TABLE `m_item`
  ADD CONSTRAINT `fk_item_gudang` FOREIGN KEY (`gudang_id`) REFERENCES `m_gudang` (`id_gud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD CONSTRAINT `fk_karyawan_bagian` FOREIGN KEY (`bagian_id`) REFERENCES `m_bagian_pekerjaan` (`id_bag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_material`
--
ALTER TABLE `m_material`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori_material` (`id_katmet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_pekerjaan`
--
ALTER TABLE `m_pekerjaan`
  ADD CONSTRAINT `fk_pekerjaan_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori_pekerjaan` (`id_katpek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_rab_material_bytype`
--
ALTER TABLE `m_rab_material_bytype`
  ADD CONSTRAINT `fk_rabmaterialbytype_material` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rabmaterialbytype_type` FOREIGN KEY (`type_id`) REFERENCES `m_typerumah` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_rab_material_byunit`
--
ALTER TABLE `m_rab_material_byunit`
  ADD CONSTRAINT `fk_rabmaterialbyunit_material` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rabmaterialbyunit_unit` FOREIGN KEY (`unit_id`) REFERENCES `m_unitrumah` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_rab_pekerjaan_bytype`
--
ALTER TABLE `m_rab_pekerjaan_bytype`
  ADD CONSTRAINT `fk_rabpekerjaanbytype_pekerjaan` FOREIGN KEY (`pekerjaan_id`) REFERENCES `m_pekerjaan` (`id`),
  ADD CONSTRAINT `fk_rabpekerjaanbytype_type` FOREIGN KEY (`type_id`) REFERENCES `m_typerumah` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_rab_pekerjaan_byunit`
--
ALTER TABLE `m_rab_pekerjaan_byunit`
  ADD CONSTRAINT `fk_rabpekerjaanlbyunit_pekerjaan` FOREIGN KEY (`pekerjaan_id`) REFERENCES `m_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rabpekerjaanlbyunit_unit` FOREIGN KEY (`unit_id`) REFERENCES `m_unitrumah` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_unitrumah`
--
ALTER TABLE `m_unitrumah`
  ADD CONSTRAINT `fk_unitrumah_arsitek` FOREIGN KEY (`arsitek_id`) REFERENCES `m_karyawan` (`id_kar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_customer` FOREIGN KEY (`customer_id`) REFERENCES `m_customer` (`id_cus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_marketing` FOREIGN KEY (`marketing_id`) REFERENCES `m_karyawan` (`id_kar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_pekerja` FOREIGN KEY (`pekerja_id`) REFERENCES `m_pekerja` (`id_pek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_pengawas` FOREIGN KEY (`pengawas_id`) REFERENCES `m_karyawan` (`id_kar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_proyek` FOREIGN KEY (`proyek_id`) REFERENCES `m_proyek` (`id_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unitrumah_typerumah` FOREIGN KEY (`type_id`) REFERENCES `m_typerumah` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_beli_detail`
--
ALTER TABLE `t_beli_detail`
  ADD CONSTRAINT `faktur_beli_detail_fk` FOREIGN KEY (`no_faktur`) REFERENCES `t_beli_master` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_beli_material` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stock_beli_material` FOREIGN KEY (`stock_id`) REFERENCES `t_stock_material` (`id_stomat`);

--
-- Constraints for table `t_beli_master`
--
ALTER TABLE `t_beli_master`
  ADD CONSTRAINT `fk_belimaster_gudang` FOREIGN KEY (`gudang_id`) REFERENCES `m_gudang` (`id_gud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_belimaster_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_opname_progress`
--
ALTER TABLE `t_opname_progress`
  ADD CONSTRAINT `fk_pekerjaan_idpek` FOREIGN KEY (`pekerjaan_id`) REFERENCES `m_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rpbu_idrpbu` FOREIGN KEY (`rpbu_id`) REFERENCES `m_rab_pekerjaan_byunit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `m_unitrumah` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pakai_material`
--
ALTER TABLE `t_pakai_material`
  ADD CONSTRAINT `fk_material_idmat` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rmbu_idrmbu` FOREIGN KEY (`rmbu_id`) REFERENCES `m_rab_material_byunit` (`id_rmbu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stockmat_idstomat` FOREIGN KEY (`stock_id`) REFERENCES `t_stock_material` (`id_stomat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_unit_idunit` FOREIGN KEY (`unit_id`) REFERENCES `m_unitrumah` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_stock_material`
--
ALTER TABLE `t_stock_material`
  ADD CONSTRAINT `fk_gudang_id` FOREIGN KEY (`gudang_id`) REFERENCES `m_gudang` (`id_gud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_id` FOREIGN KEY (`material_id`) REFERENCES `m_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `m_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
