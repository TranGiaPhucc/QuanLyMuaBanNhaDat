<?php
// Kết nối CSDL và truy vấn dữ liệu từ bảng datlich
include 'ketnoi.php'; // File kết nối CSDL

// Khởi tạo biến kết quả
$result = [];

try {
    // Truy vấn để lấy thông tin từ bảng datlich và các bảng liên quan
    $sql = "SELECT 
                  khachhang.hoten_kh AS 'Tên Khách Hàng',
                  nhadat.ten_nhadat AS 'Tên Nhà Đất',
                  loai_nhadat.tenloai AS 'Loại Nhà Đất',
                  datlich.thoigian_datlich AS 'Thời Gian',
                  CONCAT(wards.name, ', ', district.name, ', ', province.name) AS 'Địa Điểm',
                  datlich.tinhtrang_datlich AS 'Tình Trạng',
                  datlich.id_datlich AS 'id dat lich'
              FROM datlich
              JOIN khachhang ON datlich.id_khachhang = khachhang.id_khachhang
              JOIN nhadat ON datlich.id_nhadat = nhadat.id_nhadat
              JOIN loai_nhadat ON nhadat.id_loai = loai_nhadat.id_loai
              JOIN wards ON datlich.wards_id = wards.wards_id
              JOIN district ON datlich.district_id = district.district_id
              JOIN province ON datlich.province_id = province.province_id";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	</header>
	
	
	
<!-----Main------>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-4 col-6">
			<nav class="list-group">
        <a class="list-group-item " href="TrangTTCN_Admin.php"> Tài Khoản</a>
        <a class="list-group-item" href="TrangTTCN_Admin.php"> Thông Tin Cá Nhân </a>
        <a class="list-group-item" href="CapNhap_TTCN_ADMIN.php"> Cập Nhập Thông Tin </a>
        <a class="list-group-item" href="trang_ql_kh.php">Quản Lý Khách Hàng</a>
        <a class="list-group-item" href="trang_ql_nhanvien.php">Quản Lý Nhân Viên</a>
        <a class="list-group-item " href="ql_nhadat.php">Quản Lý Nhà Đất</a>
        <a class="list-group-item" href="quanlykygiua.php">Quản Lý Ky Giua</a>
        <a class="list-group-item" href="TrangBieuDoThongKe.php">Thông Kê Doanh Số </a>
        <a class="list-group-item active" href="TrangThongTinLichHen.php">Thông Tin Lịch Hẹn</a>
        <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
    </nav>
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
    
    <?php foreach ($result as $row): ?>
    <tr>
        <td><?php echo $row['Tên Khách Hàng']; ?></td>
        <td>
    <?php 
        $tenNhaDat = $row['Tên Nhà Đất'];
        if (strlen($tenNhaDat) > 10) {
            $tenNhaDat = substr($tenNhaDat, 0, 10) . '...';
        }
        echo $tenNhaDat; 
    ?>
</td>
        <td><?php echo $row['Loại Nhà Đất']; ?></td>
        <td><?php echo $row['Thời Gian']; ?></td>
        <td><?php echo $row['Địa Điểm']; ?></td>
        <td><?php echo $row['Tình Trạng']; ?></td>
        <td>
            <div class="form-group col-md">
               
            <div class="form-group col-md">
			  <a href="xemchitietlichhen.php?id=<?php echo $row['id dat lich']; ?>" class="btn btn-danger">
        <i class=""></i> <span class="text">xemchitiet</span> 
      </a>




  

			</div>
              
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

    </div> <!-- card-body .// -->
</article> 
			</div>
	
			
			</div>
		</div>
<!-- ========================= FOOTER ========================= -->
<?php
require_once 'footer.php';
?>
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