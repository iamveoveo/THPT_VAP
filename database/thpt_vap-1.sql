-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2021 lúc 06:12 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thpt_vap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdID` int(100) NOT NULL,
  `AdName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdRName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdTel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdAdd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdGender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdBirth` date DEFAULT NULL,
  `AdAva` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ava.png',
  `AdStatus` int(11) NOT NULL DEFAULT 0,
  `AdCode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdID`, `AdName`, `AdRName`, `AdPassword`, `AdEmail`, `AdTel`, `AdAdd`, `AdGender`, `AdBirth`, `AdAva`, `AdStatus`, `AdCode`) VALUES
(9, 'iamveoveo', 'Đặng Quang Vinh', '$2y$10$f4IxGmQgRU0AmuAGeAS04OPDFT/xIpP//A/UU0zBMtRr3JDqOBmiO', 'vinhveoveo21@gmail.com', '0338873927', 'Hà Nội', 'Nam', '2001-05-27', 'ava.png', 2, '75371472'),
(10, 'dothingocanh0712', 'Đỗ Thị Ngọc Ánh', '$2y$10$rNsgjyTdC18SDZ/8w/4DMOhFi1fQ8jCBGKmbDt/B8TbFUVRUxGUBe', NULL, '0975246403', 'Thái Bình', 'Nữ', '2001-12-07', 'ava.png', 0, '87744914'),
(11, 'bongboochie', 'Trần Thị Phúc', '$2y$10$ZRr6k2/NhmSU1Mqx/G35HOKTsoUtfINrs8AB8FtQYWKdYOT7a/wM.', '', '0942323232', 'Nam Định', 'Nữ', '0000-00-00', 'ava.png', 0, '36250509');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ClassGrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`, `ClassGrade`) VALUES
(1, '10A1', 10),
(2, '11A1', 11),
(3, '12A1', 12),
(4, '12A2', 12),
(5, '12A3', 12),
(6, '10A2', 10),
(7, '10A3', 10),
(8, '11A3', 11),
(9, '11A2', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mess`
--

CREATE TABLE `mess` (
  `MessID` int(11) NOT NULL,
  `FromUserID` int(11) NOT NULL,
  `ToUserID` int(11) NOT NULL,
  `MessContent` text NOT NULL,
  `MessTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mess`
--

INSERT INTO `mess` (`MessID`, `FromUserID`, `ToUserID`, `MessContent`, `MessTime`) VALUES
(3, 3, 2, 'Thông báo hoãn thi do covid 19', '2021-07-27 19:24:23'),
(4, 2, 3, 'Cập nhật thời khóa biểu', '2021-10-22 19:24:23'),
(8, 1, 443, 'alo alo', '2021-11-05 01:01:23'),
(9, 1, 443, 't nè', '2021-11-05 01:01:24'),
(10, 1, 443, 'hsi hí ', '2021-11-05 01:01:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teach`
--

CREATE TABLE `teach` (
  `TeachID` int(11) NOT NULL,
  `Teacher_UserID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `TeachSubject` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `teach`
--

INSERT INTO `teach` (`TeachID`, `Teacher_UserID`, `ClassID`, `TeachSubject`) VALUES
(1, 1, 1, 'Văn'),
(6, 1, 4, 'Văn'),
(7, 2, 1, 'Toán'),
(8, 2, 3, 'Toán'),
(9, 1, 3, 'Văn'),
(10, 198, 6, 'Sinh học'),
(11, 198, 1, 'Sinh học'),
(12, 199, 1, 'Lý'),
(13, 199, 4, 'Lý'),
(14, 200, 6, 'Hóa'),
(15, 201, 3, 'Hóa'),
(16, 201, 2, 'Hóa'),
(18, 202, 6, 'Văn'),
(19, 203, 2, 'Văn'),
(20, 204, 3, 'Địa'),
(21, 204, 4, 'Địa'),
(22, 205, 2, 'Địa'),
(24, 206, 6, 'Tiếng Anh'),
(25, 207, 2, 'Sử'),
(26, 207, 4, 'Sử'),
(27, 208, 2, 'Thể dục'),
(28, 209, 4, 'Thể dục'),
(29, 210, 3, 'Công nghệ'),
(30, 211, 1, 'Tiếng Anh'),
(32, 212, 2, 'Công dân'),
(33, 212, 3, 'Công dân'),
(34, 200, 7, 'Hóa'),
(35, 201, 9, 'Hóa'),
(36, 202, 7, 'Văn'),
(37, 203, 9, 'Văn'),
(38, 203, 8, 'Văn'),
(39, 206, 7, 'Tiếng Anh'),
(40, 207, 9, 'Sử'),
(41, 207, 7, 'Sử'),
(42, 208, 8, 'Thể dục'),
(43, 209, 9, 'Thể dục'),
(44, 209, 7, 'Thể dục'),
(45, 211, 7, 'Tiếng Anh'),
(46, 212, 9, 'Công dân'),
(47, 212, 8, 'Công dân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transcript`
--

CREATE TABLE `transcript` (
  `Student_UserID` int(11) NOT NULL,
  `Subject` varchar(60) NOT NULL,
  `MidTerm` int(11) DEFAULT NULL,
  `FinalExam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transcript`
--

INSERT INTO `transcript` (`Student_UserID`, `Subject`, `MidTerm`, `FinalExam`) VALUES
(40, 'Anh', 10, 10),
(40, 'Thể dục', 9, 10),
(40, 'Văn', 9, 9),
(46, 'Thể dục', 10, 10),
(56, 'Công Dân', 9, 10),
(56, 'Hóa', 8, 10),
(56, 'Sinh học', 8, 7),
(56, 'Sử', 7, 5),
(59, 'Anh', 7, 8),
(59, 'Công Dân', 9, 10),
(59, 'Hóa', 9, 10),
(59, 'Lý', 9, 10),
(59, 'Sinh học', 6, 7),
(59, 'Sử', 9, 10),
(59, 'Thể dục', 9, 10),
(59, 'Văn', 6, 7),
(65, 'Anh', 3, 6),
(65, 'Công Dân', 9, 10),
(65, 'Hóa', 4, 6),
(65, 'Lý', 8, 8),
(65, 'Sinh học', 8, 6),
(65, 'Sử', 9, 10),
(65, 'Thể dục', 9, 10),
(65, 'Văn', 8, 6),
(68, 'Anh', 10, 7),
(68, 'Công Dân', 10, 7),
(68, 'Hóa', 10, 7),
(68, 'Lý', 9, 7),
(68, 'Sinh học', 7, 7),
(68, 'Sử', 10, 7),
(68, 'Thể dục', 9, 8),
(68, 'Văn', 7, 7),
(71, 'Anh', 8, 10),
(71, 'Công Dân', 7, 10),
(71, 'Hóa', 7, 8),
(71, 'Lý', 7, 9),
(71, 'Sinh học', 7, 5),
(71, 'Sử', 7, 10),
(71, 'Thể dục', 8, 9),
(71, 'Văn', 7, 5),
(74, 'Anh', 8, 8),
(74, 'Công Dân', 7, 8),
(74, 'Hóa', 8, 8),
(74, 'Lý', 8, 8),
(74, 'Sinh học', 8, 9),
(74, 'Sử', 8, 9),
(74, 'Thể dục', 8, 10),
(74, 'Văn', 8, 8),
(75, 'Anh', 9, 9),
(75, 'Công Dân', 9, 8),
(75, 'Hóa', 5, 2),
(75, 'Lý', 5, 2),
(75, 'Sinh học', 8, 10),
(75, 'Sử', 8, 10),
(75, 'Thể dục', 7, 9),
(75, 'Văn', 5, 2),
(76, 'Anh', 7, 8),
(76, 'Công Dân', 7, 8),
(76, 'Hóa', 7, 5),
(76, 'Lý', 7, 5),
(76, 'Sinh học', 7, 5),
(76, 'Sử', 7, 5),
(76, 'Thể dục', 7, 8),
(76, 'Văn', 7, 5),
(77, 'Anh', 8, 10),
(77, 'Công Dân', 8, 5),
(77, 'Hóa', 4, 5),
(77, 'Lý', 4, 5),
(77, 'Sinh học', 9, 10),
(77, 'Sử', 9, 10),
(77, 'Thể dục', 8, 10),
(77, 'Văn', 4, 5),
(78, 'Anh', 7, 8),
(78, 'Công Dân', 7, 8),
(78, 'Hóa', 7, 8),
(78, 'Lý', 7, 8),
(78, 'Sinh học', 9, 8),
(78, 'Sử', 9, 8),
(78, 'Thể dục', 7, 8),
(78, 'Văn', 7, 8),
(79, 'Anh', 8, 9),
(79, 'Công Dân', 8, 9),
(79, 'Hóa', 8, 7),
(79, 'Lý', 8, 7),
(79, 'Sinh học', 8, 7),
(79, 'Sử', 8, 7),
(79, 'Thể dục', 8, 9),
(79, 'Văn', 8, 7),
(80, 'Anh', 7, 8),
(80, 'Công Dân', 7, 8),
(80, 'Hóa', 7, 8),
(80, 'Lý', 7, 8),
(80, 'Sinh học', 8, 8),
(80, 'Sử', 8, 8),
(80, 'Thể dục', 7, 8),
(80, 'Văn', 7, 8),
(81, 'Anh', 8, 10),
(81, 'Công Dân', 8, 9),
(81, 'Hóa', 8, 9),
(81, 'Lý', 8, 9),
(81, 'Sinh học', 8, 9),
(81, 'Sử', 8, 9),
(81, 'Thể dục', 8, 10),
(81, 'Văn', 8, 9),
(100, 'Anh', 8, 9),
(100, 'Công dân', 7, 9),
(100, 'Hóa', 7, 9),
(100, 'Lý', 6, 6),
(100, 'Sinh học', 6, 6),
(100, 'Sử', 6, 6),
(100, 'Toán', 7, 6),
(100, 'Văn', 6, 6),
(101, '', 7, 8),
(101, 'Anh', 7, 8),
(101, 'Công Dân', 7, 8),
(101, 'Lý', 6, 3),
(101, 'Sinh học', 4, 9),
(101, 'Sử', 4, 9),
(101, 'Thể dục', 9, 9),
(101, 'Toán', 9, 9),
(101, 'Địa', 8, 4),
(103, 'Anh', 8, 10),
(103, 'Công dân', 8, 10),
(103, 'Hóa', 8, 10),
(103, 'Lý', 8, 8),
(103, 'Sinh học', 8, 8),
(103, 'Sử', 8, 8),
(103, 'Toán', 5, 8),
(103, 'Văn', 8, 8),
(104, '', 9, 10),
(104, 'Anh', 9, 10),
(104, 'Công Dân', 9, 10),
(104, 'Lý', 7, 5),
(104, 'Sinh học', 7, 5),
(104, 'Sử', 7, 5),
(104, 'Thể dục', 7, 5),
(104, 'Toán', 7, 5),
(104, 'Địa', 7, 5),
(106, 'Anh', 7, 5),
(106, 'Công dân', 5, 8),
(106, 'Hóa', 5, 8),
(106, 'Lý', 9, 7),
(106, 'Sinh học', 9, 7),
(106, 'Sử', 9, 6),
(106, 'Toán', 5, 3),
(106, 'Văn', 9, 6),
(107, '', 9, 10),
(107, 'Anh', 9, 10),
(107, 'Công Dân', 9, 10),
(107, 'Lý', 6, 7),
(107, 'Sinh học', 7, 8),
(107, 'Sử', 7, 8),
(107, 'Thể dục', 8, 8),
(107, 'Toán', 8, 8),
(107, 'Địa', 7, 8),
(109, 'Anh', 9, 10),
(109, 'Công dân', 9, 10),
(109, 'Hóa', 9, 10),
(109, 'Lý', 7, 9),
(109, 'Sinh học', 7, 9),
(109, 'Sử', 7, 9),
(109, 'Toán', 4, 9),
(109, 'Văn', 7, 9),
(110, '', 5, 7),
(110, 'Anh', 5, 7),
(110, 'Công Dân', 8, 7),
(110, 'Lý', 2, 5),
(110, 'Sinh học', 8, 5),
(110, 'Sử', 8, 5),
(110, 'Thể dục', 10, 5),
(110, 'Toán', 10, 5),
(110, 'Địa', 8, 5),
(111, '', 7, 10),
(111, 'Anh', 7, 10),
(111, 'Công Dân', 10, 10),
(111, 'Lý', 10, 8),
(111, 'Sinh học', 9, 8),
(111, 'Sử', 9, 8),
(111, 'Thể dục', 9, 8),
(111, 'Toán', 9, 8),
(111, 'Địa', 7, 8),
(113, '', 8, 7),
(113, 'Anh', 8, 7),
(113, 'Công Dân', 8, 7),
(113, 'Lý', 8, 7),
(113, 'Sinh học', 6, 7),
(113, 'Sử', 6, 7),
(113, 'Thể dục', 8, 7),
(113, 'Toán', 8, 7),
(113, 'Địa', 8, 7),
(115, 'Anh', 9, 8),
(115, 'Công dân', 7, 8),
(115, 'Hóa', 7, 8),
(115, 'Lý', 4, 7),
(115, 'Sinh học', 4, 7),
(115, 'Sử', 4, 7),
(115, 'Toán', 4, 6),
(115, 'Văn', 4, 7),
(116, '', 5, 7),
(116, 'Anh', 5, 7),
(116, 'Công Dân', 7, 7),
(116, 'Lý', 7, 7),
(116, 'Sinh học', 7, 7),
(116, 'Sử', 7, 7),
(116, 'Thể dục', 7, 10),
(116, 'Toán', 7, 10),
(116, 'Địa', 7, 8),
(118, 'Anh', 8, 7),
(118, 'Công dân', 9, 7),
(118, 'Hóa', 9, 7),
(118, 'Lý', 7, 7),
(118, 'Sinh học', 7, 7),
(118, 'Sử', 8, 7),
(118, 'Toán', 8, 7),
(118, 'Văn', 8, 7),
(119, 'Anh', 8, 8),
(119, 'Công dân', 8, 8),
(119, 'Hóa', 8, 8),
(119, 'Lý', 8, 5),
(119, 'Sinh học', 8, 5),
(119, 'Sử', 6, 5),
(119, 'Toán', 6, 5),
(119, 'Văn', 6, 5),
(120, '', 8, 5),
(120, 'Anh', 8, 5),
(120, 'Công Dân', 10, 5),
(120, 'Lý', 9, 9),
(120, 'Sinh học', 9, 10),
(120, 'Sử', 9, 10),
(120, 'Thể dục', 8, 10),
(120, 'Toán', 8, 10),
(120, 'Địa', 8, 10),
(121, '', 8, 8),
(121, 'Anh', 8, 8),
(121, 'Công Dân', 8, 8),
(121, 'Lý', 8, 8),
(121, 'Sinh học', 6, 8),
(121, 'Sử', 6, 8),
(121, 'Thể dục', 5, 8),
(121, 'Toán', 5, 8),
(121, 'Địa', 5, 8),
(122, '', 6, 9),
(122, 'Anh', 6, 9),
(122, 'Công Dân', 6, 9),
(122, 'Lý', 6, 9),
(122, 'Sinh học', 6, 9),
(122, 'Sử', 6, 9),
(122, 'Thể dục', 6, 9),
(122, 'Toán', 6, 9),
(122, 'Địa', 6, 9),
(123, 'Anh', 8, 9),
(123, 'Công dân', 8, 9),
(123, 'Hóa', 8, 9),
(123, 'Lý', 8, 9),
(123, 'Sinh học', 8, 9),
(123, 'Sử', 8, 9),
(123, 'Toán', 8, 9),
(123, 'Văn', 8, 9),
(124, 'Anh', 8, 10),
(124, 'Công dân', 8, 10),
(124, 'Hóa', 8, 10),
(124, 'Lý', 8, 10),
(124, 'Sinh học', 8, 10),
(124, 'Sử', 8, 6),
(124, 'Toán', 8, 6),
(124, 'Văn', 8, 6),
(128, 'Anh', 5, 10),
(128, 'Công Dân', 8, 10),
(128, 'Hóa', 8, 9),
(128, 'Lý', 7, 8),
(128, 'Thể dục', 8, 10),
(128, 'Toán', 8, 9),
(128, 'Văn', 5, 10),
(128, 'Địa', 7, 8),
(129, 'Anh', 8, 7),
(129, 'Công Dân', 9, 6),
(129, 'Hóa', 8, 4),
(129, 'Lý', 7, 6),
(129, 'Thể dục', 9, 6),
(129, 'Toán', 8, 4),
(129, 'Văn', 8, 7),
(129, 'Địa', 7, 6),
(131, 'Anh', 5, 4),
(131, 'Công Dân', 5, 9),
(131, 'Hóa', 9, 8),
(131, 'Lý', 5, 8),
(131, 'Thể dục', 5, 9),
(131, 'Toán', 9, 8),
(131, 'Văn', 5, 4),
(131, 'Địa', 5, 8),
(132, 'Anh', 6, 9),
(132, 'Công Dân', 8, 9),
(132, 'Hóa', 10, 9),
(132, 'Lý', 8, 9),
(132, 'Thể dục', 8, 9),
(132, 'Toán', 10, 9),
(132, 'Văn', 6, 9),
(132, 'Địa', 8, 9),
(137, 'Anh', 8, 10),
(137, 'Công Dân', 10, 8),
(137, 'Hóa', 9, 8),
(137, 'Lý', 8, 8),
(137, 'Thể dục', 10, 8),
(137, 'Toán', 9, 8),
(137, 'Văn', 8, 10),
(137, 'Địa', 8, 8),
(140, 'Anh', 8, 7),
(140, 'Công Dân', 8, 7),
(140, 'Hóa', 8, 10),
(140, 'Lý', 8, 10),
(140, 'Thể dục', 8, 7),
(140, 'Toán', 8, 10),
(140, 'Văn', 8, 7),
(140, 'Địa', 8, 10),
(143, 'Anh', 0, 0),
(143, 'Công Dân', 0, 0),
(143, 'Hóa', 0, 0),
(143, 'Lý', 0, 0),
(143, 'Thể dục', 0, 0),
(143, 'Toán', 0, 0),
(143, 'Văn', 0, 0),
(143, 'Địa', 0, 0),
(259, 'Anh', 8, 9),
(259, 'Công dân', 8, 9),
(259, 'Hóa', 10, 9),
(259, 'Lý', 8, 9),
(259, 'Sử', 6, 7),
(259, 'Toán', 10, 9),
(259, 'Văn', 8, 9),
(260, 'Anh', 8, 4),
(260, 'Công dân', 10, 8),
(260, 'Hóa', 8, 9),
(260, 'Lý', 8, 4),
(260, 'Sử', 8, 5),
(260, 'Toán', 8, 9),
(260, 'Văn', 10, 8),
(261, 'Anh', 9, 8),
(261, 'Công dân', 9, 8),
(261, 'Hóa', 10, 8),
(261, 'Lý', 9, 8),
(261, 'Sử', 7, 4),
(261, 'Toán', 10, 8),
(261, 'Văn', 9, 8),
(264, 'Anh', 10, 9),
(264, 'Công dân', 9, 8),
(264, 'Hóa', 9, 8),
(264, 'Lý', 10, 9),
(264, 'Sử', 8, 8),
(264, 'Toán', 9, 8),
(264, 'Văn', 9, 8),
(267, 'Anh', 9, 8),
(267, 'Công dân', 9, 8),
(267, 'Hóa', 9, 8),
(267, 'Lý', 9, 8),
(267, 'Sử', 7, 8),
(267, 'Toán', 9, 8),
(267, 'Văn', 9, 8),
(270, 'Anh', 8, 10),
(270, 'Công dân', 8, 9),
(270, 'Hóa', 8, 9),
(270, 'Lý', 8, 10),
(270, 'Sử', 8, 9),
(270, 'Toán', 8, 9),
(270, 'Văn', 8, 9),
(279, 'Anh', 6, 8),
(279, 'Hóa', 9, 8),
(279, 'Lý', 10, 8),
(279, 'Sinh', 6, 8),
(279, 'Thể dục', 9, 8),
(279, 'Toán', 10, 8),
(280, 'Anh', 7, 3),
(280, 'Hóa', 8, 10),
(280, 'Lý', 7, 9),
(280, 'Sinh', 7, 3),
(280, 'Thể dục', 8, 10),
(280, 'Toán', 7, 9),
(281, 'Anh', 7, 4),
(281, 'Hóa', 8, 9),
(281, 'Lý', 8, 8),
(281, 'Sinh', 7, 4),
(281, 'Thể dục', 8, 9),
(281, 'Toán', 8, 8),
(282, 'Anh', 4, 9),
(282, 'Hóa', 9, 9),
(282, 'Lý', 4, 9),
(282, 'Sinh', 4, 9),
(282, 'Thể dục', 9, 9),
(282, 'Toán', 4, 9),
(283, 'Anh', 8, 8),
(283, 'Hóa', 8, 10),
(283, 'Lý', 8, 8),
(283, 'Sinh', 8, 8),
(283, 'Thể dục', 8, 10),
(283, 'Toán', 8, 8),
(284, 'Anh', 6, 8),
(284, 'Hóa', 8, 9),
(284, 'Lý', 8, 9),
(284, 'Sinh', 6, 8),
(284, 'Thể dục', 8, 9),
(284, 'Toán', 8, 9),
(285, 'Anh', 8, 8),
(285, 'Hóa', 10, 8),
(285, 'Lý', 10, 8),
(285, 'Sinh', 8, 8),
(285, 'Thể dục', 10, 8),
(285, 'Toán', 10, 8),
(286, 'Anh', 8, 7),
(286, 'Hóa', 8, 7),
(286, 'Lý', 8, 7),
(286, 'Sinh', 8, 7),
(286, 'Thể dục', 8, 7),
(286, 'Toán', 8, 7),
(287, 'Anh', 6, 7),
(287, 'Hóa', 8, 9),
(287, 'Lý', 9, 10),
(287, 'Sinh', 8, 8),
(287, 'Sử', 8, 8),
(287, 'Thể', 8, 9),
(287, 'Toán', 9, 10),
(288, 'Anh', 8, 5),
(288, 'Hóa', 10, 8),
(288, 'Lý', 10, 10),
(288, 'Sinh', 9, 7),
(288, 'Sử', 9, 7),
(288, 'Thể', 10, 8),
(288, 'Toán', 10, 10),
(289, 'Anh', 7, 4),
(289, 'Hóa', 7, 8),
(289, 'Lý', 9, 8),
(289, 'Sinh', 7, 4),
(289, 'Sử', 7, 4),
(289, 'Thể', 7, 8),
(289, 'Toán', 9, 8),
(290, 'Anh', 8, 8),
(290, 'Hóa', 6, 10),
(290, 'Lý', 8, 8),
(290, 'Sinh', 6, 10),
(290, 'Sử', 6, 10),
(290, 'Thể', 6, 10),
(290, 'Toán', 8, 8),
(291, 'Anh', 7, 8),
(291, 'Hóa', 6, 8),
(291, 'Lý', 8, 8),
(291, 'Sinh', 8, 8),
(291, 'Sử', 8, 8),
(291, 'Thể', 6, 8),
(291, 'Toán', 8, 8),
(292, 'Anh', 8, 9),
(292, 'Hóa', 8, 7),
(292, 'Lý', 9, 7),
(292, 'Sinh', 8, 9),
(292, 'Sử', 8, 9),
(292, 'Thể', 8, 7),
(292, 'Toán', 9, 7),
(293, 'Anh', 5, 8),
(293, 'Hóa', 8, 8),
(293, 'Lý', 8, 8),
(293, 'Sinh', 8, 8),
(293, 'Sử', 8, 8),
(293, 'Thể', 8, 8),
(293, 'Toán', 8, 8),
(294, 'Anh', 7, 7),
(294, 'Hóa', 8, 7),
(294, 'Lý', 8, 7),
(294, 'Sinh', 7, 7),
(294, 'Sử', 7, 7),
(294, 'Thể', 8, 7),
(294, 'Toán', 8, 7),
(295, 'Anh', 8, 10),
(295, 'Hóa', 8, 10),
(295, 'Lý', 8, 10),
(295, 'Sinh', 8, 10),
(295, 'Sử', 8, 10),
(295, 'Thể', 8, 10),
(295, 'Toán', 8, 10),
(296, 'Anh', 6, 8),
(296, 'Hóa', 6, 8),
(296, 'Lý', 6, 8),
(296, 'Sinh', 6, 8),
(296, 'Sử', 6, 8),
(296, 'Thể', 6, 8),
(296, 'Toán', 6, 8),
(411, 'Anh', 7, 6),
(411, 'Công dân', 6, 8),
(411, 'Hóa', 6, 8),
(411, 'Lý', 9, 10),
(411, 'Sinh', 7, 6),
(411, 'Sử', 9, 10),
(411, 'Thể dục', 9, 10),
(411, 'Toán', 9, 10),
(414, 'Anh', 9, 10),
(414, 'Công dân', 9, 6),
(414, 'Hóa', 9, 6),
(414, 'Lý', 4, 6),
(414, 'Sinh', 9, 10),
(414, 'Sử', 4, 6),
(414, 'Thể dục', 10, 7),
(414, 'Toán', 4, 6),
(417, 'Anh', 8, 6),
(417, 'Công dân', 9, 10),
(417, 'Hóa', 9, 10),
(417, 'Lý', 9, 10),
(417, 'Sinh', 8, 6),
(417, 'Sử', 9, 10),
(417, 'Thể dục', 9, 10),
(417, 'Toán', 9, 10),
(421, 'Anh', 10, 9),
(421, 'Công dân', 10, 9),
(421, 'Hóa', 10, 9),
(421, 'Lý', 7, 5),
(421, 'Sinh', 10, 9),
(421, 'Sử', 7, 5),
(421, 'Thể dục', 7, 9),
(421, 'Toán', 7, 5),
(423, 'Anh', 7, 6),
(423, 'Công dân', 8, 6),
(423, 'Hóa', 8, 6),
(423, 'Lý', 8, 6),
(423, 'Sinh', 7, 6),
(423, 'Sử', 8, 6),
(423, 'Thể dục', 8, 10),
(423, 'Toán', 8, 6),
(426, 'Anh', 8, 7),
(426, 'Công dân', 8, 7),
(426, 'Hóa', 8, 7),
(426, 'Lý', 8, 7),
(426, 'Sinh', 8, 7),
(426, 'Sử', 8, 7),
(426, 'Thể dục', 8, 7),
(426, 'Toán', 8, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserTel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserAdd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserGender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserBirth` date DEFAULT NULL,
  `UserAva` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'ava.png',
  `UserStatus` int(11) NOT NULL DEFAULT 0,
  `UserCode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRoll` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserChild` int(11) DEFAULT NULL,
  `UserClass` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserRName`, `UserPassword`, `UserEmail`, `UserTel`, `UserAdd`, `UserGender`, `UserBirth`, `UserAva`, `UserStatus`, `UserCode`, `UserRoll`, `UserChild`, `UserClass`) VALUES
(1, 'phuong', 'Vũ Thu Phương', '$2y$10$OMFy2xswomtj3jYhVgIk8.FreT6UWQgM1rcovvoPjr3aOsmHqiZkG', 'vinhveoveo21@gmail.com', '0942323232', 'Hà Nội', 'Nữ', '2001-10-17', 'co-xuyen.png', 1, '64218321', 'Giáo viên', NULL, NULL),
(2, 'Quang', 'Trần Đại Quang', '\r\n', 'daiquang@gmail.com', '0923535534', 'Nam Định', 'Nam', '2004-10-28', 'thay-minh.png', 0, '1', 'Giáo viên', NULL, NULL),
(3, 'Tô Lâm', 'Lâm', '\r\n', 'doanh0712@gmail.com', '0925848848', 'Hà Nội', 'Nam', '2001-05-10', 'ava.png', 0, '1', 'Phụ huynh', 40, NULL),
(40, '[value-2]', 'Nguyễn Ngọc Ngà', '', 'abc@gmail.com', '03311554488', 'Hà Nam', 'Nữ', '1988-12-08', 'ava.png', 0, '', 'Học sinh', NULL, 1),
(46, 'nguyentu', 'Đặng Nguyễn Tú Nguyên', '$2y$10$pLzsjZWP4jyxVwq1UdNuCeopXynZ2T1b6O10ceLUBaC4NOUIx2YTW', '', '338873927', 'Hà Nội', 'Nữ', '2002-02-05', 'ava.png', 0, '', 'Học sinh', NULL, 1),
(53, 'Vinh', 'Quang Vinh', '$2y$10$hS0GLAEkVCm3FB63M2ekGe1MBe7LwWUIvJi/d7aWjBBCJFTtjDCEG', 'vinhveoveo21@gmail.com', '925848848', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 1, '70309880', 'Phụ huynh', 46, NULL),
(55, 'nguyenngocnga103', 'Nguyễn Ngọc Ngà', '$2y$10$Kf7CpYlIw8KI5L7exopTYuUksE0TkDdt1d42MFV74fmGk0.W2G21a', '', '3311554488', 'Hà Nam', 'Nữ', '0000-00-00', 'ava.png', 0, '50240205', 'Học sinh', NULL, 1),
(56, 'dangnguyentunguyen104', 'Đặng Nguyễn Tú Nguyên', '$2y$10$vjrIqqFCH8La.JgBRzeFKu4YYC1DTtjfJvrawDlT7Iyb3VSSYciHa', '', '98873927', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '63791170', 'Học sinh', NULL, 1),
(59, 'buitronghuy102', 'Bùi Trọng Huy', '$2y$10$t26CildHiR7aVLeCefx69enp2mJMJUw/cN75/BYZ0tyqn1i8Wyr8y', '', '345667778', 'Hà Giang', 'Nam', '0000-00-00', 'ava.png', 0, '72200074', 'Học sinh', NULL, 1),
(65, 'leanhtuyet110', 'Lê Ánh Tuyết', '$2y$10$8Ktkc1TeYBg.vctfyCqJUuU8mz87C3g8PH/npQk2uSsNsjX.1Dvf2', 'doanh0712@gmail.com', '954367723', 'Hà Nội', 'Nữ', '0000-00-00', '65202111523464.jpg', 1, '66437571', 'Học sinh', NULL, 1),
(68, 'maibaolinh113', 'Mai Bảo Linh', '$2y$10$5RjB8Mvm7StjJ6PCB8CSU.z7fD9u5ZdU.CDEdZA0K9xAuBC84oKVC', '', '865544332', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '55456054', 'Học sinh', NULL, 1),
(71, 'buikimkhoi116', 'Bùi Kim Khôi', '$2y$10$9u7l/VZCZZL4jm5k/rvKueIaEB603KPR47MLR1cAhDACBMw/U90c6', '', '987654321', 'Bắc Ninh', 'Nam', '0000-00-00', 'ava.png', 0, '70861439', 'Học sinh', NULL, 1),
(74, 'tanamanh119', 'Tạ Nam Anh', '$2y$10$JPQZPwDg./rsLvGp/yiY0ekDrullgw.aosS9f84hCGQqidPF2lKEm', '', '987654321', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '46398247', 'Học sinh', NULL, 2),
(75, 'tahaibinh120', 'Tạ Hải Bình', '$2y$10$vlIgF.ocm3TYMLckM6GtnuoibWcoOzm6TCthlgDKZrNiZWlq2JZx2', '', '765427654', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '33765823', 'Học sinh', NULL, 2),
(76, 'lenamchung121', 'Lê Nam Chung', '$2y$10$2Uxqhset7hv.2hjmlbd8GOZ76yqu.p7NBa17xmKGTzttvQpvrVwzm', '', '543876543', 'Nam Định', 'Nam', '0000-00-00', 'ava.png', 0, '22017062', 'Học sinh', NULL, 2),
(77, 'nguyenngoclinh122', 'Nguyễn Ngọc  Linh', '$2y$10$AR0ZR4VsK7saFbS/YnaaOe6eYTgOOfvfOvli9BjJxBzCZkBkr8HO6', '', '87654324', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '80013163', 'Học sinh', NULL, 2),
(78, 'phanquanghuy123', 'Phan Quang Huy', '$2y$10$x6YQy9nxxuyx6vJO1kVNBuwmkzIBwBn9GG6E7jce16h9/am2TEsdu', '', '876543217', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '41734194', 'Học sinh', NULL, 2),
(79, 'phamnhuquynh124', 'Phạm Quỳnh Như', '$2y$10$BA27sPS6/mWQp77FvkJSpuNo5MWj2A8pZOpg168caCvGV5uCmcdeO', '', '876543215', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '49788525', 'Học sinh', NULL, 2),
(80, 'nguytrucnhi125', 'Nguyễn Trúc Nhi', '$2y$10$cqekF3vZHOncVraq9B9Ofeh6SmaX8dBMlALPrbun1Lk0gW3xO1eYe', '', '98763114', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '33344701', 'Học sinh', NULL, 2),
(81, 'doanbangoc126', 'Đoàn Bá Ngọc', '$2y$10$tn7vm8LNS4j.3XFreBf9MOhf2y97M7UApLH0pIUQYXBLNbursItAW', '', '98765421', 'Phú Thọ', 'Nam', '0000-00-00', 'ava.png', 0, '22860755', 'Học sinh', NULL, 2),
(100, 'nguyenthevinh145', 'Nguyễn Thế Vinh', '$2y$10$VANtWrwOnNEYC4meZQmA..A3XpcTz3jsbcMtzxmWY0EfMKBpnuNWK', '', '985679081', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '63196561', 'Học sinh', NULL, 3),
(101, 'hoangthevu146', 'Hoàng Thế Vũ', '$2y$10$zsS0zSqR9VZDrbw7BIkbPeNtb0oBld98clQ0qBrENqOsxP5awo1eu', '', '985679215', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '51849093', 'Học sinh', NULL, 4),
(103, 'maiphuongtrang148', 'Mai Phương Trang', '$2y$10$lf.lv.O5vh/b6G2b08kAA.nK6qKJr5CR5RQNsDrz9UFF5doYrd1oG', '', '987654581', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '79795316', 'Học sinh', NULL, 3),
(104, 'phungtruonggiang149', 'Phùng Trường Giang', '$2y$10$T1z2HnSl3fWYNrhzOEgp3uM7CGRbD61t9SPmq.EBi8fctQY1ogCt6', '', '987654835', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '65903558', 'Học sinh', NULL, 4),
(106, 'laianhnhung151', 'Lại Ánh Nhung', '$2y$10$ltICN.6vBy9osxI3NFiYaOj30j1JyfFC29xddGYDSo8hnUJ8t9Scq', '', '765432649', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '66862508', 'Học sinh', NULL, 3),
(107, 'tranphuonglan152', 'Trần Phương Lan', '$2y$10$lNsMfcWjBjxjvPvKVtO/u.1CCCsMTI8AfxQJbZ8kH3K9HKwbbUNtC', '', '765432757', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '71911097', 'Học sinh', NULL, 4),
(109, 'nguyenngoctuan154', 'Nguyễn Ngọc Tuấn', '$2y$10$gOC.keZshKtURzTtNGgqZecOWY6CPwMzSxgvfBU4Gu6CIF7Nh.WSW', '', '985679070', 'Hà Nam', 'Nam', '0000-00-00', 'ava.png', 0, '64471258', 'Học sinh', NULL, 3),
(110, 'nguyenthivan155', 'Nguyễn Thị Vân', '$2y$10$6klK7OXc/6uPXfnPwxu/YeysB9VdP37WzgguWVWEMQmwfqsuz.7Sm', '', '985679204', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '53950070', 'Học sinh', NULL, 4),
(111, 'phammylinh156', 'Phạm Mỹ Linh', '$2y$10$sBXHECrpe8jZPKgFAiJRDOh7qQIIe8YaYo85ELfGx8oEsOB0VTqoq', '', '985679338', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '23332812', 'Học sinh', NULL, 4),
(113, 'levancuong158', 'Lê Văn Cường', '$2y$10$fbxRy6Bh5ql9lBd9uDVCJ.tdQmbbuYKxPb4ZUFQZUKVVRnT8NQp6y', '', '985679606', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '48670053', 'Học sinh', NULL, 4),
(115, 'nguyenxuananh160', 'Bùi Bảo Quốc', '$2y$10$lDYSF5DLF0ruppBIFMtDUejjgq1Uwu1kx/adXJRuYcum3inrhKXSO', '', '987655092', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '98159301', 'Học sinh', NULL, 3),
(116, 'nguyenxuananh161', 'Nguyễn Xuân Ánh', '$2y$10$Aox0XJURgMaK.SXibVd4beSm0BiOaqicQMv4MS.BXDuWdtqSS8.K6', '', '988764463', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '82791817', 'Học sinh', NULL, 4),
(118, 'nguyenngocanh163', 'Nguyễn Ngọc Anh', '$2y$10$uQ56pFwuxS5vz503yV7/lOf2hB00zkzMpeDutQ4/cP8yO6DKh2eMW', '', '87654669', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '89210349', 'Học sinh', NULL, 3),
(119, 'lequocchung164', 'Lý Quốc Chung', '$2y$10$L0D9lRPS1LvZR6UDx4Y35ezQMNSDAEZ3KADmcLZLXcwPa4O73DZ2C', '', '876543562', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '15724861', 'Học sinh', NULL, 3),
(120, 'langoclinh165', 'La Ngọc Linh', '$2y$10$sDa27iC1QbFn73UMZH94texVRm8o8Cxf7tOMqHXKZGLKQHkbzfHge', '', '876543560', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '93029969', 'Học sinh', NULL, 4),
(121, 'nguyenthiminh166', 'Nguyễn Thị Minh', '$2y$10$SuCYgyNLQ1DuYLV0T3/UBeAQkoNK7Vv8Ed6OpdFmCqCDwcvzr/XK.', '', '98763459', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '66376368', 'Học sinh', NULL, 4),
(122, 'hohainam167', 'Hồ Hải Nam', '$2y$10$S8YCCocGgWn8VxZngrnO2OEygRpTMK8cEr3S1.VcZMeEykjlTooJy', '', '98765766', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '24498455', 'Học sinh', NULL, 4),
(123, 'nguyenngocanninh168', 'Nguyễn Ngọc An Ninh', '$2y$10$1/w4dsixNEG5rR7Vv/Alc.R701GPESiH0EZuBHuP8NC81zkdvlzr.', '', '987654666', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '62897106', 'Học sinh', NULL, 3),
(124, 'hoangvietbach169', 'Hoàng Việt Bách', '$2y$10$/LzuihjSSKN/C623cZsnfuXmRGioKaF28On6AZFHK.aGIRbga2ume', '', '765432482', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '18126656', 'Học sinh', NULL, 3),
(128, 'donguyenkhang100', 'Đỗ Nguyên Khang', '$2y$10$VwCI3qnB.YuUlBSFPwbrYeOoThqzVr8evZEeeQqygNirT2qZpCoRi', '', '987433452', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '90069430', 'Học sinh', NULL, 6),
(129, 'tranmythao101', 'Trần Mỹ Thảo', '$2y$10$kDjhGwNx049qCIryYBLkCefJPiAK2awqbwLhUI7xZwiIToBqb5ZmC', '', '986453427', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '56406353', 'Học sinh', NULL, 6),
(131, 'lebinhquang105', 'Lê Bình Quang', '$2y$10$QnqIzJXqM1tMnjIAASfGQe4Sfnc07Nasyq/73c//YMooHrTi1E3nS', '', '324567667', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '73529280', 'Học sinh', NULL, 6),
(132, 'nguyenhungoc106', 'Nguyễn Như Ngọc', '$2y$10$7RgIGFTPbXd1M31LvW4Pve3d1kiNwU5foGwD.LJ7xD8rO4nsGRiJm', '', '532225437', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '67921553', 'Học sinh', NULL, 6),
(137, 'phungnhatminh111', 'Phùng Nhật Minh', '$2y$10$L3Aqh5fJ9JRRPQ6ymmSHm.fNxSeHPrAA.Ts1R.cqHghUMx1qbAEQK', '', '98765432', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '20890583', 'Học sinh', NULL, 6),
(140, 'lehoangdiep114', 'Lê Hoàng Điệp', '$2y$10$6XbFmdvW4bwHW2mEzihJu.uM5g00v2hlzAG6jmIoZnrK/Nln6.70a', '', '243546645', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '59809168', 'Học sinh', NULL, 6),
(143, 'legialinh117', 'Lê Gia Linh', '$2y$10$WVgJhvS83XbwSLyIoLYv5u833feF5y4UI9XH4CRENgvPkrnnI9rHy', '', '987654327', 'Hải Phòng', 'Nữ', '0000-00-00', 'ava.png', 0, '64055073', 'Học sinh', NULL, 6),
(198, 'hoangtruonggiang300', 'Hoàng Trường Giang', '$2y$10$S/u98UPrTpadDqEQH2gdaOGrSG3cvbw3nx9B489o5OP7yXimEA/we', 'doanh0712@gmail.com', '765435677', 'Hà Nội', 'Nam', '0000-00-00', 'thay-nam.png', 1, '23188179', 'Giáo viên', NULL, NULL),
(199, 'vungocnguyen301', 'Vũ Ngọc Nguyên', '$2y$10$5Z6VpblYSLXR6qAoLr9K4edSYpDYUPtAJ9CWjNkai7ne0Xz2uMigW', '', '987568976', 'Hà Nội', 'Nam', '0000-00-00', 'hsinh-thanh.png', 0, '62316021', 'Giáo viên', NULL, NULL),
(200, 'nguyenhanhphuc302', 'Nguyễn Hạnh Phúc', '$2y$10$wYgO5zxpFLE70lkjfWoOLudc1PFUVL2fw31fk4sY7spwDwcBzb75.', '', '543211232', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '71724154', 'Giáo viên', NULL, NULL),
(201, 'doangiaminh303', 'Đoàn Gia Minh', '$2y$10$1sw6iurkhGJwmQ9V9kjVfu6yfvNl3uTsfdOu8qjVC.wEEoVmNsdl2', '', '986346424', 'Ninh Bình', 'Nam', '0000-00-00', 'ava.png', 0, '56950995', 'Giáo viên', NULL, NULL),
(202, 'vuvanngoc304', 'Vũ Văn Ngọc', '$2y$10$wjp4G9cq0Aot2Dyw.k0F7ONFhk7VOTSa6VSAEZEqwzx6ILzh3Fg.C', '', '987567654', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '88574407', 'Giáo viên', NULL, NULL),
(203, 'lemylinh305', 'Lê Mỹ Linh', '$2y$10$TjPut1bWSIuUyJUSCVFW1O6WVkWs3B5XZCnHcFSBA/w3uLWX.E6aW', '', '376856788', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '54568455', 'Giáo viên', NULL, NULL),
(204, 'nguyenthaotrang306', 'Nguyễn Thảo Trang', '$2y$10$tbteHkL2V4BsHH0FLdG6ReFTALBZc0tmQzGpzflmAqwhfz1b0N8xi', '', '945678754', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '50700674', 'Giáo viên', NULL, NULL),
(205, 'laihainam307', 'Lại Hải Nam', '$2y$10$BUvjjKwGfQvWA/7H/RRvBeGODk.Q0mHlOa/Ufr675CuCKW1OS5sxO', '', '988767654', 'Vĩnh Phúc', 'Nam', '0000-00-00', 'ava.png', 0, '82531211', 'Giáo viên', NULL, NULL),
(206, 'vulinhtruc308', 'Vũ Linh Trúc', '$2y$10$y7gpIhnc84xlmM2US2Ga3.JquLpQ6mapEzQtaI0Yeypi/bkpmgN3u', '', '987876564', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '23536372', 'Giáo viên', NULL, NULL),
(207, 'nguyenbahanh309', 'Nguyễn Bá Hạnh', '$2y$10$YkqzOS47AolZJek2JwSWSunK.mHl.8wQY1o.Yxjd2zgunLBCnqVyi', '', '934565433', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '90256272', 'Giáo viên', NULL, NULL),
(208, 'nguenthithao310', 'Nguyễn Thị Thảo', '$2y$10$PnL5RzrlEAsNjysPvDV9wu4ziyuPdFu35X2KQVADD4bJQ5JjPwvkS', '', '987345778', 'Hưng Yên', 'Nữ', '0000-00-00', 'ava.png', 0, '84259007', 'Giáo viên', NULL, NULL),
(209, 'dangvanminh311', 'Đặng Văn Minh', '$2y$10$hYAy.4tftcYvuSdv1k8HgOtTB0OFAWHzcg8/86jeFGuydLuPe1SHy', '', '978654334', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '46441802', 'Giáo viên', NULL, NULL),
(210, 'vuvanchung312', 'Vũ Văn Chung', '$2y$10$6GZOv5h.Wv.gflhYKkVHSux0fYolTMdq8SJZWiPn/pqP8MbxKslcm', '', '987654545', 'Nam Định', 'Nam', '0000-00-00', 'ava.png', 0, '13557221', 'Giáo viên', NULL, NULL),
(211, 'talananh313', 'Tạ Lan Anh', '$2y$10$ZAxSUGaQG.B9whUQWpwUYe/K/TH.gwNw.pmociAaVylzxQz04y6k6', '', '934232112', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '58646796', 'Giáo viên', NULL, NULL),
(212, 'lechungduc314', 'Lê Chung Đức', '$2y$10$FvDx1ezGnhPwDNWjdzHAAOzjAwErQ4T0sG0ewsvLCf2YBPZeE5kxC', '', '932232323', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '62555011', 'Giáo viên', NULL, NULL),
(259, 'phamdaominhthu107', 'Phạm Đào Minh Thư', '$2y$10$GyJNq/3pKYUcumkI9afNR.NSFCufLiZpEYnmyh1vML35oDYcFRipi', '', '654321543', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '13704859', 'Học sinh', NULL, 7),
(260, 'trannamphong108', 'Trần Nam Phong', '$2y$10$SCYAxXjNgv3J6d7OiDOIXOeuQwrYldzEjcI2uNlCBIH.dXx4Dmv2K', '', '965432345', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '84050604', 'Học sinh', NULL, 7),
(261, 'phanhongminh109', 'Phan Hồng Minh', '$2y$10$XTlO2yj.YPUFVxt.H.ZAyORpJAPFYK.Pz5zHLMvFz8ytNcd3aybd6', '', '976653434', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '96991254', 'Học sinh', NULL, 7),
(264, 'dangbaophuc112', 'Đặng Bảo Phúc', '$2y$10$Tmo3vJu6oK9A6KE7Vwj3xOiOIk3h99RDq3pEofGJspaVmrpVsaWXq', '', '345432322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '50246248', 'Học sinh', NULL, 7),
(267, 'nguyenngochoanganh115', 'Nguyễn Ngọc Hoàng Anh', '$2y$10$KesW6PB08Aoxgea7V2OGpexw.bM7gb1XxSb1hMvc48eato3E4mvbS', '', '7865432343', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '77390992', 'Học sinh', NULL, 7),
(270, 'dominhbaochau118', 'Đỗ Minh Bảo Châu', '$2y$10$WRtustJXq1flFGOtUghRfez/zp1NXlCZR7thwqmRGMzbzrJ0/kEvW', '', '809876543', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '32164770', 'Học sinh', NULL, 7),
(279, 'nguyenthihuonggiang127', 'Nguyễn Thị Hương Giang', '$2y$10$8GlNTaUoESbhJh0x5jqmD.Q65GKXDVvmWHGFNSIoWVe1/pEZfLhze', '', '987654321', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '38944716', 'Học sinh', NULL, 9),
(280, 'chuquocanh128', 'Chu Quốc Anh', '$2y$10$v5Fuablcy9L9gGIaaM6pau3LXApvXlz9U0xHL7SjycMLNisrdJXrS', '', '765432137', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '72089221', 'Học sinh', NULL, 9),
(281, 'phanvannam129', 'Phan Văn Nam', '$2y$10$Zo6TAgeaYwz5HL5Jowz4Z.s66ZXTFNIZ7r.SDq6QTOiQfsi9tIw.W', '', '765432135', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '51229822', 'Học sinh', NULL, 9),
(282, 'phamlinhtrang130', 'Phạm Linh Trang', '$2y$10$T2svJ.ok1cCufnWIa/rBGuiSekCJU1KVasYSW6iSH6J3LtPtux0XK', '', '765432243', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '59020154', 'Học sinh', NULL, 9),
(283, 'duongchiphat131', 'Dương Chi Phát', '$2y$10$bJRi.BBlpXE0Eka.NVYdsOPA7XOWtdWRORYplptT40VkPjAGJD.K.', '', '985678422', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '25736923', 'Học sinh', NULL, 9),
(284, 'laitrucmy132', 'Lại Trúc Mỹ', '$2y$10$enCcNCpH1JI4pO.fguw0W.DavB8llxLrT8uzzLV9gF/MgkRjkNeLW', '', '985678556', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '62611986', 'Học sinh', NULL, 9),
(285, 'truonggiaky133', 'Trương Gia Kỳ', '$2y$10$NNdEEcd3dk2A6ChLgEVvxeNiy7PaJAG0jRvwU37sXBTrFoo2UiDxq', '', '985678690', 'Thái Bình', 'Nữ', '0000-00-00', 'ava.png', 0, '15868938', 'Học sinh', NULL, 9),
(286, 'letrongduong134', 'Lê Trọng Dương', '$2y$10$IYcn.yhNtJi8ZHLhkkacdOjzHHxOnSTUo5DSffRq4pharx739IXX2', '', '985678824', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '20194730', 'Học sinh', NULL, 9),
(287, 'lygiahan135', 'Lý Gia Hân', '$2y$10$PIyHCWnSicvZd/SAiWZl8OLU5W59/tDNDs9dIcSy3obvVUVxpJA6a', '', '985678958', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '48534266', 'Học sinh', NULL, 8),
(288, 'letuyetlinh136', 'Lê Tuyết Linh', '$2y$10$7VkvVc2azk.2PRYAN2UTuuGzDgZ63oDjlJHw7gM77QLSFtp9G56SC', '', '985679092', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '62934525', 'Học sinh', NULL, 8),
(289, 'nguyennhunganh137', 'Nguyễn Nhung Anh', '$2y$10$ViURYJZAEkiRFyLYbZPFo.JD.3bBuK934TJSO7DQyUo7wR993gV9S', '', '987654324', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '21005607', 'Học sinh', NULL, 8),
(290, 'laihoanghiepquang138', 'Lại Hoàng Hiệp Quang', '$2y$10$9LHOzFEvqLS1P/KaPtkMheeBazSYM9bQhxkeZd6/unignDMPPIF8.', '', '987654578', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '73424047', 'Học sinh', NULL, 8),
(291, 'trannamcao139', 'Trần Nam Cao', '$2y$10$0df7bimnVZCp4PqxUZty9OzANgMhrwKnx4AaR1xaDl6vZS26eLlTG', '', '765432394', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '91137928', 'Học sinh', NULL, 8),
(292, 'luudiepanh140', 'Lưu Điệp Anh', '$2y$10$cXgibKU4UEro/MKFacax8ewbHItLhZyg4Var5xdCRlLm4QH2Yqgha', '', '765432392', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '17003453', 'Học sinh', NULL, 8),
(293, 'nguyenanhduc141', 'Nguyễn Anh Đức', '$2y$10$FAYNRglr9IoYpccAvsyeM.Pos1mr1gIGUx81W16QoBx.Rppjjdwme', '', '765432500', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '76877717', 'Học sinh', NULL, 8),
(294, 'nguyenthecuong142', 'Nguyễn Thế Cường', '$2y$10$Pe1o061CMuTDfbv2vVXqAeTZuJPa2QB.Z6iDdYchG01K8tcTQcQbO', '', '98765432', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '70209629', 'Học sinh', NULL, 8),
(295, 'phungvanphuc143', 'Phùng Văn Phúc', '$2y$10$NpTO1jLrNifqBBxKAIIblOBQNYvToT3j4uXMx3Z/jsoDPNsoq1mei', '', '985678813', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '90912360', 'Học sinh', NULL, 8),
(296, 'lahungcuong144', 'La Hùng Cường', '$2y$10$O3LklhEqnBd79aKV2WS.xuvmPok2uSKSW6p6.H0u3R5BmfksIsIRC', '', '985678947', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '98843589', 'Học sinh', NULL, 8),
(411, 'tranquoccong147', 'Trần Quốc Công', '$2y$10$zw7Wul.yzWWT87OQ7KJWuumIgT4lBWWhU4daP69Q4.yUbNiYYAXya', '', '985679349', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '83986153', 'Học sinh', NULL, 5),
(414, 'hoangquoccong150', 'Hoàng Quốc Công', '$2y$10$tIv7ZBwWmx0n/fHWVL/J2.inIdNiJYLVL5OmFHMrmoaoPE18KSK4.', '', '765432651', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '24218350', 'Học sinh', NULL, 5),
(417, 'dinhthithao153', 'Đinh Thị Thảo', '$2y$10$j/4gHo75Ca97ceGjvs5KS.aoJFpM9ivFfAbMfaG2hNs4aMFhqvx5y', '', '987654326', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '19058832', 'Học sinh', NULL, 5),
(421, 'lethilinh157', 'Lê Thị Linh', '$2y$10$vLQqsObXyI8mh3Hb0pZAn.qi2Qsd12QTxY1GaOeLUErsY9mFWqcyW', '', '985679472', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '17628547', 'Học sinh', NULL, 5),
(423, 'hoangviethai159', 'Hoàng Việt Hải', '$2y$10$WWqgx7EAVMGMotnu7Nqap.8k8TKIkFR2qzq9a3ScXdBlsfTNmc6Fq', '', '987654838', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '89814169', 'Học sinh', NULL, 5),
(426, 'levietanh162', 'Lê Việt Anh', '$2y$10$psPssfw35G.XD3QKzFvKoe7n2RZjJ.mGgocEXs16y9.H7DMjIkQmq', '', '543876888', 'Lào Cai', 'Nam', '0000-00-00', 'ava.png', 0, '32299203', 'Học sinh', NULL, 5),
(434, 'doquocphong200', 'Đỗ Quốc Phong', '$2y$10$FAAqufbn4ehj3aR/7cghu.sAK/Q8.jOweBFLCx9W0AEa7hWncauxy', 'doanh0712@gmail.com', '987654322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 1, '70613909', 'Phụ huynh', 128, NULL),
(435, 'tranvancao201', 'Trần Văn Cao', '$2y$10$kMsG9uVoht/7l/lWBpDB9.9/BmSUtkhUbDJq8t1rWiDlMTxLqzUAK', '', '987654324', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '19026320', 'Phụ huynh', 129, NULL),
(436, 'nguyenngoctram202', 'Nguyễn Ngọc Trâm', '$2y$10$261gNYPa2ebyryEnGgMeu.0T3zs95DBXnh63aiRsFPdkgCfj30WPa', '', '987654479', 'Hà Giang', 'Nữ', '0000-00-00', 'ava.png', 0, '99420061', 'Phụ huynh', 59, NULL),
(437, 'levanvinh203', 'Lê Văn Vinh', '$2y$10$Z9M8JoM5h2/sw9HBhuvQxer49clq24f8OnO2JN/qp0U1wTKau3/Bi', '', '987654322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '92160377', 'Phụ huynh', 131, NULL),
(438, 'nguyenthilanh204', 'Nguyễn Thị Lanh', '$2y$10$bxjr3piB4HOXkX92ZlDXKevc7RsARLM1RIpFb2cvM/BLzXDMIaQsu', '', '987654636', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '20512788', 'Phụ huynh', 132, NULL),
(439, 'phambaochung205', 'Phạm Bảo Chung', '$2y$10$ltLqpDLYDYVqg2QEIPU0iOVJAolrwX.oujaO35zXguCtTPq/qLQeO', '', '987654479', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '67349870', 'Phụ huynh', 259, NULL),
(440, 'tranhoangvan206', 'Trần Hoàng Vân', '$2y$10$QbtkTeyelhzcyQTTL2x4IeM62M3Fpq9xxyA2G1YX1HpeYlrQXdtDy', '', '987654793', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '98093105', 'Phụ huynh', 260, NULL),
(441, 'phanvancu207', 'Phan Văn Cừ', '$2y$10$kX1gxKCWomeKQU38dk/9o.ZlAyiQgltPMNHzCzVzBwXD.uwymtxc.', '', '987654636', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '10093467', 'Phụ huynh', 261, NULL),
(442, 'lengochien208', 'Lê Ngọc Chiến', '$2y$10$Z1ESv/iwkTrWkITJedZP0ug5bVpSxfu8YMpcpYa/0mMqYDCIcBqYa', '', '957654322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '31626746', 'Phụ huynh', 65, NULL),
(443, 'hoangthixuan209', 'Hoàng Thị Xuân', '$2y$10$uY2kfwZo684CWgJ0I5qFBuGGEKyuC1QvWrSCYyxUvVKOByfGDH3MW', '', '987654793', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '92070112', 'Phụ huynh', 137, NULL),
(444, 'dangvancuong210', 'Đặng Văn Cường', '$2y$10$sg4k1NXCCvzCxsOw7Iy4/.AJ1I7egt10ZCq9OuitFPtDb7/zXL.sa', '', '957654479', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '34938811', 'Phụ huynh', 264, NULL),
(445, 'maivanduc211', 'Mai Xuân Đức', '$2y$10$u5dNvbAqW3PC6fBKgcSE0uW4792uyZFVAWwra5gUWvNDCryIYCbR6', '', '987654950', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '58488379', 'Phụ huynh', 68, NULL),
(446, 'nguyenthinhan212', 'Nguyễn Thị Nhàn', '$2y$10$dH4cqZgGahK.suT8.7FaOugmtGdGPH.XnyXRGAJ5cQBDjIqhKdgay', '', '957654636', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '89539973', 'Phụ huynh', 140, NULL),
(447, 'phanthivan213', 'Phạm Thị Vân', '$2y$10$vw2iYAUq6CRRnfE.PS6LZ.rWubENswbyAWT0NJjuecejWP6RYgiSy', '', '987655107', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '55968582', 'Phụ huynh', 267, NULL),
(448, 'buigiahiep214', 'Bùi Gia Hiệp', '$2y$10$wUxKoY./QKsAjj6OEtQeROfkYzMqrjai4dMro9x.fbfNmr/5yzYXK', '', '957654793', 'Bắc Ninh', 'Nam', '0000-00-00', 'ava.png', 0, '23481269', 'Phụ huynh', 71, NULL),
(449, 'lecaovan215', 'Lê Cao Văn', '$2y$10$u.Pgn3ns38Q81i5yVsm9W.FqOj3DvyExs2abgFrJ0RcJAhqRTASZy', '', '987653232', 'Hải Phòng', 'Nam', '0000-00-00', 'ava.png', 0, '34884718', 'Phụ huynh', 143, NULL),
(450, 'nguyentuhong216', 'Nguyễn Tú Hồng', '$2y$10$SgA8BZ7ww9c9ntdENT3sR.7c8aziP1T3UJQyWxZUHcREwwNgNm6JK', '', '463474574', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '99558400', 'Phụ huynh', 270, NULL),
(451, 'tabangoc217', 'Tạ Bá Ngọc', '$2y$10$rD1ngpSpm9wcE/2Shxw2R.eRD0szX9mueGdCfyAhq5hSoJl8WSaIm', '', '987654322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '16148011', 'Phụ huynh', 74, NULL),
(452, 'tavanhai218', 'Tạ Văn Hải', '$2y$10$AkQeJMnGcHkmPBIyJbM9b...AuqNjCgH/YNw/9A9amqEK5gZLwzJK', '', '234568878', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '90307892', 'Phụ huynh', 75, NULL),
(453, 'hoangthiminh219', 'Hoàng Thị Minh', '$2y$10$mxIthEUxZv9u68HmU7Xn2uK72AzKy/o1wH0phzSkMQW/GREeUX5vC', '', '987654324', 'Nam Định', 'Nữ', '0000-00-00', 'ava.png', 0, '96373882', 'Phụ huynh', 76, NULL),
(454, 'nguyenngocanh220', 'Nguyễn Ngọc Anh', '$2y$10$09O51a4vrp0h21jHjUCiVO.rvMq/8TUQ4vrYhATqFLYxwnt7dnChy', '', '957654480', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '32369579', 'Phụ huynh', 77, NULL),
(455, 'phanhoainam221', 'Phan Hoài Nam', '$2y$10$QK8ZaRR.3hzqzMMbm8xTn.hB07dFZZ.AHRaFdn2aBP8tmQw.tkL0u', '', '987654951', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '13528698', 'Phụ huynh', 78, NULL),
(456, 'phamvandao222', 'Phạm Văn Đào', '$2y$10$sB4f7JtwKyTLfAaFLuVenuvQWcfrpzl1U3ZRr78NUmCOObg9Xyw72', '', '957654637', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '82458737', 'Phụ huynh', 79, NULL),
(457, 'nguyenmyhanh223', 'Nguyễn Mỹ Hạnh', '$2y$10$Bpqc7ZVkbzWySfD0WdD9buxVo0xBDJFNZb7appmEB99A7tQZJ90NO', '', '925678545', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '29379104', 'Phụ huynh', 80, NULL),
(458, 'lehaibinh224', 'Lê Hải Bình', '$2y$10$AvVvloAeedZLK/scqtv8ReN14jsvaTGPtNuDLjxVBi9Iqj17QFMSC', '', '957654794', 'Phú Thọ', 'Nữ', '0000-00-00', 'ava.png', 0, '67736823', 'Phụ huynh', 81, NULL),
(459, 'nguyenvancong225', 'Nguyễn Văn Công', '$2y$10$YiOUR2r6Qyu3sCs3C1DKI.O1ZZ6ALCtwbSVhSxYTXz7Sv5X/mxZ5q', '', '987653233', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '81583268', 'Phụ huynh', 279, NULL),
(460, 'chuhaphuong226', 'Chu Hà Phương', '$2y$10$HDbqBRsvth8.QU5upQ3.COJkMTsG.TqDmcXqNBVZOheydYQKuY1d2', '', '987654323', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '42051184', 'Phụ huynh', 280, NULL),
(461, 'phanthinhan227', 'Phan Thị Nhàn', '$2y$10$oupj9GiE52gaKPZAWzpEmeEOz.NjznUNMU5HXDkGi7K2HJqpU1o9S', '', '897765355', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '45776811', 'Phụ huynh', 281, NULL),
(462, 'trandoanbac228', 'Trần Đoàn Bắc', '$2y$10$hjUel.RHTxR6uTSLw7B0k.e1pXg4gdEN2Fe0H8nyEjLO8kSkHVFQO', '', '212765432', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '61984812', 'Phụ huynh', 282, NULL),
(463, 'duongvanho229', 'Dương Văn Hồ', '$2y$10$q/z4Q7H0a6JUGgi5O0yTku8eJW1rdS.fduBP5MA6DWu6neWBOnJqK', '', '934466732', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '10692097', 'Phụ huynh', 283, NULL),
(464, 'phamxuananh230', 'Phạm Xuân Ánh', '$2y$10$XVqwtz0ppffikbtD0yOCSunKP0G1WveB2PjeCH.IXzugeZvTEVFyC', '', '925677654', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '38410633', 'Phụ huynh', 284, NULL),
(465, 'truongquocbao231', 'Trương Quốc Bảo', '$2y$10$qXsTsgVe9do.C05Dk1w2seEkrTDODoTpgUr.cZGS.589etlEa86jy', '', '987621324', 'Thái Bình', 'Nam', '0000-00-00', 'ava.png', 0, '21184796', 'Phụ huynh', 285, NULL),
(466, 'levanbao232', 'Lê Văn Bảo', '$2y$10$f1tNcvdpM5dqOlh6iC8HT./ntfDfKLE5vOFqllfgRHn8kSoap7baK', '', '876542143', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '41561387', 'Phụ huynh', 286, NULL),
(467, 'nguyenyenngoc233', 'Nguyễn Yến Ngọc', '$2y$10$Piz5KiH639VQ3LI6WTTFsu1lyp9ETpIjaK1YmhCS36B1jw9TGUEWe', '', '987652422', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '58916900', 'Phụ huynh', 287, NULL),
(468, 'levanchien234', 'Lê Văn Chiến', '$2y$10$/xOXyGvzX/xxdYYUnfWiK.s3uKG6EhiQS7dKVZYKqOaAV6xycOOm6', '', '934648745', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '74500133', 'Phụ huynh', 288, NULL),
(469, 'nguyentrungduc235', 'Nguyễn Trung Đức', '$2y$10$yXgO77WH7jPY/hsAl6bKpOGSO5dJkwbHL/qNLYCvAqrQAePe8hIsS', '', '896535222', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '82554773', 'Phụ huynh', 289, NULL),
(470, 'laijnguyenxuan236', 'Lại Nguyên Xuân', '$2y$10$QQlMX9FE7/aDD9ySuhLCPewUdPVHjKVrPArAsTyVKbIL7XM7sjHiu', '', '987653323', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '47159237', 'Phụ huynh', 290, NULL),
(471, 'maithiloan237', 'Mai Thị Loan', '$2y$10$6ReqdSeYZc5ZTujzKm.2x.ci8I/V8mODO04RbbNQvs0TMzvonGdwS', '', '872352465', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '36200203', 'Phụ huynh', 291, NULL),
(472, 'luuquochoang238', 'Lưu Quốc Hoàng', '$2y$10$09k/ahTwTS2R4dQPrAgiVekhL/MnfNzAtaO5mtEEhB.b9QyCshMy6', '', '356588875', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '44892177', 'Phụ huynh', 292, NULL),
(473, 'nguyenthibao239', 'Nguyễn Thị Bảo', '$2y$10$aLVtnKx9A4dUSkDpVioc7ec8PY6aQJ08ocnb7YD1mwkJtGXEsskkq', '', '987654243', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '51453519', 'Phụ huynh', 293, NULL),
(474, 'nguyentusa240', 'Nguyễn Tú Sa', '$2y$10$jq.EUSPQJdi9gYprUU6By.pif3My8tL6WcY5JQ0CCbkGHVAlTOSEC', '', '685433237', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '29429762', 'Phụ huynh', 294, NULL),
(475, 'phungvanle241', 'Phùng Văn Lê', '$2y$10$TlYTkRUYxYrcpZmqW1VJH.AJGv6hN6iY1hUzFP/thYChSEMY4TkxG', '', '345678899', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '38889676', 'Phụ huynh', 295, NULL),
(476, 'ladoangiang242', 'La Đoàn Giang', '$2y$10$WDNUBRMSYzGCy/4294Kc6uz7GHUnGj3yb7rc8UYIO5pD/QkWxTdhC', '', '923576544', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '35906256', 'Phụ huynh', 296, NULL),
(477, 'nguyenthixuan243', 'Nguyễn Thị Xuân', '$2y$10$5rtFj17V86w0z3v452m4FOG4EoAFnYI1647jvGv38IJNxEaESoRC6', '', '876232334', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '99915030', 'Phụ huynh', 100, NULL),
(478, 'hoangvancong244', 'Hoàng Văn Công', '$2y$10$ThnXJoYQ9JqEhTeTu4.mIuwNLDIqBJ7V6vYfl0eTmqXMeBDKj5pk2', '', '987654323', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '25919853', 'Phụ huynh', 101, NULL),
(479, 'tranvanvinh245', 'Trần Văn Vinh', '$2y$10$fGCLxtFHdwaMTDcOp9zUHusbZh5izFO0vwND7VGKZOrKAED6gjPC2', '', '987654322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '26932539', 'Phụ huynh', 411, NULL),
(480, 'maivannam246', 'Mai Văn Nam', '$2y$10$wWNBkxVlS4jTXk6hiT4PiOFQP9CZxTkgs5YAqV6N5p.WTkOnlIp52', '', '923667544', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '26625186', 'Phụ huynh', 103, NULL),
(481, 'phananhtuyet247', 'Phan Ánh Tuyết', '$2y$10$dc4sGZXgUxgETeo28vpMWe4x183WaWXT2NaDi003XOzHXHsA7lHKu', '', '987652342', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '94864896', 'Phụ huynh', 104, NULL),
(482, 'haongvanly248', 'Hoàng Văn Lý', '$2y$10$DAF/ykvzP6LXFyplcA/n1ejCUyuIzPNYdq9x3IhQ6wE6AKnQlo1rW', '', '945876542', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '44624067', 'Phụ huynh', 414, NULL),
(483, 'lybaolinh249', 'Lý Bảo Linh', '$2y$10$6C.gaWZgdmCQcq1BloZskO9wC1oB2uoqx/nc9GdkJeyU9WskDoFFW', '', '987653533', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '92965794', 'Phụ huynh', 106, NULL),
(484, 'tranthiyen250', 'Trần Thị Yến', '$2y$10$4S9Tj1uSLwjUYlPsxtSyvuRWRoPZNajMHahDr9vQywPp2UONtbhX6', '', '578564346', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '32787832', 'Phụ huynh', 107, NULL),
(485, 'maingocanh251', 'Mai Ngọc Anh', '$2y$10$3XIEfz6hnkLVK66jpsqPlO.8Ozlah.FsGCefWSmfmLiZq4VWey5Iu', '', '987232444', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '86918292', 'Phụ huynh', 417, NULL),
(486, 'nguyendoannam252', 'Nguyễn Đoàn Nam', '$2y$10$mTGE7rMRhgkQZ6mayVj3Kee5CHwkM36UmlgYufDt1I/EDbXDvqea.', '', '987654212', 'Hà Nam', 'Nam', '0000-00-00', 'ava.png', 0, '53170401', 'Phụ huynh', 109, NULL),
(487, 'nguyenvannam253', 'Nguyễn Văn Nam', '$2y$10$3qRhNFjiEG725GMmdR5vK.jzvJlk1SuXvd.T2MqROFst9Cn0l4tVi', '', '987654212', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '50543844', 'Phụ huynh', 110, NULL),
(488, 'phamvantruong254', 'Phạm Văn Trường', '$2y$10$czJPM8I2/w/idD2O/YnRU.jPXt3pi/S7eeREi6iwdwJDJeXVsgBVy', '', '987654244', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '21120110', 'Phụ huynh', 111, NULL),
(489, 'levanquang255', 'Lê Văn Quang', '$2y$10$gpxlFSDkDmr9Bnkp9IvvQuvQrOKtj/tciobpAkmWf4l1yiNCbcqje', '', '987322322', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '91377807', 'Phụ huynh', 421, NULL),
(490, 'phanthihao256', 'Phan Thị Hảo', '$2y$10$3IoPqr/cVA0pIE3KtiTEJuWog1ecc5kx8oYgIaWmTCSn3m83Wd22G', '', '765422325', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '39387305', 'Phụ huynh', 113, NULL),
(491, 'hoanagvanviet257', 'Hoàng Văn Việt', '$2y$10$9UBMCnoJpJBBahUiP4qrW.4KFtF06jeCfVsNT75OEVQRGFj4i3RXy', '', '987652223', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '79238666', 'Phụ huynh', 423, NULL),
(492, 'buigiaphong258', 'Bùi Gia Phong', '$2y$10$lzCoeQ5AvAEVx1LmbETZi.qk2ltI7CEC4hW8shpv/BhgjCJGIEvru', '', '987653212', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '65423219', 'Phụ huynh', 115, NULL),
(493, 'nguyenthitu259', 'Nguyễn Thị Tú', '$2y$10$QXp7IDGaW1urKJPN.3JqC.QblW1DSzi/YYc.tEVVQsTCRw8Esu0A6', '', '343647877', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '53751499', 'Phụ huynh', 116, NULL),
(494, 'laithicam260', 'Lại Thị Cẩm', '$2y$10$WlUYZelV73D6JijKjLDkjetMPky.JFOECOUomS8/6q8uUu3fIlu/G', '', '987652343', 'Lào Cai', 'Nữ', '0000-00-00', 'ava.png', 0, '81330584', 'Phụ huynh', 426, NULL),
(495, 'nguyenxuantuan261', 'Nguyễn Xuân Tuấn', '$2y$10$xLgWqnqS9NxYW6ZOlSqhn.JyexxUj29WjnTQUHf8IqA3smUPmigma', '', '923545665', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '58819058', 'Phụ huynh', 118, NULL),
(496, 'lygiadoan262', 'Lý Gia Đoàn', '$2y$10$HG/PrRgfeGIVilRKViczXuPyOGFHrYHkIaIREO4tAgDDXP.Nw1NPq', '', '765432324', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '52279871', 'Phụ huynh', 119, NULL),
(497, 'phanthikieu263', 'Phan Thị Kiều', '$2y$10$ETjc.yGv1dKn7p5EIbkT0er4LsPF6cZkdoi5jY35xNnqJmRHsoEYe', '', '987622224', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '47496504', 'Phụ huynh', 120, NULL),
(498, 'nguyenvanngoc264', 'Nguyễn Văn Ngọc', '$2y$10$YkNIxL5YxInwfbKxr88WXuSI6/NCt3Zx47gh1ndaWoLB5kMqUTX9u', '', '987654324', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '21015153', 'Phụ huynh', 121, NULL),
(499, 'tranngocanh265', 'Trần Ngọc Ánh', '$2y$10$yXhc/W2SBKv2m4.tgzLOP.xBhDm8aOvd4P1019ariTzsANPhVnmRO', '', '943675767', 'Hà Nội', 'Nữ', '0000-00-00', 'ava.png', 0, '86413761', 'Phụ huynh', 122, NULL),
(500, 'nguyengiakhiem266', 'Nguyễn Gia Khiêm', '$2y$10$.k3kIrrA72sz7Kdv4qo5WeZH./MHdin.0EJTAPE6cyb6XNYTT2MTy', '', '234768786', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '67300280', 'Phụ huynh', 123, NULL),
(501, 'hoangbavan267', 'Hoàng Bá Văn', '$2y$10$ID2vnO5BNaNlk7FT6f6IaO4WRlqN5qwRVYW.xtBLilahGnFUhkZjG', '', '956883232', 'Hà Nội', 'Nam', '0000-00-00', 'ava.png', 0, '96266012', 'Phụ huynh', 124, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdID`),
  ADD UNIQUE KEY `AdName` (`AdName`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`),
  ADD UNIQUE KEY `classname` (`ClassName`);

--
-- Chỉ mục cho bảng `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`MessID`,`FromUserID`,`ToUserID`),
  ADD KEY `From_` (`FromUserID`),
  ADD KEY `To_` (`ToUserID`);

--
-- Chỉ mục cho bảng `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`TeachID`),
  ADD KEY `teach` (`Teacher_UserID`),
  ADD KEY `class` (`ClassID`);

--
-- Chỉ mục cho bảng `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`Student_UserID`,`Subject`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `UserParent` (`UserChild`),
  ADD KEY `userclass` (`UserClass`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AdID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `mess`
--
ALTER TABLE `mess`
  MODIFY `MessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `teach`
--
ALTER TABLE `teach`
  MODIFY `TeachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `mess`
--
ALTER TABLE `mess`
  ADD CONSTRAINT `From_` FOREIGN KEY (`FromUserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `To_` FOREIGN KEY (`ToUserID`) REFERENCES `users` (`UserID`);

--
-- Các ràng buộc cho bảng `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `class` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`),
  ADD CONSTRAINT `teach` FOREIGN KEY (`Teacher_UserID`) REFERENCES `users` (`UserID`);

--
-- Các ràng buộc cho bảng `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `transcript_ibfk_1` FOREIGN KEY (`Student_UserID`) REFERENCES `users` (`UserID`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `UserParent` FOREIGN KEY (`UserChild`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `userclass` FOREIGN KEY (`UserClass`) REFERENCES `class` (`ClassID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
