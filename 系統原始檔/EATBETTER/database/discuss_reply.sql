-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 11 月 18 日 14:37
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
-- 資料表結構 `discuss_reply`
--

CREATE TABLE `discuss_reply` (
  `id` int(11) NOT NULL,
  `author` varchar(10) CHARACTER SET utf8 NOT NULL,
  `subject` tinytext CHARACTER SET utf8 NOT NULL,
  `content` mediumtext CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `discuss_reply`
--

INSERT INTO `discuss_reply` (`id`, `author`, `subject`, `content`, `date`, `reply_id`) VALUES
(7, '匿名1號', '衛生署有相關文章喔!', '目前上班族多半是雙薪家庭或單身型態，家庭人口數不多，在家開伙多半不易，外食為多數上班族獲得三餐的來源，國民健康署貼心提供上班族10個外食健康小撇步，供大家參考：\r\n\r\n1. 慎選用餐地點，以能供應新鮮健康食物的店為優先，不選擇吃到飽的餐廳。\r\n2. 以全穀類為主食，少吃炒飯、炒麵，避免攝入過多油脂。\r\n3. 每餐攝取足夠的各色蔬菜，以達每日至少三份蔬菜(1.5碗)的建議量，可增加纖維素，促進腸胃蠕動、增加飽足感。\r\n4. 以白肉代替紅肉，如以魚肉、雞胸肉取代牛肉、豬肉。\r\n5. 減少油炸食物攝取，並選擇瘦肉，去除皮脂；少用酥皮、酥脆食物以及加工食品。\r\n6. 多選擇清蒸、汆燙、清燉、涼拌的食物；減少芶芡食物。\r\n7. 每天攝取兩份新鮮水果；若要喝現榨果汁，切記不要濾渣、勿加糖。\r\n8. 主動要求店家減少調味料、沙拉醬用量。\r\n9. 主動要求店家供應白開水或無糖茶，每日至少攝取1500 ml的白開水。\r\n10. 即使是外食，三餐仍應規律進食，少吃甜食、下午茶及宵夜。', '2019-11-13 02:43:20', 7);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `discuss_reply`
--
ALTER TABLE `discuss_reply`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `discuss_reply`
--
ALTER TABLE `discuss_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
