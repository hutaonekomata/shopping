<?php
try{
session_start();
$userID = $_SESSION['session_id'];
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = '
    select * from product inner join sales on product.id=sales.productID where userID=:id;
';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$userID,PDO::PARAM_STR);
$res = $stmt->execute();
if($res){
    $data = $stmt->fetchAll();
    $his_list=json_encode($data);
}
$pdo=null;
}catch(PDOException $e){

echo $e->getMessage();
}
?>