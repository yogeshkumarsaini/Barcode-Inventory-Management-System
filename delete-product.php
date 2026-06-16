<?php

include 'includes/auth.php';
include 'includes/db.php';

$id = (int)$_GET['id'];

$stmt = $conn->prepare(
    "SELECT image FROM products WHERE id=?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$product = $stmt->get_result()->fetch_assoc();

$stmt->close();

if($product)
{
    if($product['image'] &&
       file_exists("uploads/".$product['image']))
    {
        unlink("uploads/".$product['image']);
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
}

header("Location: products.php");
exit();

?>