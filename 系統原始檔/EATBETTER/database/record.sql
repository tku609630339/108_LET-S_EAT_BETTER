-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 11 月 18 日 14:38
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `eatbetter`
--

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `id` char(20) CHARACTER SET utf8 NOT NULL,
  `hieght` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `bmi` float NOT NULL,
  `date` date NOT NULL,
  `heat` int(10) NOT NULL,
  `protein` int(10) NOT NULL,
  `fat` int(10) NOT NULL,
  `carbo` int(10) NOT NULL,
  `fiber` int(10) NOT NULL,
  `water` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`id`, `hieght`, `weight`, `bmi`, `date`, `heat`, `protein`, `fat`, `carbo`, `fiber`, `water`) VALUES
('1', 157, 49, 19.8791, '2019-11-18', 1800, 150, 30, 40, 100, 200),
('1', 157, 45, 18.2563, '2019-06-10', 1000, 50, 40, 150, 100, 400),
('1', 157, 50, 20.2848, '2019-11-10', 1800, 200, 50, 100, 100, 200),
('1', 155, 47, 19.563, '2019-01-01', 1370, 140, 65, 53, 175, 660),
('2', 180, 82, 25.3086, '2020-07-11', 1680, 130, 55, 82, 187, 660),
('2', 180, 84, 25.9259, '2020-01-23', 1370, 140, 65, 53, 175, 660),
('2', 180, 84, 25.9259, '2020-07-19', 1680, 140, 65, 53, 175, 660),
('2', 180, 80, 24.6914, '2019-07-09', 1800, 120, 73, 46, 199, 730),
('2', 180, 81, 25, '2019-01-21', 1952, 120, 73, 46, 199, 730),
('2', 180, 83, 25.6172, '2018-07-04', 1800, 120, 73, 46, 199, 730),
('2', 180, 85, 26.2345, '2018-01-15', 1750, 120, 73, 46, 199, 730);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
