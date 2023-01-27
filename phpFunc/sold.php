<?php
try{
$userID = $_COOKIE['session_id'];
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// select section
$sql = '
    select productID,num from cart where userID=:id;
';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$userID,PDO::PARAM_STR);
$res = $stmt->execute();
if($res){
    $data = $stmt->fetchAll();
    // insert section
    $sql = '
        insert into sales(productID,userID,num,sold) values(:productID,:id,:num,:day);
    ';
    foreach($data as $value){
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':productID',$value['productID'],PDO::PARAM_INT);
        $stmt->bindParam(':id',$userID,PDO::PARAM_INT);
        $stmt->bindParam(':num',$value['num'],PDO::PARAM_INT);
        $stmt->bindParam(':day',data("Y-m-d"),PDO::PARAM_STR);
        $res = $stmt->execute();
    }
}
// delete section
$sql = '
    delete from cart where `userID`=:id;
';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id',$userID,PDO::PARAM_STR);
$res = $stmt->execute();
// if($res){
    // $url=$_SERVER['HTTP_REFERER'];
    $url='https://alumni.hamako-ths.ed.jp/~ei2031/shopping/page/thanks.php';
    header('Location:'.$url);
// }
$pdo=null;
exit();
}catch(PDOException $e){

echo $e->getMessage();
}
?>