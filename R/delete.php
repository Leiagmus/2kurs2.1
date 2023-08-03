<?php
require("conect.php");
$id = $_GET['id'];
$backet1 = $connect->query("DELETE FROM `basket` WHERE `id` = '$id'");
$connect->close();
header("Location: index.php");
