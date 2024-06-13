<?php
include("ketnoi.php");

// Lấy dữ liệu id cần xóa
$id_nhadat = $_GET['sid'];

// Câu lệnh để lấy dữ liệu cũ
$sql = "SELECT nhadat.id_nhadat, nhadat.tinhtrang,nhadat.hinhanh,nhadat.ten_nhadat, nhadat.mota, nhadat.gia,nhadat.dientich, loai_nhadat.tenloai, diachinhadat.xa_phuong, diachinhadat.huyen_quan, diachinhadat.tinhthanh 
FROM nhadat
INNER JOIN loai_nhadat ON nhadat.id_loai = loai_nhadat.id_loai
INNER JOIN diachinhadat ON nhadat.id_diachi = diachinhadat.id_diachi
where nhadat.id_nhadat='$id_nhadat'";

$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
		<h5 >Thông Tin Chi Tiết Nhà Đất</h5>

        <form action="">
        <div class="form-group">
            <label for="">ID Nhà Đất : </label>
            <label   ><?php echo isset($row['id_nhadat']) ? $row['id_nhadat'] : ''; ?></label>
        
        </div>

            <div class="form-group">
                <label for="">Tên Nhà Đất:</label>
                <label  ><?php echo isset($row['ten_nhadat']) ? $row['ten_nhadat'] : '';?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="">Mô Tả :</label>
                <label ><?php echo isset($row['mota']) ? $row['mota'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="hoten">Tên Loại :</label>
                <label ><?php echo isset($row['tenloai']) ? $row['tenloai'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="" >Địa Chỉ:</label>
                <label ><?php echo isset($row['xa_phuong']) ? $row['xa_phuong'] : ''; ?> <?php echo isset($row['huyen_quan']) ? $row['huyen_quan'] : ''; ?>
                <?php echo isset($row['tinhthanh']) ? $row['tinhthanh'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label>Giá : </label>
                <label ><?php echo isset($row['gia']) ? $row['gia'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label >Diện Tích :</label>
                <label ><?php echo isset($row['dientich']) ? $row['dientich'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label >Hình Ảnh :</label>
                <label ><img src="images/banners/<?php echo $row["hinhanh"]; ?>" width="300" height="200" /></label>
                <span class="form-error"></span>
            </div>
            <div class="form-group">
                <label >Tính Trạng :</label>
                <label ><?php echo isset($row['tinhtrang']) ? $row['tinhtrang'] : ''; ?></label>
                <span class="form-error"></span>
            </div>
            
            <a href="ql_nhadat.php"  class="btn  btn-danger"> 
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