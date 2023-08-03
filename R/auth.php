<?php 
require("conect.php");
$result =  $connect->query("SHOW TABLES FROM `sait-5`");
if (($result->num_rows)==0) header("Location: create_tables.php");
else {
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$permitted_chars2 ='0123456789';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}
$login=generate_string($permitted_chars, 8);
$pass=generate_string($permitted_chars2, 6);
$vremya=24 * 24 * 60 * 60;
setcookie('Login',$login,time()+$vremya,"/");
setcookie('Password',$pass,time()+$vremya,"/");

$product=$connect->query("INSERT INTO `user` (`login`, `pass`) VALUES ('$login', '$pass')");
header("Location: index.php");
}
