
<?php
ob_start();
// khởi tạo biến
$username = $password = $error_message = $success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Truy xuất dữ liệu 
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 
    if (empty($username) || empty($password)) {
        $error_message = "Username and password cannot be empty!";
    } else {
        
        $success_message = "Login successful!";
    }
}
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
				.form-group {
    position: relative;
}

.form-control {
    padding-right: 30px; /* Để tạo không gian cho biểu tượng */
}

.password-toggle {
    position: absolute;
    right: 5px; /* Điều chỉnh vị trí của biểu tượng */
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.password-toggle i {
    color: #ccc;
}

	</style>
<body>
<script type="text/javascript">
function Validate() {
    // Lấy giá trị của các trường input
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    // Xóa thông báo lỗi trước khi kiểm tra lại
    document.getElementById("username").nextElementSibling.textContent = "";
    document.getElementById("password").nextElementSibling.textContent = "";

    // Kiểm tra ràng buộc 1: Username không được để trống
    if (!username) {
        document.getElementById("username").nextElementSibling.textContent = "Vui lòng nhập tên đăng nhập!";
        return false; // Ngăn form được submit nếu có lỗi
    }

    // Kiểm tra ràng buộc 2: Password không được để trống
    if (!password) {
        document.getElementById("password").nextElementSibling.textContent = "Vui lòng nhập mật khẩu!";
        return false; // Ngăn form được submit nếu có lỗi
    }

    // Nếu không có lỗi, cho phép submit form
    return true;
}
function togglePasswordVisibility() {
    var passwordField = document.getElementById("Password");
    var passwordToggle = document.querySelector(".toggle-password i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggle.classList.remove("fa-eye");
        passwordToggle.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        passwordToggle.classList.remove("fa-eye-slash");
        passwordToggle.classList.add("fa-eye");
    }
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
	
	<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
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

  try {
    // Kiểm tra xem username tồn tại trong cơ sở dữ liệu hay không
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   // After fetching user data from the database
if ($user) {
    // Nếu username tồn tại, kiểm tra password
    if (password_verify($password, $user['password'])) {
        // Đăng nhập thành công
        $success_message = "Đăng nhập thành công!";

        // Kiểm tra vai trò (role) của người dùng
        $role = $user['role']; // Fetching role from the database

        if ($role == 0) {
            header('Location: TrangTTCN_KH.php');
            exit; // Stop further script execution
        } else {
            header('Location: https://your-admin-page.com');
            exit;
        }
    } 
	else {
        // Password không đúng
        $error_message = "Sai tên đăng nhập hoặc mật khẩu!";
    }
} else {
    // Username không tồn tại
    $error_message = "Sai tên đăng nhập hoặc mật khẩu!";
}
  } catch(PDOException $e) {
    // Lỗi kết nối cơ sở dữ liệu
    $error_message = "Lỗi: " . $e->getMessage();
  }
}
ob_end_flush();
?>


<div class="card-body">
  <h4 class="card-title mb-4 text-center">Đăng Nhập </h4>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return Validate()">

    <div class="form-group">
      <input name="username" class="form-control" id="username" placeholder="Username" type="text" value="<?php echo isset($username) ? $username : ''; ?>">
      <span class="form-error"></span>
    </div>
    <div class="form-group">
      <input name="password" id="Password" class="form-control" placeholder="Password" type="password">
      <span class="password-toggle">
        <i class="fa fa-eye" aria-hidden="true" onclick="togglePasswordVisibility()"></i>
      </span>
    </div>


    <div class="form-group">
      <a href="#" class="float-right">Quên mật khẩu?</a>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block"> Đăng Nhập </button>
    </div>
    <p class="text-center mt-4">Bạn chưa có tài khoản? <a href="TrangDangKy.php">Đăng Ký</a></p>
  </form>

  <?php
  // Hiển thị thông báo lỗi hoặc thành công
  if (!empty($error_message)) {
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
  } elseif (!empty($success_message)) {
    echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
  }
  ?>
</div>

<!-- card-body.// -->

</div> <!-- card .// -->

<br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->


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