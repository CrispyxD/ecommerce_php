<?php
include('connection.php');
session_start();




if (isset($_POST['submit'])) {
    $secrectKey = "6LehUp0tAAAAAHSi_LjOPqaF70kSBrhykN5xo8rU";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secrectKey&response=$responseKey&remoteip=$userIP";

    $response = file_get_contents($url);
    $responseData = json_decode($response); {


        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $submit = $conn->query("SELECT * FROM users WHERE username = '$username'");
    }

    if ($submit->num_rows > 0) {
        echo "User Already Exists";
    } else {
        $u = $conn->prepare('INSERT INTO users(username,password) VALUES(?,?)');
        $u->bind_param("ss", $username, $password);
        if ($u->execute()) {
            $_SESSION['register_msg'] = "Register Successful!";
        }
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-light">
    <?php include("navbar.php") ?>


    <?php if (isset($_SESSION['register_msg'])): ?>
        <div class="container mt-5 pt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo ($_SESSION['register_msg']);
                unset($_SESSION['register_msg']);
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
                        <a href="index.php" class="text-decoration-none mb-4 d-inline-block text-primary fw-bold">
                            <i class="bi bi-arrow-left me-2"></i> Back to Home
                        </a>
                        <h2 class="fw-bold">Register</h2>
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

                        <div class="g-recaptcha" data-sitekey="6LehUp0tAAAAAEflR6Y6b6Zc74hDT2yWsEWM3tok"></div><br>

                        <button name="submit" type="submit" class="btn btn-primary-custom w-100 py-3 mb-4">
                            Register
                        </button>

                        <div class="text-center">
                            <p class="small text-secondary">Already have an account?
                                <a href="login.php" class="fw-bold text-primary text-decoration-none">Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>