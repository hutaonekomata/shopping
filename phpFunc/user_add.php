<?php
$username=$_GET['username'];
$email=$_GET['email'];
$pass=$_GET['password'];
$address=$_GET['location'];


try{
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_get='
select * from user where `email` = :email;
';

$stmt = $pdo->prepare($sql_get);

$stmt->bindParam(`:email`,$email,PDO::PARAM_STR);

$judge=false;

$res = $stmt->execute();
if($res){
    $data = $stmt->fetch();
    var_dump($data);
    if(empty($data)){
       $judge=true; 
    }
}

$sql_insert = '
insert into user (`name`,`Email`,`password`,`address`) values(
    :name,
    :Email,
    :password,
    :address
);
';

$stmt = $pdo->prepare($sql_insert);
$stmt->bindValue(':name',$username);
$stmt->bindValue(':Email',$email);
$stmt->bindValue(':password',$pass);
$stmt->bindValue(':address',$address);

if($judge){
    $pdo=null;
    $stmt->execute();
    header('Location: https://alumni.hamako-ths.ed.jp/~ei2031/shopping/login.html');
    exit();
}else{
    $pdo=null;
    $alert = "<script type='text/javascript'>alert('既に登録されているメールアドレスです');</script>";
    header('Location: https://alumni.hamako-ths.ed.jp/~ei2031/shopping/header.html');
    exit();
}

$pdo=null;
}catch(PDOException $e){
    echo $e->getMessage();
}
?>