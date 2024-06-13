

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
		.input-group-append
		{
			color: dodgerblue;
		}
		.form-error {
                    color: red;
                    font-size: 12px;
                }

	</style>
<body>
<script type="text/javascript">
      
		function Validate() {
    // Lấy giá trị của các trường input
    const hoten_kh = document.getElementById("hoten_kh").value.trim();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const repeatPassword = document.getElementById("repeatPassword").value.trim();
    const email = document.getElementById("email").value.trim();
    const ngaysinh = document.getElementById("ngaysinh").value;
    const sdt_kh = document.getElementById("sdt_kh").value.trim();
    const diachi = document.getElementById("diachi").value.trim();

    let valida = true;

    // Xóa thông báo lỗi trước khi kiểm tra lại
    document.getElementById("hoten_kh").nextElementSibling.textContent = "";
    document.getElementById("username").nextElementSibling.textContent = "";
    document.getElementById("password").nextElementSibling.textContent = "";
    document.getElementById("repeatPassword").nextElementSibling.textContent = "";
    document.getElementById("email").nextElementSibling.textContent = "";
    document.getElementById("ngaysinh").nextElementSibling.textContent = "";
    document.getElementById("sdt_kh").nextElementSibling.textContent = "";
    document.getElementById("diachi").nextElementSibling.textContent = "";

    // Kiểm tra ràng buộc 1: Họ và tên không được để trống
    if (!hoten_kh) {
        document.getElementById("hoten_kh").nextElementSibling.textContent = "Lỗi: Họ và tên không được để trống!";
        valida = false;
    }

    // Kiểm tra ràng buộc 2: Username không được để trống
    if (!username) {
        document.getElementById("username").nextElementSibling.textContent = "Lỗi: UserName không được để trống!";
        valida = false;
    }

    // Kiểm tra ràng buộc 3: Password không được để trống
    if (!password) {
        document.getElementById("password").nextElementSibling.textContent = "Lỗi: Password không được để trống!";
        valida = false;
    }

    // Kiểm tra ràng buộc 4: Repeat Password không được để trống và phải khớp với Password
    if (!repeatPassword) {
        document.getElementById("repeatPassword").nextElementSibling.textContent = "Lỗi: Repeat Password không được để trống!";
        valida = false;
    } else if (repeatPassword !== password) {
        document.getElementById("repeatPassword").nextElementSibling.textContent = "Lỗi: Mật khẩu lặp lại không khớp với Password!";
        valida = false;
    }

    // Kiểm tra ràng buộc 5: Email phải có định dạng hợp lệ
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("email").nextElementSibling.textContent = "Lỗi: Email không hợp lệ!";
        valida = false;
    }

    // Kiểm tra ràng buộc 6: Ngày sinh phải đủ 18 tuổi
    const tuoi18 = new Date();
    tuoi18.setFullYear(tuoi18.getFullYear() - 18);
    if (new Date(ngaysinh) > tuoi18) {
        document.getElementById("ngaysinh").nextElementSibling.textContent = "Lỗi: Ngày sinh không đủ 18 tuổi!";
        valida = false;
    }

    // Kiểm tra ràng buộc 7: Số điện thoại phải hợp lệ
    const phoneRegex = /^\d{10}$/;
    const viettelPattern = /^(096|097|098|032|033|034|035|036|037|038|039)\d{7}$/;
    const mobiPattern = /^(090|093|070|079|077|076|078)\d{7}$/;
    const vinaphonePattern = /^(091|094|083|084|085|081|082)\d{7}$/;
    if (!phoneRegex.test(sdt_kh) || (!viettelPattern.test(sdt_kh) && !mobiPattern.test(sdt_kh) && !vinaphonePattern.test(sdt_kh))) {
        document.getElementById("sdt_kh").nextElementSibling.textContent = "Lỗi: Số điện thoại không hợp lệ!";
        valida = false;
    }

    // Kiểm tra ràng buộc 8: Địa chỉ không được để trống
    if (!diachi) {
        document.getElementById("diachi").nextElementSibling.textContent = "Lỗi: Địa chỉ không được để trống!";
        valida = false;
    }

    // Nếu tất cả ràng buộc được đáp ứng, cho phép submit form
    return valida;
}


    </script>

<header class="section-header">
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 col-lg-3 col-md-12" >
				<a href="#" class="brand-wrap">
					<img class="logo" src="../LTMNM_ThietKe/images/logo.jfif">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-xl-6 col-lg-5 col-md-6" >
				<form action="#" class="search-header" >
					<div class="input-group w-100" >
						<select class="custom-select border-right"  name="category_name" >
								<option value="">Loại</option><option value="codex">Mua</option>
								<option value="comments">Bán</option>
								<option value="content">Thuê</option>
						</select>
					    <input type="text" class="form-control" placeholder="Search">
					    
					    <div class="input-group-append">
					      <button class="btn btn-primary" style="background-color:dodgerblue" type="submit">
					        <i class="fa fa-search"></i> Search
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap .end// -->
			</div> <!-- col.// -->
				<div class="col-xl-4 col-lg-4 col-md-6">
				<div class="widgets-wrap float-md-right">
					<div class="widget-header mr-3">
						<a href="TrangTTCN_KH.php" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-user"></i>
								<span class="notify">3</span>
							</div>
							<small class="text"> Tài Khoản</small>
						</a>
					</div>
					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-comment-dots"></i>
								<span class="notify">1</span>
							</div>
							<small class="text"> Message </small>
						</a>
					</div>
					<div class="widget-header mr-3">
						<a href="#" class="widget-view">
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



</header> <!-- section-header.// -->
<div class="container-fluid " style=" background-image: url('images/banners/Mua_Thue1.jfif');" >
	
	<section class="section-content padding-y">
<!-- ============================ COMPONENT REGISTER   ================================= -->
<div class="card mx-auto" style="max-width: 520px; margin-top: 40px;">
    <article class="card-body">
        <header class="mb-4 text-center"><h4 class="card-title" >Đăng Ký</h4></header>
<?php
require_once 'ketnoi.php';

// Khởi tạo biến lưu thông báo lỗi và thành công
$error_message = '';
$success_message = '';

// Kiểm tra nếu form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Thu thập dữ liệu từ form
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['repeatPassword'];
  $hoten_kh = $_POST['hoten_kh'];
  $ngaysinh = $_POST['ngaysinh'];
  $gioitinh = $_POST['gender'];
  $sdt_kh = $_POST['sdt_kh'];
  $diachi = $_POST['diachi'];
  $email = $_POST['email'];

  // Kiểm tra mật khẩu và mật khẩu lặp lại
  if ($password !== $repeatPassword) {
    $error_message = "Mật khẩu và Mật khẩu lặp lại không khớp!";
  } else {
    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     // Tạo một ID khách hàng mới
     $stmt = $conn->query("SELECT MAX(SUBSTRING(id_khachhang, 3, 3)) AS max_id FROM khachhang");
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
     $max_id = $row['max_id'];
     $next_id = $max_id + 1;
     $new_id = "KH" . sprintf("%03d", $next_id);

    try {
      // Kiểm tra xem username đã tồn tại trong cơ sở dữ liệu hay chưa
      $stmt = $conn->prepare("SELECT * FROM khachhang WHERE username = :username");
      $stmt->bindParam(':username', $username);
      $stmt->execute();
      $count = $stmt->rowCount();

      if ($count > 0) {
        // Nếu username đã tồn tại, gán thông báo lỗi
        $error_message = "Username đã tồn tại trong cơ sở dữ liệu!";
      } else {
         //thêm dữ liệu vào user
         $sql_user = "INSERT INTO user (username, password, email, role) VALUES (:username, :hashed_password, :email, 0)"; // Include email and role with default value
         $stmt_user = $conn->prepare($sql_user);
         $stmt_user->bindParam(':username', $username);
         $stmt_user->bindParam(':hashed_password', $hashed_password); // Bind the hashed password
         $stmt_user->bindParam(':email', $email); // Bind email to the prepared statement
         $stmt_user->execute();
 
        // Thêm dữ liệu vào cơ sở dữ liệu (khachhang table)
        // Tạo một ID khách hàng mới (automatic generation using AUTO_INCREMENT)
        $sql = "INSERT INTO khachhang (id_khachhang,username, hoten_kh, ngaysinh, gioitinh, sdt_kh, diachi) 
                VALUES (:id_khachhang,:username, :hoten_kh, :ngaysinh, :gioitinh, :sdt_kh, :diachi)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_khachhang', $new_id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':hoten_kh', $hoten_kh);
        $stmt->bindParam(':ngaysinh', $ngaysinh);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':sdt_kh', $sdt_kh);
        $stmt->bindParam(':diachi', $diachi);
       

        $stmt->execute();

       
        // Kiểm tra nếu insert user thành công
        if ($stmt_user->rowCount() > 0) {
          // Gán thông báo thành công
          $success_message = "Đăng ký thành công!";
        } else {
          // Nếu insert user thất bại, gán thông báo lỗi
          $error_message = "Lỗi: Không thể tạo tài khoản người dùng!";
        }
      }
    } catch(PDOException $e) {
      // Gán thông báo lỗi nếu có
      $error_message = "Lỗi: " . $e->getMessage();
    }
  }
}
?>



<!-- Form đăng ký -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return Validate()">
    <div class="form-row">
        <div class="col form-group">
            <label>Họ Và Tên</label>
            <input type="text" class="form-control" name="hoten_kh" id="hoten_kh">
			<span class="form-error"></span>
        </div>
        <div class="col form-group">
            <label>UserName</label>
            <input type="text" class="form-control" name="username" id="username">
			<span class="form-error"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Password</label>
            <input class="form-control" type="password" name="password" id="password">
			<span class="form-error"></span>
        </div>
        <div class="form-group col-md-6">
            <label>Repeat password</label>
            <input class="form-control" type="password" name="repeatPassword" id="repeatPassword">
			<span class="form-error"></span>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email">
		<span class="form-error"></span>
        <small class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất kỳ ai khác.</small>
    </div>
    <div class="form-group">
    <label class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="gender" value="1">
        <span class="custom-control-label"> Nam </span>
    </label>
    <label class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="gender" value="0">
        <span class="custom-control-label"> Nữ </span>
    </label>
</div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Ngày Sinh</label>
            <input type="date" class="form-control" name="ngaysinh" id="ngaysinh">
			<span class="form-error"></span>
        </div>
        <div class="form-group col-md-6">
            <label>Số Điện Thoại</label>
            <input type="text" class="form-control" name="sdt_kh" id="sdt_kh">
			<span class="form-error"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Địa Chỉ</label>
            <input type="text" class="form-control" name="diachi" id="diachi">
			<span class="form-error"></span>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Đăng ký </button>
    </div>
    <div class="form-group">
        <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" checked="">
            <div class="custom-control-label"> Tôi đồng ý với <a href="#">các điều khoản và điều kiện</a> </div>
        </label>
    </div>
</form>
<?php
if (!empty($error_message)) {
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
} elseif (!empty($success_message)) {
    echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
}
?>

       
    </article><!-- card-body.// -->
</div> <!-- card .// -->

<p class="text-center mt-4" style="font-weight: bold;">Have an account? <a href="Trang_DangNhap.php" style="color: red;font-weight: bold;">Log In</a></p>
<br><br>

<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
	</div>
	
	
	<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary">
	<div class="container">
		<section class="footer-top padding-y-lg text-white">
			<div class="row">
				<aside class="col-md col-6">
					<h6 class="title">Thể Loại </h6>
					<ul class="list-unstyled">
						<li> <a href="#">Mua</a></li>
						<li> <a href="#">Bán</a></li>
						<li> <a href="#">Thuê</a></li>
						
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Company</h6>
					<ul class="list-unstyled">
						<li> <a href="#">About us</a></li>
						<li> <a href="#">Career</a></li>
						<li> <a href="#">Find a store</a></li>
						<li> <a href="#">Rules and terms</a></li>
						<li> <a href="#">Sitemap</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Help</h6>
					<ul class="list-unstyled">
						<li> <a href="#">Contact us</a></li>
						<li> <a href="#">Money refund</a></li>
						<li> <a href="#">Order status</a></li>
						<li> <a href="#">Shipping info</a></li>
						<li> <a href="#">Open dispute</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Account</h6>
					<ul class="list-unstyled">
						<li> <a href="#"> User Login </a></li>
						<li> <a href="#"> User register </a></li>
						<li> <a href="#"> Account Setting </a></li>
						<li> <a href="#"> My Orders </a></li>
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title">Social</h6>
					<ul class="list-unstyled">
						<li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
						<li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
						<li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom text-center">
		
				<p class="text-white">Chính sách bảo mật - Điều khoản sử dụng - Thông tin người dùng Hướng dẫn truy vấn pháp lý</p>
				<p class="text-muted"> &copy Địa chỉ : 140 Lê Trọng Tấn ,Tân Phú,Tp Hồ Chí Minh </p>
				<br>
		</section>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->