<?php

    include 'includes/auth.php';
    include 'includes/db.php';
    include 'barcode-generator.php';

    $id = (int)$_GET['id'];

    $stmt = $conn->prepare(
        "SELECT * FROM products WHERE id=?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $product = $stmt->get_result()->fetch_assoc();

    $stmt->close();

    if(isset($_POST['update']))
    {
        $barcode = $_POST['barcode'];
        $name = $_POST['product_name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $imageName = $product['image'];

        if($_FILES['image']['name'])
        {
            $imageName = time()."_".$_FILES['image']['name'];

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                "uploads/".$imageName
            );
        }

        $stmt = $conn->prepare(
            "UPDATE products SET
                barcode=?,
                product_name=?,
                category=?,
                price=?,
                quantity=?,
                image=?
            WHERE id=?"
        );

        $stmt->bind_param(
            "sssdisi",
            $barcode,
            $name,
            $category,
            $price,
            $quantity,
            $imageName,
            $id
        );

        $stmt->execute();
        $stmt->close();

        generateBarcode($barcode);

        header("Location: products.php");
        exit();
    }

    include 'includes/header.php';
?>

<h3>Edit Product</h3>

<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Barcode</label>
        <input type="text" name="barcode" class="form-control" value="<?= $product['barcode']; ?>">
    </div>

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="product_name" class="form-control" value="<?= $product['product_name']; ?>">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control"  value="<?= $product['category']; ?>">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" step="0.01" name="price"  class="form-control" value="<?= $product['price']; ?>">
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" value="<?= $product['quantity']; ?>">
    </div>

    <div class="mb-3">

        <?php if($product['image']) { ?>

            <img src="uploads/<?= $product['image']; ?>" width="120" class="mb-2">

        <?php } ?>

        <input type="file" name="image" class="form-control">

    </div>

    <button class="btn btn-primary" name="update">
        Update Product
    </button>

    <a href="products.php" class="btn btn-secondary">
        Back
    </a>

</form>

<?php include 'includes/footer.php'; ?>