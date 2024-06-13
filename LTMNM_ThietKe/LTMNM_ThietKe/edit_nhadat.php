<?php
include("ketnoi.php");

// Kiểm tra nếu id nhà đất được truyền qua phương thức GET
if (isset($_GET['sid'])) {
    $id_nhadat = $_GET['sid'];

    // Lấy dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT * FROM nhadat WHERE id_nhadat = :id_nhadat";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_nhadat', $id_nhadat);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Lấy danh sách loại nhà đất
    $sql_loai_nhadat = "SELECT * FROM loai_nhadat";
    $stmt_loai_nhadat = $conn->query($sql_loai_nhadat);
    $loai_nhadat = $stmt_loai_nhadat->fetchAll(PDO::FETCH_ASSOC);
       // Lấy danh sách tỉnh/thành phố từ cơ sở dữ liệu
       $sql_province = "SELECT * FROM province";
       $stmt_province = $conn->query($sql_province);
       $provinces = $stmt_province->fetchAll(PDO::FETCH_ASSOC);

    // Kiểm tra xem các biến $_POST đã được gửi hay chưa
    if (isset($_POST['id_nhadat'], $_POST['ten_nhadat'], $_POST['mota'], $_POST['id_loai'], $_POST['province'], $_POST['district'], $_POST['wards'], $_POST['Thon_SoNha'], $_POST['gia'], $_POST['dientich'], $_POST['tinhtrang'])) {
        // Lấy dữ liệu từ form
        $id_nhadat = $_POST['id_nhadat'];
        $ten_nhadat = htmlspecialchars($_POST['ten_nhadat']);
        $mota = htmlspecialchars($_POST['mota']);
        $id_loai = $_POST['id_loai'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $wards = $_POST['wards'];
        $Thon_SoNha = htmlspecialchars($_POST['Thon_SoNha']);
        $gia = $_POST['gia'];
        $dientich = $_POST['dientich'];
        $tinhtrang = $_POST['tinhtrang'];

        try {
            // Cập nhật dữ liệu vào cơ sở dữ liệu
            $updatesql = "UPDATE nhadat SET 
                ten_nhadat=:ten_nhadat, 
                mota=:mota,
                id_loai=:id_loai, 
                ID_Tinh=:province, 
                ID_Huyen_Quan=:district,
                ID_Xa_Duong=:wards,
                Thon_SoNha=:Thon_SoNha,
                gia=:gia, 
                dientich=:dientich,
                tinhtrang=:tinhtrang
                WHERE id_nhadat=:id_nhadat";
            $stmt = $conn->prepare($updatesql);
            $stmt->bindParam(':ten_nhadat', $ten_nhadat);
            $stmt->bindParam(':mota', $mota);
            $stmt->bindParam(':id_loai', $id_loai);
            $stmt->bindParam(':province', $province);
            $stmt->bindParam(':district', $district);
            $stmt->bindParam(':wards', $wards);
            $stmt->bindParam(':Thon_SoNha', $Thon_SoNha);
            $stmt->bindParam(':gia', $gia);
            $stmt->bindParam(':dientich', $dientich);
            $stmt->bindParam(':tinhtrang', $tinhtrang);
            $stmt->bindParam(':id_nhadat', $id_nhadat);
            $stmt->execute();
            echo "Cập nhật dữ liệu thành công";
            header("Location: ql_nhadat.php");
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
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

<form action="" method="POST">
    <div class="form-group">
        <label for="id_nhadat">ID Nhà Đất</label>
        <input type="text" name="id_nhadat" id="id_nhadat" class="form-control" value="<?php echo htmlspecialchars($row['id_nhadat']); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="ten_nhadat">Tên Nhà Đất</label>
        <input type="text" name="ten_nhadat" id="ten_nhadat" class="form-control" value="<?php echo htmlspecialchars($row['ten_nhadat']); ?>">
    </div>

    <div class="form-group">
        <label for="mota">Mô Tả</label>
        <textarea name="mota" id="mota" class="form-control"><?php echo htmlspecialchars($row['mota']); ?></textarea>
    </div>

    <div class="form-group">
        <label for="id_loai">Loại Nhà Đất</label>
        <select name="id_loai" id="id_loai" class="form-control">
            <?php foreach($loai_nhadat as $loai): ?>
                <option value="<?php echo $loai['id_loai']; ?>" <?php if($row['id_loai'] == $loai['id_loai']) echo 'selected'; ?>><?php echo htmlspecialchars($loai['tenloai']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="province">Tỉnh/Thành phố</label>
        <select id="province" name="province" class="form-control">
            <!-- Các tùy chọn tỉnh/thành phố sẽ được thêm bằng mã JavaScript -->
            <?php foreach ($provinces as $province): ?>
            <option value="<?php echo $province['province_id']; ?>" <?php if ($province['province_id'] == $row['ID_Tinh']) echo 'selected'; ?>><?php echo $province['name']; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="district">Quận/Huyện</label>
        <select id="district" name="district" class="form-control">
       
        </select>
    </div>
    <div class="form-group">
        <label for="wards">Phường/Xã</label>
        <select id="wards" name="wards" class="form-control">
            <!-- Các tùy chọn phường/xã sẽ được thêm bằng mã JavaScript -->
        </select>
    </div>
    <div class="form-group">
        <label>Thôn/Số Nhà</label>
        <input type="text" class="form-control" name="Thon_SoNha" value="<?php echo htmlspecialchars($row['Thon_SoNha']); ?>">
    </div>

    <div class="form-group">
        <label for="gia">Giá</label>
        <input type="text" name="gia" id="gia" class="form-control" value="<?php echo htmlspecialchars($row['gia']); ?>">
    </div>

    <div class="form-group">
        <label for="dientich">Diện Tích</label>
        <input type="text" name="dientich" id="dientich" class="form-control" value="<?php echo htmlspecialchars($row['dientich']); ?>">
    </div>

    <div class="form-group">
        <label for="tinhtrang">Tình Trạng</label>
        <select name="tinhtrang" id="tinhtrang" class="form-control">
            <option value="Đang Cho Thuê" <?php if($row['tinhtrang'] == 'Đang Cho Thuê') echo 'selected'; ?>>Đang Cho Thuê</option>
            <option value="Đang Bán" <?php if($row['tinhtrang'] == 'Đang Bán') echo 'selected'; ?>>Đang Bán</option>
            <option value="Đã Bán" <?php if($row['tinhtrang'] == 'Đã Bán') echo 'selected'; ?>>Đã Bán</option>
            <option value="Đang Chờ Duyệt" <?php if($row['tinhtrang'] == 'Đang Chờ Duyệt') echo 'selected'; ?>>Đang Chờ Duyệt</option>
            <option value="Còn Trống" <?php if($row['tinhtrang'] == 'Còn Trống') echo 'selected'; ?>>Còn Trống</option>
        </select>
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