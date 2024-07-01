-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Tem 2024, 09:44:43
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tevhidai`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `makale` text DEFAULT NULL,
  `spot` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `yazar_id` int(11) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `makale`, `spot`, `image`, `date`, `yazar_id`, `kategori`) VALUES
(1, 'İlk Blog Başlığı', 'Bu ilk blog yazısıdır. Proident id labore officia enim quis cupidatat. Nisi adipisicing ut amet et ipsum sunt commodo anim id quis. Adipisicing nulla est reprehenderit consectetur magna esse et sit dolor.', 'Bu ilk blog yazısıdır. Proident id labore officia enim quis cupidatat. Nisi adipisicing ut amet et ipsum sunt commodo anim id quis. Adipisicing nulla est reprehenderit consectetur magna esse et sit do', 'img_2.jpg', '2024-06-12', 1, '1,3'),
(2, 'İkinci Blog Başlığı', 'Bu ikinci blog yazısıdır.', 'Bu ikinci blog yazısıdır.', 'img_3.jpg', '2024-06-14', 2, '1'),
(3, 'Üçüncü Blog Başlığı', 'Bu üçüncü blog yazısıdır.', 'Bu üçüncü blog yazısıdır.', 'img_4.jpg', '2024-04-23', 1, '2,3'),
(4, 'Dördüncü Blog Başlığı', 'Bu dördüncü blog yazısıdır.', 'Bu dördüncü blog yazısıdır.', 'img_3.jpg', '2024-08-28', 3, '1,2'),
(5, 'Beşinci Blog Başlığı', 'Bu beşinci blog yazısıdır.', 'Bu beşinci blog yazısıdır.', 'img_7.jpg', '2024-06-14', 2, '3'),
(6, 'qaaaa waegt', '<p>deeeeneme</p><p>aetjsyr5jdy7k8r7lt</p><iframe class=\"ql-video\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://www.youtube.com/embed/FZS281BkMUo?si=MxBrV_r4Gx1AgVQI\" height=\"auto\" width=\"100%\" height=\"100%\"></iframe><p><br></p><p>drjytdkukyrtu</p><p>srtkıyltsk</p><p><img src=\"http://localhost/magdesign/./assets/uploads/vlcsnap-2024-04-22-16h19m34s205.png\"></p>', 'qdeneme aerhgetshzrs etrshzeszh', 'f7c8e2c547c07e89344c530785d0c6d9.png', '2024-06-24', 2, '1'),
(13, 'aweh3', '<p>ferwbat3enw4yj</p><p>hejatrsytkuely</p><p>wrzejtsrykut</p><h1>ewrghtheh</h1><p><img src=\"http://localhost/magdesign/./assets/uploads/Ekran_görüntüsü_2024-05-04_113902.png\"></p>', 'aw3hrt', '4c8455aa2220469f6495edc935c67d29.png', '2024-06-24', 1, '2, 3'),
(14, 'sryjsdj', '<p>srtjnydmn</p><p>srtnjrym</p><p>&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QWlMcarjYsY?si=uOnXoHaFYpWMyiGz\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen&gt;&lt;/iframe&gt;</p><p>aerhtbsr</p><p>hyy</p><p>dt</p><p>kufcy</p><p>ıltgo</p>', 'strehjtyd', '5feae360681ce615a008df8398688328.png', '2024-06-24', 1, '3'),
(16, 'Son deneme', '<p>Bu bir deneme yazısıdır.</p><iframe class=\"ql-video\" frameborder=\"0\" allowfullscreen=\"true\" src=\"https://www.youtube.com/embed/y_jQHo5Wcv4?si=R_aFGHnEQ5SvjYas\" height=\"315\" width=\"560\"></iframe><p><br></p><p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p><p>sadhwbrh</p><p>aesrh</p><p>z</p><p>ah</p><p><img src=\"http://localhost/magdesign/./assets/uploads/Ekran_görüntüsü_2024-04-22_121416.png\"></p>', '2spot yazısı', '18f13197ca2ae19a0af992267ec32a5e.png', '2024-06-24', 3, '1, 2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katagoriler`
--

CREATE TABLE `katagoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `katagoriler`
--

INSERT INTO `katagoriler` (`kategori_id`, `kategori_name`) VALUES
(1, 'Business'),
(2, 'Travel'),
(3, 'Technology'),
(4, 'Dnemee'),
(5, 'Denme 2'),
(6, 'Lorem ipsun'),
(8, 'Başka?'),
(9, 'olmasaydı................');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE `yazarlar` (
  `yazar_id` int(11) NOT NULL,
  `isim` varchar(50) DEFAULT NULL,
  `yazar_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yazarlar`
--

INSERT INTO `yazarlar` (`yazar_id`, `isim`, `yazar_image`) VALUES
(1, 'Ahmet Kalmış', 'person_1.jpg'),
(2, 'Burak Sönmez', 'person_1.jpg'),
(3, 'Murat Demir', '303a2aa77b6faa2f0056924eebab8b61.png');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `katagoriler`
--
ALTER TABLE `katagoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`yazar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `katagoriler`
--
ALTER TABLE `katagoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `yazar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
