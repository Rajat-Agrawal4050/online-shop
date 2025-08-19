<?php
    include("../connection.php");

    $p_id=realEscape($_POST['record']);
    $query="DELETE FROM `product` where `id`='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"1";
    }
    else{
        echo"0";
    }
    
?>