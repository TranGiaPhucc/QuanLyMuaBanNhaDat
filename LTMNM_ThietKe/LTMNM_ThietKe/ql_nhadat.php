
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
                    <a class="list-group-item active" href="ql_nhadat.php">Quản Lý Nhà Đất</a>
                    <a class="list-group-item " href="quanlykygiua.php">Quản Lý Ky Giua</a>
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
			<hl style="text-align: center;">Thông Tin Nhà Đất </hl>
  </caption>
  <br>
	</br>
	 <!-- Button to Open the Modal -->
	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
    Thêm Mới
  </button>
	</br>
  </br>
<table class="table">
		

<tr>
<td><strong>ID Nhà Đất </strong></td>
<td><strong>Tên Nhà Đất </strong></td>
<td><strong>Hình Ảnh</strong></td>
<td><strong>Loại </strong></td>
<td><strong>Tình Trạng</strong></td>
<td><stong>Sự Kiện</stong></td>
</tr>

<?php

// Kết nối đến cơ sở dữ liệu
include("ketnoi.php");

// Số lượng bản ghi trên mỗi trang
$limit = 4;

// Trang hiện tại, mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính vị trí bắt đầu lấy dữ liệu
$start = ($page - 1) * $limit;

// Truy vấn để lấy tổng số bản ghi
$total_results = $conn->query("SELECT COUNT(*) AS total FROM nhadat")->fetchColumn();
$total_pages = ceil($total_results / $limit);

// Truy vấn để lấy dữ liệu cho trang hiện tại
$sql = "SELECT nhadat.id_nhadat, nhadat.tinhtrang, nhadat.hinhanh, nhadat.ten_nhadat, nhadat.mota, loai_nhadat.tenloai, province.name, district.name, wards.name
FROM nhadat
INNER JOIN loai_nhadat ON nhadat.id_loai = loai_nhadat.id_loai
INNER JOIN province ON nhadat.ID_Tinh = province.province_id
INNER JOIN district ON nhadat.ID_Huyen_Quan = district.district_id
INNER JOIN wards ON nhadat.ID_Xa_Duong = wards.wards_id
WHERE nhadat.tinhtrang != 'Khong Ton Tai'
LIMIT $start, $limit;
";


$results = $conn->query($sql);
// Truy vấn dữ liệu từ bảng loai_nhadat
$query_loai = "SELECT * FROM loai_nhadat";
$result_loai = $conn->query($query_loai);

// Truy vấn dữ liệu từ bảng diachinhadat
//$query_diachi = "SELECT * FROM diachinhadat";
//$result_diachi = $conn->query($query_diachi);

// Phần hiển thị dữ liệu của từng bản ghi
while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    // Hiển thị dữ liệu của từng bản ghi ở đây
?>

<tr>
    <td><?php echo $row["id_nhadat"]; ?></td>
    <td><?php echo strlen($row["ten_nhadat"]) > 10 ? substr($row["ten_nhadat"], 0, 15) . "..." : $row["ten_nhadat"]; ?></td>
    <td><img src="images/items/<?php echo $row["hinhanh"]; ?>" width="30" height="30" /></td>
    <td><?php echo $row["tenloai"]; ?></td>
    <td><?php echo $row["tinhtrang"]; ?></td>
    <td>
        <div class="form-group col-md">
            <a href="edit_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>" class="btn btn-danger">Edit</a>
            <a href="detail_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>" class="btn btn-danger">Details</a>
            <a href="xoa_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn Xoá Không?');">Delete</a>
        </div>
    </td>
</tr>
<?php 
}
?>
</table>
<!-- Phân trang -->
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination" >
    
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


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm Nhà Đất</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="them_nhadat.php" method="POST" onsubmit="return Validate()">
                  
                    
                    <div class="form-group">
                        <label for="ten_nhadat">Tên Nhà Đất</label>
                        <input type="text" name="ten_nhadat" id="ten_nhadat" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="mota">Mô Tả</label>
                        <textarea name="mota" id="mota" class="form-control"></textarea>
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="id_loai">ID Loại</label>
                        <select name="id_loai" id="id_loai" class="form-control">

                            <?php
                            // Lặp qua kết quả từ truy vấn bảng loai_nhadat và tạo option cho combobox
                            while ($row_loai = $result_loai->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row_loai['id_loai'] . "'>" . $row_loai['tenloai'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="form-error"></span>
                    </div>
                    <div class="form-group">
                      <label for="maloaihinh">Loại Hình</label>
                      <select name="maloaihinh" id="maloaihinh" class="form-control">
                          <?php
                          // Kết nối database và thực hiện truy vấn để lấy dữ liệu từ bảng loai_hinh
                          // $conn là biến kết nối cơ sở dữ liệu của bạn
                          $query_loaihinh = "SELECT * FROM `loai_hinh`";
                          $result_loaihinh = $conn->query($query_loaihinh);
                          
                          // Lặp qua kết quả từ truy vấn bảng loai_hinh và tạo option cho combobox
                          while ($row_loaihinh = $result_loaihinh->fetch(PDO::FETCH_ASSOC)) {
                              echo "<option value='" . $row_loaihinh['maloaihinh'] . "'>" . $row_loaihinh['tenloaihinh'] . "</option>";
                          }
                          ?>
                      </select>
                      <span class="form-error"></span>
                      </div>

                   <!-- Select box cho Tỉnh/Thành phố -->
<div class="form-group">
    <label for="province">Tỉnh/Thành phố</label>
    <select id="province" name="province" class="form-control">
        <option value="">Chọn một tỉnh</option>
        <!-- Các tùy chọn tỉnh/thành phố sẽ được thêm bằng mã JavaScript -->
    </select>
    <span class="form-error"></span>
</div>

<!-- Select box cho Quận/Huyện -->
<div class="form-group">
    <label for="district">Quận/Huyện</label>
    <select id="district" name="district" class="form-control">
        <option value="">Chọn một quận/huyện</option>
        <!-- Các tùy chọn quận/huyện sẽ được thêm bằng mã JavaScript -->
    </select>
</div>

<!-- Select box cho Phường/Xã -->
<div class="form-group">
    <label for="wards">Phường/Xã</label>
    <select id="wards" name="wards" class="form-control">
        <option value="">Chọn một xã/phường</option>
        <!-- Các tùy chọn phường/xã sẽ được thêm bằng mã JavaScript -->
    </select>
</div>

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


                    
                    <div class="form-group">
                        <label for="gia">Giá</label>
                        <input type="number" name="gia" id="gia" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="dientich">Diện Tích</label>
                        <input type="number" name="dientich" id="dientich" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="hinhanh">Hình Ảnh</label>
                        <input type="file" name="hinhanh" id="hinhanh" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="anhphu1">Ảnh Phụ 1</label>
                        <input type="file" name="anhphu1" id="anhphu1" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="anhphu2">Ảnh Phụ 2</label>
                        <input type="file" name="anhphu2" id="anhphu2" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="anhphu3">Ảnh Phụ 3</label>
                        <input type="file" name="anhphu3" id="anhphu3" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="anhphu4">Ảnh Phụ 4</label>
                        <input type="file" name="anhphu4" id="anhphu4" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="tinhtrang">Tình Trạng</label>
                        <select name="tinhtrang" id="tinhtrang" class="form-control">
                            <option value="">Chọn tình trạng</option>
                            <option value="Đang Cho Thuê">Đang cho thuê</option>
                            <option value="Đang Bán">Đang bán</option>
                            <option value="Đã Bán">Đã bán</option>
                            <option value="Đang Chờ Duyệt">Đang chờ duyệt</option>
                        </select>
                        <span class="form-error"></span>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Thêm Nhà Đất</button>
                    <a href="ql_nhadat.php" class="btn btn-danger">Quay Về</a>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/locales/bootstrap-datepicker.vi.min.js"></script>




</html>