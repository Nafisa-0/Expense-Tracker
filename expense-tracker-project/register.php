<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "SELECT Email FROM tbluser WHERE Email='$email'");
    $result = mysqli_fetch_array($ret);
    if ($result) {
        $msg = "This email is associated with another account";
    } else {
        $query = mysqli_query($con, "INSERT INTO tbluser (FullName, MobileNumber, Email, Password) VALUES ('$fname', '$mobno', '$email', '$password')");
        if ($query) {
            $msg = "You have successfully registered";
        } else {
            $msg = "Something went wrong. Please try again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Expense Tracker - Signup</title>
    <link href="register.css" rel="stylesheet">
    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value !== document.signup.repeatpassword.value) {
                alert('Password and Repeat Password fields do not match');
                document.signup.repeatpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Daily Expense Tracker</h2>
        <div class="register-panel">
            <h3 class="text-center">Sign Up</h3>
            <?php if ($msg) { echo "<p class='error-message'>$msg</p>"; } ?>
            <form action="" method="post" name="signup" onsubmit="return checkpass();">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="text" name="mobilenumber" class="form-control" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="repeatpassword" class="form-control" placeholder="Repeat Password" required>
                </div>
                <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <a href="index.php" class="btn btn-secondary">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
