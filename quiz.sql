-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Már 16. 09:59
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
(7, 'Négy lába van, asztal, de nem szék. Mi az?', 'Asztal', 'Kecske', 'Attila', 'Szék');

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
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kerdesek1`
--
ALTER TABLE `kerdesek1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
