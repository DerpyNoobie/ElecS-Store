-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 07:20 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Điện thoại'),
(2, 'Tai nghe'),
(3, 'Bàn phím'),
(4, 'Chuột '),
(5, 'Tay cầm'),
(6, 'Cổng chuyển đổi USB'),
(7, 'Dây cáp'),
(8, 'Máy tính');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address`, `status`, `created_at`, `delivery_date`) VALUES
(16, 12, 'user 1', '0123123123', 'KTC C', 'Đang chờ xử lý', '2024-12-21 06:10:21', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(21, 16, 1, 2, 14490000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image_url`, `category_id`) VALUES
(1, 'Laptop Acer Swift X SFX16 51G 516Q', 14490000.00, 'CPU	Intel® Core™ i5-11320H upto 4.5GHz, 8MB Cache\r\n\r\nRAM	16GB LPDDR4X 4266MHz Onboard (Không nâng cấp)\r\n\r\nỔ lưu trữ:	512GB SSD M.2 PCIE Gen3x4 (2 slots SSD M2 PCIe)\r\n\r\nCard đồ họa	NVIDIA® GeForce RTX™ 3050 with 4GB of dedicated GDDR6 VRAM AI TOPs: 143 TOPs\r\n\r\nMàn hình	16.1\" FHD (1920 x 1080) IPS SlimBezel, 60Hz, Acer ComfyView LED-backlit TFT LCD\r\n\r\nCổng kết nối	2 x USB 3.2 Gen 1 ports with one featuring power-off USB charging\r\n1 x HDMI® 2.0 port with HDCP support\r\n1 x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone\r\n1 x DC-in jack for AC adapter\r\n1 x USB Type-C port supporting\r\n\r\nBàn phím	Có led, có bàn phím số', 'https://product.hstatic.net/200000722513/product/ava_022086f749f941aca8157961817bd3ec_1024x1024.png', 8),
(2, 'Laptop ASUS ExpertBook P1 P1503CVA i5SE16 50W', 15790000.00, 'CPU	Intel® Core™ i5-13500H Processor 2.6 GHz (18MB Cache, up to 4.7 GHz, 12 cores, 16 Threads)\r\nRAM	16GB (16GBx1) DDR5 (2x SO-DIMM socket, up to 64GB SDRAM)\r\nỔ cứng	512GB M.2 2280 NVMe™ PCIe® 4.0 SSD\r\nVGA	Intel® UHD Graphics\r\nMàn hình	15.6\" FHD (1920 x 1080) 16:9, IPS-level, 60Hz, LED Backlit, Anti-glare display, NTSC: 45%, View angle 170, Screen-to-body ratio 87%', 'https://product.hstatic.net/200000722513/product/sus-expertbook-p1-p1503cva-i5se16-50w_62838fda17674f44b67a2991a04c9f48_2c41a977c071467d9f4e705ec46511ac_1024x1024.png', 8),
(3, 'Laptop Lenovo Yoga Slim 7 15ILL9 83HM000GVN', 41990000.00, 'CPU	Intel® Core™ Ultra 7 258V, 8C (4P + 4LPE) / 8T, Max Turbo up to 4.8GHz, 12MB\r\nRAM	32GB Soldered LPDDR5x-8533, MoP Memory (Dual-channel, không nâng cấp)\r\nSSD	1TB SSD M.2 2242 PCIe® 4.0x4 NVMe® (1 slot, nâng cấp tối đa 1TB)\r\nCard đồ họa	Integrated Intel® Arc™ Graphics 140V\r\nIntegrated Intel® AI Boost, up to 47 TOPS\r\nMàn hình	15.3\" 2.8K WQXGA+ (2880x1800) IPS 500nits Glossy / Anti-fingerprint, 100% DCI-P3, 100% sRGB, 120Hz, Eyesafe®, Dolby Vision®, DisplayHDR™ 400, Glass, Touch, TCON\r\nCổng giao tiếp	1x USB-A (USB 5Gbps / USB 3.2 Gen 1)\r\n2x USB-C® (Thunderbolt™ 4 / USB4® 40Gbps), with USB PD 3.1 and DisplayPort™ 2.1\r\n1x HDMI® 2.1, up to 4K/60Hz\r\n1x Headphone / microphone combo jack (3.5mm)', 'https://product.hstatic.net/200000722513/product/ava_e20cc402385247919a9556f0093a67a1_1024x1024.png', 8),
(4, 'Điện Thoại Asus Rog Phone 6 White 12/256 AI2201-1D006WW\r\n', 18990000.00, 'Thông tin chung:\r\n\r\nNhà Sản Xuất: Asus \r\nMã sản phẩm:  AI2201-1A005WW\r\nTình Trạng: Mới\r\nMàu sắc: Trắng\r\nBảo Hành: 12 Tháng', 'https://product.hstatic.net/200000722513/product/avatar_63f4edf3f7864a829a6b24eaa047d29c_6f81186a537842b3862c8e33d365d204_1024x1024.png', 1),
(5, 'Điện thoại Asus ROG Phone 7 Phantom Black 16GB / 512GB AI2205-1B032WW\r\n', 24990000.00, 'Thông tin chung:\r\n\r\nNhà Sản Xuất: Asus \r\nTình Trạng: Mới\r\nMàu sắc: Đen\r\nBảo Hành: 12 tháng', 'https://product.hstatic.net/200000722513/product/hinh_ce7824dc3d07428eb4a8cb282d62e60e_17311a0a60014a2bb3d90ca2d1537466_1024x1024.gif', 1),
(6, 'Tai nghe thể thao Bluetooth Jabra Elite Active 45e Mint\r\n', 2900000.00, 'Nhà sản xuất : Jabra Elite\r\n\r\nTình trạng : Mới 100%\r\n\r\nBảo hành : 12 Tháng\r\n\r\nMàu : Đen', 'https://product.hstatic.net/200000722513/product/image_1024_745249f838ed4a5d9642120bf39680f0_a56c7bc392414020a69ece05558ad7ce_1024x1024.jpeg', 2),
(7, 'Bàn phím Vortex 8700 MultiX Summer Silver Switch\r\n', 2490000.00, 'Keycaps\r\nCherry Profile PBT Double Shot\r\nKích thước\r\n35.5 x 13.5 x 3.5 cm\r\nKết nối\r\nCó dây; USB-C\r\nSwitch\r\nGateron G Pro (Brown / Yellow / Silver)\r\nTrọng lượng\r\n1220g', 'https://product.hstatic.net/200000722513/product/thumbphim_d0e3f1afa21c4db9a8497a452f4c3e40_1024x1024.jpg', 3),
(8, 'Chuột công thái học Logitech Lift Vertical Pink\r\n', 1190000.00, 'Hãng sản xuất:	Logitech\r\nModel:	Logitech Lift Vertical\r\nSố nút:	4\r\nCông nghệ không dây:\r\n\r\nĐầu thu USB Logi Bolt\r\n\r\nCông nghệ Bluetooth tiết kiệm năng lượng\r\n\r\nPhạm vi không dây:	Lên tới 10 mét\r\nPin: 	1 Pin AA\r\nCuộn chuột:\r\n\r\nSmart Wheel\r\n\r\nPhần mềm: \r\n\r\nLogi Options+, khả dụng trên Windows và macOS, giúp tùy chỉnh các nút, làm việc nhanh hơn và hiệu quả hơn - như quay lại/tiếp theo và sao chép/dán.\r\n\r\nDPI: \r\n\r\n4000 (Hoàn toàn có thể điều chỉnh DPI)', 'https://product.hstatic.net/200000722513/product/lift-gallery-rose-1_a9d640124acd453f9f6028f96958566f_5defc115e6b2445ea5538917c6be393b_1024x1024.png', 4),
(9, 'Củ Sạc Ugreen GaN 100W CD226 Gr 40747\r\n', 990000.00, 'Hãng: Ugreen\r\nBảo hành: Chính hãng 18 tháng\r\nTình trạng: Mới 100%', 'https://product.hstatic.net/200000722513/product/hinh_498c1ae4845546fab768f093c71393e5_1024x1024.gif', 6),
(10, 'Tay cầm chơi game Asus ROG Kunai 3 Gamepad White\r\n', 2590000.00, 'Thông tin chung:\r\n\r\nHãng sản xuất: Asus\r\nTình trạng: Mới\r\nBảo hành: 12 Tháng', 'https://product.hstatic.net/200000722513/product/h732_57772661e13a4be68966b83cf227e7a1_6205a9955bbf441fa0bc2fe3c3395feb_1024x1024.png', 5),
(11, 'Dây cáp custom AKKO Cable V2 Macaw\r\n', 320000.00, 'Thương hiệu	AKKO\r\nMàu sắc	Vàng / xanh\r\nCổng kết nối	\r\nMột đầu connector 1 nối giữa cáp và máy tính, hiện nay thường là kiểu port USB-A\r\nConnector 2 còn lại nối giữa cáp và keyboard, bây giờ phổ biến là dùng port USB C hoặc mini USB.', 'https://product.hstatic.net/200000722513/product/day-cap-custom-akko-v2-macaw-510x510_1197db25ffe141158f49fa89335f8197_95a3553166594f2993c7f8bc7111e9a3_1024x1024.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`) VALUES
(12, 'thanhnd', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen duc thanh', 'thanhnguyen.tnnn25@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
