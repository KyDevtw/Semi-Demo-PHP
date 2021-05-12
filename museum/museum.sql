-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-12 07:49:18
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `josie`
--

-- --------------------------------------------------------

--
-- 資料表結構 `museum`
--

CREATE TABLE `museum` (
  `id` int(10) NOT NULL COMMENT '流水號',
  `musId` int(10) NOT NULL COMMENT '博物館編號',
  `musName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博物館名稱',
  `musCity` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '縣市編號',
  `musImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片路徑',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更改時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `museum`
--

INSERT INTO `museum` (`id`, `musId`, `musName`, `musCity`, `musImg`, `created_at`, `update_at`) VALUES
(1, 1, '臺北市立美術館', '1', '001.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(2, 2, '台北當地藝術館', '1', '20210507085734.jpg', '2021-05-10 09:21:10', '2021-05-11 11:44:30'),
(3, 3, '臺北市立忠泰美術館', '1', '003.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(4, 4, '順益台灣美術館', '1', '004.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(5, 5, '兒童藝術教育中心', '1', '005.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(6, 6, '楊英風美術館', '1', '006.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(7, 7, '北師美術館', '1', '007.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(8, 8, '國立臺灣師範大學美術館', '1', '008.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(9, 9, '長流美術館', '1', '009.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(10, 10, '典藏美術館', '1', '010.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(11, 11, '天使美術館', '1', '011.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(12, 12, '巫登益美術館', '1', '012.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(13, 13, '鳳甲美術館', '1', '013.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(14, 14, '蘇荷兒童美術館', '1', '014.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(15, 15, '關渡美術館', '1', '015.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(16, 16, '花博公園美術', '1', '016.jpg', '2021-05-10 09:21:10', '2021-05-10 09:36:26'),
(17, 17, '台師大德群畫廊', '1', '017.jpg', '2021-05-10 09:21:10', '2021-05-10 09:21:10'),
(24, 21, '美麗博物', '', '20210510033127.webp', '2021-05-10 09:31:27', '2021-05-10 09:36:36');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `museum`
--
ALTER TABLE `museum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
