<?php
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $submit = $conn->prepare("SELECT * FROM users WHERE username=?");
    $submit->bind_param("s", $username);
    $submit->execute();
    $result = $submit->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['login_msg'] = "Login Successful!";
        header("location:index.php");

    } else {
        $_SESSION['error_msg'] = "Login Failed due to invalid username or password";
    }
}
?>
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

    <?php if (isset($_SESSION['error_msg'])): ?>
        <div class="container mt-5 pt-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo ($_SESSION['error_msg']);
                unset($_SESSION['error_msg']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row min-vh-100">

            <div class="col-12 d-flex align-items-center justify-content-center bg-white">
                <div class="auth-card w-100 p-4 p-md-5" style="max-width: 450px;">
                    <div class="mb-5">
                        <a href="index.php" class="text-decoration-none mb-4 d-inline-block text-primary fw-bold"><i class="bi bi-arrow-left me-2"></i> Back to Home</a>
                        <h2 class="fw-bold">Sign In</h2>
                    </div>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">User Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-secondary"></i></span>
                                <input name="username" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Enter Your Name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label small fw-bold">Password</label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-secondary"></i></span>
                                <input name="password" type="password" class="form-control bg-light border-start-0 ps-0" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary-custom w-100 py-3 mb-4">
                            Log In
                        </button>

                        <div class="text-center">
                            <p class="small text-secondary">Don't have an account? <a href="register.php" class="fw-bold text-primary text-decoration-none">Create Account</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>