<?php
require_once 'ketnoi.php';
session_start();
$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM password_resets WHERE token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $reset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($reset && strtotime($reset['expiry']) > time()) {
            // Người dùng đã nhập đúng mã xác thực, cập nhật mật khẩu mới
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE user SET password = :password WHERE email = :email");
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $reset['email']);
            $stmt->execute();

            // Xóa mã xác thực đã sử dụng
            $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = :token");
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $success_message = "Password has been reset successfully!";
            header("Location: Trang_DangNhap.php");
            exit();
        } else {
            // Mã xác thực không hợp lệ hoặc đã hết hạn
            $error_message = "Invalid or expired token!";
        }
    } catch(PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>

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
    <?php
require_once 'header.php';
?>

<div class="container-fluid " style="background-image: url('images/banners/Mua_Thue9.jpg'); background-repeat: no-repeat; background-size: cover; " >
	
	<section class="section-conten padding-y" style="min-height:84vh">
    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
<div class="card-body">
  <h4 class="card-title mb-4 text-center">Reset Password</h4>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <?php if(isset($_GET['token'])) { ?>
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
    <?php } ?>
    <div class="form-group">
      <input name="password" class="form-control" id="password" placeholder="New Password" type="password" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
    </div>
  </form>

  <?php
  if (!empty($error_message)) {
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
  } elseif (!empty($success_message)) {
    echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
  }
  ?>
</div>
</div>
</div>
    </section>
</div>
