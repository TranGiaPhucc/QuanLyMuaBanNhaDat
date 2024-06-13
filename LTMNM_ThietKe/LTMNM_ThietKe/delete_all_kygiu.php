<?php
// Kết nối CSDL
include("ketnoi.php");

// Truy vấn SQL để xoá tất cả bản ghi từ bảng kygiua
$sql = "DELETE FROM kygiua";

try {
    // Thực thi truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Trả về thông báo thành công cho phía client
    echo "success";
} catch(PDOException $e) {
    // Trả về thông báo lỗi cho phía client
    echo "error: " . $e->getMessage();
}
?>
