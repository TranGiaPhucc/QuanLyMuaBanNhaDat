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

	
<!-----Main------>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-4 col-6">
				<aside class="">
                    <nav class="list-group">
                        <a class="list-group-item" href="#"> Tài Khoản</a>
                        <a class="list-group-item " href="#"> Thông Tin Cá Nhân </a>
                        <a class="list-group-item " href="#"> Cập Nhập Thông Tin </a>
                        <a class="list-group-item" href="#">Quản Lý Khách Hàng</a>
						<a class="list-group-item" href="#">Quản Lý Nhân Viên</a>
						<a class="list-group-item active" href="#">Quản Lý Mua Thuê</a>
						<a class="list-group-item" href="#">Quản Lý Bán</a>
						<a class="list-group-item" href="#">Thông Kê Doanh Số </a>
                        <a class="list-group-item" href="#">Thông Tin Lịch Hẹn</a>
                        <a class="list-group-item" href="#"> Đăng Xuất </a>
                    </nav>
                </aside> <!-- col.// -->
				</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-12">
			
    
			<article class="card mb-3">
    <div class="card-body">
<table class="table">
    <tr>
        <th>
            Tên Nhà Đất
        </th>
        <th>
           Loại
        </th>
        <th>
            Ảnh Bìa
        </th>
        <th>
           Giá Bán
        </th>
		 <th>
           Trạng Thái
        </th>
      
        <th></th>
		
    </tr>


    <tr>
        <td>
            Vinhomes Grand Park 
        </td>
        <td>
            Thuê
        </td>
        <td>
            <img style="width:50px; height:50px" src="../LTMNM_ThietKe/images/items/chungcumini2.jfif" alt="Alternate Text" />
        </td>
        <td>
           5 triệu/Tháng 
        </td>
        <td> Hoàn Tất</td>
        <td>
			<div class="form-group col-md">
			<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Edit</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Details</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Delete</span> 
			</a>
				
			</div>
           
        </td>
    </tr>
	 
	 <tr>
        <td>
            Vinhomes Grand Park 
        </td>
        <td>
            Thuê
        </td>
        <td>
            <img style="width:50px; height:50px" src="../LTMNM_ThietKe/images/items/chungcumini2.jfif" alt="Alternate Text" />
        </td>
        <td>
           5 triệu/Tháng 
        </td>
        <td> Hoàn Tất</td>
        <td>
			<div class="form-group col-md">
			<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Edit</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Details</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Delete</span> 
			</a>
				
			</div>
           
        </td>
    </tr>

	 <tr>
        <td>
            Vinhomes Grand Park 
        </td>
        <td>
            Thuê
        </td>
        <td>
            <img style="width:50px; height:50px" src="../LTMNM_ThietKe/images/items/chungcumini2.jfif" alt="Alternate Text" />
        </td>
        <td>
           5 triệu/Tháng 
        </td>
        <td style="color: red"> Chờ duyệt</td>
        <td>
			<div class="form-group col-md">
			<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Edit</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class="#"></i> <span class="text">Details</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Delete</span> 
			</a>
				
			</div>
           
        </td>
    </tr>
	 <tr>
        <td>
            Vinhomes Grand Park 
        </td>
        <td>
            Thuê
        </td>
        <td>
            <img style="width:50px; height:50px" src="../LTMNM_ThietKe/images/items/chungcumini2.jfif" alt="Alternate Text" />
        </td>
        <td>
           5 triệu/Tháng 
        </td>
        <td style="color: red">Lên Lịch Hẹn</td>
        <td>
			<div class="form-group col-md">
			<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Edit</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class="TrangQuanLyNhaDat.php"></i> <span class="text">Details</span> 
			</a>
				<a href="#"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Delete</span> 
			</a>
				
			</div>
           
        </td>
    </tr>
</table>

    </div> <!-- card-body .// -->
</article> 
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