<?php
include('admin_header.php');

?>
<div id="main-content" style="margin-left: 260px;margin-top: 40px; overflow: auto;">
  <div id="ordersBtn">
    <h2 style="margin-bottom: 40px; text-align: center;">Order Details</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Order Id</th>
          <th> Image</th>
          <th>Product Name</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Discount</th>
          <th> Email</th>
          <th>Address</th>
          <th>Order Date</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <!-- <th>Edit</th> -->
        </tr>
      </thead>
      <?php

      $sql = "SELECT o.id as order_id,o.user_id as customer_id,o.amount as total_amount,o.payment_status,o.payment_mode,o.order_status,
      o.address, od.* from `orders` o INNER JOIN order_detail od ON o.id=od.order_id ORDER BY od.order_date DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $pid = realEscape($row['item_id']);
          $qty = realEscape($row['quantity']);
          $price = realEscape($row['price']);
          $discount = realEscape($row['discount']);
          $uid = realEscape($row['user_id']);
          $aid = realEscape($row['address']);
          $order_date = realEscape($row['order_date']);
          $payment_status = realEscape($row['payment_status']);
          $status = realEscape($row['status']);

          $sql = "SELECT * from `product` WHERE id='$pid'";
          $result1 = $conn->query($sql);
          $product_det = $result1->fetch_assoc();

          $sql = "SELECT * from `address` WHERE id='$aid'";
          $result2 = $conn->query($sql);
          $add = $result2->fetch_assoc();

          $user_name = '';
          $user_email = '';
          $arr = getUserInfo($uid);
          if ($arr) {
            $user_name = $arr['name'];
            $user_email = $arr['email'];
          }
      ?>
          <tr>
            <td><?= $row["id"] ?></td>
            <td><img height="80px" width="80px" src="<?php echo '..' . $product_det['pic'] ?>" alt="product_image"></td>
            <td><?= $product_det['product_name'] ?></td>
            <td><?= $qty ?></td>
            <td><?= $price ?></td>
            <td><?= $discount ?></td>
            <td><?= $user_email ?></td>
            <td><?= $add["address"] ?></td>
            <td><?php echo date('d-M-Y h:i a', strtotime($order_date)) ?></td>
            <td><select style="width: 140px;" onchange="changeStatus(this)" id="<?php echo $row['id'] ?>" class="form-select">
                <option selected <?php echo $status == 0 ? "selected" : ""; ?> value="0">Default</option>
                <option value="1" <?php echo $status == 1 ? "selected" : ""; ?>>Confirmed</option>
                <option value="2" <?php echo $status == 2 ? "selected" : ""; ?>>Accepted</option>
                <option value="3" <?php echo $status == 3 ? "selected" : ""; ?>>Cancelled</option>
                <option value="4" <?php echo $status == 4 ? "selected" : ""; ?>>Out for Delivery</option>
                <option value="5" <?php echo $status == 5 ? "selected" : ""; ?>>Delivered</option>
                <option value="6" <?php echo $status == 6 ? "selected" : ""; ?>>Returned</option>
              </select></td>
            <td><?= $payment_status ?></td>
            <!-- <td><a class="btn btn-success" data-href="#" href="javascript:void(0);">Edit</a></td> -->
          </tr>
      <?php

        }
      }
      ?>

    </table>

  </div>
  <!-- Modal -->
  <div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Products</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">

        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
</div>


</body>

</html>

<?php
include('admin_footer.php');
?>
<script>
  function changeStatus(ele) {

    id = $(ele).attr('id');
    sid = $(ele).val();

    $.ajax({
      url: 'change_order_status.php',
      method: 'post',
      data: {
        id: id,
        sid: sid
      },
      success: function(data) {
        console.log(data)

        if (data.trim() == '1') {
          Swal.fire({
            icon: "success",
            title: "Order Status Changed",
            text: "",
            showConfirmBtn: true,
          })

        } else {
          Swal.fire({
            icon: "error",
            title: "Something went wrong",
            text: "",
            showConfirmBtn: true,
          })

        }

      }
    });
  }
  //for view order modal  
  $(document).ready(function() {
    $('.openPopup').on('click', function() {
      var dataURL = $(this).attr('data-href');

      $('.order-view-modal').load(dataURL, function() {
        $('#viewModal').modal({
          show: true
        });
      });
    });
  });
</script>