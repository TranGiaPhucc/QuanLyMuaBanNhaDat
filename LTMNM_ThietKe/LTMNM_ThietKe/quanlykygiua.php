
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
        .form-error {
                    color: red;
                    font-size: 12px;
                }
            </style>
<script type="text/javascript">
function Validate() 
{
    // Lấy giá trị của các trường input
    const id_nhadat = document.getElementById("id_nhadat").value.trim();

    const ten_nhadat=document.getElementById("ten_nhadat").value.trim();
    const mota = document.getElementById("mota").value.trim();
    const hoten = document.getElementById("hoten").value.trim();
    const gia= document.getElementById("gia").value;
    const dientich = document.getElementById("dientich").value.trim();
    const tinhtrang = document.getElementById("tinhtrang").value.trim();

    let valida=true;
    // Xóa thông báo lỗi trước khi kiểm tra lại
   document.getElementById("id_nhadat").textContent = "";

    document.getElementById("password").nextElementSibling.textContent = "";
    document.getElementById("hoten").nextElementSibling.textContent = "";
    document.getElementById("sdt").nextElementSibling.textContent = "";
    document.getElementById("ngaysinh").nextElementSibling.textContent = "";

    // Kiểm tra ràng buộc 1: ID nhà đất
    if (!/^ID\d{3}$/.test(id_nhadat) || !id_nhadat) 
    {
        document.getElementById("id_nhadat").nextElementSibling.textContent = "Lỗi: ID nhà đất không không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("id_nhadat").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }
  
    // Kiểm tra ràng buộc 2: mô tả
    if ( !mota) {
        document.getElementById("mota").nextElementSibling.textContent = "Lỗi: Password không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("mota").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 3: tên nhà đất không chứa số
    if ( !ten_nhadat ) {
        document.getElementById("ten_nhadat").nextElementSibling.textContent = "Lỗi: Họ tên không được chứa số!";
        valida=false;
    }
    else {
        document.getElementById("ten_nhadat").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }
   

    
    
    //kiểm tra rỗng username/địa chỉ
    if (!gia) {
    document.getElementById("gia").nextElementSibling.textContent = "Lỗi: Giá không được bỏ trống!";
    valida = false;
  } else if (gia < 0) {
    document.getElementById("gia").nextElementSibling.textContent = "Lỗi: Giá không được là số âm!";
    valida = false;
} else {
    document.getElementById("gia").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
}

if (!dientich) {
    document.getElementById("dientich").nextElementSibling.textContent = "Lỗi: Giá không được bỏ trống!";
    valida = false;
  } else if (gia < 0) {
    document.getElementById("dientich").nextElementSibling.textContent = "Lỗi: Giá không được là số âm!";
    valida = false;
} else {
    document.getElementById("dientich").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
}

    // Nếu tất cả ràng buộc được đáp ứng, cho phép submit form
    return valida;
}
</script>

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
 <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
 <!--   <script src="../LTMNM_ThietKe/js/app.js"></script> -->

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
                    <a class="list-group-item " href="TrangTTCN_Admin.php"> Tài Khoản</a>
                    <a class="list-group-item" href="TrangTTCN_Admin.php"> Thông Tin Cá Nhân </a>
                    <a class="list-group-item" href="CapNhap_TTCN_ADMIN.php"> Cập Nhập Thông Tin </a>
                    <a class="list-group-item " href="trang_ql_kh.php">Quản Lý Khách Hàng</a>
                    <a class="list-group-item " href="trang_ql_nhanvien.php">Quản Lý Nhân Viên</a>
                    <a class="list-group-item " href="ql_nhadat.php">Quản Lý Nhà Đất</a>
                    <a class="list-group-item active" href="quanlykygiua.php">Quản Lý Ky Giua</a>
                    <a class="list-group-item " href="TrangBieuDoThongKe.php">Thông Kê Doanh Số </a>
                    <a class="list-group-item " href="TrangThongTinLichHen.php">Thông Tin Lịch Hẹn</a>
                    <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
            </nav>
                </aside> <!-- col.// -->
				</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-12">
		<article class="card mb-3">
		<div class="card-body">
		<caption>
			<hl style="text-align: center;">Danh Sách Ký Giửa  </hl>
  </caption>
  <br>
	
  </br>
  

    <?php
// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Số lượng bản ghi trên mỗi trang
$limit = 5;

// Trang hiện tại, mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$start = ($page - 1) * $limit;

// Truy vấn để lấy tổng số bản ghi
$total_results = $conn->query("SELECT COUNT(*) AS total FROM kygiua")->fetchColumn();
$total_pages = ceil($total_results / $limit);

//Truy vấn để lấy dữ liệu cho trang hiện tại
$sql = "SELECT kygiua.id_kygiua, khachhang.username, khachhang.hoten_kh, kygiua.trang_thai
        FROM kygiua
        INNER JOIN khachhang ON kygiua.id_khachhang = khachhang.id_khachhang
        LIMIT :start, :limit";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$kyguias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table">
    <tr>
        <td><strong>ID Ký Gửi</strong></td>
        <td><strong>Username Khách Hàng</strong></td>
        <td><strong>Tên Khách Hàng</strong></td>
        <td><strong>Trạng Thái</strong></td>
        <td><strong>Chi Tiết Ký Gửi</strong></td>
    </tr>

    <?php foreach ($kyguias as $kygiua) : ?>
        <tr>
            <td><?php echo $kygiua["id_kygiua"]; ?></td>
            <td><?php echo $kygiua["username"]; ?></td>
            <td><?php echo $kygiua["hoten_kh"]; ?></td>
            <td><?php echo $kygiua["trang_thai"]; ?></td>
            <td>
                <div class="form-group col-md">
                    <a href="xemchitiet_kygiua.php?id=<?php echo $kygiua["id_kygiua"]; ?>" class="btn btn-danger">Chi Tiết</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Phân trang -->
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        <?php if ($page > 1) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
        <?php else : ?>
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <?php if ($page < $total_pages) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>
        <?php else : ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        <?php endif; ?>
    </ul>
</nav>


		</div>
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




</html>