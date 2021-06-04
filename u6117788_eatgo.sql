-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jun 2021 pada 17.49
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
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id_chat` int(255) NOT NULL,
  `from` int(10) NOT NULL,
  `to` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(100) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `price` int(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id_menu`, `id_restaurant`, `name`, `description`, `category`, `image`, `price`, `is_active`) VALUES
(1, 1, 'Telur Dadar Bakar', 'Telur Ayam dimasak dengan cara didadar kemudian dilumuri kecap dan dpanggang dengan api kecil', 'Makanan', '', 15000, 1);

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

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id_rating`, `id_restaurant`, `id_user`, `rating`, `review`) VALUES
(1, 1, 1, 5, 'Masakannya Enak'),
(2, 1, 2, 4, 'Tempatnya Luas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `id_restaurant` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
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

INSERT INTO `restaurants` (`id_restaurant`, `name`, `phone`, `image`, `address`, `link`, `latitude`, `longitude`, `is_active`) VALUES
(1, 'sample restaurant', '0', 'Restaurant/1.jpg', 'restoran baru', 'https://goo.gl/maps/i1SG2877FYjh9sgW9', '-7.865181', '110.338794', 1),
(22, '', '', '', '', '', '', '', 0),
(21, '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id_slider` int(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id_slider`, `image`) VALUES
(1, 'https://i.ytimg.com/vi/k8xRBTvbA0U/maxresdefault.jpg'),
(2, 'https://lelogama.go-jek.com/post_featured_image/lebihepi_.jpg'),
(3, 'https://pbs.twimg.com/media/EQdmVNhUYAUvzwu.jpg');

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
(2, 0, 'user', '0', 'user', 'jl user', 'user', 'User/2.jpg', 'user'),
(3, 1, 'resto', '0', 'resto', 'jl resto', 'resto', '', 'resto'),
(4, 0, 'percobaan', '341414', 'coba coba ', 'alamat saya', 'user', '', '123456'),
(6, 0, 'coba', '0', 'test', 'alamat', 'user', '', ''),
(8, 21, 'coba1', '0', 'testa', 'alamat', 'resto', '', ''),
(9, 0, 'adad', '123', 'adadad', 'adasdas', '', '', '12323'),
(10, 22, 'dasdasd', '13123', 'adasda', 'adasdas', 'resto', '', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chat`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chat` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id_restaurant` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_slider` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
