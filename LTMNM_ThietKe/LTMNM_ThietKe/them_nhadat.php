<?php
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các biến $_POST đã được gửi hay chưa
    if (isset($_POST['ten_nhadat']) && isset($_POST['mota']) && isset($_POST['id_loai'])
        && isset($_POST['province']) && isset($_POST['district'])  && isset($_POST['wards']) && isset($_POST['gia'])
        && isset($_POST['dientich']) && isset($_POST['hinhanh']) && isset($_POST['tinhtrang']) && isset($_POST['maloaihinh'])) {

            $query_max_id = "SELECT MAX(CAST(SUBSTRING(id_nhadat, 3) AS UNSIGNED)) AS max_id FROM nhadat";
            $result_max_id = $conn->query($query_max_id);
            $row_max_id = $result_max_id->fetch(PDO::FETCH_ASSOC);
            $max_id = intval($row_max_id['max_id']); // Chuyển đổi max_id thành số nguyên
        
            // Tạo ID mới bằng cách tăng giá trị lớn nhất thêm 1 và đảm bảo tính duy nhất
            do {
                $new_id_number = $max_id + 1;
                $new_id = 'ID' . sprintf('%03d', $new_id_number);
        
                // Kiểm tra xem ID mới có tồn tại trong cơ sở dữ liệu không
                $query_check_id = "SELECT COUNT(*) FROM nhadat WHERE id_nhadat = :new_id";
                $stmt_check_id = $conn->prepare($query_check_id);
                $stmt_check_id->bindParam(':new_id', $new_id);
                $stmt_check_id->execute();
                $id_exists = $stmt_check_id->fetchColumn();
        
                if ($id_exists == 0) {
                    // ID là duy nhất
                    break;
                }
        
                // Nếu ID đã tồn tại, tăng max_id và thử lại
                $max_id++;
            } while (true);




        // Lấy dữ liệu từ form
        $ten_nhadat = $_POST['ten_nhadat'];
        $mota = $_POST['mota'];
        $id_loai = $_POST['id_loai'];
        $maloaihinh = $_POST['maloaihinh'];
        $id_tinh = $_POST['province'];
        $id_quanhuyen=$_POST['district'];
        $id_duongxa=$_POST['wards'];
        $gia = $_POST['gia'];
        $dientich = $_POST['dientich'];
        $hinhanh = $_POST['hinhanh'];
        $anhphu1 = $_POST['anhphu1'];
        $anhphu2 = $_POST['anhphu2'];
        $anhphu3 = $_POST['anhphu3'];
        $anhphu4 = $_POST['anhphu4'];
        $tinhtrang = $_POST['tinhtrang'];

        try {
            // Thực hiện truy vấn INSERT với ID tự động và dữ liệu từ form
            $themsql = "INSERT INTO `nhadat` (`id_nhadat`, `ten_nhadat`, `mota`, `id_loai`, `maloaihinh`, `ID_Tinh`,`ID_Huyen_Quan`,`ID_Xa_Duong`, `gia`, `dientich`, `hinhanh`, `anhphu1`, `anhphu2`, `anhphu3`, `anhphu4`, `tinhtrang`) 
                        VALUES ('$new_id', '$ten_nhadat', '$mota', '$id_loai', '$maloaihinh', '$id_tinh','$id_quanhuyen','$id_duongxa', '$gia', '$dientich', '$hinhanh', '$anhphu1', '$anhphu2', '$anhphu3', '$anhphu4', '$tinhtrang')";
            $stmt = $conn->query($themsql);
            echo "Thêm dữ liệu thành công";
            header("Location: ql_nhadat.php"); // Chuyển hướng sau khi thêm dữ liệu thành công
            exit(); // Dừng kịch bản để tránh chạy mã phía dưới (nếu có)
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

