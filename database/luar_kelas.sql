-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 05:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luar_kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(223) NOT NULL,
  `password` varchar(223) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `forums_jawaban`
--

CREATE TABLE `forums_jawaban` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `dijawab_oleh` int(11) NOT NULL,
  `isi_jawaban` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums_jawaban`
--

INSERT INTO `forums_jawaban` (`id`, `post_id`, `dijawab_oleh`, `isi_jawaban`, `tanggal`) VALUES
(68, 135, 44, 'Ini channel yang cocok untuk belajar front-end ,,, Web programming unpas, Sekolah Koding, kawan koding', '2021-12-07 11:11:20'),
(69, 136, 45, 'Ada Lovelace ,Marie Curie,Rosalind Franklin,Jane Goodall', '2021-12-07 11:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `forums_kategori`
--

CREATE TABLE `forums_kategori` (
  `id` int(11) NOT NULL,
  `kategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums_kategori`
--

INSERT INTO `forums_kategori` (`id`, `kategory_name`) VALUES
(12, 'Teknik Informatika'),
(13, 'Bahasa Daerah'),
(14, 'Bahasa Indonesia'),
(15, 'Bahasa Inggris'),
(16, 'Bahasa Jepang'),
(17, 'Bahasa Arab'),
(18, 'Jaringan Komputer'),
(19, 'Matematika'),
(20, 'Web Development'),
(21, 'Design Grafis'),
(22, 'Akuntansi'),
(23, 'Otomotif'),
(24, 'Kebudayaan'),
(25, 'Kewarganegaraan'),
(26, 'Kewirausahaan'),
(27, 'Ilmu Sosial'),
(28, 'Keagamaan'),
(29, 'Psikologi');

-- --------------------------------------------------------

--
-- Table structure for table `forums_postingan`
--

CREATE TABLE `forums_postingan` (
  `id_post` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `isi` text NOT NULL,
  `tag` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums_postingan`
--

INSERT INTO `forums_postingan` (`id_post`, `author`, `gambar`, `isi`, `tag`, `date`, `poin`) VALUES
(135, 46, '', 'Ada yang tau channel youtube yg bagus buat belajar Front-end Development ga?', 'Web Development', '2021-12-07 10:28:01', 10),
(136, 46, '', 'Ilmuwan wanita asal inggris yang menekuni ilmu matematika dan komputer adalah...', 'Matematika', '2021-12-07 11:15:25', 45);

-- --------------------------------------------------------

--
-- Table structure for table `roadmap`
--

CREATE TABLE `roadmap` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `file` varchar(223) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_download` int(11) NOT NULL,
  `kategori` varchar(80) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roadmap`
--

INSERT INTO `roadmap` (`id`, `judul`, `file`, `deskripsi`, `jumlah_download`, `kategori`, `img`) VALUES
(60, 'Front-end Development', 'roadmap-Web-Development-54e2915f2639f6b7284000e600b48b25.pdf', 'Jika kamu suka mendesain sesuatu dan memiliki imajinasi yang tinggi, maka kami merekomendasikan jalur pembelajaran Front-end dalam mempelajari Web Development.\r\nDikarenakan dijalur Front-end kamu akan belajar tentang cara membuat tampilan sebuah website, mengatur tata letak konten, dan banyak hal tentang tampilan suatu website.<br>\r\nKamu dapat mempelajari semua yang ada dalam mind map disini;<br>\r\n#Pengetahuan Dasar Internet dan Sistem Operasi<br>\r\nhttps://bit.ly/3o2VCml\r\n<br>\r\n#HTML <br>\r\nhttps://bit.ly/3FQXjcA\r\n<br>\r\n#CSS <br>\r\n- CSS Layouting<br>\r\nhttps://bit.ly/3DWlA0d\r\n<br>\r\n- CSS Dasar <br>\r\nhttps://bit.ly/3nUZndt\r\n<br>\r\n- CSS Grid <br>\r\nhttps://bit.ly/3le5AiC\r\n<br>\r\n- CSS3<br>\r\nhttps://bit.ly/3xtmUp2\r\n<br>\r\n- Flexbox CSS<br>\r\nhttps://bit.ly/3E3kY9e\r\n<br>\r\n- Responsive dan Media Queries<br>\r\nhttps://bit.ly/315y2w9\r\n<br>\r\n#CSS/UI Framework<br>\r\n- CSS Framework Bootstaps<br>\r\nhttps://bit.ly/3FTatpw\r\n<br>\r\n- Praktek membuat website menggunakan framework CSS<br>\r\nhttps://bit.ly/3G6lHaj\r\n<br>\r\n#GIT dan GitHub<br>\r\nhttps://bit.ly/3HOYUBg\r\n<br>\r\n#JavaScript<br>\r\n- JavaScript Dasar<br>\r\nhttps://bit.ly/3CWFjf1\r\n<br>\r\n- JavaScript dan DOM<br>\r\nhttps://bit.ly/3lbbC3N\r\n<br>\r\n- JavaScript Lanjutan<br>\r\nhttps://bit.ly/3r7hcrE\r\n<br>\r\n- Fetch API<br>\r\nhttps://bit.ly/3lbPHsW\r\n<br>\r\n- JS Framework JQuery n Vue<br>\r\nhttps://bit.ly/3HSD1B8\r\n<br>\r\nhttps://bit.ly/3HWvXDr\r\n<br>\r\nSekian materi yang bisa anda pelajari berdasarkan Roadmaps kami<br> \r\nSelamat Berjuang dan Jangan Menyerah <br>\r\n~GAPAI MIMPIMU SEKARANG</br>', 1, 'Web Development', ''),
(61, 'Back-end Development', 'roadmap-Web-Development-491ae63ae2ab234e46a64ed6eb0720d7.pdf', 'Jika kamu suka memanagement suatu hal atau memiliki bakat dalam matematika/logika yang baik,maka kami merekomendasikan pembelajaran jalur Back-End dalam mempelajari Web Development.Karena Backend developer adalah seseorang yang bertanggung jawab untuk mengelola server website (server-side). Artinya, seorang backend developer perlu memastikan website bekerja dengan baik dalam kaitan pertukaran data dari browser ke server.<br>\r\nKamu dapat mempelajari semua hal yang ada didalam mind map dibawah ini;<br>\r\n#PENGETAHUAN DASAR INTERNET DAN SISTEM OPERASI<br>\r\n- INTERNET<br>\r\nhttps://bit.ly/3HYvVen\r\n<br>\r\n- Sistem Operasi<br>\r\nhttps://bit.ly/3CXb07K\r\n<br>\r\n#DASAR PENGETAHUAN FRONT-END<br>\r\n- HTML Dasar<br>\r\nhttps://bit.ly/32EFEq7\r\n<br>\r\n- CSS Dasar<br>\r\nhttps://bit.ly/32HUqMZ\r\n<br>\r\n- JavaScript Dasar<br>\r\nhttps://bit.ly/30XWEqZ\r\n<br>\r\n#BELAJAR BAHASA PEMOGRAMAN<br>\r\n- JavaScript<br>\r\nhttps://bit.ly/3l8HENN\r\n<br>\r\n- PHP<br>\r\nhttps://bit.ly/30YBWY4\r\n<br>\r\n- Java<br>\r\nhttps://bit.ly/3E02pTh\r\n<br>\r\n#PELAJARI FRAMEWORK<br>\r\n- Ruby Framework (Ruby on Rails) <br>\r\nhttps://bit.ly/3FOLl32\r\n<br>\r\n- Phyton Framework (Django) <br>\r\nhttps://bit.ly/3xqyh0R\r\n<br>\r\n- PHP Framework (Codeigniter) <br>\r\nhttps://bit.ly/3cTcQw4\r\n- Praktek membuat website dengan framework codeigniter<br>\r\nhttps://bit.ly/3rfK15m\r\n<br>\r\nhttps://bit.ly/3nYJhzw\r\n<br>\r\n#APA ITU GIT DAN GITHUB? <br>\r\nhttps://bit.ly/3DXhHrW\r\n<br>\r\n#BASIS DATA RASIONAL (MySql/MariaDb) <br>\r\nhttps://bit.ly/3xuFfBK\r\n<br>\r\n#BASIS DATA LAINNYA (Normalisasi Database) <br>\r\nhttps://youtu.be/WwmfBPuQAtg\r\n<br>\r\n#BASIS DATA NOSQL<br>\r\nhttps://bit.ly/3FJa0Ge\r\n<br>\r\n#PELAJARI API<br>\r\nhttps://bit.ly/3rd7K60\r\n<br>\r\n- Caching<br>\r\nhttps://bit.ly/3lyRitp\r\n<br>\r\n- Testing (dalam bhs. Inggris) <br>\r\nhttps://bit.ly/3cZPu7H\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG<br>', 0, 'Web Development', ''),
(62, 'Fullstack Development', 'roadmap-Web-Development-a0a8755f5f68b7543a14468badc5cb4e.pdf', 'Jika kamu ingin membangun suatu website tanpa campurtangan orang lain maka kami merekomendasikan jalur pembelajaran Full-stack dalam mempelajari Web development. \r\nKarena full stack developer adalah seseorang yang nyaman bekerja atau merangkap tugas sebagai back end dan front end developer.<br>\r\nKamu dapat mempelajari materi Front-end sekaligus Back-end dibawah ini;<br>\r\n@FRONT-END SESSION<br>\r\n#PENGETAHUAN DASAR INTERNET DAN SISTEM OPERASI<br>\r\n- INTERNET<br>\r\nhttps://bit.ly/3HYvVen\r\n<br>\r\n- Sistem Operasi<br>\r\nhttps://bit.ly/3CXb07K\r\n<br>\r\n#HTML <br>\r\nhttps://bit.ly/3FQXjcA\r\n<br>\r\n#CSS <br>\r\n- CSS Layouting<br>\r\nhttps://bit.ly/3DWlA0d\r\n<br>\r\n- CSS Dasar <br>\r\nhttps://bit.ly/3nUZndt\r\n<br>\r\n- CSS Grid <br>\r\nhttps://bit.ly/3le5AiC\r\n<br>\r\n- CSS3<br>\r\nhttps://bit.ly/3xtmUp2\r\n<br>\r\n- Flexbox CSS<br>\r\nhttps://bit.ly/3E3kY9e\r\n<br>\r\n- Responsive dan Media Queries<br>\r\nhttps://bit.ly/315y2w9\r\n<br>\r\n#CSS/UI FRAMEWORK<br>\r\n- CSS Framework Bootstaps<br>\r\nhttps://bit.ly/3FTatpw\r\n<br>\r\n- Praktek membuat website menggunakan framework CSS<br>\r\nhttps://bit.ly/3G6lHaj\r\n<br>\r\n#GIT dan GitHub<br>\r\nhttps://bit.ly/3HOYUBg\r\n<br>\r\n#JavaScript<br>\r\n- JavaScript Dasar<br>\r\nhttps://bit.ly/3CWFjf1\r\n<br>\r\n- JavaScript dan DOM<br>\r\nhttps://bit.ly/3lbbC3N\r\n<br>\r\n- JavaScript Lanjutan<br>\r\nhttps://bit.ly/3r7hcrE\r\n<br>\r\n- Fetch API<br>\r\nhttps://bit.ly/3lbPHsW\r\n<br>\r\n- JS Framework JQuery n Vue<br>\r\nhttps://bit.ly/3HSD1B8\r\n<br>\r\nhttps://bit.ly/3HWvXDr\r\n<br>\r\n@BACK-END SESSION<br>\r\n#DASAR PENGETAHUAN FRONT-END<br>\r\n- HTML Dasar<br>\r\nhttps://bit.ly/32EFEq7\r\n<br>\r\n- CSS Dasar<br>\r\nhttps://bit.ly/32HUqMZ\r\n<br>\r\n- JavaScript Dasar<br>\r\nhttps://bit.ly/30XWEqZ\r\n<br>\r\n#BELAJAR BAHASA PEMOGRAMAN<br>\r\n- JavaScript<br>\r\nhttps://bit.ly/3l8HENN\r\n<br>\r\n- PHP<br>\r\nhttps://bit.ly/30YBWY4\r\n<br>\r\n- Java<br>\r\nhttps://bit.ly/3E02pTh\r\n<br>\r\n#PELAJARI FRAMEWORK<br>\r\n- Ruby Framework (Ruby on Rails) <br>\r\nhttps://bit.ly/3FOLl32\r\n<br>\r\n- Phyton Framework (Django) <br>\r\nhttps://bit.ly/3xqyh0R\r\n<br>\r\n- PHP Framework (Codeigniter) <br>\r\nhttps://bit.ly/3cTcQw4\r\n- Praktek membuat website dengan framework codeigniter<br>\r\nhttps://bit.ly/3rfK15m\r\n<br>\r\nhttps://bit.ly/3nYJhzw\r\n<br>\r\n#APA ITU GIT DAN GITHUB? <br>\r\nhttps://bit.ly/3DXhHrW\r\n<br>\r\n#BASIS DATA RASIONAL (MySql/MariaDb) <br>\r\nhttps://bit.ly/3xuFfBK\r\n<br>\r\n#BASIS DATA LAINNYA (Normalisasi Database) <br>\r\nhttps://youtu.be/WwmfBPuQAtg\r\n<br>\r\n#BASIS DATA NOSQL<br>\r\nhttps://bit.ly/3FJa0Ge\r\n<br>\r\n#PELAJARI API<br>\r\nhttps://bit.ly/3rd7K60\r\n<br>\r\n- Caching<br>\r\nhttps://bit.ly/3lyRitp\r\n<br>\r\n- Testing (dalam bhs. Inggris) <br>\r\nhttps://bit.ly/3cZPu7H\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG<br>', 0, 'Web Development', ''),
(63, 'UI Design', 'roadmap-Desain-Grafis-39ccd7186f3e9fcb0e892b430dcb8600.pdf', 'User Interface (UI) adalah bagian dari User Experience (UX) yang berupa tampilan visual design sebuah sistem. Tampilan tersebut memungkinkan pengguna terhubung dan berinteraksi dengan suatu produk. Desain UI pada sebuah produk bertujuan untuk mempercantik tampilan produk. \r\nJika kamu ingin mendesain tampilan maka jalur pembelajaran ini cocok buat kamu yang lagi belajar UI/UX Design\r\nMateri yang dapat dipelajari dari mindmap adalah dibawah ini;<br>\r\n#PRINSIP UI DESIGN, WIREFRAMING, PROTOTYPING<br>\r\nhttps://bit.ly/3rxD6EP\r\n<br>\r\n#VECTOR n IKON (ADOBE ILLUSTRATOR) <br>\r\nhttps://bit.ly/3pfy1ya\r\n<br>\r\n#3D DESIGN (SPLINE) <br>\r\nhttps://bit.ly/31czuws\r\n<br>\r\n#FIGMA DESIGN Tutorial<br>\r\nhttps://bit.ly/3lcJz3V\r\n<br>\r\n#TOOLS UI/UX DESIGNER<br>\r\nhttps://bit.ly/3E4gnDC\r\n<br>\r\n#ATOMIC DESIGN<br>\r\nhttps://bit.ly/318uZDt\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG<br>', 0, 'Desain Grafis', ''),
(64, 'UX Design', 'roadmap-Desain-Grafis-e923d963053500c01820f7b47bdc213b.pdf', 'User Experience (UX) merupakan proses mendesain suatu produk melalui pendekatan pengguna.<br>UX dirancang untuk memberikan pengalaman yang menyenangkan saat menggunakan produk. <br>\r\nJika kamu ingin bisa mendesain tanpa membuat tampilan(UI) sendiri maka jalur pembelajaran ini cocok buat kamu yang lagi belajar UI/UX Design.<br>\r\nMateri yang dapat dipelajari berdasarkan mindmap dibawah ini;<br>\r\n#PRINSIP UI/UX DESIGN<br>\r\nhttps://bit.ly/3xAmQE0\r\n<br>\r\n#UX TOOLS<br>\r\nhttps://bit.ly/3lfsiqA\r\n<br>\r\n#UX RESEARCH<br>\r\nhttps://bit.ly/3D4Kae1\r\n<br>\r\n#DOKUMENTASI UX<br>\r\nhttps://bit.ly/3nY8j1A\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG</br>', 0, 'Desain Grafis', ''),
(65, 'Bahasa Inggris', 'roadmap-Bahasa-Asing-6a0dd00ecbadb4ab18b6b85d658e1269.pdf', 'Bahasa Inggris merupakan ilmu yang sudah dipelajari sejak kita mulai sekolah, bahasa inggris merupakan bahasa yang sangat bermanfaat dalam dunia pekerjaan, pengetahuan, teknologi dan banyak lagi\r\nJika kamu ingin belajar bahasa asing maka bahasa pertama yang harus kamu kuasai yaitu bahasa Inggris karena bila kamu sudah jago berbahasa inggris maka belajar bahasa asing lainnya pun akan semakin mudah. \r\nMateri yang dapat dipelajari berdasarkan mindmap dibawah ini;\r\n<br>\r\n#BENTUK KATA (TENSES) <br>\r\nhttps://bit.ly/3o01zA7\r\n<br>\r\n#MENDENGARKAN (LISTENING) \r\nhttps://bit.ly/3o2d3Df\r\n<br>\r\n#MEMBACA(READING) <br>\r\nhttps://bit.ly/32IFSN1\r\n<br>\r\n#WRITING(MENULIS) \r\nhttps://bit.ly/3ro12KJ\r\n#SPEAKING(BERBICARA) <br>\r\n- Pemula<br>\r\nhttps://bit.ly/3IdKFGD\r\n<br>\r\n- Menengah<br>\r\nhttps://bit.ly/3E2tXY7\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG<br>', 2, 'Bahasa Asing', ''),
(66, 'Bahasa Jepang', 'roadmap-Bahasa-Asing-5ea845d3df1dbbaadc3bc99d245ac1e0.pdf', 'Bahasa jepang merupakan bahasa yang tidak kalah penting dari bahasa Inggris Karena memiliki manfaat dalam bidang edukasi, pekerjaan/bisnis, dan mempermudah mendapat beasiswa. <br>\r\nMateri yang kamu dapat pelajari dari mindmap berikut ini;<br>\r\n#HURUF JEPANG<br>\r\n- HIRAGANA<br>\r\nhttps://bit.ly/3o3Pgmk\r\n<br>\r\n- KATAKANA<br>\r\nhttps://bit.ly/3nZXrQG\r\n<br>\r\n- KANJI<br>\r\nhttps://bit.ly/3xxl9a8\r\n<br>\r\n&bull; LIST KANJI N5 PDF<br>\r\nhttps://bit.ly/3rglz3J\r\n<br>\r\n&bull; LIST KANJI N4 PDF<br>\r\nhttps://bit.ly/2Zw6cbM\r\n<br>\r\n&bull; LIST KANJI N3 PDF<br>\r\nhttps://bit.ly/3xxtAlO\r\n<br>\r\n&bull; LIST KANJI N2 PDF<br>\r\nhttps://bit.ly/3cX1C9w\r\n<br>\r\n&bull; LIST KANJI N1 PDF<br>\r\nhttps://bit.ly/3FVuEmr\r\n<br>\r\n#POLA KALIMAT DALAM BHS. JEPANG<br>\r\nhttps://bit.ly/317Hyz7\r\n<br>\r\n#MENCARI TEMAN BERKOMUNIKASI<br>\r\n- Rekomendasi Aplikasi untuk Mendapat Teman Orang Jepang<br>\r\nhttps://bit.ly/3cXZDlG\r\n<br>\r\nSekain materi yang dapat dipelajari dari Roadmap kami<br>\r\nSelamat berjuang dan Jangan menyerah<br>\r\n~GAPAI MIMPIMU SEKARANG<br>', 3, 'Bahasa Asing', '');

-- --------------------------------------------------------

--
-- Table structure for table `roadmap_request`
--

CREATE TABLE `roadmap_request` (
  `id` int(11) NOT NULL,
  `permintaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roadmap_request`
--

INSERT INTO `roadmap_request` (`id`, `permintaan`) VALUES
(25, 'fullstak'),
(26, 'font'),
(27, 'da');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `avatar`, `point`) VALUES
(44, 'Dadan', 'dadan', 'fd68e8922a6705a916b19669fb356cce', '61aedb975ffa0-Dadan.jpg', 432),
(45, 'Mas Rafly', 'rafly_12', '2108ab3cd84d98e7e9947992ab572680', '61aedb9071a9a-Mas-Rafly.jpg', 5345),
(46, 'Ahmad Hidayat', 'ahid.yt', '5901c00852335057f77d5f94d24d1012', '61aedb5ee9dfd-Ahmad-Hidayat.jpg', 943);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_jawaban`
--
ALTER TABLE `forums_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_kategori`
--
ALTER TABLE `forums_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_postingan`
--
ALTER TABLE `forums_postingan`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `roadmap`
--
ALTER TABLE `roadmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roadmap_request`
--
ALTER TABLE `roadmap_request`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forums_jawaban`
--
ALTER TABLE `forums_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `forums_kategori`
--
ALTER TABLE `forums_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `forums_postingan`
--
ALTER TABLE `forums_postingan`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `roadmap`
--
ALTER TABLE `roadmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `roadmap_request`
--
ALTER TABLE `roadmap_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
