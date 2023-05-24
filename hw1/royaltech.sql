-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2023 alle 14:20
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royaltech`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id`, `nome_categoria`) VALUES
(1, 'Schede Video'),
(2, 'CPU'),
(3, 'SSD'),
(4, 'HDD'),
(5, 'Case'),
(7, 'Ventole');

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `id_preferito` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`id_preferito`, `id_prodotto`, `user`) VALUES
(134, 29, 'Salvo01'),
(135, 25, 'Salvo01'),
(136, 37, 'Salvo01');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `product` varchar(255) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `price`, `product`, `category`, `img`, `link`) VALUES
(23, 999.99, 'Nvidia GeForce RTX 3080 Ti', 1, 'https://m.media-amazon.com/images/I/619h9dd1VhS._AC_SL1000_.jpg', 'https://www.amazon.it/Gigabyte-GeForce-3080-GAMING-12GB/dp/B095X51RHY'),
(24, 417.99, 'AMD Radeon RX 6700 XT', 1, 'https://m.media-amazon.com/images/I/71PPgbnGdsL._AC_SL1500_.jpg', 'https://www.amazon.it/Gigabyte-Radeon-RX-6700-EAGLE/dp/B08Y758F6C'),
(25, 46.99, 'Seagate BarraCuda 2TB HDD', 4, 'https://extremebit.it/3361-thickbox_default/hard-disk-2tb-sata-iii-35-seagate-barracuda.jpg', 'https://extremebit.it/hard-disk-desktop/583-hard-disk-2tb-sata-iii-35-seagate-barracuda-8719706011280.html'),
(27, 499.99, 'ASUS ROG Strix GeForce RTX 3070', 1, 'https://i.ebayimg.com/images/g/9igAAOSwWV5kLtES/s-l640.jpg', 'https://www.ebay.it/p/11041876527'),
(28, 1049.99, 'Gigabyte AORUS GeForce RTX 3080 Xtreme', 1, 'https://m.media-amazon.com/images/I/71Bds8lozkL._AC_SY450_.jpg', 'https://www.amazon.it/Gigabyte-GeForce-Xtreme-GDDR6X-grafica/dp/B08M5ZFNTT'),
(29, 2216.99, 'EVGA GeForce RTX 3090 FTW3 Ultra Gaming', 1, 'https://m.media-amazon.com/images/I/81-GWj0nEkL._AC_SL1500_.jpg', 'https://www.amazon.it/EVGA-GeForce-24G-P5-3987-KR-Technology-Backplate/dp/B08HGS1SXH'),
(30, 1999.99, 'MSI GeForce RTX 3080 Ti Suprim X', 1, 'https://m.media-amazon.com/images/I/71u8CWpiC-L._AC_SS450_.jpg', 'https://www.amazon.it/MSI-GeForce-RTX-3080-SUPRIM/dp/B0957WCY1M'),
(31, 99.99, 'Samsung 970 EVO Plus 1TB NVMe SSD', 3, 'https://images.samsung.com/is/image/samsung/p6pim/it/mz-v7s1t0bw/gallery/it-970-evoplus-nvme-m2-ssd-mz-v7s1t0bw-530364432?$650_519_PNG$', 'https://www.samsung.com/it/memory-storage/nvme-ssd/970-evo-plus-nvme-m-2-ssd-1tb-mz-v7s1t0bw/'),
(32, 94.99, 'Western Digital Black SN850 1TB NVMe SSD', 3, 'https://www.westerndigital.com/content/dam/store/en-us/assets/products/internal-storage/wd-black-sn850-nvme-ssd-for-ps5/gallery/wd-black-sn850-nvme-ssd-for-ps5-front.png.thumb.1280.1280.png', 'https://www.mediaworld.it/it/product/_ssd-interno-western-digital-wdbapz5000bnc-wrsn-163842.html?utm_source=google&utm_medium=cpc&utm_campaign=rt_shopping_na_sp_na_computer&utm_term=&utm_content=163842&ds_rl=1250284&ds_rl=1293221&ds_rl=1250284&ds_rl=12932'),
(33, 42.99, 'Crucial MX500 500GB SATA SSD', 3, 'https://m.media-amazon.com/images/I/81TmfqEBQwL._AC_SS450_.jpg', 'https://www.amazon.it/Crucial-MX500-CT500MX500SSD1-Interno-Pollici/dp/B0784SLQM6'),
(34, 188.99, 'Corsair MP600 Pro 2TB NVMe SSD', 3, 'https://m.media-amazon.com/images/I/71GMHw8nX0L._AC_SY450_.jpg', 'https://www.amazon.it/Corsair-MP600-NVMe-PCIe-Gen4/dp/B0BJKWSDN8'),
(35, 228.69, 'AMD Ryzen 7 5800X', 2, 'https://m.media-amazon.com/images/I/61DYLoyNRWL._AC_SX450_.jpg', 'https://www.amazon.it/Processore-AMD-Ryzen-5800X-cache/dp/B0815XFSGK'),
(36, 371.8, 'Intel Core i9-11900K', 2, 'https://m.media-amazon.com/images/I/71diouNMRHL._AC_SY450_.jpg', 'https://www.amazon.it/Processore-Intel-i9-11900K-Desktop-sbloccato/dp/B08X6PPTTH'),
(37, 4228.4, 'AMD Ryzen Threadripper 3990X', 2, 'https://m.media-amazon.com/images/I/610hpM-c-VS._AC_SX569_.jpg', 'https://www.amazon.it/AMD-Ryzen-Threadripper-3990X-Processore/dp/B0815SBQ9W?th=1'),
(38, 214.9, 'Corsair 5000D Airflow Tempered Glass Mid-Tower ATX Case', 5, 'https://www.corsair.com/medias/sys_master/images/images/h25/hc4/9659514290206/base-5000d-airflow/Gallery/5000D_AF_WHITE_001/-base-5000d-airflow-Gallery-5000D-AF-WHITE-001.png_515Wx515H', 'https://www.corsair.com/it/it/Categorie/Prodotti/Case/Case-ATX-Mid-Tower/Case-PC-ATX-mid-tower-in-vetro-temperato-5000D-AIRFLOW/p/CC-9011211-WW'),
(39, 130.48, 'NZXT H510i Compact ATX Mid-Tower PC Gaming Case', 5, 'https://m.media-amazon.com/images/I/71Mwj6gKcdL._AC_SS450_.jpg', 'https://www.amazon.it/NZXT-H510i-mid-tower-Montaggio-Illuminazione/dp/B07S8ZZJTW'),
(40, 99.99, 'Fractal Design Meshify C Tempered Glass Mid-Tower ATX Case', 5, 'https://m.media-amazon.com/images/I/91zUa+-t1RL._AC_SL1500_.jpg', 'https://www.fractal-design.com/products/cases/meshify/meshify-c/'),
(41, 352.72, 'Nvidia Rtx 2060', 7, 'https://m.media-amazon.com/images/I/61pwqV7gFPS._AC_SL1000_.jpg', 'https://www.amazon.it/Gigabyte-GeForce-RTX-2060-D6/dp/B095SWPGVR'),
(42, 33.45, 'be quiet! Silent Wings 3 140mm PWM High-Speed Fan', 7, 'https://m.media-amazon.com/images/I/61VJhP8uopL._AC_SY450_.jpg', 'https://www.amazon.it/quiet-Silent-Wings-ventola-raffreddamento/dp/B08DJPQFFD'),
(43, 12.78, 'ARCTIC P12 PWM PST CO', 7, 'https://m.media-amazon.com/images/I/61P3Fe-FpML._AC_SY450_.jpg', 'https://www.amazon.it/Computer-Funzionamento-Continuo-Tecnologia-Collegamento/dp/B07GSRRHZT'),
(48, 29.9, 'Noctua NF-A14 PWM chromax.black.swap', 7, 'https://m.media-amazon.com/images/I/81QZ4VI-nvL._AC_SX355_.jpg', 'https://www.amazon.it/Noctua-NF-A14-PWM-chromax-black-swap-Ventilatore/dp/B07655KF5C/ref=asc_df_B07655KF5C/?tag=googshopit-21&linkCode=df0&hvadid=194881236129&hvpos=&hvnetw=g&hvrand=13121772773536868351&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&h');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('Salvo01', 'salvo01@gmail.com', '$2y$10$lSeA3R9gAIle6FFYTsK4FOWHWp4SSx7P0qTSF9.NWRmBw3pRV.Ny6');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id_preferito`),
  ADD KEY `id_preferito` (`id_preferito`),
  ADD KEY `id_product` (`id_prodotto`),
  ADD KEY `user` (`user`),
  ADD KEY `id_preferito_2` (`id_preferito`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category` (`category`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id_preferito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  ADD CONSTRAINT `preferiti_ibfk_1` FOREIGN KEY (`id_prodotto`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `preferiti_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

--
-- Limiti per la tabella `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
