<?php
include("ketnoi.php");

$id_KhachHang = $_GET['sid'];
$sql = "SELECT * FROM khachhang WHERE id_khachhang = '$id_KhachHang'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các biến $_POST đã được gửi hay chưa
    if (isset($_POST['idkhachhang']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['hoten']) && isset($_POST['ngaysinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])) {

         $idkhachhang = $_POST['idkhachhang'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];


        try {
            $update_sql = "UPDATE `khachhang` SET
             `username` = '$username', 
            `password` = '$password',
             `hoten_kh` = '$hoten',
              `ngaysinh` = '$ngaysinh',
               `sdt_kh` = ' $sdt', 
               `diachi` = '$diachi' WHERE 
               `khachhang`.`id_khachhang` = '$idkhachhang'";

            $stmt = $conn->query($update_sql);
            echo "Cập Nhập khách hàng thành công";
            header("Location: trang_ql_kh.php"); // Chuyển hướng sau khi cập nhật thành công
            exit(); // Dừng thực thi script sau khi chuyển hướng
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>


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
<script type="text/javascript">
function Validate() 
{
    // Lấy giá trị của các trường input
    const idkhachhang = document.getElementById("idkhachhang").value.trim();
    const username=document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const hoten = document.getElementById("hoten").value.trim();
    const ngaysinh = document.getElementById("ngaysinh").value;
    const sdt = document.getElementById("sdt").value.trim();
    const diachi = document.getElementById("diachi").value.trim();

    let valida=true;
    // Xóa thông báo lỗi trước khi kiểm tra lại
   document.getElementById("idkhachhang").textContent = "";
    document.getElementById("password").nextElementSibling.textContent = "";
    document.getElementById("hoten").nextElementSibling.textContent = "";
    document.getElementById("sdt").nextElementSibling.textContent = "";
    document.getElementById("ngaysinh").nextElementSibling.textContent = "";

    // Kiểm tra ràng buộc 1: ID khách hàng
    if (!/^KH\d{3}$/.test(idkhachhang) || !idkhachhang) 
    {
        document.getElementById("idkhachhang").nextElementSibling.textContent = "Lỗi: ID khách hàng không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("idkhachhang").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }
  
    // Kiểm tra ràng buộc 2: Password
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/.test(password) || !password) {
        document.getElementById("password").nextElementSibling.textContent = "Lỗi: Password không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("password").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 3: Họ tên không chứa số
    if (/\d/.test(hoten)|| !hoten ) {
        document.getElementById("hoten").nextElementSibling.textContent = "Lỗi: Họ tên không được chứa số!";
        valida=false;
    }
    else {
        document.getElementById("hoten").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 4: Số điện thoại hợp lệ
    var phoneRegex = /^\d{10}$/;
    var viettelPattern = /^(096|097|098|032|033|034|035|036|037|038|039)\d{7}$/;
    var mobiPattern = /^(090|093|070|079|077|076|078)\d{7}$/;
    var vinaphonePattern = /^(091|094|083|084|085|081|082)\d{7}$/;

    if (!phoneRegex.test(sdt) || (!viettelPattern.test(sdt) && !mobiPattern.test(sdt) && !vinaphonePattern.test(sdt)) ) {
        document.getElementById("sdt").nextElementSibling.textContent = "Lỗi: Số điện thoại không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("sdt").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 5: Ngày sinh phải đủ 18 tuổi
    var tuoi18 = new Date();
    tuoi18.setFullYear(tuoi18.getFullYear() - 18);
    if (new Date(ngaysinh) > tuoi18) {
        document.getElementById("ngaysinh").nextElementSibling.textContent = "Lỗi: Ngày sinh không đủ 18 tuổi!";
        valida=false;
    }
    else {
        document.getElementById("ngaysinh").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    //kiểm tra rỗng username/địa chỉ
    if(!username)
    {
        document.getElementById("username").nextElementSibling.textContent = "Lỗi: User Name Không được bỏ trống!";
        valida=false;
    }
    else {
        document.getElementById("username").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    if(!diachi)
    {
        document.getElementById("diachi").nextElementSibling.textContent = "Lỗi: Địa Chỉ Không được bỏ trống!";
        valida=false;
    }
    else {
        document.getElementById("diachi").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }
    // Nếu tất cả ràng buộc được đáp ứng, cho phép submit form
    return valida;
}
</script>
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



	
<body>

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
						<a href="" class="widget-view">
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
							<small class="text"> Orders </small>
						</a>
					</div>
					<div class="widget-header">
						<a href="#" class="widget-view">
							<div class="icon-area">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<small class="text"> Ký Gửi Nhà Đất </small>
						</a>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->



	
	
	




<!-- ========================= SECTION  ========================= -->

<div class="container">
		<h5>Edit Khách Hàng</h5>

        <form action="editkh.php" method="POST"  onsubmit="return Validate()">
        <div class="form-group">
            <label for="idkhachhang">ID Khách Hàng</label>
            <input type="text" name="idkhachhang" id="idkhachhang" class="form-control" value="<?php echo isset($row['id_khachhang']) ? $row['id_khachhang'] : ''; ?>">
            <span class="form-error"></span>
        </div>

            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>">
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="password">PassWord</label>
                <input type="password" name="password" id="password"  class="form-control" value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>">
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="hoten">Họ Tên</label>
                <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo isset($row['hoten_kh']) ? $row['hoten_kh'] : ''; ?>">
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="ngaysinh">Ngày Sinh</label>
                <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" value="<?php echo isset($row['ngaysinh']) ? $row['ngaysinh'] : ''; ?>">
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="sdt">Số Điện Thoại</label>
                <input type="text" name="sdt" id="sdt" class="form-control" value="<?php echo isset($row['sdt_kh']) ? $row['sdt_kh'] : ''; ?>">
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="diachi">Địa Chỉ</label>
                <input type="text" name="diachi" id="diachi" class="form-control" value="<?php echo isset($row['diachi']) ? $row['diachi'] : ''; ?>">
                <span class="form-error"></span>
            </div>

            <button type="submit" class="btn btn-success" >Edit Khách Hàng</button>
            <a href="trang_ql_kh.php"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Quay Về</span> 
			</a>
        </form>
		
	
</div>

<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="padding-y-lg bg-light border-top">
<div class="container">


<p class="pb-2 text-center">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
  <div class="col-lg-4 col-sm-6">
<form class="form-row">
    <div class="col-8">
    <input class="form-control" placeholder="Your Email" type="email">
    </div> <!-- col.// -->
    <div class="col-4">
    <button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
    </div> <!-- col.// -->
</form>
<small class="form-text">We’ll never share your email address with a third-party. </small>
  </div> <!-- col-md-6.// -->
</div>
  

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


	
	
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



</body>

</html>