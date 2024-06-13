<?php
session_start();
include 'ketnoi.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra người dùng đã đăng nhập hay chưa
    if (!isset($_SESSION['username'])) {
        die("Bạn cần phải đăng nhập để đánh giá.");
    }

    // Lấy dữ liệu từ form
    $username = $_SESSION['username'];
    $sosao = $_POST['sosao'];
    $content = $_POST['content'];
    $id_nhadat = $_GET['sid']; // Lấy id_nhadat từ URL

    // Lấy id_khachhang từ username
    $sql = "SELECT id_khachhang FROM khachhang WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id_khachhang = $result['id_khachhang'];

        // Tạo id_danhgia ngẫu nhiên
        $id_danhgia = uniqid('DG');

        // Chèn đánh giá vào cơ sở dữ liệu
        $sql = "INSERT INTO danhgia (id_danhgia, id_nhadat, id_khachhang, rating, content) 
                VALUES (:id_danhgia, :id_nhadat, :id_khachhang, :rating, :content)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_danhgia', $id_danhgia);
        $stmt->bindParam(':id_nhadat', $id_nhadat);
        $stmt->bindParam(':id_khachhang', $id_khachhang);
        $stmt->bindParam(':rating', $sosao);
        $stmt->bindParam(':content', $content);

        if ($stmt->execute()) {
            echo "Đánh giá của bạn đã được ghi nhận.";
        } else {
            echo "Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại.";
        }
    } else {
        echo "Không tìm thấy thông tin khách hàng.";
    }
} else {
    echo "Phương thức không hợp lệ.";
}
?>
