<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/home.css">
	<title>カート</title>
</head>

<body>
	<?php require_once('../component/product_template.php')  ?>
	<?php require_once('../component/header.php')  ?>
	<?php require_once('../phpFunc/getcart.php') ?>

	<main>

		<!-- phpでsql実行後、とってきた配列から必要な情報を抜き出し、ループで以下のhtmlに埋め込む -->
		<?php if (empty($cart_products)) : ?>

		<h2>カートが空です</h2>

		<?php else : ?>

		<h2>カート内の商品</h2>

		<?php
            // TODO $productsをカート内の商品に変える
            foreach ($cart_products as $key => $row) {
                product_template($row);
            }
            ?>

		<section class="products-container">
		</section>

		<?php endif ?>


	</main>
</body>

</html>