-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 09:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oilclini`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `provinceID` int(11) NOT NULL,
  `cityName` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `provinceID`, `cityName`) VALUES
(508, 12, 'Brantas'),
(2, 38, 'Badung'),
(3, 38, 'Bangli'),
(4, 38, 'Buleleng'),
(5, 38, 'Gianyar'),
(6, 38, 'Jembrana'),
(7, 38, 'Karangasem'),
(8, 38, 'Klungkung'),
(9, 38, 'Tabanan'),
(10, 38, 'Denpasar'),
(11, 3, 'Meulaboh'),
(12, 3, 'Aceh Barat Daya'),
(13, 3, 'Aceh Besar'),
(14, 3, 'Aceh Jaya'),
(15, 3, 'Aceh Selatan'),
(16, 3, 'Aceh Singkil'),
(17, 3, 'Aceh Tamiang'),
(18, 3, 'Aceh Tengah'),
(19, 3, 'Aceh Tenggara'),
(20, 3, 'Aceh Timur'),
(21, 3, 'Aceh Utara'),
(22, 3, 'Bener Meriah'),
(23, 3, 'Bireuen'),
(24, 3, 'Gayo Lues'),
(25, 3, 'Nagan Raya'),
(26, 3, 'Pidie'),
(27, 3, 'Pidie Jaya'),
(28, 3, 'Simeulue'),
(29, 3, 'Banda Aceh'),
(30, 3, 'Langsa'),
(31, 3, 'Lhokseumawe'),
(32, 3, 'Sabang'),
(33, 3, 'Subulussalam'),
(34, 4, 'Lebak'),
(35, 4, 'Pandeglang'),
(36, 4, 'Serang'),
(37, 4, 'Tangerang'),
(38, 4, 'Cilegon'),
(41, 4, 'Tangerang Selatan'),
(42, 5, 'Bengkulu Selatan'),
(43, 5, 'Bengkulu Tengah'),
(44, 5, 'Bengkulu Utara'),
(45, 5, 'Kaur'),
(46, 5, 'Kepahiang'),
(47, 5, 'Lebong'),
(48, 5, 'Mukomuko'),
(49, 5, 'Rejang Lebong'),
(50, 5, 'Seluma'),
(51, 5, 'Bengkulu'),
(52, 6, 'Bantul'),
(53, 6, 'Gunung Kidul'),
(54, 6, 'Kulon Progo'),
(55, 6, 'Sleman'),
(56, 6, 'Yogyakarta'),
(57, 7, 'Jakarta Selatan'),
(58, 7, 'Jakarta Pusat'),
(59, 7, 'Jakarta Timur'),
(60, 7, 'Jakarta Utara'),
(61, 7, 'Jakarta Barat'),
(62, 8, 'Boalemo'),
(63, 8, 'Bone Bolango'),
(65, 8, 'Gorontalo Utara'),
(66, 8, 'Pohuwato'),
(67, 8, 'Gorontalo'),
(68, 9, 'Batang Hari'),
(69, 9, 'Bungo'),
(70, 9, 'Kerinci'),
(71, 9, 'Merangin'),
(72, 9, 'Muaro Jambi'),
(73, 9, 'Sarolangun'),
(74, 9, 'Tanjung Jabung Barat'),
(75, 9, 'Tanjung Jabung Timur'),
(76, 9, 'Tebo'),
(77, 9, 'Jambi'),
(78, 9, 'Sungai Penuh'),
(80, 10, 'Bandung Barat'),
(81, 10, 'Bekasi'),
(83, 10, 'Ciamis'),
(84, 10, 'Cianjur'),
(86, 10, 'Garut'),
(87, 10, 'Indramayu'),
(88, 10, 'Karawang'),
(89, 10, 'Kuningan'),
(90, 10, 'Majalengka'),
(91, 10, 'Purwakarta'),
(92, 10, 'Subang'),
(93, 10, 'Sukabumi'),
(94, 10, 'Sumedang'),
(95, 10, 'Tasikmalaya'),
(96, 10, 'Bandung'),
(97, 10, 'Banjar'),
(99, 10, 'Bogor'),
(100, 10, 'Cimahi'),
(101, 10, 'Cirebon'),
(102, 10, 'Depok'),
(105, 11, 'Banjarnegara'),
(106, 11, 'Banyumas'),
(107, 11, 'Batang'),
(108, 11, 'Blora'),
(109, 11, 'Boyolali'),
(110, 11, 'Brebes'),
(111, 11, 'Cilacap'),
(112, 11, 'Demak'),
(113, 11, 'Grobogan'),
(114, 11, 'Jepara'),
(115, 11, 'Karanganyar'),
(116, 11, 'Kebumen'),
(117, 11, 'Kendal'),
(118, 11, 'Klaten'),
(119, 11, 'Kudus'),
(120, 11, 'Magelang'),
(121, 11, 'Pati'),
(122, 11, 'Pekalongan'),
(123, 11, 'Pemalang'),
(124, 11, 'Purbalingga'),
(125, 11, 'Purworejo'),
(126, 11, 'Rembang'),
(128, 11, 'Sragen'),
(129, 11, 'Sukoharjo'),
(130, 11, 'Tegal'),
(131, 11, 'Temanggung'),
(132, 11, 'Wonogiri'),
(133, 11, 'Wonosobo'),
(136, 11, 'Salatiga'),
(137, 11, 'Semarang'),
(138, 11, 'Surakarta'),
(140, 12, 'Bangkalan'),
(141, 12, 'Banyuwangi'),
(143, 12, 'Bojonegoro'),
(144, 12, 'Bondowoso'),
(145, 12, 'Gresik'),
(146, 12, 'Jember'),
(147, 12, 'Jombang'),
(149, 12, 'Lamongan'),
(150, 12, 'Lumajang'),
(152, 12, 'Magetan'),
(155, 12, 'Nganjuk'),
(156, 12, 'Ngawi'),
(157, 12, 'Pacitan'),
(158, 12, 'Pamekasan'),
(160, 12, 'Ponorogo'),
(161, 12, 'Probolinggo'),
(162, 12, 'Sampang'),
(163, 12, 'Sidoarjo'),
(164, 12, 'Situbondo'),
(165, 12, 'Sumenep'),
(166, 12, 'Trenggalek'),
(167, 12, 'Tuban'),
(168, 12, 'Tulungagung'),
(169, 12, 'Batu'),
(170, 12, 'Blitar'),
(171, 12, 'Kediri'),
(172, 12, 'Madiun'),
(173, 12, 'Malang'),
(174, 12, 'Mojokerto'),
(175, 12, 'Pasuruan'),
(177, 12, 'Surabaya'),
(178, 13, 'Bengkayang'),
(179, 13, 'Kapuas Hulu'),
(180, 13, 'Kayong Utara'),
(181, 13, 'Ketapang'),
(182, 13, 'Kubu Raya'),
(183, 13, 'Landak'),
(184, 13, 'Melawi'),
(185, 13, 'Pontianak'),
(186, 13, 'Sambas'),
(187, 13, 'Sanggau'),
(188, 13, 'Sekadau'),
(189, 13, 'Sintang'),
(191, 13, 'Singkawang'),
(192, 14, 'Balangan'),
(193, 14, 'Banjar'),
(194, 14, 'Kuala'),
(195, 14, 'Hulu Sungai Selatan'),
(196, 14, 'Hulu Sungai Tengah'),
(197, 14, 'Hulu Sungai Utara'),
(198, 14, 'Kotabaru'),
(199, 14, 'Tabalong'),
(200, 14, 'Tanah Bumbu'),
(201, 14, 'Tanah Laut'),
(202, 14, 'Tapin'),
(203, 14, 'Banjarbaru'),
(204, 14, 'Banjarmasin'),
(205, 15, 'Barito Selatan'),
(206, 15, 'Barito Timur'),
(207, 15, 'Barito Utara'),
(208, 15, 'Gunung Mas'),
(209, 15, 'Kapuas'),
(210, 15, 'Katingan'),
(211, 15, 'Kotawaringin Barat'),
(212, 15, 'Kotawaringin Timur'),
(213, 15, 'Lamandau'),
(214, 15, 'Murung Raya'),
(215, 15, 'Pulang Pisau'),
(216, 15, 'Sukamara'),
(217, 15, 'Seruyan'),
(218, 15, 'Palangka Raya'),
(219, 16, 'Berau'),
(220, 16, 'Bulungan'),
(221, 16, 'Kutai Barat'),
(222, 16, 'Kutai Kartanegara'),
(223, 16, 'Kutai Timur'),
(224, 16, 'Malinau'),
(225, 16, 'Nunukan'),
(226, 16, 'Paser'),
(227, 16, 'Penajam Paser Utara'),
(228, 16, 'Tana Tidung'),
(229, 16, 'Balikpapan'),
(230, 16, 'Bontang'),
(231, 16, 'Samarinda'),
(232, 16, 'Tarakan'),
(233, 17, 'Bangka'),
(234, 17, 'Bangka Barat'),
(235, 17, 'Bangka Selatan'),
(236, 17, 'Bangka Tengah'),
(237, 17, 'Belitung'),
(238, 17, 'Belitung Timur'),
(239, 17, 'Pangkal Pinang'),
(240, 18, 'Bintan'),
(241, 18, 'Karimun'),
(242, 18, 'Kepulauan Anambas'),
(243, 18, 'Lingga'),
(244, 18, 'Natuna'),
(245, 18, 'Batam'),
(246, 18, 'Tanjung Pinang'),
(247, 19, 'Lampung Barat'),
(248, 19, 'Lampung Selatan'),
(249, 19, 'Lampung Tengah'),
(250, 19, 'Lampung Timur'),
(251, 19, 'Lampung Utara'),
(252, 19, 'Mesuji'),
(253, 19, 'Pesawaran'),
(254, 19, 'Pringsewu'),
(255, 19, 'Tanggamus'),
(256, 19, 'Tulang Bawang'),
(257, 19, 'Tulang Bawang Barat'),
(258, 19, 'Way Kanan'),
(259, 19, 'Bandar Lampung'),
(260, 19, 'Metro'),
(261, 20, 'Buru'),
(262, 20, 'Buru Selatan'),
(263, 20, 'Kepulauan Aru'),
(264, 20, 'Maluku Barat Daya'),
(265, 20, 'Maluku Tengah'),
(266, 20, 'Maluku Tenggara'),
(267, 20, 'Maluku Tenggara Barat'),
(268, 20, 'Seram Bagian Barat'),
(269, 20, 'Seram Bagian Timur'),
(270, 20, 'Ambon'),
(271, 20, 'Tual'),
(272, 21, 'Halmahera Barat'),
(273, 21, 'Halmahera Tengah'),
(274, 21, 'Halmahera Utara'),
(275, 21, 'Halmahera Selatan'),
(276, 21, 'Kepulauan Sula'),
(277, 21, 'Halmahera Timur'),
(278, 21, 'Pulau Morotai'),
(279, 21, 'Ternate'),
(280, 21, 'Tidore Kepulauan'),
(281, 22, 'Bima'),
(282, 22, 'Dompu'),
(283, 22, 'Lombok Barat'),
(284, 22, 'Lombok Tengah'),
(285, 22, 'Lombok Timur'),
(286, 22, 'Lombok Utara'),
(287, 22, 'Sumbawa'),
(288, 22, 'Sumbawa Barat'),
(290, 22, 'Mataram'),
(292, 23, 'Timor Tengah Selatan'),
(293, 23, 'Timor Tengah Utara'),
(294, 23, 'Belu'),
(295, 23, 'Alor'),
(296, 23, 'Flores Timur'),
(297, 23, 'Sikka'),
(298, 23, 'Ende'),
(299, 23, 'Ngada'),
(300, 23, 'Manggarai'),
(301, 23, 'Sumba Timur'),
(302, 23, 'Sumba Barat'),
(303, 23, 'Lembata'),
(304, 23, 'Rote Ndao'),
(305, 23, 'Manggarai Barat'),
(306, 23, 'Nagekeo'),
(307, 23, 'Sumba Tengah'),
(308, 23, 'Sumba Barat Daya'),
(309, 23, 'Manggarai Timur'),
(310, 23, 'Sabu Raijua'),
(311, 23, 'Kupang'),
(312, 24, 'Asmat'),
(313, 24, 'Biak Numfor'),
(314, 24, 'Boven Digoel'),
(315, 24, 'Deiyai'),
(316, 24, 'Dogiyai'),
(317, 24, 'Intan Jaya'),
(319, 24, 'Jayawijaya'),
(320, 24, 'Keerom'),
(321, 24, 'Kepulauan Yapen'),
(322, 24, 'Lanny Jaya'),
(323, 24, 'Mamberamo Raya'),
(324, 24, 'Mamberamo Tengah'),
(325, 24, 'Mappi'),
(326, 24, 'Merauke'),
(327, 24, 'Mimika'),
(328, 24, 'Nabire'),
(329, 24, 'Nduga'),
(330, 24, 'Paniai'),
(331, 24, 'Pegunungan Bintang'),
(332, 24, 'Puncak'),
(333, 24, 'Puncak Jaya'),
(334, 24, 'Sarmi'),
(335, 24, 'Supiori'),
(336, 24, 'Tolikara'),
(337, 24, 'Waropen'),
(338, 24, 'Yahukimo'),
(339, 24, 'Yalimo'),
(340, 24, 'Jayapura'),
(342, 25, 'Manokwari'),
(343, 25, 'Fakfak'),
(344, 25, 'Sorong Selatan'),
(345, 25, 'Raja Ampat'),
(346, 25, 'Tambrauw'),
(347, 25, 'Teluk Bintuni'),
(348, 25, 'Teluk Wondama'),
(349, 25, 'Kaimana'),
(350, 25, 'Sorong'),
(351, 26, 'Bengkalis'),
(352, 26, 'Indragiri Hilir'),
(353, 26, 'Indragiri Hulu'),
(354, 26, 'Kampar'),
(355, 26, 'Kuantan Singingi'),
(356, 26, 'Pelalawan'),
(357, 26, 'Rokan Hilir'),
(358, 26, 'Rokan Hulu'),
(359, 26, 'Siak'),
(360, 26, 'Pekanbaru'),
(361, 26, 'Dumai'),
(362, 27, 'Majene'),
(363, 27, 'Mamasa'),
(364, 27, 'Mamuju'),
(365, 27, 'Mamuju Utara'),
(366, 27, 'Polewali Mandar'),
(367, 28, 'Bantaeng'),
(368, 28, 'Barru'),
(369, 28, 'Bone'),
(370, 28, 'Bulukumba'),
(371, 28, 'Enrekang'),
(372, 28, 'Gowa'),
(373, 28, 'Jeneponto'),
(374, 28, 'Kepulauan Selayar'),
(375, 28, 'Luwu'),
(376, 28, 'Luwu Timur'),
(377, 28, 'Luwu Utara'),
(378, 28, 'Maros'),
(379, 28, 'Pangkajene dan Kepulauan'),
(380, 28, 'Pinrang'),
(381, 28, 'Sidenreng Rappang'),
(382, 28, 'Sinjai'),
(383, 28, 'Soppeng'),
(384, 28, 'Takalar'),
(385, 28, 'Tana Toraja'),
(386, 28, 'Toraja Utara'),
(387, 28, 'Wajo'),
(388, 28, 'Makassar'),
(389, 28, 'Palopo'),
(390, 28, 'Pare-Pare'),
(391, 29, 'Banggai'),
(392, 29, 'Banggai Kepulauan'),
(393, 29, 'Buol'),
(394, 29, 'Donggala'),
(395, 29, 'Morowali'),
(396, 29, 'Parigi Moutong'),
(397, 29, 'Poso'),
(398, 29, 'Tojo Una-Una'),
(399, 29, 'Toli-Toli'),
(400, 29, 'Sigi'),
(401, 29, 'Palu'),
(402, 30, 'Bombana'),
(403, 30, 'Buton'),
(404, 30, 'Buton Utara'),
(405, 30, 'Kolaka'),
(406, 30, 'Kolaka Utara'),
(407, 30, 'Konawe'),
(408, 30, 'Konawe Selatan'),
(409, 30, 'Konawe Utara'),
(410, 30, 'Muna'),
(411, 30, 'Wakatobi'),
(412, 30, 'Bau-Bau'),
(413, 30, 'Kendari'),
(414, 31, 'Bolaang Mongondow'),
(415, 31, 'Bolaang Mongondow Selatan'),
(416, 31, 'Bolaang Mongondow Timur'),
(417, 31, 'Bolaang Mongondow Utara'),
(418, 31, 'Kepulauan Sangihe'),
(419, 31, 'Kepulauan Siau Tagulandang Biaro'),
(420, 31, 'Kepulauan Talaud'),
(421, 31, 'Minahasa'),
(422, 31, 'Minahasa Selatan'),
(423, 31, 'Minahasa Tenggara'),
(424, 31, 'Minahasa Utara'),
(425, 31, 'Bitung'),
(426, 31, 'Kotamobagu'),
(427, 31, 'Manado'),
(428, 31, 'Tomohon'),
(429, 32, 'Agam'),
(430, 32, 'Dharmasraya'),
(431, 32, 'Kepulauan Mentawai'),
(432, 32, 'Lima Puluh'),
(433, 32, 'Padang Pariaman'),
(434, 32, 'Pasaman'),
(435, 32, 'Pasaman Barat'),
(436, 32, 'Pesisir Selatan'),
(437, 32, 'Sijunjung'),
(439, 32, 'Solok Selatan'),
(440, 32, 'Tanah Datar'),
(441, 32, 'Bukittinggi'),
(442, 32, 'Padang'),
(443, 32, 'Padangpanjang'),
(444, 32, 'Pariaman'),
(445, 32, 'Payakumbuh'),
(446, 32, 'Sawahlunto'),
(447, 32, 'Solok'),
(448, 33, 'Banyuasin'),
(449, 33, 'Empat Lawang'),
(450, 33, 'Lahat'),
(451, 33, 'Muara Enim'),
(452, 33, 'Musi Banyuasin'),
(453, 33, 'Musi Rawas'),
(454, 33, 'Ogan Ilir'),
(455, 33, 'Ogan Komering Ilir'),
(456, 33, 'Ogan Komering Ulu'),
(457, 33, 'Ogan Komering Ulu Selatan'),
(458, 33, 'Ogan Komering Ulu Timur'),
(459, 33, 'Lubuklinggau'),
(460, 33, 'Pagar Alam'),
(461, 33, 'Palembang'),
(462, 33, 'Prabumulih'),
(463, 34, 'Asahan'),
(464, 34, 'Batu Bara'),
(465, 34, 'Dairi'),
(466, 34, 'Deli Serdang'),
(467, 34, 'Humbang Hasundutan'),
(468, 34, 'Karo'),
(469, 34, 'Labuhanbatu'),
(470, 34, 'Labuhanbatu Selatan'),
(471, 34, 'Labuhanbatu Utara'),
(472, 34, 'Langkat'),
(473, 34, 'Mandailing Natal'),
(474, 34, 'Nias'),
(475, 34, 'Nias Barat'),
(476, 34, 'Nias Selatan'),
(477, 34, 'Nias Utara'),
(478, 34, 'Padang Lawas'),
(479, 34, 'Padang Lawas Utara'),
(480, 34, 'Pakpak Bharat'),
(481, 34, 'Samosir'),
(482, 34, 'Serdang Bedagai'),
(483, 34, 'Simalungun'),
(484, 34, 'Tapanuli Selatan'),
(485, 34, 'Tapanuli Tengah'),
(486, 34, 'Tapanuli Utara'),
(487, 34, 'Toba Samosir'),
(488, 34, 'Binjai'),
(489, 34, 'Gunung Sitoli'),
(490, 34, 'Medan'),
(491, 34, 'Padang Sidempuan'),
(492, 34, 'Pematangsiantar'),
(493, 34, 'Sibolga'),
(494, 34, 'Tanjung Balai'),
(495, 34, 'Tebing Tinggi'),
(497, 36, 'Belum Ada Data'),
(501, 10, 'Cikarang'),
(504, 12, 'Paiton'),
(506, 11, 'Purwokerto'),
(507, 34, 'Porsea'),
(509, 39, 'Tarakan Kaltara'),
(510, 39, 'Malinau Kaltara'),
(511, 39, 'Nunukan Kaltara'),
(512, 11, 'Solo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
