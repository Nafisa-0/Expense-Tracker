<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM tbluser WHERE Email='$email' AND Password='$password'");
    $ret = mysqli_fetch_array($query);
    if ($ret) {
        $_SESSION['detsuid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense Tracker - Login</title>
    <link href="index.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center"><center>Daily Expense Tracker<center></h2>
        <div class="login-panel">
            <h3 class="text-center">Log in</h3>
            <?php if ($msg) { echo "<p class='error-message'>$msg</p>"; } ?>
            <form action="" method="post" name="login">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-actions">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <a href="register.php" class="btn btn-secondary">Register</a>
                </div>
                <div class="text-right">
                    <a href="forgot-password.php">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
