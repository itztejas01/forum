-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 05:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `title`, `body`, `timestamp`) VALUES
(10, 1, 'career field', 'The word “guidance” originated back in the 1530s, and is defined as the process of directing conduct. Career guidance can be defined as a comprehensive, developmental program designed to assist individuals in making and implementing informed educational and occupational choices. In simple words, it is a journey on which people develop to make mature and informed decisions. It is the act of guiding or showing the way; it is the act of seeking advice.\r\n\r\nCareer guidance is the guidance given to individuals to help them acquire the knowledge, information, skills, and experience necessary to identify career options, and narrow them down to make one career decision. This career decision then results in their social, financial and emotional well-being throughout.\r\n\r\nIn an age where career queries are not uncommon, it’s important to answer queries related to career guidance or career, in general.\r\nStudent Of Class 9th - 10th\r\n\r\nSetting the basics right solves a lot of confusions that might arise later. Whether it is choosing the correct stream to the correct board, and mapping career goals, a right start at the right time makes all the difference.\r\n\r\nStudent Of Class 11th - 12th\r\n\r\nOne chooses one’s stream out of the four possible options (non-medical, medical, humanities, commerce), however the career options possible for a student to opt for are more than hundreds. To make sure that the entire process from choosing the right career options to achieving those goals goes smoothly, it is important that one seek career guidance from an informed (and experienced) mentor (read: career guide)\r\n\r\nCollege Going Students/ Working Professionals\r\n\r\nFor people who have already made a career decision need to work towards it, to attain the maximum results. A guide informs them of the best career opportunities and ways to do the best in the field they have chosen for themselves. Generally, people end up taking the wrong paths in order to achieve their goals. Either they realize that the career option they have chosen isn’t meant for them, or it dawns upon them that the option they have chosen isn’t strong enough to keep them motivated or excited throughout their professional lives. As a result, they tend to rely on an expert’s advice, and that is where a guide steps in.', '2021-07-07 13:36:23'),
(13, 2, 'web development', 'Web Development\r\nGo from no-code to an in-demand junior web developer, at a fraction of the cost of a bootcamp. Start with the front-end by learning HTML, CSS, and JavaScript. Then, master the back-end and APIs to round out your full-stack skills.\r\n\r\nTo start this Career Path, sign up for Codecademy Pro.\r\n\r\nUNDERSTAND THE FULL STACK\r\nMaster the tools that front-end developers use every day, from HTML to React, plus server-side back-end JavaScript libraries with Express.js.\r\n\r\nBUILD A WEB APP\r\nGo beyond a landing page. Build the back-end of a web application and even create your own API.\r\n\r\nSHOW OFF YOUR SKILLS\r\nBuild portfolio-worthy projects while you learn, so you can show recruiters your skills and kick-start your career as a web developer.\r\n\r\nWhat projects will you build?', '2021-07-07 13:56:24'),
(14, 4, 'Crypto-miner', 'Cryptocurrencies, once the exclusive domain of an idealistic fringe movement, have recently become attractive to mainstream retail investors. During the COVID-19 pandemic, the valuation of cryptocurrencies rose exponentially, reaching a market capitalization of over $2 trillion. Cybercriminals are always looking for the path of least resistance to make money and cryptocurrencies are now in their crosshairs.\r\n\r\nSecurity researchers at the Lookout Threat Lab have identified over 170 Android apps, including 25 on Google Play, scamming people interested in cryptocurrencies. Many of them available globally, these apps advertise themselves as providing cloud cryptocurrency mining services for a fee. After analyzing them, we found that no cloud crypto mining actually takes place. \r\nthis is tejas', '2021-07-07 18:28:13'),
(15, 3, 'cloud-computing', 'Cloud computing is a general term for anything that involves delivering hosted services over the internet. These services are divided into three main categories: infrastructure as a service (IaaS), platform as a service (PaaS) and software as a service (SaaS).\r\n\r\nA cloud can be private or public. A public cloud sells services to anyone on the internet. A private cloud is a proprietary network or a data center that supplies hosted services to a limited number of people, with certain access and permissions settings. Private or public, the goal of cloud computing is to provide easy, scalable access to computing resources and IT services.\r\n\r\nCloud infrastructure involves the hardware and software components required for proper implementation of a cloud computing model. Cloud computing can also be thought of as utility computing, or on-demand computing.\r\n\r\nThe name cloud computing was inspired by the cloud symbol that\'s often used to represent the internet in flowcharts and diagrams.', '2021-07-07 17:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_create`) VALUES
(1, 'Web development career', 'Web development is the work involved in developing a Web site for the Internet (World Wide Web) or an intranet (a private network).[1] Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services. A more comprehensive list of tasks to which Web development commonly refers, may include Web engineering, Web design, Web content development, client liaison, client-side/server-side scripting, Web server and network security configuration, and e-commerce development.\r\n\r\nAmong Web professionals, \"Web development\" usually refers to the main non-design aspects of building Web sites: writing markup and coding.[2] Web development may use content management systems (CMS) to make content changes easier and available with basic technical skills.', '2021-06-18 11:42:57'),
(2, 'New Idea', 'If you are thinking of starting a business in 2021, it is critical to take the new normal into account. The COVID-19 pandemic has changed so much about how people consume products and services. While starting a retail business or restaurant might have been good ideas previously, you might be best served to reconsider those thoughts until you see how the next year plays out. Instead of some more traditional businesses, think about those that can support how people are now living their lives. No matter what type of business you pursue you\'ll want to create a sound business plan, but many of the ideas on this list only require a credit card processing partner to accept payments to get started.\r\n\r\nThis list of business ideas includes 21 great types of business to help you find success in 2021 and beyond. If you find an area you want to pursue, be sure to review the steps for how to start your own business.\r\n', '2021-06-18 11:45:44'),
(3, 'best career', '2020 has been a very surprising year. It has taught us many lessons, but the most prominent one would undoubtedly be that we should always prepare for the future. You should choose skills and trades that will stay in demand in the future to ensure security and stability in your career.\r\n1. Data Scientist\r\nData Science is one of the hottest sectors currently and for good reasons. The amount of data companies and their customers use has increased exponentially. Organizations need the expertise of data scientists to help them use that data effectively.\r\n2. Data Analyst\r\nWhile data scientists analyze the data and develop solutions by utilizing them, you need professionals who can make the data understandable for everyone too. That’s what data analysts do. A data analyst is responsible for making the complex data and its insights understandable for the general audience.', '2021-06-18 13:32:16'),
(4, 'cloud-computing', 'Cloud computing is the on-demand availability of computer system resources, especially data storage (cloud storage) and computing power, without direct active management by the user. The term is generally used to describe data centers available to many users over the Internet. Large clouds, predominant today, often have functions distributed over multiple locations from central servers. If the connection to the user is relatively close, it may be designated an edge server.\r\n\r\nClouds may be limited to a single organization (enterprise clouds), or be available to multiple organizations (public cloud).\r\n\r\nCloud computing relies on sharing of resources to achieve coherence and economies of scale.\r\n\r\nAdvocates of public and hybrid clouds note that cloud computing allows companies to avoid or minimize up-front IT infrastructure costs.', '2021-06-19 13:36:38'),
(5, 'Crypto-mining', 'Bitcoin mining is the process by which new bitcoins are entered into circulation, but it is also a critical component of the maintenance and development of the blockchain ledger. It is performed using very sophisticated computers that solve extremely complex computational math problems.\r\n\r\nCryptocurrency mining is painstaking, costly, and only sporadically rewarding. Nonetheless, mining has a magnetic appeal for many investors interested in cryptocurrency because of the fact that miners are rewarded for their work with crypto tokens. This may be because entrepreneurial types see mining as pennies from heaven, like California gold prospectors in 1849.A New Gold Rush\r\nThe primary draw for many mining is the prospect of being rewarded with Bitcoin. That said, you certainly don\'t have to be a miner to own cryptocurrency tokens. You can also buy cryptocurrencies using fiat currency; you can trade it on an exchange like Bitstamp using another crypto (as an example, using Ethereum or NEO to buy Bitcoin); you even can earn it by shopping, publishing blog posts on platforms that pay users in cryptocurrency, or even set up interest-earning crypto accounts.\r\n\r\nAn example of a crypto blog platform is Steemit, which is kind of like Medium except that users can reward bloggers by paying them in a proprietary cryptocurrency called STEEM. STEEM can then be traded elsewhere for Bitcoin.\r\n\r\nThe Bitcoin reward that miners receive is an incentive that motivates people to assist in the primary purpose of mining: to legitimize and monitor Bitcoin transactions, ensuring their validity. Because these responsibilities are spread among many users all over the world, Bitcoin is a \"decentralized\" cryptocurrency, or one that does not rely on any central authority like a central bank or government to oversee its regulation\r\n\r\n', '2021-06-19 13:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_con` text NOT NULL,
  `dis_id` int(10) NOT NULL,
  `comment_by` text NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_con`, `dis_id`, `comment_by`, `comment_time`) VALUES
(14, 'by doing courses', 1, '2', '2021-06-24 11:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_subject` varchar(50) NOT NULL,
  `c_desc` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`c_id`, `c_name`, `c_email`, `c_subject`, `c_desc`, `timestamp`) VALUES
(4, 'TEJAS RAJENDRA CHAPLOT', 'tejas.chaplot@somaiya.edu', '', 'abc', '2021-07-02 09:35:37'),
(5, 'raju', 'raju@gmail.com', '', 'tejas', '2021-07-02 09:40:18'),
(6, 'raju chaplot', 'chaplottejas@gmail.com', '', 'asas', '2021-07-02 09:41:46'),
(7, 'Tejas', 'chaplottejas@gmail.com', '', 'wqqw', '2021-07-02 09:43:34'),
(8, 'Tejas Chaplot', 'chaplottejas@gmail.com', '', 'As of now call us', '2021-07-09 00:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `dis_id` int(50) NOT NULL,
  `dis_title` varchar(255) NOT NULL,
  `dis_desc` text NOT NULL,
  `dis_user_id` int(50) NOT NULL,
  `dis_cat_id` int(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`dis_id`, `dis_title`, `dis_desc`, `dis_user_id`, `dis_cat_id`, `timestamp`) VALUES
(1, 'How can i start in web development?', 'I have studied various online web development courses and taken part in various program.', 4, 1, '2021-06-19 13:41:57'),
(29, 'new app', 'app development\r\n', 3, 0, '2021-06-20 13:08:19'),
(30, 'new app', 'app development\r\n', 2, 1, '2021-06-20 13:08:39'),
(32, 'mobile web', 'how to mobile web app', 4, 0, '2021-06-20 13:09:15'),
(33, 'new app', 'app development\r\n', 1, 0, '2021-06-20 13:09:39'),
(34, 'new app', 'app development\r\n', 1, 0, '2021-06-20 13:09:44'),
(35, 'my database ', 'my databse is not connecting properly', 2, 1, '2021-06-20 13:17:34'),
(37, 'cloud computing', 'how to start in cloud computing field', 4, 2, '2021-06-20 13:18:51'),
(48, 'how can i start in web development', 'web development ', 2, 1, '2021-06-23 11:21:28'),
(49, 'learn html', 'how to html', 5, 1, '2021-06-23 14:26:05'),
(50, 'learn html', 'how to html', 5, 1, '2021-06-23 14:33:04'),
(56, 'Competitive Programming', 'The future recruitment of IT companies is Competitive programming\r\n', 8, 3, '2021-07-09 00:07:59'),
(57, 'Competitive Programming', 'Using C', 8, 2, '2021-07-09 00:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sno` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email_id` varchar(30) NOT NULL,
  `user_pass` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sno`, `user_name`, `user_email_id`, `user_pass`, `gender`, `timestamp`) VALUES
(1, 'Rishabh chaplot', 'chaplottejas@gmail.com', '123456', 'Male', '2021-06-21 12:59:36'),
(2, 'Tejas Chaplot', 'tejas.chaplot@somaiya.edu', '$2y$10$X48StSIhFG4tMG5m5AbicOzLtGs2o2R0iDNFoMfX648j4z7Goi0a.', 'Male', '2021-06-21 13:23:19'),
(3, 'shruti chaplot', 'shruti@gmail.com', '$2y$10$E3w8Qp.19R80lN7/IlJyv.6pjyjSll4YkeNmlADXTORLbEVtrFXli', 'Female', '2021-06-21 13:45:48'),
(4, 'Nandini radiya', 'nanna@123.com', '$2y$10$lFk7ip/9a3gRvwdKU6FNtuFu9VGoJDnS59V6GZwKpNvYv4uGrRQa.', 'Female', '2021-06-23 12:44:31'),
(5, 'raju chaplot', 'raju.chaplot@gmail.com', '$2y$10$.HoAa4CPFs2BfDm62fR3TePJLk56/eEqPmHNcZio70/v99N3Qx8my', 'Male', '2021-06-23 14:22:51'),
(6, 'manisha chaplot', 'manachaplot@gmail.com', '$2y$10$3jV7cAsbELRoaCZa50k/Ke5ZEj8gIf4mDDqy7uZlYSzqiSVHJKhhW', 'Female', '2021-07-07 18:05:27'),
(7, 'shruti', 'shruti.chaplot@gmail.com', '$2y$10$5PEoeskXPmC7MxJVXy/W2.OoEpObjLjBJU7xdsmKriyTJ7z6YpgZa', 'Female', '2021-07-08 14:01:10'),
(8, 'Reena Lokare', 'reena.l@somaiya.edu', '$2y$10$pv9.sLBI5RCVENvfraONeeqF5lCUy/Jv50wT2Vca.nGcvJBLjRyEW', 'Female', '2021-07-08 23:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);
ALTER TABLE `category` ADD FULLTEXT KEY `cat_name` (`cat_name`,`cat_desc`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);
ALTER TABLE `comments` ADD FULLTEXT KEY `comment_con` (`comment_con`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`dis_id`);
ALTER TABLE `discussion` ADD FULLTEXT KEY `dis_title` (`dis_title`,`dis_desc`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `answer_id` (`answer_id`,`user_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `dis_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
