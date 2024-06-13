<?php 
require 'ketnoi.php';

$province_id = $_GET['province_id'];

$sql = "SELECT * FROM `district` WHERE `province_id` = :province_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':province_id', $province_id);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = [];
foreach ($data as $row) {
    $output[] = [
        'id' => $row['district_id'],
        'name'=> $row['name']
    ];
}
echo json_encode($output);
?>
