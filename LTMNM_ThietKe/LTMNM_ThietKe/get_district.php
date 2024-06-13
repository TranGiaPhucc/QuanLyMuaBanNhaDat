<?php
try {
    // Kết nối tới cơ sở dữ liệu
    $conn = new PDO("mysql:host=localhost;dbname=quanly_muabannhatdat", 'root', '');

    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thiết lập chế độ font chữ
    $conn->query("set names utf8");

    // Lấy ID của tỉnh/thành phố từ Ajax request
    $provinceId = $_POST['province_id'];

    // Truy vấn để lấy danh sách quận/huyện của tỉnh/thành phố được chọn
    $sql = "SELECT * FROM district WHERE province_id = :provinceId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':provinceId', $provinceId);
    $stmt->execute();

    // Tạo dropdown options
    $options = '<option value="">Chọn một quận/huyện</option>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['district_id'] . '">' . $row['name'] . '</option>';
    }

    echo $options;
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
