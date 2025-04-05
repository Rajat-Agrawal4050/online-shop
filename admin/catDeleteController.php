<?php

  include("db_con.php");
    
    $c_id=$_POST['record'];
    $query="DELETE FROM `category` where `category_id`='$c_id'";

    $data=mysqli_query($con,$query);

    if($data){
        echo"Category Item Deleted";
        // header("Location: viewCategories.php");
    }
    else{
        echo"Not able to delete";
        // header("Location: viewCategories.php");
    }
    
?>