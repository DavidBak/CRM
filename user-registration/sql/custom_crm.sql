-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 02. Apr 2022 um 02:33
-- Server-Version: 5.6.41-84.1
-- PHP-Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `custom_crm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `Contact_First` varchar(15) NOT NULL,
  `Contact_Last` varchar(15) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Industry` varchar(12) NOT NULL,
  `Address` varchar(125) NOT NULL,
  `Address_Street_1` varchar(50) NOT NULL,
  `Address_City` varchar(25) NOT NULL,
  `Address_Zip` int(11) NOT NULL,
  `Address_Country` varchar(30) NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Status` int(11) UNSIGNED NOT NULL,
  `Background_Info` text NOT NULL,
  `Sales_Rep` int(11) UNSIGNED NOT NULL,
  `Rating` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`id`, `Contact_First`, `Contact_Last`, `Title`, `Company`, `Industry`, `Address`, `Address_Street_1`, `Address_City`, `Address_Zip`, `Address_Country`, `Phone`, `Email`, `Status`, `Background_Info`, `Sales_Rep`, `Rating`) VALUES
(1, 'Lydia', 'Lee', 'CEO', 'Debaktra', 'Forwarding', 'Fangdieckstrasse 113C 22547 Hamburg', 'Fangdieckstrasse 113C', 'Hamburg', 22547, 'Deutschland', '+4940550094', 'support@debaktra.com', 4, 'own', 1, 1.00),
(2, 'Christina ', 'Mayer', 'Customer Service', 'ASTROPLAST Schärdel GmbH', 'Customer, Im', 'Am Schönbühl 3  92729 Weiherhammer', 'Am Schönbühl 3', 'Weiherhammer', 92729, 'Deutschland', '+4996053497', 'c.mayer@lichtbauelemente.de', 3, 'Handok,  import from Korea', 1, 2.00),
(3, 'Eunice', 'Li', 'Business Development ', 'Evergrow Logistics Technologies co. ltd', 'Partner', '8/F Yinlong Building No.258 Dongdu Road Huli Xiame', '8/F Yinlong Building No.258', 'Xiamen', 0, 'China', '+86592567905', 'airsales5@evergrowtrans.com', 3, 'email sales ', 1, 2.00),
(4, 'Miho', 'Yang', 'Chief  차장', 'M.J Global Logistic Co.,Ltd.', 'Partner', '6F, Hyundai Insurance Building,   240, Jungang-daero, Dong-gu, Busan', '6F, Hyundai Insurance Building,   240', 'Busan', 0, 'Korea', '+82519212050', 'mjglb@mjglb.co.kr', 3, 'relationship', 1, 2.00),
(5, 'HaRam', 'Yoo', 'Staff 과장', 'M.J Global Logistic Co.,Ltd.', 'Partner', '6F, Hyundai Insurance Building,   240, Jungang-daero, Dong-gu, Busan', '6F, Hyundai Insurance Building,   240', 'Busan', 0, 'Korea', '+82514639224', 'mjglb@mjglb.co.kr', 3, 'relationship', 1, 2.00),
(6, 'Namseung', 'Baek', 'ceo', 'RV LOGISTICS ', 'Partner', '7F 20-38, Mugunghwa-Ro Ilsandong-Gu Goyang-Si, Gyeonggi-Do', '7F 20-38, Mugunghwa-Ro', 'Goyang', 0, 'Korea', '+821038979199 ', 'dwr1110@nate.com', 3, 'relationship', 1, 2.00),
(20, 'Alexander ', 'Rüttinger', 'Multimodale Dispo', 'EKB Container Logistik GmbH', 'Intermordal', 'Altenwerder Damm 1, 21129 Hamburg', 'Altenwerder Damm 1', 'Hamburg', 21129, 'Deutschland', '+4940741197614', 'bahn@ekb-bremen.de', 3, 'relationship', 1, 2.00),
(21, 'Olaf', 'Smoczynski', 'Branch Manager', 'Contargo Road Logistics', 'Intermordal', 'Indiastr. 1  20457  Hamburg ', 'Indiastr. 1', 'Hamburg', 20457, 'Deutschland', '+494080972521', 'osmoczynski@contargo.net', 3, 'relationship', 1, 2.00),
(22, 'Soenke ', 'Mehler', 'Leiter Vertrieb', 'Oetjen Logistik GmbH', 'Inlandtransp', 'Hermann-Schlüter-Str. 1 27356 Rotenburg ', 'Hermann-Schlüter-Str. 1', 'Rotenburg ', 27356, 'Deutschland', '+49 4261 677 6', 'soenke.mehler@oetjen.de', 3, 'relationship', 1, 2.00),
(23, 'Schmöller ', 'Stefan', 'Sales', 'S&D Car Transport GmbH', 'car transpor', 'Gewerbegebiet Manzing 2  94065 Waldkirchen', 'Gewerbegebiet Manzing 2', 'Waldkirchen', 94065, 'Deutschland', '+ 49 8581 910 ', 'info@sdcartransport.de', 3, 'relationship', 1, 2.00),
(24, 'Birgit ', 'Achenbach', 'Projektgeschäft', 'Spedition Bender GmbH', 'Inlandtransp', 'Alte Eisenstraße 2 -24   57258 Freudenberg ', 'Alte Eisenstraße 2 -24 ', 'Freudenberg ', 57258, 'Deutschland', ' +49 2734284 8', 'bachenbach@spedition-bender.de', 3, 'relationship', 1, 2.00);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contact_status`
--

CREATE TABLE `contact_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `contact_status`
--

INSERT INTO `contact_status` (`id`, `status`) VALUES
(1, 'lead'),
(2, 'opportunity'),
(3, 'customer/won'),
(4, 'archive');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notes`
--

CREATE TABLE `notes` (
  `id` int(11) UNSIGNED NOT NULL,
  `Date` date DEFAULT NULL,
  `Notes` tinytext,
  `Is_New_Todo` int(11) UNSIGNED NOT NULL,
  `Todo_Type_ID` int(11) UNSIGNED NOT NULL,
  `Todo_Desc_ID` int(11) UNSIGNED NOT NULL,
  `Todo_Due_Date` varchar(29) DEFAULT NULL,
  `Contact` int(11) UNSIGNED NOT NULL,
  `Task_Status` int(11) UNSIGNED NOT NULL,
  `Task_Update` varchar(51) DEFAULT NULL,
  `Sales_Rep` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `notes`
--

INSERT INTO `notes` (`id`, `Date`, `Notes`, `Is_New_Todo`, `Todo_Type_ID`, `Todo_Desc_ID`, `Todo_Due_Date`, `Contact`, `Task_Status`, `Task_Update`, `Sales_Rep`) VALUES
(1, '2014-07-11', 'ddddd', 1, 1, 1, '07/23/2014 6:00pm to 8:00pm', 1, 1, '', 1),
(2, '2015-10-10', 'Sample Note', 0, 1, 1, NULL, 2, 1, NULL, 2),
(3, '2015-05-21', 'sx', 1, 1, 2, '07/31/2014', 3, 1, '', 1),
(4, '2014-06-01', 'Want to be sure to communicate weekly.', 1, 2, 3, '07/04/2014 10:00am to 10:30am', 4, 1, 'Ongoing', 1),
(5, '2014-01-31', 'Was introduced at textile conference.zzz', 1, 1, 1, '04/09/2014 3:45pm to 4:45pm', 5, 2, 'Great demo. All they needed to seal the deal.<br>', 1),
(6, '2014-11-11', 'Great to have this customer on board!', 0, 1, 4, NULL, 6, 1, NULL, 1),
(7, '2017-01-27', 'test', 0, 1, 2, '', 3, 1, '', 1),
(8, '2017-01-11', 'test123', 0, 1, 5, NULL, 6, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Sales Rep'),
(2, 'Sales Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `task_status`
--

INSERT INTO `task_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'completed');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todo_desc`
--

CREATE TABLE `todo_desc` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `todo_desc`
--

INSERT INTO `todo_desc` (`id`, `description`) VALUES
(1, 'Follow Up Email'),
(2, 'Phone Call'),
(3, 'Lunch Meeting'),
(4, 'Tech Demo'),
(5, 'Meetup'),
(6, 'Conference'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todo_type`
--

CREATE TABLE `todo_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `todo_type`
--

INSERT INTO `todo_type` (`id`, `type`) VALUES
(1, 'task'),
(2, 'meeting');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name_Title` varchar(30) DEFAULT NULL,
  `Name_First` varchar(10) NOT NULL,
  `Name_Middle` varchar(10) DEFAULT NULL,
  `Name_Last` varchar(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `User_Roles` int(6) UNSIGNED NOT NULL,
  `User_Status` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `Name_Title`, `Name_First`, `Name_Middle`, `Name_Last`, `username`, `email`, `password`, `User_Roles`, `User_Status`) VALUES
(1, NULL, 'Johnny', NULL, 'Rep', 'Kim', 'rep@test.com', '123456', 1, 1),
(2, NULL, 'Mary', NULL, 'Rep', 'Lee', 'rep2@test.com', '123456', 1, 1),
(7, NULL, 'Lyida ', NULL, 'Lee', 'debak', 'support@debaktra.com', '$2y$10$slHLogx4GoLzf2p.rO1VGuTD8Ssy6yXm2407G72tp627zhVsYFczW', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'pending approval');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SALES_REP` (`Sales_Rep`),
  ADD KEY `FK_STATUS` (`Status`);

--
-- Indizes für die Tabelle `contact_status`
--
ALTER TABLE `contact_status`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EVENT_NAME` (`Todo_Type_ID`),
  ADD KEY `FK_EVENT_TYPE` (`Todo_Desc_ID`),
  ADD KEY `FK_CONTACT_ID` (`Contact`),
  ADD KEY `FK_SALES_ID` (`Sales_Rep`),
  ADD KEY `FK_TASK_STATUS` (`Task_Status`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `todo_desc`
--
ALTER TABLE `todo_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `todo_type`
--
ALTER TABLE `todo_type`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_STATUS` (`User_Status`),
  ADD KEY `FK_ROLE` (`User_Roles`);

--
-- Indizes für die Tabelle `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `contact_status`
--
ALTER TABLE `contact_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `todo_desc`
--
ALTER TABLE `todo_desc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `todo_type`
--
ALTER TABLE `todo_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_SALES_REP` FOREIGN KEY (`Sales_Rep`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_STATUS` FOREIGN KEY (`Status`) REFERENCES `contact_status` (`id`);

--
-- Constraints der Tabelle `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_CONTACT_ID` FOREIGN KEY (`Contact`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `FK_EVENT_NAME` FOREIGN KEY (`Todo_Type_ID`) REFERENCES `todo_type` (`id`),
  ADD CONSTRAINT `FK_EVENT_TYPE` FOREIGN KEY (`Todo_Desc_ID`) REFERENCES `todo_desc` (`id`),
  ADD CONSTRAINT `FK_SALES_ID` FOREIGN KEY (`Sales_Rep`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_TASK_STATUS` FOREIGN KEY (`Task_Status`) REFERENCES `task_status` (`id`);

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ROLE` FOREIGN KEY (`User_Roles`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_USER_STATUS` FOREIGN KEY (`User_Status`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
