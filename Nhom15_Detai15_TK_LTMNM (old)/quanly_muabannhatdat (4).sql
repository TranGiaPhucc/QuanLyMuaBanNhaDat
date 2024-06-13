-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 06, 2024 lúc 05:20 PM
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
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hoten_kh` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt_kh` varchar(10) NOT NULL,
  `diachi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `username`, `password`, `hoten_kh`, `ngaysinh`, `sdt_kh`, `diachi`) VALUES
('KH002', 'uyenn', 'uyenNhi#123', 'Trần Lê Uyên', '2003-01-18', '0364598400', 'Dĩ An ,Bình Dương'),
('KH003', 'duyquoc', 'Tuongoanh!123', 'Lê Duy Quốc', '2003-04-30', '0369417199', 'Tây Sơn Bình Định'),
('KH005', 'tuongoanh', 'Tuongoanh!123', 'Lê Thị Tường Oanh', '2003-06-02', '0369417199', 'Bến Tre'),
('KH006', 'ngocquynh', 'NgocQuynh@124', 'Nguyễn Ánh Quỳnh', '2003-07-07', '0369417199', 'Bình Thuận'),
('KH007', 'DoThSuong', 'Suonh%123', 'Đỗ Thị Sương', '2003-06-05', '0369417199', 'Bình Định'),
('KH008', 'bichtram', 'Bichtram&0811', 'Lê Bich Trâm', '2000-08-11', '0369417199', 'Bình Định'),
('KH009', 'nhatquyen', 'Aa!123', 'Lê Nhật Quyên', '2003-11-08', '0369417199', 'Tây Sơn Bình Định'),
('KH010', 'leduykhuong', 'Khuong!123', 'Lê Duy Khương', '2001-01-31', '0369417199', 'Tây Sơn Bình Định'),
('KH011', 'bichtram', 'Bichtram&0811', 'Lê Ánh Nguyệt', '2003-02-06', '0369417199', 'Tây Sơn Bình Định'),
('KH012', 'dinhduong', 'NgocQuynh@124', 'Lê Đình Dương', '2003-10-06', '0369417199', 'An Nhơn Bình Định');

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
  `id_diachi` char(10) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `dientich` float NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tinhtrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhadat`
--

INSERT INTO `nhadat` (`id_nhadat`, `ten_nhadat`, `mota`, `id_loai`, `id_diachi`, `gia`, `dientich`, `hinhanh`, `tinhtrang`) VALUES
('', '', '', 'L001', 'DC001', 0, 0, '', ''),
('ID001', 'Nội thất cao cấp phường Tân Định, Quận 1', 'Cho thuê nhà số 45bis Nguyễn Phi Khanh, Tân Định, Quận 1. Nhà 1 trêt 1 lầu, nhà mới đẹp nội thất cao', 'L001', 'DC001', 16, 44, 'Mua_Thue1.jfif', 'Chờ Thanh Toán'),
('ID002', 'Nội thất cao cấp phường Tân Định, Quận 1', 'Cho thuê nhà số 45bis Nguyễn Phi Khanh, Tân Định, Quận 1. Nhà 1 trêt 1 lầu, nhà mới đẹp nội thất cao cấp. Tiện thuê làm vừa ở vừa làm vp hoặc buôn bán online. Giá thuê 16 triệu. Ưu tiên tiếp người thiện chí.', 'L001', 'DC001', 16000000, 44, 'Mua_Thue04.jfif', 'Dang Cho Thue'),
('ID003', 'căn hộ chung cư Cầu Giấy 3PN', 'Ngay cần công viên CV1 Yên Hòa 32ha, công viên Cầu Giấy, công viên Nghĩa Đô.\r\nGần trường Đại học Quốc Gia, Học viện Báo chí và Tuyên truyền, Đại học Thương Mại, ĐH FPT,...\r\nNgay gần phố Duy Tân với khoảng 36 tòa văn phòng, hơn 400 doanh nghiệp, ước tính khoảng 20.000 nhân viên văn phòng làm việc tại đây nên nếu không ở có thể cho thuê cũng rất dễ và được giá cao.', 'L003', 'DC002', 16000000, 73, 'Mua_Thue03.jfif', 'Còn Trống'),
('ID004', 'Căn hộ tầng cao Vinhomes Grand Park 1 phòng ngủ, v', 'Thiết kế vô cùng hiện đại, sang trọng, bàn giao nội thất cơ bản. Đây là một sự lựa chọn vô cùng hoàn hảo dành cho các bạn trẻ độc thân, gia đình mới cưới có nhu cầu tìm nơi an cư tại khu vực quận 9 để thuận tiện học tập và làm việc. Gia chủ tương lai có thể tự mình bày trí và sắp xếp thêm nội thất và không gian sống tùy thuộc vào sở thích và nhu cầu của mình.', 'L001', 'DC003', 140000000, 4.7, 'Mua_Thue02.jfif', 'Còn Trống'),
('ID005', 'aaa', 'kkkk', 'L002', 'DC003', 78, 87, 'Mua_Thue6.jfif', 'hh'),
('ID006', 'ttt', 'mmm', 'L001', 'DC004', 78, 87, 'Mua_Thue4.jfif', 'hh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id_NhanVien` char(10) NOT NULL,
  `UserName` char(20) NOT NULL,
  `Hoten_NhanVien` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
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
  ADD PRIMARY KEY (`id_khachhang`);

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
  ADD KEY `pk_diachi_nhadat` (`id_diachi`);

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
-- Các ràng buộc cho bảng `nhadat`
--
ALTER TABLE `nhadat`
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
