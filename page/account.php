<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/website.css">
  <title>昆虫食専門店ログイン</title>
</head>

<body>
  <?php
try {
    session_start();
    $userID = $_SESSION['session_id'];
    $pdo_config = 'mysql:host=localhost;dbname=ei2031';

    $user = 'ei2031';
    $password = 'ei2031@alumni.hamako-ths.ed.jp';
    $option = '[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

    $pdo = new PDO($pdo_config, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = '
	    select * from user where id=:id;
    ';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userID, PDO::PARAM_INT);
    $res = $stmt->execute();
    if ($res) {
        $data = $stmt->fetch();
        $cart_list = json_encode($data);
    }
    $pdo = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}
    
  ?>
  <h2>アカウント</h2>
  <div class="account-main">

    <div class="left">
      <img src="../image/userIcon.png" width="100%">
    </div>
    <form action="./../phpFunc/acountFix.php" method="get">
      <div class="right">
        アカウント名<br>
        <input type="text" id="name" name="name" value="<?php echo $data['name'];?>"><br><br><br>
        Email<br>
        <input type="text" id="id" name="Email" value="<?php echo $data['Email'];?>"><br><br><br>
        パスワード<br>
        <input type="text" id="password" name="password" value="<?php echo $data['password'];?>"><br><br><br>
        お届先住所<br>
        <input type="text" id="address" name="address" value="<?php echo $data['address'];?>"><br><br><br>
        <!-- <button id="apply">適用</button> -->
        <input type="submit" id="address" value="適用">
        <a href="">ログアウト</a>
      </div>
    </form>

  </div>
</body>

</html>