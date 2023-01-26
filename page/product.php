<?php
require_once('../phpFunc/product_get.php');
require_once('../class/Product.php');
$id = $_GET['id'];

$pdo = new PDO($pdo_config, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$data = product_get(
    $pdo,
    "
    select * from product
    where id = $id
    ;
    "
);

if (is_null($data)) {
    echo "<p>データを取得できませんでした。</p>";
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品名</title>
</head>

<body>
    <?php require_once('../component/header.php') ?>

    <?php
    $p = new Product($data[0]);
    var_dump($p);
    ?>
</body>

</html>