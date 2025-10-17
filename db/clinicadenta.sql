-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2025 a las 05:15:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadenta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `odontologo_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` text DEFAULT NULL,
  `estado` enum('pendiente','atendida','cancelada') DEFAULT 'pendiente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_06_161320_create_registros_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontologos`
--

CREATE TABLE `odontologos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `odontologos`
--

INSERT INTO `odontologos` (`id`, `nombre`, `apellido`, `ci`, `especialidad`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(2, 'gloriaa', 'quisbert', '987654321', 'donctora', '225556484', 'doctora@gmail.com', '2025-04-14 04:20:23', '2025-04-14 06:07:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `email`, `fecha_nacimiento`, `genero`, `direccion`, `created_at`, `updated_at`) VALUES
(19, 'victor01', 'alave001', '99765325 lp', '77269885', 'victor@gmail.com', '2025-04-30', 'Masculino', 'colo,mbia.', '2025-04-14 03:21:14', '2025-04-14 03:21:39'),
(21, 'jose', 'luis', '997653255', '6121', 'jose@gmail.com', '2025-04-22', 'Masculino', 'asdfasdg', '2025-04-14 03:22:26', '2025-04-14 03:22:26'),
(23, 'luis', 'mamani', '9656481', '7726066411', 'aasdf@gmail.com', '2025-04-24', 'Femenino', 'sadf', '2025-04-14 04:04:19', '2025-04-14 04:04:19'),
(24, 'jorger', 'alave1', '541', '561156', 'aasasb@gmail.com', '0000-00-00', '', '', '2025-04-14 04:05:18', '2025-04-14 04:05:18'),
(25, 'asdf', 'alave', 'as324', '3245', '234235a@gmail.com', '0000-00-00', '', '', '2025-04-14 04:07:28', '2025-04-14 04:07:28'),
(26, 'luiss', 'mamani', '123456789', '772564864', 'luisc@gmail.com', '0231-11-23', 'Masculino', 'asdf', '2025-04-14 04:14:46', '2025-04-14 04:14:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$0dn3buIlPm5q./MMgIUz1O9l9rO3NdNTutiMOiT6QBM3RwSDf4Te.', '2025-02-14 06:25:47'),
('tantani@gmail.com', '$2y$12$QXts2NoYiBrzopz/KJCgMu5A15Ciqp.xUnaPhno96Tcfr/i7dBjSS', '2025-02-27 00:43:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `groupby` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permission`
--

INSERT INTO `permission` (`id`, `name`, `slug`, `groupby`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'Dashboard', 0, NULL, NULL),
(2, 'User', 'User', 1, NULL, NULL),
(3, 'Add User', 'Add User', 1, NULL, NULL),
(4, 'Edit User', 'Edit User', 1, NULL, NULL),
(5, 'Delete User', 'Delete User', 1, NULL, NULL),
(6, 'Role', 'Role', 2, NULL, NULL),
(7, 'Add Role', 'Add Role', 2, NULL, NULL),
(8, 'Edit Role', 'Edit Role', 2, NULL, NULL),
(9, 'Delete Role', 'Delete Role', 2, NULL, NULL),
(10, 'Category', 'Category', 3, NULL, NULL),
(11, 'Add Category', 'Add Category', 3, NULL, NULL),
(12, 'Edit Category', 'Edit Category', 3, NULL, NULL),
(13, 'Delete Category', 'Delete Category', 3, NULL, NULL),
(14, 'Sub Category', 'Sub Category', 4, NULL, NULL),
(15, 'Add Sub Category', 'Add Sub Category', 4, NULL, NULL),
(16, 'Edit Sub Category', 'Edit Sub Category', 4, NULL, NULL),
(17, 'Delete Sub Category', 'Delete Sub Category', 4, NULL, NULL),
(18, 'Product', 'Product', 5, NULL, NULL),
(19, 'Add Product', 'Add Product', 5, NULL, NULL),
(20, 'Edit Product', 'Edit Product', 5, NULL, NULL),
(21, 'Delete Product', 'Delete Product', 5, NULL, NULL),
(22, 'Setting', 'Setting', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(318, 10, 1, '2025-02-04 22:49:15', '2025-02-04 22:49:15'),
(319, 10, 2, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(320, 10, 6, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(321, 10, 10, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(322, 10, 14, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(323, 10, 18, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(324, 11, 1, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(325, 11, 2, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(326, 11, 6, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(327, 11, 10, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(328, 11, 14, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(329, 11, 18, '2025-02-04 22:49:16', '2025-02-04 22:49:16'),
(578, 1, 2, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(579, 1, 3, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(580, 1, 4, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(581, 1, 5, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(582, 1, 6, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(583, 1, 7, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(584, 1, 8, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(585, 1, 9, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(586, 1, 10, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(587, 1, 11, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(588, 1, 12, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(589, 1, 13, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(590, 1, 14, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(591, 1, 15, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(592, 1, 16, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(593, 1, 17, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(594, 1, 18, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(595, 1, 19, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(596, 1, 20, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(597, 1, 21, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(598, 1, 22, '2025-02-09 15:51:09', '2025-02-09 15:51:09'),
(599, 3, 3, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(600, 3, 4, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(601, 3, 6, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(602, 3, 7, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(603, 3, 8, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(604, 3, 10, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(605, 3, 11, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(606, 3, 13, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(607, 3, 14, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(608, 3, 15, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(609, 3, 17, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(610, 3, 18, '2025-02-26 20:40:43', '2025-02-26 20:40:43'),
(611, 3, 20, '2025-02-26 20:40:43', '2025-02-26 20:40:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `total_horas` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `nombre`, `fecha_entrada`, `fecha_salida`, `total_horas`, `created_at`, `updated_at`) VALUES
(1, 'rick', '2024-12-06 12:20:00', '2024-12-06 20:23:00', 8.05, '2024-12-06 20:27:47', '2024-12-06 20:27:47'),
(2, 'rick12', '2024-12-11 12:43:00', '2024-12-19 12:43:00', 192.00, '2024-12-06 20:43:43', '2024-12-06 20:43:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', '2024-12-12 23:28:42', '2024-12-13 00:10:24'),
(3, 'empleado', '2024-12-13 00:10:33', '2024-12-13 00:10:33'),
(12, 'usuario', '2025-02-05 21:45:12', '2025-02-05 21:45:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ef9RcLjCdnhHM9aR7ZQcXaoiHDthAQNw73I5sxNR', 35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaGxHMmh2T3paQlBOM1Zad0xIVmszaDhINFE5aGlCaGlHRFZ6eTVvciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvY2xpbmljYWRlbnRhbC9wYW5lbC90cmF0YW1pZW50b3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNTt9', 1744599016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(11) NOT NULL,
  `cita_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `estado` enum('en_proceso','completado','cancelado') DEFAULT 'en_proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `estado`) VALUES
(35, 'admin', 'admin@gmail.com', NULL, '$2y$12$GWF3TOymBsdx/RBr8fDM7eCKJtAXA8BEEc7houpm29wswfNgtumMa', 1, NULL, '2025-02-08 02:17:18', '2025-02-08 04:05:34', 1),
(36, 'usuario', 'derrick@gmailcom', NULL, '$2y$12$7/TMDUSgSpZLy67LqjzZ6e3lpYtKWE/oAJOAVE7qZljp/AAPOWPmS', 3, NULL, '2025-02-08 02:17:34', '2025-02-08 04:01:35', 1),
(38, 'limber', 'limber@gmail.com', NULL, '$2y$12$DxFGKcf5KTOYfu7AvdanFuveljPMNI/UbAuFpWkActqsegI0SRJ..', 12, NULL, '2025-02-08 03:15:37', '2025-02-27 00:15:29', 1),
(40, 'tantani', 'tantani@gmail.com', NULL, '$2y$12$XlkRY0a9cR6k0o0cp9.3xeAJuLh0nvkouCTn7YrdQbl91/Ua8bxgK', 3, NULL, '2025-02-14 05:54:54', '2025-02-27 00:40:57', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `odontologo_id` (`odontologo_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `odontologos`
--
ALTER TABLE `odontologos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ci` (`ci`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cita_id` (`cita_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `odontologos`
--
ALTER TABLE `odontologos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`odontologo_id`) REFERENCES `odontologos` (`id`);

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `tratamientos_ibfk_1` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
