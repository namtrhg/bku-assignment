-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2021 lúc 08:47 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `namkute`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category_createAt` datetime DEFAULT NULL,
  `Category_updatedAt` datetime DEFAULT NULL,
  `Category_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`, `Category_createAt`, `Category_updatedAt`, `Category_hide`) VALUES
(1, 'Front', NULL, NULL, NULL),
(2, 'Back', NULL, NULL, NULL),
(3, 'Dev Ops', NULL, NULL, NULL),
(4, 'Help Desk', '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `Jobs_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Category_id` int(11) DEFAULT NULL,
  `Jobs_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Jobs_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Jobs_salary` int(11) DEFAULT NULL,
  `Jobs_createAt` datetime DEFAULT NULL,
  `Jobs_updatedAt` datetime DEFAULT NULL,
  `Jobs_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`Jobs_id`, `user_id`, `Category_id`, `Jobs_name`, `Jobs_description`, `Jobs_salary`, `Jobs_createAt`, `Jobs_updatedAt`, `Jobs_hide`) VALUES
(1, 1, 1, 'ABC', 'DEF', 100, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0),
(2, 1, 1, '21213', '2121', 1, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0),
(3, 1, 1, '1', '1', 1, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0),
(4, 1, 1, '1', '1', 1, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0),
(5, 1, 1, 'xczzxczxc', 'xczxcz', 11, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0),
(6, 1, 3, 'Bao ve', 'Nam Kute', 100, '2021-11-12 00:00:00', '2021-11-12 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_createAt` datetime DEFAULT NULL,
  `role_updatedAt` datetime DEFAULT NULL,
  `role_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_createAt`, `role_updatedAt`, `role_hide`) VALUES
(1, 'Admin', '2021-11-12 13:42:05', '2021-11-12 13:42:05', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_createAt` datetime DEFAULT NULL,
  `user_updatedAt` datetime DEFAULT NULL,
  `user_hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user_name`, `user_password`, `user_email`, `user_createAt`, `user_updatedAt`, `user_hide`) VALUES
(1, 1, 'namkute', 'xxx', 'xxxxx', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Jobs_id`),
  ADD KEY `ASSOCIATION_2_FK` (`user_id`),
  ADD KEY `ASSOCIATION_3_FK` (`Category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ASSOCIATION_1_FK` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_Association_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_Association_3` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
