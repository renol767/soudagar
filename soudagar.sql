-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 08:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soudagar`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'draft',
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `slug`, `konten`, `image`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 'Cara gandakan uang ala gus samsudin', 'Cara_gandakan_uang_ala_gus_samsudin', '\"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae sequi tempore mollitia est pariatur laboriosam! Vitae deleniti reiciendis delectus suscipit sunt atque, tempora, molestiae, libero expedita beatae voluptate odio numquam?</p>\"', '1659545239.png', 'publish', '2022-08-03', NULL, '2022-08-03 09:47:19'),
(3, 'Apa saja', 'Apa_saja', '\"<p>jsadjnajdknkjwqnd</p><p>qwdjbqwjdbqw</p><p>dqwjdbqjwkdqwj\'bdcqw</p><p>cqfjwbdqwdqwjdbqw</p><p>dqw\'jbdqw</p><p>dqwjbd</p><p>qwjkdqwjkbdjkwqkdjbqwd</p><p>qwdjbqw</p><p>kjdqwdbqwd</p><p>qwdb</p><p>qwdq</p><p><br></p>\"', '1659545126.png', 'publish', '2022-08-03', NULL, '2022-08-03 09:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) NOT NULL,
  `nama_brand` varchar(255) NOT NULL,
  `logo_brand` varchar(255) NOT NULL,
  `deskripsi_brand` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `nama_brand`, `logo_brand`, `deskripsi_brand`) VALUES
(4, 'AWS', '1659207131.png', 'Amazon Web Services'),
(5, 'Microsoft Azure', '1659202950.png', 'Microsoft Azure Cloud'),
(10, 'sdsdsdsd', '1659421085.png', 'sdsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `slug`, `deskripsi`) VALUES
(2, 'Bisa Punya Penghasilan Tambahan Tanpa Perlu Modal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea officiis eveniet harum in ratione magni labore doloribus, explicabo accusamus dignissimos totam neque possimus id facere voluptates quos minus repellat sequi?'),
(3, 'Gandakan uang tanpe pergi ke dukun', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea officiis eveniet harum in ratione magni labore doloribus, explicabo accusamus dignissimos totam neque possimus id facere voluptates quos minus repellat sequi?');

-- --------------------------------------------------------

--
-- Table structure for table `kontenweb`
--

CREATE TABLE `kontenweb` (
  `id` int(11) NOT NULL,
  `showcase1` varchar(255) DEFAULT NULL,
  `deskripsi_showcase1` text DEFAULT NULL,
  `img_showcase1` varchar(255) DEFAULT NULL,
  `showcase2` varchar(255) DEFAULT NULL,
  `deskripsi_showcase2` text DEFAULT NULL,
  `img_fadeInLeft_Showcase2` varchar(255) DEFAULT NULL,
  `img_fadeInUp_Showcase2` varchar(255) DEFAULT NULL,
  `showcase3` varchar(255) DEFAULT NULL,
  `deskripsi_showcase3` text DEFAULT NULL,
  `img_fadeInLeft_Showcase3` varchar(255) DEFAULT NULL,
  `img_fadeInUp_Showcase3` varchar(255) DEFAULT NULL,
  `tagline_produkdanbrand` varchar(255) DEFAULT NULL,
  `tagline_benefit` varchar(255) DEFAULT NULL,
  `deskripsi_benefit` text DEFAULT NULL,
  `img_benefit` varchar(255) DEFAULT NULL,
  `poin_benefit` text DEFAULT NULL,
  `deskripsi_poin_benefit` text DEFAULT NULL,
  `tagline_keunggulan` varchar(255) DEFAULT NULL,
  `deskripsi_keunggulan` text DEFAULT NULL,
  `img_keunggulan` varchar(255) DEFAULT NULL,
  `poin_keunggulan` text DEFAULT NULL,
  `deskripsi_poin_keunggulan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontenweb`
--

INSERT INTO `kontenweb` (`id`, `showcase1`, `deskripsi_showcase1`, `img_showcase1`, `showcase2`, `deskripsi_showcase2`, `img_fadeInLeft_Showcase2`, `img_fadeInUp_Showcase2`, `showcase3`, `deskripsi_showcase3`, `img_fadeInLeft_Showcase3`, `img_fadeInUp_Showcase3`, `tagline_produkdanbrand`, `tagline_benefit`, `deskripsi_benefit`, `img_benefit`, `poin_benefit`, `deskripsi_poin_benefit`, `tagline_keunggulan`, `deskripsi_keunggulan`, `img_keunggulan`, `poin_keunggulan`, `deskripsi_poin_keunggulan`) VALUES
(1, '<strong>Buka Usaha Online</strong> cuma modal HP Tanbabdhw', 'Usaha online tanpa modal dan gratis belajar bisnis dipandu tim berpengalaman. Reseller kami telah berhasil meraih omzet hingga ratusan juta rupiah dan komisi hingga 10 juta Rupiah. Kamu juga bisa seperti mereka dengan jadi reseller di Soudagar.id.', 'img_showcase1_1659421738.png', 'Dapatkan Omzet hingga 100 Juta Rupiah dengan Komisi hingga 10 Juta Rupiah', 'Dapatkan komisi tambahan senilai Rp 100.000* dari setiap Reseller yang bergabung menggunakan Kode Referral (Referral ID)\r\n\r\n                        *S&K Berlaku; Berlaku Kelipatan', 'img_fadeInLeft_Showcase2_1659419843.png', 'img_fadeInUp_Showcase2_1659419843.png', 'Produk dari Brand UMKM', 'Mari berpartisipasi memajukan UMKM Indonesia dengan menjual puluhan ribu produk dari brand lokal asli Indonesia dengan kualitas terbaik.', 'img_fadeInLeft_Showcase3_1659419843.png', 'img_fadeInUp_Showcase3_1659419843.png', 'Reseller dapat menjual <strong>80.000++</strong> Produk dari <strong>700++</strong> Brand Lokal yang dijamin Kualitas dan Keasliannya', 'Benefit yang didapatkan Reseller.', 'Semuanya GRATIS', 'img_benefit_1659419843.png', 'Keuntungan 100juta-Tanpa modal', 'dapatkan keuntungan hingga 120jt perbulan-Usaha tanpa modal adalah impian', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium architecto dolores odio nemo, minus quod nobis natus obcaecati id repellat veritatis eos iusto illum ut debitis vitae veniam aliquid labore!', 'img_keunggulan_1659419843.png', 'Customter service 24/30-tanpa modal', 'Input disini - disisni juga');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_brand` bigint(11) NOT NULL,
  `id_produk` int(255) NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `kuantitas` int(255) NOT NULL,
  `jumlah_harga` int(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'belum bayar',
  `tanggal_pengambilan` date NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_brand`, `id_produk`, `id_user`, `kuantitas`, `jumlah_harga`, `status`, `tanggal_pengambilan`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 2, 2, 2, 'sudah bayar', '2022-08-05', '2022-08-05', '2022-08-05 14:46:34'),
(3, 5, 1, 2, 12, 12, 'belum bayar', '2022-08-06', '2022-08-06 04:23:18', '2022-08-06 06:28:12'),
(5, 5, 2, 2, 1231, NULL, 'belum bayar', '2022-08-06', '2022-08-06 12:03:55', '2022-08-06 12:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `stok_produk` varchar(255) NOT NULL,
  `harga_reseller` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `id_brand` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `harga_reseller`, `harga_jual`, `id_brand`) VALUES
(1, 'EC2', '1659209443.png', 'Amazon EC2 Service', '100', '1000000', '1200000', 4),
(2, 'Azure Machine Learning', '1659213779.jpg', 'Azure Machine Learning', '200', '4000000', '4500000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('website','gudang','reseller') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reseller',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Websiteyu', 'website@soudagar.id', '089898611682', NULL, '$2y$10$Esm9G5jnyLFZ4NAc89sbZuuVldYsxVybGPZ/1/PkVS4nRPSjsKGNS', 'website', '1659836904.png', '2tjBfc5Siuh0EpQGJSEQ6mi0l4nKvcjc5TXB30Y13xvdsCrL34KttkZr6eM5', '2022-07-25 19:39:32', '2022-08-06 18:48:25'),
(2, 'Reseller', 'reseller@soudagar.id', '0897986t87', NULL, '$2y$10$AtHx0WvHl02KT2UUG4A/ouKsnJsLEKQgek0o7a1U30JaFfHtSitnG', 'reseller', '1659837593.png', NULL, '2022-07-25 20:12:27', '2022-08-06 18:59:53'),
(3, 'Gudang', 'gudang@soudagar.id', '089898611682', NULL, '$2y$10$C4nWsqtukMmj4tE0t78JEOMd0iHudkWiymvqvM5abnbrH6McP3sxW', 'gudang', '1659837426.png', NULL, '2022-07-26 06:33:04', '2022-08-06 18:57:06'),
(6, 'Steven Alex', 'steve@mail.com', '083124141124', NULL, '$2y$10$FcwXYi8.4pVsAFZbWxmltul4KMPtm6J4XrvESSlyYHSydCFzpLa/i', 'reseller', 'default.jpg', NULL, '2022-08-10 23:34:57', '2022-08-10 23:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontenweb`
--
ALTER TABLE `kontenweb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`,`id_produk`,`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontenweb`
--
ALTER TABLE `kontenweb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `id_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
