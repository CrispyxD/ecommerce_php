<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Panel X Ecommerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .product-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 12px;
    }
</style>

<body class="bg-light">

    <?php include('navbar.php') ?>


    <header class="py-5 bg-white border-bottom mt-5">
        <div class="container pt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </nav>
        </div>
    </header>

    <?php $db_products = $conn->query("SELECT * FROM products");
    $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ");
    $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ");
    $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ");
    $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ");
    $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ");
    ?>

    <main class="container py-5 mt-5">
        <div class="row">
            <aside class="col-lg-3 d-none d-lg-block">
                <div class="filter-section mb-4">
                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="shop.php" class="text-decoration-none text-primary">All (<?php echo $db_products->num_rows ?>)</a>
                        </li>
                        <li class="mb-2"><a href="electronics.php" class="text-decoration-none text-secondary">Electronics (<?php echo $electronics->num_rows ?>)</a>
                        </li>
                        <li class="mb-2"><a href="fashions.php" class="text-decoration-none text-secondary">Fashion (<?php echo $fashions->num_rows ?>)</a></li>
                        <li class="mb-2"><a href="accessories.php" class="text-decoration-none text-secondary">Accessories (<?php echo $accessories->num_rows ?>)</a>
                        </li>
                        <li class="mb-2"><a href="Home_and_living.php" class="text-decoration-none text-secondary">Home & Living (<?php echo $home_and_living->num_rows ?>)</a>
                        </li>
                        <li class="mb-2"><a href="other.php" class="text-decoration-none text-secondary">Others (<?php echo $others->num_rows ?>)</a>
                        </li>
                    </ul>
                </div>

                <div class="filter-section mb-4">
                    <h5 class="fw-bold mb-3">Price Range</h5>
                    <input type="range" class="form-range" min="0" max="1000" id="priceRange">
                    <div class="d-flex justify-content-between text-secondary mt-2">
                        <span>$0</span>
                        <span>$1000</span>
                    </div>
                </div>

                <div class="filter-section">
                    <h5 class="fw-bold mb-3">Rating</h5>
                    <div class="fbaseorm-check mb-2">
                        <input class="form-check-input" type="checkbox" id="star4">
                        <label class="form-check-label text-secondary" for="star4">4 Stars & Up</label>
                    </div>
                </div>
            </aside>

            <?php include('Sorting.php') ?>

                <div class="row g-4">
                    <?php while ($show_items = $db_products->fetch_assoc()) {
                        include('product_showing_page.php');
                    } ?>
                </div>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>