<?php

  include("db_con.php");

if(isset($_POST['submit'])){
   $brand_name=$_POST['b_name'];

   $sql="insert into `brand`(brand_id,brand_name) values('NULL','$brand_name')";
   $result=mysqli_query($con,$sql);

   if($result){
   	echo"<script>alert('Brand Added.');</script>";
   	             header("Location: viewBrands.php");
   }
   else{
      	echo"<script>alert('Not Added.');</script>";
      	  header("Location: viewBrands.php");

   }
}


?>