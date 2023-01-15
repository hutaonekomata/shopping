<?php

try{
$pdo = new PDO('mysql:host=localhost;dbname=ei2031','ei2031','ei2031@alumni.hamako-ths.ed.jp');

$stmt = $pdo->prepare("select * from product;");
$result = $stmt->execute();

#$result = $pdo->query('select * from product');

foreach($result as $text){
	echo "{$text['name']}"."<br>";
}

echo "true";
}catch(PDOException $e){
echo $e->getMessage();
die();
}
?>
