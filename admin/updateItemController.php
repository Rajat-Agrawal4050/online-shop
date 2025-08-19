<?php
include("../connection.php");

$p_id = realEscape($_POST['p_id']);
$p_name = realEscape($_POST['p_name']);
$p_price = realEscape($_POST['p_price']);
$discount = realEscape($_POST['discount']);
$p_desc = realEscape($_POST['p_desc']);
$brand = realEscape($_POST['brand']);
$category = realEscape($_POST['category']);
$size = realEscape($_POST['size']);
$p_colour = realEscape($_POST['p_colour']);
$availability = realEscape($_POST['availability']);
$existingImage = realEscape($_POST['existingImage']);

$final_image = '';
if (isset($_FILES['newImage']['tmp_name']) && $_FILES['newImage']['tmp_name'] != '') {

    $img = $_FILES['newImage']['name'];
    $tmp = $_FILES['newImage']['tmp_name'];
    $dir = '/img/';
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');
    if (in_array($ext, $valid_extensions)) {
        move_uploaded_file($tmp, '..' . $dir . $img);
        $final_image = $dir . $img;
    }
}
$sql = "UPDATE `product` SET product_name='$p_name', `description`='$p_desc', price='$p_price', Category='$category', discount='$discount', brand='$brand', `size`='$size', color='$p_colour', `availability`='$availability'";
if ($final_image != '') {
    $sql .= " ,pic='$final_image'";
}
$sql .= " WHERE id='$p_id'";

$updateItem = mysqli_query($conn, $sql);

if ($updateItem) {
    echo "1";
} else {
    echo mysqli_error($conn);
}
