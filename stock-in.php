<?php

    include 'includes/auth.php';
    include 'includes/db.php';

    if (isset($_POST['save'])) {

        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        $stmt = $conn->prepare(
            "UPDATE products
            SET quantity = quantity + ?
            WHERE id = ?"
        );

        $stmt->bind_param(
            "ii",
            $quantity,
            $product_id
        );

        $stmt->execute();
        $stmt->close();

        $type = "IN";

        $stmt = $conn->prepare(
            "INSERT INTO stock_transactions
            (product_id, transaction_type, quantity)
            VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "isi",
            $product_id,
            $type,
            $quantity
        );

        $stmt->execute();
        $stmt->close();

        header("Location: stock-history.php");
        exit();
    }

    include 'includes/header.php';

    $products = $conn->query(
        "SELECT id, product_name FROM products"
    );
?>

<h3>Stock In</h3>

<form method="POST">

    <div class="mb-3">
        <label>Product</label>

        <select name="product_id" class="form-control" required>

            <option value="">Select Product</option>

            <?php while($row = $products->fetch_assoc()) { ?>

                <option value="<?= $row['id'] ?>">
                    <?= $row['product_name'] ?>
                </option>

            <?php } ?>

        </select>
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>

    <button class="btn btn-success" name="save">
        Add Stock
    </button>

</form>

<?php include 'includes/footer.php'; ?>