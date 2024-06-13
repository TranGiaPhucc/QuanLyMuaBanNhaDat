
<?php 
try{
	//ket noi
	$conn=new PDO("mysql:host=localhost;dbname=quanly_muabannhatdat",'root','');
	//thiet lap che do loi
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//thiet lap che don font chu
	$conn->query("set names utf8");
	//thong bao thanh cong
	echo"Ket Noi Thanh Cong";
}
//nhanh ket noi that ba
catch(PDOException $e)
{
	echo"Ket Noi that Bai : ".$e->getMessage();
}
?>