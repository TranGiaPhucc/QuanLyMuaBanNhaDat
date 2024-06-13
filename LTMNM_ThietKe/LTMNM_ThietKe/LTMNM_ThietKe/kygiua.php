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

<div class="container">
    <div class="row">
        <div class="col-md-9">
        <?php
// Kiểm tra người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Kết nối CSDL
include("ketnoi.php");

// Lấy id_khachhang của người dùng từ bảng khachhang dựa trên username đã đăng nhập
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT id_khachhang FROM khachhang WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$id_khachhang = $result['id_khachhang'];

// Truy vấn để lấy thông tin từ bảng ct_kygiua kết hợp với bảng loai_hinh
$sql = "SELECT ct_kygiua.*, loai_hinh.tenloaihinh 
        FROM ct_kygiua 
        INNER JOIN loai_hinh ON ct_kygiua.maloaihinh = loai_hinh.maloaihinh
        WHERE ct_kygiua.id_kygiua IN (SELECT id_kygiua FROM kygiua WHERE id_khachhang = :id_khachhang)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_khachhang', $id_khachhang);
$stmt->execute();

// Kiểm tra số lượng bản ghi trả về
if ($stmt->rowCount() > 0) {
    // Bắt đầu của bảng
    echo "<table class='table table-borderless table-shopping-cart'>";
    // Phần <thead> của bảng
    echo "<thead class='text-muted'>";
    echo "<tr class='small text-uppercase'>";
    echo "<th scope='col' width='120'>Sản Phẩm</th>";
    echo "<th scope='col' width='120'>Giá Bán</th>";
    echo "<th scope='col' width='120'>Loại Hình</th>";
    echo "<th scope='col' width='120'>Sự Kiện</th>";
    echo "</tr>";
    echo "</thead>";
    // Phần <tbody> của bảng
    echo "<tbody>";

    // Lặp qua từng bản ghi và hiển thị thông tin
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Hiển thị thông tin
        echo "<tr id='product_row_" . $row["id_ctkygiua"] . "'>";
        echo "<td>";
        echo "<figure class='itemside'>";
        echo "<div class='aside'><img src='images/items/" . $row["hinhanh"] . "' class='img-sm'></div>";
        echo "<figcaption class='info'>";
        echo "<a href='#' class='title text-dark'>" . (strlen($row["ten_nhadat"]) > 10 ? substr($row["ten_nhadat"], 0, 15) . "..." : $row["ten_nhadat"]) . "</a>";
        echo "<p class='text-muted small'>Diện Tích: " . $row["dientich"] . ", Loại Hình: " . $row["tenloaihinh"] . "</p>";
        echo "</figcaption>";
        echo "</figure>";
        echo "</td>";
        echo "<td>";
        echo "<div class='price-wrap'>";
        echo "<var class='price'>" . $row["gia"] . "</var>";
        echo "</div>"; // price-wrap
        echo "</td>";
        echo "<td>" . $row["tenloaihinh"] . "</td>";
        echo "<td class='text-right'>";
        echo "<form method='POST' action='delete_record.php' style='display:inline;'>";
        echo "<input type='hidden' name='id_ctkygiua' value='" . $row["id_ctkygiua"] . "' />";
        echo "<button type='submit' class='btn btn-light'>Delete</button>";
        echo "</form>";
        echo "<a href='#' class='btn btn-light'>Cập Nhật</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}
?>

            
        </div>

        <aside class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                        <!--     <label>Have coupon?</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="" placeholder="Coupon code">
                                <span class="input-group-append"> 
                                    <button class="btn btn-primary">Apply</button>
                                </span>
                            </div>
                        </div>-->
                    </form>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Số Lượng:</dt>
                        <dd class="text-right" id="recordCount"></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Tổng Tiền:</dt>
                        <dd class="text-right" id="total"></dd>
                    </dl>

                    <hr>
                    <p class="text-center mb-3">
                        <img src="images/misc/payments.png" height="26">
                    </p>
                    <div class="form-group col-md">
        <a href="#" class="btn btn-danger">Đặt Lịch</a>
        <a href="#" class="btn btn-danger">Liên hệ</a>
    </div>
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
    <div class="form-group col-md">
    <button class="btn btn-danger" onclick="deleteAllRecords()">Xoá All</button>
</div>

</div>

<script>
function confirmAndRemove(id_ctkygiua) {
    if (confirm("Bạn có chắc chắn muốn xóa bản ghi này?")) {
        // Tạo một đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_ct_kygiua.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Xử lý phản hồi từ máy chủ
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Xóa dòng khỏi bảng
                        var row = document.getElementById('product_row_' + id_ctkygiua);
                        if (row) {
                            row.parentNode.removeChild(row);
                        }
                        alert("Bản ghi đã được xóa thành công!");
                    } else {
                        alert("Đã xảy ra lỗi: " + response.message);
                    }
                } else {
                    alert("Đã xảy ra lỗi khi gửi yêu cầu.");
                }
            }
        };

        // Gửi yêu cầu cùng với id_ctkygiua
        xhr.send("id_ctkygiua=" + id_ctkygiua);
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function deleteAllRecords() {
    if (confirm("Bạn có chắc chắn muốn xoá tất cả bản ghi không?")) {
        // Gửi yêu cầu AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Nếu yêu cầu thành công, cập nhật giao diện
                    alert("Xoá tất cả bản ghi thành công!");
                    // Cập nhật giao diện ở đây nếu cần
                } else {
                    // Xử lý lỗi
                    alert("Đã xảy ra lỗi khi xoá tất cả bản ghi.");
                }
            }
        };
        xhr.open("GET", "delete_all_kygiu.php", true);
        xhr.send();
    }
}

</script>


<!-- Script để tính tổng giá trị của các bản ghi và đếm số lượng bản ghi -->
<script>
    function calculateTotalAndRecordCount() {
        var prices = document.querySelectorAll('.price');
        var total = 0;
        for (var i = 0; i < prices.length; i++) {
            var price = prices[i].textContent.replace('$', '');
            total += parseInt(price);
        }
        document.getElementById('total').innerText = total; // Sử dụng innerText thay vì value

        var recordCount = prices.length; // Đếm số lượng bản ghi
        document.getElementById('recordCount').innerText = recordCount; // Sử dụng innerText thay vì value
    }

    calculateTotalAndRecordCount(); // Gọi hàm tính tổng và đếm bản ghi khi trang được tải

    // Hàm xử lý khi nhấn nút Đặt Lịch Hẹn
    function makeAppointment() {
        // Viết logic xử lý khi nhấn nút Đặt Lịch Hẹn ở đây
        alert("Chức năng này sẽ được xử lý trong tương lai.");
    }
    document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll("form button[type='submit']");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const form = this.closest("form");
            const formData = new FormData(form);
            const rowId = form.closest("tr").id;

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    document.getElementById(rowId).remove();
                } else {
                    alert('Xóa không thành công. Vui lòng thử lại.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Xóa không thành công. Vui lòng thử lại.');
            });
        });
    });
});

</script>




</body>
</html>
