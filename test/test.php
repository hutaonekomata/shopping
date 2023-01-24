<?php
    include('./../phpFunc/product_get.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/product.css">
    <!-- <script src="./test.js"></script> -->
    <title>Document</title>
</head>
<body>
    <p>------------------------------------------</p>
    <input type="button" value="add" onclick="myfunc();">
    <input type="button" value="delete" onclick="myd();">
    <p>------------------------------------------</p>
    <div id="product-list" class="flex-list">
    </div>
</body>
</html>