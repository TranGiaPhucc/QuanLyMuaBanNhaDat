<?php
include("ketnoi.php");

//lẫy dữ liệu id cần xoá
$id_khachhang=$_GET['sid'];
try {
$sql = "DELETE FROM khachhang WHERE id_khachhang = '$id_khachhang'";

$stmt = $conn->query($sql);
echo "xoá dữ liệu thành công";
header("Location:trang_ql_kh.php");
} catch(PDOException $e) 
{
    echo "Lỗi: " . $e->getMessage();
}

?>
