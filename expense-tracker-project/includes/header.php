<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #2c3e50;
            color: #ecf0f1;
            border: none;
        }
        .navbar-custom .navbar-brand {
            color: #ecf0f1;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-custom .navbar-brand:hover {
            color: #bdc3c7;
        }
        .navbar-custom .navbar-toggle {
            border-color: #ecf0f1;
        }
        .navbar-custom .icon-bar {
            background-color: #ecf0f1;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Expense Tracker</a>
            </div>
        </div>
    </nav>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
