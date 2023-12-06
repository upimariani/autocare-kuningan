-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 13.26
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autocare-service`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_reservasi`
--

CREATE TABLE `data_reservasi` (
  `id_transaksi` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `id_sparepart` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_reservasi`
--

INSERT INTO `data_reservasi` (`id_transaksi`, `id_reservasi`, `id_sparepart`, `qty`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sparepart`
--

CREATE TABLE `data_sparepart` (
  `id_sparepart` int(11) NOT NULL,
  `nama_sparepart` varchar(125) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_sparepart`
--

INSERT INTO `data_sparepart` (`id_sparepart`, `nama_sparepart`, `satuan`, `harga`, `stok`, `gambar`) VALUES
(1, 'Castrol Manual GL-4 80W-90 Oli Transmisi', 'liter', '75000', 100, 'a.jpg'),
(2, 'Oli Mobil Super 1000 15w40 1 liter', 'liter', '95000', 100, 'b.jpg'),
(3, 'Cabin Air Filter Ac Agya Ayla Calya Sigra Denso 145520-2510', 'pcs', '75000', 100, 'c.jpg'),
(4, 'TIMING BELT M. L300 \'84 BENSIN DELUXE', 'pcs', '210000', 100, 'd.jpg'),
(5, 'Busi Brisk Mobil ', 'pcs', '275000', 100, 'e.jpg'),
(6, 'Aki Mobil ', 'pcs', '600000', 100, 'f.jpg'),
(7, 'Disc Brake Runstop Toyota Fortuner VNT dan VRZ - VNT 05-15', 'pcs', '2900000', 100, 'g.jpg'),
(8, 'Ban Mobil Bridgestone B250 185/65 R15 ', 'pcs', '1000000', 100, 'h.jpg'),
(9, 'TOP 1 EVOLUTION SAE 5W-30 API SN GASOLINE', 'pcs', '100000', 100, 'i.jpg'),
(10, 'LED Fog Angel Eyes', 'pcs', '200000', 100, 'j.jpg'),
(11, 'Filter Oli Toyota Avanza 15601 - 87702', 'liter', '23500', 100, 'k.jpg'),
(12, 'STP Brake Fluid (Cairan Minyak Rem) DOT 4 Mobil Motor 300 ml PUTIH', 'pcs', '35000', 100, 'l.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tarif`
--

CREATE TABLE `data_tarif` (
  `id_tarif` int(11) NOT NULL,
  `nama_service` varchar(125) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tarif`
--

INSERT INTO `data_tarif` (`id_tarif`, `nama_service`, `harga`) VALUES
(1, 'Spooring', '200000'),
(2, 'Ganti Ban', '200000'),
(3, 'Tune Up', '350000'),
(4, 'Ganti Oli', '100000'),
(5, 'Ganti Aki', '1000000'),
(6, 'Servis Khusus', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Gindara', 'Kuningan, Jawa Barat', '089987654543', 'gindara', 'gindara'),
(2, 'Ahmad', 'Kuningan', '089987654323', 'ahmad', 'ahmad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `tgl_promo` varchar(20) NOT NULL,
  `nama_promo` varchar(125) NOT NULL,
  `besar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `id_tarif`, `tgl_promo`, `nama_promo`, `besar`) VALUES
(1, 1, '2023-12-06', 'Sale! in the day', 5),
(2, 2, '2023-12-06', 'Sale!', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi_service`
--

CREATE TABLE `reservasi_service` (
  `id_reservasi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `plat_kendaraan` varchar(125) NOT NULL,
  `model_kendaraan` varchar(125) NOT NULL,
  `brand_kendaraan` varchar(125) NOT NULL,
  `stat_reservasi` int(11) NOT NULL,
  `total_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi_service`
--

INSERT INTO `reservasi_service` (`id_reservasi`, `id_pelanggan`, `id_tarif`, `date`, `plat_kendaraan`, `model_kendaraan`, `brand_kendaraan`, `stat_reservasi`, `total_pembayaran`) VALUES
(1, 1, 1, '2023-12-02', 'E 6485 SA', 'sdsd', 'asaasfa', 3, '62000'),
(2, 1, 1, '2023-12-02', 'E 6732 ZA', 'sd', 'asa', 3, '54000'),
(3, 2, 0, '2023-12-05', 'E 3452 SU', 'Model A', 'Kijang', 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_reservasi`, `rating`, `testimoni`) VALUES
(1, 1, 5, 'ramah banget');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `kategori_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `kategori_user`) VALUES
(1, 'admin', 'admin', 1),
(2, 'advisor', 'advisor', 2),
(3, 'mekanik', 'mekanik', 3),
(4, 'owner', 'owner', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `data_reservasi`
--
ALTER TABLE `data_reservasi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `data_sparepart`
--
ALTER TABLE `data_sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indeks untuk tabel `data_tarif`
--
ALTER TABLE `data_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `reservasi_service`
--
ALTER TABLE `reservasi_service`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_reservasi`
--
ALTER TABLE `data_reservasi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_sparepart`
--
ALTER TABLE `data_sparepart`
  MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_tarif`
--
ALTER TABLE `data_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservasi_service`
--
ALTER TABLE `reservasi_service`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;