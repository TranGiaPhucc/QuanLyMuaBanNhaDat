<?php
include("ketnoi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các biến $_POST đã được gửi hay chưa
    if (isset($_POST['id_nhadat']) && isset($_POST['ten_nhadat']) && isset($_POST['mota']) && isset($_POST['id_loai'])
     && isset($_POST['id_diachi']) && isset($_POST['gia'])
    && isset($_POST['dientich']) && isset($_POST['hinhanh']) && isset($_POST['tinhtrang']) && isset($_POST['maloaihinh'])) {

        $id_nhadat = $_POST['id_nhadat'];
        $ten_nhadat = $_POST['ten_nhadat'];
        $mota = $_POST['mota'];
        $id_loai = $_POST['id_loai'];
        $maloaihinh = $_POST['maloaihinh'];
        $id_diachi = $_POST['id_diachi'];
        $gia = $_POST['gia'];
        $dientich = $_POST['dientich'];
        $hinhanh = $_POST['hinhanh'];
        $anhphu1 = $_POST['anhphu1'];
        $anhphu2 = $_POST['anhphu2'];
        $anhphu3 = $_POST['anhphu3'];
        $anhphu4 = $_POST['anhphu4'];
        $tinhtrang = $_POST['tinhtrang'];

        try {
            $themsql = "INSERT INTO `nhadat` (`id_nhadat`, `ten_nhadat`, `mota`, `id_loai`, `maloaihinh`, `id_diachi`, `gia`, `dientich`, `hinhanh`, `anhphu1`, `anhphu2`, `anhphu3`, `anhphu4`, `tinhtrang`) 
                        VALUES ('$id_nhadat', '$ten_nhadat', '$mota', '$id_loai', '$maloaihinh', '$id_diachi', '$gia', '$dientich', '$hinhanh', '$anhphu1', '$anhphu2', '$anhphu3', '$anhphu4', '$tinhtrang')";
            $stmt = $conn->query($themsql);
            echo "Thêm dữ liệu thành công";
            header("Location: ql_nhadat.php"); // Chuyển hướng sau khi thêm dữ liệu thành công
        } catch(PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>


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