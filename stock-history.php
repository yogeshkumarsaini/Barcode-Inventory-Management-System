<?php
include 'includes/auth.php';
include 'includes/db.php';
include 'includes/header.php';

$result = $conn->query(
    "SELECT s.*, p.product_name
     FROM stock_transactions s
     JOIN products p ON s.product_id = p.id
     ORDER BY s.id DESC"
);
?>

<h3>Stock History</h3>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['product_name'] ?></td>
            <td><?= $row['transaction_type'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['transaction_date'] ?></td>
        </tr>

        <?php } ?>

    </tbody>

</table>

<?php include 'includes/footer.php'; ?>