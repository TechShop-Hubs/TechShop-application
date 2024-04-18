-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 11:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `status`) VALUES
(35, 'Honor', '1713243255_honor.jpg', '1'),
(36, 'SamsungGalaryA55', '1713243343_GalaxyA55.jpg', '1'),
(37, 'Samsung Galaxy', '1713243380_samsungGalaxy.png', '1'),
(38, 'Xiaomi', '1713243393_xiaomi.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `product_quantity`, `updated_at`, `status`) VALUES
(38, 5, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `kind`, `brand`) VALUES
(1, 'Điện thoại', 'Apple'),
(2, 'Điện thoại', 'Samsung '),
(3, 'Điện thoại', 'Xiaomi'),
(4, 'Điện thoại', 'Vivo'),
(5, 'Laptop', 'Asus'),
(6, 'Laptop', 'Apple'),
(7, 'Laptop', 'Lenovo'),
(8, 'Laptop', 'HP'),
(9, 'Laptop', 'Acer'),
(10, 'Laptop', 'Microsoft'),
(11, 'Laptop', 'LG'),
(12, 'Laptop', 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'https://res.cloudinary.com/dcpyvfqx6/image/upload/v1713359824/zfu4dhudqrsk9o150he4.jpg'),
(2, 2, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/7/28/637946196746819159_iPhone%2013%20(1).jpg'),
(3, 3, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/10/28/638025679600546363_iPhone%2014%20(16).jpg'),
(4, 4, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/_/4_186.jpg'),
(5, 5, 'https://cdn2.cellphones.com.vn/x/media/catalog/product//s/a/samsung-galaxy-s24-plus.png'),
(6, 6, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-s23-128gb_3_.png'),
(7, 7, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/n/o/note_20_ultra_gold_6_1_1_1.jpg'),
(8, 8, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-redmi-note-13-pro-4g_13__1.png'),
(9, 9, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/7/28/637946006197967173_Vivo%20T1X-4.jpg'),
(10, 10, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/9/26/637998090121931263_HASP-Vivo%20V25%20(19).JPG'),
(11, 11, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/8/19/637965269753952995_vivo-y22-s-17.jpg'),
(12, 12, 'https://images.fpt.shop/unsafe/fit-in/960x640/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/9/26/637998090121931263_HASP-Vivo%20V25%20(19).JPG'),
(13, 13, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_13__5_14.png'),
(14, 14, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/i/air_m2.png'),
(15, 15, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/g/a/gaming_003_3__3.png'),
(16, 16, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_6__17.png'),
(17, 17, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_7__1_12.png'),
(18, 18, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/u/surface_1_1.png'),
(19, 19, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_9__1_76.png'),
(20, 20, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/g/lg_gram_20233.png'),
(21, 21, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/g/a/gaming_003_2__1.png'),
(22, 22, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_6.png\r\n'),
(23, 23, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_20__1_23.png'),
(24, 24, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/4/14z90rs-ah54a5.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(20,3) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `destroy` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `sell_price` decimal(10,0) NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `describe_product` text NOT NULL,
  `screen_type` varchar(255) NOT NULL,
  `ram` decimal(10,0) NOT NULL,
  `memory` decimal(10,0) NOT NULL,
  `cpu` varchar(100) NOT NULL,
  `weight` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `discount`, `sell_price`, `quantity_product`, `describe_product`, `screen_type`, `ram`, `memory`, `cpu`, `weight`, `status`, `price`) VALUES
(1, 1, 'IPhone 15 Promax 256GB', 20, 3000000, 20, 'Máy mới 100% , chính hãng Apple Việt Nam.\r\nCellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam\r\nHộp, Sách hướng dẫn, Cây lấy sim, Cáp Type C\r\n1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple', '6.7 inches', 8, 256, 'Apple A17 Pro', 221, 1, 25000000),
(2, 1, 'iPhone 13 128GB', 10, 1499000, 15, 'Hiệu năng vượt trội - Chip Apple A15 Bionic mạnh mẽ, hỗ trợ mạng 5G tốc độ cao\nKhông gian hiển thị sống động - Màn hình 6.1\" Super Retina XDR độ sáng cao, sắc nét\nTrải nghiệm điện ảnh đỉnh cao - Camera kép 12MP, hỗ trợ ổn định hình ảnh quang học\nTối ưu điện năng - Sạc nhanh 20 W, đầy 50% pin trong khoảng 30 phút', '6.1 inches', 4, 128, 'Apple A15 Bionic', 173, 1, 14490000),
(3, 1, 'iPhone 14 512GB', 5, 2400000, 25, 'Tuyệt đỉnh thiết kế, tỉ mỉ từng đường nét - Nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung\nNâng tầm trải ngiệm giải trí đỉnh cao - Màn hình 6,1\" cùng tấm nền OLED có công nghệ Super Retina XDR cao cấp\nChụp ảnh chuyên nghiệp hơn - Cụm 2 camera 12 MP đi kèm nhiều chế độ và chức năng chụp hiện đại\nHiệu năng hàng đầu thế giới - Apple A15 Bionic 6 nhân xử lí nhanh, ổn định', '6.1 inches', 6, 512, 'Apple A15 Bionic', 173, 1, 23490000),
(4, 1, 'IPhone 12 Pro 128GB', 5, 1200000, 20, 'Máy mới 100% , chính hãng Apple Việt Nam.\nCellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam\nHộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C\n1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple', '6.1 inches', 8, 128, 'Apple A14 Bionic (5 nm)', 164, 1, 8000000),
(5, 2, 'Samsung s24 utra ', 5, 2945000, 15, 'Mới, đầy đủ phụ kiện từ nhà sản xuất\nĐiện thoại thông minh\n2. Cáp truyền dữ liệu\n3. Que lấy sim\n* Galaxy S24 Ultra không bao gồm củ sạc.\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\nGiá sản phẩm đã bao gồm VAT', '6.8 inches', 12, 256, 'Snapdragon 8 Gen 3 For Galaxy', 232, 1, 20000000),
(6, 2, 'Samsung s23', 10, 1249000, 10, 'Mới, đầy đủ phụ kiện từ nhà sản xuất\nHộp, Sách hướng dẫn, Cây lấy sim, Cáp Type C\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\nGiá sản phẩm đã bao gồm VAT', '6.1 inches', 8, 128, 'Snapdragon 8 Gen 2 for Galaxy', 168, 1, 9000000),
(7, 2, 'Samsung Galaxy Note 20 Utra 5G', 5, 2000000, 15, 'SP được thu lại từ khách có nhu cầu bán lại, thu cũ, ngoại hình trầy nhẹ thân máy/mặt kính màn hình. Kèm Cáp, củ sạc (Giảm thêm 200K nếu không kèm phụ kiện). Máy có thể đã qua BH hãng hoặc sửa chữa thay thế linh kiện. Có nguồn gốc rõ ràng, xuất hoá đơn eV\nBảo hành 6 tháng tại CellphoneS không loại trừ linh kiện, bảo hành cả nguồn, màn hình. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất(xem chi tiết)\nGiá sản phẩm đã bao gồm VAT', 'Loại màn hình 2', 12, 512, '6', 2, 1, 1800000),
(8, 3, 'Xiaomi Redmi Note 13 pro 4G', 15, 8000000, 9, '\"Thông tin sản phẩm\r\n\r\nMới, đầy đủ phụ kiện từ nhà sản xuất\r\nMáy, Que lấy SIM, sách hướng dẫn sử dụng, củ sạc 67W, dây sạc USB Type-C, ốp lưng nhựa.\r\nBảo hành 18 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '6.67 inches', 8, 128, 'MediaTek Helio G99-Ultra 8 nhân', 188, 1, 5000000),
(9, 4, 'Vivo T1x 4GB-64GB', 5, 3900000, 10, '\"Bộ vi xử lí mạnh mẽ nói không với giật lag - Qualcomm Snapdragon® 680\r\nSạc nhanh tức thì, sử dụng dài lâu - Pin lớn 5000mAh, sạc siêu tốc 18W\r\nRAM Mở Rộng 2.0 - Thoả sức lưu trữ các ứng dụng yêu thích và vận hành mượt mà\r\nHiển thị sống động mọi chi tiết với màn hình sắc nét LCD FHD+ 90Hz\"', '6.58 inches', 4, 64, 'Snapdragon 680', 182, 1, 3290000),
(10, 4, 'Vivo V25 5G 8GB-128GB', 10, 1200000, 25, '\"Thiết kế tinh tế đầy sang trọng - Kính phủ đều hai mặt, 2 viền mỏng cùng màu sắc hết sức trẻ trung và hiện đại\r\nThoả sức chụp ảnh selfie chất lượng cao - Camera chính độ phân giải 64 MP đi kèm nhiều tính năng cao cấp\r\nTái hiện hình ảnh rực rỡ, ấn tượng - Tấm nền AMOLED với kích thước 6.44 inch, tần số quét 90 Hz\r\nThoải mái chiến game với chip hiệu năng cao - MediaTek Dimensity 900 5G, RAM 8GB + mở rộng 8GB\"', '6.44 inches', 8, 128, 'MediaTek Dimensity 900', 186, 1, 7400000),
(11, 4, 'Vivo Y22s 8GB-128GB', 10, 5000000, 17, '\"Màn hình màu sắc rực rỡ, thoả sức lướt web, xem phim 6.55\"\"\"\", 1612x720 (HD+), 90Hz\r\nVận hành trơn tru và mượt mà - Bộ vi xử lý Snapdragon 680 8 nhân, RAM 8GB + Mở rộng 8GB\r\nGhi lại trọn vẹn khoảnh khắc đêm - Cụm camera sắc nét 50MP+2MP với đa dạng chế độ chuyên nghiệp\r\nPin khủng 5000mAh, sạc nhanh siêu tốc mọi lúc mọi nơi\"', '6.55', 8, 128, 'Snapdragon 680', 192, 1, 6),
(12, 4, 'Vivo V25e 8GB-128GB', 8, 8000000, 18, '\"Thiết kế đẳng cấp với mặt lưng thay đổi màu sắc - Cạnh viền vát phẳng thân máy siêu mỏng chỉ 7.79 mm\r\nMàn hình cao cấp, sắc nét cho trải nghiệm tuyệt vời - Màn hình AMOLED 6.44\"\"\"\", tần số quét 90 Hz\r\nLưu giữ trọn vẹn khoảng khắc - Hệ thống ba camera lên đến 64MP, hỗ trợ nhiều công nghệ chụp ảnh đa năng\r\nHiệu năng ổn định, thao tác mượt mà - Sở hữu con chip MediaTek Helio G99 cùng RAM 8GB\"', '6.44 inches', 8, 128, 'MediaTek Helio G99', 183, 1, 64900000),
(13, 5, 'Laptop Asus TUF Gaming F15 FX506HF-HN078W', 5, 1600000, 10, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nMáy, sạc, sách hướng dẫn sử dụng\r\nBảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '15.6 inches', 16, 512, ' Intel Core i5-11260H (2.9 GHz,12M Cache, up to 4.4 GHz, 6 lõi)', 2300, 1, 13000000),
(14, 6, 'Apple MacBook Air M1 256GB 2020', 5, 1800000, 10, '\"Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).\r\nMáy, Sách HDSD, Cáp sạc USB-C (2 m), Cốc sạc USB-C 30W\r\n1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '13.3 inches', 8, 256, '8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện', 1290, 1, 15000000),
(15, 7, 'Laptop Lenovo Yoga Duet 7 13ITL6 82MA009NVN', 5, 1890000, 15, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 36 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất.(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '13 inches', 8, 512, 'Intel Core i5-1135G7 (4C / 8T, 2.4 / 4.2GHz, 8MB)', 1163, 1, 15000000),
(16, 8, 'Laptop HP Pavilion 15-EG2089TU 7C0R1PA', 5, 1790000, 20, '\"Mới, đầy đủ phụ kiện từ nhà sản xuất\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '15.6 inches', 8, 512, 'Intel Core i7-1260P, 12 nhân / 16 luồng, 18MB Intel Smart Cache', 1750, 1, 14900000),
(17, 9, 'Laptop Acer Gaming Aspire 7 A715-76-53PJ', 3, 1500000, 11, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '16 inches', 16, 512, 'Intel Core i5-12450H (8 lõi / 12 luồng, 4.4GHz, 12MB)', 2100, 1, 12),
(18, 10, 'Laptop Surface Pro 9', 5, 2700000, 20, '\"Mới, đầy đủ phụ kiện từ nhà sản xuất\r\nSạc, sách HDSD\r\nTìm hiểu thêm về laptop nhập khẩu\r\n\r\nBảo hành 1 đổi 1 trong vòng 12 tháng bởi Nhà Phân Phối (Áp dụng máy bán từ 1.7.2022) Các máy mua trước đó áp dụng bảo hành 12 tháng tại các trung tâm Bảo hành FPT Service trên toàn quốc(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '13 inches', 8, 256, 'Intel Core i5-1235U Gen 12', 890, 1, 23),
(19, 5, 'Laptop Asus VivoBook 15 OLED A1505VA-L1201W', 2, 2400000, 15, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nMáy, sạc, sách hướng dẫn sử dụng\r\nBảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '15.6', 16, 512, ' Intel Core i5-1235U Gen 12', 1700, 1, 18),
(20, 10, 'Laptop LG GRAM 2023 16Z90RS-G.AH54A5', 5, 3500000, 10, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng bởi nhà phân phối, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX.(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '16 inches', 16, 512, ' Intel Core i5-1340P 1.9 GHz (up to 4.6 GHz, 12MB Cache, 12 lõi/luồng)', 1250, 1, 30000000),
(21, 9, 'Laptop Gaming Acer Nitro 5 Tiger AN515-58-769J NH.QFHSV.003', 5, 1800000, 15, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '15.6 inches', 8, 512, 'Intel Core i7-12700H up to 4.7GHz, 24MB Cache', 1910, 1, 15),
(22, 12, 'Laptop Dell Inspiron 7506-5903SLV', 5, 1800000, 26, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nSạc, sách HDSD\r\nTìm hiểu thêm về laptop nhập khẩu\r\n\r\nBảo hành 1 đổi 1 trong vòng 12 tháng bởi Nhà Phân Phối (Áp dụng máy bán từ 1.7.2022) Các máy mua trước đó áp dụng bảo hành 12 tháng tại các trung tâm Bảo hành FPT Service trên toàn quốc(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '15.6 inches', 8, 256, 'Intel Core i5-1135G7 Gen 11', 1900, 1, 14990000),
(23, 5, 'Laptop Asus Zenbook 14 Flip OLED UP3404VA-KN038W', 4, 26, 15, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '14 inches', 16, 512, 'Intel Core i5 - 1340P 1.9 GHz (12MB Cache, up to 4.6 GHz, 12 lõi / 16 luồng)', 1500, 1, 23),
(24, 11, 'Laptop LG Gram 2023 14Z90RS-G.AH54A5', 5, 29, 20, '\"Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nSạc, máy, sách hướng dẫn\r\nBảo hành 12 tháng bởi nhà phân phối, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX.(xem chi tiết)\r\nGiá sản phẩm đã bao gồm VAT\"', '14 inches', 16, 512, 'Intel Core i5-1340P (up to 4.6 GHz, 12MB, 12 lõi/luồng)', 1500, 1, 25),
(27, 1, 'đasd', 2, 1213, 23, '1psjhjdlj', '12', 5, 120, '15', 27, 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `role`, `phone_number`, `status`) VALUES
(1, 'admin@gmail.com', 'Hoàng Hữu Hùng', '$2y$12$rq1Ftb2alwjG49g8FgH.0eHw9vlBD5tHvhqsLLUvZPiQJ5RO2tZfy', 1, '1234567890', 1),
(2, 'hung@gmail.com', 'Hoàng Hữu Hùng', '$2y$12$3hVYy85ITst2kwdwEv4FF.Yr1eLcV3cysI5UWjBVobhPS8jM5hEMi', 0, '0799466639', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
