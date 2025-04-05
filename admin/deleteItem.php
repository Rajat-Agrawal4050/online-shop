<?php

    include("db_con.php");
    
    $p_id=$_POST['record'];
    $query="DELETE FROM `product` where `id`='$p_id'";

    $data=mysqli_query($con,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>