<?php

    include 'includes/auth.php';
    include 'includes/db.php';

    $barcode = trim($_GET['barcode']);

    $stmt = $conn->prepare(
        "SELECT * FROM products
        WHERE barcode=?
        LIMIT 1"
    );

    $stmt->bind_param("s", $barcode);
    $stmt->execute();

    $result = $stmt->get_result();

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
    $stmt->close();
?>