-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2017 pada 09.09
-- Versi Server: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_p2db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agama`
--

CREATE TABLE IF NOT EXISTS `tbl_agama` (
  `agama_id` int(11) NOT NULL,
  `agama_nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_agama`
--

INSERT INTO `tbl_agama` (`agama_id`, `agama_nama`) VALUES
(0, ''),
(1, 'ISLAM'),
(2, 'KRISTEN'),
(3, 'KATOLIK'),
(4, 'BUDHA'),
(5, 'HINDU'),
(6, 'KEPERCAYAAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_golongan`
--

CREATE TABLE IF NOT EXISTS `tbl_golongan` (
  `golongan_id` int(11) NOT NULL,
  `golongan_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`golongan_id`, `golongan_nama`) VALUES
(2, 'I/a'),
(3, 'I/b'),
(4, 'I/c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `guru_id` int(11) NOT NULL,
  `guru_nip` varchar(20) NOT NULL,
  `guru_nama` varchar(50) NOT NULL,
  `guru_jenis_kelamin` varchar(1) NOT NULL,
  `guru_jabatan_id` int(11) NOT NULL,
  `guru_golongan_id` int(11) NOT NULL,
  `guru_alamat` varchar(100) NOT NULL,
  `guru_telepon` varchar(20) NOT NULL,
  `guru_no_hp` varchar(20) NOT NULL,
  `guru_keterangan` varchar(150) NOT NULL,
  `guru_ind_wk` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(2, 'Kepala Sekolah'),
(3, 'Wakil Kepala Sekolah'),
(4, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal_pelajaran` (
  `jadwal_pelajaran_id` int(11) NOT NULL,
  `jadwal_pelajaran_ruangan_id` int(11) NOT NULL,
  `jadwal_pelajaran_thn_ajaran_id` int(11) NOT NULL,
  `jadwal_pelajaran_semester_id` int(11) NOT NULL,
  `jadwal_pelajaran_hari` int(11) NOT NULL,
  `jadwal_pelajaran_jam_ke` int(11) NOT NULL,
  `jadwal_pelajaran_guru_id` int(11) NOT NULL,
  `jadwal_pelajaran_mata_pelajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE IF NOT EXISTS `tbl_jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(2, 'IPA'),
(3, 'IPS'),
(5, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas_siswa_tmp`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas_siswa_tmp` (
  `kelas_siswa_tmp_id` int(11) NOT NULL,
  `kelas_siswa_tmp_thn_ajaran_id` int(11) NOT NULL,
  `kelas_siswa_tmp_ruangan_id` int(11) NOT NULL,
  `kelas_siswa_tmp_siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kota`
--

CREATE TABLE IF NOT EXISTS `tbl_kota` (
  `kota_id` int(11) NOT NULL,
  `kota_propinsi_id` int(11) NOT NULL,
  `kota_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_mata_pelajaran` (
  `mata_pelajaran_id` int(11) NOT NULL,
  `mata_pelajaran_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_mata_pelajaran`
--

INSERT INTO `tbl_mata_pelajaran` (`mata_pelajaran_id`, `mata_pelajaran_nama`) VALUES
(0, 'istirahat'),
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris'),
(4, 'Kimia'),
(5, 'Fisika'),
(6, 'Biologi'),
(7, 'Sejarah'),
(8, 'Geograpi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
  `nilai_id` int(11) NOT NULL,
  `nilai_mata_pelajaran_id` int(11) NOT NULL,
  `nilai_guru_id` int(11) NOT NULL,
  `nilai_kelas_siswa_tmp_id` int(11) NOT NULL,
  `nilai_semester_id` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_kuis` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `nilai_praktek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tbl_pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL,
  `pekerjaan_nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`pekerjaan_id`, `pekerjaan_nama`) VALUES
(0, ''),
(2, 'BURUH'),
(3, 'KARYAWAN SWASTA'),
(4, 'NELAYAN'),
(5, 'PEDAGANG BESAR'),
(6, 'PEDAGANG KECIL'),
(7, 'PENSIUNAN'),
(8, 'PETANI'),
(9, 'PETERNAK'),
(10, 'PNS/TNI/POLRI'),
(11, 'TENAGA KERJA INDONESIA'),
(12, 'TIDAK BEKERJA'),
(13, 'TIDAK DAPAT DITERAPKAN'),
(15, 'WIRASWASTA'),
(16, 'WIRAUSAHA'),
(17, 'LAINNYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tbl_pendidikan` (
  `pendidikan_id` int(11) NOT NULL,
  `pendidikan_nama` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`pendidikan_id`, `pendidikan_nama`) VALUES
(0, ''),
(1, 'SD / Sederajat'),
(2, 'SMP / Sederajat'),
(3, 'SMA / Sederajat'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'S1'),
(8, 'S2'),
(9, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajar`
--

CREATE TABLE IF NOT EXISTS `tbl_pengajar` (
  `pengajar_id` int(11) NOT NULL,
  `pengajar_guru_id` int(11) NOT NULL,
  `pengajar_mata_pelajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_propinsi`
--

CREATE TABLE IF NOT EXISTS `tbl_propinsi` (
  `propinsi_id` int(11) NOT NULL,
  `propinsi_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_akun`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_akun` (
  `reg_akun_id` int(11) NOT NULL,
  `reg_akun_no_reg` varchar(25) NOT NULL,
  `reg_akun_nisn` varchar(15) NOT NULL,
  `reg_akun_nama` varchar(50) NOT NULL,
  `reg_akun_password` varchar(100) NOT NULL,
  `reg_akun_jalur_daftar` varchar(1) NOT NULL,
  `reg_akun_status` varchar(1) NOT NULL DEFAULT 'N',
  `reg_akun_status_validasi` varchar(1) NOT NULL DEFAULT 'N',
  `reg_akun_status_kelulusan` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_akun`
--

INSERT INTO `tbl_reg_akun` (`reg_akun_id`, `reg_akun_no_reg`, `reg_akun_nisn`, `reg_akun_nama`, `reg_akun_password`, `reg_akun_jalur_daftar`, `reg_akun_status`, `reg_akun_status_validasi`, `reg_akun_status_kelulusan`) VALUES
(1, '0001/ppdb2017', '0029849300', 'DAVID KALAWAN', '3d76780c7a43687998388f0af4274b5f', 'P', 'Y', 'Y', 'Y'),
(2, '0002/ppdb2017', '0022111687', 'EKA YULIA AYU PUTRI', '261d3e015588fac8a071c6e51b88e216', 'P', 'Y', 'Y', 'Y'),
(3, '0003/ppdb2017', '0015890996', 'SITI AISYAH', '1669dfd5adcc982775003db30ed4962c', 'P', 'Y', 'Y', 'Y'),
(4, '0004/ppdb2017', '0017439230', 'ADELINA AZZAHRA', '6e20826c2cc302af643ad513d0874781', 'P', 'Y', 'Y', 'Y'),
(5, '0005/ppdb2017', '0009248006', 'EMELIA FEBRIANTI', '0967258ae5e7c9bd02179e2900c2352a', 'P', 'N', 'Y', 'N'),
(6, '0006/ppdb2017', '0021026171', 'MUHAMMAD FAZRUR FARIZQI', '7c2379c5d395233c3d34c97652473cea', 'P', 'Y', 'Y', 'Y'),
(7, '0007/ppdb2017', '0017311010', 'AMELIA KARTIKA DEWI', '522be65032f1793f476f6b29ab269529', 'P', 'N', 'Y', 'N'),
(8, '0008/ppdb2017', '0014289833', 'NOOR HALIZA', '699c090b66b52b8d14731df593835662', 'P', 'Y', 'Y', 'Y'),
(9, '0006/regular_ppdb2017', '0021132629', 'SAIRATUL FADILAH', '3fe8b097ea5839363283db7ef1326c1f', 'A', 'N', 'Y', 'N'),
(10, '0010/ppdb2017', '0021132622', 'TOFAN ERLANGGA', '15ed7fdff5c8b2b58d35973ec5c71d04', 'P', 'Y', 'Y', 'Y'),
(11, '0007/regular_ppdb2017', '0021610419', 'ILHAM', '098f6bcd4621d373cade4e832627b4f6', 'Y', 'N', 'Y', 'N'),
(12, '0012/ppdb2017', '9965379725', 'MUHAMMAD FAJRI', '77594c7845be5b6c916ccb767b3a7d7b', 'P', 'N', 'N', 'N'),
(13, '0013/ppdb2017', '0014567134', 'M. ALIF RAMADATU', '4bde73746b9fb93305efbbad2c9f07f8', 'P', 'Y', 'Y', 'Y'),
(14, '0014/ppdb2017', '0017432691', 'ANJELLINA KALISTSYA CRISTHY', 'b4cb79158e68996ffd0d54020bc5acc7', 'P', 'Y', 'Y', 'Y'),
(15, '0008/regular_ppdb2017', '0023394416', 'ROSIDAH RAHMAH. S', '098f6bcd4621d373cade4e832627b4f6', 'Y', 'N', 'Y', 'N'),
(16, '0016/ppdb2017', '0023394413', 'SYIFA''AN KAMILA', '9792171ee1a9491b63cc6d94f6935934', 'P', 'Y', 'Y', 'Y'),
(17, '0017/ppdb2017', '0023197458', 'JONATHAN ADIWINATA', 'b8f00caf7936ea01d26b3b3660fb0f99', 'P', 'Y', 'Y', 'Y'),
(18, '0018/ppdb2017', '0018502289', 'ACHMAD NAUFAL FIRMANSYAH', 'a7ef174d3ed272acd2b72913a7ef9d40', 'P', 'Y', 'Y', 'Y'),
(19, '0019/ppdb2017', '0022111672', 'HOSANA KINANTI RAHAYU WARSITO ', 'd90cc7ba10b3e18a95d54930e1ba397a', 'P', 'Y', 'Y', 'Y'),
(20, '0020/ppdb2017', '0029782831', 'ATIKA NUR RAHMAH', 'bcc697351469fc7be0c70fad4988f673', 'P', 'Y', 'Y', 'Y'),
(21, '0021/ppdb2017', '0022111749', 'RIZKA ANDRIANI', '0f9d66131dfa29bb6d4973873c360507', 'P', 'Y', 'Y', 'Y'),
(22, '0022/ppdb2017', '0028615282', 'JULIUS HIZKIA KARDO SIMANJUNTAK', 'bad3c17154f9f403e5ff2d9f6f6b2222', 'P', 'Y', 'Y', 'Y'),
(23, '0023/ppdb2017', '0021610415', 'AGUSTINA PUTRI', '7153b6cba209527017ec9951807c6476', 'P', 'Y', 'Y', 'Y'),
(24, '0024/ppdb2017', '0017943111', 'HESTY LOVIANA', 'f459b58e9a3626edaf7fb8d9c94a674f', 'P', 'N', 'N', 'N'),
(25, '0025/ppdb2017', '0028662843', 'MUNADIYA ASSYIFA', 'bc37be2a809a9633e3c5e29dc954868f', 'P', 'N', 'Y', 'N'),
(26, '0026/ppdb2017', '0023394385', 'KHARISMA ANJAR SISKA', 'b726c3df4ab96a4531dbee14e25ad507', 'P', 'Y', 'Y', 'Y'),
(27, '0027/ppdb2017', '0022497972', 'IDZNI ANISSYAHRI', '4e7557cdc3088a0548da1980dcfe247e', 'P', 'N', 'N', 'N'),
(28, '0028/ppdb2017', '0025134672', 'MAULIDAH KHAIRIAH', 'dec2a3f276c223940a102614fec36f2e', 'P', 'N', 'Y', 'N'),
(29, '0029/ppdb2017', '0029014042', 'DIAGNE ALYA FIDIAN', '8fe0cd797c704ca2da5bac10d8cf4e9c', 'P', 'Y', 'Y', 'Y'),
(30, '0009/regular_ppdb2017', '0023394414', 'FARAH MUTIA YULIANTI', '098f6bcd4621d373cade4e832627b4f6', 'Y', 'N', 'Y', 'N'),
(31, '0031/ppdb2017', '0022440288', 'RHEGYNA VANESSHA RESTON', 'f66abb9a9fac3cf27e155aaf4c919e8b', 'P', 'Y', 'Y', 'Y'),
(32, '0032/ppdb2017', '0010021229', 'GUSTI ANNISYA', 'c4fb4c16da24889f341f95e5ff34dbc5', 'P', 'Y', 'Y', 'Y'),
(33, '0033/ppdb2017', '0029962267', 'M.YUSUP', 'dc32a84ac23be1cfc8dcef101c149e8b', 'P', 'N', 'N', 'N'),
(34, '0034/ppdb2017', '0023494016', 'M.YUSUP', 'dc32a84ac23be1cfc8dcef101c149e8b', 'P', 'N', 'Y', 'N'),
(35, '0035/ppdb2017', '0001506100', 'DELA OKTAVIANI', '93af03d112d67c4398038fa6332127f9', 'P', 'N', 'Y', 'N'),
(36, '0036/ppdb2017', '0027024210', 'ERICK AKBAR ANGGARA', '4f971f6ff83483c95088008b444c3369', 'P', 'Y', 'Y', 'Y'),
(37, '0037/ppdb2017', '0021610426', 'IKRIMAH', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'N', 'N'),
(38, '0038/ppdb2017', '0022058663', 'HERLINA DWI CAHYANI', '1063fc7a6c07263483a8e1ad9971148b', 'P', 'Y', 'Y', 'Y'),
(39, '0039/ppdb2017', '0025622921', 'STEFANNY LAURA SITUMORANG', '81d577e792c91d845744925ea6dfbfb6', 'P', 'Y', 'Y', 'Y'),
(40, '0040/ppdb2017', '0023493939', 'ELLA KARTIKA', '79025a3c7fdd071c667c0aee44f7e89f', 'P', 'N', 'Y', 'N'),
(41, '0041/ppdb2017', '0022130050', 'MUHAMMAD SYAFA''AT RIDHO AFRIANTO', '4c79a1e53c4ff65dd8581dec0583fde4', 'P', 'Y', 'Y', 'Y'),
(42, '0042/ppdb2017', '0015098791', 'DELIA RAHMADANI MEHA', '66d960a1846f329c2427943c71015000', 'P', 'Y', 'Y', 'Y'),
(43, '0043/ppdb2017', '0024410547', 'SHANIA AVRILIA', 'e9488da70b2f94aaae300544eef51721', 'P', 'N', 'Y', 'N'),
(44, '0044/ppdb2017', '0021413744', 'SYAFIRA DWI RAHMAWATI', 'd0503276f86a627d6c29bc963106570e', 'P', 'Y', 'Y', 'Y'),
(45, '0045/ppdb2017', '1212121212', 'EMELIA FEBRIANTI', 'fa767dd9ed79ea550c1a6dc46c05d59c', 'P', 'N', 'N', 'N'),
(46, '0046/ppdb2017', '0015937097', 'RAHMITA DAMAYANTI', 'c632efc24c8de931e2b752ddfd666b1f', 'P', 'N', 'N', 'N'),
(47, '0047/ppdb2017', '0021496943', 'RIYAN FADILAH ', '35e60f42162dcd37c0984d1a5de9ec8f', 'P', 'Y', 'Y', 'Y'),
(48, '0048/ppdb2017', '0023820783', 'ANGGI JULIANTI SAPUTRI', 'a017479e689debb61b3a3d3b2d9f0fac', 'P', 'N', 'N', 'N'),
(49, '0049/ppdb2017', '0011921293', 'HESNITA DANIAR', 'ca42c0aaeb2b45288d9d2af17e515440', 'P', 'Y', 'Y', 'Y'),
(50, '0050/ppdb2017', '0021132627', 'A.NURHIDAYANTI', 'd7de635b06e67256bc6a4acfa070c95e', 'P', 'Y', 'Y', 'Y'),
(51, '0051/ppdb2017', '20115091500', 'DESPRIANA NATALIA HASIBUAN ', '18ede04ea024b7539cbcd5ad20a45746', 'P', 'N', 'N', 'N'),
(52, '0052/ppdb2017', '0028910694', 'JUWITA RAHMAH', '167819e5b5ace8cabec8f8ef3a5e9bfa', 'P', 'N', 'N', 'N'),
(53, '0053/ppdb2017', '0010738099', 'HELDAWATI', 'ee623895b0ae4c77c7c438abff43abf7', 'P', 'N', 'N', 'N'),
(54, '0054/ppdb2017', '0021012410', 'FARIDA', '41a6a36598a0acd0d0c3aac95edc7b35', 'P', 'N', 'N', 'N'),
(55, '0055/ppdb2017', '0015515868', 'LIENARDO DANAPATI', '733b0402f8ab534fe84874e5a53ec84d', 'P', 'N', 'Y', 'N'),
(56, '0056/ppdb2017', '0012101944', 'REINA NUR SAPUTRI', 'a06a50bfabab4f8efdefaa382ac2bb65', 'P', 'N', 'N', 'N'),
(57, '0057/ppdb2017', '2759397400', 'SHINTA ARDINI PRASASTI UNGAWARU', 'd8003a8d1968327f6ac43e4bcfa06122', 'P', 'N', 'N', 'N'),
(58, '0058/ppdb2017', '0020864624', 'AUDINTA SAKTI FIRMANSYAH', '76f3f364ae1fb952155d84abc6fce70e', 'P', 'Y', 'Y', 'Y'),
(59, '0059/ppdb2017', '0012101957', 'DESTYA AMANDA', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'N', 'N'),
(60, '0060/ppdb2017', '0022058656', 'PUTRI AFIFA FAIKA AHMAD', 'a11437a22ea8e80fb7a1f3de3206780a', 'P', 'N', 'Y', 'N'),
(61, '0061/ppdb2017', '0020603265', 'DELLYA PRAMESTI NINGRUM', '48dd665816a910a761b8949eb9b178aa', 'P', 'Y', 'Y', 'Y'),
(62, '0062/ppdb2017', '0027593974', 'SHINTA ARDINI PRASASTI UNGAWARU', 'd8003a8d1968327f6ac43e4bcfa06122', 'P', 'Y', 'Y', 'Y'),
(63, '0063/ppdb2017', '0023359589', 'TEGAR ANGGARA', 'a7777999e260290f68a1455cacdabf6c', 'P', 'Y', 'Y', 'Y'),
(64, '0064/ppdb2017', '0021319350', 'RISSA MELVYANASARI', 'e1ce1e8d0877b06b55b613d5b22b0251', 'P', 'N', 'N', 'N'),
(65, '0065/ppdb2017', '0033867921', 'NADIA KHAIRUNNISA', '406c58cb04efa39d12450c2bdb9641a4', 'P', 'Y', 'Y', 'Y'),
(66, '0066/ppdb2017', '0024823816', 'NOOR AFRILIANTI LATIFAH', 'eb3251cc5c9b818d3c9f726e6aab5457', 'P', 'N', 'Y', 'N'),
(67, '0067/ppdb2017', '0022111720', 'ANNISA SULISTYOWATI', 'f62e8b85ce7ebff22289017768ad16f5', 'P', 'Y', 'Y', 'Y'),
(68, '0068/ppdb2017', '0022130027', 'RAUDATUL MADINA', 'b526e66bf18850138fab580c862bc4a9', 'P', 'Y', 'Y', 'Y'),
(69, '0069/ppdb2017', '0015931115', 'DENDY VERCELLY WAHYUDJATI ', '633d5d33833208a39a6312047a007930', 'P', 'N', 'Y', 'N'),
(70, '0070/ppdb2017', '0015891147', 'ANDI PUTRI AINUN NISYAH', '3800d22b5bd3a9bf77acf72c647aa382', 'P', 'N', 'N', 'N'),
(71, '0071/ppdb2017', '0025460643', 'M.AGUSTIAN', '7a004bc91267d7e58a8e1045fd44d8f8', 'P', 'Y', 'Y', 'Y'),
(72, '0072/ppdb2017', '0021132626', 'NOOR RIDHAWATI', 'e4454b2fb4a6fd4fb0d1175688b9fc5f', 'P', 'Y', 'Y', 'Y'),
(73, '0073/ppdb2017', '0030156970', 'M. ARYA FEBRIANTO', 'ab20159e5936c90dcf67270a28e9dd67', 'P', 'Y', 'Y', 'Y'),
(74, '0074/ppdb2017', '0017821273', 'MUHAMMAD RIO FRANATA', '1f9b0ee98895a86876dcd0ec60a2ac62', 'P', 'N', 'Y', 'N'),
(75, '0075/ppdb2017', '0022111722', 'RAHIMAH', 'b8f00caf7936ea01d26b3b3660fb0f99', 'P', 'Y', 'Y', 'Y'),
(76, '0076/ppdb2017', '0029282507', 'NOR AULIA FITRIA RAHMAH', '7ef8ab8c26c547c7de83e499905c63ec', 'P', 'N', 'N', 'N'),
(77, '0077/ppdb2017', '20034020115', 'DESPRIANA NATALIA HASIBUAN ', '18ede04ea024b7539cbcd5ad20a45746', 'P', 'N', 'N', 'N'),
(78, '0078/ppdb2017', '0021159151', 'PUTRI ANANDA', '6aee43d34c0c1d275ea483d0a5a0f069', 'P', 'Y', 'Y', 'Y'),
(79, '0079/ppdb2017', '0023394407', 'NISDA NOR AWALIA', 'ce4fd5b8dc836eea103eb585d6442af1', 'P', 'N', 'N', 'N'),
(80, '0080/ppdb2017', '0017432698', 'DESPRIANA N. HASIBUAN ', '18ede04ea024b7539cbcd5ad20a45746', 'P', 'N', 'Y', 'N'),
(81, '0081/ppdb2017', '0028378560', 'ANISA APRILIA', '32c9e71e866ecdbc93e497482aa6779f', 'P', 'N', 'Y', 'N'),
(82, '0082/ppdb2017', '0028615304', 'SALMA FITRIA', '7584ec5f94ecfee81ff67f4292e51aae', 'P', 'N', 'N', 'N'),
(83, '0083/ppdb2017', '0015098782', 'CAYA NITA SEPTIANI', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'Y', 'N'),
(84, '0084/ppdb2017', '0021132616', 'ANGGI MARSELINA', '4a283e1f5eb8628c8631718fe87f5917', 'P', 'N', 'Y', 'N'),
(85, '0085/ppdb2017', '0022058649', 'GHAZALI RAHMAN', 'e91229bfe8420a803d7db002a2dc1cb7', 'P', 'N', 'Y', 'N'),
(86, '0086/ppdb2017', '0021398740', 'DURRAH AMALIA', 'f92369b0095c1382e94eb38911b12ecf', 'P', 'N', 'Y', 'N'),
(87, '0087/ppdb2017', '0015598971', 'SANTI JUNIARTI', '8f4031ffecdcd6e1023979bf5dd74851', 'P', 'Y', 'Y', 'Y'),
(88, '0088/ppdb2017', '0010995891', 'ANDI MEGA HESTI ANSARI', '91805ec00ad20b85226bec0bacf843d3', 'P', 'N', 'Y', 'N'),
(89, '0089/ppdb2017', '0023685475', 'PUTRI ASMARINI WULANDARI', '72024964bd8f8c9fe0d22e2706fd16d2', 'P', 'N', 'Y', 'N'),
(90, '0090/ppdb2017', '0023837694', 'RAUDATUL JANNAH', 'b87ad9187a286ed69a4237939efe083c', 'P', 'Y', 'Y', 'Y'),
(91, '0091/ppdb2017', '0023394426', 'MUHAMMAD RAFLI HENO BA''ASYIR', '57f04bb2975420e3b4c73920c687cad7', 'P', 'N', 'Y', 'N'),
(92, '0092/ppdb2017', '0023717094', 'MAULIDA MEISYA', '31e4beae7d81802b931af695c3684eb7', 'P', 'N', 'N', 'N'),
(93, '0093/ppdb2017', '0011446624', 'JUMRIANI', 'a3cb125379434e78f344fd9931701c92', 'P', 'Y', 'Y', 'Y'),
(94, '0094/ppdb2017', '0017580421', 'ENY FITRIYASIH', 'dc391bf369406dc721e04b2c3183b1ce', 'P', 'N', 'N', 'N'),
(95, '0095/ppdb2017', '00103476982', 'ANDREANDONISAPUTRA', '05100bf8e6717635d454097e76241b14', 'P', 'N', 'N', 'N'),
(96, '0096/ppdb2017', '0017936896', 'LUCKY FITRIADY ERWANDY SAPUTRA', 'ca780ae305a8d47f583484d3f83a2188', 'P', 'N', 'N', 'N'),
(97, '0097/ppdb2017', '0028556904', 'JAUZA NAJA MULYA', '0f9dd0ddb21c038cb6524a7612a66b99', 'P', 'Y', 'Y', 'Y'),
(98, '0098/ppdb2017', '0021610403', 'AMELIDA', '3fc6cb6c370863dedc83988bd6a44048', 'P', 'N', 'Y', 'N'),
(99, '0099/ppdb2017', '0010995885', 'MUHAMMAD DIVA', 'bd0695cd49a5be30c377eb33078c46e9', 'P', 'N', 'Y', 'N'),
(100, '0100/ppdb2017', '0021393351', 'YASIR MAULANA', 'b19c90ca4d1925cc99c32638c12b6164', 'P', 'N', 'Y', 'N'),
(101, '0101/ppdb2017', '0018787280', 'JIHAN PUTRI FAISAL', '417380628a524c86527d29d24b416001', 'P', 'Y', 'Y', 'Y'),
(102, '0102/ppdb2017', '0021610429', 'KHAIRUNISA RAHMADAYANTI', 'aaf1d1b4261ec9b639ed15bde49efe93', 'P', 'N', 'Y', 'N'),
(103, '0103/ppdb2017', '0022865798', 'RINI SUPHIA NURYATI', 'ff3636405694be2ae25c9c523a820ef8', 'P', 'Y', 'Y', 'Y'),
(104, '0104/ppdb2017', '0017310989', 'PUTRI NUR ULAN SARI ', '798c0f373ec18ce4714de7b64aee8dfe', 'P', 'Y', 'Y', 'Y'),
(105, '0105/ppdb2017', '0021159111', 'HERNA FEBRIANTI', 'c81c997c2973036bc0cdfb13b7961122', 'P', 'N', 'N', 'N'),
(106, '0106/ppdb2017', '0021159116', 'LAILA HAYATI', '6e95ff81cc7917588d3c760085f41d86', 'P', 'Y', 'Y', 'Y'),
(107, '0107/ppdb2017', '0213456789', 'DEWI LESTARI', 'b672322a5f9c116a2616b9bcca5bb626', 'P', 'N', 'N', 'N'),
(108, '0108/ppdb2017', '0021542770', 'JUBAIDAH SANTI', '74ee55083a714aa3791f8d594fea00c9', 'P', 'N', 'Y', 'N'),
(109, '0109/ppdb2017', '0023394400', 'SEKAR AYU KUSUMA WARDANI', '65f32821c1ecb7be9a9ad489d137e4f0', 'P', 'Y', 'Y', 'Y'),
(110, '0110/ppdb2017', '0019726583', 'ANNISA DESTI FAHJRI', '236bd6c06ab91aeac5609c685f7135cf', 'P', 'Y', 'Y', 'Y'),
(111, '0111/ppdb2017', '0015356182', 'NUR AINA NOVI AMALIA', '997662638e83d99175095f0aa0772a84', 'P', 'N', 'Y', 'N'),
(112, '0112/ppdb2017', '0023831599', 'NIKODEMUS YOEL SIMAMORA', '212ddb226193cafa26bca9d67117e3ef', 'P', 'Y', 'Y', 'Y'),
(113, '0113/ppdb2017', '0026046628', 'AZA AZKIYATUTDAHNIYAH', 'a62677c983d348ee4954ba09ed655ca7', 'P', 'Y', 'Y', 'Y'),
(114, '0114/ppdb2017', '0025660034', 'RAUDHAH', 'e743e47dad5c05fcd9e9474dcda6df3f', 'P', 'Y', 'Y', 'Y'),
(115, '0115/ppdb2017', '0012101931', 'AHMAD JABIDIN', '0dece78476be506f05443785fb61cabc', 'P', 'Y', 'Y', 'Y'),
(116, '0116/ppdb2017', '0017311007', 'SURYA WARDANI', '003ef7229da8856869d8aab3141d22b6', 'P', 'N', 'N', 'N'),
(117, '0117/ppdb2017', '0021610383', 'AURORA ATDYA SHOLEHA', '6eda0ef3d823f75bec3ed21fb051ae4c', 'P', 'N', 'Y', 'N'),
(118, '0118/ppdb2017', '0028362227', 'DEVVIONY EKA MAWAR DANI', '040ca769c0a72e217a5a7a8753aa04ee', 'P', 'N', 'N', 'N'),
(119, '0119/ppdb2017', '0023226268', 'ASFA MAGHFIRATUNNISA', '5cb0e7ee5de2b2b8f3f43f86b615438d', 'P', 'Y', 'Y', 'Y'),
(120, '0120/ppdb2017', '0038872675', 'ARYA SYIFA HERMIATI', '558544e81333dc6c1c74d2d43afdb768', 'P', 'Y', 'Y', 'Y'),
(121, '0121/ppdb2017', '0017078582', 'HASNA', '435b8396a71ece3e6a60f7fed1bfd87d', 'P', 'N', 'Y', 'N'),
(122, '0122/ppdb2017', '0029881688', 'FATHUL JANNAH', '2ed1f9776a9e6820366cdb20e59c48a9', 'P', 'N', 'Y', 'N'),
(123, '0123/ppdb2017', '0023494028', 'AGUSTINA', '65392df5eb642e25cfae2c1596106d98', 'P', 'Y', 'Y', 'Y'),
(124, '0124/ppdb2017', '0038239402', 'SITI MARDIANA', 'c5b1b29012e1755f2fbc387463c0c9b6', 'P', 'N', 'Y', 'N'),
(125, '0125/ppdb2017', '0022111674', 'AULIA DIAN FITRIANA ', '60fba5bc15358543bd2bf824d75c6a8e', 'P', 'N', 'Y', 'N'),
(126, '0126/ppdb2017', '0012101911', 'AHMAD RIFANI AZIZ M', '6b38264362cdc3a9711c3edf0cb679d4', 'P', 'Y', 'Y', 'Y'),
(127, '0127/ppdb2017', '0024745262', 'HENDRA FAJAR REYNALDY ', '7d05f92336c2c4b54240ccf62d3f8730', 'P', 'N', 'Y', 'N'),
(128, '0128/ppdb2017', '0021398711', 'DWI VALENTINA FEBRIANI', '84339470f9ac379b07a832d0ba1cbc02', 'P', 'Y', 'Y', 'Y'),
(129, '0129/ppdb2017', '0021119213', 'PUTRI LIA MAULIDA PERMANA', '9907a0e0a4022bc55bfe91365285767f', 'P', 'N', 'N', 'N'),
(130, '0130/ppdb2017', '0014202582', 'SEFRIANDI ANJAS DARMA LOPA', 'ac858e3ee9b093dc307e2fe419b2131d', 'P', 'Y', 'Y', 'Y'),
(131, '0131/ppdb2017', '0023359577', 'SOFIATUL  ROHMAH', '2b8a61594b1f4c4db0902a8a395ced93', 'P', 'N', 'Y', 'N'),
(132, '0132/ppdb2017', '0011187198', 'ANDREW CHRISTIAN ROSEVELT SITUMEANG', 'a0a86b515bbb8cb299758d82c75e94c8', 'P', 'N', 'Y', 'N'),
(133, '0133/ppdb2017', '0030275988', 'MUHAMMAD FARID', '1b04433a247cd50b005a97ee40a2b8dd', 'P', 'N', 'Y', 'N'),
(134, '0134/ppdb2017', '0010738223', 'NOR LATIFAH', '5ab142a81aebe484578fb684616af94b', 'P', 'N', 'N', 'N'),
(135, '0135/ppdb2017', '0019917931', 'LETISIA AYUNI DWI OKTARI', '658f595fcdb566415da7d7d77b9aeac1', 'P', 'Y', 'Y', 'Y'),
(136, '0136/ppdb2017', '20151008008', 'SRI RONDIYAH', 'fecc02aef921951818fb387f0d27819c', 'P', 'N', 'N', 'N'),
(137, '0137/ppdb2017', '0016958979', 'SRI RONDIYAH', 'fecc02aef921951818fb387f0d27819c', 'P', 'N', 'N', 'N'),
(138, '0138/ppdb2017', '0024159106', 'MUHAMMAD HADID AL-FARIDZI', 'e9d6a0e14215cd52b2a02a7bc4c121b2', 'P', 'N', 'Y', 'N'),
(139, '0139/ppdb2017', '0015255203', 'FANDI INDRA PURNOMO', '05e1fb3117ba8cb717290f86005d582e', 'P', 'N', 'Y', 'N'),
(140, '0140/ppdb2017', '0021398719', 'NANA NURSANA AHDA', 'cbbb58130060fa6f3f091458be1ab5e6', 'P', 'Y', 'Y', 'Y'),
(141, '0141/ppdb2017', '0016991308', 'RYAN ABDILLAH', 'af45ff0a58a30d01ec83f90d17983379', 'P', 'Y', 'Y', 'Y'),
(142, '0142/ppdb2017', '0022130047', 'MUZDALIFAH', '440fb0348ad2c302230b9c4aad0b75cc', 'P', 'Y', 'Y', 'Y'),
(143, '0143/ppdb2017', '0013263630', 'BELLA EDHAR NOVIA ARDHANA', 'daff6b98fead776014c10d32223f70d5', 'P', 'N', 'Y', 'N'),
(144, '0144/ppdb2017', '0015891134', 'SAMARUDDIN', 'f268fa25a61851c810b8ba16eba7c7cf', 'P', 'N', 'N', 'N'),
(145, '0145/ppdb2017', '0026319340', 'SITI SALMIA', '2c3f828c493019d34ff8eb782da30ce9', 'P', 'N', 'Y', 'N'),
(146, '0146/ppdb2017', '0023370334', 'APRIANA KURNIA NINGSIH', '7f13260ea72998cfef5e96dee07b8ae9', 'P', 'Y', 'Y', 'Y'),
(147, '0147/ppdb2017', '0016461376', 'FILDA HAMIDAH', '1ea77357bb28fc3ddab43c5bed1cae45', 'P', 'Y', 'Y', 'Y'),
(148, '0148/ppdb2017', '0023717090', 'FARADILA MAHSYA SAFITRI', 'c41e083bcc6581df7f061ce56375456c', 'P', 'N', 'N', 'N'),
(149, '0149/ppdb2017', '0021610380', 'HIDAYATI', '202cb962ac59075b964b07152d234b70', 'P', 'N', 'Y', 'N'),
(150, '0150/ppdb2017', '0018852759', 'MUHAMMAD RIDHO', '827ccb0eea8a706c4c34a16891f84e7b', 'P', 'Y', 'Y', 'Y'),
(151, '0151/ppdb2017', '0015133213', 'MARIANA ASTUTI', '11f1631972da6b39ab392ed672c75fd4', 'P', 'N', 'N', 'N'),
(152, '0152/ppdb2017', '0015891148', 'MUHAMMAD HOLIDI', 'cb757596219b0c9fb872c14d54caaca4', 'P', 'N', 'N', 'N'),
(153, '0153/ppdb2017', '0010581879', 'MUHAMMAD RIFKI MAULANA', '19b15c4a203910dc1814067db9caf414', 'P', 'N', 'Y', 'N'),
(154, '0154/ppdb2017', '0022058668', 'MUHAMMAD EVRIAN', '827ccb0eea8a706c4c34a16891f84e7b', 'P', 'N', 'Y', 'N'),
(155, '0155/ppdb2017', '0022662608', 'AHMAD RAYHANSYAH', '910f48c04f9667022a0eaa276b6f1eba', 'P', 'N', 'Y', 'N'),
(156, '0156/ppdb2017', '0023299095', 'GUSTI ANNISA NURANI ', 'ecb02cafd998f8de20dc7bbcbd3ed960', 'P', 'N', 'N', 'N'),
(157, '0157/ppdb2017', '00222058668', 'MUHAMMAD EVRIAN', '827ccb0eea8a706c4c34a16891f84e7b', 'P', 'N', 'N', 'N'),
(158, '0158/ppdb2017', '0023299695', 'GUSTI ANNISA NURANI ', '39fb5b220b4fad615fde4ec11150ac10', 'P', 'N', 'N', 'N'),
(159, '0159/ppdb2017', '0016991322', 'YENNY PUTRI ANUGRAENY', '8d6d8cc967ff3fcef856fa56a93b4aba', 'P', 'N', 'N', 'N'),
(160, '0160/ppdb2017', '0027805552', 'MAULIDAH', '8ea5800832a513eaa4b472aeb4446958', 'P', 'N', 'N', 'N'),
(161, '0161/ppdb2017', '0023299596', 'GUSTI ANNISA NURANI', 'ecb02cafd998f8de20dc7bbcbd3ed960', 'P', 'N', 'Y', 'N'),
(162, '0162/ppdb2017', '0014573449', 'MIFTAHUL JANNAH', 'c272799e7c07ffe84b93fe9792014563', 'P', 'N', 'Y', 'N'),
(163, '0163/ppdb2017', '0016958988', 'GUSTI DEVI KARTIKA', '7a9c9826cf4184fa8baa132c0bf57c81', 'P', 'N', 'N', 'N'),
(164, '0164/ppdb2017', '0024849026', 'GHINA RAUDHATUL JANNAH ', '3fc47d291045ba3a849f3007a597a960', 'P', 'N', 'Y', 'N'),
(165, '0165/ppdb2017', '0024159107', 'HERNI YULIANA', '537d9868d4051d30d1cd35e836ff924d', 'P', 'N', 'Y', 'N'),
(166, '0166/ppdb2017', '0021610366', 'PUTRI DEVY YULIANTI ', '0bfdcd8914a53e117fda8d10954810e8', 'P', 'N', 'Y', 'N'),
(167, '0167/ppdb2017', '0021610371', 'AS''SYIFA NUR ANDINI', 'c66b76dbeff8c9eba7aed27af1894d22', 'P', 'Y', 'Y', 'Y'),
(168, '0168/ppdb2017', '0021397002', 'INDRI RAHAYU', '5b555efad75dd29f906d3a83bc6a3792', 'P', 'N', 'N', 'N'),
(169, '0169/ppdb2017', '0021610385', 'MUHAMMAD REZAL', '6febdc41bf251c622288b3b377986440', 'P', 'N', 'Y', 'N'),
(170, '0170/ppdb2017', '0022295292', 'ISFAN', '3ccc79d6b17f31673a1e2d5442fc1f7e', 'P', 'N', 'Y', 'N'),
(171, '0171/ppdb2017', '0036568521', 'ASTINA', '86e125c9f3f999441ee9870d87ed9034', 'P', 'Y', 'Y', 'Y'),
(172, '0172/ppdb2017', '0022368041', 'REGINA SHINTIA DEVITA', 'a2eda25e9bd2d4a4a1a182cb4d59c16a', 'P', 'N', 'Y', 'N'),
(173, '0173/ppdb2017', '0023394425', 'SYAFA AQILLA FADYA', '7080e81cfa9cdc0a395e373a6d656ceb', 'P', 'Y', 'Y', 'Y'),
(174, '0174/ppdb2017', '0021159174', 'MUKHAIRAH MARDHA', '49c319812adf67e0ad1e4e3c22b2d52c', 'P', 'N', 'Y', 'N'),
(175, '0175/ppdb2017', '0022174049', 'AMELIA NIDA AULIYANI', '72ab59160d56f751ec4850d74ef22510', 'P', 'Y', 'Y', 'Y'),
(176, '0176/ppdb2017', '0026155510', 'SITI ROHMANAWATI', '76aabd6f5564fefa30ebf4f0f3ae9433', 'P', 'N', 'N', 'N'),
(177, '0177/ppdb2017', '0015356172', 'MAWADDAH ISLAMIAH FADLI ', 'fe94cf6de4a9ce36290abbc744ee9dfb', 'P', 'N', 'N', 'N'),
(178, '0178/ppdb2017', '0022118372', 'RAUDHATUL ADAWIYAH', '092619c93ca85c3ac4d99a59c41c74d2', 'P', 'N', 'Y', 'N'),
(179, '0179/ppdb2017', '0022709038', 'AHMAD ASSAMI PRATAMA', '4931b7bf8e3ade7753988e44de572f60', 'P', 'N', 'Y', 'N'),
(180, '0180/ppdb2017', '0022396576', 'HADISTI ANDARA PUTRA ', '1bd2f9f95906842d95234b9c1401dedd', 'P', 'N', 'Y', 'N'),
(181, '0181/ppdb2017', '0021742740', 'NISDA NOR AWALIA', '468bb73d0c9af445b41b815d7b51697f', 'P', 'N', 'Y', 'N'),
(182, '0182/ppdb2017', '0021610411', 'FERRY VERDIAN', '45fa236ceea07efcbf26fea8776cc5d4', 'P', 'Y', 'Y', 'Y'),
(183, '0183/ppdb2017', '0015224235', 'MARIANA ASTUTI', '11f1631972da6b39ab392ed672c75fd4', 'P', 'N', 'Y', 'N'),
(184, '0184/ppdb2017', '0026722583', 'ANGGI JULIANTI SAPUTRI', 'a017479e689debb61b3a3d3b2d9f0fac', 'P', 'Y', 'Y', 'Y'),
(185, '0185/ppdb2017', '0022058659', 'SITI NOR KHOLIFAH', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'Y', 'N'),
(186, '0186/ppdb2017', '0023394391', 'RANI ANASTASIA', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'Y', 'N'),
(187, '0187/ppdb2017', '0011387379', 'ELSA SAFIRA SURYANANDA', '863659a6cafeb92ebc045c196b94d238', 'P', 'N', 'N', 'N'),
(188, '0188/ppdb2017', '0010995863', 'BAHRUN BAHTIAR', '375c71349b295fbe2dcdca9206f20a06', 'P', 'Y', 'Y', 'Y'),
(189, '0189/ppdb2017', '0021560989', 'RIZKA ANISA', '03b98539c73cad8bec61ff75011d46e9', 'P', 'N', 'Y', 'N'),
(190, '0190/ppdb2017', '0018810080', 'NOLA AULIA TASYA', '509868d00762a33ceb688601ff5f365e', 'P', 'Y', 'Y', 'Y'),
(191, '0191/ppdb2017', '0018523116', 'PRICILIA EUNIKE MATANDE', '3d0d80b5b6bc8478b62da19172ea1777', 'P', 'N', 'Y', 'N'),
(192, '0192/ppdb2017', '0015890995', 'RAMADANSAPUTRA', '01f48d88a13e7f97144e85d5405cbca9', 'P', 'N', 'N', 'N'),
(193, '0193/ppdb2017', '0035765765', 'KHURIYATUL JAMILAH', 'a4a3d2b162d0d9046333b9fcb0986bd0', 'P', 'Y', 'Y', 'Y'),
(194, '0194/ppdb2017', '0020603268', 'SEPHIYA APRILIYANI', 'de6aeb2fa830b8019429ca0557a7a6a9', 'P', 'Y', 'Y', 'Y'),
(195, '0195/ppdb2017', '00220603269', 'DINA WARDIANTI', '451ba7d29bb77385d17fbebd97b71e42', 'P', 'N', 'N', 'N'),
(196, '0196/ppdb2017', '0017732216', 'ARMAN', '2dbca8be9d8e857406342b5d7891f72c', 'P', 'N', 'N', 'N'),
(197, '0197/ppdb2017', '0017732213', 'MUHAMMAD NUR', '2dbca8be9d8e857406342b5d7891f72c', 'P', 'Y', 'Y', 'Y'),
(198, '0198/ppdb2017', '0020603283', 'RISKA NUR SETYA NINGSIH', '3bbeaed5beebfc78be14913b9fcaa5e9', 'P', 'Y', 'Y', 'Y'),
(199, '0199/ppdb2017', '9009666666', 'MUMUNTIK', 'b0baee9d279d34fa1dfd71aadb908c3f', 'P', 'N', 'N', 'N'),
(200, '0200/ppdb2017', '0020603875', 'DINA LORENZA', 'b208d9babe4c8245d38dc1d807c0c52f', 'P', 'N', 'N', 'N'),
(201, '0201/ppdb2017', '0020934621', 'BAGUS FAJAR KURNIAWAN', '050ae94a8cff0c3b6281ec62dc04ca49', 'P', 'N', 'Y', 'N'),
(202, '0202/ppdb2017', '0023615719', 'INDAH SILVIA', '9a557efaeb2fdb7f3705242577bd4703', 'P', 'N', 'N', 'N'),
(203, '0203/ppdb2017', '0024159111', 'MUHAMMAD RAMADHAN ALFARIDZI', 'a33fa01badff3bf0e0e91de4c23ece8f', 'P', 'N', 'N', 'N'),
(204, '0204/ppdb2017', '0002737647', 'LILY RAHAYU', '09d9c24585c368f9ebb24e654ee47ef3', 'P', 'N', 'N', 'N'),
(205, '0205/ppdb2017', '0021132611', 'ANNISA AZZAHRA ', 'f5a4bce2f6f68e272fb71be15d5e6c86', 'P', 'N', 'N', 'N'),
(206, '0206/ppdb2017', '0012708463', 'LUKMANUL HAKIM', 'a39dbef6b6495e7586949d1d4efd84e3', 'P', 'N', 'Y', 'N'),
(207, '0207/ppdb2017', '0026526974', 'WINDAY IHZHA YUSHRA', '8d7a474071849c9e479db270e0951385', 'P', 'Y', 'Y', 'Y'),
(208, '0208/ppdb2017', '0010738086', 'AMI NURAHMAN', '6c5b7de29192b42ed9cc6c7f635c92e0', 'P', 'N', 'Y', 'N'),
(209, '0209/ppdb2017', '0022058650', 'SITI NUR ZAHRAH', '8887a199469dc54409d4bb32d5b285b4', 'P', 'Y', 'Y', 'Y'),
(210, '0210/ppdb2017', '0010310968', 'DEDEN ROKHYADI', 'f211f7d79fa0e4111c52c3e97f552a4d', 'P', 'N', 'Y', 'N'),
(211, '0211/ppdb2017', '0022130012', 'NOVIA ANANDA', 'a646749c4ae60670d5dbffb7ce2a78ec', 'P', 'N', 'N', 'N'),
(212, '0212/ppdb2017', '0015891137', 'SAYID SYAHRUL ZULPAKAR', '67866f6de5330f933196af71b03c7ad7', 'P', 'N', 'N', 'N'),
(213, '0213/ppdb2017', '0022780073', 'ALYA NUR ERZA LUTHVIYA', 'df26a5177aee391f135762d45f8e0b1e', 'P', 'N', 'Y', 'N'),
(214, '0214/ppdb2017', '0025523321', 'HUSNUL KHOTIMAH', '80e826db58539758c5b646bda9941253', 'P', 'N', 'Y', 'N'),
(215, '0215/ppdb2017', '0016958991', 'I PUTU HERLI ATMAJA', '5dbd53a3cb6cf20f84d21fc374e0c85b', 'P', 'N', 'Y', 'N'),
(216, '0216/ppdb2017', '0030337077', 'RICO APRILIO TIRANDA', '22341585220455899a2a5b0b3de16c95', 'P', 'N', 'N', 'N'),
(217, '0217/ppdb2017', '0021175340', 'ANDI DARLIANI', '1fa12e3f5f758f060d00729a3132be63', 'P', 'Y', 'Y', 'Y'),
(218, '0218/ppdb2017', '0030156502', 'JASMINE SHAFA SEKAR ARUM', 'fa8be2838d074ec7eb3a097fb8a9a198', 'P', 'N', 'Y', 'N'),
(219, '0219/ppdb2017', '0033506157', 'AHMAD NASAR', '6bbc9ebc694ffb9e35fb2ca96402534a', 'P', 'N', 'N', 'N'),
(220, '0220/ppdb2017', '0016958988', 'GUSTI DEVI KARTIKA', 'fbe029cc2f6fc30ec0428d03a3d9d8fd', 'P', 'N', 'Y', 'N'),
(221, '0221/ppdb2017', '0023166179', 'AKHMAD RIYADI', 'bf8104a7b9bcc43ecca7d04e0babdfde', 'P', 'Y', 'Y', 'Y'),
(222, '0222/ppdb2017', '0022174055', 'LISDAWATI', '27d41de1470aae0c4aca399c79c112b6', 'P', 'Y', 'Y', 'Y'),
(223, '0223/ppdb2017', '0010442500', 'ABEDYA SUSANTO', '3cc7f617b8b11d87e00fc1a8ac025b06', 'P', 'Y', 'Y', 'Y'),
(224, '0224/ppdb2017', '0022111729', 'MUHAMMAD RIJAL FADHLI', '6108105cb0cca538d3548bb960a6d827', 'P', 'N', 'Y', 'N'),
(225, '0225/ppdb2017', '00278690005', 'JULIA RAHMA', 'ec26202651ed221cf8f993668c459d46', 'P', 'N', 'Y', 'N'),
(226, '0226/ppdb2017', '0015212386', 'MUHAMMAD RIKKI SUPRATIKNO', '58fa294dfd97300ce8eb4e324e41e2ce', 'P', 'N', 'Y', 'N'),
(227, '0227/ppdb2017', '0029893372', 'EMY QURNIAWATI', '9ae058cce9300219609774a246ae5667', 'P', 'N', 'Y', 'N'),
(228, '0228/ppdb2017', '0024118068', 'M.TAMLIKHA ZAM''AINI', '23a24cd4b9d053ddd815e0e441d394c5', 'P', 'N', 'N', 'N'),
(229, '0229/ppdb2017', '0021004958', 'INDAH SILVIA', 'fcc460c203d840d04d91f9bb55b7520f', 'P', 'N', 'Y', 'N'),
(230, '0230/ppdb2017', '0022111737', 'HANNA SAJIDA', '6322bb25bd23760b05fc29cc0d44a732', 'P', 'N', 'Y', 'N'),
(231, '0231/ppdb2017', '0011185425', 'NUR AZIZAH', '88344f7319a42946829ceee26a454bc2', 'P', 'N', 'Y', 'N'),
(232, '0232/ppdb2017', '0021398743', 'PERMATA PUTRI AYUNDA SARI', 'd41d8cd98f00b204e9800998ecf8427e', 'P', 'Y', 'Y', 'Y'),
(233, '0233/ppdb2017', '0022130061', 'TIUR VILA DELVIA LIMBONG', '232f0939163585934d80214d8bbfdd7a', 'P', 'N', 'Y', 'N'),
(234, '0234/ppdb2017', '0025735518', 'SAHID ABDULLAH', '2dbca8be9d8e857406342b5d7891f72c', 'P', 'N', 'N', 'N'),
(236, '0235/ppdb2017', '20115090500', 'JESSIKA MEIDINA', '4b1944f850bb03beb39a87e5a55017f6', 'P', 'N', 'N', 'N'),
(237, '0236/ppdb2017', '0025406578', 'M. HILMI', '60e13cdbcea9c6f4d1e7eb0542b0dc36', 'P', 'N', 'Y', 'N'),
(238, '0237/ppdb2017', '0021132625', 'ABDULLAH GAJALI', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'Y', 'N'),
(239, '0238/ppdb2017', '0021159175', 'DENI PUTRA HARTANTO', '58047cca7a3fef4fdbf5bb43ed30ebc2', 'P', 'N', 'N', 'N'),
(240, '0239/ppdb2017', '0010582707', 'DETY RAHMAWATI', '96e979f2f69d2cce8aa196557398ce7c', 'P', 'Y', 'Y', 'Y'),
(241, '0240/ppdb2017', '0028644571', 'KHARISA NUR HAERANI MAMONTO', 'bc776dfd8c6108e876cc9e584bfdd8c7', 'P', 'N', 'Y', 'N'),
(242, '0241/ppdb2017', '0015931120', 'STEPHEN ALFANDO CALVIN', '73fffb2c025f563ff7a5fb78fbdb7fe4', 'P', 'N', 'Y', 'N'),
(243, '0242/ppdb2017', '0023493944', 'NURLAILA AGUSTINA', '976e12a4a433d85272aba3a86d56f1a9', 'P', 'N', 'N', 'N'),
(244, '0243/ppdb2017', '0004097894', 'JOHSANSSON NOBEL', '7339ecafca9b49fd716abdf34451102b', 'P', 'N', 'N', 'N'),
(245, '0244/ppdb2017', '0017078484', 'DARMANTO', '771e25e0c0c0d0c699a41a06febaa530', 'P', 'N', 'N', 'N'),
(246, '0245/ppdb2017', '0023494005', 'ABD HAMID', '899463375547e0b0ffe7168cd35a4544', 'P', 'N', 'Y', 'N'),
(247, '0246/ppdb2017', '0025614138', 'NESSIYAVIOLITHA QUR''ANA', 'e66b8a0acab164bdbf805b19348be653', 'P', 'N', 'Y', 'N'),
(248, '0247/ppdb2017', '0017126542', 'KHARISA AMALIA YASMIYANAH', '38ac55158d53c979e89a30be46d77eae', 'P', 'N', 'Y', 'N'),
(249, '0248/ppdb2017', '0023373438', 'SALSABILA APRILLIANI', '65b34b1b7e8c7ec8d4fcba2564f8ea74', 'P', 'N', 'N', 'N'),
(250, '0249/ppdb2017', '0027353915', 'QURROTU ''AINII LUTHFIATI', '705949e8430a55e98977e9490d82e1c5', 'P', 'N', 'Y', 'N'),
(251, '0250/ppdb2017', '0', '', 'd41d8cd98f00b204e9800998ecf8427e', '0', 'N', 'N', 'N'),
(252, '0251/ppdb2017', '0015928884', 'I GUSTI PUTU AGENG SANTOSO', '1bbd886460827015e5d605ed44252251', 'P', 'N', 'N', 'N'),
(253, '0252/ppdb2017', '0023717085', 'TRIANA PUTRI MAHARANI', 'e10adc3949ba59abbe56e057f20f883e', 'P', 'N', 'Y', 'N'),
(254, '0253/ppdb2017', '0031769825', 'DEPI ZAHRA IRHAMNI', '540ce17ee0ba8ed2ba094ef23092f64c', 'P', 'Y', 'Y', 'Y'),
(255, '0254/ppdb2017', '0023494193', 'MAHDATUL ARDAWIYAH', '4b8be7436e9f37b4e34bf51a6441a0f8', 'P', 'Y', 'Y', 'Y'),
(256, '0255/ppdb2017', '0029335558', 'ANNISA', 'e10adc3949ba59abbe56e057f20f883e', 'P', 'N', 'N', 'N'),
(257, '0256/ppdb2017', '0015937081', 'NOR NAJWA', '8fbe4eff3e3475a5e34ad5ac4add7b5c', 'P', 'N', 'N', 'N'),
(258, '0257/ppdb2017', '0027135648', 'SAFATUR ROHMAN', '7126f73ec64a3a2a7dd91eaca7771106', 'P', 'N', 'N', 'N'),
(259, '0258/ppdb2017', '0020762918', 'NIDA AULIA RAHMINI', '0ef156317d14f673183270cb2d55db3b', 'P', 'Y', 'Y', 'Y'),
(260, '0259/ppdb2017', '00119000793', 'MUHAMMAD NOR PAISAL', '991bcf7f402c31b3ec5cb37a98954e8a', 'P', 'N', 'N', 'N'),
(261, '0260/ppdb2017', '0022111711', 'HERIANSYAH', '78d95cd619ec069c6870c0edfc569dc5', 'P', 'Y', 'Y', 'Y'),
(262, '0261/ppdb2017', '0022445459', 'LEA KUARTA MARUMBO', 'a71ccf647888c55724d922b5b458dec2', 'P', 'N', 'Y', 'N'),
(263, '0262/ppdb2017', '0015976593', 'NOR ASYFIA', '585f722f0471e7b82b290dcb5c00e5ef', 'P', 'Y', 'Y', 'Y'),
(264, '0263/ppdb2017', '0021.398719', 'NANA NURSANA AHDA', 'cbbb58130060fa6f3f091458be1ab5e6', 'P', 'N', 'N', 'N'),
(265, '0264/ppdb2017', '0030296005', 'RIO NANDA ARDANA', 'f04f3fee32cda60c89d5d4c0134e5af7', 'P', 'N', 'Y', 'N'),
(266, '0265/ppdb2017', '0010959744', 'RONI ANDONIA SIMANJUNTAK', '0a93a6dfaab1bc1302d3a207286c19b0', 'P', 'N', 'N', 'N'),
(267, '0266/ppdb2017', '0017074848', 'DARMANTO', 'aae56c0abc6a17f54e463dc88cd78881', 'P', 'N', 'N', 'N'),
(268, '0267/ppdb2017', '0013557223', 'NUR FITRI NATALIA SIDIK', '093d8a0793df4654fee95cc1215555b3', 'P', 'Y', 'Y', 'Y'),
(269, '0268/ppdb2017', '00040979843', 'JOHANSSON NOBEL', '7339ecafca9b49fd716abdf34451102b', 'P', 'N', 'N', 'N'),
(270, '0269/ppdb2017', '0022174043', 'MUTIARA', 'f58e35e214c208599694b9d9b3b43a51', 'P', 'N', 'Y', 'N'),
(271, '0270/ppdb2017', '0004097894', 'JOHANSSON NOBEL', '7339ecafca9b49fd716abdf34451102b', 'P', 'N', 'N', 'N'),
(272, '0271/ppdb2017', '0017078484', 'DARMANTO', '771e25e0c0c0d0c699a41a06febaa530', 'P', 'N', 'Y', 'N'),
(273, '0272/ppdb2017', '0018002724', 'APRILIANI', 'cd30d9492fe580296fac5f4faf41a62f', 'P', 'N', 'Y', 'N'),
(274, '0273/ppdb2017', '0025625142', 'LULU CAHYATI FEBRI ASTUTI', '654e4dc5b90b7478671fe6448cab3f32', 'P', 'N', 'Y', 'N'),
(275, '0274/ppdb2017', '0011900793', 'MUHAMMAD NOR PAISAL', 'b721b7543d80da67864fab85217def8a', 'P', 'N', 'Y', 'N'),
(276, '0275/ppdb2017', '0018141723', 'RENI PRASTIKA', 'b4c3959582610d4bbc2d610869b46cf6', 'P', 'N', 'N', 'N'),
(277, '0276/ppdb2017', '0015590030', 'DICKY LOECKMAN WIRANATA', '8a37a54f19217b3d47a3422c7d929939', 'P', 'Y', 'Y', 'Y'),
(278, '0277/ppdb2017', '0015515858', 'AHMAD BADARUDDIN', '00e572e8b1365b898901b37bf26868e2', 'P', 'N', 'N', 'N'),
(279, '0278/ppdb2017', '0011061463', 'DESY NUR SAFITRI', '26a46e2e9f16e1bb2122585048037916', 'P', 'Y', 'Y', 'Y'),
(280, '0279/ppdb2017', '0021175335', 'SUSILAWATI', 'b5bfb76b0157f7a81fcc876f6de00073', 'P', 'Y', 'Y', 'Y'),
(281, '0280/ppdb2017', '0023752426', 'DINA LORENZA', 'f7ac697b2a4a7772685e97caac318dd1', 'P', 'Y', 'Y', 'Y'),
(282, '0281/ppdb2017', '1264892827', 'AGUS PURNAMA', 'ea80845a9289abef1947cbfcf37182c5', 'P', 'N', 'N', 'N'),
(283, '0282/ppdb2017', '0020987606', 'HELDY SURYA NUGRAHA', '1dadad40da2b32155b70faf6181b8402', 'P', 'N', 'Y', 'N'),
(284, '0283/ppdb2017', '0015891145', 'M.BUDI SETIAWAN', '23842c79316cab330dc61d084d9eea5c', 'P', 'N', 'N', 'N'),
(285, '0284/ppdb2017', '0015137877', 'RISMAYANTI', 'bfa979396545edee06b67e768970d275', 'P', 'Y', 'Y', 'Y'),
(286, '0285/ppdb2017', '34251795860', 'ILHAM HABIBIE', '138d2efb73f9c891acd005958a37124a', 'P', 'N', 'N', 'N'),
(287, '0286/ppdb2017', '9701272867', 'EL MAYKA ANANT', 'fbea0aad4a15d189e9872c92563fdb1d', 'P', 'N', 'N', 'N'),
(288, '0287/ppdb2017', '1234567788', 'LAURA', 'b75306b210d9df8cdef64ead0af7bc07', 'P', 'N', 'N', 'N'),
(289, '0288/ppdb2017', '0023290981', 'TASYAWWAFAL RAMADHAN', '69804dd66e52c1cca22a250da2acec9b', 'P', 'N', 'Y', 'N'),
(290, '0289/ppdb2017', '12345677888', 'LAURA', 'eae2362480b790d3f2fbdc1428c81d1a', 'P', 'N', 'N', 'N'),
(291, '0290/ppdb2017', '0029879563', 'HERNA FEBRIANTI', 'ac0253f22f7c3bbe8a8bbaf98ce55504', 'P', 'N', 'Y', 'N'),
(292, '0291/ppdb2017', '00036837874', 'NADIA KHAIRUNNISA', '792e7ba2272738f8f0ec49056722d78d', 'P', 'N', 'N', 'N'),
(293, '0292/ppdb2017', '0030337077', 'RICO APRILIO TIRANDA ', '49fe001784507334222f63719c6479bd', 'P', 'N', 'Y', 'N'),
(294, '0293/ppdb2017', '0015356171', 'MUHAMAD REZA ADRIAN', '63dc2c4ed7020a6a32585ed4a9cfc007', 'P', 'N', 'Y', 'N'),
(295, '', '0030337077', 'RICO APRILIO TIRANDA', '', '', 'N', 'N', 'N'),
(296, '0295/ppdb2017', '0028925087', 'PUTRA ADITIYA', '4d52aa02ce63ecee91a0309b370c0e56', 'P', 'N', 'Y', 'N'),
(297, '0296/ppdb2017', '0027347427', 'MUHAMMAD LUFPI FIRDAUS', '75468cc2e5d2dcef28a232ae3ee15d27', 'P', 'N', 'Y', 'N'),
(298, '0297/ppdb2017', '0021175336', 'RAHMATIAH', '919a1f50e94cb0ef9625280a780d4f43', 'P', 'N', 'N', 'N'),
(299, '0298/ppdb2017', '0022111746', 'ANNISA NUR OKTAVIANI', 'c9d2cce909ea37234be8af1a1f958805', 'P', 'N', 'Y', 'N'),
(300, '0299/ppdb2017', '0011643335', 'AKHMAD KHAIKAL FIKRI', '7252bb90419936f7e51b74f924ed6865', 'P', 'N', 'Y', 'N'),
(301, '0300/ppdb2017', '0011498956', 'ARJUNA ALIEM MAULANA BIMANTARA', 'a8e2950cdb75a4ba11ca8b0e65725315', 'P', 'N', 'Y', 'N'),
(302, '0301/ppdb2017', '0023461369', 'SALSABILA APRILLIANI', '840ccef3ba6f8025c0960de7e85eeb58', 'P', 'N', 'Y', 'N'),
(303, '0302/ppdb2017', '0027397870', 'JESICA CLAUDIA SIAHAAN', '0dd7a1c13df066dae71d4b8a520c52fc', 'P', 'N', 'N', 'N'),
(304, '0303/ppdb2017', '0012914362', 'MUHAMMAD RIZKY HUSYADA', '9dc5fff9b62c86f93ec9ab1d1415f1a7', 'P', 'N', 'Y', 'N'),
(305, '0304/ppdb2017', '0017936885', 'NOVIANTI ADHELIA PUTRI', '0ab1379692a9ad360f60b888b1adcb6c', 'P', 'N', 'N', 'N'),
(306, '0305/ppdb2017', '0010959706', 'M. NOOR ADJI PANGESTU', '25d55ad283aa400af464c76d713c07ad', 'P', 'N', 'N', 'N'),
(307, '0306/ppdb2017', '0023370339', 'ZIA UL HAQ', '7df4213e8b13ba254c04301ae627e550', 'P', 'N', 'Y', 'N'),
(308, '0307/ppdb2017', '0027451071', 'DIYONO', 'cfe54b4bfb831324064b3f68a6f2c05e', 'P', 'N', 'N', 'N'),
(309, '0308/ppdb2017', '0018269698', 'LILIS ISYANTI', '358fb04cec95d30437146a71e98c88fb', 'P', 'N', 'N', 'N'),
(310, '0309/ppdb2017', '0014542647', 'RINDA HIDAYANTI', 'b8509a237730e451abfcf511f3f72138', 'P', 'N', 'N', 'N'),
(311, '0310/ppdb2017', '0010959796', 'M. NOOR ADJI PANGESTU', '25d55ad283aa400af464c76d713c07ad', 'P', 'N', 'Y', 'N'),
(312, '0311/ppdb2017', '0021674966', 'M. AL RIFQI RAHMAN', 'd8dbb4301c234c5b7540e8620761653a', 'P', 'N', 'Y', 'N'),
(313, '0312/ppdb2017', '0045671024', 'RABIATUL ADAWIYAH', 'c625dbd965775eae4ba2f27d06d27ac5', 'P', 'N', 'N', 'N'),
(314, '0313/ppdb2017', '0022111737', 'HANNA SAJIDA', '0d1dfe6a435962e2299ef38b738af0ca', 'P', 'N', 'N', 'N'),
(315, '', '0025460643', 'M.AGUSTIAN', '', '', 'N', 'N', 'N'),
(316, '0315/ppdb2017', '0011406971', 'ANGGITA SELVI MARIANA', 'a511a395f371063354b7f0783829ff24', 'P', 'Y', 'Y', 'Y'),
(317, '0316/ppdb2017', '0023197460', 'MARCELLY PRICILLA CANDRAKANTA KEZIA SENDE', '242fc41db0e63877b2acc7a5d722cffa', 'P', 'Y', 'Y', 'Y'),
(318, '0317/ppdb2017', '0022111713', 'ZASMINA AULIA', 'f901c0f552f5d9778fe005cac6f00d6d', 'P', 'N', 'N', 'N'),
(319, '0318/ppdb2017', '0021610370', 'HADI RUSADI ', '81dc9bdb52d04dc20036dbd8313ed055', 'P', 'N', 'Y', 'N'),
(320, '0319/ppdb2017', '0026313490', 'DESSY FITRIANI', 'e858409bb3ff392adefb7ad0ef953617', 'P', 'N', 'N', 'N'),
(321, '0320/ppdb2017', '0023493933', 'KHARISMA MAULIDYAWATI', '69a92b5ac76e192566f618e41ce1154d', 'P', 'N', 'Y', 'N'),
(322, '0321/ppdb2017', '0213456987', 'INDAH PERMATA', 'b672322a5f9c116a2616b9bcca5bb626', 'P', 'N', 'N', 'N'),
(323, '0322/ppdb2017', '0028108118', 'ALDY', '2c45f040bc6b3d46827aa5d652bc3408', 'P', 'N', 'N', 'N'),
(324, '0323/ppdb2017', '0016991332', 'ALPIANNOR', 'bb6a81b3e7f9fb8232218823c69b1d6f', 'P', 'N', 'N', 'N'),
(325, '0324/ppdb2017', '0021026202', 'MUKHAMMAD FIRDAUS', 'd346bdf3dd4ceb898af21fab820ac2cb', 'P', 'N', 'Y', 'N'),
(326, '0325/ppdb2017', '0012241487', 'MUHAMMAD NASIR FALAH', 'b8f13d6e410202b7f06286a33a391d89', 'P', 'Y', 'Y', 'Y'),
(327, '0326/ppdb2017', '0021159104', 'PUTRI HELMINA FITRIANTI', 'd8145a84069fe7b7ff3ca2bfc1ff6479', 'P', 'N', 'N', 'N'),
(328, '0327/ppdb2017', '0017078282', 'DARMANTO', '496de0faea1347aaf54ade5309126b1d', 'P', 'N', 'N', 'N'),
(329, '0328/ppdb2017', '0022111730', 'RIKO DANU AGUNG', '34bc82f450070e25261d254070e21ae6', 'P', 'N', 'N', 'N'),
(330, '0329/ppdb2017', '0017072828', 'DARMANTO', 'aae56c0abc6a17f54e463dc88cd78881', 'P', 'N', 'N', 'N'),
(331, '0330/ppdb2017', '0020615397', 'HAMKA KAMIL', 'ad87ec606ba3237710410d800c5399ed', 'P', 'N', 'Y', 'N'),
(332, '0331/ppdb2017', '0017072121', 'DARMANTO', '771e25e0c0c0d0c699a41a06febaa530', 'P', 'N', 'N', 'N'),
(333, '0332/ppdb2017', '0029690794', 'ANITA PUTRI FATONAH', 'ff564381a6e133861e8747cb321308e4', 'P', 'Y', 'Y', 'Y'),
(334, '0333/ppdb2017', '0020987623', 'VANIDA NAFTALI', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'Y', 'Y', 'Y'),
(335, '0334/ppdb2017', '0021026174', 'AHMAD RAIHAN', '53a9c3a99cf20efef0db8034c34376a4', 'P', 'Y', 'Y', 'Y'),
(336, '0335/ppdb2017', '12126310000', 'ROBY SAPUTRA', 'bdba6f2acbf50fba2d41428cfe7f8070', 'P', 'N', 'Y', 'N'),
(337, '0336/ppdb2017', '0010310964', 'HAMZAH HAZ', '817a03146b9571b837438ddd6efc6a6c', 'P', 'N', 'Y', 'N'),
(338, '0337/ppdb2017', '0014480465', 'TIASTEVANI6@GMAIL.COM', 'c3c875c7338c403990d7f46abded6e68', 'P', 'N', 'N', 'N'),
(339, '0338/ppdb2017', '0021318166', 'ENDAH LISTYA YULIANA', '49bd2f151d0957bba3c9b6146a5451a0', 'P', 'N', 'N', 'N'),
(340, '0339/ppdb2017', '0002202800', 'TARA', '0cf21ce35322d2e56d745e319b933470', 'P', 'N', 'N', 'N'),
(341, '0340/ppdb2017', '0022111744', 'MUHAMMAD ILHAM', 'a7ae9463acd9687b56c4cf6a75a95999', 'P', 'N', 'N', 'N'),
(342, '0341/ppdb2017', '4444447789', 'HYBTYVR', '5a90a83ce50cfdeb88338f00cfaab43c', 'P', 'N', 'N', 'N'),
(344, '0001/regular_ppdb201', '1234123412', 'ENCEP ENDAN', '098f6bcd4621d373cade4e832627b4f6', 'R', 'N', 'N', 'N'),
(345, '0342/ppdb2017', '3212211221', 'TETETETE', '098f6bcd4621d373cade4e832627b4f6', 'P', 'N', 'N', 'N'),
(346, '0002/regular_ppdb201', '32112321123', 'TEST', '098f6bcd4621d373cade4e832627b4f6', 'R', 'N', 'N', 'N'),
(347, '0003/regular_ppdb201', '32112321122', 'TE', '098f6bcd4621d373cade4e832627b4f6', 'R', 'N', 'N', 'N'),
(348, '0004/regular_ppdb201', '32112321121', 'SDKA', '098f6bcd4621d373cade4e832627b4f6', 'R', 'N', 'N', 'N'),
(349, '0005/regular_ppdb2017', '32112321125', 'SAD', '098f6bcd4621d373cade4e832627b4f6', 'R', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_apk`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_apk` (
  `reg_apk_id` int(11) NOT NULL,
  `reg_apk_key` varchar(100) NOT NULL,
  `reg_apk_tgl_reg` varchar(15) NOT NULL,
  `reg_apk_tgl_akhir` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_apk`
--

INSERT INTO `tbl_reg_apk` (`reg_apk_id`, `reg_apk_key`, `reg_apk_tgl_reg`, `reg_apk_tgl_akhir`) VALUES
(1, 'ABCD-EFGH-IJKL-MNOP', '01-12-2016', 'unlimited');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_data_diri`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_data_diri` (
  `reg_data_diri_id` int(11) NOT NULL,
  `reg_data_diri_reg_akun_id` int(11) NOT NULL,
  `reg_data_diri_nama` varchar(50) NOT NULL,
  `reg_data_diri_panggilan` varchar(20) NOT NULL,
  `reg_data_diri_jenis_kelamin` varchar(1) NOT NULL,
  `reg_data_diri_tempat_lahir` varchar(50) NOT NULL,
  `reg_data_diri_agama_id` int(11) NOT NULL,
  `reg_data_diri_tgl_lahir` varchar(15) NOT NULL,
  `reg_data_diri_alamat_dusun` varchar(50) NOT NULL,
  `reg_data_diri_alamat_rt` varchar(10) NOT NULL,
  `reg_data_diri_alamat_rw` varchar(10) NOT NULL,
  `reg_data_diri_alamat_desa` varchar(50) NOT NULL,
  `reg_data_diri_alamat_kodepos` varchar(15) NOT NULL,
  `reg_data_diri_alamat_kecamatan` varchar(50) NOT NULL,
  `reg_data_diri_alamat_kota` varchar(100) NOT NULL,
  `reg_data_diri_alamat_propinsi` varchar(100) NOT NULL,
  `reg_data_diri_no_telp` varchar(20) NOT NULL,
  `reg_data_diri_lulusan` varchar(50) NOT NULL,
  `reg_data_diri_lulusan_akreditas` varchar(1) NOT NULL,
  `reg_data_diri_nis` varchar(50) NOT NULL,
  `reg_data_diri_seri_ijazah` varchar(50) NOT NULL,
  `reg_data_diri_seri_skhun` varchar(50) NOT NULL,
  `reg_data_diri_no_un` varchar(50) NOT NULL,
  `reg_data_diri_no_nik` varchar(50) NOT NULL,
  `reg_data_diri_npsn` varchar(50) NOT NULL,
  `reg_data_diri_alat_transport` varchar(20) NOT NULL,
  `reg_data_diri_jenis_tinggal` varchar(20) NOT NULL,
  `reg_data_diri_no_telp_rumah` varchar(15) NOT NULL,
  `reg_data_diri_email` varchar(30) NOT NULL,
  `reg_data_diri_no_kks` varchar(30) NOT NULL,
  `reg_data_diri_penerima_pkh_kps` varchar(1) NOT NULL,
  `reg_data_diri_no_pkh_kps` varchar(30) NOT NULL,
  `reg_data_diri_usulan_layak_pip` varchar(1) NOT NULL,
  `reg_data_diri_alasan_layak` varchar(50) NOT NULL,
  `reg_data_diri_penerima_kip` varchar(1) NOT NULL,
  `reg_data_diri_no_kip` varchar(30) NOT NULL,
  `reg_data_diri_nama_kip` varchar(30) NOT NULL,
  `reg_data_diri_alasan_menolak_kip` varchar(50) NOT NULL,
  `reg_data_diri_no_reg_akta` varchar(20) NOT NULL,
  `reg_data_diri_img` varchar(150) NOT NULL DEFAULT 'assets/images/noprofile.gif'
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_data_diri`
--

INSERT INTO `tbl_reg_data_diri` (`reg_data_diri_id`, `reg_data_diri_reg_akun_id`, `reg_data_diri_nama`, `reg_data_diri_panggilan`, `reg_data_diri_jenis_kelamin`, `reg_data_diri_tempat_lahir`, `reg_data_diri_agama_id`, `reg_data_diri_tgl_lahir`, `reg_data_diri_alamat_dusun`, `reg_data_diri_alamat_rt`, `reg_data_diri_alamat_rw`, `reg_data_diri_alamat_desa`, `reg_data_diri_alamat_kodepos`, `reg_data_diri_alamat_kecamatan`, `reg_data_diri_alamat_kota`, `reg_data_diri_alamat_propinsi`, `reg_data_diri_no_telp`, `reg_data_diri_lulusan`, `reg_data_diri_lulusan_akreditas`, `reg_data_diri_nis`, `reg_data_diri_seri_ijazah`, `reg_data_diri_seri_skhun`, `reg_data_diri_no_un`, `reg_data_diri_no_nik`, `reg_data_diri_npsn`, `reg_data_diri_alat_transport`, `reg_data_diri_jenis_tinggal`, `reg_data_diri_no_telp_rumah`, `reg_data_diri_email`, `reg_data_diri_no_kks`, `reg_data_diri_penerima_pkh_kps`, `reg_data_diri_no_pkh_kps`, `reg_data_diri_usulan_layak_pip`, `reg_data_diri_alasan_layak`, `reg_data_diri_penerima_kip`, `reg_data_diri_no_kip`, `reg_data_diri_nama_kip`, `reg_data_diri_alasan_menolak_kip`, `reg_data_diri_no_reg_akta`, `reg_data_diri_img`) VALUES
(1, 2, 'EKA YULIA AYU PUTRI', 'AYU', 'P', 'NGANJUK', 1, '28-03-2002', '-', '09', '00', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081351609821', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4347', '', '', '13-036-039-2', '6310096803020002', '30303626', '', '', '-', 'ekayliaap2803@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '-', 'assets/upload/peserta/00221116871492603893.jpg'),
(2, 13, 'M. ALIF RAMADATU', 'ALIF', 'L', 'BANJARMASIN', 1, '12-12-2001', 'DESA BATULICIN', '11', '03', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081349485049', 'SMPN 1 SIMPANG 4', 'A', '14-4428', '', '', '13-036-019-6', '6310011212010001', '30303626', '', '', '', 'alif.ramadatu@yahoo.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00145671341492592502.jpg'),
(3, 17, 'JONATHAN ADIWINATA', 'ADI', 'L', 'KOTABARU', 2, '03-06-2002', 'KAMPUNG BARU', '01', '01', 'KAMPUNG BARU', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085349177888', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4397', '', '', '13-036-016-9', '6310090306020007', '30303626', '', '', '', 'jonathanadiwinata03@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/002319745815.jpg'),
(4, 15, 'ROSIDAH RAHMAH. S', 'SIDAH', 'P', 'BATULICIN', 1, '06-07-2002', 'KAMPUNG BARU', '010', '03', 'KAMPUNG BARU', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154269989', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4509', '', '', '13-036-163-6', '6310094607020005', '30303626', '', '', '', 'Bsilaban@thiess.co.id', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/00233944161492428328.jpg'),
(5, 20, 'ATIKA NUR RAHMAH', 'ATIKA', 'P', 'PAGATAN', 1, '13-12-2002', 'KAMPUNG BARU', '013', '004', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085346634949', 'SMPN 1 SIMPANG 4', 'A', '14-4321', '', '', '13-036-009-8', '6310095312020004', '30303626', '', '', '', 'Atikan54@Yahoo.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/00297828311492510903.jpg'),
(6, 18, 'ACHMAD NAUFAL FIRMANSYAH', 'NAUFAL', 'L', 'MALANG', 1, '16-10-2001', 'BATULICIN', '007', '002', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154424482', 'SMPN 1 SIMPANG 4', 'A', '14-4286', '', '', '13-036-002-7', '6310011610010001', '30303626', '', '', '', 'naufalirengpaten@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/00185022891492428279.jpg'),
(7, 9, 'SAIRATUL FADILAH', 'DILA', 'P', 'BATULICIN', 1, '15-08-2002', 'SARI GADUNG', '012', '002', 'SARI GADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251044084', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '15-4861 / 0024264894', '', '', '13-036-195-6', '6310015508020003', '30303626', '', '', '085251044084', 'dhilasf@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '1083/PLBPS-KTB/IX/20', 'assets/upload/peserta/00211326291492657262.jpeg'),
(8, 3, 'SITI AISYAH', 'AISYAH', 'P', 'SIMPANG EMPAT', 1, '12-12-2001', '-', '001', '-', 'BAROKAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081219969149', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4520', '', '', '13-036-027-6', '6310094612010012', '30303626', '', '', '-', 'sitiaisyah.siti2001@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/foto/001589099615.jpg'),
(9, 29, 'DIAGNE ALYA FIDIAN', 'DIAN', 'P', 'BATULICIN', 1, '09-08-2002', '-', '01', '-', 'DESA TUNGKARAN PANGERAN', '72171', 'SIMPANG EMPAT', 'BATULICIN(TANAH BUMBU)', 'KALIMANTAN SELATAN', '081251190625', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4336', '', '', '13-036-037-4', '6310094902020006', '30303626', '', '', '-', 'diagnealya09@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00290140421492651742.jpeg'),
(10, 31, 'RHEGYNA VANESSHA RESTON', 'NESSHA', 'P', 'MAKASSAR', 3, '28-10-2002', '1', '004', '002', 'SIDOMULYO', '72211', 'MANTEWE', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085252823555', 'SMPN 1 MANTEWE', 'A', '2647', '', '', '130270463', '6310106809020001', '30303633', '', '', '', 'vvvanessha@gmail.com', '6310101805100021', 'N', '', 'N', '', 'N', '', '', '', '952/UM/A/KCS/2002', 'assets/upload/peserta/00224402881492654514.jpeg'),
(11, 25, 'MUNADIYA ASSYIFA', 'MUNADIYA', 'P', 'KOTA BARU', 1, '27-09-2002', '1', '010', '001', 'SARIGADUNG', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085350075666', 'MTS DARUL AZHAR', 'A', '1212.6310.0021', '', '', '13-064-084-5', '6302066709020005', '30315464', '', '', '', 'Assyifa.Cabbi@facebook.com', '', 'N', '', 'N', '', 'N', '', '', '', '1427/PLBPS-KTB/XI/20', 'assets/upload/peserta/00286628431492669822.jpeg'),
(12, 26, 'KHARISMA ANJAR SISKA', 'RIISMAA', 'P', 'BATULICIN', 1, '08-03-2002', 'KERSIKPUTIH', '013', '003', 'KERSIKPUTIH', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALSEL', '082148809933', 'SMPN 1 BATULICIN', 'N', '14.05207', '', '', '13-022-016-9', '6310094803020006', '30303613', '', '', 'tidak ada', 'riismazle@gmail.com', '', '0', '', '0', '', '0', '', '', '', '04973/IST/CSL-TB/VI/', 'assets/upload/peserta/00233943851492659139.jpeg'),
(13, 32, 'GUSTI ANNISYA', 'ICHA', 'P', 'LONTAR', 1, '15-06-2002', 'BATULICIN', '11', '03', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '082154123765', 'SMP NEGERI 1 BATULICIN', 'B', '1405185', '', '', '13-022-205-4', '6310015506020003', '30303613', '', '', '08125134647', 'gustiannisya123@gmail.com', '', 'N', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00100212291492670697.jpeg'),
(14, 5, 'EMELIA FEBRIANTI', 'EMEL', 'P', 'SIMPANG EMPAT', 1, '12-10-2000', '-', '007', '-', 'GUNUNG BESAR', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085349715882', 'SMPN 2 SIMPANG EMPAT', 'N', '1101-14', '', '', '13-037-078-3', '6310095210000010', '30311417', '', '', '-', 'Emeliafebrianti05@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '1365/IST/CSL-TB/IV/2', 'assets/upload/peserta/00092480061492591830.jpeg'),
(15, 41, 'MUHAMMAD SYAFA''AT RIDHO AFRIANTO', 'RIDHO', 'L', 'KOTABARU', 1, '25-07-2002', '-', '12', '03', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081333913554', 'SMP ISLAM TERPADU AR-RASYID', 'A', '0414', '', '', '130440276', '6310092507020011', '30311406', '', '', 'tidak ada', 'edo.abang01@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'KARENA TIDAK DIBERIKAN KEPADA SAYA.', '0933/PLBPS-KTB/VIII/', 'assets/upload/foto/00221300501492412109.jpeg'),
(16, 62, 'SHINTA ARDINI PRASASTI UNGAWARU', 'SHINTA', 'P', 'MAKASSAR', 1, '19-01-2002', 'BATULICIN', '013', '003', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081255641925', 'SMP NEGERI 1 BATULICIN', 'N', '14.05344', '', '', '13-022-127-2', '6302065901020003', '30303613', '', '', '', 'shintaardinipu@gmail.com', '6310010504160002', 'N', '', 'N', '', 'N', '', '', '', '913/UM/KCS/2002', 'assets/upload/foto/00233944138.jpg'),
(17, 58, 'AUDINTA SAKTI FIRMANSYAH', 'FIRMAN', 'L', 'BLITAR', 1, '25-07-2001', '-', '05', '-', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085250166825', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1028-14', '', '', '13-037-004-5', '6310092507010007', '30311417', '', '', '-', 'audintasf@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '433/DSP/UWL/IX/2001', 'assets/upload/peserta/00208646241492657129.jpeg'),
(18, 70, 'ANDI PUTRI AINUN NISYAH', 'PUTRI', 'P', 'PALANRO', 1, '08-10-2001', 'BATULICIN', '004', '03', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '082353334694', 'SMPN 1 BATULICIN', 'C', '14.05130', '', '', '013-022-38-3', '6310014810010006', '30 30 36 13', '', '', '-', 'zahrymartatila29@gmail.com', '6310011209120002', 'N', '', 'N', '', 'N', '', '', '-', '73.0505.481001.0001', 'assets/upload/foto/00185022898.jpg'),
(19, 72, 'NOOR RIDHAWATI', 'RIDHA', 'P', 'BATULICIN', 1, '03-06-2002', 'BATULICIN', '012', '003', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '085348382768', 'SMP NEGERI 1 BATULICIN', 'B', '1405288', '', '', '130222187', '6310014306020001', '30303613', '', '', '081349310977', 'noorridhawati11@gmail.com', '6310011805100015', 'N', '', 'N', '', 'N', '', '', '', '0956/PLBPS-KTB/VIII/', 'assets/upload/peserta/00211326261492659317.jpeg'),
(20, 40, 'ELLA KARTIKA', 'ELLA', 'P', 'SEI. DUA KEC.BATULICIN', 1, '24-06-2002', 'GUNUNG BESAR', '04', '02', 'GUNUNG BESAR', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085345287719', 'SMPN 2 SIMPANG EMPAT', 'B', '.1107-14', '', '', '13-037-077-4', '6372036406020001', '30311417', '', '', '085249736345', 'ellakartika007@gmail.com', '6310061511160003', 'N', '', 'N', '', 'N', '', '', 'TIDAK ADA ALASAN', '1920 No 751 Jo 1927 ', 'assets/upload/peserta/00234939391492652831.jpeg'),
(21, 75, 'RAHIMAH', 'IMAH', 'P', 'SUNGAI BULUH', 1, '19-06-2002', '-', '06', '05', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081347490549', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4483', '', '', '13-036-054-3', '6310095906020006', '30303626', '', '', '', 'rahimahmurjani02@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '3940/ISTIMEWA/CATPIL', 'assets/upload/foto/00221117221492589802.jpeg'),
(22, 38, 'HERLINA DWI CAHYANI', 'HERLINA', 'P', 'KAMPUNG BARU', 1, '23-03-2002', 'BATULICIN', '016', '003', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '085332652636', 'SMPN 1 BATULICIN', 'B', '14.05194', '', '', '13-022-013-4', '6310016303020001', '30 30 36 13', '', '', '-', 'Herlinaoppo62@gmail.com', '6310010604100002', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00220586631492652248.jpeg'),
(23, 42, 'DELIA RAHMADANI MEHA', 'ADEL', 'P', 'BATULICIN', 1, '11-12-2001', 'BATULICIN', '01', '01', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085246614500', 'SMP NEGERI 1 BATULICIN', 'B', '14.05158', '', '', '13-022-005-4', '6310015112010002', '30303613', '', '', '', 'Adellawliet@gmail.com', '', '0', '', '0', '', 'Y', 'T2CZIM', 'DELIA RAHMADANI MEHA', '', '0053/PLBPS-KTB/1/200', 'assets/upload/peserta/00150987911492652048.jpeg'),
(24, 34, 'M.YUSUP', 'YUSUP', 'L', 'SEGUMBANG', 1, '10-03-2002', 'SEGUMBANG', '02', '0', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348119258', 'SMPN 1 BATULICIN', 'N', '14-05236', '', '', '13-022-111-2', '6310013003020001', '30 30 36 13', '', '', '081348119258', 'bbatulicin33@gmail.com', '', 'N', '', 'N', '', 'Y', 'T5QTQJ', 'M YUSUP', '', '4153/ISTIMEWA/CATPIL', 'assets/upload/peserta/00234940161492654437.jpeg'),
(25, 49, 'HESNITA DANIAR', 'NITA', 'P', 'PAGATAN', 1, '25-10-2001', 'KERSIK PUTIH', '010', '002', 'KERSIK PUTIH', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089626103516', 'SMPN 1 BATULICIN', 'B', '14.05196', '', '', '13-022-044-5', '6310016510010001', '30 30 36 13', '', '', '', 'hsntaaadnr25@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'DARI KELUARGA MAMPU', '1303/PLBPS-KTB/X11/2', 'assets/images/noprofile.gif'),
(26, 67, 'ANNISA SULISTYOWATI', 'ANNISA', 'P', 'SANGATTA', 1, '13-06-2002', 'II', '11', '-', 'SARIGADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348542655', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4312', '', '', '13-036-007-2', '6310095606020001', '30303626', '', '', '-', 'anissa.batulicin@gmail.com', '6310091103121060', 'N', '', 'N', '', 'N', '', '', 'MAMPU', '100/2229-CTS/T.PEM/X', 'assets/upload/foto/00221117201492494829.jpg'),
(27, 85, 'GHAZALI RAHMAN', 'RAHMAN', 'L', 'TULUNGAGUNG', 1, '08-01-2002', 'GG. MELATI PUTIH', '14', '3', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN, TANAH BUMBU', 'KALIMANTAN SELATAN', '081259717548', 'SMP NEGERI 1 BATULICIN', 'B', '14.05182', '', '', '13-022-204-5', '6310010801020002', '30303613', '', '', '-', 'rahmanghazali27@gmail.com', '8631001170708008', 'N', '', 'N', '', 'N', '', '', 'KELUARGA MAMPU', '199 c/DISP KTB/VII/2', 'assets/upload/peserta/00220586491492726791.jpeg'),
(28, 69, 'DENDY VERCELLY WAHYUDJATI ', 'DENDY', 'L', 'SLEMAN', 3, '03-08-2001', '-', '012', '004', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082354419555', 'SMP KODECO SIMPANG EMPAT', 'B', '143203', '', '', '13-043-005-4', '6310060308010001', '30303616', '', '', '-', 'Dendy03@yahoo.co.id', '6310062909140003', 'N', '', 'N', '', 'N', '', '', '-', '4728\\2001', 'assets/upload/peserta/00159311151492655313.jpeg'),
(29, 88, 'ANDI MEGA HESTI ANSARI', 'MEGA', 'P', 'BATULICIN', 1, '19-06-2001', 'BATULICIN', '001', '001', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251114260', 'SMPN 1 BATULICIN', 'A', '1405127', '', '', '13-022-198-3', '6310015906010003', '30303613', '', '', '085251114260', 'megaa9814@gmail.com', '', 'N', '', 'N', '', 'Y', 'T12MZ3', 'ANDI MEGA HESTI ANSARI', '', '12298/IST/CSL-TB/VI/', 'assets/upload/peserta/00109958911492592016.JPG'),
(30, 36, 'ERICK AKBAR ANGGARA', 'ERICK', 'L', 'YOGYAKARTA', 1, '12-01-2002', '-', '14', '-', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082148881100', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4352', '', '', '13-036-040-9', '6310091201020007', '30303626', '', '', '082148881100', 'erickakbaranggara@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '6302CLT1508200805200', 'assets/upload/foto/0021132605.jpg'),
(31, 89, 'PUTRI ASMARINI WULANDARI', 'PUTRI', 'P', 'KOTABARU', 1, '23-01-2002', '-', '06', '02', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081316900142', 'MTS. DARUL AZHAR', 'A', '14.2058', '', '', '13-064-157-4', '6310096101020001', '30315464', '', '', '-', 'putri45004@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '0546/IST/PLBPS-KTB/I', 'assets/upload/peserta/00236854751492829054.jpeg'),
(32, 84, 'ANGGI MARSELINA', 'ANGGI', 'P', 'BATULICIN', 1, '06-04-2002', 'BATULICIN', '002', '001', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085345684260', 'SMPN 1 BATULICIN', 'B', '14.05135', '', '', '13-022-133-4', '6310014604020001', '30303613', '', '', '082154623484', 'marselinaa9@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '10500/IST/CSL-TB/X/2', 'assets/upload/foto/0021132616.JPG'),
(33, 103, 'RINI SUPHIA NURYATI', 'RINI', 'P', 'BATULICIN', 1, '23-01-2002', '-', '04', '02', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085348090098', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4499', '', '', '13-036-056-9', '6310092301020003', '30303626', '', '', '', 'RiniSuphia6789@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0236/PLBPS-KTB/III/2', 'assets/upload/foto/0022130015.jpg'),
(34, 87, 'SANTI JUNIARTI', 'SANTI', 'P', 'SUBANG', 1, '28-06-2001', 'BAROKAH', '001', '001', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082155118787', 'SMP MUHAMMADIYAH SIMPANG EMPAT', 'B', '0015598971', '', '', '13-081-019-6', '6310066806110001', '69786858', '', '', '-', 'Sntrnytcha28@gmail.com', '6310092704120069', 'N', '', 'N', '', 'N', '', '', '', '3213-LT-21112013-004', 'assets/upload/peserta/00155989711492742432.jpeg'),
(35, 90, 'RAUDATUL JANNAH', 'RAUDAH', 'P', 'PAGATAN', 1, '25-08-2002', 'KAMPUNG BARU', '010', '003', 'KAMPUNG BARU', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154017999', 'SMP NEGERI 1 BATULICIN', 'N', '14.05318', '', '', '13-022-155-6', '6310096508020003', '30303613', '', '', '082154017999', 'odahr1749@gmail.com', '6310092303120295', 'N', '', '0', '', 'N', '', '', '', '', 'assets/upload/peserta/00238376941492663224.jpeg'),
(36, 104, 'PUTRI NUR ULAN SARI ', 'PUTRI', 'P', 'KAMPUNG BARU', 1, '27-05-2002', '-', '12', '02', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251229664', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4480', '', '', '13-036-053-4', '6310096705020008', '30303626', '', '', '', 'putrinur2705@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0712/PLBPS-KTB/VI/20', 'assets/upload/foto/0017310989.jpg'),
(37, 99, 'MUHAMMAD DIVA', 'DIVA', 'L', 'BATULICIN', 1, '16-06-2001', 'BATULICIN', '11', '002', 'KERSIK PUTIH', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '085249298213', 'SMPN 1 BATULICIN', 'B', '13.04955', '', '', '13-022-187-6', '6310011606010001', '30 30 36 13', '', '', '', 'DivaFranattasna@gmail.com', '', '0', '', '0', '', '0', '', '', '', '20280/IST/CSL-TB/XII', 'assets/upload/peserta/00109958851492655868.jpeg'),
(38, 43, 'SHANIA AVRILIA', 'SHANIA', 'P', 'PEKANBARU', 1, '06-04-2002', 'TARJUN', '003', '004', 'TARJUN', '72161', 'KELUMPANG HILIR', 'KOTABARU', 'KALIMANTAN SELATAN', '082354168531', 'SMP INDOCEMENT TARJUN ', 'B', '1416990', '', '', '03-175-065-8', '6302194604020001', '30303366', '', '', '', 'Shania060400@gmail.com', '6302192210070002', '0', '', '0', '', '0', '', '', '', '3695/PT/2002', 'assets/upload/peserta/00244105471492823911.jpeg'),
(39, 50, 'A.NURHIDAYANTI', 'ANTI', 'P', 'BATULICIN', 1, '01-08-2002', 'BATULICIN', '003', '001', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '+6281348852285', 'SMPN 1 BATULICIN', 'B', '14.05129', '', '', '13-022-199-2', '6310014108020003', '30 30 36 13', '', '', '', 'antihello96@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'BERASAL DARI KELUARGA MAMPU', '5801/IST/CSL-TB/XII/', 'assets/upload/peserta/00211326271492659990.jpeg'),
(40, 109, 'SEKAR AYU KUSUMA WARDANI', 'SEKAR', 'P', 'BEBEGAN', 1, '11-05-2002', '-', '12', '02', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085353587919', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4514', '', '', '13-036-057-8', '6310095105010005', '30303626', '', '', '', 'ayusekar1105@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1900/IST/CATPIL-TB/I', 'assets/upload/foto/0023394400.jpg'),
(41, 113, 'AZA AZKIYATUTDAHNIYAH', 'ASA', 'P', 'MALANG', 1, '18-05-2001', 'GUNUNG ANTASARI', '06', '04', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085386119296', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4323', '', '', '13-036-035-6', '6310065805010004', '30303626', '', '', '', 'azkiya18aad@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00260466281492658356.jpg'),
(42, 117, 'AURORA ATDYA SHOLEHA', 'RORA', 'P', 'RANTAU JAYA', 1, '26-06-2002', 'BERSUJUD', '006', '001', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348255799', 'SMP MUHAMMADIYAH', 'B', '14.2000', '', '', '13-081-023-2', '6310096603020001', '30314858', '', '', '081348255799', 'dyahnabidatul@gmail.com', '', '0', '', '0', '', '0', '', '', '', '19200 No. 751 Jo.192', 'assets/upload/peserta/00216103831492670952.jpeg'),
(43, 19, 'HOSANA KINANTI RAHAYU WARSITO ', 'HOSANA ', 'P', 'BATULICIN ', 2, '08-02-2002', '-', '10/-', '-', 'BAROKAH ', '72200', 'SIMPANG EMPAT ', 'TANAH BUMBU ', 'KALIMANTAN SELATAN ', '081255648632', 'SMPN 1 SIMPANG EMPAT ', 'A', '14-4385', '', '', '13-036-043-6 ', '6310094802020005', '30303626', '', '', '- ', 'hosana.kinanti@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '1261/IST/PLBPS-KTB/V', 'assets/upload/foto/00221116721492576300.jpeg'),
(44, 7, 'AMELIA KARTIKA DEWI', 'AMEL', 'P', 'TANJUNG', 1, '14-11-2001', 'BERSUJUD', '11', '11', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081255425143', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4299', '', '', '13-036-168-9', '6310095411010003', '30303626', '', '', '', 'Ameliakartika1411@gmail.com', '', '0', '', '0', '', '0', '', '', '', '539/LH-Um/DPP-TAB/XI', 'assets/upload/peserta/00173110101492651246.jpeg'),
(45, 10, 'TOFAN ERLANGGA', 'TOFAN', 'L', 'BATULICIN', 1, '04-05-2002', '-', '005', '001', 'BATULICIN', '72211', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081284599453', 'SMPN 1 BATULICIN', 'B', '14.0536', '', '', '13-022-162-7', '6310010405020002', '30303613', '', '', '-', 'Tofanerlangga45@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '1584/IST/PLBPS-KTB/V', 'assets/upload/peserta/00211326221492655452.jpeg'),
(46, 8, 'NOOR HALIZA', 'ICHA', 'P', 'KERSIK PUTIH', 1, '02-07-2001', '01', '007', '001', 'KERSIK PUTIH', '72171', 'BATULICIN', 'BATULICIN ', 'KALIMANTAN SELATAN', '089689604244', 'MTS DDI KERSIK PUTIH', 'B', '1361', '', '', '13-059-045-4', '6310014207010001', '30315393', '', '', '-', 'noorhalisah2@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '7949/IST/CSL-TB/VIII', 'assets/images/noprofile.gif'),
(47, 35, 'DELA OKTAVIANI', 'DELA ', 'P', 'BATULICIN', 1, '29-10-2000', 'BATULICIN', 'RT 12 ', 'RW 3', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082158369880', 'SMPN 1 BATULICIN', 'B', '14.05157', '', '', '13-022-136-9', '6310016910000004', '30303613', '', '', '', 'delaoktaviani029@gmail.com', '', '0', '', 'Y', '', 'Y', 'Q1CAYN', 'DELA OKTAVIANI', '', '', 'assets/upload/peserta/00015061001492662698.jpeg'),
(48, 125, 'AULIA DIAN FITRIANA ', 'AULIA', 'P', 'BATULICIN', 1, '16-02-2002', '-', '11', '-', 'SARIGADUNG', '72271', 'SIMPANG EMPAT ', 'BATULICIN', 'KALIMANTAN SELATAN ', '081349405870', 'SMP NEGRI 1 SIMPANG EMPAT ', 'A', '14-4322', '', '', '13-036-204-5', '6310095602020008', '30303626', '', '', '', 'Auliafitri29.af@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00221116741492738682.jpeg'),
(49, 44, 'SYAFIRA DWI RAHMAWATI', 'FIRA', 'P', 'SIDOMULYO', 1, '14-05-2002', '1', '3', '2', 'SIDOMULYO', '72200', 'MANTEWE', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081351656660', 'SMP NEGERI 2 MANTEWE', 'B', '14-276', '', '', '13-028-022-3', '6310105405020001', '30311419', '', '', '', 'syafiradwi89@gmail.com', '', 'N', '', '0', '', 'N', '', '', '', '3851/IST/CSL-TB/III/', 'assets/upload/foto/0021413744.png'),
(50, 66, 'NOOR AFRILIANTI LATIFAH', 'YANTI/ANTE', 'P', 'BATULICIN', 1, '04-04-2002', 'GUNUNG BESAR', '09', '02', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085346547218', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1126-14', '', '', '13-037-097-8', '6310094404020012', '30311417', '', '', '', 'noorafriliantilatifah27@gmail.', '-', 'N', '', 'N', '', 'N', '', '', 'TIDAK MENERIMA ALASAN', '2237/IST/PLBPS-KTB/X', 'assets/upload/peserta/00248238161492655016.jpeg'),
(51, 126, 'AHMAD RIFANI AZIZ M', 'FANI', 'L', 'SEPAKAT', 1, '11-07-2001', 'KAMPUNG BARU', '10', '05', 'KAMPUNG BARU', '72100', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081250927138', 'MTS. NURUL HIDAYAH', 'B', '1212100010143989', '', '', '1-14-15-13-135-009-8', '631009110710009', '30315463', '', '', '', 'Ahmadrifani@gmail.com', '6310092303120301', 'N', '', 'N', '', 'N', '', '', '', '1546/IST/PLBPS-KTB/X', 'assets/upload/foto/0012101911.jpg'),
(52, 134, 'NOR LATIFAH', 'TIFAH', 'P', 'BATULICIN', 1, '04-06-2001', '-', '06', '-', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085345654152', 'MADRASAH TSANAWIYAH DARUL AZHAR', 'A', '14.2050', '', '', '13-064-087-2', '6310094406010009', '30315464', '', '', '-', 'noorlatifah110@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '16706/IST/CSL-TB/XII', 'assets/images/noprofile.gif'),
(53, 114, 'RAUDHAH', 'RAUDAH', 'P', 'TANAH LAUT', 1, '12-05-2002', 'GG.LIANA', '008', '002', 'SEJAHTERA', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251418245', 'SMPN 1 BATULICIN', 'B', '1505388', '', '', '13-022-031-2', '6310095205020006', '30303613', '', '', '', 'raudhah1258@gmail.com', '6310093003120230', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00256600341492656107.jpeg'),
(54, 28, 'MAULIDAH KHAIRIAH', 'KAHA', 'P', 'SAMARINDA', 1, '16-05-2002', '-', '10', '2', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'BATULICIN KAB. TANAH BUMBU', 'KALIMANTAN SELATAN', '085251033516', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4423', '', '', '13-036-049-8', '6402065605020003', '30303626', '', '', '', 'maulidahkhairiah@gmail.com', '-', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00251346721492607337.jpeg'),
(55, 102, 'KHAIRUNISA RAHMADAYANTI', 'NISA', 'P', 'TANAH LAUT', 1, '11-11-2002', 'DESA BAROKAH', '15', '-', 'DESA BAROKAH', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082251854304', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4402', '', '', '13-036-181-4', '6310095111020009', '30303626', '', '', '081349492566', 'khairunisar921@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'KARENA ADA YANG LEBIH MEMBUTUHKAN ', '1146/UM/CATPIL/2002', 'assets/upload/peserta/00216104291492668457.jpg'),
(56, 78, 'PUTRI ANANDA', 'PUTRI', 'P', 'TANAH BUMBU', 1, '25-06-2002', 'BATULICIN', '10', '-', 'BERSUJUD', '72171', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085348939951', 'MTS.NURUL HIDAYAH', 'B', '14.4109', '', '', '13-063-085-4', '6310096505020007', '30315463', '', '', '0', 'putriananda25@gmail.com', '6310091403121235', '0', '', '0', '', '0', '', '', '', '022/SKPS-DB/III/2012', 'assets/upload/peserta/00211591511492670833.jpeg'),
(57, 137, 'SRI RONDIYAH', 'IYAH', 'P', 'HARAPAN MAJU', 1, '24-04-2001', '05', '09', '05', 'MADU RETNO', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082250456304', 'SMPN 8 MANTEWE', 'B', '226', '', '', '13-077-044-5', '6310086404000003', '12 11510 08 008', '', '', '', 'Iyah24@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '871/IST/CATPIL-TB/v/', 'assets/images/noprofile.gif'),
(58, 81, 'ANISA APRILIA', 'NISA', 'P', 'BATULICIN', 1, '04-04-2002', 'BATULICIN', '006', '002', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '083125596718', 'SMPN 1 BATULICIN', 'B', '1.05137', '', '', '13-022-134-3', '6310014404020001', '30 30 36 13', '', '', '', 'anisaapriliaa04@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'BERASAL DARI KELUARGA MAMPU', '1580/IST/CSL-TB/V/20', 'assets/upload/foto/00208646241492431955.jpg'),
(59, 143, 'BELLA EDHAR NOVIA ARDHANA', 'BELLA', 'P', 'NGAWI', 1, '28-08-2002', 'GUNUNG ANTASARI', '11', '04', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081351926995', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4328', '', '', '13-036-172-5', '6310096808020007', '30303626', '', '', '081351926995', 'bellaedharnovia28@gmail.com', '6310091903120440', 'N', '', 'N', '', 'N', '', '', 'KARENA ADA YANG LEBIH MEMBUTUHKAN', '6742/KLB/2002', 'assets/upload/peserta/00132636301492736184.jpeg'),
(60, 139, 'FANDI INDRA PURNOMO', 'FANDI', 'L', 'TULUNGAGUNG', 1, '22-04-2002', 'BATULICIN', '08', '2', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081257309535', 'SMPN 1 BATULICIN', 'B', '14.05174', '', '', '13-022-009-8', '6310092204020009', '30 30 36 13', '', '', '', 'fandiindra44444@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00152552031492738263.jpeg'),
(61, 142, 'MUZDALIFAH', 'MUSDA', 'P', 'SIMPANG EMPAT', 1, '05-07-2002', 'TANAH MERAH', '010', '-', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085386018229', 'SMPN 1 BATULICIN', 'N', '14.05283', '', '', '13-022-026-7', '6310014507020001', '30303613', '', '', '085386018229', 'musdaalfh@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '1061/PLBPS-KTB/VIII/', 'assets/upload/peserta/00221300471492741491.jpeg'),
(62, 22, 'JULIUS HIZKIA KARDO SIMANJUNTAK', 'HIZKIA', 'L', 'BATULICIN', 2, '25-07-2002', '-', '007', '-', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082358848283', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4398', '', '', '13-036-017-8', '6310092507020009', '30303626', '', '', '082254240947', 'juliushizkia3@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00286152821493079841.jpg'),
(63, 145, 'SITI SALMIA', 'SALMIA', 'P', 'PAGATAN', 1, '13-08-2002', '1', '009', '-', 'SARIGADUNG', '72211', 'SIMPANGEMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251892227', 'MTS DARUL AZHAR', 'A', '14.2081', '', '', '13-064-220-5', '6310095308020006', '30315464', '', '', '-', 'www.salmiah31@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '850/IST/CSL-TB/III/2', 'assets/upload/peserta/00263193401492735117.jpeg'),
(64, 140, 'NANA NURSANA AHDA', 'NANA', 'P', 'BANJARBARU', 1, '21-03-2002', 'KAMPUNG BARU', '02', '02', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'KALIMANTAN SELATAN ', 'KALIMANTAN SELATAN ', '081351566540', 'MTS DARUL AZHAR', 'A', '14.2046', '', '', '13-064-154-7', '6310096103020004', '1212.6310.0021', '', '', '', 'nana.nursana21@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00213987191492831749.jpeg'),
(65, 150, 'MUHAMMAD RIDHO', 'RIDHO', 'L', 'KOTABARU', 1, '15-12-2001', 'PONDOK BUTUN', '005', '002', 'GUNUNG TINGGI', '-', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082251916964', 'SMPN 1 BATULICIN', 'B', '14.05258', '', '', '13-022-025-8', '6302061512010001', '30 30 36 13', '', '', '-', 'ridhomuhammad844@gmail.com', '6310013012140003', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00188527591492727185.jpeg'),
(66, 146, 'APRIANA KURNIA NINGSIH', 'YANA', 'P', 'BANJARMASIN', 1, '08-04-2002', 'KARANG BINTANG', '06', '03', 'KARANG BINTANG', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085389645245', 'SMPN 4 KARANG BINTANG', 'B', '281', '', '', '13-035-031-2', '6310084804020003', 'SMPN 4 KARANG BINTANG', '', '', '', 'Aprianakurnia@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00233703341492736773.jpeg'),
(67, 131, 'SOFIATUL  ROHMAH', 'SOFI', 'P', 'HARAPAN MAJU', 1, '26-01-2002', '5', '09', '05', 'MADU RETNO', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082255010754', 'SMPN 8 MANTEWE', 'B', '201', '', '', '13-077-043-6', '6310086601020001', '20 11510 08 008', '', '', '', 'sofiabluelg@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '1539/ISTIMEWA/CATPIL', 'assets/upload/foto/00233595771492403766.jpeg'),
(68, 147, 'FILDA HAMIDAH', 'FILDA ', 'P', 'KOTA BARU', 1, '27-10-2001', 'KARANGBINTANG', '05', '03', 'KARANGBINTANG', '72271', 'KARANGBINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081952014133', 'SMPN4 KARANGBINTANG', 'B', '293', '', '', '13-035-037-4', '6310086710010001', 'SMPN4 KARANGBINTANG', '', '', '', 'fildabatulicin23@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00164613761492735333.jpeg'),
(69, 132, 'ANDREW CHRISTIAN ROSEVELT SITUMEANG', 'ANDREW', 'L', 'BATULICIN', 2, '07-12-2001', 'JLN.BANYUWANGI', '01', '-', 'DS.GUNUNG ANTASARI', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081251523889/0813487', 'SMPN 2 SIMPANG EMPAT', 'B', '1139-14', '', '', '13-037-108-5', '6302060712010010', 'SMPN 2 SIMPANG EMPAT', '', '', '0812515238893', 'Andrewbebek11@gmail.com', '-', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00111871981492737260.jpeg'),
(70, 154, 'MUHAMMAD EVRIAN', 'RIYAN', 'L', 'BANJARMASIN', 1, '15-06-2002', 'BATULICIN', '13', '03', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BAMBU', 'KALIMANTAN SELATAN', '081351592133', 'SMPN 1 BATULICIN', 'B', '14.05251', '', '', '13-022-022-3', '6310011306020002', '30 30 36 13', '', '', '-', 'evrianmuhammad@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00220586681492738917.jpeg'),
(71, 39, 'STEFANNY LAURA SITUMORANG', 'STEFANNY', 'P', 'KARANG LIWAR', 2, '13-09-2002', 'GUNUNG BESAR', '003', '002', 'GUNUNG BESAR', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085332830777', 'SMPN 2 SIMPANG EMPAT', 'B', '1099-14', '', '', '13-037-070-3', '6310065309020001', '30311417', '', '', '-', 'Stefannyiphone@yahoo.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00256229211492654543.JPG'),
(72, 161, 'GUSTI ANNISA NURANI', 'ANNISA ', 'P', 'BEBUNGA', 1, '05-03-2002', 'BATULICIN', '8 ', 'II', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '081250113347', 'SMP ISLAM TERPADU AR-RASYID ', 'A', '120205', '', '', '13-044-043-6', '6310014503020002', '30311406', '', '', '', 'gustiannisa300@gmail.com', '63100209959', 'N', '', 'N', '', 'N', '', '', '', '2358/IST/PLBPS-KTB/X', 'assets/upload/peserta/00232995961492742960.jpeg'),
(73, 166, 'PUTRI DEVY YULIANTI ', 'YANTI', 'P', 'BANJARMASIN', 1, '09-01-2002', 'JLN MAWAR', '013', '004', 'SEJAHTERA', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348159248', 'SMP NEGERI 1 BATULICIN', 'B', '14.05307', '', '', '13-022-029-4', '6310094901020009', '30303613', '', '', '', 'raudahnurrahmah05@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1378/IST-A/2002', 'assets/upload/peserta/00216103661492737203.jpeg'),
(74, 63, 'TEGAR ANGGARA', 'ANGGA', 'L', 'HARAPAN MAJU', 1, '10-06-2002', '01', '05', '03', 'MADU RETNO', '72211', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082350599799', 'SMPN 8 MANTEWE', 'B', '227', '', '', '13-077-020-5', '6310081006020003', '20 11510 08 008', '', '', '', 'tegaranggara162@gmail.com', '6310082602080161', 'N', '', 'Y', '', 'N', '', '', '', '3088 / IST / CSL-TB ', 'assets/upload/peserta/00233595891492658993.jpeg'),
(75, 100, 'YASIR MAULANA', 'YASIR', 'L', 'SARIMULYA', 1, '04-06-2002', '1', '05', '03', 'SARIMULYA', '72271', 'MANTEWE', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082281140913', 'SMPN 8 MANTEWE', 'B', '204', '', '', '13-077-021-4', '6310100406020003', '20.11510.08.008', '', '', '085348335005', 'yasirscout1612@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '5343/ISTIMEWA/CATPIL', 'assets/upload/foto/00213933511492427752.JPG'),
(76, 167, 'AS''SYIFA NUR ANDINI', 'SYIFA ', 'P', 'BATULICIN', 1, '14-02-2002', '-', '08', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082399311973', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4318', '', '', '13-036-008-9', '6310095402020007', '30303626', '', '', '081349519092', 'nurandini.syifa@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0235/PLBPS-KTB/III/2', 'assets/upload/peserta/00216103711492739983.jpeg'),
(77, 169, 'MUHAMMAD REZAL', 'REZAL', 'L', 'TUNGKARAN PANGERAN', 1, '24-05-2001', '-', '02', '-', 'TUNGKARAN PANGERAN', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082350473318', 'SMP KODECO', 'B', '14-3250', '', '', '13-043-033-8', '6310092405010002', '30303616', '', '', '', 'muhammadrezal360@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '1511/IST/PLBPS-KTB/X', 'assets/upload/peserta/00216103851492736734.jpeg'),
(78, 170, 'ISFAN', 'ISFAN', 'L', 'PALLAMEANG', 1, '09-04-2002', 'BATULICIN', '008', '002', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085390280372', 'SMP NEGERI 1 BATULICIN', 'C', '14.05203', '', '', '13-022-047-2', '6310010904020002', '30303613', '', '', '', 'Isfan0904@gmail.com', '6310012006130069', '0', '', '0', '', '0', '', '', '', '11743/IST/CSL-TB/XII', 'assets/upload/peserta/00222952921492743317.jpeg'),
(79, 97, 'JAUZA NAJA MULYA', 'JAUZA', 'P', 'BANJARMASIN', 1, '20-06-2002', '-', '8', '-', 'BAROKAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895323449019', 'SMPIT AR-RASYID', 'A', '0397', '', '', '130440498', '6371026006020013', '30311406', '', '', '05186070539', 'Jauzanm01@gmail.com', '', '0', '', '0', '', '0', '', '', '', '155.B/DISP-KTB/IX/20', 'assets/upload/peserta/00285569041492670659.jpeg'),
(80, 6, 'MUHAMMAD FAZRUR FARIZQI', 'FAZRUR', 'L', 'KOTABARU', 1, '24-05-2002', '-', '9', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154054954', 'SMPIT AR-RASYID', 'A', '0401', '', '', '13-044-018-7', '6310092405020007', '30311406', '', '', '', 'fazrursk@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '0731/PLBPS-KTB/VI/20', 'assets/upload/foto/0021026171.jpg'),
(81, 83, 'CAYA NITA SEPTIANI', 'CAYA NITA SEPTIANI', 'P', 'BATULICIN', 1, '25-09-2001', 'BATULICIN', '015', '003', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '087896349129', 'SMP NEGERI 1 BATULICIN', 'B', '14.05153', '', '', '13-022-201-8', '6310016509010001', '30303613', '', '', '', 'nannie_miss@yahoo.com', '', '0', '', '0', '', '0', '', '', '', '3450/IST/CSL-TB/VII/', 'assets/upload/peserta/00150987821492742281.jpeg'),
(82, 172, 'REGINA SHINTIA DEVITA', 'REGINA', 'P', 'KOTABARU', 1, '05-06-2002', 'SARIGADUNG', '02', '00', 'SARIGADUNG', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082250323075', 'MTS. DARUL AZHAR BERSUJUD', 'A', '14.2068', '', '', '13-064-093-4', '6310094506020006', '1212.6310.0021', '', '', '', 'reginashintiadevita@gmail.com', '6310092804120130', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00223680411492738564.jpeg'),
(83, 175, 'AMELIA NIDA AULIYANI', 'NIDA', 'P', 'BATULICIN', 1, '28-01-2002', '-', '09', '03', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081349685830', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4300', '', '', '13-036-005-4', '6310096801020002', '30303626', '', '', '-', 'nidamelyaa@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '-', '0542/IST/PLBPS-KTB/I', 'assets/upload/peserta/00221740491492735508.jpg'),
(84, 120, 'ARYA SYIFA HERMIATI', 'SYIFA', 'P', 'MARTAPURA', 1, '27-06-2003', 'KAMPUNG BARU', '009', '003', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085348143958', 'SMP NEGERI 1 BATULICIN', 'B', '14.05145', '', '', '13-022-002-7', '6310096706030004', '30303613', '', '', '', 'ayasyifa95@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '0505/REG/VII-2003', 'assets/upload/peserta/00388726751492701071.jpeg'),
(85, 177, 'MAWADDAH ISLAMIAH FADLI ', 'MAWADDAH ', 'P', 'MAKASSAR ', 1, '04-08-2001', 'JL PELABUHAN SAMUDRA', '001', '001', 'SEJAHTERA', '72211', 'SIMPANG EMPAT ', 'TANAH BUMBU ', 'KALIMANTAN SELATAN ', '085252303940', 'MTS DARUL AZHAR', 'A', '14.2039', '', '', '13-064-083-6', '6310094408010002', '30315464', '', '', '', 'Mawaddahislamiah35@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(86, 178, 'RAUDHATUL ADAWIYAH', 'ODAH', 'P', 'TUNGKARAN PANGERAN', 1, '05-07-2002', '-', '018', '-', 'TUNGKARAN PANGERAN', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '-', 'MTS. DARUL AZHAR BERSUJUD', 'A', '14.2065', '', '', '-', '6310094507020007', '30315464', '', '', '085345777885', 'Zaisyaqila2014@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '18872/IST/CSL-TB/XII', 'assets/upload/foto/00221183721492561290.jpeg'),
(87, 179, 'AHMAD ASSAMI PRATAMA', 'ASSAMI', 'L', 'PELAIHARI', 1, '12-05-2002', '-', '018', '-', 'TUNGKARAN PANGERAN', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895334494893', 'MTS. DARUL AZHAR BERSUJUD', 'A', '14.2108', '', '', '-', '6310091205020011', '-', '', '', '085345777885', 'assamipratama7@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '1648/ISTIMEWA/CATPIL', 'assets/upload/foto/00221183641492561350.jpeg'),
(88, 47, 'RIYAN FADILAH ', 'RIYAN', 'L', 'BATULICIN', 1, '26-01-2002', '-', '8', '4', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085389597596', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4503', '', '', '13-036-023-2', '6310062601020001', '30303626', '', '', '', 'ryanfadillah.rf.rf@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00214969431492653205.JPG'),
(89, 180, 'HADISTI ANDARA PUTRA ', 'DISTI', 'L', 'BANJARMASIN', 1, '14-04-2002', 'BERSUJUD', '11', '02', 'BERSUJUD', '72200', 'SIMPANG EMPAT ', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348377299', 'SMPN 1 SIMPANG EMPAT', 'B', '14-4371', '', '', '13-036-013-4', '6310091404020005', '30303626', '', '', '', 'hasnahriyanti3@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1920 No 751', 'assets/upload/peserta/00223965761492740146.jpeg'),
(90, 184, 'ANGGI JULIANTI SAPUTRI', 'ANGGI', 'P', 'KOTABARU', 1, '28-07-2002', '-', '002', '-', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0812 5177 3001', 'MTS. DARUL AZHAR', 'A', '14.1989', '', '', '13-064-002-7', '6310096807020007', '30315464', '', '', '-', 'anggijuliantisaputri@gmail.com', '6310092903121167', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00267225831492739793.jpeg'),
(91, 130, 'SEFRIANDI ANJAS DARMA LOPA', 'ANJAS', 'L', 'BATULICIN 13 SEPTEMBER 2001', 1, '13-09-2001', '2', '13', '2', 'MANUNGGAL', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081521554690', 'SMPN 1 KARANG BINTANG', 'A', '3827', '', '', '21715130320329', '6310081309010003', '30303226', '', '', '', 'anjaslopa08@gmail.com', '-', '0', '-', '0', '-', '0', '', '-', '', '1358/IST/Catpil.TB/V', 'assets/upload/peserta/00142025821492733589.jpeg'),
(92, 185, 'SITI NOR KHOLIFAH', 'IPAH', 'P', 'BATULICIN', 1, '12-03-2002', 'BATULICIN', '015', '003', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085390283611', 'SMPN 1 BATULICIN', 'B', '14.05349', '', '', '13-022-033-8', '6310015203020001', '30303613', '', '', '-', 'ipahysf01@yahoo.com', '6310012601080057', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00220586591492741091.jpeg'),
(93, 23, 'AGUSTINA PUTRI', 'PUTRI', 'P', 'BATULICIN', 1, '01-08-2002', '-', '12', '2', 'SARIGADUNG', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895706465757', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4292', '', '', '13-036-004-5', '6310094108020008', '30303626', '', '', '-', 'gustinaputri133@gmail.com', '', '0', '', '0', '', '0', '', '', '', '-', 'assets/upload/foto/00216104156.jpg'),
(94, 94, 'ENY FITRIYASIH', 'ENY', 'P', 'HARAPAN MAJU', 1, '26-12-2001', '02', '05', '03', 'MADU RETNO', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082310594305', 'SMPN 8 MANTEWE', 'B', '187', '', '', '13-077-032-9', '631008661201003', '201151008008', '', '', '-', 'enybtl@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '01295/IST/CSL-TB/II/', 'assets/images/noprofile.gif'),
(95, 186, 'RANI ANASTASIA', 'RANI', 'P', 'BATULICIN', 1, '13-04-2002', 'KERSIK PUTIH', '005', '002', 'KERSIK PUTIH', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081253939128', 'SMPN 1 BATULICIN', 'B', '14.05307', '', '', '13-022-030-3', '6310014107030024', '30303613', '', '', '-', 'rani44102@gmail.com', '6310011103080011', 'N', '', 'N', '', '0', '', '', '-', '-', 'assets/upload/peserta/00233943911492743348.jpeg'),
(96, 98, 'AMELIDA', 'AMEL', 'P', 'KOTABARU', 1, '22-05-2002', 'SARIGADUNG', '012', '002', 'SARIGADUNG', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085245819645', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4302', '', '', '13-036-006-3', '6310096205020004', '30303626', '', '', '', 'MEYDHITAMELIDA@GMAIL.COM', '6310091704120014', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/00216104031492517734.jpg'),
(97, 119, 'ASFA MAGHFIRATUNNISA', 'ASFA', 'P', 'BANJARMASIN', 1, '30-08-2002', 'BAROKAH', '16 ', '-', 'BAROKAH', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348144609', 'MTS DARUL AZHAR', 'A', '14.1998', '', '', '13-064-134-3', '6310097108020004', '30315464', '', '', '-', 'Bananayummy08@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '2233/U/2002', 'assets/upload/peserta/00232262681492669463.jpeg'),
(98, 188, 'BAHRUN BAHTIAR', 'BAHRUN ', 'L', 'KOTABARU', 1, '03-02-2001', '-', '15', '-', 'KERSIK PUTIH ', '72271', 'BATULICIN ', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '082232115823', 'SMPN 1 BATULICIN', 'B', '14.05151', '', '', '13-022-003-6', '6310010302010001', '30 30 36 13', '', '', '-', 'bhrn.bahtiar03@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00109958631492741238.jpeg'),
(99, 189, 'RIZKA ANISA', 'RIZKA', 'P', 'PAGATAN', 1, '10-06-2002', 'BAROQAH', '03', '03', 'BAROQAH', '72200', 'SIMPANG EMPAT', 'KALIMANTAN SELATAN', 'KALIMANTAN SELATAN', '082251765452', 'MTS DARUL AZHAR', 'A', '142071', '', '', '13-064-215-2', '6310095006020007', '1212.6310.0021', '', '', '', 'Kanjengdimas155@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00215609891492831825.jpeg'),
(100, 190, 'NOLA AULIA TASYA', 'NOLA', 'P', 'BEKASI', 1, '26-11-2001', '-', '09', '-', 'BAROKAH', '72213', 'SIMPANG EMPAT ', 'TANAH BUMBU ', 'KALIMANTAN SELATAN ', '081346331245', 'SMPN 1 SIMPANG EMPAT ', 'A', '15-4856', '', '', '13-036-020-5', '3201026611010008', '30303626', '', '', '-', 'nolaaulia45@gmail.com', '', '0', '', '0', '', '0', '', '', '', '3980/2006', 'assets/upload/foto/00213933511492569114.JPG'),
(101, 165, 'HERNI YULIANA', 'HERN', 'P', 'SEGUMBANG', 1, '15-09-2002', 'SEGUMBANG', '003', '-', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251944712', 'SMPIT AR-RASYID', 'A', '0392', '', '', '13-044-045-4', '6310015509020003', '30311406', '', '', '-', 'HERNIYULIANA@GMAIL.COM', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00241591071492743960.jpeg'),
(102, 191, 'PRICILIA EUNIKE MATANDE', 'CICI', 'P', 'MANUNGGAL', 2, '20-11-2001', '1', '25', '08', 'MANUNGGAL', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082153527373', 'SMP N 1 KARANG BINTANG', 'A', '3818', '', '', '21715130320969', '6310086011010004', '30303622', '', '', '-', 'pricilcici33@yahoo.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00185231161492738291.jpeg'),
(103, 110, 'ANNISA DESTI FAHJRI', 'ANNISA', 'P', 'TIMIKA', 1, '07-12-2001', '-', '09', '-', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081315310277', 'SMPN 2 SIMPANG EMPAT', 'B', '1027-14', '', '', '13-037-003-6', '6310064712010001', '30311417', '', '', '-', 'ANNISADESTIFAHJRI@GMAIL.COM', '6310062908130081', 'N', '', 'N', '', 'N', '', '', '', '477/771.a/MMK/2003', 'assets/upload/peserta/00197265831492660597.jpeg'),
(104, 201, 'BAGUS FAJAR KURNIAWAN', 'BAGUS', 'L', 'MANUNGGAL', 1, '06-06-2002', '1', '2', '1', 'MANUNGGAL', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082285111322', 'SMPN 1 KARANG BINTANG', 'A', '3751', '', '', '21715130320756', '6310080606020001', '30303622', '', '', '081348797540', 'bagusfajar0011@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0772/IST/PLBPS-KTB/I', 'assets/upload/peserta/002003119541492738342.jpeg'),
(105, 124, 'SITI MARDIANA', 'MARDIANA', 'P', 'KUSAN HILIR', 1, '02-07-2003', 'KERSIK PUTIH', '009', '002', 'KERSIK PUTIH', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089691067534', 'MTS DDI KERSIK PUTIH', 'B', '1376', '', '', '13-059-072-9', '6310014208030002', '30 31 53 93', '', '', '', 'Sitimardiana020703@gmail.com', '', 'N', '', 'N', '', 'Y', 'T99701', 'SITI MARDIANA', '', '6411/IST/CSL-TB/IV/2', 'assets/images/noprofile.gif'),
(106, 209, 'SITI NUR ZAHRAH', 'ZAHRAH', 'P', 'BATULICIN', 1, '09-01-2002', '-', '08', '02', 'BATULICIN', '71271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081929261161', 'MTS AL-HIDAYAH', 'C', '1200', '', '', '13-058-024-9', '6310014901020005', '30315446', '', '', '', 'zahrahsiti09@gmail.com', '', '0', '', '0', '', '0', '', '', '', '2025/IST/CATPIL-TB/X', 'assets/upload/peserta/00220586501492741277.jpeg'),
(107, 16, 'SYIFA''AN KAMILA', 'SYIFA', 'P', 'MARTAPURA', 1, '01-07-2002', 'KAMPUNG BARU', '007', '002', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081342417878', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4536', '', '', '13-036-060-5', '6310094107020190', '30303626', '', '', '', 'syifakmla@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0502/REG/VIII-2002', 'assets/upload/foto/00233944131492402993.jpg'),
(108, 206, 'LUKMANUL HAKIM', 'LUKMAN', 'L', 'BATULICIN', 1, '25-12-2001', '2', '3', '3', 'SARIGADUNG', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082252283742', 'SMPN 1 KARANG BINTANG', 'A', '3789', '', '', '21715130320863', '6310062512010001', '30303622', '', '', '081349452860', 'lukman3742@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00127084631492739220.jpeg'),
(109, 215, 'I PUTU HERLI ATMAJA', 'ATMAJA', 'L', 'HARAPAN MAJU', 5, '31-08-2001', '1', '3', '2', 'MADU RETNO', '72221', 'KARANNG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082252008916', 'SMPN 1 KARANG BINTANG', 'A', '3774', '', '', '21715130320845', '6310083108010001', '30303622', '', '', '081351667039', 'herlyatmaja21@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00169589911492739698.jpeg'),
(110, 214, 'HUSNUL KHOTIMAH', 'HUSNUL', 'P', 'BATULICIN', 1, '09-01-2002', '-', '08', '02', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081929261161', 'MTS AL-HIDAYAH', 'C', '1180', '', '', '13-058-007-2', '6310014901020006', '30315446', '', '', '', 'khotimahhusnul121@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '2024/IST/CATPIL-TB/X', 'assets/upload/peserta/00255233211492741247.jpeg'),
(111, 153, 'MUHAMMAD RIFKI MAULANA', 'RIFKI', 'L', 'KOTABARU', 1, '15-10-2001', 'DESA BATULICIN', '17', '3', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAM', '082251369393', 'SMPN 1 BATULICIN', 'B', '14.0527', '', '', '13-022-214-3', '6302061510010001', '30303613', '', '', '081348037785', 'rifkimaulana519@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '0892/IST/PLBPS-KTB/V', 'assets/upload/peserta/00105818791492742980.jpeg');
INSERT INTO `tbl_reg_data_diri` (`reg_data_diri_id`, `reg_data_diri_reg_akun_id`, `reg_data_diri_nama`, `reg_data_diri_panggilan`, `reg_data_diri_jenis_kelamin`, `reg_data_diri_tempat_lahir`, `reg_data_diri_agama_id`, `reg_data_diri_tgl_lahir`, `reg_data_diri_alamat_dusun`, `reg_data_diri_alamat_rt`, `reg_data_diri_alamat_rw`, `reg_data_diri_alamat_desa`, `reg_data_diri_alamat_kodepos`, `reg_data_diri_alamat_kecamatan`, `reg_data_diri_alamat_kota`, `reg_data_diri_alamat_propinsi`, `reg_data_diri_no_telp`, `reg_data_diri_lulusan`, `reg_data_diri_lulusan_akreditas`, `reg_data_diri_nis`, `reg_data_diri_seri_ijazah`, `reg_data_diri_seri_skhun`, `reg_data_diri_no_un`, `reg_data_diri_no_nik`, `reg_data_diri_npsn`, `reg_data_diri_alat_transport`, `reg_data_diri_jenis_tinggal`, `reg_data_diri_no_telp_rumah`, `reg_data_diri_email`, `reg_data_diri_no_kks`, `reg_data_diri_penerima_pkh_kps`, `reg_data_diri_no_pkh_kps`, `reg_data_diri_usulan_layak_pip`, `reg_data_diri_alasan_layak`, `reg_data_diri_penerima_kip`, `reg_data_diri_no_kip`, `reg_data_diri_nama_kip`, `reg_data_diri_alasan_menolak_kip`, `reg_data_diri_no_reg_akta`, `reg_data_diri_img`) VALUES
(112, 4, 'ADELINA AZZAHRA', 'ADEL', 'P', 'BANJARMASIN', 1, '17-12-2001', 'KAMPUNG BARU', '005', '0', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '08115170469', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4287', '', '', '13-036-003-6', '6310095712010007', '30303626', '', '', '05186070111', 'azzahraadelinaaa@gmail.com', '6310091804120310', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00174392301492604593.jpg'),
(113, 218, 'JASMINE SHAFA SEKAR ARUM', 'JASMINE', 'P', 'BATULICIN', 1, '14-01-2003', '-', '010', '-', 'KAMPUNG BARU/BAROKAH', '72200', 'SIMPANG EMPAT', 'SIMPANG EMPAT', 'KALIMANTAN SELATAN', '082157759149', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4394', '', '', '13-036-015-2', '631065401030001', '30303626', '', '', '-', 'shafasekararum@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '0248/PLBPS-KTB/III/2', 'assets/upload/peserta/00301565021492742073.jpeg'),
(114, 173, 'SYAFA AQILLA FADYA', 'FADYA', 'P', 'BATULICIN', 1, '13-06-2002', 'BAROKAH', '12', '002', 'BAROKAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082150083666', 'SMPN 1` SIMPANG EMPAT', 'A', '14-4533', '', '', '13-036-029-4', '6310095306020012', '30303626', '', '', '', 'syafrudin1976@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '0951/PLBPS-KTB/VIII/', 'assets/upload/foto/00233944251492561049.jpeg'),
(115, 207, 'WINDAY IHZHA YUSHRA', 'WINDAY', 'P', 'KOTABARU', 1, '01-10-2002', 'KAMPUNG BARU', '10', '03', 'KAMPUNG BARU', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081255523019', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4549', '', '', '13-036-061-4', '6310064110020005', '30303626', '', '', '', 'windayihzha@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(116, 155, 'AHMAD RAYHANSYAH', 'REYHAN', 'L', 'BATULICIN', 1, '20-12-2002', 'BAROKAH', '13', '-', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082255479321', 'SMPN 1 SIMPANG EMPAT', 'A', '200060', '', '', '13-036-237-4', '6310062012020002', '30303626', '', '', '', 'Rnadie10@gmail.com', '', '0', '', '0', '', '0', '', '', '', '2128/ISTIMEWA/CATPIL', 'assets/images/noprofile.gif'),
(117, 61, 'DELLYA PRAMESTI NINGRUM', 'DELLYA', 'P', 'KOTABARU', 1, '16-03-2002', 'REJOWINANGUN', '03', '02', 'REJOWINANGUN', '72211', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081253616155', 'SMP NEGERI 2 KARANG BINTANG', 'A', '2402', '', '', '13-033-027-6', '6310085603020001', '30303629', '', '', '081253616155', 'bagusmukti33@gmail.com', '6310072306160002', 'N', '', 'N', '', 'N', '', '', '', '519/IST/CATPIL-TB/V/', 'assets/upload/peserta/00206032651492652331.jpeg'),
(118, 101, 'JIHAN PUTRI FAISAL', 'JIHAN', 'P', 'BANGKALAN', 1, '18-09-2001', 'JL. DUMAING PERUM KERSIK PUTIH INDAH III BLOK C1/1', '010', '-', 'KERSIK PUTIH', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0812 5067 069', 'MTS. DARUL AZHAR', 'A', '14.2299', '', '', '13-064-073-8', '6310065809010001', '30315464', '', '', 'Tidak ada', 'jihanputrifaisal@gmail.com', '6310010309140001', 'N', '', 'N', '', 'N', '', '', '-', 'AL 7630081200', 'assets/upload/peserta/00187872801492742482.jpg'),
(119, 220, 'GUSTI DEVI KARTIKA', 'TIKA', 'P', 'MANUNGGAL', 1, '30-06-2001', '1', '04', '02', 'MEKARSARI', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154932848', 'SMP N 1 KARANG BINTANG', 'A', '13764', '', '', '21715130320818', '6310097007010002', '30303622', '', '', '-', 'gustidevi2001@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/001169589881492736901.jpeg'),
(120, 219, 'AHMAD NASAR', 'NASAR', 'L', 'KERSIK PUTIH', 1, '27-07-2003', '01', '4', '1', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'KUSAN HILIR', 'KALIMANTAN SELATAN', '085250602371', 'MTS DDI KERSIK PUTIH', 'B', '1315', '', '', '13-059-003-6', '63100127070400001', '30315393', '', '', '-', 'ahmadnasar781@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '9401/IST/CSL-TB/X/20', 'assets/upload/foto/00388726751492600720.jpg'),
(121, 223, 'ABEDYA SUSANTO', 'ABED', 'L', 'PEKANBARU', 1, '06-09-2002', 'SEPUNGGUR', '005', '03', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085346264602', 'SMPN 4 KUSAN HILIR', 'B', '102005', '', '', '13-500-050-7', '6310060609020001', '30311411', '', '', '', 'dretno.w34@gmail.com', '', '0', '', '0', '', '0', '', '', '', '4958/Tp/2006', 'assets/upload/peserta/00104425001492735897.jpeg'),
(122, 222, 'LISDAWATI', 'LISDA', 'P', 'BANJARMASIN', 1, '06-03-2002', 'SIMPANG EMPAT', '08', '02', 'KAMPUNG BARU', '-', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '085348908029', 'MTS NURUL HIDAYAH', 'B', '14. 4048', '', '', '13-063-078-3', '6310064603020002', '30315463', '', '', '085248835641', 'lisdawati128@yahoo.co.id', '', '0', '', '0', '', 'Y', '4BUB6D', 'LISDAWATI', '', '03855/IST/CSL-TB/V20', 'assets/upload/peserta/00221740551492742892.jpeg'),
(123, 225, 'JULIA RAHMA', 'LIA', 'P', 'SARIGADUNG', 1, '30-07-2002', '2', '03', '-', 'SARIGADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082221768394', 'SMP N 1 KARANG BINTANG', 'A', '13784', '', '', '21715130320516', '6310097007020006', '30303622', '', '', '-', 'julia.rahma8118@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '3612/IST/CLS-TB/VII/', 'assets/upload/peserta/002786900051492823953.jpeg'),
(124, 224, 'MUHAMMAD RIJAL FADHLI', 'RIJAL', 'L', 'KAMPUNG BARU', 1, '15-07-2002', '2', 'RT. 08 JAL', 'RW. 04', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081349794665', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4447', '', '', '13-036-222-3', '6310091507020009', '30303626', '', '', '051871646', 'rijalfadhli65@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00221117291492740392.jpeg'),
(125, 226, 'MUHAMMAD RIKKI SUPRATIKNO', 'RIKI', 'L', 'MANUNGGAL ', 1, '12-03-2001', '2', '16', '2', 'MANUNGGAL', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085822636928', 'SMPN 1 KARANG BINTANG', 'A', '3801', '', '', '13-032-090-7', '6310081203010002', '30303622', '', '', '', 'rikisupratikno420@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0720/IST/PLBPS-KTB/I', 'assets/upload/peserta/00152123861492824040.jpeg'),
(126, 227, 'EMY QURNIAWATI', 'EMY', 'P', 'MANUNGGAL', 1, '04-07-2002', '1', '01', '01', 'MANUNGGAL', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251949058', 'SMP N 1 KARANG BINTANG', 'A', '3854', '', '', '21715130320107', '6310084407020005', '30303622', '', '', '-', 'emykurniawati11@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '2197/IST/PLBPS-KTB/X', 'assets/upload/peserta/00298933721492821070.jpeg'),
(127, 181, 'NISDA NOR AWALIA', 'NISDA', 'P', 'BATULICIN', 1, '01-06-2002', '-', '013', '004', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082352169252', 'SMPN 1 SIMPANG EMPAT ', 'A', '14-4464', '', '', '-', '6310094106020005', ' 30303626', '', '', '-', 'nisdaawalia01@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/foto/00247452629.jpg'),
(128, 229, 'INDAH SILVIA', 'INDAH', 'P', 'SARIGADUNG', 1, '27-04-2002', '2', '06', '02', 'SUNGAI DUA', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085845639394', 'SMP N 1 KARANG BINTANG', 'A', '3776', '', '', '21715130320152', '6310094704020005', '30303622', '', '', '-', 'indahsilvia2704@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00210049581492826349.jpeg'),
(129, 232, 'PERMATA PUTRI AYUNDA SARI', 'PERMATA', 'P', 'TANAH LAUT', 1, '27-06-2002', 'KERSIK PUTIH', '004', '001', 'KERSIK PUTIH', '72200', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085252436581', 'SMPN 1 BATULICIN', 'B', '14.05306', '', '', '13-022-057-8', '6310016706020002', '30 30 36 13', '', '', '', 'Permataputribtl123@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'DARI WARGA MAMPU', '816/UM/CATPIL/2002', 'assets/images/noprofile.gif'),
(130, 68, 'RAUDATUL MADINA', 'DINA', 'P', 'GANDARAYA', 1, '28-08-2002', 'TUNGKARAN PANGERAN', '3', 'TIDAK ADA', 'TUNGKARAN PANGERAN', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348630039', 'SMPIT ARRASYID', 'A', '0431', '', '', '130440623', '6310096808020006', '30311406', '', '', '', 'Madinaraudag@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00221300271492659711.jpeg'),
(131, 213, 'ALYA NUR ERZA LUTHVIYA', 'ALYA', 'P', 'KAMPUNG BARU', 1, '15-04-2002', '-', 'RT.02 ', 'RW.01', 'DESA SEJAHTERA', '72171', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081251795437', 'MTS. DARUL AZHAR', 'A', '14.1986', '', '', '13-064-197-4', '6310095504020006', '30315464', '', '', '0518-70282 ', 'sachetortem@gmail.com', ' 6310090404110049', 'N', '', 'N', '', 'N', '', '', 'KARENA SMAN 1 SIMPANG EMPAT PILIHAN TERBAIK BAGI S', '0726/PLBPS-KTB/VI/20', 'assets/upload/peserta/00227800731492738937.jpeg'),
(132, 123, 'AGUSTINA', 'TINA', 'P', 'SEGUMBANG ', 1, '17-08-2002', '001/-', '001', '-', 'SEGUMBANG ', '72271', 'BATULICIN ', 'TANAH BUMBU ', 'KALIMANTAN SELATAN ', '0895382602748', 'MTS.DDI KERSIK PUTIH ', 'B', '1310', '', '', '13-059-028-5', '6310015708020002', '30315445', '', '', '-', 'Agustinasgb1708@gmail.com', '6310011101100003', 'Y', 'HIvwft72200009', 'Y', 'KURANG MAMPU ', '0', '', '', '', '31207/IST/CSL-TB/XII', 'assets/upload/peserta/00234940281492819653.jpeg'),
(133, 11, 'ILHAM', 'ILHAM', 'L', 'BATULICIN', 1, '01-09-2002', '-', '006 ', '-', 'BAROKAH', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082299149322', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4387', '', '', '13-036-077-4', '6310090109020004', '30303626', '', '', '-', 'ilhamvsdeadpool@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '', 'assets/upload/peserta/00216104191492704553.jpeg'),
(134, 121, 'HASNA', 'HASNA', 'P', 'SEGUMBANG', 1, '11-08-2002', '003/-', '003', '-', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895706576496', 'MTS.DDI KERSIK PUTIH', 'B', '1328', '', '', '13-059-036-5', '6310015108020002', '30315393', '', '', '-', 'hasna1102@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '6717/IST/CSL-TB/IV/2', 'assets/upload/peserta/00170785821492819824.jpeg'),
(135, 234, 'SAHID ABDULLAH', 'SAHID', 'L', 'SEPUNGGUR', 1, '26-05-2002', 'SEPUNGGUR', '04', '01', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BIMBU', 'KALIMANTAN SELATAN', '085332060157', 'MTS DDI KERSIK PUTIH', 'B', '1379', '', '', '13-059-026-7', '6310022605020003', '30315393', '', '', '', 'Sahidabdullah112@gmail.com', '', '0', '', '0', '', 'N', '', '', '', '', 'assets/images/noprofile.gif'),
(136, 236, 'JESSIKA MEIDINA', 'JESSIKA', 'P', 'MEKARPURA', 1, '06-05-2002', '-', '004', '002', 'MEKARPURA', '72151', 'PULAU LAUT TENGAH', 'KOTABARU', 'KALIMANTAN SELATAN', '085828184216', 'SMP NEGERI 1 PULAU LAUT TENGAH', 'B', '915', '', '', '045', '6302164605020002', '30303360', '', '', '', 'jessikamei@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(137, 239, 'DENI PUTRA HARTANTO', 'DENI', 'L', 'BATULICIN', 1, '16-11-2002', 'JL. TERATAI KM 8', '005', '-', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082214608283', 'SMPN 2 SIMPANG EMPAT', 'B', '1170-15', '', '', '13-037-075-6', '6310061611020001', '10204087', '', '', '085248594410', 'Denimelenius89@gmail.com', '6310061003150003', 'N', '', 'N', '', 'N', '', '', '-', '119/IST/CATPIL-TB/1/', 'assets/images/noprofile.gif'),
(138, 197, 'MUHAMMAD NUR', 'M.NOR', 'L', 'SULAWESI SELATAN', 1, '01-11-2001', '-', '4', '-', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '-', 'MTS DDI KERSIK PUTIH', 'B', '1343', '', '', '13-059-014-3', '6310020111010003', '30315393', '', '', '-', 'mnur2917@gmail.com', 'K4U8YD', 'N', '', 'N', 'KARENA ', 'Y', 'T5NG9I', 'M. NUR', '', 'AL.763.0026046', 'assets/upload/peserta/00177322131492738898.jpeg'),
(139, 238, 'ABDULLAH GAJALI', 'JALI', 'L', 'BATULICIN', 1, '29-05-2002', '-', '08', '02', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895334532856', 'MTS AL-HIDAYAH', 'C', '1207', '', '', '13-058-002-7', '6310012905020002', '30315446', '', '', '', 'abdullahgajali@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '1974/IST/PLBPS-KTB/I', 'assets/upload/peserta/00211326251492821249.jpeg'),
(140, 182, 'FERRY VERDIAN', 'FERRY', 'L', 'BATULICIN', 1, '03-07-2002', 'KAMPUNG BARU', '5', '-', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081349425999', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4364', '', '', '13-036-070-3', '6310060307020004', '30303626', '', '', '-', 'ferryverdianhero@gmail.com', '-', 'N', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00216104111492726372.jpeg'),
(141, 93, 'JUMRIANI', 'RIA', 'P', 'BALLE', 1, '05-10-2001', 'BERSUJUD', '007', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081253646426', 'SMP NEGERI 1 BATULICIN', 'C', '1405205', '', '', '13-022-015-2', '6310094510010012', '30303613', '', '', '-', 'riajumriani011005@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '804.0065930', 'assets/upload/peserta/00114466241492664821.jpeg'),
(142, 196, 'ARMAN', 'ARMAN', 'L', 'PAGATAN', 1, '19-12-2001', 'SEPUNGGUR', '04', '01', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085349403353', 'MTS DDI KERSIK PUTIH', 'B', '1317', '', '', '13-059-004-5', '6310021912010001', '30315393', '', '', '', 'armand7981@gmail.com', '-', 'N', '', 'Y', 'YATIM', 'N', '', '', '-', '04564/IST/CSL-TB/VI/', 'assets/images/noprofile.gif'),
(143, 193, 'KHURIYATUL JAMILAH', 'RIYA', 'P', 'TANAH LAUT', 1, '01-01-2003', 'PEMATANG ULIN', '03', '02', 'PEMATANG ULIN', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082352023926', 'SMPN2 KARANG BINTANG', 'A', '2423', '', '', '13-033-051-6', '6310074101030002', '30303629', '', '', '-', 'khuriyatuljamilah03@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '27946/DIS/CAPIL/2011', 'assets/upload/peserta/00357657651492731112.jpeg'),
(144, 112, 'NIKODEMUS YOEL SIMAMORA', 'NIKO', 'L', 'KOTABARU', 2, '17-03-2002', 'RANTAU JAYA', '011', '001', 'RANTAU JAYA', '72167', 'SUNGAI DURIAN', 'KOTABARU', 'KALIMANTAN SELATAN', '0831-5927-2363', 'SMP NEGERI 1 PAMUKAN UTARA', 'B', '2939', '', '', '0', '6302131703020005', '123456', '', '', '0', 'Nikodemusysimamora@gmail.com', '0', 'N', '', 'N', '', 'N', '', '', 'KARENA BELUM TARDATA', '1623/IST/IP.RPS-KTB/', 'assets/upload/peserta/00238315991492657910.jpeg'),
(145, 135, 'LETISIA AYUNI DWI OKTARI', 'LETISIA', 'P', 'KAMPUNG BARU', 1, '23-10-2001', '-', '10', '4', 'BAROQAH', '72200', 'SIMPANG EMPAT', 'KAB.TANAH BUMBU / BATULICIN', 'KALIMANTAN SELATAN ', '082252671622', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4406', '', '', '13-036-046-3', '6310096910000002', '30303626', '', '', '', 'Letisiabatulicin@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '1308/PLBPS-KTB/XII/2', 'assets/upload/peserta/00199179311492608743.jpeg'),
(146, 250, 'QURROTU ''AINII LUTHFIATI', 'AINI', 'P', 'SEMARANG', 1, '28-02-2002', 'PERUM BERSUJUD BLOK C NO 8', '15', '-', 'BAROKAH', '72172', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085787429432', 'MTS DARUL AZHAR', 'A', '14.2229', '', '', '13-064-158-3', '6310096802020006', '30315464', '', '', '', 'QURROTUAINII42@GMAIL.COM', '', 'N', '', 'N', '', 'N', '', '', '', '1780/2002', 'assets/upload/peserta/00273539151492827801.jpeg'),
(147, 217, 'ANDI DARLIANI', 'ANI', 'P', 'PAGATAN', 1, '23-05-2002', '-', '3', '-', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081250178510', 'SMPN 4 KUSAN HILIR', 'B', '14.415', '', '', '13-005-025-8', '6310026305020002', '30311411', '', '', '', 'abdillahmhi@gmail.com', '', '0', '', '0', '', '0', '', '', '', '9091/IST/CSL-TB/IX/2', 'assets/upload/peserta/00211753401492736826.jpeg'),
(148, 252, 'I GUSTI PUTU AGENG SANTOSO', 'AGENG', 'L', 'GUNTUNG PAYUNG', 1, '06-11-2001', 'KAMPUNG BARU', '009', '003', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081255094559', 'SMP KODECO', 'B', '202151006002', '', '', '13-043-050-7', '6310060611010004', '30303616', '', '', '05183021466', 'gsantoso415@gmail.com', '6310090611120172', 'N', '', 'N', '', 'N', '', '', '', '0687/uM/XI/2001', 'assets/upload/peserta/00159288841492825049.jpeg'),
(149, 194, 'SEPHIYA APRILIYANI', 'SEPHIYA', 'P', 'REJOWINANGUN', 1, '18-04-2002', 'DESA REJOWINANGUN', 'RT 2', 'RW 1', 'REJOWINANGUN', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082251073176', 'SMPN 2 KARANG BINTANG', 'A', '2447', '', '', '13-033-060-5', '6310085804020002', '30303629', '', '', '-', 'Sephiyaapriliyani000@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '761/IST/CATPIL-TB/V/', 'assets/upload/peserta/00206032681492730614.jpeg'),
(150, 183, 'MARIANA ASTUTI', 'NANA', 'P', 'TANAH BUMBU', 1, '23-10-2001', '-', '08', '-', 'BERSUJUD', '72', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081347637502', 'MTS DARUL AZHAR', 'A', '14.2034', '', '', '13-064-147-6', '6310096310010004', '30315464', '', '', '-', 'nanamarias24@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '-', '1520/ISTIMEWA/CATPIL', 'assets/upload/peserta/00152242351492738837.jpeg'),
(151, 253, 'TRIANA PUTRI MAHARANI', 'PUTRI', 'P', 'BATULICIN', 1, '14-03-2003', 'GG HIDAYATULLAH', '10', '-', 'BERSUJUD', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082148928923', 'MTS DARUL AZHAR', 'A', '14.2085', '', '', '13-064-221-4', '6310095403030005', '30315464', '', '', '', 'sythata@gmail.com', '6310091503120887', 'N', '', 'N', '', 'N', '', '', '', '0155/PLBPS-KTB/III/2', 'assets/upload/peserta/00237170851492828550.jpeg'),
(152, 171, 'ASTINA', 'TINA', 'P', 'SIMPANG EMPAT', 1, '03-01-2003', '-', '008', '002', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082254760866', 'SMP NEGERI 1 BATULICIN', 'B', '0023394333', '', '', '130220409', '6310094303030015', '30303613', '', '', '-', 'user12.uu92@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '4099/IST/CSL-TB/III/', 'assets/upload/peserta/00365685211492740587.jpeg'),
(153, 254, 'DEPI ZAHRA IRHAMNI', 'DEPI', 'P', 'KOTABARU', 1, '19-01-2003', '1', '03', '01', 'DS. SARIMULYA', '72200', 'MANTEWE', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085346503398', 'SMPN 8 MANTEWE', 'B', '184', '', '', '13-077-003-6', '6302145901030001', '20. 11510 08 008', '', '', '', 'Devi1212yahoo@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '477', 'assets/upload/peserta/00317698251492828043.jpeg'),
(154, 198, 'RISKA NUR SETYA NINGSIH', 'RISKA', 'P', 'BANYUMAS', 1, '29-09-2002', 'KARANG REJO', '05', '03', 'KARANG REJO', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085249365308', 'SMPN 2 KARANG BINTANG', 'A', '2444', '', '', '13-033-016-9', '6310086909020002', '30303629', '', '', '', 'riskanur640@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '6246/2002', 'assets/upload/peserta/00206032831492736508.jpeg'),
(155, 237, 'M. HILMI', 'HILMI', 'L', 'SEGUMBANG', 1, '05-11-2002', '001/001', '001', '001', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '-', 'MTS.DDI.KERSIK PUTIH ', 'B', '1335', '', '', '13-059-059-6', '6310010511020003', '30315393', '', '', '-', 'Hanisahello6@gmail.com', '6310011012090001', 'Y', '6310011012090001', 'Y', 'KURANG MAMPU ', 'N', '', '', '-', '180/IST/CSL-TB/I/200', 'assets/upload/peserta/00254065781492821500.jpeg'),
(156, 246, 'ABD HAMID', 'HAMID ', 'L', 'SEGUMBANG', 1, '27-01-2002', '001/001', '001', '001', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '-', 'MTS.DDI.KERSIK PUTIH ', 'B', '1313', '', '', '13-059-002-7', '361001270102001', '30315393', '', '', '-', 'Abd.Hamid2701@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', 'MAMPU', '3164/IST/CSL-TB/VI/2', 'assets/upload/peserta/00234940051492822114.jpeg'),
(157, 260, 'MUHAMMAD NOR PAISAL', 'PAISAL', 'L', 'SIMPANG EMPAT,', 1, '11-04-2001', '2', '07', '3', 'DESA BAROKAH', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082357576774', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4440', '', '', '13-036-152-9', '6310091104010001', '30303626/20.115.1006.001', '', '', '082357576774', 'nurpaisal007@gmail.com', '', 'N', '', 'N', '', 'Y', '0126058', 'MUHAMMAD NOR PAISAL', '', '9879/IST/CSL-TB/V/20', 'assets/images/noprofile.gif'),
(158, 230, 'HANNA SAJIDA', 'HANA', 'P', 'TANIRAN SELATAN', 1, '18-08-2002', '-', '10', '-', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081380619090', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4373', '', '', '13-036-105-8', '6310095808010003', '30303626', '', '', '-', 'hanasajida180802@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '474.1/857/2002', 'assets/upload/peserta/00231117371492820114.jpeg'),
(159, 233, 'TIUR VILA DELVIA LIMBONG', 'TIUR', 'P', 'BATULICIN', 3, '04-11-2002', '-', 'RT. 10', 'RW. -', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082156579854', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4538', '', '', '13-036-126-3', '6310094409000002', '30303626', '', '', '-', 'tiurviladelvia@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '911/IST/CATPIL-TB/V/', 'assets/upload/peserta/00221300611492820510.jpeg'),
(160, 164, 'GHINA RAUDHATUL JANNAH ', 'GHINA', 'P', 'PARE-PARE', 1, '12-06-2002', 'SEJAHTERA', '009', '003', 'SEJAHTERA', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', 'Tidak ada', 'SMP IT AR-RASYID', 'A', '0440', '', '', '13-044-042-7', 'AK0019192', '30311406', '', '', 'Tidak ada', 'Ghinacs79@gmail.com', '', '0', '', '0', '', '0', '', '', '', '2111/AK/KPP/6/2007', 'assets/upload/peserta/00248490261492737691.jpeg'),
(161, 30, 'FARAH MUTIA YULIANTI', 'MUTIA', 'P', 'KAMPUNG BARU', 1, '02-07-2002', '-', '10', '02', 'BERSUJUD', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081250144444', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4361', '', '', '13-036-041-8', '6310064207020002', '30303626', '', '', '-', 'awmutiia@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0841/PLBPS-KTB/VII/2', 'assets/upload/foto/00233944141492589268.jpeg'),
(162, 148, 'FARADILA MAHSYA SAFITRI', 'DILA', 'P', 'BATULICIN', 1, '01-02-2002', '-', '007', '-', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082151119985', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4360', '', '', '-', '-', '30303626', '', '', '-', 'faradila.mahsa@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/images/noprofile.gif'),
(163, 80, 'DESPRIANA N. HASIBUAN ', 'DESPRI', 'P', 'SUNGAI DURIAN', 2, '12-12-2001', 'MANUNGGUL LAMA', '10', '03', 'MANUNGGUL LAMA', '72167', 'SUNGAI DURIAN', 'KOTABARU', 'KALIMANTAN SELATAN', '082253051774', 'SMP NEGERI 1 SUNGAI DURIAN', 'B', '200340', '', '', '03-039-007-2', '6302151212010001', '30303297', '', '', '', 'Nataliadespriana@gmail.com', '', '0', '', '0', '', '0', '', '', '', '477/1730,a-ist/csktb', 'assets/upload/peserta/00174326981492658035.jpeg'),
(164, 122, 'FATHUL JANNAH', 'ANNA', 'P', 'KOTABARU', 1, '01-06-2002', 'GUNUNG ANTASARI', '01', '-', 'GUNUNG ANTASARI', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMATAN SELATAN', '081258150827', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4362', '', '', '13-036-042-7', '6310094106020004', '30303626', '', '', '-', 'fjannah006@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '6310094106020004', 'assets/upload/peserta/00298816881492658095.jpeg'),
(165, 263, 'NOR ASYFIA', 'FIA', 'P', 'BANJARMASIN', 1, '28-10-2001', '-', '07', '06', 'SEJAHTERA', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082155949469', 'MTS DARUL AZHAR', 'A', '14.2049', '', '', '13-064-155-6', '6310096810010008', '30315464', '', '', '-', 'juandaerwin@gmail.com', '', 'N', '', '0', '', 'N', '', '', '', '', 'assets/upload/peserta/00159765931492830508.jpeg'),
(166, 268, 'NUR FITRI NATALIA SIDIK', 'NATALIA', 'P', 'PANGKAJENE', 1, '27-12-2001', 'GG.MANGGA', '014', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082154911538', 'SMPN 1 BATULICIN', 'B', '14.05296', '', '', '13-022-221-4', '6310092712010004', '30 30 36 13', '', '', '-', 'mnrdnzgo@gmail.com', '6310091403120654', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00135572231492823988.jpeg'),
(167, 267, 'DARMANTO', 'AMAN', 'L', 'SUNGAI DUA', 1, '25-05-2001', 'SUNGAI KECIL', '004', '002', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0', 'SMPN 2 SIMPANG EMPAT', 'C', '1105-14', '', '', '13-037-074-7', '6310092505010009', '30311417', '', '', '082352112336', 'gdarmanto7@gmai.com', '6310092903120527', 'N', '', 'N', '', 'N', '', '', 'SAYA TIDAK MEMILIKI ALASAN', '7630073277', 'assets/images/noprofile.gif'),
(168, 266, 'RONI ANDONIA SIMANJUNTAK', 'RONI', 'L', 'BATULICIN', 2, '25-02-2001', 'DESA GUNUNG ANTASARI', '1', 'TIDAK ADA', 'GUNUNG ANTASARI', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082255334452', 'SMPN 2 SIMPANG EMPAT TANAH BUMBU', 'A', '1053-14', '', '', '13-037-025-8', '6310092502010010', '30311417', '', '', '081348214898', 'Roniandonia46@gmail.com', '6310091903120228', 'N', '', 'N', '', 'N', '', '', 'KARENA SAYA MASIH BISA MEMBIAYAI DENGAN KELUARGA', '6310191020150068', 'assets/images/noprofile.gif'),
(169, 116, 'SURYA WARDANI', 'SURYA', 'L', 'KUALA KAPUAS', 1, '27-10-2001', 'SEJAHTERA', '003', '001', 'SEJAHTERA', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085606854927', 'SMPN 1 BATULICIN', 'A', '14-05352', '', '', '13-022-130-7', '6310092708010002', '30 30 36 13', '', '', '', 'suryawardani42@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '3343 / IST / CSL-TB ', 'assets/images/noprofile.gif'),
(170, 127, 'HENDRA FAJAR REYNALDY ', 'FAJAR', 'L', 'BATULICIN', 1, '22-04-2002', '-', '05', '-', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089523151546', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1037-14', '', '', '13-037-011-6', '6310092204020011', '30311417', '', '', '-', 'taguhbaja4@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '0766/PLBPS-KTB/VI/20', 'assets/upload/peserta/00247452621492736329.jpeg'),
(171, 272, 'DARMANTO', 'AMAN', 'L', 'SUNGAI DUA', 1, '25-05-2001', 'SUNGAI KECIL', '004', '002', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082352112336', 'SMPN 2 SIMPANG EMPAT', 'C', '1105-14', '', '', '13-034-074-7', '6310092505010009', '30311417', '', '', '082352112336', 'gdarmanto7@gmail.com', '6310092903120527', 'N', '-', 'N', '-', 'N', '-', '-', 'SAYA TIDAK MEMILIKI ALASAN', '7630073277', 'assets/upload/foto/00365685211492411104.jpg'),
(172, 271, 'JOHANSSON NOBEL', 'JOHANSSON', 'P', 'TANGGERANG', 2, '20-02-2002', 'SUNGAI KECIL', '004', '002', 'GUNUNG BESAR', '72271', 'SIMPANG EEMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082255334452', 'SMPN2 SIMPANG EMPAT', 'C', '1115-14', '', '', '13-037-087', '6310092002020008', '30311417', '', '', '082255334452', 'hansdikas@gmail.com', '6310092903121045', 'N', '', 'N', '', 'N', '', '', 'SAYA TIDAK MEMPUNYAI ALASAN', '7630081645', 'assets/images/noprofile.gif'),
(173, 270, 'MUTIARA', 'TIARA', 'P', 'KAMBORI', 1, '22-01-2002', 'SEJAHTERA', '005', '002', 'SEJAHTERA', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085249902610', 'SMPN 1 BATULICIN', 'B', '14.05282', '', '', '13-022-056-9', '6310096201020007', '30 30 36 13', '', '', '', 'ya.mutiara22@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'DARI KELUARGA MAMPU', '7630077841', 'assets/upload/peserta/00221740431492822895.jpeg'),
(174, 244, 'JOHSANSSON NOBEL', 'HANS', 'L', 'TANGERANG', 2, '20-02-2002', 'SUNGAI KECIL', '004', '002', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085345112820', 'SMPN 2 SIMPANG EMPAT', 'B', '1115-14', '', '', '13-037-087-2', '6310092002020008', '30311417', '', '', '', 'hansdikas@gmail.com', '6310092903121045', 'N', '', 'N', '', 'N', '', '', '', '11346/2002', 'assets/images/noprofile.gif'),
(175, 275, 'MUHAMMAD NOR PAISAL', 'PAISAL', 'L', 'SIMPANG EMPAT', 1, '11-04-2001', '-', '07', '3', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082357576774', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4440', '', '', '13-036-152-9', '6310091104010001', '30303626', '', '', '082357576774', 'nurpaisal007@gmail.com', '', '0', '', '0', '', '0', '', '', '', '9879/IST/CSL-TB/V/20', 'assets/upload/peserta/00119007931492819409.jpeg'),
(176, 276, 'RENI PRASTIKA', 'RENI', 'P', 'KUALA PEMBUANG', 1, '04-01-2002', 'JL. PATTIMURA', '031', '-', 'KUALA PEMBUANG I', '74211', 'SERUYAN HILIR', 'SERUYAN', 'KALIMANTAN TENGAH', '085250789948', 'SMPN 1 KUALA PEMBUANG', 'A', '6040', '', '', '090010196', '6207014401020002', '20 1 14 09 01 001', '', '', '-', 'reniprastika42@gmail.com', '6207010106100005', 'N', '', 'N', '', 'N', '', '', '-', '474.1-471.1/2810/C.S', 'assets/images/noprofile.gif'),
(177, 277, 'DICKY LOECKMAN WIRANATA', 'DICKY', 'L', 'KUSAMBI', 1, '21-09-2001', '-', '002', '001', 'MAJU MAKMUR', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085821658252', 'SMPN 2 BATULICIN', 'B', '14.207', '', '', '130670303', '6310012109010001', '30313375', '', '', '085345730765', 'dickylwiranata@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '20358/IST/CSL-TB/XII', 'assets/upload/peserta/00155900301492830471.jpeg'),
(178, 261, 'HERIANSYAH', 'RIAN', 'L', 'KUSAMBI', 1, '23-05-2002', '-', '02', '01', 'MAJU MAKMUR', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085820570061', 'SMP NEGERI 2 BATULICIN', 'B', '14.213', '', '', '130670347', '6310012305020003', '30313375', '', '', '082154938281', 'ryanheriansyah3@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '11730/IST/CSL-TB/XII', 'assets/upload/peserta/00221117111492824661.jpeg'),
(179, 55, 'LIENARDO DANAPATI', 'LEO', 'L', 'PADANG', 1, '09-11-2001', 'KAMPUNG BARU', '013', '004', 'SEJAHTERA', '72171', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081349679818', 'SMP NEGERI 1 BATULICIN', 'B', '2717', '', '', '13-022-017-8', '6310090911010010', '30303613', '', '', '081349679818', 'lienardodanapati@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00155158681492652970.jpeg'),
(180, 141, 'RYAN ABDILLAH', 'RYAN', 'L', 'BANJARMASIN', 1, '03-06-2001', 'KAMPUNG BARU', '006', '002', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089670522377', 'MTS.NURUL HIDAYAH', 'B', '144131', '', '', '13-063-103-2', '6310090306010014', '30315463', '', '', '-', 'ryanabede08@gmail.com', '6310316928', 'N', '', 'N', '', 'N', '', '', '', '328/2001', 'assets/upload/peserta/00169913081492742453.jpeg'),
(181, 273, 'APRILIANI', 'APRIL', 'P', 'BANJARMASIN', 1, '08-04-2001', '-', '06', '03', 'KERSIK PUTIH', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTASN SELATAN', '08972501534', 'SMPN 1 BATULICIN', 'B', '14-05140', '', '', '13-022-039-2', '6371034804010010', '30303613', '', '', '-', 'sayab4624@gmail.com', '', 'N', '', 'N', '', 'Y', 'T1E5FI', 'APRILIANI', '', '', 'assets/upload/peserta/00180027241492828171.jpeg'),
(182, 21, 'RIZKA ANDRIANI', 'RIZKA', 'P', 'KOTA BARU', 1, '17-11-2002', '-', '008', '-', 'SARIGADUNG', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085348079149', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4505', '', '', '13-036-025-8', '6310095711010002', '30303626', '', '', '-', 'rizkaandriani32@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '0420/IST/PLBPS-KTB/I', 'assets/upload/foto/00221117491492414760.jpeg'),
(183, 279, 'DESY NUR SAFITRI', 'DESY', 'P', 'KURANJI', 1, '14-12-2001', '-', '001', '001', 'SUKAMAJU', '72271', 'BATULICIN', 'TANAH BUMBU', 'KAL-SEL', '081281678730', 'SMPN 2 BATULICIN', 'B', '14.205', '', '', '13-067-006-3', '6310015412010001', '20.115.10.01.003', '', '', '-', 'desynursafitrimartinus@yahoo.c', '6310012610100005', 'N', '', 'N', '', 'N', '', '', '-', '0294/IST/PLBPS-KTB/I', 'assets/upload/peserta/00110614631492822802.jpeg'),
(184, 281, 'DINA LORENZA', 'DINA', 'P', 'PANDANSARI', 1, '16-06-2002', 'DESA PANDANSARI', '11', '06', 'PANDANSARI', '72271', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '082233100875', 'SMP NEGERI 2 KARANG BINTANG', 'B', '2406', '', '', '13-033-046-3', '6310085606020005', '30303629', '', '', '-', 'lddina4179@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '-', '414/IST/CATPIL-TB/II', 'assets/upload/peserta/00237524261492727604.jpeg'),
(185, 174, 'MUKHAIRAH MARDHA', 'MARDA', 'P', 'KOTABARU', 1, '17-10-2002', 'BERSUJUD', '08', '12', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082240372307', 'SMP IT AR-RASYID', 'A', '0441', '', '', '13-044-053-4', '6310096710020009', '30311406', '', '', '-', 'wwardah1929@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '1515/PLBPS-KTB/XII/2', 'assets/upload/peserta/00211591741492737265.jpeg'),
(186, 106, 'LAILA HAYATI', 'LAILA', 'P', 'BATULICIN', 1, '14-03-2002', 'BERSUJUD', '009', '-', 'BERSUJUD', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '083141101725', 'SMPN 1 SIMPANG 4', 'A', '14-4405', '', '', '13-036-182-3', '6310095403020012', '30303626', '', '', '', 'lailahyti19@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00211591161492671421.jpeg'),
(187, 265, 'RIO NANDA ARDANA', 'RIO', 'L', 'BATULICIN', 1, '28-03-2003', 'BATU BENAWA', '009', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081251288040', 'MTS.DARUL AZHAR', 'A', '14.2185', '', '', '13-064-190-3', '6310012803030002', '30315463', '', '', '081251288040', 'rionandaardana@gmail.com', '6310061802150007', 'N', '', 'N', '', 'N', '', '', 'KARENA TIDAK ADA DI SEKOLAH', '0491/PLBPS-KTB/IV/20', 'assets/upload/peserta/00302960051492829559.jpeg'),
(188, 231, 'NUR AZIZAH', 'AZIZAH', 'P', 'BATULICIN', 1, '31-10-2002', '-', '17', '-', 'TUNGKARAN PANGERAN', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082254760822', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4470', '', '', '13-036-156-5', '6310097110020005', '30303626', '', '', '-', 'Nurazizah.imcang@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', 'AL7630063537', 'assets/upload/peserta/00111854251492823334.jpeg'),
(189, 115, 'AHMAD JABIDIN', 'ZHABIDIN', 'L', 'BATULICIN', 1, '05-10-2000', 'KAMPUNG BARU', '007', '007', 'KAMPUNG BARU', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081254530861', 'MTS NURUL HIDAYAH', 'B', '14.3985', '', '', '13-063-089-8', '6310090510000007', '30315463', '', '', '', 'zhabe87@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00121019311492737604.jpeg'),
(190, 86, 'DURRAH AMALIA', 'DURRAH', 'P', 'BATULICIN', 1, '19-06-2002', 'BATULICIN', '01', '01', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '083141344330', 'SMPIT AR-RASYID', 'A', '0385', '', '', '13-044-041-8', '6310094906020005', '30311406', '', '', '', 'durrahamalia19@gmail.com', '631.0238824', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00213987401492669916.jpeg'),
(191, 249, 'SALSABILA APRILLIANI', 'SALSA', 'P', 'BANJARBARU', 1, '08-04-2002', 'GUNUNG ANTASARI', '11', '2', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085247274226', 'SMPN1 SIMPANG 4', 'N', '14-4513', '', '', '13-036-231-2', '6310094804020005', '30303626', '', '', '', 'Aprilianisalsha@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(192, 162, 'MIFTAHUL JANNAH', 'HANY SYA', 'P', 'SIDOARJO', 1, '02-10-2001', 'BERSUJUD', '06', '13', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082157734188', 'SMP IT AR RASYID', 'A', '0509', '', '', '130440516', '6310066110010001', '30311406', '', '', '', 'hanysyaa02oktober@gmail.com', '631.0308530', '0', '', '0', '', '0', '', '', '', '019037/IST/2008', 'assets/upload/peserta/00145734491492737999.jpeg'),
(193, 274, 'LULU CAHYATI FEBRI ASTUTI', 'LULU', 'P', 'TANAH BUMBU', 1, '06-02-2002', '-', '4', '2', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085252488608', 'MADRASAH TSANAWIYAH DARUL AHAR', 'A', '14.2216', '', '', '13-064-145-8', '6310094602020006', '30315464', '', '', '', 'lulucahyatifebria@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '', '0234/PLBPS-KTB/III/2', 'assets/upload/peserta/00256251421492829650.jpeg'),
(194, 289, 'TASYAWWAFAL RAMADHAN', 'TASYA', 'P', 'BATULICIN', 1, '03-12-2002', '-', '13', '04', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081251166488', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4537', '', '', '-', '6310094312020001', '303036', '', '', '-', 'tasyawrn@gmail.com', '-', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00232909811492833200.jpeg'),
(195, 65, 'NADIA KHAIRUNNISA', 'NADIA', 'P', 'SUNGAI KECIL', 1, '17-02-2003', '-', '08', '-', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN ', '085249105813', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1087-14', '', '', '13-037-058-7', '6310095702030007', '30311417', '', '', '-', 'nadiakhairunnisa71@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', 'SAYA TIDAK MEMILIKI ALASAN ', '2929/IST/CSL-TB/VI/2', 'assets/images/noprofile.gif'),
(196, 291, 'HERNA FEBRIANTI', 'HERNA ', 'P', 'TANAH BUMBU', 1, '13-02-2002', '-', '008', '-', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0853 4830 0743', 'MTS. DARUL AZHAR', 'A', '14.2015', '', '', '13-064-141-4', '6310095302020008', '30315464', '', '', 'Tidak Ada', 'herna.ferbrianti@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', 'AL 7630078233', 'assets/upload/peserta/00298795631492833408.jpeg'),
(197, 128, 'DWI VALENTINA FEBRIANI', 'DWI', 'P', 'MANADO', 1, '14-02-2002', '-', '002', '002', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085348954391', 'SMPN 1 SIMPANG EMPAT', 'A', '15-4854', '', '', '13-036-038-3', '6310095402020004', '30303626', '', '', '-', 'dfebriani304@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', 'AL7630035504', 'assets/upload/peserta/00213987111492701225.jpeg'),
(198, 0, 'M.AGUSTIAN', 'AGUS', 'L', 'BATULICIN', 1, '19-08-2002', '-', '10', '-', 'SARIGADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251128889', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4411', '', '', '13-036-082-7', '6310061908020001', '30303626', '', '', '', 'agusakbar93@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '6310-LT-200052015-00', 'assets/images/noprofile.gif'),
(199, 293, 'RICO APRILIO TIRANDA ', 'RICO', 'L', 'MAKASSAR', 2, '02-04-2003', 'KERSIK PUTIH', '10', '12', 'KERSIK PUTIH', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '082254464492', 'SMPN 1 SIMPANG EMPAT', 'A', '72271', '', '', '13-036-230-3', '6310010204030001', '30303626', '', '', '081348950109', 'zenboo0r1@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00303370771492833599.jpeg'),
(200, 91, 'MUHAMMAD RAFLI HENO BA''ASYIR', 'RAFLI', 'L', 'SIMPANG EMPAT', 1, '29-10-2002', '-', '17', '3', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085249168016', 'SMPIT AR-RASYID', 'A', '0406', '', '', '13-044-012-5', '6310062910020002', '30311406', '', '', '', 'rafly.baasyir@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0983/IST/CSL-TB/II/2', 'assets/upload/peserta/00233944261492669012.jpeg'),
(201, 133, 'MUHAMMAD FARID', 'FARID', 'L', 'BATULICIN', 1, '27-02-2003', '0', '3', '0', 'SEGUMBANG', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348358132', 'SMPIT ARRASYID', 'A', '0399', '', '', '13-044-016-9', '6310012702030002', '30314406', '', '', '', 'faridarrasyid116@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00302759881492734634.jpeg'),
(202, 259, 'NIDA AULIA RAHMINI', 'NIDA', 'P', 'KOTABARU', 1, '01-11-2002', '02', '004', '002', 'KERSIK PUTIH', '72121', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081258262109', 'SMPN 4 KUSAN HILIR', 'B', '14455', '', '', '13-005-066-7', '6310014111020002', '30311411', '', '', 'tidak ada', 'abinidanajla@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'KARENA BUKAN PENERIMA', '1550/PLBPS-KTB/XII/2', 'assets/images/noprofile.gif'),
(203, 297, 'MUHAMMAD LUFPI FIRDAUS', 'LUFPI', 'L', 'PUDI', 1, '23-08-2002', '-', '05', '-', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081349600440', 'MTS.DARUL AZHAR', 'A', '14.2167', '', '', '13-064-181-4', '6310092308020001', '30315464', '', '', '', 'muhammadlufpi321@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0360/IST/PLBPS-KTB/I', 'assets/upload/peserta/00273474271492841005.jpeg'),
(204, 300, 'AKHMAD KHAIKAL FIKRI', 'FIKRI', 'L', 'SIMPANG EMPAT', 1, '23-10-2001', '-', '13', '004', 'BERSUJUD', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082153359925', 'MTS.DARUL AZHAR', 'A', '14.2116', '', '', '13-064-045-4', '6310092310010004', '30315464', '', '', '', 'fikrififiq@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1217/PLBPS-KTB/XII/2', 'assets/upload/peserta/00173110051492839500.jpeg'),
(205, 302, 'SALSABILA APRILLIANI', 'SALSA', 'P', 'BANJARBARU', 1, '08-04-2002', 'GUNUNG ANTASARI', '11', '2', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081285300271', 'SMPN1 SIMPANG 4', 'A', '14-4513', '', '', '13-036-231-2', '6310094804020005', '30303626', '', '', '', 'Aprilianisalsha@gmail.com', '', 'N', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00234613691492833120.jpeg'),
(206, 294, 'MUHAMAD REZA ADRIAN', 'REZA', 'L', 'BANJARMASIN', 1, '26-06-2002', '-', '15', '7', 'BAROKAH', '72271', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082353763565', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4445', '', '', '14-036-149-4', '6310092606020005', '30303626', '', '', '', 'naerdaazer26@gmai.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00153561711492840140.jpeg'),
(207, 248, 'KHARISA AMALIA YASMIYANAH', 'KHARISA', 'P', 'SURABAYA', 1, '26-04-2001', '-', '11', '-', 'GUNUNG ANTASARI', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081236958095', 'SMP NEGERI 2 SIMPANG EMPAT', 'A', '1039-14', '', '', '13-037-013-4', '6310066605010002', '30311417', '', '', '-', 'kharisaamaliaa@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '8357/2001', 'assets/upload/peserta/00171265421492827196.jpeg'),
(208, 304, 'MUHAMMAD RIZKY HUSYADA', 'RIZKY', 'L', 'BATULICIN', 1, '28-04-2001', '-', '12', '-', 'SARIGADUNG', '-', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082353112900', 'SMPN 2 SIMPANG EMPAT', 'B', '1124-14', '', '', '0012914362', '6401082804010001', '0012914362', '', '', '085391905446', 'muhammadhusyada@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '-', 'assets/upload/peserta/00129143621492833455.jpeg'),
(209, 296, 'PUTRA ADITIYA', 'ADIT', 'L', 'TANAH BUMBU', 1, '27-03-2002', '-', '015 ', '-', 'TUNGKARAN PANGERAN', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085345653801', 'MADRASAH TSANAWIYAH DARUL AZHAR', 'A', '14. 2180', '', '', '-', '6310092703020008', '30315464', '', '', '085345653801', 'aditiyaputra462@gmail.Com', 'K4UBEZ', 'Y', '-', 'N', '-', 'Y', 'T7PW7S', 'PUTRA ADITYA', '-', '16897 / IST / CSL-TB', 'assets/upload/peserta/00289250871492839920.jpeg'),
(210, 307, 'ZIA UL HAQ', 'ZIA', 'P', 'SOPPENG RIAJA', 1, '01-06-2002', 'I', '02', '02', 'KARANG BINTANG', '72200', 'KARANG BINTANG', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '08125066361', 'SMPN 4 KARANG BINTANG', 'B', '332', '', '', '13-035-056-9', '6310084106020001', '30311420', '', '', '0', 'imha.kalsel@gmail.com', '0', 'N', '', 'N', '', 'N', '', '', '', '0', 'assets/upload/foto/00233703391492510841.jpg'),
(211, 309, 'LILIS ISYANTI', 'LILIS', 'P', 'KAMPUNG BARU', 1, '20-10-2001', '-', '12', '02', 'BAROKAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085754804621', 'SMP NEGERI 1 SIMPANG EMPAT', 'A', '14-4407', '', '', '13-036-018-7', '6310094310010007', '30303626', '', '', '', 'lilis.isyanti@yahoo.co.id', '', '0', '', '0', '', '0', '', '', '', '0347/IST/CSL-TB/I/20', 'assets/images/noprofile.gif'),
(212, 311, 'M. NOOR ADJI PANGESTU', 'ADJI', 'L', 'TANAH LAUT', 1, '21-07-2002', '-', '010', '-', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348784818', 'SMPN 2 SIMPANG EMPAT', 'A', '1151-14', '', '', '13-037-119-2', '6310092107010007', '0010959796', '', '', '-', 'astutikyuli@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00109597961492828796.jpeg'),
(213, 60, 'PUTRI AFIFA FAIKA AHMAD', 'PUTRI', 'P', '3PLANGNGA', 1, '03-03-2002', 'BATULICIN', '13', '03', 'BATUICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTA SELATAN', '085348382637', 'SMPIT AR RASYID', 'A', '0427', '', '', '13-044-058-7', '6310014303020001', '30311406', '', '', '0518-75868', 'putri.aviva63@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(214, 247, 'NESSIYAVIOLITHA QUR''ANA', 'NESSIYA/ICHA', 'P', 'MAKASSAR', 1, '30-06-2002', '-', '12', '1', 'GUNUNG ANTASARI', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081348888367', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4462', '', '', '13-036-262-3', '6310067006020001', '30303626', '', '', '', 'nessiyaviolitha@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00256141381492828008.jpeg'),
(215, 310, 'RINDA HIDAYANTI', 'RINDA', 'P', 'SIMPANG EMPAT', 1, '26-09-2001', '-', '12', '02', 'BAROQAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081321946436', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4498', '', '', '13-036-121-8', '6310096609010006', '30303626', '', '', '', 'rinda.hidayanti26@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(216, 14, 'ANJELLINA KALISTSYA CRISTHY', 'ANGEL', 'P', 'KOTABARU', 2, '29-10-2001', 'MANGKA', '002', '001', 'MANGKA', '72169', 'PAMUKAN BARAT', 'KOTABARU', 'KALIMANTAN SELATAN', '082255011336', 'SMP NEGERI 1 PAMUKAN UTARA', 'B', '2949', '', '', '0', '6302206910010004', '123456', '', '', '081953577673', 'anjellinakalistsya@gmail.com', '0', 'N', '', 'N', '', 'N', '', '', 'KARENA BELUM TERDAFTAR', '6302206910010004', 'assets/upload/peserta/00174326911492658772.jpeg'),
(217, 71, 'M.AGUSTIAN', 'AGUS', 'L', 'BATULICIN', 1, '19-08-2002', '-', '10', '-', 'SARIGADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085251128889', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4411', '', '', '13-036-082-7', '6310061908020001', '30303636', '', '', '', 'agusakbar93@gmail.com', '', 'N', '', 'N', '', '0', '', '', '', '6310-LT-20052015-001', 'assets/upload/peserta/00254606431492655792.jpeg'),
(218, 278, 'AHMAD BADARUDDIN', 'BADAR', 'L', 'PALINGKAU', 1, '29-08-2001', 'KAMPUNG BARU', '01', '-', 'KAMPUNG BARU', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '-', 'MTS NURUL HIDAYAH', 'B', '14.3981', '', '', '13-063-030-3', '6310092908010003', '30315463', '', '', '081250010071', 'ahmadbadaruddinn34@gmail.com', '63100089098', 'N', '', 'N', '', 'N', '', '', '-', '1608', 'assets/images/noprofile.gif'),
(219, 1, 'DAVID KALAWAN', 'DAVID', 'L', 'KOTABARU', 2, '29-05-2002', '-', '01', '01', 'CANTUNG KANAN', '72163', 'HAMPANG', 'KOTABARU', 'KALIMANTAN SELATAN', '083153843517', 'SMPN 1 HAMPANG', 'B', '0029849300', '', '', '9-14-15-03-033-033-8', '6302142905020002', '30303329', '', '', '-', 'davitttkalawan@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '6302CLT0910200813058', 'assets/upload/peserta/00298493001492738307.jpeg'),
(220, 298, 'RAHMATIAH', 'IRAH', 'P', 'SEPUNGGUR', 1, '01-08-2002', '-', '2', '-', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082256495899', 'SMPN 4 KUSAN HILIR', 'B', '14446', '', '', '13-005-013-4', '6310024108020005', '30311411', '', '', '-', 'rhmtia.ra01@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', 'AL.7630032857', 'assets/upload/peserta/00211753361492839465.jpeg'),
(221, 280, 'SUSILAWATI', 'SUSI', 'P', 'SEPUNGGUR', 1, '23-04-2002', '-', '2', '-', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089674785730', 'SMPN 4 KUSAN HILIR', 'B', '14481', '', '', '13-005-021-4', '6310026304030002', '30311411', '', '', '-', 'susilawatisl.023@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', '-', '4115/ISTIMEWA/CATPIL', 'assets/upload/peserta/00211753351492825633.jpeg'),
(222, 285, 'RISMAYANTI', 'RISMA', 'P', 'SEPUNGGUR', 1, '07-08-2001', '-', '2', '-', 'SEPUNGGUR', '72273', 'KUSAN HILIR', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '089608543559', 'SMPN 4 KUSAN HILIR', 'B', '14465', '', '', '13-005-014-3', '6310024708010011', '30311411', '', '', '-', 'rismayanti07.ryn@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', 'AL.761.0011238', 'assets/upload/peserta/00151378771492829595.jpeg');
INSERT INTO `tbl_reg_data_diri` (`reg_data_diri_id`, `reg_data_diri_reg_akun_id`, `reg_data_diri_nama`, `reg_data_diri_panggilan`, `reg_data_diri_jenis_kelamin`, `reg_data_diri_tempat_lahir`, `reg_data_diri_agama_id`, `reg_data_diri_tgl_lahir`, `reg_data_diri_alamat_dusun`, `reg_data_diri_alamat_rt`, `reg_data_diri_alamat_rw`, `reg_data_diri_alamat_desa`, `reg_data_diri_alamat_kodepos`, `reg_data_diri_alamat_kecamatan`, `reg_data_diri_alamat_kota`, `reg_data_diri_alamat_propinsi`, `reg_data_diri_no_telp`, `reg_data_diri_lulusan`, `reg_data_diri_lulusan_akreditas`, `reg_data_diri_nis`, `reg_data_diri_seri_ijazah`, `reg_data_diri_seri_skhun`, `reg_data_diri_no_un`, `reg_data_diri_no_nik`, `reg_data_diri_npsn`, `reg_data_diri_alat_transport`, `reg_data_diri_jenis_tinggal`, `reg_data_diri_no_telp_rumah`, `reg_data_diri_email`, `reg_data_diri_no_kks`, `reg_data_diri_penerima_pkh_kps`, `reg_data_diri_no_pkh_kps`, `reg_data_diri_usulan_layak_pip`, `reg_data_diri_alasan_layak`, `reg_data_diri_penerima_kip`, `reg_data_diri_no_kip`, `reg_data_diri_nama_kip`, `reg_data_diri_alasan_menolak_kip`, `reg_data_diri_no_reg_akta`, `reg_data_diri_img`) VALUES
(223, 317, 'MARCELLY PRICILLA CANDRAKANTA KEZIA SENDE', 'CELLY', 'P', 'BANJARMASIN', 2, '03-09-2002', 'BATULICIN ', '14', '03', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN ', '081258261153', 'SMPN 1 BATULICIN', 'B', '15.05721', '', '', '13-022-181-4', '6310014309020006', '30 30 36 13', '', '', '051186070178', 'marcellybee@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'KELUARGA MAMPU', '116/U/2002', 'assets/upload/peserta/00231974601492840620.jpeg'),
(224, 303, 'JESICA CLAUDIA SIAHAAN', 'JESICA', 'P', 'SUNGAI DURIAN', 2, '07-11-2002', 'RANTAU BUDA', '003', '001', 'SUNGAI DURIAN/RANTAU BUDA', '72167', 'SUNGAI DURIAN', 'KOTABARU', 'KALIMANTAN SELATAN', '082253421564', 'SMPN 1 SUNGAI DURIAN', 'B', '200340', '', '', '03-039-044-5', '6302154711020001', '2011 5 09 15 001', '', '', '', 'Jesicaclaudia80@gmail.com', '', '0', '', '0', '', '0', '', '', '', '477/1259.A-IST/CSKTB', 'assets/images/noprofile.gif'),
(225, 208, 'AMI NURAHMAN', 'AMI', 'L', 'BATULICIN', 1, '05-06-2001', '-', '04', '-', 'TUNGKARAN PANGERAN', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '-', 'MTS DARUL AZHAR', 'A', '142120', '', '', '13-064-046-3', '6310090506010019', '30315464', '', '', '-', 'lakibinics@gmail.com', '-', '0', '', '0', '', '0', '', '', '', '31936/IST/CSL-TB/XII', 'assets/upload/peserta/00107380861492744186.jpeg'),
(226, 299, 'ANNISA NUR OKTAVIANI', 'ICHA', 'P', 'KOTABARU', 1, '17-10-2002', 'SARIGADUNG', '07', '02', 'SARIGADUNG', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082256065208', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4311', '', '', '13-036-065-8', '6310095710020010', '30303626', '', '', '', 'Annisanuroktaviani10@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '1395/PLBPS-KTB/XI/20', 'assets/upload/peserta/00221117461492840746.jpeg'),
(227, 243, 'NURLAILA AGUSTINA', 'LAILA', 'P', 'SUNGAI DUA', 1, '10-08-2002', '-', '5', '2', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081250926719', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1128-14', '', '', '13-037-099-6', '6310095008020008', '30311417', '', '', '081250926719', 'lailaagustina1008@gmail.com', '6310092903120258', 'N', '', 'N', '', 'N', '', '', 'KARENA TIDAK DAPAT', '0070/IST/PLBPS-KTB/I', 'assets/upload/peserta/00234939441492824901.jpeg'),
(228, 321, 'KHARISMA MAULIDYAWATI', 'RISMA', 'P', 'GUNUNG BESAR', 1, '19-05-2002', '-', '5', '2', 'GUNUNG BESAR', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081258341459', 'SMP NEGERI 2 SIMPANG EMPAT', 'B', '1146-14', '', '', '13-037-117-4', '6310095905020007', '30311417', '', '', '081258341459', 'imron142434@gmail.com', '6310090111120098', 'N', '', 'N', '', 'N', '', '', '-', '3381/ISTIMEWA/CATPIL', 'assets/upload/peserta/00234939331492824595.jpeg'),
(229, 210, 'DEDEN ROKHYADI', 'DEDEN', 'L', 'SARIMULYA', 1, '01-01-2001', 'BATULICIN', '08', '2', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '082282587893', 'SMPN 1 BATULICIN', 'B', '14.05156', '', '', '13-022-072-9', '63100101010007', '30 30 36 13', '', '', '', 'dedenrokhyadi@gmail.com', '', '0', '', '0', '', '0', '', '', '', '6310-LT-28092016-004', 'assets/upload/peserta/00103109681492742908.jpeg'),
(230, 325, 'MUKHAMMAD FIRDAUS', 'DAUS', 'L', 'KAMPUNG BARU', 1, '15-09-2002', '-', '12', '02', 'BAROKAH', '72213', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082357575311', 'MTS NURUL HIDAYAH', 'B', '14.4089', '', '', '13-063-040-9', '6310091509020006', '30315463', '', '', '', 'junglesnake@yahoo.com', '-', '0', '', '0', '', '0', '', '', '', '1237/PLBPS-KTB/X/200', 'assets/upload/peserta/00210262021492821775.jpeg'),
(231, 176, 'SITI ROHMANAWATI', 'ROHMA', 'P', 'KOTABARU', 1, '26-06-2002', ' -', '002', '001', 'TEROMBONGSARI', '72167', 'SUNGAI DURIAN', 'KOTABARU', 'KALIMANTAN SELATAN', ' -', 'SMPN 2 SUNGAI DURIAN', 'B', '14671', '', '', '1-14-15-03-204-010-7', '6302156605020001', '30303289', '', '', ' -', 'nurhayati12.nh98@gmail.co.id', '6302152301080263', 'N', '', 'N', '', 'N', '', '', ' -', '6302CLT1504200903092', 'assets/upload/foto/00111854251492674135.JPG'),
(232, 305, 'NOVIANTI ADHELIA PUTRI', 'NOVI', 'P', 'BATULICIN', 1, '06-11-2001', '-', '12', '03', 'DESA TARJUN ', '72161', 'KELUMPANG HILIR', 'KOTABARU', 'KALIMANTAN SELATAN', '085332551067', 'SMP INDOCEMENT', 'B', '200310', '', '', '9-14-15-03-049-050-7', '6302194611010001', '303366', '', '', '', 'raswantow5@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1213/PLBPS-KTB/XI/20', 'assets/upload/peserta/00179368851492704434.jpeg'),
(233, 312, 'M. AL RIFQI RAHMAN', 'RIFQI', 'L', 'BANJARMASIN', 1, '05-07-2002', 'KERSIK PUTIH', '09', '02', 'KERSIK PUTIH', '97200', 'BATULICIN', 'TANAH BUMBU', 'KALSEL', '085393151414', 'SMPN 1 SIMPANG EMPAT', 'A', '144568', '', '', '13-036-047-2', '6310010507020002', '30303626', '', '', '0895703114102', 'alrifqi.572@gmail.com', '', '0', '', '0', '', '0', '', '', '', '1742/UM/2003', 'assets/upload/peserta/00216749661492839735.jpeg'),
(234, 331, 'HAMKA KAMIL', 'HAMKA', 'L', 'SURABAYA', 1, '30-08-2002', 'KAMPUNG BARU', '002', '-', 'KAMPUNG BARU', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085389262627', 'SMP NEGERI 1 BATULICIN', 'B', '14.05189', '', '', '13-022-042-7', '6310093008020002', '30303613', '', '', '085389262627', 'hamkakam88@gmail.com', '', 'N', '', 'N', '', 'N', '', '', 'TIDAK', '13176/D/2002', 'assets/upload/peserta/00206153971492836797.jpeg'),
(235, 242, 'STEPHEN ALFANDO CALVIN', 'ANDO', 'L', 'BATULICIN', 2, '17-09-2001', '02', '07', '03', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '081348512224', 'SMPN 1 SIMPANG EMPAT', 'A', '14-4530', '', '', '13-036-059-6', '6310091709010006', '30303626', '', '', '081348512224', 'stephenalfandocalvin17@gmail.c', '6310092605110014', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00159311201492827151.jpeg'),
(236, 333, 'ANITA PUTRI FATONAH', 'ANITA', 'P', 'KOTABARU', 1, '17-01-2002', '-', '02', '-', 'GUNTUNG', '72272', 'KUSAN HULU', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '083159830315', 'SMPN 2 KUSAN HULU', 'B', '14.684', '', '', '13-024-002-7', '6310055701020001', '30303631', '', '', '087704377062', 'Susantoagus1781@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0621/IST/PLBPS-KTB/I', 'assets/upload/peserta/00296907941492830006.jpeg'),
(237, 240, 'DETY RAHMAWATI', 'DETY', 'P', 'KOTABARU', 1, '09-10-2001', 'II', 'IV', 'II', 'DESA MANDALA ', '72182', 'KELUMPANG HILIR', 'KOTABARU', 'KALIMANTAN SELATAN', '081250960654', 'SMP NEGERI 1 KELUMPANG HILIR', 'A', '3473', '', '', '03-028-011-6', '6302194910010001', '30311483', '', '', '', 'detyrahmawati10@gmail.com', '6302192405070001', '0', '', '0', '', '0', '', '', '', '477/1603.A-IST/CSKTB', 'assets/upload/peserta/00105827071492842394.jpeg'),
(238, 334, 'VANIDA NAFTALI', 'VANIDA', 'P', 'DARASAN BINJAI', 1, '01-07-2002', 'DARASAN BINJAI', '01', '01', 'DARASAN BINJAI', '72272', 'KUSAN HULU', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '087704524379', 'SMPN 2 KUSAN HULU', 'B', '14.677', '', '', '13-024-024-9', '6310054107020093', '30303631', '', '', '087704524379', 'VANIDANAFTALI@GMAIL.COM', '6310053003120077', 'N', '', 'N', '', 'N', '', '', 'KEMAUAN SENDIRI', '30819/IST/CSL-TB/XII', 'assets/upload/peserta/00209876231492829965.jpeg'),
(239, 327, 'PUTRI HELMINA FITRIANTI', 'HELMINA', 'P', 'KUALA KAPUAS', 1, '17-01-2002', '-', '06', '-', 'BAROQAH', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085350471199', 'SMPIT AR-RASYID', 'A', '0429', '', '', '130440605', '6310095701020002', '30311406', '', '', '-', 'Putri.Helmina.ph@gmail', '-', 'N', '', 'N', '', 'N', '', '', '-', '295.C/DISP-KTB/X/200', 'assets/images/noprofile.gif'),
(240, 336, 'ROBY SAPUTRA', 'ROBY', 'L', 'BATULICIN', 1, '29-04-2000', 'BATULICIN', '12', '03', 'BATULICIN', '72171', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085348195104', 'MTS.AL-HIDAYAH', 'N', '12163100005151249 ', '', '', '0054386', '1884', 'MTs.AL-HIDAYAH', '', '', '', 'robyjzail54@gmail.com', '6310011008110009', 'Y', '-', 'Y', '-', 'N', '', '', '-', '32508', 'assets/upload/peserta/121263100001492823427.jpeg'),
(241, 337, 'HAMZAH HAZ', 'HAMZAH', 'L', 'PAGATAN', 1, '01-06-2001', 'BATULICIN', '12', '03', 'BATULICIN', '72171', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '0899926219', 'MTS AL-HIDAYAH', 'N', '0010310964', '', '', '1-13-15-13-001-054-3', '6310020106010001', 'SDN 1 BATULICIN', '', '', '0899926319', 'hamzah_farul@yahoo.com', '6310021203150008', 'N', '', 'N', '', 'N', '', '', 'TIDAK APA', '763.0040447', 'assets/upload/peserta/00103109641492823480.jpeg'),
(242, 82, 'SALMA FITRIA', 'SALSA', 'P', 'KOTABARU', 1, '17-08-2002', 'BAROKAH', '05', '02', 'BAROKAH', '72271', 'SIMPANGEMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '083125613729', 'SMPN2SIMPANGEMPAT', 'B', '1133-14', '', '', '13-037-103-2', '6310095708020003', '30311417', '', '', '-', 'salmafitria148@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/images/noprofile.gif'),
(243, 283, 'HELDY SURYA NUGRAHA', 'HELDY', 'L', 'TELUK KEPAYANG', 1, '11-03-2002', '-', '02', '01', 'TELUK KEPAYANG', '72272', 'KUSAN HULU', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '083150224036', 'SMPN 2 KUSAN HULU', 'B', '14,621', '', '', '13-024-029-4', '6310051103020004', '30303631', '', '', '-', 'mrheldy49@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '0125/IST/PLBPS-KTB/I', 'assets/upload/peserta/00209876061492831437.jpeg'),
(244, 262, 'LEA KUARTA MARUMBO', 'LEA', 'P', 'BATULICIN', 2, '26-02-2002', 'BATULICIN', '12', '03', 'BATULICIN', '72271', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '081349565655', 'SMP KODECO', 'B', '16-3464', '', '', '1-14-15-13-129-012-5', '6310016602020002', '3030616', '', '', '', 'Feryladoraka02@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0320/PLBPS-KTB/III/2', 'assets/upload/peserta/00224454591492824628.jpeg'),
(245, 255, 'MAHDATUL ARDAWIYAH', 'MAHDA', 'P', 'KOTABARU', 1, '15-03-2002', '-', '007', '-', 'TUNGKARAN PANGERAN', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082351139015', 'SMP MUHAMMADIYAH SIMPANG EMPAT', 'B', '125-14', '', '', '13-081-012-5', '6310095503020008', '30314858', '', '', '-', 'Mahdatulardawiyah2002@gmail.co', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '0435/PLBPS-KTB/IV/20', 'assets/upload/peserta/00234941931492832462.jpeg'),
(246, 319, 'HADI RUSADI ', 'SADI', 'L', 'AMUNTAI', 1, '16-02-2002', 'KAMPUNG BARU', '013', '004', 'SEJAHTERA', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082159625105', 'MTS. DARUL AZHAR', 'A', '2781', '', '', '13-064-172-5', '6310091602020009', '30315464', '', '', '082159625105', 'HADIRUSADI@GMAIL.COM', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00216103701492832209.jpeg'),
(247, 326, 'MUHAMMAD NASIR FALAH', 'FALAH', 'L', 'KOTABARU', 1, '15-12-2001', '04', '13', '04', 'SERONGGA', '72182', 'KELUMPANG HILIR', 'KOTABARU', 'KALIMANTAN SELATAN', '082255522360', 'SMP NEGERI 1 KELUMPANG HILIR', 'A', '3546', '', '', '030280232', '63022015120100002', '30311483', '', '', '081351393354', 'muhammad.nasirfalah@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0371/IST/PLBPS-KTB/I', 'assets/upload/peserta/00122414871492835071.jpeg'),
(248, 149, 'HIDAYATI', 'HIDAYATI', 'P', 'AMUNTAI', 1, '12-03-2002', 'KAMPUNG BARU', '013', '004', 'SEJAHTERA', '72211', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '082158946604', 'SMP IT AR-RASYID', 'A', '120205', '', '', '13-044-046-3', '6310095203020004', '30311406', '', '', '082158946604', 'helminahidayati@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00216103801492727031.jpeg'),
(249, 316, 'ANGGITA SELVI MARIANA', 'ANGGITA', 'P', 'KOTABARU', 1, '29-08-2001', 'II', '06', '-', 'TELAGA SARI', '72182', 'KELUMPANG HILIR', 'KOTABARU', 'KALIMANTAN SELATAN', '+6282281569759', 'SMP NEGERI 1 KELUMPANG HILIR', 'A', '3449', '', '', '03-028-007-2', '6302196908010001', '30311483', '', '', '', 'anggitaselvi29@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0507/IST/PLBPS-KTB/I', 'assets/upload/peserta/00114069711492841170.jpeg'),
(250, 74, 'MUHAMMAD RIO FRANATA', 'RIO', 'L', 'KOTA BARU', 1, '11-10-2001', '-', '11', '-', 'GUNUNG ANTASARI', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTA SELATAN', '081349685339', 'MTS DARUL AZHAR', 'A', '14.2214', '', '', '13-064-120-9', '631006110010002', '30315464', '', '', '-', 'riofranata596@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '1920 No. 751 Jo.1927', 'assets/upload/peserta/00178212731492737219.jpeg'),
(251, 73, 'M. ARYA FEBRIANTO', 'ARYA', 'L', 'KOTABARU', 1, '03-02-2003', 'GUNUNG BESAR', '003', '-', 'GUNUNG BESAR', '72200', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085252543490', 'SMPN 2 SIMPANG EMPAT', 'B', '1120-14', '', '', '13-037-089-8', '6310090302030008', '30311417', '', '', '', 'aryafebrian763@gmail.com', '', '0', '', '0', '', '0', '', '', '', '0276/PLRPS-KTB/III/2', 'assets/upload/peserta/00301569701492657486.jpeg'),
(252, 318, 'ZASMINA AULIA', 'ZASMIN', 'P', 'BATULICIN', 1, '28-05-2002', '3', '13', '1', 'KERSIK PUTIH', '72271', 'BATULICIN', 'BATULICIN', 'KALIMANTAN SELATAN', '08115115363', 'SMPN 1 SIMPANG', 'A', '14-4553', '', '', '13-036-062-3', '6310096805020002', '30303626', '', '', '', 'zasmineaulia@gmail.com', '', '0', '', '0', '', '0', '', '', '', '', 'assets/images/noprofile.gif'),
(253, 138, 'MUHAMMAD HADID AL-FARIDZI', 'HADID', 'L', 'KANDANGAN', 1, '09-09-2002', 'BATULICIN', '017', '003', 'BATULICIN', '72211', 'BATULICIN', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '08115196157', 'SMP IT AR-RASYID', 'A', '0402', '', '', '13-044-019-6', '6310010909020002', '30311406', '', '', '05186070791', 'muhammadhadid7@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '474.1/526/2002', 'assets/upload/peserta/00241591061492736480.jpeg'),
(254, 108, 'JUBAIDAH SANTI', 'JUBAI', 'P', 'TANAH BUMBU', 1, '21-05-2002', 'GG. BATU BENAWA 2', '008', '-', 'BERSUJUD', '72200', 'SIMPANG EMPAT', 'BATULICIN', 'KALIMANTAN SELATAN', '087806954031', 'MTS. DARUL AZHAR', 'A', '14.2006', '', '', '13-064-074-07', '6310096105020006', '30315464', '', '', '', 'JubaidahSanti9@gmail.com', '', 'N', '', '0', '', '0', '', '', '', '', 'assets/upload/peserta/00215427701492829731.jpeg'),
(255, 221, 'AKHMAD RIYADI', 'RIYADI', 'L', 'KOTABARU', 1, '08-03-2002', '-', '10', '-', 'BERSUJUD', '72171', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '0895392500760', 'MTS DARUL AZHAR', 'A', '14.2115', '', '', '0', '6310090803020003', '30315464', '', '', '', 'ahmad.riyadi9878@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '', 'assets/upload/peserta/00231661791492745257.jpeg'),
(256, 111, 'NUR AINA NOVI AMALIA', 'AINA', 'P', 'PAGATAN KEC KUSAN HILIR', 1, '10-11-2001', '-', '011', '004', 'KAMPUNG BARU', '72211', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '082254760584', 'MTS. DARUL AZHAR', 'A', '14.2233', '', '', '13-604-210', '6310025011010010', '30315464', '', '', '-', 'nurainanoviamelia@gmail.com', '-', '0', '', '0', '', '0', '', '', '', '13/IST/CATPIL-TB/VII', 'assets/upload/peserta/00153561821492826006.jpeg'),
(257, 241, 'KHARISA NUR HAERANI MAMONTO', 'KHARISA', 'P', 'MANADO', 1, '24-11-2002', 'GUNUNG BESAR', '05', '-', 'GUNUNG BESAR', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085252802244', 'SMPN 2 SIMPANG EMPAT', 'B', '0028644571', '', '', '13-037-088-9', '6310092411020005', '30311417', '', '', '- ', 'kharisa.rani24@gmail.com', '-', 'N', '-', 'N', '-', 'N', '', '-', '-', '-', 'assets/upload/peserta/00286445711492826752.jpeg'),
(258, 335, 'AHMAD RAIHAN', 'RAIHAN', 'L', 'BATULICIN', 1, '06-04-2002', '-', '08', '-', 'KAMPUNG BARU', '72271', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '-', 'MTS NURUL HIDAYAH', 'B', '14.3990', '', '', '-', '6310090604020004', '-', '', '', '-', 'raihan04@gmail.com', '-', 'N', '-', 'N', '-', 'N', '-', '-', '-', '0666/PLPBS-KTB/VI/20', 'assets/upload/peserta/00210261741492828490.jpeg'),
(259, 301, 'ARJUNA ALIEM MAULANA BIMANTARA', 'ARJUNA', 'L', 'BALIKPAPAN', 1, '08-06-2001', 'BAROKAH', '002', '002', 'BAROKAH', '72200', 'SIMPANG EMPAT', 'SIMPANG EMPAT', 'KALSEL', '081348242949', 'MTS. DARUL AZHAR', 'A', '14.2220', '', '', '130640472', '631009080601005', '30315464', '', '', '0', 'kucinglamas02@gmail.com', '', 'N', '', 'N', '', 'N', '', '', '', '1751050806010015', 'assets/upload/peserta/00114989561492834769.jpeg'),
(260, 96, 'LUCKY FITRIADY ERWANDY SAPUTRA', 'LUKI', 'L', 'KOTABARU', 1, '16-12-2001', 'BAROKAH', '8', '2', 'BAROKAH', '72273', 'SIMPANG EMPAT', 'TANAH BUMBU', 'KALIMANTAN SELATAN', '085750410081', 'SMP INDOCEMENT TARJUN', 'B', '0017936896', '', '', '031750258', '6302201612010003', '30303366', '', '', '085346022230', 'Luckyfitriady@gmail.com', '-', 'N', '', 'N', '', 'N', '', '', 'INGIN MELANJUT KAN KE JENJANG YANG LEBIH TINGGI', ' 0146/PLBPS-KTB/II/2', 'assets/images/noprofile.gif'),
(261, 344, 'ENCEP ENDAN', 'ENCEP', 'L', '123', 1, '06-02-1990', '123', '12', '121', '12', '21', '12', '21', '21', '123', '1', 'A', '123', '', '', '123', '123', '123', '', '', '21', 'ncependanmms@gmail.com', '21', 'N', '', 'N', '', 'N', '', '', 'WSDASAD', 'sad', 'assets/images/noprofile.gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_data_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_data_nilai` (
  `reg_data_nilai_id` int(11) NOT NULL,
  `reg_data_nilai_reg_akun_id` int(11) NOT NULL,
  `reg_data_nilai_ind_satu` varchar(11) NOT NULL,
  `reg_data_nilai_ind_dua` varchar(11) NOT NULL,
  `reg_data_nilai_ind_tiga` varchar(11) NOT NULL,
  `reg_data_nilai_ind_empat` varchar(11) NOT NULL,
  `reg_data_nilai_ind_lima` varchar(11) NOT NULL,
  `reg_data_nilai_ing_satu` varchar(11) NOT NULL,
  `reg_data_nilai_ing_dua` varchar(11) NOT NULL,
  `reg_data_nilai_ing_tiga` varchar(11) NOT NULL,
  `reg_data_nilai_ing_empat` varchar(11) NOT NULL,
  `reg_data_nilai_ing_lima` varchar(11) NOT NULL,
  `reg_data_nilai_ipa_satu` varchar(11) NOT NULL,
  `reg_data_nilai_ipa_dua` varchar(11) NOT NULL,
  `reg_data_nilai_ipa_tiga` varchar(11) NOT NULL,
  `reg_data_nilai_ipa_empat` varchar(11) NOT NULL,
  `reg_data_nilai_ipa_lima` varchar(11) NOT NULL,
  `reg_data_nilai_mtk_satu` varchar(11) NOT NULL,
  `reg_data_nilai_mtk_dua` varchar(11) NOT NULL,
  `reg_data_nilai_mtk_tiga` varchar(11) NOT NULL,
  `reg_data_nilai_mtk_empat` varchar(11) NOT NULL,
  `reg_data_nilai_mtk_lima` varchar(11) NOT NULL,
  `reg_data_peringkat_satu` varchar(2) NOT NULL,
  `reg_data_peringkat_dua` varchar(2) NOT NULL,
  `reg_data_peringkat_tiga` varchar(2) NOT NULL,
  `reg_data_peringkat_empat` varchar(2) NOT NULL,
  `reg_data_peringkat_lima` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_data_nilai`
--

INSERT INTO `tbl_reg_data_nilai` (`reg_data_nilai_id`, `reg_data_nilai_reg_akun_id`, `reg_data_nilai_ind_satu`, `reg_data_nilai_ind_dua`, `reg_data_nilai_ind_tiga`, `reg_data_nilai_ind_empat`, `reg_data_nilai_ind_lima`, `reg_data_nilai_ing_satu`, `reg_data_nilai_ing_dua`, `reg_data_nilai_ing_tiga`, `reg_data_nilai_ing_empat`, `reg_data_nilai_ing_lima`, `reg_data_nilai_ipa_satu`, `reg_data_nilai_ipa_dua`, `reg_data_nilai_ipa_tiga`, `reg_data_nilai_ipa_empat`, `reg_data_nilai_ipa_lima`, `reg_data_nilai_mtk_satu`, `reg_data_nilai_mtk_dua`, `reg_data_nilai_mtk_tiga`, `reg_data_nilai_mtk_empat`, `reg_data_nilai_mtk_lima`, `reg_data_peringkat_satu`, `reg_data_peringkat_dua`, `reg_data_peringkat_tiga`, `reg_data_peringkat_empat`, `reg_data_peringkat_lima`) VALUES
(1, 2, '80', '80', '82', '78', '80', '80', '80', '90', '81', '92', '90', '82', '87', '94', '86', '92', '88', '91', '85', '85', '1', '1', '1', '1', '1'),
(2, 13, '73', '78', '85', '83', '80', '86', '80', '82', '77', '82', '87', '94', '84', '90', '83', '80', '85', '91', '74', '85', '5', '2', '4', '4', '6'),
(3, 17, '86', '81', '87', '85', '86', '91', '80', '86', '80', '78', '92', '92', '88', '98', '89', '90', '87', '94', '93', '93', '1', '2', '3', '2', '3'),
(4, 15, '73', '76', '73', '74', '76', '72', '77', '71', '76', '70', '77', '71', '75', '79', '71', '71', '71', '70', '71', '70', '3', '4', '2', '3', '4'),
(5, 20, '79', '81', '87', '87', '86', '86', '81', '81', '85', '92', '89', '84', '88', '90', '93', '80', '85', '92', '90', '85', '2', '2', '2', '1', '1'),
(6, 18, '74', '80', '82', '82', '84', '92', '81', '83', '77', '85', '83', '85', '89', '89', '85', '85', '80', '84', '88', '71', '3', '4', '4', '3', '5'),
(7, 9, '79', '82', '76', '73', '80', '83', '80', '70', '71', '92', '75', '85', '70', '71', '74', '77', '81', '80', '76', '80', '0', '5', '0', '0', '4'),
(8, 3, '76', '84', '87', '85', '83', '90', '82', '77', '82', '91', '90', '88', '92', '97', '88', '85', '87', '90', '90', '79', '2', '3', '3', '2', '1'),
(9, 29, '84', '77', '84', '81', '80', '93', '80', '88', '80', '79', '82', '83', '78', '83', '79', '71', '72', '71', '73', '70', '2', '4', '3', '3', '3'),
(10, 31, '93', '89', '87', '87', '82', '85', '87', '88', '88', '97', '87', '78', '85', '84', '89', '74', '75', '79', '80', '73', '2', '3', '2', '2', '4'),
(11, 25, '76', '80', '85', '85', '80', '80', '79', '75', '73', '75', '81', '74', '85', '86', '89', '72', '78', '76', '80', '87', '7', '0', '7', '5', '5'),
(12, 26, '83', '80', '84', '90', '86', '81', '90', '87', '90', '81', '81', '88', '82', '87', '89', '76', '82', '83', '85', '86', '0', '9', '0', '0', '0'),
(13, 32, '83', '90', '76', '80', '88', '86', '89', '88', '92', '87', '79', '85', '82', '99', '80', '77', '83', '77', '90', '86', '3', '3', '5', '1', '2'),
(14, 5, '72', '88', '80', '80', '78', '71', '70', '76', '72', '83', '88', '78', '72', '72', '71', '79', '77', '73', '73', '75', '0', '0', '0', '0', '6'),
(15, 41, '81', '87', '89', '82', '85', '80', '82', '79', '83', '88', '84', '89', '85', '86', '83', '75', '89', '80', '90', '83', '6', '8', '6', '6', '6'),
(16, 62, '87', '89', '96', '87', '82', '91', '83', '88', '95', '80', '85', '78', '82', '95', '95', '88', '75', '85', '96', '90', '1', '2', '1', '1', '1'),
(17, 58, '88', '89', '88', '88', '85', '100', '98', '85', '90', '95', '92', '95', '90', '95', '88', '92', '93', '94', '97', '100', '1', '1', '1', '1', '1'),
(18, 70, '77', '76', '79', '90', '82', '81', '78', '78', '79', '76', '75', '78', '80', '77', '77', '75', '78', '75', '78', '79', '0', '0', '0', '0', '0'),
(19, 72, '81', '84', '78', '76', '80', '85', '78', '85', '84', '77', '81', '90', '82', '95', '80', '79', '83', '75', '76', '81', '4', '8', '9', '7', '0'),
(20, 40, '96', '87', '82', '80', '81', '72', '72', '73', '80', '80', '79', '77', '78', '78', '71', '87', '85', '73', '71', '78', '4', '6', '0', '4', '0'),
(21, 75, '80', '82', '82', '80', '82', '81', '80', '88', '78', '90', '84', '87', '87', '86', '92', '90', '80', '85', '80', '73', '2', '2', '2', '3', '1'),
(22, 38, '83', '85', '80', '96', '85', '85', '90', '87', '88', '77', '83', '90', '89', '91', '80', '90', '88', '88', '89', '93', '2', '3', '0', '3', '9'),
(23, 42, '84', '80', '83', '96', '88', '81', '90', '88', '86', '86', '84', '82', '87', '95', '88', '85', '87', '81', '84', '95', '4', '9', '6', '5', '3'),
(24, 34, '77', '75', '83', '82', '75', '75', '77', '75', '77', '79', '75', '78', '85', '80', '77', '73', '77', '75', '76', '75', '10', '5', '2', '4', '9'),
(25, 49, '77', '77', '75', '91', '86', '84', '78', '77', '83', '77', '75', '78', '85', '80', '75', '77', '78', '75', '80', '81', '7', '7', '0', '5', '4'),
(26, 67, '84', '89', '86', '86', '93', '90', '81', '87', '84', '95', '93', '94', '95', '98', '92', '91', '92', '97', '96', '97', '1', '1', '1', '1', '1'),
(27, 85, '77', '78', '76', '75', '85', '85', '75', '86', '76', '84', '75', '80', '83', '98', '81', '83', '89', '82', '87', '84', '5', '6', '6', '5', '3'),
(28, 69, '83', '80', '80', '80', '85', '96', '75', '78', '80', '66', '75', '75', '75', '80', '75', '80', '75', '68', '69', '76', '2', '3', '1', '1', '1'),
(29, 88, '82', '76', '78', '78', '78', '77', '76', '75', '77', '76', '78', '78', '75', '75', '80', '75', '77', '76', '83', '79', '5', '4', '10', '0', '0'),
(30, 36, '80', '77', '78', '81', '82', '78', '75', '88', '74', '82', '88', '87', '75', '80', '76', '86', '85', '85', '75', '73', '3', '1', '3', '5', '4'),
(31, 89, '72', '78', '85', '89', '80', '73', '79', '73', '74', '75', '83', '75', '86', '79', '74', '72', '77', '74', '79', '76', '0', '10', '5', '4', '8'),
(32, 84, '75', '78', '75', '75', '79', '75', '75', '75', '75', '75', '75', '75', '75', '75', '78', '77', '75', '75', '77', '76', '1', '0', '0', '7', '9'),
(33, 103, '87', '78', '82', '85', '83', '88', '80', '84', '78', '86', '89', '90', '90', '96', '84', '88', '92', '92', '86', '91', '1', '1', '1', '1', '1'),
(34, 87, '95', '98', '95', '90', '88', '97', '98', '95', '95', '90', '95', '98', '90', '99', '85', '95', '98', '96', '98', '98', '1', '1', '1', '1', '1'),
(35, 90, '80', '85', '78', '93', '80', '81', '77', '76', '75', '76', '75', '85', '82', '92', '80', '78', '77', '75', '77', '78', '2', '3', '2', '3', '2'),
(36, 104, '75', '84', '77', '83', '81', '72', '79', '79', '73', '79', '72', '86', '82', '82', '87', '85', '78', '77', '82', '70', '7', '2', '5', '3', '3'),
(37, 99, '75', '76', '86', '94', '85', '75', '78', '80', '80', '85', '75', '78', '77', '80', '87', '75', '75', '75', '76', '78', '9', '0', '3', '3', '1'),
(38, 43, '97', '93', '93', '96', '93', '81', '77', '71', '76', '75', '81', '83', '79', '78', '72', '76', '75', '75', '76', '65', '3', '4', '8', '6', '9'),
(39, 50, '78', '80', '85', '83', '84', '86', '79', '81', '82', '82', '77', '82', '85', '97', '81', '83', '76', '78', '85', '83', '3', '7', '4', '4', '5'),
(40, 109, '84', '80', '81', '81', '82', '89', '80', '86', '79', '90', '84', '88', '83', '80', '85', '80', '80', '88', '87', '78', '2', '1', '2', '1', '2'),
(41, 113, '85', '83', '89', '85', '88', '86', '74', '89', '83', '80', '88', '90', '85', '95', '94', '92', '88', '91', '88', '74', '1', '1', '1', '1', '1'),
(42, 117, '74', '80', '74', '83', '80', '80', '79', '73', '73', '75', '74', '74', '73', '77', '78', '73', '73', '77', '80', '72', '0', '10', '0', '0', '10'),
(43, 19, '80', '78', '77', '78', '83', '87', '80', '91', '80', '84', '87', '86', '85', '88', '82', '85', '82', '80', '86', '77', '3', '3', '3', '2', '2'),
(44, 7, '79', '78', '79', '78', '80', '81', '85', '81', '83', '90', '70', '78', '75', '75', '76', '72', '73', '75', '77', '80', '0', '0', '6', '4', '6'),
(45, 10, '81', '77', '75', '96', '82', '79', '79', '75', '78', '77', '75', '78', '80', '86', '78', '70', '77', '75', '76', '79', '0', '5', '5', '2', '1'),
(46, 8, '88', '92', '90', '90', '86', '91', '92', '92', '95', '92', '90', '80', '90', '90', '80', '70', '75', '79', '75', '70', '3', '1', '2', '3', '2'),
(47, 35, '79', '78', '79', '92', '78', '75', '77', '75', '76', '75', '78', '78', '80', '75', '77', '77', '80', '75', '80', '80', '7', '9', '3', '8', '5'),
(48, 125, '88', '78', '78', '78', '87', '82', '73', '73', '74', '73', '72', '87', '77', '74', '71', '71', '74', '72', '75', '78', '7', '5', '4', '6', '5'),
(49, 44, '87', '84', '89', '81', '86', '87', '90', '91', '79', '89', '84', '80', '70', '79', '97', '78', '89', '83', '90', '90', '2', '2', '2', '2', '2'),
(50, 66, '97', '90', '82', '78', '79', '97', '72', '75', '77', '76', '79', '80', '72', '72', '71', '88', '80', '73', '74', '78', '9', '4', '4', '0', '9'),
(51, 126, '85', '83', '93', '96', '93', '85', '78', '90', '90', '75', '80', '87', '84', '98', '89', '85', '95', '80', '88', '84', '2', '3', '2', '1', '5'),
(52, 134, '76', '90', '86', '84', '90', '83', '82', '74', '79', '75', '88', '84', '89', '87', '76', '72', '78', '88', '87', '93', '7', '3', '8', '8', '3'),
(53, 114, '82', '80', '80', '80', '78', '87', '79', '83', '85', '76', '81', '98', '75', '80', '88', '78', '84', '84', '85', '93', '0', '7', '0', '0', '0'),
(54, 28, '82', '77', '78', '81', '81', '85', '82', '84', '75', '87', '88', '79', '70', '88', '75', '72', '82', '75', '83', '70', '2', '2', '7', '2', '5'),
(55, 102, '80', '80', '79', '76', '79', '75', '78', '70', '72', '86', '81', '72', '75', '73', '82', '72', '78', '85', '80', '85', '9', '0', '7', '5', '2'),
(56, 78, '85', '92', '86', '98', '89', '85', '86', '96', '93', '82', '88', '89', '93', '83', '78', '73', '75', '76', '79', '77', '1', '3', '9', '0', '1'),
(57, 137, '77', '70', '80', '80', '80', '76', '72', '74', '76', '77', '80', '80', '71', '85', '74', '77', '70', '76', '76', '81', '6', '6', '6', '4', '5'),
(58, 81, '79', '85', '79', '90', '82', '75', '79', '78', '79', '76', '75', '80', '83', '91', '79', '72', '75', '75', '76', '79', '5', '1', '1', '1', '2'),
(59, 143, '81', '83', '78', '75', '76', '85', '70', '70', '71', '75', '79', '88', '73', '70', '77', '76', '73', '76', '75', '75', '4', '5', '5', '9', '7'),
(60, 139, '77', '80', '79', '93', '83', '81', '87', '85', '83', '77', '78', '95', '86', '87', '76', '82', '87', '80', '87', '89', '0', '0', '0', '0', '0'),
(61, 142, '85', '85', '96', '96', '90', '79', '80', '82', '82', '78', '82', '91', '88', '84', '95', '75', '81', '93', '90', '95', '0', '6', '5', '8', '6'),
(62, 22, '82', '83', '91', '80', '88', '93', '80', '85', '90', '93', '91', '88', '88', '97', '89', '73', '72', '84', '87', '74', '2', '2', '1', '1', '3'),
(63, 145, '78', '80', '86', '72', '82', '74', '72', '73', '73', '75', '74', '77', '78', '72', '82', '88', '78', '80', '72', '87', '0', '10', '6', '0', '8'),
(64, 140, '76', '80', '89', '88', '80', '74', '72', '77', '74', '76', '84', '83', '81', '87', '80', '84', '80', '90', '90', '79', '6', '8', '3', '3', '5'),
(65, 150, '84', '80', '80', '92', '80', '83', '79', '83', '85', '77', '80', '94', '93', '87', '76', '86', '89', '88', '85', '87', '0', '8', '9', '0', '0'),
(66, 146, '82', '80', '78', '80', '76', '82', '80', '66', '75', '78', '73', '85', '78', '77', '80', '70', '69', '70', '74', '75', '6', '5', '0', '6', '0'),
(67, 131, '75', '78', '81', '85', '82', '80', '77', '76', '78', '78', '88', '70', '80', '85', '78', '73', '77', '75', '78', '78', '2', '2', '2', '1', '3'),
(68, 147, '89', '90', '83', '88', '93', '85', '82', '83', '81', '83', '81', '84', '88', '81', '82', '80', '76', '90', '90', '83', '1', '1', '1', '1', '1'),
(69, 132, '79', '82', '78', '80', '72', '76', '70', '72', '73', '73', '76', '85', '72', '70', '72', '87', '81', '70', '81', '80', '0', '3', '6', '6', '9'),
(70, 154, '78', '75', '90', '90', '78', '81', '79', '80', '78', '77', '80', '90', '90', '85', '79', '84', '78', '77', '84', '89', '0', '0', '0', '0', '0'),
(71, 39, '88', '87', '79', '77', '81', '89', '82', '70', '78', '85', '79', '80', '80', '73', '71', '72', '78', '80', '80', '80', '2', '2', '3', '4', '4'),
(72, 161, '75', '75', '75', '75', '79', '76', '79', '75', '75', '78', '76', '75', '75', '76', '76', '76', '78', '75', '75', '76', '0', '0', '0', '0', '0'),
(73, 166, '87', '85', '78', '93', '88', '75', '79', '84', '78', '76', '79', '80', '90', '85', '79', '86', '83', '79', '83', '80', '0', '0', '0', '0', '0'),
(74, 63, '79', '80', '82', '80', '86', '82', '75', '75', '77', '78', '81', '70', '73', '75', '74', '90', '83', '86', '90', '80', '3', '4', '4', '4', '3'),
(75, 100, '75', '73', '84', '79', '81', '80', '75', '74', '74', '78', '90', '72', '80', '75', '78', '73', '70', '71', '72', '74', '3', '5', '7', '5', '5'),
(76, 167, '87', '84', '81', '77', '83', '91', '81', '75', '81', '91', '87', '86', '95', '94', '93', '73', '80', '92', '92', '79', '3', '2', '1', '2', '2'),
(77, 169, '86', '85', '70', '80', '80', '86', '65', '80', '75', '75', '73', '65', '80', '80', '78', '75', '71', '70', '70', '70', '0', '5', '5', '4', '1'),
(78, 170, '78', '77', '83', '96', '82', '78', '80', '88', '90', '77', '75', '80', '90', '90', '85', '72', '71', '75', '77', '84', '0', '10', '3', '2', '5'),
(79, 97, '92', '81', '79', '89', '83', '90', '91', '90', '90', '92', '90', '98', '89', '83', '90', '75', '75', '81', '87', '80', '2', '2', '3', '3', '1'),
(80, 6, '78', '87', '79', '83', '85', '82', '88', '84', '84', '88', '88', '96', '87', '82', '83', '75', '87', '75', '75', '83', '1', '1', '3', '4', '2'),
(81, 83, '84', '79', '78', '81', '85', '83', '82', '86', '90', '84', '77', '78', '79', '75', '80', '75', '78', '82', '82', '83', '5', '9', '0', '0', '6'),
(82, 172, '78', '80', '88', '85', '82', '73', '73', '80', '73', '75', '76', '80', '76', '78', '76', '79', '77', '85', '89', '89', '6', '6', '8', '6', '0'),
(83, 175, '82', '81', '81', '78', '85', '90', '81', '75', '83', '94', '90', '81', '87', '86', '86', '78', '80', '76', '86', '72', '2', '5', '5', '1', '2'),
(84, 120, '83', '80', '92', '96', '90', '81', '83', '86', '87', '82', '83', '80', '93', '96', '85', '82', '89', '97', '97', '97', '0', '5', '2', '2', '7'),
(85, 177, '75', '80', '78', '74', '84', '79', '74', '73', '73', '75', '74', '75', '80', '73', '79', '72', '78', '75', '75', '83', '0', '0', '0', '0', '0'),
(86, 178, '72', '80', '80', '84', '80', '72', '75', '73', '73', '75', '73', '73', '72', '72', '76', '72', '73', '90', '80', '82', '0', '0', '0', '0', '0'),
(87, 179, '72', '80', '76', '83', '72', '76', '72', '73', '73', '75', '73', '74', '74', '72', '75', '73', '75', '85', '90', '72', '0', '0', '0', '0', '0'),
(88, 47, '82', '80', '78', '82', '83', '90', '82', '87', '83', '94', '88', '90', '92', '86', '91', '87', '85', '92', '86', '91', '4', '4', '9', '3', '2'),
(89, 180, '75', '80', '80', '79', '81', '88', '81', '83', '77', '87', '88', '76', '82', '89', '85', '72', '72', '87', '90', '75', '5', '5', '4', '3', '5'),
(90, 184, '90', '92', '92', '93', '90', '86', '86', '80', '80', '80', '95', '94', '95', '91', '88', '93', '93', '95', '90', '95', '2', '1', '3', '4', '2'),
(91, 130, '80', '86', '88', '91', '77', '80', '82', '83', '82', '81', '80', '85', '78', '78', '78', '73', '74', '83', '79', '82', '3', '2', '4', '4', '8'),
(92, 185, '82', '75', '87', '88', '78', '78', '79', '83', '80', '81', '84', '80', '87', '85', '79', '82', '77', '85', '85', '90', '0', '0', '0', '0', '0'),
(93, 23, '81', '83', '82', '87', '85', '81', '81', '79', '77', '92', '90', '84', '88', '95', '90', '72', '76', '97', '91', '73', '4', '4', '2', '2', '3'),
(94, 94, '75', '71', '76', '76', '78', '71', '74', '74', '75', '77', '86', '71', '71', '71', '78', '72', '70', '72', '71', '74', '6', '7', '5', '9', '9'),
(95, 186, '83', '75', '89', '96', '80', '81', '79', '84', '85', '76', '81', '80', '89', '87', '80', '77', '82', '84', '84', '88', '0', '0', '0', '9', '0'),
(96, 98, '79', '78', '82', '81', '86', '88', '81', '77', '89', '84', '82', '85', '87', '92', '84', '79', '73', '83', '90', '70', '5', '5', '5', '4', '5'),
(97, 119, '78', '85', '89', '86', '84', '85', '83', '78', '75', '75', '80', '81', '77', '88', '81', '73', '78', '95', '90', '86', '5', '6', '4', '4', '7'),
(98, 188, '79', '75', '80', '96', '82', '81', '87', '82', '82', '83', '80', '90', '75', '88', '80', '86', '91', '81', '85', '89', '0', '0', '0', '0', '0'),
(99, 189, '78', '78', '81', '78', '80', '74', '73', '73', '73', '75', '74', '81', '72', '72', '83', '77', '74', '80', '87', '80', '0', '8', '0', '7', '0'),
(100, 190, '89', '90', '89', '87', '86', '86', '85', '77', '81', '88', '83', '83', '91', '93', '92', '93', '93', '81', '91', '89', '1', '1', '1', '1', '1'),
(101, 165, '78', '78', '77', '77', '78', '80', '76', '77', '77', '79', '75', '81', '75', '85', '79', '75', '79', '75', '75', '76', '0', '9', '0', '0', '0'),
(102, 191, '75', '86', '82', '90', '88', '76', '79', '79', '77', '82', '88', '90', '74', '77', '76', '70', '72', '86', '80', '81', '2', '3', '8', '7', '0'),
(103, 110, '87', '86', '83', '80', '87', '97', '89', '85', '90', '88', '79', '85', '94', '89', '80', '75', '91', '90', '92', '95', '2', '2', '2', '3', '3'),
(104, 201, '80', '80', '80', '79', '79', '73', '75', '75', '74', '78', '75', '76', '74', '78', '78', '73', '73', '85', '77', '73', '0', '10', '0', '0', '0'),
(105, 124, '74', '80', '78', '78', '81', '73', '79', '75', '79', '77', '70', '75', '85', '80', '70', '73', '65', '68', '67', '70', '0', '8', '8', '4', '10'),
(106, 209, '88', '91', '90', '87', '82', '84', '72', '73', '76', '79', '86', '86', '84', '76', '80', '79', '82', '80', '78', '82', '2', '3', '4', '5', '9'),
(107, 16, '81', '83', '82', '79', '84', '90', '85', '92', '87', '91', '75', '77', '72', '80', '80', '76', '80', '86', '78', '71', '5', '4', '5', '3', '3'),
(108, 206, '78', '84', '88', '84', '79', '72', '76', '79', '81', '82', '75', '77', '76', '82', '78', '77', '75', '88', '87', '96', '7', '5', '2', '6', '9'),
(109, 215, '75', '88', '79', '83', '82', '76', '74', '78', '77', '78', '85', '90', '76', '78', '78', '71', '72', '84', '82', '80', '8', '4', '0', '0', '0'),
(110, 214, '90', '87', '81', '87', '82', '80', '75', '73', '76', '79', '82', '77', '81', '77', '80', '76', '80', '78', '78', '78', '5', '5', '10', '8', '6'),
(111, 153, '75', '75', '75', '75', '78', '75', '75', '79', '75', '77', '75', '78', '82', '98', '80', '75', '78', '76', '76', '80', '0', '0', '0', '0', '0'),
(112, 4, '81', '83', '82', '83', '84', '81', '81', '84', '82', '89', '86', '93', '92', '86', '87', '72', '75', '81', '90', '78', '5', '3', '5', '4', '4'),
(113, 218, '85', '87', '84', '80', '86', '92', '81', '89', '79', '89', '91', '93', '95', '98', '93', '91', '90', '95', '93', '96', '2', '1', '2', '1', '1'),
(114, 173, '78', '86', '87', '84', '83', '96', '82', '82', '79', '86', '91', '92', '94', '92', '90', '90', '87', '96', '85', '84', '1', '1', '3', '4', '2'),
(115, 207, '83', '78', '83', '84', '80', '86', '80', '86', '80', '82', '88', '91', '82', '90', '91', '85', '82', '91', '85', '76', '1', '2', '1', '1', '3'),
(116, 155, '77', '78', '80', '76', '76', '87', '83', '80', '75', '83', '86', '70', '87', '72', '76', '83', '75', '77', '72', '77', '4', '2', '0', '0', '3'),
(117, 61, '92', '85', '83', '78', '81', '94', '92', '90', '96', '94', '95', '95', '91', '93', '89', '80', '82', '81', '84', '91', '1', '1', '1', '1', '1'),
(118, 101, '74', '90', '88', '89', '80', '72', '83', '80', '76', '77', '76', '90', '86', '90', '84', '85', '90', '95', '78', '72', '1', '3', '0', '0', '0'),
(119, 220, '70', '74', '86', '88', '79', '78', '74', '78', '77', '78', '72', '73', '76', '73', '78', '85', '75', '73', '77', '77', '5', '0', '0', '0', '0'),
(120, 219, '79', '80', '79', '75', '70', '72', '79', '78', '80', '75', '70', '70', '71', '72', '75', '69', '70', '67', '67', '70', '7', '8', '6', '7', '6'),
(121, 223, '72', '77', '81', '76', '87', '70', '78', '71', '80', '78', '74', '74', '77', '83', '96', '78', '80', '74', '82', '86', '0', '0', '6', '4', '4'),
(122, 222, '85', '94', '85', '93', '93', '78', '87', '96', '88', '79', '92', '84', '86', '86', '78', '90', '90', '74', '79', '73', '4', '3', '10', '0', '0'),
(123, 225, '73', '72', '82', '92', '78', '71', '72', '77', '76', '77', '73', '78', '75', '77', '75', '70', '71', '87', '80', '83', '0', '0', '6', '8', '0'),
(124, 224, '77', '76', '77', '77', '89', '76', '70', '72', '78', '82', '74', '82', '75', '71', '71', '70', '76', '74', '77', '70', '9', '9', '5', '5', '3'),
(125, 226, '73', '80', '78', '86', '75', '72', '73', '75', '74', '78', '74', '72', '75', '75', '76', '74', '74', '75', '76', '73', '0', '0', '0', '0', '0'),
(126, 227, '83', '91', '84', '92', '91', '73', '85', '81', '81', '86', '73', '82', '80', '85', '88', '70', '75', '85', '92', '94', '0', '1', '2', '1', '1'),
(127, 181, '79', '76', '77', '74', '78', '71', '70', '70', '71', '80', '85', '82', '70', '75', '73', '72', '75', '76', '73', '75', '9', '0', '0', '0', '6'),
(128, 229, '81', '90', '79', '81', '79', '76', '78', '79', '80', '86', '76', '77', '78', '80', '76', '76', '75', '80', '75', '78', '0', '9', '9', '0', '7'),
(129, 232, '79', '80', '85', '96', '84', '80', '80', '80', '82', '77', '75', '85', '85', '97', '85', '81', '76', '75', '82', '80', '6', '1', '7', '3', '2'),
(130, 68, '90', '84', '76', '77', '84', '85', '82', '78', '78', '84', '87', '88', '83', '79', '85', '75', '78', '77', '75', '76', '3', '4', '10', '6', '5'),
(131, 213, '75', '88', '87', '91', '82', '73', '78', '78', '78', '78', '73', '92', '79', '85', '84', '74', '78', '75', '73', '84', '2', '2', '0', '0', '5'),
(132, 123, '85', '91', '84', '92', '86', '88', '93', '88', '95', '91', '95', '85', '83', '90', '85', '82', '80', '89', '80', '84', '1', '1', '1', '1', '1'),
(133, 11, '76', '75', '80', '74', '80', '79', '80', '75', '84', '89', '79', '73', '70', '70', '77', '80', '77', '85', '80', '74', '5', '3', '3', '3', '3'),
(134, 121, '78', '85', '80', '80', '73', '84', '82', '77', '86', '83', '80', '80', '82', '80', '80', '70', '75', '80', '67', '70', '0', '7', '6', '9', '0'),
(135, 234, '77', '72', '80', '75', '70', '84', '80', '79', '80', '82', '65', '70', '70', '80', '72', '70', '65', '67', '70', '70', '0', '0', '0', '0', '7'),
(136, 236, '80', '78', '80', '80', '78', '85', '77', '78', '80', '84', '75', '79', '77', '79', '88', '75', '78', '75', '75', '80', '3', '7', '1', '0', '4'),
(137, 239, '85', '83', '78', '78', '81', '85', '72', '70', '72', '72', '78', '78', '72', '72', '71', '75', '79', '70', '70', '70', '1', '1', '1', '1', '1'),
(138, 197, '89', '90', '82', '92', '85', '90', '91', '85', '91', '90', '80', '85', '88', '90', '85', '70', '75', '82', '75', '70', '1', '1', '3', '2', '1'),
(139, 238, '80', '80', '80', '83', '80', '80', '80', '75', '76', '79', '78', '77', '81', '80', '78', '85', '89', '85', '85', '85', '3', '2', '5', '3', '4'),
(140, 182, '75', '79', '80', '74', '77', '76', '72', '72', '76', '90', '75', '87', '70', '81', '75', '75', '75', '70', '73', '71', '0', '0', '0', '4', '6'),
(141, 93, '80', '80', '96', '96', '90', '86', '90', '83', '83', '77', '81', '95', '96', '94', '91', '87', '85', '90', '93', '95', '3', '1', '1', '4', '2'),
(142, 196, '82', '85', '78', '88', '70', '84', '84', '88', '90', '88', '65', '85', '84', '80', '80', '80', '70', '70', '67', '70', '5', '4', '3', '7', '9'),
(143, 193, '91', '90', '84', '79', '80', '93', '94', '88', '94', '96', '80', '83', '93', '90', '80', '76', '79', '81', '78', '79', '1', '1', '1', '1', '1'),
(144, 112, '80', '86', '79', '75', '86', '72', '82', '80', '95', '94', '78', '80', '74', '75', '91', '75', '70', '74', '70', '81', '2', '2', '2', '2', '1'),
(145, 135, '83', '88', '80', '80', '84', '75', '79', '85', '72', '88', '76', '85', '81', '84', '83', '77', '78', '84', '87', '75', '3', '3', '3', '2', '2'),
(146, 250, '84', '88', '86', '72', '82', '75', '72', '78', '77', '77', '84', '90', '89', '72', '84', '78', '73', '90', '75', '72', '6', '6', '6', '0', '0'),
(147, 217, '80', '77', '83', '80', '72', '80', '88', '73', '74', '81', '77', '74', '74', '82', '78', '80', '80', '70', '80', '80', '0', '3', '0', '4', '0'),
(148, 252, '80', '80', '70', '77', '80', '96', '75', '82', '80', '80', '84', '82', '80', '80', '75', '72', '75', '82', '73', '75', '1', '1', '2', '2', '2'),
(149, 194, '89', '85', '80', '77', '77', '93', '96', '89', '92', '93', '82', '78', '82', '86', '80', '78', '78', '78', '80', '77', '2', '4', '3', '4', '5'),
(150, 183, '76', '80', '77', '85', '78', '80', '79', '80', '75', '75', '83', '79', '81', '77', '82', '72', '74', '85', '78', '72', '8', '8', '6', '3', '0'),
(151, 253, '76', '78', '81', '74', '84', '74', '75', '80', '77', '75', '82', '84', '77', '87', '76', '88', '75', '90', '90', '87', '8', '0', '5', '6', '7'),
(152, 171, '80', '79', '95', '96', '84', '83', '79', '82', '84', '75', '75', '78', '85', '98', '85', '77', '78', '79', '82', '87', '7', '0', '1', '1', '3'),
(153, 254, '85', '80', '85', '90', '87', '88', '90', '80', '78', '82', '76', '84', '75', '85', '90', '85', '82', '88', '90', '84', '1', '1', '2', '1', '1'),
(154, 198, '91', '90', '91', '81', '82', '93', '96', '89', '96', '96', '92', '87', '91', '95', '89', '75', '83', '83', '84', '89', '1', '1', '1', '1', '1'),
(155, 237, '81', '85', '77', '89', '86', '81', '80', '87', '91', '90', '70', '82', '83', '80', '75', '70', '70', '68', '70', '70', '0', '9', '4', '1', '1'),
(156, 246, '81', '80', '78', '78', '82', '82', '84', '73', '86', '81', '65', '82', '80', '80', '80', '79', '70', '67', '67', '70', '10', '0', '0', '8', '3'),
(157, 260, '85', '78', '79', '77', '88', '72', '72', '70', '77', '78', '85', '89', '70', '73', '71', '70', '71', '70', '70', '70', '5', '3', '3', '7', '10'),
(158, 230, '80', '77', '78', '75', '77', '84', '75', '77', '71', '80', '81', '86', '74', '81', '71', '71', '76', '72', '72', '71', '4', '7', '0', '0', '3'),
(159, 233, '74', '75', '74', '76', '80', '73', '80', '74', '74', '83', '82', '71', '70', '79', '77', '70', '71', '70', '74', '74', '10', '9', '7', '6', '2'),
(160, 164, '76', '78', '80', '81', '83', '76', '78', '76', '78', '85', '75', '85', '79', '79', '84', '75', '78', '80', '75', '82', '8', '10', '6', '7', '9'),
(161, 30, '80', '80', '76', '83', '81', '87', '80', '83', '71', '82', '92', '88', '73', '82', '81', '73', '80', '72', '82', '70', '4', '2', '6', '4', '4'),
(162, 148, '75', '82', '75', '74', '78', '72', '70', '70', '71', '76', '73', '70', '70', '70', '71', '74', '70', '71', '71', '72', '0', '0', '0', '0', '0'),
(163, 80, '75', '80', '87', '86', '82', '75', '74', '73', '74', '77', '76', '75', '76', '80', '80', '72', '72', '80', '85', '78', '2', '3', '3', '2', '6'),
(164, 122, '78', '80', '81', '81', '78', '84', '75', '83', '78', '77', '83', '84', '89', '83', '88', '75', '76', '85', '75', '73', '3', '3', '4', '2', '5'),
(165, 263, '80', '88', '88', '88', '74', '75', '72', '78', '78', '77', '85', '91', '91', '84', '83', '93', '93', '80', '90', '89', '7', '5', '0', '0', '1'),
(166, 268, '83', '75', '79', '81', '80', '82', '76', '77', '78', '75', '75', '78', '79', '99', '80', '81', '80', '76', '79', '79', '5', '0', '0', '0', '0'),
(167, 267, '3,5', '82', '72', '70', '75', '2,8', '70', '70', '70', '73', '3,1', '73', '72', '71', '72', '3,1', '79', '70', '71', '70', '0', '0', '0', '0', '0'),
(168, 266, '77', '76', '74', '72', '75', '71', '70', '78', '71', '71', '70', '73', '74', '73', '72', '71', '70', '74', '75', '73', '0', '0', '0', '0', '0'),
(169, 116, '75', '75', '75', '78', '75', '75', '75', '83', '77', '75', '75', '78', '75', '75', '76', '73', '75', '75', '75', '75', '0', '0', '0', '0', '0'),
(170, 127, '85', '79', '80', '80', '83', '88', '75', '70', '70', '76', '80', '80', '79', '75', '71', '71', '71', '74', '75', '75', '0', '0', '0', '0', '0'),
(171, 272, '88', '82', '76', '72', '75', '71', '70', '70', '70', '73', '70', '73', '72', '71', '72', '70', '79', '70', '71', '70', '0', '0', '0', '0', '0'),
(172, 271, '3,1', '79', '76', '74', '75', '3,8', '71', '75', '70', '75', '3,1', '78', '72', '72', '71', '3,1', '79', '71', '73', '70', '0', '1', '6', '0', '0'),
(173, 270, '75', '78', '80', '96', '85', '78', '79', '80', '81', '76', '75', '80', '85', '88', '85', '76', '78', '80', '83', '81', '10', '2', '6', '4', '1'),
(174, 244, '80', '79', '76', '74', '75', '96', '71', '75', '70', '75', '79', '78', '72', '72', '71', '79', '79', '71', '73', '70', '0', '1', '6', '0', '0'),
(175, 275, '85', '78', '79', '77', '88', '72', '72', '70', '77', '78', '85', '89', '70', '73', '71', '70', '71', '70', '70', '70', '5', '3', '3', '7', '10'),
(176, 276, '64', '78', '86', '83', '88', '82', '79', '73', '70', '73', '75', '75', '81', '79', '84', '70', '74', '72', '68', '78', '0', '10', '4', '5', '3'),
(177, 277, '75', '92', '93', '87', '95', '76', '88', '90', '80', '82', '83', '87', '96', '79', '82', '86', '85', '85', '84', '84', '3', '3', '2', '2', '2'),
(178, 261, '76', '84', '95', '79', '94', '79', '87', '85', '72', '75', '83', '80', '90', '79', '85', '85', '82', '86', '85', '83', '3', '7', '4', '5', '3'),
(179, 55, '80', '75', '91', '91', '80', '81', '80', '82', '86', '83', '78', '80', '89', '75', '87', '76', '79', '88', '84', '91', '0', '0', '8', '0', '0'),
(180, 141, '87', '82', '80', '76', '89', '79', '78', '92', '84', '79', '85', '78', '94', '80', '85', '83', '75', '76', '89', '81', '5', '10', '1', '2', '3'),
(181, 273, '75', '84', '75', '75', '80', '75', '77', '76', '75', '75', '75', '76', '75', '92', '78', '77', '75', '75', '79', '78', '0', '0', '0', '5', '0'),
(182, 21, '78', '86', '87', '85', '85', '91', '82', '80', '77', '81', '85', '85', '93', '93', '88', '72', '87', '91', '93', '82', '3', '3', '1', '2', '4'),
(183, 279, '89', '89', '93', '85', '93', '76', '85', '85', '80', '75', '84', '90', '85', '78', '78', '83', '90', '81', '83', '83', '2', '4', '6', '6', '3'),
(184, 281, '82', '85', '78', '79', '78', '92', '90', '88', '94', '92', '86', '83', '78', '89', '83', '72', '73', '73', '80', '74', '3', '2', '2', '2', '2'),
(185, 174, '78', '81', '76', '75', '81', '80', '77', '76', '75', '82', '75', '81', '76', '79', '80', '78', '75', '75', '75', '76', '0', '0', '0', '0', '0'),
(186, 106, '82', '88', '78', '74', '80', '80', '80', '77', '80', '86', '72', '93', '79', '82', '85', '83', '85', '85', '82', '88', '2', '3', '1', '2', '1'),
(187, 265, '80', '84', '83', '87', '78', '73', '72', '74', '73', '75', '78', '73', '74', '79', '74', '79', '74', '76', '78', '72', '0', '0', '0', '7', '0'),
(188, 231, '80', '76', '79', '80', '86', '82', '80', '87', '78', '86', '76', '89', '82', '72', '71', '72', '75', '74', '75', '75', '6', '3', '7', '6', '3'),
(189, 115, '80', '86', '95', '93', '80', '75', '75', '82', '80', '84', '79', '83', '86', '76', '88', '73', '73', '82', '74', '78', '5', '5', '1', '2', '1'),
(190, 86, '81', '79', '82', '79', '75', '77', '78', '82', '77', '83', '75', '89', '80', '83', '85', '75', '80', '75', '83', '79', '0', '0', '8', '8', '0'),
(191, 249, '84', '77', '77', '75', '75', '78', '80', '70', '74', '80', '85', '88', '70', '70', '70', '72', '74', '72', '70', '80', '4', '5', '0', '0', '0'),
(192, 162, '82', '78', '62', '75', '75', '70', '80', '75', '75', '82', '78', '77', '75', '75', '81', '75', '81', '75', '76', '76', '0', '8', '0', '0', '0'),
(193, 274, '84', '80', '88', '91', '82', '81', '82', '79', '77', '76', '89', '90', '94', '93', '76', '85', '85', '85', '72', '72', '3', '5', '5', '0', '3'),
(194, 289, '74', '76', '77', '78', '77', '76', '77', '70', '74', '78', '75', '85', '74', '70', '71', '72', '76', '75', '73', '76', '10', '7', '0', '0', '0'),
(195, 65, '89', '92', '89', '84', '82', '95', '84', '80', '85', '90', '85', '88', '82', '90', '82', '80', '78', '80', '85', '90', '1', '1', '1', '1', '1'),
(196, 291, '72', '78', '74', '84', '74', '73', '82', '78', '75', '75', '74', '73', '79', '72', '74', '72', '74', '90', '90', '77', '0', '0', '0', '0', '9'),
(197, 128, '94', '94', '88', '87', '85', '98', '99', '82', '87', '94', '98', '97', '92', '97', '86', '94', '94', '92', '95', '84', '1', '1', '1', '1', '1'),
(198, 0, '78', '80', '80', '76', '82', '75', '79', '80', '76', '88', '72', '88', '74', '91', '71', '89', '85', '89', '80', '77', '1', '1', '6', '6', '2'),
(199, 293, '80', '76', '76', '78', '81', '80', '73', '78', '80', '90', '73', '71', '79', '70', '76', '72', '70', '88', '78', '70', '7', '7', '1', '1', '2'),
(200, 91, '82', '78', '75', '76', '80', '78', '78', '75', '77', '78', '75', '78', '75', '75', '78', '75', '75', '75', '75', '75', '0', '0', '0', '0', '0'),
(201, 133, '75', '76', '75', '75', '83', '76', '75', '75', '78', '79', '75', '75', '75', '75', '80', '75', '75', '75', '75', '75', '0', '0', '0', '0', '0'),
(202, 259, '83', '79', '88', '90', '88', '85', '90', '89', '88', '84', '80', '86', '97', '90', '97', '82', '82', '86', '89', '94', '2', '2', '1', '1', '2'),
(203, 297, '76', '80', '85', '83', '90', '80', '80', '80', '80', '78', '73', '74', '72', '72', '74', '72', '73', '80', '72', '72', '0', '0', '9', '0', '7'),
(204, 300, '80', '80', '75', '86', '80', '80', '80', '73', '73', '75', '81', '76', '84', '73', '74', '79', '80', '75', '72', '77', '0', '0', '0', '0', '8'),
(205, 302, '84', '77', '77', '75', '75', '78', '80', '70', '74', '80', '85', '88', '70', '70', '70', '72', '74', '72', '70', '80', '4', '5', '0', '0', '0'),
(206, 294, '75', '75', '78', '75', '75', '81', '70', '82', '72', '82', '82', '88', '78', '74', '76', '85', '80', '75', '73', '83', '8', '8', '0', '9', '2'),
(207, 248, '80', '79', '85', '74', '80', '90', '82', '70', '71', '76', '72', '74', '80', '89', '71', '72', '70', '80', '83', '75', '10', '10', '7', '6', '9'),
(208, 304, '88', '83', '80', '78', '75', '71', '70', '70', '74', '75', '88', '80', '76', '70', '70', '79', '78', '73', '75', '72', '0', '5', '7', '9', '0'),
(209, 296, '74', '75', '78', '85', '78', '80', '78', '73', '75', '75', '75', '74', '81', '82', '74', '73', '72', '77', '79', '72', '0', '0', '9', '9', '0'),
(210, 307, '80', '78', '77', '82', '88', '77', '75', '78', '81', '80', '79', '73', '76', '77', '76', '71', '71', '76', '77', '77', '8', '0', '9', '7', '9'),
(211, 309, '80', '87', '84', '83', '81', '85', '75', '78', '78', '82', '78', '85', '94', '91', '86', '79', '80', '84', '85', '70', '1', '1', '2', '3', '7'),
(212, 311, '77', '82', '76', '76', '75', '71', '73', '70', '73', '72', '76', '77', '72', '72', '70', '70', '70', '72', '80', '79', '0', '10', '0', '9', '0'),
(213, 60, '82', '84', '80', '78', '81', '76', '75', '78', '78', '79', '75', '79', '75', '75', '79', '75', '75', '75', '75', '76', '0', '0', '0', '0', '0'),
(214, 247, '80', '76', '77', '77', '81', '75', '70', '70', '71', '82', '90', '87', '71', '75', '74', '90', '88', '80', '82', '73', '6', '6', '0', '0', '10'),
(215, 310, '82', '80', '76', '81', '77', '75', '78', '74', '75', '71', '80', '74', '84', '76', '71', '72', '70', '70', '70', '71', '4', '5', '4', '5', '6'),
(216, 14, '88', '80', '80', '82', '86', '77', '80', '80', '90', '92', '86', '90', '94', '91', '91', '80', '82', '85', '89', '92', '1', '1', '1', '1', '4'),
(217, 71, '78', '80', '80', '76', '82', '75', '79', '80', '76', '88', '72', '88', '74', '91', '71', '89', '85', '89', '80', '77', '1', '1', '6', '5', '2'),
(218, 278, '93', '90', '89', '98', '99', '89', '94', '95', '94', '87', '98', '97', '95', '96', '90', '97', '95', '86', '93', '90', '2', '1', '1', '1', '1'),
(219, 1, '85', '80', '83', '83', '85', '90', '90', '82', '90', '84', '92', '90', '70', '80', '89', '85', '72', '76', '72', '82', '1', '2', '4', '2', '1'),
(220, 298, '73', '75', '78', '77', '76', '73', '72', '70', '70', '74', '78', '80', '76', '74', '90', '58', '72', '72', '73', '76', '0', '0', '0', '0', '8'),
(221, 280, '67', '78', '86', '85', '87', '67', '86', '75', '79', '82', '67', '86', '92', '87', '97', '83', '98', '92', '93', '97', '4', '3', '4', '3', '1'),
(222, 285, '70', '80', '80', '87', '78', '70', '88', '74', '76', '84', '72', '83', '92', '83', '90', '70', '85', '82', '82', '89', '1', '1', '6', '5', '4'),
(223, 317, '75', '70', '88', '78', '83', '74', '70', '80', '86', '75', '76', '70', '80', '77', '80', '70', '70', '75', '76', '75', '0', '0', '2', '1', '5'),
(224, 303, '76', '78', '77', '87', '74', '74', '77', '78', '77', '78', '76', '75', '71', '81', '78', '72', '70', '79', '80', '73', '4', '4', '5', '5', '6'),
(225, 208, '72', '80', '73', '88', '74', '73', '79', '75', '73', '75', '75', '73', '74', '72', '75', '73', '78', '75', '72', '72', '0', '0', '0', '0', '0'),
(226, 299, '74', '73', '74', '74', '80', '78', '72', '78', '76', '73', '74', '73', '74', '71', '71', '72', '75', '70', '74', '72', '6', '6', '0', '7', '0'),
(227, 243, '80', '85', '76', '80', '80', '87', '73', '75', '74', '80', '88', '80', '72', '72', '80', '79', '79', '72', '75', '78', '0', '0', '0', '0', '0'),
(228, 321, '86', '80', '80', '85', '85', '88', '75', '75', '85', '78', '79', '78', '78', '74', '73', '70', '71', '71', '78', '80', '0', '4', '4', '5', '4'),
(229, 210, '75', '75', '78', '90', '79', '81', '78', '75', '76', '76', '75', '78', '78', '75', '76', '75', '84', '76', '78', '79', '0', '9', '0', '0', '6'),
(230, 325, '76', '80', '85', '92', '87', '87', '87', '80', '88', '85', '82', '85', '77', '76', '78', '73', '75', '73', '79', '86', '7', '5', '7', '8', '4'),
(231, 176, '80', '78', '70', '75', '85', '84', '84', '71', '75', '70', '70', '77', '76', '77', '83', '75', '74', '78', '86', '74', '4', '6', '2', '5', '3'),
(232, 305, '85', '90', '90', '93', '80', '65', '71', '74', '70', '75', '77', '76', '69', '68', '76', '65', '68', '65', '64', '71', '5', '5', '5', '5', '5'),
(233, 312, '90', '90', '75', '78', '81', '80', '70', '81', '71', '70', '88', '72', '85', '93', '89', '83', '86', '88', '88', '81', '5', '4', '1', '1', '3'),
(234, 331, '75', '75', '79', '75', '80', '76', '78', '75', '77', '75', '76', '82', '77', '75', '75', '72', '75', '75', '75', '75', '10', '0', '0', '0', '0'),
(235, 242, '78', '76', '83', '79', '80', '79', '80', '85', '71', '81', '78', '87', '80', '83', '75', '81', '75', '81', '80', '70', '6', '5', '4', '5', '5'),
(236, 333, '80', '82', '83', '88', '87', '89', '80', '80', '82', '90', '80', '88', '80', '88', '95', '82', '80', '84', '86', '81', '1', '1', '1', '1', '1'),
(237, 240, '86', '87', '95', '88', '90', '98', '95', '84', '89', '82', '91', '92', '87', '97', '89', '95', '90', '82', '96', '88', '4', '10', '4', '1', '0'),
(238, 334, '84', '87', '83', '90', '86', '84', '74', '76', '74', '90', '80', '89', '82', '84', '94', '83', '83', '68', '64', '75', '2', '2', '2', '5', '2'),
(239, 327, '87', '83', '80', '77', '78', '76', '80', '76', '81', '86', '79', '85', '85', '80', '87', '75', '81', '82', '91', '85', '5', '8', '7', '8', '4'),
(240, 336, '70', '75', '78', '80', '80', '74', '75', '73', '74', '70', '70', '75', '80', '75', '76', '70', '75', '70', '71', '72', '9', '7', '7', '7', '9'),
(241, 337, '74', '76', '77', '78', '80', '70', '77', '73', '74', '74', '71', '73', '80', '75', '78', '71', '75', '70', '71', '74', '7', '7', '10', '8', '3'),
(242, 82, '96', '87', '76', '78', '78', '79', '75', '70', '75', '78', '89', '80', '75', '73', '70', '79', '79', '77', '80', '74', '0', '0', '0', '0', '0'),
(243, 283, '94', '85', '78', '79', '76', '70', '70', '75', '74', '80', '76', '80', '73', '86', '85', '68', '70', '65', '65', '67', '3', '3', '5', '4', '7'),
(244, 262, '80', '84', '75', '75', '75', '75', '80', '87', '86', '78', '75', '80', '75', '75', '70', '79', '80', '75', '78', '66', '0', '1', '0', '0', '10'),
(245, 255, '87', '89', '95', '85', '85', '80', '90', '90', '82', '78', '84', '88', '80', '84', '80', '82', '84', '76', '70', '76', '3', '1', '2', '3', '3'),
(246, 319, '75', '75', '72', '72', '80', '73', '73', '74', '74', '75', '72', '73', '72', '72', '73', '72', '72', '72', '73', '86', '0', '0', '0', '0', '0'),
(247, 326, '91', '85', '93', '91', '94', '94', '96', '84', '89', '81', '92', '89', '85', '93', '90', '98', '95', '93', '93', '97', '7', '6', '6', '7', '2'),
(248, 149, '76', '77', '82', '75', '86', '76', '76', '75', '75', '78', '76', '77', '75', '75', '77', '76', '75', '75', '78', '78', '0', '0', '0', '0', '0'),
(249, 316, '90', '92', '97', '88', '93', '98', '97', '89', '88', '86', '89', '99', '89', '95', '93', '98', '100', '97', '94', '100', '3', '4', '1', '6', '1'),
(250, 74, '72', '80', '76', '78', '78', '80', '79', '74', '74', '76', '74', '82', '72', '79', '75', '72', '77', '80', '72', '72', '1', '0', '10', '0', '0'),
(251, 73, '89', '87', '85', '80', '75', '99', '80', '78', '87', '90', '80', '88', '80', '78', '73', '87', '83', '75', '74', '75', '0', '3', '2', '2', '2'),
(252, 318, '80', '78', '80', '81', '81', '85', '80', '87', '80', '82', '71', '82', '71', '83', '76', '71', '72', '81', '78', '70', '6', '5', '5', '5', '5'),
(253, 138, '77', '75', '75', '75', '75', '78', '76', '70', '75', '77', '75', '75', '75', '76', '75', '75', '75', '75', '75', '75', '0', '0', '0', '0', '0'),
(254, 108, '72', '80', '83', '85', '84', '77', '81', '74', '74', '75', '74', '83', '79', '87', '74', '72', '76', '75', '90', '85', '0', '0', '0', '8', '0'),
(255, 221, '78', '90', '92', '95', '82', '75', '77', '78', '80', '78', '93', '96', '96', '95', '88', '93', '92', '85', '95', '93', '1', '1', '4', '3', '1'),
(256, 111, '72', '80', '82', '82', '80', '73', '83', '73', '73', '75', '74', '78', '72', '73', '74', '72', '78', '75', '90', '72', '0', '0', '0', '8', '0'),
(257, 241, '88', '86', '78', '85', '75', '97', '73', '76', '75', '78', '96', '79', '75', '71', '71', '79', '82', '72', '74', '75', '0', '0', '0', '0', '8'),
(258, 335, '91', '90', '90', '99', '94', '86', '86', '93', '93', '78', '98', '96', '89', '92', '77', '95', '81', '78', '88', '83', '3', '3', '3', '4', '3'),
(259, 301, '74', '78', '75', '72', '72', '74', '74', '73', '73', '75', '74', '73', '72', '72', '74', '72', '73', '72', '74', '72', '0', '0', '0', '0', '0'),
(260, 96, '88', '74', '73', '74', '80', '80', '67', '74', '70', '70', '87', '68', '69', '60', '68', '84', '64', '54', '64', '64', '0', '0', '0', '0', '0'),
(261, 344, '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '80', '2', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_data_nilai_tes`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_data_nilai_tes` (
  `reg_data_nilai_tes_id` int(11) NOT NULL,
  `reg_data_nilai_tes_reg_akun_id` int(11) NOT NULL,
  `reg_data_nilai_raport` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_prestasi` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_tes_baca_tulis_alquran` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_tes_ahlaq` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_tes_minat_bakat` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_tes_bhs_inggris` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_wawancara` varchar(10) NOT NULL DEFAULT '0',
  `reg_data_nilai_total` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_data_nilai_tes`
--

INSERT INTO `tbl_reg_data_nilai_tes` (`reg_data_nilai_tes_id`, `reg_data_nilai_tes_reg_akun_id`, `reg_data_nilai_raport`, `reg_data_nilai_prestasi`, `reg_data_nilai_tes_baca_tulis_alquran`, `reg_data_nilai_tes_ahlaq`, `reg_data_nilai_tes_minat_bakat`, `reg_data_nilai_tes_bhs_inggris`, `reg_data_nilai_wawancara`, `reg_data_nilai_total`) VALUES
(1, 2, '1803', '45', '30', '30', '20', '30', '84.5999999', '1932.6'),
(2, 13, '1727', '0', '30', '45', '25', '30', '100', '1827'),
(3, 17, '1844', '0', '10', '10', '8', '5', '25.4', '1869.4'),
(4, 15, '1542', '0', '30', '40', '25', '15', '84.5999999', '1626.6'),
(5, 20, '1815', '40', '30', '45', '25', '30', '100', '1955'),
(6, 18, '1731', '0', '20', '40', '20', '15', '73.0999999', '1804.1'),
(7, 9, '1581', '0', '25', '40', '20', '15', '76.9000000', '1657.9'),
(8, 3, '1811', '0', '20', '40', '20', '15', '73.0999999', '1884.1'),
(9, 29, '1668', '78', '30', '35', '25', '25', '88.5', '1834.5'),
(10, 31, '1771', '30', '15', '15', '20', '24', '56.9', '1857.9'),
(11, 25, '1636', '0', '30', '40', '25', '15', '84.5999999', '1720.6'),
(12, 26, '1691', '60', '20', '30', '25', '15', '69.2', '1820.2'),
(13, 32, '1779', '0', '20', '35', '20', '10', '65.4000000', '1844.4'),
(14, 5, '1528', '90', '10', '8', '10', '8', '27.7', '1645.7'),
(15, 41, '1726', '0', '30', '20', '20', '20', '69.2', '1795.2'),
(16, 62, '1747', '0', '25', '40', '25', '20', '84.5999999', '1831.6'),
(17, 58, '1942', '126', '30', '35', '25', '15', '80.8', '2148.8'),
(18, 70, '1568', '0', '0', '0', '0', '0', '0', ''),
(19, 72, '1644', '40', '20', '30', '25', '30', '80.8', '1764.8'),
(20, 40, '1608', '0', '15', '15', '20', '10', '46.2', '1654.2'),
(21, 75, '1757', '0', '30', '40', '20', '15', '80.8', '1837.8'),
(22, 38, '1787', '75', '20', '20', '25', '5', '53.8', '1915.8'),
(23, 42, '1772', '0', '25', '35', '25', '30', '88.5', '1860.5'),
(24, 34, '1546', '0', '25', '40', '25', '15', '80.8', '1626.8'),
(25, 49, '1615', '280', '30', '20', '15', '15', '61.5', '1956.5'),
(26, 67, '1920', '0', '30', '14', '20', '30', '72.3', '1992.3'),
(27, 85, '1679', '0', '20', '30', '20', '15', '65.4000000', '1744.4'),
(28, 69, '1645', '0', '10', '15', '15', '5', '34.6', '1679.6'),
(29, 88, '1577', '0', '20', '30', '20', '10', '61.5', '1638.5'),
(30, 36, '1683', '102', '20', '25', '25', '20', '69.2', '1854.2'),
(31, 89, '1589', '0', '30', '40', '15', '10', '73.0999999', '1662.1'),
(32, 84, '1535', '30', '25', '40', '25', '15', '80.8', '1645.8'),
(33, 103, '1829', '0', '25', '40', '25', '30', '92.3', '1921.3'),
(34, 87, '1993', '0', '25', '40', '25', '15', '80.8', '2073.8'),
(35, 90, '1600', '180', '20', '40', '25', '15', '76.9000000', '1856.9'),
(36, 104, '1653', '30', '30', '35', '25', '20', '84.5999999', '1767.6'),
(37, 99, '1642', '0', '5', '30', '20', '30', '65.4000000', '1707.4'),
(38, 43, '1641', '0', '25', '40', '25', '15', '80.8', '1721.8'),
(39, 50, '1703', '106', '20', '30', '20', '10', '61.5', '1870.5'),
(40, 109, '1759', '0', '25', '40', '25', '30', '92.3', '1851.3'),
(41, 113, '1827', '0', '30', '35', '20', '20', '80.8', '1905.8'),
(42, 117, '1522', '0', '30', '35', '20', '20', '80.8', '1602.8'),
(43, 19, '1740', '140', '25', '45', '25', '30', '96.2', '1976.2'),
(44, 7, '1599', '0', '25', '40', '25', '15', '80.8', '1679.8'),
(45, 10, '1635', '76', '30', '35', '25', '15', '80.8', '1791.8'),
(46, 8, '1795', '16', '25', '40', '20', '15', '76.9000000', '1887.9'),
(47, 35, '1592', '0', '20', '30', '25', '10', '65.4000000', '1657.4'),
(48, 125, '1591', '0', '10', '25', '15', '5', '42.3', '1633.3'),
(49, 44, '1793', '70', '25', '40', '25', '10', '76.9000000', '1939.9'),
(50, 66, '1618', '0', '20', '25', '15', '10', '53.8', '1671.8'),
(51, 126, '1822', '0', '25', '35', '20', '10', '69.2', '1891.2'),
(52, 134, '1713', '16', '0', '0', '0', '0', '0', ''),
(53, 114, '1656', '120', '20', '20', '15', '15', '53.8', '1829.8'),
(54, 28, '1668', '0', '20', '35', '25', '25', '80.8', '1748.8'),
(55, 102, '1600', '30', '15', '30', '25', '5', '57.7', '1687.7'),
(56, 78, '1759', '0', '20', '20', '15', '15', '53.8', '1812.8'),
(57, 137, '1558', '0', '0', '0', '0', '0', '0', ''),
(58, 81, '1677', '0', '25', '30', '25', '15', '73.0999999', '1750.1'),
(59, 143, '1576', '0', '25', '25', '5', '10', '50', '1626'),
(60, 139, '1672', '56', '15', '25', '20', '5', '50', '1722'),
(61, 142, '1727', '150', '30', '40', '25', '15', '84.5999999', '1961.6'),
(62, 22, '1800', '0', '20', '35', '20', '15', '69.2', '1869.2'),
(63, 145, '1571', '0', '20', '30', '25', '15', '69.2', '1640.2'),
(64, 140, '1684', '0', '30', '40', '25', '15', '84.5999999', '1768.6'),
(65, 150, '1688', '130', '30', '40', '25', '15', '84.5999999', '1902.6'),
(66, 146, '1540', '140', '25', '35', '23', '25', '83.0999999', '1763.1'),
(67, 131, '1662', '0', '30', '45', '25', '15', '88.5', '1750.5'),
(68, 147, '1792', '0', '30', '30', '15', '15', '69.2', '1861.2'),
(69, 132, '1545', '0', '20', '20', '10', '10', '46.2', '1591.2'),
(70, 154, '1642', '0', '15', '20', '5', '5', '34.6', '1676.6'),
(71, 39, '1669', '82', '25', '30', '25', '30', '84.5999999', '1835.6'),
(72, 161, '1520', '0', '25', '30', '20', '15', '69.2', '1589.2'),
(73, 166, '1647', '0', '20', '30', '20', '15', '65.4000000', '1712.4'),
(74, 63, '1670', '100', '5', '30', '10', '5', '38.5', '1808.5'),
(75, 100, '1580', '0', '25', '30', '25', '15', '73.0999999', '1653.1'),
(76, 167, '1792', '0', '20', '40', '20', '30', '84.5999999', '1876.6'),
(77, 169, '1572', '100', '25', '40', '25', '15', '80.8', '1752.8'),
(78, 170, '1674', '0', '20', '15', '15', '15', '50', '1724'),
(79, 97, '1813', '20', '30', '40', '20', '20', '84.5999999', '1917.6'),
(80, 6, '1757', '0', '30', '45', '25', '15', '88.5', '1845.5'),
(81, 83, '1633', '0', '25', '30', '25', '15', '73.0999999', '1706.1'),
(82, 172, '1628', '0', '25', '30', '20', '20', '73.0999999', '1701.1'),
(83, 175, '1732', '48', '25', '30', '25', '30', '84.5999999', '1864.6'),
(84, 120, '1807', '0', '25', '30', '20', '15', '69.2', '1876.2'),
(85, 177, '1529', '60', '0', '0', '0', '0', '0', ''),
(86, 178, '1527', '0', '30', '35', '15', '10', '69.2', '1596.2'),
(87, 179, '1515', '0', '20', '5', '7', '2', '26.2', '1541.2'),
(88, 47, '1795', '0', '20', '30', '25', '20', '73.0999999', '1868.1'),
(89, 180, '1693', '0', '20', '15', '15', '15', '50', '1743'),
(90, 184, '1884', '0', '25', '30', '20', '5', '61.5', '1945.5'),
(91, 130, '1688', '60', '25', '30', '25', '10', '69.2', '1817.2'),
(92, 185, '1645', '0', '25', '35', '25', '15', '76.9000000', '1721.9'),
(93, 23, '1764', '0', '30', '40', '25', '30', '96.2', '1860.2'),
(94, 94, '1495', '8', '0', '0', '0', '0', '0', ''),
(95, 186, '1660', '0', '25', '30', '25', '15', '73.0999999', '1733.1'),
(96, 98, '1712', '0', '10', '10', '5', '5', '23.1', '1735.1'),
(97, 119, '1705', '0', '25', '40', '20', '15', '76.9000000', '1781.9'),
(98, 188, '1672', '30', '30', '30', '20', '15', '73.0999999', '1775.1'),
(99, 189, '1557', '8', '30', '45', '25', '15', '88.5', '1653.5'),
(100, 190, '1847', '0', '20', '25', '25', '15', '65.4000000', '1912.4'),
(101, 165, '1556', '12', '25', '10', '5', '2', '32.3', '1600.3'),
(102, 191, '1656', '15', '10', '25', '10', '5', '38.5', '1709.5'),
(103, 110, '1828', '110', '30', '25', '15', '10', '61.5', '1999.5'),
(104, 201, '1537', '0', '20', '25', '25', '2', '55.4', '1592.4'),
(105, 124, '1511', '72', '30', '30', '20', '15', '73.0999999', '1656.1'),
(106, 209, '1695', '30', '25', '25', '25', '5', '61.5', '1786.5'),
(107, 16, '1699', '0', '30', '35', '15', '30', '84.5999999', '1783.6'),
(108, 206, '1666', '0', '10', '20', '10', '5', '34.6', '1700.6'),
(109, 215, '1606', '0', '20', '30', '15', '3', '52.3', '1658.3'),
(110, 214, '1621', '0', '20', '25', '25', '15', '65.4000000', '1686.4'),
(111, 153, '1557', '0', '20', '40', '20', '10', '69.2', '1626.2'),
(112, 4, '1738', '0', '20', '30', '25', '15', '69.2', '1807.2'),
(113, 218, '1883', '70', '30', '45', '15', '30', '92.3', '2045.3'),
(114, 173, '1832', '200', '30', '40', '25', '30', '96.2', '2128.2'),
(115, 207, '1777', '85', '30', '45', '25', '23', '94.5999999', '1956.6'),
(116, 155, '1618', '12', '20', '20', '15', '15', '53.8', '1683.8'),
(117, 61, '1866', '0', '20', '30', '25', '15', '69.2', '1935.2'),
(118, 101, '1691', '0', '20', '30', '25', '15', '69.2', '1760.2'),
(119, 220, '1553', '80', '20', '30', '20', '15', '65.4000000', '1698.4'),
(120, 219, '1468', '57', '0', '0', '0', '0', '0', ''),
(121, 223, '1602', '165', '30', '40', '25', '15', '84.5999999', '1851.6'),
(122, 222, '1740', '0', '25', '25', '10', '20', '61.5', '1801.5'),
(123, 225, '1279.4', '0', '20', '35', '15', '10', '61.5', '1340.9'),
(124, 224, '1562', '0', '25', '30', '20', '15', '69.2', '1631.2'),
(125, 226, '1226.3', '0', '25', '30', '20', '15', '69.2', '1295.5'),
(126, 227, '1461.9', '40', '20', '35', '25', '5', '65.4000000', '1567.3'),
(127, 181, '1516', '0', '30', '40', '15', '5', '69.2', '1585.2'),
(128, 229, '1299.1', '26', '25', '30', '20', '15', '69.2', '1394.3'),
(129, 232, '1698', '0', '25', '40', '20', '10', '73.0999999', '1771.1'),
(130, 68, '1675', '0', '30', '40', '25', '15', '84.5999999', '1759.6'),
(131, 213, '1653', '0', '18', '30', '20', '15', '63.8', '1716.8'),
(132, 123, '1846', '0', '30', '40', '25', '15', '84.5999999', '1930.6'),
(133, 11, '1633', '0', '30', '25', '15', '30', '76.9000000', '1709.9'),
(134, 121, '1572', '0', '30', '40', '20', '25', '88.5', '1660.5'),
(135, 234, '1478', '48', '0', '0', '0', '0', '0', ''),
(136, 236, '1611', '4', '0', '0', '0', '0', '0', ''),
(137, 239, '1511', '30', '0', '0', '0', '0', '0', ''),
(138, 197, '1779', '28', '25', '40', '25', '15', '80.8', '1887.8'),
(139, 238, '1690', '0', '30', '15', '15', '10', '53.8', '1743.8'),
(140, 182, '1547', '165', '25', '40', '25', '15', '80.8', '1777.8'),
(141, 93, '1856', '36', '30', '45', '25', '20', '92.3', '1984.3'),
(142, 196, '1630', '32', '0', '0', '0', '0', '0', ''),
(143, 193, '1808', '0', '20', '35', '15', '5', '57.7', '1865.7'),
(144, 112, '1689', '23', '10', '20', '25', '4', '45.4', '1757.4'),
(145, 135, '1708', '0', '30', '40', '20', '20', '84.5999999', '1792.6'),
(146, 250, '1628', '0', '20', '20', '15', '15', '53.8', '1681.8'),
(147, 217, '1593', '150', '20', '15', '15', '5', '42.3', '1785.3'),
(148, 252, '1672', '0', '0', '0', '0', '0', '0', ''),
(149, 194, '1744', '0', '30', '40', '20', '15', '80.8', '1824.8'),
(150, 183, '1606', '0', '20', '30', '20', '15', '65.4000000', '1671.4'),
(151, 253, '1646', '0', '30', '30', '20', '20', '76.9000000', '1722.9'),
(152, 171, '1717', '0', '30', '40', '20', '20', '84.5999999', '1801.6'),
(153, 254, '1782', '20', '30', '40', '25', '25', '92.3', '1894.3'),
(154, 198, '1873', '0', '30', '40', '20', '15', '80.8', '1953.8'),
(155, 237, '1639', '0', '20', '25', '20', '20', '65.4000000', '1704.4'),
(156, 246, '1561', '0', '20', '40', '20', '15', '73.0999999', '1634.1'),
(157, 260, '1587', '0', '0', '0', '0', '0', '0', ''),
(158, 230, '1607', '0', '25', '25', '10', '10', '53.8', '1660.8'),
(159, 233, '1543', '0', '15', '15', '15', '15', '46.2', '1589.2'),
(160, 164, '1613', '0', '30', '40', '25', '15', '84.5999999', '1697.6'),
(161, 30, '1666', '0', '25', '35', '25', '15', '76.9000000', '1742.9'),
(162, 148, '1455', '0', '0', '0', '0', '0', '0', ''),
(163, 80, '1625', '0', '30', '45', '25', '15', '88.5', '1713.5'),
(164, 122, '1682', '0', '20', '30', '20', '15', '65.4000000', '1747.4'),
(165, 263, '1717', '0', '25', '30', '20', '15', '69.2', '1786.2'),
(166, 268, '1604', '240', '25', '25', '15', '15', '61.5', '1905.5'),
(167, 267, '1172.5', '0', '0', '0', '0', '0', '0', ''),
(168, 266, '1460', '0', '0', '0', '0', '0', '0', ''),
(169, 116, '1515', '0', '0', '0', '0', '0', '0', ''),
(170, 127, '1537', '0', '0', '10', '5', '4', '14.6', '1551.6'),
(171, 272, '1181.5', '0', '20', '40', '20', '10', '69.2', '1250.7'),
(172, 271, '1194.1', '0', '0', '0', '0', '0', '0', ''),
(173, 270, '1691', '0', '15', '30', '20', '10', '57.7', '1748.7'),
(174, 244, '1535', '0', '0', '0', '0', '0', '0', ''),
(175, 275, '1587', '0', '30', '40', '20', '10', '76.9000000', '1663.9'),
(176, 276, '1576', '160', '0', '0', '0', '0', '0', ''),
(177, 277, '1795', '0', '20', '20', '15', '10', '50', '1845'),
(178, 261, '1722', '0', '30', '30', '20', '2', '63.1', '1785.1'),
(179, 55, '1656', '0', '20', '40', '25', '15', '76.9000000', '1732.9'),
(180, 141, '1718', '0', '30', '40', '20', '15', '80.8', '1798.8'),
(181, 273, '1556', '0', '25', '40', '15', '10', '69.2', '1625.2'),
(182, 21, '1785', '0', '25', '20', '15', '15', '57.7', '1842.7'),
(183, 279, '1733', '29', '25', '40', '20', '15', '76.9000000', '1838.9'),
(184, 281, '1737', '0', '25', '45', '25', '10', '80.8', '1817.8'),
(185, 174, '1551', '0', '30', '40', '25', '15', '84.5999999', '1635.6'),
(186, 106, '1731', '0', '25', '30', '20', '15', '69.2', '1800.2'),
(187, 265, '1544', '88', '25', '30', '25', '15', '73.0999999', '1705.1'),
(188, 231, '1635', '0', '15', '20', '15', '10', '46.2', '1681.2'),
(189, 115, '1704', '16', '25', '20', '10', '10', '50', '1770'),
(190, 86, '1609', '0', '30', '30', '20', '10', '69.2', '1678.2'),
(191, 249, '1521', '0', '0', '0', '0', '0', '0', ''),
(192, 162, '1529', '0', '0', '0', '0', '0', '0', ''),
(193, 274, '1717', '0', '25', '30', '20', '15', '69.2', '1786.2'),
(194, 289, '1514', '0', '15', '30', '20', '15', '61.5', '1575.5'),
(195, 65, '1810', '0', '10', '25', '25', '10', '53.8', '1863.8'),
(196, 291, '1564', '0', '25', '20', '15', '5', '50', '1614'),
(197, 128, '1937', '80', '25', '40', '20', '15', '76.9000000', '2093.9'),
(198, 0, '1688', '40', '0', '0', '0', '0', '0', ''),
(199, 293, '1615', '0', '20', '30', '20', '15', '65.4000000', '1680.4'),
(200, 91, '1533', '0', '30', '45', '25', '25', '96.2', '1629.2'),
(201, 133, '1522', '0', '25', '10', '5', '2', '32.3', '1554.3'),
(202, 259, '1838', '60', '25', '45', '25', '15', '84.5999999', '1982.6'),
(203, 297, '1602', '0', '30', '40', '20', '25', '88.5', '1690.5'),
(204, 300, '1567', '12', '30', '40', '25', '20', '88.5', '1667.5'),
(205, 302, '1547', '0', '20', '20', '20', '0', '46.2', '1593.2'),
(206, 294, '1609', '0', '25', '30', '24', '15', '72.3', '1681.3'),
(207, 248, '1579', '0', '30', '40', '25', '30', '96.2', '1675.2'),
(208, 304, '1537', '40', '20', '40', '15', '5', '61.5', '1638.5'),
(209, 296, '1538', '0', '20', '15', '15', '3', '40.8', '1578.8'),
(210, 307, '1544', '60', '20', '40', '25', '30', '88.5', '1692.5'),
(211, 309, '1727', '0', '0', '0', '0', '0', '0', ''),
(212, 311, '1507', '0', '20', '15', '15', '5', '42.3', '1549.3'),
(213, 60, '1550', '0', '30', '35', '20', '15', '76.9000000', '1626.9'),
(214, 247, '1591', '0', '15', '20', '21', '5', '46.9', '1637.9'),
(215, 310, '1569', '0', '0', '0', '0', '0', '0', ''),
(216, 14, '1809', '0', '25', '30', '20', '15', '69.2', '1878.2'),
(217, 71, '1690', '0', '30', '40', '25', '30', '96.2', '1786.2'),
(218, 278, '1963', '0', '0', '0', '0', '0', '0', ''),
(219, 1, '1750', '16', '20', '20', '15', '15', '53.8', '1819.8'),
(220, 298, '1487', '140', '0', '0', '0', '0', '0', ''),
(221, 280, '1764', '44', '30', '40', '20', '20', '84.5999999', '1892.6'),
(222, 285, '1686', '28', '15', '15', '20', '10', '46.2', '1760.2'),
(223, 317, '1566', '140', '20', '40', '25', '30', '88.5', '1794.5'),
(224, 303, '1583', '0', '0', '0', '0', '0', '0', ''),
(225, 208, '1501', '0', '25', '40', '25', '15', '80.8', '1581.8'),
(226, 299, '1506', '0', '20', '25', '15', '2', '47.7', '1553.7'),
(227, 243, '1565', '0', '20', '40', '20', '15', '73.0999999', '1638.1'),
(228, 321, '1623', '0', '25', '20', '15', '10', '53.8', '1676.8'),
(229, 210, '1557', '60', '20', '35', '25', '5', '65.4000000', '1682.4'),
(230, 325, '1657', '16', '20', '30', '20', '15', '65.4000000', '1738.4'),
(231, 176, '1602', '16', '0', '0', '0', '0', '0', ''),
(232, 305, '1552', '0', '0', '0', '0', '0', '0', ''),
(233, 312, '1380.1', '48', '25', '15', '15', '10', '50', '1478.1'),
(234, 331, '1526', '116', '20', '15', '15', '5', '42.3', '1684.3'),
(235, 242, '1642', '0', '25', '40', '23', '20', '83.0999999', '1725.1'),
(236, 333, '1785', '12', '25', '45', '25', '20', '88.5', '1885.5'),
(237, 240, '1851', '140', '30', '25', '15', '5', '57.7', '2048.7'),
(238, 334, '1714', '105', '30', '40', '25', '15', '84.5999999', '1903.6'),
(239, 327, '1680', '0', '0', '0', '0', '0', '0', ''),
(240, 336, '1479', '0', '25', '40', '20', '10', '73.0999999', '1552.1'),
(241, 337, '1491', '44', '25', '40', '25', '15', '80.8', '1615.8'),
(242, 82, '1568', '0', '0', '0', '0', '0', '0', ''),
(243, 283, '1574', '100', '15', '40', '25', '15', '73.0999999', '1747.1'),
(244, 262, '1568', '0', '20', '30', '20', '15', '65.4000000', '1633.4'),
(245, 255, '1751', '92', '30', '40', '25', '20', '88.5', '1931.5'),
(246, 319, '1477', '0', '20', '5', '5', '5', '26.9', '1503.9'),
(247, 326, '1877', '0', '25', '40', '23', '15', '79.2', '1956.2'),
(248, 149, '1538', '0', '25', '20', '15', '15', '57.7', '1595.7'),
(249, 316, '1952', '180', '25', '35', '23', '5', '67.7', '2199.7'),
(250, 74, '1544', '0', '30', '45', '25', '30', '100', '1644'),
(251, 73, '1713', '0', '10', '15', '20', '10', '42.3', '1755.3'),
(252, 318, '1627', '0', '0', '0', '0', '0', '0', ''),
(253, 138, '1504', '156', '25', '40', '20', '15', '76.9000000', '1736.9'),
(254, 108, '1586', '0', '15', '15', '15', '10', '42.3', '1628.3'),
(255, 221, '1841', '12', '25', '40', '25', '15', '80.8', '1933.8'),
(256, 111, '1537', '0', '25', '40', '25', '30', '92.3', '1629.3'),
(257, 301, '1559', '12', '20', '40', '20', '10', '69.2', '1640.2'),
(258, 335, '1842', '0', '30', '40', '25', '15', '84.5999999', '1926.6'),
(259, 241, '1585', '0', '30', '40', '25', '20', '88.5', '1673.5'),
(260, 344, '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_data_ortu`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_data_ortu` (
  `reg_data_ortu_id` int(11) NOT NULL,
  `reg_data_ortu_reg_akun_id` int(11) NOT NULL,
  `reg_data_ortu_nama` varchar(50) NOT NULL,
  `reg_data_ortu_tempat_lahir` varchar(50) NOT NULL,
  `reg_data_ortu_tgl_lahir` varchar(20) NOT NULL,
  `reg_data_ortu_alamat` varchar(150) NOT NULL,
  `reg_data_ortu_alamat_kota_id` int(11) NOT NULL,
  `reg_data_ortu_alamat_propinsi_id` int(11) NOT NULL,
  `reg_data_ortu_no_telepon` varchar(15) NOT NULL,
  `reg_data_ortu_agama_id` int(11) NOT NULL,
  `reg_data_ortu_pendidikan_id` int(11) NOT NULL,
  `reg_data_ortu_pekerjaan_id` int(11) NOT NULL,
  `reg_data_ortu_penghasilan` varchar(50) NOT NULL,
  `reg_data_ortu_ind` varchar(1) NOT NULL,
  `reg_data_ortu_no_nik` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=784 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_data_ortu`
--

INSERT INTO `tbl_reg_data_ortu` (`reg_data_ortu_id`, `reg_data_ortu_reg_akun_id`, `reg_data_ortu_nama`, `reg_data_ortu_tempat_lahir`, `reg_data_ortu_tgl_lahir`, `reg_data_ortu_alamat`, `reg_data_ortu_alamat_kota_id`, `reg_data_ortu_alamat_propinsi_id`, `reg_data_ortu_no_telepon`, `reg_data_ortu_agama_id`, `reg_data_ortu_pendidikan_id`, `reg_data_ortu_pekerjaan_id`, `reg_data_ortu_penghasilan`, `reg_data_ortu_ind`, `reg_data_ortu_no_nik`) VALUES
(1, 2, 'WARTO', 'NGANJUK', '12-03-1973', '', 0, 0, '081351609821', 1, 1, 6, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091203730002'),
(2, 2, 'SITI JULAIKAH', 'NGANJUK', '06-02-1978', '', 0, 0, '081351609821', 1, 2, 6, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094602780001'),
(3, 2, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(4, 13, 'SUGIJATNO', 'SURAKARTA', '', '', 0, 0, '081349485049', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011805680001'),
(5, 13, 'NOVITA RINI', 'BANJARMASIN', '17-05-1980', '', 0, 0, '081347682330', 1, 3, 12, '', 'I', '6310015705800001'),
(6, 13, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(7, 17, 'SYAHRIL', 'KOTABARU', '20-10-1970', '', 0, 0, '085349177888', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092010700002'),
(8, 17, 'RULLIYANA', 'BANJARMASIN', '30-04-1978', '', 0, 0, '082149663838', 2, 3, 12, '', 'I', '6310097004780002'),
(9, 17, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(10, 15, 'BANGUN SILABAN', 'MEDAN', '20-12-1964', '', 0, 0, '08115417970', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092012640003'),
(11, 15, 'PONIMAH', 'KOTA BARU', '25-09-1976', '', 0, 0, '082154269989', 1, 3, 12, '', 'I', '6310096509760003'),
(12, 15, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(13, 20, 'NASRUDDIN', 'PAGATAN', '23-03-1975', '', 0, 0, '085346634949', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092303750003'),
(14, 20, 'SALBIAH', 'PAGATAN', '08-08-1981', '', 0, 0, '085252811952', 1, 3, 12, '', 'I', '6310094808810008'),
(15, 20, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(16, 18, 'CASMADIE', 'CIREBON', '16-04-1969', '', 0, 0, '081391455391', 1, 5, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011604690001'),
(17, 18, 'ANIK SOFIATI', 'MALANG', '07-05-1973', '', 0, 0, '082154424482', 1, 3, 12, '', 'I', '6310014705730002'),
(18, 18, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(19, 9, 'SAIPUL ANWAR', 'KURANJI', '02-11-1979', '', 0, 0, '082159661144', 1, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010211790002'),
(20, 9, 'SITI PATIMAH', 'PAGATAN', '05-01-1980', '', 0, 0, '085251044084', 1, 3, 12, '', 'I', '6310014501800004'),
(21, 9, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(22, 3, 'ABDUL HALIM', 'THAIBAH RAYA', '01-08-1970', '', 0, 0, '085387486428', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090108700003'),
(23, 3, 'ERNAWATI', 'TABALONG', '03-08-1977', '', 0, 0, '082153447385', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310094308770003'),
(24, 3, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(25, 29, 'JOKO EDY DARSONO', 'BLITAR', '30-05-1965', '', 0, 0, '081348240800', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310093005650003'),
(26, 29, 'YULI SULASTRI', 'BLITAR', '07-07-1971', '', 0, 0, '081251190625', 1, 2, 12, '', 'I', '6310094707710004'),
(27, 29, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(28, 31, 'ALEXANDER MR, AMK', 'MAKASSAR', '12-05-1981', '', 0, 0, '085273823444', 3, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310101205810004'),
(29, 31, 'NORMA YUNITA', 'MAKASSAR', '07-06-1987', '', 0, 0, '081253110868', 3, 3, 15, '', 'I', '6310104706870001'),
(30, 31, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(31, 25, 'PATJERI', 'KOTA BARU', '21-11-1976', '', 0, 0, '081348000700', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6302062111760001'),
(32, 25, 'SITI HADIJAH', 'KOTA BARU', '06-06-1975', '', 0, 0, '085350075666', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6302064606750003'),
(33, 25, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(34, 26, 'ISKANDAR', 'SUNGAI DURIAN', '08-03-1982', '', 0, 0, '085349009665', 1, 2, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090803820005'),
(35, 26, 'NOVA HAP SARI', 'TARAKAN', '03-12-1983', '', 0, 0, '082256595631', 1, 3, 12, '', 'I', '6310094312830008'),
(36, 26, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(37, 32, 'GUSTI MISBAH', 'KOTABARU', '31-01-1965', '', 0, 0, '082154123765', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310013101650001'),
(38, 32, 'FAJRINA', 'LONTAR', '06-05-1982', '', 0, 0, '085250282331', 1, 2, 12, '', 'I', '6310014605820002'),
(39, 32, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(40, 5, 'ARIYADI', 'KOTABARU', '21-01-1973', '', 0, 0, '082353287090', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310092101730005'),
(41, 5, 'ERNAWATI', 'KOTABARU', '05-05-1983', '', 0, 0, '081254522950', 1, 2, 12, '', 'I', '6310094505830018'),
(42, 5, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(43, 41, 'SUPRIANTO', 'SIDOARJO', '16-06-1970', '', 0, 0, '08125191137', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310091606700003'),
(44, 41, 'NUR HASANAH', 'KOTABARU', '04-09-1977', '', 0, 0, '081333913554', 1, 3, 6, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094409770006'),
(45, 41, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(46, 62, 'SUHARTONO', 'REMBANG', '10-03-1969', '', 0, 0, '0811510321', 1, 7, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302061003690002'),
(47, 62, 'ANDI MEGABAKTI', 'SOPPENG', '07-10-1968', '', 0, 0, '081251334369', 1, 7, 12, '', 'I', '6302064710680002'),
(48, 62, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(49, 58, 'SARJONO', 'BLITAR', '02-04-1973', '', 0, 0, '082148852537', 1, 3, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090204730004'),
(50, 58, 'YENI SEKTI NINGRUMA', 'BLITAR', '08-06-1981', '', 0, 0, '082357028512', 1, 3, 8, '', 'I', '6310094806810004'),
(51, 58, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(52, 70, 'ANDI HAMKA', 'MAKASSAR', '25-12-1977', '', 0, 0, '085332871555', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310012510770002'),
(53, 70, 'IRDHA', 'MAKASSAR', '20-11-1978', '', 0, 0, '082353334694', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310016011780002'),
(54, 70, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(55, 72, 'ZAINUDDIN', 'PAGATAN', '15-04-1977', '', 0, 0, '081349310977', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011504770001'),
(56, 72, 'SALMIAH', 'PAGATAN', '20-06-1981', '', 0, 0, '085348382768', 1, 2, 12, '', 'I', '6310016006810001'),
(57, 72, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(58, 40, 'A.SURYADI', 'KOTA BARU', '21-09-1976', '', 0, 0, '085248044390', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6372032109760001'),
(59, 40, 'MARLINA', 'SIMPANG EMPAT', '20-07-1982', '', 0, 0, '085249736345', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6372036007820003'),
(60, 40, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(61, 75, 'MURJANI', 'RANTAU', '05-06-1978', '', 0, 0, '081253976222', 1, 3, 16, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090506780009'),
(62, 75, 'RISA SUSANTI', 'SUNGAI BULUH', '14-07-1982', '', 0, 0, '081347490549', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310095407820004'),
(63, 75, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(64, 38, 'JAMALUDDIN', 'PAGATAN', '12-07-1977', '', 0, 0, '081348345551', 1, 1, 15, 'RP. 500.000 - RP. 999.999', 'A', '6310011207770001'),
(65, 38, 'KONIATUN ', 'PURWOREJO', '08-08-1978', '', 0, 0, '082351437535', 1, 1, 17, '', 'I', '6310015808780001'),
(66, 38, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(67, 42, 'MARULI TUA MEHA', 'TAPANULI', '15-07-1966', '', 0, 0, '085349041453', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011507660002'),
(68, 42, 'SUMBER AGUS TUTI', 'KOTA BARU', '05-08-1970', '', 0, 0, '085246614500', 1, 3, 12, '', 'I', '6310014508700002'),
(69, 42, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(70, 34, 'BURHANUDDIN', 'PAGATAN', '18-08-1973', '', 0, 0, '081348119258', 1, 2, 17, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011808730001'),
(71, 34, 'SALBIAH', 'SEGUMBANG ', '10-09-1979', '', 0, 0, '081380627823', 1, 1, 16, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310015009790001'),
(72, 34, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(73, 49, 'JUMADI DEDI ISMANTO', 'BONE', '08-08-1972', '', 0, 0, '085247317772', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310010808720002'),
(74, 49, 'SARINAH', 'PAGATAN', '26-09-1970', '', 0, 0, '085251717391', 1, 3, 0, '', 'I', '6310016609700001'),
(75, 49, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(76, 67, 'SANURI', 'BANYUWANGI', '14-07-1966', '', 0, 0, '081348924595', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091407660003'),
(77, 67, 'SUSIAMI', 'BLITAR', '24-07-1973', '', 0, 0, '081348542655', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310095407730007'),
(78, 67, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(79, 85, 'HARRY', 'SEPUNGGUR', '25-08-1963', '', 0, 0, '081259717548', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310012508630001'),
(80, 85, 'YAROH', 'TULUNGAGUNG', '25-03-1967', '', 0, 0, '082156548047', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310016503670001'),
(81, 85, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(82, 69, 'ARI WIBOWO', 'BANJARMASIN', '10-08-1979', '', 0, 0, '081348464646', 2, 4, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091008790006'),
(83, 69, 'MARIA MAYA SAMPURNA DEWI', 'YOGYAKARTA', '30-03-1981', '', 0, 0, '081349556777', 3, 6, 12, '', 'I', '6310097003810002'),
(84, 69, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(85, 88, 'ANDI ANSAR SILARAKA (ALM)', 'SINJAI', '20-03-1971', '', 0, 0, '', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '-'),
(86, 88, 'RAYA', 'BATULICIN', '08-03-1968', '', 0, 0, '085251114260', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310014803680001'),
(87, 88, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(88, 36, 'SARI PARDAL', 'PAGATAN', '09-09-1974', '', 0, 0, '082148881100', 1, 7, 15, 'RP. 500.000 - RP. 999.999', 'A', '6310090909740003'),
(89, 36, 'RINI ISWATI', 'YOGYAKARTA', '07-08-1982', '', 0, 0, '082151956550', 1, 4, 15, 'KURANG DARI RP. 500.000', 'I', '6310094708820004'),
(90, 36, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(91, 89, 'SAMSUDIN', 'BANJARMASIN', '29-12-1975', '', 0, 0, '085251763393', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092912750001'),
(92, 89, 'WAHYU ASIH RIDHONI', 'BANJARBARU', '16-03-1987', '', 0, 0, '08136900142', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310095603820003'),
(93, 89, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(94, 84, 'MAGE', 'MAKASSAR', '11-03-1969', '', 0, 0, '085345684260', 1, 1, 2, 'KURANG DARI RP. 500.000', 'A', '6310011103690001'),
(95, 84, 'KARLINAH', 'BATULICIN', '17-07-1969', '', 0, 0, '085345684260', 1, 1, 12, '', 'I', '6310015707690001'),
(96, 84, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(97, 103, 'NGASERIN', 'LAMONGAN', '04-11-1972', '', 0, 0, '081348315635', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090411720005'),
(98, 103, 'ASNANIK', 'LAMONGAN', '07-01-1979', '', 0, 0, '', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310094701790002'),
(99, 103, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(100, 87, ' YUSUP MAHRUDIN ALM', '-', '', '', 0, 0, '-', 1, 3, 0, '', 'A', '-'),
(101, 87, 'AYU YUNAMAH', 'SUBANG', '', '', 0, 0, '', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', ''),
(102, 87, 'NAWARI', 'BUNTOK', '10-10-1967', '', 0, 0, '082155118787', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'W', '6310091010670016'),
(103, 90, 'SHALEHUDDIN', 'PAGATAN', '10-04-1975', '', 0, 0, '082154017999', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091004750008'),
(104, 90, 'MARDIANA', 'SAMARINDA', '12-04-1977', '', 0, 0, '082153017999', 1, 1, 17, 'KURANG DARI RP. 500.000', 'I', '6310095204770004'),
(105, 90, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(106, 104, 'SUPRIADI', 'LAMONGAN', '26-06-1972', '', 0, 0, '085251229664', 1, 2, 2, 'RP. 500.000 - RP. 999.999', 'A', '6310092606720010'),
(107, 104, 'TUPLIK WULANDARI', 'LUMAJANG', '10-04-1978', '', 0, 0, '085251229664', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310095004780009'),
(108, 104, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(109, 99, 'YUDI ANDRIANOR', 'BANJARMASIN', '23-10-1974', '', 0, 0, '', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310013004740003'),
(110, 99, 'NURUL SUTAMI', 'BATULICIN', '11-12-1974', '', 0, 0, '085249298213', 1, 7, 17, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310015112740002'),
(111, 99, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(112, 43, 'EDISON', 'PADANG', '04-03-1970', '', 0, 0, '081348179586', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6302190403700002'),
(113, 43, 'FATMAWATI', 'PEKANBARU', '26-02-1970', '', 0, 0, '082299919920', 1, 3, 12, '', 'I', '6302190002700002'),
(114, 43, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(115, 50, 'ANDI NURTAMING', 'SINJAI', '30-12-1974', '', 0, 0, '085345844695', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310013012740002'),
(116, 50, 'ANDI SITI NUR LAILATUL ADHA', 'BATULICIN', '28-08-1980', '', 0, 0, '+6281348852285', 1, 2, 12, '', 'I', '6310016008800002'),
(117, 50, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(118, 109, 'NANANG RUHIYAT', 'KOTA GAJAH', '10-08-1976', '', 0, 0, '085249750790', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091008760007'),
(119, 109, 'NANING', 'CEPU', '29-09-1978', '', 0, 0, '085251040503', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310096909780004'),
(120, 109, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(121, 113, 'TUMIJO', 'NGANJUK', '15-05-1968', '', 0, 0, '081334639714', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310061505680002'),
(122, 113, 'WIJIATI', 'MALANG', '28-07-1978', '', 0, 0, '085386119296', 1, 3, 12, '', 'I', '6310066807780001'),
(123, 113, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(124, 117, 'ATMADIAN', 'KOTABARU', '28-06-1973', '', 0, 0, '081348215445', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092806730003'),
(125, 117, 'DYAH NABIDATUL KHASANAH,S.PD', 'KOTABARU', '20-05-1982', '', 0, 0, '081348255799', 1, 7, 17, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310096005820003'),
(126, 117, 'ATMADIAN ', 'KOTABARU', '28-06-1973', '', 0, 0, '081348215445', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6310092806730003'),
(127, 19, 'ADI WARSITO ', 'KEDIRI', '14-03-1968', '', 0, 0, '08125015824', 2, 3, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310091403680006'),
(128, 19, 'PRISKILA RONI WURYANINGRUM', 'KEDIRI', '12-02-1970', '', 0, 0, '081348179482', 2, 3, 12, '', 'I', '6310095202700010'),
(129, 19, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(130, 7, 'SUDARMAN', 'BANYUWANGI', '04-04-1969', '', 0, 0, '08125004917', 1, 8, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', ''),
(131, 7, 'LIESDYA WIDYASTUTI', 'TANJUNG', '29-09-1974', '', 0, 0, '081236959499', 1, 3, 12, '', 'I', ''),
(132, 7, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(133, 10, 'HASANUDDIN', 'RANTAU', '08-04-1962', '', 0, 0, '-', 1, 5, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010805620001'),
(134, 10, 'AHDIANA', 'MAHANG PUTAT', '05-11-1970', '', 0, 0, '085248001515', 1, 2, 12, '', 'I', '6310014511700002'),
(135, 10, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(136, 8, 'IBRAHIM', 'KERSIK PUTIH', '02-03-1975', '', 0, 0, '081351766558', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010203750005'),
(137, 8, 'RATNA', 'KERSIK PUTIH', '25-05-1983', '', 0, 0, '-', 1, 2, 17, 'KURANG DARI RP. 500.000', 'I', '6310016505830001'),
(138, 8, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(139, 35, 'AMRULLAH', 'SEGUMBANG', '08-08-1971', '', 0, 0, '082150760333', 1, 1, 3, 'RP. 500.000 - RP. 999.999', 'A', '6310012308710002'),
(140, 35, 'DARSIAH', 'BATULICIN', '12-07-1972', '', 0, 0, '-', 1, 2, 0, '', 'I', '-'),
(141, 35, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(142, 125, 'MIFTAKHUL HUDA', 'KEDIRI', '05-03-1965', '', 0, 0, '081349405870', 1, 2, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090503650004'),
(143, 125, 'LILIK MUNADIROH', 'JOMBANG', '12-04-1974', '', 0, 0, '081267722608', 1, 3, 12, '', 'I', '6310095204740006'),
(144, 125, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(145, 44, 'MAHMUD SUMALI', 'KEDIRI', '14-03-1964', '', 0, 0, '085248246688', 1, 2, 8, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310101403640001'),
(146, 44, 'SUMINEM S.PD AUD', 'NGAWI', '17-04-1972', '', 0, 0, '081351656660', 1, 7, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310105704720001'),
(147, 44, 'ZAINAL ABIDIN ', '', '', '', 0, 0, '082151528658', 1, 6, 10, 'RP. 2.000.000 - RP. 4.999.999', 'W', ''),
(148, 66, 'H.SURIANSYAH H.SALEH', 'SUNGAI KECIL', '14-07-1965', '', 0, 0, '081392157777', 1, 3, 15, 'RP. 500.000 - RP. 999.999', 'A', '6310091407650001'),
(149, 66, 'HJ.ARBAINAH', 'BATULICIN', '14-08-1966', '', 0, 0, '081348256499', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310095408660006'),
(150, 66, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(151, 126, 'MIRSOD. SP', 'LOMBOK BARAT', '31-12-1961', '', 0, 0, '085245123409', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310093112610011'),
(152, 126, 'MASPAH. S. PD', 'BERANGAS', '10-10-1968', '', 0, 0, '085348210251', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095010680003'),
(153, 126, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(154, 134, '-', '', '', '', 0, 0, '-', 0, 0, 0, '', 'A', '-'),
(155, 134, 'NORAIDAH', 'PUDI', '08-07-1964', '', 0, 0, '085345654152', 1, 2, 17, 'RP. 500.000 - RP. 999.999', 'I', '6310094807640005'),
(156, 134, 'KHAIRUDDIN', 'BATULICIN', '30-06-1991', '', 0, 0, '-', 1, 3, 16, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310093006910005'),
(157, 114, 'KHAIRUL HAKIM', 'BANJARMASIN', '05-01-1968', '', 0, 0, '085251418245', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090501680006'),
(158, 114, 'MASKANAH', 'PELAIHARI', '24-09-1969', '', 0, 0, '085251418245', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096409690001'),
(159, 114, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(160, 28, 'DRS. H. ABDUL THALIB, MM', 'SAMARINDA', '12-10-1959', '', 0, 0, '085845630989', 1, 8, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6402061210590004'),
(161, 28, 'JUMANTAN', 'SAMARINDA', '16-08-1965', '', 0, 0, '081347410309', 1, 1, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6402065608650006'),
(162, 28, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(163, 102, 'PARYADI', 'SUKOHARJO', '28-10-1977', '', 0, 0, '081348305075', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092810770006'),
(164, 102, 'SITI SADINAH', 'SUKOHARJO', '23-05-1980', '', 0, 0, '081349492566', 1, 3, 12, '', 'I', '6310096305800003'),
(165, 102, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(166, 78, 'MEIDIANSYAH', '', '', '', 0, 0, '', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', ''),
(167, 78, 'NOOR LAILA', 'PANGKALANGBUN', '15-06-1974', '', 0, 0, '085251336333', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310095506740008'),
(168, 78, 'UMI KALSUM', '', '29-03-1954', '', 0, 0, '081349488820', 1, 1, 12, 'KURANG DARI RP. 500.000', 'W', ''),
(169, 137, 'JAPAR', 'KENDAL', '05-12-1962', '', 0, 0, '082298306841', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310080512620001'),
(170, 137, 'MUJIATI', 'KENDAL', '02-06-1964', '', 0, 0, '', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310084206640001'),
(171, 137, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(172, 81, 'AMING ', 'KOTABARU', '05-09-1980', '', 0, 0, '081351290244', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010506800001'),
(173, 81, 'JUHAIRIAH LATIFAH', 'BARABAI', '27-07-1985', '', 0, 0, '082250212356', 1, 2, 12, '', 'I', '6310016707850005'),
(174, 81, 'HAIRUL ANWAR', 'KOTABARU', '05-06-1980', '', 0, 0, '081351290244', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310010506800001'),
(175, 143, 'EDI SULISTIYONO', 'NGAWI', '24-06-1969', '', 0, 0, '085246772466', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092406690003'),
(176, 143, 'SUHARTI', 'NGAWI', '16-07-1979', '', 0, 0, '081351926995', 1, 3, 0, '', 'I', '6310095607790008'),
(177, 143, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(178, 139, 'EDY PURNOMO', 'TULUNGAGUNG', '23-07-1972', '', 0, 0, '081251775613', 1, 5, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092307720005'),
(179, 139, 'LULUK INDRA SUSANA', 'TULUNGAGUNG', '08-02-1973', '', 0, 0, '081234035315', 1, 3, 12, '', 'I', '6310094802730002'),
(180, 139, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(181, 142, 'MAHDIN', 'BATULICIN', '06-10-1972', '', 0, 0, '085246993779', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010910720001'),
(182, 142, 'FITRIAWATY', 'KOTABARU', '26-07-1979', '', 0, 0, '085386018229', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310016607790001'),
(183, 142, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(184, 22, 'SIHAR SIMANJUNTAK', 'BELAWAN', '04-09-1964', '', 0, 0, '-', 2, 3, 6, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090409640001'),
(185, 22, 'YULIATI', 'BULUH KUNING', '08-05-1973', '', 0, 0, '082254240947', 2, 2, 6, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094805730002'),
(186, 22, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(187, 145, 'SUHARDI', 'PAGATAN', '05-12-1974', '', 0, 0, '081348993633', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090512740005'),
(188, 145, 'NORHAYANI', 'PAGATAN', '14-08-1983', '', 0, 0, '085251892227', 1, 1, 12, '', 'I', '6310095408830006'),
(189, 145, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(190, 140, 'ABDUL HARIS', 'BALUSU', '12-10-1968', '', 0, 0, '085251881140', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091210680005'),
(191, 140, 'IDA LAELA', 'SUMENEP', '11-11-1970', '', 0, 0, '081351566540', 1, 7, 12, '', 'I', '6310095111700006'),
(192, 140, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(193, 150, 'MAHMUDDIN.CE', 'BALIK PAPAN', '17-05-1960', '', 0, 0, '085391711819', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302061705600002'),
(194, 150, 'RATNA', 'PALANGKA RAYA', '12-01-1979', '', 0, 0, '085751129274', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6302065201790006'),
(195, 150, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(196, 146, 'YATIMIN', 'AMBARAWA', '06-10-1972', '', 0, 0, '', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310080610720001'),
(197, 146, 'FAUZIAH', 'BANJARMASIN', '07-01-1971', '', 0, 0, '085389645245', 1, 2, 12, '', 'I', '6310084701710001'),
(198, 146, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(199, 131, 'RIYANTO', 'PALEMBANG', '11-07-1977', '', 0, 0, '081348597961', 1, 2, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310081107770001'),
(200, 131, 'SITI ROCHAYATI', 'KENDAL', '18-11-1975', '', 0, 0, '085349839788', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310085811750001'),
(201, 131, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(202, 147, 'JASERI', 'TULUNGAGUNG', '14-03-1963', '', 0, 0, '081952014133', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310081403630002'),
(203, 147, 'SITI MASFUFAH', 'TULUNG AGUNG', '11-09-1970', '', 0, 0, '087817151045', 1, 3, 12, '', 'I', '631008510970001'),
(204, 147, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(205, 132, 'DAUD SITUMEANG', 'TARUTUNG', '12-12-1966', '', 0, 0, '081348713695', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302061212660007'),
(206, 132, 'SANTI MELVA SERASI HUTABARAT', 'TARUTUNG', '27-05-1978', '', 0, 0, '081251523889', 2, 3, 12, '', 'I', ''),
(207, 132, 'DAUD SITUMEANG', 'TARUTUNG', '07-12-1966', '', 0, 0, '081251523889', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6302061212660007'),
(208, 154, 'HERYANTO', 'LAHAT', '26-01-1970', '', 0, 0, '081351592123', 1, 7, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310012601700001'),
(209, 154, 'IRVIANTI', 'BANJARMASIN', '01-01-1978', '', 0, 0, '081351592133', 1, 7, 12, '', 'I', '6310014101780001'),
(210, 154, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(211, 39, 'JAINTA SITUMORANG', 'PEMATANG SIANTAR', '16-06-1966', '', 0, 0, '085705285948', 2, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6104031606660003'),
(212, 39, 'DAHLIA', 'BANGKALAAN DAYAK', '07-04-1974', '', 0, 0, '085332830777', 2, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6302084704790002'),
(213, 39, 'ARIS BAGINDO', 'SRAGEN', '12-02-1966', '', 0, 0, '081351366672', 2, 7, 15, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6310091202660008'),
(214, 161, 'GUSTI ERVAN YAMIN', 'KOTABARU', '16-06-1972', '', 0, 0, '082156765732', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310011606720001'),
(215, 161, 'SUFIA MINI', 'KOTABARU', '09-10-1976', '', 0, 0, '081250113347', 1, 5, 12, 'KURANG DARI RP. 500.000', 'I', '6310014910760001'),
(216, 161, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(217, 166, 'M. RIDUANI', 'BANJARMASIN', '04-07-1970', '', 0, 0, '081349646227', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090407700004'),
(218, 166, 'JAMILAH', 'TAMBAN RAYA', '21-02-1971', '', 0, 0, '081348159248', 1, 3, 12, '', 'I', '6310096102710002'),
(219, 166, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(220, 63, 'BISRI', 'KENDAL', '11-11-1971', '', 0, 0, '081349509898', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310081111710001'),
(221, 63, 'PARSIH', 'BLORA', '20-08-1977', '', 0, 0, '082153578003', 1, 1, 17, '', 'I', '6310086008770002'),
(222, 63, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(223, 100, 'MUHAJIRIN', 'WONOSOBO', '22-02-1974', '', 0, 0, '085348335005', 1, 1, 8, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310102202740002'),
(224, 100, 'SAMINI', 'BOYOLALI', '18-02-1977', '', 0, 0, '085753127189', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310105802770001'),
(225, 100, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(226, 167, 'HERMANSYAH', 'BANJARMASIN', '16-06-1968', '', 0, 0, '081349519092', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091606680004'),
(227, 167, 'WAHDINI', 'BANJARMASIN', '05-01-1970', '', 0, 0, '081351317475', 1, 3, 12, '', 'I', '6310094501700006'),
(228, 167, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(229, 169, 'ZAINUDDIN', 'PAGATAN', '15-12-1972', '', 0, 0, '085248904244', 1, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091512720002'),
(230, 169, 'HUSNIARNI', 'PAGATAN', '04-11-1973', '', 0, 0, '085248298349', 1, 1, 17, '', 'I', '6310094411730006'),
(231, 169, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(232, 170, 'AMIRUDDIN', 'PALLAMEANG', '01-12-1975', '', 0, 0, '085390280372', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010112750003'),
(233, 170, 'MASTURA', 'PALLAMEANG', '07-07-1977', '', 0, 0, '', 1, 1, 12, '', 'I', '6310014707770001'),
(234, 170, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(235, 97, 'MULYADI, S. AG', 'KOTABARU', '03-03-1973', '', 0, 0, '085251747474', 1, 7, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6371020303730017'),
(236, 97, 'IRPINA ROESITA', 'HARUYAN', '29-10-1975', '', 0, 0, '081262118968', 1, 6, 10, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6371026910750007'),
(237, 97, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(238, 6, 'EVAN ROVIYAN', 'KOTABARU', '20-09-1974', '', 0, 0, '085845644599', 1, 3, 17, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092009740005'),
(239, 6, 'SYARIFAH HERLISAWATI, MM', 'KOTABARU', '18-01-1976', '', 0, 0, '085348742671', 1, 8, 10, 'RP. 5.000.000 - RP. 20.000.000', 'I', '6310095801760002'),
(240, 6, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(241, 83, 'NAIM', 'BULUKUMBA', '26-12-1964', '', 0, 0, '081349577795', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310012612640001'),
(242, 83, 'SANDORA', 'MENTOK', '24-11-1970', '', 0, 0, '081351649234', 1, 1, 17, '', 'I', '6310016411700001'),
(243, 83, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(244, 172, 'AMSORI (ALM)', 'BLITAR', '17-08-1954', '', 0, 0, '', 1, 3, 12, '', 'A', '-'),
(245, 172, 'ANITA TRISTAYANI', 'KOTABARU', '25-12-1970', '', 0, 0, '082152860055', 1, 2, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310096512700004'),
(246, 172, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(247, 175, 'PAHRUROJI', 'MALI-MALI', '20-04-1969', '', 0, 0, '081349685830', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092004690002'),
(248, 175, 'ELLY SURYANI', 'KARANG BINTANG', '19-10-1978', '', 0, 0, '085248096107', 1, 3, 12, '', 'I', '6310095910780002'),
(249, 175, 'MUHAMMAD ADITYA RULIANSYAH', 'KARANG BINTANG', '06-10-1995', '', 0, 0, '085248096107', 1, 3, 0, '', 'W', '6310090610950002'),
(250, 120, 'MARDIANNUR, S.SOS', 'SAMPIT', '15-09-1975', '', 0, 0, '085246552315', 1, 7, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091509750002'),
(251, 120, 'SITTA HERMIYATI, S.PD', 'MARTAPURA', '17-12-1977', '', 0, 0, '085248159617', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095712770002'),
(252, 120, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(253, 177, 'PADLI WAHID', 'KAMPUNG BARU', '03-12-1971', '', 0, 0, '081351858261', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090312710005'),
(254, 177, 'HJ. SUNARTI', 'PANGKEP', '10-11-1971', '', 0, 0, '', 1, 1, 12, '', 'I', '6310095011710006'),
(255, 177, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(256, 178, 'SAKKA', 'SULAWESI SELATAN', '10-11-1971', '', 0, 0, '085251377733', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091011710007'),
(257, 178, 'HAMDIAH', 'PAGATAN', '10-04-1974', '', 0, 0, '085249902371', 1, 1, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310095004740002'),
(258, 178, 'NUR AISYAH, S.PD.I', 'PAGATAN', '02-02-1985', '', 0, 0, '085345777885', 1, 7, 3, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310094202850003'),
(259, 179, 'HUSIN', 'PAGATAN', '05-07-1980', '', 0, 0, '085245456969', 1, 2, 15, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090507800003'),
(260, 179, 'ASMANIAH', 'BATAKAN', '30-07-1983', '', 0, 0, '085348623486', 1, 1, 12, '', 'I', '6310097007830002'),
(261, 179, 'NUR AISYAH, S.PD.I', 'PAGATAN', '02-02-1985', '', 0, 0, '085345777885', 1, 7, 3, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310094202850003'),
(262, 47, 'ASRAFNOR', 'PELAIHARI', '10-06-1974', '', 0, 0, '0811500767', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310061006740001'),
(263, 47, 'VIVIN YULIANA ', 'BLITAR', '03-07-1979', '', 0, 0, '085280039274', 1, 3, 12, '', 'I', '6310064307790002'),
(264, 47, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(265, 180, 'MUHAMMAD DIRMAN FARISIAN SINAGA', 'P. SIANTAR ', '02-06-1970', '', 0, 0, '081348377299', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090206700006'),
(266, 180, 'HASNAH RIYANTI', 'BANJARMASIN', '13-02-1972', '', 0, 0, '081348221588', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095302720007'),
(267, 180, 'M. DIRMAN F. SINAGA', 'P. SIANTAR', '02-06-1970', '', 0, 0, '081348377299', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310090206700006'),
(268, 184, 'SUPARMAN', 'MAGETAN', '16-02-1968', '', 0, 0, '0812 5416 5544', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091602680002'),
(269, 184, 'RINI SUSILAWATI', 'KOTABARU', '25-05-1978', '', 0, 0, '-', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310096505780005'),
(270, 184, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(271, 130, 'SUPRIYANTO', 'KOTABARU', '30-10-1977', '', 0, 0, '081351061143', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310083010770002'),
(272, 130, 'DA ATI', 'BATANG', '23-03-1982', '', 0, 0, '085822065893', 1, 2, 6, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310086303820003'),
(273, 130, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(274, 185, 'HURMANSYAH', 'SARI GADUNG', '31-12-1971', '', 0, 0, '085390283611', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310013112710001'),
(275, 185, 'RUSDIANA', 'BATULICIN', '03-03-1973', '', 0, 0, '085390283611', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310014303730002'),
(276, 185, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(277, 23, 'ABDUL MATTA', 'BARRU', '05-10-1969', '', 0, 0, '082153226999', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090510890007'),
(278, 23, 'ARBAINAH', 'KAMPUNG BARU', '28-02-1971', '', 0, 0, '085349245528', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310096802710003'),
(279, 23, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(280, 94, 'SUNARYO', 'BANYUWANGI', '25-02-1978', '', 0, 0, '085245839981', 1, 3, 8, 'RP. 500.000 - RP. 999.999', 'A', '631008250278001'),
(281, 94, 'SRI KOMAH', 'HARAPAN MAJU', '21-12-1982', '', 0, 0, '081251730621', 1, 3, 17, 'RP. 500.000 - RP. 999.999', 'I', '6310086112820003'),
(282, 94, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(283, 186, 'SYAFRUDDIN', 'PAGATAN', '06-04-1970', '', 0, 0, '081253939128', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010604700001'),
(284, 186, 'NORMATASIAH', 'PAGATAN', '16-10-1975', '', 0, 0, '081253939128', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310015610750001'),
(285, 186, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(286, 98, 'HENDRA PURBA', '', '', '', 0, 0, '', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', ''),
(287, 98, 'LISNAWATI', 'KOTABARU', '14-07-1979', '', 0, 0, '085245819645', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095407790008'),
(288, 98, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(289, 119, 'ASNAWI', 'RANTAU', '05-07-1966', '', 0, 0, '081348144609', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090507660006'),
(290, 119, 'FATONAH', 'CILACAP', '15-10-1980', '', 0, 0, '081348144609', 1, 7, 10, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310095510800004'),
(291, 119, 'FATONAH', 'CILACAP', '15-10-1980', '', 0, 0, '081348144609', 1, 7, 10, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310095510800004'),
(292, 188, 'ABDUL FAISAL ', 'BONE', '04-07-1966', '', 0, 0, '', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010507660003'),
(293, 188, 'HASMIATI', 'BONE', '04-09-1967', '', 0, 0, '', 1, 3, 12, '', 'I', '6310014509670001'),
(294, 188, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(295, 189, 'ACHYAR', 'RANTAU PANJANG', '09-06-1968', '', 0, 0, '081348624151', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090906680003'),
(296, 189, 'NORMIATI', 'RANTAU PANJANG', '04-08-1967', '', 0, 0, '085387959608', 1, 1, 12, '', 'I', '6310094408670004'),
(297, 189, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(298, 190, 'MARWI ARDIANTO', 'NGAWI', '21-11-1976', '', 0, 0, '081336196663', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '3201022111760008'),
(299, 190, 'SUPARMIATI', 'MADIUN', '09-10-1976', '', 0, 0, '081346331245', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'I', '3201024910760005'),
(300, 190, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(301, 165, 'NOR HASANI', 'BANJARMASIN', '17-11-1955', '', 0, 0, '085249932875', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011711550002'),
(302, 165, 'ROHISAH', 'SEGUMBANG', '07-08-1965', '', 0, 0, '085246209082', 1, 3, 17, '', 'I', '6310014708650001'),
(303, 165, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(304, 191, 'RESTU SPERY MATANDE', 'SARIRA', '24-02-1970', '', 0, 0, '', 2, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310082402700001'),
(305, 191, 'LINARTHA PAYUNG LANGI', 'MAKASSAR', '21-04-1978', '', 0, 0, '', 2, 6, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310086104780001'),
(306, 191, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(307, 110, 'DESFIRIZAL', 'PADANG', '02-06-1975', '', 0, 0, '081346366021', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090206750007'),
(308, 110, 'ASDA SYUBETTI', 'PADANG', '28-10-1975', '', 0, 0, '081348124320 - ', 1, 3, 17, 'KURANG DARI RP. 500.000', 'I', '6310096810750010'),
(309, 110, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(310, 201, 'MARJIYO', 'GUNUNG KIDUL', '08-09-1963', '', 0, 0, '081348797540', 1, 3, 2, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310080809630001'),
(311, 201, 'HANIFAH', 'LAMONGAN ', '12-04-1967', '', 0, 0, '081348797540', 1, 2, 2, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310085204670001'),
(312, 201, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(313, 124, 'SYARIFUDIN', 'PULAU TANJUNG', '07-03-1980', '', 0, 0, '085387961210', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010703800002'),
(314, 124, 'WAHIDAH', 'KERSIK PUTIH', '13-07-1980', '', 0, 0, '085388836064', 1, 3, 17, 'RP. 500.000 - RP. 999.999', 'I', '6310015307800003'),
(315, 124, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(316, 209, 'BAYYIN SHOLEH', 'TEGO', '18-12-1975', '', 0, 0, '081952940463', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011812750001'),
(317, 209, 'NURUL AINI', 'KOTABARU', '10-04-1983', '', 0, 0, '081929261161', 1, 2, 17, '', 'I', '6310015004830002'),
(318, 209, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(319, 16, 'M. KHALWANI', 'MARTAPURA', '16-02-1973', '', 0, 0, '082153229909', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091602730001'),
(320, 16, 'NASRIAH (ALM)', 'PAGATAN', '25-11-1976', '', 0, 0, '', 1, 6, 17, 'KURANG DARI RP. 500.000', 'I', ''),
(321, 16, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(322, 206, 'MASRUF MUZAYIN', 'KEDIRI', '16-08-1968', '', 0, 0, '081349452860', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091608670005'),
(323, 206, 'DEWI SARTIKA', 'BANJARMASIN', '05-05-1980', '', 0, 0, '081230167722', 1, 2, 6, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310094505800023'),
(324, 206, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(325, 215, 'I KADEK SURAWIRATA', 'BADUNG', '17-06-1976', '', 0, 0, '081351667039', 5, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310081707760004'),
(326, 215, 'NI KADEK MURTINI ASIH', 'JEM BRANA', '11-03-1980', '', 0, 0, '081351604076', 5, 1, 6, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310085103800002'),
(327, 215, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(328, 214, 'BAYYIN SHOLEH', 'TEGO', '18-12-1975', '', 0, 0, '081952940463', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011812750001'),
(329, 214, 'NURUL AINI', 'KOTABARU', '10-04-1983', '', 0, 0, '081929261161', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310015004830002'),
(330, 214, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(331, 153, 'MUHAMMAD RIZAL HADINATA (ALM)', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'A', '-'),
(332, 153, 'FITRIYANI', 'BANJARMASIN', '15-09-1980', '', 0, 0, '082251369393', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310015509800005'),
(333, 153, 'NOOR LAILA', 'BANJARMASIN', '18-09-1961', '', 0, 0, '082154453711', 1, 3, 0, '', 'W', '6302065809610001'),
(334, 4, 'AKHMAD RIYADI', 'BARABAI', '08-08-1978', '', 0, 0, '0811516316', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090808780014'),
(335, 4, 'RINA ULFA AFRIYANTI', 'BANJARMASIN', '23-08-1976', '', 0, 0, '081351920802', 1, 3, 6, 'KURANG DARI RP. 500.000', 'I', '6310096308760003'),
(336, 4, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(337, 218, 'AGUNG PRIHATNANTO', 'YOGYAKARTA', '26-07-1976', '', 0, 0, '08125069649', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310062607760001'),
(338, 218, 'SITI NI''MATUN NAZIMAH', 'HULU SUNGAI UTARA', '13-06-1978', '', 0, 0, '081349405795', 1, 6, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310065306780001'),
(339, 218, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(340, 173, 'SYAFRUDIN', 'BANJARMASIN', '19-02-1976', '', 0, 0, '085248229392', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091902760002'),
(341, 173, 'ASIH CAHYATRI', 'KAMPUNG BARU', '17-09-1975', '', 0, 0, '082353037909', 1, 3, 12, '', 'I', '6310095709750003'),
(342, 173, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(343, 207, 'SYUAIP ', 'LAB.JAMBU', '14-09-1963', '', 0, 0, '081348517402', 1, 7, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091409630003'),
(344, 207, 'AFIP FATUROFIAH', 'BLITAR', '23-04-1974', '', 0, 0, '081351870669', 1, 6, 12, 'KURANG DARI RP. 500.000', 'I', '6310096304740004'),
(345, 207, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(346, 155, 'EDY RUSDIANSYAH', 'KANDANGAN', '20-05-1968', '', 0, 0, '082353353379', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '63100920055680003'),
(347, 155, 'SITI AISYAH', 'KOTABARU', '26-06-1973', '', 0, 0, '082154892473', 1, 2, 12, '', 'I', '6310096606730005'),
(348, 155, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(349, 61, 'SUGENG PURNOMO', 'SURABAYA', '07-05-1972', '', 0, 0, '081346823949', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310080705720001'),
(350, 61, 'INDAH DIANAWATI MASRUROH', 'DADUNG', '27-06-1973', '', 0, 0, '081253616155', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310086706730003'),
(351, 61, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(352, 101, 'H. AHMAD FAISAL ', 'BANGKALAN', '06-05-1955', '', 0, 0, '-', 1, 7, 0, '', 'A', ''),
(353, 101, 'MOZA ARTAMEVIA', 'BANDUNG', '17-04-1979', '', 0, 0, '0812 3245 1945', 1, 7, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310105704760001'),
(354, 101, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(355, 220, 'GUSTI SUDARMADI', 'BATULICIN', '15-01-1966', '', 0, 0, '082154932848', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091501660001'),
(356, 220, 'USRIATUN', 'JAWA TENGAH', '02-02-1978', '', 0, 0, '082154932848', 1, 1, 5, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095902780001'),
(357, 220, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(358, 219, 'MUH NASIR', 'MAROS', '01-07-1979', '', 0, 0, '085250602371', 1, 3, 6, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010107790071'),
(359, 219, 'MARWAH', 'UJUNGPANDANG', '08-07-1982', '', 0, 0, '085386979597', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '610014807820002'),
(360, 219, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(361, 223, 'AMMA JAYA ASIANTO', 'KOTABARU', '28-08-1978', '', 0, 0, '085332937807', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310092808780007'),
(362, 223, 'DIAH RETNO WIDYASTUTI', 'TANJUNG MERAWA', '15-12-1979', '', 0, 0, '085248346263', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310065512790003'),
(363, 223, 'NOORHAYATI', 'KOTABARU', '30-06-1953', '', 0, 0, '082354171111', 1, 1, 12, 'KURANG DARI RP. 500.000', 'W', ''),
(364, 222, 'HAIRANI', 'BANJARMASIN', '11-11-1977', '', 0, 0, '085248835641', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310061111770002'),
(365, 222, 'SITI MARYANA', 'BANJARMASIN', '03-05-1979', '', 0, 0, '-', 1, 3, 17, '', 'I', '6310064305790003'),
(366, 222, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(367, 225, 'SYAHRANI', 'KOTABARU', '15-07-1976', '', 0, 0, '082221768394', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091507760007'),
(368, 225, 'SYARAH', 'KUSAMBI', '04-05-1981', '', 0, 0, '082221768394', 1, 2, 17, 'KURANG DARI RP. 500.000', 'I', '6310094405810003'),
(369, 225, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(370, 224, 'SOLEH', 'LAMPUNG', '05-06-1970', '', 0, 0, '081349794665', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090506700007'),
(371, 224, 'MIYATUN', 'KEDIRI', '12-06-1970', '', 0, 0, '085386521341', 1, 3, 0, '', 'I', '6310095206700004'),
(372, 224, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(373, 226, 'WIYOTO', 'BATANG', '03-03-1967', '', 0, 0, '081250189720', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310080303670002'),
(374, 226, 'KAMYATUN', 'BATANG', '19-11-1974', '', 0, 0, '081254510323', 1, 1, 12, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310085911740002'),
(375, 226, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(376, 227, 'SANTO ALM', 'MADIUN', '', '', 0, 0, '', 1, 1, 12, '', 'A', ''),
(377, 227, 'SUNARTI', 'CIANJUR', '25-11-1971', '', 0, 0, '081250117850', 1, 1, 6, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310086511710001'),
(378, 227, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(379, 181, 'MUHAMMAD SYAHRANI', 'BARABAI', '02-06-1973', '', 0, 0, '082352169252', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090206730007'),
(380, 181, 'MASNIAH', 'MARTAPURA', '20-08-1980', '', 0, 0, '085332845255', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310096008800007'),
(381, 181, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(382, 229, 'ZULKIFLI HASAN', 'SARIGADUNG', '13-05-1975', '', 0, 0, '085348863768', 1, 2, 6, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091305750004'),
(383, 229, 'WAHIDAH', 'SUNGAI DUA', '03-01-1980', '', 0, 0, '082351364823', 1, 1, 6, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310094301800005'),
(384, 229, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(385, 232, 'SUPRIADI', 'SIDOARJO', '10-12-1976', '', 0, 0, '085251146704', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310011012760006'),
(386, 232, 'MULYATI', 'TUBAN', '16-07-1975', '', 0, 0, '085251146703', 1, 3, 0, '', 'I', '6310015607750003'),
(387, 232, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(388, 68, 'H. HADRI', 'GANDARAYA', '03-05-1972', '', 0, 0, '085249476698', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090305720004'),
(389, 68, 'HJ. HADIJAH', 'BATU BESAR', '08-08-1971', '', 0, 0, '081348630039', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310094808710006'),
(390, 68, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(391, 213, ' RUSDIANTO ', 'BARABAI', '09-09-1959', '', 0, 0, '081251523535', 1, 7, 7, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090909590006'),
(392, 213, 'HJ. HALIMATUS SA''DIAH', 'BANJARMASIN', '29-05-1969', '', 0, 0, '081351712567', 1, 2, 6, 'RP. 5.000.000 - RP. 20.000.000', 'I', '6310096905690001'),
(393, 213, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(394, 123, 'BURHANUDDIN ( ALM) ', 'SEGUMBANG', '01-07-1969', '', 0, 0, '-', 1, 1, 0, '', 'A', '6310010107690062'),
(395, 123, 'MASRIANI', 'SEGUMBANG ', '11-11-1975', '', 0, 0, '082251597503', 1, 2, 12, '', 'I', '6310015111750002'),
(396, 123, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(397, 11, 'PADLANSYAH, SE', 'KOTABARU', '01-04-1970', '', 0, 0, '081349398008', 1, 8, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090104700005'),
(398, 11, 'ERININGSIH', 'KULON PROGO', '12-03-1972', '', 0, 0, '081349780880', 1, 8, 17, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310095203720011'),
(399, 11, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(400, 121, 'MAHMUDIN', 'MAROS', '04-03-1981', '', 0, 0, '082254205352', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010403810002'),
(401, 121, 'NORASIA', 'MAROS', '01-07-1983', '', 0, 0, '085252155938', 1, 2, 17, 'KURANG DARI RP. 500.000', 'I', '6310014107830053'),
(402, 121, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(403, 234, 'RAJJA', 'MAROS', '01-07-1979', '', 0, 0, '', 1, 1, 4, 'KURANG DARI RP. 500.000', 'A', '6310020107790120'),
(404, 234, 'RAODAH', 'MAROS', '01-07-1980', '', 0, 0, '085332060157', 1, 1, 12, '', 'I', '6310024107800141'),
(405, 234, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(406, 236, 'KARSONI', 'PAGATAN', '01-05-1966', '', 0, 0, '081349605032', 1, 7, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302160105660002'),
(407, 236, 'MASLIANNOR', 'BARABAI', '10-10-1969', '', 0, 0, '081346696838', 1, 3, 12, '', 'I', '6302175010690001'),
(408, 236, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(409, 239, 'TRI HARTANTO', 'BATANG', '05-08-1977', '', 0, 0, '085248594410', 1, 3, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090508770005'),
(410, 239, 'DARHANA GISTA', 'PAGATAN', '04-03-1978', '', 0, 0, '085248594410', 1, 3, 5, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094403780006'),
(411, 239, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(412, 197, 'M. RUSLAN', 'MAROS', '07-02-1977', '', 0, 0, '-', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310020702770002'),
(413, 197, 'DARSIAH', 'REA REA', '10-11-1983', '', 0, 0, '-', 1, 2, 17, 'KURANG DARI RP. 500.000', 'I', '6310025011830006'),
(414, 197, 'SITI MARDAWIYAH', 'SEPUNGGUR', '04-07-1995', '', 0, 0, '085346153341', 1, 6, 17, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310022501080002'),
(415, 238, 'MUHAMMAD AMIR', 'PAGATAN', '20-01-1954', '', 0, 0, '082153911626', 1, 3, 6, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310012001540001'),
(416, 238, 'MUDAWAMAH', 'BATULICIN', '26-06-1968', '', 0, 0, '082153911626', 1, 2, 17, '', 'I', '6310016606680002'),
(417, 238, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(418, 182, 'AFRANS', 'KOTABARU', '05-03-1972', '', 0, 0, '-', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090503720008'),
(419, 182, 'YULITA', 'KOTABARU', '25-07-1975', '', 0, 0, '081349540877', 1, 3, 17, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096507750005'),
(420, 182, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(421, 93, 'ASRI TOTO MASSE', 'BALLE', '07-08-1963', '', 0, 0, '081253646426', 1, 2, 15, 'KURANG DARI RP. 500.000', 'A', '6310090708630003'),
(422, 93, 'ST. RABIAH', 'SINJAI', '31-12-1967', '', 0, 0, '-', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310097112670011'),
(423, 93, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(424, 196, 'TAMING', 'MAROS', '06-02-1962', '', 0, 0, '-', 1, 1, 12, '', 'A', '-'),
(425, 196, 'ABI', 'MAROS', '19-04-1965', '', 0, 0, '-', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310025904650002'),
(426, 196, 'M. JUNAIDI', 'SULSEL', '21-07-1992', '', 0, 0, '085348765669', 1, 3, 8, 'KURANG DARI RP. 500.000', 'W', '6310022107920037'),
(427, 193, 'MUJAMIL', 'CILACAP', '06-12-1970', '', 0, 0, '081351239187', 1, 1, 2, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310070612700001'),
(428, 193, 'KASIH', 'CILACAP', '04-06-1975', '', 0, 0, '081351239187', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310074406750002'),
(429, 193, '', '', '06-12-1970', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(430, 112, 'ROBET SIMAMORA', 'SILAKKIDIR', '21-12-1970', '', 0, 0, '0813-4502-6701', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302132112700001'),
(431, 112, 'YOHANA SUMINI', 'KLATEN', '19-05-1976', '', 0, 0, '0877-2296-4705', 2, 2, 16, 'KURANG DARI RP. 500.000', 'I', '6302155905760002'),
(432, 112, 'ROBET SIMAMORA', 'SILAKKIDIR', '21-12-1970', '', 0, 0, '0813-4502-6701', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6302132112700001'),
(433, 135, 'RUDI TRIANTO', 'BANYUMAS', '01-01-1971', '', 0, 0, '082155390555', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090101710008'),
(434, 135, 'MARDIANA', 'TAMPERAS', '15-04-1977', '', 0, 0, '082148520475', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310095504770003'),
(435, 135, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(436, 250, 'MUJIYANA', 'KULONPROGO', '20-05-1970', '', 0, 0, '08112269179', 1, 7, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310092005700006'),
(437, 250, 'SARI WAHYUNI', 'KEBUMEN', '13-10-1975', '', 0, 0, '081328687311', 1, 7, 12, '', 'I', '6310095310750001'),
(438, 250, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(439, 217, 'ANDI DARMANSYAH', 'SANTAN', '07-06-1982', '', 0, 0, '081250178510', 1, 3, 15, 'RP. 500.000 - RP. 999.999', 'A', '6310020706820003'),
(440, 217, 'DANIAH', 'SEPUNGGUR', '02-04-1984', '', 0, 0, '081250178510', 1, 1, 6, 'KURANG DARI RP. 500.000', 'I', '6310024107800350'),
(441, 217, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(442, 252, 'I GUSTI PUTU ANOM . HP', 'JAKARTA', '14-02-1977', '', 0, 0, '081255084559', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091402770006'),
(443, 252, 'IIN IKA ARIYANTI', 'GUNTUNG PAYUNG', '04-04-1982', '', 0, 0, '081347466490', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310095109820003');
INSERT INTO `tbl_reg_data_ortu` (`reg_data_ortu_id`, `reg_data_ortu_reg_akun_id`, `reg_data_ortu_nama`, `reg_data_ortu_tempat_lahir`, `reg_data_ortu_tgl_lahir`, `reg_data_ortu_alamat`, `reg_data_ortu_alamat_kota_id`, `reg_data_ortu_alamat_propinsi_id`, `reg_data_ortu_no_telepon`, `reg_data_ortu_agama_id`, `reg_data_ortu_pendidikan_id`, `reg_data_ortu_pekerjaan_id`, `reg_data_ortu_penghasilan`, `reg_data_ortu_ind`, `reg_data_ortu_no_nik`) VALUES
(444, 252, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(445, 194, 'SUTOWO', 'NGANJUK', '23-10-1966', '', 0, 0, '085151319278', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'A', '6310082310660001'),
(446, 194, 'WIJIATI', 'KEDIRI', '15-07-1977', '', 0, 0, '-', 1, 1, 8, 'KURANG DARI RP. 500.000', 'I', '6310085507770001'),
(447, 194, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(448, 183, 'SYAHRUDIN', 'ALUH-ALUH', '03-01-1974', '', 0, 0, '085345857477', 1, 1, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090301740004'),
(449, 183, 'HAYATI', 'BATULICIN', '24-06-1974', '', 0, 0, '-', 1, 2, 12, '', 'I', '6310096406740002'),
(450, 183, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(451, 253, 'H KHADIRAN TIRTO SAPUTRO', 'KEDIRI', '17-08-1951', '', 0, 0, '082151542525', 1, 8, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091708530008'),
(452, 253, 'HJ ENY SUNJAYANTI', 'PELAIHARI', '23-10-1972', '', 0, 0, '082148928923', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310096310720003'),
(453, 253, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(454, 171, 'ABIDIN', 'BATULICIN', '01-10-1972', '', 0, 0, '081351187245', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090103710009'),
(455, 171, 'KASRIAH', 'PAGATAN', '01-03-1969', '', 0, 0, '082153903001', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310094304700007'),
(456, 171, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(457, 254, 'MUHAMMAD SHOLEH', 'JEMBER', '02-05-1978', '', 0, 0, '085389672648', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6302140205780002'),
(458, 254, 'SRI WAHYUNI', 'TOLI TOLI', '21-10-1985', '', 0, 0, '085389672648', 1, 2, 12, '', 'I', '6302145002850002'),
(459, 254, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(460, 198, 'PUJI WAHONO', 'NGAWI', '01-04-1975', '', 0, 0, '085751369540', 1, 1, 8, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310080104750003'),
(461, 198, 'KARSITI', 'BANYUMAS', '03-07-1983', '', 0, 0, '085751369540', 1, 2, 8, 'KURANG DARI RP. 500.000', 'I', '6310084307830002'),
(462, 198, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(463, 237, 'SURIANSYAH', 'KOTABARU', '17-08-1979', '', 0, 0, '085345654142', 1, 2, 2, 'RP. 500.000 - RP. 999.999', 'A', '6310011708790004'),
(464, 237, 'BIANA', 'SEGUMBANG', '13-11-1983', '', 0, 0, '-', 1, 2, 17, 'KURANG DARI RP. 500.000', 'I', '6310016311830001'),
(465, 237, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(466, 246, 'LAUPE', 'SEGUMBANG', '04-01-1967', '', 0, 0, '082352`168855', 1, 3, 4, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010401670002'),
(467, 246, 'SALASIAH', 'KOTABARU', '06-06-1977', '', 0, 0, '082154899167', 1, 1, 6, 'RP. 500.000 - RP. 999.999', 'I', '63100140606770002'),
(468, 246, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(469, 260, 'NASIR', 'RANTAU', '11-12-1979', '', 0, 0, '081254538489', 1, 2, 15, 'KURANG DARI RP. 500.000', 'A', '6310091112790001'),
(470, 260, 'MASNIAH', 'PLAJAU', '01-07-1982', '', 0, 0, '082357576774', 1, 1, 17, '', 'I', '6310094107820003'),
(471, 260, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(472, 230, 'FATHURRAHMAN', 'KANDANGAN', '23-04-1973', '', 0, 0, '081346869414', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092304730003'),
(473, 230, 'NORSARIATI', 'KANDANGAN', '21-01-1975', '', 0, 0, '081257314727', 1, 2, 12, '', 'I', '6310096101750004'),
(474, 230, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(475, 233, 'PONDANG LIMBONG', 'MEDAN', '06-07-1971', '', 0, 0, '081251764836', 3, 7, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090607710003'),
(476, 233, 'MELIANA', 'MAHAJANDAU', '14-05-1975', '', 0, 0, '081348599767', 3, 6, 12, '', 'I', '6310095405750009'),
(477, 233, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(478, 164, 'H.SURIANTO.AM,S.AG', 'SIMPO', '28-11-1971', '', 0, 0, '', 1, 8, 17, 'RP. 5.000.000 - RP. 20.000.000', 'A', ''),
(479, 164, 'HJ.UMMI KALTSUM', 'POLMAS', '19-05-1984', '', 0, 0, '081351118877', 1, 3, 12, '', 'I', '6310095905840006'),
(480, 164, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(481, 30, 'SUGIANTO', 'MOJOKERTO', '10-01-1966', '', 0, 0, '081251765333', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091001660007'),
(482, 30, 'NELIA DWI PUTRI', 'KOTABARU', '30-04-1968', '', 0, 0, '081251140862', 1, 3, 6, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310097004680001'),
(483, 30, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(484, 148, 'ANANG ARDIANSYAH', 'BANJARMASIN', '03-07-1984', '', 0, 0, '081348632021', 1, 3, 17, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090307840008'),
(485, 148, 'MUFLIHATUL HASANAH', 'JEMBER', '12-12-1982', '', 0, 0, '082151119985', 1, 3, 0, '', 'I', '6310095212820011'),
(486, 148, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(487, 80, 'S. S.  DUGA HASIBUAN', 'P. SIANTAR', '07-05-1971', '', 0, 0, '087812272766', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302150705710001'),
(488, 80, 'ESTERLIA SIANIPAR', 'SUNGAI DURIAN', '23-12-1982', '', 0, 0, '087709289298', 2, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6302152312820001'),
(489, 80, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(490, 122, 'H.KAMILUDDIN MALEWA, A.MD,SE', 'ARA', '29-06-1972', '', 0, 0, '082114242777', 1, 7, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092906720002'),
(491, 122, 'ZULAICHAH', 'JOMBANG', '14-12-1968', '', 0, 0, '082148856288', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310095412680003'),
(492, 122, '', '', '', '', 0, 0, '', 0, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'W', ''),
(493, 263, 'H. SYARKANI', 'PEMANGKIH', '30-08-1945', '', 0, 0, '082155949469', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310093008450001'),
(494, 263, 'HJ DEWI NOVANDA', 'BANJARMASIN', '02-11-1982', '', 0, 0, '081255523007', 1, 1, 12, '', 'I', '6310094211820008'),
(495, 263, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(496, 268, 'A.R.SIDIK.M', 'PAGATAN', '15-08-1943', '', 0, 0, '082158250159 ', 1, 3, 7, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091508430001'),
(497, 268, 'SUNARTI', 'BONE', '09-08-1964', '', 0, 0, '082154911538', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310094908640002'),
(498, 268, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(499, 267, 'SARIFFUDIN', 'SUNGAI DUA', '12-02-1962', '', 0, 0, '082352112336', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'A', '6310091202620004'),
(500, 267, 'SARIMAS', 'SUNGAI DUA', '23-05-1965', '', 0, 0, '082352112336', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'I', '6310096305650001'),
(501, 267, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(502, 266, 'SINTOR MAULANA SIMANJUNTAK', 'SUMATRA', '04-07-1960', '', 0, 0, '+6281297319927', 2, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090407600005'),
(503, 266, 'HENI YULIWATI', 'JAWA BARAT', '20-06-1972', '', 0, 0, '081348214898', 2, 2, 2, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096006720001'),
(504, 266, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(505, 116, 'MUHAMMAD YANI', 'BARABAI', '10-04-1966', '', 0, 0, '', 1, 1, 6, 'RP. 500.000 - RP. 999.999', 'A', '6310091004660003'),
(506, 116, 'WARDAH', 'BANJARMASIN', '05-08-1970', '', 0, 0, '085250169870', 1, 1, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310094508700007'),
(507, 116, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(508, 127, 'SLAMET RIYADI', 'PURBALINGGA', '17-07-1978', '', 0, 0, '082158768545', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091207780015'),
(509, 127, 'AGUSTINAWATI', 'BARABAI', '17-08-1982', '', 0, 0, '082154004367', 1, 3, 12, '', 'I', '6310095708820024'),
(510, 127, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(511, 272, 'SAYRIFFUDIN', 'SUNGAI DUA', '12-02-1962', '', 0, 0, '082352112336', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'A', '6310091202620004'),
(512, 272, 'SARIMAS', 'SUNGAI DUA', '23-05-1965', '', 0, 0, '082352112336', 1, 1, 17, 'RP. 500.000 - RP. 999.999', 'I', '6310096305650001'),
(513, 272, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(514, 271, 'THAIPAR HAMONGAN SIAHAAN', 'JAKARTA', '01-01-1970', '', 0, 0, '', 2, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090101700027'),
(515, 271, 'RODENTA SIREGAR', 'MEDAN', '25-02-1974', '', 0, 0, '', 3, 3, 8, 'KURANG DARI RP. 500.000', 'I', '6310096502740002'),
(516, 271, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(517, 270, 'RIDWAN', 'SOPPENG', '07-01-1981', '', 0, 0, '085248800191', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090701810007'),
(518, 270, 'SURIANI', 'SOPPENG', '07-12-1987', '', 0, 0, '085250415928', 1, 2, 12, '', 'I', '6310094712870002'),
(519, 270, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(520, 244, 'THARIPAR HAMONANGAN SIAHAAN', 'JAKARTA', '01-01-1970', '', 0, 0, '', 2, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090101700027'),
(521, 244, 'RODENTA SIREGAR', 'MEDAN', '25-02-1974', '', 0, 0, '', 2, 3, 12, '', 'I', '6310096502740002'),
(522, 244, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(523, 275, 'NASIR', 'RANTAU', '11-12-1979', '', 0, 0, '081254538489', 1, 2, 15, 'KURANG DARI RP. 500.000', 'A', '6310091112790001'),
(524, 275, 'MASNIAH', 'PLAJAU', '01-07-1982', '', 0, 0, '082357576774', 1, 1, 12, '', 'I', '6310094107820003'),
(525, 275, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(526, 276, 'ANTONI', 'KUALA PEMBUANG', '12-05-1976', '', 0, 0, '081212202099', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6207011205760001'),
(527, 276, 'LESTARI EKAWATI', 'KUALA PEMBUANG', '02-06-1980', '', 0, 0, '082158839741', 1, 3, 17, 'RP. 500.000 - RP. 999.999', 'I', '6207014206800005'),
(528, 276, 'DESY TRIANA, ST', 'KUALA PEMBUANG', '03-03-1991', '', 0, 0, '085250469993', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6207014303910001'),
(529, 277, 'RUSTAM', 'KUSAMBI', '10-08-1976', '', 0, 0, '085345730765', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011008760003'),
(530, 277, 'SALMAWATI', 'MENTEWE', '21-04-1980', '', 0, 0, '082352924889', 1, 1, 6, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310086104800001'),
(531, 277, 'NOVIE IRIANIE', 'KUSAMBI', '08-08-1998', '', 0, 0, '082350941404', 1, 3, 17, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310014808980003'),
(532, 261, 'ASPAR', 'KUSAMBI', '25-10-1959', '', 0, 0, '082154938281', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'A', '6310012510590002'),
(533, 261, 'BAYANIAH', 'KUSAMBI', '02-03-1963', '', 0, 0, '-', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'I', '6310014203630002'),
(534, 261, 'SYAHRUDIN NOOR', 'KUSAMBI', '17-10-1991', '', 0, 0, '-', 1, 1, 17, 'RP. 500.000 - RP. 999.999', 'W', '6310011710910002'),
(535, 55, 'TASLIM MARTHALA S.SI', 'BUKIT TINGGI', '10-11-1969', '', 0, 0, '081349679818', 1, 7, 16, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091011690005'),
(536, 55, 'SUNARSIH', 'PADANG', '14-04-1974', '', 0, 0, '081351031122', 1, 3, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095404740004'),
(537, 55, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(538, 141, 'SELAMAT', 'BANJARMASIN', '13-07-1976', '', 0, 0, '', 1, 3, 0, '', 'A', ''),
(539, 141, 'JUMIATI', 'BANJARMASIN', '05-05-1979', '', 0, 0, '085822136848', 1, 2, 12, '', 'I', '6310094505790015'),
(540, 141, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(541, 273, 'ABD. SANI (ALM)', 'BANJARMASIN', '05-03-1958', '', 0, 0, '-', 1, 2, 0, '', 'A', '-'),
(542, 273, 'FAUZIAH', 'BANJARMASIN', '10-08-1958', '', 0, 0, '085345954675', 1, 1, 15, 'RP. 500.000 - RP. 999.999', 'I', '6371035008590003'),
(543, 273, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(544, 21, 'RUJITO', 'KLATEN', '13-07-1966', '', 0, 0, '085246981790', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091307660003'),
(545, 21, 'SUTIYEM SP.D', 'PRAMBANAN', '25-11-1967', '', 0, 0, '082358932015', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096511670001'),
(546, 21, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(547, 279, 'MARTINUS', 'SAMARINDA', '17-08-1961', '', 0, 0, '0853-3283-4615', 1, 1, 2, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011708610001'),
(548, 279, 'ARNIWATI', 'SAMARINDA', '01-07-1970', '', 0, 0, '-', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310014107700068'),
(549, 279, 'MARTINUS', 'SAMARINDA', '17-08-1961', '', 0, 0, '0853-3283-4615', 1, 1, 2, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310011708610001'),
(550, 281, 'NASMAN', 'CILACAP', '01-07-1970', '', 0, 0, '081360604720', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310080107700045'),
(551, 281, 'SRI MULYANTI', 'PEKALONGAN', '17-05-1972', '', 0, 0, '081360604720', 1, 2, 8, 'RP. 500.000 - RP. 999.999', 'I', '6310085705720001'),
(552, 281, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(553, 174, 'HAIRIL ANWAR', 'SEPUNGGUR', '04-11-1974', '', 0, 0, '085387480345', 1, 3, 16, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090411740005'),
(554, 174, 'SITI HADIJAH', 'KAMPUNG BARU', '28-07-1984', '', 0, 0, '085249816845', 1, 2, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096807840004'),
(555, 174, '', '', '04-11-1974', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(556, 106, 'KHAIRUSSALAM', 'HULU SUNGAI UTARA', '04-06-1968', '', 0, 0, '085388833337', 1, 2, 16, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090406680014'),
(557, 106, 'NORSINAH', 'HULU SUNGAI UTARA', '01-01-1972', '', 0, 0, '085391328080', 1, 3, 12, '', 'I', '6310094101720016'),
(558, 106, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(559, 265, 'H.SYAMPURYONO', 'PASURUAN', '01-04-1966', '', 0, 0, '', 1, 2, 16, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310010104660001'),
(560, 265, 'HJ.MASWIAH', 'BATULICIN', '11-09-1972', '', 0, 0, '081251288040', 1, 7, 3, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310015109720001'),
(561, 265, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(562, 231, 'OMBENG', 'PAGATAN', '13-05-1967', '', 0, 0, '085332047727', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091305670003'),
(563, 231, 'ARBANIAH', 'BANJARMASIN', '10-08-1971', '', 0, 0, '085246556088', 1, 2, 12, '', 'I', '6310095008710004'),
(564, 231, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(565, 115, 'HAIRULLAH', 'AMUNTAI', '14-04-1972', '', 0, 0, '082254878030', 1, 2, 3, 'RP. 500.000 - RP. 999.999', 'A', '6310091404720003'),
(566, 115, 'MURSIDAH', 'ALABIO', '09-05-1973', '', 0, 0, '', 1, 1, 3, 'RP. 500.000 - RP. 999.999', 'I', '6310094905730006'),
(567, 115, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(568, 86, 'ARFANSYAH', 'SUNGAI PUMPUNG', '05-06-1973', '', 0, 0, '082151544205', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090506730008'),
(569, 86, 'KASRIAH', 'CANTUNG', '08-09-1968', '', 0, 0, '083141344330', 1, 2, 12, '', 'I', '6310094809680001'),
(570, 86, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(571, 249, 'ENDRO WAHYUDI', 'KEDIRI', '16-02-1976', '', 0, 0, '085249971593', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091602760005'),
(572, 249, 'ANI MASLIANI', 'SUNGAI KUSAN', '11-09-1980', '', 0, 0, '085247274226', 1, 3, 0, '', 'I', '63100951098800004'),
(573, 249, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(574, 162, 'ANDI MANSYUR YUSUF', 'KOTABARU', '31-12-1952', '', 0, 0, '085246463027', 1, 3, 15, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310093112520004'),
(575, 162, 'DEWI TRI MULYANI', 'PADANG', '14-04-1966', '', 0, 0, '082157734188', 1, 0, 12, 'KURANG DARI RP. 500.000', 'I', '6310095404660001'),
(576, 162, 'PANDU SATRIA WIBOWO', 'RIAU', '10-04-1994', '', 0, 0, '082153459439', 1, 0, 15, 'RP. 5.000.000 - RP. 20.000.000', 'W', '6310091004900004'),
(577, 274, 'M SAIFUDDIN', 'KEDIRI', '05-07-1968', '', 0, 0, '081348552939', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090507680010'),
(578, 274, 'DIAH AYU NOR HAYATI', 'BANYUWANGI', '01-08-1975', '', 0, 0, '', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310094108750005'),
(579, 274, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(580, 289, 'ENDRO SUSETYO ADI', 'SURABAYA', '05-06-1977', '', 0, 0, '085245306606', 1, 6, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090507770006'),
(581, 289, 'FARIDA HAYATI', 'TABALONG', '03-12-1980', '', 0, 0, '081251166488', 1, 3, 12, '', 'I', '6310094312800007'),
(582, 289, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(583, 65, 'DODI HENDARSONO', 'CIAMIS', '15-03-1977', '', 0, 0, '085249105813', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091503770002'),
(584, 65, 'SRI HATIN', 'CIAMIS', '16-08-1983', '', 0, 0, '-', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310095608830007'),
(585, 65, '', '', '08-04-1977', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(586, 291, 'HAYYUNI ', 'SALINO', '03-04-1970', '', 0, 0, '-', 1, 1, 0, '', 'A', '-'),
(587, 291, 'HJ. DARMAWATI', 'KERSIK PUTIH', '05-08-1970', '', 0, 0, '-', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310094508700008'),
(588, 291, 'HJ. JAENAL ABIDIN', 'BATULICIN', '07-04-1973', '', 0, 0, '082353352309', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310090704730003'),
(589, 128, 'KADAM', 'LAMONGAN', '23-03-1967', '', 0, 0, '082153579211', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092303670001'),
(590, 128, 'SUHARNANIK', 'LAMONGAN', '15-10-1968', '', 0, 0, '081350179610', 1, 3, 12, '', 'I', '6310095510680002'),
(591, 128, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(592, 0, 'ABD. RACHMAN SALEH', 'KINTAB', '13-05-1977', '', 0, 0, '085347071977', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '63100613057700001'),
(593, 0, 'NOOR HAIRIAH', 'BANJAR', '06-07-1983', '', 0, 0, '085251128889', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095607830003'),
(594, 0, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(595, 293, 'YACOB MASSANG', 'MAKASSAR', '21-01-1966', '', 0, 0, '082124241834', 2, 8, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310012101660001'),
(596, 293, 'PRAPTI VIWI RIAM BONA', 'AMBON', '11-03-1970', '', 0, 0, '081348950109', 2, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310015103700001'),
(597, 293, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(598, 91, 'H.HAIRUDIN', 'PAGATAN', '01-07-1973', '', 0, 0, '085248393444', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310060107730036'),
(599, 91, 'HJ.NORIDAWATI', 'KOTABARU', '24-11-1976', '', 0, 0, '085332041111', 1, 3, 12, '', 'I', '6310066411760001'),
(600, 91, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(601, 133, 'KURNAIN', 'TANJUNG HARAPAN', '03-11-1973', '', 0, 0, '085348788132', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010311730002'),
(602, 133, 'SITI ZUBAIDAH', 'KINTAP', '13-02-1976', '', 0, 0, '081348358132', 1, 5, 3, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310015302760001'),
(603, 133, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(604, 259, 'ABDURAHMAN ', 'KERSIK PUTIH', '05-12-1973', '', 0, 0, '081349708687', 1, 7, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310010512730005'),
(605, 259, 'NURUL HIDAYAH', 'KOTABARU', '13-01-1976', '', 0, 0, '081247001887', 1, 3, 0, '', 'I', '63100115301760002'),
(606, 259, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(607, 297, 'FIRMANSYAH', 'BERANGAS', '11-08-1977', '', 0, 0, '081348184723', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091108770002'),
(608, 297, 'RACHNAWATI', 'PUDI', '02-03-1978', '', 0, 0, '081349600440', 1, 7, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310094203780008'),
(609, 297, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(610, 300, 'SUNYOTO BUDI SANTOSO', 'BLITAR', '11-07-1974', '', 0, 0, '081348120385', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091107740004'),
(611, 300, 'NOOR ASIAH', 'PAGATAN', '08-04-1978', '', 0, 0, '082153359925', 1, 2, 12, '', 'I', '6310094804780003'),
(612, 300, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(613, 302, 'ENDRO WAHYUDI', 'KEDIRI', '16-02-1976', '', 0, 0, '085249971593', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091602760005'),
(614, 302, 'ANI MASLIANI', 'SUNGAI KUSAN', '11-09-1980', '', 0, 0, '085247274226', 1, 3, 0, '', 'I', '63100951098800004'),
(615, 302, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(616, 294, 'TAUFIKURRAHMAN', 'BANJARMASIN', '22-06-1975', '', 0, 0, '081348718247', 1, 2, 15, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310092206750001'),
(617, 294, 'SRI FITRIANA', 'BANJARMASIN', '22-09-1976', '', 0, 0, '081351071122', 1, 3, 12, '', 'I', '6310096209760001'),
(618, 294, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(619, 248, 'MOHAMAD YASIN', 'BOJONEGORO', '08-08-1968', '', 0, 0, '082152618309', 1, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310060808680003'),
(620, 248, 'SITI KHUSMIYANAH', 'GRESIK', '30-06-1972', '', 0, 0, '081236958095', 1, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310067006720003'),
(621, 248, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(622, 304, 'ILHAM MUZIDIN', 'TILUNG', '19-02-1976', '', 0, 0, '081346396434', 1, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091902760004'),
(623, 304, 'NUNUNG NURHASANAH', 'BATULICIN', '07-03-1976', '', 0, 0, '082148987022', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6401084703760001'),
(624, 304, 'AGNES VERONICA PUTRI SITANGGANG', 'BANJARMASIN', '13-05-1996', '', 0, 0, '082248677805', 2, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6401085305960002'),
(625, 296, 'AKHMAD ZAINI', 'KOTABARU', '08-02-1965', '', 0, 0, '085345653801', 1, 3, 6, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090802650002'),
(626, 296, 'IDA ROYANI', 'KOTABARU', '05-06-1970', '', 0, 0, '-', 1, 2, 12, '', 'I', '6310094506700007'),
(627, 296, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(628, 307, 'ARHAM', 'BARRU', '05-02-1973', '', 0, 0, '085251325414', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310080502730001'),
(629, 307, 'HASMAWATI', 'BARRU', '12-12-1970', '', 0, 0, '08125066361', 1, 3, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310085212700003'),
(630, 307, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(631, 309, 'ABAS', 'INDRAMAYU', '16-08-1955', '', 0, 0, '085230462165', 1, 1, 15, 'RP. 500.000 - RP. 999.999', 'A', '6310091608550002'),
(632, 309, 'SUKATI', 'INDRAMAYU', '06-05-1965', '', 0, 0, '085230462165', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310094605850001'),
(633, 309, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(634, 311, 'MUHAJIRIN', 'MAGELANG', '30-05-1974', '', 0, 0, '081348741912', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092805740003'),
(635, 311, 'YULIASTUTIK HERMININGSIH', 'PELAIHARI', '02-07-1979', '', 0, 0, '081348784818', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094207790008'),
(636, 311, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(637, 60, 'ACHMAD TOKE', 'PINRANG', '07-07-1972', '', 0, 0, '085399089777', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310010707720001'),
(638, 60, 'FATMAWATI', 'PINRANG', '17-08-1973', '', 0, 0, '081253890945', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310015708730003'),
(639, 60, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(640, 247, 'ALAM', 'SOPPENG', '07-09-1972', '', 0, 0, '081351725957', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310060709720002'),
(641, 247, 'NUR LINA', 'SOPPENG', '03-12-1975', '', 0, 0, '081348888367', 1, 3, 17, '', 'I', '6310064312750001'),
(642, 247, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(643, 310, 'TOYIB', 'INDRAMAYU', '13-12-1979', '', 0, 0, '085820968572', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310091312790002'),
(644, 310, 'SARI''AH', 'INDRAMAYU', '05-06-1981', '', 0, 0, '085820968572', 1, 1, 17, 'KURANG DARI RP. 500.000', 'I', '6310094506810009'),
(645, 310, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(646, 14, 'SAKTI WIJAYA', 'BEPARA', '05-03-1979', '', 0, 0, '081953577673', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302200503700006'),
(647, 14, 'YULI YANTI', 'TASIKMALAYA', '10-04-1986', '', 0, 0, '083159882240', 2, 2, 3, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6302205004860001'),
(648, 14, 'SAKTI WIJAYA', 'BEPARA', '05-03-1979', '', 0, 0, '081953577673', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6302200503700006'),
(649, 71, 'ABD. RACHMAN SALEH', 'KINTAB', '13-05-1977', '', 0, 0, '085347071977', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310061305770001'),
(650, 71, 'NOOR HAIRIAH', 'BANJAR', '06-07-1983', '', 0, 0, '085251128889', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'I', '631009567830003'),
(651, 71, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(652, 278, 'BAHRIL', 'PALINGKAU', '07-04-1981', '', 0, 0, '081250010071', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090704810003'),
(653, 278, 'RUMISYAH', 'PALINGKAU', '28-08-1984', '', 0, 0, '-', 1, 1, 12, '', 'I', '6310096808840002'),
(654, 278, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(655, 1, 'UMAR', 'BATU KEMBAR', '12-05-1966', '', 0, 0, '082155352421', 2, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302141205660002'),
(656, 1, 'SINIYAH', 'LIMBUR', '03-09-1975', '', 0, 0, '082157869794', 2, 1, 6, 'RP. 500.000 - RP. 999.999', 'I', '6302144309750001'),
(657, 1, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(658, 298, 'SUPIAN', 'SEPUNGGUR', '11-09-1975', '', 0, 0, '-', 1, 1, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310021109750003'),
(659, 298, 'SAPARENNAH', 'SEPUNGGUR', '12-05-1976', '', 0, 0, '085350303526', 1, 1, 17, 'KURANG DARI RP. 500.000', 'I', '6310025205760001'),
(660, 298, 'KAMSIAH', 'SEPUNGGUR', '28-09-1995', '', 0, 0, '-', 1, 3, 17, 'KURANG DARI RP. 500.000', 'W', '6310026806950002'),
(661, 280, 'MASURI', 'LAMONGAN', '', '', 0, 0, '', 1, 1, 0, '', 'A', ''),
(662, 280, 'SEDA', 'SEPUNGGUR', '01-07-1963', '', 0, 0, '085389687595', 1, 1, 17, 'KURANG DARI RP. 500.000', 'I', '6310024107630310'),
(663, 280, 'DAHLIA', 'KOTABARU', '10-08-1984', '', 0, 0, '081346555561', 1, 3, 17, 'RP. 500.000 - RP. 999.999', 'W', '6310045008840003'),
(664, 285, 'AHMAD RISKANI', 'BANJARMASIN', '01-06-1977', '', 0, 0, '085347785213', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310020106770002'),
(665, 285, 'SITI MOKOYAROH', 'SEPUNGGUR', '04-06-1978', '', 0, 0, '085393753837', 1, 1, 17, 'KURANG DARI RP. 500.000', 'I', '6310024406780002'),
(666, 285, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(667, 317, 'YEDRICK SENDE ', 'POLMAS', '10-10-1964', '', 0, 0, '085248503003', 2, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310011010540004'),
(668, 317, 'NOORHASANAH', 'BANJARMASIN', '15-09-1969', '', 0, 0, '085248504449', 2, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310014412690001'),
(669, 317, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(670, 303, 'JAPINTAR SIAHAAN', 'MEDAN', '04-02-1972', '', 0, 0, '081348049646', 2, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '63021504027220002'),
(671, 303, 'DERMAWAN POPY', 'MEDAN', '16-09-1975', '', 0, 0, '081350304600', 2, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6302155609750001'),
(672, 303, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(673, 208, 'HUSEIN', '', '', '', 0, 0, '', 0, 0, 0, '', 'A', ''),
(674, 208, 'KAMSIAH', 'BANJARMASIN', '17-08-1961', '', 0, 0, '-', 1, 1, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310095707610003'),
(675, 208, 'SYAMHUDI', 'BANJARMASIN', '19-09-1991', '', 0, 0, '085332118657', 1, 2, 15, 'RP. 2.000.000 - RP. 4.999.999', 'W', '-'),
(676, 299, 'SUKANDAR', 'SUKOHARJO', '08-10-1967', '', 0, 0, '085252301320', 1, 8, 10, '', 'A', '6310090810670005'),
(677, 299, 'SABARIAH', 'BATULICIN', '02-03-1970', '', 0, 0, '082255108347', 1, 7, 10, '', 'I', '6310094203700007'),
(678, 299, 'SUKANDAR', 'SUKOHARJO', '08-10-1967', '', 0, 0, '085252301320', 1, 8, 10, '', 'W', '6310090810670005'),
(679, 243, 'ARDIANSYAH', 'KOTA BARU', '10-04-1973', '', 0, 0, '085251027910', 1, 3, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091004730003'),
(680, 243, 'ARBAYAH', 'SEI KECIL', '01-03-1973', '', 0, 0, '081346827690', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310094103730009'),
(681, 243, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(682, 321, 'IMRON FAUZI', 'JEMBER', '01-01-1977', '', 0, 0, '081258341459', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090101770027'),
(683, 321, 'KUN MARYANI', 'NGANJUK', '12-01-1984', '', 0, 0, '081258341459', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310095201840005'),
(684, 321, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(685, 210, 'WIYONO', 'BANYUWANGI', '16-04-1970', '', 0, 0, '085822056407', 1, 2, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011604700001'),
(686, 210, 'MEGAWATI', 'RANGGAILUNG', '01-06-1974', '', 0, 0, '-', 1, 1, 12, '', 'I', '6310014106740002'),
(687, 210, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(688, 325, 'MUSTARI', 'INDRAMAYU', '04-04-1975', '', 0, 0, '085845636725', 1, 1, 2, 'RP. 500.000 - RP. 999.999', 'A', '6310090404750007'),
(689, 325, 'ROSYEANA', 'PALANGKARAYA', '28-08-1980', '', 0, 0, '', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310096808800007'),
(690, 325, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(691, 176, 'YANI YANSYAH', 'FLORES', '10-07-1972', '', 0, 0, ' -', 1, 2, 8, 'RP. 500.000 - RP. 999.999', 'A', '6302151007720001'),
(692, 176, 'SITI JARIYAH', 'KOTABARU', '10-07-1979', '', 0, 0, ' -', 1, 1, 8, 'RP. 500.000 - RP. 999.999', 'I', '6302155007790001'),
(693, 176, 'SITI SARINGATUN', 'STAGEN', '26-04-1981', '', 0, 0, '082153579186', 1, 2, 17, 'RP. 500.000 - RP. 999.999', 'W', '6310096604810004'),
(694, 305, 'RASWANTO', 'JAWATENGAH', '27-11-1976', '', 0, 0, '085332551067', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6302202711760002'),
(695, 305, 'HAYANI IDA', 'BANJARBARU', '10-02-1981', '', 0, 0, '082156068714', 1, 3, 12, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6302206002610002'),
(696, 305, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(697, 312, 'A. YURWIS ANWAR', 'WATANSOPPENG', '23-10-1979', '', 0, 0, '085349333456', 1, 3, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310012310790002'),
(698, 312, 'RENY SUMARNI TAUHID', 'BAUBAU', '10-10-1979', '', 0, 0, '085393151414', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310015010790003'),
(699, 312, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(700, 331, 'KAMIL NURDIN', 'SURABAYA', '05-01-1974', '', 0, 0, '081330666455', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090501740003'),
(701, 331, 'HAMSANIAH', 'BATULICIN', '05-08-1976', '', 0, 0, '085389262627', 1, 3, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310094508760001'),
(702, 331, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(703, 242, 'KURSANI', 'LIMBUR', '05-07-1976', '', 0, 0, '081348512224', 2, 7, 17, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090507760007'),
(704, 242, 'IKA', 'TANGKAN', '12-01-1977', '', 0, 0, '081253206586', 2, 0, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310095201770008'),
(705, 242, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(706, 333, 'UMAR AGUS SEMBODO', 'MAGELANG', '18-08-1978', '', 0, 0, '082157694076', 1, 3, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310051808780003'),
(707, 333, 'EKA GUNANDARI', 'KOTABARU', '16-05-1980', '', 0, 0, '087704377062', 1, 5, 6, 'RP. 500.000 - RP. 999.999', 'I', '6310055605800001'),
(708, 333, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(709, 240, 'ENDUN', 'CIAMIS', '20-03-1956', '', 0, 0, '', 1, 1, 8, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6302192003560001'),
(710, 240, 'CICIH', 'CIAMIS', '14-07-1961', '', 0, 0, '081250003391', 1, 1, 12, '', 'I', '6302195407610001'),
(711, 240, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(712, 334, 'BUDIANTO', 'KOTABARU', '13-08-1967', '', 0, 0, '087704524379', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '631005130867001'),
(713, 334, 'MASLIAH', 'SUNGAI LOBAN', '09-06-1976', '', 0, 0, '087704524379', 1, 1, 6, 'KURANG DARI RP. 500.000', 'I', '6310054906760001'),
(714, 334, 'BUDIANTO', 'KOTABARU', '13-08-1967', '', 0, 0, '087704524379', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'W', '6310051308670001'),
(715, 327, 'M.HUMAIDI', 'KUALA KAPUAS', '02-05-1976', '', 0, 0, '08125009123', 1, 3, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090205760010'),
(716, 327, 'NOOR HANI', 'KUALA KAPUAS', '25-06-1978', '', 0, 0, '-', 1, 3, 17, '', 'I', '6310096506780004'),
(717, 327, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(718, 336, 'YUDDING', 'PAGATAN', '25-04-2017', '', 0, 0, '-', 1, 1, 2, 'KURANG DARI RP. 500.000', 'A', '6310012503800001'),
(719, 336, 'HAMMANG', 'PAGATAN', '01-05-1978', '', 0, 0, '-', 1, 1, 2, 'KURANG DARI RP. 500.000', 'I', '63100141057800004'),
(720, 336, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(721, 337, 'HIDAYATULLAH', 'ENDE', '03-11-1979', '', 0, 0, '082155334422', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310020311790001'),
(722, 337, 'MURNIATI', 'PAGATAN', '01-07-1979', '', 0, 0, '082155334422', 1, 3, 17, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310024107790282'),
(723, 337, 'SITI RAUDAH', 'PAGATAN', '16-04-2000', '', 0, 0, '082155334422', 1, 3, 17, 'RP. 500.000 - RP. 999.999', 'W', '6310025604000004'),
(724, 82, 'A.SYAHRANI', 'SIAYUH', '01-12-1966', '', 0, 0, '081250706733', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310090112760005'),
(725, 82, 'JUMILAH', 'KOTABARU', '12-02-1979', '', 0, 0, '082154474503', 1, 3, 12, '', 'I', '6310095208790007'),
(726, 82, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(727, 283, 'SUTRISNO', 'TULUNG AGUNG', '01-05-1964', '', 0, 0, '081351333348', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310050105640002'),
(728, 283, 'JUMIATI', 'MADIUN', '01-02-1971', '', 0, 0, '083153280989', 1, 1, 12, 'KURANG DARI RP. 500.000', 'I', '6310054102710001'),
(729, 283, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(730, 262, 'YOHANIS DALLO', 'TANA TORAJA', '02-02-1967', '', 0, 0, '081349565655', 2, 6, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310011202670001'),
(731, 262, 'OTJE TANDIOGA', 'RANDANBATU', '22-10-1970', '', 0, 0, '081348395500', 2, 3, 6, 'KURANG DARI RP. 500.000', 'I', '6310016210700001'),
(732, 262, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(733, 255, 'H.RAHMATULLAH', 'PAGATAN', '01-01-1973', '', 0, 0, '085251451199', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310020101730008'),
(734, 255, 'HJ.ARIANI SUSANTI', 'KOTABARU', '23-11-1973', '', 0, 0, '082358769550', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'I', '6310096311730001'),
(735, 255, '-', '-', '', '', 0, 0, '-', 0, 0, 0, '', 'W', '-'),
(736, 319, 'H. MANSYAH', 'SABATI', '01-07-1945', '', 0, 0, '082159625105', 1, 1, 16, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090107450023'),
(737, 319, 'H.THAIBAH', 'AMUNTAI', '01-07-1971', '', 0, 0, '082159625105', 1, 1, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094107710102'),
(738, 319, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(739, 326, 'NASIRUN', 'KLATEN', '18-11-1971', '', 0, 0, '081351393354', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302201811710002'),
(740, 326, 'TRI WAHYUNI', 'KOTABARU', '02-05-1984', '', 0, 0, '082113304752', 1, 2, 12, '', 'I', '6302204205640002'),
(741, 326, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(742, 149, 'H. MAHYUDIN', 'AMUNTAI', '05-06-1976', '', 0, 0, '082158946604', 1, 3, 0, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310090506760007'),
(743, 149, 'H. NURYANI', 'AMUNTAI', '25-11-1971', '', 0, 0, '082158946604', 1, 1, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310096511710004'),
(744, 149, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(745, 316, 'RIYANTO ARI WIBOWO', 'SURAKARTA', '09-01-1968', '', 0, 0, '082141073659', 1, 3, 3, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6302190901680002'),
(746, 316, 'SAMSIATUN', 'TRENGGALEK', '03-04-1971', '', 0, 0, '+6281348157961', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6302194304710001'),
(747, 316, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(748, 74, 'NASRULLAH', 'KOTABARU', '10-01-1975', '', 0, 0, '081349685339', 1, 2, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310061001750001'),
(749, 74, 'SITI ASIAH', 'KOTABARU', '07-09-1977', '', 0, 0, '081349685339', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310064709770001'),
(750, 74, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(751, 73, 'TRI ADIANTO', 'BATANG', '26-01-1977', '', 0, 0, '081351562173', 1, 3, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310092601770001'),
(752, 73, 'EMMY SUSILIYA', 'KOTABARU', '17-07-1980', '', 0, 0, '085252543490', 1, 7, 17, 'RP. 500.000 - RP. 999.999', 'I', '6310095707800011'),
(753, 73, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(754, 318, 'SYARWANIE, SE', 'MARTAPURA', '15-05-1965', '', 0, 0, '081349009503', 1, 7, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310091505650006'),
(755, 318, 'AGUSTINI ARYANI, S. PD', 'BANJARMASIN', '08-08-1966', '', 0, 0, '08115115363', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310094808660002'),
(756, 318, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(757, 138, 'MUHAMMAD SAHIDIN', 'CIREBON', '09-02-1979', '', 0, 0, '08125186044', 1, 3, 10, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310010902790001'),
(758, 138, 'RUSMIDA ARIYANI', 'BARABAI', '21-06-1981', '', 0, 0, '08115182644', 1, 3, 16, 'RP. 2.000.000 - RP. 4.999.999', 'I', '6310016106810001'),
(759, 138, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(760, 108, 'RUDI', 'BINUANG', '07-12-1976', '', 0, 0, '081348259965', 1, 1, 15, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310061011150014'),
(761, 108, 'ZAKIYAH', 'BINUANG', '02-06-1982', '', 0, 0, '081250183090', 1, 1, 15, 'KURANG DARI RP. 500.000', 'I', '6310094206820003'),
(762, 108, 'HAMSAN', 'RANTAU', '18-08-1960', '', 0, 0, '085345715566', 1, 1, 15, 'RP. 500.000 - RP. 999.999', 'W', '6310091808600005'),
(763, 221, 'M. ARZAKI', 'ALABIO', '05-05-1982', '', 0, 0, '085251111441', 1, 1, 15, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090505820009'),
(764, 221, 'SANIAH', 'BATOLA', '13-04-1983', '', 0, 0, '-', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310095304830002'),
(765, 221, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(766, 111, 'JUMRANI', 'PAGATAN', '03-03-1962', '', 0, 0, '081253163912', 1, 5, 15, 'RP. 5.000.000 - RP. 20.000.000', 'A', '6310020303620002'),
(767, 111, 'JURIANI', 'PAGATAN', '01-01-1972', '', 0, 0, '082254760584', 1, 1, 15, 'RP. 500.000 - RP. 999.999', 'I', '6310024101720008'),
(768, 111, 'LINDA LUSIANA', 'PAGATAN', '16-07-1989', '', 0, 0, '082154436244', 1, 7, 15, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6310025607890002'),
(769, 241, 'SUPARTO MAMONTO', 'MANADO', '04-05-1958', '', 0, 0, '-', 1, 3, 0, '', 'A', '-'),
(770, 241, 'DIAN LAILA', 'CIAMIS', '16-09-1983', '', 0, 0, '085252802244', 1, 2, 12, 'KURANG DARI RP. 500.000', 'I', '6310095609830002'),
(771, 241, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(772, 335, 'MUSTAQIM S.PDI', 'KOTA BARU', '16-03-1963', '', 0, 0, '081348859490', 1, 7, 10, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6310091603630003'),
(773, 335, 'NORJANNAH', 'DS.MANDINGIN', '16-07-1968', '', 0, 0, '-', 1, 3, 12, 'KURANG DARI RP. 500.000', 'I', '6310095607680003'),
(774, 335, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(775, 301, 'ERDIANTO RISTI WAHYUDI', 'AMUNTAI', '03-04-1968', '', 0, 0, '082352154221', 1, 3, 3, 'RP. 1.000.000 - RP. 1.999.999', 'A', '6310090304680006'),
(776, 301, 'ANIE ', 'TANJUNG SELOR', '08-04-1979', '', 0, 0, '081347843415', 1, 3, 12, '', 'I', '6310094804790004'),
(777, 301, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', ''),
(778, 96, 'ERWIN NOOR', 'TANJUNG SELOKA', '27-07-1975', '', 0, 0, '085245668228', 1, 6, 3, 'RP. 2.000.000 - RP. 4.999.999', 'A', '6302202707750002'),
(779, 96, 'GUSTI SETIA WATI', 'KOTABARU', '16-05-1981', '', 0, 0, '085346022230', 1, 3, 17, 'KURANG DARI RP. 500.000', 'I', '6302205605810003'),
(780, 96, 'ERWIN NOOR', 'TANJUNG SELOKA', '27-07-1975', '', 0, 0, '085245668228', 1, 6, 3, 'RP. 2.000.000 - RP. 4.999.999', 'W', '6302202707750002'),
(781, 344, 'HJASD', 'JH', '31-05-2017', '', 0, 0, '', 0, 0, 0, '', 'A', 'jh'),
(782, 344, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'I', ''),
(783, 344, '', '', '', '', 0, 0, '', 0, 0, 0, '', 'W', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_data_prestasi`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_data_prestasi` (
  `reg_data_prestasi_id` int(11) NOT NULL,
  `reg_data_prestasi_reg_akun_id` int(11) NOT NULL,
  `reg_data_prestasi_indek` varchar(1) NOT NULL,
  `reg_data_prestasi_nama` varchar(100) NOT NULL,
  `reg_data_prestasi_thn` varchar(20) NOT NULL,
  `reg_data_prestasi_jenis_prestasi` varchar(100) NOT NULL,
  `reg_data_prestasi_tingkat` varchar(100) NOT NULL,
  `reg_data_prestasi_juara` varchar(1) NOT NULL,
  `reg_data_prestasi_penyelenggara` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_reg_data_prestasi`
--

INSERT INTO `tbl_reg_data_prestasi` (`reg_data_prestasi_id`, `reg_data_prestasi_reg_akun_id`, `reg_data_prestasi_indek`, `reg_data_prestasi_nama`, `reg_data_prestasi_thn`, `reg_data_prestasi_jenis_prestasi`, `reg_data_prestasi_tingkat`, `reg_data_prestasi_juara`, `reg_data_prestasi_penyelenggara`) VALUES
(1, 2, '1', 'CIPTA CERPEN', '2016', 'SENI', 'Kabupaten', '2', 'KANTOR PERPUSTAKAAN'),
(2, 29, '1', 'TARTILLUL QUR''AN PUTRI', '2013', 'SENI', 'Sekolah', '3', 'PANITIA HARI BESAR ISLAM'),
(3, 29, '2', 'SENI BACA AL-QUR''AN PUTRI', '2016', 'SENI', 'Kecamatan', '1', ' PANITIA FLS2N'),
(4, 29, '3', 'SENI BACA AL-QUR''AN PUTRI', '2016', 'SENI', 'Kabupaten', '3', 'PANITIA FLS2N'),
(5, 31, '1', 'FESTIVAL DAN LOMBA SENI SISWA NASIONAL', '2016', 'SENI', 'Kecamatan', '2', 'FLS2N'),
(6, 26, '1', 'LOMBA MENGARANG CERPEN', '2015', 'SENI', 'Kabupaten', '3', 'KEPALA KANTOR PERPUSTAKAAN, ARSIP DAN DOKUMENTASI DAERAH'),
(7, 26, '2', 'KEGIATAN BEDAH BUKU SE-KABUPATE ', '2015', 'SENI', 'Kabupaten', '3', 'PUSTARDOKDA'),
(8, 5, '1', 'KARATE', '2014', 'OLAH RAGA', 'Kabupaten', '3', 'KEJUARAAN KARATE INKAI PIALA DANDIM 1022 CUP.I'),
(9, 5, '2', 'KARATE', '2013', 'OLAH RAGA', 'Provinsi', '3', 'ALL- INKAI NATIONAL KARATE CHAMPIONSHIP '),
(10, 5, '3', 'KARATE', '2012', 'OLAH RAGA', 'Kecamatan', '3', 'SELEKSI ALTET UNTUK KEJUARAAN NASIONAL SBY CUP KE IX DAN PIALA SKOCI 989 DI JAKARTA '),
(11, 58, '1', 'MEDALI PERUNGGU OSN SMP MTK', '2016', 'SAINS', 'Nasional', '3', 'DEPDIKNAS '),
(12, 58, '2', 'JUARA UMUM KELAS IX', '2016', 'SAINS', 'Sekolah', '1', 'SEKOLAH'),
(13, 58, '3', 'JUARA 2 LOMBA ROKET AIR KALPHYCO', '2015', 'SAINS', 'Provinsi', '2', 'HIMAFI FMIPA ULM'),
(14, 72, '1', 'JAMBORE CABANG', '2015', 'OLAH RAGA', 'Kabupaten', '', 'KWARTIR CABANG'),
(15, 72, '2', 'PASKIBRA SEKOLAH', '2016', 'OLAH RAGA', 'Kecamatan', '', 'SMA TARUNA'),
(16, 72, '3', 'LOMBA TINGKAT II PRAMUKA', '2016', 'OLAH RAGA', 'Kecamatan', '1', 'KWARAN BATULICIN'),
(17, 38, '1', 'CATUR', '2015', 'OLAH RAGA', 'Kabupaten', '2', 'O2SN'),
(18, 38, '2', 'CATUR', '2016', 'OLAH RAGA', 'Kabupaten', '3', 'O2SN'),
(19, 49, '1', 'KEJUARAAN KARATE PROVINSI KALIMANTAN SELATAN WALIKOTA BANJARMASIN CUP III 2017', '2017', 'OLAH RAGA', 'Provinsi', '1', 'WALIKOTA BANJARMASIN  CUP III 2017'),
(20, 49, '2', 'KEJUARAAN KARATE TERBUKA NASIONAL INKAI SEKOCI 989 DI JAKARTA', '2012', 'OLAH RAGA', 'Nasional', '1', 'SUSILO BAMBANG YUDHOYONO KE-1X'),
(21, 49, '3', 'KATA BEREGU KEJUARAAN NASIONAL DI JAKARTA', '2012', 'OLAH RAGA', 'Nasional', '1', 'SUSILO BAMBANG YUDHOYONO'),
(22, 36, '1', 'FUTSAL', '2016', 'OLAH RAGA', 'Sekolah', '2', 'SMP 1 SIMPANG EMPAT'),
(23, 36, '2', 'FUTSAL', '2016', 'OLAH RAGA', 'Kabupaten', '2', 'BATULICIN ADUHAY'),
(24, 36, '3', 'FUTSAL', '2016', 'OLAH RAGA', 'Kabupaten', '2', 'GPB'),
(25, 84, '1', 'VOCAL GROUP', '2016', 'SENI', 'Kabupaten', '3', 'DINAS PENDIDIKAN'),
(26, 90, '1', 'PASKIBRA', '2015', 'OLAH RAGA', 'Kecamatan', '1', 'SMAN 1 SIMPANG EMPAT'),
(27, 90, '2', 'JAMBORE NASIONAL', '2016', 'SENI', 'Provinsi', '1', 'KWARTIR  NASIONAL'),
(28, 104, '1', 'PENCAK SILAT', '2016', 'OLAH RAGA', 'Kecamatan', '2', 'O2SN'),
(29, 50, '1', 'PASKIBRA', '2016', 'SENI', 'Sekolah', '1', 'SMA TARUNA'),
(30, 50, '2', 'PIK REMAJA', '2016', 'SAINS', 'Kabupaten', '1', 'DINAS BKKBN'),
(31, 50, '3', 'TARI', '2016', 'SENI', 'Kabupaten', '3', 'DINAS BKKBN'),
(32, 109, '1', 'JAMBORE NASIONAL X', '2016', 'SENI', 'Nasional', '', 'KWARTIR NASIONAL GERAKAN PRAMUKA'),
(33, 109, '2', 'JAMBORE DAERAH', '2015', 'SENI', 'Provinsi', '', 'KWARTIR DAERAH GERAKAN PRAMUKA '),
(34, 109, '3', 'MTQ NASIONAL XIII', '2016', 'SENI', 'Kecamatan', '', 'MTQ NASIONAL XIII TINGKAT KECAMATAN'),
(35, 43, '1', 'LOMBA O2SN MENULIS MENGARANG CERPEN', '2016', 'SENI', 'Kabupaten', '', 'ANTAR SEKOLAH'),
(36, 19, '1', 'CIPTA LAGU', '2016', 'SENI', 'Kabupaten', '1', 'KEPALA DINAS PENDIDIKAN KABUPATEN TANAH BUMBU '),
(37, 19, '2', 'CIPTA LAGU', '2016', 'SENI', 'Provinsi', '1', 'KEPALA DINAS PENDIDIKAN PROVINSI KALIMANTAN SELATAN '),
(38, 10, '1', 'FUTSAL', '2016', 'OLAH RAGA', 'Kabupaten', '1', 'SMK AL-HIDAYAH BATULICIN'),
(39, 10, '2', 'FUTSAL', '2015', 'OLAH RAGA', 'Sekolah', '1', 'SMPN 1 BATULICIN'),
(40, 8, '1', 'PIDATO', '2016', 'SENI', 'Sekolah', '1', 'SEKOLAH'),
(41, 134, '1', 'LOMBA SKJ', '2015', 'OLAH RAGA', 'Sekolah', '1', 'OSIS MTS DARUL AZHAR'),
(42, 114, '1', 'PENCAK SILAT', '2015', 'OLAH RAGA', 'Kecamatan', '1', 'KEC.BATULICIN'),
(43, 114, '2', 'PENCAK SILAT', '2016', 'OLAH RAGA', 'Kabupaten', '1', 'KABUPATEN'),
(44, 102, '1', 'BOLA VOLI', '2014/2015', 'OLAH RAGA', 'Kecamatan', '2', 'O2SN'),
(45, 142, '1', 'CIPTA CERPEN BERBAHASA INDONESIA', '2015', 'SENI', 'Kabupaten', '1', 'O2SN '),
(46, 150, '1', 'KEJUARAAN PROVINSI IKATAN OLAHRAGA DANCESPORT INDONESIA', '2017', 'OLAH RAGA', 'Provinsi', '3', 'IODI KALSEL'),
(47, 150, '2', 'BARIS BERBARIS', '2015', 'OLAH RAGA', 'Kabupaten', '1', 'SMAN 1 SIMPANG EMPAT'),
(48, 150, '3', 'PENCAK SILAT', '2015', 'OLAH RAGA', 'Kecamatan', '2', 'DINAS PENDIDIKAN'),
(49, 146, '1', 'PANCAK SILAT', '2016', 'OLAH RAGA', 'Kabupaten', '1', 'POPDA'),
(50, 146, '2', 'PANCAK SILAT', '2016', 'OLAH RAGA', 'Provinsi', '1', 'POPDA'),
(51, 39, '1', 'VOLLY PUTRI', '2016', 'OLAH RAGA', 'Kecamatan', '1', 'PANITIA O2SN'),
(52, 39, '2', 'PUISI', '2015', 'SENI', 'Sekolah', '2', 'SMA NEGERI 1 SIMPANG EMPAT'),
(53, 63, '1', 'KREATIVITAS SENI TARI', '2015', 'SENI', 'Kecamatan', '1', 'KECAMATAN'),
(54, 63, '2', 'SENI TARI TRADISIONAL', '2015', 'SENI', 'Kabupaten', '1', 'KABUPATEN'),
(55, 100, '1', 'JAMBORE CABANG ', '2015', '', 'Kabupaten', '', 'KABUPATEN'),
(56, 100, '2', 'JAMBORE DAERAH', '2015', '', 'Provinsi', '', 'PROPINSI'),
(57, 100, '3', 'JAMBORE NASIONAL', '2016', '', 'Nasional', '', 'NASIONAL'),
(58, 169, '1', 'SENAM SKJ 2012', '2017', 'OLAH RAGA', 'Kabupaten', '3', 'KAB. TANAH BUMBU'),
(59, 169, '2', 'LT 2 (LOMBA TINGKAT)', '2016', '', 'Kecamatan', '1', 'KEC. SIMPANG EMPAT'),
(60, 169, '3', 'LOMBA BARIS BERBARIS', '2015', '', 'Kabupaten', '3', 'SMAN1 SIMPANG EMPAT'),
(61, 97, '1', 'STORY TELLING', '2015', 'SENI', 'Kecamatan', '3', 'FLSN '),
(62, 172, '1', 'MAULID HABSYI', '2013', 'SENI', 'Kecamatan', '3', 'PARTAI GOLKAR'),
(63, 175, '1', 'TARTIL', '2011', 'SENI', 'Sekolah', '1', 'KEMENTRIAN AGAMA'),
(64, 175, '2', 'SARITILAWAH', '2011', 'SENI', 'Sekolah', '1', 'KEMENTRIAN AGAMA'),
(65, 175, '3', 'PIDATO', '2011', 'SENI', 'Sekolah', '1', 'KEMENTRIAN AGAMA'),
(66, 177, '1', 'DRUMBAND ', '2016/2017', '', 'Kabupaten', '1', ''),
(67, 94, '1', 'BOLA VOLLY', '2015', 'OLAH RAGA', 'Sekolah', '3', 'O2SN'),
(68, 188, '1', 'VOCAL GRUP', '2016', 'SENI', 'Kabupaten', '3', 'DINAS PENDIDIKAN'),
(69, 189, '1', 'KALIGRAFI PUTRI', '2015', 'SENI', 'Sekolah', '3', 'MTS DARUL AZHAR'),
(70, 191, '1', 'TARI', '2015', 'SENI', 'Kabupaten', '4', 'SRI MANINGSIH, S.PD'),
(71, 110, '1', 'OLIMPIADE SAINS NASIONAL', '2016 ', 'SAINS', 'Kabupaten', '3', 'DINAS PENDIDIKAN'),
(72, 110, '2', 'LOMBA MENULIS NASKAH DRAMA', '2015', 'SENI', 'Provinsi', '3', 'DEWAN KESENIAN KOTA BANJARBARU'),
(73, 110, '3', 'JAMBORE NASIONAL X 2016', '2016', 'SENI', 'Provinsi', '3', 'KWARTIR NASIONAL GERAKAN PRAMUKA'),
(74, 124, '1', 'TENIS MEJA', '2016', 'OLAH RAGA', 'Sekolah', '2', 'SEKOLAH'),
(75, 124, '2', 'HIFZIL QUR''AN HAFIDZAH 1 JUZ', '2015', 'SENI', 'Kecamatan', '2', 'PENYELANGGARA MTQ NASIONAL XXIX'),
(76, 124, '3', 'HIFZIL QURAN', '2014', 'SENI', 'Kecamatan', '2', 'PENYELENGGARA MTQ NASIONAL XXVIII'),
(77, 218, '1', 'LOMBA DESAIN MOTIF BATIK', '2016', 'SENI', 'Kecamatan', '1', 'DINAS PENDIDIKAN '),
(78, 218, '2', 'LOMBA DESAIN MOTIF BATIK', '2016', 'SENI', 'Kabupaten', '3', 'DINAS PENDIDIKAN '),
(79, 207, '1', 'LOMBA DESAIN POSTER', '2016', 'SENI', 'Kecamatan', '1', 'DINAS PENDIDIKAN KECAMATAN SIMPANG EMPAT'),
(80, 207, '2', 'LOMBA DESAIN POSTER', '2016', 'SENI', 'Kabupaten', '2', 'DINAS PENDIDIKAN KABUPATEN TANAH BUMBU'),
(81, 155, '1', 'PERAIH NILAI TERBAIK DUA', '2014/2015', 'SAINS', 'Sekolah', '2', 'SMPN 8 BANJARBARU'),
(82, 220, '1', 'TARI', '2015', 'SENI', 'Kecamatan', '1', 'SRI MAHANINGSIH, S.PD'),
(83, 220, '2', 'BADMINTON', '2016', 'OLAH RAGA', 'Kecamatan', '1', 'RAHMADI, S.PD'),
(84, 130, '1', 'PALANG MERAH REMAJA', '2015', 'OLAH RAGA', 'Kabupaten', '1', 'DRS GUSTI HIDAYAT'),
(85, 219, '1', 'FUTSAL', '2016', 'OLAH RAGA', 'Sekolah', '2', 'MTS DDI'),
(86, 219, '2', 'PESANTREN KILAT', '2016', 'SENI', 'Kabupaten', '2', 'KEMENTRIAN AGAMAMA REPUBLIK INDONESIA'),
(87, 223, '1', 'CABOR KARATE', '2016', 'OLAH RAGA', 'Provinsi', '2', 'DANREM'),
(88, 223, '2', 'CABOR KARATE', '2017', 'OLAH RAGA', 'Kabupaten', '2', 'POPDA'),
(89, 223, '3', 'CABOR KARATE', '2017', 'OLAH RAGA', 'Provinsi', '2', 'POPDA'),
(90, 227, '1', 'BACA PUISI', '2015', 'SENI', 'Kecamatan', '1', 'RAHMADI, S.PD'),
(91, 229, '1', 'PRAMUKA', '2015', 'OLAH RAGA', 'Sekolah', '1', 'SAMRIAH,S.PD'),
(92, 229, '2', 'PRAMUKA', '2015', 'OLAH RAGA', 'Kecamatan', '4', 'SYAMSUDDIN,S.SOS M.M'),
(93, 234, '1', 'FUTSAL', '2017', 'OLAH RAGA', 'Sekolah', '1', 'AHMAD,SPD.I'),
(94, 234, '2', 'PRAMUKA', '2016', 'SENI', 'Sekolah', '1', 'MUHAMMAD YUSUF S,PD,MM'),
(95, 234, '3', 'PRAMUKA', '2017', 'SENI', 'Sekolah', '1', 'MUHAMMAD YUSUF S,PD,MM'),
(96, 236, '1', 'MENARI', '2016', 'SENI', 'Sekolah', '4', 'FLS2N'),
(97, 239, '1', 'PENCAK SILAT', '2014', 'OLAH RAGA', 'Kecamatan', '2', 'O2SN'),
(98, 197, '1', 'VOLLY BALL', '2016', 'OLAH RAGA', 'Sekolah', '1', 'OSIS MTS DDI KERSIK PUTIH'),
(99, 197, '2', 'LOMBA DA''WAH', '2016', 'SENI', 'Sekolah', '2', 'MTS DDI KERSIK PUTIH'),
(100, 182, '1', 'KEJUARAAN KARATE"PIALA H.SYAIFULLAH', '2015', 'OLAH RAGA', 'Provinsi', '2', 'PENGPROV FORKI KAL-SEL'),
(101, 182, '2', 'PEKAN OR PELAJAR DAERAH', '2015', 'OLAH RAGA', 'Kabupaten', '2', 'DISPORA TANBU'),
(102, 182, '3', 'O2SN KARATE', '2016', 'OLAH RAGA', 'Kabupaten', '1', 'DINAS PENDIDIKAN'),
(103, 196, '1', 'FUTSAL', '2017', 'OLAH RAGA', 'Sekolah', '1', 'AHMAD,S.PD.I'),
(104, 196, '2', 'VOLLI', '2017', 'OLAH RAGA', 'Sekolah', '1', 'AHMAD,S.PD.I'),
(105, 112, '1', 'TENIS MEJA', '2016', 'OLAH RAGA', 'Kabupaten', '4', 'KOTABARU'),
(106, 112, '2', 'TENIS MEJA', '2016', 'OLAH RAGA', 'Sekolah', '4', 'SMPS MATALOK ESTATE'),
(107, 112, '3', 'TENIS MEJA', '2016', 'OLAH RAGA', 'Sekolah', '4', 'SMPS MATALOK ESTATE'),
(108, 217, '1', 'PRAMUKA', '2015', 'OLAH RAGA', 'Kabupaten', '1', 'KWARTIR DAERAH'),
(109, 217, '2', 'PRAMUKA', '2015', 'OLAH RAGA', 'Kecamatan', '4', 'KWARTIR CABANG'),
(110, 183, '2', 'PERINGKAT KELAS', '2016', '', 'Sekolah', '', ''),
(111, 254, '1', 'STORY TELLING', '2016', 'SENI', 'Kecamatan', '3', 'FLS2N'),
(112, 217, '3', 'PRAMUKA', '2016', 'OLAH RAGA', 'Provinsi', '1', 'KWARTIR NASIONAL'),
(113, 268, '1', 'PERAGAAN BARIS BERBARIS', '2012', 'OLAH RAGA', 'Nasional', '1', 'KEPALA KORPS LALU LINTAS POLRI'),
(114, 268, '2', 'BARIS BERBARIS', '2015', 'OLAH RAGA', 'Kabupaten', '1', 'SMAN 1 SIMPANG EMPAT'),
(115, 268, '3', 'BARIS BERBARIS', '2012', 'OLAH RAGA', 'Provinsi', '1', 'KEPALA SPN BANJARBARU'),
(116, 276, '1', 'FLS2N KREATIVITAS SENI TARI', '2016', 'SENI', 'Kabupaten', '1', 'DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KAB. SERUYAN'),
(117, 276, '2', 'FLS2N KREATIVITAS SENI TARI', '2015', 'SENI', 'Provinsi', '2', 'DINAS PENDIDIKAN PROV. KALIMANTAN TENGAH'),
(118, 276, '3', 'FLS2N KREATIVITAS SENI TARI', '2016', 'SENI', 'Provinsi', '3', 'DINAS PENDIDIKAN PROV. KALIMANTAN TENGAH'),
(119, 131, '1', 'JAMBORE NASIONAL', '2016', '', 'Nasional', '', 'NASIONAL'),
(120, 131, '2', 'JAMBORE DAERAH', '2015', '', 'Provinsi', '', 'PROPINSI'),
(121, 131, '3', 'JAMBORE CABANG', '2015', '', 'Kabupaten', '', 'KABUPATEN'),
(122, 279, '1', 'OFL2SN', '2016', 'SAINS', 'Kabupaten', '4', '-'),
(123, 279, '2', 'O2SN', '2016', 'OLAH RAGA', 'Kecamatan', '4', '-'),
(124, 279, '3', 'SELEKSI', '2016', 'SAINS', 'Sekolah', '4', 'SEKOLAH'),
(125, 265, '1', 'DRUM BAND', '2016', 'SENI', 'Kabupaten', '1', 'PANITIA PGRI'),
(126, 265, '2', 'SINOMAN HADRAH', '2017', 'SENI', 'Sekolah', '1', 'MTS DARUL AZHAR'),
(127, 265, '3', 'MAULID HABSYI', '2016', 'SENI', 'Sekolah', '2', 'MTS DARUL AZHAR'),
(128, 115, '1', 'BADMINTON', '2016', 'OLAH RAGA', 'Sekolah', '1', 'OSIS'),
(129, 39, '3', 'VOLLY PUTRI', '2016', 'OLAH RAGA', 'Kabupaten', '3', 'SMK AL-HIDAYAH BATULICIN'),
(130, 65, '1', '-', '', '', '', '', ''),
(131, 65, '2', '-', '', '', '', '', ''),
(132, 65, '3', '-', '', '', '', '', ''),
(133, 128, '1', 'LOMBA CERDAS CERMAT ', '2016', 'SAINS', 'Kecamatan', '3', 'SMAN 1 SIMPANG EMPAT'),
(134, 128, '2', 'KUIS KIHAJAR', '2016', 'SAINS', 'Provinsi', '2', 'BTIKP KALSEL'),
(135, 91, '1', 'JAMBORE NASIONAL', '2016', 'SENI', 'Nasional', '', 'KWARTIR NASIONAL'),
(136, 91, '2', 'JAMBORE DAERAH', '2015', 'SENI', 'Provinsi', '', 'KWARTIR DAERAH'),
(137, 91, '3', 'JAMBORE NASIONAL', '2016', '', 'Nasional', '', 'KWARTIR NASIONAL'),
(138, 259, '1', 'FLS2N CABANG SENI BACA AL-QURAN ', '2015', 'SENI', 'Kecamatan', '2', 'UPK KECAMATAN KUSAN HILIR'),
(139, 259, '2', 'MTQ NASIONAL XXIX CABANG SYARHIL QUR''AN', '2015', 'SENI', 'Kecamatan', '2', 'LPTQ KECAMATAN BATULICIN'),
(140, 259, '3', 'PESERTA JAMBORE NASIONAL KE-X', '2016', 'SAINS', 'Nasional', '', 'KWARTIR NASIONAL GERAKAN PRAMUKA INDONESIA'),
(141, 300, '1', 'FUTSAL', '2016', 'OLAH RAGA', 'Sekolah', '2', 'SEKOLAH'),
(142, 103, '1', 'CERDAS CERMAT', '2016', 'SAINS', 'Sekolah', '3', 'SMAN 1 SIMPANG EMPAT'),
(143, 304, '1', 'SELEKSI O2SN TINGKAT SMP KECAMATAN SIMPANG EMPAT', '2016', 'OLAH RAGA', 'Kecamatan', '1', 'DINAS PENDIDIKAN'),
(144, 304, '2', 'NAMA PRESTASI', 'Tahun', '', '', '', 'PENYELENGGARA'),
(145, 304, '3', 'NAMA PRESTASI', 'Tahun', '', '', '', 'PENYELENGGARA'),
(146, 307, '1', 'LOMBA MENGARANG CERPEN TINGKAT SMP', '2016', 'SAINS', 'Kabupaten', '1', 'KANTOR PERPUSTAKAAN DAN DOKUMENTASI DAERAH PEMERINTAH KABUPATEN TANAH BUMBU'),
(147, 14, '1', '0', '', '', '', '', ''),
(148, 14, '2', '0', '', '', '', '', ''),
(149, 14, '3', '0', '', '', '', '', ''),
(150, 0, '1', 'PESERTA JAMBORE DAERAH SE-KALIMANTAN SELATAN', '2016', '', 'Provinsi', '', 'KWARTIR DAERAH KALIMANTAN SELATAN'),
(151, 0, '2', 'LOMBA KKR/SEKOLAH SEHAT', '2017', '', 'Provinsi', '3', 'DINAS KESEHATAN'),
(152, 0, '3', 'PESERTA JAMBORE NASIONAL SE-INDONESIA', '2017', '', 'Nasional', '', 'KWARTIR NASIONAL INDONESIA'),
(153, 71, '1', 'PESERTA JAMBORE DAERAH SE-KALIMANTAN SELATAN', '2016', '', 'Provinsi', '', 'KWARTIR DAERAH KALIMANTAN SELATAN'),
(154, 71, '2', 'LOMBA KKR/SEKOLAH SEHAT', '2017', '', 'Provinsi', '', 'DINAS KESEHATAN'),
(155, 71, '3', 'PESERTA JAMBORE NASIONAL SE-INDONESIA', '2017', '', 'Nasional', '', 'KWARTIR NASIONAL INDONESIA'),
(156, 1, '1', 'SERTIFIKAT KETUA OSIS', '2017', '', 'Sekolah', '', 'PIHAK SEKOLAH'),
(157, 1, '2', 'SERTIFIKAT JUARA UMUM SISWA BERPRESTASI', '2017', 'SAINS', 'Sekolah', '1', 'SEKOLAH'),
(158, 1, '3', ' ', '', '', '', '', ' '),
(159, 298, '1', 'KARATE KUMITE PUTRI', '2015', 'OLAH RAGA', 'Kecamatan', '1', 'O2SN-FLSN KUSAN HILIR'),
(160, 298, '2', 'KARATE KUMITE PUTRI', '2017', 'OLAH RAGA', 'Kabupaten', '1', 'DISPORPAR TANAH BUMBU'),
(161, 298, '3', 'KARATE KUMITE PUTRI', '2016', 'OLAH RAGA', 'Provinsi', '3', 'DANREM 101/ANT CUP I KALSEL'),
(162, 280, '1', 'LOMBA MORSE', '2016', 'SAINS', 'Sekolah', '1', 'SMPN 4 KUSAN HILIR'),
(163, 280, '2', 'JAMBORE RANTING', '2015', 'SAINS', 'Sekolah', '3', 'KWARTIR RANTING KUSAN HILIR'),
(164, 280, '3', 'JAMBORE CABANG', '2015', 'SAINS', 'Kecamatan', '3', 'KWARTIR CABANG TANAH BUMBU'),
(165, 285, '1', 'JAMBORE RANTING', '2015', 'SAINS', 'Sekolah', '3', 'KWARTIR RANTING KUSAN HILIR'),
(166, 285, '2', 'JAMBORE CABANG', '2015', 'SAINS', 'Kecamatan', '3', 'KWARTIR CABANG TANAH BUMBU'),
(167, 317, '1', 'PANAHAN ', '2016', 'OLAH RAGA', 'Provinsi', '1', 'INVITASI POPDA'),
(168, 317, '2', 'VOKAL GRUP ', '2016', 'SENI', 'Kecamatan', '3', 'O2SN'),
(169, 210, '1', 'LOMBA BALAP SEPEDA', '2016', 'OLAH RAGA', 'Kabupaten', '1', 'CLUB SEPEDA TRACX'),
(170, 325, '1', 'LOMBA CERDAS CERMAT', '2016', '', 'Sekolah', '1', 'MTS NURUL HIDAYAH'),
(171, 176, '1', 'KEGIATAN O2SN DAN FLS2N TAHUN 2013', '2013', 'OLAH RAGA', 'Sekolah', '1', 'OLIMPIADE OLAHRAGA DAN SAINS SEKOLAH'),
(172, 312, '1', 'CERDAS CERMAT', '2016', 'SAINS', 'Sekolah', '3', 'SMAN 1 SIMPANG EMPAT'),
(173, 331, '1', 'PIAGAM PRAMUKA JAMBORE RANTING', '2015', 'SENI', 'Kecamatan', '1', 'KWARTIR RANTING BATULICIN'),
(174, 331, '2', 'PIAGAM PRAMUKA JAMBORE CABANG', '2016', 'SENI', 'Kabupaten', '1', 'KWARTIR CABANG TANAH BUMBU'),
(175, 331, '3', 'SERTIFIKAT PRAMUKA TRAP', '2016', 'SENI', 'Sekolah', '1', 'SMPN 1 NEGERI BATULICIN'),
(176, 317, '3', 'DANSA', '2017', 'SENI', 'Provinsi', '3', 'KEJUPROV'),
(177, 333, '1', 'STORYTELLING', '2015', 'SENI', 'Sekolah', '2', 'SMPN 2 KUSAN HULU'),
(178, 240, '1', 'STORY TELLING', '2015', 'SENI', 'Provinsi', '3', 'DINAS PENDIDIKAN'),
(179, 240, '2', 'STORY TELLING', '2015', 'SENI', 'Kabupaten', '1', 'DINAS PENDIDIKAN '),
(180, 240, '3', 'FAHMIL QURAN', '2016', 'SENI', 'Kecamatan', '1', 'LPTQ'),
(181, 334, '1', 'KARATE', '2015', 'OLAH RAGA', 'Kabupaten', '2', 'POPDA'),
(182, 334, '2', 'KARATE', '2015', 'OLAH RAGA', 'Kecamatan', '2', 'O2SN'),
(183, 334, '3', 'KARATE', '2016', 'OLAH RAGA', 'Kecamatan', '2', 'O2SN'),
(184, 336, '1', '-', '', '', '', '', '-'),
(185, 336, '2', '-', '', '', '', '', '-'),
(186, 336, '3', '-', '', '', '', '', '-'),
(187, 337, '1', 'PRAMUKA', '2016', 'SENI', 'Kecamatan', '3', 'PIONERING'),
(188, 337, '2', 'PRAMUKA', '2017', 'SENI', 'Sekolah', '2', 'PIONERING'),
(189, 337, '3', 'PRAMUKA', '2017', 'SENI', 'Sekolah', '2', 'LOMBA TINGKAT'),
(190, 283, '1', 'PENCAK SILAT', '2015', 'OLAH RAGA', 'Kabupaten', '1', 'O2SN'),
(191, 283, '2', 'SEPAK BOLA', '2015', 'OLAH RAGA', 'Kecamatan', '1', 'PGRI'),
(192, 255, '1', 'PENCAK SILAT SENI TUNGGAL PUTRI', '2016', 'OLAH RAGA', 'Kabupaten', '1', '02SN'),
(193, 255, '2', 'BACA PUISI', '2016', 'SENI', 'Sekolah', '1', 'SEKOLAH'),
(194, 255, '3', 'TILAWATIL QURAN', '2015', 'SENI', 'Sekolah', '1', 'SEKOLAH MUHAMMADIYAH'),
(195, 316, '1', 'OLIMPIADE SAINS NASIONAL (OSN) SMP MATA PELAJARAN MATEMATIKA', '2016', 'SAINS', 'Kabupaten', '1', 'DINAS PENDIDIKAN DAN KEBUDAYAAN KABUPATEN KOTABARU'),
(196, 316, '2', 'PHYSICS COMPETITION 2017 TINGKAT SMP/SEDERAJAT SE-KALIMANTAN SELATAN DAN TENGAH', '2017', 'SAINS', 'Provinsi', '2', 'HIMPUNAN MAHASISWA PENDIDIKAN FISIKA UNIVERSITAS LAMBUNG MANGKURAT'),
(197, 316, '3', 'KALIMANTAN''S PHYSICS COMPETITION (KALPHYCO) 2017', '2017', 'SAINS', 'Provinsi', '2', 'HIMPUNAN MAHASISWA FISIKA FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM UNIVERSITAS LAMBUNG MANGKURA'),
(198, 312, '2', 'FORUM ANAK', '2015', 'SAINS', 'Provinsi', '3', 'BP3A PROV. KALSEL'),
(199, 20, '1', 'LOMBA CIPTA PUISI', '2016', 'SENI', 'Kecamatan', '1', 'UPK SIMPANG EMPAT'),
(200, 114, '3', 'PENCAK SILAT', '2016', 'OLAH RAGA', 'Provinsi', '4', 'POVINSI'),
(201, 90, '3', 'JAMBORE DAERAH', '', 'SENI', 'Kabupaten', '1', 'KWARTIR DAERAH KALSEL'),
(202, 102, '2', 'OLIMPIADE IPS', '2014', 'SAINS', 'Nasional', '', 'PROPINSI'),
(203, 93, '1', 'JUARA UMUM KELAS VII', '2014', 'SAINS', 'Sekolah', '3', 'SMPN 1 BATU LICIN'),
(204, 93, '2', 'JUARA UMUM KELAS VIII', '2015', 'SAINS', 'Sekolah', '2', 'SMPN 1 BATU LICIN'),
(205, 93, '3', 'JUARA UMUM KELAS IX', '2016', 'SAINS', 'Sekolah', '1', 'SMPN 1 BATU LICIN'),
(206, 138, '1', 'PESERTA JAMBORE CABANG TANAH BUMBU', '2015', 'SENI', 'Sekolah', '1', 'KWARTIR CABANG TANAH BUMBU'),
(207, 138, '2', 'PESERTA JAMBORE DAERAH KALSEL', '2015', 'SENI', 'Kabupaten', '1', 'KWARTIR DAERAH KALSEL'),
(208, 138, '3', 'PESERTA JAMBORE NASIONAL KE X ', '2016', 'SENI', 'Provinsi', '1', 'KWARTIR NASIONAL'),
(209, 44, '1', 'FASHION SHOW PUTRI', '2017', 'SENI', 'Kecamatan', '1', 'IAIN BANJARMASIN'),
(210, 44, '2', 'BACA PUISI', '2016', 'SENI', 'Kecamatan', '2', 'FLS2N'),
(211, 139, '1', 'LOMBA TINGKAT II', '2016', 'OLAH RAGA', 'Kecamatan', '1', 'KWARTIR RANTING'),
(212, 139, '2', 'PERKEMAHAN LOMBA TK.I', '2016', 'OLAH RAGA', 'Sekolah', '1', 'KWARTIR RANTING'),
(213, 173, '1', 'IPS', '2014', 'SAINS', 'Nasional', '1', 'GLOBAL LINK BALI'),
(214, 173, '2', 'MATH AND SCIENCE CAMP', '2015', 'SAINS', 'Provinsi', '2', 'DINAS PENDIDIKAN PROVINSI'),
(215, 173, '3', 'GASHUKU', '2016', 'OLAH RAGA', 'Provinsi', '3', 'SHORINJI KEMPO INDONESIA'),
(216, 209, '1', 'PIONERIING', '2013', 'SENI', 'Kecamatan', '2', 'KWARAN BATULICIN'),
(217, 142, '2', 'BEDAH BUKU KUMPULAN CERPEN', '2014', 'SENI', 'Kabupaten', '3', 'PERPUSTAKAAN ARSIP DAN DOKUMENTASI DAERAH'),
(218, 142, '3', 'CIPTA CERPEN', '2015', 'SENI', 'Provinsi', '2', 'FLS2N'),
(219, 221, '1', 'JUARA OLIMPIADE MATEMATIKA', '2016', 'SAINS', 'Sekolah', '2', 'SMK TUNAS BANGSA'),
(220, 165, '1', 'KARANG TARUNA CIPTA KARYA', '2014', 'SENI', 'Sekolah', '2', 'DESA SEGUMPANG'),
(221, 111, '1', '-', '-', 'OLAH RAGA', '', '4', '-'),
(222, 111, '2', 'TUTORIAL HIJAB', '2016', '', '', '1', 'MTS.DARULAZHAR'),
(223, 111, '3', 'TARI', '2016', '', '', '3', '-'),
(224, 108, '1', 'DRUMBAND', '2015', 'SENI', 'Kabupaten', '2', 'BANK BRI'),
(225, 108, '2', 'DRUMBAND', '2016', 'SENI', 'Kabupaten', '1', ''),
(226, 108, '3', 'FUTSAL PUTRI', '2012', 'OLAH RAGA', 'Sekolah', '2', 'MI DARUL AZHAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE IF NOT EXISTS `tbl_ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `ruangan_kelas_id` int(11) NOT NULL,
  `ruangan_jurusan_id` int(11) NOT NULL,
  `ruangan_nama` varchar(5) NOT NULL,
  `ruangan_guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE IF NOT EXISTS `tbl_sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `sekolah_nama` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`sekolah_id`, `sekolah_nama`) VALUES
(1, 'MTSN 1 KUSAN HILIR'),
(2, 'MTSN 2 KUSAN HILIR'),
(3, 'MTSS DDI MUARA PAGATAN'),
(4, 'MTSS NU AL-FALAH'),
(5, 'MTSS SULLAMUL KHAIR'),
(6, 'SMP MUHAMMADIYAH'),
(7, 'SMP NEGERI 1 KUSAN HILIR'),
(8, 'SMP NEGERI 2 KUSAN HILIR'),
(9, 'SMP NEGERI 3 KUSAN HILIR'),
(10, 'SMP NEGERI 4SATU ATAP KUSAN HILIR'),
(11, 'SMP NEGERI 5 KUSAN HILIR'),
(12, 'SMP NEGERI 6 SATU ATAP KUSAN HILIR'),
(13, 'SMP NEGERI 7 KUSAN HILIR'),
(14, 'SMP NEGERI 8 SATU ATAP KUSAN HILIR'),
(15, 'MTSS NURUL JIHAD NW'),
(16, 'SMP ISLAM RAUDHATUR RAHMAH'),
(17, 'SMP NEGERI 1 SUNGAI LOBAN'),
(18, 'SMP NEGERI 2 SUNGAI LOBAN'),
(19, 'SMP NEGERI 3 SUNGAI LOBAN'),
(20, 'SMP NEGERI 4 SUNGAI LOBAN'),
(21, 'MTSN SATUI'),
(22, 'MTSS AL KAUTSAR'),
(23, 'MTSS HIDAYATUSSALAM NW'),
(24, 'MTSS MIFTAHUSSALAM'),
(25, 'MTSS RIADHUSSHALIHIN'),
(26, 'SMP NEGERI 1 SATUI'),
(27, 'SMP NEGERI 10 SATUI'),
(28, 'SMP NEGERI 2 SATUI'),
(29, 'SMP NEGERI 3 SATUI'),
(30, 'SMP NEGERI 4 SATUI'),
(31, 'SMP NEGERI 5 SATUI'),
(32, 'SMP NEGERI 6 SATUI'),
(33, 'SMP NEGERI 7 SATUI'),
(34, 'SMP NEGERI 8 SATUI'),
(35, 'SMP NEGERI 9 SATUI'),
(36, 'SMPN 7 SATU ATAP SATUI'),
(37, 'SMPN 8 SATU ATAP SATUI'),
(38, 'MTSS MIFTAHUL JANNAH'),
(39, 'SMP NEGERI 1 KUSAN HULU'),
(40, 'SMP NEGERI 2 KUSAN HULU'),
(41, 'SMP NEGERI 3 KUSAN HULU'),
(42, 'SMP NEGERI 4 SATU ATAP KUSAN HULU'),
(43, 'MTSS AL HIDAYAH'),
(44, 'MTSS DDI KERSIK PUTIH'),
(45, 'SMP ISLAM TERPADU AR RASYID'),
(46, 'SMP IT DARUL IJABAH'),
(47, 'SMP NEGERI 1 BATULICIN'),
(48, 'SMP NEGERI 2 BATULICIN'),
(49, 'SMP NEGERI 3 SATU ATAP BATULICIN'),
(50, 'MTSS DARUL AZHAR'),
(51, 'MTSS NURUL HIDAYAH'),
(52, 'SMP BANGUN BENUA'),
(53, 'SMP KODECO'),
(54, 'SMP MUHAMMADIYAH SIMPANG EMPAT'),
(55, 'SMP NEGERI 1 SIMPANG EMPAT'),
(56, 'SMP NEGERI 2 SIMPANG EMPAT'),
(57, 'SMP NEGERI 3 SATU ATAP SIMPANG EMPAT'),
(58, 'SMP NEGERI 4 SIMPANG EMPAT'),
(59, 'SMP NEGERI 5 SIMPANG EMPAT'),
(60, 'MTSS AL ISLAHIYAH'),
(61, 'MTSS AL ISTIQOMAH'),
(62, 'SMP NEGERI 1 KARANG BINTANG'),
(63, 'SMP NEGERI 2 KARANG BINTANG'),
(64, 'SMP NEGERI 3 KARANG BINTANG'),
(65, 'SMP NEGERI 4 SATU ATAP KARANG BINTANG'),
(66, 'MTSS BAHRUL ULUM'),
(67, 'MTSS NURUL WATHAN'),
(68, 'MTSS SA AL ISTIQOMAH'),
(69, 'SMP NEGERI 1 MANTEWE'),
(70, 'SMP NEGERI 2 MANTEWE'),
(71, 'SMP NEGERI 3 SATU ATAP MANTEWE'),
(72, 'SMP NEGERI 4 SATU ATAP MANTEWE'),
(73, 'SMP NEGERI 5 SATU ATAP MANTEWE'),
(74, 'SMP NEGERI 6 SATU ATAP MANTEWE'),
(75, 'SMP NEGERI 7 SATU ATAP MANTEWE'),
(76, 'SMP NEGERI 8 SATU ATAP MANTEWE'),
(77, 'SMP NEGERI 9 SATU ATAP MANTEWE'),
(78, 'MTSS DARUL ISHLAN NW'),
(79, 'MTSS SYARIF ALI'),
(80, 'SMP GUNUNG SARI ESTATE'),
(81, 'SMP NEGERI 1 ANGSANA'),
(82, 'SMP NEGERI 2 ANGSANA'),
(83, 'SMP NEGERI 3 SATU ATAP ANGSANA'),
(84, 'MTSS NURUL AMIEN'),
(85, 'SMP NEGERI 1 KURANJI'),
(86, 'SMP NEGERI 2 SATU ATAP KURANJI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_semester`
--

CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `semester_id` int(11) NOT NULL,
  `semester_nama` varchar(5) NOT NULL,
  `semester_status` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `semester_nama`, `semester_status`) VALUES
(1, 'I', 'Y'),
(2, 'II', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nisn` varchar(20) NOT NULL,
  `siswa_nama` varchar(50) NOT NULL,
  `siswa_panggilan` varchar(20) NOT NULL,
  `siswa_jenis_kelamin` varchar(1) NOT NULL,
  `siswa_tempat_lahir` varchar(50) NOT NULL,
  `siswa_tgl_lahir` varchar(15) NOT NULL,
  `siswa_agama_id` int(11) NOT NULL,
  `siswa_alamat` varchar(150) NOT NULL,
  `siswa_alamat_kota_id` int(11) NOT NULL,
  `siswa_alamat_propinsi_id` int(11) NOT NULL,
  `siswa_no_telp` varchar(20) NOT NULL,
  `siswa_kelas_id` int(11) NOT NULL,
  `siswa_kelas_ind` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_thn_ajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_thn_ajaran` (
  `thn_ajaran_id` int(11) NOT NULL,
  `thn_ajaran_nama` varchar(10) NOT NULL,
  `thn_ajaran_status` varchar(1) NOT NULL,
  `thn_ajaran_reg_awal` varchar(10) NOT NULL,
  `thn_ajaran_reg_akhir` varchar(10) NOT NULL,
  `thn_ajaran_verifikasi_tes_awal` varchar(10) NOT NULL,
  `thn_ajaran_verifikasi_tes_akhir` varchar(10) NOT NULL,
  `thn_ajaran_daftar_ulang_awal` varchar(10) NOT NULL,
  `thn_ajaran_daftar_ulang_akhir` varchar(10) NOT NULL,
  `thn_ajaran_kelulusan` varchar(10) NOT NULL,
  `thn_ajaran_reg_awal_reguler` varchar(10) NOT NULL,
  `thn_ajaran_reg_akhir_reguler` varchar(10) NOT NULL,
  `thn_ajaran_verifikasi_tes_awal_reguler` varchar(10) NOT NULL,
  `thn_ajaran_verifikasi_tes_akhir_reguler` varchar(10) NOT NULL,
  `thn_ajaran_daftar_ulang_awal_reguler` varchar(10) NOT NULL,
  `thn_ajaran_daftar_ulang_akhir_reguler` varchar(10) NOT NULL,
  `thn_ajaran_kelulusan_reguler` varchar(10) NOT NULL,
  `thn_ajaran_reg_status` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_thn_ajaran`
--

INSERT INTO `tbl_thn_ajaran` (`thn_ajaran_id`, `thn_ajaran_nama`, `thn_ajaran_status`, `thn_ajaran_reg_awal`, `thn_ajaran_reg_akhir`, `thn_ajaran_verifikasi_tes_awal`, `thn_ajaran_verifikasi_tes_akhir`, `thn_ajaran_daftar_ulang_awal`, `thn_ajaran_daftar_ulang_akhir`, `thn_ajaran_kelulusan`, `thn_ajaran_reg_awal_reguler`, `thn_ajaran_reg_akhir_reguler`, `thn_ajaran_verifikasi_tes_awal_reguler`, `thn_ajaran_verifikasi_tes_akhir_reguler`, `thn_ajaran_daftar_ulang_awal_reguler`, `thn_ajaran_daftar_ulang_akhir_reguler`, `thn_ajaran_kelulusan_reguler`, `thn_ajaran_reg_status`) VALUES
(1, '2017/2018', 'A', '01-04-2017', '19-05-2017', '20-04-2017', '22-04-2017', '20-04-2017', '22-04-2017', '25-04-2017', '29-05-2017', '05-06-2017', '06-06-2017', '10-06-2017', '14-06-2017', '15-06-2017', '14-06-2017', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_akun_id` int(11) NOT NULL,
  `user_hak_akses` varchar(1) NOT NULL COMMENT '1 = Admin, 2 = Guru, 4 = siswa'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_akun_id`, `user_hak_akses`) VALUES
(1, 'Mujahidin', 'admin01', '8e6bc7b4a3d106f80445dbde71093d2f', 0, '1'),
(2, 'Fajar Sadiq, M. Pd', 'admin02', 'f625fa8646e1dbbdd356819eba0f6f54', 0, '1'),
(3, 'Siti Munawarah, S.Kom', 'admin03', '409beff3dabfed4b56238dfd2939d70d', 0, '1'),
(4, 'admin', 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`golongan_id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `tbl_jadwal_pelajaran`
--
ALTER TABLE `tbl_jadwal_pelajaran`
  ADD PRIMARY KEY (`jadwal_pelajaran_id`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tbl_kelas_siswa_tmp`
--
ALTER TABLE `tbl_kelas_siswa_tmp`
  ADD PRIMARY KEY (`kelas_siswa_tmp_id`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  ADD PRIMARY KEY (`mata_pelajaran_id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`pendidikan_id`);

--
-- Indexes for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indexes for table `tbl_propinsi`
--
ALTER TABLE `tbl_propinsi`
  ADD PRIMARY KEY (`propinsi_id`);

--
-- Indexes for table `tbl_reg_akun`
--
ALTER TABLE `tbl_reg_akun`
  ADD PRIMARY KEY (`reg_akun_id`);

--
-- Indexes for table `tbl_reg_apk`
--
ALTER TABLE `tbl_reg_apk`
  ADD PRIMARY KEY (`reg_apk_id`);

--
-- Indexes for table `tbl_reg_data_diri`
--
ALTER TABLE `tbl_reg_data_diri`
  ADD PRIMARY KEY (`reg_data_diri_id`);

--
-- Indexes for table `tbl_reg_data_nilai`
--
ALTER TABLE `tbl_reg_data_nilai`
  ADD PRIMARY KEY (`reg_data_nilai_id`);

--
-- Indexes for table `tbl_reg_data_nilai_tes`
--
ALTER TABLE `tbl_reg_data_nilai_tes`
  ADD PRIMARY KEY (`reg_data_nilai_tes_id`);

--
-- Indexes for table `tbl_reg_data_ortu`
--
ALTER TABLE `tbl_reg_data_ortu`
  ADD PRIMARY KEY (`reg_data_ortu_id`);

--
-- Indexes for table `tbl_reg_data_prestasi`
--
ALTER TABLE `tbl_reg_data_prestasi`
  ADD PRIMARY KEY (`reg_data_prestasi_id`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `tbl_thn_ajaran`
--
ALTER TABLE `tbl_thn_ajaran`
  ADD PRIMARY KEY (`thn_ajaran_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `agama_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `golongan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jadwal_pelajaran`
--
ALTER TABLE `tbl_jadwal_pelajaran`
  MODIFY `jadwal_pelajaran_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kelas_siswa_tmp`
--
ALTER TABLE `tbl_kelas_siswa_tmp`
  MODIFY `kelas_siswa_tmp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mata_pelajaran`
--
ALTER TABLE `tbl_mata_pelajaran`
  MODIFY `mata_pelajaran_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `pendidikan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  MODIFY `pengajar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_propinsi`
--
ALTER TABLE `tbl_propinsi`
  MODIFY `propinsi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_reg_akun`
--
ALTER TABLE `tbl_reg_akun`
  MODIFY `reg_akun_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=350;
--
-- AUTO_INCREMENT for table `tbl_reg_apk`
--
ALTER TABLE `tbl_reg_apk`
  MODIFY `reg_apk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_reg_data_diri`
--
ALTER TABLE `tbl_reg_data_diri`
  MODIFY `reg_data_diri_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `tbl_reg_data_nilai`
--
ALTER TABLE `tbl_reg_data_nilai`
  MODIFY `reg_data_nilai_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `tbl_reg_data_nilai_tes`
--
ALTER TABLE `tbl_reg_data_nilai_tes`
  MODIFY `reg_data_nilai_tes_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `tbl_reg_data_ortu`
--
ALTER TABLE `tbl_reg_data_ortu`
  MODIFY `reg_data_ortu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=784;
--
-- AUTO_INCREMENT for table `tbl_reg_data_prestasi`
--
ALTER TABLE `tbl_reg_data_prestasi`
  MODIFY `reg_data_prestasi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_thn_ajaran`
--
ALTER TABLE `tbl_thn_ajaran`
  MODIFY `thn_ajaran_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
