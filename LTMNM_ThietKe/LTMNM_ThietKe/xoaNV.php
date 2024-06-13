<?php
// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Kiểm tra xem có ID nhân viên được truyền qua URL không
if (isset($_GET['sid'])) {
    $id_nhanvien = $_GET['sid'];

    try {
        // Thực hiện truy vấn để cập nhật trạng thái của nhân viên thành 'Khong Ton Tai'
        $sql = "UPDATE nhanvien SET TinhTrang = 'Khong Ton Tai' WHERE Id_NhanVien = :id_nhanvien";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_nhanvien', $id_nhanvien);
        $stmt->execute();

        // Chuyển hướng về trang danh sách nhân viên sau khi cập nhật
        header("Location: trang_ql_nhanvien.php");
        exit();
    } catch (PDOException $e) {
        // Hiển thị thông báo lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    // Hiển thị thông báo lỗi nếu không có ID nhân viên được truyền
    echo "ID nhân viên không hợp lệ.";
}
?>
