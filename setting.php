<?php
$name=$_POST["name"];
$bug=$_POST["bug"];
$types=$_POST["types"];
$price=$_POST["price"];
$expiration=$_POST["expiration"];
$stock=$_POST["stock"];
$about=$_POST["about"];
$from=$_POST["from"];

session_start();

$mysqli = new mysqli("localhost","ei2031","ei2031@alumni.hamako-ths.ed.jp","ei2031");
if(mysqli_connect_errno()){
    die("MySQL connection error: " . mysqli_connect_error());
}

$sql_insert = "
    insert
    into
    product(`name`,`bug`,`type`,`price`,`expiration`,`about`,`stock`) 
    values
    (
        "."$name".",
        "."$bug".",
        "."$type".",
        "."$price".",
        "."$expiration".",
        "."$about".",
        "."$stock"."
    );
";

if(!($result = $mysqli->query($sql_insert))){
    die($mysql->error);
}

include "verif.html";
?>