<?php
function product_template($row)
{
    $id = $row['id'];
    // $link = "https://alumni.hamako-ths.ed.jp/~ei2031/shopping/page/product.php?id=$id";
    $image_src = "../image/$id.png";
    $product_name = $row['name'];
?>

<a class="product-link" href="../page/product.php?id=<?= $id ?>" target="_blank">

    <div class="product-title-container">
        <p class="product-title"><?= $product_name ?></p>
    </div>

    <div class="product">
        <!-- <div> -->
        <img class="product-img" src="<?= $image_src ?>" alt="<?= $product_name ?>">
        <!-- </div> -->
    </div>

</a>

<?php
}
?>