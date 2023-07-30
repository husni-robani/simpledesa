-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 10.49
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawangi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `conf_sistem`
--

CREATE TABLE `conf_sistem` (
  `id` int(5) NOT NULL,
  `desc` varchar(20) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `jenis` int(1) DEFAULT NULL COMMENT '1 profile, 2 sistem',
  `gambar` int(1) DEFAULT NULL COMMENT '1 = YA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `conf_sistem`
--

INSERT INTO `conf_sistem` (`id`, `desc`, `content`, `jenis`, `gambar`) VALUES
(1, 'Judul', 'Aplikasi Pelayanan Desa Karyawangi', 2, NULL),
(2, 'Sub Judul', 'Desa Karyawangi', 2, NULL),
(5, 'logo', 'logoo.png', 1, 1),
(6, 'Singkatan ', 'KARPONG', 2, NULL),
(7, 'Nama Desa', 'Desa Karyawangi', 1, NULL),
(8, 'Kabupaten', 'Kabupaten Bandung Barat', 1, NULL),
(9, 'kop_1', 'PEMERINTAH KABUPATEN BANDUNG BARAT', 3, NULL),
(10, 'kop_2', 'KECAMATAN PARONGPONG', 3, NULL),
(11, 'kop_3', 'DESA KARYAWANGI', 3, NULL),
(12, 'Alamat Desa', 'Jl. Karyawangi No. 81 Telp. 081 624 799 163', 1, NULL),
(14, 'Kode Desa', '40559', 1, NULL),
(15, 'Gambar Depan', '161221-034834-1678937008.jpg', 2, 1),
(16, 'Kecamatan', 'Kecamatan Parongpong', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id` int(2) NOT NULL,
  `nama` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Protestan'),
(4, 'Katolik'),
(5, 'Hindu'),
(6, 'Buddha'),
(7, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_penduduk`
--

CREATE TABLE `tb_data_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(25) DEFAULT NULL,
  `no_nik` varchar(25) DEFAULT NULL,
  `nama_lengkap` varchar(120) DEFAULT NULL,
  `alamat_kampung` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` int(2) DEFAULT NULL,
  `pendidikan` int(2) DEFAULT NULL,
  `jenis_pekerjaan` int(2) DEFAULT NULL,
  `status_perkawinan` int(2) DEFAULT NULL,
  `kewarganegaraan` varchar(3) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `createdby` varchar(20) DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL,
  `rowstatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_penduduk`
--

INSERT INTO `tb_data_penduduk` (`id`, `no_kk`, `no_nik`, `nama_lengkap`, `alamat_kampung`, `rt`, `rw`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `jenis_pekerjaan`, `status_perkawinan`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `keterangan`, `createdby`, `createdon`, `modifiedon`, `rowstatus`) VALUES
(15, '3207225469860002', '32072326799100204', 'Ujang Rismanto Jaya', '	Pajaten', '003', '007', 'L', 'Ciamis', '1987-06-01', 1, 13, 99, 2, 'WNI', 'Suyamta', 'Nurjanah', '-', 'Aldy Setiawan', '2020-10-23 16:33:50', '2022-10-23 08:12:00', 1),
(16, '3603456704080025', '36034569871010006', 'Pandi waluyo prasetyo', 'Kampung Talaga', '001', '002', 'L', 'Tangerang ', '1992-03-05', 1, 11, 6, 4, 'WNI', 'Supriyanto', 'Sarmanah', '-', 'Aldy Setiawan', '2020-10-23 16:33:50', NULL, 1),
(17, '3329185246160007', '33293154978600021', 'ADITYA YULI NUGRAHA', 'Cikakak', '013', '002', 'L', 'Cilacap', '1997-06-28', 1, 11, 6, 3, 'WNI', 'Nopriansyah', 'Helena', '-', 'Aldy Setiawan', '2020-10-23 16:33:50', NULL, 1),
(18, '1854810205950003', '37895212708190013', 'Imas saribanon', 'kadongdong', '003', '003', 'P', 'Sukabumi ', '1985-09-17', 1, 11, 6, 2, 'WNI', 'Moh hanafi', 'Handayani', '-', 'Aldy Setiawan', '2020-10-23 16:33:50', NULL, 1),
(19, '9878140205950004', '36730127484160013', 'Muslih alqusairi', 'Nanggerang', '001', '006', 'L', 'Pandeglang', '1997-06-28', 2, 11, 6, 1, 'WNA', 'HAKIKI', 'Rodiyah', '-', 'Aldy Setiawan', '2020-10-23 16:33:50', NULL, 1),
(20, '4625840205950005', '18011402059500014', 'Mas\'ud Suherman Jaya', 'Kampung Cipeteuy', '06', '01', 'L', 'Pandeglang', '1991-08-14', 1, 11, 1, 2, 'WNI', 'Sanjaya', 'Suba\'ah', '', 'Aldy Setiawan', '2020-10-30 03:57:47', NULL, 1),
(21, '1234567891011', '1234567891011', 'Adnan Mubarok', 'Ciujung', '001', '003', 'L', 'Serang', '1997-08-09', 1, 6, 3, 1, 'WNI', 'Joko Kendil', 'Kendil Joko', '', 'Mumun Munjiah', '2022-10-23 06:50:48', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(3) NOT NULL,
  `id_sub` int(2) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `id_sub`, `nama`, `warna`) VALUES
(1, 0, 'Kepala Desa', 'oren'),
(3, 1, 'Sekretaris Desa', 'biru'),
(4, 3, 'Kaur TU & Umum', 'hijau'),
(5, 3, 'Kaur Keuangan', 'hijau'),
(6, 3, 'Kaur Perencanaan', 'hijau'),
(7, 1, 'Kasi Pemerintahan', 'biru'),
(8, 1, 'Kasi Kesejahteraan', 'biru'),
(9, 1, 'Kasi Pelayanan', 'biru'),
(10, 7, 'Staff Pemerintahan', 'magenta'),
(11, 8, 'Staff Kesejahteraan', 'magenta'),
(12, 9, 'Staff Pelayanan', 'magenta'),
(13, 4, 'Staff TU & Umum', 'magenta'),
(14, 5, 'Staff Keuangan', 'magenta'),
(15, 6, 'Staff Honorer', 'ungu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_usaha`
--

CREATE TABLE `tb_jenis_usaha` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_usaha`
--

INSERT INTO `tb_jenis_usaha` (`id`, `nama`) VALUES
(1, 'ATK dan Fotocopy'),
(2, 'Bengkel Mobil'),
(3, 'Bengkel Motor'),
(4, 'Bensin Eceran'),
(5, 'Kelontong'),
(6, 'Perdagangan'),
(7, 'Service Komputer'),
(8, 'Service TV'),
(9, 'Warung Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kawin`
--

CREATE TABLE `tb_kawin` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `singkat` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kawin`
--

INSERT INTO `tb_kawin` (`id`, `nama`, `singkat`) VALUES
(1, 'Tidak Kawin', 'TK'),
(2, 'Kawin', 'K'),
(3, 'Cerai Hidup', 'CH'),
(4, 'Cerai Mati', 'CM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu_surat`
--

CREATE TABLE `tb_menu_surat` (
  `id` int(3) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu_surat`
--

INSERT INTO `tb_menu_surat` (`id`, `nama_menu`, `url`, `icon`, `kode`) VALUES
(1, 'Surat Keterangan Usaha', '?page=sku', 'fas fa-envelope', '503'),
(2, 'Surat Keterangan Domisili', '?page=domisili', 'fas fa-envelope', '470'),
(3, 'Surat Keterangan Domisili Usaha', '?page=domisili_usaha', 'fas fa-envelope', NULL),
(4, 'Surat Keterangan Domisili Yayasan', '?page=domisili_yayasan', 'fas fa-envelope', NULL),
(5, 'Surat Keterangan Tidak Mampu', '?page=tidak_mampu', 'fas fa-envelope', '460'),
(6, 'Surat Keterangan Emergency', '?page=emergency', 'fas fa-envelope', NULL),
(7, 'Surat Keterangan Pindah', '?page=pindah', 'fas fa-envelope', NULL),
(8, 'Surat Keterangan KTP Sementara', '?page=ktp_sementara', 'fas fa-envelope', NULL),
(9, 'Surat Keterangan Beda Nama KTP/KK', '?page=beda_nama', 'fas fa-envelope', NULL),
(10, 'Surat Keterangan Numpang Nikah', '?page=numpang_nikah', 'fas fa-envelope', NULL),
(11, 'Surat Keterangan Nikah Secara Agama', '?page=nikah_agama', 'fas fa-envelope', NULL),
(12, 'Surat Keterangan Menikah', '?page=menikah', 'fas fa-envelope', NULL),
(13, 'Surat Keterangan Belum Pernah Menikah', '?page=belum_menikah', 'fas fa-envelope', '474.2'),
(15, 'Surat Keterangan Kelahiran', '?page=kelahiran', 'fas fa-envelope', NULL),
(16, 'Surat Keterangan Akte Kelahiran Sementara', '?page=akte_kelahiran', 'fas fa-envelope', NULL),
(17, 'Surat Keterangan Kematian', '?page=kematian', 'fas fa-envelope', '474.3'),
(18, 'Surat Keterangan Ahli Waris', '?page=waris', 'fas fa-envelope', NULL),
(19, 'Surat Keterangan Pemakaman', '?page=pemakaman', 'fas fa-envelope', '474.3'),
(20, 'Surat Keterangan Duda/Janda', '?page=duda_janda', 'fas fa-envelope', NULL),
(21, 'Surat Keterangan Jual Sanda/Gadai', '?page=jual_gadai', 'fas fa-envelope', NULL),
(22, 'Surat Keterangan Belum Memiliki Rumah', '?page=belum_memiliki_rumah', 'fas fa-envelope', NULL),
(23, 'Surat Keterangan KWH Listrik An. Orang Lain', '?page=kwh_listrik', 'fas fa-envelope', NULL),
(24, 'Surat Keterangan Penghasilan Untuk Pend.', '?page=penghasilan_pendidikan', 'fas fa-envelope', NULL),
(25, 'Surat Keterangan Penghasilan', '?page=penghasilan', 'fas fa-envelope', NULL),
(26, 'Surat Keterangan Laporan Kehilangan', '?page=laporan_kehilangan', 'fas fa-envelope', NULL),
(27, 'Surat Pengantar SKCK', '?page=skck', 'fas fa-envelope', '331'),
(28, 'Surat Izin Keramaian', '?page=izin_keramaian', 'fas fa-envelope', '503');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenkel` enum('Pria','Wanita','','') DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  `createdon` date DEFAULT NULL,
  `createdby` varchar(20) DEFAULT NULL,
  `rowstatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `jabatan`, `nama_pegawai`, `email`, `no_hp`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenkel`, `aktif`, `createdon`, `createdby`, `rowstatus`) VALUES
(4, '5874369', '1', 'Dadang Sudayat., S.E', 'aldysetiaa@gmail.com', '085216479907', 'Menes Pandeglang', 'Pandeglang', '1996-05-15', 'Pria', 1, NULL, NULL, 1),
(11, '8575126', '3', 'Tatang Sutardi', 'aldysetiaa@gmail.com', '085216479907', 'Menes Pandeglang', 'Pandeglang', '1996-11-06', 'Pria', 1, NULL, NULL, 1),
(14, '5959412', '4', 'Mumun Munjiah', 'mumun.mnj@gmail.com', '085151548623', 'Jakarta Barat', 'Jakarta', '1995-08-01', '', 1, '2022-10-22', 'Aldy Setiawan', 1),
(15, '2846548', '5', 'Siti Munjayanah', 'munjayanah@gmail.com', '081258415452', 'Pandeglang', 'Pandeglang', '1996-12-17', NULL, 1, NULL, NULL, 1),
(16, '5455157', '6', '	Ade lili Nuryani', 'lili.nuryani@gmail.com', '085715462323', 'Pandeglang', 'Pandeglang', '1996-08-22', NULL, 1, NULL, NULL, 1),
(17, '5445454', '7', 'Ratu Tatu Rodiyah', 'tatu.r@gmail.com', '083815451545', 'Pandeglang', 'Pandeglang', '1997-04-15', NULL, 1, NULL, NULL, 1),
(18, '4856184', '8', 'Yongki hartoni', 'yongki@gmail.com', '085854855215', 'Pandeglang', 'Pandeglang', '1996-09-11', NULL, 1, NULL, NULL, 1),
(19, '1587989', '9', 'Erdaleni', 'erd@gmail.com', '085218795665', 'Pandeglang', 'Pandeglang', '1997-06-28', NULL, 1, NULL, NULL, 1),
(20, '2187485', '10', 'Yuli Yana', 'yuli@gmail.com', '089258484652', 'Pandeglang', 'Pandeglang', '1996-09-12', NULL, 1, NULL, NULL, 1),
(21, '4854551', '11', 'Siti Nur Wakhidah', 'wakhidahlia@gmail.com', '085451548712', 'Pandeglang', 'Pandeglang', '1997-06-28', 'Wanita', 1, NULL, NULL, 1),
(22, '2184841', '12', '	Ade sopian', 'sopian.ade@yahoo.com', '083841515485', 'Pandeglang', 'Pandeglang', '1997-06-17', NULL, 1, NULL, NULL, 1),
(23, '8542369', '15', 'RISHA OKTAVIYANI', 'rishaoktaviyani@gmail.com', '085465874626', 'Serang', 'Serang', '0000-00-00', 'Wanita', 1, '2022-10-22', 'Aldy Setiawan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id`, `nama`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Buruh Tani'),
(3, 'Dagang'),
(4, 'Guru'),
(5, 'Guru Agama'),
(6, 'Karyawan Swasta'),
(7, 'Mengurus Rumah Tangga'),
(8, 'Paraji'),
(9, 'Pensiunan'),
(10, 'Petani/Peternak'),
(11, 'PNS/TNI/Polri'),
(12, 'Pegawai BUMN'),
(13, 'Honorer'),
(14, 'Sopir'),
(15, 'Tukang Kayu'),
(16, 'Wiraswasta'),
(17, 'Bidan'),
(18, 'Perawat/Dokter'),
(19, 'Buruh Bangunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id`, `nama`) VALUES
(1, 'Belum/Tidak Sekolah'),
(2, 'PAUD'),
(3, 'TK'),
(4, 'MI/SD'),
(5, 'SMP/MTs/SLTP'),
(6, 'SMA/SMK/SLTA'),
(7, 'Diploma I (D1)'),
(8, 'Diploma II (D2)'),
(9, 'Diploma III (D3)'),
(10, 'Diploma IV (D4)'),
(11, 'Strata I (S1)'),
(12, 'Strata II (S2)'),
(13, 'Strata III (S3)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(8) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_surat` text DEFAULT NULL,
  `tanda_tangan` text NOT NULL,
  `id_warga` int(5) NOT NULL,
  `jenis_warga` int(2) NOT NULL,
  `arsip` int(1) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `createdby` varchar(20) DEFAULT NULL,
  `rowstatus` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `jenis_surat`, `no_surat`, `nama_surat`, `tanggal`, `isi_surat`, `tanda_tangan`, `id_warga`, `jenis_warga`, `arsip`, `createdon`, `createdby`, `rowstatus`) VALUES
(64, 'SKBPM', '474.2/1/1304/SKBPM/X/2022', 'Surat Keterangan Belum Pernah Menikah', '2022-10-22', '{\"nik\":\"4625840205950005\",\"nama\":\"Mas`ud Suherman Jaya\",\"tempat_lahir\":\"Pandeglang\",\"tgl_lahir\":\"14/08/1991\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Islam\",\"perkawinan\":\"Kawin\",\"alamat\":\"Kampung Cipeteuy\",\"rt\":\"06\",\"rw\":\"01\",\"warga\":\"WNI\",\"pekerjaan\":\"Belum/Tidak Bekerja\"}', '{\"nama\":\"Tatang Sutardi\",\"nip\":\"8575126\",\"jabatan\":\"SEKRETARIS DESA\",\"wakilkan\":1,\"head\":\"An.KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"3\"}', 20, 0, NULL, '2022-10-22 19:34:58', 'Aldy Setiawan', 1),
(63, 'SKP', '474.3/2/1304/SKP/X/2022', 'Surat Keterangan Pemakaman', '2022-10-22', '{\"nik\":\"9878140205950004\",\"nama\":\"Muslih alqusairi\",\"tempat_lahir\":\"Pandeglang\",\"tgl_lahir\":\"28/06/1997\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Kristen\",\"perkawinan\":\"Tidak Kawin\",\"alamat\":\"Nanggerang\",\"rt\":\"001\",\"rw\":\"006\",\"warga\":\"WNA\",\"pekerjaan\":\"Karyawan Swasta\",\"tgl_kematian\":\"11/10/2022\",\"tgl_pemakaman\":\"12/10/2022\",\"jam_pemakaman\":\"19:10\",\"tempat_pemakaman\":\"TPU Alkaromah\"}', '{\"nama\":\"Tatang Sutardi\",\"nip\":\"8575126\",\"jabatan\":\"SEKRETARIS DESA\",\"wakilkan\":1,\"head\":\"An.KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"3\"}', 19, 0, NULL, '2022-10-22 19:18:35', 'Aldy Setiawan', 1),
(62, 'SKKB', '331/1/1304/SKKB/X/2022', 'Surat Keterangan Kelakuan Baik', '2022-10-22', '{\"nik\":\"3329185246160007\",\"nama\":\"ADITYA YULI NUGRAHA\",\"tempat_lahir\":\"Cilacap\",\"tgl_lahir\":\"28/06/1997\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Islam\",\"perkawinan\":\"Cerai Hidup\",\"alamat\":\"Cikakak\",\"rt\":\"013\",\"rw\":\"002\",\"warga\":\"WNI\",\"pekerjaan\":\"Karyawan Swasta\",\"keperluan\":\"Untuk Melamar Pekerjaan\",\"kelakuan\":\"1. Berkelakuan Baik \r\n2. Tidak termasuk pecandu narkotika dan minuman keras \r\n3. Tidak pernah terlibat dalam pidana maupun perdata \"}', '{\"nama\":\"Aldy Setiawan\",\"nip\":\"5874369\",\"jabatan\":\"KEPALA DESA\",\"wakilkan\":0,\"head\":\"KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"1\"}', 17, 0, NULL, '2022-10-22 19:17:46', 'Aldy Setiawan', 1),
(65, 'SIK', '503/1/1304/SIK/X/2022', 'Surat Izin Keramaian', '2022-10-23', '{\"nik\":\"1234567891011\",\"nama\":\"Adnan Mubarok\",\"tempat_lahir\":\"Serang\",\"tgl_lahir\":\"09/08/1997\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Islam\",\"perkawinan\":\"Tidak Kawin\",\"alamat\":\"Ciujung\",\"rt\":\"001\",\"rw\":\"003\",\"warga\":\"WNI\",\"pekerjaan\":\"Dagang\",\"tgl_mulai\":\"23/10/2022\",\"tgl_selesai\":\"24/10/2022\",\"acara\":\"Pesta Rakyat BRI\",\"tempat_acara\":\"Lapangan Nanggerang\"}', '{\"nama\":\"Aldy Bondan\",\"nip\":\"5874369\",\"jabatan\":\"KEPALA DESA\",\"wakilkan\":0,\"head\":\"KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"1\"}', 21, 0, NULL, '2022-10-23 16:46:18', 'Mumun Munjiah', 1),
(61, 'SKK', '474.3/1/1304/SKK/X/2022', 'Surat Keterangan Kematian', '2022-10-22', '{\"nik\":\"1854810205950003\",\"nama\":\"Imas saribanon\",\"tempat_lahir\":\"Sukabumi \",\"tgl_lahir\":\"17/09/1985\",\"jenis_kelamin\":\"Perempuan\",\"agama\":\"Islam\",\"perkawinan\":\"Kawin\",\"alamat\":\"kadongdong\",\"rt\":\"003\",\"rw\":\"003\",\"warga\":\"WNI\",\"pekerjaan\":\"Karyawan Swasta\",\"tgl_kematian\":\"\",\"sebab_kematian\":\"Sakit\",\"tempat_kematian\":\"Rumah Duka\"}', '{\"nama\":\"Tatang Sutardi\",\"nip\":\"8575126\",\"jabatan\":\"SEKRETARIS DESA\",\"wakilkan\":1,\"head\":\"An.KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"3\"}', 18, 0, NULL, '2022-10-22 19:17:07', 'Aldy Setiawan', 1),
(59, 'SKTM', '460/1/1304/SKTM/X/2022', 'Surat Keterangan Tidak Mampu', '2022-10-22', '{\"nik\":\"1854810205950003\",\"nama\":\"Imas saribanon\",\"tempat_lahir\":\"Sukabumi \",\"tgl_lahir\":\"17/09/1985\",\"jenis_kelamin\":\"Perempuan\",\"agama\":\"Islam\",\"perkawinan\":\"Kawin\",\"alamat\":\"kadongdong\",\"rt\":\"003\",\"rw\":\"003\",\"warga\":\"WNI\",\"pekerjaan\":\"Karyawan Swasta\",\"keperluan\":\"Untuk Beasiswa Kampus\"}', '{\"nama\":\"Aldy Setiawan\",\"nip\":\"5874369\",\"jabatan\":\"KEPALA DESA\",\"wakilkan\":0,\"head\":\"KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"1\"}', 18, 0, NULL, '2022-10-22 19:13:18', 'Aldy Setiawan', 1),
(58, 'SKD', '470/1/1304/SKD/X/2022', 'Surat Keterangan Domisili', '2022-10-22', '{\"nik\":\"3603456704080025\",\"nama\":\"Pandi waluyo prasetyo\",\"tempat_lahir\":\"Tangerang \",\"tgl_lahir\":\"05/03/1992\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Islam\",\"perkawinan\":\"Cerai Mati\",\"alamat\":\"Kampung Talaga\",\"rt\":\"001\",\"rw\":\"002\",\"warga\":\"WNI\",\"pekerjaan\":\"Karyawan Swasta\"}', '{\"nama\":\"Tatang Sutardi\",\"nip\":\"8575126\",\"jabatan\":\"SEKRETARIS DESA\",\"wakilkan\":1,\"head\":\"An.KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"3\"}', 16, 0, NULL, '2022-10-22 19:12:40', 'Aldy Setiawan', 1),
(57, 'SKU', '503/1/1304/SKU/X/2022', 'Surat Keterangan Usaha', '2022-10-22', '{\"nik\":\"9878140205950004\",\"nama\":\"Muslih alqusairi\",\"tempat_lahir\":\"Pandeglang\",\"tgl_lahir\":\"28/06/1997\",\"jenis_kelamin\":\"Laki-laki\",\"agama\":\"Kristen\",\"perkawinan\":\"Tidak Kawin\",\"alamat\":\"Nanggerang\",\"rt\":\"001\",\"rw\":\"006\",\"warga\":\"WNA\",\"pekerjaan\":\"Karyawan Swasta\",\"jenis_usaha\":\"ATK dan Fotocopy\",\"alamat_usaha\":\"Kp. Sindangheula\"}', '{\"nama\":\"Aldy Setiawan\",\"nip\":\"5874369\",\"jabatan\":\"KEPALA DESA\",\"wakilkan\":0,\"head\":\"KEPALA DESA KARYAWANGI\",\"id_jabatan\":\"1\"}', 19, 1, NULL, '2022-10-22 19:11:12', 'Aldy Setiawan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(5) NOT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `status_user` int(5) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `id_pegawai`, `username`, `password`, `status_user`, `foto`, `role`) VALUES
(2, 4, 'aldy', 'b5e75be03f', 1, '0.jfif', 'Admin'),
(11, 11, 'tatang', '9610c2dc65', 1, NULL, 'KepDes'),
(12, 14, 'mumun', 'b6e014c87b', 1, NULL, 'Staff');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_data_penduduk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_data_penduduk` (
`id` int(11)
,`no_kk` varchar(25)
,`no_nik` varchar(25)
,`nama_lengkap` varchar(120)
,`alamat_kampung` varchar(100)
,`rt` varchar(5)
,`rw` varchar(5)
,`jenis_kelamin` varchar(1)
,`tempat_lahir` varchar(100)
,`tanggal_lahir` date
,`agama` int(2)
,`pendidikan` int(2)
,`jenis_pekerjaan` int(2)
,`status_perkawinan` int(2)
,`kewarganegaraan` varchar(3)
,`nama_ayah` varchar(100)
,`nama_ibu` varchar(100)
,`keterangan` varchar(100)
,`createdby` varchar(20)
,`createdon` timestamp
,`modifiedon` timestamp
,`rowstatus` int(1)
,`agama_text` varchar(10)
,`pendidikan_text` varchar(30)
,`kawin_text` varchar(30)
,`kawin_singkat` varchar(2)
,`pekerjaan_text` varchar(30)
,`umur` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_stat_jenkel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_stat_jenkel` (
`perempuan` decimal(22,0)
,`laki` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_stat_perkawinan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_stat_perkawinan` (
`kawin` decimal(22,0)
,`tidak_kawin` decimal(22,0)
,`janda` decimal(22,0)
,`duda` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_data_penduduk`
--
DROP TABLE IF EXISTS `v_data_penduduk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_penduduk`  AS   (select `a`.`id` AS `id`,`a`.`no_kk` AS `no_kk`,`a`.`no_nik` AS `no_nik`,`a`.`nama_lengkap` AS `nama_lengkap`,`a`.`alamat_kampung` AS `alamat_kampung`,`a`.`rt` AS `rt`,`a`.`rw` AS `rw`,`a`.`jenis_kelamin` AS `jenis_kelamin`,`a`.`tempat_lahir` AS `tempat_lahir`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`agama` AS `agama`,`a`.`pendidikan` AS `pendidikan`,`a`.`jenis_pekerjaan` AS `jenis_pekerjaan`,`a`.`status_perkawinan` AS `status_perkawinan`,`a`.`kewarganegaraan` AS `kewarganegaraan`,`a`.`nama_ayah` AS `nama_ayah`,`a`.`nama_ibu` AS `nama_ibu`,`a`.`keterangan` AS `keterangan`,`a`.`createdby` AS `createdby`,`a`.`createdon` AS `createdon`,`a`.`modifiedon` AS `modifiedon`,`a`.`rowstatus` AS `rowstatus`,`b`.`nama` AS `agama_text`,`c`.`nama` AS `pendidikan_text`,`e`.`nama` AS `kawin_text`,`e`.`singkat` AS `kawin_singkat`,`d`.`nama` AS `pekerjaan_text`,year(current_timestamp()) - year(`a`.`tanggal_lahir`) AS `umur` from ((((`tb_data_penduduk` `a` left join `tb_agama` `b` on(`a`.`agama` = `b`.`id`)) left join `tb_pendidikan` `c` on(`c`.`id` = `a`.`pendidikan`)) left join `tb_pekerjaan` `d` on(`a`.`jenis_pekerjaan` = `d`.`id`)) left join `tb_kawin` `e` on(`e`.`id` = `a`.`status_perkawinan`)) order by `a`.`id` desc)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_stat_jenkel`
--
DROP TABLE IF EXISTS `v_stat_jenkel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stat_jenkel`  AS   (select sum(if(`tb_data_penduduk`.`jenis_kelamin` = 'P',1,0)) AS `perempuan`,sum(if(`tb_data_penduduk`.`jenis_kelamin` = 'L',1,0)) AS `laki` from `tb_data_penduduk` where `tb_data_penduduk`.`rowstatus` = 1)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_stat_perkawinan`
--
DROP TABLE IF EXISTS `v_stat_perkawinan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stat_perkawinan`  AS   (select sum(if(`tb_data_penduduk`.`status_perkawinan` = 2,1,0)) AS `kawin`,sum(if(`tb_data_penduduk`.`status_perkawinan` = 1,1,0)) AS `tidak_kawin`,sum(if((`tb_data_penduduk`.`status_perkawinan` = 3 or `tb_data_penduduk`.`status_perkawinan` = 4) and `tb_data_penduduk`.`jenis_kelamin` = 'P',1,0)) AS `janda`,sum(if((`tb_data_penduduk`.`status_perkawinan` = 3 or `tb_data_penduduk`.`status_perkawinan` = 4) and `tb_data_penduduk`.`jenis_kelamin` = 'L',1,0)) AS `duda` from `tb_data_penduduk` where `tb_data_penduduk`.`rowstatus` = 1)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `conf_sistem`
--
ALTER TABLE `conf_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data_penduduk`
--
ALTER TABLE `tb_data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_jenis_usaha`
--
ALTER TABLE `tb_jenis_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kawin`
--
ALTER TABLE `tb_kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_menu_surat`
--
ALTER TABLE `tb_menu_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `conf_sistem`
--
ALTER TABLE `conf_sistem`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_data_penduduk`
--
ALTER TABLE `tb_data_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_usaha`
--
ALTER TABLE `tb_jenis_usaha`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kawin`
--
ALTER TABLE `tb_kawin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_menu_surat`
--
ALTER TABLE `tb_menu_surat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
