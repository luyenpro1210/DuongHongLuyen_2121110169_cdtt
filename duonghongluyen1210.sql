-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duonghongluyen1210`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_brand`
--

CREATE TABLE `dhl_brand` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) NOT NULL COMMENT 'SLug Loại SP',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự',
  `image` varchar(255) DEFAULT '' COMMENT 'Hình đại diện',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_brand`
--

INSERT INTO `dhl_brand` (`id`, `name`, `slug`, `sort_order`, `image`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(6, 'Việt Nam', 'viet-nam', 0, 'viet-nam.png', 'Từ khóa SEO', 'Mô tả SEO', '2023-11-15 07:01:06', 1, '2023-11-15 07:01:06', 1, 1),
(7, 'Hàn Quốc', 'han-quoc', 1, 'han-quoc.png', 'Từ khóa SEO', 'Mô tả SEO', '2023-11-15 07:01:17', 1, '2023-11-15 07:01:17', 1, 1),
(8, 'Nhật Bản', 'nhat-ban', 2, 'nhat-ban.png', 'Từ khóa SEO', 'Mô tả SEO', '2023-11-15 07:01:25', 1, '2023-11-15 07:01:25', 1, 1),
(9, 'Pháp', 'phap', 3, 'phap.png', 'Từ khóa SEO', 'Mô tả SEO', '2023-11-15 07:02:04', 1, '2023-11-15 07:02:04', 1, 1),
(10, 'Trung Quốc', 'trung-quoc', 0, 'trung-quoc.png', 'Từ khóa SEO', 'Mô tả SEO', '2023-11-15 07:02:17', 1, '2023-11-15 07:02:17', 1, 1),
(11, 'bhvxhvb', 'bhvxhvb', 1, 'bhvxhvb.png', 'nhjbdhbvh', 'jbfjvbxh', '2023-10-07 07:35:17', 1, '2023-10-07 07:35:17', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_category`
--

CREATE TABLE `dhl_category` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) NOT NULL COMMENT 'SLug Loại SP',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự',
  `level` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL COMMENT 'Hình đại diện',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) DEFAULT 0 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_category`
--

INSERT INTO `dhl_category` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `level`, `image`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(32, 'Nước hoa D&G', 'nuoc-hoa-dg', 27, 3, 2, 'nuoc-hoa-dg.jpg', 'Nước hoa D&G', 'Nước hoa D&G', '2023-04-18 14:48:32', 1, '2023-11-15 13:58:43', 1, 1),
(35, 'Nước hoa Chloe', 'nuoc-hoa-chloe', 28, 4, 2, 'nuoc-hoa-chloe.jpg', 'Nước hoa Chloe', 'Nước hoa Chloe', '2023-04-18 14:53:34', 1, '2023-11-15 13:58:22', 1, 1),
(36, 'Nước hoa Chanel', 'nuoc-hoa-chanel', 26, 5, 2, 'nuoc-hoa-chanel.jpg', 'Nước hoa Chanel', 'Nước hoa Chanel', '2023-04-18 14:54:06', 1, '2023-11-15 13:58:00', 1, 1),
(37, 'Son DHC Corporation', 'son-dhc-corporation', 28, 6, 2, 'son-dhc-corporation.jpg', 'Son DHC Corporation', 'Son DHC Corporation', '2023-04-18 15:04:49', 1, '2023-11-15 13:57:21', 1, 1),
(39, 'Son Shu Uemura', 'son-shu-uemura', 26, 7, 2, 'son-shu-uemura.jpg', 'Son Shu Uemura', 'Son Shu Uemura', '2023-04-19 01:58:31', 1, '2023-11-15 13:56:22', 1, 1),
(40, 'Son Shiseido', 'son-shiseido', 26, 8, 2, 'son-shiseido.jpg', 'Son Shiseido', 'Son Shiseido', '2023-04-19 01:58:56', 1, '2023-11-15 13:55:58', 1, 1),
(41, 'Son Maybelline', 'son-maybelline', 26, 9, 2, 'son-maybelline.jpg', 'Son Maybelline', 'Son Maybelline', '2023-04-19 01:59:27', 1, '2023-11-15 13:55:27', 1, 1),
(42, 'Son Tom Ford', 'son-tom-ford', 27, 10, 2, 'son-tom-ford.jpg', 'Son Tom Ford', 'Son Tom Ford', '2023-04-19 02:01:39', 1, '2023-11-15 13:54:41', 1, 1),
(43, 'Son MAC', 'son-mac', 27, 11, 2, 'son-mac.jpg', 'Son MAC', 'Son MAC', '2023-04-19 02:02:03', 1, '2023-11-15 13:50:38', 1, 1),
(44, 'Son Black Rouge', 'son-black-rouge', 28, 12, 2, 'son-black-rouge.jpg', 'Son Black Rouge', 'Son Black Rouge', '2023-04-19 02:02:58', 1, '2023-11-15 13:50:06', 1, 1),
(45, 'Son 3CE', 'son-3ce', 28, 13, 2, 'son-3ce.jpg', 'Son 3CE', 'Son 3CE', '2023-04-19 02:03:30', 1, '2023-11-15 13:49:27', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_config`
--

CREATE TABLE `dhl_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(155) DEFAULT NULL,
  `facebook` varchar(155) DEFAULT NULL,
  `twitter` varchar(155) DEFAULT NULL,
  `youtube` varchar(155) DEFAULT NULL,
  `googleplus` varchar(155) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_config`
--

INSERT INTO `dhl_config` (`id`, `site_name`, `metakey`, `metadesc`, `author`, `phone`, `email`, `facebook`, `twitter`, `youtube`, `googleplus`, `status`) VALUES
(1, 'Cửa hàng mỹ phẩm', 'Cửa hàng mỹ phẩm', 'Cửa hàng mỹ phẩm', 'Dương Hồng Luyến', '0987654321', 'dienloisoft@gmail.com', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_contact`
--

CREATE TABLE `dhl_contact` (
  `id` int(11) NOT NULL COMMENT 'Mã liên hệ',
  `name` varchar(255) NOT NULL COMMENT 'Họ và tên',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `phone` varchar(100) NOT NULL COMMENT 'Điện thoại',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề',
  `detail` mediumtext NOT NULL COMMENT 'Chi tiết',
  `replaydetail` text DEFAULT NULL COMMENT 'Nội dung liên hệ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày liên hệ',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày trả lời',
  `updated_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người trả lời',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Tráng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_contact`
--

INSERT INTO `dhl_contact` (`id`, `name`, `email`, `phone`, `title`, `detail`, `replaydetail`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Nguyễn Văn Toàn', 'nguyenvantoan@gmail.com', '0987654321', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', 'xzXZZ', '2020-06-30 22:31:49', '2023-04-19 00:11:00', 1, 1),
(2, 'Lê Thái Sơn', 'lethaison@gmail.com', '0987667986', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(3, 'Trần Ngọc Ái', 'tranngocai@gmail.com', '0987654379', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(4, 'Mai Tiến Sơn', 'maitienson@gmail.com', '0987654367', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2022-11-21 12:54:22', 1, 0),
(14, 'dsf sfdsd', 'luyenpro567@gmail.com', '0396202770', 'dsfsd', 'sdfsd', 'sdfdsf', '2023-11-15 07:33:40', '2023-11-15 07:33:40', 1, 1),
(15, 'dsf sfdsdfdfd', 'luyenpro567@gmail.com', '0396202770', 'dsfsd', 'sdfsd', 'sdfdsf', '2023-11-15 07:33:54', '2023-11-15 07:33:54', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_link`
--

CREATE TABLE `dhl_link` (
  `id` int(11) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_link`
--

INSERT INTO `dhl_link` (`id`, `slug`, `type`, `table_id`) VALUES
(16, 'viet-nam', 'brand', 6),
(17, 'han-quoc', 'brand', 7),
(18, 'nhat-ban', 'brand', 8),
(19, 'phap', 'brand', 9),
(20, 'trung-quoc', 'brand', 10),
(21, 'trai-cay', 'category', 26),
(22, 'rau-cu', 'category', 27),
(23, 'cac-loai-dau', 'category', 28),
(25, 'cac-loai-dua', 'category', 30),
(26, 'cac-loai-ca', 'category', 31),
(27, 'nuoc-hoa-dg', 'category', 32),
(30, 'nuoc-hoa-chloe', 'category', 35),
(31, 'nuoc-hoa-chanel', 'category', 36),
(32, 'son-dhc-corporation', 'category', 37),
(34, 'son-shu-uemura', 'category', 39),
(35, 'son-shiseido', 'category', 40),
(36, 'son-maybelline', 'category', 41),
(37, 'son-tom-ford', 'category', 42),
(38, 'son-mac', 'category', 43),
(39, 'son-black-rouge', 'category', 44),
(40, 'son-3ce', 'category', 45),
(42, 'chinh-sach-mua-hang', 'page', 43),
(43, 'ghbnhhjk', 'page', 44),
(45, 'sdfghjuklsdfgdieu', 'topic', 5),
(46, 'chinh-sach-van-chuyen', 'page', 47),
(48, 'chinh-sach-bao-hanh', 'page', 49),
(49, 'chinh-sach-doi-tra', 'page', 50),
(50, 'bhvxhvb', 'brand', 11),
(51, 'bdhjfgbhb', 'topic', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_menu`
--

CREATE TABLE `dhl_menu` (
  `id` int(11) NOT NULL COMMENT 'Mã Menu',
  `name` varchar(255) NOT NULL COMMENT 'Tên Menu',
  `link` varchar(255) NOT NULL COMMENT 'Liên kết',
  `type` varchar(50) NOT NULL COMMENT 'Kiểu Menu',
  `table_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã trong bảng',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'Thứ tự',
  `position` varchar(255) NOT NULL COMMENT 'Vị trí',
  `level` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Mã cấp cha',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày Tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_menu`
--

INSERT INTO `dhl_menu` (`id`, `name`, `link`, `type`, `table_id`, `sort_order`, `position`, `level`, `parent_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Trang chủ', 'http://localhost:8080/LeThiNgocDieu_laravel/public/', 'custom', 0, 1, 'mainmenu', 1, 0, '2022-11-22 12:36:05', 1, '2023-04-20 21:39:04', 1, 1),
(2, 'Giới thiệu', 'index.php?option=page&cat=gioi-thieu', 'page', 39, 2, 'mainmenu', 1, 0, '2022-11-22 13:13:46', 1, '2022-11-22 13:18:22', 1, 1),
(16, 'Giới thiệu', 'index.php?option=page&cat=gioi-thieu', 'page', 39, 1, 'footermenu', 1, 0, '2022-11-22 13:55:36', 1, '2023-11-15 07:28:44', 1, 2),
(17, 'Chính Sách Hoàn Tiền', 'index.php?option=page&cat=chinh-sach-hoan-tien', 'page', 38, 1, 'footermenu', 1, 0, '2022-11-22 13:55:36', 1, '2022-11-22 13:55:42', 1, 1),
(18, 'Chính sách bảo hành', 'index.php?option=page&cat=chinh-sach-bao-hanh', 'page', 37, 1, 'footermenu', 1, 0, '2022-11-22 13:55:36', 1, '2022-11-22 13:55:40', 1, 1),
(19, 'Chính sách đổi hàng', 'index.php?option=page&cat=chinh-sach-doi-hang', 'page', 36, 1, 'footermenu', 1, 0, '2022-11-22 13:55:36', 1, '2022-11-22 13:55:39', 1, 1),
(30, 'CÁC LOẠI ĐẬU', 'cac-loai-dau', 'category', 28, 6, 'mainmenu', 1, 0, '2023-04-18 18:53:00', 1, '2023-04-18 18:54:29', 1, 1),
(31, 'TRÁI CÂY', 'trai-cay', 'category', 26, 6, 'mainmenu', 1, 0, '2023-04-18 18:53:09', 1, '2023-04-19 00:19:31', 1, 1),
(32, 'RAU, CỦ', 'rau-cu', 'category', 27, 6, 'mainmenu', 1, 0, '2023-04-18 18:53:18', 1, '2023-04-19 00:19:43', 1, 1),
(33, 'Đậu Phộng', 'dau-phong', 'category', 37, 1, 'mainmenu', 2, 30, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:03', 1, 1),
(34, 'Các loại mít', 'cac-loai-mit', 'category', 36, 1, 'mainmenu', 2, 31, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:05', 1, 1),
(35, 'Các loại đậu đen', 'cac-loai-dau-den', 'category', 35, 1, 'mainmenu', 2, 30, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:06', 1, 1),
(36, 'Khoai', 'khoai', 'category', 32, 1, 'mainmenu', 2, 32, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:07', 1, 1),
(37, 'Các loại cà', 'cac-loai-ca', 'category', 31, 1, 'mainmenu', 2, 32, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:08', 1, 1),
(38, 'Các loại dưa', 'cac-loai-dua', 'category', 30, 1, 'mainmenu', 2, 31, '2023-04-18 18:54:59', 1, '2023-04-18 18:55:09', 1, 1),
(39, 'Đậu đỏ', 'dau-do', 'category', 45, 1, 'mainmenu', 2, 30, '2023-04-18 19:03:53', 1, '2023-04-18 19:04:23', 1, 1),
(40, 'Đậu Trắng', 'dau-trang', 'category', 44, 3, 'mainmenu', 2, 30, '2023-04-18 19:03:53', 1, '2023-04-18 19:04:50', 1, 1),
(41, 'Củ Sắn', 'cu-san', 'category', 43, 1, 'mainmenu', 2, 32, '2023-04-18 19:03:53', 1, '2023-04-18 19:05:03', 1, 1),
(42, 'Bắp', 'bap', 'category', 42, 3, 'mainmenu', 2, 32, '2023-04-18 19:03:53', 1, '2023-04-18 19:05:16', 1, 1),
(43, 'Mãng Cầu', 'mang-cau', 'category', 41, 5, 'mainmenu', 2, 31, '2023-04-18 19:03:53', 1, '2023-04-18 19:05:31', 1, 1),
(44, 'Nhãn', 'nhan', 'category', 40, 5, 'mainmenu', 2, 31, '2023-04-18 19:03:53', 1, '2023-04-18 19:05:41', 1, 1),
(45, 'Bưởi', 'buoi', 'category', 39, 3, 'mainmenu', 2, 31, '2023-04-18 19:03:53', 1, '2023-04-18 19:05:54', 1, 1),
(46, 'Liên Hệ', 'lien-he', 'custom', 0, 5, 'mainmenu', 1, 0, '2023-04-19 00:17:49', 1, '2023-04-19 00:23:58', 1, 1),
(47, 'Bài Viết', 'bai-viet', 'custom', 0, 4, 'mainmenu', 1, 0, '2023-04-19 05:53:08', 1, '2023-04-19 05:53:48', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_order`
--

CREATE TABLE `dhl_order` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `code` varchar(20) NOT NULL COMMENT 'Code đơn hàng',
  `user_id` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `exportdate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày xuất',
  `deliveryaddress` varchar(255) NOT NULL COMMENT 'Địa chỉ người nhận',
  `deliveryname` varchar(100) NOT NULL COMMENT 'Tên người nhận',
  `deliveryphone` varchar(120) NOT NULL COMMENT 'Điện thoại người nhận',
  `deliveryemail` varchar(120) NOT NULL COMMENT 'Email ngươig nhận',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người cập nhật',
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_order`
--

INSERT INTO `dhl_order` (`id`, `code`, `user_id`, `exportdate`, `deliveryaddress`, `deliveryname`, `deliveryphone`, `deliveryemail`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, '20200107121212', 1, '2020-07-03 17:00:00', 'HCM', 'Hồ Đình Lợi', '0987654321', 'loi@gmail.com', '2020-06-30 17:00:00', '2023-11-15 07:28:42', 1, 0),
(2, '20200107121216', 1, '2020-07-03 17:00:00', 'Bình Dương', 'Hoàng Mai Toàn', '0987654321', 'toan@gmail.com', '2020-06-30 17:00:00', '2023-04-19 04:41:15', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_orderdetail`
--

CREATE TABLE `dhl_orderdetail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã CT Đơn hàng',
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `price` float(12,2) NOT NULL COMMENT 'Giá sản phẩm',
  `qty` int(10) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `amount` float(12,2) NOT NULL COMMENT 'Thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_orderdetail`
--

INSERT INTO `dhl_orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `amount`) VALUES
(1, 1, 23, 250000.00, 2, 500000.00),
(2, 1, 25, 250000.00, 3, 750000.00),
(3, 2, 33, 250000.00, 2, 500000.00),
(4, 2, 43, 250000.00, 3, 750000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_post`
--

CREATE TABLE `dhl_post` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã bài viết',
  `topic_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(1000) NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tiêu đề',
  `detail` longtext NOT NULL COMMENT 'Chi tiết bài viết',
  `image` varchar(1000) NOT NULL COMMENT 'Hình ảnh',
  `type` varchar(10) NOT NULL DEFAULT 'post' COMMENT 'Kiểu bài viết',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_post`
--

INSERT INTO `dhl_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `image`, `type`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(33, 0, 'sxdfghyjukildfghjukilo;', 'sxdfghyjukildfghjukilo', 'mmmgg', 'sxdfghyjukildfghjukilo.png', '0', 'GRAND OPENING TOTODAY CẦN THƠ', 'GRAND OPENING TOTODAY CẦN THƠ', '2022-11-22 12:50:14', 1, '2023-10-10 05:54:52', 1, 1),
(34, 0, 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', 'deal-shock-thang-11-chot-gon-quan-jean-den-sieu-hot-chi-voi-299k', 'mmm', 'deal-shock-thang-11-chot-gon-quan-jean-den-sieu-hot-chi-voi-299k.png', '0', 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', 'DEAL SHOCK THÁNG 11: CHỐT GỌN QUẦN JEAN ĐEN SIÊU HOT CHỈ VỚI 299K', '2022-11-22 13:01:25', 1, '2023-10-10 05:04:11', 1, 1),
(35, 0, 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', 'khai-tiec-sinh-nhat-bat-tung-bat-ngo', 'mmm', 'khai-tiec-sinh-nhat-bat-tung-bat-ngo.png', '0', 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', 'KHAI TIỆC SINH NHẬT, BẬT TUNG BẤT NGỜ', '2022-11-22 13:03:06', 1, '2023-10-10 05:04:18', 1, 1),
(38, 0, 'Chính Sách Hoàn Tiền', 'chinh-sach-hoan-tien', 'mmm', 'chinh-sach-hoan-tien.png', '0', 'Chính Sách Hoàn Tiền', 'Chính Sách Hoàn Tiền', '2022-11-22 13:11:30', 1, '2023-10-10 05:04:30', 1, 1),
(39, 0, 'Giới thiệu', 'gioi-thieu', 'mmm', 'gioi-thieu.png', '0', 'fdgdf', 'dfgdfg', '2022-11-22 13:13:30', 1, '2023-10-10 05:10:22', 1, 1),
(40, 0, 'zxcfvgbhnj', 'zxcfvgbhnj', 'xdcfghjukilo', 'zxcfvgbhnj.png', '0', 'dcfvgbhnjmk,', 'sdfghjk', '2023-04-19 04:43:35', 1, '2023-10-10 05:10:31', 1, 1),
(43, 0, 'Chính sách mua hàng', 'chinh-sach-mua-hang', 'ffff', 'chinh-sach-mua-hang.png', '0', 'Chính sách mua hàng', 'Chính sách mua hàng', '2023-04-19 07:30:03', 1, '2023-10-10 05:10:48', 1, 1),
(44, 0, 'ghbnhhjk', 'ghbnhhjk', 'sdfghj', 'ghbnhhjk.png', '0', 'sdfghj', 'dfghjk', '2023-04-20 22:43:17', 1, '2023-10-10 05:11:03', 1, 1),
(47, 0, 'Chính sách vận chuyển', 'chinh-sach-van-chuyen', 'mmmm', 'chinh-sach-van-chuyen.png', '0', 'Chính sách vận chuyển', 'Chính sách vận chuyển', '2023-04-20 23:28:26', 1, '2023-10-10 05:11:20', 1, 1),
(49, 0, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', 'jjj', 'chinh-sach-bao-hanh.png', '0', 'Chính sách bảo hành', 'Chính sách bảo hành', '2023-04-20 23:52:14', 1, '2023-10-10 05:11:35', 1, 1),
(50, 0, 'Chính sách đổi trả', 'chinh-sach-doi-tra', 'jjj', 'chinh-sach-doi-tra.png', '0', 'Chính sách đổi trả', 'Chính sách đổi trả', '2023-04-21 00:12:56', 1, '2023-10-10 05:11:51', 1, 1),
(51, 0, 'yuhyudbfybgdbghbhbhbbyb', 'yuhyudbfybgdbghbhbhbbyb', 'bfyhbghbdfhbgudfugb', 'yuhyudbfybgdbghbhbhbbyb.png', '0', 'hsbdhjfbshdbfhjbshjb', 'bjhsdbfhbshjdfbhsbfhkjbdshjbf', '2023-10-07 07:50:18', 1, '2023-10-07 07:50:18', 1, 1),
(52, 0, 'hygydfgvg', 'hygydfgvg', 'uhdfgbfyhb', 'hygydfgvg.png', '34', 'bhdbhfb', 'bhfbhgh', '2023-10-07 08:03:23', 1, '2023-10-07 08:03:23', 1, 1),
(53, 0, 'hygydfgvgdsfsdf', 'hygydfgvgdsfsdf', 'uhdfgbfyhb', 'hygydfgvgdsfsdf.png', 'post', 'bhdbhfb', 'bhfbhgh', '2023-10-07 08:03:54', 1, '2023-10-07 08:03:54', 1, 1),
(54, 0, 'fgdfg', 'fgdfg', 'dfgdfg', 'fgdfg.png', '0', 'dfgdfg', 'dfgfdg', '2023-10-10 05:09:45', 1, '2023-10-10 05:38:53', 1, 0),
(55, 0, 'a', 'a', 'a', 'a.png', '0', 'a', 'a', '2023-10-10 05:38:24', 1, '2023-10-10 05:38:24', 1, 1),
(56, 0, 'dsfdsf', 'dsfdsf', 'dssfds', 'dsfdsf.png', '0', 'dsfdsfdsf', 'dsfsdfds', '2023-11-15 23:42:27', 1, '2023-11-15 23:42:27', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_product`
--

CREATE TABLE `dhl_product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã loại sản phẩm',
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tên sản phẩm',
  `image` varchar(255) NOT NULL COMMENT 'Hình ảnh',
  `detail` mediumtext NOT NULL COMMENT 'Chi tiết',
  `qty` smallint(5) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `price` float(12,2) NOT NULL COMMENT 'Giá',
  `pricesale` float(12,3) NOT NULL COMMENT 'Giá khuyến mãi',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái',
  `sale` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_product`
--

INSERT INTO `dhl_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `image`, `detail`, `qty`, `price`, `pricesale`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`, `sale`) VALUES
(38, 0, 0, 'Son 3CE', 'son-3ce', 'son-3ce.jpg', 'Về hình dáng bên ngoài, mít tố nữ có hình trứng dài, chiều dài từ 22cm – 50cm, bề ngang từ 10cm – 17cm, trọng lượng từ 1kg – 6kg nhưng thông thường dưới 2kg. Mít tố nữ có múi màu vàng hoặc cam, bên trong có hạt lớn, mùi vị giống mít ướt pha với mùi sầu riêng, vỏ dày, dẻo với gai dẹp. Thời gian cho quả của Mít tố nữ, mít bắt đầu cho ra trái từ 3 – 5 tuổi và có thể cho trái 2 lần mỗi năm. Mùa mít tố nữ chín kéo dài khoảng 6 tuần', 20, 300000.00, 25000.000, 'Son 3CE', 'Son 3CE', '2023-11-15 06:34:44', 1, '2023-11-15 06:34:44', 1, 1, 2),
(39, 0, 0, 'Son Black Rouge', 'son-black-rouge', 'son-black-rouge.jpg', 'Mít thái có nguồn gốc từ Thái Lan ( tên khoa học: Artocarpus Heterophyllus). Đây là một loại trái cây ăn quả rất dễ trồng và rất sai quả. Sau khi được du nhập về Việt Nam chúng được trồng ở rất nhiều nơi từ bắc tới Nam', 45, 30000.00, 20000.000, 'Son Black Rouge', 'Son Black Rouge', '2023-11-15 06:34:54', 1, '2023-11-15 06:34:54', 1, 1, 2),
(40, 0, 0, 'Son MAC', 'son-mac', 'son-mac.jpg', 'Dưa gang là món ăn khoái khẩu của nhiều người kể cả người lớn và trẻ em. Vị ngọt thanh, ăn rất mát. Trưa nóng mà có ly dưa gang ăn thì quả là tuyệt vời, có thể chế biến thành dưa gang dầm sữa hoặc sinh tố dưa gang hoặc có thể ăn dưa gang với đường đều rất ngon', 12, 20000.00, 15000.000, 'Son MAC', 'Son MAC', '2023-11-15 06:35:08', 1, '2023-11-15 06:35:08', 1, 1, 2),
(41, 0, 0, 'Son Tom Ford', 'son-tom-ford', 'son-tom-ford.jpg', 'Khoai tây có chứa các vitamin, khoáng chất và một loạt các hóa chất thực vật như các carotenoit và phenol tự nhiên.\\r\\n\\r\\nKhoai tây chứa khoảng 26gr carbohydrate trong một củ có kích cỡ trung bình. Đây cũng là thành phần chính trong khoai tây. Các hình thức tồn tại chủ yếu của carbohydrate này là ở dạng tinh bột', 40, 15000.00, 10000.000, 'Son Tom Ford', 'Son Tom Ford', '2023-11-15 06:35:35', 1, '2023-11-15 06:35:35', 1, 1, 2),
(42, 0, 0, 'Son Maybelline', 'son-maybelline', 'son-maybelline.jpg', 'Cà tím hay còn gọi với tên cà dái dê là loại cây thuộc họ nhà Cà được sử dụng như một loại rau trong lĩnh vực ẩm thực. Loại cây này có quan hệ họ hàng khá gần với nhiều loại củ quả khác như cà chua, cà pháo, cà dừa, khoai tây… Loại cây này có nguồn gốc từ miền nam Ấn Độ và Sri Lanka', 34, 20000.00, 15000.000, 'Son Maybelline', 'Son Maybelline', '2023-11-15 06:35:47', 1, '2023-11-15 06:35:47', 1, 1, 2),
(43, 0, 0, 'Son Shiseido', 'son-shiseido', 'son-shiseido.jpg', 'Cà chua có tên khoa học là Solanum lycopersicum, được cho là có nguồn gốc từ Mexico, là loại thực phẩm vừa là rau, vừa là quả và hiện nay nó là loại thực phẩm rất phổ biến trên toàn cầu. Cà chua có mặt trong rất nhiều món kể cả nước chấm', 40, 30000.00, 25000.000, 'Son Shiseido', 'Son Shiseido', '2023-11-15 06:35:59', 1, '2023-11-15 06:35:59', 1, 1, 2),
(47, 0, 0, 'Son Shu Uemura', 'son-shu-uemura', 'son-shu-uemura.jpg', 'Cà rốt hay còn được gọi là hồ la bặc, băn - các - đanh (Thái), cà lốt (Tày),... thuộc họ Hoa Tán với danh pháp khoa học là Apiaceae . Cà rốt là một loại củ quen thuộc từ xa xưa trong đời sống của người Việt Nam. Trong y học, Cà rốt có tác dụng làm thuốc lợi tiểu, chữa sỏi thận, sỏi bàng quang, sát trùng, bổ, dễ tiêu, chữa thiếu máu, cơ thể suy nhược (Hạt sắc uống). Chữa đau dạ dày, lao hạch, thống phong, thấp khớp, xơ vữa động mạch....', 65, 15000.00, 10000.000, 'Son Shu Uemura', 'Son Shu Uemura', '2023-11-15 06:36:11', 1, '2023-11-15 06:36:11', 1, 1, 2),
(48, 0, 0, 'Son DHC Corporation', 'son-dhc-corporation', 'son-dhc-corporation.jpg', 'Quả chôm chôm chứa nhiều vitamin C, giàu chất đạm, chất béo và các nguyên tố vi lượng có tác dụng dinh dưỡng và làm thuốc chữa bệnh. Chính vì thế mà chôm chôm được rất nhiều người Việt ưa thích và mua dùng thường xuyên', 65, 50000.00, 45000.000, 'Son DHC Corporation', 'Son DHC Corporation', '2023-11-15 06:36:56', 1, '2023-11-15 06:36:56', 1, 1, 2),
(49, 0, 0, 'Nước hoa Chanel', 'nuoc-hoa-chanel', 'nuoc-hoa-chanel.jpg', 'So với đậu đen thông thường, đậu đen xanh lòng có giá trị dinh dưỡng cao hơn hẳn, có vị ngọt thanh khiết và thanh nhiệt cơ thể. Ngoài ra, chúng còn có tác dụng tăng cường chức năng tiêu hóa, điều hòa huyết áp vừa có thể trị bệnh, vừa tốt cho sức khoẻ lại còn có khả năng làm đẹp.', 30, 100000.00, 90000.000, 'Nước hoa Chanel', 'Nước hoa Chanel', '2023-11-15 06:43:37', 1, '2023-11-15 06:43:37', 1, 1, 2),
(50, 0, 0, 'Nước hoa Chloe', 'nuoc-hoa-chloe', 'nuoc-hoa-chloe.jpg', 'Vỏ màu đen xỉn và ruột bên trong màu trắng', 45, 100000.00, 90000.000, 'Nước hoa Chloe', 'Nước hoa Chloe', '2023-11-15 06:43:45', 1, '2023-11-15 06:43:45', 1, 1, 2),
(51, 0, 0, 'Nước hoa D&G', 'nuoc-hoa-dg', 'nuoc-hoa-dg.jpg', 'Cherry là nguồn vitamin A tuyệt vời, là loại trái cây nhập khẩu giàu chất sắt, chất xơ cao, không cholesterol và Natri, tốt cho hệ miễn dịch, tiêu hóa và làm đẹp da.\\r\\nCherry chống oxy hóa rất tốt cho tim mạch, giúp bảo vệ cơ thể chống lại bệnh ung thư và nó hoạt động như một loại thuốc giảm đau và giảm viêm cho các bệnh nhân gút và khớp.\\r\\nCherry chứa melatonin - một chất giúp điều hòa giấc ngủ nên nó có thể giúp ngủ ngon', 35, 200000.00, 190000.000, 'Nước hoa D&G', 'Nước hoa D&G', '2023-11-15 06:45:02', 1, '2023-11-15 06:45:02', 1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_slider`
--

CREATE TABLE `dhl_slider` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã Slider',
  `name` varchar(255) NOT NULL COMMENT 'Tên Slider',
  `link` varchar(255) NOT NULL COMMENT 'Liên kết',
  `position` varchar(100) NOT NULL COMMENT 'Vị trí',
  `image` varchar(100) NOT NULL COMMENT 'Hình ảnh',
  `sort_order` int(10) UNSIGNED NOT NULL COMMENT 'Thứ tự',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_slider`
--

INSERT INTO `dhl_slider` (`id`, `name`, `link`, `position`, `image`, `sort_order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(8, 'Khuyến Mãi Mùa Hè', 'khuyen-mai-he', '0', 'khuyen-mai-mua-he.png', 0, '2023-04-18 19:14:46', 1, '2023-10-07 08:07:40', 1, 1),
(9, 'Khuyến mãi tết', 'khuyen-mai-tet', '0', 'khuyen-mai-tet.png', 1, '2023-04-18 19:18:57', 1, '2023-10-10 05:22:14', 1, 1),
(11, 'Khuyến mai trung thu', 'khuyen-mai-trung-thu', 'slideshow', 'khuyenmaitrungthu.jpg', 3, '2023-04-18 19:21:20', 1, '2023-04-18 19:21:20', 1, 1),
(12, 'Khuyến mãi 20/10', 'khuyen-mai-20-10', 'slideshow', 'khuyenmai2010.jpg', 4, '2023-04-18 19:23:54', 1, '2023-04-18 19:23:54', 1, 1),
(19, 'Khuyến mãi giáng sinh', 'khuen-mai-giang-sinh', 'slideshow', 'khuyen-mai-giang-sinh.jpg', 5, '2023-04-18 19:37:21', 1, '2023-04-18 19:37:21', 1, 1),
(22, 'hshfbhbs', 'gvdgsvfgsdbvfhb', 'slideshow', 'hshfbhbs.png', 1, '2023-10-07 08:07:27', 1, '2023-10-07 08:07:27', 1, 1),
(23, 'jvfgd', 'hsyugfdygdh', '0', 'jvfgd.png', 0, '2023-10-10 05:21:59', 1, '2023-10-10 05:21:59', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dhl_topic`
--

CREATE TABLE `dhl_topic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `name` varchar(255) NOT NULL COMMENT 'Tên chủ đề',
  `slug` varchar(255) NOT NULL COMMENT 'Slug tên chủ đề',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Sắp xếp',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dhl_topic`
--

INSERT INTO `dhl_topic` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Tin tức', 'tin-tuc', 0, 1, 'Từ khóa SEO', 'Mô tả SEO', '2020-07-03 09:14:39', 1, '2020-07-03 09:14:39', 1, 1),
(2, 'Dịch vụ', 'dich-vu', 0, 2, 'Từ khóa SEO', 'Mô tả SEO', '2020-07-03 09:14:39', 1, '2020-07-03 09:14:39', 1, 1),
(4, 'Báo Chíứedrfgtysxdfghj', 'bao-chiuedrfgtysxdfghj', 2, 2, 'Báo Chídfghj', 'Báo Chí', '2023-04-19 04:39:58', 1, '2023-04-20 22:51:02', 1, 1),
(5, 'sdfghjuklsdfgdieu', 'sdfghjuklsdfgdieu', 2, 3, 'sdfghyjukldfg', 'zsxdcfghjkdfg', '2023-04-20 22:51:44', 1, '2023-04-20 22:52:19', 1, 1),
(6, 'bdhjfgbhb', 'bdhjfgbhb', 0, 0, 'bfhgbhdfb', 'dnfjkbgdfhj', '2023-10-07 07:54:02', 1, '2023-10-07 07:54:02', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã tài khoản',
  `name` varchar(100) NOT NULL COMMENT 'Họ và tên',
  `username` varchar(100) NOT NULL COMMENT 'Tên đăng nhâp',
  `password` varchar(64) NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `gender` tinyint(3) UNSIGNED NOT NULL COMMENT 'Giới tính',
  `phone` varchar(11) NOT NULL COMMENT 'Điện thoại',
  `image` varchar(100) NOT NULL COMMENT 'Hình',
  `roles` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quyền truy cập',
  `address` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `gender`, `phone`, `image`, `roles`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Quản trị', 'admin', '$2y$10$nmpko.kgM/rdpLA306b/ae8YreWtKD7RtkyaiwBqkkqPQe8XxkL3.', 'admin@gmail.com', 1, '0987654367', 'quan-tri.jpg', 1, 'Hồ Chí Minh', '2023-04-21 00:34:29', 1, '2023-04-21 00:34:29', 1, 1),
(2, 'Khách hàng1', 'khachhang', '$2y$10$0LpLG1knzyg1aYNqRv2h2OuicnJQqw/oRGrSA9j4c6vYK/NHp5ImS', 'khachhang@gmail.com', 1, '0987654367', 'khach-hang1.jpg', 1, 'Hồ Chí Minh', '2023-04-20 22:31:16', 1, '2023-11-15 07:21:53', 1, 0),
(14, 'Lê Thị Ngọc Diệud', 'dieule23', '$2y$10$fdoo1OPcOrKMXuhlb5NA5u8mb75rCf5pBNslaYbp24HWMmz4B4Orq', 'dieulefgg@gmail.com', 0, '234567833', 'le-thi-ngoc-dieud.jpg', 1, 'Bình Thuậnđ', '2023-04-20 22:35:30', 1, '2023-10-17 03:58:30', 1, 0),
(15, 'sdfghj', 'zsxdcfvbn', '$2y$10$uTW27hqryg1fDVLXds8l7On/A2UDFROSKfSQQhHnm8QzJPmee3uAm', 'sdfgcccchdfgbh@gmail.com', 1, '2345678', 'sdfghj.jpg', 1, 'ádfghnjmk', '2023-04-20 22:19:37', 1, '2023-04-20 22:19:37', 1, 1),
(16, 'Lê Thị ND', 'ưer', '$2y$10$LS6PWoCui9mhcgtJ0MNwE.8wPi0uIcTGcpUZU8CCIIULgsk8RF20K', 'dieulefgg@gmail.com', 1, '2345678', 'le-thi-nd.jpg', 1, 'Bình Thuận', '2023-04-20 22:23:28', 1, '2023-10-17 03:58:34', 1, 0),
(18, 'ádfghjfg', 'sdfg', '$2y$10$bJXXu1k6sF50ZlT7SG3G5eCnj2ac56946UQPlH12FLNrM0.crVWo2', 'sdfg@gmail.com', 1, '1234567834', 'adfghjfg.jpeg', 1, 'Bình Thuận', '2023-04-20 22:25:06', 1, '2023-10-17 03:58:36', 1, 0),
(20, 'sdfsdf', 'sdfsdf', '$2y$10$1fMLTmemjkhFpa2794HNPOCikfjxOb/jw8IdQjzKCH8qdONW24I72', 'luyenpro567@gmail.com', 1, '0396202770', 'sdfsdf.png', 1, 'dyhchncgnnc', '2023-11-15 07:21:30', 1, '2023-11-15 07:21:30', 1, 1),
(21, 'sdfsdf', 'sdfsdf', '$2y$10$txODATpzup7hz6bpt.c55eFJTnTe.PVfExd8luLriYZ66axp8AMD.', 'luyenpro567@gmail.com', 1, '0396202770', 'sdfsdf.png', 1, 'dyhchncgnnc', '2023-11-15 07:21:42', 1, '2023-11-15 07:21:42', 1, 1),
(22, 'yhjsgbfhb', 'luyen', '$2y$10$DRfR605nYCsgqjyIrn3.DOjT8cMg6CKi5bvdV0bXZeNWptoSVXnXe', 'gvfd@gmail.com', 0, '25666655', 'yhjsgbfhb.png', 1, 'sdhfbsejhbefjhsvdhj', '2023-11-15 09:51:12', 1, '2023-11-15 09:51:12', 1, 1),
(23, 'yhjsgbfhb', 'luyen', '$2y$10$QH/TxR3S4nlCYgODawapjOb28yJ9fWeHbvuHJivWJYsdOG5ErtCYu', 'gvfd@gmail.com', 0, '25666655', 'yhjsgbfhb.png', 1, 'sdhfbsejhbefjhsvdhj', '2023-11-15 09:51:41', 1, '2023-11-15 09:53:53', 1, 0),
(24, 'yhjsgbfhb', 'luyen', '$2y$10$GNGcTLZz1Skw1ffESsUUBO784hi.MLZMArdOG1hbebwWq3K5qzc4i', 'gvfd@gmail.com', 0, '25666655', 'yhjsgbfhb.png', 1, 'sdhfbsejhbefjhsvdhj', '2023-11-15 09:51:45', 1, '2023-11-15 09:53:50', 1, 0),
(25, 'yhjsgbfhb', 'luyen', '$2y$10$eik46OR5mgDRIeWnzLfg2uu/E2fQAfK34wMitCvXntU1lZGkdg0Oe', 'gvfd@gmail.com', 0, '25666655', 'yhjsgbfhb.png', 1, 'sdhfbsejhbefjhsvdhj', '2023-11-15 09:52:29', 1, '2023-11-15 09:53:47', 1, 0);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dhl_brand`
--
ALTER TABLE `dhl_brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_category`
--
ALTER TABLE `dhl_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_config`
--
ALTER TABLE `dhl_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dhl_contact`
--
ALTER TABLE `dhl_contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_link`
--
ALTER TABLE `dhl_link`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dhl_menu`
--
ALTER TABLE `dhl_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_order`
--
ALTER TABLE `dhl_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_orderdetail`
--
ALTER TABLE `dhl_orderdetail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_post`
--
ALTER TABLE `dhl_post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_product`
--
ALTER TABLE `dhl_product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_slider`
--
ALTER TABLE `dhl_slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `dhl_topic`
--
ALTER TABLE `dhl_topic`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- AUTO_INCREMENT cho bảng `dhl_brand`
--
ALTER TABLE `dhl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `dhl_category`
--
ALTER TABLE `dhl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `dhl_config`
--
ALTER TABLE `dhl_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dhl_contact`
--
ALTER TABLE `dhl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên hệ', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `dhl_link`
--
ALTER TABLE `dhl_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `dhl_menu`
--
ALTER TABLE `dhl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Menu', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `dhl_order`
--
ALTER TABLE `dhl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dhl_orderdetail`
--
ALTER TABLE `dhl_orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã CT Đơn hàng', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dhl_post`
--
ALTER TABLE `dhl_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `dhl_product`
--
ALTER TABLE `dhl_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `dhl_slider`
--
ALTER TABLE `dhl_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Slider', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `dhl_topic`
--
ALTER TABLE `dhl_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã tài khoản', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
