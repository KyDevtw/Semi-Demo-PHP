-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-12 13:56:47
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
-- 資料庫： `webshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL COMMENT '流水編號',
  `proName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品名稱',
  `proId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品編號',
  `proPrice` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品價格',
  `proQty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品數量',
  `proClass` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品種類',
  `proDes` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品描述',
  `proImg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品圖片',
  `museumId` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '博物館別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `proName`, `proId`, `proPrice`, `proQty`, `proClass`, `proDes`, `proImg`, `museumId`) VALUES
(230, '海天藍的交響 藝術提袋', '#101', '2500', '200', '服飾類', '袋子', '20210510115402.webp', ''),
(231, '海舞 藝術提袋', '#102', '2500', '200', '服飾類', '袋子', '20210510115506.webp', ''),
(234, '梵谷畫像 T恤', '#104', '2500', '5000', '服飾類', '衣服', '20210510130126.jpeg', ''),
(235, '莫內 睡蓮 T恤', '#106', '8888', '77', '服飾類', '衣服', '20210510131839.jpeg', ''),
(238, '喵', '123', '123', '200', '貓類', '描述', '20210511115710.jpeg', ''),
(240, '1123', '123', '123', '231', '123', '123', '20210511162655.jpeg', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT COMMENT '流水編號', AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
