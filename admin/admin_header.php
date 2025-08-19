<?php
session_start();
include_once("../connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style2.css">
  </link>
  <link href="../css/font-awesome.min.css" rel="stylesheet">

  <!-- bootstrap css file-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/sweetalert2.min.css">

</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar" id="mySidebar" style="width: 250px;">
    <div class="side-header" style="background-color: rgb(79,52,36);">
      <img src="../img/logo2.png" width="120" height="120" alt="Swiss Collection">
      <h5 style="margin-top:10px;">Hello, Admin</h5>
    </div>

    <hr style="border:1px solid; background-color: white; border-color:white;">

    <a href="admin.php"><i class="fa fa-home"></i> Dashboard</a>
    <a href="viewCustomers.php"><i class="fa fa-users"></i> Customers</a>
    <a href="viewCategories.php"><i class="fa fa-th-large"></i> Category</a>
    <a href="viewAllProducts.php"><i class="fa fa-th"></i> Products</a>
    <a href="viewAllOrders.php"><i class="fa fa-list"></i> Orders</a>

    <!---->
  </div>


  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: rgb(79,52,36); height: 95px;">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    <div class="user-cart" style="background-color: rgb(79,52,36);margin-top: 30px;">

      <!-- <a href="" style="text-decoration:none;margin-left: 350px">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>-->


      <a href="logout.php" style="text-decoration:none;margin-left: 1364px;">
        <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
      </a>


    </div>
  </nav>