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
.pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .pagination li.active {
            background-color: #007bff;
            color: #fff;
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


<div class="container">
<!-- ========================= SECTION MAIN  ========================= -->
<section class="section-main padding-y">
<main class="card">
	<div class="card-body">

<div class="row">
	<aside class="col-lg col-md-3 flex-lg-grow-0">
		<h6>Tính Theo 20 Khu Vực Cao Nhất</h6>
		<nav class="nav-home-aside">
			<ul class="menu-category">
				<li><a href="#">Quy Nhơn</a></li>
				<li><a href="#">Hà Nội</a></li>
				<li><a href="#">Hải Phòng</a></li>
				<li><a href="#">Đồng Nai</a></li>
				<li><a href="#">Bình Dương</a></li>
				<li><a href="#">Cần Thơ</a></li>
				<li><a href="#">Đà Nẵng</a></li>
				<li class="has-submenu"><a href="#">TP Hồ Chí Minh</a>
					<ul class="submenu">
						<li><a href="#">Quận 1</a></li>
						<li><a href="#">Quận 2</a></li>
						<li><a href="#">Quận 3</a></li>
						<li><a href="#">Quận 4</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</aside> <!-- col.// -->
	<div class="col-md-9 col-xl-7 col-lg-7">

<!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
<div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1_indicator" data-slide-to="1"></li>
    <li data-target="#carousel1_indicator" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../LTMNM_ThietKe/images/banners/anhbia1.jfif" alt="First slide"> 
    </div>
    <div class="carousel-item">
      <img src="../LTMNM_ThietKe/images/banners/anhbia2.jfif" alt="Second slide">
    </div>
	  <div class="carousel-item">
      <img src="../LTMNM_ThietKe/images/banners/anhbia3.jfif" alt="Second slide">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->	

	</div> <!-- col.// -->
	<div class="col-md d-none d-lg-block flex-grow-1">
		<aside class="special-home-right">
			<h6 class="bg-blue text-center text-white mb-0 p-2">Thể Loại</h6>
			
			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Mua</h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Xem Chi Tiết</a>
			  </div> 
			  <img src="images/items/loai1.jfif" height="80" class="img-bg">
			</div>

			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Bán </h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Xem Chi Tiết</a>
			  </div> 
			  <img src="../LTMNM_ThietKe/images/items/loai2.jfif" height="80" class="img-bg">
			</div>

			<div class="card-banner border-bottom">
			  <div class="py-3" style="width:80%">
			    <h6 class="card-title">Thuê</h6>
			    <a href="#" class="btn btn-secondary btn-sm"> Xem Chi Tiết</a>
			  </div> 
			  <img src="../LTMNM_ThietKe/images/items/loai3.jfif" height="80" class="img-bg">
			</div>

		</aside>
	</div> <!-- col.// -->
</div> <!-- row.// -->

	</div> <!-- card-body.// -->
</main> <!-- card.// -->

</section>
<!-- ========================= SECTION MAIN END// ========================= -->



<!-- =============== SECTION DEAL =============== -->
<section class="padding-bottom">
 <div class="card card-deal">
    <div class="col-heading content-body">
        <header class="section-heading">
            <h3 class="section-title">Ưu Đãi Và Giảm Giá</h3>
            <p>Bất Động Sản</p>
        </header><!-- sect-heading -->
        <div class="timer">
            <div> <span class="num">04</span> <small>Days</small></div>
            <div> <span class="num">12</span> <small>Hours</small></div>
            <div> <span class="num">58</span> <small>Min</small></div>
            <div> <span class="num">02</span> <small>Sec</small></div>
        </div>
    </div> <!-- col.// -->
    <div class="row no-gutters items-wrap">

    <?php
    for ($i = 1; $i <= 5; $i++) {
        $district = "Quận " . $i;
        $discount = -5 * $i; //
    ?>
        <div class="col-md col-6">
            <figure class="card-product-grid card-sm">
                <a href="TrangChiTietSanPham.php" class="img-wrap">
                    <img src="../LTMNM_ThietKe/images/items/chungcumini<?php echo $i; ?>.jfif">
                </a>
                <div class="text-wrap p-3">
                    <a href="TrangChiTietSanPham.php" class="title"><?php echo $district; ?></a>
                    <span class="badge badge-danger"> <?php echo $discount; ?>% </span>
                </div>
            </figure>
        </div>
    <?php
    }
    ?>

    </div>
</div>


</section>
<!-- =============== SECTION DEAL // END =============== -->







<!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase" style="color: red; font-weight: bold;">Nhà Đất Mới Nhất</h4>
</header>

<div class="row row-sm">
<div class="col-xl-9 col-lg-9 col-md-12 col-12">

<?php
// Kết nối đến cơ sở dữ liệu
include 'ketnoi.php';

// Số lượng bản ghi trên mỗi trang
$limit = 3;

// Trang hiện tại, mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Vị trí bắt đầu lấy dữ liệu
$start = ($page - 1) * $limit;

try {
    // Truy vấn để lấy tổng số bản ghi
    $total_records = $conn->query("SELECT COUNT(*) AS total FROM nhadat")->fetchColumn();
    $total_pages = ceil($total_records / $limit); // Tính tổng số trang

    // Truy vấn để lấy dữ liệu cho trang hiện tại
    $sql = "SELECT * FROM nhadat LIMIT $start, $limit";
    $stmt = $conn->query($sql);

    // Lặp qua các dòng dữ liệu để hiển thị
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $imageSrc = "images/items/" . $row['hinhanh'];
?>
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $imageSrc; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="color: red; font-weight: bold;">
                            <a href="TrangChiTietSanPham.php?sid=<?php echo $row['id_nhadat']; ?>"><?php echo $row['ten_nhadat']; ?></a>
                        </h5>
                        <p style="color: red; font-weight: bold;"> Giá : <?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
                        <p class="card-text">
                            <?php
                            $mota = $row['mota'];
                            echo strlen($mota) > 150 ? substr($mota, 0, 150) . '...' : $mota;
                            ?>
                        </p>
                        <p class="card-text">
						<a href="TrangChiTietSanPham.php?sid=<?php echo $row['id_nhadat']; ?>">Xem Chi Tiết </a>
                               
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($page > 1) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page - 1); ?>">Previous</a></li>
        <?php else : ?>
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>

        <?php if ($page < $total_pages) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo ($page + 1); ?>">Next</a></li>
        <?php else : ?>
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        <?php endif; ?>
    </ul>
</nav>





</div> <!-- col.// -->


	<div class="col-xl-3 col-lg-3 col-md-4 col-6">
		<div style="width: 300px; height: 420px;" class="card card-sm card-product-grid">
    <a href="#"> 
        <img style="width: 300px; height: 400px" src="images/posts/gioithieu1.jfif"> 
    </a>
</div>
		<div style="width: 300px; height: 420px;" class="card card-sm card-product-grid">
    <a href="#"> 
        <img style="width: 300px; height: 400px" src="images/posts/gioithieu2.jfif"> 
    </a>
</div>
	</div> <!-- col.// -->
	
	
</div> <!-- row.// -->
</section>
<!-- =============== SECTION ITEMS .//END =============== -->


<!-- =============== SECTION SERVICES =============== -->
<section  class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Dự Án Nổi Bật</h4>
</header>

<div class="row">

    <?php
    for ($i = 1; $i <= 4; $i++) {
        $imageSrc = "images/posts/DuAn" . $i . ".jfif";
    ?>
        <div class="col-md-3 col-sm-6">
            <article class="card card-post">
                <img src="<?php echo $imageSrc; ?>" class="card-img-top">
                <div class="card-body">
                    <h6 class="title">Vinhomes Grand Park</h6>
                    <p class="small text-uppercase text-muted">view nội khu</p>
                </div>
            </article> <!-- card.// -->
        </div> <!-- col.// -->
    <?php
    }
    ?>

</div> <!-- row.// -->

</section>
<!-- =============== SECTION SERVICES .//END =============== -->

	
	<!-- =============== SECTION REQUEST =============== -->

<section class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase"style="color: red; font-weight: bold;" >Tin Tức</h4>
</header>

<div class="row">
	<div class="col-md-8">
<div class="card-banner banner-quote overlay-gradient" style="background-image: url('images/banners/TinTuc1.jfif');">
  <div class="card-img-overlay white">
    <h3 class="card-title">Những Điều Lưu Ý Khi Tham Gia Mua Bán Bất Động Sản</h3>
    <p class="card-text" style="max-width: 400px">Batdongsan là sân chơi lớn dành cho những ai muốn làm giàu nhanh chóng bằng chính khả năng của mình. Tuy nhiên, bên cạnh đó những rủi ro tiềm ẩn cũng luôn là thách thức khó có thể vượt qua toàn vẹn. Vậy nên trước khi gia nhập vào lĩnh vực Batdongsan bạn cần phải tham khảo bài viết sau.</p>
    <a href="" class="btn btn-primary rounded-pill">Xem Chi Tiết</a>
  </div>
</div>
	</div> <!-- col // -->
	<div class="col-md-4">

<div class="card card-body">
	<h4 class="title py-3">Yêu Cầu</h4>
	<form>
		<div class="form-group">
			<input class="form-control" name="" placeholder="Bạn Muốn Thay Đổi Gì?" type="text">
		</div>
		<div class="form-group">
			<div class="input-group">
				<input class="form-control" placeholder="Giá Cả" name="" type="text">
				
				<select class="custom-select form-control">
					<option>Giao Diện</option>
					<option>Chức Năng</option>
					<option>Điều Khoản</option>
					
				</select>
			</div>
		</div>
		<div class="form-group text-muted">
			<p>Chọn loại mẫu :</p>
			<label class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" value="option1">
			  <div class="form-check-label">Yêu cầu giá</div>
			</label>
			<label class="form-check form-check-inline">
			  <input class="form-check-input" type="checkbox" value="option2">
			  <div class="form-check-label">Yêu cầu một ví dụ</div>
			</label>
		</div>
		<div class="form-group">
			<button class="btn btn-warning">Giử Yêu Cầu</button>
		</div>
	</form>
</div>

	</div> <!-- col // -->
</div> <!-- row // -->
</section>

<!-- =============== SECTION REQUEST .//END =============== -->
	
	
<!-- =============== SECTION REGION =============== -->
<section  class="padding-bottom">

<header class="section-heading heading-line">
	<h4 class="title-section text-uppercase">Choose region</h4>
</header>

<ul class="row mt-4">
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/CN.png"> <span>China</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/DE.png"> <span>Germany</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/AU.png"> <span>Australia</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/RU.png"> <span>Russia</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/IN.png"> <span>India</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/GB.png"> <span>England</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/TR.png"> <span>Turkey</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <img class="icon-flag-sm" src="images/icons/flags/UZ.png"> <span>Uzbekistan</span> </a></li>
	<li class="col-md col-6"><a href="#" class="icontext"> <i class="mr-3 fa fa-ellipsis-h"></i> <span>More regions</span> </a></li>
</ul>
</section>
<!-- =============== SECTION REGION .//END =============== -->


</div>  
<!-- container end.// -->

<!-- ========================= SECTION SUBSCRIBE  ========================= -->
<section class="section-subscribe padding-y-lg">
<div class="container">

<p class="pb-2 text-center text-white">Cung cấp các xu hướng sản phẩm mới nhất và tin tức trong ngành ngay tới hộp thư đến của bạn</p>

<div class="row justify-content-md-center">
	<div class="col-lg-5 col-md-6">
<form class="form-row">
		<div class="col-md-8 col-7">
		<input class="form-control border-0" placeholder="Your Email" type="email">
		</div> <!-- col.// -->
		<div class="col-md-4 col-5">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">Chúng tôi sẽ không bao giờ chia sẻ địa chỉ email của bạn với bên thứ ba.. </small>
	</div> <!-- col-md-6.// -->
</div>
	

</div>
</section>
<!-- ========================= SECTION SUBSCRIBE END// ========================= -->


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
</html>