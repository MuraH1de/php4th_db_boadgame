-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2022-02-24 20:05:52
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sugoroku`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `boad_table`
--

CREATE TABLE `boad_table` (
  `id` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `stop_status` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `boad_table`
--

INSERT INTO `boad_table` (`id`, `bonus`, `stop_status`, `text`) VALUES
(1, 0, 0, 'スタート'),
(2, 0, 0, ''),
(3, 0, 0, ''),
(4, 5, 0, '5マスすすむ'),
(5, 1, 0, '1マスすすむ'),
(6, 0, 0, ''),
(7, 0, 0, 'どうぶつのまねをする'),
(8, 0, 1, '1かいやすみ'),
(9, 0, 0, ''),
(10, -7, 0, 'スタートにもどる'),
(11, 3, 0, '特別ボーナス！3マスすすむ'),
(12, -1, 0, '1マスもどる'),
(13, 0, 0, ''),
(14, 2, 0, '2マスすすむ'),
(15, 0, 0, ''),
(16, 0, 0, 'へんがおをする'),
(17, 0, 0, ''),
(18, 3, 0, '3マスすすむ'),
(19, -3, 0, '3マスもどる'),
(20, 0, 0, ''),
(21, 0, 0, ''),
(22, 4, 0, 'ワープ！4マスすすむ'),
(23, 0, 0, ''),
(24, 1, 0, '1マスすすむ'),
(25, 0, 0, ''),
(26, 0, 0, 'すきなうたをうたおう'),
(27, 0, 0, ''),
(28, 0, 1, '1かいやすみ'),
(29, 0, 0, ''),
(30, -3, 0, '3マスもどる'),
(31, 0, 0, 'ゴール！');

-- --------------------------------------------------------

--
-- テーブルの構造 `game_table`
--

CREATE TABLE `game_table` (
  `id` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dice` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `id_table`
--

CREATE TABLE `id_table` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `uid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `upw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(11) NOT NULL DEFAULT '0',
  `lfe_flg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `id_table`
--

INSERT INTO `id_table` (`id`, `name`, `uid`, `upw`, `kanri_flg`, `lfe_flg`) VALUES
(1, '管理者', 'admin', 'admin', 1, 0),
(2, 'テスト', 'test', 'test', 0, 0),
(3, '村田英行', 'mura', 'mura', 1, 0),
(4, 'びー', 'bbbbb', 'bbbbb', 0, 0),
(5, 'えー', 'aaaaa', 'aaaaa', 0, 0),
(6, 'ccccc', 'ccccc', 'ccccc', 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `sample_table`
--

CREATE TABLE `sample_table` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `stop_status` int(11) NOT NULL,
  `goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `sample_table`
--

INSERT INTO `sample_table` (`id`, `position`, `bonus`, `stop_status`, `goal`) VALUES
(1, 5, 0, 0, 28);

-- --------------------------------------------------------

--
-- テーブルの構造 `user_count`
--

CREATE TABLE `user_count` (
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_count`
--

INSERT INTO `user_count` (`number`) VALUES
(2);

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` text CHARACTER SET utf8 NOT NULL,
  `position` int(11) NOT NULL,
  `stop_status` int(11) NOT NULL,
  `goal` int(11) NOT NULL DEFAULT '29'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `position`, `stop_status`, `goal`) VALUES
(1, 'えー', 1, 0, 30),
(2, 'びー', 1, 0, 30);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `boad_table`
--
ALTER TABLE `boad_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `game_table`
--
ALTER TABLE `game_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `id_table`
--
ALTER TABLE `id_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sample_table`
--
ALTER TABLE `sample_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `game_table`
--
ALTER TABLE `game_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `id_table`
--
ALTER TABLE `id_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `sample_table`
--
ALTER TABLE `sample_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
