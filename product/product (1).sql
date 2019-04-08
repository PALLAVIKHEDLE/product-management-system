-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2019 at 11:00 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(7, 'Audio Devices'),
(1, 'Electronic'),
(4, 'Home Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_price` int(45) NOT NULL,
  `product_brand` varchar(45) NOT NULL,
  `product_details` varchar(1200) NOT NULL,
  `product_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_brand`, `product_details`, `product_image`) VALUES
(23, 'canon camera', 40000, 'canon EOS 200D', ' DSLR Camera 16 GB Card+Carry Case (Black)', '1552905771canon'),
(25, 'MacBook pro', 215990, 'Apple', '15 inch Retina, Touch Bar,2.2GHz 6-core intel core i7, 16GB RAM 256 GB SSD, color:silver', '1553232809laptop'),
(27, 'Nikon Camera', 35000, 'Nikon D5300', '24.2mp dslr camera, Black color ,16 gb card, 3.5-5.6 gVR kit lens ', '1552996334camera'),
(28, 'paper Shredder', 4000, 'Bambalio BCC-014 Paper', 'Bambalio BCC-014 Paper 8 sheet capacity with cross cut shredder', '1553163181paper'),
(29, 'Night Lamp', 4000, 'acrylic material', 'Show piece display night lamp', 'lamp'),
(30, 'Trolley Music System', 15000, 'croma', 'Bluetooth Connectivity\r\nFM Radio And SD Card Interface\r\nTwo Wireless Microphones\r\nGuitar Input\r\n5 hour Battery Life', '1553166160spkr.jpg'),
(31, 'Wireless soundbar', 50000, 'JBL', 'The soundbar features two detachable battery-powered wireless surround speakers with 10-hours of playtime, 510W of total system power, a 10â€ wireless subwoofer, three HDMIâ„¢ inputs to connect 4K devices and Bluetoothâ„¢. ... The JBL Bar 5.1 re-defines the soundbar experience.', '1553166386jbl.jpg'),
(32, 'playbar', 55000, 'JBL bar 5.1', '5.1-Channel 4K Ultra HD Soundbar with True Wireless Surround Speakers', '1553166606playbar.jpg'),
(33, 'Neckband headset', 4500, 'Sennheiser pmx 686-g', 'Green color, supportable in mostly device, 2-year warranty', '1553235691head.jpg'),
(34, 'MacBook air', 70000, 'Apple', '13 inch 8 GB RAM, 128 GB SSD, color silver, 1.8GHz  dual core intel core i5', '1553232797lap');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(10) NOT NULL,
  `subcategory_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`) VALUES
(16, 'camera'),
(46, 'Headphones'),
(24, 'Lamp'),
(25, 'Laptop'),
(26, 'Paper Shredder'),
(45, 'Speaker');

-- --------------------------------------------------------

--
-- Table structure for table `subcat_cat`
--

CREATE TABLE `subcat_cat` (
  `category_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat_cat`
--

INSERT INTO `subcat_cat` (`category_id`, `subcategory_id`) VALUES
(1, 16),
(4, 24),
(1, 25),
(4, 26),
(7, 45),
(7, 46);

-- --------------------------------------------------------

--
-- Table structure for table `subcat_pro`
--

CREATE TABLE `subcat_pro` (
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat_pro`
--

INSERT INTO `subcat_pro` (`category_id`, `subcategory_id`, `product_id`) VALUES
(1, 16, 23),
(1, 16, 27),
(1, 25, 25),
(1, 25, 34),
(4, 24, 29),
(4, 26, 28),
(7, 45, 30),
(7, 45, 31),
(7, 45, 32),
(7, 46, 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`) VALUES
(1, 'pallavi.khedle@fortunesoftit.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD UNIQUE KEY `subcategory_name` (`subcategory_name`);

--
-- Indexes for table `subcat_cat`
--
ALTER TABLE `subcat_cat`
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `subcat_pro`
--
ALTER TABLE `subcat_pro`
  ADD KEY `category_id` (`category_id`,`subcategory_id`,`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `subcat_cat`
--
ALTER TABLE `subcat_cat`
  ADD CONSTRAINT `subcat_cat_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_cat_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcat_pro`
--
ALTER TABLE `subcat_pro`
  ADD CONSTRAINT `subcat_pro_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_pro_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_pro_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
