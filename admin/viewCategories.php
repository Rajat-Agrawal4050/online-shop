<?php
include('admin_header.php');
?>
<div id="main-content" style="height: 550px; width: 1100px;margin-left: 340px;margin-top: 40px;">
  <div>
    <h2 style="text-align: center; margin-bottom: 20px;">Category Items</h2>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Category Name</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT * from `category`";
      $result = $conn->query($sql);
      $count = 1;
      // echo $result->num_rows;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td><?= $count ?></td>
            <td><?= $row["category_name"] ?></td>
            <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
            <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?= $row['id'] ?>',this)">Delete</button></td>
          </tr>
      <?php
          $count = $count + 1;
        }
      }
      ?>
    </table>

    <script type="text/javascript">
      //delete category data
      function categoryDelete(id, ele) {

        let target = $(ele).parent().parent();

        Swal.fire({
          title: 'Are you sure?',
          text: "You want to Delete This Category!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "catDeleteController.php",
              method: "post",
              data: {
                record: id
              },
              success: function(data) {
                console.log(data)
                if (data.trim() == '1') {
                  Swal.fire({
                    icon: "success",
                    title: "Category deleted Successfully",
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
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-success" style="height:40px; margin-bottom: 100px;" data-bs-toggle="modal" data-bs-target="#myModal22">
      Add Category
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal22" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form enctype="multipart/form-data" action="#" method="POST">
            <div class="modal-header">
              <h4 class="modal-title fs-5">New Category Item</h4>
              <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label class="form-label" for="c_name">Category Name:</label>
                <input type="text" class="form-control my-2" name="c_name" id="c_name">
              </div>

              <div class="form-group">
                <label class="form-label" for="c_type">Category Type:</label>

                <select name="c_type" id="c_type" class="form-select my-2" aria-label="Default select example">
                  <option value="" selected>Select Category Type</option>
                  <option value="main">Main</option>
                  <option value="sub_category">Sub Category</option>
                  <option value="child_category">Child Category</option>
                </select>
              </div>

              <div class="form-group mt-3">
                <label for="cat_img" class="form-label">Select Category Image:</label>
                <input class="form-control my-2" type="file" accept=".png,.jpeg,.jpg" id="cat_img">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" id="uploadBtn" class="btn btn-secondary" name="upload">Add</button>
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

      </div>
    </div>


  </div>
</div>

<?php
include('admin_footer.php');
?>

<script>
  $(document).on('click', '#uploadBtn', function() {

    let cat_name = $('#c_name').val().trim();
    let cat_type = $('#c_type').val();
    let cat_img = $('#cat_img').prop('files')[0];

    if (!cat_name) {
      Swal.fire('Please Enter Category Name', '', 'error');
      return;
    }
    if (cat_type == '') {
      Swal.fire('Please Select Category Type', '', 'error');
      return;
    }
    if (!cat_img) {
      Swal.fire('Please Upload Category Image', '', 'error');
      return;
    }

    let form_data = new FormData();
    form_data.append('addCategory', true);
    form_data.append('cat_name', cat_name);
    form_data.append('cat_type', cat_type);
    form_data.append('cat_img', cat_img);

    $.ajax({
      url: "addCategory.php",
      method: "post",
      data: form_data,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log(data)
        if (data.trim() == '1') {
          $('#myModal22').modal('hide');
          Swal.fire({
            icon: "success",
            title: "Category Added Successfully",
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

  })
</script>