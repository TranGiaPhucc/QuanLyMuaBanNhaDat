<?php
// Kết nối CSDL và các hàm cần thiết khác
include 'ketnoi.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: TrangDangNhap.php");
    exit;
}

// Lấy thông tin khách hàng từ SESSION
$username = $_SESSION['username'];

// Truy vấn CSDL để lấy danh sách đặt lịch của khách hàng dựa vào username
try {
    $stmt = $conn->prepare("SELECT datlich.*, khachhang.hoten_kh, nhadat.ten_nhadat, nhadat.maloaihinh, CONCAT(province.name, ', ', district.name, ', ', wards.name, ', ', khachhang.Thon_SoNha) AS dia_diem 
    FROM datlich 
    INNER JOIN khachhang ON datlich.id_khachhang = khachhang.id_khachhang 
    INNER JOIN nhadat ON datlich.id_nhadat = nhadat.id_nhadat 
    INNER JOIN province ON datlich.province_id = province.province_id -- Sửa tên cột thành province_id
    INNER JOIN district ON datlich.district_id = district.district_id -- Sửa tên cột thành district_id
    INNER JOIN wards ON datlich.wards_id = wards.wards_id -- Sửa tên cột thành wards_id
                            WHERE khachhang.username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
// Kiểm tra nếu biến $result tồn tại và là một mảng hoặc đối tượng

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
					<small class="text">
						<?php 
						if(isset($_SESSION['username'])) {
							echo htmlspecialchars($_SESSION['username']);
						} else {
							echo "Guest";
						}
						?>
					</small>
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

	</header>
	
<div class="container-fluid">
	<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 col-6">
        <aside class="">
        <nav class="list-group">
                <a class="list-group-item" href="TrangTTCN_KH.php"> Tài Khoản</a>
                <a class="list-group-item " href="TrangTTCN_KH.php"> Thông Tin Cá Nhân </a>
                <a class="list-group-item " href="capnhat_tt_KH.php"> Cập Nhập Thông Tin </a>
                <a class="list-group-item" href="TrangKyGiua_KH.php">Danh Mục Ký Gửi</a>
                <a class="list-group-item active" href="TrangThongTinLichHen_KH.php">Danh Mục Lịch Hẹn</a>
				<a class="list-group-item " href="TrangGiaoDich_KH.php">Danh Mục Giao Dịch</a>
                <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
            </nav>
        </aside> <!-- col.// -->
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-12">
    <article class="card mb-3">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Tên Khách Hàng</th>
                    <th>Tên Nhà Đất</th>
                    <th>Loại Nhà Đất</th>
                    <th>Thời Gian</th>
                    <th>Địa Điểm</th>
                    <th>Tình Trạng</th>
                    <th></th>
                </tr>
                <?php 
                // Kiểm tra nếu biến $result tồn tại và là một mảng hoặc đối tượng
                if(isset($result) && (is_array($result) || is_object($result))) {
                    foreach ($result as $row): 
                ?>
                <tr>
                    <td><?php echo $row['hoten_kh']; ?></td>
                    <td>
                        <?php 
                        $tenNhaDat = $row['ten_nhadat'];
                        if (strlen($tenNhaDat) > 10) {
                            $tenNhaDat = substr($tenNhaDat, 0, 10) . '...';
                        }
                        echo $tenNhaDat; 
                        ?>
                    </td>
                    <td><?php echo $row['maloaihinh']; ?></td>
                    <td><?php echo $row['thoigian_datlich']; ?></td>
                    <td><?php echo $row['dia_diem']; ?></td>
                    <td><?php echo $row['tinhtrang_datlich']; ?></td>
                    <td>
                        <div class="form-group col-md">
                            <a href="xemchitietlichhen.php?id=<?php echo $row['id_datlich']; ?>" class="btn btn-danger">
                                <i class=""></i> <span class="text">Xem chi tiết</span> 
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php 
                } else {
                    // Xử lý khi không có dữ liệu trả về từ truy vấn
                    echo "<tr><td colspan='7'>Không có dữ liệu đặt lịch.</td></tr>";
                }
                ?>
            </table>
        </div> <!-- card-body .// -->
    </article> 
</div>


</div>
		</div>
