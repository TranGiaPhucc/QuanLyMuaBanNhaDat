<?php
include("ketnoi.php"); // Kết nối CSDL
session_start();
$error_message = '';
$success_message = '';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['username'])) {
    // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: Trang_DangNhap.php");
    exit;
}

// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_SESSION['username'];
    $ten_nhadat = $_POST['ten_nhadat'];
    $mota = $_POST['mota'];
    $maloaihinh = $_POST['maloaihinh'];
    $gia = $_POST['gia'];
    $dientich = $_POST['dientich'];
    $hinhanh = $_POST['hinhanh'];
    $anhphu1 = $_POST['anhphu1'];
    $anhphu2 = $_POST['anhphu2'];
    $anhphu3 = $_POST['anhphu3'];
    $anhphu4 = $_POST['anhphu4'];
    $ID_Tinh = $_POST['province'];
    $ID_Huyen_Quan = $_POST['district'];
    $ID_Xa_Duong = $_POST['wards'];
    $Thon_SoNha = $_POST['thon_sonha'];

    // Truy vấn để lấy id_khachhang từ bảng khachhang dựa trên username
    try {
        $stmt = $conn->prepare("SELECT id_khachhang FROM khachhang WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_khachhang = $result['id_khachhang'];
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    // Hàm để tạo id_kygiua mới với định dạng KGxxx
    function generateIdKygiua($conn)
    {
        try {
            // Lấy mã id_kygiua lớn nhất hiện tại từ cơ sở dữ liệu
            $stmt = $conn->prepare("SELECT MAX(SUBSTRING(id_kygiua, 3)) AS max_id FROM kygiua");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $maxId = $result['max_id'];

            // Tăng mã id_kygiua lớn nhất hiện tại lên 1
            $nextId = $maxId + 1;

            // Format lại id_kygiua theo định dạng KGxxx
            $formattedId = 'KG' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
            return $formattedId;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Hàm để tạo id_ctkygiua mới với định dạng CTKGxxx
    function generateIdCTKygiua($conn)
    {
        try {
            // Lấy mã id_ctkygiua lớn nhất hiện tại từ cơ sở dữ liệu
            $stmt = $conn->prepare("SELECT MAX(SUBSTRING(id_ctkygiua, 5)) AS max_id FROM CT_kygiua");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $maxId = $result['max_id'];

            // Tăng mã id_ctkygiua lớn nhất hiện tại lên 1
            $nextId = $maxId + 1;

            // Format lại id_ctkygiua theo định dạng CTKGxxx
            $formattedId = 'CTKG' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
            return $formattedId;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Kiểm tra xem người dùng đã có bản ghi trong bảng kygiua hay chưa
    try {
        $stmt = $conn->prepare("SELECT id_kygiua, trang_thai FROM kygiua WHERE id_khachhang = :id_khachhang");
        $stmt->bindParam(':id_khachhang', $id_khachhang);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $createNewKygiua = true;

        // Kiểm tra nếu có bản ghi với trạng thái 'Dang Cho Ky Giua'
        foreach ($results as $result) {
            if ($result['trang_thai'] == 'Dang Cho Ky Giua') {
                $id_kygiua = $result['id_kygiua'];
                $createNewKygiua = false;
                break;
            }
        }

        if ($createNewKygiua || empty($results)) {
            // Nếu không có bản ghi với trạng thái 'Dang Cho Ky Giua' hoặc chưa có bản ghi nào, tạo id_kygiua mới và thêm vào bảng kygiua
            $id_kygiua = generateIdKygiua($conn);

            // Thực hiện truy vấn SQL để thêm dữ liệu vào bảng kygiua
            $sql_kygiua = "INSERT INTO kygiua (id_kygiua, id_khachhang, trang_thai) VALUES (:id_kygiua, :id_khachhang, :trang_thai)";
            $stmt_kygiua = $conn->prepare($sql_kygiua);
            $stmt_kygiua->bindParam(':id_kygiua', $id_kygiua);
            $stmt_kygiua->bindParam(':id_khachhang', $id_khachhang);
            $stmt_kygiua->bindParam(':trang_thai', $trang_thai);
            $trang_thai = 'Dang Cho Ky Giua'; // Giá trị mặc định
            $stmt_kygiua->execute();
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    // Tạo id_ctkygiua mới
    $id_ctkygiua = generateIdCTKygiua($conn);

    // Thực hiện truy vấn SQL để thêm dữ liệu vào bảng CT_kygiua
    $sql_ctkygiua = "INSERT INTO CT_kygiua (id_ctkygiua, id_kygiua, ten_nhadat, mota, maloaihinh, gia, dientich, hinhanh, anhphu1, anhphu2, anhphu3, anhphu4, ID_Tinh, ID_Huyen_Quan, ID_Xa_Duong, Thon_SoNha) 
                     VALUES (:id_ctkygiua, :id_kygiua, :ten_nhadat, :mota, :maloaihinh, :gia, :dientich, :hinhanh, :anhphu1, :anhphu2, :anhphu3, :anhphu4, :ID_Tinh, :ID_Huyen_Quan, :ID_Xa_Duong, :Thon_SoNha)";
    $stmt_ctkygiua = $conn->prepare($sql_ctkygiua);
    $stmt_ctkygiua->bindParam(':id_ctkygiua', $id_ctkygiua);
    $stmt_ctkygiua->bindParam(':id_kygiua', $id_kygiua);
    $stmt_ctkygiua->bindParam(':ten_nhadat', $ten_nhadat);
    $stmt_ctkygiua->bindParam(':mota', $mota);
    $stmt_ctkygiua->bindParam(':maloaihinh', $maloaihinh);
    $stmt_ctkygiua->bindParam(':gia', $gia);
    $stmt_ctkygiua->bindParam(':dientich', $dientich);
    $stmt_ctkygiua->bindParam(':hinhanh', $hinhanh);
    $stmt_ctkygiua->bindParam(':anhphu1', $anhphu1);
    $stmt_ctkygiua->bindParam(':anhphu2', $anhphu2);
    $stmt_ctkygiua->bindParam(':anhphu3', $anhphu3);
    $stmt_ctkygiua->bindParam(':anhphu4', $anhphu4);
    $stmt_ctkygiua->bindParam(':ID_Tinh', $ID_Tinh);
    $stmt_ctkygiua->bindParam(':ID_Huyen_Quan', $ID_Huyen_Quan);
    $stmt_ctkygiua->bindParam(':ID_Xa_Duong', $ID_Xa_Duong);
    $stmt_ctkygiua->bindParam(':Thon_SoNha', $Thon_SoNha);

    // Thực hiện các truy vấn và kiểm tra kết quả
    try {
        $conn->beginTransaction();
        $stmt_ctkygiua->execute();
        $conn->commit();
        $success_message = "Đã Thêm thành công!";
    } catch (PDOException $e) {
        $conn->rollBack();
        $error_message = "Lỗi: Không thể thêm dữ liệu. " . $e->getMessage();
    }

    // Đóng kết nối CSDL
    $conn = null;
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

	
	

	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-5 col-lg-3 col-md-4 col-6">
				<div class="card bg-dark">
			  <img src="images/banners/Mua_Thue03.jfif" class="card-img opacity">
			   <div class="card-img-overlay text-white">
			    <h5 class="card-title">Cam kết với khách hàng</h5>
				  <p class="card-text"><small class="text-body-secondary">* Đặt khách hàng làm trọng tâm trong mọi quyết định<br>* Những điều đã nói là những điều được làm <br> * Đảm bảo thực thi (Miễn phí các dịch vụ cao cấp nếu không bán được nhà)</small></p>
				    <h5 class="card-title">Miễn phí các dịch vụ bổ sung</h5>
				   <p class="card-text"><small class="text-body-secondary">* Dịch vụ chụp ảnh chuyên nghiệpHình ảnh chất lượng cao, chuyên nghiệp Tiết kiệm đến 1.000.000 đồng so với thị trường <br>* Dịch vụ thực tế ảo (3D)Trải nghiệm xem nhà như thật, chốt giao dịch nhanhTiết kiệm đến 5.000.000 đồng so với thị trường</small></p>
				  	
			  </div>
			</div>
				</div>
		<div class="col-xl-7 col-lg-9 col-md-12 col-12">
			
				<div class="card mb-4">
      <div class="card-body">
	  <h4 class="card-title mb-4">Thông Tin Nhà Đất</h4>
<form action="TrangBan.php" method="POST" onsubmit="return Validate()">
    <div class="form-group">
        <label>User Name</label>
        <input type="text" name="username" class="form-control" value="">
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
        <label for="maloaihinh">Loại Hình</label>
        <select name="maloaihinh" id="maloaihinh" class="form-control">
            <?php
            include("ketnoi.php");
            $query_loaihinh = "SELECT * FROM `loai_hinh`";
            $result_loaihinh = $conn->query($query_loaihinh);
            while ($row_loaihinh = $result_loaihinh->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row_loaihinh['maloaihinh'] . "'>" . $row_loaihinh['tenloaihinh'] . "</option>";
            }
            ?>
        </select>
        <span class="form-error"></span>
    </div>
    <div class="form-group">
        <label for="province">Tỉnh/Thành phố</label>
        <select id="province" name="province" class="form-control">
            <option value="">Chọn một tỉnh</option>
        </select>
        <span class="form-error"></span>
    </div>
    <div class="form-group">
        <label for="district">Quận/Huyện</label>
        <select id="district" name="district" class="form-control">
            <option value="">Chọn một quận/huyện</option>
        </select>
    </div>
    <div class="form-group">
        <label for="wards">Phường/Xã</label>
        <select id="wards" name="wards" class="form-control">
            <option value="">Chọn một xã/phường</option>
        </select>
    </div>
    <div class="form-group">
        <label>Thôn/Số Nhà</label>
        <input type="text" class="form-control" name="thon_sonha" id="thon_sonha">
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
    <button type="submit" class="btn btn-primary btn-block">Thêm Vào Ký Gửi</button>
</form>
<?php
if (!empty($error_message)) {
    echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
} elseif (!empty($success_message)) {
    echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
}
?>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->
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

			
			
			
		<!--	<div class="card mb-4">
      <div class="card-body">
      <h4 class="card-title mb-4">Thông Tin Liên Hệ </h4>
     <form>

     	<div class="form-group">
	     	<img src="images/avatars/avatar2.jpg" class="img-sm rounded-circle border">
	     </div>
        <div class="form-row">
			<div class="col form-group">
				<label>Name</label>
			  	<input type="text" class="form-control" value="">
			</div>
			<div class="col form-group">
				<label>Email</label>
			  	<input type="email" class="form-control" value="">
			</div> 
		</div> 
		
		

		<div class="form-group">
			<label>Lời Nhắn</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>

		<button class="btn btn-primary btn-block">Gửi Thông Tin</button>
      </form>
      </div> 
				<br>
			</div>
    
			</div>-->
	
			
			</div>
		</div>
<!-- ============================ COMPONENT PROFILE END.// ================================= -->
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