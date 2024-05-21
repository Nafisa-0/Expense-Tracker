<?php
session_start();
include('includes/dbconnection.php');

$uid = $_SESSION['detsuid'];
$ret = mysqli_query($con, "SELECT FullName FROM tbluser WHERE ID='$uid'");
$row = mysqli_fetch_array($ret);
$name = $row['FullName'];
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="https://static.vecteezy.com/system/resources/previews/012/906/644/original/expenses-icon-style-vector.jpg" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $name; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    
    <ul class="nav menu">
        <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em>Expense Summary</a></li>
        
        <li class="parent">
            <a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a href="add-expense.php"><span class="fa fa-arrow-right">&nbsp;</span> Add Expenses</a></li>
                <li><a href="manage-expense.php"><span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses</a></li>
            </ul>
        </li>
        
        <li><a href="expense-datewise-reports.php"><span class="fa fa-arrow-right">&nbsp;</span> Expenses Report </a></li>
        <li><a href="user-profile.php"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
        <li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>
