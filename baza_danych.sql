-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Mar 2022, 22:09
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_danych`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `numer_nadwozia` varchar(12) NOT NULL,
  `model` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `marka` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `kolor` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `wyposazenie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`numer_nadwozia`, `model`, `marka`, `rocznik`, `cena`, `kolor`, `wyposazenie`) VALUES
('1213765', 'zx7', 'mazda', 2010, 40000, '#ff0000', 'ABS, TURBOTURBINA'),
('12334', 'Seicento', 'Fiat', 1999, 2990, '#808040', 'skóra'),
('12443214', 'e76', 'bmw', 2004, 432435, '#ffffff', 'supertak'),
('194329', 'audi2', 'a61', 2012, 70500, '#ffff00', 'turbospreżarka'),
('1943431', 'a6', 'audi', 2011, 54321, '#004080', 'turbosprezarka'),
('3645645', 'astra', 'opel', 2011, 25000, '#008040', 'ABS,TURBOTURBINA'),
('4457457', 'punto', 'fiat', 2013, 9000, '#800000', 'abs'),
('654326', 'corsa', 'opel', 1996, 43900, '#0080c0', 'kornel'),
('667777', 'xs', 'jaguar', 2020, 6611, '#ff8080', 'Fotele z plastiku');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isActive` int(255) NOT NULL,
  `age` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `isActive`, `age`, `first_name`, `last_name`) VALUES
(1, 1, 18, 'Mateusz', 'Błoch'),
(2, 1, 11, 'Jan', 'Nowak');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`numer_nadwozia`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
