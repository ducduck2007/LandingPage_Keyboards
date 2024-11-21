-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2024 lúc 02:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qly_lpagekeyboards`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `best_selling`
--

CREATE TABLE `best_selling` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name_product` text NOT NULL,
  `product_price` text NOT NULL,
  `mo_ta` text NOT NULL,
  `sales` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `best_selling`
--

INSERT INTO `best_selling` (`id`, `image`, `name_product`, `product_price`, `mo_ta`, `sales`) VALUES
(1, 'uploads/672db5b0e5e0c-demo.png', 'DarkFlash GD100', '850.000', 'Trên tay bàn phím cơ KO 5075B Plus Transparent ASA Black Piano Pro với thiết kế TKL layout 75% có núm người dùng có thể thoải mái thao tác với thiết bị', 'Lượt bán: 2.6k'),
(2, 'uploads/672db5dcdfb17-demo.png', 'Rappo E9050G', '1.150.000', 'Trên tay bàn phím cơ KO 5075B Plus Transparent ASA Black Piano Pro với thiết kế TKL layout 75% có núm người dùng có thể thoải mái thao tác với thiết bị', 'Lượt bán: 2.8k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(5) NOT NULL,
  `name_product` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `name` text NOT NULL COMMENT 'tên đăng nhập',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name_product`, `image`, `price`, `name`, `created_at`, `updated_at`) VALUES
(34, 'Bàn phím Corsair K95', 'uploads/673aeeb3f0a0c-1.png', '3.150.000₫', 'stupid', '2024-11-20 16:16:26', '2024-11-20 16:16:26'),
(35, 'Bàn phím Corsair K95', 'uploads/673aeeb3f0a0c-1.png', '3.150.000₫', 'stupid', '2024-11-20 16:16:43', '2024-11-20 16:16:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `hinh_thuc` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `hinh_thuc`, `link`) VALUES
(1, 'zalo', ''),
(2, 'mail', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deal_sale`
--

CREATE TABLE `deal_sale` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name_product` text NOT NULL,
  `content` text NOT NULL,
  `parameter` text NOT NULL,
  `price` text NOT NULL,
  `promotion` text NOT NULL COMMENT 'khuyến mãi',
  `mo_ta` text NOT NULL COMMENT 'mô tả bảo hành',
  `endow` text NOT NULL COMMENT 'ưu đãi đặc biệt',
  `evaluate` float NOT NULL COMMENT 'đánh giá',
  `vi_tri` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `deal_sale`
--

INSERT INTO `deal_sale` (`id`, `image`, `name_product`, `content`, `parameter`, `price`, `promotion`, `mo_ta`, `endow`, `evaluate`, `vi_tri`) VALUES
(2, 'uploads/673aeeb3f0a0c-1.png', 'Bàn phím Corsair K95', 'Nhà sản xuất : Corsair', '<ul>\r\n	<li>Switch : &nbsp;MX Speed</li>\r\n	<li>Led :&nbsp;<strong>RGB 16.8 triệu m&agrave;u</strong></li>\r\n	<li>Kết nối: C&oacute; d&acirc;y</li>\r\n</ul>', '3.150.000₫', '<ul>\r\n	<li>Khuyến m&atilde;i 1 cặp s&aacute;ch của nh&agrave;&nbsp;<strong>Corsair&nbsp;</strong></li>\r\n	<li>Giảm 15%</li>\r\n</ul>', '<p>- Bảo h&agrave;nh đến khi xuống lỗ</p>', '<p>- &Ocirc;m Phương Anh 1 c&aacute;i nh&eacute;</p>', 4.5, 1),
(3, 'uploads/673aef7e2f020-2.png', 'BÀN PHÍM CƠ BLACK SHARK BK-K1 ĐEN', 'Thương hiệu: Black Shark', '<ul>\r\n	<li>Layout : 87 ph&iacute;m ( TKL )</li>\r\n	<li>LED RGB + LED Viền RGB c&oacute; thể t&ugrave;y chỉnh được</li>\r\n	<li>Hơn 10 chế độ LED cực đẹp</li>\r\n	<li>Blue Switch Outemu độ bền 50 triệu lượt nhấn</li>\r\n	<li>Plate Kim loại được CNC viền cực kỳ chất</li>\r\n	<li>D&acirc;y c&aacute;p nhựa chống rối d&agrave;i 1,8m</li>\r\n	<li>D&acirc;y c&aacute;p nhựa chống rối d&agrave;i 1,8m</li>\r\n</ul>', '399.000₫', '<ul>\r\n	<li>Tặng 1 chuột gaming Rappo</li>\r\n</ul>', '<p>Bảo h&agrave;nh : 12 Th&aacute;ng ch&iacute;nh h&atilde;ng</p>', '<p>D&agrave;nh cho học sinh, sinh vi&ecirc;n -&gt; Giảm gi&aacute; 5%</p>', 4.5, 1),
(4, 'uploads/673af0331fd0b-3.png', 'Bàn phím cơ Fuhlen G87L', 'Nhà sản xuất :Fuhlen', '<ul>\r\n	<li><strong>LED</strong>: Rainbow</li>\r\n	<li><strong>Switch:</strong>&nbsp;BLUE</li>\r\n	<li><strong>Chất liệu:</strong>&nbsp;Nhựa ABS doubleshot</li>\r\n</ul>', '440.000₫', '<ul>\r\n	<li>Tặng k&egrave;m l&oacute;t chuột</li>\r\n</ul>', '<p><strong>Bảo h&agrave;nh</strong>&nbsp;: 24 th&aacute;ng</p>', '<ul>\r\n	<li>Giảm 25% d&agrave;nh cho học sinh, sinh vi&ecirc;n</li>\r\n</ul>', 5, 1),
(5, 'uploads/673af1458bb19-4.png', 'Bàn Phím Cơ Gaming Corsair K70 CORE-BLK-CRSR MX-RGB', 'Hãng sản xuất: Corsair', '<ul>\r\n	<li><strong>Loại b&agrave;n ph&iacute;m:</strong> Full size</li>\r\n	<li><strong>Số ph&iacute;m:</strong> 104 ph&iacute;m</li>\r\n	<li><strong>Keycap:</strong>&nbsp;PBT Doubleshot</li>\r\n	<li><strong>N&uacute;t nhấn:</strong>&nbsp;MLX Red Switches</li>\r\n	<li><strong>Tiện &iacute;ch:</strong>&nbsp;N-key with 100% Anti-Ghosting<br />\r\n	Trang bị foam ti&ecirc;u &acirc;m<br />\r\n	Tương th&iacute;ch với Windows 10, macOS 10.15</li>\r\n	<li><strong>Kết nối:</strong> D&acirc;y USB</li>\r\n	<li><strong>Led:</strong> RGB</li>\r\n</ul>', '2.190.000đ', '<p>Tiết kiệm th&ecirc;m đến&nbsp;110.000đ&nbsp;cho Smember</p>', '<p>Bảo h&agrave;nh 24 th&aacute;ng ch&iacute;nh h&atilde;ng</p>', '<p>Giảm 500k khi thanh to&aacute;n qua Techcombank</p>', 4.5, 1),
(6, 'uploads/673af2c8e05d8-5.png', 'Bàn phím cơ Keychron K8 RGB', 'Keychron là thương hiệu sản xuất', '<ul>\r\n	<li><strong>Layout ph&iacute;m:&nbsp;</strong><a href=\"https://owlgaming.vn/layout-phim/tenkeyless/\" rel=\"tag\">Tenkeyless</a></li>\r\n	<li><strong>Chất liệu:&nbsp;</strong><a href=\"https://owlgaming.vn/chat-lieu/vo-nhom/\" rel=\"tag\">Vỏ nh&ocirc;m</a>,&nbsp;<a href=\"https://owlgaming.vn/chat-lieu/vo-nhua/\" rel=\"tag\">Vỏ nhựa</a></li>\r\n	<li><strong>Kiểu Switch:&nbsp;</strong><a href=\"https://owlgaming.vn/kieu-switch/gateron-blue/\" rel=\"tag\">Gateron Blue</a>,&nbsp;<a href=\"https://owlgaming.vn/kieu-switch/gateron-brown/\" rel=\"tag\">Gateron Brown</a>,&nbsp;<a href=\"https://owlgaming.vn/kieu-switch/gateron-red/\" rel=\"tag\">Gateron Red</a>,&nbsp;<a href=\"https://owlgaming.vn/kieu-switch/keychron-blue/\" rel=\"tag\">Keychron Blue</a>,&nbsp;<a href=\"https://owlgaming.vn/kieu-switch/keychron-brown/\" rel=\"tag\">Keychron Brown</a>,&nbsp;<a href=\"https://owlgaming.vn/kieu-switch/keychron-red/\" rel=\"tag\">Keychron Red</a></li>\r\n	<li><strong>Hotswap:&nbsp;</strong><a href=\"https://owlgaming.vn/hotswap/co/\" rel=\"tag\">C&oacute;</a></li>\r\n</ul>', '2.290.000₫', '<p>Miễn ph&iacute; giao h&agrave;ng trong nội th&agrave;nh H&agrave; Nội</p>', '<p>- Hỗ trợ đổi mới trong v&ograve;ng 15 ng&agrave;y</p>\r\n\r\n<p>-&nbsp;Bảo h&agrave;nh ch&iacute;nh h&atilde;ng to&agrave;n quốc 12 th&aacute;ng</p>', '<ul>\r\n	<li>Hỗ trợ trả g&oacute;p l&atilde;i suất 0%</li>\r\n	<li>Giảm 199k khi thanh to&aacute;n qua v&iacute; điện tử Momo</li>\r\n</ul>', 5, 1),
(7, 'uploads/672ede99013c2-viu_o2.png', 'heelo', 'helooo anh em', '', '', '', '', '', 0, 2),
(8, 'uploads/673084ce5b0e7-464152521_1083156946724240_1739071782227570980_n.jpg', 'test keycaps', 'test keycaps', '', '', '', '', '', 0, 3),
(9, 'uploads/67315c7c9c118-logo.jpg', 'test 1 phimCO', 'test 1 phimCO', '', '', '', '', '', 0, 4),
(10, 'uploads/67315d9aadb9d-logo_new.png', 'tiêu đề test', 'conten test bảng phím văn phòng', '', '', '', '', '', 0, 5),
(11, 'uploads/67315e07d1e68-vại_tương_lơ.png', 'test keycaps1', 'nội dung test keycaps', '', '', '', '', '', 0, 6),
(12, 'uploads/67315e54a2e10-Screenshot 2024-10-29 223134.png', 'hello Cồn lường', 'duma thằng cường', '', '', '', '', '', 0, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `featured_photo`
--

CREATE TABLE `featured_photo` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vi_tri` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `featured_photo`
--

INSERT INTO `featured_photo` (`id`, `image`, `vi_tri`) VALUES
(2, 'uploads/67307b9610c3c-andrej-lisakov-568525-unsplash.jpg', 1),
(3, 'uploads/67307bd60ff1d-ewan-robertson-fDsCIIGdw9g-unsplash.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `header`
--

CREATE TABLE `header` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `header`
--

INSERT INTO `header` (`id`, `image`, `title`, `content`) VALUES
(5, 'uploads/672d604c1e1c5-ewan-robertson-fDsCIIGdw9g-unsplash.jpg', 'Tên sản phẩm', 'Mô tả ở đây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_header`
--

CREATE TABLE `image_header` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_header`
--

INSERT INTO `image_header` (`id`, `image`) VALUES
(1, 'uploads/672d6b8d46945-Flag_of_Vietnam.svg.png'),
(2, 'uploads/672d6df7bcd60-ewan-robertson-fDsCIIGdw9g-unsplash.jpg'),
(3, 'uploads/672d74a2b22ae-sierra.jpg'),
(4, 'uploads/672d75c4a7bd8-Flag_of_Cuba.svg.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2024_11_15_134403_add_role_to_users_table', 1),
(4, '2024_11_15_142305_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ducdoquang207@gmail.com', '$2y$10$lSRkUFb5QkSWRGsjzEMkBulSS1VOa6.4dO/S45hEm0uM/MFLPkqjy', '2024-11-15 07:27:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim_co`
--

CREATE TABLE `phim_co` (
  `id` int(5) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `money` text NOT NULL,
  `vi_tri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` text NOT NULL COMMENT 'tên sản phẩm',
  `price` text NOT NULL COMMENT 'giá sản phẩm',
  `promotion` text NOT NULL COMMENT 'khuyến mãi',
  `image` varchar(255) NOT NULL COMMENT 'ảnh sản phẩm',
  `parameter` text NOT NULL COMMENT 'thông số kỹ thuật',
  `mo_ta` text NOT NULL COMMENT 'mô tả bảo hành',
  `endow` text NOT NULL COMMENT 'ưu đãi đặt biệt',
  `evaluate` float NOT NULL COMMENT 'đánh giá',
  `status` varchar(1) NOT NULL COMMENT '1 - Đã update; 2 - Chưa update',
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `promotion`, `image`, `parameter`, `mo_ta`, `endow`, `evaluate`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Bàn phím Corsair K95', '3.150.000₫', '<ul>\r\n	<li>Khuyến m&atilde;i 1 cặp s&aacute;ch của nh&agrave;&nbsp;<strong>Corsair&nbsp;</strong></li>\r\n	<li>Giảm 15%</li>\r\n</ul>', 'uploads/673aeeb3f0a0c-1.png', '<ul>\r\n	<li>Switch : &nbsp;MX Speed</li>\r\n	<li>Led :&nbsp;<strong>RGB 16.8 triệu m&agrave;u</strong></li>\r\n	<li>Kết nối: C&oacute; d&acirc;y</li>\r\n</ul>', '<p>- Bảo h&agrave;nh đến khi xuống lỗ</p>', '<p>- &Ocirc;m Phương Anh 1 c&aacute;i nh&eacute;</p>', 4.5, '1', '2024-11-18', '2024-11-18'),
(23, 'BÀN PHÍM CƠ BLACK SHARK BK-K1 ĐEN', '399.000₫', '<ul>\r\n	<li>Tặng 1 chuột gaming Rappo</li>\r\n</ul>', 'uploads/673aef7e2f020-2.png', '<ul>\r\n	<li>Layout : 87 ph&iacute;m ( TKL )</li>\r\n	<li>LED RGB + LED Viền RGB c&oacute; thể t&ugrave;y chỉnh được</li>\r\n	<li>Hơn 10 chế độ LED cực đẹp</li>\r\n	<li>Blue Switch Outemu độ bền 50 triệu lượt nhấn</li>\r\n	<li>Plate Kim loại được CNC viền cực kỳ chất</li>\r\n	<li>D&acirc;y c&aacute;p nhựa chống rối d&agrave;i 1,8m</li>\r\n	<li>D&acirc;y c&aacute;p nhựa chống rối d&agrave;i 1,8m</li>\r\n</ul>', '<p>Bảo h&agrave;nh : 12 Th&aacute;ng ch&iacute;nh h&atilde;ng</p>', '<p>D&agrave;nh cho học sinh, sinh vi&ecirc;n -&gt; Giảm gi&aacute; 5%</p>', 4.5, '1', '2024-11-18', '2024-11-18'),
(24, 'Bàn phím cơ Fuhlen G87L', '440.000₫', '<ul>\r\n	<li>Tặng k&egrave;m l&oacute;t chuột</li>\r\n</ul>', 'uploads/673af0331fd0b-3.png', '<ul>\r\n	<li><strong>LED</strong>: Rainbow</li>\r\n	<li><strong>Switch:</strong>&nbsp;BLUE</li>\r\n	<li><strong>Chất liệu:</strong>&nbsp;Nhựa ABS doubleshot</li>\r\n</ul>', '<p><strong>Bảo h&agrave;nh</strong>&nbsp;: 24 th&aacute;ng</p>', '<ul>\r\n	<li>Giảm 25% d&agrave;nh cho học sinh, sinh vi&ecirc;n</li>\r\n</ul>', 5, '1', '2024-11-18', '2024-11-18'),
(25, 'Bàn Phím Cơ Gaming Corsair K70 CORE-BLK-CRSR MX-RGB', '2.190.000đ', '<p>Tiết kiệm th&ecirc;m đến&nbsp;110.000đ&nbsp;cho Smember</p>', 'uploads/673af1458bb19-4.png', '<ul>\r\n	<li><strong>Loại b&agrave;n ph&iacute;m:</strong> Full size</li>\r\n	<li><strong>Số ph&iacute;m:</strong> 104 ph&iacute;m</li>\r\n	<li><strong>Keycap:</strong>&nbsp;PBT Doubleshot</li>\r\n	<li><strong>N&uacute;t nhấn:</strong>&nbsp;MLX Red Switches</li>\r\n	<li><strong>Tiện &iacute;ch:</strong>&nbsp;N-key with 100% Anti-Ghosting<br />\r\n	Trang bị foam ti&ecirc;u &acirc;m<br />\r\n	Tương th&iacute;ch với Windows 10, macOS 10.15</li>\r\n	<li><strong>Kết nối:</strong> D&acirc;y USB</li>\r\n	<li><strong>Led:</strong> RGB</li>\r\n</ul>', '<p>Bảo h&agrave;nh 24 th&aacute;ng ch&iacute;nh h&atilde;ng</p>', '<p>Giảm 500k khi thanh to&aacute;n qua Techcombank</p>', 4.5, '1', '2024-11-18', '2024-11-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `sl` int(11) NOT NULL COMMENT 'số lượng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `sl`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'ducne', 'ducne@gmail.com', NULL, '$2y$10$vS9MMsOjrN1/dIPSqHN5uOXFHOmfFI5Av02UxtvuSvNWH1B7.oQ8y', NULL, 0, '2024-11-15 06:49:15', '2024-11-15 06:49:15', 'user', ''),
(2, 'admin', 'admin@gmail.com', NULL, '$2a$12$oLnIRUOyMNLjJCp8ZinehesI1viHnqmwook.hwnY8kphy7oGCgyTS', NULL, 0, NULL, NULL, 'admin', '1'),
(6, 'stupid', 'stupi@gmail.com', NULL, '$2y$10$xW5Eyu0XCo751ofb8AHwZu2Ac.TS3Q5AX4HjJM.KKACPcPIshwDua', NULL, 0, '2024-11-15 07:07:55', '2024-11-15 07:07:55', 'user', NULL),
(7, 'duc_ne', 'ducdoquang207@gmail.com', NULL, '$2y$10$IRXfbWkXcRk.5JlDM79iy.MAt28WjQcPaUSF0GzC11ggep.gOPR6u', NULL, 0, '2024-11-15 07:21:21', '2024-11-15 07:21:21', 'user', NULL),
(8, 'ngCuong', 'stupid@gmail.com', NULL, '$2y$10$wlHcythZpjiE/59aI5vQ3Ooghubk7NyvOwtQ6bWOERsMXFo8YH4y6', NULL, 0, '2024-11-15 11:09:45', '2024-11-15 11:09:45', 'user', NULL),
(9, 'testHome', 'test1@gmail.com', NULL, '$2y$10$vvgYSbjYow2qfj9z.SWMcuQFdOhxST8LVu5v5/S2O2Wj52vdlNSHy', NULL, 0, '2024-11-16 10:57:16', '2024-11-16 10:57:16', 'user', NULL),
(10, 'test2', 'test2@gmail.com', NULL, '$2y$10$z7EROFr51hOgB18JF9YNaebiTztg7ok4tT9OhqKuKI0zC82uMUjum', NULL, 0, '2024-11-16 15:17:20', '2024-11-16 15:17:20', 'user', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `best_selling`
--
ALTER TABLE `best_selling`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `deal_sale`
--
ALTER TABLE `deal_sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `featured_photo`
--
ALTER TABLE `featured_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_header`
--
ALTER TABLE `image_header`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phim_co`
--
ALTER TABLE `phim_co`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `best_selling`
--
ALTER TABLE `best_selling`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `deal_sale`
--
ALTER TABLE `deal_sale`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `featured_photo`
--
ALTER TABLE `featured_photo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `header`
--
ALTER TABLE `header`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `image_header`
--
ALTER TABLE `image_header`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phim_co`
--
ALTER TABLE `phim_co`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
