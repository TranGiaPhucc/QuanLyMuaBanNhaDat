
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường có được gửi hay không
    if (empty($_POST["role"]) || empty($_POST["fullName"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["address"]) || empty($_POST["appointmentDate"]) || empty($_POST["appointmentTime"]) || empty($_POST["message"])) {
        echo '<div class="alert alert-danger" role="alert">Vui lòng điền đầy đủ thông tin trong form!</div>';
    } else {
        // Xử lý dữ liệu khi form được gửi
        $role = $_POST["role"];
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $appointmentDate = $_POST["appointmentDate"];
        $appointmentTime = $_POST["appointmentTime"];
        $message = $_POST["message"];


        // Hiển thị thông báo thành công
        echo '<div class="alert alert-success" role="alert">Thông tin đã được gửi thành công!</div>';
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

	</style>
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


<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
      	<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bars text-muted mr-2"></i>Loại Hình </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Phòng Trọ</a>
            <a class="dropdown-item" href="#">Chung Cư Mini </a>
            <a class="dropdown-item" href="#">Chung Cư </a>
            <a class="dropdown-item" href="#">Nhà Nguyên Căn</a>
            <a class="dropdown-item" href="#">Văn Phòng</a>
            <a class="dropdown-item" href="#">Đất</a>
            <a class="dropdown-item" href="#">Cửa Hàng</a>
          </div>
        </li>
      	<li class="nav-item">
           <a class="nav-link" href="TrangMuaThue.php">Mua </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TrangBan.php">Bán</a>
        </li>
		   <li class="nav-item">
          <a class="nav-link" href="TrangMuaThue.php">Thuê</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TrangDuAn.php">Dự Án </a>
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

	</header>
	
	
	
<!-----Main------>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-5 col-lg-3 col-md-4 col-6">
				<div class="card bg-dark">
					<article class="card card-post">
					  <img src="images/posts/DuAn4.jfif" class="card-img-top">
					  <div class="card-body">
						  <p style="color: red ;font-weight: bold;"> Căn hộ tầng cao Vinhomes Grand Park 1 phòng ngủ, view nội khu.</p>
						<dl class="row">
							
				  <dt class="col-sm-3">Diện Tích </dt>
				  <dd class="col-sm-9"><a href="#">4,7 m2</a></dd>

				  <dt class="col-sm-3">Kết cấu</dt>
				  <dd class="col-sm-9">1 phòng ngủ và 1 phòng tắm</dd>

				  <dt class="col-sm-3">Loại chủ quyền</dt>
				  <dd class="col-sm-9">Sổ hồng</dd>

				  <dt class="col-sm-3">Tình Hình Nội Thất</dt>
				  <dd class="col-sm-9">Nội thất cơ bản</dd>

				  <dt class="col-sm-3">Dự Án</dt>
				  <dd class="col-sm-9">Vinhomes Grand Park</dd>
				</dl>

					  </div>

		</article> <!-- card.// -->
					</div>
				<div class="card bg-dark">
			  <img src="images/banners/Mua_Thue03.jfif" class="card-img opacity">
			   <div class="card-img-overlay text-white">
			    <h5 class="card-title">Cam kết với khách hàng</h5>
				  <p class="card-text"><small class="text-body-secondary">* Đặt khách hàng làm trọng tâm trong mọi quyết định<br>* Những điều đã nói là những điều được làm <br> * Đảm bảo thực thi (Miễn phí các dịch vụ cao cấp nếu không bán được nhà)</small></p>
				    <h5 class="card-title">Miễn phí các dịch vụ bổ sung</h5>
				   <p class="card-text"><small class="text-body-secondary">* Dịch vụ chụp ảnh chuyên nghiệpHình ảnh chất lượng cao, chuyên nghiệp Tiết kiệm đến 1.000.000 đồng so với thị trường <br>* Dịch vụ thực tế ảo (3D)Trải nghiệm xem nhà như thật, chốt giao dịch nhanhTiết kiệm đến 5.000.000 đồng so với thị trường</small></p>
				  	
			  </div>
			</div>
				</div>
				<div class="col-xl-7 col-lg-9 col-md-12 col-12">
    <div class="card mb-4">
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group col-md-12">
                    <label>Bạn là ?</label>
                    <select name="role" class="form-control">
                        <option>Chủ Nhà</option>
                        <option>Mua Giới</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label>Họ Và Tên</label>
                        <input type="text" name="fullName" class="form-control" value="">
                    </div>
                    <div class="col form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" name="phone" class="form-control" value="">
                    </div>
                    <div class="col form-group">
                        <label>Địa Chỉ Lịch Hẹn</label>
                        <input type="text" name="address" class="form-control" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col form-group">
                        <label>Ngày Hẹn</label>
                        <input type="text" name="appointmentDate" class="form-control datepicker" data-provide="datepicker" data-toggle="datepicker">
                    </div>
                    <div class="col form-group">
                        <label>Giờ Hẹn</label>
                        <input type="text" name="appointmentTime" class="form-control timepicker" data-provide="timepicker" data-toggle="timepicker">
                    </div>
                </div>
                <div class="form-group">
                    <label>Lời Nhắn</label>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Gửi Thông Tin</button>
            </form>
        </div> <!-- card-body.// -->
        <br>
    </div>
</div>
	
			
			</div>
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



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/locales/bootstrap-datepicker.vi.min.js"></script>
<script>
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'vi'
  });
  $('.timepicker').timepicker({
    format: 'HH:mm'
  });
</script>
</html>