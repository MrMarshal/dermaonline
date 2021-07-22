-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 09:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dermaonline_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `townhall` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `principal` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`) VALUES
(1, 'HD Cosmetic Efficiency', '');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `shipping` float NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `total`, `discount`, `shipping`, `coupon_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 6600, '100.00', 0, 0, 1, '2021-07-21 19:00:25', '0000-00-00 00:00:00'),
(2, 0, 2790, '100.00', 0, 1, 1, '2021-07-21 19:07:46', '0000-00-00 00:00:00'),
(3, 0, 1760, '100.00', 0, 1, 1, '2021-07-21 19:10:28', '2021-07-21 19:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `image` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'Categoría 1', '', ''),
(2, 'Categoría 2', '', ''),
(3, 'Categoría 3', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `amount` float(10,2) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `valid_date` date NOT NULL,
  `minimum_amount` float(10,2) NOT NULL,
  `used` int(11) NOT NULL,
  `uses` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `amount`, `type`, `valid_date`, `minimum_amount`, `used`, `uses`, `user_id`, `status`) VALUES
(1, 'valido', 100.00, 'amount', '2022-07-21', 1000.00, 0, 1000000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `product_id`, `quantity`, `cost`, `status`) VALUES
(1, 1, 8, 2, 1890.00, 1),
(2, 1, 6, 1, 945.00, 1),
(3, 1, 1, 1, 930.00, 1),
(4, 1, 4, 1, 945.00, 1),
(5, 1, 23, 2, 1890.00, 1),
(6, 5, 1, 2, 1860.00, 1),
(7, 2, 1, 2, 1860.00, 2),
(8, 2, 1, 3, 2790.00, 1),
(9, 3, 1, 2, 1860.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `normal` float(10,2) NOT NULL,
  `offer` float(10,2) NOT NULL,
  `wholesale` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `normal`, `offer`, `wholesale`) VALUES
(1, 1, 930.00, 900.00, 850.00),
(2, 2, 945.00, 900.00, 850.00),
(3, 3, 945.00, 900.00, 850.00),
(4, 4, 945.00, 900.00, 850.00),
(5, 5, 945.00, 900.00, 850.00),
(6, 6, 945.00, 900.00, 850.00),
(7, 7, 945.00, 900.00, 850.00),
(8, 8, 945.00, 900.00, 850.00),
(9, 9, 945.00, 900.00, 850.00),
(10, 10, 945.00, 900.00, 850.00),
(11, 11, 945.00, 900.00, 850.00),
(12, 12, 945.00, 900.00, 850.00),
(13, 13, 945.00, 900.00, 850.00),
(14, 14, 945.00, 900.00, 850.00),
(15, 15, 945.00, 900.00, 850.00),
(16, 16, 945.00, 900.00, 850.00),
(17, 17, 945.00, 900.00, 850.00),
(18, 18, 945.00, 900.00, 850.00),
(19, 19, 945.00, 900.00, 850.00),
(20, 20, 945.00, 900.00, 850.00),
(21, 21, 945.00, 900.00, 850.00),
(22, 22, 945.00, 900.00, 850.00),
(23, 23, 945.00, 900.00, 850.00),
(24, 24, 945.00, 900.00, 850.00),
(25, 25, 945.00, 900.00, 850.00),
(26, 26, 945.00, 900.00, 850.00),
(27, 27, 945.00, 900.00, 850.00),
(28, 28, 945.00, 900.00, 850.00),
(29, 29, 945.00, 900.00, 850.00),
(30, 30, 945.00, 900.00, 850.00),
(31, 31, 945.00, 900.00, 850.00),
(32, 32, 945.00, 900.00, 850.00),
(33, 33, 945.00, 900.00, 850.00),
(34, 34, 945.00, 900.00, 850.00),
(35, 35, 945.00, 900.00, 850.00),
(36, 36, 945.00, 900.00, 850.00),
(37, 37, 945.00, 900.00, 850.00),
(38, 38, 945.00, 900.00, 850.00),
(39, 39, 945.00, 900.00, 850.00),
(40, 40, 945.00, 900.00, 850.00),
(41, 41, 945.00, 900.00, 850.00),
(42, 42, 945.00, 900.00, 850.00),
(43, 43, 945.00, 900.00, 850.00),
(44, 44, 945.00, 900.00, 850.00),
(45, 45, 945.00, 900.00, 850.00),
(46, 46, 945.00, 900.00, 850.00),
(47, 47, 945.00, 900.00, 850.00),
(48, 48, 945.00, 900.00, 850.00),
(49, 49, 945.00, 900.00, 850.00),
(50, 50, 945.00, 900.00, 850.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `seo_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `short_description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `advantages` text COLLATE utf8_spanish_ci NOT NULL,
  `tags` text COLLATE utf8_spanish_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `sku` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `seo_name`, `description`, `short_description`, `advantages`, `tags`, `brand_id`, `sku`, `status`) VALUES
(1, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\n\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(2, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(3, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(4, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(5, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(6, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(7, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(8, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(9, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(10, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(11, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(12, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(13, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(14, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(15, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(16, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(17, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(18, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(19, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(20, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(21, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(22, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(23, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(24, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(25, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(26, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(27, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(28, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(29, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(30, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(31, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(32, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(33, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(34, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(35, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(36, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(37, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(38, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(39, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(40, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(41, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(42, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(43, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(44, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(45, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(46, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(47, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(48, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(49, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(50, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1),
(51, 'Mas-k Detox & Oxygen', 'mas-k-detox-and-oxygen', 'Mascarilla Facial exfoliante con triple acción:\r\n\r\nOxigena la piel profundidad gracias a sus microburbujas de oxígeno.\r\nExfolia la piel gracias a sus partículas exfoliantes, papaína y ácido salicílico.\r\nDetoxifica gracias a su carbón activo, pantenol y vitamina C.\r\nIndicado para todo tipo de pieles. Aplicar de 1 a 3 veces por semana sobre la cara limpiar y húmeda con movimientos circulares suaves, dejar actuar entre 5 y 10 minutos y masajear nuevamente antes de limpiar su rostro con agua.', 'Mascarilla exfoliante y detoxificante. Limpieza profunda. Con 50 ml.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere impedit consectetur est aliquam eius enim exercitationem iure tempora suscipit. Quis odit harum non atque veniam suscipit sit neque quidem voluptatem.', '#acné#agua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más', 1, 'XXXX', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 1),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2),
(8, 6, 2),
(9, 7, 2),
(10, 8, 2),
(11, 9, 2),
(12, 10, 1),
(13, 11, 3),
(14, 12, 3),
(15, 13, 3),
(16, 14, 3),
(17, 15, 3),
(18, 16, 3),
(19, 17, 3),
(20, 18, 3),
(21, 19, 3),
(22, 20, 3),
(23, 21, 3),
(24, 22, 3),
(25, 23, 3),
(26, 24, 3),
(27, 25, 3),
(28, 26, 3),
(29, 27, 3),
(30, 28, 3),
(31, 29, 3),
(32, 30, 2),
(33, 31, 2),
(34, 32, 2),
(35, 33, 2),
(36, 34, 2),
(37, 35, 2),
(38, 36, 2),
(39, 37, 2),
(40, 38, 2),
(41, 39, 2),
(42, 40, 2),
(43, 41, 2),
(44, 42, 1),
(45, 43, 1),
(46, 44, 1),
(47, 45, 1),
(48, 46, 1),
(49, 47, 1),
(50, 48, 1),
(51, 49, 1),
(52, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `url`, `type`, `status`) VALUES
(1, 1, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(2, 1, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(3, 2, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(4, 2, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(5, 3, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(6, 3, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(7, 4, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(8, 4, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(9, 5, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(10, 5, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(11, 6, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(12, 6, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(13, 7, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(14, 7, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(15, 8, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(16, 8, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(17, 9, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(18, 9, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(19, 10, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(20, 10, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(21, 11, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(22, 11, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(23, 12, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(24, 12, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(25, 13, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(26, 13, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(27, 14, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(28, 14, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(29, 15, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(30, 15, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(31, 16, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(32, 16, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(33, 17, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(34, 17, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(35, 18, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(36, 18, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(37, 19, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(38, 19, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(39, 20, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(40, 20, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(41, 21, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(42, 21, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(43, 22, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(44, 22, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(45, 23, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(46, 23, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(47, 24, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(48, 24, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(49, 25, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(50, 25, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(51, 26, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(52, 26, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(53, 27, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(54, 27, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(55, 28, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(56, 28, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(57, 29, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(58, 29, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(59, 30, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(60, 30, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(61, 31, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(62, 31, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(63, 32, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(64, 32, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(65, 33, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(66, 33, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(67, 34, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(68, 34, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(69, 35, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(70, 35, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(71, 36, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(72, 36, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(73, 37, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(74, 37, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(75, 38, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(76, 38, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(77, 39, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(78, 39, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(79, 40, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(80, 40, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(81, 41, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(82, 41, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(83, 42, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(84, 42, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(85, 43, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(86, 43, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(87, 44, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(88, 44, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(89, 45, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(90, 45, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(91, 46, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(92, 46, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(93, 47, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(94, 47, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(95, 48, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(96, 48, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(97, 49, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(98, 49, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(99, 50, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(100, 50, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1),
(101, 51, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/06/HD-Mask.png', 1, 1),
(102, 51, 'https://cdn.statically.io/img/dermaonline.mx/f=auto%2Cq=80/wp-content/uploads/2021/04/Filorga-AGE-PURIFY-INTENSIVE-serum-double-correction-banner2.png', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tags` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tags`) VALUES
(1, 1, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(2, 2, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(3, 3, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(4, 4, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(5, 5, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(6, 6, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(7, 7, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(8, 8, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(9, 9, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(10, 10, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(11, 11, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(12, 12, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(13, 13, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(14, 14, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(15, 15, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(16, 16, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(17, 17, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(18, 18, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(19, 19, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(20, 20, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(21, 21, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(22, 22, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(23, 23, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(24, 24, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(25, 25, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(26, 26, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(27, 27, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(28, 28, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(29, 29, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(30, 30, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(31, 31, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(32, 32, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(33, 33, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(34, 34, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(35, 35, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(36, 36, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(37, 37, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(38, 38, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(39, 39, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(40, 40, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(41, 41, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(42, 42, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(43, 43, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(44, 44, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(45, 45, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(46, 46, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(47, 47, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(48, 48, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(49, 49, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(50, 50, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más'),
(51, 51, '#acnéagua#micellar#Antiedad#arrugas#Arrugas profundas#Otro tag#Otro más');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `quantity`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `nickname`, `phone`, `password`, `type`, `status`) VALUES
(1, 'Marshal', 'Shiosaki Zamudio', 'marshal@mail.com', 'marshal', '', '7a2793957f4bb790f446c5b48f7501ef', 2, 1),
(2, 'Isaac', '', '', '', '', '7a2793957f4bb790f446c5b48f7501ef', 3, 0),
(3, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 3, 0),
(4, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 3, 0),
(5, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 3, 0),
(6, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 3, 0),
(7, 'Marshal', 'Shiosaki', 'marshal@mail.com', '', '5514790052', '7a2793957f4bb790f446c5b48f7501ef', 3, 0),
(8, 'Isaac', 'Shiosaki', 'marshal@mail.com', 'marshal', '(551) 479-0052', '7a2793957f4bb790f446c5b48f7501ef', 3, 0),
(9, 'Marshal', 'Shiosaki', 'marshal5@mail.com', 'marshal5', '5514790052', '7a2793957f4bb790f446c5b48f7501ef', 3, 0),
(10, 'Bernardo', 'Alarcon', 'marshal6@mail.com', 'marshal6', '5511223344', '7a2793957f4bb790f446c5b48f7501ef', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
