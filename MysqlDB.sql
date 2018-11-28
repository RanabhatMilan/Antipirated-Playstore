-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2018 at 02:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_800`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `link`, `image`, `status`, `date_from`, `date_to`, `added_by`, `added_date`, `updated_date`) VALUES
(2, 'Broadway Infosis Nepal', 'https://broadwayinfosys.com', 'Ads-1526574915407.jpg', 1, '2017-12-31', '2019-09-02', NULL, '2018-05-07 16:38:11', '2018-06-03 18:40:46'),
(3, 'Thapathali Engineering Campus', 'http://www.thapathalicampus.edu.np', 'Ads-1526461922849.jpg', 1, '2018-01-01', '2020-01-31', NULL, '2018-05-07 17:40:10', '2018-06-03 18:42:18'),
(4, 'Udemy Online Course', 'http://www.udemy.com', 'Adv-1542859610717.jpg', 1, '2018-01-01', '2018-12-31', NULL, '2018-05-17 21:54:57', '2018-11-22 09:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `summary` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `added_by` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `summary`, `image`, `link`, `status`, `added_by`, `added_date`, `updated_date`) VALUES
(11, 'XYZ', 'This banner belongs to XYZ.', 'Banner-1525510044693.jpg', 'http://xyz.com', 0, 2, '2018-02-08 18:49:15', '2018-05-05 14:32:24'),
(13, 'XYZ', 'This banner belongs to XYZ.', 'Banner-151819418147.png', 'http://xyz.com', 1, 2, '2018-02-09 20:55:51', '2018-02-09 22:21:21'),
(15, 'XYZ', 'This banner belongs to XYZ.', 'Banner-151819287382.png', 'http://xyz.com', 1, 2, '2018-02-09 21:30:12', '2018-02-09 21:59:33'),
(16, 'New Banner', 'No summary.', 'Banner-1518433862699.jpg', '', 1, 2, '2018-02-12 16:56:02', NULL),
(17, 'Skirts For Girls', 'High in Demand.', 'Banner-1526575317783.png', 'http://www.amazon.com', 1, 2, '2018-05-17 22:26:57', NULL),
(18, 'Bags', 'Leather made bags.', 'Banner-1526575416426.jpg', 'http://www.onlineshooping.com', 1, 2, '2018-05-17 22:28:36', NULL),
(19, 'Jewellary Shop', 'Every kinds of jewellary available.', 'Banner-1526575711499.jpg', 'http://www.rbdiamond.com', 1, 2, '2018-05-17 22:32:00', '2018-05-17 22:33:31'),
(20, 'IPhone X', 'Available on amazon.com', 'Banner-1526576634325.png', 'http://www.amazon.com', 1, 2, '2018-05-17 22:48:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `summary` text COLLATE utf8_unicode_ci,
  `featured_image` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `is_parent` tinyint(4) DEFAULT '1',
  `parent_id` int(11) DEFAULT '0',
  `show_in_menu` tinyint(4) DEFAULT '0',
  `show_in_home_tab` tinyint(4) DEFAULT '0',
  `added_by` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `summary`, `featured_image`, `status`, `is_parent`, `parent_id`, `show_in_menu`, `show_in_home_tab`, `added_by`, `added_date`, `updated_date`) VALUES
(1, 'Mens Clothings', 'Every kinds of cloths for men are availlabe.', 'Category-1526455799971.jpg', 1, 1, 0, 1, 1, 2, '2018-05-16 13:14:59', NULL),
(2, 'Womens Clothiing', 'Every kinds of women clothes are available.', 'Category-1526456351188.jpg', 1, 1, 0, 1, 1, 2, '2018-05-16 13:24:11', NULL),
(3, 'Watches', 'Best watches available here.', 'Category-1526456453266.jpg', 1, 1, 0, 1, 1, 2, '2018-05-16 13:25:53', NULL),
(4, 'Jewellary', 'Every kinds of jewellary you get here.', 'Category-1526458024126.png', 0, 0, 10, 1, 1, 2, '2018-05-16 13:27:22', '2018-11-23 12:45:43'),
(5, 'T-Shirt', 'Different fashioned t-shirts are availble.', 'Category-1526456624866.jpg', 1, 0, 1, 1, 1, 2, '2018-05-16 13:28:44', NULL),
(6, 'Electronics', 'Electronics products available here.', 'Category-1526457297617.jpg', 1, 1, 0, 1, 1, 2, '2018-05-16 13:39:57', NULL),
(7, 'Mobile Phone', 'Different Brand mobile Phones available.', 'Category-152645779334.jpg', 1, 0, 6, 1, 1, 2, '2018-05-16 13:48:13', '2018-05-16 13:48:25'),
(8, 'Skirts', 'Women can get the skirts of their desire.', 'Category-1526458556793.png', 1, 0, 2, 1, 1, 2, '2018-05-16 14:00:56', NULL),
(9, 'Ladies Jeans', 'Different branded jeans from different countries are available.', 'Category-1526818515237.jpg', 1, 0, 2, 1, 1, 2, '2018-05-20 18:00:15', NULL),
(10, 'World Cup 2018 Jersey', 'Latest World Cup Kits Of Every World Cup Playing Nations Available', 'Category-1528119680445.jpg', 1, 1, 0, 1, 1, 2, '2018-06-04 19:26:20', NULL),
(12, 'All World Cup Country Jersey Available', 'All World Cup Country Jersey available.All World Cup Country Jersey available.All World Cup Country Jersey available.All World Cup Country Jersey available.All World Cup Country Jersey available.All World Cup Country Jersey available.', 'Category-1528120052993.jpg', 1, 0, 10, 1, 1, 2, '2018-06-04 19:32:32', '2018-06-04 22:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `city` text COLLATE utf8_unicode_ci,
  `country` text COLLATE utf8_unicode_ci,
  `zip_code` text COLLATE utf8_unicode_ci,
  `telephone` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `login_id`, `email`, `address`, `city`, `country`, `zip_code`, `telephone`) VALUES
(32, 4, 'email@address.com', 'address', 'city', 'countary', '23423', '36672'),
(41, 4, 'pratima@gmail.com', 'basundhara', 'ktm', 'nepal', '977', '986274836'),
(43, 4, 'pratima@rb.com', 'kalanki', 'kathmandu', 'Nepal', '877', '02462562'),
(44, 6, 'email@gmail.com', 'heaven', 'rome', 'italy', '5264', '0892423234');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `id` int(11) NOT NULL,
  `first_name` text COLLATE utf8_unicode_ci,
  `last_name` text COLLATE utf8_unicode_ci,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `added_date`) VALUES
(3, 'Milan', 'Ranabhat', 'M', 'milan@rana.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-05-21 18:57:11'),
(4, 'Kareena', 'k.c', 'F', 'kareena@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-05-26 12:45:15'),
(5, 'Apple', 'Banana', 'F', 'bannana@apple.com', '250e77f12a5ab6972a0895d290c4792f0a326ea8', '2018-05-26 17:54:52'),
(6, 'Tiger', 'Jackson', 'M', 'michael@jackson.com', '17b9e1c64588c7fa6419b4d29dc1f4426279ba01', '2018-05-26 18:08:02'),
(7, 'Cristiano', 'Ronaldo', 'M', 'cristiano@ronaldo.com', 'c5320410f64ab07e0ac5ad60bc13b07c61291b13', '2018-06-02 08:09:08'),
(8, 'milan', 'rana', 'M', 'milan@rana.com', 'c5983e484db0b621516387b3e50af84020b214c0', '2018-11-27 08:00:48'),
(9, 'milan', 'rana', 'M', 'milan@rana.com', 'c5983e484db0b621516387b3e50af84020b214c0', '2018-11-27 08:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `c_info_id` int(11) NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci,
  `product_image` text COLLATE utf8_unicode_ci,
  `product_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `amount_with_vat` int(11) NOT NULL,
  `payment` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `c_info_id`, `product_name`, `product_image`, `product_price`, `quantity`, `total_amount`, `amount_with_vat`, `payment`, `added_date`, `status`) VALUES
(18, 27, 'Ladies Jeans Pants', 'Product-1526818333857.jpg', 1800, 2, 3600, 4068, 'Cash On Delevery', '2018-05-26 16:32:21', 1),
(19, 28, 'Korean Skirt', 'Product-1526814700850.jpeg', 1760, 1, 1760, 1989, 'Cash On Delevery', '2018-05-26 16:37:02', 0),
(20, 28, 'SunGlasses', 'Product-1526814966652.jpg', 1000, 1, 1000, 1130, 'Cash On Delevery', '2018-05-26 16:37:02', 1),
(27, 32, 'Ladies Watches', 'Product-1527338699626.jpg', 2375, 1, 2375, 2684, '', '2018-05-27 20:07:16', 1),
(28, 32, 'Samsung Mobile Phone', 'Product-1526808241842.jpg', 23750, 2, 47500, 53675, '', '2018-05-27 20:07:16', 0),
(39, 41, 'Ladies Jeans Pants', 'Product-1526818333857.jpg', 1800, 2, 3600, 4068, 'Cash On delivery', '2018-06-01 22:00:37', 1),
(40, 41, 'Korean Skirt', 'Product-1526814700850.jpeg', 1760, 1, 1760, 1989, 'Cash On delivery', '2018-06-01 22:00:38', 0),
(41, 41, 'Men T-shirts', 'Product-1526816121835.jpg', 1080, 1, 1080, 1220, 'Cash On delivery', '2018-06-01 22:00:38', 1),
(42, 42, 'SunGlasses', 'Product-1526814966652.jpg', 1000, 1, 1000, 1130, 'Cash On delivery', '2018-06-02 16:17:34', 0),
(43, 42, 'Rolex Watch', 'Product-1526561417978.jpg', 23750, 1, 23750, 26838, 'Cash On delivery', '2018-06-02 16:17:34', 1),
(44, 43, 'Refrigerators', 'Product-1527339231637.jpg', 27000, 1, 27000, 30510, 'Cash On delivery', '2018-06-02 23:11:34', 0),
(46, 44, 'Refrigerators', 'Product-1527339231637.jpg', 27000, 1, 27000, 30510, 'Cash On delivery', '2018-06-03 17:45:06', 1),
(47, 44, 'SunGlasses', 'Product-1526814966652.jpg', 1000, 1, 1000, 1130, 'Cash On delivery', '2018-06-03 17:45:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `added_by` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `summary`, `description`, `image`, `status`, `added_by`, `added_date`, `updated_date`) VALUES
(19, 'HomePage', 'This is Homepage.', '', 'Pages-1526462154653.png', 1, NULL, '2018-05-05 14:29:53', '2018-05-17 17:56:16'),
(20, 'Product', 'This is product page.', '&amp;lt;p&amp;gt;Every kinds of products availlabe in this wibsites are listed in this page.&amp;lt;/p&amp;gt;', 'Pages-1526458784326.jpg', 1, NULL, '2018-05-16 14:04:44', NULL),
(21, 'Categories', 'Different categories of products are available in this website.', '&amp;lt;p&amp;gt;Different categories of products are available in this website.Different categories of products are available in this website.Different categories of products are available in this website.Different categories of products are available in this website.&amp;lt;/p&amp;gt;', 'Pages-1526459101538.jpg', 1, NULL, '2018-05-16 14:10:01', NULL),
(22, 'Checkout ', 'Here is the list of the products you have chose to  buy with their detail list.', '&amp;lt;p&amp;gt;Here is the list of the products you have chose to&amp;amp;nbsp; buy with their detail list.Here is the list of the products you have chose to&amp;amp;nbsp; buy with their detail list.Here is the list of the products you have chose to&amp;amp;nbsp; buy with their detail list.Here is the list of the products you have chose to&amp;amp;nbsp; buy with their detail list.Here is the list of the products you have chose to&amp;amp;nbsp; buy with their detail list.&amp;lt;/p&amp;gt;', NULL, 1, NULL, '2018-05-16 14:13:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `cat_id` int(11) DEFAULT NULL,
  `child_cat_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT '0',
  `brand` text COLLATE utf8_unicode_ci,
  `availability` tinyint(4) DEFAULT '1',
  `size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '3',
  `status` tinyint(4) DEFAULT '1',
  `added_by` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `images` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `summary`, `description`, `cat_id`, `child_cat_id`, `price`, `discount`, `brand`, `availability`, `size`, `color`, `rating`, `status`, `added_by`, `added_date`, `updated_date`, `images`) VALUES
(65, 'Samsung Mobile Phone', 'Best mobile phones available in the market.', '&lt;p&gt;Best mobile phones available in the market.Best mobile phones available in the market.Best mobile phones available in the market.Best mobile phones available in the market.&lt;/p&gt;\r\n&lt;p&gt;Best mobile phones available in the market.Best mobile phones available in the market.Best mobile phones available in the market.Best mobile phones available in the market.Best mobile phones available in the market.&lt;/p&gt;', 6, 7, 25000, 5, 'Samsung', 1, '5.5 inch', 'Golden', 5, 1, 2, '2018-05-16 14:19:43', '2018-11-21 16:47:44', 'Product-1526808241842.jpg'),
(66, 'Sony Television', 'High quality display with best sound quality.', '&lt;p&gt;High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.&lt;/p&gt;\r\n&lt;p&gt;High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.High quality display with best sound quality.&lt;/p&gt;', 6, 0, 35000, 10, 'Sony', 1, '32 inch', 'Black', 5, 1, 2, '2018-05-16 14:27:45', '2018-05-26 08:59:20', 'Product-1526808210335.jpg'),
(67, 'Rolex Watch', 'Top branded watch in the world.', '&lt;p&gt;Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.Top branded watch in the world.&lt;/p&gt;', 3, 0, 25000, 5, 'Rolex', 1, '', 'Blue', 5, 1, 2, '2018-05-16 14:31:36', '2018-05-25 19:19:41', 'Product-1526561417978.jpg'),
(68, 'Neckless', '24 carret gold neckless.', '&lt;p&gt;Different designed gold and diamond neckless are available.Different designed gold and diamond neckless are available.Different designed gold and diamond neckless are available.Different designed gold and diamond neckless are available.&lt;/p&gt;', 4, 0, 150000, 10, '', 1, '', '', 3, 1, 2, '2018-05-17 20:46:00', '2018-05-20 15:08:11', 'Product-1526808191610.jpg'),
(69, 'Huawei Y9', 'HD display. 16MP front and 32MP back camera. Longterm battery power.', '&lt;p&gt;HD display. 16MP front and 32MP back camera. Longterm battery power.HD display. 16MP front and 32MP back camera. Longterm battery power.HD display. 16MP front and 32MP back camera. Longterm battery power.HD display. 16MP front and 32MP back camera. Longterm battery power.&lt;/p&gt;', 6, 7, 30000, 10, 'Huwaie', 1, '6.2 inch', 'silver', 2, 1, 2, '2018-05-17 20:51:45', '2018-05-26 18:21:33', 'Product-1526569605416.jpg'),
(70, 'Red cotton T-shirt', 'Summer wear.', '&lt;p&gt;In this summer you can add fashion with this attractive t-shirt.&lt;/p&gt;', 1, 5, 1000, 15, 'korean', 1, 'XL', 'red', 3, 1, 2, '2018-05-17 20:56:45', '2018-05-26 08:49:50', 'Product-1526812654928.JPG'),
(71, 'Korean Skirt', 'New korean skirt for girls.', '&lt;p&gt;This is the latest skirt that is in high demand.&lt;/p&gt;', 2, 8, 2000, 12, 'korean', 1, '', 'light pink', 3, 1, 2, '2018-05-17 21:15:12', '2018-05-20 16:56:40', 'Product-1526814700850.jpeg'),
(72, 'SunGlasses', 'Top branded sun glasses .These are the  Popular and mostly in used sunglasses.These are the  Popular and mostly in used sunglasses.', '&lt;p&gt;&lt;span style=\\&quot;color: #626262; background-color: #ffffff;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;These are the&amp;nbsp; Popular and mostly in used sunglasses.&lt;/span&gt;&lt;/p&gt;', 0, 0, 1000, 0, 'Rebbon, Spectacula', 1, '', '', 3, 1, 2, '2018-05-20 17:01:06', NULL, 'Product-1526814966652.jpg'),
(73, 'Men T-shirts', 'Cool t-shirts for both men.', '&lt;p&gt;&lt;em&gt;These are the latest t-shirts highly in demand in the market.&lt;/em&gt;These are the latest t-shirts highly in demand in the market.These are the latest t-shirts highly in demand in the market.These are the latest t-shirts highly in demand in the market.These are the latest t-shirts highly in demand in the market.&lt;/p&gt;', 1, 5, 1200, 10, 'Hugo Boss, Puma, Diesel,Burberry', 1, 'XL,L,XXL', 'red,black,white,yellow', 4, 1, 2, '2018-05-20 17:20:21', '2018-05-25 19:19:14', 'Product-1526816121835.jpg'),
(74, 'Women Jackets', 'Stylish jackets for womens which are highly demanded in the market.', '&lt;p&gt;Stylish jackets which are highly demanded in the market.Stylish jackets which are highly demanded in the market.Stylish jackets which are highly demanded in the market.Stylish jackets which are highly demanded in the market.Stylish jackets which are highly demanded in the market.&lt;/p&gt;', 2, 0, 4000, 15, 'Levi\\\'s, French Connection, Topman', 1, '', 'Black, white, grey, brown', 5, 1, 2, '2018-05-20 17:50:07', '2018-05-25 19:19:06', 'Product-152681790757.jpg'),
(75, 'Ladies Jeans Pants', 'Comfortable and streachable jeans in low price with high quality for fashion lover girls.', '&lt;p&gt;Comfortable and streachable jeans in low price with high quality.Comfortable and streachable jeans in low price with high quality.Comfortable and streachable jeans in low price with high quality.Comfortable and streachable jeans in low price with high quality.&lt;/p&gt;', 2, 9, 2000, 10, 'LEE, PEPE JEANS, DIESEL, SPYKAR', 1, '', '', 3, 1, 2, '2018-05-20 17:57:13', '2018-05-20 18:01:48', 'Product-1526818333857.jpg'),
(76, 'Ladies Watches', 'Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.Top branded watches available.', '&lt;p&gt;These are the world top branded famous watches. New fashioned. Girls of any aged group can use these watches.These are the world top branded famous watches. New fashioned. Girls of any aged group can use these watches.These are the world top branded famous watches. New fashioned. Girls of any aged group can use these watches.These are the world top branded famous watches. New fashioned. Girls of any aged group can use these watches.&lt;/p&gt;', 3, 0, 2500, 5, 'Camel,Cannon', 1, '', 'blue,yellow,white,pink', 5, 1, 2, '2018-05-26 18:29:59', '2018-06-01 20:00:22', 'Product-1527338699626.jpg'),
(77, 'Refrigerators', 'Different sized refrigerators available with a large number of choices in color.Different sized refrigerators available with a large number of choices in color.Different sized refrigerators available with a large number of choices in color.Different sized refrigerators available with a large number of choices in color.Different sized refrigerators available with a large number of choices in color.', '&lt;p&gt;Theses refrigerators are high in demand in these summer. Heavy discount is provided to the customers who are buying in this summer. A large number of bumper prizes are there as an offer to the one who are buying these refrigetators.Theses refrigerators are high in demand in these summer. Heavy discount is provided to the customers who are buying in this summer. A large number of bumper prizes are there as an offer to the one who are buying these refrigetators.&lt;/p&gt;', 6, 0, 30000, 10, 'LG,SONY', 1, '', 'Brown,Black,Red,White', 3, 1, 2, '2018-05-26 18:38:51', NULL, 'Product-1527339231637.jpg'),
(78, 'Brazil World Cup kit', 'This is latest jersey of Brasil for the World Cup 2018.This is latest jersey of Brasil for the World Cup 2018.This is latest jersey of Brasil for the World Cup 2018.This is latest jersey of Brasil for the World Cup 2018.', '&lt;p&gt;This is latest jersey of Brasil for the World Cup 2018.Pieces are limited so order fast. Wear brasil latest kit to support brasil.This is latest jersey of Brasil for the World Cup 2018.Pieces are limited so order fast. Wear brasil latest kit to support brasil.This is latest jersey of Brasil for the World Cup 2018.Pieces are limited so order fast. Wear brasil latest kit to support brasil.&lt;/p&gt;', 10, 12, 1500, 10, 'Top Brand', 1, 'L,XL,M', 'Yellow', 3, 1, 2, '2018-06-04 22:42:14', '2018-06-05 09:46:23', 'Product-1528171283100.jpg'),
(79, 'Portugal World Cup 2018 Kits', 'New kit of Portugal  for World Cup 2018 available here.', '&lt;p&gt;&lt;span style=\\&quot;color: #626262; background-color: #ffffff;\\&quot;&gt;This is the latest kit of Portugal for the World Cup 2018. Pieces are limited .You can order now to&amp;nbsp; get it before it become out of stock.Wear this kit to support portugal as they are one of the contender of World Cup 2018.&lt;/span&gt;&lt;span style=\\&quot;background-color: #ffffff; color: #626262;\\&quot;&gt;This is the latest kit of Portugal for the World Cup 2018. Pieces are limited .You can order now to&amp;nbsp; get it before it become out of stock.Wear this kit to support portugal as they are one of the contender of World Cup 2018.&lt;/span&gt;&lt;/p&gt;', 10, 0, 1500, 10, 'Top Brand', 1, 'M, L, XL', 'Red, White', 2, 1, 2, '2018-06-05 09:59:10', '2018-11-25 21:22:24', 'Product-1528172050101.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(88, 67, 'Product-1526561417978.jpg'),
(91, 69, 'Product-1526569605416.jpg'),
(107, 68, 'Product-1526808191610.jpg'),
(110, 66, 'Product-1526808210335.jpg'),
(112, 65, 'Product-1526808241842.jpg'),
(115, 70, 'Product-1526812654928.JPG,Product-152656990599.jpg'),
(116, 71, 'Product-1526814700850.jpeg,Product-1526808167151.jpeg'),
(117, 72, 'Product-1526814966652.jpg,Product-1526814966193.jpg,Product-1526814966475.jpg'),
(118, 73, 'Product-1526816121835.jpg,Product-1526816121921.jpg,Product-1526816121797.jpg,Product-1526816121846.JPG,Product-1526816121655.jpg'),
(119, 74, 'Product-152681790757.jpg,Product-1526817907617.jpg,Product-1526817907271.jpg,Product-1526817907691.jpg,Product-1526817907592.jpg,Product-1526817907967.jpg'),
(120, 75, 'Product-1526818333857.jpg,Product-1526818333384.jpg,Product-1526818333165.jpg,Product-1526818333646.jpg,Product-1526818333620.jpg'),
(121, 76, 'Product-1527338699626.jpg,Product-1527338699870.jpg,Product-1527338699884.jpg'),
(122, 77, 'Product-1527339231637.jpg,Product-1527339231449.jpg,Product-1527339231450.jpg,Product-1527339231490.jpg,Product-1527339231502.jpg'),
(124, 78, 'Product-1528171283100.jpg,Product-1528131434309.jpg'),
(125, 79, 'Product-1528172050101.jpg,Product-1528172050385.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `review` text COLLATE utf8_unicode_ci,
  `rating` int(11) DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`id`, `product_id`, `name`, `email`, `review`, `rating`, `added_date`) VALUES
(2, 70, 'Milan', 'milan@rb.com', 'This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.This is the best t-shirt i have ever used.', 5, '2018-05-25 23:23:24'),
(3, 67, 'John', 'john@doe.com', 'This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.', 3, '2018-05-25 23:37:02'),
(4, 70, 'Bikash', 'biku@gmail.com', 'Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.Best one.', 4, '2018-05-26 07:21:53'),
(5, 70, 'Michael', 'jackson@michael.com', 'Good.Want more product to be added.Good.Want more product to be added.Good.Want more product to be added.Good.Want more product to be added.Good.Want more product to be added.Good.Want more product to be added.Good.Want more product to be added.', 3, '2018-05-26 07:30:37'),
(6, 70, 'Kiran', 'xyz@gmail.com', 'Want same t-shirt in blue color.Want same t-shirt in blue color.Want same t-shirt in blue color.Want same t-shirt in blue color.Want same t-shirt in blue color.Want same t-shirt in blue color.Want same t-shirt in blue color.', 2, '2018-05-26 08:33:48'),
(7, 70, 'Name', 'email@address.com', 'Your products are the worst in the world.Your products are the worst in the world.Your products are the worst in the world.Your products are the worst in the world.Your products are the worst in the world.', 1, '2018-05-26 08:47:42'),
(8, 66, 'Milan', 'milan@rb.com', 'Nice display. Good sound quality. Enjoyed watching.Nice display. Good sound quality. Enjoyed watching.Nice display. Good sound quality. Enjoyed watching.Nice display. Good sound quality. Enjoyed watching.Nice display. Good sound quality. Enjoyed watching.', 5, '2018-05-26 08:59:20'),
(9, 69, 'Pollard', 'west@indies.com', '', 0, '2018-05-26 09:16:15'),
(10, 75, 'Passa', 'passa@gmail.com', 'This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.This is my review.', 3, '2018-05-26 09:48:20'),
(11, 69, 'Pratima', 'rb@gmail.com', 'It is really a best version of Huawei. I feel in love with this one.It gives really nice selfies.Battery runs for about 8hrs on continuous use.I would give 4.5 stars on 5.', 4, '2018-05-26 14:07:42'),
(12, 75, 'Sandesh', 'knockout@system.com', 'Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.Nice ladies jeans.', 3, '2018-05-26 14:37:41'),
(13, 76, 'Zidane', 'zinedine@gmail.com', 'Watches are so pretty.My children really loved these watches.Watches are so pretty.My children really loved these watches.Watches are so pretty.My children really loved these watches.Watches are so pretty.My children really loved these watches.Watches are so pretty.My children really loved these watches.', 5, '2018-06-01 20:00:22'),
(14, 65, 'Milan', 'rana@bhat.com', 'Best among the mid range mobile phones available in the market.Best among the mid range mobile phones available in the market.Best among the mid range mobile phones available in the market.', 5, '2018-11-21 16:47:44'),
(15, 79, 'Milan', 'rana@bhat.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum do', 2, '2018-11-25 21:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `address` text COLLATE utf8_unicode_ci,
  `added_by` int(11) DEFAULT NULL,
  `remember_me` text COLLATE utf8_unicode_ci,
  `login_ip` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role_id`, `status`, `address`, `added_by`, `remember_me`, `login_ip`, `login_date`, `added_date`, `updated_date`) VALUES
(1, 'Test User', 'admin@test.com', 'admin', 1, 1, NULL, NULL, NULL, NULL, NULL, '2018-01-30 08:59:30', '2018-02-06 19:23:12'),
(2, 'Admin User', 'admin@admin.com', 'a55b5b4581d3f5e35300eb5f40f84cab942233c9', 1, 1, NULL, NULL, NULL, NULL, NULL, '2018-02-06 19:16:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` text COLLATE utf8_unicode_ci,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `added_date`) VALUES
(8, 4, '75,74', '2018-06-01 16:59:07'),
(9, 3, '77,72', '2018-06-01 17:01:54'),
(10, 5, '73,75,70,77,66', '2018-06-01 18:53:57'),
(14, 7, '76,70', '2018-06-02 08:18:51'),
(15, 6, '69', '2018-06-03 17:42:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `child_cat_id` (`child_cat_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
