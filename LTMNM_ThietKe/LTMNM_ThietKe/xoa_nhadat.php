<?php
include("ketnoi.php");

// Lấy dữ liệu id cần xóa
$id_nhadat = $_GET['sid'];
try {
    // Cập nhật cột tinhtrang thành 'Khong Ton Tai' thay vì xóa bản ghi
    $sql_update = "UPDATE nhadat SET tinhtrang = 'Khong Ton Tai' WHERE id_nhadat = :id_nhadat";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':id_nhadat', $id_nhadat);
    $stmt_update->execute();
    
    echo "Cập nhật trạng thái thành công";
    header("Location: ql_nhadat.php");
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
