<?php

   include("db_con.php");

if(isset($_POST['upload'])){
   $category_name=$_POST['c_name'];

   $sql="insert into `category`(category_id,category_name) values('NULL','$category_name')";
   $result=mysqli_query($con,$sql);

   if($result){
   	echo"<script>alert('Category Added.');</script>";
   	             header("Location: viewCategories.php");
   }
   else{
      	echo"<script>alert('Not Added.');</script>";
      	  header("Location: viewCategories.php");

   }
}


?>