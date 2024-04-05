-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql205.infinityfree.com
-- Generation Time: Apr 05, 2024 at 02:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35937738_friendsPharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `certificates` varchar(20) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `biography` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `f_name`, `l_name`, `gender`, `birthday`, `phone`, `password`, `email`, `address`, `photo`, `designation`, `national_id`, `certificates`, `joining_date`, `biography`, `status`) VALUES
(11, 'Hasibur', 'Rahman Santo', 'Male', '1999-01-01', 1303628668, '8238', 'hasiburrahmansanto3@gmail.com', 'Mirpur', '33810.PNG', 'Admin', '81168.PNG', '63646.PNG', '2024-03-27', '<p>BSc in CSE</p>', 1),
(12, 'MD Gourob ', 'Shah', 'Male', '1994-01-05', 1744308895, '5418', 'asadullhagourob@gmail.com', 'Mirpur 2 ', '4488.jpg', 'Manager', '86948.pdf', '47358.pdf', '2023-06-27', '<p>Helo</p>', 1),
(10, 'Monayem', 'Islam', 'Male', '2020-01-28', 1751988550, '220222033', 'mdmonayemislam735@gmail.com', 'Mirpur-02,Block-H,Road No.05.Dhaka-1216', '8354.jpg', 'Admin', '20784.JPG', '79042.JPG', '2024-03-04', 'I am Monayem', 1),
(6, 'Rakibul', 'Islam', 'Male', '1998-11-07', 1992976624, '@#rakib378', 'mdrakibulislam295@gmail.com', 'Middle Pirerbag, Mirpur-2, Dhaka-1216', '84384.jpg', 'Admin', '19331.pdf', '76604.pdf', '2024-03-22', 'Web Developer & Maintenance Engineer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `invoice_id`, `category`, `date`, `amount`, `status`) VALUES
(1, '#Gh90756', 'Electricity Charges', '2024-03-26', '2000', 1),
(2, '#PH894784', 'Equipements', '2024-03-20', '3000', 1),
(3, '#Jh8394f', 'Maintenance', '2024-03-15', '4000', 1),
(4, 'TYui8934', 'Manufacture', '2024-03-26', '10000', 1),
(5, '#hfdjk859', 'Electricity Charges', '2024-04-04', '4000', 1),
(7, '102', 'Equipements', '2024-03-25', '500', 1),
(8, '103', 'Equipements', '2024-03-08', '500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `date_issue` varchar(50) NOT NULL,
  `date_due` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `medicine` varchar(512) NOT NULL,
  `qnt` varchar(50) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `sub_total` varchar(50) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax_amount` varchar(50) DEFAULT NULL,
  `grand_total` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_no`, `date_issue`, `date_due`, `payment_type`, `customer_name`, `address`, `phone`, `email`, `medicine`, `qnt`, `price`, `total`, `sub_total`, `tax`, `tax_amount`, `grand_total`, `status`) VALUES
(1, '#FP75358', '28-03-2024', '28-03-2024', 'Cash', 'Rakibul islam', 'Mirpur-2, Dhaka-1216', '01992976624', 'mdrakibulislam295@gmail.com', 'Napa ,Azicin', '50,50', '5,10', '250,200', '450.00', 5, '22.50', '472.50', 2),
(2, '#FP34373', '28-03-2024', '28-03-2024', 'Cash', 'Monayem Islam', 'Mirpur-2, Dhaka-1216', '01752356789', 'beximcopharmaceuticals@gmail.com', 'Finix,Allopurinol BP,Azicin', '52,50,45', '60,90,30', '3000,2700,600', '6300.00', 10, '630.00', '6930.00', 1),
(3, '#FP74988', '28-03-2024', '28-03-2024', 'Cash', 'Md Monayem Islam', 'Mirpur-02,Block-H,Road No.05.Dhaka-1216', '01751988550', 'mdmonayemislam735@gmail.com', 'Napa ', '3', '21', '63', '63.00', 10, '6.30', '69.30', 1),
(4, '#FP11195', '30-03-2024', '30-03-2024', 'Cash', 'Tariful', 'mirpur_01', '01756284521', 'mdmonayemislam735@gmail.com', 'Azicin', '1', '47', '47', '47.00', 5, '2.35', '49.35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `company_name`, `email`, `phone`, `balance`, `country`, `city`, `state`, `status`) VALUES
(1, 'Square Pharmaceuticals', 'squarepharmaceuticals@gmail.com', 1789634578, '10,000', 'Bangladesh', 'Dhaka', 'Mohakhali', 1),
(2, 'Healthcare Pharmaceuticals', 'healthcarepharmaceuticals@gmail.com', 1752356789, '12,500', 'Bangladesh', 'Dhaka', 'Dhanmondi', 1),
(3, 'Beximco Pharmaceuticals', 'beximcopharmaceuticals@gmail.com', 1752356789, '13,000', 'Bangladesh', 'Dhaka', 'Kallayanpur', 1),
(4, 'ACME Laboratories', 'acmelaboratories@gmail.com', 1992976624, '10,500', 'Bangladesh', 'Dhaka', 'Tejgaon', 1),
(5, 'Incepta Pharmaceuticals', 'inceptapharmaceuticals@gmail.com', 1992976620, '13,000', 'Bangladesh', 'Dhaka', 'Uttara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_ledger`
--

CREATE TABLE `manufacturer_ledger` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `payment_term` varchar(50) NOT NULL,
  `debit` varchar(50) DEFAULT NULL,
  `credit` varchar(50) DEFAULT NULL,
  `balance` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer_ledger`
--

INSERT INTO `manufacturer_ledger` (`id`, `invoice_no`, `date`, `manufacturer`, `payment_term`, `debit`, `credit`, `balance`) VALUES
(1, 'FP2403252403', '2024-03-25', 'Square Pharmaceuticals', 'On Delivery', '5000', '6300', '15,000'),
(2, 'FP2403257268', '2024-03-25', 'Beximco Pharmaceuticals', 'After Dispatch', '5000', '', '11,500');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `MG` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `manufacturer_price` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `expire_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `generic_name`, `SKU`, `MG`, `category`, `manufacturer`, `price`, `manufacturer_price`, `stock`, `expire_date`, `status`, `description`) VALUES
(3, 'Napa ', 'Paracitamol', '12313456', '500', 'Tablet', 'Beximco Pharmaceuticals', '11', '10', '10', '2024-03-31', 0, '<p>qwertyuio</p>'),
(4, 'Azicin', 'Azithromycin', 'BCD', '500', 'Tablet', 'Square Pharmaceuticals', '35', '30', '11', '2026-03-27', 1, '<p>fever</p>'),
(5, 'Finix', 'Rabeprazol sodium ', 'Opsonin Pharma ', '20', 'Tablet', 'Square Pharmaceuticals', '140', '120', '200', '2025-03-06', 1, '<p>Product Available&nbsp;</p>'),
(2, 'Allopurinol BP', 'Allopurinol', 'WG011AQW', '300', 'Tablet', 'Square Pharmaceuticals', '08', '05', '300', '2024-04-06', 1, '<p>Allopurinol is&nbsp;<strong>indicated for reducing urate/uric acid formation in conditions where urate/uric acid deposition has already occurred</strong> (e.g. gouty arthritis, skin tophi, nephrolithiasis) or is a predictable clinical risk (e.g. treatm');

-- --------------------------------------------------------

--
-- Table structure for table `purcahse`
--

CREATE TABLE `purcahse` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `qnt` int(11) NOT NULL,
  `uprice` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purcahse`
--

INSERT INTO `purcahse` (`id`, `sname`, `manufacturer`, `qnt`, `uprice`, `amount`, `date`, `category`, `notes`) VALUES
(1, 'Md. Shahin Alam', 'Healthcare Pharmaceuticals', 50, '100', '5000', '2024-03-26', 'Tablet', 'Cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `manufacturer`, `email`, `phone`, `address`, `status`) VALUES
(1, 'Md. Shahin Alam', 'Healthcare Pharmaceuticals', 'squarepharmaceuticals@gmail.com', '01992976620', 'Middle Pirerbag, Mirpur-2, Dhaka-1216', 1),
(3, 'Md Gourob', 'Healthcare Pharmaceuticals', 'mdmonayemislam735@gmail.com', '01751988550', 'Mirpur-02,Block-H,Road No.05.Dhaka-1216', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer_ledger`
--
ALTER TABLE `manufacturer_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purcahse`
--
ALTER TABLE `purcahse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manufacturer_ledger`
--
ALTER TABLE `manufacturer_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purcahse`
--
ALTER TABLE `purcahse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
