-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 05:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wushu-society`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'weedj-pm23@student.tarc.edu.my', '4b2cf303cb6bd526', '$2y$10$8clGdHu6ogNThK1zVZl7CeQ1NiT5pMafJMMIEXaAR.zZNl5lBl.NS', '1716015260');

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `ranking_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `score` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`ranking_id`, `user_id`, `username`, `category`, `score`) VALUES
(1, 1, 'user1', 'Intermediate', 9.51),
(2, 2, 'user2', 'Intermediate', 9.00),
(3, 3, 'user3', 'Beginner', 9.00),
(5, 4, 'user4', 'Advanced', 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `phone_number`, `email`, `img`, `datetime`) VALUES
(1, 'Lee Belfern', 'bel022', '25d55ad283aa400af464c76d713c07ad', 126386334, 'bel022@gmail.com', 'Admin_1716258640.jpg', '2024-05-14 22:23:00'),
(5, 'Nico Ouldcott', 'nouldcott4', '21232f297a57a5a743894a0e4a801fc3', 123456789, 'nouldcott4@goo.gl', 'Admin_1716125252.jpg', '2024-05-14 22:23:00'),
(6, 'din jun', 'admin', '21232f297a57a5a743894a0e4a801fc3', 123456788, 'dinjun0802@gmail.com', 'Admin_1716125274.jpg', '2024-05-14 22:23:00'),
(7, 'Wee Din Jun', 'TonyWu', '25d55ad283aa400af464c76d713c07ad', 123456787, 'dinjun080@gmail.com', 'Admin_1716126957.jpg', '2024-05-19 21:54:10'),
(8, 'Virgilio Bairstow', 'vbairstow0', '25d55ad283aa400af464c76d713c07ad', 123456786, 'vbairstow0@gizmodo.com', 'Admin_1716129396.jpg', '2024-05-19 22:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announment`
--

CREATE TABLE `tbl_announment` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announment`
--

INSERT INTO `tbl_announment` (`id`, `title`, `description`, `location`, `date`) VALUES
(2, 'Wushu society announcement', 'good wushu good wushu good wushu good wushu !!!', 'Universiti Malaysia Terengganu (UMT) Penang Branch', '2024-05-30'),
(4, 'asdds', 'asdasdasdasdasdasdasdasdasdasd a', 'penang', '2024-05-21'),
(5, 'Got Competition Join', 'got new competition need to join to win!!!', 'Penang Chinese Girls\' School', '2024-05-29'),
(6, 'Wushu Society KungFu', 'This is good !!! This is good !!! This is good !!!', 'Tar UMT Penang Branch', '2024-05-31'),
(7, 'wushu wushu wushu ', 'wushu wushu wushu wushu wushu wushu wushu wushu ', 'Tar UMT Penang Branch', '2024-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id`, `category_name`, `img`) VALUES
(1, 'Ticket', 'Product_Category_7123.jpg'),
(2, 'Cloths', 'Product_Category_5685.jpg'),
(3, 'Shoes', 'Product_Category_8740.jpg'),
(4, 'Weapons', 'Product_Category_4005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_category` varchar(100) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_detail` varchar(1000) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `event_category`, `event_title`, `event_detail`, `event_date`, `event_location`, `event_img`) VALUES
(1, 'competition', 'qwertyuiop', 'qwertyuiop', '2024-05-18', '77, Lorong Lembah Permai 3, 11200 Tanjung Bungah, Pulau Pinang', 'Event_9816.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `transaction_id` varchar(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `user_id`, `payment_method`, `payment_status`, `transaction_id`, `amount`, `payment_date`) VALUES
(1, 1, 'credit_card', 'Paid', '664bffe92d', 90, '2024-05-21'),
(2, 1, 'credit_card', 'Paid', '664c08fd52', 70, '2024-05-21'),
(3, 1, 'credit_card', 'Paid', '664c094d58', 70, '2024-05-21'),
(4, 1, 'credit_card', 'Paid', '664c099988', 70, '2024-05-21'),
(5, 1, 'credit_card', 'Paid', '664c09e097', 70, '2024-05-21'),
(6, 1, 'credit_card', 'Paid', '664c0a5a59', 70, '2024-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_category` int(10) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_description` varchar(1000) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_category`, `product_name`, `product_description`, `product_price`, `product_img`) VALUES
(10003, 1, 'National Wushu Championships', 'Annual competitions held within individual countries, serving as a platform for domestic talent to demonstrate their mastery of Wushu techniques and vie for national titles and recognition.', 70, 'Product_1716234836.png'),
(10004, 1, 'European Wushu Championships', 'A prestigious event uniting practitioners from diverse European nations, promoting cultural exchange and friendly competition while celebrating the beauty and discipline of Wushu forms and routines.\r\n', 70, 'Product_1716235092.png'),
(10005, 1, 'Pan American Wushu Championships', 'An intercontinental tournament attracting participants from North, Central, and South America, fostering camaraderie and growth within the Pan American Wushu community through spirited contests and cultural exchange.', 70, 'Product_1716235151.png'),
(10006, 1, 'African Wushu Championships', 'An emerging platform for Wushu enthusiasts from across Africa to showcase their skills and passion for the martial arts, contributing to the development and promotion of Wushu on the African continent.\r\n', 70, 'Product_1716269589.png'),
(10007, 1, 'South American Wushu Championships', 'A regional event gathering practitioners from South American countries, providing a stage for athletes to compete, learn, and inspire one another while promoting the growth of Wushu in the region.\r\n', 70, NULL),
(10008, 1, 'Oceania Wushu Championships', 'A championship event held in the Oceania region, fostering unity and excellence among Wushu practitioners from Australia, New Zealand, and Pacific Island nations, while nurturing the development of Wushu within Oceania.\r\n', 70, NULL),
(20001, 2, 'Traditional Uniform (Tai Chi Uniform)', 'Loose-fitting, lightweight clothing typically made from cotton or silk, often in black or other solid colors, consisting of a jacket and pants.', 100, NULL),
(20002, 2, 'Modern Competition Uniform', 'Form-fitting attire designed for Wushu competitions, often made from high-performance materials such as spandex or polyester, featuring unique designs and patterns, and providing freedom of movement.', 110, NULL),
(20003, 2, 'Sanda/Sanshou Uniform', 'Specialized attire worn during Sanda (Chinese kickboxing) competitions, usually consisting of shorts and a sleeveless top, allowing for unrestricted kicking and striking techniques.', 120, NULL),
(20004, 2, 'Kung Fu Suits', 'Traditional Chinese martial arts attire worn during Kung Fu practice and performances, typically consisting of a mandarin-collared jacket and loose-fitting pants, often made from silk or satin.\r\n', 130, NULL),
(20005, 2, 'Wushu Training Wear', 'Comfortable and breathable clothing worn during Wushu training sessions, usually consisting of T-shirts, tank tops, and shorts, providing flexibility and ease of movement.\r\n', 140, NULL),
(20006, 2, 'Wushu Performance Costumes', 'Elaborate and decorative costumes worn during Wushu demonstrations and theatrical performances, often featuring intricate embroidery, silk fabrics, and traditional Chinese motifs.\r\n', 150, NULL),
(20007, 2, 'Traditional Uniform (Tai Chi Uniform)', 'Loose-fitting, lightweight clothing typically made from cotton or silk, often in black or other solid colors, consisting of a jacket and pants.', 160, NULL),
(20008, 2, 'Modern Competition Uniform', 'Form-fitting attire designed for Wushu competitions, often made from high-performance materials such as spandex or polyester, featuring unique designs and patterns, and providing freedom of movement.', 170, NULL),
(30001, 3, 'Traditional Wushu Shoes', 'Lightweight canvas or cotton shoes with thin rubber soles, providing flexibility and grip for Wushu practice and performance.\r\n', 440, NULL),
(30002, 3, 'Leather Wushu Shoes', 'Wushu shoes made from leather material, offering durability and support while maintaining flexibility for intricate movements.\r\n', 430, NULL),
(30003, 3, 'Mesh Wushu Shoes\r\n', 'Wushu shoes with mesh uppers for breathability, keeping the feet cool and comfortable during intense training sessions.\r\n', 420, NULL),
(30004, 3, 'Split Sole Wushu Shoes ', 'Shoes with split soles, offering enhanced flexibility and allowing for better articulation of the foot during Wushu techniques.', 410, NULL),
(30005, 3, 'Elastic Wushu Shoes', 'Shoes with elasticized uppers or closures, providing a snug and secure fit for optimal performance and stability.\r\n', 400, NULL),
(30006, 3, 'Traditional Kung Fu Slippers', 'Slip-on shoes inspired by traditional Chinese martial arts footwear, featuring soft soles and minimalistic design for a natural feel and agility.', 390, NULL),
(30007, 3, 'Wushu Sneakers', 'Sneaker-style Wushu shoes with cushioned soles for impact absorption and comfort, suitable for both training and casual wear.\r\n', 380, NULL),
(30008, 3, 'Wushu Boots', 'High-top Wushu shoes with ankle support, offering stability and protection during intense training or performances.\r\n', 370, NULL),
(40001, 4, 'Straight Sword (Jian)\r\n', 'A double-edged sword with a straight blade, commonly used in Wushu routines to demonstrate precision, agility, and control.\r\n', 320, NULL),
(40002, 4, 'Broad Sword (Dao)', 'A single-edged sword with a slightly curved blade, known for its slashing and chopping techniques, often used in Wushu performances to showcase power and dynamic movements.\r\n', 310, NULL),
(40003, 4, 'Spear (Qiang)', 'A long, polearm weapon with a pointed metal tip, used in Wushu routines to demonstrate thrusting, slashing, and sweeping techniques, symbolizing courage and strength.', 300, NULL),
(40004, 4, 'Staff (Gun)', 'A long wooden or metal staff, typically made from flexible materials such as bamboo or rattan, employed in Wushu forms to exhibit fluidity, grace, and versatility in movements.\r\n', 290, NULL),
(40005, 4, 'Whip Chain (Bian)', 'A flexible chain weapon with a weighted end, often used in Wushu routines to demonstrate agility, precision, and control over fast-moving objects.', 280, NULL),
(40006, 4, 'Double Daggers (Shuangdao)', 'Pair of short, curved blades resembling mini-swords, utilized in Wushu performances to showcase intricate and fast-paced knife techniques with both hands.\r\n', 270, NULL),
(40007, 4, 'Kwan Dao', 'A large, heavy polearm weapon with a broad, crescent-shaped blade at one end, representing power and authority, often used in Wushu routines to exhibit strength and imposing movements.\r\n', 260, NULL),
(40008, 4, 'Three-Section Staff (Sanjiegun)\r\n', 'A flexible staff composed of three connected sections, allowing for swift and unpredictable attacks, commonly used in Wushu forms to demonstrate coordination and dexterity.\r\n', 250, NULL),
(40009, 1, 'ryan', 'ryan', 110, 'Product_8837.jpg'),
(40011, 1, '', '', 0, 'Product_9631.'),
(40012, 1, 'World Wushu Championships Ticket', 'The premier event in Wushu, gathering elite practitioners from around the globe to compete in various disciplines, showcasing the pinnacle of skill, athleticism, and artistry on an international stage.', 70, 'Product_5815.png'),
(40013, 1, 'asdfghjkl;', 'zxcvbhjkl', 20, 'Product_3053.jpg'),
(40014, 1, 'fdhjlk', 'sdfgkl', 20, 'Product_8217.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `pwd`, `email`, `phone_number`, `img`, `datetime`) VALUES
(1, 'Wee Din Jun', 'dinjun1234', '25d55ad283aa400af464c76d713c07ad', 'dinjun@gmail.com', 123456787, 'User_1716131120.jpg', '2024-05-14 22:27:02'),
(2, 'Lee Belfern', 'bel022', '25d55ad283aa400af464c76d713c07ad', 'bel022@gmail.com', 123456789, 'User_1716131128.jpg', '2024-05-14 22:27:02'),
(5, 'Chris Spradbrow', 'cspradbrow0', '25d55ad283aa400af464c76d713c07ad', 'cspradbrow0@istockphoto.com', 156029249, 'User_1716133736.jpg', '2024-05-19 23:48:56'),
(6, 'Darice Tanguy', 'dtanguy0', '25d55ad283aa400af464c76d713c07ad', 'dtanguy0@t-online.de', 158546615, 'User_1716190286.jpg', '2024-05-20 15:31:26'),
(7, 'Joey Durning', 'jdurning1', '25d55ad283aa400af464c76d713c07ad', 'jdurning1@npr.org', 114742359, 'User_1716191294.jpg', '2024-05-20 15:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `student_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `day`, `start_time`, `end_time`, `student_category`) VALUES
(1, 'Monday', '11:00:00', '11:00:00', 'Beginner'),
(3, 'Tuesday', '10:00:00', '11:00:00', 'Advanced'),
(4, 'Wednesday', '00:19:00', '01:19:00', 'Beginner'),
(5, 'Thursday', '00:19:00', '01:19:00', 'Intermediate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`ranking_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announment`
--
ALTER TABLE `tbl_announment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `ranking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_announment`
--
ALTER TABLE `tbl_announment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40015;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_payment` (`payment_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `tbl_category_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
