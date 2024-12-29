-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 29, 2024 lúc 07:48 PM
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
-- Cơ sở dữ liệu: `electronics-shop-system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `apartment_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city`, `district`, `ward`, `apartment_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '264', '1980', '70510', '32434', '2024-12-13 18:03:19', '2024-12-13 18:03:33', NULL),
(2, 2, '201', '1492', '1A0508', '123', '2024-12-14 08:28:52', '2024-12-29 17:56:15', NULL),
(3, 3, '201', '1492', '1A0508', 'sssss', '2024-12-29 17:48:53', '2024-12-29 17:48:53', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Roco Wireless Headphone', '1735396762.png', 'Hot Deal In This Week', 1, '2024-12-28 14:39:22', '2024-12-28 14:39:22'),
(7, 'Smart Digital Watch', '1735396828.png', 'Hot Deal In This Week', 1, '2024-12-28 14:40:28', '2024-12-28 14:40:28'),
(8, 'Smart Digital Watch Xiaomi', '1735396869.png', 'Hot Deal In This Week', 1, '2024-12-28 14:41:09', '2024-12-28 14:41:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TOPRIGHT', NULL, NULL, NULL),
(2, 'Concorde', NULL, NULL, NULL),
(3, 'HILAND', NULL, NULL, NULL),
(4, 'LESVINA', NULL, NULL, NULL),
(5, 'GIANT', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `parent_id`, `slug`) VALUES
(1, 'Trang chủ', NULL, NULL, NULL, 0, 'user.home'),
(2, 'Giới thiệu', NULL, NULL, NULL, 0, 'user.introduction'),
(3, 'Sản phẩm', NULL, NULL, NULL, 0, 'product'),
(4, 'Tin tức', NULL, NULL, NULL, 0, 'user.news'),
(8, 'Điện thoại', '2024-12-14 08:07:51', '2024-12-14 08:07:51', NULL, 3, 'phone'),
(9, 'Games & Video', '2024-12-19 09:53:34', '2024-12-19 09:53:34', NULL, 3, 'game-video'),
(10, 'Computers', '2024-12-19 09:53:44', '2024-12-24 17:50:50', NULL, 3, 'computer'),
(11, 'Sports', '2024-12-24 17:10:19', '2024-12-24 17:10:19', NULL, 3, 'sports'),
(12, 'Camera', '2024-12-24 17:10:53', '2024-12-24 17:50:20', NULL, 3, 'camera-photo'),
(13, 'Smartwatches', '2024-12-24 17:11:47', '2024-12-24 17:12:02', NULL, 3, 'smartwatches'),
(14, 'HeadPhones', '2024-12-24 17:11:56', '2024-12-24 17:11:56', NULL, 3, 'headphones'),
(15, 'Laptops', '2024-12-24 17:26:11', '2024-12-24 17:26:11', NULL, 3, 'laptops');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trắng', NULL, NULL, NULL),
(2, 'Đen', NULL, NULL, NULL),
(3, 'Xám', NULL, NULL, NULL),
(4, 'Đỏ', NULL, NULL, NULL),
(5, 'Vàng', NULL, NULL, NULL),
(6, 'Xanh', NULL, NULL, NULL),
(7, 'Tím', NULL, NULL, NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_02_06_054552_create_roles_table', 1),
(3, '2023_02_06_093103_create_users_table', 1),
(4, '2023_02_06_093104_create_addresses_table', 1),
(5, '2023_02_09_141232_create_user_verifies_table', 1),
(6, '2023_02_17_101710_create_brands_table', 1),
(7, '2023_03_13_104142_create_colors_table', 1),
(8, '2023_03_13_104200_create_sizes_table', 1),
(9, '2023_03_15_111222_create_categories_table', 1),
(10, '2023_03_16_130121_create_products_table', 1),
(11, '2023_03_16_140642_create_products_color_table', 1),
(12, '2023_03_16_140906_create_products_size_table', 1),
(13, '2023_03_23_091419_create_payments_table', 1),
(14, '2023_03_23_095605_create_orders_table', 1),
(15, '2023_03_27_001440_create_order_details_table', 1),
(16, '2023_03_28_004112_alert_orders_table', 1),
(17, '2023_03_28_004113_alert_orders_table', 1),
(18, '2023_03_28_143413_alert_products_size_table', 1),
(19, '2023_03_28_144341_alert_products_color_table', 1),
(20, '2023_03_28_144345_alert_products_table', 1),
(21, '2023_03_28_144347_alert_orders_table', 1),
(22, '2023_03_28_144348_create_reduce_quantity_product_trigger', 1),
(23, '2023_03_28_144349_create_trigger_group_by_quantity', 1),
(24, '2023_04_11_111222_alter_categories_table', 1),
(25, '2023_04_11_111223_alter_categories_table', 1),
(26, '2023_04_13_114627_create_product_reviews_table', 1),
(27, '2023_04_13_114628_alter_products_size_table ', 1),
(28, '2023_04_17_180428_drop_personal_access_tokens_table', 1),
(29, '2023_04_18_180428_create_setting_table', 1),
(30, '2023_04_19_180428_alter_setting_table', 1),
(31, '2023_04_30_114628_alter_product_table ', 1),
(32, '2023_05_1_114628_alter_payments_table ', 1),
(33, '2024_12_14_211641_create_banners_table', 2),
(34, '2024_12_17_234559_add_priority_to_news_table', 3),
(35, '2024_12_19_140855_create_newsletters_table', 4),
(36, '2024_12_19_154156_remove_unique_from_email_in_newsletters_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Galaxy Watch 6 Classic giảm không tưởng đến 60%, trả chậm 0% lãi suất', 'Samsung Galaxy Watch6 Classic không chỉ là thiết bị hỗ trợ theo dõi sức khỏe với các tính năng đo nhịp tim, SpO2, phân tích thành phần cơ thể mà còn là món phụ kiện thời trang sang trọng, lịch lãm. Sở hữu thiết kế tinh tế với viền bezel xoay, dây đeo hybrid silicone phủ da và mặt kính Sapphire bền bỉ, đây là lựa chọn hoàn hảo cho mọi phong cách. Đặc biệt, Galaxy Watch6 Classic đang giảm giá sốc đến 60% khi mua kèm điện thoại - tablet Samsung, kèm theo đó ưu đãi trả chậm 0% lãi suất, cơ hội hấp dẫn để sở hữu chiếc smartwatch cao cấp này. Thời gian diễn ra: Dự kiến đến hết 31/12/2024.  Lưu ý:  Khuyến mãi có thể kết thúc sớm trước thời hạn nếu hết số lượng sản phẩm hoặc thông tin khuyến mãi có thay đổi. Ô sản phẩm chưa hiển thị ưu đãi chính xác, để hiện ưu đãi chính xác, khách cần bấm Xem chi tiết.', 0, NULL, '2024-12-29 17:21:12'),
(3, 'Ưu đãi lãi suất trả chậm từ 0% cho các sản phẩm Apple khi thanh toán qua MoMo', 'Mua sắm tại Thế Giới Di Động và tận hưởng ưu đãi lãi suất trả chậm hấp dẫn từ 0% cho các sản phẩm Apple khi thanh toán qua MoMo. Đây là cơ hội tuyệt vời để sở hữu những chiếc iPhone, iPad, MacBook mới nhất với các khoản trả góp linh hoạt, giúp bạn dễ dàng quản lý chi tiêu mà không lo về lãi suất cao. Đừng bỏ lỡ cơ hội mua sắm thông minh với những sản phẩm công nghệ hàng đầu tại Thế Giới Di Động, với hình thức thanh toán cực kỳ tiện lợi qua MoMo. Nội dung chương trình khuyến mãi Trong tháng 01/2025, ví trả sau Momo mang đến các chương trình lãi suất ưu đãi khi mua sản phẩm Apple như sau:  Trả trước từ 30% - 50% lãi suất 0% - kỳ hạn 3 và 9 tháng. Trả trước 20% lãi suất 0.5% - kỳ hạn 3, 6, 12 tháng. Trả trước 20% lãi suất 1% - kỳ hạn 6, 9, 12 tháng. Các lợi ích khi trả góp sản phẩm Apple qua ví trả sau MoMo tại TGDĐ Sản phẩm áp dụng:  Tất cả sản phẩm Apple mới tại TGDĐ: iPhone, iPad, Macbook, Apple Watch, Airpods, phụ kiện Apple,... Áp dụng các sản phẩm từ 3.75 triệu đồng đồng trở lên. Mỗi đơn hàng chỉ trả góp 1 sản phẩm. Các đặc điểm nổi trội của chương trình:  Trả trước chỉ từ 20% giá trị sản phẩm. Kỳ hạn trả góp đa dạng: 6, 12, 18, 24 tháng. Xét duyệt hạn mức online 100%, hạn mức lên đến 100 triệu đồng. Có thể mua nhiều sản phẩm, nhiều đơn hàng trả góp, miễn là còn hạn mức. Áp dụng trả góp trên giá khuyến mãi.', 1, NULL, '2024-12-29 17:23:27'),
(4, 'Miễn Phí Giao Hàng', 'Miễn phí giao hàng nội thành Hà Nội cho đơn hàng từ 3 triệu đồng!', 2, NULL, NULL),
(5, 'Ưu Đãi Sửa Chữa và Bảo Dưỡng', 'Giảm giá sửa chữa và bảo dưỡng xe đạp, ưu đãi lên đến 20%.', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'n.hieuthanhps@gmail.com', '2024-12-19 08:29:22', '2024-12-19 08:29:22'),
(2, 'n.hieuthanhps@gmail.com', '2024-12-19 08:46:36', '2024-12-19 08:46:36'),
(3, 'n.hieuthanhps@gmail.com', '2024-12-19 08:46:47', '2024-12-19 08:46:47'),
(4, 'n.hieuthanhps@gmail.com', '2024-12-19 08:47:15', '2024-12-19 08:47:15'),
(5, 'n.hieuthanhps@gmail.com', '2024-12-19 08:48:58', '2024-12-19 08:48:58'),
(6, 'n.hieuthanhps@gmail.com', '2024-12-19 08:50:29', '2024-12-19 08:50:29'),
(7, 'n.hieuthanhps@gmail.com', '2024-12-27 09:51:15', '2024-12-27 09:51:15'),
(8, 'n.hieuthanhps@gmail.com', '2024-12-27 09:51:19', '2024-12-27 09:51:19'),
(9, 'n.hieuthanhps@gmail.com', '2024-12-27 09:52:33', '2024-12-27 09:52:33'),
(10, 'n.hieuthanhps@gmail.com', '2024-12-27 09:52:38', '2024-12-27 09:52:38'),
(11, 'n.hieuthanhps@gmail.com', '2024-12-27 09:55:05', '2024-12-27 09:55:05'),
(12, 'n.hieuthanhps@gmail.com', '2024-12-27 09:55:10', '2024-12-27 09:55:10'),
(13, 'n.hieuthanhps@gmail.com', '2024-12-27 09:59:22', '2024-12-27 09:59:22'),
(14, 'n.hieuthanhps@gmail.com', '2024-12-27 09:59:27', '2024-12-27 09:59:27'),
(15, 'n.hieuthanhps@gmail.com', '2024-12-27 10:09:32', '2024-12-27 10:09:32'),
(16, 'n.hieuthanhps@gmail.com', '2024-12-27 10:09:37', '2024-12-27 10:09:37'),
(17, 'n.hieuthanhps@gmail.com', '2024-12-27 10:13:12', '2024-12-27 10:13:12'),
(18, 'n.hieuthanhps@gmail.com', '2024-12-27 10:13:17', '2024-12-27 10:13:17'),
(19, 'n.hieuthanhps@gmail.com', '2024-12-27 10:15:44', '2024-12-27 10:15:44'),
(20, 'n.hieuthanhps@gmail.com', '2024-12-27 10:15:49', '2024-12-27 10:15:49'),
(21, 'n.hieuthanhps@gmail.com', '2024-12-27 10:19:15', '2024-12-27 10:19:15'),
(22, 'n.hieuthanhps@gmail.com', '2024-12-27 10:19:19', '2024-12-27 10:19:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `total_money` double NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `transport_fee` double NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `total_money`, `order_status`, `created_at`, `updated_at`, `deleted_at`, `transport_fee`, `note`, `payment_status`) VALUES
(1734462918481, 2, 3, 2000000, 3, '2024-12-17 19:16:09', '2024-12-17 19:16:55', NULL, 0, 'đã giao hàng', 0),
(1735186595609, 2, 1, 233430000, 0, '2024-12-26 04:16:35', '2024-12-26 04:16:35', NULL, 0, NULL, 0),
(1735287320136, 2, 1, 72000000, 0, '2024-12-27 08:15:20', '2024-12-27 08:15:20', NULL, 0, NULL, 0),
(1735289443123, 2, 3, 24000000, 3, '2024-12-27 08:51:26', '2024-12-27 08:52:22', NULL, 0, 'đã giao hàng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_size_id`, `unit_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1734462918481, 1, 2000000, 1, '2024-12-17 19:16:09', '2024-12-17 19:16:09'),
(2, 1735186595609, 24, 233430000, 1, '2024-12-26 04:16:35', '2024-12-26 04:16:35'),
(3, 1735287320136, 26, 24000000, 3, '2024-12-27 08:15:20', '2024-12-27 08:15:20'),
(4, 1735289443123, 26, 24000000, 1, '2024-12-27 08:51:26', '2024-12-27 08:51:26');

--
-- Bẫy `order_details`
--
DELIMITER $$
CREATE TRIGGER `group_by_quantity` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
                declare _record int;
                declare _quantity int;
                select count(*) into _record from order_details where product_size_id = new.product_size_id and order_id = new.order_id;
                if (_record >= 2) then
                    select sum(quantity) into _quantity from order_details where product_size_id = new.product_size_id and order_id = new.order_id;
                    update order_details set quantity = _quantity where product_size_id = new.product_size_id and order_id = new.order_id;
                    SIGNAL sqlstate "45001" set message_text = "error";
                end if;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `reduce_quantity_product` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
                    declare _quantity int;
                    select quantity into _quantity from products_size where id = new.product_size_id;
                    if (new.quantity <= 0 || _quantity < new.quantity) then
                        SIGNAL sqlstate "45001" set message_text = "error";
                    else
                        update products_size set quantity = _quantity - new.quantity where id = new.product_size_id;
                    end if;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `status`, `img`) VALUES
(1, 'Khi nhận hàng', NULL, NULL, NULL, 1, '1682960154.png'),
(2, 'Ví điện tử Momo', NULL, NULL, NULL, 0, '1682960202.png'),
(3, 'VNPAY', NULL, '2023-09-17 10:15:35', NULL, 1, '1694970935.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `price_import` double NOT NULL,
  `price_sell` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price_import`, `price_sell`, `img`, `description`, `status`, `category_id`, `brand_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Camera IP Wifi Xiaomi H6C Pro 2MP - Chính hãng', 1000000, 2000000, '1735062862.png', '<div class=\"panel-title\" style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); position: relative; font-family: Quicksand, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 20px 0px; font-weight: bold; font-size: 15px; text-transform: uppercase; cursor: pointer;\"><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\"><b>An ninh thông minh cho mọi gia đình</b></p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\">Bước vào thế giới an ninh gia đình nâng cao với H6c Pro mới nhất. Nhờ tính năng quay quét và tuần tra các điểm nhìn, camera thông minh này sẽ tự động ghi lại mọi ngóc ngách mà không bỏ sót chi tiết nào. Nhạy bén chưa từng có trước chuyển động của con người và những tiếng động bất ngờ, thiết bị đưa khả năng theo dõi lên những tầm cao mới. Với thiết kế mới là nút chạm cảm ứng để gọi, H6c Pro đảm bảo bạn luôn kết nối với gia đình mình dù bạn ở xa.</p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-transform: none; text-align: center;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/04/24/wifi-ezviz-h6c-pro-2mp.png\" style=\"max-width: 100%;\"><br></p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\"><b>Nâng cao khả năng bảo vệ hình ảnh trực quan ở mọi góc độ</b></p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\">H6c Pro mang đến tầm nhìn toàn cảnh bên trong ngôi nhà của bạn. Thiết bị có thể xoay khéo léo để bắt trọn mọi chi tiết trong phòng của bạn, chẳng hạn như vị trí của trẻ nhỏ hoặc thú cưng đang chạy nhảy, bảo vệ ngôi nhà của bạn cả ngày lẫn đêm.</p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/04/24/wifi-ezviz-h6c-pro-2mp-1.png\" style=\"max-width: 100%;\"><br></p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none;\">Với chế độ tuần tra độc đáo, H6c Pro tự động quay quét góc nhìn để loại bỏ các điểm mù. Hơn nữa, bạn có thể tùy chỉnh việc tuần tra phù hợp với ngôi nhà đặc biệt của mình để quan sát không bỏ sót góc nhìn nào.</p><div><br></div></h2></div>', 1, 12, 3, '2024-12-17 18:44:27', '2024-12-26 10:38:22', NULL),
(2, 'Laptop ASUS X515MA-BR481W (N4020/4GB/256GB/15.6HD/WIN11/Bạc) - Chính hãng', 1000000, 20000000, '1735209445.png', '<div class=\"panel-title\" style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); position: relative; font-family: Quicksand, sans-serif;\"><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 20px 0px; font-weight: bold; font-size: 15px; text-transform: uppercase; cursor: pointer;\"><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Laptop ASUS X515MA-BR481W</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> là một chiếc laptop thuộc phân khúc tầm trung có thiết kế trẻ trung và hiệu năng ổn định. Với màn hình khung rộng, kích thước </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">15.6 inch</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> mở rộng, màn hình chuẩn </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">HD (1366 x 768 px) </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">trang bị công nghệ chống chói </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Anti Glare</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">. Và hiệu năng được hỗ trợ bởi </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">chip Intel Celeron N4020</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> và </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">RAM 4 GB</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">. Máy có khả năng hiển thị hình ảnh rõ ràng, sống động từng chi tiết và khả năng xử lý các tác vụ văn phòng cơ bản với tốc độ cao. Đây là một sản phẩm phù hợp với nhiều đối tượng người dùng, đặc biệt là học sinh, sinh viên.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Đặc điểm nổi bật:</span></p><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none; margin-bottom: 0px; padding-inline-start: 48px;\"><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Chất lượng hình ảnh ấn tượng với kích thước 15.6 inch chuẩn HD, hỗ trợ tần số quét 60Hz và trang bị công nghệ chống chói Anti Glare.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Trang bị chip Intel Celeron N4020 mang lại cấu hình ổn định để xử lý tốc độ cao các tác vụ văn phòng cơ bản.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">RAM 4GB DDR4, 256GB SSD hỗ trợ nâng cấp tối đa 2 TB tích hợp đồ họa Intel UHD Graphics 600 cho hiệu năng mạnh mẽ.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Khả năng kết nối đa dạng và thuận tiện với các cổng HDMI, USB 3.0, USB 2.0.</span></p></li><li dir=\"ltr\" aria-level=\"1\" style=\"list-style-type: disc; font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space: pre;\"><p dir=\"ltr\" role=\"presentation\" style=\"line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\">Thời lượng PIN có thể kéo dài đến 8 tiếng sử dụng liên tục, đảm bảo cho việc sử dụng máy khi ra ngoài.</span></p><p dir=\"ltr\" role=\"presentation\" style=\"text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/08/30/laptop-asus-x515ma-br481w-01.jpg\" alt=\"Laptop ASUS X515MA-BR481W.\" title=\"Laptop ASUS X515MA-BR481W.\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; text-wrap-mode: wrap;\"><br></span></p></li></ul></h2><h2 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 18pt; font-weight: 700; white-space-collapse: preserve;\">Đánh giá những điểm nổi bật của Laptop ASUS X515MA-BR481W</span></h2><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 20px 0px; font-weight: bold; font-size: 15px; text-transform: uppercase; cursor: pointer;\"><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; font-weight: 500; text-align: justify; text-transform: none; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Đây sẽ là một sự lựa chọn hợp lý cho người dùng cần một chiếc laptop để xử lý các tác vụ cơ bản hàng ngày với cấu hình ổn định, hiệu suất cao trong tầm giá. Đồng thời cũng đảm bảo về tính thẩm mỹ với thiết kế hiện đại, tối giản nhưng không kém phần sang trọng.</span></p></h2></div>', 1, 15, 3, '2024-12-19 09:18:50', '2024-12-26 10:37:25', NULL),
(3, 'Máy chơi Game Tay cầm chơi Game Sony PS5 DualSense Cosmic Red (CFI-ZCT1G 02)', 100000, 200000, '1735062781.png', '<p class=\"MsoNormal\" align=\"center\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin-bottom: 6pt; text-align: center; line-height: 19.5px;\"><b><span lang=\"vi\" style=\"font-size: 22pt; line-height: 44px;\">Mua Tay cầm Sony PS5 DualSense Cosmic Red CFI-ZCT1G 02 giá rẻ chính hãng tại Hoàng Hà Mobile<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\">Chỉ mới ra mắt được một thời gian ngắn nhưng tay cầm Sony PS5 DualSense đã “được lòng” rất nhiều game thủ. Nhờ cung cấp các tính năng vượt trội như:&nbsp;</span><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px; color: rgb(51, 62, 72); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Dynamic Adaptive Trigger (Bộ kích hoạt thích ứng động với nút cò Trigger), Haptic Feedback (Phản hồi rung) hay Jack Audio, thiết kế hoàn chỉnh này đã nâng tầm trải nghiệm đa dạng các tựa game.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><b><span lang=\"vi\" style=\"font-size: 18pt; line-height: 36px; color: rgb(51, 62, 72); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Adaptive Triggers<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><b><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\">Cụm phím Trigger</span></b><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\">&nbsp;mô phỏng lực của các hành động như bóp cò súng, kéo tên bắn….đem đến cảm giác chân thật cho người dùng khi chơi.</span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/04/25/11.png\" style=\"max-width: 100%;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><br></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"></span><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><b><span lang=\"vi\" style=\"font-size: 18pt; line-height: 36px;\">Phản hồi rung<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\">Thông qua&nbsp;<b>mô tơ rung</b>&nbsp;được trang bị, tay cầm DualSense mô phỏng các tương tác vật lý như người dùng đang ở trong game. Góp phần cho những trải nghiệm sống động hơn trong việc giải trí.<o:p></o:p></span></p><div><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><br></span></div><div style=\"margin: 0px; padding: 0px; max-width: 100%; color: rgb(37, 42, 43); font-family: Quicksand, sans-serif; font-size: 14px;\"><div style=\"margin: 0px; padding: 0px; max-width: 100%;\"></div></div>', 1, 9, 4, '2024-12-19 09:20:50', '2024-12-26 10:34:23', NULL),
(4, 'Tai nghe trẻ em Oaxis myFirst Headphones Bone Conductor Wireless', 2000000, 2323000, '1735209191.png', '<h2 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify;\"><strong>Oaxis myFirst Headphones Bone Conductor Wireless: Tai Nghe Không Dây An Toàn Cho Trẻ Em</strong></h2><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify;\"><strong>Giới thiệu sản phẩm</strong>:</h3><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\">Tai nghe&nbsp;<strong>Oaxis myFirst Headphones Bone Conductor Wireless</strong>&nbsp;là một sự lựa chọn hoàn hảo cho các bậc cha mẹ muốn mang đến trải nghiệm âm thanh an toàn và chất lượng cho con em mình. Với công nghệ truyền âm qua xương hiện đại, sản phẩm giúp bảo vệ đôi tai của trẻ em khỏi những tác động tiêu cực, đồng thời vẫn cung cấp âm thanh rõ ràng và sắc nét.</p><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify;\"><strong>Đặc Điểm Nổi Bật</strong>:</h3><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><p><strong>Công nghệ truyền âm qua xương</strong>: Tai nghe sử dụng công nghệ độc đáo này để truyền âm thanh qua gò má thay vì qua tai, giúp giảm nguy cơ tổn thương thính giác cho trẻ, đặc biệt khi sử dụng trong thời gian dài.</p></li><li><p><strong>Âm lượng an toàn</strong>: Với thiết kế đặc biệt dành cho trẻ em, tai nghe có âm lượng tối đa 85dB, giúp bảo vệ đôi tai nhạy cảm của trẻ khỏi những âm thanh quá lớn và duy trì sức khỏe thính giác lâu dài.</p></li><li><p><strong>Thiết kế nhẹ và thoải mái</strong>: Tai nghe có trọng lượng siêu nhẹ chỉ 26g, với kích thước phù hợp cho trẻ, đảm bảo sự thoải mái khi đeo trong nhiều giờ liền mà không gây cảm giác khó chịu.</p></li><li><p><strong>Kết nối không dây tiện lợi</strong>: Tai nghe tương thích với mọi thiết bị có hỗ trợ Bluetooth, giúp trẻ dễ dàng sử dụng và kết nối nhanh chóng ở khoảng cách lên đến 10m.</p></li><li><p><strong>Thời lượng pin ấn tượng</strong>: Với thời gian sử dụng lên đến 18 giờ sau mỗi lần sạc đầy chỉ khoảng 2 giờ, tai nghe đáp ứng đủ nhu cầu nghe nhạc, học tập hay giải trí suốt ngày dài của trẻ.</p></li><li><p><strong>Dễ dàng điều khiển</strong>: Sản phẩm tích hợp điều khiển cảm ứng, giúp trẻ dễ dàng thao tác mà không cần sự trợ giúp từ người lớn.</p></li></ul><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify;\"><strong>Lợi Ích Khi Sử Dụng Oaxis myFirst Headphones</strong>:</h3><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><p><strong>Bảo vệ thính giác trẻ em</strong>: Công nghệ truyền âm qua xương và giới hạn âm lượng tối đa đảm bảo tai trẻ không bị ảnh hưởng bởi âm thanh quá lớn.</p></li><li><p><strong>Thời gian sử dụng lâu dài</strong>: Với thời lượng pin kéo dài lên đến 18 giờ, tai nghe sẽ đồng hành cùng trẻ suốt cả ngày mà không cần lo lắng về việc hết pin.</p></li><li><p><strong>Thiết kế thân thiện và an toàn</strong>: Sản phẩm nhẹ nhàng và tiện lợi, phù hợp với kích thước đầu của trẻ, không gây áp lực hay khó chịu khi sử dụng trong thời gian dài.</p></li></ul><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify;\"><strong>Kết Luận</strong>:</h3><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\">Tai nghe&nbsp;<strong>Oaxis myFirst Headphones Bone Conductor Wireless</strong>&nbsp;là lựa chọn hàng đầu cho các bậc phụ huynh mong muốn bảo vệ và chăm sóc đôi tai của con mình. Với thiết kế thông minh, công nghệ hiện đại, và tính năng an toàn, sản phẩm không chỉ mang đến trải nghiệm âm thanh tuyệt vời mà còn đảm bảo sức khỏe thính giác cho trẻ em.</p>', 1, 14, 5, '2024-12-19 09:23:19', '2024-12-26 10:33:11', NULL),
(5, 'Loa Xiaomi Bluetooth Speaker Mini 2', 1200000, 1200000, '1735062720.png', '<h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Tính Năng Nổi Bật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Âm thanh chất lượng cao</strong>: Công nghệ âm thanh tiên tiến mang đến âm thanh trong trẻo, âm bass mạnh mẽ.</li><li><strong>Thiết kế nhỏ gọn, tinh tế</strong>: Dễ dàng mang theo, phù hợp với mọi không gian và phong cách.</li><li><strong>Kết nối Bluetooth ổn định</strong>: Bluetooth 5.3 cho kết nối nhanh.</li><li><strong>Pin bền bỉ</strong>: Thời gian sử dụng liên tục lên đến 11 giờ chỉ với một lần sạc.</li><li><strong>Điều khiển tiện lợi</strong>: Nút bấm tích hợp, hỗ trợ trả lời cuộc gọi, phát/dừng nhạc.</li></ul><hr style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Thông Số Kỹ Thuật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Model</strong>: Xiaomi Bluetooth Speaker Mini</li><li><strong>Kích thước</strong>:&nbsp;103 x 73 x 73mm</li><li><strong>Trọng lượng</strong>: 330g</li><li><strong>Bluetooth</strong>: 5.3</li><li><strong>Dung lượng pin</strong>: 2000mAh</li><li><strong>Thời gian hoạt động</strong>: Tối đa 11 giờ</li></ul><hr style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Đặc Điểm Nổi Bật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Âm thanh 360°</strong>: Phân tán âm thanh đều, lý tưởng cho không gian nhỏ và ngoài trời.</li><li><strong>Tích hợp micro</strong>: Thu âm rõ ràng, hỗ trợ đàm thoại rảnh tay.</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; max-width: 100%; color: rgb(37, 42, 43); font-family: Quicksand, sans-serif; font-size: 14px; text-align: justify;\"><br></p>', 1, 10, 5, '2024-12-19 09:26:16', '2024-12-26 10:32:00', NULL),
(6, 'Loa Xiaomi Bluetooth Speaker Mini', 1233333, 123213213, '1735062697.png', '<div style=\"margin: 0px; padding: 0px; max-width: 100%; color: rgb(37, 42, 43); font-family: Quicksand, sans-serif; font-size: 14px;\"><h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Tính Năng Nổi Bật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Âm thanh chất lượng cao</strong>: Công nghệ âm thanh tiên tiến mang đến âm thanh trong trẻo, âm bass mạnh mẽ.</li><li><strong>Thiết kế nhỏ gọn, tinh tế</strong>: Dễ dàng mang theo, phù hợp với mọi không gian và phong cách.</li><li><strong>Kết nối Bluetooth ổn định</strong>: Bluetooth 5.3 cho kết nối nhanh.</li><li><strong>Pin bền bỉ</strong>: Thời gian sử dụng liên tục lên đến 11 giờ chỉ với một lần sạc.</li><li><strong>Điều khiển tiện lợi</strong>: Nút bấm tích hợp, hỗ trợ trả lời cuộc gọi, phát/dừng nhạc.</li></ul><hr style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Thông Số Kỹ Thuật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Model</strong>: Xiaomi Bluetooth Speaker Mini</li><li><strong>Kích thước</strong>:&nbsp;103 x 73 x 73mm</li><li><strong>Trọng lượng</strong>: 330g</li><li><strong>Bluetooth</strong>: 5.3</li><li><strong>Dung lượng pin</strong>: 2000mAh</li><li><strong>Thời gian hoạt động</strong>: Tối đa 11 giờ</li></ul><hr style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><h4 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Đặc Điểm Nổi Bật</strong></h4><ul style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><li><strong>Âm thanh 360°</strong>: Phân tán âm thanh đều, lý tưởng cho không gian nhỏ và ngoài trời.</li><li><strong>Tích hợp micro</strong>: Thu âm rõ ràng, hỗ trợ đàm thoại rảnh tay.</li></ul></div>', 1, 10, 4, '2024-12-19 09:51:45', '2024-12-26 10:30:49', NULL),
(7, 'Bàn phím cơ gaming MSI FORGE GK100 - Chính hãng', 2132, 3212131, '1735062409.png', '<p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\"><strong>Giới thiệu Bàn Phím Gaming MSI FORGE GK100 (Màu Đen)</strong></p><p style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify;\">Bàn phím gaming MSI FORGE GK100 là sự lựa chọn lý tưởng cho game thủ và những người sáng tạo nội dung, mang đến trải nghiệm gõ phím tuyệt vời với công tắc bền bỉ có khả năng chịu đựng lên đến 10 triệu lần nhấn. Được thiết kế với công thái học thông minh, bàn phím này giúp người dùng cảm thấy thoải mái ngay cả trong những giờ làm việc hoặc chơi game dài đẳng.</p><div style=\"margin: 0px; padding: 0px; max-width: 100%; color: rgb(37, 42, 43); font-family: Quicksand, sans-serif; font-size: 14px;\"><div style=\"margin: 0px; padding: 0px; max-width: 100%;\"></div></div>', 1, 15, 1, '2024-12-19 09:54:12', '2024-12-26 10:29:34', NULL),
(8, 'Tay cầm chơi game có dây Rapoo V600 - Chính hãng', 2132000, 233430000, '1735062385.png', '<div style=\"margin: 0px; padding: 0px; max-width: 100%; color: rgb(37, 42, 43); font-family: Quicksand, sans-serif; font-size: 14px;\"><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Tay cầm chơi game có dây Rapoo V600 sở hữu&nbsp;<b>thiết kế công thái học</b>, tích hợp chức năng&nbsp;<b>rung kép</b>. Ngoài ra, tay cầm còn được trang bị hàng loạt n<b>út bấm game dễ bấm, dễ chuyển đổi chức năng</b>, giúp người chơi có trải nghiệm chơi game tốt nhất.</font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/09/21/rapoo-v600.jpg\" alt=\"Tay cầm chơi game có dây Rapoo V600\" style=\"max-width: 100%;\"></font></p><h2 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; margin-top: 0in; line-height: 29.25px;\"><b><span lang=\"vi\" style=\"font-size: 18pt; line-height: 36px;\"><font color=\"#000000\">Tay cầm chơi game có dây Rapoo V600 hiện đại và đa chức năng<o:p></o:p></font></span></b></h2><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Tay cầm chơi game có dây Rapoo V600 là sự kết hợp của các chức năng đa dạng và thông minh, cho người chơi có những trải nghiệm khác biệt.<o:p></o:p></font></span></p><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; margin: 0in 0in 6pt; line-height: 22.815px;\"><font color=\"#000000\"><a name=\"_7u8lvubsegu4\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"></a><b><span lang=\"vi\" style=\"font-size: 16pt; line-height: 32px;\">Sở hữu hình dáng công thái học và dễ cầm<o:p></o:p></span></b></font></h3><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Thiết kế công thái học của Rapoo V600 là nhờ sự kết hợp của bộ cảm ứng kép và các nút bấm cổ điển. Từ đó, hãng đã tạo ra một sản phẩm với sự kết hợp hoàn hảo giữa thẩm mỹ và sự thoải mái, giúp người chơi có trải nghiệm tốt dù chơi game trong thời gian dài. Các nút bấm cũng có thiết kế khá thân thiện, dễ bấm để dễ dàng giành chiến thắng trong trò chơi.</font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/09/21/rapoo-v600-1.jpg\" alt=\"Rapoo V600 - Sở hữu hình dáng công thái học và dễ cầm\" style=\"max-width: 100%;\"><br></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"></span><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><o:p></o:p></span></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Hình dạng tổng quát của sản phẩm được chăm chút tỉ mỉ, với thiết kế tổng quan bo tròn, không gây cảm giác bị cấn khi cầm. Bề mặt tay cầm có độ mượt và kết cấu mờ đặc biệt. Đặc biệt, các mặt chống trơn trượt giúp bạn giữ chắc sản phẩm trong tay và cải thiện đáng kể khả năng kiểm soát trò chơi.<o:p></o:p></font></span></p><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; margin: 0in 0in 6pt; line-height: 22.815px;\"><font color=\"#000000\"><a name=\"_4olmsjv6dlbp\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"></a><b><span lang=\"vi\" style=\"font-size: 16pt; line-height: 32px;\">Chế độ rung phản ánh hoàn hảo mọi va chạm game<o:p></o:p></span></b></font></h3><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Với động cơ bên trái được tích hợp chế độ rung mạnh, tay cầm chơi game có dây Rapoo V600 mang đến cho bạn trải nghiệm thú vị về cảm giác từng va chạm và cháy nổ trong các trò chơi được hỗ trợ. Riêng với chế độ rung nhẹ, tay cầm chơi game có dây Rapoo V600 cung cấp phản hồi chính xác về mọi lực ma sát và cú đánh trong các trò chơi được hỗ trợ.<o:p></o:p></font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Bên cạnh đó, khả năng kết nối không dây 2.4GHz trên tay cầm giúp bạn tận hưởng sự chính xác tối đa trong trải nghiệm chơi game. Đồng thời nó tăng khả năng kết nối nhanh chóng, mang đến cho bạn trải nghiệm chơi game mượt mà và thuận tiện hơn bao giờ hết.</font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/09/21/rapoo-v600-2.jpg\" alt=\"Rapoo V600 - Chế độ rung phản ánh hoàn hảo mọi va chạm game\" style=\"max-width: 100%;\"><br></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"></span><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><o:p></o:p></span></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Tay cầm chơi game có dây Rapoo V600 được kết nối bằng cổng USB. Nó tương thích với tất cả trò chơi trên hệ thống Windows, PC 360 Games, PlayStation 3 và Android 4.0. Nó hỗ trợ hầu hết các tựa game được yêu thích hiện nay. Chẳng hạn như bạn có thể kết nối để chơi PES, Need for Speed, Devil May Cry, FIFA online, Resident Evil, Grand Theft Auto, Tomb Raider, Street Fighter, Naruto…Bạn có thể tải xuống game trong trình điều khiển từ trang web của Rapoo và cập nhật để tối ưu hóa hiệu suất của tay cầm chơi game.<o:p></o:p></font></span></p><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; margin: 0in 0in 6pt; line-height: 22.815px;\"><font color=\"#000000\"><a name=\"_9y4i91o1clzv\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"></a></font></h3><h3 style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; margin: 0in 0in 6pt; line-height: 22.815px;\"><b><span lang=\"vi\" style=\"font-size: 16pt; line-height: 32px;\"><font color=\"#000000\">Sở hữu các nút bấm giao diện trực quan và dễ sử dụng<o:p></o:p></font></span></b></h3><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Với một phím điều hướng D-pad tám chiều và hai cần analog, tay cầm chơi game có dây Rapoo V600 đảm bảo khả năng thao tác với độ chính xác cực cao. Cụm nút Y, B, A, X trên tay cầm có 4 màu sắc độc đáo khác biệt. Ngoài ra, nút điều hướng D-pad dạng chữ thập đã được cải tiến để khắc phục nhược điểm tồn tại trên Xbox 360, giúp người chơi tăng tốc độ và sự chính xác trong thao tác. Đồng thời người dùng có thể dễ dàng điều khiển mọi chuyển động một cách tự nhiên và nhạy bén.</font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/09/21/rapoo-v600-3.jpg\" alt=\"Rapoo V600 - Sở hữu các nút bấm giao diện trực quan và dễ sử dụng\" style=\"max-width: 100%;\"><br></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><font color=\"#000000\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"></span><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><o:p></o:p></span></font></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Nút X/D/A trên tay cầm chơi game có dây Rapoo V600 cho phép bạn dễ dàng chuyển đổi giữa ba chế độ. Bạn có thể sử dụng chế độ XInput (X) để chơi game gamepad thế hệ mới trên PC Windows, sử dụng chế độ DirectInput (D) để chơi các game gamepad cổ điển trên PC Windows.<o:p></o:p></font></span></p><p class=\"MsoNormal\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; margin-bottom: 6pt; line-height: 19.5px;\"><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\">Nút TUR trên tay cầm Rapoo V600 sẽ bán tự động kích hoạt và tự động tắt các chức năng bắn nhanh. Về nút VIB, chúng cho phép bạn bật/tắt chế độ rung.<o:p></o:p></font></span></p><div><span lang=\"vi\" style=\"font-size: 12pt; line-height: 24px;\"><font color=\"#000000\"><br></font></span></div></div>', 1, 9, 3, '2024-12-19 09:56:19', '2024-12-26 10:26:33', NULL);
INSERT INTO `products` (`id`, `name`, `price_import`, `price_sell`, `img`, `description`, `status`, `category_id`, `brand_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Tai nghe True Wireless JBL Tune Beam 2', 2390000, 24000000, '1735205723.png', '<p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><a href=\"https://hoanghamobile.com/tai-nghe/tai-nghe-true-wireless-jbl-tune-beam-2\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(56, 118, 29); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Tai nghe True Wireless JBL Tune Beam 2</span></a><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> không chỉ đơn thuần là một chiếc </span><a href=\"https://hoanghamobile.com/tai-nghe\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(56, 118, 29); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">tai nghe Bluetooth</span></a><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> mà còn là sự kết hợp hoàn hảo giữa công nghệ âm thanh tiên tiến và thiết kế thông minh. Với nhiều tính năng đột phá </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">driver dynamic</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> kích thước </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">10mm</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, khả năng kháng nước</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> IP54</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, khả năng </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">chống ồn chủ động (ANC)</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, sản phẩm này không chỉ mang lại trải nghiệm âm nhạc ấn tượng mà còn hỗ trợ người dùng trong các hoạt động thường nhật, từ công việc đến giải trí. Để hiểu rõ hơn về lý do tại sao sản phẩm này được đánh giá cao trong thị trường tai nghe không dây, hãy cùng khám phá chi tiết từng khía cạnh nổi bật của sản phẩm.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-3.jpg\" alt=\"Tai nghe True Wireless JBL Tune Beam 2 là sự kết hợp hoàn hảo giữa công nghệ âm thanh tiên tiến và thiết kế thông minh\" title=\"Tai nghe True Wireless JBL Tune Beam 2 là sự kết hợp hoàn hảo giữa công nghệ âm thanh tiên tiến và thiết kế thông minh\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><h2 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 18pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Đánh giá chi tiết các tính năng đặc biệt của Tai nghe True Wireless JBL Tune Beam 2</span></h2><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">JBL Tune Beam 2 là sự lựa chọn lý tưởng cho những ai cần một thiết bị đeo thông minh không chỉ mạnh mẽ, bền bỉ mà còn mang đến nhiều tính năng cao cấp. Với khả năng cho trải nghiệm âm thanh tuyệt vời, hỗ trợ các tính năng liên lạc và âm thanh đỉnh cao, tích hợp các tính năng kết nối tai nghe, sản phẩm này thực sự đáng giá cho những ai yêu thích thể thao và các hoạt động âm thanh giải trí.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Thiết kế công thái học và khả năng kháng nước, bụi IP54</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Thiết kế của tai nghe True Wireless JBL Tune Beam 2 mang lại sự cân bằng tuyệt vời giữa thẩm mỹ và tính tiện dụng. Tai nghe được thiết kế nhỏ gọn với kiểu dáng vừa vặn ôm sát tai, giúp giảm áp lực khi đeo trong thời gian dài.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Sản phẩm đi kèm với ba bộ eartips khác nhau, đảm bảo phù hợp với mọi kích cỡ tai. Nhờ trọng lượng nhẹ chỉ 5.2g mỗi bên, bạn hầu như không cảm thấy sự hiện diện của tai nghe khi sử dụng, điều này cực kỳ hữu ích cho những ai thường xuyên phải đeo tai nghe cả ngày.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-5.jpg\" alt=\"Thiết kế của tai nghe True Wireless JBL Tune Beam 2 mang lại sự cân bằng tuyệt vời giữa thẩm mỹ và tính tiện dụng\" title=\"Thiết kế của tai nghe True Wireless JBL Tune Beam 2 mang lại sự cân bằng tuyệt vời giữa thẩm mỹ và tính tiện dụng\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Điều đặc biệt là JBL Tune Beam 2 đạt chuẩn </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">kháng bụi và nước IP54</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, cho phép bạn yên tâm sử dụng tai nghe trong nhiều điều kiện khác nhau. Dù bạn đang tập luyện thể thao với mồ hôi ra nhiều, di chuyển trong điều kiện thời tiết không thuận lợi hoặc làm việc ở môi trường bụi bặm, sản phẩm vẫn duy trì hiệu suất ổn định. Đây là một lợi thế lớn giúp </span><a href=\"https://hoanghamobile.com/tai-nghe/jbl\" style=\"color: rgb(253, 71, 90); cursor: pointer;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(56, 118, 29); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">tai nghe JBL</span></a><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> này phù hợp với người dùng năng động và có lối sống bận rộn.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Tai nghe True Wireless JBL Tune Beam 2 cho âm thanh đỉnh cao với JBL Pure Bass và JBL Spatial Sound</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Một trong những lý do khiến JBL Tune Beam 2 trở thành tâm điểm chú ý là khả năng tái tạo âm thanh vượt trội. Với driver dynamic kích thước 10mm, sản phẩm mang đến dải bass sâu, mạnh mẽ nhưng vẫn giữ được sự cân bằng với âm mid và treble. Đây chính là điểm mạnh từ công nghệ âm thanh </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">JBL Pure Bass</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, thương hiệu đã làm nên tên tuổi của JBL.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-2.jpg\" alt=\"Tai nghe True Wireless JBL Tune Beam 2 cho âm thanh đỉnh cao với JBL Pure Bass và JBL Spatial Sound\" title=\"Tai nghe True Wireless JBL Tune Beam 2 cho âm thanh đỉnh cao với JBL Pure Bass và JBL Spatial Sound\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Công nghệ </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">JBL Spatial Sound </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">trên tai nghe True Wireless JBL Tune Beam 2 là yếu tố giúp trải nghiệm nghe nhạc của bạn trở nên sống động hơn. Không chỉ dừng lại ở âm thanh stereo truyền thống, JBL Spatial Sound tái tạo không gian âm thanh ba chiều, mang đến cảm giác chân thực và chi tiết. Khi nghe nhạc, bạn sẽ có cảm giác như đang đắm mình trong một buổi hòa nhạc trực tiếp. Khi xem phim, âm thanh từ các cảnh hành động, hiệu ứng cháy nổ hay những đoạn hội thoại sẽ trở nên sống động hơn bao giờ hết.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Chống ồn chủ động thích ứng và Chế độ môi trường thông minh</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Công nghệ </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Chống ồn chủ động thích ứng (Adaptive Noise Cancelling)</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> trên tai nghe được thiết kế để mang lại trải nghiệm nghe nhạc hoàn hảo trong mọi môi trường. Dù bạn đang làm việc trong không gian văn phòng ồn ào, ngồi trên một chuyến bay hay chỉ đơn giản là muốn tận hưởng những khoảnh khắc yên tĩnh, tính năng này sẽ loại bỏ tiếng ồn xung quanh một cách hiệu quả.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-7.jpg\" alt=\"Chống ồn chủ động thích ứng và Chế độ môi trường thông minh trên tai nghe True Wireless JBL Tune Beam 2\" title=\"Chống ồn chủ động thích ứng và Chế độ môi trường thông minh trên tai nghe True Wireless JBL Tune Beam 2\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Chế độ </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Ambient Aware</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> và </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">TalkThru</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> mang lại sự linh hoạt cao cho người dùng. Với Ambient Aware, bạn vẫn có thể nghe được âm thanh từ môi trường xung quanh mà không cần tháo tai nghe, rất hữu ích khi bạn cần di chuyển trên đường phố hoặc lắng nghe thông báo quan trọng. Trong khi đó, chế độ TalkThru giúp bạn dễ dàng trò chuyện với người khác mà không làm gián đoạn trải nghiệm âm nhạc của mình.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Cả hai chế độ này đều được tích hợp thông minh, giúp bạn hoàn toàn kiểm soát trải nghiệm nghe nhạc theo ý muốn, từ việc tập trung tuyệt đối vào âm nhạc đến kết nối với thế giới bên ngoài chỉ với một chạm.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Tai nghe True Wireless JBL Tune Beam 2 có khả năng đàm thoại vượt trội với công nghệ 6-Mic</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Không chỉ chú trọng vào trải nghiệm nghe nhạc, tai nghe còn được tối ưu hóa cho việc đàm thoại. Sản phẩm tích hợp hệ thống </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">6 microphone</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> hiện đại, giúp thu giọng nói rõ ràng và loại bỏ tạp âm hiệu quả.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Hai micro bên ngoài sẽ tập trung ghi lại giọng nói của bạn, trong khi micro bên trong hoạt động để loại bỏ tiếng ồn và tiếng gió. Công nghệ khử tiếng ồn môi trường (Environmental Noise Cancelling) đảm bảo chất lượng âm thanh cuộc gọi luôn trong trẻo, không bị nhiễu bởi âm thanh xung quanh. Điều này đặc biệt hữu ích cho những người thường xuyên phải gọi điện khi đang di chuyển hoặc làm việc trong không gian công cộng.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-8.jpg\" alt=\"Tai nghe True Wireless JBL Tune Beam 2 có khả năng đàm thoại vượt trội với công nghệ 6-Mic\" title=\"Tai nghe True Wireless JBL Tune Beam 2 có khả năng đàm thoại vượt trội với công nghệ 6-Mic\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Ngoài ra, bạn có thể sử dụng ứng dụng JBL Headphones để tùy chỉnh mức độ thu âm của giọng nói, giúp cá nhân hóa trải nghiệm đàm thoại và tăng sự thoải mái khi giao tiếp.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Cá nhân hóa trải nghiệm âm thanh với Personi-Fi 3.0</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Một điểm sáng khác của tai nghe True Wireless JBL Tune Beam 2 là khả năng cá nhân hóa trải nghiệm âm nhạc thông qua công nghệ </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Personi-Fi 3.0</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">. Tính năng này cho phép bạn tự điều chỉnh đường cong âm thanh sao cho phù hợp nhất với sở thích nghe nhạc của mình.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Thông qua ứng dụng JBL Headphones, bạn có thể tạo biểu đồ âm thanh cá nhân, tối ưu hóa trải nghiệm nghe nhạc theo từng thể loại hoặc nhu cầu cụ thể. Dù bạn yêu thích dải âm bass mạnh mẽ hay cần những giai điệu nhẹ nhàng, Personi-Fi 3.0 sẽ giúp bạn đạt được điều đó một cách dễ dàng. Đây là công nghệ lý tưởng cho những người dùng yêu cầu cao về chất lượng âm thanh và sự khác biệt trong trải nghiệm nghe nhạc.</span></p><h3 dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 16pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Dung lượng pin ấn tượng và hỗ trợ sạc không dây</span></h3><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Tai nghe này không chỉ gây ấn tượng bởi hiệu suất âm thanh mà còn bởi thời lượng pin mạnh mẽ. Với khả năng hoạt động liên tục lên đến </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">48 giờ</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, bạn có thể thoải mái sử dụng tai nghe cả ngày dài mà không lo hết pin.</span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: center; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2024/11/27/tai-nghe-true-wireless-jbl-tune-beam-2-1.jpg\" alt=\"Dung lượng pin ấn tượng và hỗ trợ sạc không dây của tai nghe True Wireless JBL Tune Beam 2\" title=\"Dung lượng pin ấn tượng và hỗ trợ sạc không dây của tai nghe True Wireless JBL Tune Beam 2\" style=\"max-width: 100%;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"><br></span></p><p dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: -apple-system, &quot;system-ui&quot;, Inter, sans-serif; font-size: 13px; text-align: justify; line-height: 1.8; margin-top: 6pt; margin-bottom: 6pt;\"><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">Cụ thể, khi bật chế độ chống ồn ANC, tai nghe True Wireless JBL Tune Beam 2&nbsp; có thể phát nhạc trong </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">10 giờ</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> và hộp sạc cung cấp thêm 30 giờ sử dụng. Khi tắt chế độ chống ồn, thời lượng phát nhạc tăng lên </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">12 giờ</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, kèm theo 36 giờ sạc bổ sung từ hộp sạc. Ngoài ra, tính năng </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">sạc không dây</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\"> giúp quá trình nạp năng lượng trở nên tiện lợi và nhanh chóng hơn. Chỉ với </span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">2 giờ sạc</span><span style=\"font-size: 12pt; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-variant-position: normal; font-variant-emoji: normal; vertical-align: baseline; white-space-collapse: preserve;\">, tai nghe sẽ được sạc đầy và sẵn sàng đồng hành cùng bạn trong mọi hoạt động.</span></p>', 1, 14, 1, '2024-12-26 09:35:23', '2024-12-26 09:35:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_color`
--

CREATE TABLE `products_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_color`
--

INSERT INTO `products_color` (`id`, `img`, `color_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1734461112.webp', 4, 1, '2024-12-17 18:45:12', '2024-12-24 17:54:27', '2024-12-24 17:54:27'),
(2, '1734461228.webp', 2, 1, '2024-12-17 18:47:08', '2024-12-24 17:54:29', '2024-12-24 17:54:29'),
(3, '1734599945.webp', 6, 2, '2024-12-19 09:19:05', '2024-12-24 17:53:49', '2024-12-24 17:53:49'),
(4, '1734600059.webp', 2, 3, '2024-12-19 09:20:59', '2024-12-24 17:53:05', '2024-12-24 17:53:05'),
(5, '1734600066.webp', 6, 3, '2024-12-19 09:21:06', '2024-12-24 17:53:07', '2024-12-24 17:53:07'),
(6, '1734600220.webp', 2, 4, '2024-12-19 09:23:40', '2024-12-24 17:52:34', '2024-12-24 17:52:34'),
(7, '1734600229.webp', 4, 4, '2024-12-19 09:23:49', '2024-12-24 17:52:35', '2024-12-24 17:52:35'),
(8, '1734600385.webp', 2, 5, '2024-12-19 09:26:25', '2024-12-24 17:52:05', '2024-12-24 17:52:05'),
(9, '1734600393.webp', 5, 5, '2024-12-19 09:26:33', '2024-12-24 17:52:06', '2024-12-24 17:52:06'),
(10, '1734601914.webp', 1, 6, '2024-12-19 09:51:54', '2024-12-24 17:51:07', '2024-12-24 17:51:07'),
(11, '1734601922.jpg', 4, 6, '2024-12-19 09:52:02', '2024-12-24 17:51:09', '2024-12-24 17:51:09'),
(12, '1734601928.webp', 2, 6, '2024-12-19 09:52:08', '2024-12-24 17:51:11', '2024-12-24 17:51:11'),
(13, '1734602060.webp', 1, 7, '2024-12-19 09:54:20', '2024-12-24 17:46:53', '2024-12-24 17:46:53'),
(14, '1734602069.webp', 4, 7, '2024-12-19 09:54:30', '2024-12-24 17:46:55', '2024-12-24 17:46:55'),
(15, '1734602187.webp', 2, 8, '2024-12-19 09:56:27', '2024-12-24 17:46:04', '2024-12-24 17:46:04'),
(16, '1734602195.jpg', 7, 8, '2024-12-19 09:56:35', '2024-12-24 17:46:06', '2024-12-24 17:46:06'),
(17, '1735149622.png', 1, 8, '2024-12-25 18:00:22', '2024-12-25 18:00:22', NULL),
(18, '1735205733.png', 1, 9, '2024-12-26 09:35:33', '2024-12-26 09:35:33', NULL),
(19, '1735205741.png', 2, 9, '2024-12-26 09:35:41', '2024-12-26 09:35:41', NULL),
(20, '1735208758.png', 7, 8, '2024-12-26 10:25:58', '2024-12-26 10:25:58', NULL),
(21, '1735208766.png', 4, 8, '2024-12-26 10:26:06', '2024-12-26 10:26:06', NULL),
(22, '1735208999.png', 2, 7, '2024-12-26 10:29:59', '2024-12-26 10:29:59', NULL),
(23, '1735209060.png', 2, 6, '2024-12-26 10:31:00', '2024-12-26 10:31:00', NULL),
(24, '1735209131.png', 2, 5, '2024-12-26 10:32:11', '2024-12-26 10:32:11', NULL),
(25, '1735209203.png', 2, 4, '2024-12-26 10:33:23', '2024-12-26 10:33:23', NULL),
(26, '1735209211.png', 6, 4, '2024-12-26 10:33:31', '2024-12-26 10:33:31', NULL),
(27, '1735209275.png', 2, 3, '2024-12-26 10:34:35', '2024-12-26 10:34:35', NULL),
(28, '1735209282.png', 4, 3, '2024-12-26 10:34:42', '2024-12-26 10:34:42', NULL),
(29, '1735209454.png', 1, 2, '2024-12-26 10:37:34', '2024-12-26 10:37:34', NULL),
(30, '1735209513.png', 1, 1, '2024-12-26 10:38:33', '2024-12-26 10:38:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_size`
--

CREATE TABLE `products_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_size`
--

INSERT INTO `products_size` (`id`, `product_color_id`, `size_id`, `created_at`, `updated_at`, `quantity`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, 99, NULL),
(2, 1, 3, NULL, NULL, 50, NULL),
(3, 1, 4, NULL, NULL, 100, NULL),
(4, 2, 1, NULL, NULL, 20, NULL),
(5, 2, 3, NULL, NULL, 10, NULL),
(6, 2, 4, NULL, NULL, 10, NULL),
(7, 1, 2, NULL, NULL, 10, NULL),
(8, 3, 1, NULL, NULL, 233, NULL),
(9, 3, 4, NULL, NULL, 100, NULL),
(10, 4, 1, NULL, NULL, 23, NULL),
(11, 5, 3, NULL, NULL, 22, NULL),
(12, 6, 1, NULL, NULL, 23, NULL),
(13, 7, 4, NULL, NULL, 32, NULL),
(14, 8, 1, NULL, NULL, 232, NULL),
(15, 9, 3, NULL, NULL, 223, NULL),
(16, 9, 2, NULL, NULL, 2323, NULL),
(17, 10, 1, NULL, NULL, 2132, NULL),
(18, 11, 4, NULL, NULL, 22, NULL),
(19, 12, 3, NULL, NULL, 2222, NULL),
(20, 13, 1, NULL, NULL, 21, NULL),
(21, 14, 3, NULL, NULL, 222, NULL),
(22, 15, 1, NULL, NULL, 2323, NULL),
(23, 16, 4, NULL, NULL, 2323, NULL),
(24, 17, 1, NULL, NULL, 22221, NULL),
(26, 18, 1, NULL, NULL, 96, NULL),
(27, 19, 2, NULL, NULL, 100, NULL),
(28, 20, 1, NULL, NULL, 122, NULL),
(29, 21, 1, NULL, NULL, 122, NULL),
(30, 22, 1, NULL, NULL, 100, NULL),
(31, 23, 1, NULL, NULL, 122, NULL),
(32, 24, 1, NULL, NULL, 22, NULL),
(33, 25, 1, NULL, NULL, 22, NULL),
(34, 26, 1, NULL, NULL, 22, NULL),
(35, 27, 1, NULL, NULL, 22, NULL),
(36, 28, 1, NULL, NULL, 22, NULL),
(37, 29, 1, NULL, NULL, 22, NULL),
(38, 30, 1, NULL, NULL, 222, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `rating`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 8, 1, 'Sản phẩm đẹp, rất bền', '2024-12-25 18:41:47', '2024-12-25 18:41:47', NULL),
(2, 2, 8, 4, 'Rất tiện dụng cho gia đình nhà mình. Nhà mình đã dùng sản phẩm này trong 5 năm', '2024-12-25 18:42:03', '2024-12-25 18:42:03', NULL),
(3, 2, 8, 5, 'ĐỒ ở đây rất đẹp và tiện lợi', '2024-12-25 18:54:45', '2024-12-25 18:54:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân Viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `address` char(255) NOT NULL,
  `phone_number` char(20) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `notification` text NOT NULL,
  `introduction` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `logo`, `name`, `email`, `address`, `phone_number`, `maintenance`, `notification`, `introduction`, `created_at`, `updated_at`) VALUES
(1, '1735035584.png', 'Eectronics Shop System', 'electronics-shop-system@gmail.com', 'Đông Anh, Hà Nội', '123125934093', 2, '<b>WEBSITE tạm thời bảo trì để nâng cấp xin  quay lại sau</b>', '<h3 style=\"text-align: center; \">\r\n                            <b>VỀ CHÚNG TÔI</b>\r\n                            </h3><h5><br></h5><h5><p><strong>Tech Store </strong> là thương hiệu thiết bị điện tử được phát triển bởi người Việt, với mục tiêu trở thành thương hiệu điện tử hàng đầu Việt Nam đạt tiêu chuẩn quốc tế. <strong>Tech Store </strong>cam kết đáp ứng nhu cầu của người tiêu dùng Việt với các sản phẩm điện tử chất lượng cao, phân phối và bảo hành uy tín toàn quốc, thiết kế hiện đại, đa dạng chủng loại, phù hợp cho mọi nhu cầu sử dụng.</p><p>Với chúng tôi, công nghệ không chỉ là sản phẩm, mà còn là giải pháp giúp cải thiện cuộc sống. Chúng tôi cung cấp những thiết bị công nghệ tiên tiến, mang đến trải nghiệm mua sắm tuyệt vời cho khách hàng. Chúng tôi luôn nỗ lực đổi mới, từ việc cập nhật các sản phẩm công nghệ mới nhất đến việc nâng cao chất lượng dịch vụ khách hàng.</p><p><strong>Tech Store</strong> tự hào là thương hiệu công nghệ Việt dành cho người Việt. Các sản phẩm như điện thoại, laptop, máy tính bảng, phụ kiện công nghệ và thiết bị gia dụng thông minh của chúng tôi luôn được cập nhật liên tục với thiết kế hiện đại, tính năng ưu việt, đáp ứng mọi nhu cầu của thị trường từ phổ thông đến cao cấp.</p><p><strong>Slogan</strong>: <em>Tech Store - Công nghệ Việt, nâng tầm cuộc sống Việt!</em></p></h5>', NULL, '2024-12-29 17:29:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S', NULL, NULL, NULL),
(2, 'M', NULL, NULL, NULL),
(3, 'L', NULL, NULL, NULL),
(4, 'XL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `disable_reason` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `phone_number`, `role_id`, `active`, `disable_reason`, `created_by`, `updated_by`, `deleted_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$mIRxYPyXUAgV0LuNtmToYOiOqpSFyYsURLTMpXqANn9kpk6fToSEO', '2024-12-13 16:18:25', '000 000-0000', 1, 1, NULL, NULL, 1, NULL, NULL, NULL, '2024-12-13 18:03:19', NULL),
(2, 'Hiếu Thành', 'n.hieuthanhps@gmail.com', '$2y$10$uBB.dH/Wg8b7DBfwgsuWc.oHJtd0A6.IpeNBqVNK/dZqgLX.2FVQG', '2024-12-14 08:32:18', '0355668062', 3, 1, NULL, NULL, 2, NULL, NULL, '2024-12-14 08:28:48', '2024-12-25 18:55:10', NULL),
(3, 'Nguyễn Hiếu Thành', 'n.hieuthanhhaui@gmail.com', '$2y$10$jkAxD/MkuApdAXQhqfOVTOOxZ.bSY6V9wbkVK5P.2wkyARlM2nZV6', NULL, '0355648061', 3, 1, NULL, NULL, NULL, NULL, NULL, '2024-12-29 17:48:48', '2024-12-29 17:48:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_verifies`
--

CREATE TABLE `user_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `email_verify` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_verifies`
--

INSERT INTO `user_verifies` (`id`, `user_id`, `token`, `expires_at`, `email_verify`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 'atndOW0wXgiGUFBzLRWEhcsJc2VG8vskLrpVtLNtfq8pQRPQTeGmRsQ9jl3M9u5W', '2024-12-29 18:48:48', NULL, '2024-12-29 17:48:48', '2024-12-29 17:48:48', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_size_id_foreign` (`product_size_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `products_color`
--
ALTER TABLE `products_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_color_color_id_foreign` (`color_id`),
  ADD KEY `products_color_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_size_product_color_id_foreign` (`product_color_id`),
  ADD KEY `products_size_size_id_foreign` (`size_id`);

--
-- Chỉ mục cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `user_verifies`
--
ALTER TABLE `user_verifies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1735289443124;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products_color`
--
ALTER TABLE `products_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_verifies`
--
ALTER TABLE `user_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `products_size` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `products_color`
--
ALTER TABLE `products_color`
  ADD CONSTRAINT `products_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `products_size_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `products_color` (`id`),
  ADD CONSTRAINT `products_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Các ràng buộc cho bảng `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
