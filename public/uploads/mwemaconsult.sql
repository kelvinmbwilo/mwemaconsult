-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2014 at 06:18 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mwemaconsult`
--
CREATE DATABASE IF NOT EXISTS `mwemaconsult` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mwemaconsult`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `region`, `email`, `tel`, `fax`, `created_at`, `updated_at`) VALUES
(1, 'czvczv1', '565361', '6', 'czcvx@dsfsgf.fgds1', '636361', '4565361', '2014-11-22 02:54:09', '2014-11-22 04:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `craeted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=499 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_id`, `name`, `craeted_at`, `updated_at`) VALUES
(250, 1, 'Afghanistan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(251, 2, 'Albania', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(252, 3, 'Algeria', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(253, 4, 'American Samoa', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(254, 5, 'Andorra', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(255, 6, 'Angola', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(256, 7, 'Anguilla', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(257, 8, 'Antarctica', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(258, 9, 'Antigua and Barbuda', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(259, 10, 'Argentina', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(260, 11, 'Armenia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(261, 12, 'Armenia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(262, 13, 'Aruba', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(263, 14, 'Australia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(264, 15, 'Austria', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(265, 16, 'Azerbaijan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(266, 17, 'Azerbaijan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(267, 18, 'Bahamas', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(268, 19, 'Bahrain', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(269, 20, 'Bangladesh', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(270, 21, 'Barbados', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(271, 22, 'Belarus', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(272, 23, 'Belgium', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(273, 24, 'Belize', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(274, 25, 'Benin', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(275, 26, 'Bermuda', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(276, 27, 'Bhutan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(277, 28, 'Bolivia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(278, 29, 'Bosnia and Herzegovina', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(279, 30, 'Botswana', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(280, 31, 'Bouvet Island', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(281, 32, 'Brazil', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(282, 33, 'British Indian Ocean Territory', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(283, 34, 'Brunei Darussalam', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(284, 35, 'Bulgaria', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(285, 36, 'Burkina Faso', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(286, 37, 'Burundi', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(287, 38, 'Cambodia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(288, 39, 'Cameroon', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(289, 40, 'Canada', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(290, 41, 'Cape Verde', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(291, 42, 'Cayman Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(292, 43, 'Central African Republic', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(293, 44, 'Chad', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(294, 45, 'Chile', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(295, 46, 'China', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(296, 47, 'Christmas Island', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(297, 48, 'Cocos (Keeling) Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(298, 49, 'Colombia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(299, 50, 'Comoros', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(300, 51, 'Congo', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(301, 52, 'Congo, The Democratic Republic of The', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(302, 53, 'Cook Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(303, 54, 'Costa Rica', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(304, 55, 'Cote D''ivoire', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(305, 56, 'Croatia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(306, 57, 'Cuba', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(307, 58, 'Cyprus', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(308, 60, 'Czech Republic', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(309, 61, 'Denmark', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(310, 62, 'Djibouti', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(311, 63, 'Dominica', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(312, 64, 'Dominican Republic', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(313, 65, 'Easter Island', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(314, 66, 'Ecuador', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(315, 67, 'Egypt', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(316, 68, 'El Salvador', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(317, 69, 'Equatorial Guinea', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(318, 70, 'Eritrea', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(319, 71, 'Estonia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(320, 72, 'Ethiopia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(321, 73, 'Falkland Islands (Malvinas)', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(322, 74, 'Faroe Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(323, 75, 'Fiji', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(324, 76, 'Finland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(325, 77, 'France', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(326, 78, 'French Guiana', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(327, 79, 'French Polynesia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(328, 80, 'French Southern Territories', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(329, 81, 'Gabon', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(330, 82, 'Gambia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(331, 83, 'Georgia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(332, 85, 'Germany', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(333, 86, 'Ghana', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(334, 87, 'Gibraltar', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(335, 88, 'Greece', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(336, 89, 'Greenland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(337, 91, 'Grenada', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(338, 92, 'Guadeloupe', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(339, 93, 'Guam', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(340, 94, 'Guatemala', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(341, 95, 'Guinea', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(342, 96, 'Guinea-bissau', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(343, 97, 'Guyana', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(344, 98, 'Haiti', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(345, 99, 'Heard Island and Mcdonald Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(346, 100, 'Honduras', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(347, 101, 'Hong Kong', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(348, 102, 'Hungary', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(349, 103, 'Iceland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(350, 104, 'India', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(351, 105, 'Indonesia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(352, 106, 'Indonesia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(353, 107, 'Iran', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(354, 108, 'Iraq', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(355, 109, 'Ireland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(356, 110, 'Israel', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(357, 111, 'Italy', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(358, 112, 'Jamaica', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(359, 113, 'Japan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(360, 114, 'Jordan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(361, 115, 'Kazakhstan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(362, 116, 'Kazakhstan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(363, 117, 'Kenya', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(364, 118, 'Kiribati', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(365, 119, 'Korea, North', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(366, 120, 'Korea, South', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(367, 121, 'Kosovo', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(368, 122, 'Kuwait', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(369, 123, 'Kyrgyzstan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(370, 124, 'Laos', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(371, 125, 'Latvia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(372, 126, 'Lebanon', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(373, 127, 'Lesotho', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(374, 128, 'Liberia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(375, 129, 'Libyan Arab Jamahiriya', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(376, 130, 'Liechtenstein', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(377, 131, 'Lithuania', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(378, 132, 'Luxembourg', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(379, 133, 'Macau', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(380, 134, 'Macedonia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(381, 135, 'Madagascar', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(382, 136, 'Malawi', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(383, 137, 'Malaysia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(384, 138, 'Maldives', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(385, 139, 'Mali', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(386, 140, 'Malta', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(387, 141, 'Marshall Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(388, 142, 'Martinique', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(389, 143, 'Mauritania', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(390, 144, 'Mauritius', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(391, 145, 'Mayotte', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(392, 146, 'Mexico', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(393, 147, 'Micronesia, Federated States of', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(394, 148, 'Moldova, Republic of', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(395, 149, 'Monaco', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(396, 150, 'Mongolia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(397, 151, 'Montenegro', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(398, 152, 'Montserrat', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(399, 153, 'Morocco', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(400, 154, 'Mozambique', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(401, 155, 'Myanmar', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(402, 156, 'Namibia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(403, 157, 'Nauru', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(404, 158, 'Nepal', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(405, 159, 'Netherlands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(406, 160, 'Netherlands Antilles', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(407, 161, 'New Caledonia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(408, 162, 'New Zealand', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(409, 163, 'Nicaragua', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(410, 164, 'Niger', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(411, 165, 'Nigeria', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(412, 166, 'Niue', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(413, 167, 'Norfolk Island', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(414, 168, 'Northern Mariana Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(415, 169, 'Norway', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(416, 170, 'Oman', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(417, 171, 'Pakistan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(418, 172, 'Palau', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(419, 173, 'Palestinian Territory', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(420, 174, 'Panama', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(421, 175, 'Papua New Guinea', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(422, 176, 'Paraguay', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(423, 177, 'Peru', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(424, 178, 'Philippines', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(425, 179, 'Pitcairn', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(426, 180, 'Poland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(427, 181, 'Portugal', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(428, 182, 'Puerto Rico', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(429, 183, 'Qatar', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(430, 184, 'Reunion', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(431, 185, 'Romania', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(432, 186, 'Russia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(433, 187, 'Russia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(434, 188, 'Rwanda', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(435, 189, 'Saint Helena', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(436, 190, 'Saint Kitts and Nevis', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(437, 191, 'Saint Lucia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(438, 192, 'Saint Pierre and Miquelon', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(439, 193, 'Saint Vincent and The Grenadines', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(440, 194, 'Samoa', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(441, 195, 'San Marino', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(442, 196, 'Sao Tome and Principe', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(443, 197, 'Saudi Arabia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(444, 198, 'Senegal', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(445, 199, 'Serbia and Montenegro', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(446, 200, 'Seychelles', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(447, 201, 'Sierra Leone', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(448, 202, 'Singapore', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(449, 203, 'Slovakia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(450, 204, 'Slovenia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(451, 205, 'Solomon Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(452, 206, 'Somalia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(453, 207, 'South Africa', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(454, 208, 'South Georgia and The South Sandwich Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(455, 209, 'Spain', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(456, 210, 'Sri Lanka', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(457, 211, 'Sudan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(458, 212, 'Suriname', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(459, 213, 'Svalbard and Jan Mayen', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(460, 214, 'Swaziland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(461, 215, 'Sweden', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(462, 216, 'Switzerland', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(463, 217, 'Syria', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(464, 218, 'Taiwan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(465, 219, 'Tajikistan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(466, 220, 'Tanzania', '2014-04-11 15:06:20', '0000-00-00 00:00:00'),
(467, 221, 'Thailand', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(468, 222, 'Timor-leste', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(469, 223, 'Togo', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(470, 224, 'Tokelau', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(471, 225, 'Tonga', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(472, 226, 'Trinidad and Tobago', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(473, 227, 'Tunisia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(474, 228, 'Turkey', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(475, 229, 'Turkey', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(476, 230, 'Turkmenistan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(477, 231, 'Turks and Caicos Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(478, 232, 'Tuvalu', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(479, 233, 'Uganda', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(480, 234, 'Ukraine', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(481, 235, 'United Arab Emirates', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(482, 236, 'United Kingdom', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(483, 237, 'United States', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(484, 238, 'United States Minor Outlying Islands', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(485, 239, 'Uruguay', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(486, 240, 'Uzbekistan', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(487, 241, 'Vanuatu', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(488, 242, 'Vatican City', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(489, 243, 'Venezuela', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(490, 244, 'Vietnam', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(491, 245, 'Virgin Islands, British', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(492, 246, 'Virgin Islands, U.S.', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(493, 247, 'Wallis and Futuna', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(494, 248, 'Western Sahara', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(495, 249, 'Yemen', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(496, 250, 'Yemen', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(497, 251, 'Zambia', '2014-04-10 10:33:21', '0000-00-00 00:00:00'),
(498, 252, 'Zimbabwe', '2014-04-10 10:33:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(11) NOT NULL,
  `target_population` int(11) NOT NULL,
  `annual_birth` int(11) NOT NULL,
  `pregnancy` int(11) NOT NULL,
  `surviving_infants` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=141 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `region_id`, `target_population`, `annual_birth`, `pregnancy`, `surviving_infants`) VALUES
(1, 'Arusha City', 1, 416441, 14575, 20065, 13326),
(2, 'Arumeru', 1, 178788, 6258, 8894, 5721),
(3, 'Karatu', 1, 230166, 8056, 11432, 7365),
(4, 'Longido', 1, 127464, 4461, 6245, 4079),
(5, 'Monduli', 1, 267804, 9373, 12051, 8570),
(6, 'Ngorongoro', 1, 134505, 4708, 6679, 4304),
(7, 'Ilala', 2, 0, 0, 0, 0),
(8, 'Kinondoni', 2, 0, 0, 0, 0),
(9, 'Temeke', 2, 0, 0, 0, 0),
(10, 'Bahi', 3, 0, 0, 0, 0),
(11, 'Dodoma', 3, 43, 54, 0, 23),
(12, 'Kondoa', 3, 43, 23, 0, 53),
(13, 'Kongwa', 3, 0, 0, 0, 0),
(14, 'Mpwapwa', 3, 0, 0, 0, 0),
(15, 'Chamwino', 3, 0, 0, 0, 0),
(16, 'Bukombe', 4, 0, 0, 0, 0),
(17, 'Chato', 4, 0, 0, 0, 0),
(18, 'Geita', 4, 0, 0, 0, 0),
(19, 'Mbongowe', 4, 0, 0, 0, 0),
(20, 'Nyang''hwale', 4, 0, 0, 0, 0),
(21, 'Iringa rural', 5, 0, 0, 0, 0),
(22, 'Iringa urban', 5, 0, 0, 0, 0),
(23, 'Kilolo', 5, 0, 0, 0, 0),
(24, 'Mufindi', 5, 0, 0, 0, 0),
(25, 'Biharamulo', 6, 0, 0, 0, 0),
(26, 'Bukoba urban', 6, 0, 0, 0, 0),
(27, 'Bukoba rural', 6, 0, 0, 0, 0),
(28, 'Karagwe', 6, 0, 0, 0, 0),
(29, 'Misenyi', 6, 0, 0, 0, 0),
(30, 'Muleba', 6, 0, 0, 0, 0),
(31, 'Ngara', 6, 0, 0, 0, 0),
(32, 'Mpanda', 7, 0, 0, 0, 0),
(33, 'Mlele', 7, 0, 0, 0, 0),
(34, 'Kasulu', 8, 0, 0, 0, 0),
(35, 'Kibondo', 8, 0, 0, 0, 0),
(36, 'Kigoma rural', 8, 0, 0, 0, 0),
(37, 'Kigoma urban', 8, 0, 0, 0, 0),
(38, 'Hai', 9, 0, 0, 0, 0),
(39, 'Moshi rural', 9, 0, 0, 0, 0),
(40, 'Moshi urban', 9, 0, 0, 0, 0),
(41, 'Mwanga', 9, 0, 0, 0, 0),
(42, 'Rombo', 9, 0, 0, 0, 0),
(43, 'Same', 9, 0, 0, 0, 0),
(44, 'Siha', 9, 0, 0, 0, 0),
(45, 'Kilwa', 10, 0, 0, 0, 0),
(46, 'Lindi rural', 10, 0, 0, 0, 0),
(47, 'Lindi urban', 10, 0, 0, 0, 0),
(48, 'Liwale', 10, 0, 0, 0, 0),
(49, 'Nachingwea', 10, 0, 0, 0, 0),
(50, 'Ruangwa', 10, 0, 0, 0, 0),
(51, 'Babati', 11, 0, 0, 0, 0),
(52, 'Hanang', 11, 0, 0, 0, 0),
(53, 'Kiteto', 11, 0, 0, 0, 0),
(54, 'Mbulu', 11, 0, 0, 0, 0),
(55, 'Simanjiro', 11, 0, 0, 0, 0),
(56, 'Bunda', 12, 0, 0, 0, 0),
(57, 'Musoma rural', 12, 0, 0, 0, 0),
(58, 'Musoma urban', 12, 0, 0, 0, 0),
(59, 'Serengeti', 12, 0, 0, 0, 0),
(60, 'Tarime', 12, 0, 0, 0, 0),
(61, 'Rolya', 12, 0, 0, 0, 0),
(62, 'Chunya', 13, 0, 0, 0, 0),
(63, 'Ileje', 13, 0, 0, 0, 0),
(64, 'Kyela', 13, 0, 0, 0, 0),
(65, 'Mbarali', 13, 0, 0, 0, 0),
(66, 'Mbeya rural', 13, 0, 0, 0, 0),
(67, 'Mbeya urban', 13, 0, 0, 0, 0),
(68, 'Mbozi', 13, 0, 0, 0, 0),
(69, 'Rungwe', 13, 0, 0, 0, 0),
(70, 'Kilombero', 14, 0, 0, 0, 0),
(71, 'Kilosa', 14, 0, 0, 0, 0),
(72, 'Morogoro rural', 14, 0, 0, 0, 0),
(73, 'Morogoro urban', 14, 0, 0, 0, 0),
(74, 'Mvomero', 14, 0, 0, 0, 0),
(75, 'Ulanga', 14, 0, 0, 0, 0),
(76, 'Lulindi', 15, 0, 0, 0, 0),
(77, 'Masasi', 15, 0, 0, 0, 0),
(78, 'Mtwara  rural', 15, 0, 0, 0, 0),
(79, 'Mtwara urban', 15, 0, 0, 0, 0),
(80, 'Nanyumbu', 15, 0, 0, 0, 0),
(81, 'Newala', 15, 0, 0, 0, 0),
(82, 'Tandahimba', 15, 0, 0, 0, 0),
(83, 'Ilemela', 16, 0, 0, 0, 0),
(84, 'Kwimba', 16, 0, 0, 0, 0),
(85, 'Magu', 16, 0, 0, 0, 0),
(86, 'Misungwi', 16, 0, 0, 0, 0),
(87, 'Nyamagana', 16, 0, 0, 0, 0),
(88, 'Sengerema', 16, 0, 0, 0, 0),
(89, 'Ukerewe', 16, 0, 0, 0, 0),
(90, 'Ludewa', 17, 0, 0, 0, 0),
(91, 'Makete', 17, 0, 0, 0, 0),
(92, 'Njombe rural', 17, 0, 0, 0, 0),
(93, 'Njombe urban', 17, 0, 0, 0, 0),
(94, 'Wanging''ombe', 17, 0, 0, 0, 0),
(95, 'Bagamoyo', 18, 0, 0, 0, 0),
(96, 'Kibaha', 18, 0, 0, 0, 0),
(97, 'Kisarawe', 18, 0, 0, 0, 0),
(98, 'Mafia', 18, 0, 0, 0, 0),
(99, 'Mkuranga', 18, 0, 0, 0, 0),
(100, 'Rufiji', 18, 0, 0, 0, 0),
(101, 'Nkasi', 19, 0, 0, 0, 0),
(102, 'Sumbawanga rural', 19, 0, 0, 0, 0),
(103, 'Sumbawanga urban', 19, 0, 0, 0, 0),
(104, 'Mbinga', 20, 0, 0, 0, 0),
(105, 'Songea rural', 20, 0, 0, 0, 0),
(106, 'Songea urban', 20, 0, 0, 0, 0),
(107, 'Tunduru', 20, 0, 0, 0, 0),
(108, 'Namtumbo', 20, 0, 0, 0, 0),
(109, 'Nyasa', 20, 0, 0, 0, 0),
(110, 'Kahama', 21, 0, 0, 0, 0),
(111, 'Kishapu', 21, 0, 0, 0, 0),
(112, 'Shinyanga rural', 21, 0, 0, 0, 0),
(113, 'Shinyanga urban', 21, 0, 0, 0, 0),
(114, 'Bariadi', 22, 0, 0, 0, 0),
(115, 'Busega', 22, 0, 0, 0, 0),
(116, 'Itilima', 22, 0, 0, 0, 0),
(117, 'Maswa', 22, 0, 0, 0, 0),
(118, 'Meatu', 22, 0, 0, 0, 0),
(119, 'Iramba', 23, 0, 0, 0, 0),
(120, 'Manyoni', 23, 0, 0, 0, 0),
(121, 'Singida rural', 23, 0, 0, 0, 0),
(122, 'Singida urban', 23, 0, 0, 0, 0),
(123, 'Igunga', 24, 0, 0, 0, 0),
(124, 'Nzega', 24, 0, 0, 0, 0),
(125, 'Sikonge', 24, 0, 0, 0, 0),
(126, 'Uyui', 24, 0, 0, 0, 0),
(127, 'Tabora', 24, 0, 0, 0, 0),
(128, 'Urambo', 24, 0, 0, 0, 0),
(129, 'Handeni', 25, 0, 0, 0, 0),
(130, 'Kilindi', 25, 0, 0, 0, 0),
(131, 'Korogwe', 25, 0, 0, 0, 0),
(132, 'Lushoto', 25, 0, 0, 0, 0),
(133, 'Muheza', 25, 0, 0, 0, 0),
(134, 'Mkinga', 25, 0, 0, 0, 0),
(135, 'Pangani', 25, 0, 0, 0, 0),
(136, 'Tanga', 25, 0, 0, 0, 0),
(137, 'Busokelo', 13, 0, 0, 0, 0),
(138, 'Momba', 13, 0, 0, 0, 0),
(139, 'Kalambo', 19, 0, 0, 0, 0),
(140, 'Arusha Dc', 1, 340886, 11931, 16931, 10908);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(2550) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Logging in', '2014-11-22 00:20:17', '2014-11-22 00:20:17'),
(2, 1, 'Logging in', '2014-11-22 00:24:54', '2014-11-22 00:24:54'),
(3, 1, 'Logging in', '2014-11-22 00:50:12', '2014-11-22 00:50:12'),
(4, 1, 'Add user named afdasfdasf asfdssdf', '2014-11-22 01:28:20', '2014-11-22 01:28:20'),
(5, 1, 'Update user named jumma mwakalinga', '2014-11-22 01:31:15', '2014-11-22 01:31:15'),
(6, 1, 'Add user named ghfdfdh fdhfgd', '2014-11-22 01:34:01', '2014-11-22 01:34:01'),
(7, 1, 'Add user named dgdhgd hdhgd', '2014-11-22 01:34:37', '2014-11-22 01:34:37'),
(8, 1, 'Delete user named dgdhgd hdhgd', '2014-11-22 01:36:06', '2014-11-22 01:36:06'),
(9, 1, 'Update user named jumma mwakalinga', '2014-11-22 01:37:15', '2014-11-22 01:37:15'),
(10, 2, 'Logging in', '2014-11-22 01:37:47', '2014-11-22 01:37:47'),
(11, 2, 'Update user named jumma1 mwakalinga1', '2014-11-22 01:41:32', '2014-11-22 01:41:32'),
(12, 2, 'Update user named jumma1 mwakalinga1', '2014-11-22 01:42:02', '2014-11-22 01:42:02'),
(13, 1, 'Logging in', '2014-11-22 01:43:52', '2014-11-22 01:43:52'),
(14, 1, 'Update user named jumma1 mwakalinga1', '2014-11-22 02:25:09', '2014-11-22 02:25:09'),
(15, 1, 'Update user named jumma1 mwakalinga1', '2014-11-22 02:25:10', '2014-11-22 02:25:10'),
(16, 1, 'Register Company named czvczv', '2014-11-22 02:54:09', '2014-11-22 02:54:09'),
(17, 1, 'Logging in', '2014-11-22 04:07:18', '2014-11-22 04:07:18'),
(18, 1, 'Logging in', '2014-11-22 04:07:45', '2014-11-22 04:07:45'),
(19, 1, 'Update Company named czvczv1', '2014-11-22 04:08:39', '2014-11-22 04:08:39'),
(20, 1, 'Register Company named gfsdgdh', '2014-11-22 04:15:28', '2014-11-22 04:15:28'),
(21, 1, 'Add user named fdsafdsa fffdsf', '2014-11-22 05:26:58', '2014-11-22 05:26:58'),
(22, 1, 'Add user named fdgdhg fhghd', '2014-11-22 05:41:01', '2014-11-22 05:41:01'),
(23, 1, 'Update user named fdgdhg1 fhghd1', '2014-11-22 05:51:08', '2014-11-22 05:51:08'),
(24, 1, 'Update user named fdgdhg12 fhghd12', '2014-11-22 05:52:26', '2014-11-22 05:52:26'),
(25, 1, 'Update user named fdsafdsa fffdsf', '2014-11-22 05:52:39', '2014-11-22 05:52:39'),
(26, 1, 'Delete user named fdgdhg12 fhghd12', '2014-11-22 05:54:21', '2014-11-22 05:54:21'),
(27, 1, 'Add user named fdghdhf fdhghd', '2014-11-22 05:58:05', '2014-11-22 05:58:05'),
(28, 1, 'Add user named cadsda daada', '2014-11-22 05:58:57', '2014-11-22 05:58:57'),
(29, 8, 'Logging in', '2014-11-22 05:59:09', '2014-11-22 05:59:09'),
(30, 8, 'Logging in', '2014-11-22 06:14:30', '2014-11-22 06:14:30'),
(31, 1, 'Logging in', '2014-11-22 08:37:51', '2014-11-22 08:37:51'),
(32, 1, 'Delete user named fdsafdsa fffdsf', '2014-11-22 08:40:32', '2014-11-22 08:40:32'),
(33, 8, 'Logging in', '2014-11-22 08:43:44', '2014-11-22 08:43:44'),
(34, 1, 'Logging in', '2014-11-22 09:31:45', '2014-11-22 09:31:45'),
(35, 8, 'Logging in', '2014-11-22 09:33:20', '2014-11-22 09:33:20'),
(36, 8, 'Logging in', '2014-11-22 10:49:05', '2014-11-22 10:49:05'),
(37, 1, 'Logging in', '2014-11-22 10:50:47', '2014-11-22 10:50:47'),
(38, 8, 'Logging in', '2014-11-22 10:51:12', '2014-11-22 10:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_21_200549_create_users_table', 1),
('2014_11_21_200647_create_company_table', 1),
('2014_11_21_200720_create_employee_table', 1),
('2014_11_21_200748_create_order_table', 1),
('2014_11_21_200910_create_results_table', 1),
('2014_11_21_200959_create_packages_table', 1),
('2014_11_21_201023_create_screening_table', 1),
('2014_11_21_201127_create_logs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orderScreening`
--

CREATE TABLE IF NOT EXISTS `orderScreening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Standard Background Checks', 'Normal Check for a client', '2014-11-22 09:05:09', '2014-11-22 09:05:09'),
(2, 'Extended Background Checks', 'More extensive background checks for specifichigh risk positions', '2014-11-22 09:05:09', '2014-11-22 09:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tagert_population` int(11) NOT NULL,
  `annual_birth` int(11) NOT NULL,
  `pregnancy` int(11) NOT NULL,
  `surviving_infants` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region`, `tagert_population`, `annual_birth`, `pregnancy`, `surviving_infants`) VALUES
(1, 'Arusha', 1696054, 59362, 82297, 54273),
(2, 'Dar es salaam', 0, 0, 0, 0),
(3, 'Dodoma', 86, 77, 0, 76),
(4, 'Geita', 0, 0, 0, 0),
(5, 'Iringa', 0, 0, 0, 0),
(6, 'Kagera', 0, 0, 0, 0),
(7, 'Katavi', 0, 0, 0, 0),
(8, 'Kigoma', 0, 0, 0, 0),
(9, 'Kilimanjaro', 0, 0, 0, 0),
(10, 'Lindi', 0, 0, 0, 0),
(11, 'Manyara', 0, 0, 0, 0),
(12, 'Mara', 0, 0, 0, 0),
(13, 'Mbeya', 0, 0, 0, 0),
(14, 'Morogoro', 0, 0, 0, 0),
(15, 'Mtwara', 0, 0, 0, 0),
(16, 'Mwanza', 0, 0, 0, 0),
(17, 'Njombe', 0, 0, 0, 0),
(18, 'Pwani', 0, 0, 0, 0),
(19, 'Rukwa', 0, 0, 0, 0),
(20, 'Ruvuma', 0, 0, 0, 0),
(21, 'Shinyanga', 0, 0, 0, 0),
(22, 'Simiyu', 0, 0, 0, 0),
(23, 'Singida', 0, 0, 0, 0),
(24, 'Tabora', 0, 0, 0, 0),
(25, 'Tanga', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE IF NOT EXISTS `screening` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`id`, `package_id`, `name`, `description`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'ID document check', 'Verification of machine-readable passport details. Compares the\r\ncodes built in to the passport with the identity details provided by\r\nthe candidate. A good quality photocopy of the relevant ID page,\r\nshowing the machine readable algorithm is required.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(2, 1, 'Employment history\r\nand references', 'Confirmation of employment history from the appropriate\r\nHR/Personnel departments. We will attempt to confirm any periods\r\nof self-employment with the individuals accountant, or other\r\npresentation of evidence, e.g. tax return.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(3, 1, 'Gap analysis', 'Gaps greater than three months will be investigated directly with\r\nthe candidate and supporting documentation will be obtained and\r\ndetailed in the final report', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(4, 1, 'Academic qualifications', 'Confirmation at source of all higher/tertiary education, irrespective\r\nof when attained.\r\nSecondary/High school education will be confirmed if attainted\r\nwithin the last 5 years.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(5, 1, 'Professional\r\nqualifications', 'Confirmation of professional qualifications/trade memberships,\r\nincluding levels and dates of affiliation.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(6, 1, 'CV Analysis', 'Comparison of Candidate CV against completed application form\r\ncovering the term of the SLA period. Discrepancies (in accordance\r\nwith the discrepancy matrix) will be reported via Contractor’s on-\r\nline reporting tool.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(7, 2, 'Criminal check', 'A check to identify criminal convictions and adverse information in\r\nrelation to the candidate.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(8, 2, 'Adverse Media search', 'Extensive searches made of major broadsheets and periodicals\r\ncovering a six-year period for any contributions an individual may\r\nhave made or articles they may have been quoted in or the subject\r\nof. Only negative articles will be reported.', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46'),
(9, 2, 'Compliance database\r\ncheck', 'A search of international databases for individuals subject to\r\nregulatory sanctions or enforcements, known terrorists, money\r\nlaunderers, fraudsters, politically exposed persons (PEPs) and\r\nblack-listed persons. This search is an ‘exact match’ name check', '', '2014-11-22 09:09:46', '2014-11-22 09:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `role`, `company_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kelvin', 'mbwilo', 'admin', 'kelvinmbwilo@gmail.com', '$2y$10$/wLwhmFGij0COzVT1OPgXutmy3iK84o32QiJ0r7kCOWJ5YzxyVHxS', '0717524556', 'admin', 0, 'JgDB7Gh9n1gi68ONzOXDXz41tE8UbAxfYngKoFQMjbg5O0bVIbZcXfGTtwQn', '2014-11-22 02:45:26', '2014-11-22 10:51:08'),
(2, 'jumma1', 'mwakalinga1', 'ally11', 'alex.hamis@yahoo.co.uk11', '$2y$10$EsWq7tFupohe/BsaEldMUO1m81q19Q4ggRQHgLn3AC1oOmB.TjTZO', '0856454411', 'data', 0, '8bFk10RKkvE6eTFBK1QHPyCXbFQ59AGzdpIvKVsPfMPM2ohVJgo7BRx7pADM', '2014-11-22 01:28:19', '2014-11-22 02:25:09'),
(3, 'ghfdfdh', 'fdhfgd', 'hytrjy', 'tgffdg@fdgfd.dghd', '$2y$10$ZwudU1MzKVNJcRPbA4ZMyeYRvHXAdtboNlcGS7Qj6CWIpzNOa33Si', 'sfgsdgsfdg', 'data', 0, '', '2014-11-22 01:34:01', '2014-11-22 01:34:01'),
(7, 'fdghdhf', 'fdhghd', 'hdfdh', 'fdhgfdhf@fdhgdh.hfdfdh', '$2y$10$g.tW8t8ixPGrytuUBlqYAeDk0o61HhQ020U6lWird/D75GqspfuHO', 'hdhfd', 'company', 1, '', '2014-11-22 05:58:05', '2014-11-22 05:58:05'),
(8, 'cadsda', 'daada', 'c', 'dsafsa@fsdgf.gsfd', '$2y$10$f..3loEO6Wd9UqZJOfw5Qum/uc0kIJNZ6IRZt8S9vsCnezAklDcFm', 'fdsafsadf', 'company', 1, 'ilNVjpfzH2a0cCszwSCNFZeagsl5NpywxlPr9GeNI2Z3A6I8ngWRhcDWBQ19', '2014-11-22 05:58:57', '2014-11-22 10:50:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
