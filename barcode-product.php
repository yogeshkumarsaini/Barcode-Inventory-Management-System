<?php

include 'includes/auth.php';
include 'includes/db.php';

$barcode = $_GET['barcode'];

$sql =
"SELECT * FROM products
 WHERE barcode='$barcode'
 LIMIT 1";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
    echo json_encode(
        $result->fetch_assoc()
    );
}
else
{
    echo json_encode([
        "error"=>"Product Not Found"
    ]);
}
?>