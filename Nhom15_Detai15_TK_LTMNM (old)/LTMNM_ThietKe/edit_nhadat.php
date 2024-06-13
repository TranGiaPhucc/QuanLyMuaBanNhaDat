<?php
include("ketnoi.php");

// Lấy dữ liệu id cần chỉnh sửa
$id_nhadat = $_GET['sid'];

// Câu lệnh để lấy dữ liệu cũ
$sql = "SELECT * FROM nhadat WHERE id_nhadat = '$id_nhadat'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra xem các biến $_POST đã được gửi hay chưa
if (
    isset($_POST['id_nhadat']) && isset($_POST['maloaihinh']) && isset($_POST['ten_nhadat']) && isset($_POST['mota'])
    && isset($_POST['id_loai']) && isset($_POST['id_diachi']) && isset($_POST['gia']) && isset($_POST['dientich'])
    && isset($_FILES['hinhanh']) && isset($_FILES['anhphu1']) && isset($_FILES['anhphu2']) && isset($_FILES['anhphu3']) && isset($_FILES['anhphu4']) && isset($_POST['tinhtrang'])
) {

    // Lấy dữ liệu từ form
    $idnhadat = $_POST['id_nhadat'];
    $maloaihinh = $_POST['maloaihinh'];
    $ten_nhadat = $_POST['ten_nhadat'];
    $mota = $_POST['mota'];
    $id_loai = $_POST['id_loai'];
    $id_diachi = $_POST['id_diachi'];
    $gia = $_POST['gia'];
    $dientich = $_POST['dientich'];
    $tinhtrang = $_POST['tinhtrang'];

    // Xử lý ảnh chính
    $hinhanh = ''; // Biến để lưu tên file ảnh chính
    if ($_FILES['hinhanh']['size'] > 0) {
        // Đường dẫn lưu trữ file ảnh chính
        $hinhanh_dir = 'uploads/';
        $hinhanh_path = $hinhanh_dir . basename($_FILES['hinhanh']['name']);
        // Di chuyển file ảnh chính vào thư mục lưu trữ
        if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $hinhanh_path)) {
            $hinhanh = basename($_FILES['hinhanh']['name']);
        } else {
            echo "Lỗi khi tải lên ảnh chính.";
            exit();
        }
    }

    // Xử lý 4 ảnh phụ
    $anhphu = array(); // Mảng để lưu tên các file ảnh phụ
    $anhphu_dir = 'uploads/';
    for ($i = 1; $i <= 4; $i++) {
        $anhphu_name = 'anhphu' . $i;
        if ($_FILES[$anhphu_name]['size'] > 0) {
            $anhphu_path = $anhphu_dir . basename($_FILES[$anhphu_name]['name']);
            if (move_uploaded_file($_FILES[$anhphu_name]['tmp_name'], $anhphu_path)) {
                $anhphu[$i] = basename($_FILES[$anhphu_name]['name']);
            } else {
                echo "Lỗi khi tải lên ảnh phụ $i.";
                exit();
            }
        }
    }

    try {
        // Cập nhật dữ liệu vào cơ sở dữ liệu
        $updatesql = "UPDATE nhadat SET 
            maloaihinh='$maloaihinh', 
            ten_nhadat='$ten_nhadat', 
            mota='$mota',
            id_loai='$id_loai', 
            id_diachi='$id_diachi', 
            gia='$gia', 
            dientich='$dientich',
            hinhanh='$hinhanh', 
            anhphu1='$anhphu[1]', 
            anhphu2='$anhphu[2]', 
            anhphu3='$anhphu[3]', 
            anhphu4='$anhphu[4]', 
            tinhtrang='$tinhtrang' 
            WHERE id_nhadat='$idnhadat'";
        $stmt = $conn->query($updatesql);
        echo "Cập nhật dữ liệu thành công";
        header("Location: ql_nhadat.php");
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "Dữ liệu không hợp lệ!";
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
    <h5>Edit Nhà Đất</h5>

    <form action="edit_nhadat.php" method="POST" onsubmit="return Validate()">
        <div class="form-group">
            <label for="id_nhadat">ID Nhà Đất</label>
            <input type="text" name="id_nhadat" id="id_nhadat" class="form-control" value="<?php echo isset($row['id_nhadat']) ? $row['id_nhadat'] : ''; ?>" readonly>
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="maloaihinh">Mã Loại Hình</label>
            <input type="text" name="maloaihinh" id="maloaihinh" class="form-control" value="<?php echo isset($row['maloaihinh']) ? $row['maloaihinh'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="ten_nhadat">Tên Nhà Đất</label>
            <input type="text" name="ten_nhadat" id="ten_nhadat" class="form-control" value="<?php echo isset($row['ten_nhadat']) ? $row['ten_nhadat'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="mota">Mô Tả</label>
            <textarea name="mota" id="mota" class="form-control"><?php echo isset($row['mota']) ? $row['mota'] : ''; ?></textarea>
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="id_loai">ID Loại</label>
            <input type="text" name="id_loai" id="id_loai" class="form-control" value="<?php echo isset($row['id_loai']) ? $row['id_loai'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="id_diachi">ID Địa Chỉ</label>
            <input type="text" name="id_diachi" id="id_diachi" class="form-control" value="<?php echo isset($row['id_diachi']) ? $row['id_diachi'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" id="gia" class="form-control" value="<?php echo isset($row['gia']) ? $row['gia'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="dientich">Diện Tích</label>
            <input type="text" name="dientich" id="dientich" class="form-control" value="<?php echo isset($row['dientich']) ? $row['dientich'] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="hinhanh">Hình Ảnh</label>
            <input type="file" name="hinhanh" id="hinhanh" class="form-control" value="<?php echo isset($row["hinhanh"]) ? $row["hinhanh"] : ''; ?>">
            <span class="form-error"></span>
        </div>
		<div class="form-group">
            <label for="anhphu1">Ảnh Phụ 1</label>
            <input type="file" name="anhphu1" id="anhphu1" class="form-control" value="<?php echo isset($row["anhphu1"]) ? $row["anhphu1"] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="anhphu2">Ảnh Phụ 2</label>
            <input type="file" name="anhphu2" id="anhphu2" class="form-control" value="<?php echo isset($row["anhphu2"]) ? $row["anhphu2"] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="anhphu3">Ảnh Phụ 3</label>
            <input type="file" name="anhphu3" id="anhphu3" class="form-control" value="<?php echo isset($row["anhphu3"]) ? $row["anhphu3"] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="anhphu4">Ảnh Phụ 4</label>
            <input type="file" name="anhphu4" id="anhphu4" class="form-control" value="<?php echo isset($row["anhphu4"]) ? $row["anhphu4"] : ''; ?>">
            <span class="form-error"></span>
        </div>

        <div class="form-group">
            <label for="tinhtrang">Tình Trạng</label>
            <select name="tinhtrang" id="tinhtrang" class="form-control">
                <option value="">Chọn tình trạng</option>
                <option value="Đang Cho Thuê" <?php if(isset($row['tinhtrang']) && $row['tinhtrang'] == 'DangChoThue') echo 'selected'; ?>>Đang Cho Thuê</option>
                <option value="Đang Bán" <?php if(isset($row['tinhtrang']) && $row['tinhtrang'] == 'DangBan') echo 'selected'; ?>>Đang bán</option>
                <option value="Đã Bán" <?php if(isset($row['tinhtrang']) && $row['tinhtrang'] == 'DaBan') echo 'selected'; ?>>Đã bán</option>
                <option value="Đang Chờ Duyệt" <?php if(isset($row['tinhtrang']) && $row['tinhtrang'] == 'DangChoDuyet') echo 'selected'; ?>>Đang chờ duyệt</option>
            </select>
            <span class="form-error"></span>
        </div>

        <button type="submit" class="btn btn-success">Cập Nhật Nhà Đất</button>
        <a href="ql_nhadat.php" class="btn btn-danger">Quay Về</a>
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