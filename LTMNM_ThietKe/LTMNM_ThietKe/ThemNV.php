<?php
require_once 'ketnoi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thu thập dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    $hoten_nv = $_POST['hoten_kh'];
    $ngaysinh = $_POST['ngaysinh'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $province = $_POST['province'];
    $district = $_POST['district'];
    $wards = $_POST['wards'];
    $thon_sonha = $_POST['thon_sonha'];
    $email = $_POST['email'];
    $tinhtrang = 'Ton Tai'; // Giá trị mặc định cho Tình Trạng

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
            $hashed_password = md5($password);
            // Tạo một ID khách hàng mới
            $stmt_max_id = $conn->query("SELECT MAX(SUBSTRING(Id_NhanVien, 3, 3)) AS max_id FROM nhanvien");
            $row = $stmt_max_id->fetch(PDO::FETCH_ASSOC);
            $max_id = $row['max_id'];
            $next_id = $max_id + 1;
            $new_id = "NV" . sprintf("%03d", $next_id);

            try {
                // Thêm dữ liệu vào bảng user
                $sql_user = "INSERT INTO user (username, password, email, role) VALUES (:username, :hashed_password, :email, 2)";
                $stmt_user = $conn->prepare($sql_user);
                $stmt_user->bindParam(':username', $username);
                $stmt_user->bindParam(':hashed_password', $hashed_password);
                $stmt_user->bindParam(':email', $email);
                $stmt_user->execute();

                // Thêm dữ liệu vào bảng khachhang
                $sql = "INSERT INTO nhanvien (Id_NhanVien, username, Hoten_NhanVien,NgaySinh, gioitinh, district_id, province_id, wards_id, Thon_SoNha, TinhTrang) 
                        VALUES (:Id_NhanVien, :username, :Hoten_NhanVien, :NgaySinh, :gioitinh, :district_id, :province_id, :wards_id, :Thon_SoNha, :TinhTrang)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':Id_NhanVien', $new_id);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':Hoten_NhanVien', $hoten_nv);
                $stmt->bindParam(':NgaySinh', $ngaysinh);
                $stmt->bindParam(':gioitinh', $gender);
                $stmt->bindParam(':district_id', $district);
                $stmt->bindParam(':province_id', $province);
                $stmt->bindParam(':wards_id', $wards);
                $stmt->bindParam(':Thon_SoNha', $thon_sonha);
                $stmt->bindParam(':TinhTrang', $tinhtrang);
                $stmt->execute();

                // Kiểm tra nếu insert user thành công
                if ($stmt_user->rowCount() > 0) {
                    // Gán thông báo thành công
                    $success_message = "Đăng ký thành công!";
                    header("Location: trang_ql_nhanvien.php");
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
