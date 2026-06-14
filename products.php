<?php
include 'includes/auth.php';
include 'includes/db.php';
include 'includes/header.php';

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<div class="d-flex justify-content-between mb-3">
    <h3>Products</h3>

    <a href="add-product.php" class="btn btn-success">
        Add Product
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>ID</th>
            <th>Barcode</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th width="150">Action</th>
        </tr>
    </thead>

    <tbody>

    <?php while($row = $result->fetch_assoc()) { ?>

        <tr>

            <td><?= $row['id']; ?></td>

            <td><?= $row['barcode']; ?></td>

            <td>
                <?php if($row['image']) { ?>
                    <img src="uploads/<?= $row['image']; ?>"
                         width="60">
                <?php } ?>
            </td>

            <td><?= $row['product_name']; ?></td>

            <td><?= $row['category']; ?></td>

            <td>₹<?= $row['price']; ?></td>

            <td><?= $row['quantity']; ?></td>

            <td>

                <a href="edit-product.php?id=<?= $row['id']; ?>"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <a href="delete-product.php?id=<?= $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete Product?')">
                   Delete
                </a>

            </td>

        </tr>

    <?php } ?>

    </tbody>

</table>

<?php include 'includes/footer.php'; ?>