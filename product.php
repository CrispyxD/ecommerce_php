<?php
include('connection.php');
session_start();
if (isset($_POST['submit'])) {
    $media = 'uploads/';
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['qty'];
    $description = $_POST['description'];
    $type = $_POST['Type'];
    $image = '';

    if (!empty($_FILES['image']['name'])) {
        $image = time() . "-" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $media . $image);
    }

    $submit = $conn->prepare("INSERT INTO products(title, price, quantity, description,type, image) VALUES(?,?,?,?,?,?)");
    $submit->bind_param("ssssss", $title, $price, $quantity, $description, $type, $image);

    if ($submit->execute()) {
        $_SESSION['product_msg'] = "Product Created Successfully";
    }

    header("location:product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products | Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

    <?php include('navbar.php') ?>

    <?php $db_products = $conn->query("SELECT * FROM products") ?>



    <?php if (isset($_SESSION['product_msg'])): ?>
        <div class="container mt-5 pt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo ($_SESSION['product_msg']);
                unset($_SESSION['product_msg']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="container py-5 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4 pt-4">
            <div>
                <h2 class="fw-bold mb-1">Product Inventory</h2>
                <p class="text-secondary">Manage your store's products, stock, and pricing.</p>
            </div>
            <button class="btn btn-primary-custom px-4 py-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="bi bi-plus-lg me-2"></i> Add New Product
            </button>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-12">
                <div class="p-3 bg-white rounded-4 shadow-sm border-0">
                    <small class="text-secondary text-uppercase fw-bold">Total Products</small>
                    <h3 class="fw-bold mb-0"><?php echo $db_products->num_rows ?></h3>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-white">
                        <tr>
                            <th class="ps-4 py-3 text-secondary">Product</th>
                            <th class="py-3 text-secondary">Category</th>
                            <th class="py-3 text-secondary">Price</th>
                            <th class="py-3 text-secondary text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($show_items = $db_products->fetch_assoc()): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="uploads/<?php echo $show_items['image'] ?>" class="rounded-3 me-3" width="50" height="50" style="object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0 fw-bold"><?php echo $show_items['title'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light text-secondary rounded-pill px-3"><?php echo $show_items['type'] ?></span></td>
                                <td class="fw-bold text-primary"><?php echo $show_items['price'] ?>$</td>
                                <td class="text-end pe-4">
                                    <a href="product_update.php?id=<?php echo $show_items['id'] ?>" class="btn btn-light btn-sm rounded-3 me-1"><i class="bi bi-pencil text-primary"></i></a>
                                    <a href="product_delete.php?id=<?php echo $show_items['id'] ?>" class="btn btn-light btn-sm rounded-3"><i class="bi bi-trash text-danger"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0 px-4 pt-4">
                    <h5 class="fw-bold">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold">Product Name</label>
                                <input name="title" type="text" class="form-control rounded-3" placeholder="e.g. Wireless Headphones" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Price ($)</label>
                                <input name="price" type="number" class="form-control rounded-3" placeholder="0.00" step="0.01" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">Stock Quantity</label>
                                <input name="qty" type="number" class="form-control rounded-3" placeholder="0">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Description</label>
                                <textarea name="description" class="form-control rounded-3" rows="3"></textarea>
                            </div>
                            <div>
                                <label class="form-label small fw-bold">Type Of Product</label>
                                <select class="form-select w-auto border-0 " name="Type">
                                    <option>Electronics</option>
                                    <option>Fashions</option>
                                    <option>Accessories</option>
                                    <option>Home & Living</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Product Image</label>
                                <input name="image" type="file" class="form-control rounded-3">
                            </div>
                            <div class="col-12 mt-4">
                                <button name="submit" type="submit" class="btn btn-primary-custom w-100 py-3">Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>