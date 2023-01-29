<!-- 
    require_onceで呼び出される時、パスは呼び出し側（実行側）になるので、
    あらかじめ合わせておくか、同じ階層にファイルを置くとやりやすい。
-->
<?php
session_start();
$loginFlag;
if ($_SESSION['session_id']) {
    $loginFlag = 1;
}
?>
<link rel="stylesheet" href="../css/mdl/material.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="../css/mdl/material.min.js"></script>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/header.css">
<header>
    <div class="header-contents">
        <a href="./home.php">
            <h1 class="title">
                昆虫食専門店(仮)
            </h1>
        </a>

        <?php if ($loginFlag) : ?>

        <div class="icon-container">
            <div></div>
            <a href="../page/cart.php">
                <button
                    class="icon-button icon-button-cart mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--white">
                    1
                </button>
            </a>

            <a href="../page/account.php">
                <button
                    class="icon-button icon-button-account mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--white">
                    1
                </button>
            </a>

        </div>

        <?php endif ?>

    </div>
</header>