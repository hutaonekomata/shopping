<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/home.css">
  <title>ホーム</title>
</head>

<body>
  <?php require_once('./header.php')  ?>

  <h2>あなたへのおすすめ</h2>
  <section class="products-container">

    <div class="product">
      <a class="product-link" href="./product.php 商品のidとか必要な情報をパラメータで渡す" target="_blank">
        <img class="product-img" src="../image/sample.png" alt="商品画像">
        <p>商品名とか</p>
      </a>
    </div>

    <div class="product">
      <a class="product-link" href="./product.php 商品のidとか必要な情報をパラメータで渡す" target="_blank">
        <img class="product-img" src="../image/sample.png" alt="商品画像">
        <p>商品名とか</p>
      </a>
    </div>

  </section>

  <!-- <h2>今月の人気ランキング</h2> -->
</body>

</html>