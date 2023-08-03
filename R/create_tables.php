<?php require("conect.php");

$i0="CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$i1="CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

$i2="CREATE TABLE `user` (
  `login` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

$i3="ALTER TABLE `basket`
ADD PRIMARY KEY (`id`),
ADD KEY `basket_ibfk_1` (`id_product`);
";

$i4="ALTER TABLE `items`
ADD PRIMARY KEY (`id`);
";

$i5="ALTER TABLE `user`
ADD PRIMARY KEY (`login`);";

$i6="ALTER TABLE `basket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

$i7="ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

$i8="ALTER TABLE `basket`
ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;";

for ($i=0; $i < 9; $i++) {
  $connect->query("${'i'.$i}");
}
$connect->close();
header("Location:auth.php");
?>
