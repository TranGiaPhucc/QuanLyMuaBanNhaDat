
<?php
// Kết nối CSDL
include("ketnoi.php");

// Kiểm tra người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Lấy id_khachhang của người dùng từ bảng khachhang dựa trên username đã đăng nhập
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT id_khachhang FROM khachhang WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$id_khachhang = $result['id_khachhang'];

try {
    // Bắt đầu transaction
    $conn->beginTransaction();

    // Xóa tất cả các bản ghi trong bảng ct_kygiua liên quan đến id_khachhang
    $stmt = $conn->prepare("DELETE FROM ct_kygiua WHERE id_kygiua IN (SELECT id_kygiua FROM kygiua WHERE id_khachhang = :id_khachhang)");
    $stmt->bindParam(':id_khachhang', $id_khachhang);
    $stmt->execute();

    // Commit transaction
    $conn->commit();
    echo "Xóa tất cả các bản ghi thành công.";

    // Chuyển hướng lại trang trước đó hoặc trang khác sau khi xóa thành công
    header("Location: kygiua.php"); // Thay thế bằng trang bạn muốn chuyển hướng đến
    exit();
} catch (Exception $e) {
    // Rollback transaction nếu có lỗi
    $conn->rollBack();
    echo "Xảy ra lỗi khi xóa các bản ghi: " . $e->getMessage();
}
?>