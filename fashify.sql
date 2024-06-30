-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jún 29. 13:17
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fashify`
--
CREATE DATABASE IF NOT EXISTS `fashify` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `fashify`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(50) NOT NULL,
  `jelszo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nev` varchar(100) NOT NULL,
  `telefonszam` varchar(20) NOT NULL,
  `lakcim` varchar(200) NOT NULL,
  `admine` tinyint(1) NOT NULL,
  `profilkep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `felhasznalonev`, `jelszo`, `email`, `nev`, `telefonszam`, `lakcim`, `admine`, `profilkep`) VALUES
(1, 'ruben', 'ruben', 'bodoruben99@gmail.com', 'Bodó Ruben', '06306682833', '6726, Szeged Magdolna utca 21/b', 1, 'profkep_1.png'),
(2, 'admin', 'admin', 'admin@gmail.com', 'Nagy Admin', '06307726627', 'Admin utca 12', 1, 'profkep_2.png'),
(6, 'fhadg', 'asdasdasd', 'asdsdfas@gmail.com', 'asgasgd ag as g', '06201251231', 'fasdfasdfaa', 0, 'profkep_4.png'),
(7, 'jozsika2', 'KisNagy23', 'jozsika23@gmail.com', 'Kiss József', '06304288337', 'Szeged Nagy utca 32.', 0, 'profkep_5.png'),
(8, 'erno22', 'ernonememo22', 'emonemerno22@gmail.com', 'Nyilas Ernő', '06306661336', 'Kecskemét Páncél utca 211', 0, 'profkep_6.png'),
(9, 'faunni12', 'funnyfanni21', 'fannih3h3@gmail.com', 'Pataki Fanni', '06504482771', 'Budapest Közönbös út 3.', 0, 'profkep_7.png'),
(10, 'csope33', 'vizsimizsi1', 'kissmargit@gmail.com', 'Kiss Margit', '06204687227', 'Sándorfalva III. dűlő 3233', 0, 'profkep_8.png'),
(11, 'sanying', 'xsandorx', 'sandorjozsef@gmail.com', 'Tóth Sándor', '06302367289', 'Szeged Kocsis utca 45.', 0, 'profkep_9.png'),
(12, 'levilol', '33lololol33', 'levike20@gmial.com', 'Jáspár Levente', '06204487267', 'Szeged, Fő fasor 55/a', 0, 'profkep_10.png'),
(13, 'melinda', 'melcsi123', 'szmelinda@gmail.com', 'Szabados Melinda', '06303334877', 'Szeged Melinda utca 19', 0, 'profkep_11.png'),
(14, 'vanimani', 'jelszo123', 'vanesszy@gmail.com', 'Nógrádi Vanessza', '06309843773', 'Szeged Jobb fasor 93/b', 0, 'profkep_12.png'),
(17, 'asdasd123', 'asdasd123', 'asdasd123@gmail.com', 'asd123', '063034563312', 'valami 123', 1, 'green_4.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kategoria_id` int(11) NOT NULL,
  `kategoria_nev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`kategoria_id`, `kategoria_nev`) VALUES
(1, 'Kabát'),
(2, 'Rövidujjú pólo'),
(3, 'Cipő'),
(5, 'Szoknya'),
(6, 'Sapka'),
(7, 'Farmer'),
(8, 'Ing'),
(9, 'Rövidnadrág'),
(10, 'asd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `rendeles_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kosar`
--

INSERT INTO `kosar` (`rendeles_id`, `termek_id`, `felhasznalo_id`, `mennyiseg`, `datum`) VALUES
(1, 13, 3, 1, '2024-06-28 09:47:39'),
(2, 17, 3, 3, '2024-06-28 09:47:48'),
(3, 35, 15, 2, '2024-06-29 10:39:04'),
(4, 2, 15, 3, '2024-06-29 10:39:07'),
(5, 3, 16, 2, '2024-06-29 10:50:11'),
(6, 27, 16, 1, '2024-06-29 10:50:04'),
(7, 35, 17, 1, '2024-06-29 11:05:11'),
(8, 21, 17, 2, '2024-06-29 11:05:26'),
(9, 20, 17, 1, '2024-06-29 11:05:19'),
(10, 15, 6, 1, '2024-06-29 11:09:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `markak`
--

CREATE TABLE `markak` (
  `marka_id` int(11) NOT NULL,
  `marka_nev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `markak`
--

INSERT INTO `markak` (`marka_id`, `marka_nev`) VALUES
(1, 'Sadida'),
(2, 'Ekin'),
(3, 'Amup'),
(4, 'Skralc'),
(5, 'Pag'),
(6, 'Kobeer'),
(7, 'Araz'),
(8, 'Odeeps'),
(9, 'Scorc'),
(11, 'Ismeretlen'),
(12, 'dddddddddd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termek_id` int(11) NOT NULL,
  `termek_nev` varchar(100) NOT NULL,
  `termek_leiras` varchar(255) NOT NULL,
  `termek_kulcsszo` varchar(100) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `marka_id` int(11) NOT NULL,
  `termek_kep` varchar(255) NOT NULL,
  `termek_ar` varchar(100) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `elerhetoseg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termek_id`, `termek_nev`, `termek_leiras`, `termek_kulcsszo`, `kategoria_id`, `marka_id`, `termek_kep`, `termek_ar`, `felhasznalo_id`, `elerhetoseg`) VALUES
(1, 'Adidas Run 60S 3.0 HP2257 cipő kék', 'cipő', 'cipő, kék, run, adidas, férfi', 3, 1, 'adidas_1.png', '30000', 0, 1),
(2, 'Adidas Terrex Eastrail Gtx ID7847 cipő fekete', 'cipő', 'adidas, cipő, fekete, férfi', 3, 1, 'adidas_2.png', '42000', 0, 1),
(3, 'Adidas GSG-9.3 U GZ6114 cipő bézs', 'cipő', 'cipő, adidas, bézs, bakancs, férfi', 3, 1, 'adidas_3.png', '46000', 0, 1),
(4, 'Adidas Originals Ny 90 HQ5841 cipő fehér', 'cipő', 'adidas, cipő, fehér, original, férfi', 3, 1, 'adidas_4.png', '36000', 0, 1),
(5, 'Adidas Gazelle Indoor H06260 cipő kék', 'cipő', 'adidas, cipő, kék, férfi', 3, 1, 'adidas_5.png', '56000', 0, 1),
(6, 'Adidas Postmove Se W IG3796 cipő fehér', 'cipő', 'adidas, cipő, fehér, női', 3, 1, 'adidas_6.png', '40000', 0, 1),
(7, 'Adidas Racer Tr23 K IF0148 cipő fekete', 'cipő', 'adidas, cipő, női, fekete', 3, 1, 'adidas_7.png', '32000', 0, 1),
(8, 'Adidas Postmove Se W IG3795 cipő fehér', 'cipő', 'adidas, cipő, fehér, női', 3, 1, 'adidas_8.png', '41000', 0, 1),
(9, 'Adidas Bravada 2.0 Platform W IE2305 cipő rózsaszín', 'cipő', 'adidas, rózsaszín, női, cipő', 3, 1, 'adidas_9.png', '38000', 0, 1),
(10, 'Adidas Adilette Comfort W IG1270 flip-flop kék', 'cipő', 'cipő, papucs, adidas, női, kék', 3, 1, 'adidas_10.png', '22000', 0, 1),
(11, 'Nike Air Force 1 Shadow DZ1847-102 cipő fehér', 'cipő', 'nike, cipő, női, fehér', 3, 2, 'nike_1.png', '62000', 0, 1),
(12, 'Nike Victori One Slide W CZ7836 100 papucs', 'cipő', 'cipő, papucs, női, fehér, nike', 3, 2, 'nike_2.png', '20000', 0, 1),
(13, 'Nike Victori One Slide CN9676-700 flip-flop fekete', 'cipő', 'cipő, nike, papucs, női, fekete', 3, 2, 'nike_3.png', '18000', 0, 1),
(14, 'Nike Air Force 1 LV8 1 (GS) W DD3227-001 cipő szürke', 'cipő', 'cipő, szürke, nike, női', 3, 2, 'nike_4.png', '58000', 0, 1),
(15, 'Nike Air Max Furyosa DH0531-101 cipő bézs', 'cipő', 'cipő, nike, bézs, női', 3, 2, 'nike_5.png', '80000', 0, 1),
(16, 'Nike Victori One CN9675 400 flip-flop kék', 'cipő', 'cipő, kék, papucs, nike, férfi', 3, 2, 'nike_6.png', '18000', 0, 1),
(17, 'Nike Air Zoom M DX1165 100 cipő fehér', 'cipő', 'cipő, nike, férfi, fehér, piros', 3, 2, 'nike_7.png', '60000', 0, 1),
(18, 'Nike Court Vision Mid DN3577-002 cipő szürke', 'cipő', 'cipő, férfi, nike, szürke', 3, 2, 'nike_8.png', '41000', 0, 1),
(19, 'Nike Air Jordan Legacy 312 M FV3625-181 cipő fehér', 'cipő', 'cipő, nike, férfi, fehér', 3, 2, 'nike_9.png', '69000', 0, 1),
(21, 'Puma Club M 381111 02 cipő fekete', 'cipő', 'cipő, férfi, fekete, puma', 3, 3, 'puma_1.png', '32000', 0, 1),
(22, 'Puma Court Classic cipő 395018 02 fekete', 'cipő', 'cipő, fekete, férfi, puma', 3, 3, 'puma_2.png', '32000', 0, 1),
(23, 'Puma Bmw Mms Rdg cipő 307306 01 fekete', 'cipő', 'cipő, férfi, puma, fekete', 3, 3, 'puma_3.png', '40000', 0, 1),
(24, 'Puma X-Ray W cipő 384639 47 sokszínű', 'cipő', 'cipő, női, puma, fehér, rózsaszín', 3, 3, 'puma_4.png', '30000', 0, 1),
(25, 'Puma Cool Cat 2.0 papucs 395395 01 aranysárga', 'cipő', 'cipő, puma, aranysárga, papucs, női', 3, 3, 'puma_5.png', '15000', 0, 1),
(26, 'Puma Mayze Thrited W cipő 389861-02 fehér', 'cipő', 'cipő, puma, női, fehér', 3, 3, 'puma_6.png', '39000', 0, 1),
(27, 'Mintás póló', 'M-es póló', 'póló, M, közepes', 2, 11, 'top_1.png', '1500', 1, 1),
(28, 'Fekete mintás póló', 'XL-es póló', 'XL, póló, használt, fekete', 2, 11, 'top_2.png', '2000', 3, 1),
(29, 'Csíkos póló', 'L-es póló', 'póló, férfi, csíkos, fekete, fehér, L', 2, 11, 'top_3.png', '1500', 4, 1),
(30, 'Kék póló', 'XXL-es póló', 'póló, férfi, XXL, kék', 2, 11, 'top_4.png', '800', 5, 1),
(31, 'Pöttyös szoknya', 'szoknya', 'szoknya, pöttyös, fekete, fehér', 4, 7, 'skirt_1.png', '3500', 6, 1),
(32, 'Csíkos szoknya', 'szoknya', 'szoknya, női, csíkos', 4, 11, 'skirt_2.png', '4000', 7, 1),
(33, 'Női fehér farmer', 'rövid farmer', 'farmer, rövid, szoknya, női, szakadt', 7, 11, 'farmer_1.png', '3000', 8, 1),
(34, 'Farmer nadrád', 'farmer', 'farmer, női', 7, 11, 'farmer_2.png', '2000', 9, 1),
(35, 'Vízálló kék-fekete Reebok férfi kabát', 'kabát', 'kabát, férfi, reebok, vízálló, fekete', 1, 6, 'kabat_1.png', '8000', 10, 1),
(38, 'asdasd', 'asdasd', 'asdasd', 3, 1, 'yellow_4.png', '30000', 17, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`rendeles_id`);

--
-- A tábla indexei `markak`
--
ALTER TABLE `markak`
  ADD PRIMARY KEY (`marka_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `rendeles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `markak`
--
ALTER TABLE `markak`
  MODIFY `marka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
