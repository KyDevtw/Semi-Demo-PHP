-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 05 月 12 日 10:28
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `Museum`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL COMMENT '流水號',
  `userMail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號/信箱',
  `userPwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `userGender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性別',
  `userPhone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機號碼',
  `userBirth` date NOT NULL COMMENT '生日',
  `userAddress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '通訊地址',
  `userImg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '圖片',
  `userfav` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '追蹤清單',
  `userCoupon` int(20) DEFAULT NULL COMMENT '優惠券',
  `isActivated` tinyint(1) NOT NULL DEFAULT 1 COMMENT '開通狀況',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='會員資料表';

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userId`, `userMail`, `userPwd`, `userName`, `userGender`, `userPhone`, `userBirth`, `userAddress`, `userImg`, `userfav`, `userCoupon`, `isActivated`, `created_at`, `updated_at`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'FeiFei', '男', '0900221332', '2016-10-21', '新竹市', '20210512092555.jpeg', NULL, NULL, 1, '2021-05-12 15:25:55', '2021-05-12 15:25:55');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userMail` (`userMail`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
