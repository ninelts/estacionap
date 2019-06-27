-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2019 at 08:21 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id_car` varchar(6) NOT NULL,
  `id_model` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `name_model` varchar(45) NOT NULL,
  `type_model` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `name_payment` varchar(45) NOT NULL,
  `id_paytype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id_paytype` int(11) NOT NULL,
  `name_paytype` varchar(45) NOT NULL,
  `detail_paytype` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `id_qrcode` int(11) NOT NULL,
  `count_qrcode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `date_reserve` date DEFAULT NULL,
  `hour_reserve` time DEFAULT NULL,
  `id_tariff` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_payment` int(11) DEFAULT NULL,
  `id_reservetype` int(11) NOT NULL,
  `id_servdet` int(11) DEFAULT NULL,
  `id_qrcode` int(11) DEFAULT NULL,
  `id_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_type`
--

CREATE TABLE `reserve_type` (
  `id_reservetype` int(11) NOT NULL,
  `name_reservetype` varchar(45) NOT NULL,
  `description_reservetype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Dumping data for table `reserve_type`
--

INSERT INTO `reserve_type` (`id_reservetype`, `name_reservetype`, `description_reservetype`) VALUES
(1, 'Express', '¿Olvidaste hacer tu reserva? Entonces reserva Express! y asegura tu cupo.'),
(2, 'Diaria', 'Reserva tu espacio diario y ocúpalo de manera libre por todo el día!'),
(3, 'Mensual', 'Asegura el mes! y relájate pagando con TC a fin de mes');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id_seat` int(11) NOT NULL,
  `state_seat` tinyint(1) NOT NULL,
  `id_seatsection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id_seat`, `state_seat`, `id_seatsection`) VALUES
(1, 0, 1),
(2, 0, 1),
(3, 0, 1),
(4, 0, 1),
(5, 0, 1),
(6, 0, 1),
(7, 0, 1),
(8, 0, 1),
(9, 0, 1),
(10, 0, 1),
(11, 0, 2),
(12, 0, 2),
(13, 0, 2),
(14, 0, 2),
(15, 0, 2),
(16, 0, 2),
(17, 0, 2),
(18, 0, 2),
(19, 0, 2),
(20, 0, 2),
(21, 0, 0),
(22, 0, 0),
(23, 0, 0),
(24, 0, 0),
(25, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seat_section`
--

CREATE TABLE `seat_section` (
  `id_seatsection` int(11) NOT NULL,
  `name_seatsection` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat_section`
--

INSERT INTO `seat_section` (`id_seatsection`, `name_seatsection`) VALUES
(0, 'Fondo'),
(1, 'Izquierda'),
(2, 'Derecha');

-- --------------------------------------------------------

--
-- Table structure for table `service_detail`
--

CREATE TABLE `service_detail` (
  `id_servdet` int(11) NOT NULL,
  `starttime_servdet` time NOT NULL,
  `stoptime_servdet` time NOT NULL,
  `duration_servdet` int(11) NOT NULL,
  `mount_servdet` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `id_tariff` int(11) NOT NULL,
  `name_tariff` varchar(45) NOT NULL,
  `description_tariff` varchar(45) NOT NULL,
  `value_tariff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`id_tariff`, `name_tariff`, `description_tariff`, `value_tariff`) VALUES
(1, 'Tarifa Express', 'valor por minuto', 250),
(2, 'Tarifa Diaria', 'Valor fijo', 5000),
(3, 'Tarifa Mensual', 'Valor mes completo', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut` varchar(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `born` date NOT NULL,
  `user_type` int(10) UNSIGNED DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rut`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `born`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '19461893k', 'Fernando', 'Joost', 'fjoostr@gmail.com', '2019-06-19 09:17:14', '$2y$10$Qx4Ye50oI1ywYEeRxWzqNePlZgDXu670WAfhDntvScK/hlpKpv6C6', 944175966, '1111-11-11', 1, '4XB23UUdoFNv2LFlvGz4dc3qZBaLpbYJt6sstXOLHmTQWeuBjlVJOM4uTIyB', '2019-06-19 05:34:32', '2019-06-19 09:17:14'),
(5, '193047475', 'Catalina', 'Vidal', 'cvidal@gmail.com', NULL, '$2y$10$xK./oLH1UxtL772wXXiY1efBguCARuFZUQ6ku.Bd/nQDFkx5aAB0K', 123123123, '2019-06-23', 1, NULL, '2019-06-23 08:41:34', '2019-06-23 08:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_car`
--

CREATE TABLE `user_car` (
  `id_usercar` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_car` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`),
  ADD UNIQUE KEY `id_brand_UNIQUE` (`id_brand`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_car`),
  ADD UNIQUE KEY `patenteVehiculo_UNIQUE` (`id_car`),
  ADD KEY `fk_id_model` (`id_model`),
  ADD KEY `fk_id_brand` (`id_brand`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`),
  ADD UNIQUE KEY `id_model_UNIQUE` (`id_model`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD UNIQUE KEY `id_payment_UNIQUE` (`id_payment`),
  ADD KEY `fk_id_paytype` (`id_paytype`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id_paytype`),
  ADD UNIQUE KEY `id_paytype_UNIQUE` (`id_paytype`),
  ADD UNIQUE KEY `name_paytype_UNIQUE` (`name_paytype`);

--
-- Indexes for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id_qrcode`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`),
  ADD UNIQUE KEY `id_reserve_UNIQUE` (`id_reserve`),
  ADD KEY `fk_id_tariff` (`id_tariff`),
  ADD KEY `fk_id_payment` (`id_payment`),
  ADD KEY `fk_id_reservetype` (`id_reservetype`),
  ADD KEY `fk_id_servdet` (`id_servdet`),
  ADD KEY `fk_id_qrcode` (`id_qrcode`),
  ADD KEY `fk_id_seat` (`id_seat`),
  ADD KEY `fk_reserve_user_idx` (`id_user`);

--
-- Indexes for table `reserve_type`
--
ALTER TABLE `reserve_type`
  ADD PRIMARY KEY (`id_reservetype`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_seat`),
  ADD UNIQUE KEY `id_seat_UNIQUE` (`id_seat`),
  ADD KEY `fk_id_seatsection` (`id_seatsection`);

--
-- Indexes for table `seat_section`
--
ALTER TABLE `seat_section`
  ADD PRIMARY KEY (`id_seatsection`),
  ADD UNIQUE KEY `id_seat_section_UNIQUE` (`id_seatsection`);

--
-- Indexes for table `service_detail`
--
ALTER TABLE `service_detail`
  ADD PRIMARY KEY (`id_servdet`),
  ADD UNIQUE KEY `id_servdet_UNIQUE` (`id_servdet`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id_tariff`),
  ADD UNIQUE KEY `id_tariff_UNIQUE` (`id_tariff`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rut_UNIQUE` (`rut`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_car`
--
ALTER TABLE `user_car`
  ADD KEY `fk_id_car` (`id_car`),
  ADD KEY `fk_car_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_id_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_model` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_id_paytype` FOREIGN KEY (`id_paytype`) REFERENCES `payment_type` (`id_paytype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `fk_id_payment` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_qrcode` FOREIGN KEY (`id_qrcode`) REFERENCES `qr_code` (`id_qrcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_reservetype` FOREIGN KEY (`id_reservetype`) REFERENCES `reserve_type` (`id_reservetype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_seat` FOREIGN KEY (`id_seat`) REFERENCES `seat` (`id_seat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_servdet` FOREIGN KEY (`id_servdet`) REFERENCES `service_detail` (`id_servdet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_tariff` FOREIGN KEY (`id_tariff`) REFERENCES `tariff` (`id_tariff`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserve_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `fk_id_seatsection` FOREIGN KEY (`id_seatsection`) REFERENCES `seat_section` (`id_seatsection`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_car`
--
ALTER TABLE `user_car`
  ADD CONSTRAINT `fk_car_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_car` FOREIGN KEY (`id_car`) REFERENCES `car` (`id_car`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
