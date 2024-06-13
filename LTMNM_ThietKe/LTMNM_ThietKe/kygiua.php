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

<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12" >
			<a href="TrangChu.php" class="brand-wrap">
					<img class="logo" src="../LTMNM_ThietKe/images/logo.jfif"  style="width: 100px; height: 300px;">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6" >
				<form  action="Trang_TimKiem_Ten.php" method="GET" class="search-header" >
            <div class="input-group-append input-group w-100">
                <input type="text" class="form-control" name="search_keyword" placeholder="Nhập từ khóa...">
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-search"></i> Search
                </button>
          </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
      
			<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
        <div class="widget-header mr-3">
    <?php 
    session_start();
    if(isset($_SESSION['username'])) {
        $link = "TrangTTCN_KH.php";
        $username = htmlspecialchars($_SESSION['username']);
    } else {
        $link = "Trang_DangNhap.php";
        $username = "Guest";
    }
    ?>
    <a href="<?php echo $link; ?>" class="widget-view">
        <div class="icon-area">
            <i class="fa fa-user"></i>
            <span class="notify">3</span>
        </div>
        <small class="text"><?php echo $username; ?></small>
    </a>
</div>
					<div class="widget-header mr-3">
						<a href="kygiua.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-store"></i>
							</div>
							<small class="text"> Ký Gửi</small>
						</a>
					</div>
					
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
      	<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i>Loại Hình </a>
          <?php
// Include connection file (replace with the actual path)
include 'ketnoi.php';

// Fetch types of properties query
$sql = "SELECT * FROM loai_hinh";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Open the dropdown menu div
    echo '<div class="dropdown-menu">';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ten_loaihinh = $row['tenloaihinh'];
        // Capture the ma_loaihinh value for link generation
        $ma_loaihinh = $row['maloaihinh']; // Added line to get ma_loaihinh

        // Output each dropdown item
        echo "<a class='dropdown-item' href='TrangMuaThue.php?maloaihinh=$ma_loaihinh'>$ten_loaihinh</a>";
    }

    // Close the dropdown menu div
    echo '</div>';

} catch (PDOException $e) {
    echo "Lỗi Khi Xử Lý (Error): " . $e->getMessage();
}

$conn = null; // Close connection
?>

        </li>
      	<li class="nav-item">
           <a class="nav-link" href="TrangMuaThue.php">Mua </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TrangBan.php">Ký Gửi</a>
        </li>
		   <li class="nav-item">
          <a class="nav-link" href="TrangMuaThue.php">Thuê</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TrangDuAn.php">Dự Án </a>
        </li>
		  <li class="nav-item">
          <a class="nav-link" href="#">Tin Tức</a>
        </li>
       
		  
		   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Chuyên Viên</a>
          <div class="dropdown-menu">
			<a class="dropdown-item" href="page-index.html">Gặp Chuyên Viên Tư Vấn</a>
			<a class="dropdown-item" href="page-category.html">Kiến Thức Mua Giới</a>
		
			
          </div>
        </li>
		 
		  
		   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Trang Tin</a>
          <div class="dropdown-menu">
			<a class="dropdown-item" href="page-index.html">Thị Trường Bất Động Sản</a>
			<a class="dropdown-item" href="page-category.html">Tài Liệu Phân Tích</a>
			<a class="dropdown-item" href="page-listing-large.html">Đánh Giá Đầu Tư</a>
			
          </div>
        </li>
      
      </ul>
     
		 <ul class="navbar-nav ml-md-auto">
      	  <li class="nav-item">
            <a class="nav-link" href="TrangDangKy.php">Đăng Ký</a>
          </li>
	    <li class="nav-item">
            <a class="nav-link" href="Trang_DangNhap.php">Đăng Nhập</a>
          </li>
	   </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
	


</header> <!-- section-header.// -->


<div class="container">
    <div class="row">
        <div class="col-md-9">
        <?php

// Kiểm tra người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Kết nối CSDL
include("ketnoi.php");

// Lấy id_khachhang của người dùng từ bảng khachhang dựa trên username đã đăng nhập
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT id_khachhang FROM khachhang WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$id_khachhang = $result['id_khachhang'];

// Truy vấn để lấy thông tin từ bảng ct_kygiua kết hợp với bảng loai_hinh
// Chỉ lấy những bản ghi có trạng thái 'Dang cho ky giua'
$trang_thai = 'Dang cho ky giua';
$sql = "SELECT ct_kygiua.*, loai_hinh.tenloaihinh 
        FROM ct_kygiua 
        INNER JOIN loai_hinh ON ct_kygiua.maloaihinh = loai_hinh.maloaihinh
        WHERE ct_kygiua.id_kygiua IN (
            SELECT id_kygiua 
            FROM kygiua 
            WHERE id_khachhang = :id_khachhang AND trang_thai = :trang_thai
        )";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_khachhang', $id_khachhang);
$stmt->bindParam(':trang_thai', $trang_thai);
$stmt->execute();

?>

<?php if ($stmt->rowCount() > 0): ?>
    <table class="table table-borderless table-shopping-cart">
        <thead class="text-muted">
            <tr class="small text-uppercase">
                <th scope="col" width="120">Sản Phẩm</th>
                <th scope="col" width="120">Giá Bán</th>
                
                <th scope="col" width="120">Sự Kiện</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr id="product_row_<?= $row['id_ctkygiua'] ?>">
                <td>
                    <figure class="itemside">
                        <div class="aside"><img src="images/items/<?= $row['hinhanh'] ?>" class="img-sm"></div>
                        <figcaption class="info">
                            <a href="#" class="title text-dark"><?= strlen($row['ten_nhadat']) > 10 ? substr($row['ten_nhadat'], 0, 15) . '...' : $row['ten_nhadat'] ?></a>
                            <p class="text-muted small">Diện Tích: <?= $row['dientich'] ?>, Loại Hình: <?= $row['tenloaihinh'] ?></p>
                        </figcaption>
                    </figure>
                </td>
                <td>
                    <div class="price-wrap">
                        <var class="price"><?= $row['gia'] ?></var>
                    </div>
                </td>
                
                <br></br>
                <td class="text-right">
                    <a href="removekygiua.php?id_ctkygiua=<?= $row['id_ctkygiua'] ?>" class="btn btn-light" onclick="return confirm('Bạn có muốn Xoá Không?')">Delete</a>
                   <!-- <a href="#" class="btn btn-light">Cập Nhập</a>-->
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không có còn mô hình ký giử.</p>
<?php endif; ?>


        </div>

        <aside class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                
                    </form>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Số Lượng:</dt>
                        <dd class="text-right" id="recordCount"></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Tổng Tiền:</dt>
                        <dd class="text-right" id="total"></dd>
                    </dl>

                    <hr>
                    <p class="text-center mb-3">
                        <img src="images/misc/payments.png" height="26">
                    </p>
                    <div class="form-group col-md">
                    <form  action="" method="POST">
    <div class="form-group col-md">
        
        <a href="TrangBan.php" class="btn btn-primary" >Ký Giửa</a>
    </div>
</form>
    </div>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
    <div class="form-group col-md">
    <a href="XoaAll_kygiua.php" class="btn btn-danger" onclick="return confirm('Bạn có muốn Xoá Hết Tất Cả Không?')">Xoá All</a>
</div>

</div>
<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
    // Lấy thông tin từ session
    session_start();
    $username = $_SESSION['username'];

    // Tạo đối tượng PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'webmuabannhadat@gmail.com'; // Thay thế bằng địa chỉ email của bạn
        $mail->Password = 'bjcgqdogctdhxbgk'; // Thay thế bằng mật khẩu email của bạn
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = "UTF-8"; // Thiết lập bộ mã cho email

        // Cấu hình nội dung email
        $mail->setFrom("lenhatquyen08011@gmail.com", "ByeHouse");
        $mail->addAddress("lenhatquyen08011@gmail.com", $username);
        $mail->isHTML(true);
        $mail->Subject = "Gửi yêu cầu ký giữa";
        $mail->Body = "Xin chào,<br>Tôi đã thực hiện yêu cầu ký giữa.";

        // Gửi email
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   function deleteAllRecords() {
    if (confirm("Bạn có chắc chắn muốn xoá tất cả bản ghi không?")) {
        // Gửi yêu cầu AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Nếu yêu cầu thành công, cập nhật giao diện
                    alert("Xoá tất cả bản ghi thành công!");
                    // Cập nhật giao diện ở đây nếu cần
                } else {
                    // Xử lý lỗi
                    alert("Đã xảy ra lỗi khi xoá tất cả bản ghi.");
                }
            }
        };
        xhr.open("GET", "delete_all_kygiu.php", true);
        xhr.send();
    }
}



</script>





<!-- Script để tính tổng giá trị của các bản ghi và đếm số lượng bản ghi -->
<!-- Script để tính tổng giá trị của các bản ghi và đếm số lượng bản ghi -->
<script>
    function calculateTotalAndRecordCount() {
        var prices = document.querySelectorAll('.price');
        var total = 0;
        for (var i = 0; i < prices.length; i++) {
            var price = prices[i].textContent.replace(/[^\d]/g, ''); // Remove non-numeric characters
            total += parseInt(price);
        }
        document.getElementById('total').innerText = total; // Sử dụng innerText để hiển thị tổng giá trị

        var recordCount = prices.length; // Đếm số lượng bản ghi
        document.getElementById('recordCount').innerText = recordCount; // Sử dụng innerText để hiển thị số lượng bản ghi
    }

    // Gọi hàm tính tổng và đếm bản ghi khi trang được tải
    document.addEventListener("DOMContentLoaded", function() {
        calculateTotalAndRecordCount();

        const deleteButtons = document.querySelectorAll("form button[type='submit']");
        deleteButtons.forEach(button => {
            button.addEventListener("click", function(event) {
                event.preventDefault();
                const form = this.closest("form");
                const formData = new FormData(form);
                const rowId = form.closest("tr").id;

                fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        document.getElementById(rowId).remove();
                        calculateTotalAndRecordCount(); // Recalculate after deletion
                    } else {
                        alert('Xóa không thành công. Vui lòng thử lại.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Xóa không thành công. Vui lòng thử lại.');
                });
            });
        });
    });

    // Hàm xử lý khi nhấn nút Đặt Lịch Hẹn
    function makeAppointment() {
        // Viết logic xử lý khi nhấn nút Đặt Lịch Hẹn ở đây
        alert("Chức năng này sẽ được xử lý trong tương lai.");
    }
</script>




</body>
</html>
