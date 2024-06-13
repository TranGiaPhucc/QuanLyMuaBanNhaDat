<?php
include 'ketnoi.php'; 

$username = $_GET['username'];
$ten_nhadat = urldecode($_GET['ten_nhadat']);
$gia = $_GET['gia'];
$dientich = $_GET['dientich'];
$id_nhadat = $_GET['sid'];
$id_datlich = $_GET['id_datlich'];

// Lấy thông tin chi tiết của nhà đất
$sql_nhadat = "SELECT * FROM nhadat WHERE id_nhadat = :id_nhadat";
$stmt_nhadat = $conn->prepare($sql_nhadat);
$stmt_nhadat->bindParam(':id_nhadat', $id_nhadat, PDO::PARAM_STR);
$stmt_nhadat->execute();
$nhadat = $stmt_nhadat->fetch(PDO::FETCH_ASSOC);

if (!$nhadat) {
    echo "Không tìm thấy thông tin nhà đất.";
    exit;
}

// Lấy thông tin loại nhà đất
$id_loai = $nhadat['id_loai'];
$sql_loai = "SELECT id_loai FROM loai_nhadat WHERE id_loai = :id_loai";
$stmt_loai = $conn->prepare($sql_loai);
$stmt_loai->bindParam(':id_loai', $id_loai, PDO::PARAM_STR);
$stmt_loai->execute();
$loai_nhadat = $stmt_loai->fetch(PDO::FETCH_ASSOC);

if (!$loai_nhadat) {
    echo "Không tìm thấy thông tin loại nhà đất.";
    exit;
}
$loaihoadon = $loai_nhadat['id_loai'];
$ngaylap = date('Y-m-d H:i:s');


if (isset($_POST["submit"])) {
    try {
       

        // Lấy thông tin từ bảng datlich
        $sql_datlich = "SELECT Id_NhanVien, id_khachhang FROM datlich WHERE id_datlich = :id_datlich";
        $stmt_datlich = $conn->prepare($sql_datlich);
        $stmt_datlich->bindParam(':id_datlich', $id_datlich, PDO::PARAM_STR);
        $stmt_datlich->execute();
        $datlich_info = $stmt_datlich->fetch(PDO::FETCH_ASSOC);

        if (!$datlich_info) {
            echo "Không tìm thấy thông tin đặt lịch.";
            exit;
        }

        $id_nhanvien = $datlich_info['Id_NhanVien'];
        $id_khachhang = $datlich_info['id_khachhang'];

        // Thêm thông tin vào bảng hoadon
        $id_hoadon = uniqid(); // Tạo mã hóa đơn ngẫu nhiên

        $sql_hoadon = "
        INSERT INTO hoadon (id_hoadon, id_khachhang, id_nhanvien, ngaylap, loaihoadon) 
        VALUES (:id_hoadon, :id_khachhang, :id_nhanvien, :ngaylap, :loaihoadon)";
        $stmt_hoadon = $conn->prepare($sql_hoadon);
        $stmt_hoadon->bindParam(':id_hoadon', $id_hoadon);
        $stmt_hoadon->bindParam(':id_khachhang', $id_khachhang);
        $stmt_hoadon->bindParam(':id_nhanvien', $id_nhanvien);
        $stmt_hoadon->bindParam(':ngaylap', $ngaylap);
        $stmt_hoadon->bindParam(':loaihoadon', $loaihoadon);
        $stmt_hoadon->execute();

        // Thêm thông tin vào bảng chitiethoadon
        $soluong = 1; // Ví dụ, số lượng luôn là 1
        $giaca = $nhadat['gia'];

        $sql_chitiethoadon = "
        INSERT INTO chitiethoadon (id_hoadon, id_nhadat, soluong, giaca) 
        VALUES (:id_hoadon, :id_nhadat, :soluong, :giaca)";
        $stmt_chitiethoadon = $conn->prepare($sql_chitiethoadon);
        $stmt_chitiethoadon->bindParam(':id_hoadon', $id_hoadon);
        $stmt_chitiethoadon->bindParam(':id_nhadat', $id_nhadat);
        $stmt_chitiethoadon->bindParam(':soluong', $soluong);
        $stmt_chitiethoadon->bindParam(':giaca', $giaca);
        $stmt_chitiethoadon->execute();
        // Cập nhật tình trạng đặt lịch thành "Đã Thanh Toán"
        $sql_update_tinhtrang = "UPDATE datlich SET tinhtrang_datlich = 'Đã Thanh Toán' WHERE id_datlich = :id_datlich";
        $stmt_update_tinhtrang = $conn->prepare($sql_update_tinhtrang);
        $stmt_update_tinhtrang->bindParam(':id_datlich', $id_datlich, PDO::PARAM_STR);
        $stmt_update_tinhtrang->execute();

        echo "Thêm Thành Công";
        
    } catch (Exception $e) {
        
        echo "Lỗi khi xử lý thanh toán: " . $e->getMessage();
    }
}
?>
<!DOCTYPE HTML

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- jQuery -->
<script src="../LTMNM_ThietKe/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<!-- Bootstrap4 files-->
<script src="../LTMNM_ThietKe/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="../LTMNM_ThietKe/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<!-- Font awesome 5 -->
<link href="../LTMNM_ThietKe/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<!-- custom style -->
<link href="../LTMNM_ThietKe/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="../LTMNM_ThietKe/css/responsive.css" rel="stylesheet" type="text/css" />
<!-- custom javascript -->
<script src="../LTMNM_ThietKe/js/script.js" type="text/javascript"></script>
</head>
<style>
.form-select {
  margin-bottom: 10px;
  margin-right: 50px; 
  border-radius: 5px;
  width: 120px; 
  height: 30px; 
}
.search-btn {
  margin-bottom: 10px;
}
.logo {
  width: 200px; 
  height: 400px; 
}
.input-group-append {
  color: dodgerblue;
}
</style>
<body>
<div class="card mb-4">
    <div class="card-body">
        <h4 class="card-title mb-4">Thông Tin Thanh Toán</h4>
        <form role="form" action="" method="POST">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" readonly>
            </div> <!-- form-group.// -->
            
            <div class="form-group">
                <label for="ten_nhadat">Tên Nhà Đất</label>
                <input type="text" class="form-control" name="ten_nhadat" value="<?php echo $ten_nhadat; ?>" readonly>
            </div> <!-- form-group.// -->
            
            <div class="form-group">
                <label for="gia">Giá</label>
                <input type="text" class="form-control" name="gia" value="<?php echo $gia; ?>" readonly>
            </div> <!-- form-group.// -->

            <div class="form-group">
                <label for="dientich">Diện Tích</label>
                <input type="text" class="form-control" name="dientich" value="<?php echo $dientich; ?>" readonly>
            </div> <!-- form-group.// -->
            
          

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group.// -->
            
            <p class="alert alert-success"> <i class="fa fa-lock"></i> Một số thông tin bảo mật...</p>
            <button class="subscribe btn btn-primary btn-block" type="submit" name="submit"> Xác Nhận Thanh Toán </button>
            <br>
            <a href="TrangTTCN_KH.php" class="btn btn-success">Quay Về</a>

        </form>
    </div> <!-- card-body.// -->
    
</div> <!-- card .// -->
</body>
</html>

<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["submit"])) {
    // Lấy thông tin từ form
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Tạo đối tượng PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'websitemuabannhadat@gmail.com'; // Thay thế bằng địa chỉ email của bạn
        $mail->Password = 'apxitumsvjsmkxyl'; // Thay thế bằng mật khẩu email của bạn
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = "UTF-8"; // Thiết lập bộ mã cho email

        // Cấu hình nội dung email
        $mail->setFrom($email, "ByeHouse");
        $mail->addAddress("$email", "$username");
        $mail->isHTML(true);
        $mail->Subject = "Bạn đã thanh toán giao dịch này";
        $mail->Body = "Xin chào, $username!<br>Bạn đã thanh toán thành công cho giao dịch này.";

        // Gửi email
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
