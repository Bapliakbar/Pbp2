-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 06:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `komposisi_gaji`
--

CREATE TABLE `komposisi_gaji` (
  `id_komponen` int(10) NOT NULL,
  `nama_komponen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(10) NOT NULL,
  `nama_divisi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Human Resource Development'),
(2, 'General Affair'),
(3, 'Corporate Secretary'),
(4, 'Informatin System');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `karyawan_id` int(10) NOT NULL,
  `nama_kar` varchar(45) NOT NULL,
  `nip` char(16) NOT NULL,
  `total_gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`karyawan_id`, `nama_kar`, `nip`, `total_gaji`) VALUES
(1, 'Luthfi Arya Manggala', '444001', 'Rp5.000.000'),
(2, 'Fadhail Bima', '444002', 'Rp3.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `nama_jabatan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff'),
(2, 'Manager'),
(3, 'General Manager'),
(4, 'Vice President');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `jabatan_id` int(10) NOT NULL,
  `divisi_id` int(10) NOT NULL,
  `nip` char(16) NOT NULL,
  `nama_kar` varchar(50) NOT NULL,
  `jk_kar` enum('P','L') NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `email_kar` varchar(80) NOT NULL,
  `stat_kar` enum('A','TA') NOT NULL,
  `tgl_msk` datetime NOT NULL,
  `tgl_kontrakhabis` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `jabatan_id`, `divisi_id`, `nip`, `nama_kar`, `jk_kar`, `no_hp`, `email_kar`, `stat_kar`, `tgl_msk`, `tgl_kontrakhabis`) VALUES
(1, 3, 2, '444001', 'Luthfi Arya Manggala', 'L', '08111806159', 'luthfaryamg@gmail.com', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 1, '444002', 'Fadhail Bima', 'L', '08113312912', 'fadhail@rocketmail.com', 'A', '2022-10-13 00:00:00', '2027-10-13 00:00:00'),
(3, 3, 1, '444003', 'Ivan Andrian', 'L', '0811111111', 'ivan@gmail.com', 'A', '2022-10-14 00:00:00', '2027-10-14 00:00:00'),
(4, 3, 1, '444004', 'Putra Fajar', 'L', '08222222222', 'fajar@gmail.com', 'A', '2022-12-10 00:00:00', '2027-12-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `karyawan_id` int(10) NOT NULL,
  `tgl_hadir` datetime NOT NULL,
  `stat_hadir` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Farhan Dwicahyo', 'farhandwicahyoo@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'OPERATOR INI YE', 'dc@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(6, 'DOSEN INI YA', 'dece@gmail.com', '202cb962ac59075b964b07152d234b70', 'dosen'),
(9, 'admin', 'bpyd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komposisi_gaji`
--
ALTER TABLE `komposisi_gaji`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komposisi_gaji`
--
ALTER TABLE `komposisi_gaji`
  MODIFY `id_komponen` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `karyawan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `FK_karyawanid` FOREIGN KEY (`karyawan_id`) REFERENCES `tb_karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
