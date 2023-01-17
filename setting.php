<?php
$name=$_GET["name"];
$bug=$_GET["bug"];
$types=$_GET["types"];
$price=$_GET["price"];
$expiration=$_GET["expiration"];
$stock=$_GET["stock"];
$about=$_GET["about"];
$from=$_GET["from"];

try{
$pdo_config = 'mysql:host=localhost;dbname=ei2031';

$user='ei2031';
$password='ei2031@alumni.hamako-ths.ed.jp';
$option='[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]';

$pdo = new PDO($pdo_config,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_insert = '
    INSERT INTO product (`name`,`bug`,`type`,`price`,`expiration`,`about`,`stock`) VALUES
    (
        :name,
        :bug,
        :type,
        :price,
        :expiration,
        :about,
        :stock,
        :from
    );
';

$stmt = $pdo->prepare($sql_insert);
$stmt->bindValue(':name',$name);
$stmt->bindValue(':bug',$bug);
$stmt->bindValue(':type',$types);
$stmt->bindValue(':price',$price);
$stmt->bindValue(':expiration',$expiration);
$stmt->bindValue(':about',$about);
$stmt->bindValue(':stock',$stock);
$stmt->bindValue(':from',$from);

$stmt->execute();

$test = $pdo->prepare('select * from product;');
$ret = $test->execute();

foreach($ret as $row){
	echo $row['name'];
}

echo '!!';

$pdo=null;
}catch(PDOException $e){
echo $e->getMessage();
}
?>
