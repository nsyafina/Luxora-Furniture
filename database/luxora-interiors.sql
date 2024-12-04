-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2024 pada 13.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxora-interiors`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `material` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga`, `gambar`, `berat`, `material`, `warna`, `kapasitas`) VALUES
(5, 'Aurel Dining Table', 2, 3000000, 'dr1.png', 17, 'Solid surface', 'Abu-abu muda', '5 orang'),
(6, 'Velora Dining Table', 2, 3700000, 'dr2.png', 17, 'Kayu solid', 'Coklat tua', '6 orang'),
(8, 'Bellanova Sofa', 3, 5500000, 'lr3.png', 33, 'Katun', 'Broken White', '2 orang'),
(9, 'Cosvello Sofa', 3, 4700000, 'lr1.png', 25, 'Katun puff', 'Abu-abu', '2 orang'),
(10, 'Mirella Sofa', 3, 4500000, 'lr2.png', 30, 'Beludru', 'Navy', '2 orang'),
(11, 'Celestia Table', 3, 6900000, 'lr6.png', 35, 'Kayu, PVC', 'Putih, Kayu alami', '-'),
(12, 'Aurora Table', 3, 5900000, 'lr5.png', 37, 'Kayu', 'Hitam, Kayu alami', '-'),
(13, 'Soluva Table', 3, 5500000, 'lr4.png', 30, 'Kayu, PVC', 'Putih, Kayu alami', '-'),
(14, 'Goldie Tv Table ', 3, 4000000, 'lr7.png', 25, 'PVC', 'Gold', '-'),
(15, 'Pearlvia Tv Table ', 3, 4500000, 'lr9.png', 27, 'Kayu, PVC', 'Abu-abu', '-'),
(16, 'Vivalie Tv Table ', 3, 4500000, 'lr8.png', 25, 'Kayu, PVC', 'Putih', '-'),
(17, 'Moira Bed', 1, 6000000, 'br1.png', 50, 'Kayu Mahoni', 'Vinyl', '2 orang'),
(18, 'Serene Bed', 1, 6200000, 'br2.png', 40, 'Medium Density Fiberboard', 'Mocca', '2 orang'),
(19, 'Zaphira Bed', 1, 6500000, 'br3.png', 40, 'Medium Density Fiberboard', 'Hitam', '2 orang'),
(20, 'Aster Couch', 1, 2300000, 'br4.png', 8, 'Microfiber, Kayu', 'Putih ', '1 orang'),
(21, 'Nyra Couch', 1, 2500000, 'br6.png', 6, 'Microfiber', 'Putih', '1 orang'),
(22, 'Vellia Couch', 1, 2300000, 'br5.png', 7, 'Suede sintetis', 'Putih', '1 orang'),
(23, 'Ferno Nightstand', 1, 2000000, 'br71.png', 4, 'Kayu Jati', 'Vinyl', '-'),
(24, 'Rumi Nightstand', 1, 2500000, 'br8.png', 4, 'Kayu, PVC', 'Matcha', '-'),
(25, 'Lush Nightstand', 1, 2100000, 'br9.png', 4, 'Kayu Mahoni', 'Putih', '-'),
(26, 'Clove Dining Table', 2, 3300000, 'dr3.png', 13, 'Kayu Mahoni', 'Mocca', '4 orang'),
(27, 'Milla Lamp', 2, 750000, 'dr4.png', 1, 'Kaca, PVC', 'Hitam', '-'),
(28, 'Jolie Lamp', 2, 8200000, 'dr5.png', 1, 'Kaca, PVC', 'Monochrome', '-'),
(29, 'Lume Lamp', 2, 700000, 'dr6.png', 1, 'Kaca, PVC', 'Putih', '-'),
(30, 'Ruby Plate Cabinet', 2, 3150000, 'dr7.png', 5, 'Kayu Mahoni', 'Vinyl', '-'),
(31, 'Sora Plate Cabinet', 2, 4900000, 'dr9.png', 8, 'Kayu Mahoni', 'Hitam, Putih', '-'),
(32, 'Suki Plate Cabinet', 2, 3750000, 'dr8.png', 7, 'Kayu Mahoni', 'Putih, Vinyl', '-'),
(33, 'Belle Bathtub', 4, 6500000, 'btr4.png', 15, 'Fiberglass', 'Putih', '1 orang'),
(34, 'Misty Bathtub', 4, 6550000, 'btr5.png', 17, 'Akrilik', 'Abu-Abu', '1 orang'),
(35, 'Zora Bathtub', 4, 600000, 'btr6.png', 15, 'Fiberglass', 'Putih', '1 orang'),
(36, 'Philo Sink', 4, 1500000, 'btr1.png', 2, 'Akrilik', 'Abu-abu', '-'),
(37, 'Mallow Sink', 4, 1400000, 'btr2.png', 2, 'Fiberglass', 'Putih', '-'),
(38, 'Rosie Sink', 4, 1900000, 'btr3.png', 4, 'Akrilik', 'Abu-abu', '-'),
(39, 'Kyra Shower', 4, 500000, 'btr7.png', 2, 'Besi Stainless', 'Perak', '-'),
(40, 'Miley Shower', 4, 450000, 'btr9.png', 1, 'Besi Stainless', 'Emas', '-'),
(41, 'Lummy Shower', 4, 550000, 'btr8.png', 2, 'Besi Stainless', 'Hitam', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bedroom'),
(2, 'Dining Room'),
(3, 'Living Room'),
(4, 'Bathroom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `foto`, `alamat`, `no_telp`) VALUES
(10, 'Siti Najla Syafina', 'najla@gmail.com', '$2y$10$UKhKm/k1qxsbx7uJM/H8D.fakotDcljd4GBnTuQO1xl4n7hG4SAfi', 'Cikgu_Melati_-_Upin_Ipin.jpg', 'Jl. Belanak 2 no.25, Blok C22 Rawamangun, Jakarta Timur', '081234567891');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `atas_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BSI', '5434-4382-3434-4345', 'Siti Najla Syafina'),
(2, 'Btpn Syariah', '3342-3456-2346', 'Jelita Shafira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`no_order`, `id_barang`, `qty`) VALUES
('20241121YSN8AJRO', 8, 4),
('20241121YSN8AJRO', 24, 2),
('20241121F2XXARYU', 35, 1),
('20241121F2XXARYU', 37, 1),
('20241122KQH4X23Y', 35, 1),
('20241122KQH4X23Y', 36, 1),
('20241122KQH4X23Y', 39, 1),
('20241122XOYU5IJA', 35, 1),
('20241122XOYU5IJA', 37, 1),
('20241122XOYU5IJA', 39, 1),
('20241123UKT1E90X', 35, 1),
('20241123UKT1E90X', 37, 1),
('20241123UKT1E90X', 39, 1),
('202411244CVHN5PJ', 11, 1),
('202411245CNMISAJ', 5, 1),
('20241125XSBCXU4F', 12, 1),
('20241125D6SP2HXL', 30, 1),
('20241125R8IUFXCW', 24, 1),
('20241125GSAZJOHT', 31, 1),
('202411253HZOD12Q', 8, 1),
('20241125YSA4MKFL', 39, 1),
('20241125KXWKBTP7', 14, 1),
('20241125RIJGAO6Q', 24, 1),
('202411261XIEQS0F', 11, 1),
('202411267JX6SCDO', 12, 1),
('20241127T3RDCJ7F', 37, 1),
('20241127T3RDCJ7F', 39, 1),
('202412014GSCFUR9', 39, 1),
('20241201UUQJC3VO', 18, 1),
('20241201UUQJC3VO', 24, 3),
('20241204HARCKBD8', 24, 1),
('20241204HARCKBD8', 22, 2),
('20241204CRZ4U7KE', 11, 1),
('20241204CRZ4U7KE', 30, 1),
('20241204CRZ4U7KE', 37, 1),
('202412042VILXJF9', 24, 1),
('202412042VILXJF9', 17, 1),
('202412042VILXJF9', 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'Luxora Interiors', 153, 'Jl. Raya Casablanca No. 88, Menteng Dalam, Tebet, Kota Jakarta Selatan, 12870.', '082212345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(20) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `sub_total`, `grand_total`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(18, 9, '202411261XIEQS0F', '2024-11-26', 'Siti Najla Syafina', '085755629887', 'DKI Jakarta', 'Jakarta Barat', 'Cibitung, Bekasi', '17520', 'jne', 'CTC', '1-2 Hari', 10000, 35, 6900000, 6910000, 1, 'bukti_bayar12.jpeg', 'Siti Najla Syafina', 'BSI', '1509-2567-15', 2, '5799952441'),
(19, 9, '202411267JX6SCDO', '2024-11-26', 'Siti Najla Syafina', '085755629887', 'Jawa Barat', 'Ciamis', 'Cibitung, Bekasi', '17520', 'jne', 'JTR', '3-4 Hari', 65000, 37, 5900000, 5965000, 1, 'bukti_bayar13.jpeg', 'Siti Najla Syafina', 'BSI', '1509-2567-15', 3, '9591157946'),
(20, 9, '20241127T3RDCJ7F', '2024-11-27', 'Siti Najla Syafina', '085755629887', 'Jawa Barat', 'Bekasi', 'Cibitung, Bekasi', '17520', 'tiki', 'ECO', '4 Hari', 8000, 4, 1900000, 1908000, 1, 'bukti_bayar14.jpeg', 'Siti Najla Syafina', 'BSI', '1509-2567-15', 1, NULL),
(21, 10, '202412014GSCFUR9', '2024-12-01', 'Linda Setiawan', '085755629887', 'DKI Jakarta', 'Jakarta Timur', 'Cibitung, Bekasi', '17520', 'jne', 'CTC', '1-2 Hari', 10000, 2, 500000, 510000, 1, 'bukti_bayar15.jpeg', 'Muhammad Bintang', 'BSI', '1509-2567-15', 3, '6804281246'),
(22, 10, '20241201UUQJC3VO', '2024-12-01', 'Giovano Denandra', '085755629887', 'DKI Jakarta', 'Jakarta Selatan', 'Cibitung, Bekasi', '17520', 'jne', 'CTC', '1-2 Hari', 10000, 52, 13700000, 13710000, 1, 'bukti_bayar16.jpeg', 'Muhammad Bintang', 'BSI', '1509-2567-15', 3, '8555098830'),
(23, 10, '20241204HARCKBD8', '2024-12-04', 'Giovano Denandra', '085755629887', 'DKI Jakarta', 'Jakarta Utara', 'Cibitung, Bekasi', '17520', 'jne', 'CTCYES', '1-1 Hari', 18000, 18, 7100000, 7118000, 1, 'bukti_bayar17.jpeg', 'Siti Najla Syafina', 'BSI', '1509-2567-15', 3, '1429296058'),
(24, 10, '20241204CRZ4U7KE', '2024-12-04', 'Linda Setiawan', '085755629887', 'DKI Jakarta', 'Jakarta Pusat', 'Jakarta, Menteng', '17520', 'tiki', 'FRZ', '0 Hari', 17000, 42, 11450000, 11467000, 1, 'bukti_bayar18.jpeg', 'Nayla Cyntia', 'BSI', '1509-2567-15', 3, '8175349011'),
(25, 10, '202412042VILXJF9', '2024-12-04', 'Muhammad Bintang', '085755629887', 'DKI Jakarta', 'Jakarta Selatan', 'Jakarta, Menteng', '17520', 'jne', 'CTCYES', '1-1 Hari', 18000, 62, 10800000, 10818000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `alamat`, `no_telp`, `level_user`, `foto`) VALUES
(14, 'Jelita Safira', 'admin1', '$2y$10$jMFX32y7d9FKxAZZjWp1WeTQl8huJG0lAwcW0O4K.ILvIPj2GDdKW', NULL, '081987654321', 1, 'Ipin_-_Upin_Ipin_dan_Kawan-kawan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
