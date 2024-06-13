<?php
include 'ketnoi.php'; 
// Lấy ID lịch hẹn từ URL
$id_datlich = $_GET['id'];

// Chuẩn bị câu truy vấn
$sql = "SELECT 
            datlich.id_datlich,
            nhanvien.Hoten_NhanVien AS ten_nhanvien,
            khachhang.id_khachhang,
            khachhang.username,
            khachhang.hoten_kh,
            khachhang.ngaysinh,
            khachhang.gioitinh,
            khachhang.sdt_kh,
            nhadat.id_nhadat,
            nhadat.ten_nhadat,
            nhadat.mota,
            nhadat.id_loai,
            province.name AS ten_tinh,
            district.name AS ten_huyen_quan,
            wards.name AS ten_xa_duong,
            nhadat.Thon_SoNha AS nhadatthon_sonha,
            nhadat.maloaihinh,
            nhadat.gia,
            nhadat.dientich,
            nhadat.hinhanh,
            datlich.thoigian_datlich,
            concat(wards.name, ', ', district.name, ', ', province.name) AS dia_diem,
            datlich.Thon_SoNha,
            datlich.LoiNhan,
            datlich.tinhtrang_datlich,
            datlich.id_datlich 
        FROM datlich
        JOIN nhanvien ON datlich.Id_NhanVien = nhanvien.Id_NhanVien
        JOIN khachhang ON datlich.id_khachhang = khachhang.id_khachhang
        JOIN nhadat ON datlich.id_nhadat = nhadat.id_nhadat
        JOIN province ON nhadat.ID_Tinh = province.province_id
        JOIN district ON nhadat.ID_Huyen_Quan = district.district_id
        JOIN wards ON nhadat.ID_Xa_Duong = wards.wards_id
        WHERE datlich.id_datlich = '$id_datlich '";

// Chuẩn bị câu truy vấn sử dụng Prepared Statement
$stmt = $conn->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng fetchAll() để lấy kết quả

// Kiểm tra xem có dòng dữ liệu nào không
if ($result) {
    // Xuất dữ liệu từ mỗi hàng
    echo "<table class='table'>";
    echo "<tr><th>ID Đặt Lịch</th><td>" . $result["id_datlich"] . "</td></tr>";
    echo "<tr><th>Tên Nhân Viên</th><td>" . $result["ten_nhanvien"] . "</td></tr>";
    echo "<tr><th>Username Khách Hàng</th><td>" . $result["username"] . "</td></tr>";
    echo "<tr><th>Họ Tên Khách Hàng</th><td>" . $result["hoten_kh"] . "</td></tr>";
    echo "<tr><th>Ngày Sinh</th><td>" . $result["ngaysinh"] . "</td></tr>";
    echo "<tr><th>Giới Tính</th><td>" . $result["gioitinh"] . "</td></tr>";
    echo "<tr><th>Số Điện Thoại</th><td>" . $result["sdt_kh"] . "</td></tr>";
    echo"<tr><th>Thông Tin Nhà Đất</th></tr>";
    echo "<tr><th>ID Loại</th><td>" . $result["id_loai"] . "</td></tr>";
    echo "<tr><th>Địa Chỉ</th><td>" .  $result["nhadatthon_sonha"] . " " .  $result["ten_xa_duong"] . " " .  $result["ten_huyen_quan"] . " " .  $result["ten_tinh"] .  "</td></tr>";
    echo "<tr><th>Mã Loại Hình</th><td>" . $result["maloaihinh"] . "</td></tr>";
    echo "<tr><th>Giá</th><td>" . $result["gia"] . "</td></tr>";
    echo "<tr><th>Diện Tích</th><td>" . $result["dientich"] . "</td></tr>";
    echo "<tr><th>Hình Ảnh</th><td><img src='images/items/" . $result["hinhanh"] . "'></td></tr>";
    echo "</table>";
} else {
    echo "Không tìm thấy thông tin lịch hẹn.";
}
$sql1 = "SELECT 
            datlich.thoigian_datlich AS thoi_gian,
            CONCAT(wards.name, ', ', district.name, ', ', province.name) AS dia_diem,
            datlich.LoiNhan AS loi_nhan,
            datlich.tinhtrang_datlich AS tinh_trang,
            datlich.id_datlich 
        FROM datlich
        JOIN wards ON datlich.wards_id = wards.wards_id
        JOIN district ON datlich.district_id = district.district_id
        JOIN province ON datlich.province_id = province.province_id
        WHERE datlich.id_datlich = '$id_datlich'";
$stmt1 = $conn->query($sql1);
$result1 = $stmt1->fetch(PDO::FETCH_ASSOC); 
if ($result1) {
    echo "<table class='table'>";
    echo"<tr><th>Thông Tin Lịch Hẹn</th></tr>";
    echo "<tr><th>Thời Gian</th><td>" . $result1["id_datlich"] . "</td></tr>";
    echo "<tr><th>Thời Gian</th><td>" . $result1["thoi_gian"] . "</td></tr>";
    echo "<tr><th>Địa Điểm</th><td>" . $result1["dia_diem"] . "</td></tr>";
    echo "<tr><th>Lời Nhắn</th><td>" . $result1["loi_nhan"] . "</td></tr>";
    echo "<tr><th>Tình Trạng</th><td>" . $result1["tinh_trang"] . "</td></tr>";
    echo "</table>";
} else {
    echo "Không tìm thấy thông tin lịch hẹn.";
}


// Đóng kết nối CSDL

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-- jQuery -->
<script src="../LTMNM_ThietKe/js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="../LTMNM_ThietKe/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="../LTMNM_ThietKe/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="../LTMNM_ThietKe/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="../LTMNM_ThietKe/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="../LTMNM_ThietKe/css/responsive.css" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="../LTMNM_ThietKe/js/script.js" type="text/javascript"></script>


</head>



	
<body>
<div class="form-group col-md">
<a href="thanhtoan.php?sid=<?php echo $result["id_nhadat"]; ?>&username=<?php echo $result["username"]; ?>&ten_nhadat=<?php echo urlencode($result["ten_nhadat"]); ?>&gia=<?php echo $result["gia"]; ?>&dientich=<?php echo $result["dientich"]; ?>&id_datlich=<?php echo $result["id_datlich"]; ?>" class="btn btn-danger">Thanh Toán</a>

           
        </div>
 </body>

