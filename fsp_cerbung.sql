-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 02:30 PM
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
-- Database: `fsp_cerbung`
--

-- --------------------------------------------------------

--
-- Table structure for table `cerita`
--

CREATE TABLE `cerita` (
  `idcerita` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `idusers_pembuat_awal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cerita`
--

INSERT INTO `cerita` (`idcerita`, `judul`, `idusers_pembuat_awal`) VALUES
(1, 'Cinta Untuk Bumi', '160721004'),
(2, 'Juminten Mencari Sahabat', '160721022'),
(3, 'Kumis Si Monyet Nakal', '160721023'),
(4, 'Petualangan Mencari Batu Peta', '160721023'),
(5, 'Semut yang Tak Dipercaya', '160721022'),
(6, 'Teka-Teki Misterius', '160721004'),
(7, 'Pesawat Kertas', '160721004'),
(8, 'Negeri Di Awan', '160721022');

-- --------------------------------------------------------

--
-- Table structure for table `paragraf`
--

CREATE TABLE `paragraf` (
  `idparagraf` int(11) NOT NULL,
  `idusers` varchar(40) NOT NULL,
  `idcerita` int(11) NOT NULL,
  `isi_paragraf` varchar(100) DEFAULT NULL,
  `tanggal_buat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paragraf`
--

INSERT INTO `paragraf` (`idparagraf`, `idusers`, `idcerita`, `isi_paragraf`, `tanggal_buat`) VALUES
(1, '160721004', 1, 'Din berlari kencang. Aku ceroboh! dalam hatinya. ', '2023-10-16 01:58:33'),
(2, '160721022', 2, 'Juminten sangat terkenal di sekolahnya karena merupakan salah satu siswi paling pandai.', '2023-10-16 02:02:31'),
(3, '160721022', 2, 'Pantas saja teman Juminten sangat banyak, tidak peduli laki-laki atau perempuan.', '2023-10-16 02:04:09'),
(4, '160721022', 2, 'Namun, Juminten tetap merasa kesepian karena sebenarnya ia memiliki sahabat lain yang sudah menemani', '2023-10-16 02:04:12'),
(5, '160721004', 2, 'yang sudah menemaninya sejak kecil.', '2023-10-16 02:06:04'),
(6, '160721023', 3, 'Kumis adalah seekor monyet yang hidup sebatang kara. ', '2023-10-16 02:07:25'),
(7, '160721004', 3, 'Kehidupannya sangat menyedihkan, tetapi hal ini disebabkan oleh kelakukan si Kumis sendiri.', '2023-10-16 02:08:14'),
(8, '160721004', 3, 'Kumis selalu mengganggu teman-temannya dengan cara merebut makanan dan melempari batu.', '2023-10-16 02:08:28'),
(9, '160721023', 1, 'Ia terus berlari sekencang-kencangnya membawa dag dig dug di dadanya.', '2023-10-16 02:09:39'),
(10, '160721023', 1, 'Batas Desanya mulai tampak, pertanda jarak tak jauh lagi.', '2023-10-16 02:10:10'),
(11, '160721023', 4, 'Suatu hari, sebuah keluarga kecil tinggal di dalam hutan.', '2023-10-16 02:11:17'),
(12, '160721022', 4, 'Keluarga kecil itu terdiri dari seorang ayah dan 2 anak laki-lakinya yang masih kecil.', '2023-10-16 02:20:54'),
(13, '160721022', 5, 'Pada suatu hari seekor semut menemukan sepotong besar roti manis yang tertinggal di atas bangku tama', '2024-01-01 13:47:30'),
(14, '160721004', 6, 'Masih pagi namun sudah ada seorang kurir berteriak memanggil di depan rumah. Aneh padahal tidak ada ', '2024-01-05 14:30:07'),
(15, '160721004', 7, 'Roby senang sekali membuat origami salah satunya pesawat kertas. Ayahnya yang mengajari membuatnya.', '2024-01-05 14:32:28'),
(16, '160721022', 8, 'Pagi-pagi Lyn bergegas menemui sahabat pena-nya yang belum pernah ia temui. Ia bersemangat hingga lu', '2024-01-06 08:28:47'),
(17, '160721022', 8, 'Ia bersemangat hingga lupa berpamitan dengan ayah ibunya.', '2024-01-07 06:07:03'),
(18, '160721022', 8, 'Ia bersemangat hingga lupa berpamitan dengan ayah ibunya.', '2024-01-07 06:07:08'),
(19, '160721022', 8, 'Di perjalanan menuju lokasi ia melihat banyak hal yang belum pernah ia temui.', '2024-01-07 06:08:08'),
(20, '160721022', 8, 'Namun sesampainya di sana, ia tidak melihat seorang pun di sana.', '2024-01-07 06:09:02'),
(21, '160721022', 7, 'Hingga kini dewasa, ia baru menyadari filosofi sebuah pesawat kertas.', '2024-01-07 06:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` varchar(40) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `nama`, `password`, `salt`) VALUES
('160721000', 'Bisa Yuk', '2ef9f63fbe10e9fe19009cdd0a1ea2ae38a09fa6', '999d365aa5'),
('160721004', 'Fenny Cahyawati', '0c2b7db28abd1404caa3a3438f748c3ffea14980', '1b2c629d90'),
('160721022', 'Fransisca Priscillia Tanuwijaya', '6fb91a96416ea2a3307295eaa370adab31507cad', '59e2f4d051'),
('160721023', 'Christin Gunawan', 'e87010072aff37509f0ad1ee78dca7cf34381014', '7f1c3b419f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cerita`
--
ALTER TABLE `cerita`
  ADD PRIMARY KEY (`idcerita`),
  ADD KEY `fk_cerita_users_idx` (`idusers_pembuat_awal`);

--
-- Indexes for table `paragraf`
--
ALTER TABLE `paragraf`
  ADD PRIMARY KEY (`idparagraf`),
  ADD KEY `fk_paragraf_users1_idx` (`idusers`),
  ADD KEY `fk_paragraf_cerita1_idx` (`idcerita`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cerita`
--
ALTER TABLE `cerita`
  MODIFY `idcerita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paragraf`
--
ALTER TABLE `paragraf`
  MODIFY `idparagraf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cerita`
--
ALTER TABLE `cerita`
  ADD CONSTRAINT `fk_cerita_users` FOREIGN KEY (`idusers_pembuat_awal`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paragraf`
--
ALTER TABLE `paragraf`
  ADD CONSTRAINT `fk_paragraf_cerita1` FOREIGN KEY (`idcerita`) REFERENCES `cerita` (`idcerita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paragraf_users1` FOREIGN KEY (`idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
