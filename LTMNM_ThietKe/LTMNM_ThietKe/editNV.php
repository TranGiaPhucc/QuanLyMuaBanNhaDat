<?php
// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Kiểm tra nếu là phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $id_nhanvien = $_POST['id_nhanvien'];
    $hoten_nv = $_POST['hoten_nv'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $district_id = $_POST['district_id'];
    $province_id = $_POST['province_id'];
    $wards_id = $_POST['wards_id'];
    $thon_sonha = $_POST['thon_sonha'];

    // Thực hiện truy vấn để cập nhật thông tin nhân viên
    try {
        $sql = "UPDATE nhanvien 
                SET Hoten_NhanVien = :hoten_nv, NgaySinh = :ngaysinh, gioitinh = :gioitinh, district_id = :district_id, 
                    province_id = :province_id, wards_id = :wards_id, Thon_SoNha = :thon_sonha 
                WHERE Id_NhanVien = :id_nhanvien";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_nhanvien', $id_nhanvien);
        $stmt->bindParam(':hoten_nv', $hoten_nv);
        $stmt->bindParam(':ngaysinh', $ngaysinh);
        $stmt->bindParam(':gioitinh', $gioitinh);
        $stmt->bindParam(':district_id', $district_id);
        $stmt->bindParam(':province_id', $province_id);
        $stmt->bindParam(':wards_id', $wards_id);
        $stmt->bindParam(':thon_sonha', $thon_sonha);
        $stmt->execute();

        // Chuyển hướng về trang danh sách nhân viên sau khi cập nhật
        header("Location: trang_ql_nhanvien.php");
        exit();
    } catch(PDOException $e) {
        // Hiển thị thông báo lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
    }
}

// Lấy thông tin của nhân viên từ cơ sở dữ liệu để điền vào biểu mẫu
$id_nhanvien = isset($_GET['sid']) ? $_GET['sid'] : '';
if (!empty($id_nhanvien)) {
    try {
        $sql = "SELECT * FROM nhanvien WHERE Id_NhanVien = :id_nhanvien";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_nhanvien', $id_nhanvien);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
    }
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
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // Load tỉnh/thành phố
    $.ajax({
        url: 'get_province.php', // Đường dẫn tới script xử lý việc lấy dữ liệu tỉnh/thành phố
        method: 'GET',
        success: function(data) {
            $('#province').html(data); // Thêm dữ liệu vào dropdown
        }
    });

    // Khi chọn một tỉnh/thành phố
    $('#province').change(function(){
        var provinceId = $(this).val(); // Lấy ID của tỉnh/thành phố được chọn
        if(provinceId){
            // Gửi yêu cầu Ajax để lấy dữ liệu quận/huyện
            $.ajax({
                url: 'get_district.php',
                type: 'POST',
                data: {province_id: provinceId},
                success: function(response){
                    $('#district').html(response); // Cập nhật dropdown quận/huyện
                }
            });
        }else{
            $('#district').html('<option value="">Chọn một quận/huyện</option>');
            $('#wards').html('<option value="">Chọn một xã/phường</option>');
        }
    });

    // Khi chọn một quận/huyện
    $('#district').change(function(){
        var districtId = $(this).val(); // Lấy ID của quận/huyện được chọn
        if(districtId){
            // Gửi yêu cầu Ajax để lấy dữ liệu phường/xã
            $.ajax({
                url: 'get_wards.php',
                type: 'POST',
                data: {district_id: districtId},
                success: function(response){
                    $('#wards').html(response); // Cập nhật dropdown phường/xã
                }
            });
        }else{
            $('#wards').html('<option value="">Chọn một xã/phường</option>');
        }
    });
});
</script>

<div class="container">
<div class="card-body">
    
<h2 class="mt-5">Cập Nhật Thông Tin Nhân Viên</h2>
<form method="POST" action="">
    <div class="form-group">
        <label>Tên Nhân Viên</label>
        <input type="text" class="form-control" name="hoten_nv" value="<?php echo isset($row['Hoten_NhanVien']) ? htmlspecialchars($row['Hoten_NhanVien']) : ''; ?>">
    </div>
    <div class="form-group">
        <label>Ngày Sinh</label>
        <input type="date" class="form-control" name="ngaysinh" value="<?php echo isset($row['NgaySinh']) ? htmlspecialchars($row['NgaySinh']) : ''; ?>">
    </div>
    
    <div class="form-group">
        <label>Giới Tính</label>
        <select class="form-control" name="gioitinh">
            <option value="1" <?php if ($row['gioitinh'] == 1) echo "selected"; ?>>Nam</option>
            <option value="0" <?php if ($row['gioitinh'] == 0) echo "selected"; ?>>Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <label for="province">Tỉnh/Thành phố</label>
        <select id="province" name="province_id" class="form-control">
            <!-- Các tùy chọn tỉnh/thành phố sẽ được thêm bằng mã JavaScript -->
        </select>
    </div>
    <div class="form-group">
        <label for="district">Quận/Huyện</label>
        <select id="district" name="district_id" class="form-control">
            <!-- Các tùy chọn quận/huyện sẽ được thêm bằng mã JavaScript -->
        </select>
    </div>
    <div class="form-group">
        <label for="wards">Phường/Xã</label>
        <select id="wards" name="wards_id" class="form-control">
            <!-- Các tùy chọn phường/xã sẽ được thêm bằng mã JavaScript -->
        </select>
    </div>
    <div class="form-group">
        <label>Thôn/Số Nhà</label>
        <input type="text" class="form-control" name="thon_sonha" value="<?php echo htmlspecialchars($row['Thon_SoNha']); ?>">
    </div>
    <input type="hidden" name="id_nhanvien" value="<?php echo htmlspecialchars($row['Id_NhanVien']); ?>">
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
</form>


    </div>
		
	
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