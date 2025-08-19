<?php
include("../connection.php");
  
if(isset($_POST['record'])){
	$p_id=realEscape($_POST['record']);

  $sql="SELECT * FROM `product` WHERE id='$p_id'";
	$rs=mysqli_query($conn,$sql);
  if(!$rs){
    echo json_encode(array('data'=> false, 'status'=> 'error'));
    die;
  }

	$numberOfRow=mysqli_num_rows($rs);
	if($numberOfRow>0){
		$row=mysqli_fetch_assoc($rs);
    echo json_encode(array('data'=> $row, 'status'=> 'success'));
  }
    else{
      echo json_encode(array('data'=> false, 'status'=> 'success'));
    }
  }


?>