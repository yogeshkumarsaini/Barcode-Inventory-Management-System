<?php
include 'includes/auth.php';
include 'includes/db.php';
include 'includes/header.php';

$result = $conn->query(
    "SELECT *
     FROM products
     ORDER BY quantity ASC"
);
?>

<h3>Inventory Report</h3>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>Barcode</th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>

    <tbody>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?= $row['barcode'] ?></td>
            <td><?= $row['product_name'] ?></td>
            <td><?= $row['category'] ?></td>
            <td>₹<?= $row['price'] ?></td>
            <td><?= $row['quantity'] ?></td>
        </tr>

        <?php } ?>

    </tbody>

</table>

<?php include 'includes/footer.php'; ?>