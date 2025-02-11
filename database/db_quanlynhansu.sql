-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2020 lúc 01:16 PM
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
-- Cơ sở dữ liệu: `db_quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anhykien`
--

CREATE TABLE `tbl_anhykien` (
  `id` int(11) NOT NULL,
  `id_luuykien` int(11) NOT NULL,
  `ten_anh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bangluong`
--

CREATE TABLE `tbl_bangluong` (
  `id_bangluong` int(11) NOT NULL,
  `so_gio_lam_viec` double NOT NULL DEFAULT 0,
  `tong_tien_luong` double DEFAULT NULL,
  `luong_thang` date DEFAULT NULL,
  `thue_thu_nhap` int(11) DEFAULT NULL,
  `thue_bao_hiem` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_bangluong`
--

INSERT INTO `tbl_bangluong` (`id_bangluong`, `so_gio_lam_viec`, `tong_tien_luong`, `luong_thang`, `thue_thu_nhap`, `thue_bao_hiem`, `created_at`, `updated_at`, `id_nhanvien`) VALUES
(4, 196, NULL, '2020-07-01', 0, 78750, '2020-07-27 01:12:31', '2020-07-31 00:40:35', 'GDGD.Nha.01'),
(7, 195, 2412878.787878788, '2020-06-01', 0, 253352, '2020-07-27 01:12:31', '2020-08-19 13:59:35', 'GDGD.Nha.01'),
(10, 190, 2351010.1010101014, '2020-08-01', 0, 246856, '2020-08-03 02:32:33', '2020-08-19 19:31:51', 'GDGD.Nha.01'),
(11, 50, 4444444.444444445, '2020-06-01', 0, 466667, '2020-08-19 09:15:19', '2020-08-19 13:59:35', 'QLNS.Cuong.4'),
(13, 196, 25242424.242424242, '2020-06-01', 559197, 2650455, NULL, '2020-08-19 13:59:35', 'PGDPGD.Thanh.3'),
(14, 196, 18313131.313131314, '2020-08-01', 94513, 1922879, NULL, '2020-08-19 19:31:51', 'PGDPGD.Nha.2'),
(15, 180, 16000000, '2020-06-01', 36000, 1680000, NULL, '2020-08-19 13:34:07', 'QLKTTC.Dat.6'),
(16, 198, NULL, '2020-07-01', NULL, NULL, NULL, NULL, 'PGDPGD.Thanh.3'),
(17, 190, 17752525.25252525, '2020-06-01', 69426, 1864015, NULL, '2020-08-19 13:59:35', 'PGDPGD.Nha.2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chamcong`
--

CREATE TABLE `tbl_chamcong` (
  `id_chamcong` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `thoi_gian_lam` double DEFAULT NULL,
  `id_tangca` int(11) DEFAULT NULL,
  `id_bangluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chamcong`
--

INSERT INTO `tbl_chamcong` (`id_chamcong`, `check_in`, `thoi_gian_lam`, `id_tangca`, `id_bangluong`) VALUES
(6, '2020-07-27 09:51:08', 6.016388888888889, NULL, 4),
(15, '2020-07-29 17:58:59', NULL, NULL, 4),
(16, '2020-07-31 14:40:24', 0.0030555555555555557, NULL, 4),
(17, '2020-08-03 09:15:25', 8.011111111111111, NULL, 10),
(20, '2020-08-10 18:09:44', 0.0005555555555555556, NULL, 10),
(21, '2020-08-14 07:49:37', NULL, NULL, 10),
(22, '2020-08-18 11:55:26', 0.10055555555555555, NULL, 10),
(23, '2020-08-01 09:00:00', 8, NULL, 14),
(24, '2020-08-02 09:00:00', 8, NULL, 14),
(25, '2020-08-03 09:00:00', 8, NULL, 14),
(26, '2020-08-04 09:00:00', 8, NULL, 14),
(27, '2020-08-05 09:00:00', 8, NULL, 14),
(28, '2020-08-06 09:00:00', 8, NULL, 14),
(29, '2020-08-20 12:36:30', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietphuluc`
--

CREATE TABLE `tbl_chitietphuluc` (
  `id` int(11) NOT NULL,
  `noi_dung_khac` longtext DEFAULT NULL,
  `thay_doi_luong` double DEFAULT NULL,
  `id_loaihopdong_moi` int(11) DEFAULT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `id_chucvu_moi` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_phucap_moi` int(11) DEFAULT NULL,
  `id_hopdong` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietphuluc`
--

INSERT INTO `tbl_chitietphuluc` (`id`, `noi_dung_khac`, `thay_doi_luong`, `id_loaihopdong_moi`, `ngay_bat_dau`, `ngay_ket_thuc`, `id_chucvu_moi`, `id_phucap_moi`, `id_hopdong`, `created_at`, `updated_at`) VALUES
(61, NULL, NULL, 2, '2020-08-21', NULL, NULL, NULL, '14-HDLD-ABC', '2020-08-19 18:50:55', '2020-08-19 18:50:55'),
(62, NULL, 123456789, NULL, '2020-08-02', '2020-09-19', NULL, NULL, '14-HDLD-ABC', '2020-08-19 19:00:19', '2020-08-19 19:00:19'),
(66, NULL, 123123123123, NULL, '2020-08-29', '2020-10-30', NULL, NULL, '16-HDLD-ABC', '2020-08-29 08:03:01', '2020-08-29 08:03:01'),
(67, NULL, NULL, NULL, '2020-08-29', '2020-11-28', 'PGDPGD', 35, '16-HDLD-ABC', '2020-08-29 08:03:23', '2020-08-29 08:03:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `id_chucvu` varchar(10) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `noi_dung_cv` longtext DEFAULT NULL,
  `id_phongban` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`id_chucvu`, `ten_chuc_vu`, `noi_dung_cv`, `id_phongban`, `created_at`, `updated_at`) VALUES
('GDGD', 'Giám đốc', '<p>- L&agrave; người đại diện theo ph&aacute;p luật của C&ocirc;ng ty. Phụ tr&aacute;ch chung, chịu tr&aacute;ch nhiệm trước Tổng c&ocirc;ng ty v&agrave; Ph&aacute;p luật về mọi hoạt động điều h&agrave;nh của C&ocirc;ng ty. Gi&aacute;m đốc C&ocirc;ng ty trực tiếp phụ tr&aacute;ch c&aacute;c lĩnh vực:<br />\r\n- C&ocirc;ng t&aacute;c Tổ chức - Nh&acirc;n sự; Thi đua Khen thưởng v&agrave; kỷ luật.<br />\r\n- C&ocirc;ng t&aacute;c T&agrave;i ch&iacute;nh - Kế to&aacute;n.<br />\r\n- C&ocirc;ng t&aacute;c Kinh doanh:<br />\r\n+ Kế hoạch ngắn hạn, d&agrave;i hạn v&agrave; chiến lược kinh doanh.<br />\r\n+ Lựa chọn nh&agrave; ph&acirc;n phối, h&igrave;nh thức ph&acirc;n phối, tiến độ cung ứng h&agrave;ng ho&aacute; ra thị trường.<br />\r\n+ Quy m&ocirc;, phương thức đầu tư ph&aacute;t triển thị trường.<br />\r\n+ K&yacute; kết hợp đồng kinh tế mua - b&aacute;n h&agrave;ng ho&aacute;, dịch vụ.</p>\r\n\r\n<p>...</p>', 'GD', NULL, '2020-08-24 09:52:46'),
('NVKTTC', 'Nhân Viên KT-TC', '<p><em>C&ocirc;ng t&aacute;c kế to&aacute;n</em><br />\r\n- Tổ chức bộ m&aacute;y kế to&aacute;n ph&ugrave; hợp với m&ocirc; h&igrave;nh tổ chức sản xuất kinh doanh của C&ocirc;ng ty v&agrave; của Tổng c&ocirc;ng ty.<br />\r\n- Tổ chức phổ biến v&agrave; hướng dẫn kịp thời c&aacute;c chế độ, ch&iacute;nh s&aacute;ch t&agrave;i ch&iacute;nh, kế to&aacute;n của Nh&agrave; nước v&agrave; của Tổng c&ocirc;ng ty.<br />\r\n- X&acirc;y dựng cẩm nang thủ tục kế to&aacute;n v&agrave; tổ chức phổ biến, hướng dẫn đến từng c&aacute;n bộ c&ocirc;ng nh&acirc;n vi&ecirc;n C&ocirc;ng ty để thực hiện.<br />\r\n- Ghi ch&eacute;p v&agrave; hạch to&aacute;n đ&uacute;ng, đầy đủ v&agrave; kịp thời c&aacute;c nghiệp vụ kinh tế ph&aacute;t sinh theo Chuẩn mực, Chế độ kế to&aacute;n Việt Nam, quy định cụ thể của C&ocirc;ng ty v&agrave; Tổng c&ocirc;ng ty. Tổ chức hạch to&aacute;n tổng hợp c&aacute;c loại vốn, quỹ, tổng hợp gi&aacute; th&agrave;nh, kết quả sản xuất kinh doanh của C&ocirc;ng ty.<br />\r\n- Kiểm tra t&iacute;nh hợp l&yacute;, hợp lệ của tất cả c&aacute;c loại h&oacute;a đơn, chứng từ, ho&agrave;n chỉnh c&aacute;c thủ tục kế to&aacute;n trước khi tr&igrave;nh L&atilde;nh đạo C&ocirc;ng ty ph&ecirc; duyệt.<br />\r\n- Tổ chức v&agrave; tham gia kiểm k&ecirc; định kỳ hoặc đột xuất to&agrave;n bộ vật tư, t&agrave;i sản, tiền vốn theo quy định của Nh&agrave; nước, theo y&ecirc;u cầu của C&ocirc;ng ty v&agrave; Tổng c&ocirc;ng ty, đồng thời đề xuất hướng xử l&yacute; kết quả kiểm k&ecirc;.<br />\r\n- K&ecirc; khai, tr&iacute;ch nộp v&agrave; quyết to&aacute;n c&aacute;c khoản nộp ng&acirc;n s&aacute;ch; thanh to&aacute;n c&aacute;c khoản tiền vay, c&aacute;c khoản c&ocirc;ng nợ phải thu, phải trả.<br />\r\n- Tr&iacute;ch lập, ph&acirc;n phối c&aacute;c quỹ theo quyết định của Tổng c&ocirc;ng ty v&agrave; sử dụng c&aacute;c quỹ do C&ocirc;ng ty quản l&yacute; theo đ&uacute;ng mục đ&iacute;ch.<br />\r\n- Theo d&otilde;i, b&aacute;o c&aacute;o t&igrave;nh h&igrave;nh biến động gi&aacute; th&agrave;nh c&aacute;c sản phẩm, gi&aacute; cả vật tư h&agrave;ng h&oacute;a, ngoại tệ...; kiểm so&aacute;t gi&aacute; cả h&agrave;ng h&oacute;a mua v&agrave;o.<br />\r\n- Lập hồ sơ quyết to&aacute;n vốn đầu tư c&aacute;c dự &aacute;n ho&agrave;n th&agrave;nh, c&aacute;c nguồn kinh ph&iacute; hỗ trợ.<br />\r\n- Theo d&otilde;i, hạch to&aacute;n c&aacute;c khoản đầu tư t&agrave;i ch&iacute;nh ngắn hạn v&agrave; d&agrave;i hạn; theo d&otilde;i, đối chiếu c&ocirc;ng nợ v&agrave; ph&acirc;n loại nợ; đ&ocirc;n đốc thu hồi nợ v&agrave; đề xuất xử l&yacute; c&aacute;c khoản nợ phải thu kh&oacute; đ&ograve;i.<br />\r\n- Chấp h&agrave;nh quyết định của Tổng c&ocirc;ng ty, c&aacute;c cơ quan thanh tra, kiểm to&aacute;n nh&agrave; nước về việc kiểm tra hoạt động kế to&aacute;n t&agrave;i ch&iacute;nh của C&ocirc;ng ty.<br />\r\n- Lập v&agrave; nộp c&aacute;c b&aacute;o c&aacute;o t&agrave;i ch&iacute;nh theo chế độ quy định.</p>', 'KTTC', '2020-08-19 08:06:16', '2020-08-30 07:44:42'),
('NVMKT', 'Nhân Viên Maketing', '<p><em>&nbsp;C&ocirc;ng t&aacute;c nghi&ecirc;n cứu thị trường</em><br />\r\n- Nghi&ecirc;n cứu xu hướng thị trường về sản phẩm, gi&aacute; cả, ph&acirc;n phối, kh&aacute;ch h&agrave;ng, t&acirc;m l&yacute; v&agrave; xu hướng thay đổi của người ti&ecirc;u d&ugrave;ng, ch&iacute;nh s&aacute;ch hậu m&atilde;i,&nbsp; đối thủ cạnh tranh&hellip;<br />\r\n<em>Gi&aacute;m s&aacute;t, quản l&yacute; v&ugrave;ng thị trường; ph&aacute;t triển mới</em><br />\r\n- Tổ chức gi&aacute;m s&aacute;t, quản l&yacute; v&ugrave;ng thị trường.<br />\r\n- Chủ tr&igrave; triển khai c&ocirc;ng t&aacute;c x&acirc;y dựng ph&aacute;t triển k&ecirc;nh ph&acirc;n phối mới.<br />\r\n- Phối hợp đ&aacute;nh gi&aacute; năng lực Nh&agrave; ph&acirc;n phối v&agrave; k&ecirc;nh ph&acirc;n phối.<br />\r\n- Phối hợp đề xuất c&aacute;c giải ph&aacute;p n&acirc;ng cao chất lượng hệ thống k&ecirc;nh ph&acirc;n phối.<br />\r\n- X&acirc;y dựng v&agrave; tổ chức c&aacute;c hoạt động cửa h&agrave;ng mẫu, c&aacute;c k&ecirc;nh giới thiệu sản phẩm.</p>', 'MKT', '2020-08-19 08:05:40', '2020-08-30 07:45:31'),
('NVNS', 'Nhân Viên Nhân Sự', '<p><em>C&ocirc;ng t&aacute;c Văn thư lưu trữ</em><br />\r\n&nbsp; &nbsp;- Quản l&yacute; lịch c&ocirc;ng t&aacute;c, giao ban, hội họp, sinh hoạt định kỳ v&agrave; bất thường; thư k&yacute; cuộc họp giao ban; th&ocirc;ng b&aacute;o c&aacute;c &yacute; kiến chỉ đạo của L&atilde;nh đạo C&ocirc;ng ty.<br />\r\n&nbsp; &nbsp;- X&acirc;y dựng kế hoạch, quy chế, quy định v&agrave; c&aacute;c văn bản hướng dẫn, kiểm tra nghiệp vụ văn thư lưu trữ.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp; &nbsp;- Tiếp nhận, xử l&yacute; c&aacute;c văn bản v&agrave; t&agrave;i liệu đến - đi của C&ocirc;ng ty.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\r\n&nbsp; &nbsp;- Quản l&yacute; hồ sơ h&agrave;nh ch&iacute;nh v&agrave; con dấu của C&ocirc;ng ty.<br />\r\n&nbsp; &nbsp;- Lưu trữ, quản l&yacute; v&agrave; khai th&aacute;c hồ sơ lưu trữ của C&ocirc;ng ty.<br />\r\n&nbsp; - Đầu mối đề nghị chỉnh l&yacute; t&agrave;i liệu; thẩm định gi&aacute; trị t&agrave;i liệu loại, hủy sau chỉnh l&yacute;.<br />\r\n&nbsp;- Tổng hợp lịch l&agrave;m việc của L&atilde;nh đạo C&ocirc;ng ty.<br />\r\n<em>&nbsp; C&ocirc;ng t&aacute;c Ph&aacute;p chế</em><br />\r\n&nbsp; - X&acirc;y dựng quy chế, c&aacute;c văn bản hướng dẫn, kiểm tra gi&aacute;m s&aacute;t việc thực hiện c&ocirc;ng t&aacute;c ph&aacute;p chế của C&ocirc;ng ty.<br />\r\n&nbsp; - Tổng hợp, cập nhật c&aacute;c ch&iacute;nh s&aacute;ch ph&aacute;p luật li&ecirc;n quan đến hoạt động kinh doanh của C&ocirc;ng ty.<br />\r\n&nbsp; - Thẩm định về mặt ph&aacute;p l&yacute; c&aacute;c quy định, quy chế quản l&yacute; nội bộ.<br />\r\n&nbsp; - Tham mưu v&agrave; kiểm tra t&iacute;nh ph&aacute;p l&yacute; đối với việc k&yacute; kết hợp đồng.<br />\r\n&nbsp; - Đầu mối tổng hợp &yacute; kiến đ&oacute;ng g&oacute;p c&aacute;c dự thảo văn bản quy phạm ph&aacute;p luật do c&aacute;c cơ quan Nh&agrave; nước v&agrave; Tổng c&ocirc;ng ty gửi xin &yacute; kiến.<br />\r\n&nbsp;- Tổng kết, đ&aacute;nh gi&aacute; những vướng mắc trong qu&aacute; tr&igrave;nh thực hiện ph&aacute;p luật li&ecirc;n quan đến lĩnh vực kinh doanh của C&ocirc;ng ty.<br />\r\n&nbsp;- Hướng dẫn, kiểm so&aacute;t c&aacute;c hoạt động trong C&ocirc;ng ty thực hiện đ&uacute;ng quy định của ph&aacute;p luật.<br />\r\n&nbsp; - Thực hiện c&aacute;c hoạt động th&ocirc;ng tin, tuy&ecirc;n truyền, phổ biến, gi&aacute;o dục ph&aacute;p luật v&agrave; nội quy, quy chế của C&ocirc;ng ty cho người lao động.<br />\r\n&nbsp;- Đầu mối giải quyết c&aacute;c tranh chấp mang t&iacute;nh ph&aacute;p l&yacute; ph&aacute;t sinh trong c&aacute;c quan hệ giao dịch của C&ocirc;ng ty.</p>', 'NS', '2020-08-19 08:04:38', '2020-08-30 07:46:30'),
('PGDPGD', 'Phó Giám Đốc', '<p>&nbsp;Gi&uacute;p việc v&agrave; chịu tr&aacute;ch nhiệm trước Gi&aacute;m đốc C&ocirc;ng ty v&agrave; Ph&aacute;p luật về c&aacute;c lĩnh vực c&ocirc;ng t&aacute;c do Gi&aacute;m đốc C&ocirc;ng ty ph&acirc;n c&ocirc;ng v&agrave; uỷ quyền. Thay mặt Gi&aacute;m đốc C&ocirc;ng ty trực tiếp phụ tr&aacute;ch c&aacute;c lĩnh vực:<br />\r\n- &nbsp;Bảo vệ, mở rộng v&agrave; ph&aacute;t triển thị trường, thị phần h&agrave;ng ho&aacute; C&ocirc;ng ty đang kinh doanh bao gồm: chỉ đạo việc x&acirc;y dựng phương &aacute;n, tổ chức thực hiện c&aacute;c phương &aacute;n đ&atilde; được Gi&aacute;m đốc C&ocirc;ng ty ph&ecirc; duyệt.<br />\r\n- &nbsp;Tổ chức&nbsp; tiếp nhận v&agrave; giao nhận&nbsp; theo kế hoạch.<br />\r\n- &nbsp;Tổ chức bảo quản h&agrave;ng ho&aacute; trong kho C&ocirc;ng ty, h&agrave;ng ho&aacute; tr&ecirc;n đường, h&agrave;ng ho&aacute; tồn tại Nh&agrave; ph&acirc;n phối v&agrave; tại c&aacute;c cửa h&agrave;ng.<br />\r\n- &nbsp;C&ocirc;ng t&aacute;c kiểm so&aacute;t chất lượng sản phẩm trong qu&aacute; tr&igrave;nh ph&acirc;n phối ti&ecirc;u thụ.<br />\r\n- &nbsp;Tham gia gi&aacute;m s&aacute;t hoạt động c&ocirc;ng t&aacute;c thị trường, gi&aacute;m s&aacute;t k&ecirc;nh ph&acirc;n phối.<br />\r\n- &nbsp;C&ocirc;ng t&aacute;c quản trị h&agrave;nh ch&iacute;nh, văn thư lưu trữ, an to&agrave;n vệ sinh lao động, PCCN, PCLB v&agrave; an ninh quốc ph&ograve;ng.<br />\r\n- &nbsp;C&ocirc;ng t&aacute;c tiền lương, bảo hộ, bảo hiểm lao động v&agrave; t&agrave;i sản.<br />\r\n- &nbsp;K&yacute; kết c&aacute;c hợp đồng kinh tế theo uỷ quyền của Gi&aacute;m đốc C&ocirc;ng ty.<br />\r\n- &nbsp;Phối hợp c&ocirc;ng t&aacute;c với c&aacute;c tổ chức đo&agrave;n thể ch&iacute;nh trị x&atilde; hội.<br />\r\n- &nbsp;Thực hiện c&aacute;c nhiệm vụ kh&aacute;c khi Gi&aacute;m đốc C&ocirc;ng ty ph&acirc;n c&ocirc;ng.<br />\r\n- &nbsp;Điều h&agrave;nh hoạt động h&agrave;ng ng&agrave;y của C&ocirc;ng ty theo uỷ quyền của Gi&aacute;m đốc C&ocirc;ng ty v&agrave; khi Gi&aacute;m đốc C&ocirc;ng ty đi vắng.</p>', 'PGD', '2020-08-19 07:53:11', '2020-08-24 09:55:08'),
('QLKTTC', 'Quản Lý KT-TC', '<p><em>Hoạch định chiến lược t&agrave;i ch&iacute;nh doanh nghiệp</em><br />\r\n- Hoạch định chiến lược đầu tư t&agrave;i ch&iacute;nh hiệu quả. Hoạch định nguồn vốn t&agrave;i trợ.</p>\r\n\r\n<p><em>C&ocirc;ng t&aacute;c t&agrave;i ch&iacute;nh</em><br />\r\n- X&acirc;y dựng sổ tay kế to&aacute;n quản trị v&agrave; ph&acirc;n t&iacute;ch t&agrave;i ch&iacute;nh doanh nghiệp.<br />\r\n- Lập kế hoạch t&agrave;i ch&iacute;nh, vốn ngắn hạn v&agrave; d&agrave;i hạn cho hoạt động sản xuất kinh doanh của C&ocirc;ng ty; c&acirc;n đối vốn v&agrave; đề xuất c&aacute;c giải ph&aacute;p huy động vốn; c&acirc;n đối d&ograve;ng tiền thu, chi h&agrave;ng năm của C&ocirc;ng ty ph&ugrave; hợp với c&aacute;c quy định hiện h&agrave;nh.<br />\r\n- Ph&acirc;n t&iacute;ch gi&aacute; th&agrave;nh sản phẩm, ph&acirc;n t&iacute;ch hiệu quả hoạt động sản xuất kinh doanh của C&ocirc;ng ty v&agrave; đề xuất giải ph&aacute;p nhằm cải thiện t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh, n&acirc;ng cao hiệu quả sản xuất kinh doanh.<br />\r\n&nbsp;- Chủ tr&igrave; thực hiện c&aacute;c thủ tục thế chấp của kh&aacute;ch h&agrave;ng; theo d&otilde;i v&agrave; quản l&yacute; t&agrave;i sản thế chấp theo quy định.<br />\r\n- Thực hiện chế độ b&aacute;o c&aacute;o, c&ocirc;ng bố th&ocirc;ng tin t&agrave;i ch&iacute;nh thuộc thẩm quyền của C&ocirc;ng ty, ph&ugrave; hợp quy định của ph&aacute;p luật v&agrave; y&ecirc;u cầu của Tổng c&ocirc;ng ty.</p>\r\n\r\n<p><em>C&ocirc;ng t&aacute;c kế to&aacute;n</em><br />\r\n- Tổ chức bộ m&aacute;y kế to&aacute;n ph&ugrave; hợp với m&ocirc; h&igrave;nh tổ chức sản xuất kinh doanh của C&ocirc;ng ty v&agrave; của Tổng c&ocirc;ng ty.<br />\r\n- Tổ chức phổ biến v&agrave; hướng dẫn kịp thời c&aacute;c chế độ, ch&iacute;nh s&aacute;ch t&agrave;i ch&iacute;nh, kế to&aacute;n của Nh&agrave; nước v&agrave; của Tổng c&ocirc;ng ty.<br />\r\n- X&acirc;y dựng cẩm nang thủ tục kế to&aacute;n v&agrave; tổ chức phổ biến, hướng dẫn đến từng c&aacute;n bộ c&ocirc;ng nh&acirc;n vi&ecirc;n C&ocirc;ng ty để thực hiện.<br />\r\n- Ghi ch&eacute;p v&agrave; hạch to&aacute;n đ&uacute;ng, đầy đủ v&agrave; kịp thời c&aacute;c nghiệp vụ kinh tế ph&aacute;t sinh theo Chuẩn mực, Chế độ kế to&aacute;n Việt Nam, quy định cụ thể của C&ocirc;ng ty v&agrave; Tổng c&ocirc;ng ty. Tổ chức hạch to&aacute;n tổng hợp c&aacute;c loại vốn, quỹ, tổng hợp gi&aacute; th&agrave;nh, kết quả sản xuất kinh doanh của C&ocirc;ng ty.<br />\r\n- Kiểm tra t&iacute;nh hợp l&yacute;, hợp lệ của tất cả c&aacute;c loại h&oacute;a đơn, chứng từ, ho&agrave;n chỉnh c&aacute;c thủ tục kế to&aacute;n trước khi tr&igrave;nh L&atilde;nh đạo</p>\r\n\r\n<p>.....</p>', 'KTTC', '2020-08-19 08:03:26', '2020-08-30 07:42:39'),
('QLMKT', 'Quản Lý Maketing', '<p><em>*Hoạt động Marketing</em><br />\r\n- X&acirc;y dựng c&aacute;c chương tr&igrave;nh đầu tư, ph&aacute;t triển v&agrave; bảo vệ thị trường; c&aacute;c ch&iacute;nh s&aacute;ch ph&aacute;t triển h&igrave;nh ảnh thương hiệu.<br />\r\n- X&acirc;y dựng chiến lược sản phẩm, gi&aacute; b&aacute;n; đề xuất xem x&eacute;t kh&aacute;ch h&agrave;ng mục ti&ecirc;u v&agrave; thị trường mục ti&ecirc;u trong từng giai đoạn.<br />\r\n- Triển khai chương tr&igrave;nh x&uacute;c tiến thương mại v&agrave; theo d&otilde;i thực hiện ch&iacute;nh s&aacute;ch<br />\r\n- Đầu mối tổng hợp, theo d&otilde;i khiếu nại v&agrave; phản ứng của người ti&ecirc;u d&ugrave;ng.<br />\r\n- Xem x&eacute;t, giải quyết khiếu nại, bồi thường v&agrave; h&agrave;ng trả lại đối với người ti&ecirc;u d&ugrave;ng.<br />\r\n- Thực hiện c&aacute;c chương tr&igrave;nh ph&aacute;t triển thị trường.<br />\r\n- Theo d&otilde;i, đ&aacute;nh gi&aacute; sự thỏa m&atilde;n của k&ecirc;nh ph&acirc;n phối v&agrave; người ti&ecirc;u d&ugrave;ng.<br />\r\n- Đề xuất đa dạng h&oacute;a sản phẩm kinh doanh; tổ chức thực hiện v&agrave; theo d&otilde;i việc đưa sản phẩm mới ra thị trường.<br />\r\n- Thu thập, xử l&yacute; v&agrave; phản &aacute;nh c&aacute;c th&ocirc;ng tin về sản phẩm cạnh tranh v&agrave; đối thủ cạnh tranh.<br />\r\n- Phối hợp tổ chức hội nghị kh&aacute;ch h&agrave;ng; l&agrave; đầu mối tổ chức c&aacute;c sự kiện (<em>hội thảo, th&ocirc;ng c&aacute;o b&aacute;o ch&iacute;, cung cấp th&ocirc;ng tin ra b&ecirc;n ngo&agrave;i&hellip;</em>).<br />\r\n- X&acirc;y dựng, duy tr&igrave; v&agrave; ph&aacute;t triển c&aacute;c mối quan hệ với c&aacute;c cơ quan truyền th&ocirc;ng.</p>', 'MKT', '2020-08-19 08:01:29', '2020-08-30 07:43:57'),
('QLNS', 'Quản Lý Nhân Sự', '<p><em>C&ocirc;ng t&aacute;c Tổ chức c&aacute;n bộ</em><br />\r\n&nbsp; &nbsp; - X&acirc;y dựng c&aacute;c ch&iacute;nh s&aacute;ch, quy chế, quy định về tổ chức quản l&yacute; nguồn nh&acirc;n lực.<br />\r\n&nbsp; &nbsp; - Đầu mối x&acirc;y dựng, đề xuất m&ocirc; h&igrave;nh tổ chức hoạt động của C&ocirc;ng ty v&agrave; quy định chức năng, quyền hạn, nhiệm vụ c&aacute;c ph&ograve;ng ban.<br />\r\n&nbsp; &nbsp; - Bố tr&iacute;, sắp xếp, quy hoạch c&aacute;n bộ ph&ugrave; hợp với m&ocirc; h&igrave;nh tổ chức, y&ecirc;u cầu nhiệm vụ kinh doanh v&agrave; ph&aacute;t triển trong từng thời kỳ.<br />\r\n&nbsp; &nbsp; - Quản l&yacute; v&agrave; x&acirc;y dựng c&aacute;c ch&iacute;nh s&aacute;ch đối với c&aacute;n bộ quản l&yacute;;<br />\r\n<em>&nbsp; &nbsp;C&ocirc;ng t&aacute;c Nh&acirc;n sự</em><br />\r\n&nbsp; &nbsp;- X&acirc;y dựng kế hoạch, thực hiện, theo d&otilde;i, kiểm tra v&agrave; b&aacute;o c&aacute;o c&aacute;c ch&iacute;nh s&aacute;ch nh&acirc;n lực (<em>tuyển dụng, bố tr&iacute;, đ&agrave;o tạo, đ&aacute;nh gi&aacute; ph&acirc;n t&iacute;ch, ph&aacute;t triển nh&acirc;n lực&hellip;</em>).<br />\r\n&nbsp; &nbsp; - X&acirc;y dựng kế hoạch, thực hiện, theo d&otilde;i, kiểm tra v&agrave; b&aacute;o c&aacute;o về lao động, tiền lương, tiền thưởng.<br />\r\n&nbsp; &nbsp; - X&acirc;y dựng kế hoạch, thực hiện, theo d&otilde;i, kiểm tra v&agrave; b&aacute;o c&aacute;o c&aacute;c ch&iacute;nh s&aacute;ch, chế độ lao động (<em>nội quy lao động, văn h&oacute;a doanh nghiệp, thi đua khen thưởng, thanh tra, kỷ luật, bảo hiểm, trợ cấp th&ocirc;i việc, ph&uacute;c lợi, v&igrave; sự tiến bộ của phụ nữ, quy chế d&acirc;n chủ, ph&ograve;ng chống tham nhũng, bảo hộ lao động&hellip;).</em><br />\r\n&nbsp; &nbsp; - Đầu mối phối hợp với tổ chức C&ocirc;ng đo&agrave;n C&ocirc;ng ty trong c&aacute;c hoạt động x&atilde; hội v&agrave; thực hiện c&aacute;c ch&iacute;nh s&aacute;ch, chế độ c&oacute; li&ecirc;n quan đến người lao động.<br />\r\n<em>&nbsp; C&ocirc;ng t&aacute;c H&agrave;nh ch&iacute;nh quản trị</em><br />\r\n&nbsp; - Tổ chức thực hiện c&ocirc;ng t&aacute;c lễ t&acirc;n, kh&aacute;nh tiết, chuẩn bị hội họp v&agrave; tạp vụ (<em>ăn, uống, vệ sinh&hellip;</em>).<br />\r\n&nbsp; &nbsp;- Lập kế hoạch, thực hiện kiểm so&aacute;t v&agrave; quản l&yacute; việc mua sắm, cấp ph&aacute;t văn ph&ograve;ng phẩm.<br />\r\n&nbsp; &nbsp;- Lập kế hoạch, thực hiện v&agrave; kiểm so&aacute;t việc mua sắm c&aacute;c trang thiết bị, t&agrave;i sản văn ph&ograve;ng, sửa chữa nhỏ v&agrave; đầu tư x&acirc;y dựng cơ bản.<br />\r\n&nbsp; &nbsp;- Thường trực theo d&otilde;i việc triển khai &aacute;p dụng Hệ thống quản l&yacute; chất lượng ISO.<br />\r\n&nbsp; &nbsp;- Theo d&otilde;i, thực hiện, kiểm so&aacute;t việc đầu tư vận h&agrave;nh triển khai ứng dụng c&ocirc;ng nghệ th&ocirc;ng tin của C&ocirc;ng ty.<br />\r\n&nbsp; &nbsp;- Quản l&yacute;, điều vận xe &ocirc; t&ocirc; phục vụ l&atilde;nh đạo, c&aacute;n bộ nh&acirc;n vi&ecirc;n, phục vụ c&ocirc;ng t&aacute;c thị trường v&agrave; c&aacute;c đối tượng kh&aacute;c theo y&ecirc;u cầu c&ocirc;ng việc.<br />\r\n&nbsp; &nbsp;- Quản l&yacute;, thực hiện c&ocirc;ng t&aacute;c bảo vệ, an ninh trật tự, ph&ograve;ng chống ch&aacute;y nổ tại trụ sở văn ph&ograve;ng C&ocirc;ng ty.<br />\r\n&nbsp; &nbsp;- Thực hiện c&ocirc;ng t&aacute;c đối ngoại với c&aacute;c cơ quan c&oacute; li&ecirc;n quan theo ph&acirc;n cấp.<br />\r\n&nbsp; &nbsp;- Hướng dẫn kh&aacute;ch đến li&ecirc;n hệ c&ocirc;ng t&aacute;c với C&ocirc;ng ty.</p>', 'NS', '2020-08-19 07:58:00', '2020-08-30 07:47:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu_permission`
--

CREATE TABLE `tbl_chucvu_permission` (
  `id` int(11) NOT NULL,
  `id_chucvu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `id_permission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu_permission`
--

INSERT INTO `tbl_chucvu_permission` (`id`, `id_chucvu`, `id_permission`, `created_at`, `updated_at`) VALUES
(814, 'PGDPGD', 1, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(815, 'PGDPGD', 2, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(816, 'PGDPGD', 3, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(817, 'PGDPGD', 4, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(818, 'PGDPGD', 5, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(819, 'PGDPGD', 6, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(820, 'PGDPGD', 7, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(821, 'PGDPGD', 8, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(822, 'PGDPGD', 9, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(823, 'PGDPGD', 10, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(824, 'PGDPGD', 11, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(825, 'PGDPGD', 12, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(826, 'PGDPGD', 13, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(827, 'PGDPGD', 14, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(828, 'PGDPGD', 15, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(829, 'PGDPGD', 16, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(830, 'PGDPGD', 17, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(831, 'PGDPGD', 18, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(832, 'PGDPGD', 19, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(833, 'PGDPGD', 20, '2020-08-24 09:55:08', '2020-08-24 09:55:08'),
(865, 'QLKTTC', 13, '2020-08-30 07:42:39', '2020-08-30 07:42:39'),
(866, 'QLKTTC', 20, '2020-08-30 07:42:39', '2020-08-30 07:42:39'),
(867, 'QLMKT', 3, '2020-08-30 07:43:57', '2020-08-30 07:43:57'),
(868, 'QLMKT', 4, '2020-08-30 07:43:57', '2020-08-30 07:43:57'),
(869, 'QLMKT', 20, '2020-08-30 07:43:57', '2020-08-30 07:43:57'),
(870, 'NVKTTC', 11, '2020-08-30 07:44:42', '2020-08-30 07:44:42'),
(871, 'NVKTTC', 15, '2020-08-30 07:44:42', '2020-08-30 07:44:42'),
(872, 'NVMKT', 3, '2020-08-30 07:45:31', '2020-08-30 07:45:31'),
(873, 'NVMKT', 11, '2020-08-30 07:45:31', '2020-08-30 07:45:31'),
(874, 'NVMKT', 15, '2020-08-30 07:45:31', '2020-08-30 07:45:31'),
(875, 'NVNS', 11, '2020-08-30 07:46:30', '2020-08-30 07:46:30'),
(876, 'NVNS', 15, '2020-08-30 07:46:30', '2020-08-30 07:46:30'),
(877, 'QLNS', 9, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(878, 'QLNS', 10, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(879, 'QLNS', 11, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(880, 'QLNS', 12, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(881, 'QLNS', 15, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(882, 'QLNS', 16, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(883, 'QLNS', 17, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(884, 'QLNS', 18, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(885, 'QLNS', 19, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(886, 'QLNS', 20, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(887, 'QLNS', 21, '2020-08-30 07:47:05', '2020-08-30 07:47:05'),
(909, 'GDGD', 1, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(910, 'GDGD', 2, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(911, 'GDGD', 3, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(912, 'GDGD', 4, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(913, 'GDGD', 5, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(914, 'GDGD', 6, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(915, 'GDGD', 7, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(916, 'GDGD', 8, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(917, 'GDGD', 9, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(918, 'GDGD', 10, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(919, 'GDGD', 11, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(920, 'GDGD', 12, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(921, 'GDGD', 13, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(922, 'GDGD', 14, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(923, 'GDGD', 15, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(924, 'GDGD', 16, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(925, 'GDGD', 17, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(926, 'GDGD', 18, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(927, 'GDGD', 19, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(928, 'GDGD', 20, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(929, 'GDGD', 21, '2020-08-30 09:48:05', '2020-08-30 09:48:05'),
(930, 'GDGD', 22, '2020-08-30 09:48:05', '2020-08-30 09:48:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dantoc`
--

CREATE TABLE `tbl_dantoc` (
  `id_dantoc` int(20) NOT NULL,
  `maso_dantoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_dan_toc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dantoc`
--

INSERT INTO `tbl_dantoc` (`id_dantoc`, `maso_dantoc`, `ten_dan_toc`) VALUES
(1, '1', 'Kinh'),
(2, '2', 'Tày'),
(3, '3', 'Thái'),
(4, '4', 'Hoa'),
(5, '5', 'Khơ-me'),
(6, '6', 'Mường'),
(7, '7', 'Nùng'),
(8, '8', 'Hmông'),
(9, '9', 'Dao'),
(10, '10', 'Gia-rai'),
(11, '11', 'Ngái'),
(12, '12', 'Ê-đê'),
(13, '13', 'Ba-na'),
(14, '14', 'Xơ-đăng'),
(15, '15', 'Sán Chay'),
(16, '16', 'Cơ-ho'),
(17, '17', 'Chăm'),
(18, '18', 'Sán Dìu'),
(19, '19', 'Hrê'),
(20, '20', 'Mnông'),
(21, '21', 'Ra-glai'),
(22, '22', 'Xtiêng'),
(23, '23', 'Bru-Vân Kiều'),
(24, '24', 'Thổ'),
(25, '25', 'Giáy'),
(26, '26', 'Cơ-tu'),
(27, '27', 'Gié-Triêng'),
(28, '28', 'Mạ'),
(29, '29', 'Khơ-mú'),
(30, '30', 'Co'),
(31, '31', 'Ta-ôi'),
(32, '32', 'Chơ-ro'),
(33, '33', 'Kháng'),
(34, '34', 'Xinh-mun'),
(35, '35', 'Hà Nhì'),
(36, '36', 'Chu-ru'),
(37, '37', 'Lào'),
(38, '38', 'La Chi'),
(39, '39', 'La Ha'),
(40, '40', 'Phù Lá'),
(41, '41', 'La Hủ'),
(42, '42', 'Lự'),
(43, '43', 'Lô Lô'),
(44, '44', 'Chứt'),
(45, '45', 'Mảng'),
(46, '46', 'Pà Thẻn'),
(47, '47', 'Cơ Lao'),
(48, '48', 'Cống'),
(49, '49', 'Bố Y'),
(50, '50', 'Si La'),
(51, '51', 'Pu Péo'),
(52, '52', 'Brâu'),
(53, '53', 'Ơ Đu'),
(54, '54', 'Rơ-măm'),
(55, '55', 'Người nước ngoài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hopdong`
--

CREATE TABLE `tbl_hopdong` (
  `id_hopdong` varchar(255) NOT NULL,
  `id_loaihopdong` int(11) NOT NULL,
  `noi_dung_cv` longtext DEFAULT NULL,
  `ngay_bat_dau_hop_dong` date NOT NULL,
  `muc_luong_chinh` double NOT NULL,
  `phu_cap` double NOT NULL,
  `ngay_ket_thuc_hop_dong` date DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:hợp đồng mới\r\n0:hợp đồng cũ',
  `id_phucap` int(11) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `nguoi_laphd` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hopdong`
--

INSERT INTO `tbl_hopdong` (`id_hopdong`, `id_loaihopdong`, `noi_dung_cv`, `ngay_bat_dau_hop_dong`, `muc_luong_chinh`, `phu_cap`, `ngay_ket_thuc_hop_dong`, `trang_thai`, `id_phucap`, `id_nhanvien`, `nguoi_laphd`, `created_at`, `updated_at`) VALUES
('1-HDLD-ABC', 2, 'Làm', '2020-08-01', 750000, 250000, NULL, 1, 1, 'GDGD.Nha.01', 'Nguyễn Thanh Nhã', '2020-07-27 06:52:25', '2020-07-27 06:52:25'),
('10-HDLD-ABC', 1, NULL, '2020-07-01', 123123, 250000, '2020-07-30', 0, 1, 'GDGD.Nha.01', 'Nhã', '2020-07-30 08:56:13', '2020-07-30 09:08:29'),
('11-HDLD-ABC', 2, NULL, '2020-08-01', 15000000, 3500000, NULL, 1, 35, 'PGDPGD.Nha.2', 'Nguyễn Thanh Nhã', '2020-08-19 08:57:46', '2020-08-19 08:57:46'),
('12-HDLD-ABC', 2, NULL, '2020-08-01', 22000000, 3500000, NULL, 1, 35, 'PGDPGD.Thanh.3', 'Nguyễn Thanh Nhã', '2020-08-19 09:02:58', '2020-08-19 09:02:58'),
('13-HDLD-ABC', 2, NULL, '2020-08-19', 15000000, 2600000, NULL, 1, 36, 'QLNS.Cuong.4', 'Nguyễn Thanh Nhã', '2020-08-19 09:07:54', '2020-08-19 09:07:54'),
('14-HDLD-ABC', 3, NULL, '2020-08-19', 1000000, 2600000, '2020-09-19', 1, 37, 'QLMKT.Dai.5', 'Nguyễn Thanh Nhã', '2020-08-19 09:13:49', '2020-08-19 09:13:49'),
('15-HDLD-ABC', 2, NULL, '2020-08-01', 15000000, 2600000, NULL, 1, 38, 'QLKTTC.Dat.6', 'Nguyễn Thanh Nhã', '2020-08-19 09:21:28', '2020-08-19 09:21:28'),
('16-HDLD-ABC', 1, NULL, '2020-08-29', 5100000, 2600000, '2021-02-28', 1, 36, 'QLNS.A.7', 'Nguyễn Thanh Nhã', '2020-08-29 08:02:42', '2020-08-29 08:02:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoso`
--

CREATE TABLE `tbl_hoso` (
  `id_hoso` int(11) NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoso`
--

INSERT INTO `tbl_hoso` (`id_hoso`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Phiếu thông tin ứng viên', NULL, NULL),
(2, 'Giảm trừ gia cảnh', NULL, NULL),
(3, 'Sơ yếu lý lịch', NULL, NULL),
(4, 'Đơn xin việc', NULL, NULL),
(5, 'Chứng minh nhân dân', NULL, NULL),
(6, 'Giấy khám sức khỏe', NULL, NULL),
(7, 'Giấy khai sinh', NULL, NULL),
(8, 'Bằng chính (ĐH, CĐ, TC)', NULL, NULL),
(9, 'Chứng chỉ', NULL, NULL),
(10, 'Hộ khẩu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hosonhanvien`
--

CREATE TABLE `tbl_hosonhanvien` (
  `id_nhanvien` varchar(20) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_sinh` date NOT NULL,
  `id_hoso` text NOT NULL,
  `so_cmnd` varchar(12) NOT NULL,
  `ton_giao` varchar(255) NOT NULL,
  `ngay_cap_cmnd` date NOT NULL,
  `noi_cap_cmnd` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) NOT NULL,
  `id_dantoc` int(11) NOT NULL,
  `tinh_trang` int(11) NOT NULL COMMENT '1: đang lam\r\n2: nghĩ việc',
  `ngay_nghi` int(11) NOT NULL DEFAULT 12,
  `id_baohiem` int(11) DEFAULT NULL,
  `id_chucvu` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hosonhanvien`
--

INSERT INTO `tbl_hosonhanvien` (`id_nhanvien`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `id_hoso`, `so_cmnd`, `ton_giao`, `ngay_cap_cmnd`, `noi_cap_cmnd`, `anh_dai_dien`, `id_dantoc`, `tinh_trang`, `ngay_nghi`, `id_baohiem`, `id_chucvu`, `created_at`, `updated_at`) VALUES
('GDGD.Nha.01', 'Nguyễn Thanh Nhã', 1, '2020-07-01', '1,2,3', '123456', 'không', '2020-02-20', 'krb', 'CW3o_avatar-mat-trang-facebook.jpg', 1, 1, 12, NULL, 'GDGD', NULL, '2020-08-18 15:27:52'),
('PGDPGD.Nha.2', 'Nguyễn Thanh Nhã', 1, '1998-11-20', '1,3,4,5,7,8,10', '241659768', 'Không', '2016-05-02', 'Dak Lak', 'usermen.jpg', 1, 1, 12, NULL, 'PGDPGD', '2020-08-19 08:40:51', '2020-08-19 09:26:40'),
('PGDPGD.Thanh.3', 'Bùi Đặng Phương Thanh', 1, '1998-06-20', '1,4,5,6,7,8,10', '025677849', 'không', '2013-05-29', 'Công An TPHCM', 'usermen.jpg', 1, 1, 12, 4, 'PGDPGD', '2020-08-19 09:02:31', '2020-08-20 04:03:42'),
('QLKTTC.Dat.6', 'Trương Phạm Quốc ĐẠt', 1, '1998-02-21', '7,8,10', '123456789', 'không', '2020-08-19', 'Quảng Ngãi', 'usermen.jpg', 1, 1, 12, NULL, 'QLKTTC', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
('QLMKT.Dai.5', 'Nguyễn Hoàng Phương Đại', 1, '1996-03-20', '1,4,6,7,8,10', '255255012', 'Đức chúa trời', '2020-08-19', 'Viva cf', 'usermen.jpg', 1, 1, 12, NULL, 'QLMKT', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
('QLNS.A.7', 'Nguyễn Văn A', 1, '2020-08-01', '1,4,5,8', '1231231231', 'không', '2020-08-29', 'TP HCM', 'usermen.jpg', 14, 1, 12, NULL, 'QLNS', '2020-08-29 08:02:23', '2020-08-29 08:02:23'),
('QLNS.Cuong.4', 'Châu Chí Cường', 1, '1998-06-08', '1,3,4,5,6,7,8,10', '301648556', 'Không', '2013-07-15', 'Công an Tỉnh Long An', 'usermen.jpg', 1, 2, 12, 5, 'QLNS', '2020-08-19 09:07:00', '2020-08-28 12:17:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `sdt_ca_nhan` varchar(15) NOT NULL,
  `sdt_nha` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi_thuong_tru` varchar(255) NOT NULL,
  `id_tinh_thuong_tru` int(20) NOT NULL,
  `dia_chi_tam_tru` varchar(255) NOT NULL,
  `id_tinh_tam_tru` int(20) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `sdt_ca_nhan`, `sdt_nha`, `email`, `dia_chi_thuong_tru`, `id_tinh_thuong_tru`, `dia_chi_tam_tru`, `id_tinh_tam_tru`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, '03659989981', '37331121', 'admi1n@gmail.com', 'Dak Lak1', 1, 'TP HCM1', 2, 'GDGD.Nha.01', NULL, '2020-08-19 05:16:27'),
(22, '0365998998', '0365998998', 'thanhnha22081998@gmail.com', 'Krong Bông', 39, '180 Cao Lỗ, Phường 4, Quận 8', 2, 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-19 08:40:51'),
(23, '0783488453', '0783488453', 'mondorae2006@gmail.com', 'Quận 1', 2, 'Quận 10', 2, 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(24, '0355287555', '0355287555', 'dh51603039@student.stu.edu.vn', 'Thủ Thừa', 48, '180 Cao Lỗ, Phường 4, Quận 8', 2, 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-19 09:07:00'),
(25, '0346300399', '06503888888', 'dh51603039@student.stu.edu.vn', 'Cầu chữ Y', 2, 'Cầu chữ Y', 2, 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(26, '123456789', '123456789', 'dh5160584@student.stu.edu.vn', 'đâu đó', 4, '180 Cao Lỗ phường 4 Quận 8', 2, 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(31, '03659989981', '37331121', 'thanhnha22081998@gmail.com', 'Dak Lak', 3, 'TP HCM', 10, 'QLNS.A.7', '2020-08-29 08:02:23', '2020-08-29 08:02:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaihopdong`
--

CREATE TABLE `tbl_loaihopdong` (
  `id_loaihopdong` int(11) NOT NULL,
  `ten_hop_dong` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaihopdong`
--

INSERT INTO `tbl_loaihopdong` (`id_loaihopdong`, `ten_hop_dong`, `created_at`, `updated_at`) VALUES
(1, 'Hợp đồng lao động xác định thời hạn', NULL, NULL),
(2, 'Hợp đồng lao động không xác định thời hạn', NULL, NULL),
(3, 'Hợp đồng lao động thời vụ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaiphuluc`
--

CREATE TABLE `tbl_loaiphuluc` (
  `id` int(11) NOT NULL,
  `ten_phu_luc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaiphuluc`
--

INSERT INTO `tbl_loaiphuluc` (`id`, `ten_phu_luc`, `created_at`, `updated_at`) VALUES
(1, 'Điều chỉnh tiền lương', NULL, NULL),
(2, 'Thay đổi chức vụ', NULL, NULL),
(3, 'Thay đổi, gia hạn hợp đồng', NULL, NULL),
(4, 'Khác', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_luuykien`
--

CREATE TABLE `tbl_luuykien` (
  `id_luuykien` int(11) NOT NULL,
  `ly_do` varchar(255) NOT NULL,
  `nguoi_duyet_1` varchar(50) DEFAULT NULL,
  `chuc_vu_1` varchar(50) DEFAULT NULL,
  `nguoi_duyet_2` varchar(50) DEFAULT NULL,
  `chuc_vu_2` varchar(50) DEFAULT NULL,
  `gia_tri` double DEFAULT NULL,
  `truong_hop` int(11) DEFAULT NULL,
  `thoi_gian_nghi` int(11) DEFAULT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `nguoi_huong` varchar(50) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `ly_do_tu_choi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `id_ykien` int(11) NOT NULL,
  `phong_ban_den` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_luuykien`
--

INSERT INTO `tbl_luuykien` (`id_luuykien`, `ly_do`, `nguoi_duyet_1`, `chuc_vu_1`, `nguoi_duyet_2`, `chuc_vu_2`, `gia_tri`, `truong_hop`, `thoi_gian_nghi`, `ngay_bat_dau`, `nguoi_huong`, `trang_thai`, `ly_do_tu_choi`, `created_at`, `updated_at`, `id_nhanvien`, `id_ykien`, `phong_ban_den`) VALUES
(48, '123', 'Nguyễn Thanh Nhã', 'Giám đốc', NULL, NULL, NULL, NULL, NULL, '2020-08-18', NULL, 1, NULL, '2020-08-17 22:02:07', '2020-08-20 02:58:32', 'GDGD.Nha.01', 7, NULL),
(50, 'Vì em buồn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19', NULL, 0, NULL, '2020-08-19 09:29:42', '2020-08-19 09:29:42', 'QLNS.Cuong.4', 11, NULL),
(58, '123123', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', 'Giám đốc', 123, NULL, NULL, NULL, 'QLKTTC.Dat.6', 2, NULL, '2020-08-20 03:00:37', '2020-08-20 03:01:18', 'GDGD.Nha.01', 9, NULL),
(59, '123', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', 'Giám đốc', 5000000, NULL, NULL, NULL, 'QLKTTC.Dat.6', 2, NULL, '2020-08-20 03:06:46', '2020-08-20 03:07:00', 'GDGD.Nha.01', 9, NULL),
(60, '123', 'Nguyễn Thanh Nhã', 'Giám đốc', NULL, NULL, NULL, NULL, NULL, '2020-08-21', NULL, 1, NULL, '2020-08-20 03:11:47', '2020-08-20 03:11:59', 'GDGD.Nha.01', 7, NULL),
(61, 'nghi', 'Nguyễn Thanh Nhã', 'Giám đốc', NULL, NULL, NULL, NULL, NULL, '2020-09-20', NULL, 2, NULL, '2020-08-20 04:57:15', '2020-08-20 04:57:40', 'GDGD.Nha.01', 11, NULL),
(62, 'drgdf', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', NULL, NULL, NULL, NULL, '2020-08-20', NULL, 2, NULL, '2020-08-20 05:44:07', '2020-08-30 06:25:26', 'GDGD.Nha.01', 7, NULL),
(63, 'Không hoàn thành trách nhiệm', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', 'Giám đốc', 10000, NULL, NULL, NULL, 'NVMKT.T.9', 2, NULL, '2020-08-21 08:09:29', '2020-08-21 08:10:03', 'GDGD.Nha.01', 10, NULL),
(64, 'Không hoàn thành trách nhiệm lần 2', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', 'Giám đốc', 10000, NULL, NULL, NULL, 'NVMKT.T.9', 2, NULL, '2020-08-23 09:20:45', '2020-08-23 09:20:45', 'GDGD.Nha.01', 10, NULL),
(65, 'nanan', 'Nguyễn Thanh Nhã', 'Giám đốc', 'Nguyễn Thanh Nhã', 'Giám đốc', 70000, NULL, NULL, NULL, 'NVMKT.T.9', 2, NULL, '2020-08-23 09:20:45', '2020-08-23 09:20:45', 'GDGD.Nha.01', 10, NULL),
(66, '1234', 'Nguyễn Văn A', 'Quản Lý Nhân Sự', 'Nguyễn Thanh Nhã', NULL, NULL, NULL, NULL, '2020-08-30', NULL, 2, NULL, '2020-08-30 07:29:27', '2020-08-30 07:37:47', 'GDGD.Nha.01', 7, 'NS'),
(67, 'Xin lỗi, tôi không thể tiếp tục làm việc...', 'Nguyễn Văn A', 'Quản Lý Nhân Sự', 'Nguyễn Thanh Nhã', NULL, NULL, NULL, NULL, '2020-09-30', NULL, 2, NULL, '2020-08-30 09:49:26', '2020-08-30 09:49:52', 'QLNS.A.7', 11, 'NS'),
(68, 'Không làm việc đúng với quy trình', 'Nguyễn Văn A', 'Quản Lý Nhân Sự', 'Nguyễn Thanh Nhã', NULL, NULL, NULL, NULL, NULL, 'QLKTTC.Dat.6', 2, NULL, '2020-08-30 09:54:25', '2020-08-30 10:00:42', 'QLNS.A.7', 10, 'NS'),
(69, 'Thường xuyên đi làm trễ', 'Nguyễn Văn A', 'Quản Lý Nhân Sự', 'Nguyễn Thanh Nhã', NULL, NULL, NULL, NULL, NULL, 'QLKTTC.Dat.6', 2, NULL, '2020-08-30 09:55:21', '2020-08-30 10:00:34', 'QLNS.A.7', 10, 'NS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_mientrugiacanh`
--

CREATE TABLE `tbl_mientrugiacanh` (
  `id_mientrugiacanh` int(11) NOT NULL,
  `so_luong_mien_tru` int(11) NOT NULL,
  `anh_minh_chung` varchar(255) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_mientrugiacanh`
--

INSERT INTO `tbl_mientrugiacanh` (`id_mientrugiacanh`, `so_luong_mien_tru`, `anh_minh_chung`, `id_nhanvien`) VALUES
(1, 2, '', 'GDGD.Nha.01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ten_hien_thi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `ten`, `ten_hien_thi`, `created_at`, `updated_at`) VALUES
(1, 'theloai', 'Quản lý thể loại tin tức', NULL, NULL),
(2, 'loaitin', 'Quản lý loại tin tin tức', NULL, NULL),
(3, 'tintuc', 'Quản lý tin tức', NULL, NULL),
(4, 'thongtincongty', 'Quản lý thông tin công ty', NULL, NULL),
(5, 'phongban', 'Quản lý phòng ban', NULL, NULL),
(6, 'chucvu', 'Quản lý chức vụ', NULL, NULL),
(7, 'phucap', 'Quản lý phụ cấp', NULL, NULL),
(8, 'quanlyhopdong', 'Quản lý hợp đồng', NULL, NULL),
(9, 'dsnhanvien', 'Danh sách nhân viên', NULL, NULL),
(10, 'quanlyykien', 'Quản lý ý kiến của nhân viên', NULL, NULL),
(11, 'ykien', 'Đưa ý kiến', NULL, NULL),
(12, 'quanlyloaiykien', 'Quản lý các loại ý kiến của nhân viên', NULL, NULL),
(13, 'quanlyluong', 'Quản lý lương nhân viên', NULL, NULL),
(14, 'thongtinnhanvien', 'Quản lý thông tin nhân viên', NULL, NULL),
(15, 'hopdongcanhan', 'Xem hợp đồng cá nhân', NULL, NULL),
(16, 'laphoso', 'Lập hồ sơ nhân viên', NULL, NULL),
(17, 'laphopdong', 'Quản lý hợp đồng nhân viên', NULL, NULL),
(18, 'lapphuluc', 'Quản lý phụ lục nhân viên', NULL, NULL),
(19, 'lapquyetdinh', 'Quản lý quyết định kỷ luật nhân viên', NULL, NULL),
(20, 'qlnhanvienpb', 'Quản lý nhân viên phòng ban', NULL, NULL),
(21, 'quyenduyetyk', 'Quyền duyệt ý kiến nhân viên', NULL, NULL),
(22, 'xacnhanyk', 'Quyền xác nhân ý kiến nhân viên', NULL, NULL),
(23, 'quanlyykienphongban', 'Quản lý ý kiến nhân viên theo phòng ban', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phongban`
--

CREATE TABLE `tbl_phongban` (
  `id_phongban` varchar(10) NOT NULL,
  `ten_phong_ban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phongban`
--

INSERT INTO `tbl_phongban` (`id_phongban`, `ten_phong_ban`, `created_at`, `updated_at`) VALUES
('GD', 'Giám đốc', NULL, NULL),
('KTTC', 'Kế Toán- Tài Chính', '2020-08-19 07:38:44', '2020-08-19 07:38:44'),
('MKT', 'Marketing', '2020-08-19 07:40:54', '2020-08-19 07:40:54'),
('NS', 'Nhân sự', '2020-08-19 07:38:02', '2020-08-19 07:38:02'),
('PGD', 'Phó giám đốc', '2020-08-19 07:33:51', '2020-08-19 07:33:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phucap`
--

CREATE TABLE `tbl_phucap` (
  `id` int(11) NOT NULL,
  `an_trua` double DEFAULT NULL,
  `xang_xe` double DEFAULT NULL,
  `khac` double DEFAULT NULL,
  `tong_tien_phu_cap` double DEFAULT NULL,
  `id_chucvu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phucap`
--

INSERT INTO `tbl_phucap` (`id`, `an_trua`, `xang_xe`, `khac`, `tong_tien_phu_cap`, `id_chucvu`, `created_at`, `updated_at`) VALUES
(1, 1500000, 100000, 100000, 1700000, 'GDGD', NULL, '2020-08-19 07:56:09'),
(35, 1500000, 1000000, 1000000, 3500000, 'PGDPGD', '2020-08-19 07:53:11', '2020-08-19 07:55:53'),
(36, 1000000, 800000, 800000, 2600000, 'QLNS', '2020-08-19 07:58:00', '2020-08-19 07:58:52'),
(37, 1000000, 800000, 800000, 2600000, 'QLMKT', '2020-08-19 08:01:29', '2020-08-19 08:01:40'),
(38, 1000000, 800000, 800000, 2600000, 'QLKTTC', '2020-08-19 08:03:26', '2020-08-19 08:03:38'),
(39, 800000, 500000, 500000, 1800000, 'NVNS', '2020-08-19 08:04:38', '2020-08-19 08:04:50'),
(40, 800000, 500000, 500000, 1800000, 'NVMKT', '2020-08-19 08:05:40', '2020-08-19 08:05:50'),
(41, 800000, 500000, 500000, 1800000, 'NVKTTC', '2020-08-19 08:06:16', '2020-08-19 08:06:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phuluc`
--

CREATE TABLE `tbl_phuluc` (
  `id_phuluc` varchar(255) NOT NULL,
  `id_hopdong` varchar(255) NOT NULL,
  `nguoi_lap_phu_luc` varchar(250) NOT NULL,
  `id_loaiphuluc` int(11) NOT NULL,
  `id_chitiet` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phuluc`
--

INSERT INTO `tbl_phuluc` (`id_phuluc`, `id_hopdong`, `nguoi_lap_phu_luc`, `id_loaiphuluc`, `id_chitiet`, `created_at`, `updated_at`) VALUES
('1_HĐLĐ-ABC', '14-HDLD-ABC', 'Nguyễn Thanh Nhã', 3, 61, '2020-08-19 18:50:55', '2020-08-19 18:50:55'),
('2_HĐLĐ-ABC', '14-HDLD-ABC', 'Nguyễn Thanh Nhã', 1, 62, '2020-08-19 19:00:19', '2020-08-19 19:00:19'),
('3_HĐLĐ-ABC', '16-HDLD-ABC', 'Nguyễn Thanh Nhã', 1, 66, '2020-08-29 08:03:01', '2020-08-29 08:03:01'),
('4_HĐLĐ-ABC', '16-HDLD-ABC', 'Nguyễn Thanh Nhã', 2, 67, '2020-08-29 08:03:23', '2020-08-29 08:03:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyetdinhthoiviec`
--

CREATE TABLE `tbl_quyetdinhthoiviec` (
  `id` int(11) NOT NULL,
  `noi_dung` longtext DEFAULT NULL,
  `ngay_quyet_dinh` date NOT NULL,
  `ngay_nghi_viec` date NOT NULL,
  `nguoi_lap_quyet_dinh` varchar(255) NOT NULL,
  `loai` int(11) NOT NULL,
  `anh_minh_chung` varchar(255) DEFAULT NULL,
  `trang_thai` int(1) DEFAULT NULL,
  `id_nhanvien` varchar(20) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyetdinhthoiviec`
--

INSERT INTO `tbl_quyetdinhthoiviec` (`id`, `noi_dung`, `ngay_quyet_dinh`, `ngay_nghi_viec`, `nguoi_lap_quyet_dinh`, `loai`, `anh_minh_chung`, `trang_thai`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(21, 'Gia đình có việc đột xuất, ko thể tham gia tiếp', '2020-08-26', '2020-09-27', 'Nguyễn Thanh Nhã', 2, 'mAOF_Tuyển-tập-hình-nền-4K-dành-cho-máy-tính-đẹp-7.jpg', 2, 'QLNS.Cuong.4', NULL, '2020-08-28 12:22:02'),
(22, 'Xin lỗi, tôi không thể tiếp tục làm việc...', '2020-08-30', '2020-09-30', 'Nguyễn Thanh Nhã', 2, NULL, NULL, 'QLNS.A.7', '2020-08-30 09:49:52', '2020-08-30 09:49:52'),
(23, NULL, '2020-08-30', '2020-09-30', 'Nguyễn Thanh Nhã', 1, NULL, 0, 'QLKTTC.Dat.6', '2020-08-30 10:00:57', '2020-08-30 10:00:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tangca`
--

CREATE TABLE `tbl_tangca` (
  `id_tangca` int(11) NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `thoi_gian_lam` double DEFAULT NULL,
  `ghi_nhan` int(11) DEFAULT 0,
  `ly_do` varchar(255) DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_tangca`
--

INSERT INTO `tbl_tangca` (`id_tangca`, `check_in`, `thoi_gian_lam`, `ghi_nhan`, `ly_do`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(4, '2020-07-18 00:00:00', 1, 1, NULL, 'GDGD.Nha.01', '2020-07-28 01:07:31', '2020-07-28 02:44:34'),
(16, '2020-08-21 00:00:00', NULL, 0, '123', 'GDGD.Nha.01', '2020-08-20 03:11:47', '2020-08-20 03:11:47'),
(17, '2020-08-20 00:00:00', NULL, 1, 'drgdf', 'GDGD.Nha.01', '2020-08-20 05:44:07', '2020-08-30 06:25:26'),
(18, '2020-08-30 00:00:00', NULL, 1, '1234', 'GDGD.Nha.01', '2020-08-30 07:29:27', '2020-08-30 07:37:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtinchinh`
--

CREATE TABLE `tbl_thongtinchinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_cong_ty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_dai_dien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuc_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtinchinh`
--

INSERT INTO `tbl_thongtinchinh` (`id`, `ten_cong_ty`, `Hinh`, `dia_chi`, `sdt`, `Fax`, `website`, `nguoi_dai_dien`, `chuc_vu`, `mail`, `created_at`, `updated_at`) VALUES
(8, 'CÔNG NGHỆ SÀI GÒN', 'jGXb_STU_Logo_Letters.png', '180 Cao lỗ, Phường 4, Quận 8, TP HCM', '0365998998', '123456789', 'https://www.stu.edu.vn', 'Nhã and Thanh', 'Giám đốc', 'ahn.krb1@gmail.com', '2020-08-09 18:04:14', '2020-08-20 06:03:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtingioithieu`
--

CREATE TABLE `tbl_thongtingioithieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtingioithieu`
--

INSERT INTO `tbl_thongtingioithieu` (`id`, `Ten`, `Hinh`, `NoiDung`, `created_at`, `updated_at`) VALUES
(1, 'Tầm nhìn', 'd670e9075195f02eceeabe5919e4eb28.png', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>', '2020-08-17 08:00:55', '2020-08-30 04:34:54'),
(2, 'Sứ mệnh', 'YHLmAqm9eM5AYKb1hLufTTf7jK42L8g2.jpeg', '<p>Đại Học C&ocirc;ng Nghệ S&agrave;i G&ograve;n (STU) đ&agrave;o tạo đa ng&agrave;nh, đa lĩnh vực với c&aacute;c tr&igrave;nh độ:&nbsp;Cao đẳng, Đại học, Thạc sĩ v&agrave; Tiến sĩ;Cung cấp nguồn nh&acirc;n lực chất lượng cao theo hướng c&ocirc;ng nghệ, c&oacute; phẩm chất đạo đức tốt, c&oacute; văn h&oacute;a, ngoại ngữ v&agrave; chuy&ecirc;n m&ocirc;n nghiệp vụ giỏi ph&ugrave; hợp ng&agrave;y c&agrave;ng cao nhu cầu của sự ph&aacute;t triển kinh tế x&atilde; hội, của đất nước, của cộng đồng v&agrave; nhu cầu học tập của nh&acirc;n d&acirc;n.</p>', '2020-05-06 16:50:11', '2020-08-30 04:28:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuecanhan`
--

CREATE TABLE `tbl_thuecanhan` (
  `id_thuecanhan` int(11) NOT NULL,
  `thue_bhxh` double NOT NULL,
  `thue_bhyt` double NOT NULL,
  `thue_bhtn` double NOT NULL,
  `thue_thu_nhap` double NOT NULL,
  `tong_tien_thue` double NOT NULL,
  `id_bangluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tinh`
--

CREATE TABLE `tbl_tinh` (
  `id_tinh` int(20) NOT NULL,
  `maso_tinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_tinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tinh`
--

INSERT INTO `tbl_tinh` (`id_tinh`, `maso_tinh`, `ten_tinh`) VALUES
(1, '1', 'Hà Nội'),
(2, '2', 'TP. Hồ Chí Minh'),
(3, '3', 'Hải Phòng'),
(4, '4', 'Đà Nẵng'),
(5, '5', 'Hà Giang'),
(6, '6', 'Cao Bằng'),
(7, '7', 'Lai Châu'),
(8, '8', 'Lào Cai'),
(9, '9', 'Tuyên Quang'),
(10, '10', 'Lạng Sơn'),
(11, '11', 'Bắc Kạn'),
(12, '12', 'Thái Nguyên'),
(13, '13', 'Yên Bái'),
(14, '14', 'Sơn La'),
(15, '15', 'Phú Thọ'),
(16, '16', 'Vĩnh Phúc'),
(17, '17', 'Quảng Ninh'),
(18, '18', 'Bắc Giang'),
(19, '19', 'Bắc Ninh'),
(20, '21', 'Hải Dương'),
(21, '22', 'Hưng Yên'),
(22, '23', 'Hoà Bình'),
(23, '24', 'Hà Nam'),
(24, '25', 'Nam Định'),
(25, '26', 'Thái Bình'),
(26, '27', 'Ninh Bình'),
(27, '28', 'Thanh Hoá'),
(28, '29', 'Nghệ An'),
(29, '30', 'Hà Tĩnh'),
(30, '31', 'Quảng Bình'),
(31, '32', 'Quảng Trị'),
(32, '33', 'Thừa Thiên -Huế'),
(33, '34', 'Quảng Nam'),
(34, '35', 'Quảng Ngãi'),
(35, '36', 'Kon Tum'),
(36, '37', 'Bình Định'),
(37, '38', 'Gia Lai'),
(38, '39', 'Phú Yên'),
(39, '40', 'Đắk Lắk'),
(40, '41', 'Khánh Hoà'),
(41, '42', 'Lâm Đồng'),
(42, '43', 'Bình Phước'),
(43, '44', 'Bình Dương'),
(44, '45', 'Ninh Thuận'),
(45, '46', 'Tây Ninh'),
(46, '47', 'Bình Thuận'),
(47, '48', 'Đồng Nai'),
(48, '49', 'Long An'),
(49, '50', 'Đồng Tháp'),
(50, '51', 'An Giang'),
(51, '52', 'Bà Rịa-Vũng Tàu'),
(52, '53', 'Tiền Giang'),
(53, '54', 'Kiên Giang'),
(54, '55', 'Cần Thơ'),
(55, '56', 'Bến Tre'),
(56, '57', 'Vĩnh Long'),
(57, '58', 'Trà Vinh'),
(58, '59', 'Sóc Trăng'),
(59, '60', 'Bạc Liêu'),
(60, '61', 'Cà Mau'),
(61, '62', 'Điện Biên'),
(62, '63', 'Đăk Nông'),
(63, '64', 'Hậu Giang'),
(64, '65', 'Cục nhà trường'),
(65, '-1', 'Nơi sinh khác ( các tỉnh củ)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuyendung`
--

CREATE TABLE `tbl_tintuyendung` (
  `id` int(10) UNSIGNED NOT NULL,
  `vi_tri` varchar(10) CHARACTER SET utf8 NOT NULL,
  `muc_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `han_nop` date NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuyendung`
--

INSERT INTO `tbl_tintuyendung` (`id`, `vi_tri`, `muc_luong`, `han_nop`, `Hinh`, `NoiDung`, `created_at`, `updated_at`) VALUES
(10, 'GDGD', '78tr-8tr', '2020-09-18', 'yWws_115777478_743350246492105_4490654208291039648_n.jpg', '<p><strong>I. BẠN SẼ L&Agrave;M G&Igrave;?</strong></p>\r\n\r\n<ul>\r\n	<li>Chịu tr&aacute;ch nhiệm hoạt động vận h&agrave;nh của cửa h&agrave;ng.</li>\r\n	<li>Quản l&yacute; đội ngũ nh&acirc;n vi&ecirc;n l&agrave;m việc hiệu quả bao gồm hoạt động đ&agrave;o tạo, tuyển dụng, ph&acirc;n c&ocirc;ng c&ocirc;ng việc.</li>\r\n	<li>Đảm bảo hoạt động chăm s&oacute;c kh&aacute;ch h&agrave;ng đ&uacute;ng ti&ecirc;u chuẩn c&ocirc;ng ty đề ra.</li>\r\n	<li>Chịu tr&aacute;ch nhiệm về doanh số b&aacute;n h&agrave;ng của cửa h&agrave;ng.</li>\r\n</ul>\r\n\r\n<p><strong>II. BẠN CẦN G&Igrave;?</strong></p>\r\n\r\n<ul>\r\n	<li>Ưu ti&ecirc;n tiếng Anh giao tiếp.</li>\r\n	<li>Nhanh nhẹn, linh hoạt, chủ động trong c&ocirc;ng việc.</li>\r\n	<li>C&oacute; tinh thần tr&aacute;ch nhiệm v&agrave; cầu tiến.</li>\r\n</ul>\r\n\r\n<p><strong>III. THỜI GIAN L&Agrave;M VIỆC CỦA BẠN</strong></p>\r\n\r\n<ul>\r\n	<li>08h00 &ndash; 17h00.</li>\r\n</ul>\r\n\r\n<p><strong>IV. TẠI SAO BẠN N&Ecirc;N L&Agrave;M TẠI VIỆC TẠI Đ&Acirc;Y?</strong></p>\r\n\r\n<ul>\r\n	<li>12 ng&agrave;y ph&eacute;p/năm.</li>\r\n	<li>BHXH, BHYT, BHTN đầy đủ.</li>\r\n	<li>Cơ hội thăng tiến r&otilde; r&agrave;ng.</li>\r\n	<li>L&agrave;m việc trong m&ocirc;t trường trẻ, năng động, th&acirc;n thiện.</li>\r\n</ul>', '2020-08-17 10:09:31', '2020-08-30 10:33:45'),
(12, 'NVKTTC', '10tr-20tr', '2020-09-16', '', '<p>Y&ecirc;u cầu c&ocirc;ng việc:</p>\r\n\r\n<p>C&oacute; kinh nghiệm về lập tr&igrave;nh PHP, sử dụng th&agrave;nh thạo &iacute;t nhất 1 PHP framework</p>\r\n\r\n<p>C&oacute; kinh nghiệm sử dụng hệ quản trị cơ sở dữ liệu: MySQL Ưu ti&ecirc;n c&oacute; kiến thức về lập tr&igrave;nh Web ( HTML, CSS, Javascript, jQuery, XML)</p>\r\n\r\n<p>Ưu ti&ecirc;n c&oacute; kinh nghiệm về Phần Mềm Quản l&yacute; Kh&aacute;ch H&agrave;ng</p>\r\n\r\n<p>C&oacute; kỹ năng về hệ điều h&agrave;nh Linux Tiếng Anh đọc hiểu t&agrave;i liệu</p>\r\n\r\n<p>C&oacute; tư duy lập tr&igrave;nh tốt, tư duy lập tr&igrave;nh hướng đối tượng, khả năng tự học hỏi v&agrave; t&igrave;m hiểu c&aacute;c c&ocirc;ng nghệ mới tr&ecirc;n nền tảng web.</p>\r\n\r\n<p>C&oacute; kỹ năng l&agrave;m việc theo nh&oacute;m, chịu được &aacute;p lực trong c&ocirc;ng việc v&agrave; tinh thần tr&aacute;ch nhiệm cao.</p>', '2020-08-19 19:28:04', '2020-08-30 10:32:41'),
(13, 'NVNS', '10tr-12tr', '2020-10-21', '', '<p>VỊ TR&Iacute;: IT HELPDESK (7.000.000đ/th&aacute;ng - thỏa thuận theo khả năng)</p>\r\n\r\n<p>Apply ngay h&ocirc;m nay v&agrave; bạn sẽ:</p>\r\n\r\n<p>&nbsp;L&agrave;m việc trong m&ocirc;i trường trẻ trung, năng động, đồng nghiệp th&acirc;n thiện, th&acirc;n thiết như gia đ&igrave;nh.</p>\r\n\r\n<p>Được hưởng đầy đủ c&aacute;c ph&uacute;c lợi hấp dẫn của LiV Vacation Club.</p>\r\n\r\n<p>Nhiều cơ hội được đ&agrave;o tạo n&acirc;ng cao năng lực chuy&ecirc;n m&ocirc;n, c&oacute; cơ hội thăng tiến trong sự nghiệp.</p>\r\n\r\n<p>Y&Ecirc;U CẦU CƠ BẢN:</p>\r\n\r\n<p>Tốt nghiệp cao đẳng trở l&ecirc;n chuy&ecirc;n ng&agrave;nh c&ocirc;ng nghệ th&ocirc;ng tin</p>\r\n\r\n<p>Kinh nghiệm từ 0 đến 1 năm.</p>\r\n\r\n<p>C&oacute; kiến thức về hệ thống mạng LAN, phần cứng m&aacute;y t&iacute;nh, hệ điều h&agrave;nh Windows v&agrave; c&aacute;c phần mềm ứng dụng office.</p>', '2020-08-19 19:29:12', '2020-08-19 19:29:12'),
(14, 'NVMKT', '8tr-15tr', '2020-08-31', '', '<p>- Tư vấn, b&aacute;n h&agrave;ng cho kh&aacute;ch</p>\r\n\r\n<p>- Sắp xếp trưng b&agrave;y h&agrave;ng h&oacute;a</p>\r\n\r\n<p>- L&agrave;m fulltime( thứ 7, chủ nhật nghĩ)</p>\r\n\r\n<p>- C&ocirc;ng việc sẽ trao đổi cụ thể khi phỏng vấn.</p>\r\n\r\n<p>- Địa điểm l&agrave;m việc : c&aacute;c quận trong TPHCM</p>', '2020-08-20 06:01:07', '2020-08-30 10:31:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trinhdo`
--

CREATE TABLE `tbl_trinhdo` (
  `id_trinhdo` int(11) NOT NULL,
  `muc_trinh_do` varchar(50) NOT NULL,
  `nganh_dao_tao` varchar(50) NOT NULL,
  `noi_dao_tao` varchar(50) NOT NULL,
  `chuyen_nganh` varchar(50) NOT NULL,
  `nam_tot_nghiep` year(4) NOT NULL,
  `xep_loai` varchar(50) NOT NULL,
  `chung_chi_khac` varchar(50) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_trinhdo`
--

INSERT INTO `tbl_trinhdo` (`id_trinhdo`, `muc_trinh_do`, `nganh_dao_tao`, `noi_dao_tao`, `chuyen_nganh`, `nam_tot_nghiep`, `xep_loai`, `chung_chi_khac`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, 'Đại học', 'CNTT', 'STU', 'CNTT', 2020, 'Giỏi', 'không', 'GDGD.Nha.01', NULL, '2020-07-27 06:44:57'),
(24, 'Đại học', 'Công Nghệ Thông Tin', 'Công Nghệ Sài Gòn', 'Công Nghệ Thông Tin', 2020, 'Trung Bình Khá', 'không', 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-19 08:40:51'),
(25, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'không', 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(26, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ  Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'không', 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-19 09:07:00'),
(27, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'Không', 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(28, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Giỏi', 'không', 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(33, 'Đại học', 'Công nghệ thông tin', 'STU', 'Lập trình web', 2020, 'Giỏi', 'không', 'QLNS.A.7', '2020-08-29 08:02:23', '2020-08-29 08:02:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ykien`
--

CREATE TABLE `tbl_ykien` (
  `id_ykien` int(11) NOT NULL,
  `loai_y_kien` varchar(255) NOT NULL,
  `chi_tiet` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_ykien`
--

INSERT INTO `tbl_ykien` (`id_ykien`, `loai_y_kien`, `chi_tiet`, `created_at`, `updated_at`) VALUES
(1, 'Đề Xuất Nghỉ Phép', '0,2,4,5', NULL, NULL),
(2, 'Xin Nghỉ Phép Vì Vợ Sắp Sinh', '0,2,5,6', NULL, NULL),
(3, 'Xin Nghỉ Phép Việc Riêng', '0,2,5,6', NULL, NULL),
(4, 'Xin Nghỉ Phép Vì Lý Do Bệnh Tật', '7', NULL, NULL),
(5, 'Đề Xuất Ứng Lương', '0,2,3', NULL, NULL),
(6, 'Đề Xuất Tăng Lương', '0,2,3', NULL, NULL),
(7, 'Đề Xuất Tăng Ca', '2,5,0', NULL, NULL),
(8, 'Bổ sung miễn trừ gia cảnh', '3,6,0', NULL, NULL),
(9, 'Đề Xuất Khen Thưởng', '1,2,0', NULL, NULL),
(10, 'Đề Xuất Kỷ Luật', '1,2,0', NULL, NULL),
(11, 'Xin phép nghỉ việc', '2,5,0', '2020-08-13 08:08:10', '2020-08-13 08:08:10'),
(12, 'Đề Xuất Khác', '2,0', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT 0,
  `SoLuotXem` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `created_at`, `updated_at`) VALUES
(1039, 'Lorem Ipsum', 'lorem-ipsum', NULL, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '16220_Tech.jpg', 1, NULL, '2020-08-21 09:25:26', '2020-08-21 09:25:26'),
(1040, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'section-1-10-32-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc', NULL, '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '142536_AI-and-robotics.jpg', 1, NULL, '2020-08-21 09:26:53', '2020-08-21 09:43:28'),
(1041, 'Lorem Ipsum2', 'lorem-ipsum2', NULL, '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', 'va5h_unnamed.jpg', 1, NULL, '2020-08-21 09:27:27', '2020-08-21 09:31:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 1,
  `code` varchar(255) DEFAULT NULL,
  `time_code` datetime DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `quyen`, `code`, `time_code`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, 'Nhã - Thanh', 'admin@gmail.com', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'GDGD.Nha.01', NULL, '2020-08-19 05:24:45'),
(29, 'Nhã Đại Ca', 'thanhnha22081998@gmail.com', '$2y$10$aXbYPFn/mxXz2Xf5MJjEy.FSwiY/zPwEKXHefUWxAjh3o13rwxR4i', 1, '$2y$10$nDdx3XkCff865B1RJ1IFdeckAJygJWWB.WdYnMUw0THYJHmOQi3B6', '2020-08-26 14:27:20', 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-26 07:27:41'),
(30, 'Thanh Bùi', 'PGDPGD.Thanh.3@cty.com.vn', '$2y$10$WH/25Ap1mZd4fVJZBgwhX.HBW6.y2X0gNxGCm.mmgyQVzp/Ot4Rka', 1, NULL, NULL, 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(31, 'Cường CV', 'QLNS.Cuong.4@cty.com.vn', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 0, NULL, NULL, 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-28 12:17:39'),
(32, 'Kan Nguyễn', 'QLMKT.Dai.5@cty.com.vn', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(33, 'Đạt 09', 'QLKTTC.Dat.6@cty.com.vn', '$2y$10$2fcnSnZnQ139W17/7InWzuf5lX8rD1ui.ybdoMp0Lgod/GWXDVS5a', 1, NULL, NULL, 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(38, 'Thanh Nhã', 'QLNS.A.7@cty.com.vn', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'QLNS.A.7', '2020-08-29 08:02:23', '2020-08-29 08:02:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ykien` (`id_luuykien`);

--
-- Chỉ mục cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD PRIMARY KEY (`id_bangluong`),
  ADD KEY `id_chamcong` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD PRIMARY KEY (`id_chamcong`),
  ADD KEY `tbl_chamcong_ibfk_1` (`id_bangluong`),
  ADD KEY `id_tangca` (`id_tangca`);

--
-- Chỉ mục cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chucvu_moi` (`id_chucvu_moi`),
  ADD KEY `id_phucap_moi` (`id_phucap_moi`),
  ADD KEY `id_hopdong` (`id_hopdong`),
  ADD KEY `id_loaihopdong_moi` (`id_loaihopdong_moi`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`id_chucvu`),
  ADD KEY `id_phongban` (`id_phongban`);

--
-- Chỉ mục cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Chỉ mục cho bảng `tbl_dantoc`
--
ALTER TABLE `tbl_dantoc`
  ADD PRIMARY KEY (`id_dantoc`);

--
-- Chỉ mục cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD PRIMARY KEY (`id_hopdong`),
  ADD KEY `tbl_hopdong_ibfk_2` (`id_nhanvien`),
  ADD KEY `id_loai_hop_dong` (`id_loaihopdong`),
  ADD KEY `id_phucap` (`id_phucap`);

--
-- Chỉ mục cho bảng `tbl_hoso`
--
ALTER TABLE `tbl_hoso`
  ADD PRIMARY KEY (`id_hoso`);

--
-- Chỉ mục cho bảng `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_dantoc` (`id_dantoc`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_tinh_tam_tru` (`id_tinh_tam_tru`),
  ADD KEY `id_tinh_thuong_tru` (`id_tinh_thuong_tru`);

--
-- Chỉ mục cho bảng `tbl_loaihopdong`
--
ALTER TABLE `tbl_loaihopdong`
  ADD PRIMARY KEY (`id_loaihopdong`);

--
-- Chỉ mục cho bảng `tbl_loaiphuluc`
--
ALTER TABLE `tbl_loaiphuluc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD PRIMARY KEY (`id_luuykien`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_ykien` (`id_ykien`);

--
-- Chỉ mục cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  ADD PRIMARY KEY (`id_mientrugiacanh`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_phongban`
--
ALTER TABLE `tbl_phongban`
  ADD PRIMARY KEY (`id_phongban`);

--
-- Chỉ mục cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chuvu` (`id_chucvu`);

--
-- Chỉ mục cho bảng `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD PRIMARY KEY (`id_phuluc`),
  ADD KEY `id_hopdong` (`id_hopdong`),
  ADD KEY `id_loaiphuluc` (`id_loaiphuluc`),
  ADD KEY `id_chitiet` (`id_chitiet`);

--
-- Chỉ mục cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  ADD PRIMARY KEY (`id_tangca`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_thongtinchinh`
--
ALTER TABLE `tbl_thongtinchinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thongtingioithieu`
--
ALTER TABLE `tbl_thongtingioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  ADD PRIMARY KEY (`id_thuecanhan`),
  ADD KEY `id_bangluong` (`id_bangluong`);

--
-- Chỉ mục cho bảng `tbl_tinh`
--
ALTER TABLE `tbl_tinh`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vi_tri` (`vi_tri`);

--
-- Chỉ mục cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD PRIMARY KEY (`id_trinhdo`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  ADD PRIMARY KEY (`id_ykien`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  MODIFY `id_bangluong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  MODIFY `id_chamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=931;

--
-- AUTO_INCREMENT cho bảng `tbl_dantoc`
--
ALTER TABLE `tbl_dantoc`
  MODIFY `id_dantoc` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_hoso`
--
ALTER TABLE `tbl_hoso`
  MODIFY `id_hoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_loaihopdong`
--
ALTER TABLE `tbl_loaihopdong`
  MODIFY `id_loaihopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_loaiphuluc`
--
ALTER TABLE `tbl_loaiphuluc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  MODIFY `id_luuykien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  MODIFY `id_mientrugiacanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  MODIFY `id_tangca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtinchinh`
--
ALTER TABLE `tbl_thongtinchinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtingioithieu`
--
ALTER TABLE `tbl_thongtingioithieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  MODIFY `id_thuecanhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_tinh`
--
ALTER TABLE `tbl_tinh`
  MODIFY `id_tinh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  MODIFY `id_trinhdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  MODIFY `id_ykien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  ADD CONSTRAINT `tbl_anhykien_ibfk_1` FOREIGN KEY (`id_luuykien`) REFERENCES `tbl_luuykien` (`id_luuykien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD CONSTRAINT `tbl_bangluong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD CONSTRAINT `tbl_chamcong_ibfk_1` FOREIGN KEY (`id_bangluong`) REFERENCES `tbl_bangluong` (`id_bangluong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chamcong_ibfk_2` FOREIGN KEY (`id_tangca`) REFERENCES `tbl_tangca` (`id_tangca`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_2` FOREIGN KEY (`id_chucvu_moi`) REFERENCES `tbl_chucvu` (`id_chucvu`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_3` FOREIGN KEY (`id_phucap_moi`) REFERENCES `tbl_phucap` (`id`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_4` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_5` FOREIGN KEY (`id_loaihopdong_moi`) REFERENCES `tbl_loaihopdong` (`id_loaihopdong`);

--
-- Các ràng buộc cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD CONSTRAINT `tbl_chucvu_ibfk_1` FOREIGN KEY (`id_phongban`) REFERENCES `tbl_phongban` (`id_phongban`);

--
-- Các ràng buộc cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  ADD CONSTRAINT `tbl_chucvu_permission_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chucvu_permission_ibfk_2` FOREIGN KEY (`id_permission`) REFERENCES `tbl_permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD CONSTRAINT `tbl_hopdong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hopdong_ibfk_2` FOREIGN KEY (`id_loaihopdong`) REFERENCES `tbl_loaihopdong` (`id_loaihopdong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hopdong_ibfk_3` FOREIGN KEY (`id_phucap`) REFERENCES `tbl_phucap` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD CONSTRAINT `tbl_hosonhanvien_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD CONSTRAINT `tbl_lienhe_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_lienhe_ibfk_2` FOREIGN KEY (`id_tinh_tam_tru`) REFERENCES `tbl_tinh` (`id_tinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_lienhe_ibfk_3` FOREIGN KEY (`id_tinh_thuong_tru`) REFERENCES `tbl_tinh` (`id_tinh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD CONSTRAINT `tbl_luuykien_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_luuykien_ibfk_2` FOREIGN KEY (`id_ykien`) REFERENCES `tbl_ykien` (`id_ykien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  ADD CONSTRAINT `tbl_mientrugiacanh_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  ADD CONSTRAINT `tbl_phucap_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD CONSTRAINT `tbl_phuluc_ibfk_1` FOREIGN KEY (`id_loaiphuluc`) REFERENCES `tbl_loaiphuluc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_phuluc_ibfk_2` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_phuluc_ibfk_3` FOREIGN KEY (`id_chitiet`) REFERENCES `tbl_chitietphuluc` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  ADD CONSTRAINT `tbl_quyetdinhthoiviec_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  ADD CONSTRAINT `tbl_tangca_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD CONSTRAINT `tbl_tintuyendung_ibfk_1` FOREIGN KEY (`vi_tri`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD CONSTRAINT `tbl_trinhdo_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
