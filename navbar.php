<?php session_start(); ?>

<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <span class="brand-accent">Panel-</span>X
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" class="user-icon-link d-flex align-items-center justify-content-center"
                    id="userDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>


                <?php if (isset($_SESSION['login_msg'])): ?>
                    <p class="mt-2 bg-light badge text-primary border border-primary rounded-pill px-3">
                        <?php echo "Hello", ' ', $_SESSION['username'] ?>
                    </p>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3 custom-dropdown" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="logout.php?logout"><i class="bi bi-box-arrow-in-right me-2"></i>Logout</a></li>
                    </ul>
                <?php else: ?>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3 custom-dropdown" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="login.php"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a></li>
                        <li><a class="dropdown-item" href="register.php"><i class="bi bi-pencil-square me-2"></i>Register</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>