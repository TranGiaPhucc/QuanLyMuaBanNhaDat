<?php
include("ketnoi.php");

// Lấy dữ liệu id cần xóa
$id_nhadat = $_GET['sid'];
try {
    $sql = "DELETE FROM nhadat WHERE id_nhadat = '$id_nhadat'";

    $stmt = $conn->query($sql);
    echo "Xóa dữ liệu thành công";
    header("Location: ql_nhadat.php");
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
