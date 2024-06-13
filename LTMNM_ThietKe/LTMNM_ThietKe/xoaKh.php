<?php
include("ketnoi.php");

// Lấy dữ liệu id khách hàng cần cập nhật
$id_khachhang = $_GET['sid'];
try {
    // Cập nhật trạng thái khách hàng
    $sql = "UPDATE khachhang SET TinhTrang = 'Khong Ton Tai' WHERE id_khachhang = :id_khachhang";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_khachhang', $id_khachhang, PDO::PARAM_STR);
    $stmt->execute();

    echo "Cập nhật trạng thái thành công";
    header("Location: trang_ql_kh.php");
    exit();
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
