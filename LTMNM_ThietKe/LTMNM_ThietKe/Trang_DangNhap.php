
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
<?php
require_once 'header.php';
?>

<div class="container-fluid " style="background-image: url('images/banners/Mua_Thue9.jpg'); background-repeat: no-repeat; background-size: cover; " >
	
	<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
<?php
ob_start();
require_once 'ketnoi.php';
session_start(); // Bắt đầu phiên

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

        // Sau khi lấy dữ liệu người dùng từ cơ sở dữ liệu
        if ($user) {
            // Nếu username tồn tại, kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $success_message = "Đăng nhập thành công!";

                // Lưu username vào session
                $_SESSION['username'] = $username;

                // Kiểm tra vai trò (role) của người dùng và chuyển hướng tương ứng
                $role = $user['role']; // Lấy vai trò từ cơ sở dữ liệu

                if ($role == 0) {
                    // Chuyển hướng đến trang TrangTTCN_KH.php
                    header('Location: TrangChu.php');
                    exit; // Đảm bảo dừng việc thực thi mã sau khi chuyển hướng
                } else if ($role == 2)
                {
                  header('Location: TrangTTCN_Admin.php');
                    exit;
                }
                {
                    header('Location: TrangTTCN_Admin.php');
                    exit;
                }
            } else {
                // Sai mật khẩu
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
      <a href="TrangquenMK.php" class="float-right">Quên mật khẩu?</a>
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
	<?php
	require_once 'footer.php';
	?>
<!-- ========================= FOOTER END // ========================= -->