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
	<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

	<div class="collapse navbar-collapse" id="main_nav">
   
    <select id="province" name="province" class="form-control" aria-label="Default select example">
        <option value="">Chọn một tỉnh</option>
        <!-- Các tùy chọn tỉnh/thành phố sẽ được thêm bằng mã JavaScript -->
    </select>
   

 
    <select id="district" name="district" class="form-control" aria-label="Default select example">
        <option value="">Chọn một quận/huyện</option>
        <!-- Các tùy chọn quận/huyện sẽ được thêm bằng mã JavaScript -->
    </select>


		 
    <select id="wards" name="wards" class="form-control" aria-label="Default select example">
        <option value="">Chọn một xã/phường</option>
        <!-- Các tùy chọn phường/xã sẽ được thêm bằng mã JavaScript -->
    </select>
		<select class="form-control" aria-label="Default select example">
		<option selected>Mức Giá</option>
		<option value="1">100-200 triệu</option>
		<option value="2">300-400 triệu</option>
		<option value="3">400-500 triệu</option>
		</select>
		<select class="form-control" aria-label="Default select example">
		<option selected>Diện Tích </option>
		<option value="1">50-100 m2</option>
		<option value="2">100-150 m2</option>
		<option value="3">150-200m2</option>
		</select>
		  <button class="btn btn-primary search-btn">Tìm Kiếm</button>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
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


</header> <!-- section-header.// -->

<!---->
	<div class="container">

<!-- ============================ COMPONENT BOOTSTRAP CARD WITH  IMG ================================= -->
	<div class="row">
		<div class="col-md-4">
			<div class="card bg-dark">
			  <img src="images/banners/Mua_Thue01.jfif" class="card-img opacity">
			  <div class="card-img-overlay text-white">
			    <h5 class="card-title">Căn hộ Vinhomes Grand Park nội thất cơ bản</h5>
				  <p class="card-text"><small class="text-body-secondary">Mã Nhà Đất :A091186 <br>Cập Nhập :14/02/2024</small></p>
				  	<div class="price-wrap">
						<span style="color: red;font-weight: bold;">Giá : 1,4 Tỷ </span> 
						<small> /  38.04 triệu/m² </small>
					</div> <!-- price-wrap.// -->
					
			    <p class="card-text">Nguyễn Xiển ,Long Thạnh Mỹ , Quận 9</p>
			    <a href="#" class="btn btn-light">Xem Chi Tiết</a>
			  </div>
			</div>
		</div> <!-- col.// -->
		<div class="col-md-4">
			<div class="card bg-dark">
			  <img src="images/banners/Mua_Thue02.jfif" class="card-img opacity">
			   <div class="card-img-overlay text-white">
			    <h5 class="card-title">Căn hộ Vinhomes Grand Park nội thất cơ bản</h5>
				  <p class="card-text"><small class="text-body-secondary">Mã Nhà Đất :A091186 <br>Cập Nhập :14/02/2024</small></p>
				  	<div class="price-wrap">
						<span style="color: red;font-weight: bold;">Giá : 1,4 Tỷ </span> 
						<small> /  38.04 triệu/m² </small>
					</div> <!-- price-wrap.// -->
					
			    <p class="card-text">Nguyễn Xiển ,Long Thạnh Mỹ , Quận 9</p>
			    <a href="#" class="btn btn-light">Xem Chi Tiết</a>
			  </div>
			</div>
		</div> <!-- col.// -->
		<div class="col-md-4">
			<div class="card bg-dark">
			  <img src="images/banners/Mua_Thue03.jfif" class="card-img opacity">
			   <div class="card-img-overlay text-white">
			    <h5 class="card-title">Căn hộ Vinhomes Grand Park nội thất cơ bản</h5>
				  <p class="card-text"><small class="text-body-secondary">Mã Nhà Đất :A091186 <br>Cập Nhập :14/02/2024</small></p>
				  	<div class="price-wrap">
						<span style="color: red;font-weight: bold;">Giá : 1,4 Tỷ </span> 
						<small> /  38.04 triệu/m² </small>
					</div> <!-- price-wrap.// -->
					
			    <p class="card-text">Nguyễn Xiển ,Long Thạnh Mỹ , Quận 9</p>
			    <a href="#" class="btn btn-light">Xem Chi Tiết</a>
			  </div>
			</div>
		</div> <!-- col.// -->
	</div> <!-- row.// -->
<!-- ============================ COMPONENTBOOTSTRAP CARD IMG  END .// ================================= -->


<br><br>


<div class="row">
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 1 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue1.jfif');">
  <article class="card-body caption">
	<h5 class="card-title">Vinhomes Grand Park</h5>
	<p>Căn hộ Vinhomes Grand Park hướng Tây Bắc, diện tích 59.2m² ...</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết </a>
  </article>
</div>
			

<!-- ======================= COMPONENT BANNER 1  END .// ============================ -->
		</div> <!-- col.// -->
	
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 2 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue2.jfif');">
  <article class="card-body bg-gradient-green text-white">
	<h5 class="card-title">Vinhomes Grand Park</h5>
	<p>Vị trí dự án Vinhomes Grand Park nằm tại đường Nguyễn Xiển và Phước Thiện, phường Long Bình, quận 9, TP Hồ Chí Minh....</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết </a>
  </article>
</div>
<!-- ============================ COMPONENT BANNER 2  END .// =========================== -->
		</div> <!-- col.// -->
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 3 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue3.jfif');">
  <article class="card-img-overlay bg-gradient-red text-white">
	<h5 class="card-title">Urban Hill</h5>
	<p>Urban Hill tọa lạc ngay mặt đại lộ Nguyễn Văn Linh, nhìn qua Khu Thương mại Tài chính Quốc tế và Khu The Crescent....</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết</a>
  </article>
</div>
<!-- ============================ COMPONENT BANNER 3  END .// ================================= -->
		</div> <!-- col.// -->
</div> <!-- row.// -->


<br><br>

		<div class="row">
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 1 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue1.jfif');">
  <article class="card-body caption">
	<h5 class="card-title">Vinhomes Grand Park</h5>
	<p>Căn hộ Vinhomes Grand Park hướng Tây Bắc, diện tích 59.2m² ...</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết </a>
  </article>
</div>
			

<!-- ======================= COMPONENT BANNER 1  END .// ============================ -->
		</div> <!-- col.// -->
	
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 2 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue2.jfif');">
  <article class="card-body caption">
	<h5 class="card-title">Vinhomes Grand Park</h5>
	<p>Vị trí dự án Vinhomes Grand Park nằm tại đường Nguyễn Xiển và Phước Thiện, phường Long Bình, quận 9, TP Hồ Chí Minh....</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết </a>
  </article>
</div>
<!-- ============================ COMPONENT BANNER 2  END .// =========================== -->
		</div> <!-- col.// -->
		<div class="col-md-4">
<!-- ============================ COMPONENT BANNER 3 ================================= -->
<div class="card-banner" style="height:220px; background-image: url('images/banners/Mua_Thue3.jfif');">
  <article class="card-body caption">
	<h5 class="card-title">Urban Hill</h5>
	<p>Urban Hill tọa lạc ngay mặt đại lộ Nguyễn Văn Linh, nhìn qua Khu Thương mại Tài chính Quốc tế và Khu The Crescent....</p>
	<a href="#" class="btn btn-warning"> Xem Chi Tiết</a>
  </article>
</div>
<!-- ============================ COMPONENT BANNER 3  END .// ================================= -->
		</div> <!-- col.// -->
</div> <!-- row.// -->


<br><br>



</div> <!-- container .//  -->
	
	<nav class="mb-4" aria-label="Page navigation sample">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

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