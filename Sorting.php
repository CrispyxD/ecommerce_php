<?php
$name = $_GET['order'] ?? "";

if ($name !== "") {
    if ($name === "Name: A to Z") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY title ASC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY title ASC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY title ASC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY title ASC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY title ASC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY title ASC");
    }
    if ($name === "Name: Z to A") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY title DESC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY title DESC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY title DESC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY title DESC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY title DESC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY title DESC");
    }
    if ($name === "Price: Low to High") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY price ASC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY price ASC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY price ASC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY price ASC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY price ASC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY price ASC");
    }
    if ($name === "Price: High to Low") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY price DESC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY price DESC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY price DESC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY price DESC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY price DESC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY price DESC");
    }
    if ($name === "Latest") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY time DESC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY time DESC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY time DESC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY time DESC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY time DESC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY time DESC");
    }
    if ($name === "Oldest") {
        $db_products = $conn->query("SELECT * FROM products ORDER BY time ASC");
        $others = $conn->query("SELECT * FROM products WHERE type = 'Other' ORDER BY time ASC");
        $home_and_living = $conn->query("SELECT * FROM products WHERE type = 'Home & Living' ORDER BY time ASC");
        $fashions = $conn->query("SELECT * FROM products WHERE type = 'Fashions' ORDER BY time ASC");
        $electronics = $conn->query("SELECT * FROM products WHERE type = 'Electronics' ORDER BY time ASC");
        $accessories = $conn->query("SELECT * FROM products WHERE type = 'Accessories' ORDER BY time ASC");
    }
}
?>


<div class="col-lg-9">
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 rounded-3 shadow-sm">
        <p class="mb-0 text-secondary">Showing 1-9 of 24 results</p>
        <form method="GET">
            <select class="form-select w-auto border-0 bg-light" name="order" onchange="this.form.submit()">
                <option value="" <?php if ($name === ""): ?>selected<?php endif; ?>>Default sorting</option>
                <option value="Name: A to Z" <?php if ($name === "Name: A to Z"): ?>selected <?php endif; ?>>Name: A to Z</option>
                <option value="Name: Z to A" <?php if ($name === "Name: Z to A"): ?>selected <?php endif; ?>>Name: Z to A</option>
                <option value="Price: Low to High" <?php if ($name === "Price: Low to High"): ?>selected <?php endif; ?>>Price: Low to High</option>
                <option value="Price: High to Low" <?php if ($name === "Price: High to Low"): ?>selected <?php endif; ?>>Price: High to Low</option>
                <option value="Latest" <?php if ($name === "Latest"): ?>selected <?php endif; ?>>Latest</option>
                <option value="Oldest" <?php if ($name === "Oldest"): ?>selected<?php endif; ?>>Oldest</option>
            </select>
        </form>
    </div>