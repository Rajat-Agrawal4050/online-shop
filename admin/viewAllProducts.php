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
            <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?= $row['pid'] ?>',this)">Delete</button></td>

          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-success " style="height:40px; margin-bottom:60px;" data-bs-toggle="modal" data-bs-target="#myForm11">
      Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myForm11" tabindex="-1" aria-labelledby="myForm11" aria-hidden="true">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">New Product</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">

            <form id="addForm" enctype='multipart/form-data' action="#" method="POST">
              <div class="form-group">
                <label for="p_name">Product Name:</label>
                <input type="text" class="form-control" id="p_name" name="p_name">
              </div>
              <div class="form-group">
                <label for="p_price">Price:</label>
                <input type="number" class="form-control" id="p_price" name="p_price">
              </div>
              <div class="form-group">
                <label for="discount">Discount:(Percentage %)</label>
                <input type="number" class="form-control" id="discount" name="discount">
              </div>
              <div class="form-group">
                <label for="p_desc">Description:</label>
                <textarea class="form-control" rows="4" id="p_desc" name="p_desc"></textarea>
              </div>
              <div class="form-group">
                <label for="brand">Brand Name:</label>
                <input type="text" id="brand" name="brand" class="form-control">
              </div>
              <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" class="form-select" name="category">
                  <option value="" disabled selected>Select category</option>
                  <?php

                  $sql = "SELECT * from `category`";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="size">Size:</label>
                <select id="size" class="form-select" name="size">
                  <option value="" disabled selected>Select Size</option>
                  <option value="S">Small</option>
                  <option value="M">Medium</option>
                  <option value="L">Large</option>
                  <option value="XL">Extra Large</option>
                </select>
              </div>
              <div class="form-group">
                <label for="availability">Availability:</label>
                <select id="availability" class="form-select" name="availability">
                  <option value="" disabled selected>Select Availability</option>
                  <option value="In Stock">In Stock</option>
                  <option value="Out of Stock">Out of Stock</option>
                </select>
              </div>

              <div class="form-group">
                <img height='150px' id="image_preview1" src="../img/placehoder_img.png">
                <div>
                  <label for="p_pic" class="form-label">Choose Image:</label>
                  <input type="file" data-imgfor="image_preview1" class="form-control-file validateImage" id="p_pic" name="p_pic">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="p_colour">Colour(Optional) :</label>
                <input type="text" class="form-control" id="p_colour" name="p_colour">
              </div>
              <div class="form-group">
                <label for="p_keywords" class="form-label">Keywords:</label>
                <input type="text" class="form-control" id="p_keywords" name="p_keywords">
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary" name="upload" id="uploadBtn1" style="height:40px">Add</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="height:40px">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>


<!-- Edit Modal -->
<div class="modal fade" id="myForm12" tabindex="-1" aria-labelledby="myForm12" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <form id="editForm" enctype='multipart/form-data' action="#" method="POST">
          <div class="form-group">
            <label for="p_name2">Product Name:</label>
            <input type="text" class="form-control" id="p_name2" name="p_name2">
          </div>
          <div class="form-group">
            <label for="p_price2">Price:</label>
            <input type="number" class="form-control" id="p_price2" name="p_price2">
          </div>
          <div class="form-group">
            <label for="discount2">Discount:(Percentage %)</label>
            <input type="number" class="form-control" id="discount2" name="discount2">
          </div>
          <div class="form-group">
            <label for="p_desc2">Description:</label>
            <textarea class="form-control" rows="4" id="p_desc2" name="p_desc2"></textarea>
          </div>
          <div class="form-group">
            <label for="brand2">Brand Name:</label>
            <input type="text" id="brand2" name="brand2" class="form-control">
          </div>
          <div class="form-group">
            <label for="category2">Category:</label>
            <select id="category2" class="form-select" name="category2">
              <option value="" disabled selected>Select category</option>
              <?php

              $sql = "SELECT * from `category`";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['category_name'] . "'>" . $row['category_name'] . "</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="size2">Size:</label>
            <select id="size2" class="form-select" name="size2">
              <option value="" disabled selected>Select Size</option>
              <option value="S">Small</option>
              <option value="M">Medium</option>
              <option value="L">Large</option>
              <option value="XL">Extra Large</option>
            </select>
          </div>
          <div class="form-group">
            <label for="availability2">Availability:</label>
            <select id="availability2" class="form-select" name="availability2">
              <option value="" disabled selected>Select Availability</option>
              <option value="In Stock">In Stock</option>
              <option value="Out of Stock">Out of Stock</option>
            </select>
          </div>

          <div class="form-group">
            <img height='150px' id="image_preview" src="">
            <div>
              <label class="form-label" for="p_pic2">Choose Image:</label>
              <input type="text" id="existingImage" class="form-control" hidden>
              <input type="file" data-imgfor="image_preview" class="form-control-file validateImage" id="p_pic2" name="p_pic2">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="p_colour2">Colour(Optional) :</label>
            <input type="text" class="form-control" id="p_colour2" name="p_colour2">
          </div>
          <div class="form-group">
            <label for="p_keywords2" class="form-label">Keywords:</label>
            <input type="text" class="form-control" id="p_keywords2" name="p_keywords2">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary" name="upload" id="uploadBtn2" style="height:40px">Edit</button>
          </div>
          <input type="hidden" id="product_id" name="product_id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="height:40px">Close</button>
      </div>
    </div>

  </div>
</div>



</body>

</html>

<?php
include('admin_footer.php');
?>

<script>
  $(".validateImage").on("change", function(event) {
    var fileExtension = ['png', 'jpg', 'gif', 'jpeg'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
      Swal.fire({
        icon: 'error',
        title: 'Only .png, .jpg, .jpeg and .gif formats are allowed.',
        showConfirmButton: true
      })
      this.value = '';
    } else {
      var imgsrc = URL.createObjectURL(event.target.files[0]);
      $("#" + $(this).data('imgfor')).attr('src', imgsrc);
    }
  })

  $(document).on('click', '#uploadBtn1', function() {

    let p_name = $('#p_name').val().trim();
    let p_price = $('#p_price').val();
    let discount = $('#discount').val();
    let p_desc = $('#p_desc').val().trim();
    let brand = $('#brand').val().trim();
    let category = $('#category').val();
    let size = $('#size').val();
    let availability = $('#availability').val();
    let p_pic = $('#p_pic').prop('files')[0];
    let p_colour = $('#p_colour').val().trim();
    let p_keywords = $('#p_keywords').val().trim();

    if (!p_name) {
      Swal.fire('Please Enter Product Name', '', 'error');
      return;
    }
    if (p_price < 1) {
      Swal.fire('Please Enter Price', '', 'error');
      return;
    }
    if (discount < 0) {
      Swal.fire('Discount cannot be Negative', '', 'error');
      return;
    }
    if (!p_desc) {
      Swal.fire('Please Enter Description', '', 'error');
      return;
    }
    if (!brand) {
      Swal.fire('Please Enter Brand Name', '', 'error');
      return;
    }
    if (!category) {
      Swal.fire('Please Select Category', '', 'error');
      return;
    }
    if (!size) {
      Swal.fire('Please Select Any Size', '', 'error');
      return;
    }
    if (!availability) {
      Swal.fire('Please Select Availability', '', 'error');
      return;
    }
    if (!p_pic) {
      Swal.fire('Please Choose any Product Image', '', 'error');
      return;
    }

    let form_data = new FormData();
    form_data.append('p_name', p_name);
    form_data.append('p_price', p_price);
    form_data.append('discount', discount);
    form_data.append('p_desc', p_desc);
    form_data.append('brand', brand);
    form_data.append('category', category);
    form_data.append('size', size);
    form_data.append('availability', availability);
    form_data.append('p_pic', p_pic);
    form_data.append('p_colour', p_colour);
    form_data.append('p_keywords', p_keywords);

    $.ajax({
      url: "addProduct.php",
      method: "post",
      data: form_data,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log(data)
        if (data.trim() == '1') {
          $('#myForm11').modal('hide');
          Swal.fire({
            icon: "success",
            title: "Product Inserted Successfully",
            text: "",
            showConfirmBtn: true,
          })
          setTimeout(function() {
            location.reload();
          }, 1000);
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

  })

  function itemEditForm(id) {

    $.ajax({
      url: "editItemForm.php",
      method: "post",
      data: {
        record: id
      },
      success: function(data) {
        data = JSON.parse(data);
        console.log(data)
        if (data.status == 'success' && data.data !== false) {

          let id = data.data.id;
          let Category = data.data.Category;
          let brand = data.data.brand;
          let product_name = data.data.product_name;
          let price = data.data.price;
          let size = data.data.size;
          let color = data.data.color;
          let availability = data.data.availability;
          let discount = data.data.discount;
          let pic = data.data.pic;
          let description = data.data.description;

          $('#product_id').val(id);
          $('#p_name2').val(product_name);
          $('#p_price2').val(price);
          $('#discount2').val(discount);
          $('#p_desc2').html(description);
          $('#brand2').val(brand);
          $('#category2').val(Category);
          $('#size2').val(size);
          $('#p_colour2').val(color);
          $('#availability2').val(availability);
          $('#image_preview').attr('src', '..' + pic);
          $('#existingImage').val(pic);

          // if($('#p_pic2').prop('files').length>0){
          //  let pic_name= $('#p_pic2').prop('files')[0].name;
          //  $('#existingImage').val('/img/'+pic_name);
          // }

          $('#myForm12').modal('show');
        } else {
          Swal.fire({
            icon: "error",
            title: "Something went wrong",
            text: data,
            showConfirmBtn: true,
          })
        }

      }
    });
  }

  $(document).on('click', '#uploadBtn2', function() {
    // alert('ok')
    // return;
    let p_id = $('#product_id').val();
    let p_name2 = $('#p_name2').val();
    let p_price2 = $('#p_price2').val();
    let discount2 = $('#discount2').val();
    let p_desc2 = $('#p_desc2').html();
    let brand2 = $('#brand2').val();
    let category2 = $('#category2').val();
    let size2 = $('#size2').val();
    let p_colour2 = $('#p_colour2').val();
    let availability2 = $('#availability2').val();
    let old_img = $('#existingImage').val();
    let new_img = null;
    if ($('#p_pic2').prop('files').length > 0) {
      new_img = $('#p_pic2').prop('files')[0];
    }

    var fd = new FormData();

    fd.append('p_id', p_id);
    fd.append('p_name', p_name2);
    fd.append('p_price', p_price2);
    fd.append('discount', discount2);
    fd.append('p_desc', p_desc2);
    fd.append('brand', brand2);
    fd.append('category', category2);
    fd.append('size', size2);
    fd.append('p_colour', p_colour2);
    fd.append('availability', availability2);
    fd.append('existingImage', old_img);
    fd.append('newImage', new_img);

    $.ajax({
      url: 'updateItemController.php',
      method: 'post',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data) {
        console.log(data)

        if (data.trim() == '1') {
          $('#myForm12').modal('hide');
          Swal.fire({
            icon: "success",
            title: "Product Edited Successfully",
            text: "",
            showConfirmBtn: true,
          })
          setTimeout(function() {
            location.reload();
          }, 1000);
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

  });


  function itemDelete(id, ele) {

    let target = $(ele).parent().parent();

    Swal.fire({
      title: 'Are you sure?',
      text: "You want to Delete This Product?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete it.'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "deleteItem.php",
          method: "post",
          data: {
            record: id
          },
          success: function(data) {
            console.log(data)
            if (data.trim() == '1') {
              Swal.fire({
                icon: "success",
                title: "Product deleted Successfully",
                text: "",
                showConfirmBtn: true,
              })
              $(target).fadeOut(400);
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
    })
  }
</script>