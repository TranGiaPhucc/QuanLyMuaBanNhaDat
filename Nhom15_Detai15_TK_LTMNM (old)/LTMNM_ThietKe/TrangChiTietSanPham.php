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

	
	
	
	<section class="py-3 bg-light">
  <div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="TrangChu.php">TrangChu</a></li>
       
    </ol>
  </div>
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg-white padding-y">
<div class="container">

<!-- ============================ ITEM DETAIL ======================== -->
	<div class="row">
		<aside class="col-md-12">
		<?php
include 'ketnoi.php'; // Kết nối đến cơ sở dữ liệu

if(isset($_GET['sid'])) {
    $id_nhadat = $_GET['sid'];

    // Truy vấn dữ liệu từ bảng nhadat dựa trên ID đã nhận được
    $stmt = $conn->prepare("SELECT * FROM nhadat WHERE id_nhadat = ?");
    $stmt->bindParam(1, $id_nhadat);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem sản phẩm có tồn tại không
    if($row) {
?>
   <div class="row">
    <div class="col-md-6">
        <div class="card">
            <article class="gallery-wrap"> 
			<div class="img-big-wrap">
    <div> <a href="#"><img id="main-image" src="images/items/<?php echo $row['hinhanh']; ?>"></a></div>
</div>

                <div class="thumbs-wrap">
				<a href="#" class="item-thumb"><img src="images/items/<?php echo $row['anhphu1']; ?>"></a>
				<a href="#" class="item-thumb"> <img src="images/items/<?php echo $row['anhphu2']; ?>"></a>
				<a href="#" class="item-thumb"><img src="images/items/<?php echo $row['anhphu3']; ?>"></a>
				<a href="#" class="item-thumb"> <img src="images/items/<?php echo $row['anhphu4']; ?>"></a>
                </div> <!-- thumbs-wrap.// -->
            </article> <!-- gallery-wrap .end// -->
        </div> <!-- card.// -->
    </div> <!-- col-md-6 .// -->
	<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.item-thumb').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                document.getElementById('main-image').src = event.target.src;
            });
        });
    });
</script>



    <div class="col-md-6">
        <main>
            <article class="product-info-aside">
                <!-- Hiển thị thông tin chi tiết sản phẩm từ $row -->
                <h2 class="title mt-3"><?php echo $row['ten_nhadat']; ?></h2>
                <div class="rating-wrap my-3">
                    <!-- Thêm đánh giá nếu cần -->
                </div> <!-- rating-wrap.// -->
                <div class="mb-3"> 
                    <var class="price h4"><?php echo number_format($row['gia'], 0, ',', '.') . ' VND'; ?></var> 
                    <span class="text-muted">Diện Tích : <?php echo $row['dientich']; ?> m2</span> 
                </div> <!-- mb-3.// -->
                <p><?php echo $row['mota']; ?></p>
                <dl class="row">
                    <dt class="col-sm-3">Diện Tích </dt>
                    <dd class="col-sm-9"><a href="#"><?php echo $row['dientich']; ?> m2</a></dd>
                    <!-- Thêm các thông tin khác nếu cần -->
                    <dt class="col-sm-3">Kết cấu</dt>
                    <dd class="col-sm-9">1 phòng ngủ và 1 phòng tắm</dd>

                    <dt class="col-sm-3">Loại chủ quyền</dt>
                    <dd class="col-sm-9">Sổ hồng</dd>

                    <dt class="col-sm-3">Tình Hình Nội Thất</dt>
                    <dd class="col-sm-9">Nội thất cơ bản</dd>

                    <dt class="col-sm-3">Dự Án</dt>
                    <dd class="col-sm-9">Vinhomes Grand Park</dd>
                </dl> <!-- row.// -->
                <div class="form-row mt-4">
                    <div class="form-group col-md flex-grow-0">
                        <!-- Thêm nút nếu cần -->
                    </div> <!-- form-group.// -->
                    <div class="form-group col-md">
                        <!-- Thêm nút để đặt lịch hẹn và liên hệ -->
                        <a href="TrangDatLichHen.php?id=<?php echo $row['id_nhadat']; ?>" class="btn btn-primary"> 
                            <i class="fas fa-shopping-cart"></i> <span class="text">Đặt Lịch</span> 
                        </a>
                        <a href="#" class="btn btn-light">
                            <i class="fas fa-envelope"></i> <span class="text">Liên Hệ</span> 
                        </a>
                    </div> <!-- form-group.// -->
                </div> <!-- form-row.// -->
            </article> <!-- product-info-aside .// -->
        </main> <!-- col.// -->
    </div> <!-- col-md-6 .// -->
</div> <!-- row .// -->

<?php
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Không có ID sản phẩm được cung cấp.";
}
?>


<!-- ================ ITEM DETAIL END .// ================= -->


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y bg">
<div class="container">

<div class="row">
	<div class="col-md-8">
		<h5 class="title-description">Ưu điểm ngôi nhà</h5>
		<p>
			Sở hữu căn hộ Vinhomes Grand Park bạn còn có cơ hội sở hữu tấm vé quyền năng trải nghiệm Thành phố Công viên với đa dạng các tiện ích đẳng cấp: công viên trung tâm rộng 36ha, công viên Gym với hơn 800 máy tập, công viên Ánh sáng nghệ thuật, khu chèo thuyền Kayak, hơn 100 điểm nướng BBQ, trường học VinSchool, khu văn phòng, trung tâm thương mại,…
		</p>
		<ul class="list-check">
		<li>CỘNG ĐỒNG DÂN CƯ</li>
		<li>Dân cư văn minh, hòa đồng và hiện đại.</li>
		<li>VỀ GIÁO DỤC</li>
		<li>Mầm non Tạ Uyên, Mầm non Long Sơn, TH Tạ Uyên, VinSchool, ĐH FulBright, ĐH Quốc gia TP.HCM,...</li>
		<li>Tiện ích nổi bật: Trung tâm thương mại, bệnh viện Vinmec, trường học quốc tế Vinschool, siêu thị, hồ bơi, khu vui chơi…</li>
		</ul>

		<h5 class="title-description">Thông Tin Cơ Bản</h5>
		<table class="table table-bordered">
			<tr> <th colspan="2">Tiện Tích Nội Khu</th> </tr>
			<tr> <td>Chỗ Đậu Xe</td><td>Rộng rãi</td> </tr>
			<tr> <td>Bảo Vệ</td><td>24/7</td> </tr>
			<tr> <td>Sinh Hoạt </td> <td> <i class="fa fa-check text-success"></i> Phòng Gym,Hồ Bơi,Công Viên... </td></tr>

			<tr> <th colspan="2">So sánh giá với dự án lân cận</th> </tr>
			<tr> <td>Glory Heights</td><td>50-70 triệu/m2</td> </tr>
			<tr> <td>Masteri Centre Point</td><td>49.5 Triệu/m2</td> </tr>
			<tr> <td>Vinhomes Grand Park	</td><td>Đang Xem</td> </tr>

			<tr> <th colspan="2">Giới Thiệu</th> </tr>
			<tr> <td>Khởi công</td><td>Quý III năm 2018.</td> </tr>
			<tr> <td>Số lượng toà:</td><td>21 Toà</td> </tr>

			
			<tr> <td>Tổng diện tích dự án</td><td>271 ha</td> </tr>
			<tr> <td>Mật độ xây dựng</td><td>khoảng 20 đến 25%.</td> </tr>

		</table>
	</div> <!-- col.// -->
	
	<aside class="col-md-4">

		<div class="box">
		
		<h5 class="title-description">MÔ TẢ VỊ TRÍ</h5>
			<p>
				Vinhomes Grand Park tọa lạc tại đường Nguyễn Xiển, phường Long Bình, Quận 9. Trong vòng 10 phút, quý cư dân có thể di chuyển đến Khu Công nghệ cao TP.HCM, KDL Suối Tiên, ĐH Quốc gia TP.HCM,... Thông qua cao tốc TP.HCM - Long Thành - Dầu Giây, Xa lộ Hà Nội, cư dân thuận tiện di chuyển đến Quận 2, Quận Thủ Đức hay trung tâm thành phố.
			</p>

    <h5 class="title-description">Mô Hình Tương Tự</h5>
      

	<?php
for ($i = 0; $i < 3; $i++) {
    $imageSrc = "images/items/chungcumini5.jfif";
?>
    <article class="media mb-3">
        <a href="#"><img class="img-sm mr-3" src="<?php echo $imageSrc; ?>"></a>
        <div class="media-body">
            <h6 class="mt-0"><a href="#">Vinhomes Grand Park</a></h6>
            <p class="mb-2"> Căn hộ Vinhomes Grand Park tầng 4 đầy đủ nội thất, cửa hướng Đông Bắc.</p>
        </div>
    </article>
<?php
}
?>


		
	</div> <!-- box.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="padding-y-lg bg-light border-top">
<div class="container">


<p class="pb-2 text-center">Cung cấp các xu hướng sản phẩm mới nhất và tin tức trong ngành ngay tới hộp thư đến của bạn</p>

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
<small class="form-text">Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với bên thứ ba... </small>
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