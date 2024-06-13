<?php
try {
    // Kết nối tới cơ sở dữ liệu
    $conn = new PDO("mysql:host=localhost;dbname=quanly_muabannhatdat", 'root', '');

    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thiết lập chế độ font chữ
    $conn->query("set names utf8");

    // Lấy ID của quận/huyện từ Ajax request
    $districtId = $_POST['district_id'];

    // Truy vấn để lấy danh sách phường/xã của quận/huyện được chọn
    $sql = "SELECT * FROM wards WHERE district_id = :districtId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':districtId', $districtId);
    $stmt->execute();

    // Tạo dropdown options
    $options = '<option value="">Chọn một xã/phường</option>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['wards_id'] . '">' . $row['name'] . '</option>';
    }

    echo $options;
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
