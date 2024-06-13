-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2024 lúc 05:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_muabannhatdat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_hoadon` char(10) NOT NULL,
  `id_nhadat` char(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaca` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_nhadat_thuemua`
--

CREATE TABLE `chitiet_nhadat_thuemua` (
  `id_hoadon` char(10) NOT NULL,
  `ngay_bd` date NOT NULL,
  `ngay_kt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` char(10) NOT NULL,
  `id_nhadat` char(10) NOT NULL,
  `id_khachhang` char(10) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datlich`
--

CREATE TABLE `datlich` (
  `id_datlich` char(10) NOT NULL,
  `Id_NhanVien` char(10) NOT NULL,
  `id_khachhang` char(10) NOT NULL,
  `id_nhadat` char(10) NOT NULL,
  `thoigian_datlich` datetime NOT NULL,
  `diachi_datlich` varchar(100) NOT NULL,
  `tinhtrang_datlich` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachinhadat`
--

CREATE TABLE `diachinhadat` (
  `id_diachi` char(10) NOT NULL,
  `xa_phuong` varchar(50) NOT NULL,
  `huyen_quan` varchar(50) NOT NULL,
  `tinhthanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diachinhadat`
--

INSERT INTO `diachinhadat` (`id_diachi`, `xa_phuong`, `huyen_quan`, `tinhthanh`) VALUES
('DC001', ' Xã Long Hưng', 'Văn Giang', 'Hưng Yên'),
('DC002', 'Đào Trí', ' Phú Thuận ,Quận 7', 'Hồ Chí Minh'),
('DC003', 'Nguyễn Duy Trinh', 'Bình Trưng Đông, Quận 2', 'Hồ Chí Minh'),
('DC004', 'Nguyễn Thái Bình', 'Quận 1', 'Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` char(10) NOT NULL,
  `id_khachhang` char(10) NOT NULL,
  `Id_NhanVien` char(10) NOT NULL,
  `ngaylap` datetime NOT NULL,
  `loaihoadon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` char(10) NOT NULL,
  `username` char(20) NOT NULL,
  `hoten_kh` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` bigint(20) NOT NULL,
  `sdt_kh` varchar(10) NOT NULL,
  `diachi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `username`, `hoten_kh`, `ngaysinh`, `gioitinh`, `sdt_kh`, `diachi`) VALUES
('KH001', 'dinhduong', 'Lê Đình Dương', '1993-02-10', 1, '0369417199', 'Tây Sơn Bình Định'),
('KH002', 'duykhuong', 'Lê Duy Khương', '1977-11-29', 1, '0372594337', 'Tây Sơn Bình Định');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hinh`
--

CREATE TABLE `loai_hinh` (
  `maloaihinh` varchar(10) NOT NULL,
  `tenloaihinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hinh`
--

INSERT INTO `loai_hinh` (`maloaihinh`, `tenloaihinh`) VALUES
('LH001', 'Phòng Trọ'),
('LH002', 'Chung Cư Mini'),
('LH003', 'Chung Cư/Căn Hộ'),
('LH004', 'Nhà Ở Nguyên Căn'),
('LH005', 'Văn Phòng'),
('LH006', 'Mặt Bằng Kinh Doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nhadat`
--

CREATE TABLE `loai_nhadat` (
  `id_loai` char(10) NOT NULL,
  `tenloai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_nhadat`
--

INSERT INTO `loai_nhadat` (`id_loai`, `tenloai`) VALUES
('L001', 'Mua'),
('L002', 'Thuê'),
('L003', 'Bán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhadat`
--

CREATE TABLE `nhadat` (
  `id_nhadat` char(10) NOT NULL,
  `ten_nhadat` varchar(50) NOT NULL,
  `mota` varchar(1000) NOT NULL,
  `id_loai` char(10) NOT NULL,
  `maloaihinh` varchar(10) NOT NULL,
  `id_diachi` char(10) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `dientich` float NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `anhphu1` varchar(20) NOT NULL,
  `anhphu2` varchar(20) NOT NULL,
  `anhphu3` varchar(20) NOT NULL,
  `anhphu4` varchar(20) NOT NULL,
  `ketcau` varchar(100) NOT NULL,
  `tinhtrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhadat`
--

INSERT INTO `nhadat` (`id_nhadat`, `ten_nhadat`, `mota`, `id_loai`, `maloaihinh`, `id_diachi`, `gia`, `dientich`, `hinhanh`, `anhphu1`, `anhphu2`, `anhphu3`, `anhphu4`, `ketcau`, `tinhtrang`) VALUES
('ID001', 'Nội thất cao cấp phường Tân Định, Quận 1', 'Cho thuê nhà số 45bis Nguyễn Phi Khanh, Tân Định, Quận 1. Nhà 1 trêt 1 lầu, nhà mới đẹp nội thất cao', 'L001', 'LH001', 'DC001', 300000000, 44, 'nha1.jfif', 'nha1.jfif', 'nha2.jfif', 'nha3.jfif', 'nha4.jfif', '1 phòng ngủ và 1 phòng tắm', 'Chờ Thanh Toán'),
('ID002', 'Nội thất cao cấp phường Tân Định, Quận 1', 'Cho thuê nhà số 45bis Nguyễn Phi Khanh, Tân Định, Quận 1. Nhà 1 trêt 1 lầu, nhà mới đẹp nội thất cao cấp. Tiện thuê làm vừa ở vừa làm vp hoặc buôn bán online. Giá thuê 16 triệu. Ưu tiên tiếp người thiện chí.', 'L002', 'LH002', 'DC001', 700000000, 44, 'nha2.jfif', 'nha2.jfif', 'nha11.jfif', 'nha7.jfif', 'nha5.jfif', '2 phòng ngủ ,1 phòng tắm,1 phòng khách,1 phòng bếp', 'Dang Cho Thue'),
('ID003', 'căn hộ chung cư Cầu Giấy 3PN', 'Ngay cần công viên CV1 Yên Hòa 32ha, công viên Cầu Giấy, công viên Nghĩa Đô.\r\nGần trường Đại học Quốc Gia, Học viện Báo chí và Tuyên truyền, Đại học Thương Mại, ĐH FPT,...\r\nNgay gần phố Duy Tân với khoảng 36 tòa văn phòng, hơn 400 doanh nghiệp, ước tính khoảng 20.000 nhân viên văn phòng làm việc tại đây nên nếu không ở có thể cho thuê cũng rất dễ và được giá cao.', 'L003', 'LH001', 'DC002', 800000000, 73, 'nha3.jfif', 'nha3.jfif', 'nha6.jfif', 'nha7.jfif', 'nha8.jfif', '1 phòng ngủ và 1 phòng tắm', 'Còn Trống'),
('ID004', 'Căn hộ tầng cao Vinhomes Grand Park 1 phòng ngủ, v', 'Thiết kế vô cùng hiện đại, sang trọng, bàn giao nội thất cơ bản. Đây là một sự lựa chọn vô cùng hoàn hảo dành cho các bạn trẻ độc thân, gia đình mới cưới có nhu cầu tìm nơi an cư tại khu vực quận 9 để thuận tiện học tập và làm việc. Gia chủ tương lai có thể tự mình bày trí và sắp xếp thêm nội thất và không gian sống tùy thuộc vào sở thích và nhu cầu của mình.', 'L001', 'LH001', 'DC003', 140000000, 4.7, 'nha4.jfif', 'nha4.jfif', 'nha5.jfif', 'nha6.jfif', 'nha7.jfif', '1 phòng ngủ và 1 phòng tắm', 'Còn Trống'),
('ID006', 'Biệt thự Sol Villas ', 'Sol Villas là khu compound ngay sông, sở hữu các tiện ích đẳng cấp: Hồ bơi, sauna, gym, siêu thị, nhà hàng cafe,... Ra vào bằng thẻ từ, bảo vệ 24/7 cực kỳ an ninh.', 'L002', 'LH005', 'DC003', 3000000000, 120, 'Mua_Thue5.jfif', 'Mua_Thue6.jfif', 'Mua_Thue01.jfif', 'Mua_Thue2.jfif', 'Mua_Thue05.jfif', '', 'Đang Cho Thuê'),
('ID007', 'Biệt thự - shophouse Vinhomes', 'Chuyên bán biệt thự, nhà phố và tất cả các sản phẩm trong dự án Vinhomes Grand Park - Quận 9 - Thành phố Thủ Đức.\r\n- Giá tốt nhất, phù hợp với nhu cầu.\r\n- Vị trí đẹp.\r\n- Tiềm năng tăng giá cao.\r\n- Thủ tục nhanh gọn, rõ ràng.', 'L001', 'LH003', 'DC002', 200000000, 43, 'Mua_Thue02.jfif', 'Mua_Thue02.jfif', 'Mua_Thue01.jfif', 'nha3.jfif', 'nha8.jfif', '', 'Còn Trống'),
('ID008', 'CĂN 2PN - 104M2, FULL NỘI THẤT', 'Chuyên bán căn hộ Estella 2PN - 3PN và duplex penhouse - Giá bán dao động tùy theo tầng, view, nội thất, khách hàng tham khảo ạ:\r\n- Căn hộ 2 phòng ngủ (DT 98m² - 104m²): Giá dao động từ 5.8 tỷ - 6 tỷ - 6.8 tỷ.\r\n- Căn hộ 2 phòng ngủ + 1 Studio (DT 124m): Giá dao động từ 7.5 tỷ - 8.8 tỷ.\r\n- Căn hộ 3 phòng ngủ độc quyền (157m - 171m): \r\n- Căn hộ sân vườn, căn hộ ban công sân vườn 3 phòng ngủ, 4 phòng ngủ', 'L001', 'LH004', 'DC002', 7300000000, 104, 'nha6.jfif', 'nha6.jfif', 'nha2.jfif', 'nha8.jfif', 'nha4.jfif', 'Căn hộ 2 phòng ngủ', 'Còn Trống'),
('ID009', 'Bán căn hộ TT Kim Ngưu, ô tô đỗ cầu thang, nhà đẹp', 'Song lập 2 mặt tiền nằm trong phân khu Đảo Dừa. Đây là phân khu đóng kín có bảo vệ riêng đảm bảo riêng tư yên tĩnh an toàn tuyệt đối.\r\n1 mặt với tầm view đẳng cấp: Nhìn ra công viên Đảo Dừa - và ngay trước mặt sông.\r\n1 mặt đường 13m đối diện biệt thự tứ lập.', 'L003', 'LH005', 'DC003', 56000000, 180, 'nha8.jfif', 'nha3.jfif', 'nha4.jfif', 'nha5.jfif', 'nha6.jfif', '', 'Còn Trống'),
('ID010', 'CĂN HỘ GẦN CHỢ TÂN MỸ Y HÌNH full nội thất rộng th', 'Full nội thất\r\nVị trí trung tâm dễ dàng qua Q1,4,5,8,10. Có nhiều cửa hàng, quán ăn, siêu thị Lotte Mart,…Cửa sổ thoáng mát\r\nCó hầm xe, thang máy, bảo vệ an ninh\r\nGần các trường ĐH: TDTU, UFM, NTTU, VLU.', 'L001', 'LH006', 'DC002', 4000000, 35, 'nha9.jfif', 'nha6.jfif', 'nha7.jfif', 'nha8.jfif', 'nha9.jfif', '', 'Còn Trống'),
('ID011', 'Căn hộ full nội thất, gần HimLam, Kdc Trung Sơn, L', 'Vị trí siêu đẹp: Khu dân cư Trung Sơn sát bên Lotte Mart Q7,cầu Nguyễn Văn Cừ Q1\r\nCách Lotte Mart 500m.Full nội thất,sạch sẽ thoáng mát.Qua SC Vivo, Phú Mỹ Hưng chưa dc 5p.Mất 6p để qua các quận trung tâm', 'L002', 'LH004', 'DC003', 450000000, 45, 'nha11.jfif', 'nha11.jfif', 'nha10.jfif', 'nha8.jfif', 'nha4.jfif', '', 'Còn Trống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id_NhanVien` char(10) NOT NULL,
  `UserName` char(20) NOT NULL,
  `Hoten_NhanVien` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `gioitinh` bigint(20) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phaply`
--

CREATE TABLE `phaply` (
  `id_ThongTinPhapLy` char(10) NOT NULL,
  `id_nhadat` char(10) NOT NULL,
  `SoDo` varchar(225) NOT NULL,
  `QuyenSuDungDat` varchar(225) NOT NULL,
  `ThongTinGiayToPhapLy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkedoanhthu`
--

CREATE TABLE `thongkedoanhthu` (
  `id_thongke` char(10) NOT NULL,
  `ngaythongke` datetime NOT NULL,
  `doanhthu` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` char(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES
('dinhduong', '$2y$10$cUx.hc0nWC.1kLr.ln3HH.H0rBCY7irPfbxXPqHIX.U6ppFiKxlAy', 'dinhduong123@gmail.com', 0),
('duykhuong', '$2y$10$6YB6MNBB8P9HF7aqUoZ0kuciplB5KKmR.Wv9XXCVFivHvE9F.Qn0C', 'duykhuong123@gmail.com', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_hoadon`,`id_nhadat`),
  ADD KEY `pk_chitiethd_nhadat` (`id_nhadat`);

--
-- Chỉ mục cho bảng `chitiet_nhadat_thuemua`
--
ALTER TABLE `chitiet_nhadat_thuemua`
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `pk_khachhang_danhgia` (`id_khachhang`),
  ADD KEY `pk_nhadat_danhgia` (`id_nhadat`);

--
-- Chỉ mục cho bảng `datlich`
--
ALTER TABLE `datlich`
  ADD PRIMARY KEY (`id_datlich`),
  ADD KEY `pk_diachi_khachhang` (`id_khachhang`),
  ADD KEY `pk_datlich_nhadat` (`id_nhadat`),
  ADD KEY `pk_datlich_nhanvien` (`Id_NhanVien`) USING BTREE;

--
-- Chỉ mục cho bảng `diachinhadat`
--
ALTER TABLE `diachinhadat`
  ADD PRIMARY KEY (`id_diachi`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `pk_hoadon_khachhang` (`id_khachhang`),
  ADD KEY `pk_hoadon_nhanvien` (`Id_NhanVien`) USING BTREE;

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD KEY `pk_user_khachhang` (`username`);

--
-- Chỉ mục cho bảng `loai_hinh`
--
ALTER TABLE `loai_hinh`
  ADD PRIMARY KEY (`maloaihinh`);

--
-- Chỉ mục cho bảng `loai_nhadat`
--
ALTER TABLE `loai_nhadat`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `nhadat`
--
ALTER TABLE `nhadat`
  ADD PRIMARY KEY (`id_nhadat`),
  ADD KEY `pk_loai_nhadat` (`id_loai`),
  ADD KEY `pk_diachi_nhadat` (`id_diachi`),
  ADD KEY `fk_nhadat_loaihinh` (`maloaihinh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id_NhanVien`),
  ADD KEY `pk_user_admin` (`UserName`);

--
-- Chỉ mục cho bảng `phaply`
--
ALTER TABLE `phaply`
  ADD PRIMARY KEY (`id_ThongTinPhapLy`),
  ADD KEY `pk_phaply_nhadat` (`id_nhadat`);

--
-- Chỉ mục cho bảng `thongkedoanhthu`
--
ALTER TABLE `thongkedoanhthu`
  ADD PRIMARY KEY (`id_thongke`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `pk_chitiet_hoadon` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id_hoadon`),
  ADD CONSTRAINT `pk_chitiethd_nhadat` FOREIGN KEY (`id_nhadat`) REFERENCES `nhadat` (`id_nhadat`);

--
-- Các ràng buộc cho bảng `chitiet_nhadat_thuemua`
--
ALTER TABLE `chitiet_nhadat_thuemua`
  ADD CONSTRAINT `pk_chitietnhadat_hd` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id_hoadon`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `pk_khachhang_danhgia` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `pk_nhadat_danhgia` FOREIGN KEY (`id_nhadat`) REFERENCES `nhadat` (`id_nhadat`);

--
-- Các ràng buộc cho bảng `datlich`
--
ALTER TABLE `datlich`
  ADD CONSTRAINT `pk_datlich_admin` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `pk_datlich_nhadat` FOREIGN KEY (`id_nhadat`) REFERENCES `nhadat` (`id_nhadat`),
  ADD CONSTRAINT `pk_diachi_khachhang` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `pk_hoadon_admin` FOREIGN KEY (`Id_NhanVien`) REFERENCES `nhanvien` (`Id_NhanVien`),
  ADD CONSTRAINT `pk_hoadon_khachhang` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `pk_user_khachhang` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `nhadat`
--
ALTER TABLE `nhadat`
  ADD CONSTRAINT `fk_nhadat_loaihinh` FOREIGN KEY (`maloaihinh`) REFERENCES `loai_hinh` (`maloaihinh`),
  ADD CONSTRAINT `pk_diachi_nhadat` FOREIGN KEY (`id_diachi`) REFERENCES `diachinhadat` (`id_diachi`),
  ADD CONSTRAINT `pk_loai_nhadat` FOREIGN KEY (`id_loai`) REFERENCES `loai_nhadat` (`id_loai`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `pk_user_admin` FOREIGN KEY (`UserName`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `phaply`
--
ALTER TABLE `phaply`
  ADD CONSTRAINT `pk_phaply_nhadat` FOREIGN KEY (`id_nhadat`) REFERENCES `nhadat` (`id_nhadat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
