-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 28, 2020 lúc 03:32 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eproject_sem1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1,
  `date_of_birth` date DEFAULT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 3,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` int(10) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `fullname`, `email`, `phone`, `password`, `login_type`, `gender`, `date_of_birth`, `level`, `avatar`, `created`, `branch_id`, `status`) VALUES
(11, 'Huỳnh Văn Hữu Ân', 'huynhvahuuan3620@gmail.com', '0787782050', '202cb962ac59075b964b07152d234b70', 'email', 1, '2001-10-03', 1, '1595857353-admin.jpg', 1595045127, 1, 1),
(13, 'Chung Thị Lệ Quyên', 'chungthilequyen@gmail.com', '0987654321', 'e10adc3949ba59abbe56e057f20f883e', 'email', 0, '2001-02-14', 2, NULL, 1595087217, 6, 1),
(18, 'Trần Tấn Tài', 'tai@gmail.com', '0327894566', '202cb962ac59075b964b07152d234b70', 'email', 1, '1997-08-20', 3, '1595499717-61735826_145100506647718_5930619188824506368_n.jpg', 1595499651, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `id` int(10) NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`id`, `address`, `status`) VALUES
(1, 'None', 1),
(3, 'Quận 1, TP. Hồ Chí Minh', 1),
(4, 'Quận 2, TP. Hồ Chí Minh', 1),
(5, 'Quận 3, TP. Hồ Chí Minh', 1),
(6, 'Quận Thủ Đức, TP. Hồ Chí Minh', 1),
(7, 'Quận Bình Thạnh, TP. Hồ Chí Minh', 1),
(8, 'Quận Hóc Môn, TP. Hồ Chí Minh', 1),
(9, '180 Cao Lỗ, phường 4, Quận 8, TP. Hồ Chí Minh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(10) NOT NULL,
  `pay_invoice_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `pay_invoice_id`, `product_id`, `amount`, `price`) VALUES
(9, 57, 4, 4, 59000),
(10, 57, 26, 2, 120000),
(11, 57, 51, 5, 80000),
(12, 58, 49, 1, 146000),
(13, 58, 50, 1, 50000),
(14, 58, 51, 1, 80000),
(15, 59, 3, 1, 72000),
(16, 59, 41, 1, 199000),
(17, 62, 27, 1, 66000),
(18, 66, 45, 1, 750000),
(19, 66, 27, 2, 66000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_invoice`
--

CREATE TABLE `pay_invoice` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `employee_id` int(10) DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` int(10) NOT NULL,
  `purchase_form` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_invoice`
--

INSERT INTO `pay_invoice` (`id`, `customer_id`, `employee_id`, `address`, `created`, `purchase_form`, `status`) VALUES
(57, 17, 0, '1716 Huỳnh Tấn Phát, TP. Hồ Chí Minh', 1595329411, 'online', 0),
(58, 17, 0, '1716 Huỳnh Tấn Phát, TP. Hồ Chí Minh', 1595329481, 'online', 1),
(59, 18, 0, '123 ADV', 1595736845, 'online', 1),
(63, 25, 13, NULL, 1595856223, 'direct', 1),
(64, 20, 13, NULL, 1595856240, 'direct', 1),
(65, 14, 13, NULL, 1595856252, 'direct', 1),
(66, 18, 13, NULL, 1595857422, 'direct', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type_id` int(10) NOT NULL,
  `width` int(10) NOT NULL,
  `height` int(10) NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantitative` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `product_type_id`, `width`, `height`, `avatar`, `material`, `quantitative`, `amount`, `price`, `status`) VALUES
(1, 'Lịch Để Bàn 2020 - Unicorn', 1, 16, 16, '0b3db489fcdeefe85d5928ca797e53be.jpg', 'giấy Bristol 210gsm', 300, 0, 55000, 1),
(2, 'Lịch Lò Xo Đinh Tị 2020', 1, 18, 21, '4cb111c5edde27d7e9f09d487aa37676.jpg', 'Được làm từ giấy Ford 60 gsm.', 400, 0, 78000, 1),
(3, 'Lịch Để Bàn 2020 - Trái Cây', 1, 25, 18, '43315a979de735aa7d15571999bb1829.jpg', 'Giấy', 350, 0, 72000, 1),
(4, 'Tạp chí Wowweekend vol 2\r\n', 2, 20, 30, '338820cd57595d91680403d0c51281d0.jpg', 'Giấy', 600, 0, 59000, 1),
(5, 'Tạp chí TravelMag số 36', 2, 30, 40, 'a4e521853cc3d0392a16b511c5ada797.jpg', 'Giấy', 500, 0, 84000, 1),
(6, 'Tạp Chí Cách Mạng Công Nghệ 4.0', 2, 50, 60, 'c86e418fba7333bfa5d512cad3be10f3.jpg', 'Giấy', 800, 0, 63000, 1),
(7, 'Tạp chí Wowweekend vol 3', 2, 30, 50, '8602d4a43f7b8d580c03f099787e3004.jpg', 'Giấy', 300, 1, 69000, 1),
(13, 'Sổ Tay Nhật Ký Đọc Sách', 3, 8, 13, '1594637239-dsc_0036.u2566.d20170508.t104530.923656.jpg', 'Giấy chất lượng cao', 300, 1, 36000, 1),
(14, 'Sổ Ghi Chép Đẹp', 3, 14, 20, '1594638649-1594638434-0e4b3cfa01dd0861f23b5f5df8de74c6.png', 'Chất liệu da: da PU nhập khẩu cao cấp thân thiện với môi trường, chất liệu giấy: giấy kem dày chống lóa tiêu chuẩn quốc tế', 300, 1, 159000, 1),
(15, 'Lịch Để Bàn 2020 - Hồng Hạc', 1, 16, 16, '1594810364-7c68a017d6a0cec32f2f62eab6727c04.png', 'Giấy Bristol 210gsm', 100, 1, 55000, 1),
(16, 'Lịch Để Bàn 2020 Cute Cartoon', 1, 12, 15, '1594810827-3de0dc5f6a7d64c7e93bd4625a09c9d6.png', 'Giấy', 150, 1, 54000, 1),
(17, 'Lịch bàn phong thủy', 1, 18, 18, '1594811171-4bc8f56472f64c50008b6155eac53cd3.jpg', 'Giấy', 100, 1, 176000, 1),
(18, 'Lịch Để Bàn Đế Xanh 2020', 1, 18, 20, '1594812468-0f960803655c90e5898786cc266be9f1.png', 'Giấy mỹ thuật chất lượng cao', 200, 1, 99000, 1),
(19, 'Lịch Để Bàn 2020 - Chuột', 1, 15, 16, '1594812638-7c873b28a8f348df4ef103497d085422.jpg', 'Giấy', 150, 1, 55000, 1),
(20, 'Lịch Bàn 2020 Angia Art', 1, 15, 15, '1594812796-97c87ae31bd70598f9f212d19daf0490.jpg', 'Giấy chất lượng cao', 200, 1, 66000, 1),
(21, 'Lịch mini 2020', 1, 14, 16, '1594813027-42ff2fccf363293d438e90c8174afd27.jpg', 'Giấy', 300, 1, 40000, 1),
(22, 'Lịch để bàn 2020 Square', 1, 15, 16, '1594814967-4a726794b533c3c2f182698f3b5d4d78.jpg', 'Giấy chất lượng cao', 200, 1, 58000, 1),
(23, 'Lịch Bàn 2020 Square', 1, 15, 16, '1594815108-fa3782efef6f6d29ec2cc43c0789f6bf.jpg', 'Giấy', 100, 1, 55000, 1),
(24, 'Lịch Để Bàn 2020 - Hình Gấu', 1, 15, 16, '1594815254-52c32ec36c907000c2eb69fe5098dad9.jpg', 'Giấy', 150, 1, 55000, 1),
(25, 'Lịch Để Bàn 2020 Nhã Nam', 1, 21, 16, '1594815440-a6028d37cc5d79f0ee5bf46fbaa1911c.jpg', 'Giấy cứng', 100, 1, 55000, 1),
(26, 'Lịch Bàn Artbook 2020', 1, 20, 26, '1594815561-593ca50ace845cae07f926a34c10cae0.jpg', 'Giấy ivory', 200, 1, 120000, 1),
(27, 'Lịch Bàn - The Celestial Horoscopes', 1, 16, 20, '1594815780-d8a9b4dadfb65b176c1318b2218829f3.jpg', 'Giấy chất lượng cao', 200, 1, 66000, 1),
(28, 'Tạp Chí Pi - Tập 4, Số 5', 2, 25, 40, '1594816014-1ccc757bb1ad30ecf0eba00e2512ddfc.jpg', 'Giấy', 200, 1, 30000, 1),
(29, 'Tạp Chí Pi - Tập 4, Số 4', 2, 25, 40, '1594816151-305b2a53fc8b66800eb91a0048a324bb.jpg', 'Giấy', 200, 1, 30000, 1),
(30, 'Tạp Chí Pi - Tập 4, Số 3', 2, 25, 40, '1594816295-8dc229b63bb18ee5b3ff580e7d46e0f7.jpg', 'Giấy', 250, 1, 30000, 1),
(31, 'Tạp Chí Pi - Tập 4, Số 1-2', 2, 25, 40, '1594816542-57a3bf5665cab3b5f22b9d80fb64c04d.jpg', 'Giấy', 250, 1, 30000, 1),
(32, 'Tạp Chí Pi - Tập 3, Số 11', 2, 25, 40, '1594816708-a283eab2ffec9984a5d126576b8a1d48.jpg', 'Giấy', 250, 1, 30000, 1),
(33, 'Tạp Chí Pi - Tập 3, Số 10', 2, 25, 40, '1594816937-80b583c0bac623244413aee2c4678e99.jpg', 'Giấy', 250, 1, 30000, 1),
(34, 'Tạp chí Khoa Học Làn Da Skinmag', 2, 20, 30, '1594817100-c2cce4059740733a6d35ce4b0e8bc473.png', 'Giấy', 200, 1, 120000, 1),
(35, 'Pi Tạp Chí Toán Học', 2, 20, 30, '1594817175-img301.u3059.d20170716.t122719.913090.jpg', 'Giấy', 200, 1, 25000, 1),
(36, 'Tạp Chí Thế Giới Tuổi Thơ', 2, 20, 30, '1594817250-0b49f5cfefab3c708754848e8904b3a6.jpg', 'Giấy', 250, 1, 22000, 1),
(37, 'Tạp Chí Pi Tập 1 - Số 11', 2, 20, 30, '1594817437-15c3bbce1d0a26d910e58f5f09c76053.jpg', 'Giấy', 250, 1, 25000, 1),
(38, 'Tạp Chí Đồng Hành Số 30', 2, 25, 30, '1594817535-6080f42f0d01dfc3f2b25f1d0a67d90e.jpg', 'Giấy', 300, 1, 33000, 1),
(39, 'Tạp Chí Ô Tô - Số 112', 2, 26, 33, '1594817616-a02f8bba14f85fdfeceb812e00466831.jpg', 'Giấy chất lượng cao', 255, 1, 23000, 1),
(40, 'Tạp Chí Ô Tô - Số 113', 2, 26, 33, '1594817679-6f9be628d6574ba445923f6beee42037.jpg', 'Giấy chất lượng cao', 250, 1, 23000, 1),
(41, 'Tạp chí Toán học và Tuổi trẻ 2015', 2, 20, 30, '1594817790-a68306d26d3ee0a1fdd458f2417b3ed0.jpg', 'Giấy', 250, 1, 199000, 1),
(42, 'Sổ Tay  A Gift from Heaven', 3, 20, 30, '1594818030-fbee41a967cf66cac6d5748daef1e4f1.jpg', 'Giấy chất lượng cao', 200, 1, 30000, 1),
(43, 'Sổ tay planner', 3, 20, 30, '1594818179-323334273de5b5b7e572542419fa0cc4.jpg', 'Giấy chất lượng cao', 300, 1, 45000, 1),
(44, 'Sổ Tay TiKi Inspiration - Unicorn', 3, 25, 30, '1594818377-2ff5870b4897362d52c65426659b03a4.jpg', 'Giấy', 150, 1, 21000, 1),
(45, 'E-smart Notebook', 3, 20, 30, '1594818607-0fbbf3f54f192d334c507bb2ded04059.jpg', 'Giấy chất lượng cao', 200, 1, 750000, 1),
(46, 'Power Thinking Notebook', 3, 20, 30, '1594818882-dc145b95d9493dddba95ac68189555e0.jpg', 'Giấy', 200, 1, 115000, 1),
(47, 'Sổ Notebook JT9025-1', 3, 20, 30, '1594818958-12433c5325c37263fbc56cab3c7980bb.jpg', 'Giấy', 200, 1, 37000, 1),
(48, 'Notebook - Spring Is Coming', 3, 30, 40, '1594819056-90562b205e6cc4bea3fad2cd67b54299.jpg', 'Giấy', 200, 1, 60000, 1),
(49, 'Sổ Memo Notebook', 3, 30, 20, '1594819194-d833f94e3c26e3126fcab43fa0ed82bb.jpg', 'Giấy', 300, 1, 146000, 1),
(50, 'Notebook - Winter Around Here', 3, 25, 30, '1594819310-fb99c5f4e03697d1c9502e73f77a504f.jpg', 'Giấy', 350, 1, 50000, 1),
(51, 'Notebook - Welcome Autumn', 3, 30, 40, '1594819441-055363c4333377fab1d1e1a7f533c98a.jpg', 'Giấy chất lượng cao', 300, 1, 80000, 1),
(52, 'Sổ CW2510', 3, 20, 25, '1594819558-710898ca8f1dcd1bcd9ed6152184effe.jpg', 'Giấy chất lượng cao', 300, 1, 40000, 1),
(53, 'Notebook Softcover A6 White', 3, 30, 30, '1594819629-38c209e9b675a4ed20d141c5cfd6df96.jpg', 'Giấy', 300, 1, 512000, 1),
(54, 'Sổ tay', 3, 20, 20, '1594819720-83b30b59b59159f17f4a103761c426bd.jpg', 'Giấy chất lượng cao', 300, 1, 165000, 1),
(55, 'Notebook Bìa Cứng', 3, 30, 30, '1594819846-fa78696236239016d799820210124773.jpg', 'Giấy chất lượng cao', 300, 1, 65000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `id_product`, `image`) VALUES
(1, 1, '0b3db489fcdeefe85d5928ca797e53be.jpg'),
(2, 1, '5efc67367a0474b989662bee82628c4e.jpg'),
(3, 1, '421e3e6e8ba6ec7f34ab0fde8cc248c5.jpg'),
(4, 1, '777ce113c7d12911de9e3267d34c9d67.jpg'),
(5, 2, '91ad9638744d0771d5e1bbf5c302f4d8.jpg'),
(6, 2, '91a1f7156c91f4c90bb0d203145dd245.jpg'),
(8, 2, '4cb111c5edde27d7e9f09d487aa37676.jpg'),
(9, 2, 'bef048029dbfc6bb73d073069ede6e31.jpg'),
(10, 3, '43315a979de735aa7d15571999bb1829.jpg'),
(11, 3, 'ac88f8fd391d811a97ab6a43dc015d1c.jpg'),
(12, 3, 'bea224808c95bf1a28d811bf75ba240f.jpg'),
(13, 3, '4d1db9b0ec0a97b50503e6cb6b6a9085.jpg'),
(14, 4, '338820cd57595d91680403d0c51281d0.jpg'),
(15, 4, 'e3327a0d138e87ff5d12fc9dff28a1c9.jpg'),
(16, 4, '2ef9a24273b687f11a44fb95515146fd.jpg'),
(17, 4, '87f56e117b9318dafa8c99b951a4c2bf.jpg'),
(18, 5, 'a4e521853cc3d0392a16b511c5ada797.jpg'),
(19, 5, 'a6c8ce5d81cc01d8a2e20c7162b6df18.jpg'),
(20, 5, '00244f137a5123ca3b21f671149aa151.jpg'),
(21, 5, '42e07105e945ea9c1ce4ea7b8c54a2cb.jpg'),
(25, 6, 'c86e418fba7333bfa5d512cad3be10f3.jpg'),
(26, 6, '6f3106813c8347190835a1fb3a9cad63.jpg'),
(34, 7, '8602d4a43f7b8d580c03f099787e3004.jpg'),
(35, 7, '01434bcf63adac3bf9edaa855e0e56c3.jpg'),
(36, 7, '0dcb7042bb75c8fa87942018fe175d96.jpg'),
(38, 7, '1594633064-4777522aa5fd6370165e34aee0b184c3.jpg'),
(39, 13, '1594637222-dsc_0038.u2566.d20170508.t104531.2624.jpg'),
(40, 13, '1594637230-dsc_0037.u2566.d20170508.t104530.968091.jpg'),
(41, 13, '1594637239-dsc_0036.u2566.d20170508.t104530.923656.jpg'),
(42, 14, '1594638649-1594638434-0e4b3cfa01dd0861f23b5f5df8de74c6.png'),
(43, 14, '1594638661-764b390c1dec3a4186f3ce12ba4cfb7f.png'),
(44, 14, '1594638671-40b1f4e6ba593a284c389aa298e23e4d.png'),
(45, 14, '1594638680-2a814a4696888ec78c83f93d615595b2.png'),
(46, 15, '1594810418-244a1d20829b848bc02b5c4a82e34233.png'),
(47, 15, '1594810483-f0f4723342d0c2de3b29fe3e7e9cd2c7.jpg'),
(48, 15, '1594810537-1144e7a541a0f1da7bcce79a182d8bb4.png'),
(49, 15, '1594810635-1594810364-7c68a017d6a0cec32f2f62eab6727c04.png'),
(50, 16, '1594810913-1594810827-3de0dc5f6a7d64c7e93bd4625a09c9d6.png'),
(51, 16, '1594810925-90f15c39e53bdfb74cc51a5953666f71.jpg'),
(52, 16, '1594810934-8873a2963259a720181a70f4af6fd754.png'),
(53, 16, '1594810940-1b766d9492883481fb9d8e91a8e7f7e9.png'),
(54, 17, '1594811183-4bc8f56472f64c50008b6155eac53cd3.jpg'),
(55, 17, '1594811190-f827b912f31a40d38e3c5aceed691255.jpg'),
(56, 17, '1594811202-27c1a3ff15911b70c528c884e42acd20.jpg'),
(57, 17, '1594811209-28edcd882513d50846e73dee47561031.jpg'),
(58, 18, '1594812477-0f960803655c90e5898786cc266be9f1.png'),
(59, 18, '1594812490-1486d635d03a0350dbe19bfde58b796a.png'),
(60, 18, '1594812496-6eb7699d4d5e52f60a08d0975603fa4a.png'),
(61, 18, '1594812502-95e5bf3f0f780ebbcb5892e180b1188d.png'),
(62, 19, '1594812651-7c873b28a8f348df4ef103497d085422.jpg'),
(63, 19, '1594812658-c7f81086cf12f545984bf977a02d683e.jpg'),
(64, 19, '1594812664-8502b78cc406bd9125d29d8df298a615.jpg'),
(65, 19, '1594812671-9347873c6ff11e4eac194dd0bfb522c0.jpg'),
(66, 20, '1594812804-97c87ae31bd70598f9f212d19daf0490.jpg'),
(67, 20, '1594812810-d1c435b79e5407e42beab9427bc489da.jpg'),
(68, 20, '1594812815-949122757b985f7caa37ddf802de3333.jpg'),
(69, 20, '1594812823-62c32a64f867a40da11b1978c3e99d9b.jpg'),
(70, 21, '1594813038-42ff2fccf363293d438e90c8174afd27.jpg'),
(71, 21, '1594813045-1fc9db9725d60f0c6a01643dbac84eeb.jpg'),
(72, 21, '1594813051-132cfab0a94e077dd1ffdbbb12990864.jpg'),
(73, 21, '1594813058-942fe7bb1dc442c37206da6ee5b7f241.jpg'),
(74, 22, '1594814988-4a726794b533c3c2f182698f3b5d4d78.jpg'),
(75, 22, '1594814994-ef00da76113511f051b0f5683d170d99.jpg'),
(76, 22, '1594815000-37c85dce59c8d11e87af9cda8c2e8628.jpg'),
(77, 22, '1594815005-ee6cb7425eae50f980a1a39f354095f4.jpg'),
(78, 23, '1594815115-fa3782efef6f6d29ec2cc43c0789f6bf.jpg'),
(79, 23, '1594815121-74627482dc40c9007affd0081638fa75.jpg'),
(80, 24, '1594815264-52c32ec36c907000c2eb69fe5098dad9.jpg'),
(81, 24, '1594815270-81a8aadd10b19add982713609d9a4442.jpg'),
(82, 24, '1594815275-28b45d83df276c7350b15c6d0434cacc.jpg'),
(83, 24, '1594815280-095865c56f58b32df3b4268863789a98.jpg'),
(84, 25, '1594815448-a6028d37cc5d79f0ee5bf46fbaa1911c.jpg'),
(85, 25, '1594815454-4286dcccdc7cc8e5cf1a1a0c0e825fff.jpg'),
(86, 25, '1594815459-4a2198fa6de7bf93e320240a02bffcf5.jpg'),
(87, 25, '1594815464-6a3c14ba214c600d1f9939bd9a2fda9f.jpg'),
(88, 26, '1594815568-593ca50ace845cae07f926a34c10cae0.jpg'),
(89, 27, '1594815791-d8a9b4dadfb65b176c1318b2218829f3.jpg'),
(90, 27, '1594815808-713f7d124cc5c558d3cb2fb1253b40c2.jpg'),
(91, 27, '1594815815-43a1aef261dcb03a2c812875cbc57ccd.jpg'),
(92, 27, '1594815820-db3e12f1a7e9af7f15ac39c91e91a4c4.jpg'),
(93, 28, '1594816023-1ccc757bb1ad30ecf0eba00e2512ddfc.jpg'),
(94, 28, '1594816029-a2b2b3d7c90bd243bb2272db15e2005a.jpg'),
(95, 28, '1594816035-0f85367d10e706c49d7de9c5ca9fd73e.jpg'),
(96, 28, '1594816040-9ce2596679699b299c479f5a06269cba.jpg'),
(97, 29, '1594816167-305b2a53fc8b66800eb91a0048a324bb.jpg'),
(98, 29, '1594816174-13bda66d3cdc5ceb19ed11713dbda7a6.jpg'),
(99, 29, '1594816179-06e57443ed337c9b193429d2fa3d063f.jpg'),
(100, 29, '1594816184-b7fecb089dcb3bc17bedb9d7f9fa6130.jpg'),
(101, 30, '1594816302-8dc229b63bb18ee5b3ff580e7d46e0f7.jpg'),
(102, 30, '1594816310-4521f6024aa2ec2b2019414f8bd2e981.jpg'),
(103, 30, '1594816315-f77e36b31fa16a62d14d95bedc483b2e.jpg'),
(104, 30, '1594816321-1036d531c54f1585f14d363ee9af929d.jpg'),
(105, 31, '1594816550-57a3bf5665cab3b5f22b9d80fb64c04d.jpg'),
(106, 31, '1594816597-923bc9cf396e9573974b28c7522558ad.jpg'),
(107, 31, '1594816605-d1c703e5aba1cec84f087ffc9ff687a7.jpg'),
(108, 31, '1594816610-c7a8cf3d53bd380314cdcae5fa5f598a.jpg'),
(109, 32, '1594816719-a283eab2ffec9984a5d126576b8a1d48.jpg'),
(110, 32, '1594816725-9d99e8b9888a5ac87fe4dd6c0bbbd456.jpg'),
(111, 32, '1594816730-162bc284f130d344d250cdc13c6fd40c.jpg'),
(112, 32, '1594816736-318db361842dd1feed4b02fa51753dc1.jpg'),
(113, 33, '1594816957-80b583c0bac623244413aee2c4678e99.jpg'),
(114, 33, '1594816962-41720a31f760368d0602047359dee4c5.jpg'),
(115, 33, '1594816967-747f59f3862356a5cc13f818834205a1.jpg'),
(116, 33, '1594816972-5d34626722f3b29919a8c0bec4f45e2e.jpg'),
(117, 34, '1594817108-c2cce4059740733a6d35ce4b0e8bc473.png'),
(118, 35, '1594817185-img301.u3059.d20170716.t122719.913090.jpg'),
(119, 36, '1594817282-0b49f5cfefab3c708754848e8904b3a6.jpg'),
(120, 37, '1594817443-15c3bbce1d0a26d910e58f5f09c76053.jpg'),
(121, 37, '1594817450-1021b95fce2ee68cf99a36279be08b2e.jpg'),
(122, 38, '1594817543-6080f42f0d01dfc3f2b25f1d0a67d90e.jpg'),
(123, 38, '1594817549-edf0eb4b772eefa430454c89061ebc6f.jpg'),
(124, 38, '1594817554-1b3b7e5c3ae5890a63cd4145e50ca816.jpg'),
(125, 39, '1594817624-a02f8bba14f85fdfeceb812e00466831.jpg'),
(126, 40, '1594817689-6f9be628d6574ba445923f6beee42037.jpg'),
(127, 41, '1594817797-a68306d26d3ee0a1fdd458f2417b3ed0.jpg'),
(128, 41, '1594817802-bc0fad86a7f78e94844327a18c8c2958.jpg'),
(129, 41, '1594817807-0ecf83e280c0c948500b99b761090792.jpg'),
(130, 41, '1594817813-729874a82a698d1d824bb84cf605cee6.jpg'),
(131, 42, '1594818036-fbee41a967cf66cac6d5748daef1e4f1.jpg'),
(132, 42, '1594818042-b3563b77269e4cac8467e7595e1a22db.jpg'),
(133, 42, '1594818048-4b48b87e236565e3a27f884f1c74947f.jpg'),
(134, 42, '1594818053-0d8f3a213da090215cfbc702b4d9d2af.jpg'),
(135, 43, '1594818185-323334273de5b5b7e572542419fa0cc4.jpg'),
(136, 43, '1594818192-1f0e31f2f275a06941b2e39f36ca58a8.jpg'),
(137, 43, '1594818197-d05dc9dc55f1588d07cd6ba1f45e1239.jpg'),
(138, 43, '1594818202-7bb2645f598a1cf34096ce834efac780.jpeg'),
(139, 44, '1594818383-2ff5870b4897362d52c65426659b03a4.jpg'),
(140, 44, '1594818389-45107f507c2c2f8ad4fac69c9c2a848b.jpg'),
(141, 44, '1594818393-c78daac473d781951db62111395218f2.jpg'),
(142, 44, '1594818398-cf37dd60da97b95c2981463c1038d759.jpg'),
(143, 45, '1594818614-0fbbf3f54f192d334c507bb2ded04059.jpg'),
(144, 45, '1594818620-8cdb2d8493ae211511c30718b6cd6fd6.jpg'),
(145, 45, '1594818624-a22fe9994dcccb51f1c7545e8aa30bd0.jpg'),
(146, 45, '1594818629-416b505733d13115d22117235b8d265a.jpg'),
(147, 46, '1594818892-dc145b95d9493dddba95ac68189555e0.jpg'),
(148, 46, '1594818898-1a0199bcab64afd870a900778a8954ef.jpg'),
(149, 46, '1594818902-00aab586d0f828692d3c22f2de61d2ee.jpg'),
(150, 47, '1594818965-12433c5325c37263fbc56cab3c7980bb.jpg'),
(151, 48, '1594819067-90562b205e6cc4bea3fad2cd67b54299.jpg'),
(152, 48, '1594819074-ae548b48c0b21fefe3e6ebf2d4ee7a36.jpg'),
(153, 48, '1594819080-6a4af7ebda7a4d439a2b6d7ad23e762a.jpg'),
(154, 48, '1594819084-7db1e032e2169f566b3e9d76abe3da77.jpg'),
(155, 49, '1594819200-d833f94e3c26e3126fcab43fa0ed82bb.jpg'),
(156, 49, '1594819206-323d344f4b6a83a8f8d01fc57aaf544b.jpg'),
(157, 49, '1594819212-bf905ebcb798b2e55fe82ff72ff89915.jpg'),
(158, 49, '1594819217-c57fe6617e53782d5b959b205bada329.jpg'),
(159, 50, '1594819319-fb99c5f4e03697d1c9502e73f77a504f.jpg'),
(160, 50, '1594819325-3179e12456a2f119fd4a39cb95100215.jpg'),
(161, 50, '1594819330-25dc56c1e22ea2a544d278fad81e5d75.jpg'),
(162, 50, '1594819335-dbed76f1211c4122c342751eb16aa752.jpg'),
(163, 51, '1594819449-055363c4333377fab1d1e1a7f533c98a.jpg'),
(164, 51, '1594819453-a97b8337b0a0751c8eeece9a3b2513fa.jpg'),
(165, 51, '1594819458-c28fbcfa94f37e356828bcfe805e4fff.jpg'),
(166, 51, '1594819463-a810bb11db5a09a828bd4913bfd4e737.jpg'),
(167, 52, '1594819566-710898ca8f1dcd1bcd9ed6152184effe.jpg'),
(168, 53, '1594819638-38c209e9b675a4ed20d141c5cfd6df96.jpg'),
(169, 54, '1594819727-83b30b59b59159f17f4a103761c426bd.jpg'),
(170, 54, '1594819734-ef1bf0dec51c3527514e2332c59d7d80.jpg'),
(171, 54, '1594819739-b3ee4fd07a98bfb13b7a1e76795357c5.jpg'),
(172, 54, '1594819743-43b5e1fac9ecf06a2384bdc4f2feab24.jpg'),
(173, 55, '1594819854-fa78696236239016d799820210124773.jpg'),
(174, 55, '1594819859-ed09828cbc561337454f4103a1bd2618.jpg'),
(175, 55, '1594819863-2315d7075da59554654f0463809399ec.jpg'),
(176, 55, '1594819868-af5791c28c260074b1bf4468bf4a8c2f.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process` int(5) NOT NULL,
  `packing` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_of_measure` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `function` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_manual` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `process`, `packing`, `unit_of_measure`, `function`, `user_manual`) VALUES
(1, 'Lịch', 14, '5pcs', 'Gram', '<p>Lịch l&agrave; một hệ thống để đặt t&ecirc;n cho c&aacute;c chu kỳ thời gian,th&ocirc;ng thường l&agrave; theo c&aacute;c ng&agrave;y. Lịch cũng l&agrave; một vật liệu (giấy,..) để minh họa cho hệ thống chu kỳ thời gian v&agrave; đ&acirc;y cũng l&agrave; c&aacute;ch hiểu th&ocirc;ng dụng nhất của từ lịch, v&agrave; được sử dụng để biểu thị danh s&aacute;ch một tập hợp cụ thể n&agrave;o đ&oacute; của c&aacute;c sự kiện đ&atilde; được lập kế hoạch (v&iacute; dụ như lịch học, lịch x&eacute;t xử...).</p>\r\n', 'Sử dụng lịch một cách hiệu quả có thể giúp cho người dùng có thể sử dụng thời gian một cách hiệu quả hơn.'),
(2, 'Tạp chí', 16, '5pcs', 'Gram', 'Giống như báo viết, tạp chí ra đời mang chức năng cơ bản là thu thập, xử lý và truyền tải, đưa thông tin về tất cả các lĩnh vực của đời sống kinh tế, văn hóa, xã hội...  đến mọi người nhằm đáp ứng yêu cầu thông tin của đông đảo công chúng.', 'Đọc tạp chí có thể giúp cho người sử dụng biết thêm nhiều thứ xung quanh mình hằng ngày.'),
(3, 'Nhật kí', 100, '5pcs', 'Gram', 'Nhật ký cá nhân thông thường được coi như một thể tài ngoài văn học hay cận văn học, là loại văn ghi chép của cá nhân trong đời sống hàng ngày. Do vậy, nhật ký thường chân thành và công nhiên trong phát ngôn; bao giờ cũng chỉ ghi lại những gì đã diễn ra, đã nếm trải, đã thử nghiệm, và ít khi hồi cố. Nhật ký được viết ra chỉ cho bản thân người ghi chứ không tính đến việc được công chúng tiếp nhận, và đây là điểm phân biệt nó với nhật ký văn học.  Nhật ký cá nhân thường nói về các sự kiện của đời tư với tính chất xác thực đặc biệt. Bên cạnh các sự kiện đời tư, nhật ký cũng nói lên những ý kiến nhận xét về cuộc đời, thường được rút ra từ các suy nghĩ về cuộc sống của bản thân người ghi.', 'Dùng để ghi lại những gì trải qua mỗi ngày hay lịch trình làm việc của người dùng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pay_invoice_id` (`pay_invoice_id`,`product_id`);

--
-- Chỉ mục cho bảng `pay_invoice`
--
ALTER TABLE `pay_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `pay_invoice`
--
ALTER TABLE `pay_invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
