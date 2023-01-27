<?php
//product_get(): data[][] || null
function product_get($pdo, $sql)
{
    $statement = $pdo->prepare($sql);
    $res = $statement->execute();
    if ($res) {
        return $statement->fetchAll();
    } else {
        return null;
    }
}

$pdo_config = 'mysql:host=localhost;dbname=ei2031';
$user = 'ei2031';
$password = 'ei2031@alumni.hamako-ths.ed.jp';
$option = '[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';
try {

    $pdo = new PDO($pdo_config, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_product = '
    select * from product;
';

    $stmt = $pdo->prepare($sql_product);
    $res = $stmt->execute();
    $judge = false;

    $json_array = [];

    if ($res) {
        $data = $stmt->fetchAll();
        $json_array = json_encode($data);
    }
    $products = $data;

    $sql_productImage = '
    select `id`,`productID`,`image` from productImage;
';

    $stmt = $pdo->prepare($sql_productImage);
    $res = $stmt->execute();

    if ($res) {
        $data = $stmt->fetchAll();
        $img_list = json_encode($data);
    }

    $pdo = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}