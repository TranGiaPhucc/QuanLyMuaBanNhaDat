<?php
include("ketnoi.php");

$id_kygiua = $_GET['id']; // Lấy ID ký gửi từ URL

$stmt = $conn->prepare("SELECT 
                            khachhang.hoten_kh AS ten_khach_hang,
                            kygiua.id_kygiua,
                            COUNT(CT_kygiua.id_ctkygiua) AS so_luong_ky_gui,
                            SUM(CT_kygiua.gia) AS tong_tien_ky_gui,
                            GROUP_CONCAT(
                                CONCAT(
                                    CT_kygiua.ten_nhadat, ' - ', 
                                    CT_kygiua.dientich, 'm2 - ', 
                                    loai_hinh.tenloaihinh, ' - ', 
                                    CT_kygiua.gia, 'đ'
                                ) SEPARATOR '<br>'
                            ) AS danh_sach_ky_gui
                        FROM 
                            kygiua
                        JOIN 
                            CT_kygiua ON kygiua.id_kygiua = CT_kygiua.id_kygiua
                        JOIN 
                            loai_hinh ON CT_kygiua.maloaihinh = loai_hinh.maloaihinh
                        JOIN 
                            khachhang ON kygiua.id_khachhang = khachhang.id_khachhang
                        WHERE 
                            kygiua.id_kygiua = :id_kygiua
                        GROUP BY 
                            kygiua.id_kygiua");
$stmt->bindParam(':id_kygiua', $id_kygiua);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// In ra thông tin
?>

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
 <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
 <!--   <script src="../LTMNM_ThietKe/js/app.js"></script> -->

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
		.input-group-append
		{
			color: dodgerblue;
		}

	</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Danh sách ký gửi</h3>
            <table class="table table-bordered">
                <thead>
            <th>Tên nhà đất</th>
            <th>Diện tích</th>
            <th>Mô hình</th>
            <th>Đơn giá</th>
        </tr>
        <?php
        // Tách danh sách ký gửi thành các mục riêng
        $danh_sach_ky_gui = explode("<br>", $result['danh_sach_ky_gui']);
        
        // Duyệt qua từng mục trong danh sách
        foreach ($danh_sach_ky_gui as $item) {
            // Tách thông tin của mỗi ký gửi
            $ky_gui_info = explode(" - ", $item);
            ?>
            <tr>
                <td><?php echo $ky_gui_info[0]; ?></td>
                <td><?php echo $ky_gui_info[1]; ?>m2</td>
                <td><?php echo $ky_gui_info[2]; ?></td>
                <td><?php echo $ky_gui_info[3]; ?>đ</td>
            </tr>
            <?php
        }
        
        ?>
    </table>
    <a href="ql_nhadat.php" class="btn btn-primary">Quay Về</a>
    </div>
        <div class="col-md-6">
            <h3>Thông tin ký gửi</h3>
            <table class="table table-bordered">
            <thead>
                    <tr>
        <th>Tên khách hàng</th>
        <th>ID ký gửi</th>
        <th>Số lượng ký gửi</th>
        <th>Tổng tiền ký gửi</th>
        </tr>
                </thead>
                <tbody>
                    <tr>
        <td><?php echo $result['ten_khach_hang']; ?></td>
        <td><?php echo $result['id_kygiua']; ?></td>
        <td><?php echo $result['so_luong_ky_gui']; ?></td>
        <td><?php echo $result['tong_tien_ky_gui']; ?>đ</td>
        </tr>
                </tbody>
            </table>
           
            
            <?php
include("ketnoi.php");

$id_kygiua = $_GET['id']; // Lấy ID ký gửi từ URL

// Truy vấn thông tin từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT 
                            khachhang.username AS username,
                            user.email AS email
                        FROM 
                            khachhang
                        JOIN 
                            kygiua ON khachhang.id_khachhang = kygiua.id_khachhang
                        JOIN 
                            user ON khachhang.username = user.username
                        WHERE 
                            kygiua.id_kygiua = :id_kygiua");
$stmt->bindParam(':id_kygiua', $id_kygiua);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// In ra thông tin
?>


<h4 class="card-title mb-4">Thanh Toán</h4>
<form role="form" action="" method="POST">
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" name="username" value="<?php echo $result['username']; ?>" readonly>
    </div> <!-- form-group.// -->
    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group">
            <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" readonly>
        </div> <!-- input-group.// -->
    </div> <!-- form-group.// -->
    
    <p class="alert alert-success"> <i class="fa fa-lock"></i> Một số thông tin bảo mật...</p>

    <button class="subscribe btn btn-primary btn-block" type="submit" name="submit">Thanh Toán </button>
    
</form>


        </div>
    </div>
</div>
</body>
<?php
include("ketnoi.php");
session_start(); // Khởi động phiên trước khi sử dụng $_SESSION

if(isset($_POST['submit'])){
    $id_kygiua = $_GET['id']; // Lấy ID ký gửi từ URL

    // Truy vấn để lấy thông tin từ bảng CT_kygiua
    $stmt_ct_kygiua = $conn->prepare("SELECT * FROM CT_kygiua WHERE id_kygiua = :id_kygiua");
    $stmt_ct_kygiua->bindParam(':id_kygiua', $id_kygiua);
    $stmt_ct_kygiua->execute();
    $result_ct_kygiua = $stmt_ct_kygiua->fetchAll(PDO::FETCH_ASSOC);

    // Lấy id_loai từ bảng loai_nhadat với tên loại là "Bán"
    $id_loai_ban = "";
    $stmt_id_loai = $conn->prepare("SELECT id_loai FROM loai_nhadat WHERE tenloai = 'Bán'");
    $stmt_id_loai->execute();
    $row_id_loai = $stmt_id_loai->fetch(PDO::FETCH_ASSOC);
    if ($row_id_loai) {
        $id_loai_ban = $row_id_loai['id_loai'];
    }

    // Thêm thông tin vào bảng nhadat
    foreach ($result_ct_kygiua as $row) {
        $stmt_insert_nhadat = $conn->prepare("INSERT INTO nhadat 
                                        (id_nhadat, ten_nhadat, mota, id_loai, ID_Tinh, ID_Huyen_Quan, ID_Xa_Duong, Thon_SoNha, maloaihinh, gia, dientich, hinhanh, anhphu1, anhphu2, anhphu3, anhphu4, ketcau, tinhtrang) 
                                        VALUES 
                                        (:id_nhadat, :ten_nhadat, :mota, :id_loai, :ID_Tinh, :ID_Huyen_Quan, :ID_Xa_Duong, :Thon_SoNha, :maloaihinh, :gia, :dientich, :hinhanh, :anhphu1, :anhphu2, :anhphu3, :anhphu4, :ketcau, 'Còn Trống')");
        $stmt_insert_nhadat->bindParam(':id_nhadat', $row['id_ctkygiua']);
        $stmt_insert_nhadat->bindParam(':ten_nhadat', $row['ten_nhadat']);
        $stmt_insert_nhadat->bindParam(':mota', $row['mota']);
        $stmt_insert_nhadat->bindParam(':id_loai', $id_loai_ban); // Sử dụng id_loai đã lấy từ bảng loai_nhadat
        $stmt_insert_nhadat->bindParam(':ID_Tinh', $row['ID_Tinh']);
        $stmt_insert_nhadat->bindParam(':ID_Huyen_Quan', $row['ID_Huyen_Quan']);
        $stmt_insert_nhadat->bindParam(':ID_Xa_Duong', $row['ID_Xa_Duong']);
        $stmt_insert_nhadat->bindParam(':Thon_SoNha', $row['Thon_SoNha']);
        $stmt_insert_nhadat->bindParam(':maloaihinh', $row['maloaihinh']);
        $stmt_insert_nhadat->bindParam(':gia', $row['gia']);
        $stmt_insert_nhadat->bindParam(':dientich', $row['dientich']);
        $stmt_insert_nhadat->bindParam(':hinhanh', $row['hinhanh']);
        $stmt_insert_nhadat->bindParam(':anhphu1', $row['anhphu1']);
        $stmt_insert_nhadat->bindParam(':anhphu2', $row['anhphu2']);
        $stmt_insert_nhadat->bindParam(':anhphu3', $row['anhphu3']);
        $stmt_insert_nhadat->bindParam(':anhphu4', $row['anhphu4']);
        $stmt_insert_nhadat->bindParam(':ketcau', $row['ketcau']);
        $stmt_insert_nhadat->execute();
    }

    // Lấy id_khachhang từ bảng kygiua
    $stmt_kygiua = $conn->prepare("SELECT id_khachhang FROM kygiua WHERE id_kygiua = :id_kygiua");
    $stmt_kygiua->bindParam(':id_kygiua', $id_kygiua);
    $stmt_kygiua->execute();
    $row_kygiua = $stmt_kygiua->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra nếu tồn tại id_khachhang
    if ($row_kygiua) {
        $id_khachhang = $row_kygiua['id_khachhang'];
    } else {
        echo "Không tìm thấy thông tin khách hàng.";
        exit;
    }

    // Lấy thông tin id_nhanvien từ bảng nhanvien
    $username = $_SESSION['username'];
    $stmt_id_nhanvien = $conn->prepare("SELECT Id_NhanVien FROM nhanvien WHERE UserName = :username");
    $stmt_id_nhanvien->bindParam(':username', $username);
    $stmt_id_nhanvien->execute();
    $row_id_nhanvien = $stmt_id_nhanvien->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra nếu tồn tại id_nhanvien
    if ($row_id_nhanvien) {
        $id_nhanvien = $row_id_nhanvien['Id_NhanVien'];
    } else {
        echo "Không tìm thấy thông tin nhân viên.";
        exit;
    }

    // Lấy thông tin loại hóa đơn từ bảng loai_nhadat
    $loai_hoadon = 'Bán'; // Loại hóa đơn ở đây là 'Bán', bạn có thể thay đổi nếu cần
    $stmt_loai_hoadon = $conn->prepare("SELECT * FROM loai_nhadat WHERE tenloai = :loai_hoadon");
    $stmt_loai_hoadon->bindParam(':loai_hoadon', $loai_hoadon);
    $stmt_loai_hoadon->execute();
    $row_loai_hoadon = $stmt_loai_hoadon->fetch(PDO::FETCH_ASSOC);

    // Lấy id_loai_hoadon từ kết quả truy vấn
    $id_loai_hoadon = '';
    if ($row_loai_hoadon) {
        $id_loai_hoadon = $row_loai_hoadon['id_loai'];
        
    }

    // Lấy ngày hiện tại
    $ngaylap = date('Y-m-d H:i:s');

    // Tạo id_hoadon mới
    $id_hoadon = 'HD' . time(); // Ví dụ sử dụng timestamp để tạo mã hóa đơn

    // Thêm thông tin vào bảng hoadon
    $stmt_insert_hoadon = $conn->prepare("INSERT INTO hoadon 
                                (id_hoadon, id_khachhang, Id_NhanVien, ngaylap, loaihoadon) 
                                VALUES 
                                (:id_hoadon, :id_khachhang, :Id_NhanVien, :ngaylap, :loaihoadon)");
    $stmt_insert_hoadon->bindParam(':id_hoadon', $id_hoadon);
    $stmt_insert_hoadon->bindParam(':id_khachhang', $id_khachhang);
    $stmt_insert_hoadon->bindParam(':Id_NhanVien', $id_nhanvien);
    $stmt_insert_hoadon->bindParam(':ngaylap', $ngaylap);
    $stmt_insert_hoadon->bindParam(':loaihoadon', $id_loai_hoadon);
    $stmt_insert_hoadon->execute();

    // Thêm thông tin chi tiết hóa đơn vào bảng chitiethoadon
    foreach ($result_ct_kygiua as $row) {
        $id_nhadat = $row['id_ctkygiua'];
        $soluong = 1; // Giả sử mỗi ký gửi tương ứng với một mặt hàng trong hóa đơn
        $giaca = $row['gia'];

        // Thêm thông tin vào bảng chitiethoadon
        $stmt_insert_chitiethoadon = $conn->prepare("INSERT INTO chitiethoadon 
                                        (id_hoadon, id_nhadat, soluong, giaca) 
                                        VALUES 
                                        (:id_hoadon, :id_nhadat, :soluong, :giaca)");
        $stmt_insert_chitiethoadon->bindParam(':id_hoadon', $id_hoadon);
        $stmt_insert_chitiethoadon->bindParam(':id_nhadat', $id_nhadat);
        $stmt_insert_chitiethoadon->bindParam(':soluong', $soluong);
        $stmt_insert_chitiethoadon->bindParam(':giaca', $giaca);
        $stmt_insert_chitiethoadon->execute();
    }
// Cập nhật trạng thái ký gửi đã thanh toán
$stmt_update_kygiua = $conn->prepare("UPDATE kygiua SET trang_thai = 'Da Thanh Toan' WHERE id_kygiua = :id_kygiua");
$stmt_update_kygiua->bindParam(':id_kygiua', $id_kygiua);
$stmt_update_kygiua->execute();
}
?>

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
        $mail->Subject = "Giao Dịch Thành Công";
        $mail->Body = "Xin chào, $username!<br>Chúng Tôi Đã Thực Hiện Thanh Toán Ký Giửa Của Bạn Thành Công ạ.";

        // Gửi email
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
