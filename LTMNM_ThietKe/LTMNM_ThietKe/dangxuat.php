<?php
// Bắt đầu session nếu chưa có
session_start();

// Kiểm tra xem người dùng đã nhấp vào liên kết Đăng Xuất chưa
if(isset($_GET['logout'])) {
    // Hủy bỏ tất cả các biến session
    $_SESSION = array();
    
    // Hủy bỏ session cookie nếu có
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Hủy bỏ session
    session_destroy();
    
    // Chuyển hướng đến trang đăng nhập hoặc trang khác
    header("Location: Trang_DangNhap.php");
    exit;
}
?>
