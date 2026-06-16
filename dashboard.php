<?php

    include 'includes/auth.php';
    include 'includes/db.php';
    include 'includes/header.php';

    $totalProducts = $conn->query(
        "SELECT COUNT(*) total FROM products"
    )->fetch_assoc()['total'];

    $totalStock = $conn->query(
        "SELECT SUM(quantity) total FROM products"
    )->fetch_assoc()['total'];

    $lowStock = $conn->query(
        "SELECT COUNT(*) total FROM products WHERE quantity < 10"
    )->fetch_assoc()['total'];
    
?>

<h3 class="mb-4">Dashboard</h3>

<div class="row">

    <div class="col-md-4">
        <div class="card bg-primary text-white mb-3">
            <div class="card-body">
                <h5>Total Products</h5>
                <h2><?= $totalProducts ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                <h5>Total Stock</h5>
                <h2><?= $totalStock ?? 0 ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-danger text-white mb-3">
            <div class="card-body">
                <h5>Low Stock Items</h5>
                <h2><?= $lowStock ?></h2>
            </div>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>