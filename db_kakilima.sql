-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 05:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kakilima`
--

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `nama_resto` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `rating` float NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id`, `img`, `nama_resto`, `alamat`, `jam_buka`, `jam_tutup`, `rating`, `harga`) VALUES
(8, '637b64c5abe24.jpg', 'resto resto 1 ee', 'babarsari ee', '04:08:00', '10:59:00', 3.42857, 10000),
(9, '638821cf700e6.jpg', 'resto resto 2', 'sleman', '17:00:00', '17:00:00', 4, 10000),
(11, '6383455c39370.jpg', 'Sate', 'capek', '18:09:00', '18:09:00', 1, 10000),
(13, '638359220794c.jpg', 'Coba Namanya Panjang Hahahaha', 'Jl. Kebagusan Raya No. 67, Pasar Minggu, Jakarta Selatan', '19:33:00', '07:33:00', 0, 10000),
(15, '6384ad7d1d3a0.jpg', 'BOBATAI', 'Jl. Malioboro No.52 - 58, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55213', '00:00:00', '10:00:00', 0, 56000),
(16, '6384c0b598d72.jpg', 'CHIKEN CRISBAR', 'Jalan Pandega Marta Blok A1, Manggung, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '09:00:00', '19:00:00', 4.5, 15000),
(17, '63881fed6cca2.jpg', 'Japan France Bread', 'Jl. Kaliurang No.22, Purwosari, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284', '07:00:00', '15:00:00', 0, 13000),
(18, '6384c23b37562.jpg', 'Es Coklat Impian', 'Jl. Mutiara No.1b, Klitren, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221', '10:00:00', '17:00:00', 0, 16000),
(19, '6384c33dadcaa.jpg', 'Batagor Pa Acep Istimewa', '697M+45X, Jl. Kusbini, Demangan, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221', '09:00:00', '19:00:00', 1, 10000),
(20, '63881eba6a731.jpg', 'Mie Ayam Palembang Afui', '6CC8+2H7, Jl. Tambak Bayan, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '09:00:00', '19:00:00', 0, 12000),
(21, '6386cb2a5496a.jpg', 'Sate Kere Haji Junpei', 'Jl. Pabringan No.16, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122', '11:00:00', '22:00:00', 0, 30000),
(22, '63874f64501e0.jpg', 'Bakso Urat Gatot Kaca', 'Jl. Babarsari', '08:00:00', '20:00:00', 0, 20000),
(23, '63875000a3d5c.jpg', 'Sate Kelinci Pekora', 'Jl. Malioboro', '12:00:00', '23:00:00', 0, 37000),
(24, '638750b792f93.jpg', 'Steak K Sumanto', 'Jl. kaliurang', '23:00:00', '02:00:00', 0, 95000),
(25, '6387518f6ed5c.jpg', 'Angkringan Desa Penari', 'Jl. Condongcatur', '08:00:00', '16:00:00', 0, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_pergi` date NOT NULL,
  `rating` float NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `judul`, `deskripsi`, `tanggal_pergi`, `rating`, `id_user`, `id_resto`) VALUES
(10, 'a', 'b', '2022-11-25', 3, 4, 9),
(14, 'pertama edited', 'wihih edited', '2022-11-06', 5, 7, 9),
(15, 'bebek goreng haji', 'b aja', '2022-11-25', 4, 5, 9),
(16, 'bebek', 'b aja', '2022-11-25', 4, 5, 9),
(17, 'a', 'b', '2022-11-25', 4, 5, 9),
(18, 'a', 'b', '2022-11-25', 4, 5, 9),
(19, 'a', 'a', '2022-11-25', 3, 5, 9),
(20, 'bebek', 'enakss', '2022-11-25', 4, 5, 8),
(25, 'bebek goreng haji', 'enak bgt gilss', '2022-11-24', 3, 5, 8),
(26, 'bebek goreng haji', 'b aja', '2022-11-25', 4, 5, 8),
(27, 'a', 'b', '2022-11-25', 4, 5, 8),
(28, 'bebek goreng haji', 'b aja', '2022-11-25', 4, 5, 8),
(30, 'bebek goreng haji', 'b', '2022-11-25', 1, 5, 8),
(31, 'bebek goreng haji', 'enakss', '2022-11-26', 5, 5, 9),
(34, 'a', 'a', '2022-11-30', 4, 10, 8),
(35, 'Pertama kali nyoba', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores quasi distinctio modi at odio veritatis inventore error libero obcaecati in ea labore accusamus doloribus, deleniti tempore quae illo quas incidunt sapient', '2022-12-01', 5, 10, 16),
(41, 'aaa', '    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus aperiam, hic dignissimos illo corporis doloribus sequi dolorum omnis accusantium ipsa neque voluptas nam ratione impedit, iste ad mollitia officiis porro perspiciatis inventore ex voluptates harum nihil. Optio, eum sequi magnam voluptate, error, quam eius ut omnis aliquid voluptatum doloribus? Totam aspernatur, ad maxime neque, eum nisi ipsum ratione dignissimos voluptate provident, commodi rerum pariatur quia necessitatibus optio dolore numquam ut dolorum quasi odit tenetur corporis! Ad facilis, laborum id fuga unde consequatur amet? Omnis maxime eum aut vel possimus? Numquam eligendi, quae, repellat rerum natus omnis debitis non fugit temporibus quod ex deserunt distinctio, fuga rem consectetur corporis blanditiis eveniet! Molestiae quos modi dignissimos repudiandae rerum quaerat in beatae quibusdam dolorem consequatur quo, libero, pariatur nobis? Dolor temporibus repudiandae inventore. Vero, id tempora? Dolores esse, facere explicabo laboriosam facilis quo sit in! Provident beatae, necessitatibus nihil dolore nemo praesentium incidunt.\r\n', '2022-12-01', 4, 10, 16),
(42, 'huek', 'cih', '2022-12-01', 1, 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_role`) VALUES
(4, 'zahra', '$2y$10$Vh5odBjVBsUIqvepfxVj6.cjU.KATnuvixCV/bH//kRTW4tkD7gde', 2),
(5, 'jojo', '$2y$10$i1gvAsIBXBQxT8lYXq/lMOFf5uK.0wRjl5qofi1zcXqwCRjoi/Uc6', 2),
(7, 'akuu', '$2y$10$Q/Hii8WjL23ilXzD.lAfFOQQeXmk0I3bYLpShcaE53MaulpvNqFl6', 2),
(8, 'akuuu', '$2y$10$CWaQqaixM2oz10nyt1Ecb.9ZZgveIN/2xGB7pgpNRkErcUviPbPxO', 2),
(10, 'admin123', '$2y$10$gIM1TnLr.4AvAEzynXMSheYo0oc0oVUmOt6ZccvtmMezg8ypAJZpa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_harga` (`harga`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `resto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
