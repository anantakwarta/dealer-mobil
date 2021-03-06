-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2020 at 07:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealer_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `coteknisi`
--

CREATE TABLE `coteknisi` (
  `idCoTeknisi` int(11) NOT NULL,
  `namaCoTeknisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coteknisi`
--

INSERT INTO `coteknisi` (`idCoTeknisi`, `namaCoTeknisi`) VALUES
(3041, 'Bagus'),
(3042, 'Sukiman'),
(3043, 'Sukijan'),
(3044, 'Juana'),
(3045, 'Junedi');

-- --------------------------------------------------------

--
-- Table structure for table `hak`
--

CREATE TABLE `hak` (
  `hakAkses` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak`
--

INSERT INTO `hak` (`hakAkses`, `keterangan`) VALUES
(1, 'admin'),
(2, 'pegawai'),
(3, 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `jabatan`) VALUES
(11, 'Kepala Divisi Pemasaran'),
(12, 'Salesman');

-- --------------------------------------------------------

--
-- Table structure for table `jasaservis`
--

CREATE TABLE `jasaservis` (
  `idJasaServis` int(11) NOT NULL,
  `idTransaksi` int(11) NOT NULL,
  `idMobil` int(11) NOT NULL,
  `idKons` int(11) NOT NULL,
  `tanggalDiterima` datetime DEFAULT NULL,
  `tanggalDikembalikan` datetime DEFAULT NULL,
  `hargaTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasaservis`
--

INSERT INTO `jasaservis` (`idJasaServis`, `idTransaksi`, `idMobil`, `idKons`, `tanggalDiterima`, `tanggalDikembalikan`, `hargaTotal`) VALUES
(2012, 202, 1043, 1031, '2020-06-24 02:06:19', NULL, 0),
(2013, 201, 1042, 1032, '2020-06-27 11:06:40', NULL, 2500000),
(2014, 201, 1042, 1032, '2020-06-29 08:06:09', NULL, 250000);

--
-- Triggers `jasaservis`
--
DELIMITER $$
CREATE TRIGGER `hapus_tiket` BEFORE DELETE ON `jasaservis` FOR EACH ROW BEGIN
	DELETE FROM servisteknisi WHERE servisteknisi.idJasaServis = OLD.idJasaServis;
    DELETE FROM partdipakai WHERE partdipakai.idJasaServis = OLD.idJasaServis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `idKons` int(11) NOT NULL,
  `namaKons` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kodePos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`idKons`, `namaKons`, `username`, `alamat`, `noTelp`, `kota`, `provinsi`, `kodePos`) VALUES
(1031, 'Tejo Sutejo', 'tejo', 'Sawangan', '098765432109', 'Sawangan', 'Sawangan', 1234),
(1032, 'Warno Suwarno', 'warno', 'Sayangan', '089565432109', 'Sayangan', 'Sayangan', 4321);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `idMerk` int(11) NOT NULL,
  `namaMerk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`idMerk`, `namaMerk`) VALUES
(21, 'Toyota'),
(22, 'Daihatsu'),
(23, 'Honda'),
(24, 'Mitsubishi'),
(25, 'Suzuki'),
(26, 'Nissan'),
(27, 'Mazda');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idMobil` int(11) NOT NULL,
  `idMerk` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `idWarna` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idMobil`, `idMerk`, `model`, `idWarna`, `tahun`, `harga`, `stok`) VALUES
(1041, 21, 'Agya', 31, '2015', 150000000, 4),
(1042, 21, 'Alphard', 32, '2018', 1340000000, 3),
(1043, 22, 'Ayla', 33, '2018', 102150000, 5),
(1044, 22, 'Terios', 34, '2016', 211800000, 5),
(1045, 21, 'Yaris', 36, '2015', 270000000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `idPart` int(11) NOT NULL,
  `namaPart` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`idPart`, `namaPart`, `harga`) VALUES
(4011, 'Ban', 575000),
(4012, 'Velg', 4900000),
(4013, 'Knalpot', 350000),
(4014, 'Klakson', 195000),
(4015, 'Kampas Rem', 30000),
(4016, 'Filter AC', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `partdipakai`
--

CREATE TABLE `partdipakai` (
  `idPartDipakai` int(11) NOT NULL,
  `idPart` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idJasaServis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partdipakai`
--

INSERT INTO `partdipakai` (`idPartDipakai`, `idPart`, `jumlah`, `idJasaServis`) VALUES
(4021, 4011, 4, 2012),
(4022, 4011, 4, 2013),
(4023, 4016, 2, 2014);

--
-- Triggers `partdipakai`
--
DELIMITER $$
CREATE TRIGGER `hapus_part` BEFORE DELETE ON `partdipakai` FOR EACH ROW BEGIN
	UPDATE jasaservis js, part p, transaksi t
    SET js.hargaTotal = js.hargaTotal - (OLD.jumlah * p.harga)
    WHERE js.idJasaServis = OLD.idJasaServis AND p.idPart = OLD.idPart AND js.idTransaksi = t.idTransaksi AND DATE_SUB(js.tanggalDiterima, INTERVAL 1 YEAR) > DATE(t.tanggal);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_part` AFTER INSERT ON `partdipakai` FOR EACH ROW BEGIN
	UPDATE jasaservis js, part p, transaksi t
    SET js.hargaTotal = js.hargaTotal + (NEW.jumlah * p.harga)
    WHERE js.idJasaServis = NEW.idJasaServis AND p.idPart = NEW.idPart AND js.idTransaksi = t.idTransaksi AND DATE_SUB(js.tanggalDiterima, INTERVAL 1 YEAR) > DATE(t.tanggal);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `namaPegawai` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noTelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `namaPegawai`, `username`, `idJabatan`, `alamat`, `noTelp`) VALUES
(1021, 'Ananta Kwarta Durianto', 'ananta', 11, 'Wonosobo', '081234567890'),
(1022, 'Bambang Subekti', 'bambang', 12, 'Winisibi', '081425364758');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `idServis` int(11) NOT NULL,
  `namaServis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`idServis`, `namaServis`, `harga`) VALUES
(3021, 'Ganti Oli Mesin', 50000),
(3022, 'Ganti Filter Oli', 50000),
(3023, 'Ganti Busi', 200000),
(3024, 'Ganti Aki', 250000),
(3025, 'Ganti Oli Power Steering', 50000),
(3026, 'Ganti isi air aki', 30000),
(3027, 'Ganti Oli Rem', 30000),
(3028, 'Gurah Mesin', 300000),
(3029, 'Balancing dan Spooring', 200000),
(3030, 'Tune Up', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `servisteknisi`
--

CREATE TABLE `servisteknisi` (
  `idServisTeknisi` int(11) NOT NULL,
  `idJasaServis` int(11) NOT NULL,
  `idTeknisi` int(11) NOT NULL,
  `idServis` int(11) NOT NULL,
  `jamMulai` time NOT NULL,
  `jamSelesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servisteknisi`
--

INSERT INTO `servisteknisi` (`idServisTeknisi`, `idJasaServis`, `idTeknisi`, `idServis`, `jamMulai`, `jamSelesai`) VALUES
(2021, 2012, 3031, 3025, '00:00:00', NULL),
(2022, 2013, 3031, 3029, '00:00:00', NULL),
(2023, 2014, 3031, 3022, '00:00:00', NULL);

--
-- Triggers `servisteknisi`
--
DELIMITER $$
CREATE TRIGGER `hapus_servis` BEFORE DELETE ON `servisteknisi` FOR EACH ROW BEGIN
	UPDATE jasaservis js, servis s, transaksi t
    SET js.hargaTotal = js.hargaTotal - s.harga
    WHERE js.idJasaServis = OLD.idJasaServis AND s.idServis = OLD.idServis AND js.idTransaksi = t.idTransaksi AND DATE_SUB(js.tanggalDiterima, INTERVAL 1 YEAR) > DATE(t.tanggal);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_servis` BEFORE INSERT ON `servisteknisi` FOR EACH ROW BEGIN
	UPDATE jasaservis js, servis s, transaksi t
    SET js.hargaTotal = js.hargaTotal + s.harga
    WHERE js.idJasaServis = NEW.idJasaServis AND s.idServis = NEW.idServis AND js.idTransaksi = t.idTransaksi AND DATE_SUB(js.tanggalDiterima, INTERVAL 1 YEAR) > DATE(t.tanggal);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `idTeknisi` int(11) NOT NULL,
  `namaTeknisi` varchar(255) NOT NULL,
  `idCoTeknisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`idTeknisi`, `namaTeknisi`, `idCoTeknisi`) VALUES
(3031, 'Bombong', 3041),
(3032, 'Pamungkas', 3042),
(3033, 'Suhar', 3043),
(3034, 'Jono', 3044),
(3035, 'Wahid', 3045);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `idKons` int(11) NOT NULL,
  `idMobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `tanggal`, `idPegawai`, `idKons`, `idMobil`) VALUES
(201, '2018-04-10', 1021, 1032, 1042),
(202, '2020-05-14', 1022, 1031, 1043);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `hapus_transaksi` BEFORE DELETE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE mobil SET stok=stok+1
    WHERE mobil.idMobil = OLD.idMobil;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE mobil SET stok = stok-1
    WHERE idMobil = NEW.idMobil;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_transaksi` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE mobil SET stok=stok-1
    WHERE idMobil = NEW.idMobil;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_transaksi1` BEFORE UPDATE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE mobil SET stok=stok+1
    WHERE idMobil = OLD.idMobil;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hakAkses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hakAkses`) VALUES
('admin', 'admin', 1),
('ananta', 'atnana', 2),
('bambang', 'bambang', 2),
('qwe', 'qwe', 2),
('tejo', 'tejo', 3),
('warno', 'warno', 3);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `idWarna` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`idWarna`, `warna`) VALUES
(31, 'Hitam'),
(32, 'Putih'),
(33, 'Biru'),
(34, 'Hijau'),
(35, 'Merah'),
(36, 'Kuning'),
(37, 'Coklat Tua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coteknisi`
--
ALTER TABLE `coteknisi`
  ADD PRIMARY KEY (`idCoTeknisi`);

--
-- Indexes for table `hak`
--
ALTER TABLE `hak`
  ADD PRIMARY KEY (`hakAkses`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `jasaservis`
--
ALTER TABLE `jasaservis`
  ADD PRIMARY KEY (`idJasaServis`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`idKons`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idMerk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idMobil`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`idPart`);

--
-- Indexes for table `partdipakai`
--
ALTER TABLE `partdipakai`
  ADD PRIMARY KEY (`idPartDipakai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`idServis`);

--
-- Indexes for table `servisteknisi`
--
ALTER TABLE `servisteknisi`
  ADD PRIMARY KEY (`idServisTeknisi`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`idTeknisi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`idWarna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
