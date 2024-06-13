<?php
require_once 'ketnoi.php';

// Kiểm tra nếu form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thu thập dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $hoten_kh = $_POST['hoten_kh'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = isset($_POST['gender']) ? $_POST['gender'] : '';
    $sdt_kh = $_POST['sdt_kh'];
    $province_id = $_POST['province'];
    $district_id = $_POST['district'];
    $wards_id = $_POST['wards'];
    $thon_sonha = $_POST['thon_sonha'];
    $email = $_POST['email'];

    // Kiểm tra mật khẩu và mật khẩu lặp lại
    if ($password !== $repeatPassword) {
        $error_message = "Mật khẩu và Mật khẩu lặp lại không khớp!";
    } else {
        // Kiểm tra xem username đã tồn tại trong cơ sở dữ liệu hay chưa
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count > 0) {
            // Nếu username đã tồn tại, gán thông báo lỗi
            $error_message = "Username đã tồn tại trong cơ sở dữ liệu!";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Tạo một ID khách hàng mới
            $stmt_max_id = $conn->query("SELECT MAX(SUBSTRING(id_khachhang, 3, 3)) AS max_id FROM khachhang");
            $row = $stmt_max_id->fetch(PDO::FETCH_ASSOC);
            $max_id = $row['max_id'];
            $next_id = $max_id + 1;
            $new_id = "KH" . sprintf("%03d", $next_id);

            try {
                // Thêm dữ liệu vào bảng user
                $sql_user = "INSERT INTO user (username, password, email, role) VALUES (:username, :hashed_password, :email, 0)";
                $stmt_user = $conn->prepare($sql_user);
                $stmt_user->bindParam(':username', $username);
                $stmt_user->bindParam(':hashed_password', $hashed_password);
                $stmt_user->bindParam(':email', $email);
                $stmt_user->execute();

                // Thêm dữ liệu vào bảng khachhang
                $sql = "INSERT INTO khachhang (id_khachhang, username, hoten_kh, ngaysinh, gioitinh, sdt_kh, district_id, province_id, wards_id, Thon_SoNha) 
                        VALUES (:id_khachhang, :username, :hoten_kh, :ngaysinh, :gioitinh, :sdt_kh, :district_id, :province_id, :wards_id, :thon_sonha)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id_khachhang', $new_id);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':hoten_kh', $hoten_kh);
                $stmt->bindParam(':ngaysinh', $ngaysinh);
                $stmt->bindParam(':gioitinh', $gioitinh);
                $stmt->bindParam(':sdt_kh', $sdt_kh);
                $stmt->bindParam(':district_id', $district_id);
                $stmt->bindParam(':province_id', $province_id);
                $stmt->bindParam(':wards_id', $wards_id);
                $stmt->bindParam(':thon_sonha', $thon_sonha);
                $stmt->execute();

                // Kiểm tra nếu insert user thành công
                if ($stmt_user->rowCount() > 0) {
                    // Gán thông báo thành công
                    $success_message = "Đăng ký thành công!";
                    header("Location: trang_ql_kh.php");
                } else {
                    // Nếu insert user thất bại, gán thông báo lỗi
                    $error_message = "Lỗi: Không thể tạo tài khoản người dùng!";
                }
            } catch(PDOException $e) {
                // Gán thông báo lỗi nếu có
                $error_message = "Lỗi: " . $e->getMessage();
            }
        }
    }
}
?>
