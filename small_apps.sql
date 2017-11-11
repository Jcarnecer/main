-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 07:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `small_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` varchar(20) NOT NULL,
  `company_id` varchar(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_conversations`
--

INSERT INTO `chat_conversations` (`id`, `company_id`, `name`, `type`) VALUES
('5TxcjbARH0z', 'PwfLO', 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` varchar(11) NOT NULL,
  `conversation_id` varchar(11) NOT NULL,
  `body` text NOT NULL,
  `created_by` varchar(11) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `conversation_id`, `body`, `created_by`, `created_at`) VALUES
('I6j4VHfPiFO', '5TxcjbARH0z', '8cb3f6bd88ccb118227a6f097e89eee1e1561a6ca3d458ff30cb24955e47b0be568481c0d732986f453881621b59b05e638d7eb68aafb00f8e8347b39d8da0946m9r3pYQNO8ZUmITQ7+65TQ3qnvMQtZntj0mW8d7HPI=', 'WTRNk', '1507260585'),
('meSGtXWrqCz', '5TxcjbARH0z', 'ad5a7751401b0bd29492be2336dc4e3e54249f459cfcb39c3174ea6ec73d9d1abef53b1766f857d9db27f1fedbc28a15abf44f5fc4defd1ce275520c5e9fcd273T9O6LaT0WL5WTR+2SfS5+Lm26EkOeUP5FqCOA5OzSY=', 'WTRNk', '1507261047'),
('ovMcvDp37oI', '5TxcjbARH0z', '57ab2a89a400ba8faf0847856e8de241f812ce42472fc9b523bad9df7c9b99aaca74b1c15aa40cf92b8b209165ac1a745fc86c84c169f752310833b25334b00eFyHEd2rHbqZz9gQM2D3MaFARxS5GOOxgUFxYhFuuGpk=', 'WTRNk', '1507085936'),
('pci6E1816JZ', '5TxcjbARH0z', '753d41cf05311c058e70c6338e0808f1bb3e960d4c450ada1201fdd9c78a5527a1cafd36ab7638581cc74f0938ce6510c15f5484c08686599e2b1122a769e4dcGKJ5yqY8ooYMWq3J4Bl4xWSTTkpBCJhEwgFABRFrbNA=', 'WTRNk', '1507083705'),
('PHEO7eQEn7m', '5TxcjbARH0z', 'abee141ed52a33898ee84ce747d596417bca3caf75aa29f541f950fcf792ed2cc9a0478083944eb983b18139a1fabcd65ef62adbb7cdf0b79ffc84bcf0aad5d7tw+8lj1wgcvWqjLoVZE8AgZ0HZei8eCBuumPby5cQFg=', 'WTRNk', '1507260993'),
('tgUFxT9JXQv', '5TxcjbARH0z', '09e52fe9892a4907f41a77fe18c754ae0b7e7d9fcb473403a95f05512e1bc9e027d6976d81b1a289ad425fe879c64d793c3533afdd4ec9fc3bb81c780dd591cfD6ujYytYMH4dskpwOWxXHe1WOvh+2YQoUEc9vW8ZJFk=', 'WTRNk', '1507261002');

-- --------------------------------------------------------

--
-- Table structure for table `chat_participants`
--

CREATE TABLE `chat_participants` (
  `conversation_id` varchar(11) NOT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_participants`
--

INSERT INTO `chat_participants` (`conversation_id`, `user_id`) VALUES
('5TxcjbARH0z', 'WTRNk');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0eqk1649f2s5ds4h99jmvlg0nm9bb08a', '127.0.0.1', 1507268614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373236383631343b),
('0thrs56qpfdjq406legkjvlhp10s8jmd', '::1', 1507089020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038393032303b),
('18u6mtf4qvvgpmb86tr4eo9suf347eng', '::1', 1507089020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038393032303b),
('1c9k5d1q18nss8gncktn5b07jd703iu7', '::1', 1507252074, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235313739333b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('1nua6tcaor7prd53lg4ahle8kp9jnih4', '::1', 1507085314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038353031393b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('1svv611lkm6qg9ufd9q99ne2kcemhlm3', '::1', 1507084173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038333930383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('2t3iej764kfjob1fvvfj4i63r1m0i9h6', '::1', 1507086300, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038363130373b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('3ip5pcshimfedlrhddeq18f9le22f7vs', '::1', 1507252713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235323731313b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('3u5d3ov21tfe3k3u5ukc7vaq0ku2d0ve', '::1', 1507514398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531343338323b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('54aua6uq8gj70f0qvt3gll7fdade1lmt', '::1', 1507260113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373236303030373b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('5jt2abiqf7k5lrflct90lhjd6tsgav8h', '::1', 1507255683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235333935303b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('5ncv3gtqjqtd3nqaeip4b5k073fsqiq5', '::1', 1507084713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038343539343b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('6hdskbfbs4qela0jjkujvl0kr7oknkef', '::1', 1507261379, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373236313337373b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('7uah5s8r9lmo1851n5k6nl6asgrne274', '::1', 1507087144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038363839333b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('7vjb1ari6qnralobe3s5d73r25mca9u8', '::1', 1507082915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323931353b),
('8uom118ch0j60d3a7nr8202sirrghsnd', '::1', 1507251579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235313432383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('98e97i0v0ekda8mrmfg1jcfv5i3a5a03', '::1', 1507089012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038383633383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('9dh13vcb4k2utumjt3n5trfoep4vgk7u', '::1', 1507252313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235323137353b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('9sbjkc736ha0vgh1gco1v2v30iach5rf', '::1', 1507088608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038383334353b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a2261586b3443223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33313a2269616e2e6372757a40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a333a2249616e223b733a393a226c6173745f6e616d65223b733a343a224372757a223b733a343a22726f6c65223b733a313a2232223b7d),
('bepkmlmkaddmajqp9bmk8b04v24r8q70', '::1', 1507083456, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038333232303b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('btjnfusr38gdts5heanpnq1vh176kn28', '::1', 1507083852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038333630343b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('caklt0o74gilc5bt1gous51b098ii8kk', '::1', 1507098679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039383630363b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('d387qetg4ov7n281fhe4hpn72ubvtfu4', '::1', 1507082039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038313730313b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('dbh352ip5ck3on71979kkqderkdnlin2', '::1', 1507087420, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038373237333b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('dm0o76477ouvc3gmjpijm6gjnut0k27v', '::1', 1507098992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039383939323b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('eb66vhmq426je1rf3coeqetjsjh3ons3', '::1', 1507099695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039393435383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('emgoo0335sqohq6b9dvfv28n2otk0rt5', '::1', 1507516022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531353734313b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('fje493tkqekp254qhnur6gtlvjhdlcjd', '::1', 1507105747, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373130353734363b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('gfqsgiu7thuc69nmjidckmjgodgprj73', '::1', 1507516333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531363138393b),
('h8ki14otnkrd3kj0gknkidic035bsiau', '::1', 1507086016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038353732353b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('hehr6udacgicnt4nmj0uq4hr3hnib8ev', '::1', 1507261047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373236303737373b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('i9cjp67o2kt9pdmn029gnu60nrjkq665', '::1', 1507089423, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038393132393b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('i9ia3emm6isbq90cu5sbjhfsbv66jm18', '::1', 1507097459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039373336363b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('itn66immk7ufabjj1kihs1cci5esenlo', '::1', 1507082939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323738343b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('j50bcvnb4hc95pan25i3b9muq6in0qtb', '::1', 1507082762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323436343b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('k3brpqaj0s2nkpc1o6t2ogji0a9koh4r', '::1', 1507515467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531353338383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('m605ov6e1quh00sugna5cn5eoap69pmo', '::1', 1507088331, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038383034303b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a2261586b3443223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33313a2269616e2e6372757a40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a333a2249616e223b733a393a226c6173745f6e616d65223b733a343a224372757a223b733a343a22726f6c65223b733a313a2232223b7d),
('mcsb3idt6f27e3j8ubpapsljehsb57mj', '::1', 1507082915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323931353b),
('n27qkds4vq5sigv7ngo1dio7an1vs11j', '::1', 1507082915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323931353b),
('n29so6q73gm3il6uoqfqq3rkl22097bu', '::1', 1507099953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039393737363b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('nj6gt9u669ltotaer37187oqmqfm2f5r', '::1', 1507260589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373236303332303b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('nj6rf401o26snh7hd72t14c4iod10pmk', '::1', 1507082275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038323036323b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('o5h51lbq3b5pel14a9v5qh1noac64937', '::1', 1507521443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373532313434333b),
('por86fnh4ir3pcdeg0p76hdoihr24qbi', '::1', 1507089019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038393031393b),
('pp0ipop2ugj9j2d25q6slbf018to69r9', '::1', 1507515323, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531353036303b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('r8ltbkdigh78tageph3alc4961m6lb82', '::1', 1507088041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038383034303b),
('rsbppjanbjnrpnkchgkg52r6hn721ibt', '::1', 1507090449, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373039303038333b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('s3l69b5v53iv72ncshbmshcd256fduba', '::1', 1507090083, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038393433393b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('ssv2lnt3ppdln2oom57pe7r3rtgoj22v', '::1', 1507253601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373235333535373b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('te8tdoc7riquhrit35gcgg4hlqcmiav6', '::1', 1507086804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038363531323b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('ti35offlp50a6gk9elp0i2t1dphok0t5', '::1', 1507087967, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038373731323b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('tu2b103k7cq8oi51iptauvae0uvtc561', '::1', 1507085683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038353339343b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('uphif4fou3fdiiu80oo8tr1hha7bbcer', '::1', 1507515012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373531343733383b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d),
('vdd78ia7kfba7sgprfmsqkn31b40sri5', '::1', 1507084489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373038343233313b757365727c4f3a383a22737464436c617373223a363a7b733a323a226964223b733a353a225754524e6b223b733a31303a22636f6d70616e795f6964223b733a353a225077664c4f223b733a31333a22656d61696c5f61646472657373223b733a33383a2263687269737469616e2e64616c616e40617374726964746563686e6f6c6f676965732e636f6d223b733a31303a2266697273745f6e616d65223b733a31363a2243687269737469616e204a6f7264616e223b733a393a226c6173745f6e616d65223b733a353a2244616c616e223b733a343a22726f6c65223b733a313a2232223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
('PwfLO', 'Astrid Technologies'),
('zlHTcYcICTN', 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `message_reads`
--

CREATE TABLE `message_reads` (
  `message_id` varchar(11) NOT NULL,
  `created_by` varchar(11) NOT NULL,
  `created_at` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_reads`
--

INSERT INTO `message_reads` (`message_id`, `created_by`, `created_at`) VALUES
('pci6E1816JZ', 'aXk4C', 0),
('pci6E1816JZ', 'yAaYLMQEn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `email_address`, `password`, `first_name`, `last_name`, `role`) VALUES
('22ydvz20eP7', 'zlHTcYcICTN', 'christian.dalan@google.com', '35f2233a5da7cb9f85d1ef9666f2ba7e1d89da0686f2792382f2356d1f0637446621be40448348f91a603d0a5702ab230d8f11a897b8ece1cf82e7b26f6595322OhmD8FYwkj62z9eXyaQKTLzcEHUHBpCgl5fV3EoR88=', 'Christian Jordan', 'Dalan', 1),
('aXk4C', 'PwfLO', 'ian.cruz@astridtechnologies.com', 'd25feb3f00932d1bd67ecc74810e6bc45c6d528fcfdc748e9c767425ec1637e91800737191b4677105b69723439b5af8c3a82f75c15586a96e0d3795e16c5814K1ZV6wyiNerRMZDESOg1EsMr37cG3YhdeNK6FSaf9kw=', 'Ian', 'Cruz', 2),
('WTRNk', 'PwfLO', 'christian.dalan@astridtechnologies.com', 'd25feb3f00932d1bd67ecc74810e6bc45c6d528fcfdc748e9c767425ec1637e91800737191b4677105b69723439b5af8c3a82f75c15586a96e0d3795e16c5814K1ZV6wyiNerRMZDESOg1EsMr37cG3YhdeNK6FSaf9kw=', 'Christian Jordan', 'Dalan', 2),
('yAaYLMQEn', 'PwfLO', 'janmichael.jimenez@astridtechnologies.com', 'd25feb3f00932d1bd67ecc74810e6bc45c6d528fcfdc748e9c767425ec1637e91800737191b4677105b69723439b5af8c3a82f75c15586a96e0d3795e16c5814K1ZV6wyiNerRMZDESOg1EsMr37cG3YhdeNK6FSaf9kw=', 'Jan Michael', 'Jimenez', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `conversation_id` (`conversation_id`);

--
-- Indexes for table `chat_participants`
--
ALTER TABLE `chat_participants`
  ADD KEY `group_id` (`conversation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD KEY `message_id` (`message_id`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`company_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat_participants`
--
ALTER TABLE `chat_participants`
  ADD CONSTRAINT `chat_participants_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_participants_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD CONSTRAINT `message_reads_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `chat_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_reads_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
