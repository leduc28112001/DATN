-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 23, 2024 lúc 12:58 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau2024`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`user_id`, `user_name`, `user_password`, `user_email`, `user_address`, `user_phone`, `user_avatar`, `role`) VALUES
(1, 'hungdzzzz', '123', 'tichuot@gmail.com', '1 trinh van bo', '1234567890', '', 0),
(3, 'tran hung', '123', 'hungdt@gmail.com', NULL, NULL, NULL, 0),
(4, 'hehe', '1', 'hungtdps25636@fpt.edu.vn', '16 tran vu', '0582545800', NULL, 0),
(5, 'Quản trị viên', '1', 'admin@gmail.com', '16 tran vu', '0708280443', 'egg.png', 1),
(6, 'hoang', '123', 'hoang@gmial.com', NULL, NULL, NULL, 0),
(7, 'Trần Quang Nghĩa', 'vv', 'niboss458@gmail.com', 'Thôn Cành Lá, xã Cành Cây, huyện Gió Mây, tỉnh Đồi Núi', '0999888777', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `bill_user` varchar(50) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_phone` varchar(10) NOT NULL,
  `bill_time` datetime NOT NULL,
  `bill_total` decimal(10,0) NOT NULL DEFAULT 0,
  `bill_paymethod` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. Thanh toán khi nhận hàng\r\n2. Chuyển khoản ngân hàng\r\n3. Ví điện tử MoMo',
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '0. Đơn mới\r\n1. Đang xử lý\r\n2. Đang giao hàng\r\n3. Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`bill_id`, `user_id`, `bill_user`, `bill_email`, `bill_address`, `bill_phone`, `bill_time`, `bill_total`, `bill_paymethod`, `bill_status`) VALUES
(33, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-21 15:30:13', 9000, 1, 0),
(34, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-21 15:33:51', 12200, 1, 0),
(35, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-21 15:30:13', 9000, 1, 0),
(36, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-22 15:33:51', 12200, 1, 0),
(37, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-22 15:30:13', 9000, 1, 0),
(38, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-22 15:33:51', 12200, 1, 0),
(39, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-20 15:30:13', 9000, 1, 0),
(40, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-20 15:33:51', 12200, 1, 0),
(41, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-22 15:30:13', 9000, 1, 0),
(42, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-18 15:33:51', 12200, 1, 0),
(43, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-18 15:30:13', 9000, 1, 0),
(44, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-18 15:33:51', 12200, 1, 0),
(45, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-22 15:30:13', 9000, 1, 0),
(46, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-20 15:33:51', 12200, 1, 0),
(47, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-19 15:30:13', 9000, 1, 0),
(48, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-19 15:33:51', 12200, 1, 0),
(49, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 15:45:59', 12200, 1, 0),
(50, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:02:50', 12200, 1, 0),
(51, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:08:07', 29400, 1, 0),
(52, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:08:44', 29400, 1, 0),
(53, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:09:56', 29400, 1, 0),
(54, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:11:42', 9600, 1, 0),
(55, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:12:00', 3200, 1, 0),
(56, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:16:21', 9600, 1, 0),
(57, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:17:10', 0, 1, 0),
(58, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:18:32', 0, 1, 0),
(59, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:19:56', 0, 1, 0),
(60, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:20:08', 9600, 1, 0),
(61, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:20:30', 9600, 1, 0),
(62, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:20:56', 0, 1, 0),
(63, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:21:16', 48000, 1, 0),
(64, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:22:39', 28800, 1, 0),
(65, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:23:04', 3200, 1, 0),
(66, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:23:25', 9600, 1, 0),
(67, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:24:59', 9600, 1, 0),
(68, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:25:44', 6900, 1, 0),
(69, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:33:44', 9600, 1, 0),
(70, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 16:36:15', 9600, 1, 0),
(71, 5, 'Quản trị viên', 'admin@gmail.com', '16 tran vu', '0708280443', '2024-02-23 18:30:56', 29200, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,0) NOT NULL DEFAULT 0,
  `product_qty` int(11) NOT NULL,
  `cart_subtotal` decimal(10,0) NOT NULL DEFAULT 0,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(144, 'Galaxy Tablet'),
(142, 'Galaxy Watch'),
(127, 'Galaxy Z Flip'),
(140, 'Galaxy Z Fold'),
(141, 'iPhone 15'),
(98, 'Samsung Galaxy A'),
(143, 'Samsung Galaxy M'),
(94, 'Samsung Galaxy S');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_text`, `user_id`, `product_id`, `comment_date`) VALUES
(45, 'đẹp quá', 5, 38, '2024-02-23 18:42:14'),
(46, 'xịn', 5, 39, '2024-02-23 18:42:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(10,0) NOT NULL DEFAULT 0,
  `product_image` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_view` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `product_view`, `category_id`) VALUES
(20, 'Galaxy S24 Ultra 5G', 6900, 'samsung-galaxy-s24-ultra-5g.jpg', 'Galaxy S24 Ultra 5G sử dụng tấm nền Dynamic AMOLED 2X, mở ra một thế giới màu sắc và độ tương phản không giới hạn.', 17, 94),
(21, 'Galaxy S24 Plus 5G', 68000, 'samsung-galaxy-s24-plus-5g.jpg', 'Đây là chiếc điện thoại có sức mạnh xử lý ấn tượng, giúp thực hiện mọi nhiệm vụ mượt mà và nhanh chóng, từ chơi game đến xử lý đa nhiệm.', 0, 94),
(22, 'Galaxy S24 5G', 6700, 'samsung-galaxy-s24-5g.jpg', 'Chi tiết về khả năng chụp ảnh và quay video với độ phân giải cao, ổn định và tính năng chụp ảnh sáng tạo, mang lại trải nghiệm chụp ảnh đỉnh cao.', 2, 94),
(23, 'Galaxy S22 Ultra 5G', 6600, 'samsung-galaxy-s22-ultra-5g.jpg', 'Tính năng về màn hình vô cực với độ phân giải cao và màu sắc sống động, mang đến trải nghiệm xem video và chơi game.', 0, 94),
(24, 'Galaxy A53 5G', 5600, 'samsung-galaxy-a53-5g-.jpg', 'Các tính năng bảo mật như nhận diện khuôn mặt, quét vân tay, hoặc công nghệ nhận diện mống mắt, đảm bảo thông tin cá nhân của người dùng được bảo vệ.', 0, 98),
(25, 'Galaxy A73 5G', 5700, 'samsung-galaxy-a73-5g.jpg', 'Hỗ trợ âm thanh vòm và có khả năng cải thiện trải nghiệm nghe nhạc và xem phim.', 21, 98),
(26, 'Galaxy A15 5G', 5200, 'samsung-galaxy-a15-5g.jpg', 'Tính năng kết nối 5G và Wi-Fi nhanh, giúp trải nghiệm internet mượt mà và tốc độ tải xuống nhanh chóng.', 10, 98),
(27, 'Galaxy A25', 5300, 'samsung-galaxy-a25.jpg', 'Sự kết hợp giữa thiết kế đẹp và vật liệu chất lượng cao giúp điện thoại Samsung trở nên bền bỉ, đồng thời giảm thiểu rủi ro hỏng hóc do sử dụng hàng ngày.', 0, 98),
(28, 'Galaxy Z Flip5 5G', 4850, 'samsung-galaxy-z-flip5-5g.jpg', 'Samsung không chỉ tập trung vào chức năng mà còn mang đến thiết kế mảnh mai, tinh tế, làm nổi bật phong cách cá nhân của người sử dụng.', 0, 127),
(29, 'Galaxy Z Fold3 5G', 3200, 'samsung-galaxy-z-fold3-5g.jpg', 'Với một hệ thống hỗ trợ khách hàng toàn cầu, Samsung cam kết đem đến trải nghiệm dịch vụ tận tâm và đáng tin cậy cho người dùng trên toàn thế giới.', 29, 140),
(30, 'Galaxy M33', 2200, 'samsung-galaxy-m33.jpg', 'Thiết kế chống nước và chống bụi giúp Galaxy Watch trở thành người bạn đồng hành lý tưởng cho mọi hoạt động ngoại ô và môi trường khắc nghiệt.', 0, 143),
(31, 'Galaxy M23', 1200, 'samsung-galaxy-m23.jpg', 'Galaxy M23 luôn đặt mình ở vị trí tiên phong với việc đưa ra những sản phẩm đột phá và công nghệ tiên tiến mới, không ngừng sáng tạo để đáp ứng nhu cầu ngày càng cao của người dùng.', 0, 143),
(32, 'Galaxy Watch 6', 3300, 'samsung-galaxy-watch6.jpg', 'Với màn hình Super AMOLED, Galaxy Watch mang đến trải nghiệm hiển thị vô song với độ tương phản cao, màu sắc sống động và khả năng đọc dễ dàng dưới ánh sáng mặt trời.', 0, 142),
(33, 'Galaxy Watch 5', 3000, 'samsung-galaxy-watch5.jpg', 'Được trang bị các cảm biến thông minh, Galaxy Watch không chỉ đo lường hoạt động thể chất mà còn cung cấp các tính năng như theo dõi giấc ngủ, đo nhịp tim và hướng dẫn tập luyện.', 0, 142),
(35, 'Galaxy Watch 4 Classic', 2900, 'samsung-galaxy-watch4-classic.jpg', 'Nếu bạn sở hữu các thiết bị Galaxy khác, Galaxy Watch sẽ liên kết và hoạt động mượt mà với hệ sinh thái của Samsung.', 0, 142),
(36, 'Galaxy Tab s8+', 7000, 'samsung-galaxy-tab-s8-plus.jpg', 'Thiết kế của Galaxy Tablets không chỉ mỏng nhẹ mà còn sang trọng, tạo điểm nhấn cho sự đẳng cấp và thẩm mỹ.', 0, 144),
(37, 'Galaxy Tab s8 Ultra', 7900, 'samsung-galaxy-tab-s8-ultra.jpg', 'Tương thích hoàn hảo với các thiết bị khác trong hệ sinh thái Galaxy của Samsung, Galaxy Tablets mang lại trải nghiệm tích hợp và đồng bộ hoá mượt mà.', 0, 144),
(38, 'iPhone 15', 9000, 'apple-iphone-15.jpg', 'iOS, hệ điều hành của Apple, không chỉ mượt mà mà còn tối ưu hóa hiệu suất của từng thiết bị, mang lại trải nghiệm người dùng đồng nhất.', 18, 141),
(39, 'iPhone 15 Pro', 9800, 'apple-iphone-15-pro.jpg', 'Hệ thống camera trên sản phẩm Apple không chỉ đa dạng với nhiều tính năng sáng tạo mà còn đảm bảo chất lượng hình ảnh và video xuất sắc.', 99, 141),
(40, 'iPhone 15 Pro Max', 9999, 'apple-iphone-15-pro-max.jpg', 'Sự ảnh hưởng toàn cầu của Apple không chỉ là về sản phẩm, mà còn là về văn hóa và xu hướng công nghệ, đặt ra nhiều tiêu chuẩn cho ngành công nghiệp.', 1, 141),
(43, 'iPhone 15 Plus', 9600, 'apple-iphone-15-plus-.jpg', 'Các thiết bị của Apple sử dụng chipset A-Series tự phát triển, đảm bảo hiệu năng cao và tương thích tốt với ứng dụng và Game.', 79, 141),
(44, 'Galaxy Watch 5 Pro', 3750, 'samsung-galaxy-watch5pro.jpg', 'Mua đồng hồ Samsung Watch 5 Pro chính hãng - Giá rẻ, thu cũ lên đời trợ giá tốt, giao hàng toàn quốc. Mua ngay Samsung Watch 5 Pro tại đây.', 0, 142);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `Lk_user_id` (`user_id`),
  ADD KEY `Lk_product_id` (`product_id`),
  ADD KEY `Lk_bill_id` (`bill_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Lk_sanpham_danhmuc` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Lk_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`),
  ADD CONSTRAINT `Lk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `Lk_user_id` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Lk_sanpham_danhmuc` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
