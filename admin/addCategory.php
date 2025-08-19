<?php

include("../connection.php");

if (isset($_POST['addCategory'])) {
   $cat_name = realEscape($_POST['cat_name']);
   $cat_type = realEscape($_POST['cat_type']);

   $img = '';
   if (isset($_FILES['cat_img']['tmp_name'])) {
      $file_name = $_FILES['cat_img']['name'];
      if (!move_uploaded_file($_FILES['cat_img']['tmp_name'], '../uploads/img/'.$file_name)) {
         echo -2;
      } else {
         $img = $this_site_url . '/uploads/img/' . $file_name;
      }
   }

   $sql = "INSERT INTO `category`(`category_name`, `category_type`, `parent_category`, `image_url`)
    VALUES ('$cat_name','$cat_type',NULL,'$img')";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      echo 1;
   } else {
      echo 0;
   }
}
die;
