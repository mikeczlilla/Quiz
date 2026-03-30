-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Már 30. 10:31
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
-- Adatbázis: `quiz`
--
CREATE DATABASE IF NOT EXISTS quiz DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE quiz;

-- Táblák törlése (ha léteznek) a tiszta kezdéshez
DROP TABLE IF EXISTS felhasznalok;
DROP TABLE IF EXISTS kerdesek1;
DROP TABLE IF EXISTS kerdesek2;
DROP TABLE IF EXISTS kerdesek3;
-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `fnev` varchar(100) NOT NULL,
  `vnev` varchar(100) NOT NULL,
  `knev` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jelszo` varchar(20) NOT NULL,
  `tszam` varchar(11) NOT NULL,
  `sztdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `fnev`, `vnev`, `knev`, `email`, `jelszo`, `tszam`, `sztdatum`) VALUES
(1, 'teszt67', 'teszt', 'teszt', 'teszt67@teszt.hu', 'qwert', '06301234567', '2026-02-04'),
(3, 'hlevente08', 'Holló', 'Levente', 'hlevente08@mail.com', 'qwertz', '06304567891', '2008-09-07');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek1`
--

CREATE TABLE `kerdesek1` (
  `id` int(11) NOT NULL,
  `kerdes` varchar(250) NOT NULL,
  `jo_valasz` varchar(100) NOT NULL,
  `rossz_valasz1` varchar(100) NOT NULL,
  `rossz_valasz2` varchar(100) NOT NULL,
  `rossz_valasz3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kerdesek1`
--

INSERT INTO `kerdesek1` (`id`, `kerdes`, `jo_valasz`, `rossz_valasz1`, `rossz_valasz2`, `rossz_valasz3`) VALUES
(1, 'Mikor volt a mohácsi csata?', '1526. augusztus 29', '2008. augusztus 23', '1625. augusztus 29', '1256. november 31'),
(2, 'Az Ikarus gyártásának története melyik évben indult?', '1895', '1901', '1950', '1980'),
(3, 'Melyik a jelenleg élő legnagyobb hüllő a világon?', 'Bordás krokodil', 'Albínó angolna', 'Góliátbéka', 'Aligátor'),
(4, 'Melyik a legnagyobb emlős a világon?', 'Kékbálna', 'Zsiráf', 'Afrikai elefánt', 'Csirke'),
(5, 'Melyik a periódusos rendszer második eleme?', 'He', 'Ne', 'H', 'Na'),
(6, 'Melyik volt Mikszáth Kálmán műve?', 'Bede Anna tartozása', 'Ágnes asszony', 'Szondi két apródja', 'Toldi'),
(7, 'Négy lába van, asztal, de nem szék. Mi az?', 'Asztal', 'Kecske', 'Attila', 'Szék'),
(8, 'Fekete István Vuk c. regényében, melyik szereplő volt róka?', 'Karak', 'Fickó', 'Csufi', 'Cili'),
(9, 'Melyik szerv nem megfelelő működése felel a cukorbetegségért?', 'hasnyálmirigy\r\n', 'agyalapimirigy', 'pajzsmirigy', 'nyálmirigy\r\n'),
(10, 'Mi Montenegró fővárosa?', 'Podgorica', 'Pristina', 'Szkopje', 'Praia'),
(11, 'Ki írta a Nagy Gatsby című regényt?', 'F. Scott Fitzgerald\r\n', 'Thomas Mann\r\n', 'James Joyce', 'Nora Barnacle'),
(12, 'Melyik sziget tartozik Franciaországhoz?', 'Korzika', 'Ciprus', 'Málta', 'Tenerife'),
(13, 'Melyik ázsiai ország az, melynek területe átnyúlik a déli féltekére is?', 'Indonézia', 'Japán', 'India', 'Kína'),
(14, 'Élő szervezeten kívül elvégzett kísérletezési technika. Melyik jelenti azt, hogy üvegben?', 'in vitro\r\n', 'in vino', 'in vivo', 'in viro'),
(15, 'Ki a főisten a római mitológiában?', 'Jupiter', 'Uranus', 'Aurora', 'Zeus');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek2`
--

CREATE TABLE `kerdesek2` (
  `id` int(11) NOT NULL,
  `kerdes` varchar(200) NOT NULL,
  `jo_valasz` varchar(5) NOT NULL,
  `rossz_valasz` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kerdesek2`
--

INSERT INTO `kerdesek2` (`id`, `kerdes`, `jo_valasz`, `rossz_valasz`) VALUES
(1, 'Igaz vagy hamis? Winston Smith az 1984 című Orwell-regény főhőse.', 'Igaz', 'Hamis'),
(2, 'Igaz vagy hamis? A latin hallux szó az emberi anatómiában a kislábujjra utal.', 'Hamis', 'Igaz'),
(3, 'Igaz vagy hamis? A Jupiter az egyetlen bolygó a Naprendszerben, ami az óramutató járásával megegyező irányban forog.', 'Hamis', 'Igaz'),
(4, 'Igaz vagy hamis az állítás? Albert Einstein a „relativitáselmélet atyja”.', 'Igaz', 'Hamis'),
(5, 'Igaz vagy hamis az állítás? Liudolf Gizella volt I. István magyar király felesége.\r\n', 'Igaz', 'Hamis'),
(6, 'Igaz vagy hamis? Az asztrológiában a Rák hava június 24-től július 25-ig tart.\r\n', 'Hamis', 'Igaz'),
(7, 'Igaz vagy hamis? A Stranger Things című sci-fi sorozat egy Derry nevű kitalált városban játszódik.', 'Hamis', 'Igaz'),
(8, 'Igaz vagy hamis? A párizsi békeszerződések aláírásával zárult le a második világháború Magyarország, Finnország, Bulgária, Olaszország és Románia számára.', 'Igaz', 'Hamis'),
(9, 'Igaz vagy hamis az állítás? A Szahara a világ legnagyobb sivataga.', 'Hamis', 'Igaz'),
(10, 'Igaz vagy hamis? A Bohemian Rhapsody-ban, a Queen egyik legnépszerűbb dalában a híres csillagász, Galileo Galilei neve is említésre kerül.\r\n', 'Igaz', 'Hamis');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek3`
--

CREATE TABLE `kerdesek3` (
  `id` int(11) NOT NULL,
  `kerdes` varchar(250) NOT NULL,
  `jo_valasz` varchar(100) NOT NULL,
  `rossz_valasz1` varchar(100) NOT NULL,
  `rossz_valasz2` varchar(100) NOT NULL,
  `rossz_valasz3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kerdesek3`
--

INSERT INTO `kerdesek3` (`id`, `kerdes`, `jo_valasz`, `rossz_valasz1`, `rossz_valasz2`, `rossz_valasz3`) VALUES
(1, 'Melyik bolygót nevezik a „vörös bolygónak”?', 'Mars', 'Vénusz', 'Jupiter', 'Szaturnusz'),
(2, 'Ki festette a híres „Mona Lisa” című képet?', 'Leonardo da Vinci', 'Michelangelo', 'Vincent van Gogh', 'Pablo Picasso'),
(3, 'Hány billentyű található egy szabványos zongorán?', '88', '76', '102', '94'),
(4, 'Melyik országban található a gízai nagy piramis?', 'Egyiptom', 'Görögország', 'Mexikó', 'Olaszország'),
(5, 'Mi a víz vegyjele?', 'H_2O', 'CO_2', 'NaCl', 'O_2'),
(6, 'Ki írta a „Rómeó és Júlia” című drámát?', 'William Shakespeare', 'Charles Dickens', 'Jane Austen', 'Mark Twain'),
(7, 'Melyik a Föld legkisebb kontinense?', ' Ausztrália', 'Európa', 'Antarktisz', 'Dél-Amerika'),
(8, 'Melyik évben ért véget a második világháború?', '1945', '1918', '1939', '1950'),
(9, 'Mi a Föld legmagasabb hegycsúcsa?', 'Mount Everest', 'K2', 'Mont Blanc', 'Kilimandzsáró'),
(10, 'Melyik szervünk felelős a vér pumpálásáért az emberi testben?', 'Tüdő', 'Máj', 'Szív', 'Vese');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kerdesek1`
--
ALTER TABLE `kerdesek1`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kerdesek2`
--
ALTER TABLE `kerdesek2`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kerdesek3`
--
ALTER TABLE `kerdesek3`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `kerdesek1`
--
ALTER TABLE `kerdesek1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `kerdesek2`
--
ALTER TABLE `kerdesek2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `kerdesek3`
--
ALTER TABLE `kerdesek3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
