<?php
 session_start();
   include_once("../connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../css/style2.css"></link>
	   <link href="../css/font-awesome.min.css" rel="stylesheet">
     
    <!-- bootstrap css file-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.min.js"></script> 
	 	 <script src="../js/bootstrap.min.js" type="text/javascript"></script>

     
</head>
<body>
       <!-- Sidebar -->
<div class="sidebar" id="mySidebar" style="width: 250px;">
<div class="side-header" style="background-color: #FE980F;">
    <img src="../img/logo2.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color: white; border-color:white;">
   
    <a href="#"><i class="fa fa-home"></i> Dashboard</a>
    <a href="viewCustomers.php"><i class="fa fa-users"></i> Customers</a>
    <a href="viewCategories.php"><i class="fa fa-th-large"></i> Category</a>
    <a href="viewBrands.php"><i class="fa fa-th-list"></i> Brand</a>    
    <a href="viewAllProducts.php"><i class="fa fa-th"></i> Products</a>
    <a href="viewAllOrders.php"><i class="fa fa-list"></i> Orders</a>
  
  <!---->
</div>


 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #FE980F; height: 95px;">  
   <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart" style="background-color: #FE980F;margin-top: 30px;">  
        
         <!-- <a href="" style="text-decoration:none;margin-left: 350px">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>-->
      
    
            <a href="logout.php" style="text-decoration:none;margin-left: 1364px;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

      
    </div>  
</nav>