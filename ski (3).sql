-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2017 at 12:29 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ski`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `visi_title` varchar(50) NOT NULL,
  `vission` text NOT NULL,
  `misi_title` varchar(50) NOT NULL,
  `mission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `page`, `title`, `language`, `img_url`, `file_name`, `description`, `visi_title`, `vission`, `misi_title`, `mission`) VALUES
(1, 'About', 'TENTANG <span>KAMI</span>', 'id', '/assets/img/about/4cfde17764c19783f083ff9d13c2fcfd.jpg', '4cfde17764c19783f083ff9d13c2fcfd.jpg', '<p>PT. Sugawara Kadii Indonesia adalah perusahaan Joint Venture antara PT. Kadi Internationl dan Sugawar Industry Co, Ltd Kami didirikan di Indonesia untuk mengembangkan teknologi baru, terutama untuk pekerjaan konstruksi jalan, yaitu Recycling Asphalt. Teknologi Asphalt daur ulang telah diterapkan sejak lama oleh Sugawara Industry Co, Ltd di Jepang</p>', 'VISI', '<p>Untuk Berbagi kesadaran akan masalah lingkungan global, untuk melakukan usaha keras dalam segala aktivitas yang mungkin dilakukan secara internal atau eksternal untuk menerapkan pelestarian lingkungan</p>', 'MISI', '<p>Menjaga kualitas layanan yang diberikan kepada pelanggan dan peduli terhadap lingkungan</p>'),
(2, 'About', 'ABOUT <span>US</span>', 'en', '/assets/img/about/0ba82a03e6734d489d656b91d12cff96.jpg', '0ba82a03e6734d489d656b91d12cff96.jpg', '<p>PT. Sugawara Kadii Indonesia is a Joint Venture company between PT. Kadi International and Sugawara Industry Co., Ltd. We are established in Indonesia to developing new technology, especially for road construction work, namely Recycling Asphalt. Recycling Asphalt technology has been applied for a long time by Sugawara Industry Co.,Ltd in Japan</p>', 'VISION', '<p>To Share consciousness of global environmental issue, to make exertions in all possible activities internally or externally to implement environmental conservation</p>', 'MISSION', '<p>Maintain the quality of services provided to customers and care about the environment</p>');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `status` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img_url`, `file_name`, `status`) VALUES
(1, '/assets/img/banner/51bf96e0b9c001c56353df2f9355256e.jpg', '51bf96e0b9c001c56353df2f9355256e.jpg', 'Publish'),
(4, '/assets/img/banner/b6ca0c8335eb21e5436d638da3d2a658.jpg', 'b6ca0c8335eb21e5436d638da3d2a658.jpg', 'Publish'),
(5, '/assets/img/banner/8fba8e7932e874e9710a5554b5b7abc8.jpg', '8fba8e7932e874e9710a5554b5b7abc8.jpg', 'Publish'),
(6, '/assets/img/banner/d7642955469f3115301df2e24d7e1d1d.jpg', 'd7642955469f3115301df2e24d7e1d1d.jpg', 'Publish'),
(7, '/assets/img/banner/b5f65d5b872d498769cfc12d49ad0e04.JPG', 'b5f65d5b872d498769cfc12d49ad0e04.JPG', 'Publish'),
(8, '/assets/img/banner/4f798a810e201ba9f9f8eddf883ca061.jpg', '4f798a810e201ba9f9f8eddf883ca061.jpg', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `banner_page`
--

CREATE TABLE `banner_page` (
  `id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_page`
--

INSERT INTO `banner_page` (`id`, `page`, `img_url`, `file_name`) VALUES
(1, 'Bussines', '/assets/img/bannerpage/f3711f0ec9505fd62e5a683bd66ec40b.png', 'f3711f0ec9505fd62e5a683bd66ec40b.png'),
(2, 'Recycle', '/assets/img/bannerpage/88de7295b6f83282564952a1e61a0715.jpg', '88de7295b6f83282564952a1e61a0715.jpg'),
(3, 'About', '/assets/img/bannerpage/217044c45ed87331340d22204a814599.png', '217044c45ed87331340d22204a814599.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email_receiver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `address`, `phone`, `fax`, `email_receiver`) VALUES
(1, 'info@sugawarkadii.co.id', 'Jl. Raya Curug Kosambi Km 45, Cimahi Klari Karawang - Jawa Barat', '(0267) 864-2278', '(0267) 864-2702', 'angga@ui.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `description2` text NOT NULL,
  `description3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `description`, `description2`, `description3`) VALUES
(1, '<p>PT SUGAWARA KADII INDONESIA | Jl. Raya Curug Kosambi Km 45, Cimahi Klari Karawang - Jawa Barat | Telp 0267-8642278 | Fax 0267-8642702 | info@sugawarkadii.co.id</p>', '<p><a href="http://www.sugawarakogyo.co.jp" target="blank">www.sugawarakogyo.co.jp</a> | <a href="http://www.kadii.co.id" target="blank">www.kadii.co.id</a></p>', '<p>copyright (c) 2017 PT. Sugawara Kadii Indonesia</p>');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`) VALUES
(1, 'Ceremony'),
(2, 'Bussines'),
(3, 'Project in Indonesia'),
(5, 'Project in Japan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `queue` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `language`, `queue`) VALUES
(1, 'HOME', '', 'en', 1),
(2, 'ABOUT US', 'about', 'en', 2),
(3, 'RECYCLE', 'recycle', 'en', 3),
(4, 'BUSINESS', 'business', 'en', 4),
(5, 'GALLERY', 'gallery', 'en', 5),
(6, 'CONTACT', 'contact', 'en', 6),
(7, 'BERANDA', '', 'id', 7),
(8, 'TENTANG KAMI', 'about', 'id', 8),
(9, 'DAUR ULANG', 'recycle', 'id', 9),
(10, 'BISNIS', 'business', 'id', 10),
(11, 'GALLERY', 'gallery', 'id', 11),
(12, 'KONTAK', 'contact', 'id', 12);

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `number` varchar(3) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page`, `language`, `img_url`, `file_name`, `title`, `number`, `description`) VALUES
(4, 'recycle', 'en', '/assets/img/pagecontent/4a03d75a4c08a79b31809162c79363a1.png', '4a03d75a4c08a79b31809162c79363a1.png', 'PAVEMENT', '01', '<p>Jalan tersebut mendukung pengembangan sosioekonomi sebagai modal sosial paling mendasar. Kami akan berkontribusi untuk memperbaiki kehidupan kita. Diantaranya, "trotoar" permukaan jalan memberikan keamanan dan kenyamanan dalam perjalanan, pembentukan townscape dan perbaikan lingkungan hidup. Hal ini terkait erat dengan kehidupan warga. Di Jepang dengan Industri Sugawara tidak ada pilihan selain bergantung pada impor untuk sumber daya yang merupakan bahan baku hanya untuk negara kepulauan kecil. Karena itu, peneliti dari generasi sebelumnya telah fokus pada penggunaan kembali hal-hal yang ada.</p>'),
(5, 'recycle', 'id', '/assets/img/pagecontent/a4b833e7eb03e15d738e8c402436c16f.png', 'a4b833e7eb03e15d738e8c402436c16f.png', 'TROTOAR', '01', '<p>The road supports the development of the socioeconomy as the most fundamental social capital. We will contribute to improving our lives. Among them, "pavement" the surface of the road provides the safety and comfort of traveling, the formation of townscape and improvement of living environment. It is closely related to residents&rsquo; lives. In Japan with Sugawara Industry there is no choice but to depend on imports for resources that are the raw material for only small island countries. Therefore, the researchers of the previous generation have focused on reusing things that exist.</p>'),
(9, 'recycle', 'en', '/assets/img/pagecontent/c6c779365fd7bfcbfb0346f9cb6a4b9f.png', 'c6c779365fd7bfcbfb0346f9cb6a4b9f.png', 'CONTRIBUTION TO THE FORMATION OF A RECYCLING - ORIENTED SOCIETY', '02', '<p>From the global environmental problem of global warming to local environmental problems such as roadside noise, various environmental problems are now required also in the ?eld of paving. For that purpose, in Japan, we began recycling development for 40 years ago, and 98% of the entire pavement has now been processed by recycling. It is a result of contribution of the development of manufacturing technology and development of construction technology by both wheels, and above all, consciousness reform to prevent people from overloading the environment for people is very important</p>'),
(10, 'recycle', 'id', '/assets/img/pagecontent/083487c073fd380ef49d97d207b70e42.jpg', '083487c073fd380ef49d97d207b70e42.jpg', 'KONTRIBUSI TERHADAP PEMBENTUKAN DARI DAUR ULANG - ORIENTED MASYARAKAT', '02', '<p>Dari masalah lingkungan global pemanasan global terhadap masalah lingkungan setempat seperti kebisingan di pinggir jalan, berbagai masalah lingkungan kini dibutuhkan juga di bidang paving. Untuk tujuan itu, di Jepang, kami memulai pengembangan daur ulang selama 40 tahun yang lalu, dan 98% dari keseluruhan perkerasan kini telah diproses dengan daur ulang. Ini merupakan hasil kontribusi pengembangan teknologi manufaktur dan pengembangan teknologi konstruksi oleh kedua roda, dan yang terpenting, reformasi kesadaran untuk mencegah orang dari overloading lingkungan bagi masyarakat sangat penting.</p>'),
(11, 'recycle', 'en', '/assets/img/pagecontent/1b9a48f37b655ab49253d629d73c7af4.jpg', '1b9a48f37b655ab49253d629d73c7af4.jpg', 'RELATION BETWEEN  ENVIRONMENT AND <br> PAVEMENT', '03', '<p>Interest in the evnironment is rising, and even in paving, which is the most familiar existance as social capital, it is our responsibility to show clearly the relationship with the environment. Until now, attentions has been paid to newly built roads, but when problems of traffic congestion, overloading, rain and freezing occur chronically, maintenance will be forced. Although it is the universe\'s reason to break something, the use of the waste will also have a problem. At the present time when the spread of pavement is progressing, especially in urban areas.</p>'),
(12, 'recycle', 'id', '/assets/img/pagecontent/2c357ae64c3f9746f643c2db70e8aa3d.jpg', '2c357ae64c3f9746f643c2db70e8aa3d.jpg', 'HUBUNGAN ANTARA LINGKUNGAN DAN PENGAWASAN', '03', '<p>Minat di lingkungan semakin meningkat, dan bahkan di paving, yang merupakan modal yang paling umum dikenal sebagai modal sosial, adalah tanggung jawab kita untuk menunjukkan dengan jelas hubungan dengan lingkungan. Sampai saat ini, perhatian telah diberikan pada jalan yang baru dibangun, namun bila terjadi masalah kemacetan lalu lintas, kelebihan beban, hujan dan pembekuan terjadi secara kronis, perawatan akan dipaksakan. Meski merupakan alasan alam semesta untuk memecahkan sesuatu, penggunaan limbah juga akan menjadi masalah. Saat ini saat penyebaran trotoar berkembang, terutama di daerah perkotaan.</p>'),
(13, 'recycle', 'en', '/assets/img/pagecontent/15cf2979faa0b860a1550279a67558e4.png', '15cf2979faa0b860a1550279a67558e4.png', 'TYPE OF EACH PAVEMENT CONSIDERING JAPAN ENVIRONMENT', '04', '<p>Type of each pavement considering Japan\'s environment</p>\r\n<ul class="content-ul">\r\n<li>Production of heated asphalt mixture Temperature technology</li>\r\n<li>Tip seal</li>\r\n<li>Micro surfacing</li>\r\n<li>Plant recycling pavement method</li>\r\n<li>Road surface layer regeneration method</li>\r\n</ul>'),
(14, 'recycle', 'id', '/assets/img/pagecontent/54b233d0d423c30400b7d2ab59cb8425.jpg', '54b233d0d423c30400b7d2ab59cb8425.jpg', ' JENIS SETIAP PAVEMENT MEMPERHATIKAN <br> LINGKUNGAN  JEPANG', '04', '<p>Tipe masing-masing trotoar mempertimbangkan lingkungan Jepang</p>\r\n<ul>\r\n<li>Produksi campuran aspal dipanaskan Teknologi suhu</li>\r\n<li>Segel tip</li>\r\n<li>Permukaan mikro</li>\r\n<li>Metode daur ulang tanaman perkerasan</li>\r\n<li>Metode regenerasi lapisan permukaan jalan</li>\r\n</ul>'),
(15, 'business', 'en', '/assets/img/pagecontent/671a456d0b51a0f27c72fd00dc914dcb.jpg', '671a456d0b51a0f27c72fd00dc914dcb.jpg', 'OUR BUSINESS', '05', '<p>In Japan Asphalt Technology Daur has been applied almost in all sectors such as, the construction of ports, roads, rivers, and bridges. Asphalt material source is being reduced and there is no bene?t of asphalt in Indonesia we are developing Asphalt Daur technology in Indonesia. The height of the asphalt in the uneven road caused by piling up the asphalt for the unfavorable state. By using old materials in Recycle we will not increase the height of the road each will apply to the road.</p>'),
(16, 'business', 'id', '/assets/img/pagecontent/c886d8da943063b4422c7a42c13660dd.jpg', 'c886d8da943063b4422c7a42c13660dd.jpg', 'BISNIS KAMI', '05', '<p>Di Jepang Asphalt Technology Daur telah diterapkan hampir di semua sektor seperti, pembangunan pelabuhan, jalan, sungai, dan jembatan. Sumber bahan aspal sedang dikurangi dan tidak ada manfaat aspal di Indonesia kami mengembangkan teknologi Asphalt Daur di Indonesia. Ketinggian aspal di jalan yang tidak rata menyebabkan menumpuk aspal untuk keadaan yang tidak menguntungkan. Dengan menggunakan bahan lama di Recycle kita tidak akan menambah tinggi jalan masing-masing akan berlaku di jalan.</p>'),
(17, 'business', 'en', '/assets/img/pagecontent/7b1489de1fa3adb346c5c91697b9e037.png', '7b1489de1fa3adb346c5c91697b9e037.png', 'EFFECT RECYCLE ASPHALT', '06', '<p>Road improvements are done at any time, and result in increased road altitudes. The higher roads increase the load of the land. The most effective way to reduce the height of the road is by removing the asphalt layer and then closing again by the new asphalt.</p>\r\n<p>If we use conventional Asphalt to coat it we need a new aggregate and as we know, there is less aggregate availability in the wild today. Scrap waste from road dredging in Indonesia has not been utilized and the only way is to get rid of it and throw away any scrap requires no small cost.</p>\r\n<p>We are here to bring new technology that is Asphalt Recycling. We process waste Scrap asphalt into new asphalt that can be used again. In addition to saving the asphalt that will be used we can also keep nature green (Go Green. Since the asphalt shell is reused, the use natural resources is suppressed.</p>'),
(18, 'business', 'id', '/assets/img/pagecontent/9d18a7a9cbc7534a0ceaab2ef44c765e.png', '9d18a7a9cbc7534a0ceaab2ef44c765e.png', ' PENGARUH ASPEK RECYCLE', '06', '<p>Perbaikan jalan dilakukan setiap saat, dan menghasilkan peningkatan ketinggian jalan. Jalan yang lebih tinggi meningkatkan beban tanah. Cara yang paling efektif untuk mengurangi tinggi jalan adalah dengan cara melepas lapisan aspal dan kemudian menutup lagi dengan aspal baru.</p>\r\n<p>Jika kita menggunakan Asphalt konvensional untuk melapisinya, kita memerlukan agregat baru dan seperti kita ketahui, ada sedikit ketersediaan agregat di alam liar saat ini. Memo limbah dari pengerukan jalan di Indonesia belum dimanfaatkan dan satu-satunya cara untuk menyingkirkannya dan membuang sisa memo tidak perlu biaya sedikit pun.</p>\r\n<p>Kami hadir untuk menghadirkan teknologi baru yaitu Asphalt Recycling. Kami mengolah aspal limbah Scrap menjadi aspal baru yang bisa digunakan kembali. Selain menghemat aspal yang akan kita pakai kita juga bisa menjaga alam hijau (Go Green. Karena cangkang aspal digunakan kembali, penggunaan sumber daya alam ditekan.</p>'),
(19, 'business', 'en', '/assets/img/pagecontent/827c044a2bd7470f2b3dadfd7caefd69.png', '827c044a2bd7470f2b3dadfd7caefd69.png', 'BENEFIT USING RECYCLE ASPHALT', '07', '<p>Recyling is process to change to prevent waste of potentially useful materials, Reduce the consumption of fresh raw materials. Reduce energy usage, reduce air pollution by reducing the need for &ldquo;CONVENTIONAL&rdquo; waste disposal, and lower green house gas emissions as compared to straight asphalt production. Recycling is a key component of modern waste reduction and is the third component of the &ldquo;Reduce, Reuse, and Recycle&rdquo; waste hierarchy.</p>'),
(20, 'business', 'id', '/assets/img/pagecontent/879644c30421cc93e6ec85c391bc1d87.png', '879644c30421cc93e6ec85c391bc1d87.png', 'MANFAAT MENGGUNAKAN ASPEK RECYCLE', '07', '<p>Recyling adalah proses untuk mengubah untuk mencegah pemborosan bahan yang berpotensi bermanfaat, Mengurangi konsumsi bahan baku segar. Kurangi penggunaan energi, kurangi polusi udara dengan mengurangi kebutuhan akan pembuangan limbah "CONVENSIONAL", dan menurunkan emisi gas rumah kaca dibandingkan dengan produksi aspal lurus. Daur ulang adalah komponen kunci dari pengurangan limbah modern dan merupakan komponen ketiga dari hirarki sampah "Kurangi, Pakai Ulang, dan Daur Ulang".</p>'),
(21, 'business', 'en', '/assets/img/pagecontent/795b2b8db866bc9e068ebaf767067539.png', '795b2b8db866bc9e068ebaf767067539.png', 'OUR RECYCLING PROCESS', '08', '<p>Recyling is process to change to prevent waste of potentially useful materials, Reduce the consumption of fresh raw materials. Reduce energy usage, reduce air pollution by reducing the need for &ldquo;CONVENTIONAL&rdquo; waste disposal, and lower green house gas emissions as compared to straight asphalt production. Recycling is a key component of modern waste reduction and is the third component of the &ldquo;Reduce, Reuse, and Recycle&rdquo; waste hierarchy.</p>'),
(22, 'business', 'id', '/assets/img/pagecontent/c7d85636ce6553e3922777ce26ae4b05.png', 'c7d85636ce6553e3922777ce26ae4b05.png', ' PROSES RECYCLING KAMI', '08', '<p>Recyling adalah proses untuk mengubah untuk mencegah pemborosan bahan yang berpotensi bermanfaat, Mengurangi konsumsi bahan baku segar. Kurangi penggunaan energi, kurangi polusi udara dengan mengurangi kebutuhan akan pembuangan limbah "CONVENSIONAL", dan menurunkan emisi gas rumah kaca dibandingkan dengan produksi aspal lurus. Daur ulang adalah komponen kunci dari pengurangan limbah modern dan merupakan komponen ketiga dari hirarki sampah "Kurangi, Pakai Ulang, dan Daur Ulang".</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `name`, `password`) VALUES
(1, 'tahzan.la10@gmail.com', 'admin', 'Imam As ari', '97cd48a5a7e43ca25a99ff305f04500b25624263'),
(3, 'achwan@gmail.comm', 'achwan', 'Achwan Yusuf', 'ff462e2906025b82f83cbcbcb1eae56d2cd6058e'),
(4, 'taufik@gmail.com', 'taufik', 'Taufik', '2e331f16112789d43d5f9ae840ea6aee1172d0c4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_page`
--
ALTER TABLE `banner_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `banner_page`
--
ALTER TABLE `banner_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
