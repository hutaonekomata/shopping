<?php
require_once('../phpFunc/product_get.php');
require_once('../class/Product.php');

// GET形式
$id = $_GET['id'];

$pdo = new PDO($pdo_config, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQLを実行し、データを取得する
$data = product_get(
    $pdo,
    "
    select * from product
    where id = $id
    ;
    "
);

if (!empty($data)) {
    $p = new Product($data[0]);

    $id = $p->id;
    $name = $p->name;
    $bug = $p->bug;
    $type = $p->type;
    $price = $p->price;
    $expiration = $p->expiration;
    $stock = $p->stock;
    $about = $p->about;
    $from = $p->from;
} else {
    $isError = true;
}

$types = [
    "日常食", "薬用", "ペット用", "釣り用", "飼料",
];

?>

<?php require_once('../component/header.php');
if ($isError) {
    echo "<h1>データを取得できませんでした。</h1>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/product.css">
    <title>商品名</title>
</head>

<body>
    <main>
        <h2 class=""><?= $name ?></h2>
        <div class="main-contents">
            <section class="product-image">
                <img src="../image/<?= $id ?>.png" alt="<?= $name ?>">
            </section>
            <section class="product-description">

                <article>
                    <?= $about ?>
                </article>

                <section class="details-container">
                    <ul class="details">
                        <li>
                            虫 : <?= $bug ?>
                        </li>

                        <li>
                            加工分類 : <?= $types[$type] ?>
                        </li>

                        <li>
                            原産地 : <?= $from ?>
                        </li>

                    </ul>
                </section>


                <section class="price-container">
                    <h3 class="price">&yen;<?= $price ?></h3>

                    <form action="../phpFunc/putcart.php" method="get">
                        <input type="number" name="num" placeholder="個数" min="1" required />
                        <input type="hidden" name="productID" value="<?= $id ?>" />
                        <button
                            class="buy-button mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--red"
                            type="submit">
                            <img class="cart-image" src="../image/cart.png" alt="">
                            カートに入れる
                        </button>
                    </form>
                </section>
            </section>
        </div>
    </main>

    <footer></footer>
</body>

</html>