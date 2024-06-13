<?php
// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Kiểm tra xem có ID nhân viên được truyền qua URL không
if (isset($_GET['sid'])) {
    $id_nhanvien = $_GET['sid'];

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Truy vấn để lấy chi tiết nhân viên và tên địa chỉ từ các bảng liên quan
        $stmt = $conn->prepare("
            SELECT 
                nv.Id_NhanVien, nv.Hoten_NhanVien, nv.NgaySinh, nv.gioitinh, nv.district_id, nv.province_id, nv.wards_id, nv.Thon_SoNha, nv.TinhTrang,
                d.name AS district_name, p.name AS province_name, w.name AS wards_name
            FROM 
                nhanvien nv
            JOIN 
                district d ON nv.district_id = d.district_id
            JOIN 
                province p ON nv.province_id = p.province_id
            JOIN 
                wards w ON nv.wards_id = w.wards_id
            WHERE 
                nv.Id_NhanVien = :id_nhanvien
        ");
        $stmt->bindParam(':id_nhanvien', $id_nhanvien);
        $stmt->execute();

        // Kiểm tra xem nhân viên có tồn tại không
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $error = "Nhân viên không tồn tại.";
        }
    } catch (PDOException $e) {
        $error = "Connection failed: " . $e->getMessage();
    }
} else {
    $error = "ID nhân viên không hợp lệ.";
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
    <h2 class="mt-4">Chi tiết nhân viên</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php else: ?>
        <table class="table table-bordered mt-4">
            <tr>
                <th>ID Nhân Viên</th>
                <td><?php echo htmlspecialchars($row['Id_NhanVien']); ?></td>
            </tr>
            <tr>
                <th>Tên Nhân Viên</th>
                <td><?php echo htmlspecialchars($row['Hoten_NhanVien']); ?></td>
            </tr>
            <tr>
                <th>Ngày Sinh</th>
                <td><?php echo htmlspecialchars($row['NgaySinh']); ?></td>
            </tr>
            <tr>
                <th>Giới Tính</th>
                <td><?php echo ($row['gioitinh'] == 1) ? 'Nam' : 'Nữ'; ?></td>
            </tr>
            <tr>
                <th>ID Quận/Huyện</th>
                <td><?php echo htmlspecialchars($row['district_name']); ?></td>
            </tr>
            <tr>
                <th>ID Tỉnh/Thành phố</th>
                <td><?php echo htmlspecialchars($row['province_name']); ?></td>
            </tr>
            <tr>
                <th>ID Phường/Xã</th>
                <td><?php echo htmlspecialchars($row['wards_name']); ?></td>
            </tr>
            <tr>
                <th>Thôn/Số Nhà</th>
                <td><?php echo htmlspecialchars($row['Thon_SoNha']); ?></td>
            </tr>
            <tr>
                <th>Tình Trạng</th>
                <td><?php echo htmlspecialchars($row['TinhTrang']); ?></td>
            </tr>
        </table>
    <?php endif; ?>
    <a href="trang_ql_nhanvien.php" class="btn btn-danger">Quay Về</a>
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