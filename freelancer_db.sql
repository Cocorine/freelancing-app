-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 nov. 2021 à 06:48
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `freelancer_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug-category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug-category`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Development', 'slug-development', NULL, NULL, NULL),
(2, 'Design', 'slug-design', NULL, NULL, NULL),
(3, 'Boostage', 'slug-boostage', NULL, NULL, NULL),
(4, 'Marketing', 'slug-marketing', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `certificate` longtext COLLATE utf8mb4_unicode_ci,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug-country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `country`, `slug-country`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL, NULL),
(2, 'Albania', 'AL', NULL, NULL, NULL),
(3, 'Antarctica', 'AQ', NULL, NULL, NULL),
(4, 'Algeria', 'DZ', NULL, NULL, NULL),
(5, 'American Samoa', 'AS', NULL, NULL, NULL),
(6, 'Andorra', 'AD', NULL, NULL, NULL),
(7, 'Angola', 'AO', NULL, NULL, NULL),
(8, 'Antigua and Barbuda', 'AG', NULL, NULL, NULL),
(9, 'Azerbaijan', 'AZ', NULL, NULL, NULL),
(10, 'Argentina', 'AR', NULL, NULL, NULL),
(11, 'Australia', 'AU', NULL, NULL, NULL),
(12, 'Austria', 'AT', NULL, NULL, NULL),
(13, 'Bahamas', 'BS', NULL, NULL, NULL),
(14, 'Bahrain', 'BH', NULL, NULL, NULL),
(15, 'Bangladesh', 'BD', NULL, NULL, NULL),
(16, 'Armenia', 'AM', NULL, NULL, NULL),
(17, 'Barbados', 'BB', NULL, NULL, NULL),
(18, 'Belgium', 'BE', NULL, NULL, NULL),
(19, 'Bermuda', 'BM', NULL, NULL, NULL),
(20, 'Bhutan', 'BT', NULL, NULL, NULL),
(21, 'Bolivia', 'BO', NULL, NULL, NULL),
(22, 'Bosnia and Herzegovina', 'BA', NULL, NULL, NULL),
(23, 'Botswana', 'BW', NULL, NULL, NULL),
(24, 'Bouvet Island', 'BV', NULL, NULL, NULL),
(25, 'Brazil', 'BR', NULL, NULL, NULL),
(26, 'Belize', 'BZ', NULL, NULL, NULL),
(27, 'British Indian Ocean Territory', 'IO', NULL, NULL, NULL),
(28, 'Solomon Islands', 'SB', NULL, NULL, NULL),
(29, 'British Virgin Islands', 'VG', NULL, NULL, NULL),
(30, 'Brunei Darussalam', 'BN', NULL, NULL, NULL),
(31, 'Bulgaria', 'BG', NULL, NULL, NULL),
(32, 'Myanmar', 'MM', NULL, NULL, NULL),
(33, 'Burundi', 'BI', NULL, NULL, NULL),
(34, 'Belarus', 'BY', NULL, NULL, NULL),
(35, 'Cambodia', 'KH', NULL, NULL, NULL),
(36, 'Cameroon', 'CM', NULL, NULL, NULL),
(37, 'Canada', 'CA', NULL, NULL, NULL),
(38, 'Cape Verde', 'CV', NULL, NULL, NULL),
(39, 'Cayman Islands', 'KY', NULL, NULL, NULL),
(40, 'Central African', 'CF', NULL, NULL, NULL),
(41, 'Sri Lanka', 'LK', NULL, NULL, NULL),
(42, 'Chad', 'TD', NULL, NULL, NULL),
(43, 'Chile', 'CL', NULL, NULL, NULL),
(44, 'China', 'CN', NULL, NULL, NULL),
(45, 'Taiwan', 'TW', NULL, NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL, NULL),
(50, 'Mayotte', 'YT', NULL, NULL, NULL),
(51, 'Republic of the Congo', 'CG', NULL, NULL, NULL),
(52, 'The Democratic Republic Of The Congo', 'CD', NULL, NULL, NULL),
(53, 'Cook Islands', 'CK', NULL, NULL, NULL),
(54, 'Costa Rica', 'CR', NULL, NULL, NULL),
(55, 'Croatia', 'HR', NULL, NULL, NULL),
(56, 'Cuba', 'CU', NULL, NULL, NULL),
(57, 'Cyprus', 'CY', NULL, NULL, NULL),
(58, 'Czech Republic', 'CZ', NULL, NULL, NULL),
(59, 'Benin', 'BJ', NULL, NULL, NULL),
(60, 'Denmark', 'DK', NULL, NULL, NULL),
(61, 'Dominica', 'DM', NULL, NULL, NULL),
(62, 'Dominican Republic', 'DO', NULL, NULL, NULL),
(63, 'Ecuador', 'EC', NULL, NULL, NULL),
(64, 'El Salvador', 'SV', NULL, NULL, NULL),
(65, 'Equatorial Guinea', 'GQ', NULL, NULL, NULL),
(66, 'Ethiopia', 'ET', NULL, NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL, NULL),
(69, 'Faroe Islands', 'FO', NULL, NULL, NULL),
(70, 'Falkland Islands', 'FK', NULL, NULL, NULL),
(71, 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL, NULL),
(74, 'Åland Islands', 'AX', NULL, NULL, NULL),
(75, 'France', 'FR', NULL, NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL, NULL),
(79, 'Djibouti', 'DJ', NULL, NULL, NULL),
(80, 'Gabon', 'GA', NULL, NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL, NULL),
(82, 'Gambia', 'GM', NULL, NULL, NULL),
(83, 'Occupied Palestinian Territory', 'PS', NULL, NULL, NULL),
(84, 'Germany', 'DE', NULL, NULL, NULL),
(85, 'Ghana', 'GH', NULL, NULL, NULL),
(86, 'Gibraltar', 'GI', NULL, NULL, NULL),
(87, 'Kiribati', 'KI', NULL, NULL, NULL),
(88, 'Greece', 'GR', NULL, NULL, NULL),
(89, 'Greenland', 'GL', NULL, NULL, NULL),
(90, 'Grenada', 'GD', NULL, NULL, NULL),
(91, 'Guadeloupe', 'GP', NULL, NULL, NULL),
(92, 'Guam', 'GU', NULL, NULL, NULL),
(93, 'Guatemala', 'GT', NULL, NULL, NULL),
(94, 'Guinea', 'GN', NULL, NULL, NULL),
(95, 'Guyana', 'GY', NULL, NULL, NULL),
(96, 'Haiti', 'HT', NULL, NULL, NULL),
(97, 'Heard Island and McDonald Islands', 'HM', NULL, NULL, NULL),
(98, 'Vatican City State', 'VA', NULL, NULL, NULL),
(99, 'Honduras', 'HN', NULL, NULL, NULL),
(100, 'Hong Kong', 'HK', NULL, NULL, NULL),
(101, 'Hungary', 'HU', NULL, NULL, NULL),
(102, 'Iceland', 'IS', NULL, NULL, NULL),
(103, 'India', 'IN', NULL, NULL, NULL),
(104, 'Indonesia', 'ID', NULL, NULL, NULL),
(105, 'Islamic Republic of Iran', 'IR', NULL, NULL, NULL),
(106, 'Iraq', 'IQ', NULL, NULL, NULL),
(107, 'Ireland', 'IE', NULL, NULL, NULL),
(108, 'Israel', 'IL', NULL, NULL, NULL),
(109, 'Italy', 'IT', NULL, NULL, NULL),
(110, 'Côte d\'Ivoire', 'CI', NULL, NULL, NULL),
(111, 'Jamaica', 'JM', NULL, NULL, NULL),
(112, 'Japan', 'JP', NULL, NULL, NULL),
(113, 'Kazakhstan', 'KZ', NULL, NULL, NULL),
(114, 'Jordan', 'JO', NULL, NULL, NULL),
(115, 'Kenya', 'KE', NULL, NULL, NULL),
(116, 'Democratic People\'s Republic of Korea', 'KP', NULL, NULL, NULL),
(117, 'Republic of Korea', 'KR', NULL, NULL, NULL),
(118, 'Kuwait', 'KW', NULL, NULL, NULL),
(119, 'Kyrgyzstan', 'KG', NULL, NULL, NULL),
(120, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL, NULL),
(121, 'Lebanon', 'LB', NULL, NULL, NULL),
(122, 'Lesotho', 'LS', NULL, NULL, NULL),
(123, 'Latvia', 'LV', NULL, NULL, NULL),
(124, 'Liberia', 'LR', NULL, NULL, NULL),
(125, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL, NULL),
(126, 'Liechtenstein', 'LI', NULL, NULL, NULL),
(127, 'Lithuania', 'LT', NULL, NULL, NULL),
(128, 'Luxembourg', 'LU', NULL, NULL, NULL),
(129, 'Macao', 'MO', NULL, NULL, NULL),
(130, 'Madagascar', 'MG', NULL, NULL, NULL),
(131, 'Malawi', 'MW', NULL, NULL, NULL),
(132, 'Malaysia', 'MY', NULL, NULL, NULL),
(133, 'Maldives', 'MV', NULL, NULL, NULL),
(134, 'Mali', 'ML', NULL, NULL, NULL),
(135, 'Malta', 'MT', NULL, NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL, NULL),
(139, 'Mexico', 'MX', NULL, NULL, NULL),
(140, 'Monaco', 'MC', NULL, NULL, NULL),
(141, 'Mongolia', 'MN', NULL, NULL, NULL),
(142, 'Republic of Moldova', 'MD', NULL, NULL, NULL),
(143, 'Montserrat', 'MS', NULL, NULL, NULL),
(144, 'Morocco', 'MA', NULL, NULL, NULL),
(145, 'Mozambique', 'MZ', NULL, NULL, NULL),
(146, 'Oman', 'OM', NULL, NULL, NULL),
(147, 'Namibia', 'NA', NULL, NULL, NULL),
(148, 'Nauru', 'NR', NULL, NULL, NULL),
(149, 'Nepal', 'NP', NULL, NULL, NULL),
(150, 'Netherlands', 'NL', NULL, NULL, NULL),
(151, 'Netherlands Antilles', 'AN', NULL, NULL, NULL),
(152, 'Aruba', 'AW', NULL, NULL, NULL),
(153, 'New Caledonia', 'NC', NULL, NULL, NULL),
(154, 'Vanuatu', 'VU', NULL, NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL, NULL),
(160, 'Norfolk Island', 'NF', NULL, NULL, NULL),
(161, 'Norway', 'NO', NULL, NULL, NULL),
(162, 'Northern Mariana Islands', 'MP', NULL, NULL, NULL),
(163, 'United States Minor Outlying Islands', 'UM', NULL, NULL, NULL),
(164, 'Federated States of Micronesia', 'FM', NULL, NULL, NULL),
(165, 'Marshall Islands', 'MH', NULL, NULL, NULL),
(166, 'Palau', 'PW', NULL, NULL, NULL),
(167, 'Pakistan', 'PK', NULL, NULL, NULL),
(168, 'Panama', 'PA', NULL, NULL, NULL),
(169, 'Papua New Guinea', 'PG', NULL, NULL, NULL),
(170, 'Paraguay', 'PY', NULL, NULL, NULL),
(171, 'Peru', 'PE', NULL, NULL, NULL),
(172, 'Philippines', 'PH', NULL, NULL, NULL),
(173, 'Pitcairn', 'PN', NULL, NULL, NULL),
(174, 'Poland', 'PL', NULL, NULL, NULL),
(175, 'Portugal', 'PT', NULL, NULL, NULL),
(176, 'Guinea-Bissau', 'GW', NULL, NULL, NULL),
(177, 'Timor-Leste', 'TL', NULL, NULL, NULL),
(178, 'Puerto Rico', 'PR', NULL, NULL, NULL),
(179, 'Qatar', 'QA', NULL, NULL, NULL),
(180, 'Réunion', 'RE', NULL, NULL, NULL),
(181, 'Romania', 'RO', NULL, NULL, NULL),
(182, 'Russian Federation', 'RU', NULL, NULL, NULL),
(183, 'Rwanda', 'RW', NULL, NULL, NULL),
(184, 'Saint Helena', 'SH', NULL, NULL, NULL),
(185, 'Saint Kitts and Nevis', 'KN', NULL, NULL, NULL),
(186, 'Anguilla', 'AI', NULL, NULL, NULL),
(187, 'Saint Lucia', 'LC', NULL, NULL, NULL),
(188, 'Saint-Pierre and Miquelon', 'PM', NULL, NULL, NULL),
(189, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL, NULL),
(190, 'San Marino', 'SM', NULL, NULL, NULL),
(191, 'Sao Tome and Principe', 'ST', NULL, NULL, NULL),
(192, 'Saudi Arabia', 'SA', NULL, NULL, NULL),
(193, 'Senegal', 'SN', NULL, NULL, NULL),
(194, 'Seychelles', 'SC', NULL, NULL, NULL),
(195, 'Sierra Leone', 'SL', NULL, NULL, NULL),
(196, 'Singapore', 'SG', NULL, NULL, NULL),
(197, 'Slovakia', 'SK', NULL, NULL, NULL),
(198, 'Vietnam', 'VN', NULL, NULL, NULL),
(199, 'Slovenia', 'SI', NULL, NULL, NULL),
(200, 'Somalia', 'SO', NULL, NULL, NULL),
(201, 'South Africa', 'ZA', NULL, NULL, NULL),
(202, 'Zimbabwe', 'ZW', NULL, NULL, NULL),
(203, 'Spain', 'ES', NULL, NULL, NULL),
(204, 'Western Sahara', 'EH', NULL, NULL, NULL),
(205, 'Sudan', 'SD', NULL, NULL, NULL),
(206, 'Suriname', 'SR', NULL, NULL, NULL),
(207, 'Svalbard and Jan Mayen', 'SJ', NULL, NULL, NULL),
(208, 'Swaziland', 'SZ', NULL, NULL, NULL),
(209, 'Sweden', 'SE', NULL, NULL, NULL),
(210, 'Switzerland', 'CH', NULL, NULL, NULL),
(211, 'Syrian Arab Republic', 'SY', NULL, NULL, NULL),
(212, 'Tajikistan', 'TJ', NULL, NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL, NULL),
(218, 'United Arab Emirates', 'AE', NULL, NULL, NULL),
(219, 'Tunisia', 'TN', NULL, NULL, NULL),
(220, 'Turkey', 'TR', NULL, NULL, NULL),
(221, 'Turkmenistan', 'TM', NULL, NULL, NULL),
(222, 'Turks and Caicos Islands', 'TC', NULL, NULL, NULL),
(223, 'Tuvalu', 'TV', NULL, NULL, NULL),
(224, 'Uganda', 'UG', NULL, NULL, NULL),
(225, 'Ukraine', 'UA', NULL, NULL, NULL),
(226, 'The Former Yugoslav Republic of Macedonia', 'MK', NULL, NULL, NULL),
(227, 'Egypt', 'EG', NULL, NULL, NULL),
(228, 'United Kingdom', 'GB', NULL, NULL, NULL),
(229, 'Isle of Man', 'IM', NULL, NULL, NULL),
(230, 'United Republic Of Tanzania', 'TZ', NULL, NULL, NULL),
(231, 'United States', 'US', NULL, NULL, NULL),
(232, 'U.S. Virgin Islands', 'VI', NULL, NULL, NULL),
(233, 'Burkina Faso', 'BF', NULL, NULL, NULL),
(234, 'Uruguay', 'UY', NULL, NULL, NULL),
(235, 'Uzbekistan', 'UZ', NULL, NULL, NULL),
(236, 'Venezuela', 'VE', NULL, NULL, NULL),
(237, 'Wallis and Futuna', 'WF', NULL, NULL, NULL),
(238, 'Samoa', 'WS', NULL, NULL, NULL),
(239, 'Yemen', 'YE', NULL, NULL, NULL),
(240, 'Serbia and Montenegro', 'CS', NULL, NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `criteres`
--

CREATE TABLE `criteres` (
  `id` bigint UNSIGNED NOT NULL,
  `critere` longtext COLLATE utf8mb4_unicode_ci,
  `critereable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `critereable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id` bigint UNSIGNED NOT NULL,
  `devise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug-name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `educations`
--

CREATE TABLE `educations` (
  `id` bigint UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start-at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end-at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compagny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start-at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end-at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `freelancer_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fileable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `followings`
--

CREATE TABLE `followings` (
  `id` bigint UNSIGNED NOT NULL,
  `following` bigint UNSIGNED NOT NULL,
  `follower` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `name`, `description`, `type`, `owner`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'pair', 2, NULL, '2021-11-28 19:35:32', '2021-11-28 19:35:32');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_users`
--

CREATE TABLE `groupe_users` (
  `id` bigint UNSIGNED NOT NULL,
  `groupe_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `in_groupe` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupe_users`
--

INSERT INTO `groupe_users` (`id`, `groupe_id`, `user_id`, `is_read`, `is_admin`, `in_groupe`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 0, 1, NULL, NULL, NULL),
(2, 1, 3, 0, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_user_messages`
--

CREATE TABLE `groupe_user_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `groupe_user_id` bigint UNSIGNED NOT NULL,
  `message_id` bigint UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `read_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupe_user_messages`
--

INSERT INTO `groupe_user_messages` (`id`, `groupe_user_id`, `message_id`, `is_read`, `read_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, NULL, NULL, NULL),
(2, 2, 1, 1, '2021-11-28 20:51:04', NULL, NULL, NULL),
(3, 1, 2, 1, '2021-11-28 20:48:33', NULL, NULL, NULL),
(4, 2, 2, 0, NULL, NULL, NULL, NULL),
(5, 1, 3, 0, NULL, NULL, NULL, NULL),
(6, 2, 3, 1, '2021-11-28 20:51:04', NULL, NULL, NULL),
(7, 1, 4, 0, NULL, NULL, NULL, NULL),
(8, 2, 4, 1, '2021-11-28 20:51:04', NULL, NULL, NULL),
(9, 1, 5, 0, NULL, NULL, NULL, NULL),
(10, 2, 5, 1, '2021-11-28 20:51:04', NULL, NULL, NULL),
(11, 1, 6, 0, NULL, NULL, NULL, NULL),
(12, 2, 6, 1, '2021-11-28 20:51:05', NULL, NULL, NULL),
(13, 1, 7, 0, NULL, NULL, NULL, NULL),
(14, 2, 7, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `languagues`
--

CREATE TABLE `languagues` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languague` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug-languague` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `languague_users`
--

CREATE TABLE `languague_users` (
  `id` bigint UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `languague_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` bigint UNSIGNED NOT NULL,
  `langue` longtext COLLATE utf8mb4_unicode_ci,
  `level` int DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

CREATE TABLE `links` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `linkable_type`, `linkable_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 18:53:52', '2021-11-28 18:53:52'),
(2, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:01:20', '2021-11-28 19:01:20'),
(3, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:02:28', '2021-11-28 19:02:28'),
(4, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:02:41', '2021-11-28 19:02:41'),
(5, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:03:03', '2021-11-28 19:03:03'),
(6, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:03:59', '2021-11-28 19:03:59'),
(7, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:04:28', '2021-11-28 19:04:28'),
(8, 'Lien', NULL, 'App\\Models\\Project', 1, NULL, '2021-11-28 19:05:15', '2021-11-28 19:05:15'),
(9, 'Lien', NULL, 'App\\Models\\Project', 2, NULL, '2021-11-28 19:09:26', '2021-11-28 19:09:26'),
(10, 'Lien', NULL, 'App\\Models\\Project', 2, NULL, '2021-11-28 19:11:44', '2021-11-28 19:11:44'),
(11, 'Lien', NULL, 'App\\Models\\Project', 2, NULL, '2021-11-28 19:11:50', '2021-11-28 19:11:50'),
(12, 'Lien', NULL, 'App\\Models\\Project', 2, NULL, '2021-11-28 19:12:01', '2021-11-28 19:12:01');

-- --------------------------------------------------------

--
-- Structure de la table `membership`
--

CREATE TABLE `membership` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `from` bigint UNSIGNED NOT NULL,
  `groupe_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_message_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `content`, `from`, `groupe_id`, `deleted_at`, `created_at`, `updated_at`, `parent_message_id`) VALUES
(1, 'Hi  Seth! I\\\'m Jane and i want we discuss about details of project', 2, 1, NULL, '2021-11-28 19:35:32', '2021-11-28 19:35:32', NULL),
(2, 'Hi i\\\'m glad to see you make your choice on me', 3, 1, NULL, '2021-11-28 19:48:17', '2021-11-28 19:48:17', NULL),
(3, 'It\\\'s a pleasure', 2, 1, NULL, '2021-11-28 19:49:04', '2021-11-28 19:49:04', NULL),
(4, 'So i want we plan the process of achievement of project', 2, 1, NULL, '2021-11-28 19:49:43', '2021-11-28 19:49:43', NULL),
(5, 'Can   you propose to a work book', 2, 1, NULL, '2021-11-28 19:49:59', '2021-11-28 19:49:59', NULL),
(6, 'With different milestone', 2, 1, NULL, '2021-11-28 19:50:22', '2021-11-28 19:50:22', NULL),
(7, 'Oooh yes offcose', 3, 1, NULL, '2021-11-28 19:50:57', '2021-11-28 19:50:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_09_090657_create_countries_table', 1),
(2, '2014_09_09_090853_create_plans_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_10_22_081704_create_groupes_table', 1),
(8, '2021_10_22_081728_create_groupe_users_table', 1),
(9, '2021_10_22_081957_create_messages_table', 1),
(10, '2021_10_22_092127_create_groupe_user_messages_table', 1),
(11, '2021_10_27_071824_add_column_message_id_to_table_messages', 1),
(12, '2021_11_09_090233_create_categories_table', 1),
(13, '2021_11_09_090248_create_skills_table', 1),
(14, '2021_11_09_090305_create_devise_table', 1),
(15, '2021_11_09_090401_create_languagues_table', 1),
(16, '2021_11_09_090503_create_feedbacks_table', 1),
(17, '2021_11_09_090639_create_files_table', 1),
(18, '2021_11_09_090716_create_links_table', 1),
(19, '2021_11_09_090742_create_projects_table', 1),
(20, '2021_11_09_090752_create_proposals_table', 1),
(21, '2021_11_09_090811_create_conversations_table', 1),
(22, '2021_11_09_094048_create_criteres_table', 1),
(23, '2021_11_09_100138_create_languague_users_table', 1),
(24, '2021_11_09_101103_create_experiences_table', 1),
(25, '2021_11_09_101128_create_educations_table', 1),
(26, '2021_11_09_101350_create_project_users_table', 1),
(27, '2021_11_09_103724_create_followings_table', 1),
(28, '2021_11_09_104522_create_roles_table', 1),
(29, '2021_11_09_104651_create_role_users_table', 1),
(30, '2021_11_12_140612_create_membership_table', 1),
(31, '2021_11_19_084924_create_certificates_table', 1),
(32, '2021_11_19_094231_create_langues_table', 1),
(33, '2021_11_19_162159_create_milestones_table', 1),
(34, '2021_11_19_162429_create_tasks_table', 1),
(35, '2021_11_25_134748_create_notifications_table', 1),
(36, '2021_11_25_163119_create_payments_table', 1),
(37, '2021_11_26_093320_create_wallets_table', 1),
(38, '2021_11_26_105931_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `milestones`
--

CREATE TABLE `milestones` (
  `id` bigint UNSIGNED NOT NULL,
  `milestone` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress` int DEFAULT NULL,
  `budget` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `is_pay` tinyint(1) DEFAULT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `milestones`
--

INSERT INTO `milestones` (`id`, `milestone`, `description`, `start_at`, `end_at`, `progress`, `budget`, `status`, `is_pay`, `project_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Research', 'Sfsd', '2021-11-30', '2021-12-12', NULL, 160, NULL, NULL, 1, NULL, '2021-11-29 02:21:20', '2021-11-29 02:21:20'),
(2, 'App Wireframe', 'Gf', '2021-12-05', '2021-12-12', NULL, 60, NULL, NULL, 1, NULL, '2021-11-29 02:21:56', '2021-11-29 02:21:56'),
(3, 'Developpment', 'Fd', '2021-12-12', '2021-12-12', NULL, 60, NULL, NULL, 1, NULL, '2021-11-29 02:22:20', '2021-11-29 02:22:20');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('04a225a8-b8c8-45a1-b71c-3f16d68e569a', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 3, '{\"user_id\":2,\"user_name\":\"FIFAN Jane\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:49:04', '2021-11-28 19:49:04'),
('053a96e0-1621-4f8d-a4cf-72f7396d184c', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":3,\"user_name\":\"RIGHT Seth\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 19:10:30', '2021-11-28 19:10:30'),
('3ab079aa-5f9d-4c3e-947d-5d608444a40b', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":5,\"user_name\":\"Test Test\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 19:26:45', '2021-11-28 19:26:45'),
('774186d9-3146-4f6f-9c7b-a55debfe8bf7', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 3, '{\"user_id\":2,\"user_name\":\"FIFAN Jane\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:50:22', '2021-11-28 19:50:22'),
('86374f55-59fa-4509-8973-a81afe6b9b83', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":1,\"user_name\":\"BOCOGA Corine\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 18:55:59', '2021-11-28 18:55:59'),
('8f9e574f-b61d-4395-96a9-8de2b1c07a2f', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 3, '{\"user_id\":2,\"user_name\":\"FIFAN Jane\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:49:44', '2021-11-28 19:49:44'),
('a62e01b4-57ba-4f4f-a724-8bb70ecb9342', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 2, '{\"user_id\":3,\"user_name\":\"RIGHT Seth\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:48:18', '2021-11-28 19:48:18'),
('b63db3ac-82a2-4063-835d-332a54213285', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":5,\"user_name\":\"Test Test\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 19:22:11', '2021-11-28 19:22:11'),
('b971d672-309d-4935-acbb-ed6653d4ca56', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 3, '{\"user_id\":2,\"user_name\":\"FIFAN Jane\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:49:59', '2021-11-28 19:49:59'),
('be14634b-8c82-4e02-a852-a7c85f9958cd', 'App\\Notifications\\NewNotification', 'App\\Models\\User', 2, '{\"user_id\":3,\"user_name\":\"RIGHT Seth\",\"message_id\":1,\"data\":\"Vous avez re\\u00e7u un nouveau message.\"}', NULL, '2021-11-28 19:50:58', '2021-11-28 19:50:58'),
('c578f480-a97a-4749-986b-5d9cfb6cf2d1', 'App\\Notifications\\HireNotification', 'App\\Models\\User', 3, '{\"user_id\":2,\"user_name\":\"FIFAN Jane\",\"project_id\":1,\"data\":\"Your are hired on project Freelancer projecg\"}', NULL, '2021-11-28 19:35:32', '2021-11-28 19:35:32'),
('d049dc08-226c-417c-98c8-896508c0f0e9', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":4,\"user_name\":\"LEE Chan\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 18:59:07', '2021-11-28 18:59:07'),
('df26f2ca-0763-44f8-94bf-6a7e81d2ef3d', 'App\\Notifications\\NewProposal', 'App\\Models\\User', 2, '{\"user_id\":5,\"user_name\":\"Test Test\",\"project_id\":1,\"data\":\"New proposal are submit\"}', NULL, '2021-11-28 19:25:19', '2021-11-28 19:25:19');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` int DEFAULT NULL,
  `is_pay` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `milestone_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `freelancer` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifications` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_price` int DEFAULT NULL,
  `max_price` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `delay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` bigint UNSIGNED DEFAULT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `price_type`, `job_type`, `experience`, `level`, `skill_type`, `qualifications`, `start_at`, `hire_at`, `duree`, `min_price`, `max_price`, `status`, `delay`, `owner`, `country_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Freelancer projecg', '<p>tyirtk</p>', 'Hourly', NULL, '2-5', NULL, NULL, NULL, NULL, '2021-11-28 20:35:32', '3 weeks', 50, NULL, 0, '2021-12-05 20:05:15', 2, 11, 1, NULL, '2021-11-28 18:53:52', '2021-11-28 19:35:32'),
(2, 'Freelancer projecg', '<p>tyirtk</p>', 'Fixed', NULL, '2-5', NULL, NULL, NULL, '2021-11-28 20:12:01', NULL, '3 weeks', 500, NULL, 0, '2021-11-30 20:12:01', 2, 11, 1, NULL, '2021-11-28 19:09:26', '2021-11-28 19:12:01');

-- --------------------------------------------------------

--
-- Structure de la table `project_users`
--

CREATE TABLE `project_users` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `project_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `delay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire` tinyint(1) NOT NULL DEFAULT '0',
  `freelancer` bigint UNSIGNED DEFAULT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `proposals`
--

INSERT INTO `proposals` (`id`, `name`, `description`, `price`, `delay`, `hire`, `freelancer`, `project_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '(tuyjk;', 600, '3 weeks', 0, 1, 1, NULL, '2021-11-28 18:55:58', '2021-11-28 18:55:58'),
(2, NULL, 'hn;', 400, '4 weeks', 0, 4, 1, NULL, '2021-11-28 18:59:07', '2021-11-28 18:59:07'),
(3, NULL, 'fcbv', 350, '3 weeks', 1, 3, 1, NULL, '2021-11-28 19:10:30', '2021-11-28 19:35:31'),
(4, NULL, 'fgf', 500, 'rg', 0, 5, 1, '2021-11-28 19:22:41', '2021-11-28 19:22:11', '2021-11-28 19:22:41'),
(5, NULL, 'ujuh', 400, '5 weeks', 0, 5, 1, '2021-11-28 19:25:39', '2021-11-28 19:25:19', '2021-11-28 19:25:39'),
(6, NULL, 'ty', 400, '4 weeks', 0, 5, 1, NULL, '2021-11-28 19:26:45', '2021-11-28 19:26:45');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug-role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`, `slug-role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'slug-administrator', NULL, NULL, NULL),
(2, 'Compagny', 'slug-compagny', NULL, NULL, NULL),
(3, 'Freelancer', 'slug-freelancer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 3, NULL, NULL, NULL),
(4, 3, 4, NULL, NULL, NULL),
(5, 3, 5, NULL, NULL, NULL),
(6, 1, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci,
  `skillable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skillable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `name`, `skillable_type`, `skillable_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 18:53:52', '2021-11-28 18:53:52'),
(2, 'Tyty', 'App\\Models\\Project', 1, NULL, '2021-11-28 18:53:52', '2021-11-28 18:53:52'),
(3, 'Ytt', 'App\\Models\\Project', 1, NULL, '2021-11-28 18:53:52', '2021-11-28 18:53:52'),
(4, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:01:20', '2021-11-28 19:01:20'),
(5, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:02:28', '2021-11-28 19:02:28'),
(6, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:02:41', '2021-11-28 19:02:41'),
(7, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:03:03', '2021-11-28 19:03:03'),
(8, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:03:59', '2021-11-28 19:03:59'),
(9, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:04:28', '2021-11-28 19:04:28'),
(10, 'Web Design', 'App\\Models\\Project', 1, NULL, '2021-11-28 19:05:15', '2021-11-28 19:05:15'),
(11, 'Web Design', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:09:26', '2021-11-28 19:09:26'),
(12, 'Tyty', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:09:26', '2021-11-28 19:09:26'),
(13, 'Ytt', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:09:26', '2021-11-28 19:09:26'),
(14, 'Web Design', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:11:44', '2021-11-28 19:11:44'),
(15, 'Web Design', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:11:50', '2021-11-28 19:11:50'),
(16, 'Web Design', 'App\\Models\\Project', 2, NULL, '2021-11-28 19:12:01', '2021-11-28 19:12:01');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milestone_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `description`, `deadline`, `status`, `milestone_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Design', 'Task Description', '2021-11-30', 'To do', 1, NULL, '2021-11-29 02:37:31', '2021-11-29 02:37:31');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motif` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `wallet_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compagny` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil_description` longtext COLLATE utf8mb4_unicode_ci,
  `experience` int NOT NULL DEFAULT '0',
  `hire_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` int NOT NULL DEFAULT '0',
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint UNSIGNED DEFAULT NULL,
  `plan_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `compagny`, `active`, `gender`, `profil_description`, `experience`, `hire_price`, `ratings`, `profil`, `telephone`, `price_type`, `verified`, `identity`, `address`, `state`, `zipcode`, `email`, `email_verified_at`, `password`, `country_id`, `plan_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BOCOGA', 'Corine', 'Corine3n', NULL, 1, 'f', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'corinebocog@gmail.com', '2021-11-28 17:25:56', '$2y$10$LNM5eTC6cwGG2xu3tvxcY.GPZuD1g2hnE5N6DYGK1CLDd15UAT1lW', 59, NULL, NULL, '2021-11-28 17:25:23', '2021-11-28 17:25:56', NULL),
(2, 'FIFAN', 'Jane', 'AYIFAwv', 'AYIFA', 1, 'f', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'bocogacorine@gmail.com', '2021-11-28 17:50:49', '$2y$10$/zy7m6vIQ8/pgh2pYQtbv.y1ueL7iNRX1MwiBzEz689EKs8vrMMSu', 59, NULL, NULL, '2021-11-28 17:46:56', '2021-11-28 17:50:49', NULL),
(3, 'RIGHT', 'Seth', 'Sethqr', NULL, 1, 'm', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'seth.right.usa@gmail.com', '2021-11-28 18:16:46', '$2y$10$UPe2lhuaGdDjxNGse4UulOMnaurcEh95ArgWIGW/CVKx3pYXozPtm', 231, NULL, NULL, '2021-11-28 17:56:09', '2021-11-28 18:16:46', NULL),
(4, 'LEE', 'Chan', 'Chan3E', NULL, 1, 'm', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'afro.bio.cosmetiques@gmail.com', '2021-11-28 18:40:38', '$2y$10$/LuflLUNQgFvfvIqz8xd3.DH1DzM0K7bOKHN4Ruamf.J2ngT7t6ca', 13, NULL, NULL, '2021-11-28 18:30:32', '2021-11-28 18:40:38', NULL),
(5, 'Test', 'Test', 'TestH2', NULL, 1, 'm', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'contact.juliengomez@gmail.com', '2021-11-28 18:43:50', '$2y$10$jfUI3gWPBkeFf9ERc.UcherSeVYsf7CzR.rWOPK94NgMIJzawqK.2', 18, NULL, NULL, '2021-11-28 18:42:39', '2021-11-28 18:43:50', NULL),
(6, 'AGBO', 'Roland', 'RolandVp', NULL, 1, 'm', NULL, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'ehwlinmi@gmail.com', '2021-11-29 04:17:58', '$2y$10$hiKnchkssJ/sV2NPUNB1q.F/wjymscFfAfYB9qGSCyVU3VenwO2IC', 59, NULL, NULL, '2021-11-29 04:16:26', '2021-11-29 04:17:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wallets`
--

INSERT INTO `wallets` (`id`, `account_number`, `account_wallet`, `card_number`, `card_type`, `expire_on`, `first_name`, `last_name`, `cvv`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'fIC7Lj', '0', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-11-28 17:25:23', '2021-11-28 17:25:23'),
(2, 'MnoDWN', '0', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2021-11-28 17:46:57', '2021-11-28 17:46:57'),
(3, 'cnLaYg', '0', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2021-11-28 17:56:09', '2021-11-28 17:56:09'),
(4, 'q28MmU', '0', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2021-11-28 18:30:32', '2021-11-28 18:30:32'),
(5, 'UWVluk', '0', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2021-11-28 18:42:40', '2021-11-28 18:42:40'),
(6, 'sbQY1R', '0', NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, '2021-11-29 04:16:27', '2021-11-29 04:16:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `criteres`
--
ALTER TABLE `criteres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteres_critereable_type_critereable_id_index` (`critereable_type`,`critereable_id`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_user_id_foreign` (`user_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_user_id_foreign` (`user_id`),
  ADD KEY `feedbacks_freelancer_id_foreign` (`freelancer_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_fileable_type_fileable_id_index` (`fileable_type`,`fileable_id`);

--
-- Index pour la table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followings_following_foreign` (`following`),
  ADD KEY `followings_follower_foreign` (`follower`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupes_owner_foreign` (`owner`);

--
-- Index pour la table `groupe_users`
--
ALTER TABLE `groupe_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe_users_groupe_id_foreign` (`groupe_id`),
  ADD KEY `groupe_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `groupe_user_messages`
--
ALTER TABLE `groupe_user_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe_user_messages_groupe_user_id_foreign` (`groupe_user_id`),
  ADD KEY `groupe_user_messages_message_id_foreign` (`message_id`);

--
-- Index pour la table `languagues`
--
ALTER TABLE `languagues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `languague_users`
--
ALTER TABLE `languague_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languague_users_languague_id_foreign` (`languague_id`),
  ADD KEY `languague_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langues_user_id_foreign` (`user_id`);

--
-- Index pour la table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_linkable_type_linkable_id_index` (`linkable_type`,`linkable_id`);

--
-- Index pour la table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_plan_id_foreign` (`plan_id`),
  ADD KEY `membership_user_id_foreign` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_foreign` (`from`),
  ADD KEY `messages_groupe_id_foreign` (`groupe_id`),
  ADD KEY `messages_parent_message_id_foreign` (`parent_message_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milestones_project_id_foreign` (`project_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_milestone_id_foreign` (`milestone_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_freelancer_foreign` (`freelancer`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_owner_foreign` (`owner`),
  ADD KEY `projects_country_id_foreign` (`country_id`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Index pour la table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_users_project_id_foreign` (`project_id`),
  ADD KEY `project_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_freelancer_foreign` (`freelancer`),
  ADD KEY `proposals_project_id_foreign` (`project_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_skillable_type_skillable_id_index` (`skillable_type`,`skillable_id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_milestone_id_foreign` (`milestone_id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_plan_id_foreign` (`plan_id`);

--
-- Index pour la table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `criteres`
--
ALTER TABLE `criteres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `followings`
--
ALTER TABLE `followings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `groupe_users`
--
ALTER TABLE `groupe_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupe_user_messages`
--
ALTER TABLE `groupe_user_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `languagues`
--
ALTER TABLE `languagues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `languague_users`
--
ALTER TABLE `languague_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `followings`
--
ALTER TABLE `followings`
  ADD CONSTRAINT `followings_follower_foreign` FOREIGN KEY (`follower`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followings_following_foreign` FOREIGN KEY (`following`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `groupe_users`
--
ALTER TABLE `groupe_users`
  ADD CONSTRAINT `groupe_users_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupe_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe_user_messages`
--
ALTER TABLE `groupe_user_messages`
  ADD CONSTRAINT `groupe_user_messages_groupe_user_id_foreign` FOREIGN KEY (`groupe_user_id`) REFERENCES `groupe_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupe_user_messages_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `languague_users`
--
ALTER TABLE `languague_users`
  ADD CONSTRAINT `languague_users_languague_id_foreign` FOREIGN KEY (`languague_id`) REFERENCES `languagues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `languague_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `langues`
--
ALTER TABLE `langues`
  ADD CONSTRAINT `langues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `membership_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_from_foreign` FOREIGN KEY (`from`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_parent_message_id_foreign` FOREIGN KEY (`parent_message_id`) REFERENCES `messages` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestones_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_freelancer_foreign` FOREIGN KEY (`freelancer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_milestone_id_foreign` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project_users`
--
ALTER TABLE `project_users`
  ADD CONSTRAINT `project_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_freelancer_foreign` FOREIGN KEY (`freelancer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposals_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_milestone_id_foreign` FOREIGN KEY (`milestone_id`) REFERENCES `milestones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
