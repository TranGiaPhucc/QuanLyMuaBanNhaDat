<?php
// Start session
session_start();

// Kiểm tra người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Kết nối CSDL
include("ketnoi.php");

// Kiểm tra xem id_ctkygiua đã được truyền vào chưa
if (isset($_GET['id_ctkygiua'])) {
    $id_ctkygiua = $_GET['id_ctkygiua'];

    // Xóa bản ghi từ bảng ct_kygiua
    $stmt = $conn->prepare("DELETE FROM ct_kygiua WHERE id_ctkygiua = :id_ctkygiua");
    $stmt->bindParam(':id_ctkygiua', $id_ctkygiua);

    if ($stmt->execute()) {
        // Chuyển hướng về trang hiển thị với thông báo thành công
        header("Location: kygiua.php?msg=success");
    } else {
        // Chuyển hướng về trang hiển thị với thông báo lỗi
        header("Location: kygiua.php?msg=error");
    }
} else {
    // Chuyển hướng về trang hiển thị với thông báo lỗi nếu ID không hợp lệ
    header("Location: kygiua.php?msg=invalid_id");
}

exit();
?>
