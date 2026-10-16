<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Panel X Ecommerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <?php include("navbar.php") ?>

    <?php
    $media = 'uploads/';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = $conn->query("SELECT * FROM products WHERE id = $id");
        $show_products = $product->fetch_assoc();
    }

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $description = $_POST['description'];
        $image = $show_products['image'];

        if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $image = time() . "-" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $media . $image);
        }

        $submit = $conn->prepare("UPDATE products SET title = ? , price = ? , quantity = ? , description = ?, image = ? WHERE id = ?");
        $submit->bind_param("ssssss", $title, $price, $quantity, $description, $image, $id);
        $submit->execute();
        header("location:product.php");
    }
    ?>

    <div class="container-fluid">
        <div class="row min-vh-100">

            <div class="col-12 d-flex align-items-center justify-content-center bg-white">
                <div class="auth-card w-100 p-4 p-md-5" style="max-width: 850px;">
                    <div class="mb-5">
                        <h2 class="fw-bold">Product Update</h2>
                    </div>

                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold">Product Name</label>
                                <input name="title" type="text" require value="<?php echo $show_products['title'] ?>" class="form-control rounded-3">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold">Price ($)</label>
                                <input name="price" type="number" require value="<?php echo $show_products['price'] ?>" class="form-control rounded-3">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">Stock Quantity</label>
                                <input name="qty" type="number" require value="<?php echo $show_products['quantity'] ?>" class="form-control rounded-3" placeholder="0">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Description</label>
                                <textarea name="description" class="form-control rounded-3" rows="3"><?php echo $show_products['description'] ?></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Product Image</label>
                                <input name="image" type="file" name="image" class="form-control rounded-3">
                                <img style="width: 100%;" src="uploads/<?php echo $show_products['image'] ?>">
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