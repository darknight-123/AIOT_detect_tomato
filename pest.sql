-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-06 03:24:28
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `conditions`
--

CREATE TABLE `conditions` (
  `RaspberryID` varchar(20) NOT NULL,
  `moisture` int(11) NOT NULL,
  `Picture` varchar(40) NOT NULL,
  `Day` date NOT NULL,
  `Time` time NOT NULL,
  `TomatoWorm` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `TabaccoWorm` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `BeetWorm` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `Problems` int(100) UNSIGNED NOT NULL DEFAULT 0,
  `None` int(100) UNSIGNED NOT NULL,
  `Tomato` int(100) UNSIGNED NOT NULL,
  `TomatoFlower` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `conditions`
--

INSERT INTO `conditions` (`RaspberryID`, `moisture`, `Picture`, `Day`, `Time`, `TomatoWorm`, `TabaccoWorm`, `BeetWorm`, `Problems`, `None`, `Tomato`, `TomatoFlower`) VALUES
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:37:31', 0, 0, 0, 1, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:38:51', 0, 0, 0, 1, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:39:14', 0, 0, 0, 1, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:39:44', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:42:22', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:47:20', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-04_21_detections.jpg', '2022-06-04', '21:47:31', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-05_23_detections.jpg', '2022-06-05', '23:59:48', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:00:42', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:01:35', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:03:15', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:03:51', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:04:10', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:06:21', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:10:25', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:10:56', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:14:18', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:14:52', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:15:33', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:23:09', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:29:05', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:29:22', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:49:48', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:59:03', 0, 1, 0, 0, 0, 0, 0),
('3', 25, '3_2022-06-06_00_detections.jpg', '2022-06-06', '00:59:41', 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `location_tempature`
--

CREATE TABLE `location_tempature` (
  `RaspberryID` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `Day` date NOT NULL,
  `Time` time NOT NULL,
  `Tempature` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `location_tempature`
--

INSERT INTO `location_tempature` (`RaspberryID`, `Day`, `Time`, `Tempature`) VALUES
('3', '2022-06-02', '14:03:57', 23),
('3', '2022-06-02', '14:04:23', 23),
('3', '2022-06-02', '14:05:22', 23),
('3', '2022-06-02', '14:05:53', 23),
('3', '2022-06-02', '14:06:11', 23),
('3', '2022-06-02', '14:06:57', 23),
('3', '2022-06-02', '14:07:31', 23),
('3', '2022-06-02', '14:09:48', 23),
('3', '2022-06-02', '14:18:26', 23),
('3', '2022-06-02', '14:19:24', 23),
('3', '2022-06-04', '21:34:53', 23),
('3', '2022-06-04', '21:35:05', 23),
('3', '2022-06-04', '21:35:34', 23),
('3', '2022-06-04', '21:37:31', 23),
('3', '2022-06-04', '21:38:51', 23),
('3', '2022-06-04', '21:39:14', 23),
('3', '2022-06-04', '21:39:44', 23),
('3', '2022-06-04', '21:42:22', 23),
('3', '2022-06-04', '21:47:20', 23),
('3', '2022-06-04', '21:47:31', 23),
('3', '2022-06-05', '23:59:48', 23),
('3', '2022-06-06', '00:00:42', 23),
('3', '2022-06-06', '00:01:35', 23),
('3', '2022-06-06', '00:03:15', 23),
('3', '2022-06-06', '00:03:51', 23),
('3', '2022-06-06', '00:04:10', 23),
('3', '2022-06-06', '00:06:21', 23),
('3', '2022-06-06', '00:10:25', 23),
('3', '2022-06-06', '00:10:56', 23),
('3', '2022-06-06', '00:14:18', 23),
('3', '2022-06-06', '00:14:52', 23),
('3', '2022-06-06', '00:15:33', 23),
('3', '2022-06-06', '00:23:09', 23),
('3', '2022-06-06', '00:29:05', 23),
('3', '2022-06-06', '00:29:22', 23),
('3', '2022-06-06', '00:49:48', 23),
('3', '2022-06-06', '00:53:32', 23),
('3', '2022-06-06', '00:54:16', 23),
('3', '2022-06-06', '00:55:08', 23),
('3', '2022-06-06', '00:56:49', 23),
('3', '2022-06-06', '00:59:03', 23),
('3', '2022-06-06', '00:59:41', 23);

-- --------------------------------------------------------

--
-- 資料表結構 `raspberry`
--

CREATE TABLE `raspberry` (
  `RaspberryID` varchar(20) NOT NULL,
  `is_tempature` enum('Y','N') NOT NULL DEFAULT 'N',
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `raspberry`
--

INSERT INTO `raspberry` (`RaspberryID`, `is_tempature`, `Username`) VALUES
('1', 'N', 'aaa'),
('2', 'Y', 'bbb'),
('3', 'N', 'ccc');

-- --------------------------------------------------------

--
-- 資料表結構 `tomato_growth`
--

CREATE TABLE `tomato_growth` (
  `RaspberryID` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `Day` date NOT NULL,
  `Growth` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `tomato_growth`
--

INSERT INTO `tomato_growth` (`RaspberryID`, `Day`, `Growth`) VALUES
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '發芽期'),
('3', '2022-06-02', '成長期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-04', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期'),
('3', '2022-06-06', '發芽期');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('aaa', '*23AE809DDACAF96AF0F'),
('bbb', '*00A51F3F48415C7D4E8'),
('ccc', '$2y$10$gjJtwbAkY2.bxMTOU7jZneQFGMjs7hObI1.r662TBfTQB2cASoaV2');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `conditions`
--
ALTER TABLE `conditions`
  ADD KEY `RaspberryID` (`RaspberryID`);

--
-- 資料表索引 `raspberry`
--
ALTER TABLE `raspberry`
  ADD PRIMARY KEY (`RaspberryID`),
  ADD KEY `Username` (`Username`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `conditions`
--
ALTER TABLE `conditions`
  ADD CONSTRAINT `ID` FOREIGN KEY (`RaspberryID`) REFERENCES `raspberry` (`RaspberryID`);

--
-- 資料表的限制式 `raspberry`
--
ALTER TABLE `raspberry`
  ADD CONSTRAINT `Username` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
