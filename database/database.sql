-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table itcweb.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alasantidakhadir` varchar(255) DEFAULT 'hadir',
  `tanggal` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itcweb.absensi: ~8 rows (approximately)
INSERT INTO `absensi` (`id`, `username`, `keterangan`, `foto`, `alasantidakhadir`, `tanggal`) VALUES
	(1, 'Rafa', NULL, '../asset/image/fotosementara/programming-coding-icon-logo-design-template-vector-removebg-preview.png', NULL, '2025-02-17 18:57:54'),
	(2, 'Rafa', 'hadir', '../asset/image/fotosementara/Picsart_24-07-02_14-34-25-388.jpg', NULL, '2025-02-17 19:00:20'),
	(3, 'Rafa', 'hadir', '../asset/image/fotosementara/Picsart_24-07-02_14-34-25-388.jpg', NULL, '2025-02-18 15:07:02'),
	(4, 'Rafa', 'hadir', '../asset/image/fotosementara/Picsart_24-07-02_14-34-25-388.jpg', NULL, '2025-02-18 17:10:49'),
	(5, 'Rafa', 'hadir', '../asset/image/fotosementara/download-2.jpg', NULL, '2025-02-21 19:22:24'),
	(6, 'Rafa', 'hadir', '../asset/image/fotosementara/download-2.jpg', NULL, '2025-02-21 19:47:30'),
	(7, 'Rafa', 'hadir', '../asset/image/fotosementara/download-2.jpg', NULL, '2025-02-21 19:47:41'),
	(8, 'Rafa', 'tidakhadir', '../asset/image/fotosementara/download-2.jpg', 'asdasdasdasd', '2025-02-21 19:55:36');

-- Dumping structure for table itcweb.permintaan
CREATE TABLE IF NOT EXISTS `permintaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nomortelepon` varchar(255) DEFAULT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `SUBJECT` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT 'waiting',
  `pekerja` varchar(255) DEFAULT 'waiting',
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itcweb.permintaan: ~1 rows (approximately)
INSERT INTO `permintaan` (`id`, `username`, `nomortelepon`, `jabatan`, `kategori`, `SUBJECT`, `gambar`, `deskripsi`, `STATUS`, `pekerja`, `date`) VALUES
	(4, 'Nakano', '0861231263512', 'guru', 'hardware', 'PC', '../asset/image/fotosementara/download-2.jpg', 'sadasdasd', 'waiting', 'waiting', '2025-02-20 20:21:52');

-- Dumping structure for table itcweb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `kelasitc` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(15) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `PASSWORD` (`PASSWORD`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table itcweb.users: ~6 rows (approximately)
INSERT INTO `users` (`id`, `username`, `kelas`, `jurusan`, `kelasitc`, `jeniskelamin`, `PASSWORD`) VALUES
	(1, 'Nakano', '12', 'pplg', 'programer', 'perempuan', '$2y$10$e2mQaScHfexzSoDI/qySxOelbWt9LHvzYd6V6qw/H6xm2cn3bQ/Di'),
	(2, 'Lele', '11', 'TJKT', 'programer', 'laki-laki', '$2y$10$Mt6PmiXAghiVx7mmH86TZ.8W0qhGX1h4sulOxWNLUHrXMynC1qoOm'),
	(3, 'Jiji', '12', 'PPLG', 'desain', 'perempuan', '$2y$10$1qYMGIqQCaLeBlmiH08e2eu5v56f4fa1hjlSN3p9Rpo75z61gGb3e'),
	(4, 'jaja', '12', 'PPLG', 'desain', 'perempuan', '$2y$10$lPR/rrBwYFxVa1UdRn4rSei1N0s1AclrUvTRjqeVZnYVAyH92tTc6'),
	(5, 'JK', '11', 'PPLG', 'programer', 'perempuan', '$2y$10$7zrbMTldy.JaWXFUwi8jg.cgH8lYVe5d3xBm05tOTgDQHRUsHfgta'),
	(8, 'Rafa', '12', 'PPLG', 'programer', 'laki-laki', '$2y$10$..81g36RM8qAWHqzXKqAHuyOgD90nDzrd.4gOXUD6nc/zfj1yWE.u');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
