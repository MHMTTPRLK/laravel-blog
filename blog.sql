-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Ağu 2020, 23:26:11
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mehmet PRLK', 'admin@gmail.com', '$2y$10$Th0mJxUaPKMzIuKSCsO7K.e/SWTV6sVmtgBVVh8cQQ/mre2Ayg96O', '2020-07-30 14:16:54', '2020-07-30 14:16:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:pasif 1:aktif',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `image`, `content`, `hit`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 'Laravel Migration Nedir ?', 'uploads/laravel-migration-nedir.jpeg23', '<p><strong>Migration</strong>&nbsp;da,&nbsp;<strong>Laravel</strong>&#39;in veri tabanlarını idare etmek i&ccedil;in kullandığı ara&ccedil;tır. Hatta&nbsp;<strong>Laravel</strong>,&nbsp;<strong>Migration</strong>&nbsp;kullanarak ayrıca veri tabanında versiyonlama işlemi yapar</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -83px; top: 38.6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 6, 1, 'laravel-migration-nedir', NULL, '1980-04-02 05:50:23', '2020-08-09 13:39:06'),
(2, 12, 'Best PHP Framework1', 'uploads/mollitia-libero-repudiandae-aut-vitae.png68', '<p>Best PHP Framework</p>', 24, 1, 'best-php-framework1', NULL, '1974-04-05 05:44:29', '2020-08-13 22:15:42'),
(3, 12, 'Laravel Seeder Nedir ?', 'uploads/laravel-seeder-nedir.png74', '<p>Bu yazımızda Laravel framework&rsquo;te seed işlemlerinden bahsedeceğim. Seed işlemlerinde bahsetmemiz gerekirse migrate işlemleri yaparken veya veri tabanına veri y&uuml;kleme işlemlerini verilen talimatlara g&ouml;re yapan &ouml;zelliktir. &Ouml;ncellikle seed&rsquo;ler database/seed klas&ouml;r&uuml; altında yer almaktadır. &Ouml;ncelikle inceleyeceğimiz dosya DatabaseSeeder dosyası bu dosya bizim seed işlemlerimizi yapacağımız dosyaları &ccedil;alıştıran default bir dosyadır. Bu dosya i&ccedil;erisine ilgili seed&rsquo;leri &ccedil;ağırarak &ccedil;alıştırabiliriz.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -82px; top: 38.6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 11, 1, 'laravel-seeder-nedir', NULL, '1984-10-05 22:32:47', '2020-08-09 13:38:58'),
(8, 13, 'Müzik Dogası', 'uploads/muzik-dogasi.jpg37', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mollis arcu in nunc imperdiet, at ultrices mauris ornare. Praesent pulvinar tempus purus, vel venenatis nisi rutrum eu. Morbi dignissim euismod gravida. Aenean id scelerisque augue. Aenean lobortis mauris mauris, ac interdum nunc cursus et. Etiam ut quam quis quam iaculis blandit vel vitae tellus. Aliquam placerat cursus convallis. Nam arcu justo, bibendum eu eleifend ac, dapibus nec nisi. Quisque tempus magna mollis efficitur hendrerit. Duis eu commodo lectus. Mauris sed turpis sit amet justo dapibus pretium sit amet interdum lorem.</p>\r\n\r\n<p>Nullam lacinia vulputate sodales. Suspendisse potenti. Pellentesque ac tortor velit. Quisque et ornare sapien. Sed ac varius orci, id fringilla purus. Praesent at accumsan elit. Donec eros sem, tristique in magna eget, sollicitudin elementum ante. Aliquam in quam hendrerit, aliquam turpis finibus, lobortis libero. Curabitur id ante lorem. Suspendisse rhoncus ligula vestibulum aliquet consectetur. Proin a rutrum elit.</p>\r\n\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer rutrum convallis dolor sed posuere. Sed ut ligula leo. Mauris nec nibh felis. Praesent bibendum accumsan eleifend. Aliquam sem justo, malesuada et enim non, aliquam hendrerit risus. Ut et venenatis enim. Donec dapibus in ante vestibulum tincidunt. Donec ullamcorper ac enim quis auctor. Cras vitae turpis ultrices, tristique arcu nec, tempus leo.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -72px; top: 38.6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 4, 1, 'muzik-dogasi', NULL, '2020-08-04 12:30:43', '2020-08-09 13:39:15'),
(9, 1, 'Lorem Ipsum', 'uploads/lorem-ipsum.jpg29', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mollis arcu in nunc imperdiet, at ultrices mauris ornare. Praesent pulvinar tempus purus, vel venenatis nisi rutrum eu. Morbi dignissim euismod gravida. Aenean id scelerisque augue. Aenean lobortis mauris mauris, ac interdum nunc cursus et. Etiam ut quam quis quam iaculis blandit vel vitae tellus. Aliquam placerat cursus convallis. Nam arcu justo, bibendum eu eleifend ac, dapibus nec nisi. Quisque tempus magna mollis efficitur hendrerit. Duis eu commodo lectus. Mauris sed turpis sit amet justo dapibus pretium sit amet interdum lorem.</p>\r\n\r\n<p>Nullam lacinia vulputate sodales. Suspendisse potenti. Pellentesque ac tortor velit. Quisque et ornare sapien. Sed ac varius orci, id fringilla purus. Praesent at accumsan elit. Donec eros sem, tristique in magna eget, sollicitudin elementum ante. Aliquam in quam hendrerit, aliquam turpis finibus, lobortis libero. Curabitur id ante lorem. Suspendisse rhoncus ligula vestibulum aliquet consectetur. Proin a rutrum elit.</p>\r\n\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer rutrum convallis dolor sed posuere. Sed ut ligula leo. Mauris nec nibh felis. Praesent bibendum accumsan eleifend. Aliquam sem justo, malesuada et enim non, aliquam hendrerit risus. Ut et venenatis enim. Donec dapibus in ante vestibulum tincidunt. Donec ullamcorper ac enim quis auctor. Cras vitae turpis ultrices, tristique arcu nec, tempus leo.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -80px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 6, 1, 'lorem-ipsum', NULL, '2020-08-04 13:24:57', '2020-08-22 20:37:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'İçeriklerim', 'genel', 1, '2020-08-04 12:47:26', '2020-08-08 16:54:00'),
(6, 'Günlük Yaşam', 'gunluk-yasam', 1, '2020-07-30 14:16:53', '2020-08-08 16:53:59'),
(12, 'Laravel', 'laravel', 1, '2020-08-04 13:24:08', '2020-08-09 13:18:29'),
(13, 'Muzik', 'muzik', 1, '2020-08-04 13:24:12', '2020-08-08 16:52:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `configs`
--

INSERT INTO `configs` (`id`, `title`, `logo`, `favicon`, `active`, `facebook`, `twitter`, `github`, `linkedin`, `youtube`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'PRLK BLOG', 'uploads/prlk-blog-logo.png', 'uploads/prlk-blog-favicon.png', 1, 'fb', 'twttr', 'https://github.com/MHMTTPRLK', 'https://www.linkedin.com/in/mehmet-parlak/', 'https://www.youtube.com/', 'https://www.instagram.com/prlkmehmet/', '2020-08-08 14:52:14', '2020-08-10 10:09:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `topic`, `created_at`, `updated_at`) VALUES
(3, 'Mehmet Parlak', 'sadfdsaf@fadsfdas', 'dsfdsafhıuasduygfudsaguf', 'Genel', '2020-08-08 11:32:41', '2020-08-08 11:32:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_22_160044_create_categories', 1),
(2, '2020_07_23_111212_create_articles', 1),
(3, '2020_07_24_171107_create_pages_table', 1),
(4, '2020_07_25_172156_create_admin_table', 1),
(5, '2020_07_30_171324_create_contact_table', 1),
(6, '2020_08_08_174342_create_config_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `content`, `slug`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Hakkında', 'https://sunedison.in/wp-content/uploads/2020/01/Physics-and-business-1.jpg', 'Lorem Ipsum, dizgi ve baskı endüstrisinde\n                            kullanılan mıgır metinlerdir. Lorem Ipsum, adı\n                            bilinmeyen bir matbaacının bir hurufat numune kitabı\n                            oluşturmak üzere bir yazı galerisini alarak karıştırdığı\n                            1500\'lerden beri endüstri standardı sahte metinler olarak\n                            kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış aynı zam', 'hakkinda', 1, 0, '2020-07-30 14:16:54', '2020-08-14 19:32:39'),
(2, 'Kariyer1', 'https://sunedison.in/wp-content/uploads/2020/01/Physics-and-business-1.jpg', '<p>Kariyer</p>', 'kariyer1', 1, 2, '2020-07-30 14:16:54', '2020-08-14 19:32:39'),
(3, 'Vizyon', 'uploads/vizyon.jpg10', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mollis arcu in nunc imperdiet, at ultrices mauris ornare. Praesent pulvinar tempus purus, vel venenatis nisi rutrum eu. Morbi dignissim euismod gravida. Aenean id scelerisque augue. Aenean lobortis mauris mauris, ac interdum nunc cursus et. Etiam ut quam quis quam iaculis blandit vel vitae tellus. Aliquam placerat cursus convallis. Nam arcu justo, bibendum eu eleifend ac, dapibus nec nisi. Quisque tempus magna mollis efficitur hendrerit. Duis eu commodo lectus. Mauris sed turpis sit amet justo dapibus pretium sit amet interdum lorem.</p>\r\n\r\n<p>Nullam lacinia vulputate sodales. Suspendisse potenti. Pellentesque ac tortor velit. Quisque et ornare sapien. Sed ac varius orci, id fringilla purus. Praesent at accumsan elit. Donec eros sem, tristique in magna eget, sollicitudin elementum ante. Aliquam in quam hendrerit, aliquam turpis finibus, lobortis libero. Curabitur id ante lorem. Suspendisse rhoncus ligula vestibulum aliquet consectetur. Proin a rutrum elit.</p>\r\n\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer rutrum convallis dolor sed posuere. Sed ut ligula leo. Mauris nec nibh felis. Praesent bibendum accumsan eleifend. Aliquam sem justo, malesuada et enim non, aliquam hendrerit risus. Ut et venenatis enim. Donec dapibus in ante vestibulum tincidunt. Donec ullamcorper ac enim quis auctor. Cras vitae turpis ultrices, tristique arcu nec, tempus leo.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -41px; top: -4.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 'vizyon', 1, 1, '2020-07-30 14:16:54', '2020-08-14 19:32:39');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
