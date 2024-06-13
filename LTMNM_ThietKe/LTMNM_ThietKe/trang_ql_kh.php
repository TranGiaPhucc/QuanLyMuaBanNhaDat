<?php
include("ketnoi.php");

//$sql = "select * from khachhang";
//$results = $conn->query($sql);


$limit = 2; // Số lượng bản ghi trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1
$start = ($page - 1) * $limit; // Vị trí bắt đầu lấy dữ liệu

// Truy vấn để lấy tổng số bản ghi
$total_records = $conn->query("SELECT COUNT(*) AS total FROM khachhang WHERE TinhTrang != 'Khong Ton Tai'")->fetchColumn();
$total_pages = ceil($total_records / $limit); // Tính tổng số trang

// Truy vấn để lấy dữ liệu cho trang hiện tại
$sql = "SELECT * FROM khachhang WHERE TinhTrang != 'Khong Ton Tai' LIMIT $start, $limit";
$results = $conn->query($sql);




?>
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
    const idkhachhang = document.getElementById("idkhachhang").value.trim();
    const username=document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const hoten = document.getElementById("hoten").value.trim();
    const ngaysinh = document.getElementById("ngaysinh").value;
    const sdt = document.getElementById("sdt").value.trim();
    const diachi = document.getElementById("diachi").value.trim();

    let valida=true;
    // Xóa thông báo lỗi trước khi kiểm tra lại
   document.getElementById("idkhachhang").textContent = "";
    document.getElementById("password").nextElementSibling.textContent = "";
    document.getElementById("hoten").nextElementSibling.textContent = "";
    document.getElementById("sdt").nextElementSibling.textContent = "";
    document.getElementById("ngaysinh").nextElementSibling.textContent = "";

    // Kiểm tra ràng buộc 1: ID khách hàng
    if (!/^KH\d{3}$/.test(idkhachhang) || !idkhachhang) 
    {
        document.getElementById("idkhachhang").nextElementSibling.textContent = "Lỗi: ID khách hàng không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("idkhachhang").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }
  
    // Kiểm tra ràng buộc 2: Password
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/.test(password) || !password) {
        document.getElementById("password").nextElementSibling.textContent = "Lỗi: Password không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("password").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 3: Họ tên không chứa số
    if (/\d/.test(hoten)|| !hoten ) {
        document.getElementById("hoten").nextElementSibling.textContent = "Lỗi: Họ tên không được chứa số!";
        valida=false;
    }
    else {
        document.getElementById("hoten").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 4: Số điện thoại hợp lệ
    var phoneRegex = /^\d{10}$/;
    var viettelPattern = /^(096|097|098|032|033|034|035|036|037|038|039)\d{7}$/;
    var mobiPattern = /^(090|093|070|079|077|076|078)\d{7}$/;
    var vinaphonePattern = /^(091|094|083|084|085|081|082)\d{7}$/;

    if (!phoneRegex.test(sdt) || (!viettelPattern.test(sdt) && !mobiPattern.test(sdt) && !vinaphonePattern.test(sdt)) ) {
        document.getElementById("sdt").nextElementSibling.textContent = "Lỗi: Số điện thoại không hợp lệ!";
        valida=false;
    }
    else {
        document.getElementById("sdt").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    // Kiểm tra ràng buộc 5: Ngày sinh phải đủ 18 tuổi
    var tuoi18 = new Date();
    tuoi18.setFullYear(tuoi18.getFullYear() - 18);
    if (new Date(ngaysinh) > tuoi18) {
        document.getElementById("ngaysinh").nextElementSibling.textContent = "Lỗi: Ngày sinh không đủ 18 tuổi!";
        valida=false;
    }
    else {
        document.getElementById("ngaysinh").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
    }

    //kiểm tra rỗng username/địa chỉ
    if(!username)
    {
        document.getElementById("username").nextElementSibling.textContent = "Lỗi: User Name Không được bỏ trống!";
        valida=false;
    }
    else {
        document.getElementById("username").nextElementSibling.textContent = ""; // Xóa thông báo lỗi khi điều kiện đúng
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
	

</header> <!-- section-header.// -->


	
	
	
<!-----Main------>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-4 col-6">
      <nav class="list-group">
                    <a class="list-group-item " href="TrangTTCN_Admin.php"> Tài Khoản</a>
                    <a class="list-group-item" href="TrangTTCN_Admin.php"> Thông Tin Cá Nhân </a>
                    <a class="list-group-item" href="CapNhap_TTCN_ADMIN.php"> Cập Nhập Thông Tin </a>
                    <a class="list-group-item active" href="trang_ql_kh.php">Quản Lý Khách Hàng</a>
                    <a class="list-group-item" href="trang_ql_nhanvien.php">Quản Lý Nhân Viên</a>
                    <a class="list-group-item " href="ql_nhadat.php">Quản Lý Nhà Đất</a>
                    <a class="list-group-item" href="quanlykygiua.php">Quản Lý Ky Giua</a>
                    <a class="list-group-item " href="TrangBieuDoThongKe.php">Thông Kê Doanh Số </a>
                    <a class="list-group-item " href="TrangThongTinLichHen.php">Thông Tin Lịch Hẹn</a>
                    <a class="list-group-item" href="dangxuat.php?logout"> Đăng Xuất </a>
            </nav>
				</div>
		<div class="col-xl-9 col-lg-9 col-md-12 col-12">
		<article class="card mb-3">
		<div class="card-body">
		<caption>
			<hl style="text-align: center;">Thông Tin Khách Hàng</hl>
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
      <td><strong>ID Khách Hàng </strong></td>
      <td><strong>Họ Tên </strong></td>
      <td><strong>Ngày Sinh </strong></td>
      <td><strong>SĐT</strong></td>
      <td><stong>Sự Kiện</stong></td>
</tr>

<?php
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
?>
<tr>
        <td><?php echo $row['id_khachhang']; ?></td>
        <td><?php echo $row['hoten_kh']; ?></td>
        <td><?php echo $row['ngaysinh']; ?></td>
        <td><?php echo $row['sdt_kh']; ?></td>

<td>
			<div class="form-group col-md">
			  <a href="editkh.php?sid=<?php echo $row['id_khachhang']; ?>" class="btn btn-danger">
        <i class=""></i> <span class="text">Edit</span> </a>


				<a href="detailKH.php?sid=<?php echo $row['id_khachhang']; ?>"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Details</span> 
			</a>

      <a href="xoaKh.php?sid=<?php echo $row['id_khachhang']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn Xoá Không?');">Delete</a>


  

			</div>
           
        </td>
      
       
</tr>
<?php } ?>

        
</table>
<div style="margin-left: 250px;">
<?php
if ($page > 1)
  echo "<a href='?page=". $page - 1 ."' style='margin-right: 30px;'' class='btn btn-danger'><</a> ";
$a = 1;
for ($i = 1; $i <= $total_pages; $i++) {
  if (($i < $page - $a && $i == 2) || ($i > $page + $a && $i == $total_pages - 1))
				echo "...";
        if ($i == 1 || $i == $total_pages || ($i >= $page - $a && $i <= $page + $a))
    echo "<a href='?page=". $i . "' style='margin-right: 10px;'' class='btn btn-danger'>" . $i . "</a> ";

}
if ($page < $total_pages)
  echo "<a href='?page=". $page + 1 ."' style='margin-left: 30px;'' class='btn btn-danger'>></a> ";
?>
</div>


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

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm Khách Hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="ThemKH.php" method="post" onsubmit="return Validate()">
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="repeatPassword">Nhập lại mật khẩu</label>
        <input type="password" name="repeatPassword" id="repeatPassword" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="hoten_kh">Họ tên</label>
        <input type="text" name="hoten_kh" id="hoten_kh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="gender">Giới tính</label>
        <select name="gender" id="gender" class="form-control">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sdt_kh">Số điện thoại</label>
        <input type="text" name="sdt_kh" id="sdt_kh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="province">Tỉnh/Thành phố</label>
        <!-- Điền mã JavaScript để tạo danh sách tỉnh/thành phố -->
        <select id="province" name="province" class="form-control">
            <option value="">Chọn Tỉnh/Thành phố</option>
        </select>
    </div>
    <div class="form-group">
        <label for="district">Quận/Huyện</label>
        <!-- Điền mã JavaScript để tạo danh sách quận/huyện -->
        <select id="district" name="district" class="form-control">
            <option value="">Chọn Quận/Huyện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="wards">Phường/Xã</label>
        <!-- Điền mã JavaScript để tạo danh sách phường/xã -->
        <select id="wards" name="wards" class="form-control">
            <option value="">Chọn Phường/Xã</option>
        </select>
    </div>
    <div class="form-group">
        <label for="thon_sonha">Thôn/Số nhà</label>
        <input type="text" name="thon_sonha" id="thon_sonha" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Thêm Khách Hàng</button>
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