<?php
function cart_product_template($row)
{
    $id = $row['id'];
    $link = "https://alumni.hamako-ths.ed.jp/~ei2031/shopping/page/product.php?id=$id";
    $image_src = "../image/sample.png";
    $product_name = $row['name'];
?>

<div class="product">
    <a class="product-link" href="<?= $link ?>" target="_blank">
        <img class="product-img" src="<?= $image_src ?>" alt="<?= $product_name ?>">
        <div>
            <p class="product-title"><?= $product_name ?></p>
        </div>
    </a>
</div>

<?php
}
?>