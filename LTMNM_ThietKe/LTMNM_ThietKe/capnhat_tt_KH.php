<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Trang_DangNhap.php");
    exit;
}

include 'ketnoi.php';

$username = $_SESSION['username'];

$sql = "SELECT * FROM khachhang WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
$customer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$customer) {
    echo "Không tìm thấy thông tin khách hàng.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten_kh = $_POST['hoten_kh'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $sdt_kh = $_POST['sdt_kh'];
    $district_id = $_POST['district'];
    $province_id = $_POST['province'];
    $wards_id = $_POST['wards'];
    $Thon_SoNha = $_POST['Thon_SoNha'];

    $sql_update = "UPDATE khachhang SET hoten_kh = :hoten_kh, ngaysinh = :ngaysinh, gioitinh = :gioitinh, sdt_kh = :sdt_kh, district_id = :district_id, province_id = :province_id, wards_id = :wards_id, Thon_SoNha = :Thon_SoNha WHERE username = :username";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':hoten_kh', $hoten_kh);
    $stmt_update->bindParam(':ngaysinh', $ngaysinh);
    $stmt_update->bindParam(':gioitinh', $gioitinh);
    $stmt_update->bindParam(':sdt_kh', $sdt_kh);
    $stmt_update->bindParam(':district_id', $district_id);
    $stmt_update->bindParam(':province_id', $province_id);
    $stmt_update->bindParam(':wards_id', $wards_id);
    $stmt_update->bindParam(':Thon_SoNha', $Thon_SoNha);
    $stmt_update->bindParam(':username', $username);

    if ($stmt_update->execute()) {
        header("Location: TrangTTCN_KH.php");
        exit;
    } else {
        echo "Lỗi: " . $stmt_update->errorInfo()[2];
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


    <div class="container">
    <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 col-6">
        <aside class="">
            <nav class="list-group">
            <nav class="list-group">
                <a class="list-group-item " href="TrangTTCN_KH.php"> Tài Khoản</a>
                <a class="list-group-item " href="TrangTTCN_KH.php"> Thông Tin Cá Nhân </a>
                <a class="list-group-item active" href="capnhat_tt_KH.php"> Cập Nhập Thông Tin </a>
                <a class="list-group-item" href="TrangKyGiua_KH.php">Danh Mục Ký Gửi</a>
                <a class="list-group-item" href="TrangThongTinLichHen_KH.php">Danh Mục Lịch Hẹn</a>
				<a class="list-group-item " href="TrangGiaoDich_KH.php">Danh Mục Giao Dịch</a>
                <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
            </nav>
            </nav>
        </aside> 
        </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-12">
    <article class="card mb-3">
        <div class="card-body">
        <h2 class="mt-5">Cập Nhật Thông Tin Khách Hàng</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($customer['username']); ?>" disabled>
            </div>
            <div class="form-group">
                <label>Tên Khách Hàng</label>
                <input type="text" class="form-control" name="hoten_kh" value="<?php echo htmlspecialchars($customer['hoten_kh']); ?>">
            </div>
            <div class="form-group">
                <label>Ngày Sinh</label>
                <input type="date" class="form-control" name="ngaysinh" value="<?php echo htmlspecialchars($customer['ngaysinh']); ?>">
            </div>
            <div class="form-group">
                <label>Giới Tính</label>
                <select class="form-control" name="gioitinh">
                    <option value="1" <?php if ($customer['gioitinh'] == 1) echo "selected"; ?>>Nam</option>
                    <option value="0" <?php if ($customer['gioitinh'] == 0) echo "selected"; ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" class="form-control" name="sdt_kh" value="<?php echo htmlspecialchars($customer['sdt_kh']); ?>">
            </div>
            <div class="form-group">
                <label for="province">Tỉnh/Thành phố</label>
                <select id="province" name="province" class="form-control">
                    <!-- Các tùy chọn tỉnh/thành phố sẽ được thêm bằng mã JavaScript -->
                </select>
            </div>
            <div class="form-group">
                <label for="district">Quận/Huyện</label>
                <select id="district" name="district" class="form-control">
                    <!-- Các tùy chọn quận/huyện sẽ được thêm bằng mã JavaScript -->
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
                <input type="text" class="form-control" name="Thon_SoNha" value="<?php echo htmlspecialchars($customer['Thon_SoNha']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
    </article>
    </div> <!-- card-body .// -->
    
</div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        // Load tỉnh/thành phố
        $.ajax({
            url: 'get_province.php',
            method: 'GET',
            success: function(data) {
                $('#province').html(data);
                $('#province').val("<?php echo $customer['province_id']; ?>").change(); // Chọn tỉnh đã lưu
            }
        });

        // Khi chọn một tỉnh/thành phố
        $('#province').change(function(){
            var provinceId = $(this).val();
            if(provinceId){
                // Gửi yêu cầu Ajax để lấy dữ liệu quận/huyện
                $.ajax({
                    url: 'get_district.php',
                    type: 'POST',
                    data: {province_id: provinceId},
                    success: function(response){
                        $('#district').html(response);
                        $('#district').val("<?php echo $customer['district_id']; ?>").change(); // Chọn quận đã lưu
                    }
                });
            }else{
                $('#district').html('<option value="">Chọn một quận/huyện</option>');
                $('#wards').html('<option value="">Chọn một xã/phường</option>');
            }
        });

        // Khi chọn một quận/huyện
        $('#district').change(function(){
            var districtId = $(this).val();
            if(districtId){
                // Gửi yêu cầu Ajax để lấy dữ liệu phường/xã
                $.ajax({
                    url: 'get_wards.php',
                    type: 'POST',
                    data: {district_id: districtId},
                    success: function(response){
                        $('#wards').html(response);
                        $('#wards').val("<?php echo $customer['wards_id']; ?>"); // Chọn phường đã lưu
                    }
                });
            }else{
                $('#wards').html('<option value="">Chọn một xã/phường</option>');
            }
        });
    });
    </script>
</body>
</html>
