-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net



SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `forward_chaining`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
  `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  PRIMARY KEY (`id_diagnosa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `kode`, `penyakit`, `nama`) VALUES
(1, 'D01', 'Bercak Hitam', 'Disemprot fungisida yang berbahan aktif Zineb atau Maneb pada konsentrasi yang dianjurkan.'),
(2, 'D02', 'Karat daun', 'Disemprot fungisida yang berbahan aktif Zineb atau Maneb pada konsentrasi yang dianjurkan.'),
(3, 'D03', 'Tepung mildew', 'Memetik daun yang terserang untuk dimusnahkan dan menjaga kebersihan kebun (sanitasi).'),
(4, 'D04', 'Bengkak pangkal batang', 'Disemprot oleh bakterisida yang berbahan aktif Streptomisin atau Oksitetrasikin.'),
(5, 'D05', 'Mosaik (belang-belang)', 'Penanaman bibit yang sehat, pemeliharaan tanaman secara intensif.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode`, `nama`, `pertanyaan`, `gambar`) VALUES
(1, 'G01', 'Muncul Bercak hitam', 'Apakah daun bercak hitam-pekat dan tepinya bergerigi ?', 'a.jpg'),
(2, 'G02', 'Karat daun', 'Apakah ada bintik-bintik warna jingga kemerah-merahan pada sisi bawah daun, pada sisi daun atas terdapat bercak bersudut warna kemerah-merahan ?', 'b.jpg'),
(3, 'G03', 'Tepung mildew', 'Apakah terdapat tepung/lapisan putih pada permukaan daun sebelah bawah dan atas ?', 'c.jpg'),
(4, 'G04', 'Bengkak pangkal batang', 'Apakah terjadi pembengkakan pada batang daun ?', 'd.jpg'),
(5, 'G05', 'Mosaik (belang-belang)', 'Apakah daun menguning dan belang-belang, serta tulang-tulang daunnya seperti jala. ?', 'e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE IF NOT EXISTS `konsultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  PRIMARY KEY (`id_konsultasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `tanggal`, `nama`, `id_diagnosa`) VALUES
(1, '2017-08-16', 'sandra', 1),
(2, '2017-08-25', 'testin', 1),
(3, '2017-08-25', 'demo', 0),
(4, '2017-08-25', 'vv', 1),
(5, '2017-08-25', 'test', 1),
(6, '2017-08-25', 'ccva', 0),
(7, '2017-08-25', 'werw', 1),
(8, '2017-08-26', 'ffb', 4),
(9, '2017-08-26', 'dd', 4),
(10, '2017-08-26', 'zaenab', 4),
(11, '2017-08-26', 'nna', 1),
(12, '2017-08-26', 'fads', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_detail`
--

CREATE TABLE IF NOT EXISTS `konsultasi_detail` (
  `id_konsultasi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_konsultasi` int(11) NOT NULL,
  `id_pengetahuan` int(11) NOT NULL,
  `jawaban` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_konsultasi_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `konsultasi_detail`
--

INSERT INTO `konsultasi_detail` (`id_konsultasi_detail`, `id_konsultasi`, `id_pengetahuan`, `jawaban`) VALUES
(1, 17, 1, 'N'),
(2, 17, 2, 'N'),
(3, 17, 4, 'Y'),
(4, 17, 5, 'Y'),
(5, 1, 1, 'Y'),
(6, 1, 1, 'N'),
(7, 1, 2, 'Y'),
(8, 1, 3, 'N'),
(9, 2, 1, 'Y'),
(10, 2, 1, 'Y'),
(11, 2, 1, 'N'),
(12, 2, 2, 'Y'),
(13, 2, 3, 'N'),
(14, 3, 1, 'Y'),
(15, 3, 1, 'N'),
(16, 3, 2, 'N'),
(17, 3, 4, 'Y'),
(18, 3, 5, 'Y'),
(19, 4, 1, 'N'),
(20, 4, 2, 'Y'),
(21, 4, 3, 'N'),
(22, 5, 1, 'N'),
(23, 5, 2, 'Y'),
(24, 5, 3, 'N'),
(25, 6, 1, 'N'),
(26, 6, 2, 'N'),
(27, 6, 4, 'Y'),
(28, 6, 5, 'Y'),
(29, 7, 1, 'Y'),
(30, 8, 1, 'N'),
(31, 8, 2, 'Y'),
(32, 9, 1, 'N'),
(33, 9, 2, 'Y'),
(34, 10, 1, 'N'),
(35, 10, 2, 'Y'),
(36, 11, 1, 'Y'),
(37, 12, 1, 'N'),
(38, 12, 2, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE IF NOT EXISTS `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala` int(11) NOT NULL,
  `y_gejala` int(11) NOT NULL,
  `n_gejala` int(11) NOT NULL,
  `y_diagnosa` int(11) NOT NULL,
  `n_diagnosa` int(11) NOT NULL,
  PRIMARY KEY (`id_pengetahuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `id_gejala`, `y_gejala`, `n_gejala`, `y_diagnosa`, `n_diagnosa`) VALUES
(1, 1, 0, 2, 1, 0),
(2, 2, 0, 0, 4, 2),
(3, 3, 4, 0, 0, 1),
(4, 4, 5, 0, 0, 2),
(5, 5, 6, 0, 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
