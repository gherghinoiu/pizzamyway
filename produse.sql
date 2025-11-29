-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2025 at 07:43 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzamyway_nou`
--

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titlu` varchar(255) NOT NULL,
  `descriere` text NOT NULL,
  `gr` varchar(255) NOT NULL,
  `pret` float NOT NULL,
  `poza` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `categorie`, `titlu`, `descriere`, `gr`, `pret`, `poza`) VALUES
(1, 'salata', 'Salata Italiana', 'ton, rosii, castraveti, masline, salata verde, branza, maioneza, ou', '635', 29, 'salata-italiana.png'),
(2, 'paste', 'Milaneze\r\n', 'paste, bacon, sunca, ciuperci, rosii', '555\r\n', 35, 'spaghete-milaneze.png'),
(3, 'salata', 'Salata My Way', 'focaccia, rosii, castraveti, salata verde, sunca, branza, ceapa, maioneza, ou\n', '650', 27, 'salata-myway.png'),
(4, 'paste', 'Carbonara', 'paste, usturoi, ou, parmezan, smantana,  vin alb, sunca presata\n\n', '560', 35, 'paste-carbonara.jpg'),
(5, 'salata', 'Salata Bulgareasca', 'rosii, castraveti, ardei gras, ceapa, salata verde, branza, maioneza, ou\n', '620', 28, 'salata-bulgareasca.jpg'),
(6, 'paste', 'Amatriciana', 'paste, ceapa, bacon, rosii, parmezan, sos iute\r\n', '400', 35, 'spaghete-amatriciana.jpg'),
(7, 'salata', 'Salata Piept de Pui', 'focaccia, piept de pui, rosii, castraveti, branza, salata verde, maioneza, ou\n', '630', 28, 'salata-piept-pui.png'),
(8, 'paste', 'Penne cu piept de pui la cuptor', 'sos alb, piept pui, zucchini ciuperci, cascaval, grancucina\n\n', '500', 35, 'penne-piept-pui-la-cuptor.jpg'),
(9, 'salata', 'Salata Taraneasca', 'castraveti, rosii, ceapa, branza', '400', 15, 'salata-taraneasca.png'),
(10, 'paste', 'Penne Quattro Formaggi', 'gorgonzola, emmentaler, brie, mozarella, grancucina', '370', 36, 'Penne-quatro-formaghhi.jpg'),
(12, 'salata', 'Salata de Varza', 'varza', '150', 7, 'salata-varza- morcovi.png'),
(14, 'salata', 'Salata de Muraturi Asortate', 'muraturi', '150', 10, 'salata-muraturi-asortate.png'),
(15, 'salata', 'Salata de Sfecla Rosie cu Hrean', 'sfecta rosie, hrean', '175', 10, 'salata-sfecla-rosie.jpg'),
(184, 'platou-3-4', 'Platou pui crispy 4, 5 pers', 'pui crispy 400g, aripioare crispy 500g, cartofi wedges/bravas 300g, castraveti murati 200g, sos sweet chily 50g, sos de usturoi 60g\r\n', '1510', 125, 'platou.jpg'),
(17, 'salata', 'Salata mixta cu pui crocant', 'pui crocant, salata iceberg, rucola, porumb, ceapa rosie', '370', 28, 'salata-cu-pui-crocant.jpg'),
(19, 'paste', 'Paste Zucchini', 'sos alb/rosu, bacon crocant, ciuperci, zucchini, usturoi, parmezan\n\n', '490', 35, 'paste-zucchini.jpg'),
(25, 'sandwich', 'Sandwich cu salam uscat', 'focaccia, salam uscat, cascaval, rosii, sos remoulade, salata verde\r\n', '260', 24, 'sandwich-1.jpg'),
(26, 'sandwich', 'Sandwich cu sunca', 'focaccia, sunca, cascaval, sos remoulade, salata verde, rosii\r\n', '260', 23, 'sandwich-1.jpg'),
(27, 'sandwich', 'Sandwich cu bacon \r\n', 'focaccia, bacon, cascaval, sos remoulade, salata verde, rosii\r\n\r\n', '260', 23, 'sandwich-1.jpg'),
(28, 'sandwich', 'Sandwich cu pui', 'focaccia, piept de pui, cartofi pai, castraveti, rosii, sos remoulade, salata verde\r\n\r\n', '300', 24, 'sandwich-1.jpg'),
(29, 'sandwich', 'Sandwich cu ton', 'focaccia, ton, cascaval, salata verde\r\n', '260', 26, 'sandwich-1.jpg'),
(30, 'platou-1-2', 'Platou Snitel Pui', 'snitel sui, cartofi pai, cabanos, rosii, castraveti', '610', 34, 'platou-snitel-pui.jpg'),
(31, 'platou-1-2', 'Platou Ceafa Porc', 'ceafa porc, cartofi pai, cabanos, rosii, castraveti', '650', 34, 'platou-ceafa-porc.jpg'),
(33, 'platou-1-2', 'Platou Ficatei cu Bacon', 'rulouri de ficatei cu bacon, cartofi gratinati, cabanos, salata de varza\n', '550', 34, 'platou-ficatei-pui.jpg'),
(34, 'platou-1-2', 'Platou Piept Pui cu Ciuperci', 'piept pui cu sos alb, cartofi gratinati cu broccoli, cabanos, ciuperci la gratar\n', '700', 34, 'platou-piept-pui-ciuperci.jpg'),
(36, 'pui', 'Sufle de Pui', 'piept pui, cartofi, cascaval, smantana, ou, ciuperci, usturoi\r\n\r\n', '425', 30, 'sufleu-de-pui.jpg'),
(37, 'platou-1-2', 'Platou Pui Shanghai cu cartofi pai', 'pui shanghai, cartofi pai, cabanos, ciuperci la gratar', '630', 34, 'platou-pui-shanghai-cartofi-pai.jpg'),
(38, 'platou-1-2', 'Platou de iarna', 'ceafa porc, cabanos, cartofi gratinati cu bacon, muraturi', '600', 34, 'platou-iarna.jpg'),
(185, 'platou-3-4', 'Platou porc tomahawk', 'tomahawk porc 300g, carnati oltenesti 200g, rulada de porc(cascaval cu masline) 300g, crochete cascaval 250g, cartofi pai 300g, muraturi asortate 250g', '1600', 135, 'platou-porc-tomahawk.jpg'),
(45, 'pui', 'Rulou de pui cu sunca\r\n', 'piept pui, cascaval, sunca\r\n', '210', 22, 'rulot-pui-sunca-presata.jpg'),
(46, 'platou-1-2', 'Platou Primavara', 'rulada piept pui cu ciuperci si cascaval, cartofi wedges, crochete de cascaval cu masline, salata de vinete cu ardei copt\n', '965', 35, 'platou-primavara.jpg'),
(47, 'pui', 'Rulou de pui cu ficatei\r\n', 'piept pui, ficatei\r\n', '220', 22, 'rulou-pui-ficatei.jpg'),
(48, 'platou-1-2', 'Platou Rustic', 'piept de pui la gratar, cabanos, cartofi gratinati, salata de vinete cu ardei copt', '560', 35, 'platou-rustic.jpg'),
(49, 'curcan', 'Rulou piept curcan', 'piept curcan, gogosar, mozzarella\r\n', '210', 22, 'rulou-piept-curcan.jpg'),
(51, 'pui', 'Parmachef', 'snitel piept pui, sunca, cascaval, smantana, ciuperci\r\n', '400', 28, 'parmachef.jpg'),
(57, 'garnituri', 'Cascaval Pane', '', '170', 21, 'cascaval-pane.jpg'),
(58, 'platou-3-4', 'Platou My Way\r\n', 'piept pui cu susan, rulou pui cu ciuperci, snitel, rosii, castraveti, ciuperci la gratar, crochete de cascaval, masline', '1175', 125, 'platou-MyWay.jpg'),
(59, 'garnituri', 'Crochete de Cascaval\r\n', '', '200', 22, 'crochete-cascaval.jpg'),
(60, 'platou-3-4', 'Platou rulada de pui\r\n', 'rulou de sunca cu crema de branza, piept de pui fasii, masline, crochete de cascaval, rulou de pui cu sunca, ciuperci gratinate, rosii, castraveti\n', '1165', 125, 'platou-rulada-pui.jpg'),
(61, 'garnituri', 'Crochete de cartofi\r\n', '', '200', 10, 'crochete-cartofi.jpg'),
(62, 'garnituri', 'Cartofi Pai\r\n', '', '200', 8, 'cartofi-pai.jpg'),
(63, 'platou-3-4', 'Platou pui Shanghai', 'rulou de pui cu sunca, rulou de sunca \r\ncu crema de branza, pui Shanghai, crochete de cascaval, tartine cu ciuperci, castraveti', '950', 125, 'platou-pui-shanghai.jpg'),
(64, 'platou-3-4', 'Platou frigarui pui', 'frigarui pui, rulou de pui cu gogosar, ciuperci gratinate, rulouri de ficatei cu bacon, crochete de ascaval, rosii\n', '910', 125, 'platou-frigarui-pui.jpg'),
(65, 'garnituri', 'Piure de Cartofi', '', '250', 9, 'piure-cartofi.jpg'),
(66, 'garnituri', 'Cartofi wedges', '', '200', 8, 'cartofi-wedges.jpg'),
(67, 'platou-3-4', 'Platou Party\r\n', 'rulou pui cu ciuperci, cascaval, pui crocant, cordon bleu, cartofi gratinati, crochete de cascaval, ciuperci la gratar, rosii umplute cu crema de branza\n', '1385', 125, 'platou-party.jpg'),
(68, 'garnituri', 'Ciuperci gratinate', '', '230', 13, 'ciuperci-gratinate.jpg'),
(69, 'garnituri', 'Ciuperci la Gratar\r\n', '', '200', 10, 'ciuperci-la-gratar.jpg'),
(70, 'platou-3-4', 'Platou rece 4 persoane\r\n', 'sunca, salam uscat, bacon, cascaval, branza, rosii, castraveti, ardei gras cu crema de branza', '1000', 90, 'Platou-rece-4-pers.jpeg'),
(72, 'platou-3-4', 'Platou asortat 4 persoane', 'rulada de pui, pui Shanghai, bacon, sunca, salam, branza, cascaval, rosii, castraveti\n', '1530', 125, 'platou-asortat.jpg'),
(73, 'garnituri', 'Cartofi gratinati', 'cascaval, smantana, ou, patrunjel\r\n', '200', 13, 'cartofi-gratinati.jpg'),
(74, 'platou-3-4', 'Platou 3 pers.vegetarian', '\r\ncrochete cartofi, dovlecel pane, ciuperci gratinate, frigarui legume, masline,rosii cu vinete,inele de ceapa', '1500', 85, 'platou-vegetarian.jpeg'),
(75, 'platou-3-4', 'Platou cald 4 persoane', 'rulou piept pui cu ardei kapia, frigarui de pui, rulada piept pui, cartofi gratinati, frigarui cu rosii cherry si mozzarela\r\n', '1300', 125, 'platou-cald.jpg'),
(76, 'garnituri', 'Focaccia cu cascaval', '', '200', 10, 'focaccia.jpg'),
(77, 'garnituri', 'Lipie Calda', '', '200', 6, 'lipie.jpg'),
(82, 'pui', 'Frigarui pui', 'piept pui, ceapa, ciuperci, ardei', '240', 15, 'frigarui-pui.jpg'),
(186, 'platou-3-4', 'Platou Ciolan Porc ', 'Ciolan porc 650g, Tomawawk porc 300g, Pui cu susan 250g, Crochete cascaval 250g, Cartofi pai 250g, Muraturi asortate 200g', '1900', 135, ''),
(178, 'bauturi', 'Pepsi Cola', '', '2.0 litri .', 12, 'pepsi.jpg'),
(147, 'pizza', 'PIZZA NAPOLETANA', 'sos rosii, mozzarella, sunca presata, masline, branza topita, ardei gras', '650', 34, 'pizza-napolitana.jpg'),
(86, 'desert', 'Clatite Brasovene', 'smantana, urda, stafide, rom, scortisoara ', '300', 24, 'clatite-brasovene.png'),
(87, 'pui', 'Cordon bleu', 'piept pui, cascaval, sunca presata', '240', 19, 'cordon-bleu.jpg'),
(88, 'pui', 'Piept de pui cu sos alb', 'piept de pui, smantana, ciuperci, usturoi, patrunjel\n', '300', 23, 'piept-pui-sos.jpg'),
(89, 'pui', 'Rulouri de Ficatei cu Bacon\r\n', 'ficatei, bacon', '300', 24, 'rulou-pui-ficatei.jpg'),
(90, 'desert', 'Clatite cu Dulceata - 2 buc', 'visine, afine', '60', 18, 'clatite-dulceata.png'),
(91, 'pui', 'Snitel pui', '', '200', 16, 'snitel-pui.jpg'),
(92, 'desert', 'Clatite cu Nutella - 2 buc', '', '60', 18, 'clatite-nutella.jpg'),
(93, 'pui', 'Snitel milanez', 'cascaval', '200', 23, 'snitel-milanez.jpg'),
(94, 'pui', 'Piept pui la gratar\r\n', '', '200', 15, 'piept-pui-gratar.jpg'),
(95, 'pui', 'Piept de pui crocant\r\n', '', '200', 18, 'piept-pui-crocant.jpg'),
(177, 'platou-3-4', 'Box pui crispy <b style=\'color: red\'> NOU</b>', 'Pui crispy - 20 buc', '600', 50, 'crisp.jpeg'),
(97, 'pui', 'Piept de pui cu Susan\r\n', '', '200', 18, 'Piept-pui-susan.jpg'),
(98, 'pui', 'Piept pui cu legume\r\n', 'file piept de pui, broccoli, ciuperci, dovlecel, morcov', '320', 25, 'piept-pui-cu-legume.jpg'),
(170, 'platou-3-4', 'Platou Fructe de mare <b style=\'color: red\'> NOU</b>', 'Calamari pane,creveti,file somon,mozzarella fingers,cartofi wedges,rosii cherry,sos chily sweet,sos garlic mayo', '1300', 126, 'platou-fructe-de-mare.jpg'),
(102, 'porc', 'Ceafa de porc la gratar\r\n', '', '200', 16, 'ceafa-porc-gratar.jpg'),
(176, 'platou-3-4', 'Box aripioare crispy <b style=\'color: red\'> NOU</b>', 'Aripioare crispy - 18 buc', '1000', 56, 'crispy.jpeg'),
(146, 'pizza', 'PIZZA SALAMI', 'sos rosii, mozzarella, salam uscat, salam pepperoni, ou, rosii, porumb', '645', 36, 'pizza-salami.jpg'),
(110, 'bauturi', 'Ursus', '', '0.5', 8, 'doza-ursus-2.jpg'),
(167, 'platou-3-4', 'Platou branzeturi', 'Gorgonzola,branza brie,branza feta,parmezan,rosii cherry.nuca,mere,emmentaler', '1000', 90, 'platou-branzeturi.jpeg'),
(112, 'curcan', 'Piept curcan Quattro Formaggi', 'gorgonzola, mozzarella, brie, parmezan, grancucina', '250', 24, 'piept-curcan-quatro-formaghgi.jpg'),
(113, 'curcan', 'Piept curcan\r\n', '', '150', 15, 'piept-curcan.jpg'),
(168, 'platou-3-4', 'Platou Weekend 3 persoane', 'Aripioare pui condimentate,mini snitel pui.carnaciori oltenesti.ficatei in bacon,frigarui porc,crochete cartofi,muraturi asortate', '1400', 125, 'platou-weekend.jpeg'),
(118, 'curcan', 'Burger de vita\r\n', 'chifla, vita, sos burger, cedar, bacon, rosii, salata iceberg, cartofi pai', '300', 22, 'burger-vita.jpg'),
(165, 'pizza', 'PIZZA FAMILY', 'Prosciutto Crudo / Somon / Pesce', '820', 50, 'pizza-family.jpg'),
(143, 'pizza', 'PIZZA OLTENEASCA', 'sos rosii, rosii, mozzarella, piept de pui, ou, ciuperci, praz, porumb, oregano, rozmarin', '685', 33, 'pizza-olteneasca.jpg'),
(137, 'pizza', 'Pizza Quattro Formaggi', 'sos rosii, gorgonzola, branza brie, parmezan, emmentaler', '550', 37, 'pizza-quattro-formaggi.jpg'),
(122, 'pizza', 'PIZZA MY WAY', 'sos rosii, mozzarella, sunca presata, bacon, pepperoni, ciuperci, rosii, ardei gras', '670', 35, 'pizza-myway.jpg'),
(135, 'pizza', 'PIZZA VEGETARIANA', 'sos rosii, mozzarella/cascaval vegetal, ciuperci, ardei gras, masline, broccoli, rosii, porumb', '625', 34, 'pizza-vegetariana.jpg'),
(124, 'pizza', 'PIZZA TONNO', 'sos rosii, mozzarella, ton, ciuperci, ardei gras, ceapa, lamaie', '655', 37, 'pizza-tonno.jpg'),
(125, 'pizza', 'PIZZA DELICIOSA E FUNGHI', 'sos rosii, mozzarella, sunca presata, piept pui, ou, ciuperci, broccoli, masline', '670', 35, 'pizza-deliciosa-i-funghi.jpg'),
(126, 'pizza', 'PIZZA FUMOSO', 'sos rosii, cascaval afumat, bacon, kaizer, rosii, ciuperci', '650', 33, 'pizza-fumoso.jpg'),
(128, 'pizza', 'PIZZA SINATRA', 'sos, mozzarella, piept pui, bacon, salam uscat, branza feta, ciuperci, rosii', '655', 36, 'pizza-sinatra.jpg'),
(129, 'pizza', 'PIZZA PROSCIUTTO CRUDO', 'sos rosii, mozzarella, prosciutto crudo, carnati crud-uscati, rucola, rosii cherry', '655', 37, 'pizza-prosciutto-crudo.jpg'),
(130, 'pizza', 'PIZZA PARMA', 'sos rosii, mozzarella, sunca presata, bacon, salam uscat, ciuperci, masline, rosii, ardei gras', '660', 35, 'pizza-parma.jpg'),
(132, 'pizza', 'PIZZA MARGHERITA E FUNGHI', 'sos rosii, mozzarella, ciuperci', '535', 34, 'pizza-margherita.jpg'),
(133, 'pizza', 'PIZZA SOMON', 'sos rosii, mozzarella, somon fume, ton, rosii cherry, lamaie', '660', 37, 'pizza-somon.jpg'),
(134, 'pizza', 'PIZZA MEXICANA', 'sos rosii, mozzarella, salam picant, ciuperci, ceapa, porumb, ardei iute', '590', 36, 'pizza-mexicana.jpg'),
(136, 'pizza', 'PIZZA ROMANA', 'sos rosii, mozzarella, sunca presata, ciuperci', '580', 34, 'pizza-romana.png'),
(138, 'pizza', 'PIZZA QUATTRO STAGIONI TON', 'sos rosii, mozzarella, sunca presata, ton, masline, ciuperci', '630', 36, 'pizza-quattro-stagioni-tonno.jpg'),
(139, 'pizza', 'PIZZA CAPRICCIOSA', 'sos rosii, mozzarella, bacon, ciuperci, rosii, ceapa, cabanos', '660', 35, 'pizza-capricciosa.jpg'),
(141, 'pizza', 'PIZZA TRADITIONALA', 'sos rosii, mozzarella, bacon, ciuperci, rosii, ardei gras, ou', '670', 35, 'pizza-traditionala.jpg'),
(142, 'pizza', 'PIZZA CARBONARA', 'sos alb, mozzarella, sunca presata, ciuperci, piept pui, ardei gras', '640', 35, 'pizza-carbonara.jpg'),
(119, 'pizza', 'PIZZA PARTY', '(orice sortiment - exclus Prosciutto Crudo, Somon, Pesce)', '', 85, 'pizza-party.jpg'),
(144, 'pizza', 'PIZZA HOT', 'sos rosii, mozzarella, sunca presata, ardei iute, salam picant, ciuperci', '635', 36, 'pizza-hot.jpg'),
(121, 'pizza', 'PIZZA FAMILY', '(orice sortiment - exclus Prosciutto Crudo, Somon, Pesce)', '820', 50, 'pizza-family.jpg'),
(148, 'pizza', 'PIZZA CHICKEN', 'sos rosii, mozzarella, piept de pui, ciuperci, ardei gras, masline, ceapa', '675', 34, 'pizza-chicken.jpg'),
(149, 'pizza', 'PIZZA QUATTRO STAGIONI', 'sos rosii, mozzarella, sunca presata, salam, masline, ciuperci', '630', 35, 'pizza-quattro-stagioni.jpg'),
(179, 'desert', 'Papanasi - 2 buc', '', '200', 23, 'papanasi2.jpg'),
(180, 'platou-3-4', 'Platou grill- 3 pers.', 'ceafa porc 350g, mici 6 buc 480g porc-vita, carnaciori oltenesti 300g, cartofi wedges/bravas 250g, acrituri 200g, mustar', '1580', 125, 'platou.jpg'),
(151, 'pizza', 'PIZZA TARANEASCA', 'sos rosii, mozzarella, bacon, cabanos, ou, ciuperci, branza, ardei gras, ardei iute, rosii', '705', 36, 'pizza-taraneasca.jpg'),
(152, 'sandwich', 'Sandwich cu snitel pui', 'focaccia, snitel de pui, cartofi pai, castraveti, rosii, sos remoulade, salata verde', '300', 25, 'sandwich-1.jpg'),
(164, 'pizza', 'PIZZA PARTY', 'Prosciutto Crudo / Somon / Pesce', '', 90, 'pizza-party.jpg'),
(166, 'pizza', 'Pizza Fructe De Mare  <b style=\'color:red\'> NOU </b>', 'Sos rosii,mozzarella,creveti,calamari,rosii,ardei gras,busuioc,patrunjel', '570', 35, 'pizza-fructe-mare.jpeg'),
(155, 'pizza', 'Pizza California', 'sos rosii, mozzarela, piept de pui, sunca presata, vita, gorgonzola, ardei gras, ciuperci,\r\n', '615', 35, 'pizza-california.jpg'),
(156, 'pizza', 'Pizza Pollo', 'sos alb, mozzarella, piept pui, gorgonzola, rosii cherry\r\n', '655', 34, 'pizza-pollo.jpg'),
(157, 'pizza', 'Pizza BBQ Spicy <b style=\'color:red\'> NOU </b>', 'sos rosii, mozzarela, pepperoni, carnati crud uscati, piept pui, rosi cubulete, ceapa rosie, jalapenos, sos BBQ\r\n', '670', 36, 'barbeque.jpg'),
(158, 'pizza', 'Pizza Americana', 'sos rosii, mozzarela, piept curcan, bacon, pepperoni, ciuperci, ou, masline, ardei gras, parmezan\r\n', '650', 33, 'pizza-americana.jpg'),
(159, 'pizza', 'Pizza Homemade - blat cu mozzarela', 'sos rosii, mozzarella, bacon, rosii cherry, parmezan, piept pui, ou, rucola, busuioc\r\n', '630', 37, 'pizza-homemade-mozzarella.jpg'),
(160, 'pizza', 'Pizza Pesce', 'sos alb/rosu, mozzarella, pastrav afumat, somon afumat, ton, ceapa rosie, ardei gras, masline, lamaie\r\n', '670', 34, 'pizza-pesce.jpg'),
(161, 'pizza', 'Pizza Quattro Carni <b style=\'color:red\'> NOU </b>', 'sos rosii, mozzarella, piept pui, vita, cabanos, pepperoni, rosi cubulete, ciuperci, ceapa rosie, oregano, busuioc\r\n', '670', 36, 'pizza-taraneasca.jpg'),
(174, 'platou-1-2', 'Coasta porc <b style=\'color:red\'> NOU</b>', 'Coasta porc,cartofi rondele, rosii, castraveti', '600', 34, 'coaste.jpg'),
(175, 'platou-3-4', 'Platou Coaste Porc <b style=\'color:red\'> NOU</b>', 'Coaste porc, rulou porc invelit in bacon, chiftelute, cartofi rondele, muraturi asortate, sos usturoi, sos BBQ', '1550', 125, 'platou-coaste-porc.jpg'),
(181, 'platou-3-4', 'Platou mici- 3 pers.', 'mici 10 buc 800g porc-vita, cartofi pai 250g, acrituri 150g, mustar', '1200', 75, 'platoumici.jpeg'),
(182, 'salata', 'Salata Green Box', 'salata verde 100g, mar verde 50g, morcov 50g, porumb 20g, pui grill 100g, dressing ulei masline\r\n', '320', 28, 'salata.jpg'),
(183, 'salata', 'Salata Caesar', 'salata verde 100g, castravete verde 100g, mozzarella 50g, ou, pui grill 100 g, dressung caesar\r\n', '350', 28, 'salata.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
