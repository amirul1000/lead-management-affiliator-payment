-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 10:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliate2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `id` int(10) NOT NULL,
  `email` varchar(127) NOT NULL,
  `phone` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`id`, `email`, `phone`) VALUES
(0, 'admin@pos.com', '008801736878338');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(10) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `name`, `amount`) VALUES
(1, 'Per Lead', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text,
  `country` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Health benefits center LLC', 'United States\r\nSmyrna', 'US', 'Smyrna', 'Smyrna', '1212', 'company_images/1_hqdefault.jpg', 'company_images/1_3.jpg', 'company_images/1_2.jpg', 'Health benefits center LLC');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) NOT NULL,
  `lead_by_users_id` int(10) DEFAULT NULL,
  `email` varchar(127) DEFAULT NULL,
  `title` varchar(127) DEFAULT NULL,
  `first_name` varchar(127) DEFAULT NULL,
  `last_name` varchar(127) DEFAULT NULL,
  `arrea_code` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_line_1` varchar(127) DEFAULT NULL,
  `address_line_2` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `paid_status` enum('paid','unpiad') DEFAULT NULL,
  `entry_type` enum('member','affiliate') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('pending','approved','denied') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `lead_by_users_id`, `email`, `title`, `first_name`, `last_name`, `arrea_code`, `phone_no`, `dob`, `address_line_1`, `address_line_2`, `city`, `state`, `zip`, `country_id`, `paid_amount`, `paid_status`, `entry_type`, `created_at`, `updated_at`, `status`) VALUES
(1, 9, 'amirrucst@gmail.com', '', 'Amirul', 'Momenin', 'fdfdfdf', '66565656', '2019-09-11', 'C-20,JAkir Hossain Road,Block-E', 'Md-pur', 'Dhaka', 'Dhaka Division', '1207', 19, '25.00', '', 'member', '2019-09-11 15:36:23', '2019-09-15 16:18:41', 'approved'),
(2, 9, 'ggggggggggggg', 'gggggggggggggg', 'ggg', 'gggggggggggggg', 'ggggggggggggg', 'ggggggg', '2019-09-11', '', '', '', '', '', 0, '0.00', 'unpiad', 'member', '2019-09-11 15:56:43', '2019-09-15 16:19:18', 'approved'),
(3, 9, 'fgfgfgg@ghghgh.com', '565656', '565656', '565656', '6565656', '5656565', '2019-09-15', '565656', '565656', '65565', '65656', '5656', 0, '0.00', '', 'member', '2019-09-15 16:01:35', '2019-09-15 16:19:27', 'approved'),
(4, 9, 'amirrucst@gmail.com', '', 'Amirul', 'Momenin', 'fdfdfdf', '66565656', '2019-09-11', 'C-20,JAkir Hossain Road,Block-E', 'Md-pur', 'Dhaka', 'Dhaka Division', '1207', 19, '25.00', 'unpiad', 'member', '2019-09-11 15:36:23', '2019-09-15 16:18:41', 'approved'),
(5, 9, 'ggggggggggggg', 'gggggggggggggg', 'ggg', 'gggggggggggggg', 'ggggggggggggg', 'ggggggg', '2019-09-11', '', '', '', '', '', 0, '0.00', 'unpiad', 'member', '2019-09-11 15:56:43', '2019-09-15 16:19:18', 'approved'),
(6, 9, 'fgfgfgg@ghghgh.com', '565656', '565656', '565656', '6565656', '5656565', '2019-09-15', '565656', '565656', '65565', '65656', '5656', 0, '0.00', 'unpiad', 'member', '2019-09-15 16:01:35', '2019-09-15 16:19:27', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `phone_no`, `status`) VALUES
(1, '66565656', 'active'),
(2, '666665656', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `subject` varchar(256) DEFAULT NULL,
  `description` text,
  `debit` double(10,2) DEFAULT '0.00',
  `credit` double(10,2) DEFAULT '0.00',
  `refference` text,
  `date_time_created` datetime DEFAULT NULL,
  `date_time_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `users_id`, `subject`, `description`, `debit`, `credit`, `refference`, `date_time_created`, `date_time_updated`) VALUES
(1, 18, 'ererere', 'rerer', 0.00, 0.00, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `valid_invalid_tester_phone` varchar(20) DEFAULT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `country_id` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_type` enum('super','affiliate') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `phone_no`, `valid_invalid_tester_phone`, `file_picture`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, 'xx', 'xx', 'Mr.', 'Anil', 'kumar', NULL, NULL, 'users_images/9_point_of_sale_page_1.png', '', 'ssssss', 'sssssssssssssssssss', 'ssssssssss', 'ssssssssssss', '231', '2011-10-19 00:00:00', '2019-09-09 14:00:44', 'super', 'active'),
(10, 'rrrrrrrrr', 'rrrrrrrr', 'rrrrrrrrr', 'rrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrr', NULL, NULL, NULL, '', '', '', '', '', '240', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'active'),
(11, 'ddfdfd', 'fdfdfd', 'fdfdfd', 'fdfdfd', 'fdfdf', NULL, NULL, NULL, 'dfdf', 'dfdf', 'dfdfdfd', 'fdfdf', 'dfdf', '', '2019-08-13 21:56:12', '0000-00-00 00:00:00', 'super', 'active'),
(12, 'abc@abc.com', 'xx', 'trtrtrt', 'yty', 'ytytyt', NULL, '6565656', 'users_images/12_img_7449.jpg', '', '', '', '', '', '', '0000-00-00 00:00:00', '2019-08-27 18:09:05', '', 'active'),
(16, 'aa@aa.com', '202cb962ac59075b964b07152d234b70', '', 'aa', 'aa', NULL, NULL, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'active'),
(17, 'abc@abc.com', '202cb962ac59075b964b07152d234b70', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '2019-09-01 05:21:08', '0000-00-00 00:00:00', '', 'active'),
(18, 'test@test.com', '202cb962ac59075b964b07152d234b70', '', 'wwwwwwwwwwww', 'wwwwwwwww', NULL, NULL, NULL, '', '', '', '', '', '', '2019-09-01 05:22:42', '0000-00-00 00:00:00', '', 'active'),
(19, 'admin@dms.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '2019-09-01 05:42:07', '0000-00-00 00:00:00', 'super', 'active'),
(21, 'abc', 'abc', '', '', '', NULL, NULL, NULL, '', '', '', '', '', '', '2019-09-07 21:21:30', '0000-00-00 00:00:00', 'affiliate', 'active'),
(22, '434', '', '', '34343', '34343', NULL, NULL, NULL, '', '', '', '', '', '', '2019-09-08 16:08:37', '0000-00-00 00:00:00', '', ''),
(23, 'FGFGFG@FFDF.COM', '3434', '', 'GGFGFG', 'FGFGF', NULL, '676767', NULL, '', '', '', '', '', '5', '2019-09-08 16:29:26', '0000-00-00 00:00:00', '', ''),
(27, 'rry@ttyty.com', '54158', '', '454545', '4545454', '45454', '4665656611', 'users_images/27_1.jpg', '', '545454', '5454', '545454', '54545', '1', '2019-09-14 23:02:37', '0000-00-00 00:00:00', 'affiliate', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users_phone`
--

CREATE TABLE `users_phone` (
  `id` int(10) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `phone_id` int(10) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_phone`
--

INSERT INTO `users_phone` (`id`, `users_id`, `phone_id`, `status`) VALUES
(1, 23, 2, NULL),
(2, 16, 1, NULL),
(3, 23, 2, NULL),
(4, 24, 2, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_phone`
--
ALTER TABLE `users_phone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users_phone`
--
ALTER TABLE `users_phone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
