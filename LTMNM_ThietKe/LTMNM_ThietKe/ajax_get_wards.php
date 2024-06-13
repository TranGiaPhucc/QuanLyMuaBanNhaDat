<?php 
require 'ketnoi.php';

$district_id = $_GET['district_id'];

$sql = "SELECT * FROM `wards` WHERE `district_id` = :district_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':district_id', $district_id);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = [];
foreach ($data as $row) {
    $output[] = [
        'id' => $row['wards_id'],
        'name'=> $row['name']
    ];
}
echo json_encode($output);
?>
