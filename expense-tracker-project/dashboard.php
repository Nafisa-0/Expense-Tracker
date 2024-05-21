<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
} else {
  $uid = $_SESSION['detsuid'];
  $tdate = date('Y-m-d');
  $ydate = date('Y-m-d', strtotime("-1 days"));
  $pastdate = date("Y-m-d", strtotime("-1 week"));
  $monthdate = date("Y-m-d", strtotime("-1 month"));
  $cyear = date("Y");

  // Fetch expenses
  $today_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS todaysexpense FROM tblexpense WHERE ExpenseDate='$tdate' AND UserId='$uid'"))['todaysexpense'];
  $yesterday_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS yesterdayexpense FROM tblexpense WHERE ExpenseDate='$ydate' AND UserId='$uid'"))['yesterdayexpense'];
  $weekly_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS weeklyexpense FROM tblexpense WHERE ExpenseDate BETWEEN '$pastdate' AND '$tdate' AND UserId='$uid'"))['weeklyexpense'];
  $monthly_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS monthlyexpense FROM tblexpense WHERE ExpenseDate BETWEEN '$monthdate' AND '$tdate' AND UserId='$uid'"))['monthlyexpense'];
  $yearly_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS yearlyexpense FROM tblexpense WHERE YEAR(ExpenseDate)='$cyear' AND UserId='$uid'"))['yearlyexpense'];
  $total_expense = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(ExpenseCost) AS totalexpense FROM tblexpense WHERE UserId='$uid'"))['totalexpense'];

  // Function to display expenses
  function display_expense($title, $amount, $color) {
    return "<div class='panel panel-default'>
              <div class='panel-body'>
                <h4>$title</h4>
                <div class='expense-bar' style='background-color: $color;'>".($amount ? $amount : 0)."</div>
              </div>
            </div>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daily Expense Tracker - Dashboard</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <style>
    .panel-body {
      text-align: center;
    }
    .expense-bar {
      font-size: 24px;
      color: #fff;
      padding: 10px;
      margin: 10px 0;
      border-radius: 4px;
      display: inline-block;
      width: 100%;
    }
    .panel-body h4 {
      margin: 0;
    }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
  <?php include_once('includes/header.php'); ?>
  <?php include_once('includes/sidebar.php'); ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><em class="fa fa-home"></em></a></li>
        <li class="active">Expense Summary</li>
      </ol>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Expense Summary</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Today's Expense", $today_expense, '#3498db'); ?>
      </div>
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Yesterday's Expense", $yesterday_expense, '#e67e22'); ?>
      </div>
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Last 7 Days' Expense", $weekly_expense, '#1abc9c'); ?>
      </div>
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Last 30 Days' Expense", $monthly_expense, '#e74c3c'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Current Year Expenses", $yearly_expense, '#9b59b6'); ?>
      </div>
      <div class="col-xs-6 col-md-3">
        <?= display_expense("Total Expenses", $total_expense, '#34495e'); ?>
      </div>
    </div>
  </div>
  <?php include_once('includes/footer.php'); ?>
  <!-- <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script> -->
</body>
</html>
<?php } ?>
