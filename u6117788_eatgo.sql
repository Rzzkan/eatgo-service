-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jun 2021 pada 14.08
-- Versi server: 10.3.28-MariaDB-cll-lve
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6117788_eatgo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(100) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` int(1) NOT NULL,
  `image` text NOT NULL,
  `price` int(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(100) NOT NULL,
  `id_restaurant` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `id_restaurant` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `address` text NOT NULL,
  `link` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restaurants`
--

INSERT INTO `restaurants` (`id_restaurant`, `name`, `image`, `address`, `link`, `latitude`, `longitude`, `is_active`) VALUES
(1, 'sample restaurant', '', 'restoran baru', 'https://goo.gl/maps/i1SG2877FYjh9sgW9', '-7.865181', '110.338794', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` int(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(100) NOT NULL,
  `id_restaurant` int(100) NOT NULL DEFAULT 0,
  `username` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_restaurant`, `username`, `phone`, `name`, `address`, `role`, `image`, `password`) VALUES
(1, 0, 'admin', '0', 'admin', 'jl. admin', 'admin', '', 'admin'),
(2, 0, 'user', '0', 'user', 'jl user', 'user', '', 'user'),
(3, 1, 'resto', '0', 'resto', 'jl resto', 'resto', '', 'resto');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id_restaurant`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id_restaurant` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
