-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 06:50 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(5) NOT NULL,
  `street` text NOT NULL,
  `brgy` text NOT NULL,
  `city` text NOT NULL,
  `province` text NOT NULL,
  `zip_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `street`, `brgy`, `city`, `province`, `zip_code`) VALUES
(1, 'phase 4', 'urban', 'san carlos', 'negros', '6400'),
(2, 'bigaon', 'urban', 'of failure', 'negros', '6400'),
(5, 'Matumbo', 'Pusok', 'Lapu-Lapu City', 'cebu', '6015'),
(7, 'sangi', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(8, 'GF , Insular Square , 31 JP Rizal Street', 'Tabok', 'Mandaue City', 'Cebu', '6014'),
(9, 'B. Rodriguez Street', 'Tabok', 'Cebu City', 'Cebu', '6000'),
(10, 'Matumbo', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(11, '', '', '', '', '0'),
(12, 'Ayala St.', 'Cabantan', 'Cebu City', 'Cebu', '6000'),
(13, 'B. Rodriguez Street', 'pajo', 'Cebu City', 'Cebu', '6000'),
(14, 'B. Rodriguez Street', 'pajo', 'Cebu City', 'Cebu', '6000'),
(15, 'B. Rodriguez Street', 'pajo', 'Cebu City', 'Cebu', '6000'),
(16, 'B. Rodriguez Street', 'pajo', 'Cebu City', 'Cebu', '6000'),
(17, 'B. Rodriguez Street', 'pajo', 'Cebu City', 'Cebu', '6000'),
(38, '', '', '', '', ''),
(39, '', '', '', '', ''),
(40, '', '', '', '', ''),
(41, '', '', '', '', ''),
(42, '', '', '', '', ''),
(43, '', '', '', '', ''),
(44, '', '', '', '', ''),
(45, '', '', '', '', ''),
(46, '', '', '', '', ''),
(47, '', '', '', '', ''),
(48, '', '', '', '', ''),
(49, '', '', '', '', ''),
(50, '', '', '', '', ''),
(51, '', '', '', '', ''),
(52, '', '', '', '', ''),
(53, '', '', '', '', ''),
(54, '', '', '', '', ''),
(55, '', '', '', '', ''),
(56, '', '', '', '', ''),
(57, '', '', '', '', ''),
(58, '', '', '', '', ''),
(59, '', '', '', '', ''),
(60, '', '', '', '', ''),
(61, '', '', '', '', ''),
(62, '', '', '', '', ''),
(63, '', '', '', '', ''),
(64, '', '', '', '', ''),
(65, '', '', '', '', ''),
(66, '', '', '', '', ''),
(67, '', '', '', '', ''),
(68, '', '', '', '', ''),
(69, '', '', '', '', ''),
(70, '', '', '', '', ''),
(71, '', '', '', '', ''),
(72, '', '', '', '', ''),
(73, '', '', '', '', ''),
(74, '', '', '', '', ''),
(75, '', '', '', '', ''),
(76, 'Matumbo', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(77, 'Sangi New Road', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(78, '', '', '', '', ''),
(79, '', '', '', '', ''),
(80, 'Sangi New Road', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(81, 'A.S Fortuna Street', 'Banilad', 'Cebu City', 'Cebu', '6000'),
(82, 'A.S Fortunas', 'Banilads', 'Cebu Citys', 'Cebus', '6001'),
(83, 'GF , Insular Square , 31 JP Rizal Street', 'Banilad', 'Mandaue City', 'Cebu', '6014'),
(84, 'Sangi New Road', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(85, 'A. Tumulak', 'Gun-Ob', 'Lapu-Lapu City', 'Cebu', '6015'),
(86, 'A. Tumulak', 'Gun-Ob', 'Lapu-Lapu City', 'Cebu', '6015'),
(87, 'A. Tumulak', 'Gun-Ob', 'Lapu-Lapu City', 'Cebu', '6015'),
(88, 'A. Tumulak', 'Gun-Ob', 'Lapu-Lapu City', 'Cebu', '6015'),
(89, 'A. Tumulak Street', 'Gun-Ob', 'Lapu-Lapu City', 'Cebu', '6015'),
(90, 'Sangi New Road', 'Pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(91, 'Sangi New Road', 'pajo', 'Lapu-Lapu City', 'cebu', '6015'),
(92, '', '', '', '', ''),
(93, '', '', '', '', ''),
(94, '', '', '', '', ''),
(95, '', '', '', '', ''),
(96, '', '', '', '', ''),
(97, '', '', '', '', ''),
(98, '', '', '', '', ''),
(99, '', '', '', '', ''),
(100, '', '', '', '', ''),
(101, '', '', '', '', ''),
(102, '', '', '', '', ''),
(103, '', '', '', '', ''),
(104, '', '', '', '', ''),
(105, '', '', '', '', ''),
(106, '', '', '', '', ''),
(107, '', '', '', '', ''),
(108, '', '', '', '', ''),
(109, '', '', '', '', ''),
(110, 'kinalumsan street', 'gun-ob', 'lapu-lapu', 'cebu', '8722'),
(111, '', '', '', '', ''),
(112, '', '', '', '', ''),
(113, '', '', '', '', ''),
(114, '', '', '', '', ''),
(115, '', '', '', '', ''),
(116, 'Sangi New Road', 'Pajo', 'Lapu-Lapu City', 'cebu', '6015');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetails_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `prod_id` int(5) NOT NULL,
  `orderQty` int(11) NOT NULL,
  `subTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetails_id`, `order_id`, `prod_id`, `orderQty`, `subTotal`) VALUES
(34, 24, 65, 1, 1819),
(35, 24, 83, 1, 250000),
(36, 25, 61, 1, 6540),
(37, 26, 62, 1, 1700),
(38, 27, 62, 6, 10200),
(39, 28, 123, 1, 40000),
(40, 29, 61, 1, 6540),
(41, 30, 61, 1, 6540),
(42, 31, 61, 1, 6540),
(43, 31, 62, 1, 1700),
(44, 32, 62, 4, 6800),
(45, 32, 65, 1, 1819),
(46, 33, 62, 4, 6800),
(47, 33, 65, 1, 1819),
(48, 33, 61, 1, 6545),
(49, 34, 61, 1, 448.77),
(50, 34, 62, 2, 3400),
(51, 35, 66, 1, 1000),
(52, 36, 66, 1, 1000),
(53, 37, 66, 1, 1000),
(54, 38, 62, 1, 1700),
(55, 39, 62, 1, 1700),
(56, 40, 62, 1, 1700),
(57, 41, 62, 1, 1700),
(58, 42, 62, 1, 1700),
(59, 43, 62, 1, 1700),
(60, 44, 62, 1, 1700),
(61, 45, 62, 1, 1700),
(62, 46, 62, 1, 1700),
(63, 47, 62, 1, 1700),
(64, 48, 62, 1, 1700),
(65, 49, 62, 1, 1700),
(66, 50, 62, 1, 1700),
(67, 51, 62, 1, 1700),
(68, 52, 62, 1, 1700),
(69, 53, 62, 1, 1700),
(70, 54, 62, 1, 1700),
(71, 55, 62, 1, 1700),
(72, 56, 65, 1, 1819),
(73, 57, 61, 1, 448.77),
(74, 58, 61, 1, 448.77),
(75, 59, 83, 1, 250000),
(76, 60, 83, 1, 250000),
(77, 61, 61, 1, 448.77),
(78, 62, 61, 1, 448.77),
(79, 63, 83, 1, 250000),
(80, 64, 83, 1, 250000),
(81, 65, 61, 1, 448.77),
(82, 66, 62, 1, 1700),
(83, 67, 61, 1, 448.77),
(84, 68, 61, 1, 448.77),
(85, 69, 61, 1, 0),
(86, 70, 61, 1, 0),
(87, 71, 83, 1, 0),
(88, 72, 83, 1, 0),
(89, 73, 83, 1, 0),
(90, 74, 83, 1, 325000),
(91, 75, 83, 1, 325000),
(92, 76, 61, 1, 97.5),
(93, 77, 61, 1, 97.5),
(94, 78, 83, 1, 325000),
(95, 79, 65, 1, 2364.7),
(96, 80, 61, 1, 2210),
(97, 81, 61, 1, 97.5),
(98, 81, 62, 1, 2210),
(99, 82, 61, 2, 195),
(100, 83, 61, 4, 390),
(101, 83, 62, 1, 2210),
(102, 83, 65, 1, 2364.7),
(103, 83, 66, 1, 1300),
(104, 84, 61, 1, 193.57),
(105, 85, 65, 1, 2364.7),
(106, 85, 122, 1, 13344.5),
(107, 85, 77, 1, 1028.71),
(108, 86, 61, 1, 193.57),
(109, 87, 61, 1, 26),
(110, 88, 61, 1, 26),
(111, 89, 61, 1, 26),
(112, 90, 61, 1, 26),
(113, 91, 61, 1, 26),
(114, 92, 62, 1, 2210),
(115, 93, 61, 1, 26),
(116, 94, 62, 1, 2210),
(117, 95, 62, 1, 2210),
(118, 96, 62, 1, 2210),
(119, 97, 66, 1, 1300),
(120, 98, 62, 1, 2210),
(121, 99, 62, 1, 2210),
(122, 100, 62, 1, 2210),
(123, 101, 124, 1, 2600),
(124, 102, 66, 1, 1300),
(125, 103, 61, 1, 26),
(126, 104, 118, 1, 1137.5),
(127, 105, 61, 1, 26),
(128, 105, 62, 1, 2210),
(129, 106, 61, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` text NOT NULL,
  `orderStatus` text NOT NULL,
  `paymentStatus` text NOT NULL,
  `payment_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `orderStatus`, `paymentStatus`, `payment_id`) VALUES
(101, 18, '2018-11-08', '2600', 'Delivered', 'paid', 71),
(102, 28, '2018-11-08', '1300', 'Delivered', 'paid', 70),
(103, 18, '2018-11-08', '176', 'For delivery', 'paid', 72),
(105, 18, '2018-11-10', '2236', 'Delivered', 'paid', 73);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(5) NOT NULL,
  `service_provider` text NOT NULL,
  `transactionCode` text NOT NULL,
  `sender` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `amountPaid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `service_provider`, `transactionCode`, `sender`, `contact`, `amountPaid`) VALUES
(28, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 40000),
(29, 'M Lhuillier', 'BWX-THN-123', 'Kenneth Torillo', 9331888602, 6540),
(30, 'Palawan Express', 'Addf232', 'Kenneth Torillo', 9331888602, 6540),
(31, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8200),
(32, 'M Lhuillier', 'BWX-THN-123', 'Kenneth Torillo', 9331888602, 3000),
(33, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 3848.77),
(34, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 921673087, 598.75),
(35, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 921673087, 6540),
(36, 'Palawan Express', 'BWX-THN-123', 'Kenneth Torillo', 921673087, 247.5),
(37, 'M Lhuillier', 'Addf232', 'Kenneth Torillo', 921673087, 247.5),
(38, 'Cebuana', 'asadsfs35', 'Kenneth Torillo', 921673087, 2514.7),
(39, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 921673087, 345.7),
(40, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 3404832, 8200),
(41, 'Palawan Express', 'BWX-THN-123', 'Kenneth Torillo', 921673087, 8200),
(42, 'M Lhuillier', 'BWX-THN-123', 'Kenneth Torillo', 325209181, 247.5),
(43, 'Cebuana', 'AMR-11-99167-CMD', 'CHARISSE JOANNE', 9667401470, 16737.9),
(44, 'Cebuana', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 176),
(45, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 176),
(46, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 176),
(47, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 176),
(48, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8),
(49, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8),
(50, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8),
(51, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8),
(52, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 8),
(53, 'M Lhuillier', 'Addf232', 'Ariane Nadonza', 9331888602, 9),
(54, 'M Lhuillier', 'Addf232', 'Ariane Nadonza', 9331888602, 9),
(55, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(56, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(57, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 176),
(58, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(59, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(60, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(61, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(62, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(63, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(64, 'M Lhuillier', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(65, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(66, 'Cebuana', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(67, 'Cebuana', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 1),
(68, 'Cebuana', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 2210),
(69, 'Palawan Express', 'BWX-THN-123', 'Ariane Nadonza', 9331888602, 2210),
(70, 'Cebuana', 'dddd', 'brenda zerna', 9463699088, 1300),
(71, 'Palawan Express', 'BWX-THN-143', 'Ariane Nadonza', 9331888602, 2600),
(72, 'M Lhuillier', 'aaaa', 'Ariane Nadonza', 921673087, 176),
(73, 'Cebuana', 'BWX-THN-300', 'Ariane Nadonza', 9331888602, 2236);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` text NOT NULL,
  `type` text NOT NULL,
  `sub_category` text NOT NULL,
  `description` text NOT NULL,
  `selling_price` float NOT NULL,
  `unit_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `status` text NOT NULL,
  `photo` varchar(25555) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `type`, `sub_category`, `description`, `selling_price`, `unit_price`, `qty`, `status`, `photo`, `trans_id`, `supplier_id`, `date_added`) VALUES
(61, 'Blood glucose meter Beurer GL 50 EVO mmol/L', 'Electronics', 'Glucose Monitor', 'Width: 29 mm, Height: 16 mm, Weight: 36 g, Length: 123 mm', 26, 20, 8, 'available', 'prod_images/bloodglucose.jpg', 185, 3, '2018-10-09'),
(62, 'Accu-Chek Active Blood Glucose Monitoring System with Test Strips Blood Sugar Monitor', 'Electronics', 'Glucose Monitor', 'Easy- to- handle, quick- fill test strip makes sampling easier. Fills quickly at any point along the tip with only a tiny drop. And more than 150 system integrity checks help detect and prevent unreliable results.', 2210, 1700, 991, 'available', 'prod_images/accucheck.jpg', 186, 3, '2018-10-09'),
(65, 'SANNUO GA-3 Blood Glucose Monitor Glucometer with 50pcs Test Strips & 50pcs Lancets White', 'Electronics', 'Glucose Monitor', 'Keep track of your blood sugar levels with the SANNUO GA-3 Blood Glucose Monitor Glucometer with 50pcs Test Strips & 50pcs Lancets! For diabetic patients, checking daily readings is extremely important. This blood glucose monitor glucometer requires only a 1um sample size and will give you an accurate result as fast as 6 seconds. With automatic calibration and adjustable measuring scale, it is simple to use. Voice prompt function makes it particularly suitable for the elderly to use. A 250-test memory with average value function adds more convenience.', 2364.7, 1819, 448, 'available', 'prod_images/bloodglucose3.jpg', 189, 4, '2018-10-09'),
(66, 'ComboCare Electrotherapy Ultrasound Machine', 'Electronics', 'Physical Therapy', 'Allows the therapist to provide treatment using any one of the 5 included electrotherapy waveforms in combination with ultrasound or use any one of the waveforms or ultrasound separately.', 1300, 1000, 318, 'available', 'prod_images/ComboCare_E_Stim_and_Ultrasound_Device__68215.1438971594.1280.1280.jpg', 190, 3, '2018-10-09'),
(67, 'Rodent Microdialysis Surgical Kit', 'Surgical', 'Surgical kits', 'This is an ideal starter kit for microdialysis studies on rodents.  Kit includes:  Scalpel Blades No. 10, Sterile, pkg. of 100  Scalpel Handle, No. 3  Eye Scissors, 10.5 cm, Straight  Dieffenbach Vessel Clips, 35 mm, Straight, pkg. of 2  Operating Scissors, 14.5 cm, Sharp/Blunt, Straight  Vannas Eye Scissors, Spring Action Model TÃ¼bingen, 8.5 cm, Straight  Graefe Iris Forceps, Serrated, 10.0 cm, Curved, Points, 0.7 mm  TC Derf Needle Holders withTungsten Carbide Inserts, 12.0 cm, Extra Delicate Jaw  Trephine Drill Bits, pkg. of 2 Anchor Screw Drill Bits, pkg. of 3  Anchor Screws, pkg. of 100', 1948.7, 1499, 100, 'available', 'prod_images/Rodent Microdialysis Surgical Kit.jpg', 191, 3, '2018-10-09'),
(68, 'Rat/Guinea Pig Isolated Organ Surgical Kit', 'Surgical', 'Surgical kits', 'This is an ideal starter kit for anyone who needs to perform surgeries for isolated organ preparation on rats or guinea pigs.  Kit includes:  Suture without Needle, Silk Black Braid, 4-0, 100 yards  Operating Scissors, 13.0 cm, Sharp/Sharp, Straight  Dressing Forceps, 13.0 cm, Straight, Slender  Eye Scissors, 11.5 cm, Straight  Graefe Iris Forceps, Serrated, 7.0 cm, Curved, Points 1.0 mm, pkg. of 2  HALSTEAD-MOSQUITO, Hemostatic Forceps, 14.0 cm, Straight  HARTMANN, Hemostatic Forceps, 10.0 cm, Curved', 2078.7, 1599, 220, 'available', 'prod_images/Isolated-Organ-Surgical-Kit-728996_hr_1.jpg', 192, 3, '2018-10-09'),
(70, 'Minor Surgical Kit', 'Surgical', 'Surgical kits', 'The Minor Surgical Kit is ideally suited for basic procedures and minor surgery.  This kit includes:  Scalpel handle, No. 3 Scalpel blades No. 10, Sterile Eye scissors, 11.5 cm, Curved, Special cut Blumenthal bone rongeurs, Curved, 15.5 cm Universal clothing scissors Operating scissors, 14.5 cm, Sharp/blunt, Straight  Kuehne cover glass forceps, 10 cm, Angled Jewelers forceps, No. 5, 11 cm, with extra delicate points Probe, 14.5 cm, Double ended, 1mm diameter', 1558.7, 1199, 400, 'available', 'prod_images/kit_quirurgico_miltec_us_army_12_piezas_16025000.jpg', 196, 3, '2018-10-09'),
(72, 'Deluxe Major Surgical Kit', 'Surgical', 'Surgical kits', 'This Deluxe Major Surgical Kit  is ideally suited for more extensive procedures and major laboratiry animal surgeries.  This kit includes:  Scalpel handle, No. 3  Scalpel blades, No. 10, Sterile  Scalpel blades, No. 11, Sterile  Vannas eye scissors, Spring action model Tubingen, 8.5 cm, Straight* TC olsen-hegar needle holders with scissors with tungsten carbide inserts, 14.0 cm Eye scissors, 11.5 cm, Straight, Special cut  Jewelers forceps, 11.0 cm, No, 5, with extra delicate points Graefe iris forceps, Serrated, 7.0 cm, Curved, Points 0.5 mm UltraEdge operating scissors, 14.5 cm, Sharp/blunt, Straight  Universal clothing scissors  Friedman bone rongeurs, delicate Adson tissue forceps, 12.0 cm, 1x2 teeth Barraquer (colibri) eye specula, Large  Probe, 14.5 cm, double ended, 1 mm, Diamond ', 1298.7, 999, 100, 'available', 'prod_images/delux_major_surgical.png', 199, 3, '2018-10-09'),
(75, 'Cando Ankle-Leg Exerciser', 'Electronics', 'Physical Therapy', 'For lower leg and ankle exercises. Weights allow for variable level of resistance. For load-resisting inversion, eversion, dorsi-flexion and plantar-flexion exercises. Available with or without weights', 4550, 3500, 10, 'available', 'prod_images/32204.jpg', 202, 4, '2018-10-09'),
(76, 'Easy Exercise Bike With Digital Therapy Massage', 'Electronics', 'Physical Therapy', 'Product details of Easy Exercise Bike With Digital Therapy Massage: Pedal Exerciser, Deal for fitness or rehabilitation, Great for lower/upper body exercises for strength and blood circulation, Adjustable resistance level', 1038.7, 799, 50, 'available', 'prod_images/easy-exercise-bike-with-digital-therapy-massage-1502243813-9491803-9e006ce57595b16449ba3e17e6b4a866.jpg', 203, 4, '2018-10-09'),
(77, 'Automated External Defibrillators', 'Electronics', 'Defibrillators', 'A portable electronic device that automatically diagnoses the life-threatening cardiac arrhythmias of ventricular fibrillation and pulseless ventricular tachycardia, and is able to treat them through defibrillation, the application of electricity which stops the arrhythmia, allowing the heart to reestablish an effective rhythm.  With simple audio and visual commands, AEDs are designed to be simple to use for the layperson, and the use of AEDs is taught in many first aid, certified first responder, and basic life support (BLS) level cardiopulmonary resuscitation (CPR) classes.', 1028.71, 791.318, 21, 'available', 'prod_images/defibrillator.jpg', 204, 4, '2018-10-09'),
(78, 'Manual external defibrillator', 'Electronics', 'Defibrillators', 'These defibrillators require more experience and training to effectively handle them. Hence, they are only common in hospitals and a few ambulances where capable hands are present. In conjuntion with an ECG, the trained provider determines the cardiac rhythm and then manually determines the voltage and timing of the shockâ€”through external paddlesâ€”to the patients chest.', 25377.3, 19521, 8, 'available', 'prod_images/69968-10368171.jpg', 205, 4, '2018-10-09'),
(79, 'DPM1B Pneumatic Transducer Tester', 'Electronics', 'Biomedical Testing', 'The DPM1B Pneumatic Transducer Tester is designed to measure the positive and negative pressures of medical devices in either liquid or gaseous form. It generates pressure within the Â± 300 mmHg range to assist in repair and quality control.', 20797.4, 15998, 10, 'available', 'prod_images/fb-dpm1b_02a_s.png', 206, 4, '2018-10-09'),
(80, 'ESA609 Electrical Safety Tester and Analyzer', 'Electronics', 'Biomedical Testing', 'The high-accuracy ESA609 Electrical Safety Tester and Analyzer from Fluke Biomedical is portable, rugged, easy-to-use device, designed for general preventive maintenance and compliance. The ESA609 integrates all functions needed to assess medical devices when patient lead testing is not required.', 12264.2, 9434, 20, 'available', 'prod_images/Fb-esa609_01a_ko.png', 207, 4, '2018-10-09'),
(81, 'QA-ES III Electrosurgical Tester and Analyzer', 'Electronics', 'Biomedical Testing', 'Easily test and wirelessly* download all critical functions using the QA-ES III ESU analyzer. Quickly collect all measurements, including vessel sealing, contact quality monitor (CQM), high frequency (HF) leakage, and output power distribution (single or continuous mode) with the user-friendly interface guide.', 16294.2, 12534, 30, 'available', 'prod_images/fb-qa-es-3_03a_s-pcat_320x220.jpg', 208, 4, '2018-10-09'),
(83, 'Stryker Laparoscopy Tower - Refurbished', 'Electronics', 'Endoscopy', 'The versatile Stryker Laparoscopy Tower provides visualization and documentation of endoscopy procedures. It also gives you capacity for arthroscopy and other rigid endoscopy procedures.', 325000, 250000, 10, 'available', 'prod_images/stryker_endoscopy_tower_lg.jpg', 211, 4, '2018-10-09'),
(87, 'Instrument Wraps', 'Surgical', 'Instrument Care', 'These Instrument Wraps are manufactured of double thick, preshrunk, colorfast, surgical sheeting and may be safely washed and autoclaved. Supplied as a single wrap. Autoclavable.', 32.5, 25, 500, 'available', 'prod_images/download.jpg', 215, 4, '2018-10-09'),
(88, 'Glass Bead Dry Sterilizer', 'Surgical', 'Instrument Care', 'This compact unit provides a quick and easy way to sterilize surgical instruments. The stainless steel, central well is filled with dry glass beads that are heated to 233Â°C. Simply insert an instrument into the beads and, within 15 seconds, the submerged portion of the instrument is sterilized.', 86469.5, 66515, 50, 'available', 'prod_images/158_D.jpg', 216, 4, '2018-10-09'),
(90, 'Castroviejo Needle Holder', 'Surgical', 'Wound Closure', 'Castroviejo Needle Holders,  Straight, Smooth 14.0 cm overall length, without lock	', 260, 200, 500, 'available', 'prod_images/31+9C2dpc9L.jpg', 218, 4, '2018-10-09'),
(91, 'Webster Needle Holders', 'Surgical', 'Wound Closure', 'Webster Needle Holders,  Straight, Smooth, 13.0 cm overall length', 325, 250, 500, 'available', 'prod_images/KE-372.jpg', 219, 4, '2018-10-09'),
(92, 'Troutman Suture Forceps', 'Surgical', 'Wound Closure', 'Double Angled, 1 x 2 Teeth,  0.7 mm tip width 7.5 cm overall length', 195, 150, 500, 'available', 'prod_images/728660.jpg', 220, 4, '2018-10-09'),
(93, 'Cautery System Kit', 'Surgical', 'Wound Closure', 'The Gemini Cautery System is the perfect tool for your cauterizing needs.  Simple tip design for easy replacement, Uses standard AA batteries, Easy screw cap for convenient battery replacement, Hard plastic case with die cut foam for convenient storage, Battery spacer for optional temperature operation', 455, 350, 500, 'available', 'prod_images/del0.jpg', 221, 4, '2018-10-09'),
(94, 'Bone Wax', 'Surgical', 'Wound Closure', 'Bone Wax is a sterile mixture of beeswax and isopropyl palmitate, a wax-softening agent, used to help control bleeding from bone surfaces.  To stop bleeding during surgery and to patch holes made in the skull, Achieves local hemostasis of bone by acting as a mechanical (tamponade) barrier, Does not act biochemically and is minimally resorbable', 156, 120, 500, 'available', 'prod_images/599864_hr.jpg', 222, 3, '2018-10-09'),
(95, 'CareFRESH Absorbent Sheets', 'Surgical', 'Surgical Accessories', 'These disposable sheets are ideal for numerous applications. They help prevent body heat loss after surgery. When used under small animal cages, they help make excrement cleanup fast and easy. They can also be used to protect examination tables. Made from a super absorbent cellulose fiber, they are also ideal for cleaning up various spills and animal accidents. Super absorbent, Inexpensive, Ideal for post surgery, maintaining body heat during recovery, protecting exam tables, and for cleanup of accidental spills', 32.5, 25, 600, 'available', 'prod_images/630201_630202_hr.jpg', 223, 3, '2018-10-09'),
(97, 'Surgical Towels', 'Surgical', 'Surgical Accessories', 'These highly absorbent, 100% cotton, durable towels are for use in surgery and measure 46 x 84 cm (18 x 33 in). They are autoclavable and are supplied in a package of 12.', 130, 100, 500, 'available', 'prod_images/715hCHQ16qL._SX425_.jpg', 225, 4, '2018-10-09'),
(98, 'Surgical Drapes', 'Surgical', 'Surgical Accessories', 'These surgical drapes have a built-in moisture barrier. This double central panel is made from a medical fabric that prevents outside contaminants from permeating through the drape to the work area. They are manufactured of color-fast, pre-shrunk, surgical sheeting and may be safely washed and autoclaved. Supplied as a single drape or box of 12 as noted.  Built-in moisture barrier, Double central panel made from medical fabric that prevents outside contaminants from permeating through, Autoclavable', 195, 150, 500, 'available', 'prod_images/surgical-drapes-500x500.jpg', 226, 3, '2018-10-09'),
(99, 'Absorbable Gelatin Sponges', 'Surgical', 'Surgical Accessories', 'These small, sterile, surgical Sponges are prepared from specially treated, purified gelatin solution. Each Sponge is a hemostatic device that is capable of absorbing and holding within its meshes many times its weight in whole blood. They can be implanted during surgery and will be completely absorbed within four to six weeks.of skin edges. These Sponges will expand so special care must be taken when placing in a cavity or in closed tissue spaces.', 260, 200, 400, 'available', 'prod_images/599863_hr.jpg', 227, 3, '2018-10-09'),
(100, 'Small Dissecting Sponges', 'Surgical', 'Surgical Accessories', 'These small, firm, top quality gauze sponges are for use in delicate surgical procedures. They are double wrapped and have a locked-in X-Ray detectable element. They are available in peanut or cherry shapes.', 26, 20, 450, 'available', 'prod_images/598431-8434_hr.jpg', 228, 3, '2018-10-09'),
(102, 'Solid Standard Scalpel Handles', 'Surgical', 'Cutting Accessories', '  Scalpel Handle, No. 3 Solid  Scalpel Handle, No. 4 Solid  Scalpel Handle, No. 7 Solid Plastic Scalpel Handle, No. 4 Solid No. 3, No. 4 and No. 7 solid scalpel handles. Use with corresponding sterile scalpel blades. Sold as individual (1) handles', 299, 230, 500, 'available', 'prod_images/handle4.jpg', 230, 3, '2018-10-09'),
(103, 'Microsurgery Knife Blades', 'Surgical', 'Cutting Accessories', 'These knives for microsurgery are ideal for surgery on small animals. Originally designed for ophthalmological procedures, these knives have consistently sharp edges for precise incision without tissue distortion. Each Knife has a matte finish designed to reduce microscope glare. Each blade is laser-etched to clearly identify knife size or width. Knife handles are designed for a secure comfortable grip and have a ridge to indicate the position of the cutting edge.', 388.7, 299, 500, 'available', 'prod_images/726561-726566_hr.jpg', 231, 3, '2018-10-09'),
(104, 'Miniature Scalpel Blade', 'Surgical', 'Cutting Accessories', 'Extra delicate with a 1.5 mm cutting edge. Use with Chuck Handles. Package of 24.', 258.7, 199, 499, 'available', 'prod_images/i03689.jpg', 232, 3, '2018-10-09'),
(105, 'Kleenex Ultra Soft Facial Tissue', 'Self Care', 'Facial Tissue', 'Product details of Kleenex Ultra Soft Facial Tissue 4 Pack (75ct per Pack): 3-ply construction offers softness and strength to prevent break-through, Sneeze shield helps keep hands clean to maintain sanitary conditions, Attractive box complements any home or office decor, Perfect for use in office buildings, schools, restaurants and more, Kleenex Ultra Soft Tissues are perfect for times when you need a little extra TLC, Assorted tissue box designs to accent every rooms decor', 63.7, 49, 1000, 'available', 'prod_images/kleenex-ultra-soft-facial-tissue-4-pack-75ct-per-pack-2671-884420101-388d20f7059feab3b64ca9dcac48cdc8-catalog_233.jpg', 234, 3, '2018-10-09'),
(106, 'Celeteque Hydration Exfoliating Wash 60Ml', 'Self Care', 'Skin Care', 'Main features:  - With Dual nourishing beads  - Has sphere shaped micro beads for gentle yet effective facial exfoliation ', 123.5, 95, 500, 'available', 'prod_images/op-gentleexfoliating.jpg', 235, 3, '2018-10-09'),
(107, 'Bioaqua Face Acne Treatment', 'Self Care', 'Skin Care', 'Product details of Bioaqua Face Acne Treatment Acne Scars Cream Anti Acne Removal Gel Whitening Moisturizing Cream 30g | Product efficacy: Acne, Anti-Acne, Anti-Wrinkle,Whitening, skin nourishing, moisturizing, remove scar, remove Iines, shrink pores, and oil control | Usage: First, clean the skin, and then take the appropriate amount of product evenly smear sites for acne and acne, gently', 388.7, 299, 550, 'available', 'prod_images/BIOAQUA-Brand-Skin-Care-Face-Acne-Treatment-Acne-Scars-Cream-Anti-Acne-Removal-Gel-Whitening-Moisturizing.jpg_640x640.jpg', 236, 3, '2018-10-09'),
(108, 'Collagen & Glutathione perfect magic peeling cream', 'Self Care', 'Skin Care', '-Gentle-action gel perfect for deep and thorough exfoliation -With the Magic Effect it can clear the freckles, blemishes, acne and control the melanin production. Cleanses the dirt and blackheads in the deep layer of skin.  -Effectively clean the skin and remove cuticle, reduce skin blemishes, leaving skin flawless and vibrant.', 518.7, 399, 330, 'available', 'prod_images/tLIsSlmxNG-AGTBdAAEdsC8mD2c628_700x700.jpg', 237, 3, '2018-10-09'),
(109, 'Premium Plastic Urinal', 'Self Care', 'Urinal Accessories', 'The Premium Plastic Urinal is a transparent male urine collection container. Made of Polyethylene, the plastic material is known to be safe as mentioned on California Prop 65. The BPA free plastic also helps by not contaminating the contents it holds. If your purpose of urine collection is to sample, that is to test, then the chemical integrity is a benefit for you. As chemically altered samples will be contaminated.', 169, 130, 100, 'available', 'prod_images/premium-plastic-urinal-6cc.jpg', 238, 4, '2018-10-09'),
(110, 'Toilet Hat Specimen Collection', 'Self Care', 'Urinal Accessories', 'Toilet Hat Specimen Collection by Kendall is a urinary accessory commode specimen collection. It is a unit used for the collection of urine and stool samples or kidney stones.  This specimen collection urinary supply has clearly marked gradients that are easy to read. It also has a wide lip which, with the hats firm base, provides the function of helping to prevent splashing, spilling, and tipping.', 65, 50, 400, 'available', 'prod_images/31hXRQCFrZL._SX342_.jpg', 240, 3, '2018-10-09'),
(111, 'Urinary Catheter Extension Tubes', 'Self Care', 'Urinal Accessories', 'RELATED PRODUCTS BARDIA Silicone Elastomer Latex Foley Catheter BARDIA SILICONE ELASTOMER LATEX FOLEY CATHETER  Starting at: $0.87 Bard Bedside Drainage Bag BARD BEDSIDE DRAINAGE BAG  Starting at: $4.34 Bardia Closed System Drain Bag - 2000cc | 802001, 802002 BARDIA CLOSED SYSTEM DRAIN BAG - 2000CC | 802001, 802002  Starting at: $1.89 Dale Hold-N-Place Catheter Holder DALE HOLD-N-PLACE CATHETER HOLDER  Starting at: $4.89 Leg Bag for Urine by Hollister LEG BAG FOR URINE BY HOLLISTER  Starting at: $4.60 Curity Urine Leg Bags CURITY URINE LEG BAGS  Starting at: $1.35 UltraFlex External Condom Catheter ULTRAFLEX EXTERNAL CONDOM CATHETER  Starting at: $1.16 Wide Band Condom Catheter by Bard WIDE BAND CONDOM CATHETER BY BARD  Starting at: $1.42 Dispoz-A-Bag Drainable Leg Bag DISPOZ-A-BAG DRAINABLE LEG BAG  Starting at: $2.02 Urinary Catheter Extension Tubes are used to attach foley or external catheter for night drainage or to a leg bag.', 97.5, 75, 400, 'available', 'prod_images/urinary-catheter-extension-tubes-3fc.png', 241, 3, '2018-10-09'),
(112, 'Cardinal Health Lubricating Jelly', 'Self Care', 'Urinal Accessories', 'Lubricating jelly can be used for a variety of medical or at home procedures. This product provides continuous lubrication that adheres well to its surface and can be easily removed with a towel.', 104, 80, 320, 'available', 'prod_images/61120174043Cardinal-Health-Lubricating-Jelly-L.png', 243, 3, '2018-10-09'),
(113, 'Menstrual Cap', 'Self Care', 'Feminine Hygiene', 'A menstrual cup is a feminine hygiene product that is inserted into the vagina during menstruation. Its purpose is to prevent menstrual fluid from leaking onto clothes.', 260, 200, 799, 'available', 'prod_images/ruby_cup_colours_new.jpg', 244, 3, '2018-10-09'),
(114, 'Leg Curl Medical Care', 'Acute Care', 'Rehabilitation Care', 'Delivered under the management of or informed by a clinician with specialised expertise in rehabilitation, and evidenced by an individualised multidisciplinary management plan which is documented in the patients medical record. The plan must include negotiated goals within specified time frames and formal assessment of functional ability.', 39000, 30000, 20, 'available', 'prod_images/Leg-Curl-Medical-Care-Rehabilitation-Equipment-for-Sale-BFT-2049B-.jpg', 245, 4, '2018-10-09'),
(115, 'Envelope Style Arm Slings', 'Acute Care', 'Rehabilitation Care', 'Envelope Style Arm Slings Traditional envelope arm sling comfortably distributes weight of arm for cast support or for treatment of the arm, hand, or wrist injuries. Durable 1\"W webbing shoulder strap and double D-ring with hook-and-loop closure allows quick application. Simple slide buckle adjustment.', 422.5, 325, 200, 'available', 'prod_images/52678A_850x480-pad.jpg', 246, 4, '2018-10-09'),
(116, 'Bariatric Heavy Duty Cane', 'Acute Care', 'Rehabilitation Care', 'Bariatric Heavy Duty Cane has a comfortable vinyl hand grip with wrist strap. It is manufactured with 1\" steel tubing and has dual push button release that allows for handle height to be adjusted. Black.', 682.5, 525, 250, 'available', 'prod_images/82328_850x480-pad.jpg', 247, 4, '2018-10-09'),
(117, 'Heavy Duty Crutches', 'Acute Care', 'Rehabilitation Care', ' Heavy Duty Crutches offer three sizes of steel adjustable axillary crutches. Each size has an overall range of 8\" from lowest setting in 1\" increments. The hand grips can adjust to four different settings. These settings will range in 1-1/2\" increments from lowest to highest. All 500 Series crutches are rated to 600 lbs. All measurements are with underarm pad and tip installed. Each crutch weighs approximately 5 lbs. each.', 1306.5, 1005, 450, 'available', 'prod_images/78427_850x480-pad.jpg', 248, 4, '2018-10-09'),
(118, 'Deluxe Folding Walker', 'Acute Care', 'Rehabilitation Care', 'Deluxe Folding Walker with \"Palm-Pusher\" folding release that operates with fingers, palm or side of hand. Geometric design eliminates side frame wobbling. Angled front legs enhance stability. Dual side braces. Fold flat for storage. Grabber tips included.', 1137.5, 875, 188, 'available', 'prod_images/7376_850x480-pad.jpg', 249, 4, '2018-10-09'),
(120, 'Benchmark Scientific', 'Acute Care', 'Laboratory Equipment', 'BioClave Mini digital bench-top autoclave, 8L', 26715, 20550, 470, 'available', 'prod_images/Benchmark-B4000-M_s.jpg', 251, 4, '2018-10-09'),
(122, 'Electrocardiogram', 'Long Term Care', 'Video Monitoring', 'A diagnostic tool that is routinely used to assess the electrical and muscular functions of the heart. While it is a relatively simple test to perform, the interpretation of the ECG tracing requires significant amounts of training. ', 13344.5, 10265, 49, 'available', 'prod_images/videoblocks-electrocardiogram-in-hospital-surgery-operating-theater-emergency-room-showing-patient-heart-rate-monitoring-patients-vital-sign-in-operating-room-cardiogram-monitor-during-.png', 253, 4, '2018-10-09'),
(123, 'Smart Stop', 'Long Term Care', 'Wearable Health', 'Smart Stop by Chrono Therapeutics is a smart device that is aimed at helping people to stop smoking. The Smart Stop is embedded with sensors that will sense changes in the body and put into motion algorithms that sense that a person is craving for a cigarette and nicotine. It will then deliver medication to the person so that craving can be curtailed.', 26013, 20, 59, 'available', 'prod_images/Smart-Stop-by-Chrono-Therapeutics-300x169.png', 254, 4, '2018-10-09'),
(124, 'Ariana Grande', 'Electronics', 'Video Monitoring', 'Ariana Grande Tour', 2600, 2000, 11, 'available', 'prod_images/Cover.jpg', 270, 3, '2018-11-08'),
(126, 'Testing', 'Electronics', 'Biomedical Testing', 'testing only', 26, 20, 200, 'available', 'prod_images/1.png', 272, 3, '2018-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `total_rate` int(5) NOT NULL,
  `title` text NOT NULL,
  `comments` text NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `order_id`, `total_rate`, `title`, `comments`, `created`, `modified`) VALUES
(50, 5, 0, 2, 'My excellent blog post', 'sds', '2018-10-10', '2018-10-10'),
(51, 5, 0, 1, 'My excellent blog postsa', 'asds', '2018-10-10', '2018-10-10'),
(53, 6, 0, 4, 'Good', 'sads', '2018-10-11', '2018-10-11'),
(54, 6, 0, 3, 'My excellent blog post', 'ewrewr', '2018-10-11', '2018-10-11'),
(55, 6, 0, 3, 'My excellent blog post', 'wd', '2018-10-11', '2018-10-11'),
(56, 6, 24, 3, 'My excellent blog post', 'sd', '2018-10-11', '2018-10-11'),
(57, 6, 24, 1, 'My excellent blog post', 'ss', '2018-10-11', '2018-10-11'),
(58, 6, 34, 5, 'My excellent blog post', 'ghjn', '2018-10-17', '2018-10-17'),
(59, 5, 68, 3, 'My excellent blog post', '', '2018-10-28', '2018-10-28'),
(60, 5, 68, 3, '', '', '2018-10-28', '2018-10-28'),
(61, 12, 83, 5, '', '', '2018-10-29', '2018-10-29'),
(62, 5, 76, 1, '', '', '2018-10-30', '2018-10-30'),
(63, 15, 85, 5, '', '', '2018-10-30', '2018-10-30'),
(64, 18, 105, 4, '', '', '2018-11-13', '2018-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `restocks`
--

CREATE TABLE `restocks` (
  `restock_id` int(11) NOT NULL,
  `quantity` text NOT NULL,
  `unit_price` text NOT NULL,
  `old_price` text NOT NULL,
  `dateProcess` date NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restocks`
--

INSERT INTO `restocks` (`restock_id`, `quantity`, `unit_price`, `old_price`, `dateProcess`, `prod_id`) VALUES
(1, '20', '200', '', '2018-10-10', 77),
(2, '5', '5000', '', '2018-10-17', 61),
(3, '5', '5000', '', '2018-10-17', 61),
(4, '', '', '448.77', '2018-10-28', 61),
(5, '5', '100', '0', '2018-10-28', 61),
(6, '2', '50', '100', '2018-10-28', 61),
(7, '-12', '97.8', '50', '2018-10-29', 61),
(8, '100', '200', '97.8', '2018-10-29', 61),
(9, '10', '20', '40000', '2018-11-07', 123),
(10, '5', '20', '200', '2018-11-07', 61);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(5) NOT NULL,
  `company_name` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `add_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `company_name`, `email`, `contact`, `add_id`) VALUES
(3, 'Berovan Medical Supplies', 'berovan@gmail.com', '09238908176', 8),
(4, 'Medtronix Medical Supplies and Equipment', 'medtronix@gmail.com', '09232819304', 9);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(5) NOT NULL,
  `date_of_transaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `date_of_transaction`) VALUES
(255, '2018-10-10'),
(256, '2018-10-12'),
(257, '2018-10-12'),
(258, '2018-10-22'),
(259, '2018-10-22'),
(260, '2018-10-22'),
(261, '2018-10-22'),
(262, '2018-10-22'),
(263, '2018-10-22'),
(264, '2018-10-28'),
(265, '2018-10-28'),
(266, '2018-10-28'),
(267, '2018-10-28'),
(268, '2018-10-28'),
(269, '2018-10-29'),
(270, '2018-11-08'),
(271, '2018-11-10'),
(272, '2018-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_code`
--

CREATE TABLE `transaction_code` (
  `transactionCode_id` int(5) NOT NULL,
  `transactionCode` varchar(30) NOT NULL,
  `dateInputted` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_code`
--

INSERT INTO `transaction_code` (`transactionCode_id`, `transactionCode`, `dateInputted`, `status`) VALUES
(1, 'RBN-JHG-123-ZAW', '2018-10-09', 'Done'),
(2, 'RBN-JHG-123-ZAQ', '2018-10-28', 'Pending'),
(3, 'RBN-JHG-123-ZAW', '2018-10-29', 'Pending'),
(4, 'BWX-THN-123', '2018-10-29', 'Done'),
(5, 'CLE-GWA-POW-567', '2018-10-29', 'Done'),
(6, '	AMR-11-99167-CMD', '2018-10-30', 'Done'),
(7, 'BWX-THN-143', '2018-11-08', 'Done'),
(8, 'dddd', '2018-11-08', 'Done'),
(9, 'BWX-THN-300', '2018-11-10', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_type` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` text NOT NULL,
  `add_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `fname`, `mname`, `lname`, `username`, `email`, `password`, `contact`, `add_id`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '923381920', 0),
(5, 'customer', 'Kenneth', 'Ged', 'Torillo', 'kenneth', 'kenneth@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '09331888602', 5),
(9, 'customer', 'Gran', 'SAbanz', 'Sabandal', 'gran123', 'gran@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9331888602', 18),
(12, 'customer', 'Ron Gwapo', 'Mondarte', 'Yamomo', 'cleoyamomo', 'roncleoyamomo@gmail.com', 'cleogwapoo', '09224182088', 81),
(15, 'customer', 'CHARIS', 'Perales', 'Dungog', 'cdungog', 'dungogcharisse@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '09667401470', 85),
(17, 'employee', 'James ', 'Perales', 'Zerna', 'james', 'james@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '09224561234', 89),
(18, 'customer', 'Ariane', 'Amoin', 'Nadonza', 'ynadonza', 'ynadonza@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '09331888602', 90),
(28, 'customer', 'carlos', 'juan', 'zerna', 'carlos', 'cjz2014.cjz@gmail.com', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', '09463699088', 110),
(33, 'customer', 'Yan', 'Yan', 'Yan', 'ynad', 'yan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 115),
(34, 'employee', 'Daphne', 'Joyce', 'Comendador', 'daphne', 'daphnecomendador@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '09228910283', 116);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetails_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `restocks`
--
ALTER TABLE `restocks`
  ADD PRIMARY KEY (`restock_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `transaction_code`
--
ALTER TABLE `transaction_code`
  ADD PRIMARY KEY (`transactionCode_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetails_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `restocks`
--
ALTER TABLE `restocks`
  MODIFY `restock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `transaction_code`
--
ALTER TABLE `transaction_code`
  MODIFY `transactionCode_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
