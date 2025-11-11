-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 01:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_teknisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_bergabung` date NOT NULL,
  `status` enum('Aktif','Non-Aktif') DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama`, `email`, `telepon`, `spesialisasi`, `alamat`, `tanggal_bergabung`, `status`, `created_at`) VALUES
(1, 'Ahmad Rizki', 'ahmad.rizki@email.com', '081234567890', 'Jaringan Komputer', 'Jl. Merdeka No. 123, Jakarta', '2023-01-15', 'Aktif', '2025-11-11 07:40:10'),
(2, 'Siti Nurhaliza', 'siti.nurhaliza@email.com', '081234567891', 'Hardware Repair', 'Jl. Sudirman No. 45, Bandung', '2023-02-20', 'Aktif', '2025-11-11 07:40:10'),
(3, 'Budi Santoso', 'budi.santoso@email.com', '081234567892', 'Software Installation', 'Jl. Thamrin No. 67, Surabaya', '2023-03-10', 'Aktif', '2025-11-11 07:40:10'),
(4, 'Maya Sari', 'maya.sari@email.com', '081234567893', 'Database Administrator', 'Jl. Gatot Subroto No. 89, Medan', '2023-04-05', 'Non-Aktif', '2025-11-11 07:40:10'),
(6, 'Ridho Nur azizi', 'ridhoazizi816@gmail.com', '081223245675', 'Software Development', 'solo', '2016-02-02', 'Aktif', '2025-11-11 11:52:17'),
(7, 'devin', 'Aripganteng@gmail.com', '081223245675', 'Cloud Computing', 'semarang', '2017-08-12', 'Aktif', '2025-11-11 12:01:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
