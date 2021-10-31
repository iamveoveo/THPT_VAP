-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2021 lúc 08:34 PM
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
  `AdName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdTel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdAdd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdGender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdBirth` date DEFAULT NULL,
  `AdAva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'ava.png',
  `AdStatus` int(11) NOT NULL DEFAULT 0,
  `AdCode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdID`, `AdName`, `AdPassword`, `AdEmail`, `AdTel`, `AdAdd`, `AdGender`, `AdBirth`, `AdAva`, `AdStatus`, `AdCode`) VALUES
(1, 'Thu Phương', '', 'thuphuong@gmail.com', '0942574333', 'Hà Nội', 'Nữ', '2001-04-06', 'ava.png', 0, ''),
(2, 'Mai', '', 'mai@gmail.com', '0283523857', 'Hà Nội', 'Nữ', '2000-10-19', 'ava.png\r\n', 0, ''),
(3, 'Ngọc', '', 'Ngoc@gmail.com', '095421457', 'Ninh Bình', 'Nữ', '2000-11-11', 'ava.png', 0, ''),
(4, 'admin', '', 'admin@gmail.com', '0925357864', 'Hà Nội', 'Nam', '2002-06-02', 'ava.png', 0, ''),
(5, 'AD', '', 'Ad@gmail.com', '0923685645', 'Hà Nội', 'Nam', '2002-12-12', 'ava.png', 0, '');

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
(4, '12A2', 12);

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
(1, 37, 2, 'Học sinh chưa nhận được thông báo lịch thi', '2021-10-27 19:24:23'),
(2, 2, 37, 'Học sinh chờ thông tin từ nhà trường', '2021-10-20 19:24:23'),
(3, 3, 2, 'Thông báo hoãn thi do covid 19', '2021-07-27 19:24:23'),
(4, 2, 3, 'Cập nhật thời khóa biểu', '2021-10-22 19:24:23'),
(5, 1, 37, 'Đã cập nhật lịch thi\r\n', '2021-05-25 19:24:23');

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
(2, 2, 4, 'Toán'),
(3, 1, 3, 'Anh');

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
(40, 'Thể dục', 0, 6),
(40, 'Văn', 9, 9),
(41, 'Anh', 10, 9),
(41, 'Toán', 5, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'phuong', 'Phương', '$2y$10$lkfP7Uns/q9S44Cd6JN0UeC.eNsLub8RpRcVitOMqLMxBIgHElnlG', 'phuong@gmail.com', '0942323232', 'Hà Nội', 'Nữ', '2001-10-17', 'ava.png', 1, '1', 'Giáo viên', NULL, NULL),
(2, 'Trần Đại Quang', 'Quang', '\r\n', 'daiquang@gmail.com', '0923535534', 'Nam Định', 'Nam', '2004-10-28', 'ava.png', 0, '1', 'Giaó viên', NULL, NULL),
(3, 'Tô Lâm', 'Lâm', '\r\n', 'tolam0510@gmail.com', '0925848848', 'Hà Nội', 'Nam', '2001-05-10', 'ava.png', 0, '1', 'Phụ huynh', 40, NULL),
(37, 'A', '[value-3]', '', '[value-5]', '[value-6]', '[value-7]', 'Nam', NULL, 'ava.png', 0, '1', 'Phụ huynh', 41, NULL),
(40, '[value-2]', 'Nguyễn Ngọc Ngà', '', 'abc@gmail.com', '03311554488', 'Hà Nam', 'Nữ', '1988-12-08', 'ava.png', 0, '', 'Học sinh', NULL, 1),
(41, '[value-3]', '[value-3]', '', '[value-5]', '[value-6]', '[value-7]', 'Nữ', NULL, 'ava.png', 0, '', 'Học sinh', NULL, 4);

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
  MODIFY `AdID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `mess`
--
ALTER TABLE `mess`
  MODIFY `MessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `teach`
--
ALTER TABLE `teach`
  MODIFY `TeachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
