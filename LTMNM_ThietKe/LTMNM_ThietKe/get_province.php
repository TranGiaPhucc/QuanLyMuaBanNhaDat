<?php
try {
    // Kết nối tới cơ sở dữ liệu
    $conn = new PDO("mysql:host=localhost;dbname=quanly_muabannhatdat", 'root', '');

    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thiết lập chế độ font chữ
    $conn->query("set names utf8");

    // Truy vấn để lấy danh sách tỉnh/thành phố
    $sql = "SELECT * FROM province";
    $result = $conn->query($sql);

    // Tạo dropdown options
    $options = '<option value="">Chọn một tỉnh</option>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $options .= '<option value="' . $row['province_id'] . '">' . $row['name'] . '</option>';
    }

    echo $options;
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
