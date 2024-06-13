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
						<a href="TrangTTCN_KH.php" class="widget-view">
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
     
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>
	<nav class="navbar navbar-main navbar-expand-lg border-bottom">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

	<div class="collapse navbar-collapse" id="main_nav">
      <select class="form-select" aria-label="Default select example">
  <option selected>Tỉnh Thành </option>
  <option value="1">Bình Định</option>
  <option value="2">Phú Yên</option>
  <option value="3">Quảng Ngãi</option>
</select>
<select class="form-select" aria-label="Default select example">
  <option selected>Quận Huyện</option>
  <option value="1">Tây Sơn</option>
  <option value="2">An Nhơn</option>
  <option value="3">Phù Mỹ</option>
</select>
		<select class="form-select" aria-label="Default select example">
  <option selected>Đường Phố </option>
  <option value="1">Phú Phong</option>
  <option value="2">Quy Nhơn</option>
  <option value="3">An Lão</option>
</select>
		<select class="form-select" aria-label="Default select example">
  <option selected>Mức Giá</option>
  <option value="1">100-200 triệu</option>
  <option value="2">300-400 triệu</option>
  <option value="3">400-500 triệu</option>
</select>
		<select class="form-select" aria-label="Default select example">
  <option selected>Diện Tích </option>
  <option value="1">50-100 m2</option>
  <option value="2">100-150 m2</option>
  <option value="3">150-200m2</option>
</select>
		  <button class="btn btn-primary search-btn">Tìm Kiếm</button>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->
<!---->
	
	
	<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">


<!-- ============================  FILTER TOP  ================================= -->
<div class="card mb-3">
	<div class="card-body">
		<ol class="breadcrumb float-left">
			<li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
			<li class="breadcrumb-item"><a href="#">Thể Loại</a></li>
			<li class="breadcrumb-item active">Mục Chi Tiết</li>
		</ol>
	</div> <!-- card-body .// -->
</div> <!-- card.// -->
<!-- ============================ FILTER TOP END.// ================================= -->


<div class="row">
	<aside class="col-md-3">

	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1">Loại Hình</a>
		</h6>
		<div class="filter-content collapse show" id="collapse_1" >
<?php
// Include connection file (replace with the actual path)
include 'ketnoi.php';

// Fetch types of properties query
$sql = "SELECT * FROM loai_hinh";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Display property types in list group



    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $ten_loaihinh = $row['tenloaihinh'];
        // Capture the ma_loaihinh value for link generation
        $ma_loaihinh = $row['maloaihinh']; // Added line to get ma_loaihinh

        // Corrected way to pass ma_loaihinh parameter
        echo "<li class='list-group-item'><a href='TrangMuaThue.php?maloaihinh=$ma_loaihinh'>$ten_loaihinh</a></li>";
    }

	echo '<li class="list-group-item"><a href="TrangMuaThue.php">Xem Tất Cả (Show All)</a></li>';


    echo '</ul>';
} catch (PDOException $e) {
    echo "Lỗi Khi Xử Lý (Error): " . $e->getMessage();
}

$conn = null; // Close connection
?>




		</div>
	</article> <!-- filter-group  .// -->
		<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_5"> Diện Tích</a>
		</h6>
		<div class="filter-content collapse show" id="collapse_5">
		<form action="Trang_loc_dientich.php" method="GET">
    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="10-30" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '10-30') ? 'checked' : ''; ?>>
      <div class="custom-control-label">Nhỏ hơn 30 m²</div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="30-50" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '30-50') ? 'checked' : ''; ?>>
      <div class="custom-control-label">30-50 m² </div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="50-100" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '50-100') ? 'checked' : ''; ?>>
      <div class="custom-control-label">50-100 m²</div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="100-150" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '100-150') ? 'checked' : ''; ?>>
      <div class="custom-control-label">100-150 m²</div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="150-200" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '150-200') ? 'checked' : ''; ?>>
      <div class="custom-control-label">150-200 m²</div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="200-250" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '200-250') ? 'checked' : ''; ?>>
      <div class="custom-control-label">200-250 m²</div>
    </label>

    <label class="custom-control custom-radio">
      <input type="radio" name="dientich" value="300-500" class="custom-control-input" <?php echo (isset($_GET['dientich']) && $_GET['dientich'] === '300-500') ? 'checked' : ''; ?>>
      <div class="custom-control-label">trên 300 m²</div>
    </label>

    <button type="submit" class="btn btn-primary mt-3">Lọc</button>
  </form>
		</div>
	</article> <!-- filter-group .// -->
<!--lọc theo giá-->
	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_3"> Mức Giá</a>
		</h6>
		<div class="filter-content collapse show" id="collapse_3">
			<div class="inner">
			<ul class="list-group">
			<li class="list-group-item"><a href="Trang_locgia.php?price_range=100000000-500000000">Dưới 500 triệu  </a></li>
			<li class="list-group-item"><a href="Trang_locgia.php?price_range=500000000-800000000">500 -800 triệu</a></li>
				<li class="list-group-item"><a href="Trang_locgia.php?price_range=800000000-1000000000">800 triệu - 1 tỷ </a></li>
				<li class="list-group-item"><a href="Trang_locgia.php?price_range=1000000000-2000000000">1-2 tỷ
			</a></li>
			<li class="list-group-item"><a href="Trang_locgia.php?price_range=2000000000-3000000000">2-3 tỷ</a></li>
			<li class="list-group-item"><a href="Trang_locgia.php?price_range=3000000000-5000000000">3-5 tỷ</a></li>
			<li class="list-group-item"><a href="Trang_locgia.php?price_range=7000000000-10000000000">7-10 tỷ</a></li>
				</ul>

				<button class="btn btn-block btn-primary">Apply</button>
			</div> <!-- inner.// -->
		</div>
	</article> <!-- filter-group .// -->
	<article class="filter-group">
		<h6 class="title">
			<a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_4"> Loại</a>
		</h6>
		<div class="filter-content collapse show" id="collapse_4">
			  <div class="inner">
			  	<label class="checkbox-btn">
				    <input type="checkbox">
				    <span class="btn btn-light"> Thuê</span>
				  </label>

				  <label class="checkbox-btn">
				    <input type="checkbox">
				    <span class="btn btn-light"> Mua </span>
				  </label>

				
			  </div> <!-- inner.// -->
		</div>
	</article> <!-- filter-group .// -->
	

	</aside> <!-- col.// -->
	<main class="col-md-9">


<header class="mb-3">
		<div class="form-inline">
    <strong class="mr-md-auto">Sắp Xếp</strong>
<select id="sortOrder" class="mr-2 form-control" onchange="sortProducts()">
<option value="">Sắp Xếp</option>
    <option value="high_to_low">Giá Từ Cao Dến Thấp</option>
    <option value="low_to_high">Giá Từ Thấp Đến Cao</option>
</select>
<script>
    function sortProducts() {
        var selectBox = document.getElementById("sortOrder");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        window.location.href = 'Trang_sapxep_gia.php?sort_order=' + selectedValue;
    }
</script>

     
			<div class="btn-group">
				<a href="page-listing-grid.html" class="btn btn-light" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="page-listing-large.html" class="btn btn-light active" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->

<?php
// Include connection file (replace with the actual path)
include 'ketnoi.php';

// Số lượng bản ghi trên mỗi trang
$limit = 6;

// Lấy tham số tìm kiếm từ URL
$searchKeyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

// Tạo truy vấn SQL để tìm kiếm nhà đất theo tên gần đúng
$sql = "SELECT * FROM nhadat WHERE ten_nhadat LIKE :searchKeyword";

// Tính tổng số bản ghi
$stmt = $conn->prepare($sql);
$stmt->bindValue(':searchKeyword', '%' . $searchKeyword . '%', PDO::PARAM_STR);
$stmt->execute();
$total_records = $stmt->rowCount();

// Tính tổng số trang
$total_pages = ceil($total_records / $limit);

// Lấy trang hiện tại từ URL, mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$start = ($page - 1) * $limit;

// Thực hiện truy vấn SQL để lấy dữ liệu cho trang hiện tại
$sql .= " LIMIT $start, $limit";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':searchKeyword', '%' . $searchKeyword . '%', PDO::PARAM_STR);
$stmt->execute();

// Hiển thị kết quả
if ($stmt->rowCount() > 0) {
    $propertyCount = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Hiển thị thông tin nhà đất
        // ...
        $hinhanh = "images/items/" . $row['hinhanh'];
        $ten_nhadat = $row['ten_nhadat'];
        $gia = $row['gia'];
        $diachi = $row['id_diachi']; // Thay đổi cột tương ứng trong cơ sở dữ liệu
        $dientich = $row['dientich'];
        $mo_ta = $row['mota']; // Thêm mô tả
        $propertyCount++;
        if ($propertyCount % 3 === 1) {
            if ($propertyCount > 1) {
                echo '</div>'; // Đóng dòng trước nếu không phải dòng đầu tiên
            }
            echo '<div class="row">'; // Mở dòng mới
        }
        echo '<article class="card card-product-list">';
        echo '<div class="row no-gutters">';
        echo '<aside class="col-md-3">';
        echo '<a href="#" class="img-wrap">';
        echo '<span class="badge badge-danger"> NEW </span>';
        echo '<img src="' . $hinhanh . '">';
        echo '</a>';
        echo '</aside>'; // Close col-md-3

        echo '<div class="col-md-6">';
        echo '<div class="info-main">';
        echo '<a href="#" class="h5 title">' . $ten_nhadat . '</a>';
        echo '<p class="mb-3">';
        echo '<span class="tag"> Giá : ' . $gia . '</span>';
        echo '<span class="tag"> Diện Tích : ' . $dientich . '</span>';
        echo '</p>';
        echo '</p>';
      $mo_ta = $row['mota'];
      if (strlen($mo_ta) > 250) {
          
       
      $mo_ta = substr($mo_ta, 0, 250) . "...";
      }
      echo '<p>' . $mo_ta . '</p>';
      echo '<br> <p class="card-text">';
      echo '<a href="TrangChiTietSanPham.php?sid=' . $row['id_nhadat'] . '">Xem Chi Tiết</a>';
      echo '</p>';
        echo '</div>'; // Close info-main
        echo '</div>'; // Close col-md-6

        echo '<aside class="col-sm-3">';
        echo '<div class="info-aside">';
        echo '<p class="text-muted mt-3">' . $diachi . '</p>';
        echo '<p class="mt-3">';
        echo '<a href="#" class="btn btn-outline-primary"> <i class="fa fa-envelope"></i> Liên Hệ  </a>';
        echo '</p>';
        echo '</div>'; // Close info-aside
        echo '</aside>'; // Close col-sm-3

        echo '</div>'; // Close row
        echo '</article>'; // Close card-product-list
    }
    if ($propertyCount > 0) {
        echo '</div>'; // Đóng dòng cuối cùng nếu còn nhà đất
    }

    // Phân trang
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination">';
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&search_keyword=' . $searchKeyword . '">Previous</a></li>';
    } else {
        echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '&search_keyword=' . $searchKeyword . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '&search_keyword=' . $searchKeyword . '">Next</a></li>';
    } else {
        echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
    }
    echo '</ul>';
    echo '</nav>';
} else {
    echo '<h2>Không tìm thấy nhà đất nào (No properties found)</h2>';
}

// Close connection
$conn = null;
?>







<div class="box text-center">
	<p>Did you find what you were looking for？</p>
	<a href="" class="btn btn-light">Yes</a>
	<a href="" class="btn btn-light">No</a>
</div>


	</main> <!-- col.// -->

</div>

</div> <!-- container .//  -->
</section>
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