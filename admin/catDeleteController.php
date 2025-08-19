<?php
  include("../connection.php");
    
    $c_id=realEscape($_POST['record']);
    $query="DELETE FROM `category` where `id`='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"1";
    }
    else{
        echo "0";
    }
    
?>