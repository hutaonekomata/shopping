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
    <?php require_once('../component/product_template.php')  ?>
    <?php require_once('../component/header.php')  ?>
    <?php require_once('../phpFunc/product_get.php') ?>

    <main>
        <h2>商品一覧</h2>
        <section class="products-container">

            <!-- phpでsql実行後、とってきた配列から必要な情報を抜き出し、ループで以下のhtmlに埋め込む -->

            <?php
      foreach ($products as $key => $row) {
        product_template($row);
      }
      ?>

        </section>
    </main>
</body>

</html>