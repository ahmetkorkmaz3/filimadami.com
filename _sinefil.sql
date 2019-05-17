-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 May 2019, 06:11:01
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinefil`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'ahmetkorkmaz3', 'php61+'),
(3, 'ahmetk', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `member_id` int(32) NOT NULL,
  `movie_id` int(32) NOT NULL,
  `major` int(32) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`comment_id`, `member_id`, `movie_id`, `major`, `comment`) VALUES
(1, 1, 1, 0, 'deneme'),
(2, 1, 1, 0, ''),
(3, 1, 1, 0, ''),
(4, 1, 1, 0, 'ahmet'),
(5, 1, 1, 2, 'deneme'),
(6, 1, 1, 4, 'deneme'),
(7, 1, 1, 2, 'deneme'),
(8, 12, 3, 0, 'ahmet\r\n'),
(9, 12, 3, 8, 'deneme'),
(10, 12, 1, 1, 'asdkjaf'),
(11, 12, 2, 0, 'deneme\r\n'),
(12, 1, 3, 8, 'ahmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Türkiye'),
(2, 'ABD'),
(3, 'Fransa'),
(4, 'İtalya');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `liked`
--

CREATE TABLE `liked` (
  `begeni_id` int(11) NOT NULL,
  `member_id` int(32) NOT NULL,
  `movie_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `liked`
--

INSERT INTO `liked` (`begeni_id`, `member_id`, `movie_id`) VALUES
(3, 1, 2),
(4, 1, 3),
(5, 12, 1),
(6, 12, 2),
(8, 12, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(50) NOT NULL,
  `list_image` varchar(50) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `lists`
--

INSERT INTO `lists` (`id`, `list_name`, `list_image`) VALUES
(1, 'IMDB Top 250', 'godfather.jpg'),
(2, 'Empire 500', 'default.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `kAdi` varchar(50) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `ePosta` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `user_image` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`id`, `kAdi`, `ad`, `soyad`, `ePosta`, `sifre`, `user_image`) VALUES
(1, 'ahmetk', 'ahmet', 'korkmaz', 'muratahmetkorkmaz@hotmail.com', '123', 'default.png'),
(3, 'yunus', 'yunus', 'yarba', 'yunusas7@gmail.com', '123', 'default.png'),
(5, 'orcuntuna', 'Orçun', 'Tuna', 'orcuntuna@hotmail.com', '123', 'default.png'),
(6, '8', 'oasdlkfa', 'lsakdfa', 'ahmetkorkmaz3453@gmail.com', '123', 'default.png'),
(7, 'mfcokek', 'furkan', 'çökek', 'mfcokek@gmail.com', '123', 'default.png'),
(8, 'enderimen', 'Ender', 'İmen', 'enderimen@gmail.com', '123', 'default.png'),
(9, 'deneme1222', 'deneme', 'deneme', 'denem@gmail.com', '123', 'default.png'),
(10, 'enderimen2', 'Ender', 'İmen', 'deneme@gmail.com', '123', 'default.png'),
(11, 'isilaybozkurt', 'ışılay', 'Bozkurt', 'isilay@gmail.com', '123456', 'default.png'),
(12, 'salagöz', 'sedat', 'alagöz', 'sedat@hotmail.com', '123', 'default.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `member_list`
--

CREATE TABLE `member_list` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `watched_movie` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `member_list`
--

INSERT INTO `member_list` (`id`, `member_id`, `movie_id`, `watched_movie`) VALUES
(31, 1, 2, 0),
(33, 1, 3, 0),
(34, 10, 1, 0),
(35, 10, 2, 1),
(36, 11, 1, 1),
(37, 12, 2, 0),
(38, 12, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(4) NOT NULL,
  `vision_date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `scriptwriter` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `movie_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `movies`
--

INSERT INTO `movies` (`id`, `name`, `date`, `vision_date`, `time`, `type`, `country`, `scriptwriter`, `director`, `subject`, `movie_image`) VALUES
(1, 'Leon', '1994', '1995-04-28', '2 saat', '1,2,4', '2', 'Luc Besson', 'Luc Besson', '\r\nKusursuz bir katil. Masum bir kız. Birbirlerinden başka kaybedecek hiçbir şeyleri kalmamış. Erkek sessizce hareket ediyor. Duygusuzca öldürüyor. İz bırakmadan yok oluyor. Zayıf noktasını ise sadece... 12 yaşındaki bir kız biliyor. 12 yaşında New York\'ta yaşayan bir kız olan Mathilda üvey ailesinin yanında sevimsiz bir yaşamı paylaşmaktadır. Babası, iki taraflı oynayan bozulmuş polis Norman Stansfield için uyuşturucuları saklamaktadır. Mathilda\'yı kaçıp gitmekten tek alıkoyan küçük erkek kardeşidir. Bir gün, Stansfield ve adamları sudan bir sebepten, tüm ailesini katlettikleri zaman, o sırada alışverişte olan Mathilda şans eseri hayatta kalır ve en çok ihtiyacı olduğu sırada Leon\'un dairesine saklanarak kendini kurtarır. 12 yaşındaki kız, kısa süre içinde Leon\'un sıradışı mesleğini keşfedecek ve küçük kardeşinin intikamını almak için bu profesyonel katilden yardım isteyecektir. Babalık yapmak işlerinde ve arkadaşlıkta olabildiğine deneyimsiz olan Leon Mathilda\'yı beladan uzak tutmak için ümitsizce çabalar. Sonunda bir katil, bozulmuş bir polis ve masum küçük kızın ekseninde dönen hikaye doruğa çıkarak yönetmen Luc Besson\'un en iyi filmlerinden birinin öyküsünü oluşturur.', 'leon.jpg'),
(2, 'Esaretin Bedeli', '1994', '1995-05-10', '2 saat', '4,3,6', '3', 'Stephan King', 'Frank Drabot', 'Genç ve başarılı bir banker olan Andy Dufresne, karısını ve onun sevgilisini öldürmek suçundan ömür boyu hapse mahkum edilir ve Shawshank hapishanesine gönderilir. İşkence, tecavüz, dayak dahil her türlü kötü koşulun hüküm sürdüğü hapishane koşullarında, Andy\'nin hayata bağlı ve her daim iyi bir şeyler bulma çabası içindeki hali, çevresindeki herkesi çok etkileyecektir.', 'Esaretin-Bedeli.jpg'),
(3, 'Organize İşler 2', '2019', '2019-03-03', '2', '5,1,2', '1', 'Yılmaz Erdoğan', 'Yılmaz Erdoğan', 'İstanbul şehrinde Organize İşler tam gaz devam etmektedir. Sazanlar yem peşinde, oltalar Asım Noyan ve ekibinin elinde, daha büyük balıklar ise bu ekibin peşindedir. Dönen dolaplar içinde saflar, temizler, kirliler iç içedir. Ve bu sefer darbe hiç beklenmedik yerden gelir: Asımın biricik kızı Nazlı dolandırılır. Dolandırıcılar kralının kızı dolandırılır ise ne olur? Nazlı babasını organize işlerden caydırmak isterken, kendisi mi sazan sarmalına takılmıştır? Gerçeğin tipi bozuk olduğunda, insanlara yakışıklı yalanlar mı lazım olur?', 'sazan-sarmali.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `movie_type`
--

CREATE TABLE `movie_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `movie_type`
--

INSERT INTO `movie_type` (`type_id`, `type_name`) VALUES
(1, 'Aksiyon'),
(2, 'Komedi'),
(3, 'Macera'),
(4, 'Dram'),
(5, 'Bilim Kurgu'),
(6, 'Savaş'),
(7, 'Sanatsal'),
(8, 'Tarih'),
(9, 'Korku'),
(10, 'Biyografi'),
(11, 'Fantastik'),
(12, 'Gerilim'),
(13, 'Aile'),
(14, 'Polisiye'),
(15, 'Gizem');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `member_id` int(32) NOT NULL,
  `movie_id` int(32) NOT NULL,
  `answer` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `survey`
--

INSERT INTO `survey` (`survey_id`, `member_id`, `movie_id`, `answer`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 0),
(3, 1, 3, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Tablo için indeksler `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`begeni_id`);

--
-- Tablo için indeksler `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `movie_type`
--
ALTER TABLE `movie_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Tablo için indeksler `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `liked`
--
ALTER TABLE `liked`
  MODIFY `begeni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `member_list`
--
ALTER TABLE `member_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `movie_type`
--
ALTER TABLE `movie_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
