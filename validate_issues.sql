-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- 主机: sql205.phpnet.us
-- 生成日期: 2014 年 11 月 24 日 00:40
-- 服务器版本: 5.6.21-70.0
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pn_15584718_eng`
--

-- --------------------------------------------------------

--
-- 表的结构 `validate_issues`
--

CREATE TABLE IF NOT EXISTS `validate_issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val_reason` varchar(1024) NOT NULL,
  `val_purpose` varchar(1024) NOT NULL,
  `val_scheme` varchar(1024) NOT NULL,
  `val_failrate` varchar(1024) NOT NULL,
  `val_content` text NOT NULL,
  `val_owner` varchar(1024) NOT NULL,
  `val_date` datetime NOT NULL,
  `val_status` varchar(1024) NOT NULL,
  `reserved1` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `validate_issues`
--

INSERT INTO `validate_issues` (`id`, `val_reason`, `val_purpose`, `val_scheme`, `val_failrate`, `val_content`, `val_owner`, `val_date`, `val_status`, `reserved1`) VALUES
(1, '中国人 ', '中国人 ', '中国人 ', '中国人 ', '&lt;p&gt;中国人&amp;nbsp;中国人&amp;nbsp;中国人&amp;nbsp;中国人&amp;nbsp;中国人&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;中国人&amp;nbsp;中国人&amp;nbsp;中国人&amp;nbsp;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;中国人&amp;nbsp;中国人&amp;nbsp;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;中国人&amp;nbsp;&lt;br /&gt;&lt;/p&gt;', '中国人 ', '2014-11-24 13:39:14', 'Open', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
