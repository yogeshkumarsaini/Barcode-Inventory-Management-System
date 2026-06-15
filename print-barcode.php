<?php

$barcode = $_GET['barcode'];

$image =
"barcode/generated/".$barcode.".png";
?>

<!DOCTYPE html>
<html>
<head>
<title>Print Barcode</title>
</head>

<body onload="window.print()">

<center>

<h3><?= $barcode ?></h3>

<img src="<?= $image ?>">

</center>

</body>
</html>