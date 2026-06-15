<?php

include 'includes/auth.php';
include 'includes/db.php';
include 'barcode-generator.php';

if(isset($_POST['save']))
{
    $barcode = trim($_POST['barcode']);

    if(empty($barcode))
    {
        $barcode = time().rand(1000,9999);
    }
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $imageName = "";

    if($_FILES['image']['name'])
    {
        $imageName = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/".$imageName
        );
    }

    $sql = "INSERT INTO products
    (
        barcode,
        product_name,
        category,
        price,
        quantity,
        image
    )
    VALUES
    (
        '$barcode',
        '$name',
        '$category',
        '$price',
        '$quantity',
        '$imageName'
    )";

    $conn->query($sql);

    generateBarcode($barcode);

    header("Location: products.php");
    exit();
}

include 'includes/header.php';
?>

<h3>Add Product</h3>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
    <label>Barcode</label>
    <input type="text"
           name="barcode"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label>Product Name</label>
    <input type="text"
           name="product_name"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label>Category</label>
    <input type="text"
           name="category"
           class="form-control">
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number"
           step="0.01"
           name="price"
           class="form-control">
</div>

<div class="mb-3">
    <label>Opening Stock</label>
    <input type="number"
           name="quantity"
           class="form-control"
           value="0">
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file"
           name="image"
           class="form-control">
</div>

<button class="btn btn-primary"
        name="save">
    Save Product
</button>

<a href="products.php"
   class="btn btn-secondary">
   Back
</a>

</form>

<?php include 'includes/footer.php'; ?>