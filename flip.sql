-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Jan 2021 pada 15.43
-- Versi server: 10.1.28-MariaDB
-- Versi PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_error`
--

CREATE TABLE `log_error` (
  `id` bigint(20) NOT NULL,
  `log_error` longtext,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `withdraw_req`
--

CREATE TABLE `withdraw_req` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `bank_code` varchar(5) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `time_served` datetime DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `serialid` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `withdraw_req`
--

INSERT INTO `withdraw_req` (`id`, `customer_id`, `bank_code`, `account_number`, `amount`, `remark`, `status`, `timestamp`, `beneficiary_name`, `receipt`, `time_served`, `fee`, `serialid`) VALUES
(1, 1, '014', '123456', 100000, 'coba', 'SUCCESS', '2021-01-08 15:18:13', 'PT FLIP', 'https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg', '2021-01-08 17:05:55', 4000, 7111369304);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_error`
--
ALTER TABLE `log_error`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `withdraw_req`
--
ALTER TABLE `withdraw_req`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_error`
--
ALTER TABLE `log_error`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `withdraw_req`
--
ALTER TABLE `withdraw_req`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
