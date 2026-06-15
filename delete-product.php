<?php

include 'includes/auth.php';
include 'includes/db.php';

$id = $_GET['id'];

$product = $conn->query(
"SELECT image FROM products WHERE id='$id'"
)->fetch_assoc();

if($product)
{
    if($product['image'] &&
       file_exists("uploads/".$product['image']))
    {
        unlink("uploads/".$product['image']);
    }

    $conn->query(
    "DELETE FROM products WHERE id='$id'"
    );
}

header("Location: products.php");
exit();

?>