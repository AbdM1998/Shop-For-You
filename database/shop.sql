-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 10:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`, `cmr_id`) VALUES
(47, 'Abood', 'Hi !\r\n', '2021-01-17 20:53:38', 12),
(48, 'mohammad', 'How are You', '2021-01-17 20:54:01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'abood', 'abood', 'aboodmaster1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0),
(2, 'abood', 'abood', 'aboodmaster1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bestsell`
--

CREATE TABLE `tbl_bestsell` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bestsell`
--

INSERT INTO `tbl_bestsell` (`id`, `productid`, `count`) VALUES
(1, 2, 25),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cmrid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartID`, `sessionID`, `productID`, `productName`, `price`, `Quantity`, `image`, `cmrid`) VALUES
(3, '783reqoht38h0h1m6a0tme5ptv', 2, 'iPhone x', 500, 1, 'upload/4b02eaeeae.png', 2),
(4, '3mjggnq74ctop6d9vi1d1qfe0b', 2, 'iPhone x', 500, 1, 'upload/4b02eaeeae.png', 2),
(6, 'oeo2n8vjs4fp2vtglhks5j2r7r', 2, 'iPhone x', 500, 1, 'upload/4b02eaeeae.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catID`, `catName`) VALUES
(2, 'laptop'),
(4, 'phone'),
(5, 'Mobile phones'),
(6, 'grosre'),
(7, 'grocery'),
(9, 'cat'),
(10, 'gyameazsan'),
(13, 'phone'),
(14, 'laptop'),
(15, 'clothes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_com`
--

CREATE TABLE `tbl_com` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_com`
--

INSERT INTO `tbl_com` (`id`, `cmrId`, `productID`, `name`, `comment`, `comment_date`) VALUES
(6, 2, 2, 'asdasd', 'asdasdasdasdasd', '0000-00-00'),
(13, 2, 2, 'abood0777', 'asd\r\n', '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `cmrId`, `name`, `email`, `subject`, `message`, `status`) VALUES
(1, 11, 'rama', 'abd@gmail.com', 'anything', 'thank you for this tshirt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copy`
--

CREATE TABLE `tbl_copy` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_copy`
--

INSERT INTO `tbl_copy` (`id`, `copyright`) VALUES
(1, 'Shop For You');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(30) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `pass`, `email`, `phone`, `country`, `city`, `address`, `zip`, `date`) VALUES
(2, 'abood', '202cb962ac59075b964b07152d234b70', 'aboodmaster1@gmail.com', '078546543216', 'America', '123', 'https://paypal.me/aboodmoh', '000', '2020-11-10'),
(3, 'abood0777', '202cb962ac59075b964b07152d234b70', 'asdasdasd@asdasd.com', '078546543216', 'America', '123', 'https://paypal.me/aboodmoh', '000', '2020-11-10'),
(4, 'amjad', '202cb962ac59075b964b07152d234b70', 'asdasd@asdasd.com', '0788456446', 'Jordan', 'Amman', 'Amman', '11191', '2020-12-21'),
(5, 'abood', '97c4400d457bcb345b6b30d91632750a', 'aboodmster1@gmail.com', '0788456446', 'Jordan', 'Amman', 'Amman', '11191', '2020-12-27'),
(6, 'amjad', '9be0085bb5d69a140654d68bb6cc509e', 'abooter1@gmail.com', '0788456446', 'Jordan', 'Amman', 'Amman', '11191', '2020-12-29'),
(7, 'abood', '9be0085bb5d69a140654d68bb6cc509e', 'aboodmaster1111@gmail.com', '0788456446', 'Jordan', 'Amman', 'Amman', '11191', '2021-01-12'),
(8, 'Abd alruhman Mohammad', '3f1e4e604147d663e32606ce8ed41099', 'aboodmaster11@gmail.com', '0788456446', 'Jordan', 'Az-zarqa', 'Russayfah', '13713', '2021-01-13'),
(9, 'abood', 'b7112e1f64103132f19953f076fa2023', 'A@gmail.com', '0788456446', 'jordan', 'amman', '10 amman', '11145', '2021-01-15'),
(10, 'Russayfah', 'b7112e1f64103132f19953f076fa2023', 'b@gmail.com', '0788456446', 'Jordan', 'Az-zarqa', '15 zarqa', '13713', '2021-01-15'),
(11, 'anas', '9be0085bb5d69a140654d68bb6cc509e', 'anas@gmail.com', '0788456446', 'Jordan', 'Az-zarqa', '1012331 hgfhgfhgddhg', '13713', '2021-01-15'),
(12, 'Abd alruhman Mohammad', '7794dba21419c74f2be450e0568a0a53', 'a@a.com', '0788456446', 'Jordan', 'Az-zarqa', '25 Abdulmajeed Al-Adwan Street', '13713', '2021-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `title`, `body`, `image`) VALUES
(1, 'slider1', 'Professional photo capture device', 'upload/da465b91f4.jpg'),
(2, 'slider2', 'A distinctive 4K TV screen', 'upload/cc3065a47d.jpg'),
(3, 'slider3', 'Baby clothes with soft and comfortable wool', 'upload/46d0b043ea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productID`, `productName`, `Quantity`, `price`, `image`, `status`, `date`) VALUES
(2, 2, 2, 'iPhone x', 1, 500, 'upload/4b02eaeeae.png', 0, '2020-11-13 22:44:20'),
(3, 2, 2, 'iPhone x', 5, 500, 'upload/4b02eaeeae.png', 0, '2020-11-13 22:45:01'),
(4, 2, 2, 'iPhone x', 4, 500, 'upload/4b02eaeeae.png', 0, '2020-11-14 15:14:05'),
(5, 3, 2, 'iPhone x', 5, 500, 'upload/4b02eaeeae.png', 0, '2020-11-14 15:14:55'),
(6, 2, 2, 'iPhone x', 1, 500, 'upload/4b02eaeeae.png', 0, '2020-11-14 15:16:06'),
(7, 4, 2, 'iPhone x', 1, 500, 'upload/4b02eaeeae.png', 0, '2020-12-21 21:34:02'),
(8, 4, 2, 'iPhone x', 6, 500, 'upload/4b02eaeeae.png', 0, '2020-12-21 21:34:38'),
(9, 2, 3, 'asd', 1, 150, 'upload/c2c85ba824.png', 0, '2020-12-27 16:24:23'),
(10, 7, 2, 'iPhone x', 1, 500, 'upload/4b02eaeeae.png', 0, '2021-01-12 18:52:39'),
(11, 12, 2, 'iPhone x', 1, 500, 'upload/4b02eaeeae.png', 0, '2021-01-16 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `catID` int(11) NOT NULL,
  `body` text CHARACTER SET utf8mb4 NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `qunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `catID`, `body`, `price`, `image`, `type`, `qunt`) VALUES
(2, 'iPhone x', 4, 'asdasdasdasdasd', 500.00, 'upload/4b02eaeeae.png', 0, 3),
(3, 'blackbery', 4, 'asd asdasdasd', 150.00, 'upload/5d9f810199.jpg', 1, 0),
(19, 'IphoneX', 13, 'this is good item', 800.00, 'upload/c87c4e184b.jpg', 0, 15),
(20, 'tablet Mac bro', 13, 'this is good item', 500.00, 'upload/e89d02f718.jpg', 0, 15),
(22, 'samsung 8', 13, 'this is good item', 300.00, 'upload/aee4682d7b.jpg', 1, 15),
(23, 'Red tshirt', 15, 'this is good item', 20.00, 'upload/10a498aa34.png', 0, 24),
(24, 'Black tshirt', 15, 'this is good item', 20.00, 'upload/b8db0bf2aa.jpg', 0, 19),
(25, 'Blue tshirt', 15, 'this is good item', 20.00, 'upload/6d6354bbf8.png', 1, 16),
(26, 'Laptop hp', 14, 'this is good  very laptop', 500.00, 'upload/66e7eca24a.jpg', 0, 7),
(27, 'Laptop samsung', 14, 'very good laptop', 700.00, 'upload/9120defdcd.jpg', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `li` varchar(255) NOT NULL,
  `gm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `li`, `gm`) VALUES
(1, 'www.shopforyou.com', 'www.shopforyou.com', 'www.shopforyou.com', 'www.shopforyou.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productID`, `productName`, `price`, `image`) VALUES
(2, 11, 26, 'Laptop hp', 500, 'upload/66e7eca24a.jpg'),
(3, 11, 24, 'Black tshirt', 20, 'upload/a687fd55d9.png'),
(4, 12, 2, 'iPhone x', 500, 'upload/4b02eaeeae.png'),
(5, 12, 3, 'asd', 150, 'upload/c2c85ba824.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_bestsell`
--
ALTER TABLE `tbl_bestsell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bestsell_1` (`productid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cart_id` (`cmrid`),
  ADD KEY `cart_1` (`productID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_com`
--
ALTER TABLE `tbl_com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compro_1` (`productID`),
  ADD KEY `comcmr_1` (`cmrId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cmrcontact_1` (`cmrId`);

--
-- Indexes for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_1` (`productID`),
  ADD KEY `cmrorder_1` (`cmrId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `catID` (`catID`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wlist_1` (`productID`),
  ADD KEY `cmrwlist_1` (`cmrId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bestsell`
--
ALTER TABLE `tbl_bestsell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_com`
--
ALTER TABLE `tbl_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bestsell`
--
ALTER TABLE `tbl_bestsell`
  ADD CONSTRAINT `bestsell_1` FOREIGN KEY (`productid`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `cart_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cmrcart_1` FOREIGN KEY (`cmrid`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_com`
--
ALTER TABLE `tbl_com`
  ADD CONSTRAINT `comcmr_1` FOREIGN KEY (`cmrId`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compro_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD CONSTRAINT `cmrcontact_1` FOREIGN KEY (`cmrId`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `cmrorder_1` FOREIGN KEY (`cmrId`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`catID`) REFERENCES `tbl_category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `tbl_category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD CONSTRAINT `cmrwlist_1` FOREIGN KEY (`cmrId`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wlist_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
