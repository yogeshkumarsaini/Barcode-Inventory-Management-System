<!DOCTYPE html>
<html>
<head>
    <title>Barcode Inventory System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="dashboard.php">
                Inventory System
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            Products
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="scan.php">
                            Scan Barcode
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="stock-in.php">
                            Stock In
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="stock-out.php">
                            Stock Out
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="stock-history.php">
                            History
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">
                            Reports
                        </a>
                    </li>

                </ul>

                <a href="logout.php" class="btn btn-danger">
                    Logout
                </a>

            </div>

        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mt-4">
