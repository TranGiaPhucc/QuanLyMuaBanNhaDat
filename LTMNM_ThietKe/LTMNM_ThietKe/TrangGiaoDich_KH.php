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

// Truy vấn CSDL để lấy id_khachhang dựa vào username
try {
    $stmt = $conn->prepare("SELECT id_khachhang FROM khachhang WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_khachhang = $result['id_khachhang'];

    // Truy vấn CSDL để lấy danh sách các giao dịch của khách hàng dựa vào id_khachhang
    $stmt = $conn->prepare("SELECT hoadon.*, chitiethoadon.*, nhadat.ten_nhadat, nhadat.hinhanh,loai_nhadat.tenloai
                            FROM hoadon
                            INNER JOIN chitiethoadon ON hoadon.id_hoadon = chitiethoadon.id_hoadon
                            INNER JOIN nhadat ON chitiethoadon.id_nhadat = nhadat.id_nhadat
                            INNER JOIN loai_nhadat ON hoadon.loaihoadon = loai_nhadat.id_loai
                            WHERE hoadon.id_khachhang = :id_khachhang");
    $stmt->bindParam(':id_khachhang', $id_khachhang);
    $stmt->execute();
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
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
   // session_start();
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
	


</header> <!-- section-header.// -->

<div class="container-fluid">
	<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 col-6">
        <aside class="">
            <nav class="list-group">
                <a class="list-group-item" href="TrangTTCN_KH.php"> Tài Khoản</a>
                <a class="list-group-item " href="TrangTTCN_KH.php"> Thông Tin Cá Nhân </a>
                <a class="list-group-item " href="capnhat_tt_KH.php"> Cập Nhập Thông Tin </a>
                <a class="list-group-item" href="TrangKyGiua_KH.php">Danh Mục Ký Gửi</a>
                <a class="list-group-item" href="TrangThongTinLichHen_KH.php">Danh Mục Lịch Hẹn</a>
				<a class="list-group-item active" href="TrangGiaoDich_KH.php">Danh Mục Giao Dịch</a>
                <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
            </nav>
        </aside> <!-- col.// -->
    </div>
   <!-- Phần HTML để hiển thị danh sách giao dịch -->
<!-- Phần HTML để hiển thị danh sách giao dịch -->
<div class="col-xl-9 col-lg-9 col-md-12 col-12">
    <article class="card mb-3">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Tên Nhà Đất</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Giá Cả</th>
                    <th>Ngày Lập</th>
                    <th>Sự Kiện</th>
                   
                </tr>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?php echo $transaction['ten_nhadat']; ?></td>
                        <td><img src="images/items/<?php echo $transaction['hinhanh']; ?>" alt="Hình ảnh nhà đất"  style="width: 100px; height: auto;"></td>
                        <td><?php echo $transaction['soluong']; ?></td>
                        <td><?php echo $transaction['giaca']; ?></td>
                        <td><?php echo $transaction['ngaylap']; ?></td>
                        <td><a href="TrangChiTietSanPham.php?sid=<?php echo $transaction['id_nhadat']; ?>">Đánh Giá </a></td>
                       
                    </tr>
                <?php endforeach; ?>
            </table>
        </div> <!-- card-body .// -->
    </article> 
</div>


</div>
		</div>
