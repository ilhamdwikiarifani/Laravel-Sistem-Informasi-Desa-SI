-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 05:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_sid`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2022-06-30 02:31:47', '2022-06-30 02:31:53'),
(3, 'Hindu', '2022-06-23 15:39:10', '2022-06-23 15:39:10'),
(10, 'Budha', '2022-06-23 16:29:46', '2022-06-23 16:29:46'),
(11, 'Protestan', '2022-06-23 16:30:27', '2022-06-24 01:37:41'),
(12, 'Konghucu', '2022-06-24 01:36:50', '2022-06-24 01:36:50'),
(13, 'Katolik', '2022-06-24 01:37:51', '2022-06-24 01:37:51'),
(19, 'Coba', '2022-07-16 12:21:35', '2022-07-16 12:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Bantuan', 'bantuan', '2022-06-15 05:59:23', '2022-06-15 05:59:23'),
(2, 'Pembangunan', 'pembangunan', '2022-06-15 05:59:37', '2022-06-15 05:59:37'),
(3, 'Nasional', 'nasional', '2022-06-15 06:16:07', '2022-06-19 18:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(11, 'tes1', 'farham.ucha@gmail.com', '082384756483', 'tes1', 'hai', '2022-07-13 02:23:13', '2022-07-13 02:23:13'),
(12, 'tes2', 'tes2@gmail.com', '888999999999', 'tes2', 'tess', '2022-07-13 02:26:54', '2022-07-13 02:26:54'),
(13, 'TES3', 'TEs3@gmail.com', '083475648574', 'TES3', 'hai', '2022-07-13 02:31:08', '2022-07-13 02:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `danas`
--

CREATE TABLE `danas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danas`
--

INSERT INTO `danas` (`id`, `nama`, `jumlah`, `keterangan`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 'Sumber Dana 1', '10000000.00', NULL, '2022-07-06 14:09:12', NULL, '2022-07-06 14:09:12'),
(2, 'Sumber Dana 2', '0.00', 'hai', '2022-07-06 08:02:10', NULL, '2022-07-06 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `dana_keluars`
--

CREATE TABLE `dana_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dana_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dana_keluars`
--

INSERT INTO `dana_keluars` (`id`, `dana_id`, `jumlah`, `keterangan`, `user_id`, `waktu`, `created_at`, `updated_at`) VALUES
(3, 1, '10000000.00', NULL, 1, '2022-07-06 14:09:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dana_masuks`
--

CREATE TABLE `dana_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dana_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dana_masuks`
--

INSERT INTO `dana_masuks` (`id`, `dana_id`, `jumlah`, `keterangan`, `user_id`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, '20000000.00', NULL, 1, '2022-07-06 06:31:26', NULL, NULL);

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
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nikk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_keluarga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`id`, `nikk`, `kepala_keluarga`, `alamat`, `jumlah_keluarga`, `created_at`, `updated_at`) VALUES
(4, '1234567890256656', 'Hendra', 'Lombakasih, Blok D, Dusun II', 6, '2022-06-21 03:40:25', '2022-07-05 03:05:28'),
(10, '1274657687564785', 'Indra Brukman', 'jl. Hasanuddin Baubau', 2, '2022-07-05 03:37:09', '2022-07-05 03:42:43'),
(13, '9488576857485968', 'Abdul Dalam Mansur', 'Blok K, Dusun I', 0, '2022-07-16 11:59:10', '2022-07-16 12:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keluarga_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_id` bigint(20) UNSIGNED NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakats`
--

INSERT INTO `masyarakats` (`id`, `keluarga_id`, `nik`, `nama`, `jenis_kelamin`, `agama_id`, `tempat_lahir`, `tanggal_lahir`, `status`, `pendidikan_terakhir`, `foto`, `created_at`, `updated_at`) VALUES
(5, 4, '9475867382958674', 'Hendra', 'Laki-laki', 1, 'Lombakasih', '2001-04-19', 'Menikah', 'Lulus SMA', 'foto-masyarakat/LpC1rquXoaDMv2Lq2JtH6gOEnrH2Ll3ZqntX0Ih9.png', '2021-02-16 02:39:53', '2022-06-30 04:38:53'),
(7, 4, '8596847569385747', 'Ilham Dwiki Arifani', 'Laki-laki', 1, 'Lombakasih', '2001-09-09', 'Belum Menikah', 'Strata 2', 'foto-masyarakat/hCbzZx7GTlwUL2rTZr28caVcMvqjR1NFBt1M96z6.png', '2022-02-16 03:42:53', '2022-06-29 03:42:53'),
(8, 4, '8888888859483745', 'Fiecsa Noercikalti Aditya', 'Perempuan', 1, 'Lombakasih', '2001-12-04', 'Belum Menikah', 'Strata 1', 'foto-masyarakat/tbNYj3cWRbz6c8HH3N5EH14alPYiuHrXcVyuUlmf.png', '2022-03-03 04:29:20', '2022-06-29 04:29:20'),
(9, 4, '8495068392857454', 'Diana', 'Perempuan', 1, 'Lombakasih', '2011-09-08', 'Belum Menikah', 'Lulus SD', 'foto-masyarakat/b7jDb2psmtCruNsE34PUVagevzyfHDMG4M1dVitr.png', '2022-04-04 03:23:59', '2022-06-30 03:23:59'),
(11, 4, '7584938475684675', 'karmila', 'Perempuan', 1, 'Lombakasih', '2001-09-20', 'Menikah', 'Strata 1', 'foto-masyarakat/mbkkhJQW7eLRz5FJGAWHo58pJc8M9MHMrZ28Iyfn.png', '2022-01-05 02:19:24', '2022-07-05 02:19:24'),
(12, 4, '8375637483756475', 'Hadi', 'Laki-laki', 1, 'Lombakasih', '2008-03-09', 'Belum Menikah', 'Tidak Lulus SD', 'foto-masyarakat/Ano27eKQwALAE52AuUUwez0RsDa6iimNB16F0zeg.png', '2020-07-05 03:05:28', '2022-07-05 03:05:28'),
(13, 10, '1274677656434567', 'Indra Brukman', 'Laki-laki', 1, 'Kalidupa', '2000-03-09', 'Menikah', 'Strata 1', 'foto-masyarakat/DEFcbMokUM9n2uMmQdpLuTCmgrdb9ZJEBERj2ZEg.png', '2020-07-05 03:38:09', '2022-07-05 03:38:09'),
(14, 10, '1274623497584736', 'Ayu', 'Perempuan', 1, 'Kalidupa', '2000-09-08', 'Menikah', 'Lulus SMA', 'foto-masyarakat/vYGLcrYP4xOmuh9heHeoiX59Apu5pltYDNBQJ4as.png', '2022-04-05 03:42:43', '2022-07-05 03:42:43');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_075525_create_categories_table', 1),
(6, '2022_06_13_075705_create_posts_table', 1),
(8, '2022_06_20_022500_create_keluargas_table', 3),
(12, '2022_06_21_095810_create_agamas_table', 5),
(13, '2022_06_19_055520_create_masyarakats_table', 6),
(15, '2014_10_12_000000_create_users_table', 7),
(27, '2022_06_30_094645_create_danas_table', 8),
(28, '2022_06_30_095919_create_dana_masuks_table', 8),
(29, '2022_06_30_095929_create_dana_keluars_table', 8),
(30, '2022_07_05_122922_create_views_table', 9),
(31, '2022_07_13_091130_create_contacts_table', 10);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `excerpt`, `body`, `foto`, `published_at`, `created_at`, `updated_at`) VALUES
(26, 1, 'Judul Post Pertama', 'judul-post-pertama', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/YsyMn4ADcZRl6H9e7EXP8PxGsFXyApIYH0PP68QI.png', '2022-06-23 16:18:31', '2022-06-23 16:18:31', '2022-06-23 16:18:31'),
(27, 3, 'Judul Post Kedua', 'judul-post-kedua', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/8dNyGMjKzETmYw4unubgqBKguMFS6R39Eb1HqOVm.png', '2022-06-23 16:19:00', '2022-06-23 16:19:00', '2022-06-23 16:19:00'),
(28, 1, 'Judul Post ketiga', 'judul-post-ketiga', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/ISUWfX2KADfOULFdkvZUOLyDYa8oLcNKe5y09ioe.png', '2022-06-23 16:19:23', '2022-06-23 16:19:23', '2022-06-23 16:19:23'),
(29, 1, 'Judul Post keempat', 'judul-post-keempat', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/qV6LVLuCFvQeJF2p1D0hilK3w0PDdjD72JYdT70R.png', '2022-06-23 16:19:42', '2022-06-23 16:19:42', '2022-06-23 16:19:42'),
(30, 1, 'Judul Post kelima', 'judul-post-kelima', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/wp5ciFkzjVLO0oA9XMZ0nAIYJYbrSIuMClKZV5hV.png', '2022-06-23 16:20:05', '2022-06-23 16:20:05', '2022-06-23 16:20:05'),
(31, 1, 'Judul Post keenam', 'judul-post-keenam', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciun...', '<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae repellat dignissimos sapiente. Iure iusto nemo dignissimos, reprehenderit beatae magni adipisci autem minus quaerat consequatur, nesciunt atque totam corrupti maiores architecto doloremque laudantium qui aliquam quo blanditiis quia libero id sit! Eos sed a ea accusamus laudantium cumque porro. Asperiores, recusandae.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, excepturi laboriosam distinctio dolorem debitis beatae sapiente quasi magni in id fugiat quia commodi nisi fugit. Accusamus odit quae corporis ducimus impedit optio, commodi unde id tempora est dolor, quisquam voluptatum obcaecati earum laboriosam modi doloremque? Odio quos nam suscipit quibusdam temporibus rerum quae perferendis ut aspernatur nisi doloremque adipisci maiores ex eos aliquid praesentium quaerat inventore, a incidunt tenetur aut! Eum, temporibus. Distinctio sequi, sed aperiam, minus at explicabo magni est tempore maxime tenetur soluta facere in deleniti, possimus tempora?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nobis magni, iste quo saepe nesciunt odio veritatis dolorem nisi. Minus iusto cum hic voluptates similique maiores qui impedit rem et.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, quasi error! Eos numquam, ea accusamus debitis obcaecati soluta eius eum excepturi odit nemo deleniti iure dignissimos facere repellat delectus maxime aperiam. Aliquid quia sequi dolores quam, sapiente fugit ratione quos corrupti debitis officiis assumenda consequatur vero consequuntur. Non sunt harum veritatis quod quidem doloribus dolores, nisi, in ut ullam odio alias pariatur explicabo facere sit quas rem excepturi obcaecati rerum ipsa voluptas perspiciatis eveniet unde. Iusto placeat fugit earum. Quaerat explicabo asperiores vitae quos et placeat est ipsum quisquam consequatur iste, unde perferendis inventore quibusdam, officia magni, doloribus quae tenetur? Autem at natus distinctio hic omnis libero, maxime aliquid maiores ex non accusantium, beatae accusamus repellat numquam sequi voluptates dignissimos.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis natus unde perferendis facere laborum iure dolorem repudiandae tenetur deserunt autem.</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, laudantium!</div>', 'foto-post/0fXhdlMo8kx6wRITbYEwysD0SdT0Fu4YShEilOKf.png', '2022-06-23 16:20:29', '2022-06-23 16:20:29', '2022-06-23 16:20:29'),
(33, 3, 'Judul post ketujuh', 'judul-post-ketujuh', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem odit laboriosam ipsum et iure dolores rem quae cum minima molestias recusandae aliquid, similique pariatur ratione optio iusto qui rep...', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem odit laboriosam ipsum et iure dolores rem quae cum minima molestias recusandae aliquid, similique pariatur ratione optio iusto qui repellendus repudiandae culpa nulla quaerat libero sint. Sunt autem numquam ad dignissimos!</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur neque minus incidunt tempore in similique delectus impedit. Ullam placeat ipsa est numquam rem et eligendi excepturi. Molestias fugiat voluptates praesentium vero nostrum, consequuntur libero quasi sapiente assumenda aliquid deleniti, illo laboriosam sint iste ad iusto aliquam commodi, eum cum ipsam vel. Magnam sapiente omnis natus obcaecati est, in modi rerum eligendi, totam dolore deleniti ipsam. Magnam quia, aliquam, suscipit obcaecati repellendus dolor minima nobis veritatis unde sed amet aut nulla facere voluptatum fugit iure recusandae laudantium eum saepe vel. Voluptatem esse consequuntur sequi eos dolor, quia est officia odit, neque, ipsum hic iure tempore temporibus itaque non perspiciatis veritatis enim quisquam. Reiciendis velit ipsa quis consectetur quasi est commodi perspiciatis totam, porro, placeat enim distinctio consequatur dicta animi, necessitatibus vel!</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa unde repellendus veritatis quasi voluptas harum quod eaque eveniet, illum quo corporis nam, quisquam ducimus omnis, suscipit maiores sapiente. Quis, debitis.</div><div><br></div><div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A impedit eum esse illo quam facilis deleniti sed pariatur exercitationem adipisci?</div><div><br></div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti facilis neque rem ipsam accusamus ad nesciunt dolor libero. Illum ipsum hic atque dolorem inventore, iste natus iusto nisi dolore culpa qui beatae! Perspiciatis cum, modi natus illo laboriosam quis et enim molestiae. Fugiat, atque recusandae nemo eius ad veritatis accusamus, quisquam voluptatem voluptates nesciunt assumenda, pariatur quia rerum hic blanditiis minus ea officia? Amet at delectus excepturi velit maxime reiciendis sint libero sapiente? Magni perspiciatis deleniti aperiam illo corrupti odit veritatis magnam. Odit porro facilis sequi et nostrum optio voluptates.</div><div><br></div>', 'foto-post/BGJY7kmUZ5nvJwTE1HcWQkrKQuuXLIKIdAI20Sz9.png', '2022-06-24 07:52:55', '2022-06-24 07:52:55', '2022-06-24 07:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masyarakat_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `masyarakat_id`, `email`, `email_verified_at`, `username`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'admin@gmail.com', NULL, 'admin', '$2y$10$Ft3F/sI8UXmFyGy/xrevAeEwmrm5O07JrYxodwWRnHRTr9K.2sHX2', '1', NULL, '2022-07-05 04:09:27', '2022-07-05 04:10:51'),
(17, 13, 'user@gmail.com', NULL, 'user', '$2y$10$1Vu4eFxYh4rYSWSNlXQLqOQhiufdjDC7Q/924WJeebFfySyFfI0mK', '0', NULL, '2022-07-12 07:29:44', '2022-07-12 07:29:44'),
(18, 7, 'ilham@gmail.com', NULL, 'ilham', '$2y$10$UZw4jV.xxgr.RaZReml0Y.idyPC04yAoOa4s2pnqGJDnVnuzgQow2', '0', NULL, '2022-07-13 03:11:35', '2022-07-13 03:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `viewable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(1, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 04:54:23'),
(2, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 04:55:18'),
(3, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 04:55:23'),
(4, 'App\\Models\\Post', 33, 'OfTNggwGv5jqhNIJR478NrRf62IYsnbzxgBOg94nyLF2xEDKzg3qMpcmkx7iRQbNHl7C9eRmDvSlMqed', NULL, '2022-07-05 04:55:58'),
(5, 'App\\Models\\Post', 33, 'OfTNggwGv5jqhNIJR478NrRf62IYsnbzxgBOg94nyLF2xEDKzg3qMpcmkx7iRQbNHl7C9eRmDvSlMqed', NULL, '2022-07-05 04:56:05'),
(6, 'App\\Models\\Post', 31, 'OfTNggwGv5jqhNIJR478NrRf62IYsnbzxgBOg94nyLF2xEDKzg3qMpcmkx7iRQbNHl7C9eRmDvSlMqed', NULL, '2022-07-05 04:59:32'),
(7, 'App\\Models\\Post', 31, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:00:22'),
(8, 'App\\Models\\Post', 31, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:00:33'),
(9, 'App\\Models\\Post', 31, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:00:53'),
(10, 'App\\Models\\Post', 31, 'OfTNggwGv5jqhNIJR478NrRf62IYsnbzxgBOg94nyLF2xEDKzg3qMpcmkx7iRQbNHl7C9eRmDvSlMqed', NULL, '2022-07-05 05:01:08'),
(11, 'App\\Models\\Post', 31, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:04:51'),
(12, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:04:58'),
(13, 'App\\Models\\Post', 30, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-05 05:05:08'),
(14, 'App\\Models\\Post', 31, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-07 08:05:20'),
(15, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-07 08:06:09'),
(16, 'App\\Models\\Post', 28, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-07 08:06:40'),
(17, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-08 01:40:57'),
(18, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-12 07:26:06'),
(19, 'App\\Models\\Post', 33, 'q6a8hOFE0hhW7Aqy9FjSLoMrrPsrD6okP0jhWhOamh0ZE8GbCPHmBranSqY5bLdHNv2NtPlC9s5A9OYV', NULL, '2022-07-13 02:36:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danas`
--
ALTER TABLE `danas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dana_keluars`
--
ALTER TABLE `dana_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dana_masuks`
--
ALTER TABLE `dana_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keluargas_nikk_unique` (`nikk`);

--
-- Indexes for table `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masyarakats_nik_unique` (`nik`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `danas`
--
ALTER TABLE `danas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dana_keluars`
--
ALTER TABLE `dana_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dana_masuks`
--
ALTER TABLE `dana_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
