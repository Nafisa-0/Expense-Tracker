<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = "SELECT ID FROM tbluser WHERE Email='$email' AND MobileNumber='$contactno'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
        exit();
    } else {
        $msg = "Invalid Details. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Expense Tracker - Forgot Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <h2 align="center">Daily Expense Tracker</h2>
    <hr />
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <p style="font-size:16px; color:red" align="center"> <?php echo isset($msg) ? $msg : ''; ?> </p>
                    <form role="form" action="" method="post" id="loginForm">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mobile Number" name="contactno" type="text" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Reset</button>
                            <span style="padding-left:250px"><a href="index.php" class="btn btn-primary">Login</a></span>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->   
</body>
</html>
