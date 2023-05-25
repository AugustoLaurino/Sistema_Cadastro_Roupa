SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tbmarca` (
  `id` integer NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbmarca` (`id`, `marca`) VALUES
(1, 'Lacoste'),
(2, 'Nike'),
(3, 'Polo wear');

CREATE TABLE `tbroupa` (
  `id` integer NOT NULL,
  `idMarca` integer NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `tamanho` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbroupa` (`id`, `idMarca`, `modelo`, `tamanho`) VALUES
(1, 1, 'calça', 'GG'),
(2, 2, 'camiseta', 'P'),
(3, 3, 'camisa', 'M');

ALTER TABLE `tbmarca`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbroupa`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbmarca`
  MODIFY `id` integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tbroupa`
  MODIFY `id` integer NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;