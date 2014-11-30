-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- 主机: sql205.phpnet.us
-- 生成日期: 2014 年 11 月 29 日 21:54
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
-- 表的结构 `eng_version_control_table`
--

CREATE TABLE IF NOT EXISTS `eng_version_control_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Model_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `Customer` varchar(128) COLLATE utf8_bin NOT NULL,
  `System_type` varchar(128) COLLATE utf8_bin NOT NULL,
  `BIOS_version` varchar(128) COLLATE utf8_bin NOT NULL,
  `Bios_release_date` varchar(128) COLLATE utf8_bin NOT NULL,
  `EC_version` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `TSP_FW` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `3G_FW` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `TV_FW` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `Owner` varchar(128) COLLATE utf8_bin NOT NULL,
  `REMARK` text COLLATE utf8_bin,
  `Build_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Update_Date` datetime DEFAULT NULL,
  `Reserved1` text COLLATE utf8_bin,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `eng_version_control_table`
--

INSERT INTO `eng_version_control_table` (`ID`, `Model_name`, `Customer`, `System_type`, `BIOS_version`, `Bios_release_date`, `EC_version`, `TSP_FW`, `3G_FW`, `TV_FW`, `Owner`, `REMARK`, `Build_Date`, `Update_Date`, `Reserved1`) VALUES
(1, 'WCBT1012', 'Casper', 'Windows 8.1', '1.3', '2014-11-27', '0.14.03', '0xb (5 fingers)', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-29 15:28:35', '2014-11-30 10:18:01', NULL),
(2, 'WCBT1013', 'Posivito docking', 'N/A', 'N/A', 'N/A', '0.14.1', 'AVD: 0x8 QSD: 0x71', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-30 09:55:59', NULL, NULL),
(3, 'WCBT1014', 'Acer', 'Windows 8.1', '1.00.T03', '2014-11-25', '1.01.00', 'AVD: 0xb', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-30 10:01:50', NULL, NULL),
(4, 'WCBT1012', 'NEO', 'Windows 8.1', '1.00', '2014-10-24', '0.14.03', 'AVD: 0x8', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-30 10:09:16', NULL, NULL),
(5, 'WCBT1013', 'ALLVIEW', 'Windows 8.1', '1.00', '2014-10-16', '0.14.00', 'AVD: 0x8', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-30 10:15:30', NULL, NULL),
(6, 'WCBT1013', 'Positivo BGH', 'Windows 8.1', '1.03', '2014-09-24', '0.14.03', 'AVD: 0x8', 'N/A', 'N/A', '郭加辉', 'N/A', '2014-11-30 10:17:26', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `te_wiki_table`
--

CREATE TABLE IF NOT EXISTS `te_wiki_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `wiki_title` varchar(256) COLLATE utf8_bin NOT NULL,
  `wiki_body` text COLLATE utf8_bin NOT NULL,
  `wiki_writor` varchar(128) COLLATE utf8_bin NOT NULL,
  `wiki_build_date` datetime NOT NULL,
  `wiki_update_date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `te_wiki_table`
--

INSERT INTO `te_wiki_table` (`ID`, `wiki_title`, `wiki_body`, `wiki_writor`, `wiki_build_date`, `wiki_update_date`) VALUES
(1, '工程架构图', '暂时无', '郭加辉', '2014-11-29 17:31:49', '0000-00-00 00:00:00'),
(2, 'USB接口测试标准', '&lt;p&gt;USB接口的标准分类：&lt;/p&gt;&lt;p&gt;USB 1.1&lt;/p&gt;&lt;p&gt;USB 2.0&lt;/p&gt;&lt;p&gt;USB 3.0&lt;/p&gt;&lt;p&gt;各标准支持的传输速率：&lt;/p&gt;&lt;p&gt;USB 1.1 2M&lt;/p&gt;', '郭加辉', '2014-11-30 09:33:24', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `validate_issues`
--

INSERT INTO `validate_issues` (`id`, `val_reason`, `val_purpose`, `val_scheme`, `val_failrate`, `val_content`, `val_owner`, `val_date`, `val_status`, `reserved1`) VALUES
(3, 'CASPER LCD休眠唤醒白屏', 'FAE通知客户', 'BIOS FIX', '几率性不良：2/50', '&lt;p&gt;1，OBA测试发现休眠唤醒LCD白屏&lt;/p&gt;&lt;p&gt;2，不良率在2/50左右&lt;/p&gt;&lt;p&gt;3，初步怀疑：PVO 屏的问题或LVDS排线问题&lt;/p&gt;&lt;p&gt;4，待11月25日FAE通客户确认，如果客户不同意则要进行Rework。&lt;/p&gt;&lt;p&gt;5，已提供不良视频给客户确认。&lt;/p&gt;&lt;p&gt;6，BIOS RD会在下次投产时使用新版BIOS---Rudiger Chen。&lt;/p&gt;&lt;p&gt;7，客户同意WAIVE 白屏的ISSUE。&lt;/p&gt;&lt;p&gt;8，目前要求RD针对下一批7K进行改版，11月29日工程品保验证PASS，待周一导入投产。&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;upload/day_141127/201411271724125278.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;', '郭加辉', '2014-11-24 20:40:58', 'Close', '2014-11-29 15:02:14'),
(4, 'Acer 平板FIVT测试结果Fail', '反馈给Acer', 'Acer专门出一版给平板使用的FIVT脚本', '100%', '&lt;p&gt;Acer 平板FIVT测试结果Fail&lt;/p&gt;&lt;p&gt;目前不良LOG已经反馈给Acer确认是否为G-sensor的Driver问题所致。&lt;/p&gt;&lt;p&gt;目前Acer Ajax确认g-sensor在OOBE阶段有可能被系统禁掉，导致CHECKLOGO8测试项目FAIL，经过移除CHECKLOGO8项目后，&lt;span style=&quot;color:#009900;&quot;&gt;FIVT测试结果PASS&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color:#009900;&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;1，Acer提供新版PATCH CD供测试，预计11月26日有测试结果。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color:#009900;&quot;&gt;2，使用11/25版测试结果PASS。&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;', '郭加辉', '2014-11-25 11:54:17', 'Close', '2014-11-26 09:59:05'),
(5, 'Acer WiFi RSSI &amp; Though-put testing', '购买RF设备', '导入生产线测试', '100%', '&lt;p&gt;1，目前衰减器(Attenuator)目前已经拿到&lt;/p&gt;&lt;p&gt;2，Cisco AP已经请购，待收货，预计11月28日OK。&lt;/p&gt;&lt;p&gt;3，屏蔽箱（R&amp;amp;S）目前正在与小波确认是否可在11/E完成。&lt;/p&gt;&lt;p&gt;4，联系了安吉伦的仪器厂商，厂商确认能提供仪器给我们使用的日期，预计11月26日有结果。&lt;/p&gt;&lt;p&gt;5，11月26日：厂商11月27日带仪器过来&lt;/p&gt;&lt;p&gt;6，11月27日：拿到AP，屏蔽箱已经拿到，目前已经架设至A4线。但AP的天线无法转接到屏蔽箱（缺TNC转SMA的转接头），厂商有寄一个过来，发行不行。&lt;/p&gt;&lt;p&gt;7，11月28日：去无锡赛格电子市场，无法买到转接头，只买了个SMA的头，需要EE去焊接。&lt;/p&gt;&lt;p&gt;8，AP初步调试OK，AP无线名称及HDCP功能均已OK。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;9，TNC转SMA接口于11月29日在苏州赛格市场买到4PCS，11月30日开始环境假设。&lt;/p&gt;&lt;p&gt;Cisco AP Command for AP1262N-K-9&lt;br /&gt;&amp;gt;enable&lt;br /&gt;### Setting IP address&lt;br /&gt;AP(config)#config&lt;br /&gt;AP(config-int)#interface bVI 1&lt;br /&gt;AP(config-int)#ip address 192.168.1.1 255.255.255.0&lt;br /&gt;AP(config-int)#no shut&lt;br /&gt;&lt;br /&gt;##dhcp&lt;br /&gt;AP(dhcp-config)#ip dhcp pool ap-dhcp&lt;br /&gt;AP(dhcp-config)#network 192.168.1.0 255.255.255.0&lt;br /&gt;AP(dhcp-config)#default-router 192.168.1.1&lt;br /&gt;AP(dhcp-config)#dns-server 192.168.1.1&lt;br /&gt;AP(dhcp-config)#exit&lt;br /&gt;&lt;br /&gt;###AP&lt;br /&gt;AP(config)#interface dot11Radio 0&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp;&lt;br /&gt;AP(config-if)#encryption mode ciphers tkip&lt;br /&gt;AP(config-if)#ssid cisco-ap&lt;br /&gt;&lt;br /&gt;###ip http service&lt;br /&gt;ip http service&lt;br /&gt;&lt;/p&gt;', '郭加辉', '2014-11-25 13:26:51', 'Open', '2014-11-29 15:00:57'),
(6, 'Intel CMPC FUSE test', 'RD提供FUSE.txt文件', '导入CMPC 200PCS测试', '100%', '&lt;p&gt;1，RD目前正在确认FUSE.TXT的文件，待提供OK后借IRT机器验证。&lt;/p&gt;&lt;p&gt;2，目前SW RD正在找INTEL确认FUSE.TXT文件的具体配置事项，预计11月27日有结果。&lt;/p&gt;&lt;p&gt;3，RD于11月27日提供建议的FUSE.TXT的内容&lt;/p&gt;&lt;p&gt;FUSE_FILE_SECURE_BOOT_EN:01:FALSE&lt;br /&gt;FUSE_FILE_TPM_DISABLE:00:FALSE&lt;br /&gt;FUSE_FILE_OEM_KEY_HASH_1:A9DAED8225064B737B5163E924EF58762C4DECC3AF33AA1ACB35EA4A8237D795:FALSE&lt;br /&gt;FUSE_FILE_ALT_BIOS_LIMIT:07c0:FALSE&lt;br /&gt;FUSE_FILE_KEY_MANIFEST_ID:00:FALSE&lt;/p&gt;&lt;p&gt;4，11月27日开始借IRT机器进行测试。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;', '郭加辉', '2014-11-25 13:28:31', 'Open', '2014-11-27 12:53:57'),
(7, '搬迁苏州计划及费用预算', '明辉统计', '6,7月份平板最后搬迁', '100%', '&lt;p&gt;1，通知明辉明天下午5点前统计出搬迁苏州计划的预算费用。&lt;/p&gt;&lt;p&gt;2，确认工程EE/TE/ME等设备都是小设备，无额外的搬迁费用产生。&lt;br /&gt;&lt;/p&gt;', '汪明辉', '2014-11-26 09:55:43', 'Close', '2014-11-27 12:56:50'),
(8, 'Casper 触摸屏出现5指与10指的异常', 'TSP TONY回复正常', 'TSP TONY检讨TSP厂商', '100%', '&lt;p&gt;1，OBA测试发生TSP支持指数异常&lt;/p&gt;&lt;p&gt;2，TSP TONY需要找业务与FAE确认客户是否同意。&lt;/p&gt;&lt;p&gt;3，确认0x8的版本为10指，0xb的版本为5指。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;4，若要重工需要时间：进系统重工需要28分钟/台；拆后盖重工+重工BIOS需要6分钟/台。&lt;/p&gt;&lt;p&gt;5，11月27日一早确认程序是否支持多点检查。&lt;/p&gt;&lt;p&gt;6，开始重工TSP FW，使用HDMI方式让作业员输入1，2，3的指令去执行动作。3分钟/台。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;upload/day_141126/201411261649517123.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;&lt;/p&gt;', '郭加辉', '2014-11-26 16:47:55', 'Close', '2014-11-27 12:52:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
