<?PHP

include("../connection.php");
if (isset($_POST['sid'])) {

    $status_id = realEscape($_POST['sid']);
    $order_detail_id = realEscape($_POST['id']);

    $sql = "UPDATE order_detail SET `status`='$status_id' WHERE id='$order_detail_id'";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        echo mysqli_error($conn);
    } else {
        echo "1";
    }
}
