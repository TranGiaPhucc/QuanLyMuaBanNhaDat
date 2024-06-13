<?php 
  include("ketnoi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các biến $_POST đã được gửi hay chưa
    if (isset($_POST['idkhachhang']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['hoten']) && isset($_POST['ngaysinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])) {

        $idkhachhang = $_POST['idkhachhang'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

       
        try {
            $themsql = "INSERT INTO `khachhang` (`id_khachhang`, `username`, `password`, `hoten_kh`, `ngaysinh`, `sdt_kh`, `diachi`) 
                        VALUES ('$idkhachhang', '$username', '$password', '$hoten', '$ngaysinh', '$sdt', '$diachi')";
            $stmt = $conn->query($themsql);
            echo "Thêm dữ liệu thành công";
            header("Location:trang_ql_kh.php");
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}


?>
