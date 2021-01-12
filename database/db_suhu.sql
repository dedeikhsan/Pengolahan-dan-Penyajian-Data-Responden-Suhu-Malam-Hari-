-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 05.53
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_suhu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyajiandata`
--

CREATE TABLE `penyajiandata` (
  `id_tbl` int(11) NOT NULL,
  `data_suhu` varchar(20) NOT NULL,
  `d_frekuensi` varchar(20) NOT NULL,
  `d_f_komulatif` varchar(20) NOT NULL,
  `d_f_relatif` varchar(20) NOT NULL,
  `presentase_d_f_relatif` varchar(20) NOT NULL,
  `d_f_relatif_komulatif` varchar(20) NOT NULL,
  `presentase_d_f_relatif_komulatif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyajiandata`
--

INSERT INTO `penyajiandata` (`id_tbl`, `data_suhu`, `d_frekuensi`, `d_f_komulatif`, `d_f_relatif`, `presentase_d_f_relatif`, `d_f_relatif_komulatif`, `presentase_d_f_relatif_komulatif`) VALUES
(1, '21 - 23', '4', '4', '0,09', '9%', '0,09', '9%'),
(2, '24 - 26', '8', '12', '0,17', '17%', '0,26', '26%'),
(3, '27 - 29', '25', '37', '0,53', '53%', '0,79', '73%'),
(4, '30 - 32', '10', '47', '0,21', '21%', '1,00', '100%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `suhu` varchar(2) NOT NULL,
  `kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id_survey`, `nama`, `suhu`, `kabupaten`) VALUES
(1, 'Thomas Andrew I', '21', 'Jombang'),
(2, 'Muhammad Rayhan Rachmansyah', '21', 'Sidoarjo'),
(3, 'Brian Firmansyah Kartono Soebari', '23', 'Surabaya'),
(4, 'Galih Arum', '23', 'Surabaya'),
(5, 'Elsa Febriantika', '24', 'Jombang'),
(6, 'Imalia Rosyida', '24', 'Tuban'),
(7, 'Muhammad Alfyando', '24', 'Nganjuk'),
(8, 'Nadhif Mahardika Awandi', '24', 'Serang'),
(9, 'Agung Handayanto', '25', 'Surabaya'),
(10, 'Zata Hashfi', '26', 'Duri'),
(11, 'Muhammad Farhan', '26', 'Pasuruan'),
(12, 'Nizar Abdurrahman', '26', 'Pasuruan'),
(13, 'Elsa Shantyka Putri Azzahra', '27', 'Sidoarjo'),
(14, 'Muhammad Dafa Ardiansyah', '27', 'Sidoarjo'),
(15, 'Husain Taufiqqurrahman', '27', 'Karawang'),
(16, 'Harun Al Rasyid', '28', 'Surabaya'),
(17, 'Anwar', '28', 'Surabaya'),
(18, 'Taufik Hidayat', '28', 'Sidoarjo'),
(19, 'Eren Dio Sefrila', '28', 'Sidoarjo'),
(20, 'Dimas Seno Herlambang', '28', 'Sidoarjo'),
(21, 'Ahmad Yuan Arby', '28', 'Sidoarjo'),
(22, 'Dimas Zainal Muttaqin', '28', 'Sidoarjo'),
(23, 'Mochammad Arya Salsabila', '28', 'Sidoarjo'),
(24, 'Pande Yogam', '28', 'Badung'),
(25, 'Wisang Firmanto', '28', 'Sidoarjo'),
(26, 'Eki Pristiyanto', '28', 'Sidoarjo'),
(27, 'Guntur Adhi P', '28', 'Pasuruan'),
(28, 'Aditya Pameswara', '29', 'Kediri'),
(29, 'Aditya Rizqi Ardhana', '29', 'Surabaya'),
(30, 'Ahmad Wahyu Rafsan Zani', '29', 'Mojokerto'),
(31, 'Anisa Nurcahyani', '29', 'Surabaya'),
(32, 'Real Ananda Kristi', '29', 'Surabaya'),
(33, 'Farra Wardah', '29', 'Surabaya'),
(34, 'Fatimatuz Zahroh', '29', 'Tuban'),
(35, 'Danang Rahmatullah Sukarno', '29', 'Surabaya'),
(36, 'Alfinas Agung Mujiono', '29', 'Surabaya'),
(37, 'Dicky Giancini', '29', 'Surabaya'),
(38, 'Mochammad Yanuar Fitroni', '30', 'Sidoarjo'),
(39, 'Achmad Bias Firmansyah', '30', 'Surabaya'),
(40, 'Dio Farrel Putra Rachmawan', '30', 'Sidoarjo'),
(41, 'Nur Ulfa Mauludina', '30', 'Surabaya'),
(42, 'Puteri Aulia Fahlia', '30', 'Sidoarjo'),
(43, 'Faradella Anggi', '30', 'Surabaya'),
(44, 'Yanuar Nur Ilmansyah', '30', 'Surabaya'),
(45, 'Eka Zuni Selviana', '31', 'Jombang'),
(46, 'Rizal Afandi', '31', 'Surabaya'),
(47, 'Achmad Arsa Abdillah M', '32', 'Tuban');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penyajiandata`
--
ALTER TABLE `penyajiandata`
  ADD PRIMARY KEY (`id_tbl`);

--
-- Indeks untuk tabel `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penyajiandata`
--
ALTER TABLE `penyajiandata`
  MODIFY `id_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
