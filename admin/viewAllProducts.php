<?php
include('admin_header.php');
?>
<div id="main-content" style=" height: 585px; width: 1280px;margin-left: 252px;margin-top: 0px; overflow: auto;">
  <div>
    <h2 align="center" style="margin-bottom: 18px;">Product Items</h2>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Product Image</th>
          <th class="text-center">Product Name</th>
          <th class="text-center">Discount</th>
          <th class="text-center">Category Name</th>
          <th class="text-center">Unit Price</th>
          <th class="text-center">Description</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <?php

      $sql = "SELECT *,product.id as pid from `product`, `category` WHERE product.Category=category.category_name";
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?= $count ?></td>
            <td><img height='100px' src="..<?php echo $row['pic']; ?>"></td>
            <td><?= $row["product_name"] ?></td>
            <td><?= $row["discount"] ?></td>
            <td><?= $row["Category"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><?= $row["description"] ?></td>
            <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?= $row['pid'] ?>')">Edit</button></td>
            <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?= $row['pid'] ?>')">Delete</button></td>

            <script type="text/javascript">
              //edit product data
              function itemEditForm(id) {
                
                $.ajax({
                  url: "editItemForm.php",
                  method: "post",
                  data: {
                    record: id
                  },
                  success: function(data) {
                    $('#main-content').html(data);
                  }
                });
              }

              //delete product data
              function itemDelete(id) {

                $.ajax({
                  url: "deleteItem.php",
                  method: "post",
                  data: {
                    record: id
                  },
                  success: function(data) {
                    alert('Items Successfully deleted');
                    // $('form').trigger('reset');
                    // showProductItems();
                  }
                });
              }
            </script>

          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-success " style="height:40px" data-bs-toggle="modal" data-bs-target="#myForm">
      Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myForm" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">New Product Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

            <form enctype='multipart/form-data' action="" method="POST">
              <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="p_name" required>
              </div>
              <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="p_price" required>
              </div>
              <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" class="form-control" name="discount" required>
              </div>
              <div class="form-group">
                <label for="">Description:</label>
                <input type="text" class="form-control" name="p_desc" required>
              </div>
              <div class="form-group">
                <label>Category:</label>
                <select id="category" name="category">
                  <option disabled selected>Select category</option>
                  <?php

                  $sql = "SELECT * from `category`";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Brand:</label>
                <select id="brand" name="brand">
                  <option disabled selected>Select Brand</option>
                  <?php

                  $sql = "SELECT * from `brand`";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" name="file">
              </div>
              <div class="form-group">
                <label for="">Colour(Optional) :</label>
                <input type="text" class="form-control" name="p_colour">
              </div>
              <div class="form-group">
                <label for="">Keywords:</label>
                <input type="text" class="form-control" name="p_keywords" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="upload" style="height:40px">Add Item</button>
              </div>
            </form>

            <?php
            if (isset($_POST['upload'])) {
              $ProductName = $_POST['p_name'];
              $price = $_POST['p_price'];
              $discount = $_POST['discount'];
              $desc = $_POST['p_desc'];
              $category = $_POST['category'];
              $brand = $_POST['brand'];
              $keywords = $_POST['p_keywords'];
              $colour = $_POST['p_colour'];

              if (isset($_FILES['file'])) {
                $file_name = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];
              }
              $target_dir = "images/";
              $finalImage = $target_dir . $file_name;

              move_uploaded_file($tmp_name, $finalImage);

              $insert_query = "insert into `product`(id,Category,brand,product_name,price,colour,availability,discount,pic,description,product_keywords)
  values('NULL','$category','$brand','$ProductName','$price','$colour','In Stock','$discount','$file_name','$desc','$keywords')";
              $result = mysqli_query($con, $insert_query);

              if (!$result) {
                echo mysqli_error($con);
              } else {
                echo "Records added successfully.";
              }
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>



</body>

</html>