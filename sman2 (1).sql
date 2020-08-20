-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 05:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas_siswa`
--

CREATE TABLE `detail_kelas_siswa` (
  `id_detail` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_wali_fk` int(11) DEFAULT NULL,
  `id_tahun_ajaran_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kelas_siswa`
--

INSERT INTO `detail_kelas_siswa` (`id_detail`, `id_siswa`, `id_kelas`, `id_wali_fk`, `id_tahun_ajaran_fk`) VALUES
(107, NULL, 15, 954, 18),
(108, 1, 15, 954, 18),
(127, 17, 15, 954, 18),
(128, NULL, 16, 942, 18),
(129, 21, 16, 942, 18),
(130, 22, 16, 942, 18),
(148, NULL, 15, 954, 45),
(149, 41, 15, 954, 45),
(150, 22, 15, 954, 45),
(179, NULL, 17, 934, 18),
(180, 41, 17, 934, 18),
(181, 39, 17, 934, 18),
(194, NULL, 15, 904, 17),
(196, NULL, 20, 916, 17),
(197, 4, 20, 916, 17),
(198, 42, 20, 916, 17);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `email` varchar(225) NOT NULL,
  `NUPTK` varchar(225) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nip` varchar(225) NOT NULL,
  `jenis_ptk` varchar(225) NOT NULL,
  `agama` varchar(125) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `RT` varchar(5) NOT NULL,
  `RW` varchar(5) NOT NULL,
  `dusun` varchar(125) NOT NULL,
  `kelurahan` varchar(125) NOT NULL,
  `kecamatan` varchar(125) NOT NULL,
  `kode_pos` int(125) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `email`, `NUPTK`, `jk`, `tempat_lahir`, `tgl_lahir`, `nip`, `jenis_ptk`, `agama`, `alamat`, `RT`, `RW`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `no_hp`) VALUES
(894, 'Adi Sungkono', 'adisungkono59@gmail.com', '1138737638200033', 'perempuan', 'Sidoarjo', '1959-08-06', '195908061984031015', 'Guru Mapel', 'Kristen', 'Dsn. Pendowo', '22', '5', 'Pendowo', 'Ngrowo', 'Kec. Bangsal', 61381, '085859593712'),
(895, 'Agus Dwi Santoso', 'geosmanda@yahoo.com', '7052754655200003', 'L', 'Mojokerto', '1976-07-20', '197607202006041009', 'Guru Mapel', 'Islam', 'Jl. Kelud Raya No. 25', '2', '7', '', 'Wates', 'Kec. Magersari', 61317, '08123067274'),
(896, 'Agus Nursofan', 'agusnursofan67@gmail.com', '4143745647200043', 'L', 'Mojokerto', '1967-08-11', '196708111990011001', 'Guru Mapel', 'Islam', 'Jl. Brawijaya No. 354', '5', '1', 'Sinoman', 'Miji', 'Kec. Prajurit Kulon', 61322, '082132894849'),
(897, 'Aji Siswaji', 'ajisiswaji@ymail.com', '0549746649200033', 'L', 'Magetan', '1968-12-17', '196812171997031006', 'Guru Mapel', 'Islam', 'Jl. Bimoseno 155', '5', '1', 'Kauman', 'Kauman', 'Kec. Karangrejo', 63395, '085230262425'),
(898, 'Akhmad Qomarudin', 'qomarbf@gmail.com', '5536743646200063', 'L', 'MOJOKERTO', '1965-12-04', '196512041992031014', 'Guru Mapel', 'Islam', 'Dsn. Kedung Pring', '4', '3', '', 'Jampirogo', 'Kec. Sooko', 61361, '081235421891'),
(899, 'Ana Rahmawati', 'anarochim69@gmail.com', '1446747649300062', 'P', 'Mojokerto', '1969-01-14', '196901142007012010', 'Guru Mapel', 'Islam', 'Graha Japan Asri Blok F/5-6 Sooko', '2', '13', 'Kepindon', 'Japan', 'Kec. Sooko', 0, '08121697265'),
(900, 'Anik Puji Handayani', 'anikpuji.handayani@yahoo.com', '2344757658300033', 'P', 'Bojonegoro', '1979-10-12', '197910122006042027', 'Guru Mapel', 'Islam', 'Jl. Suromulang Barat IV/27 Mojokerto', '31', '8', 'Perum CSE', 'Surodinawan', 'Kec. Prajurit Kulon', 61316, '085331317198'),
(901, 'Anis Istibsyaroh', 'ist.anis@yahoo.co.id', '7055749651300053', 'P', 'Mojokerto', '1971-07-23', '197107232007012013', 'Guru Mapel', 'Islam', 'PERUM KEDUNDUNG INDAH JL. DIENG RAYA NO. 18', '4', '1', 'KEDUNDUNG', 'KEDUNDUNG', 'Kec. Magersari', 31613, '08113413858'),
(902, 'Asmala Izza Agustin', 'asmala.izza2@gmail.com', '6134764665210103', 'P', 'MOJOKERTO', '1986-08-02', '198608022011012004', 'Guru TIK', 'Islam', 'JL. MERAPI RAYA NO.9', '1', '3', '', 'WATES', 'Kec. Magersari', 61317, '085645254615'),
(904, 'Dety Purwantini', 'detypurwantini@yahoo.com', '5559741642300043', 'P', 'Jakarta', '1963-12-27', '196312271987052001', 'Guru Mapel', 'Islam', 'Jl. Penanggungan 16A', '12', '1', '', 'Wates', 'Kec Magersari', 61317, '085655582819'),
(905, 'Dinar Wirantika', 'createdby_dinar@yahoo.com', '5938766667210102', 'P', 'SUMBAWA', '1988-06-06', '198806062011012009', 'Guru Mapel', 'Islam', 'BANCANG GG KEMUNING/5', '2', '2', 'Bancang', 'Wates', 'Kec. Magersari', 61317, '085648801640'),
(906, 'Djohan Arifin', 'djohanarifin14@gmail.com', '6546740642200033', 'L', 'Mojokerto', '1962-12-14', '196212141988031008', 'Guru Mapel', 'Islam', 'Jl. Meri 427', '2', '2', '', 'Meri', 'Kec. Magersari', 61315, '081331225266'),
(907, 'Dwi Wahyudi', 'dwi_w@rocketmail.com', '7952756657110042', 'L', 'Sidoarjo', '1978-06-20', '196212141988031008', 'Guru TIK', 'Islam', 'Jl. Suromurukan XII/15', '38', '9', 'PERUM CITRA SURODINAWAN ESTATE', 'SURODINAWAN', 'Kec. Prajurit Kulon', 61317, '085648687223'),
(908, 'Dwiyanto Hadi', 'dwiyantohadi589@gmail.com', '3050738639200023', 'L', 'JOMBANG', '1960-07-18', '196007181986031018', 'Guru BK', 'Islam', 'Jl. INTAN F23 BSP SOOKO MOJOKERTO', '1', '16', 'Sooko', 'Sooko', 'Kec. Sooko', 61361, '081230008136'),
(909, 'Edy Susanto', 'edysusantoinscada@gmail.com', '4247738639200033', 'L', 'Kediri', '1960-09-15', '196009151987031012', 'Guru Mapel', 'Islam', 'Griya Permata Meri Blok E3/09', '7', '6', 'Meri', 'Meri', 'Kec. Kranggan', 61315, '085646425199'),
(910, 'Eka Budi Hastuti', 'ekabudihastuti6883@gmail.com', '9138761662300053', 'P', 'MOJOKERTO', '1983-08-06', '', 'Guru Mapel', 'Islam', 'ARGOPURO I/29 MOJOKERTO', '1', '1', 'Perumnas Timur', 'Wates', 'Kec. Magersari', 61317, '081230295052'),
(911, 'Eko Nur Adi', 'ekonuradiok@gmail.com', '6851741642200022', 'L', 'Surabaya', '1963-05-19', '196305191986011004', 'Guru Mapel', 'Islam', 'Jl. Raya Ijen 73', '2', '3', '', 'Wates', 'Kec. Magersari', 61317, '081803230343'),
(912, 'Ema Ihwayuni', 'emaihwayuni@gmail.com', '9743758659300072', 'P', 'MOJOKERTO', '1980-04-11', '', 'Guru Mapel', 'Islam', 'Jalan Suromulang Dalam I/24', '30', '7', '', 'Surodinawan', 'Kec. Prajurit Kulon', 61328, '0858553121915'),
(913, 'Enny Nurmawati', 'ennynurmawati@gmail.com', '8055747650300043', 'P', 'SURABAYA', '1969-07-23', '196907231995122004', 'Guru Mapel', 'Islam', 'KARANGDAMI', '2', '1', 'Karangdami', 'Ngastemi', 'Kec. Bangsal', 61381, '085649478323'),
(914, 'Erna Widyawati', 'widya2hartono@gmail.com', '1862751652300032', 'P', 'MOJOKERTO', '1973-05-30', '197305302005012007', 'Guru Mapel', 'Islam', 'GRIYA PERMATA IJEN BLOK C3 NO 44 RT 05 RW 04 WATES MAGERSARI MOJOKERTO', '5', '4', '', 'Wates', 'Kec. Magersari', 61317, '085330240467'),
(915, 'Erwin Joko Susanto', 'ejokosusanto@yahoo.com', '7238755656200013', 'L', 'JOMBANG', '1977-09-06', '197709062006041021', 'Guru Mapel', 'Islam', 'UNGGAHAN RT/RW 2/7 KEL: BANJARAGUNG KEC: PURI KAB: MOJOKERTO', '2', '7', 'Unggahan', 'Banjar Agung', 'Kec. Puri', 61363, '085852806837'),
(916, 'Fatimah', 'fatimah1969@gmail.com', '4448747649300043', 'P', 'PASURUAN', '1969-11-16', '', 'Guru Mapel', 'Islam', 'JL DIENG RAYA 31 KEDUNDUNG INDAH', '3', '2', '', 'KEDUNDUNG', 'Kec. Magersari', 61318, '03217175451'),
(917, 'Fitra Punjung Agung Pramono', 'fitra.punjung@gmail.com', '', 'L', 'Mojokerto', '1990-03-13', '', 'Guru Mapel', 'Islam', 'Kedungkwali Gg. III timur no 52', '2', '2', '', 'Miji', 'Kec. Prajurit Kulon', 61318, '0895339434044'),
(918, 'Haning Meilia Putri Pratama', 'haningmeliaputria@gmail.com', '5857762663300152', 'P', 'Surabaya', '1984-05-25', '', 'Guru Mapel', 'Islam', 'JL. KAWI RAYA NO. 52 MOJOKERTO', '1', '6', '', 'Wates', 'Kec. Magersari', 61317, '08113461039'),
(919, 'Heri Purwaningsih', 'heri.purwa64@gmail.com', '4544742644300113', 'P', 'JOMBANG', '1964-12-12', '196412121988032018', 'Guru Mapel', 'Islam', 'PERUM WIKARSA BLOK B/36 MOJOKERTO', '1', '12', 'KENANTEN', 'KENANTEN', 'Kec. Puri', 61363, '08563104101'),
(920, 'Heri Susanto', 'herrysm@yahoo.com', '2444752652200003', 'L', 'MOJOKERTO', '1974-11-12', '197411122014081001', 'Guru Mapel', 'Islam', 'JL. GEDONGAN IV NO. 13 MOJOKERTO', '3', '2', '', 'Gedongan', 'Kec. Magersari', 61319, '0816539474'),
(921, 'Idham Jauhari Priyambodo Wirawan', 'i_dham_j@yahoo.com', '0241750652200043', 'L', 'Mojokerto', '1972-09-09', '197209092005011011', 'Guru Mapel', 'Islam', 'PANGGREMAN III NO 8', '2', '2', 'PANGGREMAN', 'KRANGGAN', 'Kec. Prajurit Kulon', 61321, '082143447549'),
(922, 'Indah Kristina', 'indahkristina83@gmail.com', '2533764665300092', 'P', 'SIDOARJO', '1986-02-01', '198602012009032006', 'Guru Mapel', 'Islam', 'JL. RAYA KAWI NO. 90', '2', '6', '', 'WATES', 'Kec. Magersari', 61317, '08563621433'),
(923, 'Kikie Andriani Hardiana', 'Nysenoputih@gmail.com', '2562757659300043', 'P', 'Mojokerto', '1979-12-30', '', 'Guru Mapel', 'Islam', 'JL CATUR TT. 5', '4', '12', 'JAPAN', 'JAPAN', 'Kec. Sooko', 0, '081233888797'),
(924, 'Luluk Setiyowati', 'luluksetiyowati73@gmail.com', '1342751653300093', 'P', 'MOJOKERTO', '1973-10-10', '197310102005012010', 'Guru Mapel', 'Islam', 'Banjarmlati', '4', '4', 'Banjarmlati', 'Lengkong', 'Kec. Mojoanyar', 61364, '08175248328'),
(925, 'Luqman Hakim', 'luqmanhakim1503@gmail.com', '3647738641200012', 'L', 'MOJOKERTO', '1960-03-15', '196003151987111001', 'Guru Mapel', 'Islam', 'JL.RAYA IJEN 47', '2', '3', 'Karanglo', 'Wates', 'Kec. Magersari', 61317, '085733266888'),
(926, 'M. Isa Ansori', 'isaanshori2012@gmail.com', '2543763664130133', 'L', 'Sidoarjo', '1985-12-11', '198512112015031004', 'Guru Mapel', 'Islam', 'Jabon', '18', '6', 'Jabon', 'Mliriprowo', 'Kec. Tarik', 61265, '085732354119'),
(927, 'Machmuda Iriani Arief', 'machmuda.irianiarief@gmail.com', '8338741642300043', 'P', 'Mojokerto', '1963-10-06', '196310061985122003', 'Guru Mapel', 'Islam', 'RAUNG RAYA 20 MOJOKERTO', '2', '3', 'Lingkungan Perumnas Timur', 'Wates', 'Kec. Magersari', 61317, '08121637314'),
(928, 'Martiningsih Wulandari', 'wulan_inscadaok@yahoo.co.id', '5657742644300032', 'P', 'Kebumen', '1964-03-25', '196403251988112001', 'Guru Mapel', 'Islam', 'Jl. Murbai 42', '1', '3', '', 'Wates', 'Kec. Magersari', 61317, '08113413678'),
(929, 'Mat Suciadi', 'matsuciadi@gmail.com', '1262747650200033', 'L', 'Mojokerto', '1969-09-30', '196909302007011019', 'Guru Mapel', 'Islam', 'Jl. Ki Buyut Langkey', '3', '1', 'Gampang', 'Sumber tebu', 'Kec. Bangsal', 61381, '081333004068'),
(930, 'Miftahul Mujtahidin', 'miftahulmujtahidin@gmail.com', '0563757659200113', 'L', 'GRESIK', '1979-12-31', '197912312006041055', 'Guru Mapel', 'Islam', 'SIDOBECIK DS PULOREJO KEC DAWARBLANDONG KAB MOJOKERTO', '4', '9', 'SIDOBECIK', 'PULOREJO', 'Kec. Dawar Blandong', 61354, '085257562778'),
(931, 'Mohamad Fihir Kusnindyo', 'mfihirk68@gmail.com', '4550746647200012', 'L', 'MADIUN', '1968-02-18', '196802181992031008', 'Guru Mapel', 'Islam', 'GRIYA PERMATA IJEN BLOK.C1 NO.17 MOJOKERTO', '10', '4', '', 'Wates', 'Kec. Magersari', 61317, '081515734899'),
(932, 'Mohammad Agus Shofiyulloh', 'age_kakkoi@yahoo.co.id', '', 'L', 'Jombang', '1988-08-13', '', 'Guru Mapel', 'Islam', 'Sambiroto', '1', '1', '', 'Sambiroto', 'Kec. Sooko', 61361, '083831360968'),
(933, 'Muh. Agus Sholihuddin Zuhri', 'muhagussholihuddinzuhri@gmail.com', '3138751653200043', 'L', 'Mojokerto', '1973-08-06', '197308062006041014', 'Guru Mapel', 'Islam', 'Lengkong Gg. I/41', '1', '2', 'Lengkonga', 'Lengkong', 'Kec. Mojoanyar', 61364, '081357700753'),
(934, 'Nurul Huda', 'hudasalamun@gmail.com', '1456746647200012', 'L', 'Nganjuk', '1968-01-24', '196801241989011001', 'Guru Mapel', 'Islam', 'Banjaragung', '1', '8', 'Unggahan', 'Banjaragung', 'Kec. Puri', 61363, '08563408468'),
(935, 'Rani Asmara', 'adenias_cantik@yahoo.com', '2544760661300022', 'P', 'YOGYAKARTA', '1982-02-12', '', 'Guru Mapel', 'Islam', 'JL.KELUD RAYA NO 25', '2', '7', 'WATES', 'WATES', 'Kec. Magersari', 61317, '081230591709'),
(936, 'Reza Zulkarnain Arifin', 'frezaa_17@ahoo.com', '', 'L', 'Pasuruan', '1987-12-07', '', 'Guru BK', 'Islam', 'Gg. Pulosari', '4', '1', '', 'Kedundung', 'Kec. Magersari', 61316, '085648028220'),
(937, 'Rr. Supeningsih', 'sekapa911@gmail.com', '5040739641300013', 'P', 'Mojokerto', '1961-07-08', '196107081993022001', 'Guru Mapel', 'Islam', 'Jl. Raya Anjasmoro 18', '3', '2', '', 'Wates', 'Kec. Magersari', 61317, '087854445661'),
(938, 'Saichul Mizan', 'mizansmanda@gmail.com', '3158750654200003', 'L', 'Kudus', '1972-08-26', '', 'Guru Mapel', 'Islam', 'Jl. Argopuro VII/3', '3', '1', 'Wates', 'Wates', 'Kec. Magersari', 61317, '085749921992'),
(939, 'Shyndu Utomo', 'shynduutomo123@gmail.com', '6849759661200002', 'L', 'MOJOKERTO', '1980-05-17', '198005172009031003', 'Guru Mapel', 'Islam', 'TENGGER III/12 MOJOKERTO', '1', '3', '', 'Wates', 'Kec. Magersari', 61317, '085649486799'),
(940, 'Siti Maisyaroh', 'smaisyaroh_10@yahoo.com', '3842747649300122', 'P', 'JOMBANG', '1969-05-10', '196905102005012012', 'Guru Mapel', 'Islam', 'Jl. Merapi IV/1', '1', '3', '', 'Wates', 'Kec. Magersari', 61317, '081703262344'),
(941, 'Siti Rodiyah', 'sitirodiyah7812@yahoo.com', '', 'P', 'Malang', '1978-11-11', '', 'Guru BK', 'Islam', 'Jl. Argopuro VI/21', '4', '1', '', 'Wates', 'Kec. Magersari', 61317, '085648804889'),
(942, 'Sri Utami', 'sriutamimustofa1969@gmail.com', '1159747650300023', 'P', 'Mojokerto', '1969-08-27', '196908272006042009', 'Guru Mapel', 'Islam', 'jl. arjuno, gg. IV no 06', '1', '2', 'wates', 'wates', 'Kec. Magersari', 61317, '081235422299'),
(943, 'Sukma Wardani', 'sukmaadira@gmail.com', '8754756657300032', 'P', 'MOJOKERTO', '1978-04-22', '197804222006042017', 'Guru Mapel', 'Islam', 'JAMBU 3 MR MULYOSARI', '1', '4', 'Kedundung Indah', 'Kedundung', 'Kec. Magersari', 61318, '081331187308'),
(944, 'Sunarni', 'narni.spd@gmail.com', '4434741643300043', 'P', 'MOJOKERTO', '1963-11-02', '196311021987032009', 'Guru Mapel', 'Islam', 'Jl. Raya Pulorejo', '1', '1', 'Balong Cangkring', 'Pulorejo', 'Kec. Prajurit Kulon', 61325, '085749394040'),
(945, 'Sunarto', '', '4855739640200012', 'L', 'Mojokerto', '1961-05-23', '196105231988031005', 'Guru Mapel', 'Islam', 'Jl. Sikatan 8 Perum Puskopad', '0', '0', 'Sooko', 'Sooko', 'Kec. Sooko', 61361, ''),
(946, 'Supariyanto', 'supariyanto1966@gmail.com', '5238744646200033', 'L', 'JOMBANG', '1966-09-06', '196609061993031006', 'Guru Mapel', 'Islam', 'JL.DR. SUKANDAR NO. 18 SOOKO MOJOKERTO', '1', '15', 'SOOKO', 'SOOKO', 'Kec. Sooko', 61361, '0818581468'),
(947, 'Suyono', 'masyonouks@gmail.com', '0039738640200023', 'L', 'Mojokerto', '1960-07-07', '196007071984121004', 'Kepala Sekolah', 'Islam', 'Lengkong', '0', '0', 'Lengkong', 'Dlanggu', 'Kec. Dlanggu', 61371, '082230761708'),
(948, 'Titak Maria Ulfa', 'Titakmariaulfa@gmail.com', '8639758658300002', 'P', 'Mojokerto', '1980-07-03', '', 'Guru Mapel', 'Islam', 'Kranggan 1 A Blok C No 4', '4', '1', 'Kranggan', 'Kranggan', 'Kec. Prajurit Kulon', 61321, '08121606187'),
(949, 'Tri Budi Winarsih', 'triwina66@yahoo.co.id', '3346744646300033', 'P', 'Mojokerto', '1966-10-14', '196610141998022002', 'Guru Mapel', 'Islam', 'Unggahan', '3', '7', 'Unggahan', 'Banjaragung', 'Kec. Puri', 61363, '08113408179'),
(950, 'Tri Hartatik', 'trihartatikanastasia@gmail.com', '5546743644300033', 'P', 'Surabaya', '1965-12-14', '196512141989032006', 'Guru Mapel', 'Islam', 'Jl. Rajasanegara Gg. III/12', '3', '1', 'Kenanten', 'Kenanten', 'Kec. Puri', 0, '081330569191'),
(951, 'Tri Yulianingsih', 'triyuli1979@gmail.com', '9044756658300013', 'P', 'Mojokerto', '1978-07-02', '', 'Guru Mapel', 'Islam', 'Pekuwon', '5', '3', 'PEKUWON', 'PEKUWON', 'Kec. Bangsal', 0, '085855352751'),
(952, 'Utono', 'dhen.utono@gmail.com', '1259740641200033', 'L', 'Surabaya', '1962-09-27', '196209271984121004', 'Guru Mapel', 'Islam', 'Dsn. Janti', '1', '1', 'Janti', 'Jatilangkung', 'Kec. Pungging', 0, '082142730362'),
(953, 'Vibriyanida Muzdalifah', 'vibriyanidamuzdalifah@gmail.com', '4558765665210022', 'P', 'MOJOKERTO', '1987-02-26', '198702262011012009', 'Guru Mapel', 'Islam', 'DSN. LENGKONG', '1', '2', 'LENGKONG', 'LENGKONG', 'Kec. Mojoanyar', 61364, '08563400731'),
(954, 'Wiwik Andayani', 'wiwikandayani04@gmail.com', '4436743646300063', 'P', 'MOJOKERTO', '1965-11-04', '196511041991032006', 'Guru Mapel', 'Islam', 'Trunojoyo 54 Mojokerto ', '2', '1', 'Mulyosari', 'Magersari', 'Kec. Magersari', 61318, '08121766023'),
(955, 'Wiwik Windarti', 'wiwik_windarti46@yahoo.co.id', '4651743644300042', 'P', 'SURABAYA', '1965-03-19', '196503191988112001', 'Guru Mapel', 'Islam', 'JL.ARWANA E-72 SOOKO INDAH', '2', '14', 'Sooko', 'Sooko', 'Kec. Sooko', 61361, '085791152440'),
(956, 'Yogie Dana Insani', 'yogiedanainsani@gmail.com', '6453758660200023', 'L', 'MOJOKERTO', '1980-11-21', '', 'Kepala Sekolah', 'Islam', 'Mulyosari I / 28', '3', '1', '', 'Magersari', 'Kec. Magersari', 61318, '0816592607'),
(957, 'Yohanes Donbosco Lobo', 'john_lobo72@yahoo.co.id', '5041750652200033', 'L', 'DERU-FLORES', '1972-07-09', '197207092006041002', 'Guru Mapel', 'Katholik', 'GRAHA JAPAN ASRI HH 03', '7', '13', '', 'JAPAN', 'Kec. Sooko', 61361, '0812335638546'),
(958, 'Yoyok Hari Purwanto', 'yoyokhari.P2@gmail.com', '5839742643200052', 'L', 'Mojokerto', '1964-05-07', '196405071989031014', 'Guru Mapel', 'Islam', 'Jl. Riyanto No 20', '3', '2', 'Prajurit Kulon', 'Prajurit Kulon', 'Kec. Prajurit Kulon', 61326, '08155399978'),
(959, 'Yustika Kumala', 'kumalayustika@gmail.com', '2248769670230023', 'P', 'Mojokerto', '1991-09-16', '199109162015032003', 'Guru BK', 'Islam', 'Ds. Madureso', '1', '2', 'Madureso', 'Ds. Madureso', 'Kec. Dawar Blandong', 61354, '081214278780'),
(962, 'deby', 'debbycn22@gmail.com', '1234512345123456', 'L', 'Banjar', '0000-00-00', '123451234512345678', 'Guru Mtk', 'Islam', '   jl australi', '02', '02', 'bambu', 'balongsari12', 'magersari', 12355, '081224612400'),
(963, 'Debby Cantik', 'adisungkono59@gmail.com', '113874000000000000000', 'perempuan', 'Sidoarjo', '0000-00-00', '19590800000000001572864', 'Guru Mapel', 'Kristen', 'Dsn. Pendowo', '22', '5', 'Pendowo', 'Ngrowo', 'Kec. Bangsal', 61381, '85859593712'),
(967, 'nana', 'debbycantik22@gmail.com', '1138737638200099', 'L', 'klaten', '0000-00-00', '123456789123456789', 'Guru', 'Islam', 'empunala', '01', '02', 'Bambu', 'Magersari', 'Balongsari', 61314, '081224612406'),
(968, 'bambang', 'b@gmail.com', '123456789112344992', 'L', 'Surabaya', '0000-00-00', '196503191988112000', 'Guru', 'Islam', 'jkr', '1', '1', 'naga', 'balongsari', 'magersari', 61315, '81224612400'),
(969, 'Putra', 'alfanfputra@gmail.com', '1234512345123457', 'L', 'klaten', '0000-00-00', '123456789012345666', 'Guru Mapel', 'Islam', 'empunala', '02', '09', 'Aceh', 'balongsari', 'magersari', 12122, '081224612499'),
(971, 'hihi', 'd@gmail.com', '12345', 'P', 'Klaten', '0000-00-00', '123', 'TIK', 'islam', 'jl empunala', '2', '2', 'nana', 'la', 'la', 12124, '88211802979'),
(972, 'setyawan graha', 's@gmail.com', '1234567890121212', 'L', 'China', '1997-04-20', '112345678901212121', 'Guru TIK', 'Islam', 'Jl Kolonel', '1', '2', 'naga', 'mblere', 'magersari', 10101, '81224612496'),
(973, 'Andika', 'debbymee99@gmail.com', '1212121212121212', 'L', 'Madiun', '0000-00-00', '195908061984031003', 'TIK', 'Islam', 'empunala', '1', '2', 'Bambu', 'Magersari', 'Disi', 12121, '081224612402'),
(974, 'Donita', 'd@gmail.com', '1212121212121216', 'P', 'Bogor', '0000-00-00', '195908061984031007', 'TIK', 'Islam', 'Jl.rambutan', '2', '2', 'Mangga', 'Apel', 'Hantu', 61315, '8122129304'),
(975, 'vivi', 'v@gmail.com', '1138737638200049', 'P', 'Medan', '1995-02-07', '197607202006049900', 'TIK', 'Kristen', 'Jl.kedundung', '1', '1', 'Mangga', 'balongsari', 'Kec Magersari', 19204, '82118023000'),
(976, 'nadia', 'debbycantik22@gmail.com', '1234512345123459', 'L', 'klaten', '0000-00-00', '123456789012345693', 'Guru Mapel', 'Islam', 'empunala', '01', '3', 'ffff', 'sdsd', 'sdsd', 12145, '081224612492');

-- --------------------------------------------------------

--
-- Table structure for table `history_guru`
--

CREATE TABLE `history_guru` (
  `id_history_guru` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `id_jadwal_fk` int(11) DEFAULT NULL,
  `kd_keterangan_guru_fk` varchar(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_guru`
--

INSERT INTO `history_guru` (`id_history_guru`, `tgl`, `id_jadwal_fk`, `kd_keterangan_guru_fk`, `keterangan`, `status`) VALUES
(22, '2020-05-19', 98, '2', 'gurunya rapat', 1),
(23, '2020-05-19', 101, '2', 'Guru Cuti', 1),
(25, '2020-05-20', 104, '2', 'Rapat', 1),
(27, '2020-06-12', 111, '3', 'gurunya tugas keluar kota', 1),
(29, '2020-06-13', 118, '2', 'Rapat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_message`
--

CREATE TABLE `history_message` (
  `id_history` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_terkirim` varchar(20) NOT NULL,
  `jam_terkirim` varchar(10) NOT NULL,
  `id_presensi_fk` int(11) DEFAULT NULL,
  `nip_wali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_message`
--

INSERT INTO `history_message` (`id_history`, `pesan`, `tanggal_terkirim`, `jam_terkirim`, `id_presensi_fk`, `nip_wali`) VALUES
(69, 'Yth.Bpk/Ibu orang tua dari \'Achmad Fauzi\' Diberitahukan bahwa hari ini anak anda tidak masuk sekolah dengan keterangan \'Alfa\'. Demikian pemberitahuan kami, Terima kasih. ---- Ketik NIPD siswa untuk info lebih lanjut ----', '2020-06-12', '14:10', 607, NULL),
(70, 'Yth.Bpk/Ibu orang tua dari \'AAN\' Diberitahukan bahwa hari ini anak anda tidak masuk sekolah dengan keterangan \'Alfa\'. Demikian pemberitahuan kami, Terima kasih. ---- Ketik NIPD siswa untuk info lebih lanjut ----', '2020-06-13', '06:27', 615, 954),
(80, 'Yth.Bpk/Ibu orang tua dari \'AAN\' Diberitahukan bahwa hari ini anak anda tidak masuk sekolah dengan keterangan \'Alfa\'. Demikian pemberitahuan kami, Terima kasih. ---- Ketik NIPD siswa untuk info lebih lanjut ----', '2020-06-15', '15:29', 633, 954);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_pelajaran` varchar(100) NOT NULL,
  `jam_pelajaran_dimulai` varchar(11) NOT NULL,
  `kd_mapel_fk` int(11) NOT NULL,
  `id_kelas_fk` int(11) DEFAULT NULL,
  `id_tahun_ajaran_fk` int(11) DEFAULT NULL,
  `id_guru_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `hari`, `jam_pelajaran`, `jam_pelajaran_dimulai`, `kd_mapel_fk`, `id_kelas_fk`, `id_tahun_ajaran_fk`, `id_guru_fk`) VALUES
(57, 'Selasa', 'jam ke-1,jam ke-2', 'jam ke-1', 2, 15, 18, 913),
(98, 'Selasa', 'jam ke-3,jam ke-4', 'jam ke-3', 1, 15, 18, 907),
(99, 'Senin', 'jam ke-1,jam ke-2', 'jam ke-1', 1, 15, 45, 913),
(100, 'Senin', 'jam ke-3,jam ke-4', 'jam ke-3', 2, 15, 45, 954),
(101, 'Selasa', 'jam ke-1,jam ke-2', 'jam ke-1', 1, 15, 45, 954),
(102, 'Rabu', 'jam ke-1,jam ke-2', 'jam ke-1', 2, 15, 18, 954),
(103, 'Rabu', 'jam ke-3,jam ke-4', 'jam ke-3', 6, 15, 18, 942),
(104, 'Rabu', 'jam ke-5,jam ke-6', 'jam ke-5', 7, 15, 18, 934),
(105, 'Rabu', 'jam ke-1,jam ke-2', 'jam ke-1', 6, 16, 18, 913),
(106, 'Rabu', 'jam ke-3,jam ke-4', 'jam ke-3', 7, 16, 18, 934),
(107, 'Rabu', 'jam ke-5,jam ke-6', 'jam ke-5', 10, 16, 18, 904),
(111, 'Jumat', 'jam ke-1,jam ke-2', 'jam ke-1', 3, 15, 18, 913),
(112, 'Jumat', 'jam ke-3,jam ke-4', 'jam ke-3', 2, 16, 18, 954),
(113, 'Jumat', 'jam ke-1,jam ke-2', 'jam ke-1', 1, 16, 18, 895),
(114, 'Jumat', 'jam ke-5,jam ke-6', 'jam ke-5', 8, 16, 18, 942),
(115, 'Jumat', 'jam ke-5,jam ke-6', 'jam ke-5', 9, 15, 18, 907),
(116, 'Jumat', 'jam ke-1,jam ke-2', 'jam ke-1', 7, 17, 18, 934),
(117, 'Sabtu', 'jam ke-1,jam ke-2', 'jam ke-1', 7, 15, 18, 934),
(118, 'Sabtu', 'jam ke-1,jam ke-2', 'jam ke-1', 6, 16, 18, 913),
(119, 'Rabu', 'jam ke-1,jam ke-2', 'jam ke-1', 1, 15, 45, 954),
(124, 'Senin', 'jam ke-1,jam ke-2', 'jam ke-1', 2, 15, 18, 913),
(125, 'Senin', 'jam ke-3,jam ke-4', 'jam ke-3', 6, 15, 18, 942),
(126, 'Senin', 'jam ke-1,jam ke-2', 'jam ke-1', 7, 16, 18, 934),
(127, 'Senin', 'jam ke-3,jam ke-4', 'jam ke-3', 3, 16, 18, 909),
(128, 'Senin', 'jam ke-1,jam ke-2', 'jam ke-1', 2, 15, 17, 954),
(129, 'Rabu', 'jam ke-1,jam ke-2', 'jam ke-1', 8, 15, 17, 913);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tingkat_kelas` varchar(10) NOT NULL,
  `ruangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tingkat_kelas`, `ruangan`) VALUES
(15, 'X IPS 1', '10', 'X-IPS1'),
(16, 'X IPS 2', '10', 'X-IPS2'),
(17, 'X IPS 3', '10', 'X-IPS3'),
(18, 'X IPS 4', '10', 'X-IPS4'),
(19, 'X MIPA 1', '10', 'X-IPA1'),
(20, 'X MIPA 2', '10', 'X-IPA2'),
(21, 'X MIPA 3', '10', 'X-IPA3'),
(22, 'X MIPA 4', '10', 'X-IPA4'),
(23, 'X MIPA 5', '10', 'X-IPA5'),
(24, 'X MIPA 6', '10', 'X-IPA6'),
(25, 'XI IPS 1', '11', 'XI-IPS1'),
(26, 'XI IPS 2', '11', 'XI-IPS2'),
(27, 'XI IPS 3', '11', 'XI-IPS3'),
(28, 'XI IPS 4', '11', 'XI-IPS4'),
(29, 'XI MIPA 1', '11', 'XI-IPA1'),
(30, 'XI MIPA 2', '11', 'XI-IPA2'),
(31, 'XI MIPA 3', '11', 'XI-IPA3'),
(32, 'XI MIPA 4', '11', 'XI-IPA4'),
(33, 'XI MIPA 5', '11', 'XI-IPA5'),
(34, 'XI MIPA 6', '11', 'XI-IPA6'),
(35, 'XII IPS 1', '12', 'XII-IPS1'),
(36, 'XII IPS 2', '12', 'XII-IPS2'),
(37, 'XII IPS 3', '12', 'XII-IPS3'),
(38, 'XII IPS 4', '12', 'XII-IPS4'),
(39, 'XII MIPA 1', '12', 'XII-IPA1'),
(40, 'XII MIPA 2', '12', 'XII-IPA2'),
(41, 'XII MIPA 3', '12', 'XII-IPA3'),
(55, 'XII MIPA 9', '12', 'XII-IPA9F ');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_guru`
--

CREATE TABLE `keterangan_guru` (
  `kd_keterangan_guru` varchar(11) NOT NULL,
  `keterangan_guru` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_guru`
--

INSERT INTO `keterangan_guru` (`kd_keterangan_guru`, `keterangan_guru`) VALUES
('1', 'ON'),
('2', 'OFF'),
('3', 'TUGAS');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_presensi`
--

CREATE TABLE `keterangan_presensi` (
  `id_status_presensi` int(11) NOT NULL,
  `kd_keterangan` varchar(11) NOT NULL,
  `nama_keterangan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_presensi`
--

INSERT INTO `keterangan_presensi` (`id_status_presensi`, `kd_keterangan`, `nama_keterangan`) VALUES
(1, 'H', 'Hadir'),
(2, 'I', 'Izin'),
(3, 'D', 'Dispensasi'),
(4, 'S', 'Sakit'),
(5, 'A', 'Alfa');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_semester`
--

CREATE TABLE `keterangan_semester` (
  `kd_semester` int(5) NOT NULL,
  `semester` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_semester`
--

INSERT INTO `keterangan_semester` (`kd_semester`, `semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `master_jam_pelajaran`
--

CREATE TABLE `master_jam_pelajaran` (
  `id` int(11) NOT NULL,
  `jam_pelajaran_dimulai` varchar(11) NOT NULL,
  `waktu_mulai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jam_pelajaran`
--

INSERT INTO `master_jam_pelajaran` (`id`, `jam_pelajaran_dimulai`, `waktu_mulai`) VALUES
(1, 'jam ke-1', '07:00:03'),
(2, 'jam ke-2', '08:00:00'),
(3, 'jam ke-3', '09:00:00'),
(4, 'jam ke-4', '10:00:00'),
(5, 'jam ke-5', '11:00:00'),
(6, 'jam ke-6', '12:00:00'),
(7, 'jam ke-7', '13:00:00'),
(8, 'jam ke-8', '14:00:00'),
(9, 'jam ke-9', '15:00:00'),
(10, 'jam ke-10', '16:00:00'),
(11, 'jam ke-11', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_mapel` int(11) NOT NULL,
  `nama_pelajaran` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_mapel`, `nama_pelajaran`) VALUES
(1, 'Geografi'),
(2, 'Ekonomi'),
(3, 'Sosiologi'),
(4, 'Fisika'),
(5, 'Kimia'),
(6, 'Bahasa Indonesia'),
(7, 'Matematika (Umum)'),
(8, 'Prakarya dan KWU'),
(9, 'Bahasa Inggris'),
(10, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_laporan_persemester`
--

CREATE TABLE `parameter_laporan_persemester` (
  `bulan` varchar(2) NOT NULL,
  `bulan_lengkap` varchar(30) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter_laporan_persemester`
--

INSERT INTO `parameter_laporan_persemester` (`bulan`, `bulan_lengkap`, `semester`) VALUES
('01', 'Januari', '2'),
('02', 'Februari', '2'),
('03', 'Maret', '2'),
('04', 'April', '2'),
('05', 'Mei', '2'),
('06', 'Juni', '2'),
('07', 'Juli', '1'),
('08', 'Agustus', '1'),
('09', 'September', '1'),
('10', 'Oktober', '1'),
('11', 'November', '1'),
('12', 'Desember', '1');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `modul_pembahasan` varchar(255) NOT NULL,
  `kd_keterangan_fk` varchar(2) NOT NULL,
  `id_jadwal_fk` int(11) DEFAULT NULL,
  `id_siswa_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `tgl`, `foto`, `modul_pembahasan`, `kd_keterangan_fk`, `id_jadwal_fk`, `id_siswa_fk`) VALUES
(569, '2020-05-19', NULL, 'tes ekonomi admin 2019', 'A', 57, 108),
(570, '2020-05-19', NULL, 'tes ekonomi admin 2019', 'H', 57, 127),
(571, '2020-05-19', NULL, 'tes geo oleh agustina 2019', 'A', 98, 108),
(572, '2020-05-19', NULL, 'tes geo oleh agustina 2019', 'H', 98, 127),
(575, '2020-05-19', NULL, 'tes geo budi 2020', 'H', 101, 150),
(576, '2020-05-19', NULL, 'tes geo budi 2020', 'H', 101, 149),
(577, '2020-05-20', NULL, 'tes ekonomi admin 2019 rabu', 'A', 102, 108),
(578, '2020-05-20', '', 'tes ekonomi admin 2019 rabu', 'H', 102, 127),
(581, '2020-05-20', NULL, 'puisi', 'H', 103, 108),
(582, '2020-05-20', NULL, 'puisi', 'H', 103, 127),
(583, '2020-05-20', NULL, 'aljabar', 'H', 104, 108),
(584, '2020-05-20', NULL, 'aljabar', 'H', 104, 127),
(607, '2020-06-12', NULL, 'tes kwu 2019 wali kelas', 'A', 114, 129),
(608, '2020-06-12', NULL, 'tes kwu 2019 wali kelas', 'D', 114, 130),
(609, '2020-06-12', NULL, 'tes ekonomi wali', 'H', 112, 129),
(610, '2020-06-12', NULL, 'tes ekonomi wali', 'H', 112, 130),
(611, '2020-06-12', NULL, 'tes pak huda guru matematika 2019 di kelas x ips 3', 'S', 116, 180),
(612, '2020-06-12', NULL, 'tes pak huda guru matematika 2019 di kelas x ips 3', 'I', 116, 181),
(613, '2020-06-12', NULL, 'tes agustina 2019 siosioloigi', 'H', 111, 108),
(614, '2020-06-12', NULL, 'tes agustina 2019 siosioloigi', 'H', 111, 127),
(615, '2020-06-13', NULL, 'tes matematika admin sabtu', 'A', 117, 108),
(616, '2020-06-13', NULL, 'tes matematika admin sabtu', 'H', 117, 127),
(619, '2020-06-13', NULL, 'PUISI', 'H', 118, 129),
(620, '2020-06-13', NULL, 'PUISI', 'H', 118, 130),
(633, '2020-06-15', NULL, 'Tes ekonomi admin senin 15 juni ', 'A', 124, 108),
(634, '2020-06-15', NULL, 'Tes ekonomi admin senin 15 juni ', 'H', 124, 127),
(635, '2020-06-15', NULL, 'aljabar', 'H', 126, 129),
(636, '2020-06-15', NULL, 'aljabar', 'H', 126, 130),
(640, '2020-06-17', NULL, 'tes kwu 2019 ganjil', 'H', 129, 108),
(641, '2020-06-17', NULL, 'tes kwu 2019 ganjil', 'H', 129, 127);

-- --------------------------------------------------------

--
-- Table structure for table `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama_sekolah`, `foto`) VALUES
(1, 'SMAN 2 Malang', '3disp.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `nipd` int(4) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `nisn` int(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `RT` int(3) NOT NULL,
  `RW` int(3) NOT NULL,
  `dusun` varchar(125) NOT NULL,
  `kelurahan` varchar(125) NOT NULL,
  `kecamatan` varchar(125) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `no_hp_ortu` varchar(25) NOT NULL,
  `CREATED_ADD` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nipd`, `jk`, `nisn`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `RT`, `RW`, `dusun`, `kelurahan`, `kecamatan`, `kode_pos`, `no_hp_ortu`, `CREATED_ADD`) VALUES
(1, 'AAN', 1230, 'laki-laki', 192292200, 'Banjar', '2003-01-02', 'Islam', 'medan', 1, 2, 'Bambu', 'Magersari', 'Balongsari', 61316, '6281320776520', '2020-06-15 09:18:04'),
(4, 'Yulia', 1235, 'perempuan', 192292223, ' Sulawesi', '1999-04-05', 'Kristen', '', 0, 0, '', '', '', 0, '+62853-1789-4054', '2020-02-18 07:29:05'),
(10, 'alfann firmansyah', 1233, 'laki-laki', 2147483647, 'Banjar', '2000-01-01', 'Kristen', '', 0, 0, '', '', '', 0, '6282229319393', '2020-06-03 14:56:34'),
(11, 'Amrina Rosada', 6712, 'perempuan', 67011749, 'Sulawesi', '2003-01-07', 'Buddha', 'blere', 1, 1, 'rolak ', 'balongsari', 'magersari', 70117, '081224612402', '2020-05-19 09:08:58'),
(12, 'maulina', 9123, 'perempuan', 1234412345, 'Banjar', '2000-01-01', 'Kristen', '', 0, 0, '', '', '', 0, ' 081224612400', '2017-01-28 12:09:18'),
(16, 'zaenab', 1210, 'laki-laki', 123496, 'klalala', '2009-09-04', 'Islam', 'jl apel', 0, 0, '', '', '', 0, '81224612406', '2020-04-20 11:29:44'),
(17, 'Agustina Putri', 1219, 'Perempuan', 12121222, 'Bandung', '1999-04-01', 'Islam', 'jln semeru', 1, 2, 'bambu', 'haha', 'baba', 12121, '6282118029700', '2020-05-06 05:51:30'),
(21, 'Achmad Fauzi', 9567, 'laki-laki', 35624765, 'Mojokerto', '2003-12-29', 'Islam', 'bancang I No. 8', 3, 2, '', 'Wates', 'Kec. Magersari', 61317, '6282229319393', '2020-06-03 10:54:42'),
(22, 'Achmad Wardana Tri Putra', 9568, 'laki-laki', 37174047, 'Mojokerto', '2003-12-07', 'Islam', 'Kedung Mulang ', 15, 4, 'Kedung Mulang', 'Surodinawan', 'Kec. Prajurit Kulon', 61328, '6282229319393', '2020-05-19 15:55:56'),
(23, 'Alexsander Cikko Julius Winokan', 9592, 'laki-laki', 31642429, 'Mojokerto', '2003-07-02', 'Kristen', 'Jl. Suromulang Timur V No.9', 28, 7, 'Suromulang', 'Surodinawan', 'Kec. Prajurit Kulon', 61328, '081283679128', '2020-04-20 11:37:31'),
(24, 'Anisah Rizki Febriana', 9609, 'perempuan', 44391210, 'Mojokerto', '2004-02-11', 'Islam', 'Mulyosari Gg. 7 No. 21', 2, 2, 'MAGERSARI', 'Magersari', 'Kec. Magersari', 61318, '085234728818', '2020-04-20 11:37:22'),
(25, 'ocha', 1216, 'perempuan', 35624700, 'klaten', '1999-01-01', 'Islam', 'empunala', 1, 6, 'Bambu', 'Magersari', 'Balongsari', 61314, '081224612406', '2020-04-20 11:30:16'),
(33, 'Nabella', 11, 'perempuan', 12345676, 'klaten', '2006-10-04', 'Kristen', 'empunala', 1, 2, 'Bambu', 'Magersari', 'Balongsari', 61314, '081224612400', '2020-04-20 11:31:32'),
(34, 'vinanda', 9990, 'laki-laki', 12345679, 'klaten', '1970-01-01', 'Islam', 'empunala', 0, 2, 'Bambu', 'Magersari', 'Balongsari', 12122, '081224612222', '2020-05-18 09:18:51'),
(35, 'Emma lia', 1288, 'perempuan', 12345671, 'Malang', '2003-03-02', 'Islam', 'malang', 1, 2, 'Bambu', 'Pp', 'p', 23211, '81230230568', '2020-05-19 10:02:46'),
(36, 'Hafad Setia', 9099, 'laki-laki', 12341233, 'bandung', '2003-05-23', 'Islam', 'Jl. Penanggungan 16A', 11, 12, 'Dsn  alas', 'Ngaglik', 'Kec Magersari', 12111, '081224612405', '2020-06-14 08:26:12'),
(38, 'debby', 1119, 'Perempuan', 88887777, 'Malang', '2003-03-02', 'Islam', 'malang', 1, 2, 'Bambu', 'Pp', 'p', 23211, '81230230566', '2020-05-19 11:21:25'),
(39, 'Suci Dwi', 6666, 'Perempuan', 12345001, 'Malang', '2003-03-02', 'Islam', 'malang', 1, 2, 'Bambu', 'Pp', 'p', 23211, '6282331818103', '2020-06-14 08:01:22'),
(40, 'Nur Fauziah', 6701, 'laki-laki', 67011744, 'klaten', '1970-01-01', 'Islam', 'blere', 2, 2, 'Bambu', 'Magersari', 'naga', 32111, '081224612000', '2020-05-19 12:00:49'),
(41, 'Budi karya', 9090, 'Laki-laki', 67074002, 'Bali', '2002-02-03', 'Islam', 'niagra', 12, 2, 'Pojejer', 'Blere', 'Magersari', 67011, '81224612405', '2020-05-19 12:05:25'),
(42, 'Aprillia Maramis', 912, 'P', 67011, 'Bangka', '2009-09-20', 'Islam', 'Lala', 2, 2, 'Padalarang', 'Bangka', 'Bangka', 1911, '81224612302', '2020-06-03 14:39:42'),
(43, 'Alfabeta', 1292, 'P', 67074003, 'Jakarta', '2003-03-04', 'Islam', 'pisang', 1, 1, 'zzz', 'zz', 'zz', 61162, '8123030434', '2020-06-13 10:33:15'),
(44, 'NILAM', 9710, 'perempuan', 12312319, 'Madiun', '2003-03-20', 'Islam', 'jl kedundung', 0, 0, 'Bambu', 'ee', 'Kecd', 12123, '6285706677703', '2020-06-14 07:52:21'),
(45, 'Radit', 9021, 'L', 12341933, 'Padang', '2003-03-03', 'Islam', 'panda', 2, 2, 'm', 'd', 'd', 1202, '81224612439', '2020-06-14 07:28:57'),
(46, 'Amanda', 8921, 'perempuan', 12123544, 'Madiun', '2007-05-21', 'Islam', 'empunala', 2, 2, 'ffff', 'dfdf', 'dfdff', 23212, '6282331818101', '2020-06-14 08:25:15'),
(47, 'Leaa', 8293, 'perempuan', 37174043, 'klaten', '1970-01-01', 'Islam', 'empunala', 12, 6, 'dd', 'Naga', 'naga', 12123, '081223118292', '2020-06-14 08:27:25'),
(48, 'sssss', 2322, 'laki-laki', 37174049, 'klaten', '1970-01-01', 'Islam', 'empunala', 3, 3, 'ww', 'd', 'dfdff', 12123, '081224612407', '2020-06-14 08:31:30'),
(49, 'ccccccccc', 2529, 'perempuan', 37174033, 'klaten', '2007-09-05', 'Islam', 'empunala', 2, 7, 'Dsn BAMBU', 'dd', 'dd', 12122, '081224612487', '2020-06-14 08:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `kd_semester` int(5) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `kd_semester`, `status`) VALUES
(11, '2016/2017', 1, 'Off'),
(12, '2016/2017', 2, 'Off'),
(13, '2017/2018', 1, 'Off'),
(14, '2017/2018', 2, 'Off'),
(15, '2018/2019', 1, 'Off'),
(16, '2018/2019', 2, 'Off'),
(17, '2019/2020', 1, 'Off'),
(18, '2019/2020', 2, 'On'),
(45, '2020/2021', 1, 'Off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id_fk` int(1) NOT NULL,
  `ketua_kelas` int(11) DEFAULT NULL,
  `id_guru_fk` int(11) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `opsi_buka_absen` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id_fk`, `ketua_kelas`, `id_guru_fk`, `is_active`, `opsi_buka_absen`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL, 1, 0),
(2, 'enny_nur', '81dc9bdb52d04dc20036dbd8313ed055', 2, NULL, 913, 1, 1),
(87, 'wiwik_andayani', '202cb962ac59075b964b07152d234b70', 3, NULL, 954, 1, 1),
(91, 'sri_utami', '202cb962ac59075b964b07152d234b70', 3, NULL, 942, 1, 1),
(105, 'dety', '202cb962ac59075b964b07152d234b70', 3, NULL, 904, 1, 0),
(115, 'dwiwah', '202cb962ac59075b964b07152d234b70', 3, NULL, 907, 1, 0),
(119, 'alfannfir', '202cb962ac59075b964b07152d234b70', 4, 106, NULL, 1, 0),
(121, 'agusdwi', '202cb962ac59075b964b07152d234b70', 2, NULL, 895, 1, 0),
(123, 'nurulhud', '202cb962ac59075b964b07152d234b70', 3, NULL, 934, 1, 0),
(125, 'agustinaput', '202cb962ac59075b964b07152d234b70', 4, 17, NULL, 1, 1),
(126, 'edysus', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, 909, 1, 0),
(127, 'budikar', '202cb962ac59075b964b07152d234b70', 4, 41, NULL, 1, 0),
(128, 'agusnur', '202cb962ac59075b964b07152d234b70', 2, NULL, 896, 1, 0),
(129, 'fatimah', '202cb962ac59075b964b07152d234b70', 3, NULL, 916, 1, 0),
(130, 'achmadf', '202cb962ac59075b964b07152d234b70', 4, 21, NULL, 1, 1),
(131, 'sucidwi', '202cb962ac59075b964b07152d234b70', 4, 39, NULL, 1, 1),
(132, 'utono', '202cb962ac59075b964b07152d234b70', 3, NULL, 952, 1, 0),
(134, 'hafadset', '202cb962ac59075b964b07152d234b70', 4, 36, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'walikelas'),
(4, 'ketua_kelas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_presensi`
-- (See below for the actual view)
--
CREATE TABLE `view_presensi` (
`id_presensi` int(11)
,`tgl` varchar(20)
,`foto` varchar(200)
,`modul_pembahasan` varchar(255)
,`kd_keterangan_fk` varchar(11)
,`id_jadwal_fk` int(11)
,`id_siswa_fk` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_presensi`
--
DROP TABLE IF EXISTS `view_presensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_presensi`  AS  select `a`.`id_presensi` AS `id_presensi`,`a`.`tgl` AS `tgl`,`a`.`foto` AS `foto`,`a`.`modul_pembahasan` AS `modul_pembahasan`,(select `c`.`kd_keterangan` from `keterangan_presensi` `c` where `c`.`id_status_presensi` = min(`b`.`id_status_presensi`)) AS `kd_keterangan_fk`,`a`.`id_jadwal_fk` AS `id_jadwal_fk`,`a`.`id_siswa_fk` AS `id_siswa_fk` from (`presensi` `a` join `keterangan_presensi` `b` on(`a`.`kd_keterangan_fk` = `b`.`kd_keterangan`)) group by `a`.`tgl`,`a`.`id_siswa_fk` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kelas_siswa`
--
ALTER TABLE `detail_kelas_siswa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_siswa_2` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_wali_fk` (`id_wali_fk`),
  ADD KEY `id_tahun_ajaran_fk` (`id_tahun_ajaran_fk`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nama_guru` (`nama_guru`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `history_guru`
--
ALTER TABLE `history_guru`
  ADD PRIMARY KEY (`id_history_guru`),
  ADD KEY `keterangan_guru_fk` (`kd_keterangan_guru_fk`),
  ADD KEY `id_jadwal_fk` (`id_jadwal_fk`);

--
-- Indexes for table `history_message`
--
ALTER TABLE `history_message`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_guru_fk` (`nip_wali`),
  ADD KEY `id_presensi_fk` (`id_presensi_fk`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas_fk` (`id_kelas_fk`),
  ADD KEY `id_pembelajaran_fk` (`id_tahun_ajaran_fk`),
  ADD KEY `id_guru_fk` (`id_guru_fk`),
  ADD KEY `kd_mapel_fk` (`kd_mapel_fk`),
  ADD KEY `jam_pelajaran` (`jam_pelajaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `keterangan_guru`
--
ALTER TABLE `keterangan_guru`
  ADD PRIMARY KEY (`kd_keterangan_guru`);

--
-- Indexes for table `keterangan_presensi`
--
ALTER TABLE `keterangan_presensi`
  ADD PRIMARY KEY (`id_status_presensi`),
  ADD KEY `kd_keterangan` (`kd_keterangan`);

--
-- Indexes for table `keterangan_semester`
--
ALTER TABLE `keterangan_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indexes for table `master_jam_pelajaran`
--
ALTER TABLE `master_jam_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kd_mapel`),
  ADD UNIQUE KEY `kd_mapel` (`kd_mapel`);

--
-- Indexes for table `parameter_laporan_persemester`
--
ALTER TABLE `parameter_laporan_persemester`
  ADD PRIMARY KEY (`bulan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_siswa_fk` (`id_siswa_fk`),
  ADD KEY `id_jadwal_fk` (`id_jadwal_fk`),
  ADD KEY `kd_keterangan_fk` (`kd_keterangan_fk`);

--
-- Indexes for table `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nipd` (`nipd`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `kd_semester` (`kd_semester`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `ketua_kelas` (`ketua_kelas`),
  ADD UNIQUE KEY `id_guru_fk_2` (`id_guru_fk`),
  ADD KEY `role_id_fk` (`role_id_fk`),
  ADD KEY `siswa_admin` (`ketua_kelas`),
  ADD KEY `id_guru_fk` (`id_guru_fk`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kelas_siswa`
--
ALTER TABLE `detail_kelas_siswa`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=977;

--
-- AUTO_INCREMENT for table `history_guru`
--
ALTER TABLE `history_guru`
  MODIFY `id_history_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `history_message`
--
ALTER TABLE `history_message`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `keterangan_presensi`
--
ALTER TABLE `keterangan_presensi`
  MODIFY `id_status_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_jam_pelajaran`
--
ALTER TABLE `master_jam_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `kd_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=642;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelas_siswa`
--
ALTER TABLE `detail_kelas_siswa`
  ADD CONSTRAINT `detail_kelas_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `detail_kelas_siswa_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `detail_kelas_siswa_ibfk_7` FOREIGN KEY (`id_tahun_ajaran_fk`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`),
  ADD CONSTRAINT `detail_kelas_siswa_ibfk_8` FOREIGN KEY (`id_wali_fk`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `history_guru`
--
ALTER TABLE `history_guru`
  ADD CONSTRAINT `history_guru_ibfk_1` FOREIGN KEY (`kd_keterangan_guru_fk`) REFERENCES `keterangan_guru` (`kd_keterangan_guru`),
  ADD CONSTRAINT `history_guru_ibfk_2` FOREIGN KEY (`id_jadwal_fk`) REFERENCES `presensi` (`id_jadwal_fk`);

--
-- Constraints for table `history_message`
--
ALTER TABLE `history_message`
  ADD CONSTRAINT `history_message_ibfk_1` FOREIGN KEY (`id_presensi_fk`) REFERENCES `presensi` (`id_presensi`);

--
-- Constraints for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_6` FOREIGN KEY (`kd_mapel_fk`) REFERENCES `mata_pelajaran` (`kd_mapel`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_7` FOREIGN KEY (`id_kelas_fk`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_8` FOREIGN KEY (`id_guru_fk`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_9` FOREIGN KEY (`id_tahun_ajaran_fk`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`id_jadwal_fk`) REFERENCES `jadwal_pelajaran` (`id_jadwal`),
  ADD CONSTRAINT `presensi_ibfk_3` FOREIGN KEY (`kd_keterangan_fk`) REFERENCES `keterangan_presensi` (`kd_keterangan`),
  ADD CONSTRAINT `presensi_ibfk_4` FOREIGN KEY (`id_siswa_fk`) REFERENCES `detail_kelas_siswa` (`id_detail`);

--
-- Constraints for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD CONSTRAINT `tahun_ajaran_ibfk_1` FOREIGN KEY (`kd_semester`) REFERENCES `keterangan_semester` (`kd_semester`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_guru_fk`) REFERENCES `guru` (`id_guru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
