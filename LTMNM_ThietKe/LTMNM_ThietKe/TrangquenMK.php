<?php
require_once 'ketnoi.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    try {
        // Kiểm tra xem địa chỉ email có tồn tại trong bảng user không
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Xóa các mã xác thực cũ của người dùng từ bảng password_resets
            $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Tạo mã xác thực mới
            $token = generateRandomString(6); // Mã xác thực gồm 6 ký tự
            $expiry = date("Y-m-d H:i:s", strtotime('+15 minutes')); // Thiết lập thời gian hiệu lực là 15 phút sau hiện tại

            // Thêm mã xác thực mới vào bảng password_resets
            $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expiry) VALUES (:email, :token, :expiry)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expiry', $expiry);
            $stmt->execute();

            // Gửi email chứa mã xác thực mới
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'websitemuabannhadat@gmail.com';
            $mail->Password = 'apxitumsvjsmkxyl';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = "UTF-8";
            $mail->setFrom('websitemuabannhadat@gmail.com', 'ByeHouse');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Password Reset Request";
            $mail->Body = "Hello,<br><br>You requested to reset your password. Please use the following code to reset your password: <strong>$token</strong>";
            $mail->send();

            $success_message = "A password reset code has been sent to your email address.";
            header("Location: password_resets.php");
            exit();
        } else {
            $error_message = "Mail Chưa Đăng Ký Tài Khoản";
        }
    } catch(PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    } catch (Exception $e) {
        $error_message = "Mailer Error: {$mail->ErrorInfo}";
    }
}

// Hàm sinh chuỗi ngẫu nhiên với độ dài xác định
function generateRandomString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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

<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="card mx-auto" style="max-width: 380px; margin-top:100px;">

<div class="card-body">
  <h4 class="card-title mb-4 text-center">Nhập Gmail </h4>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
      <input name="email" class="form-control" id="email" placeholder="Email" type="email" required>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Sumbit</button>
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
    </section>
</div>

