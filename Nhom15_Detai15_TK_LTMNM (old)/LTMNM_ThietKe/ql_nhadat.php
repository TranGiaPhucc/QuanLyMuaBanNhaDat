<?php
include("ketnoi.php");

$sql = "SELECT nhadat.id_nhadat, nhadat.tinhtrang,nhadat.hinhanh,nhadat.ten_nhadat, nhadat.mota, loai_nhadat.tenloai, diachinhadat.xa_phuong, diachinhadat.huyen_quan, diachinhadat.tinhthanh 
        FROM nhadat
        INNER JOIN loai_nhadat ON nhadat.id_loai = loai_nhadat.id_loai
        INNER JOIN diachinhadat ON nhadat.id_diachi = diachinhadat.id_diachi";

$results = $conn->query($sql);
$row = $results->fetch(PDO::FETCH_ASSOC);


// Truy vấn dữ liệu từ bảng loai_nhadat
$query_loai = "SELECT * FROM loai_nhadat";
$result_loai = $conn->query($query_loai);

// Truy vấn dữ liệu từ bảng diachinhadat
$query_diachi = "SELECT * FROM diachinhadat";
$result_diachi = $conn->query($query_diachi);




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
				<aside class="">
                    <nav class="list-group">
                        <a class="list-group-item" href="#"> Tài Khoản</a>
                        <a class="list-group-item " href="#"> Thông Tin Cá Nhân </a>
                        <a class="list-group-item " href="#"> Cập Nhập Thông Tin </a>
                        <a class="list-group-item  " href="trang_ql_kh.php">Quản Lý Khách Hàng</a>
						<a class="list-group-item active" href="#">Quản Lý Nhà Đất</a>
						<a class="list-group-item" href="#">Quản Lý Bán</a>
					
                        <a class="list-group-item" href="#">Thông Tin Lịch Hẹn</a>
                        <a class="list-group-item" href="#"> Đăng Xuất </a>
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
 while($row = $results->fetch(PDO::FETCH_ASSOC))
{
?>
<tr>
<td><?php echo $row["id_nhadat"]; ?></td>
<td><?php 
    $ten_nhadat = $row["ten_nhadat"];
    echo strlen($ten_nhadat) > 10 ? substr($ten_nhadat, 0, 15) . "..." : $ten_nhadat; 
?></td>
<td><img src="images/banners/<?php echo $row["hinhanh"]; ?>" width="30" height="30" /></td>
<td><?php  echo $row["tenloai"];; ?></td>
<td><?php echo  $row["tinhtrang"]; ?></td>

<td>
			<div class="form-group col-md">
			<a href="edit_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>" class="btn btn-danger">Edit</a>


				<a href="detail_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>"  class="btn  btn-danger"> 
				<i class=""></i> <span class="text">Details</span> 
			</a>

<a href="xoa_nhadat.php?sid=<?php echo $row["id_nhadat"]; ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn Xoá Không?');">Delete</a>


  

			</div>
           
        </td>
</tr>
<?php } ?>
</table>


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
                        <label for="id_nhadat">ID Nhà Đất</label>
                        <input type="text" name="id_nhadat" id="id_nhadat" class="form-control">
                        <span class="form-error"></span>
                    </div>
                    
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

                    
                    <div class="form-group">
                        <label for="id_diachi">ID Địa Chỉ</label>
                        <select name="id_diachi" id="id_diachi" class="form-control">
                            <?php
                            // Lặp qua kết quả từ truy vấn bảng diachinhadat và tạo option cho combobox
                            while ($row_diachi = $result_diachi->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row_diachi['id_diachi'] . "'>" . $row_diachi['xa_phuong'] . ", " . $row_diachi['huyen_quan'] . ", " . $row_diachi['tinhthanh'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="form-error"></span>
                    </div>
                    
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