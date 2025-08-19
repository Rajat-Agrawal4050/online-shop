<?php
include("../connection.php");

if (isset($_POST['p_name'])) {

  $ProductName = realEscape($_POST['p_name']);
  $price = realEscape($_POST['p_price']);
  $discount = realEscape($_POST['discount']);
  $desc = realEscape($_POST['p_desc']);
  $brand = realEscape($_POST['brand']);
  $category = realEscape($_POST['category']);
  $size = realEscape($_POST['size']);
  $availability = realEscape($_POST['availability']);
  $colour = realEscape($_POST['p_colour']);
  $keywords = realEscape($_POST['p_keywords']);

  $finalImage = '';
  if (isset($_FILES['p_pic']['tmp_name']) && $_FILES['p_pic']['tmp_name'] != '') {
    $file_name = $_FILES['p_pic']['name'];
    $tmp_name = $_FILES['p_pic']['tmp_name'];

    $target_dir = "../img/";
    $finalImage = $target_dir . $file_name;
    move_uploaded_file($tmp_name, $finalImage);
    $finalImage='/img/'. $file_name;
  }

  $insert_query = "insert into `product`(Category,brand,product_name,price,size,color,availability,discount,pic,description)
  values('$category','$brand','$ProductName','$price','$size','$colour','$availability','$discount','$finalImage','$desc')";
  $result = mysqli_query($conn, $insert_query);

  if (!$result) {
    echo mysqli_error($conn);
  } else {
    echo "1";
  }
}
