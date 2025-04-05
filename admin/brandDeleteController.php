<?php

  include("db_con.php");
    
    $b_id=$_POST['record'];
    $query="DELETE FROM `brand` where `brand_id`='$b_id'";

    $data=mysqli_query($con,$query);

    if($data){
        echo"Brand Item Deleted";
        // header("Location: viewCategories.php");
    }
    else{
        echo"Not able to delete";
        // header("Location: viewCategories.php");
    }
    
?>