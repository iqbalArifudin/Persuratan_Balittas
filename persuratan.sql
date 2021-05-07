-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2021 pada 09.27
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dari` varchar(128) NOT NULL,
  `Perihal` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `status` enum('Konsep Surat diperiksa Kabalai','Konsep Surat disesuaikan Tata Naskah Dinas','Pengajuan paraf Kasubag TU dan Ttd Kabalai','Selesai','Penomoran dan Stempel balai','pengiriman surat melalui Email/whatsapp','pengiriman surat via Pos/JNE/TIKI dll','pengiriman surat melalui Faksimili') NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `file_surat` varchar(128) NOT NULL,
  `lampiran` varchar(258) NOT NULL,
  `surat_jadi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_user`, `dari`, `Perihal`, `tgl_masuk`, `tgl_diterima`, `status`, `keterangan`, `file_surat`, `lampiran`, `surat_jadi`) VALUES
(42, 30, 'Pengonsep Surat', 'Lampiran Permohonan', '2021-05-03', '0000-00-00', '', '-', 'SERTIFIKASI_KEAHLIAN_DI_BIDANG_IT61.doc', 'Sayida_Kayyisa_Sania_(3)1.docx', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `jabatan` enum('Admin','Agendaris Surat','Sekretaris','Konseptor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_telp`, `username`, `password`, `foto`, `jabatan`) VALUES
(24, 'Arga Ardiansyach', 'nazwa19bina@gmail.com', '085606330960', 'admin', 'admin', '7_avatar-512.png', 'Admin'),
(26, 'Moch Iqbal Arifudin', 'mochiqbalarifudin@gmail.com', '085785689270', 'sekretaris', 'sekretaris', 'WhatsApp_Image_2021-03-03_at_21_28_301.jpeg', 'Sekretaris'),
(27, 'Arvan Nur Rahman', 'nazwa19bina@gmail.com', '085999663399', 'pengonsep', 'pengonsep', '78-786207_user-avatar-png-user-avatar-icon-png-transparent.png', 'Konseptor'),
(29, 'Winandri Kusuma', 'nazwa19bina@gmail.com', '089111111456', 'agendaris', 'agendaris', 'iconfinder-8-avatar-2754583_120515.png', 'Agendaris Surat'),
(30, 'Fitri Setia Puspa Rini', 'puspa.kementan@gmail.com', '', '198402232009122003', 'puspa', 'png-clipart-consultant-computer-icons-businessperson-batism-logo-monochrome.png', 'Konseptor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
