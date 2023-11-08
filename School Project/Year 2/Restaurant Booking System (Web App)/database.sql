-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `restaurantbookingapp`
--
CREATE DATABASE IF NOT EXISTS `restaurantbookingapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restaurantbookingapp`;

-- --------------------------------------------------------

--
-- Table structure for table `bookinglist`
--

CREATE TABLE `bookinglist` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `resID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `bookingPax` int(11) NOT NULL,
  `bookingName` varchar(255) NOT NULL,
  `bookingContact` varchar(12) NOT NULL,
  `bookingStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookinglist`
--

INSERT INTO `bookinglist` (`bookingID`, `userID`, `resID`, `bookingDate`, `bookingTime`, `bookingPax`, `bookingName`, `bookingContact`, `bookingStatus`) VALUES
(1, 1, 1, '2022-03-22', '08:00:00', 2, 'Bong Ming Hui', '0103456789', 'Attended'),
(2, 1, 2, '2022-03-23', '11:00:00', 3, 'Bong Ming Hui', '0103456789', 'Cancelled'),
(3, 2, 1, '2022-03-24', '14:00:00', 4, 'Wong Ye Syuen', '0113456789', 'Attended'),
(4, 5, 3, '2022-03-24', '08:00:00', 1, 'Wee Jia Wen', '0143456789', 'Cancelled'),
(5, 1, 3, '2022-03-28', '08:00:00', 5, 'Bong Ming Hui', '0103456789', 'Attended'),
(6, 4, 5, '2022-03-25', '13:00:00', 3, 'Liew Jun Hong', '0133456789', 'Attended'),
(7, 5, 6, '2022-03-30', '08:00:00', 3, 'Wee Jia Wen', '0143456789', 'Attended'),
(8, 2, 5, '2022-04-01', '09:00:00', 2, 'Wong Ye Syuen', '0113456789', 'Cancelled'),
(9, 3, 3, '2022-04-05', '15:00:00', 2, 'Yin Kar Kin', '0123456789', 'Cancelled'),
(10, 1, 4, '2022-04-26', '12:00:00', 3, 'Bong Ming Hui', '0103456789', 'Confirmed'),
(11, 5, 6, '2022-04-29', '16:00:00', 2, 'Wee Jia Wen', '0143456789', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantlist`
--

CREATE TABLE `restaurantlist` (
  `resID` int(10) NOT NULL,
  `resName` varchar(50) NOT NULL,
  `operationDay` varchar(25) NOT NULL,
  `operationTime` varchar(25) DEFAULT NULL,
  `location` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `cuisine` varchar(20) NOT NULL,
  `priceRange` varchar(25) NOT NULL,
  `paymentOption` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `website` varchar(255) NOT NULL,
  `resLogo` varchar(255) NOT NULL,
  `gal1` varchar(255) NOT NULL,
  `gal2` varchar(255) NOT NULL,
  `gal3` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurantlist`
--

INSERT INTO `restaurantlist` (`resID`, `resName`, `operationDay`, `operationTime`, `location`, `description`, `rating`, `cuisine`, `priceRange`, `paymentOption`, `contact`, `website`, `resLogo`, `gal1`, `gal2`, `gal3`) VALUES
(1, 'Pampas Reserve', 'Monday to Friday', '08:00am - 22:00pm', 'G01, Suasana Bukit Ceylon, 2, Persiaran Raja Chulan, 50200 Kuala Lumpur.', '        In the dining room, Pampas offers a daily tasting menu with a journey of seasonal ingredient, pure, clean and intense flavours. A ‘a la carte\' menu for dinner and prix-fixe tasting menu daily for dinner. Pampas Grill and Bar is proud to have a menu designed around the best steak that South America has to offer. In addition, we\'ve filled out our menu with options to suit any mood : tender lamb, succulent chicken, seafood and crisp fresh salads - all finished with a flair that is uniquely ', '3.2', 'Western', 'RM50 - RM100', 'Mastercard, Visa, AMEX', '0320313575', 'https://c.dotventures.com.my/', '/images/pampasReserveLogo.png', '/images/pampasReserveGallery1.png', '/images/pampasReserveGallery2.png', '/images/pampasReserveGallery3.png'),
(2, 'Bijan Bar & Restaurant', 'Monday to Saturday', '08:00am - 23:00pm', '3, Jalan Ceylon, 50200 Kuala Lumpur.', '       Bijan opened its doors in September 2003 to offer a unique dining experience to discerning palates. The Bijan experience is modern in presentation yet wholesome in flavour. Traditional Malay cuisine is taken out of hawker stalls and buffet lines, and served against a lush backdrop. Modern in its surroundings with distinctive Asian accents, Bijan is warm, yet chic; intimate yet spacious. At Bijan restaurant, we are innovating ways of enjoying Malay food, introducing accompanying wine to en', '4.8', 'Malay', 'RM80 - RM100', 'Mastercard, Visa, AMEX', '60320313575', 'www.bijanrestaurant.com', '/images/bijanLogo.png', '/images/bijanGallery1.png', '/images/bijanGallery2.png', '/images/bijanGallery3.png'),
(3, 'Vasco\'s @ Hilton Kuala Lumpur', 'Monday to Sunday', '07:00am - 17:00pm', 'Lobby Level, Hilton Kuala Lumpur, 3, Jalan Stesen Sentral, 50470 Kuala Lumpur. ', '        Step into an exciting world of flavours and a journey of discovery at Vasco’s, a unique all-day dining restaurant. Experience a gastronomic journey like never before adorned with an alfresco feel and interactive show kitchens creating dishes bursting with flavour and unparalleled choice.', '4.4', 'International', 'RM 120 - 160', 'Mastercard, Visa', '0322642426', 'www.vascokl.com', '/images/res3Logo.png', '/images/res3Gal1.png', '/images/res3Gal2.png', '/images/res3Gal3.png'),
(4, 'Kampachi Pavilion', 'Monday to Sunday', '08:00 AM - 10:00 PM', 'Lot 6.09.00, Level 6, Pavilion Kuala Lumpur, 168, Jalan Bukit Bintang, 55100 Kuala Lumpur.', 'The first Kampachi outside of Equatorial Hotel and is currently nestled in the award-winning retail mall located at the heart of the Golden Triangle in Kuala Lumpur. For more than four decades, the Kampachi has been recognized for offering truly authentic Japanese cuisine with ingredients sourced from Japan including seafood from the famed Tsukiji Market in Tokyo. Its team of Japanese chefs skilled in the art of traditional methods of food preparation and service deliver a culinary experience ma', '3.6', 'Japanese', 'RM 150 - 200', 'Mastercard, Visa, AMEX', '0321489608', 'www.kampachi.com.my', '/images/res4Logo.png', '/images/res4Gal1.png', '/images/res4Gal2.png', '/images/res4Gal3.png'),
(5, 'Grub by Ahong & Friends', 'Monday to Saturday', '09:00am - 22:00pm', '608, Jalan 17/10, Seksyen 17, 46400 Petaling Jaya, Selangor.', 'We serve classic western food with a twist. Local joint for sec 17 community. We enjoy interacting with our customers and a good slurp now and then.', '3.2', 'Western', 'RM 30 - 45', 'Mastercard, Visa', '0146072983', 'www.facebook.com/hongmasterchef', '/images/res5Logo.png', '/images/res4Gal1.png', '/images/res4Gal2.png', '/images/res4Gal3.png'),
(6, 'Supreme Barbeque Club', 'Tuesday to Sunday', '08:30am - 22:30pm', '20, Persiaran Ampang, Desa Pahlawan, 55000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Supreme Barbeque Club is a Japanese Izakaya & Korean BBQ fusion fun-dining restaurant. We offer an array of Japanese & Korean style cuisines as well as Premium Wagyu cut meats. We are a Pork-Free establishment.', '4.0', 'Japanese', 'RM 100', 'Mastercard, Visa', '0342669875', 'www.facebook.com/SupremeBarbequeClub', '/images/res6Logo.png', '/images/res6Gal1.png', '/images/res6Gal2.png', '/images/res6Gal3.png'),
(7, 'THIRTY8', 'Monday to Sunday', '12:00pm - 23:00pm', '38th Floor, Grand Hyatt Kuala Lumpur, 12, Jalan Pinang, 50450 Kuala Lumpur.', 'Voted as one of the most scenic restaurants in Kuala Lumpur, THIRTY8 is located strategically on the 38th floor and comprises of a 360- degree city view including the dining areas, bar and lounge. Heightening the discerning diners’ experience is the lively show kitchens which serves international cuisine showcasing a variety of Western, Chinese and Japanese flavours.', '3.8', 'International', 'RM 100 - 120', 'Mastercard, Visa, AMEX, JCB, UnionPay', '0322039188', 'www.THIRTY8.com', '/images/res7Logo.png', '/images/res7Gal1.png', '/images/res7Gal2.png', '/images/res7Gal3.png'),
(8, 'The Daily Grind Bangsar', 'Monday to Sunday', '08:00 AM - 10:00 PM', 'LG8, Lower Ground, Bangsar Village. 1, Jalan Telawi, 1, Bangsar Baru, 59100 Kuala Lumpur.', 'The Daily Grind, established in December 2008, is Kuala Lumpur’s very first gourmet burger restaurant dedicated to serving a range of crafted & adventurous gourmet burgers, from 100% prime beef patties to lamb patties and vegetarian options, using the freshest ingredients and homemade sauces.', '3.0', 'Western', 'RM 50 - RM 100', 'Mastercard, Visa, AMEX', '0322876708', 'www.thedailygrind.com.my/bangsar', '/images/res8Logo.png', '/images/res8Gal1.png', '/images/res8Gal2.png', '/images/res8Gal3.png'),
(9, 'Don\'s Habanos Cigar Lounge and Hookah Bar', 'Monday to Sunday', '3:00pm - 12:00am', 'E-0-2, Block E, Plaza Damas, Jalan Sri Hartamas 1, 50480 Kuala Lumpur\r\n', 'A Unique Malaysian Restaurant with dishes that cater to all your cravings and fixes. ', '4.5', 'Local', 'RM 69', 'Mastercard, Visa, AMEX, JCB, UnionPay', '0108841877', 'www.facebook.com/donscigarlounge', '/images/res9Logo.png', '/images/res9Gal1.png', '/images/res9Gal2.png', '/images/res9Gal3.png'),
(10, 'Truly Wine', 'Monday to Sunday', '11:00am - 19:00pm', 'Lot No.G-033 & G-033A, Ground Floor, The Starling Mall, Jalan SS21/37, Damansara Uptown, 47400 Petaling Jaya.', 'Truly Wine is a Wine Bar, a Restaurant and a Retail Store - all under one roof. We place special emphasis on relaxation ​and deliciousness over pretentiousness.\r\n\r\nDesigned with the goal of offering good food and good wine in a relaxing atmosphere, we invite you to eat, drink, relax and enjoy! ', '4.0', 'Western', 'RM 40 - RM 80', 'MasterCard, Visa\r\n', '0376625981', 'www.trulywine.my', '/images/res10Logo.png', '/images/res10Gal1.png', '/images/res10Gal2.png', '/images/res10Gal3.png');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPw` varchar(25) NOT NULL,
  `userContact` varchar(12) NOT NULL,
  `userEmail` varchar(25) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userAnswer1` varchar(255) NOT NULL,
  `userAnswer2` varchar(255) NOT NULL,
  `userType` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`userID`, `userName`, `userPw`, `userContact`, `userEmail`, `userAddress`, `userAnswer1`, `userAnswer2`, `userType`) VALUES
(1, 'Bong Ming Hui', 'bong', '0103456789', 'bong@gmail.com', '111, Jalan Hang Jebat, Taman Semangat, 75200 Melaka, Melaka Malaysia.', 'dog', 'sjkc melaka', 'm'),
(2, 'Wong Ye Syuen', 'wong', '0113456789', 'wong@gmail.com', '165, Jalan Perwira 8, Taman Ungku Tun Aminah, 81300 Skudai, Johor Malaysia.', 'cat', 'sjkc skudai', 'm'),
(3, 'Yin Kar Kin', 'yin', '0123456789', 'yin@gmail.com', 'No.3, Jalan Bali, Kawasan Perusahan Bukit Angkat, 43300 Kajang, Selangor Malaysia.', 'bird', 'sjkc kajang', 'm'),
(8, 'Liew Jun Hong', 'liew', '0133456789', 'liew@gmail.com', '6, Jalan Kencana 26, Taman Kencana Cheras, 56100 Kuala Lumpur, Malaysia.', 'dog', 'sjkc cheras', 'm'),
(9, 'Wee Jia Wen', 'wee', '0143456789', 'wee@gmail.com', 'No. 2366, Jalan Sungai Putat Sungai Putat, \r\n42000 Klang, Selangor Malaysia.', 'snake', 'sjkc klang', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `restaurantlist`
--
ALTER TABLE `restaurantlist`
  ADD PRIMARY KEY (`resID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinglist`
--
ALTER TABLE `bookinglist`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurantlist`
--
ALTER TABLE `restaurantlist`
  MODIFY `resID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 11:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `restaurantbookingapp`
--
CREATE DATABASE IF NOT EXISTS `restaurantbookingapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restaurantbookingapp`;

-- --------------------------------------------------------

--
-- Table structure for table `bookinglist`
--

CREATE TABLE `bookinglist` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `resID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `bookingPax` int(11) NOT NULL,
  `bookingName` varchar(255) NOT NULL,
  `bookingContact` varchar(12) NOT NULL,
  `bookingStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookinglist`
--

INSERT INTO `bookinglist` (`bookingID`, `userID`, `resID`, `bookingDate`, `bookingTime`, `bookingPax`, `bookingName`, `bookingContact`, `bookingStatus`) VALUES
(1, 4, 1, '2022-01-12', '16:00:00', 3, 'Liew Jun Hong', '0133456789', 'Attended'),
(2, 4, 1, '2022-03-28', '14:00:00', 4, 'Liew Jun Hong', '0133456789', 'Attended'),
(4, 5, 3, '2022-03-24', '08:00:00', 1, 'Wee Jia Wen', '0143456789', 'Cancelled'),
(5, 1, 3, '2022-03-28', '08:00:00', 5, 'Bong Ming Hui', '0103456789', 'Attended'),
(6, 4, 5, '2022-03-25', '13:00:00', 3, 'Liew Jun Hong', '0133456789', 'Attended'),
(7, 5, 6, '2022-03-30', '08:00:00', 3, 'Wee Jia Wen', '0143456789', 'Attended'),
(8, 2, 5, '2022-04-01', '09:00:00', 2, 'Wong Ye Syuen', '0113456789', 'Cancelled'),
(9, 3, 3, '2022-04-05', '15:00:00', 2, 'Yin Kar Kin', '0123456789', 'Cancelled'),
(10, 1, 4, '2022-04-26', '12:00:00', 3, 'Bong Ming Hui', '0103456789', 'Confirmed'),
(11, 5, 6, '2022-04-29', '16:00:00', 2, 'Wee Jia Wen', '0143456789', 'Cancelled'),
(12, 1, 4, '2022-04-27', '15:00:00', 3, 'Bong Ming Hui', '010-3456789', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantlist`
--

CREATE TABLE `restaurantlist` (
  `resID` int(10) NOT NULL,
  `resName` varchar(50) NOT NULL,
  `operationDay` varchar(25) NOT NULL,
  `operationTime` varchar(25) DEFAULT NULL,
  `location` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `cuisine` varchar(20) NOT NULL,
  `priceRange` varchar(25) NOT NULL,
  `paymentOption` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `website` varchar(255) NOT NULL,
  `resLogo` varchar(255) NOT NULL,
  `gal1` varchar(255) NOT NULL,
  `gal2` varchar(255) NOT NULL,
  `gal3` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurantlist`
--

INSERT INTO `restaurantlist` (`resID`, `resName`, `operationDay`, `operationTime`, `location`, `description`, `rating`, `cuisine`, `priceRange`, `paymentOption`, `contact`, `website`, `resLogo`, `gal1`, `gal2`, `gal3`) VALUES
(1, 'Pampas Reserve', 'Monday to Friday', '08:00am - 22:00pm', 'G01, Suasana Bukit Ceylon, 2, Persiaran Raja Chulan, 50200 Kuala Lumpur.', '        In the dining room, Pampas offers a daily tasting menu with a journey of seasonal ingredient, pure, clean and intense flavours. A ‘a la carte\' menu for dinner and prix-fixe tasting menu daily for dinner. Pampas Grill and Bar is proud to have a menu designed around the best steak that South America has to offer. In addition, we\'ve filled out our menu with options to suit any mood : tender lamb, succulent chicken, seafood and crisp fresh salads - all finished with a flair that is uniquely ', '3.2', 'Western', 'RM50 - RM100', 'Mastercard, Visa, AMEX', '0320313575', 'https://c.dotventures.com.my/', '/images/pampasReserveLogo.png', '/images/pampasReserveGallery1.png', '/images/pampasReserveGallery2.png', '/images/pampasReserveGallery3.png'),
(2, 'Bijan Bar & Restaurant', 'Monday to Saturday', '08:00am - 23:00pm', '3, Jalan Ceylon, 50200 Kuala Lumpur.', '       Bijan opened its doors in September 2003 to offer a unique dining experience to discerning palates. The Bijan experience is modern in presentation yet wholesome in flavour. Traditional Malay cuisine is taken out of hawker stalls and buffet lines, and served against a lush backdrop. Modern in its surroundings with distinctive Asian accents, Bijan is warm, yet chic; intimate yet spacious. At Bijan restaurant, we are innovating ways of enjoying Malay food, introducing accompanying wine to en', '4.8', 'Malay', 'RM80 - RM100', 'Mastercard, Visa, AMEX', '60320313575', 'www.bijanrestaurant.com', '/images/bijanLogo.png', '/images/bijanGallery1.png', '/images/bijanGallery2.png', '/images/bijanGallery3.png'),
(3, 'Vasco\'s @ Hilton Kuala Lumpur', 'Monday to Sunday', '07:00am - 17:00pm', 'Lobby Level, Hilton Kuala Lumpur, 3, Jalan Stesen Sentral, 50470 Kuala Lumpur. ', '        Step into an exciting world of flavours and a journey of discovery at Vasco’s, a unique all-day dining restaurant. Experience a gastronomic journey like never before adorned with an alfresco feel and interactive show kitchens creating dishes bursting with flavour and unparalleled choice.', '4.4', 'International', 'RM 120 - 160', 'Mastercard, Visa', '0322642426', 'www.vascokl.com', '/images/res3Logo.png', '/images/res3Gal1.png', '/images/res3Gal2.png', '/images/res3Gal3.png'),
(4, 'Kampachi Pavilion', 'Monday to Sunday', '08:00 AM - 10:00 PM', 'Lot 6.09.00, Level 6, Pavilion Kuala Lumpur, 168, Jalan Bukit Bintang, 55100 Kuala Lumpur.', 'The first Kampachi outside of Equatorial Hotel and is currently nestled in the award-winning retail mall located at the heart of the Golden Triangle in Kuala Lumpur. For more than four decades, the Kampachi has been recognized for offering truly authentic Japanese cuisine with ingredients sourced from Japan including seafood from the famed Tsukiji Market in Tokyo. Its team of Japanese chefs skilled in the art of traditional methods of food preparation and service deliver a culinary experience ma', '3.6', 'Japanese', 'RM 150 - 200', 'Mastercard, Visa, AMEX', '0321489608', 'www.kampachi.com.my', '/images/res4Logo.png', '/images/res4Gal1.png', '/images/res4Gal2.png', '/images/res4Gal3.png'),
(5, 'Grub by Ahong & Friends', 'Monday to Saturday', '09:00am - 22:00pm', '608, Jalan 17/10, Seksyen 17, 46400 Petaling Jaya, Selangor.', 'We serve classic western food with a twist. Local joint for sec 17 community. We enjoy interacting with our customers and a good slurp now and then.', '3.2', 'Western', 'RM 30 - 45', 'Mastercard, Visa', '0146072983', 'www.facebook.com/hongmasterchef', '/images/res5Logo.png', '/images/res4Gal1.png', '/images/res4Gal2.png', '/images/res4Gal3.png'),
(6, 'Supreme Barbeque Club', 'Tuesday to Sunday', '08:30am - 22:30pm', '20, Persiaran Ampang, Desa Pahlawan, 55000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Supreme Barbeque Club is a Japanese Izakaya & Korean BBQ fusion fun-dining restaurant. We offer an array of Japanese & Korean style cuisines as well as Premium Wagyu cut meats. We are a Pork-Free establishment.', '4.0', 'Japanese', 'RM 100', 'Mastercard, Visa', '0342669875', 'www.facebook.com/SupremeBarbequeClub', '/images/res6Logo.png', '/images/res6Gal1.png', '/images/res6Gal2.png', '/images/res6Gal3.png'),
(7, 'THIRTY8', 'Monday to Sunday', '12:00pm - 23:00pm', '38th Floor, Grand Hyatt Kuala Lumpur, 12, Jalan Pinang, 50450 Kuala Lumpur.', 'Voted as one of the most scenic restaurants in Kuala Lumpur, THIRTY8 is located strategically on the 38th floor and comprises of a 360- degree city view including the dining areas, bar and lounge. Heightening the discerning diners’ experience is the lively show kitchens which serves international cuisine showcasing a variety of Western, Chinese and Japanese flavours.', '3.8', 'International', 'RM 100 - 120', 'Mastercard, Visa, AMEX, JCB, UnionPay', '0322039188', 'www.THIRTY8.com', '/images/res7Logo.png', '/images/res7Gal1.png', '/images/res7Gal2.png', '/images/res7Gal3.png'),
(8, 'The Daily Grind', 'Monday to Sunday', '08:00 AM - 10:00 PM', 'LG8, Lower Ground, Jalan Telawi, 1, Bangsar Baru, 59100 Kuala Lumpur.', 'The Daily Grind, established in December 2008, is Kuala Lumpur’s very first gourmet burger restaurant dedicated to serving a range of crafted & adventurous gourmet burgers, from 100% prime beef patties to lamb patties and vegetarian options, using the freshest ingredients and homemade sauces.', '3.0', 'Western', 'RM 50 - RM 100', 'Mastercard, Visa, AMEX', '0322876708', 'www.thedailygrind.com.my/bangsar', '/images/res8Logo.png', '/images/res8Gal1.png', '/images/res8Gal2.png', '/images/res8Gal3.png'),
(9, 'Habanos Cigar Lounge', 'Monday to Sunday', '3:00pm - 12:00am', 'E-0-2, Block E, Plaza Damas, Jalan Sri Hartamas 1, 50480 Kuala Lumpur\r\n', 'A Unique Malaysian Restaurant with dishes that cater to all your cravings and fixes. ', '4.5', 'Local', 'RM 69', 'Mastercard, Visa, AMEX, JCB, UnionPay', '0108841877', 'www.facebook.com/donscigarlounge', '/images/res9Logo.png', '/images/res9Gal1.png', '/images/res9Gal2.png', '/images/res9Gal3.png'),
(10, 'Truly Wine', 'Monday to Sunday', '11:00am - 19:00pm', 'Lot No.G-033 & G-033A, Ground Floor, The Starling Mall, Jalan SS21/37, Damansara Uptown, 47400 Petaling Jaya.', 'Truly Wine is a Wine Bar, a Restaurant and a Retail Store - all under one roof. We place special emphasis on relaxation ​and deliciousness over pretentiousness.\r\n\r\nDesigned with the goal of offering good food and good wine in a relaxing atmosphere, we invite you to eat, drink, relax and enjoy! ', '4.0', 'Western', 'RM 40 - RM 80', 'MasterCard, Visa\r\n', '0376625981', 'www.trulywine.my', '/images/res10Logo.png', '/images/res10Gal1.png', '/images/res10Gal2.png', '/images/res10Gal3.png');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPw` varchar(255) NOT NULL,
  `userContact` varchar(12) NOT NULL,
  `userEmail` varchar(25) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userAnswer1` varchar(255) NOT NULL,
  `userAnswer2` varchar(255) NOT NULL,
  `userType` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`userID`, `userName`, `userPw`, `userContact`, `userEmail`, `userAddress`, `userAnswer1`, `userAnswer2`, `userType`) VALUES
(0, 'admin', '0e8cd409a23c2e7ad1c5b22b101dfa16720550dc547921c7a099b75c7f405fd4', '000-000-0000', 'admin@gmail.con', 'admin', 'admin', 'admin', 'a'),
(1, 'bongminghui', 'e0b19d946903626a0e86f631f380c18230f805d2f595a9a8e24652c2b9e3d16f', '010-345-6789', 'bongminghui@gmail.com', '111, Jalan Hang Jebat, Taman Semangat, 75200 Melaka, Melaka Malaysia.', 'dog', 'sjkc melaka', 'm'),
(2, 'wongyesyuen', 'ceecfd131fd6b77660b9b3efa62e5d199b23d99254a4e2fef2eb6c28590b5a63', '011-345-6789', 'wongyesyuen@gmail.com', '165, Jalan Perwira 8, Taman Ungku Tun Aminah, 81300 Skudai, Johor Malaysia.', 'cat', 'sjkc skudai', 'm'),
(3, 'yinkarkin', '6953d5dc0482291509cdb85636760f32d249ab97e3ef7fe63b9cb1776c7274d4', '012-345-6789', 'yin123@gmail.com', 'No.3, Jalan Bali, Kawasan Perusahan Bukit Angkat, 43300 Kajang, Selangor Malaysia.', 'bird', 'sjkc kajang', 'm'),
(4, 'liewjunhong', '5bf87e2f7bc8a43e5ec34e2991814c2e6e92fa80c7d7c319b55b74d6ca3f36e8', '013-345-6789', 'liewjunhong@gmail.com', '6, Jalan Kencana 26, Taman Kencana Cheras, 56100 Kuala Lumpur, Malaysia.', 'dog', 'sjkc cheras', 'm'),
(5, 'weejiawen', 'ad957e49b9b3b1020f72439eed26bb37d46585cf216004e8e48a9335546cd145', '014-345-6789', 'weejiawen@gmail.com', 'No. 2366, Jalan Sungai Putat Sungai Putat, \r\n42000 Klang, Selangor Malaysia.', 'snake', 'sjkc klang', 'm'),
(6, 'tansiewmei', '00bf20db42f14b346dad47b948f1264127b0b4969488c7734a72093eb46e370b', '015-345-6789', 'tansiewmei@gmail.com', 'No. 6, Jalan Brp 9/1C, 47000 Sungai Buloh, Selangor Malaysia.', 'no', 'sjkc sungai buloh', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `restaurantlist`
--
ALTER TABLE `restaurantlist`
  ADD PRIMARY KEY (`resID`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinglist`
--
ALTER TABLE `bookinglist`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurantlist`
--
ALTER TABLE `restaurantlist`
  MODIFY `resID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
