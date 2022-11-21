-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Lis 2022, 16:12
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `coode`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `data`
--

CREATE TABLE `data` (
  `id-user` int(11) NOT NULL,
  `username` text NOT NULL,
  `color` text NOT NULL DEFAULT 'grey',
  `tag` text NOT NULL DEFAULT 'gg',
  `gold` int(11) NOT NULL DEFAULT 100,
  `level` int(11) NOT NULL DEFAULT 1,
  `xp` float NOT NULL DEFAULT 28
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop`
--

CREATE TABLE `shop` (
  `id-user` int(11) NOT NULL,
  `green` text NOT NULL DEFAULT 'lock',
  `yellow` text NOT NULL DEFAULT 'lock',
  `blue` text NOT NULL DEFAULT 'lock',
  `grey` text NOT NULL DEFAULT 'unlock',
  `rng_carry` text NOT NULL DEFAULT 'lock',
  `card_master` text NOT NULL DEFAULT 'lock',
  `no_1` text NOT NULL DEFAULT 'lock',
  `gg` text NOT NULL DEFAULT 'lock',
  `p2p` text NOT NULL DEFAULT 'lock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id-user` int(11) NOT NULL,
  `id-cookie` text NOT NULL,
  `id-recovery` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` text NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `data`
--
ALTER TABLE `data`
  ADD KEY `id-user` (`id-user`);

--
-- Indeksy dla tabeli `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id-user`),
  ADD KEY `id-user` (`id-user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id-user`),
  ADD KEY `id-cookie` (`id-cookie`(768)),
  ADD KEY `id-recovery` (`id-recovery`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `data`
--
ALTER TABLE `data`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop`
--
ALTER TABLE `shop`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id-user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id-user`) REFERENCES `users` (`id-user`);

--
-- Ograniczenia dla tabeli `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`id-user`) REFERENCES `users` (`id-user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
