-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 05:23 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

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
-- Cấu trúc bảng cho bảng `amin`
--

CREATE TABLE `amin` (
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
-- Đang đổ dữ liệu cho bảng `amin`
--

INSERT INTO `amin` (`AdID`, `AdName`, `AdPassword`, `AdEmail`, `AdTel`, `AdAdd`, `AdGender`, `AdBirth`, `AdAva`, `AdStatus`, `AdCode`) VALUES
(1, 'Thu Phương', '', 'thuphuong@gmail.com', '0942574333', 'Hà Nội', 'Nữ', '2001-04-06', 'ava.png', 0, ''),
(2, 'Mai', '', 'mai@gmail.com', '0283523857', 'Hà Nội', 'Nữ', '2000-10-19', 'ava.png\r\n', 0, ''),
(3, 'Ngọc', '', 'Ngoc@gmail.com', '095421457', 'Ninh Bình', 'Nữ', '2000-11-11', 'ava.png', 0, ''),
(4, 'admin', '', 'admin@gmail.com', '0925357864', 'Hà Nội', 'Nam', '2002-06-02', 'ava.png', 0, ''),
(5, 'AD', '', 'Ad@gmail.com', '0923685645', 'Hà Nội', 'Nam', '2002-12-12', 'ava.png', 0, '');

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
(1, 2, 4, 'Học sinh chưa nhận được thông báo lịch thi', '2021-10-27 19:24:23'),
(2, 2, 5, 'Học sinh chờ thông tin từ nhà trường', '2021-10-20 19:24:23'),
(3, 5, 3, 'Thông báo hoãn thi do covid 19', '2021-07-27 19:24:23'),
(4, 4, 3, 'Cập nhật thời khóa biểu', '2021-10-22 19:24:23'),
(5, 1, 5, 'Đã cập nhật lịch thi\r\n', '2021-05-25 19:24:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teach`
--

CREATE TABLE `teach` (
  `TeachID` int(11) NOT NULL,
  `Teacher_UserID` int(11) NOT NULL,
  `Student_UserID` int(11) NOT NULL,
  `TeachClass` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TeachGrade` int(11) NOT NULL,
  `TeachSubject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teach`
--

INSERT INTO `teach` (`TeachID`, `Teacher_UserID`, `Student_UserID`, `TeachClass`, `TeachGrade`, `TeachSubject`) VALUES
(1, 1, 5, '11A', 11, 'Toán'),
(2, 2, 4, '12A1', 12, 'Anh'),
(3, 3, 2, '10A2', 10, 'Sinh học'),
(4, 4, 1, '12A2', 12, 'Ngữ văn'),
(5, 3, 5, '12A2', 10, 'Tiếng Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transcrip`
--

CREATE TABLE `transcrip` (
  `Student_UserID` int(11) NOT NULL,
  `Subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MidTerm` int(10) DEFAULT NULL,
  `FinalExam` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transcrip`
--

INSERT INTO `transcrip` (`Student_UserID`, `Subject`, `MidTerm`, `FinalExam`) VALUES
(1, '[Tiếng anh\r\n                                                                                     ]', 9, 10),
(2, '[Toán]', 10, 10),
(3, '[Ngữ văn]', 9, 9),
(4, '[Sinh học]', 8, 9),
(5, '[Tiếng anh]', 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserTel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserAdd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserGender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserBirth` date DEFAULT NULL,
  `UserAva` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'ava.png',
  `UserStatus` int(11) NOT NULL DEFAULT 0,
  `UserCode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserRoll` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserTel`, `UserAdd`, `UserGender`, `UserBirth`, `UserAva`, `UserStatus`, `UserCode`, `UserRoll`, `UserParent`) VALUES
(1, 'Trần Thu Phương', '', 'phuong@gmail.com', '0942323232', 'Hà Nội', 'Nữ', '2001-10-17', 'ava.png', 0, '1', 'Giáo viên', NULL),
(2, 'Trần Đại Quang', '\r\n', 'daiquang@gmail.com', '0923535534', 'Nam Định', 'Nam', '2004-10-28', 'ava.png', 0, '1', 'Giaó viên', NULL),
(3, 'Tô Lâm', '\r\n', 'tolam0510@gmail.com', '0925848848', 'Hà Nội', 'Nam', '2001-05-10', 'ava.png', 0, '1', 'Phụ huynh', NULL),
(4, 'Đoàn Hồng Hoàng', '\r\n', 'doanhonghoang@gmail.com', '0943564678', 'Hà Nội\r\n', 'Nam', '1999-09-11', 'ava.png', 0, '1', 'Học sinh', 3),
(5, 'Hà Diệu Linh', '', 'hadieulinh@gmail.com', '0943567433', 'Hà Nội', 'Nữ', '1998-09-02', 'ava.png', 0, '1', 'Học sinh', 5),
(36, 'Hà Diệu Linh', '', 'hadieulinh@gmail.com', '0943567433', 'Hà Nội', 'Nữ', '1998-09-02', 'ava.png', 0, '1', 'Học sinh', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `amin`
--
ALTER TABLE `amin`
  ADD PRIMARY KEY (`AdID`);

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
  ADD PRIMARY KEY (`TeachID`,`Teacher_UserID`,`Student_UserID`),
  ADD KEY `Teacher` (`Teacher_UserID`),
  ADD KEY `Student` (`Student_UserID`);

--
-- Chỉ mục cho bảng `transcrip`
--
ALTER TABLE `transcrip`
  ADD PRIMARY KEY (`Student_UserID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserParent` (`UserParent`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `amin`
--
ALTER TABLE `amin`
  MODIFY `AdID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `mess`
--
ALTER TABLE `mess`
  MODIFY `MessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `teach`
--
ALTER TABLE `teach`
  MODIFY `TeachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `transcrip`
--
ALTER TABLE `transcrip`
  MODIFY `Student_UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `mess`
--
ALTER TABLE `mess`
  ADD CONSTRAINT `From_` FOREIGN KEY (`FromUserID`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `To_` FOREIGN KEY (`ToUserID`) REFERENCES `users` (`UserId`);

--
-- Các ràng buộc cho bảng `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `Student` FOREIGN KEY (`Student_UserID`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `Teacher` FOREIGN KEY (`Teacher_UserID`) REFERENCES `users` (`UserId`);

--
-- Các ràng buộc cho bảng `transcrip`
--
ALTER TABLE `transcrip`
  ADD CONSTRAINT `Stu_UserID` FOREIGN KEY (`Student_UserID`) REFERENCES `users` (`UserId`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `UserParent` FOREIGN KEY (`UserParent`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
