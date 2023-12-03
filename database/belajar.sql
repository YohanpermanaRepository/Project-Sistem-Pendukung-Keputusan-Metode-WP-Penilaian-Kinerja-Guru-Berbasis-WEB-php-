-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nm_lengkap` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Laki_Laki','Perempuan') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `hak_akses` varchar(200) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `nm_lengkap`, `jenis_kelamin`, `no_telp`, `alamat`, `username`, `password`, `hak_akses`, `komentar`) VALUES
(1, NULL, 'aldi', 'Laki_Laki', NULL, NULL, 'a', '1', 'kepala_sekolah', 'oke'),
(2, NULL, 'Muhammad Kurniawan Dwi Hariyadi', 'Laki_Laki', NULL, NULL, 'Aldi', 'aldi123', 'guru', 'Terimakasih'),
(3, NULL, 'Ahmad Fauzi', 'Laki_Laki', NULL, NULL, 'ahmadfauzi', 'rahasia123', 'guru', ''),
(4, NULL, 'Rina Novianti', 'Perempuan', NULL, NULL, 'rinanovianti', 'pass456', 'guru', ''),
(5, NULL, 'Budi Santoso', 'Laki_Laki', NULL, NULL, 'budisantoso', '12345678', 'guru', ''),
(6, NULL, 'Siti Rahmawati', 'Perempuan', NULL, NULL, 'sitirahmawati', 'rahasia123', 'guru', ''),
(7, NULL, 'Hendri Kurniawan', 'Laki_Laki', NULL, NULL, 'hendrikurniawan', 'pass1234', 'guru', ''),
(8, NULL, 'Dewi Anggraini', 'Perempuan', NULL, NULL, 'dewianggraini', '12345abcd', 'guru', ''),
(9, NULL, 'Eko Prasetyo', 'Laki_Laki', NULL, NULL, 'ekoprasetyo', 'rahasia321', 'guru', ''),
(10, NULL, 'Ratna Sari', 'Perempuan', NULL, NULL, 'ratnasari', 'pass7890', 'guru', ''),
(11, NULL, 'Andi Wijaya', 'Laki_Laki', NULL, NULL, 'andiwijaya', 'password', 'guru', ''),
(12, NULL, 'Siti Nurhayati', 'Perempuan', NULL, NULL, 'sitinurhayati', 'rahasia456', 'guru', ''),
(13, NULL, 'Rizal Rahman', 'Laki_Laki', NULL, NULL, 'rizalrahman', 'pass4321', 'guru', ''),
(14, NULL, 'Linda Suryani', 'Perempuan', NULL, NULL, 'lindasuryani', '78901234', 'guru', ''),
(15, NULL, 'Dedi Kusuma', 'Laki_Laki', NULL, NULL, 'dedikusuma', 'rahasia0987', 'guru', ''),
(16, NULL, 'Yuliati Hartono', 'Laki_Laki', NULL, NULL, 'yuliatihartono', 'password123', 'guru', ''),
(17, NULL, 'Bayu Nugroho', 'Laki_Laki', NULL, NULL, 'bayunugroho', '56789012', 'guru', ''),
(18, NULL, 'Lina Sari', 'Perempuan', NULL, NULL, 'linasari', 'rahasia5678', 'guru', ''),
(19, NULL, 'Agus Santoso', 'Laki_Laki', NULL, NULL, 'agussantoso', 'passpass', 'guru', ''),
(20, NULL, 'Ratna Dewi', 'Perempuan', NULL, NULL, 'ratnadewi', '89012345', 'guru', ''),
(21, NULL, 'Arief Wibowo', 'Laki_Laki', NULL, NULL, 'ariefwibowo', 'rahasia789', 'guru', ''),
(22, NULL, 'Siti Maryam', 'Perempuan', NULL, NULL, 'sitimaryam', 'p4ssw0rd', 'guru', ''),
(23, NULL, 'Nina Puspita', 'Perempuan', NULL, NULL, 'ninapuspita', '1234pass', 'guru', ''),
(24, NULL, 'Adi Setiawan', 'Laki_Laki', NULL, NULL, 'adisetiawan', 'rahasia345', 'guru', ''),
(25, NULL, 'Rina Dewi', 'Perempuan', NULL, NULL, 'rinadewi', 'password456', 'guru', ''),
(26, NULL, 'Surya Nugraha', 'Laki_Laki', NULL, NULL, 'suryanugraha', '3456abcd', 'guru', ''),
(27, NULL, 'Mira Sari', 'Perempuan', NULL, NULL, 'mirasari', 'rahasia890', 'guru', ''),
(28, NULL, 'Bambang Kusumo', 'Laki_Laki', NULL, NULL, 'bambangkusumo', 'abc12345', 'guru', ''),
(29, NULL, 'Siska Lestari', 'Perempuan', NULL, NULL, 'siskalestari', 'rahasia678', 'guru', ''),
(30, NULL, 'Agung Prabowo', 'Laki_Laki', NULL, NULL, 'agungprabowo', '12345pass', 'guru', ''),
(31, NULL, 'Indah Wulandari', 'Perempuan', NULL, NULL, 'indahwulandari', 'rahasia901', 'guru', ''),
(32, NULL, 'Hadi Siswanto', 'Laki_Laki', NULL, NULL, 'hadisiswanto', 'pass6789', 'guru', ''),
(33, NULL, 'Rita Cahyani', 'Perempuan', NULL, NULL, 'ritacahyani', '9012abcd', 'guru', ''),
(34, NULL, 'Dodi Prasetya', 'Laki_Laki', NULL, NULL, 'dodiprasetya', 'rahasia234', 'guru', ''),
(35, NULL, 'Siska Putri', 'Perempuan', NULL, NULL, 'siskaputri', 'passpass', 'guru', ''),
(36, NULL, 'Hendra Gunawan', 'Laki_Laki', NULL, NULL, 'hendragunawan', '23456789', 'guru', ''),
(37, NULL, 'Rini Puspitasari', 'Perempuan', NULL, NULL, 'rinipuspitasari', 'rahasia567', 'guru', ''),
(38, NULL, 'Andika Wijaya', 'Laki_Laki', NULL, NULL, 'andikawijaya', 'password123', 'guru', ''),
(39, NULL, 'Dewi Lestari', 'Perempuan', NULL, NULL, 'dewilestari', '56789012', 'guru', ''),
(40, NULL, 'Rudi Setiawan', 'Laki_Laki', NULL, NULL, 'rudisetiawan', 'rahasia789', 'guru', ''),
(41, NULL, 'Siti Maryani', 'Perempuan', NULL, NULL, 'sitimaryani', 'passw0rd', 'guru', ''),
(42, NULL, 'Fajar Pratama', 'Laki_Laki', NULL, NULL, 'fajarpratama', '1234pass', 'guru', ''),
(43, NULL, 'Nina Sari', 'Perempuan', NULL, NULL, 'ninasari', 'rahasia345', 'guru', ''),
(44, NULL, 'Adi Permadi', 'Laki_Laki', NULL, NULL, 'adipermadi', 'password456', 'guru', ''),
(45, NULL, 'Rina Agustina', 'Perempuan', NULL, NULL, 'rinaagustina', '3456abcd', 'guru', ''),
(46, NULL, 'Eka Nugraha', 'Laki_Laki', NULL, NULL, 'ekanugraha', 'rahasia890', 'guru', ''),
(47, NULL, 'Arief Kusumo', 'Laki_Laki', NULL, NULL, 'ariefkusumo', 'abc12345', 'guru', ''),
(48, NULL, 'Siska Pratiwi', 'Perempuan', NULL, NULL, 'siskapratiwi', 'rahasia678', 'guru', ''),
(49, NULL, 'Agung Santoso', 'Laki_Laki', NULL, NULL, 'agungsantoso', '12345pass', 'guru', ''),
(50, NULL, 'Dina Puspita', 'Perempuan', NULL, NULL, 'dinapuspita', 'rahasia901', 'guru', ''),
(51, NULL, 'Bayu Wijaya', 'Laki_Laki', NULL, NULL, 'bayuwijaya', 'pass6789', 'guru', '');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `tambah_alternatif` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
    DECLARE id_terakhir INT;
    DECLARE kode_baru VARCHAR(250);
    
    SELECT MAX(id_guru) INTO id_terakhir FROM alternatif;
    
    IF id_terakhir IS NULL THEN
        SET kode_baru = 'A1';
    ELSE
        SET kode_baru = CONCAT('A', id_terakhir + 1);
    END IF;
    
    INSERT INTO alternatif (kode_alternatif, nm_guru)
    VALUES (kode_baru, NEW.nm_lengkap);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_guru` int(11) NOT NULL,
  `kode_alternatif` varchar(250) NOT NULL,
  `nm_guru` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_guru`, `kode_alternatif`, `nm_guru`) VALUES
(1, 'A1', 'Muhammad Kurniawan Dwi Hariyadi'),
(2, 'A2', 'Ahmad Fauzi'),
(3, 'A3', 'Rina Novianti'),
(4, 'A4', 'Budi Santoso'),
(5, 'A5', 'Siti Rahmawati'),
(6, 'A6', 'Hendri Kurniawan'),
(7, 'A7', 'Dewi Anggraini'),
(8, 'A8', 'Eko Prasetyo'),
(9, 'A9', 'Ratna Sari'),
(10, 'A10', 'Andi Wijaya'),
(11, 'A11', 'Siti Nurhayati'),
(12, 'A12', 'Rizal Rahman'),
(13, 'A13', 'Linda Suryani'),
(14, 'A14', 'Dedi Kusuma'),
(15, 'A15', 'Yuliati Hartono'),
(16, 'A16', 'Bayu Nugroho'),
(17, 'A17', 'Lina Sari'),
(18, 'A18', 'Agus Santoso'),
(19, 'A19', 'Ratna Dewi'),
(20, 'A20', 'Arief Wibowo'),
(21, 'A21', 'Siti Maryam'),
(22, 'A22', 'Nina Puspita'),
(23, 'A23', 'Adi Setiawan'),
(24, 'A24', 'Rina Dewi'),
(25, 'A25', 'Surya Nugraha'),
(26, 'A26', 'Mira Sari'),
(27, 'A27', 'Bambang Kusumo'),
(28, 'A28', 'Siska Lestari'),
(29, 'A29', 'Agung Prabowo'),
(30, 'A30', 'Indah Wulandari'),
(31, 'A31', 'Hadi Siswanto'),
(32, 'A32', 'Rita Cahyani'),
(33, 'A33', 'Dodi Prasetya'),
(34, 'A34', 'Siska Putri'),
(35, 'A35', 'Hendra Gunawan'),
(36, 'A36', 'Rini Puspitasari'),
(37, 'A37', 'Andika Wijaya'),
(38, 'A38', 'Dewi Lestari'),
(39, 'A39', 'Rudi Setiawan'),
(40, 'A40', 'Siti Maryani'),
(41, 'A41', 'Fajar Pratama'),
(42, 'A42', 'Nina Sari'),
(43, 'A43', 'Adi Permadi'),
(44, 'A44', 'Rina Agustina'),
(45, 'A45', 'Eka Nugraha'),
(46, 'A46', 'Arief Kusumo'),
(47, 'A47', 'Siska Pratiwi'),
(48, 'A48', 'Agung Santoso'),
(49, 'A49', 'Dina Puspita'),
(50, 'A50', 'Bayu Wijaya'),
(51, 'A51', 'hans');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(250) NOT NULL,
  `nm_kriteria` varchar(250) NOT NULL,
  `bobot` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `Keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nm_kriteria`, `bobot`, `status`, `Keterangan`) VALUES
(1, 'C1', 'Kehadiran', 3, 'BENEFIT', NULL),
(2, 'C2', 'Ketertiban', 4, 'BENEFIT', NULL),
(3, 'C3', 'Tugas', 4, 'BENEFIT', NULL),
(4, 'C4', 'Sikap', 5, 'BENEFIT', NULL),
(5, 'C5', 'Kemampuan', 3, 'BENEFIT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembobotan`
--

CREATE TABLE `pembobotan` (
  `id_nilai` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembobotan`
--

INSERT INTO `pembobotan` (`id_nilai`, `id_guru`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, '4'),
(2, 1, 2, '3'),
(3, 1, 3, '2'),
(4, 1, 4, '5'),
(5, 1, 5, '3'),
(6, 2, 1, '3'),
(7, 2, 2, '4'),
(8, 2, 3, '5'),
(9, 2, 4, '1'),
(10, 2, 5, '3'),
(11, 3, 1, '5'),
(12, 3, 2, '2'),
(13, 3, 3, '3'),
(14, 3, 4, '2'),
(15, 3, 5, '4'),
(16, 4, 1, '3'),
(17, 4, 2, '2'),
(18, 4, 3, '4'),
(19, 4, 4, '5'),
(20, 4, 5, '1'),
(21, 5, 1, '2'),
(22, 5, 2, '3'),
(23, 5, 3, '4'),
(24, 5, 4, '5'),
(25, 5, 5, '2'),
(26, 6, 1, '5'),
(27, 6, 2, '2'),
(28, 6, 3, '3'),
(29, 6, 4, '4'),
(30, 6, 5, '3'),
(31, 7, 1, '4'),
(32, 7, 2, '5'),
(33, 7, 3, '1'),
(34, 7, 4, '2'),
(35, 7, 5, '3'),
(36, 8, 1, '4'),
(37, 8, 2, '4'),
(38, 8, 3, '5'),
(39, 8, 4, '1'),
(40, 8, 5, '3'),
(41, 9, 1, '5'),
(42, 9, 2, '1'),
(43, 9, 3, '2'),
(44, 9, 4, '2'),
(45, 9, 5, '4'),
(46, 10, 1, '4'),
(47, 10, 2, '2'),
(48, 10, 3, '4'),
(49, 10, 4, '5'),
(50, 10, 5, '1'),
(51, 11, 1, '3'),
(52, 11, 2, '4'),
(53, 11, 3, '2'),
(54, 11, 4, '1'),
(55, 11, 5, '5'),
(56, 12, 1, '5'),
(57, 12, 2, '3'),
(58, 12, 3, '1'),
(59, 12, 4, '2'),
(60, 12, 5, '4'),
(61, 13, 1, '2'),
(62, 13, 2, '4'),
(63, 13, 3, '5'),
(64, 13, 4, '1'),
(65, 13, 5, '3'),
(66, 14, 1, '4'),
(67, 14, 2, '5'),
(68, 14, 3, '3'),
(69, 14, 4, '2'),
(70, 14, 5, '1'),
(71, 15, 1, '1'),
(72, 15, 2, '3'),
(73, 15, 3, '4'),
(74, 15, 4, '5'),
(75, 15, 5, '2'),
(76, 16, 1, '4'),
(77, 16, 2, '2'),
(78, 16, 3, '3'),
(79, 16, 4, '1'),
(80, 16, 5, '5'),
(81, 17, 1, '3'),
(82, 17, 2, '4'),
(83, 17, 3, '2'),
(84, 17, 4, '5'),
(85, 17, 5, '1'),
(86, 18, 1, '5'),
(87, 18, 2, '3'),
(88, 18, 3, '1'),
(89, 18, 4, '4'),
(90, 18, 5, '2'),
(91, 19, 1, '2'),
(92, 19, 2, '4'),
(93, 19, 3, '5'),
(94, 19, 4, '1'),
(95, 19, 5, '3'),
(96, 20, 1, '4'),
(97, 20, 2, '5'),
(98, 20, 3, '3'),
(99, 20, 4, '2'),
(100, 20, 5, '1'),
(101, 21, 1, '3'),
(102, 21, 2, '2'),
(103, 21, 3, '4'),
(104, 21, 4, '1'),
(105, 21, 5, '5'),
(106, 22, 1, '5'),
(107, 22, 2, '1'),
(108, 22, 3, '3'),
(109, 22, 4, '4'),
(110, 22, 5, '2'),
(111, 23, 1, '2'),
(112, 23, 2, '5'),
(113, 23, 3, '4'),
(114, 23, 4, '1'),
(115, 23, 5, '3'),
(116, 24, 1, '4'),
(117, 24, 2, '2'),
(118, 24, 3, '3'),
(119, 24, 4, '5'),
(120, 24, 5, '1'),
(121, 25, 1, '1'),
(122, 25, 2, '3'),
(123, 25, 3, '5'),
(124, 25, 4, '2'),
(125, 25, 5, '4'),
(126, 26, 1, '4'),
(127, 26, 2, '5'),
(128, 26, 3, '2'),
(129, 26, 4, '1'),
(130, 26, 5, '3'),
(131, 27, 1, '3'),
(132, 27, 2, '4'),
(133, 27, 3, '5'),
(134, 27, 4, '1'),
(135, 27, 5, '2'),
(136, 28, 1, '5'),
(137, 28, 2, '2'),
(138, 28, 3, '3'),
(139, 28, 4, '4'),
(140, 28, 5, '1'),
(141, 29, 1, '2'),
(142, 29, 2, '4'),
(143, 29, 3, '1'),
(144, 29, 4, '5'),
(145, 29, 5, '3'),
(146, 30, 1, '4'),
(147, 30, 2, '5'),
(148, 30, 3, '3'),
(149, 30, 4, '2'),
(150, 30, 5, '1'),
(151, 31, 1, '3'),
(152, 31, 2, '2'),
(153, 31, 3, '4'),
(154, 31, 4, '1'),
(155, 31, 5, '5'),
(156, 32, 1, '5'),
(157, 32, 2, '1'),
(158, 32, 3, '3'),
(159, 32, 4, '4'),
(160, 32, 5, '2'),
(161, 33, 1, '2'),
(162, 33, 2, '5'),
(163, 33, 3, '4'),
(164, 33, 4, '1'),
(165, 33, 5, '3'),
(166, 34, 1, '4'),
(167, 34, 2, '2'),
(168, 34, 3, '3'),
(169, 34, 4, '5'),
(170, 34, 5, '1'),
(171, 35, 1, '1'),
(172, 35, 2, '3'),
(173, 35, 3, '5'),
(174, 35, 4, '2'),
(175, 35, 5, '4'),
(176, 36, 1, '4'),
(177, 36, 2, '5'),
(178, 36, 3, '2'),
(179, 36, 4, '1'),
(180, 36, 5, '3'),
(181, 37, 1, '3'),
(182, 37, 2, '4'),
(183, 37, 3, '5'),
(184, 37, 4, '1'),
(185, 37, 5, '2'),
(186, 38, 1, '5'),
(187, 38, 2, '2'),
(188, 38, 3, '3'),
(189, 38, 4, '4'),
(190, 38, 5, '1'),
(191, 39, 1, '2'),
(192, 39, 2, '4'),
(193, 39, 3, '1'),
(194, 39, 4, '5'),
(195, 39, 5, '3'),
(196, 40, 1, '4'),
(197, 40, 2, '5'),
(198, 40, 3, '3'),
(199, 40, 4, '2'),
(200, 40, 5, '1'),
(201, 41, 1, '3'),
(202, 41, 2, '2'),
(203, 41, 3, '4'),
(204, 41, 4, '1'),
(205, 41, 5, '5'),
(206, 42, 1, '5'),
(207, 42, 2, '1'),
(208, 42, 3, '3'),
(209, 42, 4, '4'),
(210, 42, 5, '2'),
(211, 43, 1, '2'),
(212, 43, 2, '5'),
(213, 43, 3, '4'),
(214, 43, 4, '1'),
(215, 43, 5, '3'),
(216, 44, 1, '4'),
(217, 44, 2, '2'),
(218, 44, 3, '3'),
(219, 44, 4, '5'),
(220, 44, 5, '1'),
(221, 45, 1, '1'),
(222, 45, 2, '3'),
(223, 45, 3, '5'),
(224, 45, 4, '2'),
(225, 45, 5, '4'),
(226, 46, 1, '4'),
(227, 46, 2, '5'),
(228, 46, 3, '2'),
(229, 46, 4, '1'),
(230, 46, 5, '3'),
(231, 47, 1, '3'),
(232, 47, 2, '4'),
(233, 47, 3, '5'),
(234, 47, 4, '1'),
(235, 47, 5, '2'),
(236, 48, 1, '5'),
(237, 48, 2, '2'),
(238, 48, 3, '3'),
(239, 48, 4, '4'),
(240, 48, 5, '1'),
(241, 49, 1, '2'),
(242, 49, 2, '4'),
(243, 49, 3, '1'),
(244, 49, 4, '5'),
(245, 49, 5, '3'),
(246, 50, 1, '4'),
(247, 50, 2, '5'),
(248, 50, 3, '3'),
(249, 50, 4, '2'),
(250, 50, 5, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `LES` (`id_guru`),
  ADD KEY `KRITERIA` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembobotan`
--
ALTER TABLE `pembobotan`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembobotan`
--
ALTER TABLE `pembobotan`
  ADD CONSTRAINT `KRITERIA` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `LES` FOREIGN KEY (`id_guru`) REFERENCES `alternatif` (`id_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
