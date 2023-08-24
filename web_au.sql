-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2023 at 07:18 PM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_au`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `title` longtext,
  `content` longtext,
  `thumbnail` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `thumbnail`, `video`, `created_at`, `updated_at`) VALUES
(1, '<h2>Who We Are</h2>', '<p>We are a planet-friendly fashion brand dedicated to sustainable style. Committed to reducing our environmental impact, we prioritize ethical sourcing, eco-friendly materials, and fair labor practices. Our designs blend timeless aesthetics with innovative solutions, empowering individuals to express themselves while caring for our planet.</p>', '1691556434.jpeg', '1691556452.mp4', '2023-06-22 14:29:09', '2023-08-09 11:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Collection brought new to old hollywood', 'From Western cowboys and Old Hollywood divas, Michele mined the gamut of classic movie references, proffering sweeping, fur-trimmed gowns, blush, boudoir-worthy negligees, satin mermaid tail dresses, and hefty marabou feather boas', '1691519883-1691519883.jpeg', '2023-08-09 01:33:05', '2023-08-09 01:38:03'),
(2, 'Upside-down and sideways gowns at Paris fashion Week 2023', 'FParis Haute Couture Week is in full swing with dramatic runway shows and surreal, lavish looks worn by front-row A-Listers — with an unrecognizable, red-crystal-covered Doja Cat lighting up the internet earlier this week. On Wednesday, the label Viktor & Rolf (literally) turned fashion-upside down.', '1691519936-1691519936.jpeg', '2023-08-09 01:38:56', '2023-08-09 01:38:56'),
(3, 'Best of the spring/summer 22 fashion shows', 'From Western cowboys and Old Hollywood divas, Michele mined the gamut of classic movie references, proffering sweeping, fur-trimmed gowns, blush, boudoir-worthy negligees, satin mermaid tail dresses, and hefty marabou feather boas', '1691520065-1691520065.jpeg', '2023-08-09 01:41:05', '2023-08-09 01:41:05'),
(4, 'Christian Siriano kicks off New York Fashion Week', 'Few York Fashion Week is back! And if the optimistic, neon-hued and feather-trimmed spring/summer 2022 collection US designer Christian Siriano sent storming the runway to open the event last night is anything to go by, the city’s designers are set to deliver fashion’s much-missed vivacity in bounds', '1691520089-1691520089.jpeg', '2023-08-09 01:41:29', '2023-08-09 01:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Co-ords', '1691462314-1691462314.jpeg', '2023-08-08 09:07:30', '2023-08-08 09:38:34'),
(3, 'Handbags', '1691460560-1691460560.jpeg', '2023-08-08 09:09:20', '2023-08-08 09:09:20'),
(4, 'Makeup', '1691460573-1691460573.png', '2023-08-08 09:09:33', '2023-08-08 09:09:33'),
(5, 'Dresses', '1691460597-1691460597.png', '2023-08-08 09:09:57', '2023-08-08 09:09:57'),
(8, 'Shoes', '1691462771-1691462771.png', '2023-08-08 09:46:11', '2023-08-08 09:46:11'),
(9, 'Jumpsuits', '1691462781-1691462781.png', '2023-08-08 09:46:21', '2023-08-08 09:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', 'admin@admin.com', 'test', 'test', '2023-08-09 02:38:44', '2023-08-09 02:38:44'),
(2, 'Super admin', 'sourovpal35@gmail.com', 'Monday to Sunday: 9:00am to 17:00pm', 'Conveying meaning to assistive technologies\r\nUsing color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .sr-only class.', '2023-08-09 02:45:21', '2023-08-09 02:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_153634_create_categories_table', 1),
(6, '2023_05_06_154818_create_images_table', 1),
(7, '2023_05_09_081132_create_settings_table', 1),
(8, '2023_05_17_033451_create_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'pritombhowmik163@gmail.com', '2023-08-10 21:55:10', '2023-08-10 21:55:10'),
(2, 'zaneleaa@gmail.com', '2023-08-11 17:13:47', '2023-08-11 17:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quentity` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `user_email`, `user_phone`, `user_address`, `product_title`, `product_quentity`, `product_description`, `product_price`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'Pritom', 'pritom@gmail.com', '01889231992', 'khilkhet, dhaka', 'Classic Plum Red Lipstick', '1', '<p>Introducing 16 new shades of Joli Rouge in a satin finish, featuring an 84% skincare formula that delivers 10 hours of comfort,&nbsp; 8 hours of hydration and 4 hours of protection.&nbsp;</p>', '38', '1691475084-1691475084.jpeg', '2023-08-11 15:47:35', '2023-08-11 15:47:35'),
(2, 'Pritom', 'pritom@gmail.com', '01889231992', 'khilkhet, dhaka', 'Plum Orange Fabric Tote Bag', '2', '<p>With its vibrant orangel design, this cotton-rich quilted tote bag from FatFace is perfect for sunny days on the go. It&#39;s fully lined, with two comfy handles and a magnetic fastening. A zipped inner compartment provides secure storage, while a pocket on the outside allows you to keep your essentials close to hand.</p>', '145', '1691474993-1691474993.jpeg', '2023-08-11 15:47:35', '2023-08-11 15:47:35'),
(4, 'ff', 'ff@gmail.com', '0232323', 'address', 'Classic Plum Red Lipstick', '1', '<p>Introducing 16 new shades of Joli Rouge in a satin finish, featuring an 84% skincare formula that delivers 10 hours of comfort,&nbsp; 8 hours of hydration and 4 hours of protection.&nbsp;</p>', '38', '1691475084-1691475084.jpeg', '2023-08-11 16:04:14', '2023-08-11 16:04:14'),
(5, 'Pritom', 'pritom@gmail.com', '01889231992', 'address', 'Denim midi skirt', '2', '<p>This cotton-blend denim skirt from our Autograph collection is a timeless wardrobe staple. The midaxi-length piece is designed in a flattering A-line style and features added stretch for comfort. The waistband fastens securely with a zip and button, and the two pockets add a practical finish. Autograph: premium investment pieces featuring contemporary cuts and refined finishing touches.</p>', '119', '1691474966-1691474966.jpg', '2023-08-11 16:09:20', '2023-08-11 16:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_description` longtext,
  `page_content` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `meta_title` longtext,
  `meta_description` longtext,
  `meta_keyword` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `slug`, `page_title`, `page_description`, `page_content`, `thumbnail`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'Sale! 30% Off ALL Dresses!', 'Free next day delivery until midnight', '<h1><u><strong>Page Content:</strong></u></h1>', 'home.jpeg', 'Meta Title:', 'Meta Description:', 'Meta Keyword:', NULL, '2023-08-07 15:35:59'),
(2, 'About Us', 'about', 'About Us', 'Demo lorem description', '<h1><u><strong>Page Content:</strong></u></h1>', 'about-us.jpeg', 'Meta Title:', 'Meta Description:', 'Meta Keyword:', NULL, '2023-08-07 14:51:15'),
(4, 'Shop', 'shop', 'Summer Collection', '30% 0ff Selected Items', '<h1><u><strong>Page Content:</strong></u></h1>', 'shop.png', 'Meta Title:', 'Meta Description:', 'Meta Keyword:', NULL, '2023-08-07 15:32:47'),
(6, 'Blog', 'blog', 'Blog', 'News', '<h1><u><strong>Page Content:</strong></u></h1>', 'blog.jpeg', 'Meta Title:', 'Meta Description:', 'Meta Keyword:', NULL, '2023-08-07 15:22:08'),
(7, 'Contact', 'contacts', 'Contact Us', 'Leave a message, we would love to hear from you', '<h1><u><strong>Page Content:</strong></u></h1>', 'contact.jpeg', 'Meta Title:', 'Meta Description:', 'Meta Keyword:', NULL, '2023-08-07 15:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `category`, `price`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Pink and orange midi dress', '1691473217-1691473217.jpeg', 'Dresses', '145', '<p>Embrace eye-catching print in this textured cotton-blend dress. It&rsquo;s cut in a comfy regular fit, with breezy cami straps and a modern square neckline. Pintucks and buttons add detail to the bodice, while a shirred panel on the back offers fl...</p>', '2023-08-08 11:52:10', '2023-08-09 19:49:07'),
(5, 'Classic cream shorts', '1691473816-1691473816.jpeg', 'Jumpsuits', '250', '<p>Brighten up your holiday wardrobe with these breezy tailored shorts. They&#39;re cut to a regular fit from light crepe fabric. The high elasticated waist ensures a comfy feel. Complete with two handy side pockets.easy-to-wear wardrobe staples that combine classic and contemporary styles.</p>', '2023-08-08 12:50:16', '2023-08-09 16:23:59'),
(6, 'Denim midi skirt', '1691474966-1691474966.jpg', 'Dresses', '119', '<p>This cotton-blend denim skirt from our Autograph collection is a timeless wardrobe staple. The midaxi-length piece is designed in a flattering A-line style and features added stretch for comfort. The waistband fastens securely with a zip and button, and the two pockets add a practical finish. Autograph: premium investment pieces featuring contemporary cuts and refined finishing touches.</p>', '2023-08-08 13:09:26', '2023-08-09 16:26:42'),
(7, 'Plum Orange Fabric Tote Bag', '1691474993-1691474993.jpeg', 'Handbags', '145', '<p>With its vibrant orangel design, this cotton-rich quilted tote bag from FatFace is perfect for sunny days on the go. It&#39;s fully lined, with two comfy handles and a magnetic fastening. A zipped inner compartment provides secure storage, while a pocket on the outside allows you to keep your essentials close to hand.</p>', '2023-08-08 13:09:53', '2023-08-09 16:28:42'),
(8, 'Ted Baker Yellow Summer Dress', '1691475049-1691475049.webp', 'Jumpsuits', '220', '<p>This pure cotton midaxi dress from our Autograph collection features tonal embroidery for a subtly textured look. It&#39;s designed in a regular fit, with an elegant v-neckline and a zip fastening at the back. The 3/4 length sleeves add volume to the silhouette, while the waisted shape with a tie belt offers a flattering finish. This piece is fully lined for comfort. Autograph: premium investment pieces featuring contemporary cuts and refined finishing touches.</p>', '2023-08-08 13:10:49', '2023-08-09 16:29:51'),
(9, 'Classic Plum Red Lipstick', '1691475084-1691475084.jpeg', 'Makeup', '38', '<p>Introducing 16 new shades of Joli Rouge in a satin finish, featuring an 84% skincare formula that delivers 10 hours of comfort,&nbsp; 8 hours of hydration and 4 hours of protection.&nbsp;</p>', '2023-08-08 13:11:24', '2023-08-09 16:30:54'),
(10, 'Floral suit', '1691475151-1691475151.png', 'Shoes', '185', '<p>Introducing the new Laura Whitmore collection. Relaxed style double breasted blazer in a variety of summer brights, matching shorts available also. - contains linen.</p>', '2023-08-08 13:12:31', '2023-08-09 16:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_latlong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_script` longtext COLLATE utf8mb4_unicode_ci,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_type`, `logo`, `favicon`, `facebook`, `twitter`, `instagram`, `linkedin`, `email`, `phone`, `address`, `copy_right`, `map_latlong`, `google_script`, `background_color`, `text_color`, `icon_color`, `created_at`, `updated_at`) VALUES
(1, 'Plum Ecommerce', 'Ecommerce', 'logo.png', 'favicon.png', 'https://m.facebook.com/', NULL, 'https://www.instagram.com/', 'https://www.instagram.com/', 'contact@plum.com', '021567892', '<p><strong>Address:</strong> 356 Boulavard Road, Birmingham, Uk</p>\r\n\r\n<p><strong>Phone:</strong> 021567892</p>\r\n\r\n<p><strong>Hours:</strong> 9:00 - 17:00, Mon - Sun</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-5px; position:absolute; top:-6px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '2023, Plum etc', '47.27624789948025, 8.725078415346466', NULL, '#1d1b1b', '#ffffff', '#707844', '2023-06-11 17:35:12', '2023-08-08 13:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` text,
  `content` longtext,
  `thumbnail` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `sub_title` varchar(255) DEFAULT NULL,
  `sub_title_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `content`, `thumbnail`, `position`, `sub_title`, `sub_title_link`, `created_at`, `updated_at`) VALUES
(1, '<p>Gartenbau mit<br />\r\nHerz und Hand</p>', '<p>Inspiration aus unseren<br />\r\nReferenzenprojekten</p>', 'm1.jpeg', 1, 'Zu unseren Referenzen', 'project', NULL, '2023-07-09 18:48:19'),
(2, 'Ihr Garten - <br>Ihre Wohlfühloase', 'Ihr Garten - <br><span>Ihre Wohlfühloase</span>', 'm2.jpeg', 2, 'Starten Sie Ihr Projekt', 'contacts', NULL, '2023-06-20 00:14:27'),
(3, '<p>Erstklassige Dienstleistungen</p>\r\n\r\n<p>f&uuml;r Ihre Bed&uuml;rfnisse</p>', '<p>Erstklassige Dienstleistungen</p>\r\n\r\n<p>f&uuml;r Ihre Bed&uuml;rfnisse</p>', 'm3.jpeg', 3, 'Zu unserem Service', 'services', NULL, '2023-07-09 18:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `avatar`, `facebook`, `twitter`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(2, 'CÉSAR DA COSTA', 'GESCHÄFTSFÜHRER', '1688753746-1688753746.webp', NULL, NULL, NULL, NULL, '2023-06-22 11:50:45', '2023-07-08 01:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$fZc.8pzBMeiYONJa0FiKy.k0JkfBnExW8vj98PPs76evx5fapvtW.', 'profile-c88fed8f26e35ec76b65c0902d720382.png', 'vQpuprpDo7DkOF3fIztVaBksQofuR5yDIr0fsBxtkiSt8f3cYAUBucwfcLDd', '2023-06-11 23:46:42', '2023-06-22 13:28:10'),
(2, 'Rasheed', 'zaneleab@gmail.com', NULL, '$2y$10$mDFggED4bRUDzdq73UgldOI8uvur5gIUMNnamPb/yfwIctO1Zlate', NULL, NULL, '2023-08-11 17:52:30', '2023-08-11 17:52:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `page_name` (`page_name`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
