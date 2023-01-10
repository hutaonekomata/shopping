<?php
$name=$_POST["name"];
$bug=$_POST["bug"];
$types=$_POST["types"];
$price=$_POST["price"];
$expiration=$_POST["expiration"];
$stock=$_POST["stock"];
$about=$_POST["about"];
$from=$_POST["from"];


$dsn='mysql:host=localhost;dbname=ei2031;charset=utf8';
$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';

try{
    $db=new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

    $stmt=$db->prepare(
        "
        insert
        into
        product(name,bug,type,price,expiration,about,stock) 
        values
        (
            :name,
            :bug,
            :type,
            :price,
            :expiration,
            :about,
            :stock
        );
        "
    );

    $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    $stmt->bindParam(':bug',$bug,PDO::PARAM_STR);
    $stmt->bindParam(':type',$types,PDO::PARAM_INT);
    $stmt->bindParam(':price',$price,PDO::PARAM_INT);
    $stmt->bindParam(':expiration',$expiration,PDO::PARAM_STR);
    $stmt->bindParam(':about',$about,PDO::PARAM_STR);
    $stmt->bindParam(':stock',$stock,PDO::PARAM_INT);

    $stmt->execute();

    header('Location : setting.html');
    exit();
}catch(PDOException $e){
    die('error:'.$e->getMessage());
}
include "verif.html";
?>