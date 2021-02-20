-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 09:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `h_catagory`
--

CREATE TABLE IF NOT EXISTS `h_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(200) NOT NULL,
  `updated` varchar(200) NOT NULL,
  `updated_time` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `h_catagory`
--

INSERT INTO `h_catagory` (`id`, `name`, `time`, `creator`, `updated`, `updated_time`) VALUES
(1, 'Sql Injection', '2016-08-12 04:18:03', 'noman', '', ''),
(3, 'Bypass Injection..', '2016-08-12 04:25:21', 'admin', 'noman', '12-08-2016, 07:58:47'),
(4, 'CSS Scripting', '2016-08-12 04:27:16', 'Nimmy', 'admin', '19-08-2016, 06:30:57'),
(5, 'noman', '2016-08-12 05:59:30', 'noman', 'admin', '12-08-2016, 10:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE IF NOT EXISTS `tbl_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(350) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(200) NOT NULL,
  `updated` varchar(200) NOT NULL,
  `updated_time` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`, `time`, `creator`, `updated`, `updated_time`) VALUES
(1, 'java', '2016-08-12 22:15:11', 'admin', '', ''),
(2, 'php', '2016-08-12 22:15:38', 'admin', '', ''),
(4, 'c++', '2016-08-12 22:15:54', 'admin', '', ''),
(5, 'html', '2016-08-12 22:16:00', 'admin', '', ''),
(6, 'css', '2016-08-12 22:16:06', 'admin', '', ''),
(7, 'javascript', '2016-08-12 22:16:29', 'admin', 'noman', '23-08-2016, 12:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(200) DEFAULT NULL,
  `h_cat` varchar(200) DEFAULT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `h_cat`, `title`, `body`, `image`, `author`, `date`, `creator`) VALUES
(29, '1', 'NULL', 'Why Software Developers Choose Java', '<p>Java has been tested, refined, extended, and proven by a dedicated community of Java developers, architects and enthusiasts. Java is designed to enable development of portable, high-performance applications for the widest range of computing platforms possible. By making applications available across heterogeneous environments, businesses can provide more services and boost end-user productivity, communication, and collaboration&mdash;and dramatically reduce the cost of ownership of both enterprise and consumer applications. Java has become invaluable to developers by enabling them to:</p>\r\n<ul>\r\n<li>Write software on one platform and run it on virtually any other platform</li>\r\n<li>Create programs that can run within a web browser and access available web services</li>\r\n<li>Develop server-side applications for online forums, stores, polls, HTML forms processing, and more</li>\r\n<li>Combine applications or services using the Java language to create highly customized applications or services</li>\r\n<li>Write powerful and efficient applications for mobile phones, remote processors, microcontrollers, wireless modules, sensors, gateways, consumer products, and practically any other electronic device</li>\r\n</ul>', 'upload/02d801406b.jpg', 'Jahidul Islam Noman...', '2016-09-03 18:45:52', 'noman'),
(30, '2', 'NULL', 'What is PHP?', 'PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. Originally created by Rasmus Lerdorf in 1994,[4] the PHP reference implementation is now produced by The PHP Group.[5] PHP originally stood for Personal Home Page,[4] but it now stands for the recursive acronym PHP: Hypertext Preprocessor.[6]\r\n\r\nPHP code may be embedded into HTML code, or it can be used in combination with various web template systems, web content management systems and web frameworks. PHP code is usually processed by a PHP interpreter implemented as a module in the web server or as a Common Gateway Interface (CGI) executable. The web server combines the results of the interpreted and executed PHP code, which may be any type of data, including images, with the generated web page. PHP code may also be executed with a command-line interface (CLI) and can be used to implement standalone graphical applications.[7]\r\n\r\nThe standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on almost every operating system and platform, free of charge.[8]\r\n\r\nThe PHP language evolved without a written formal specification or standard until 2014, leaving the canonical PHP interpreter as a de facto standard. Since 2014 work has gone on to create a formal PHP specification', 'upload/1daa251be2.jpg', 'Jahidul Islam Noman...', '2016-09-03 18:58:51', 'noman'),
(31, '1', 'NULL', 'Some Ways Software Developers Learn Java', 'Java is the foundation for virtually every type of networked application and is the global standard for developing and delivering embedded and mobile applications, games, Web-based content, and enterprise software. With more than 9 million developers worldwide, Java enables you to efficiently develop, deploy and use exciting applications and services.\r\nFrom laptops to datacenters, game consoles to scientific supercomputers, cell phones to the Internet, Java is everywhere!\r\nMany colleges and universities offer courses in programming for the Java platform.The Oracle Academy provides a complete porttheir Java programming skills by reading the Oracle Java developer web site, subscribing to Java technology-focused newsletters and Java Magazine, using the Java Tutorial and the New to Java Programming Center, and signing up for Web, virtual, or instructor-led courses and certification.\r\n', 'upload/be4433e625.jpg', 'Jahidul Islam Noman...', '2016-09-03 19:11:39', 'noman'),
(32, '1', 'NULL', 'What is Java technology and why do I need it?', '<p>Java is a programming language and computing platform first released by Sun Microsystems in 1995. There are lots of applications and websites that will not work unless you have Java installed, and more are created every day. Java is fast, secure, and reliable. From laptops to datacenters, game consoles to scientific supercomputers, cell phones to the Internet, Java is everywhere!</p>\r\n<h5 class="sub">Is Java free to download?</h5>\r\n<p>Yes, Java is free to download. Get the latest version at <a href="https://java.com/">java.com</a>.</p>\r\n<p>If you are building an embedded or consumer device and would like to include Java, please <a href="http://www.oracle.com/us/corporate/contact/">contact Oracle</a> for more information on including Java in your device.</p>\r\n<h5 class="sub">Why should I upgrade to the latest Java version?</h5>\r\n<p>The latest Java version contains important enhancements to improve performance, stability and security of the Java applications that run on your machine. Installing this free update will ensure that your Java applications continue to run safely and efficiently.</p>\r\n<hr />\r\n<p><span class="titleblack">MORE TECHNICAL INFORMATION</span><br /><br /> <span class="bodytext"><span class="bodytext"> <a name="whatiget"></a> </span></span></p>\r\n<h5 class="sub">What will I get when I download Java software?</h5>\r\n<p>The Java Runtime Environment (JRE) is what you get when you download Java software. The JRE consists of the Java Virtual Machine (JVM), Java platform core classes, and supporting Java platform libraries. The JRE is the runtime portion of Java software, which is all you need to run it in your Web browser.</p>', 'upload/dfb926302e.jpg', 'Jahidul Islam Noman...', '2016-09-03 19:13:11', 'noman'),
(33, 'Select Catagory', '1', 'SQL Injection (SQLi)', 'SQL injection (SQLi) refers to an injection attack wherein an attacker can execute malicious SQL statements (also commonly referred to as a malicious payload) that control a web application’s database server (also commonly referred to as a Relational Database Management System – RDBMS). Since an SQL injection vulnerability could possibly affect any website or web application that makes use of an SQL-based database, the vulnerability is one of the oldest, most prevalent and most dangerous of web application vulnerabilities.\r\n\r\nBy leveraging an SQL injection vulnerability, given the right circumstances, an attacker can use it to bypass a web application’s authentication and authorization mechanisms and retrieve the contents of an entire database. SQL injection can also be used to add, modify and delete records in a database, affecting data integrity.\r\n\r\nTo such an extent, SQL injection can provide an attacker with unauthorized access to sensitive data including, customer data, personally identifiable information (PII), trade secrets, intellectual property and other sensitive information.', 'upload/a548c225ab.jpg', 'Jahidul Islam Noman...', '2016-09-03 19:18:21', 'noman'),
(34, '5', 'NULL', 'What is HTML?', 'HTML is a computer language devised to allow website creation. These websites can then be viewed by anyone else connected to the Internet. It is relatively easy to learn, with the basics being accessible to most people in one sitting; and quite powerful in what it allows you to create. It is constantly undergoing revision and evolution to meet the demands and requirements of the growing Internet audience under the direction of the » W3C, the organisation charged with designing and maintaining the language.\r\n\r\nThe definition of HTML is HyperText Markup Language.\r\n\r\n    HyperText is the method by which you move around on the web — by clicking on special text called hyperlinks which bring you to the next page. The fact that it is hyper just means it is not linear — i.e. you can go to any place on the Internet whenever you want by clicking on links — there is no set order to do things in.\r\n    Markup is what HTML tags do to the text inside them. They mark it as a certain type of text (italicised text, for example).\r\n    HTML is a Language, as it has code-words and syntax like any other language.\r\n', 'upload/acc6cfa16a.jpg', 'Jahidul Islam Noman...', '2016-09-03 19:21:25', 'noman'),
(35, '1', 'NULL', 'This Is Noman -Test Post', '<p>CMSs are a quite old concept. Some of the common applications of CMSs include a web content management system used to manage content (static HTML files and images) on a company''s web site, or a document management system where a company stores scanned copies of all sales orders. There are different CMS vendors in the market that provide this type of application. CMS vendors need a content repository as a backend, one that handles both structured and non-structured content efficiently. By "structured content," we mean content like a news item or press release that is posted in the system and retrieved by queries (e.g., your application''s front page should display, say, the 3 latest press releases or 10 latest news items). An example of unstructured content is a scanned copy of a sales order or an image that should be displayed on your corporate website.</p>', 'upload/dd92c92c0d.jpg', 'Jahidul Islam Noman...', '2016-09-04 05:57:52', 'noman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(400) NOT NULL,
  `username` varchar(200) NOT NULL,
  `details` varchar(350) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `visible` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `details`, `password`, `image`, `role`, `visible`) VALUES
(1, 'Jahidul Islam Noman...', 'noman', 'A Web Software Engineer', '827ccb0eea8a706c4c34a16891f84e7b', 'upload/bb2269fbd5.jpg', 0, 0),
(7, 'Super admin', 'admin', 'A Software Engineer', '21232f297a57a5a743894a0e4a801fc3', 'upload/0af15f25a1.jpg', 1, 0),
(8, 'michael karmoker shuvo', 'michael', 'A Destop software engineer', '202cb962ac59075b964b07152d234b70', 'upload/a0c31d1212.jpg', 0, 0),
(15, 'abe abdullah sifat', 'sifat', 'charterd accounant', '44d67420cadef41722bb82e96e3a6c0c', 'upload/ebb7477cbf.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `role`) VALUES
(1, 'admin', 0),
(2, 'modarator', 1),
(3, 'editor', 2),
(4, 'Author', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
