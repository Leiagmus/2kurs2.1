<?php
require("conect.php");
$id=$_GET['id'];
$user=$_COOKIE['Login'];
$product=$connect->query("INSERT INTO `basket` (`id_user`, `id_product`) VALUES ('$user', '$id')");
$connect->close();
header("Location: index.php");
