<?php
include('admin_header.php');
?>
<div id="main-content" style="height: 550px; width: 1100px;margin-left: 340px;margin-top: 40px; overflow: auto;">
<div >
 <h2 style="text-align: center; margin-bottom: 20px;">Brands List</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Brand Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      $sql="SELECT * from `brand`";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["brand_name"]?></td>   
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['brand_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <script type="text/javascript">
//delete category data
function categoryDelete(id){
    $.ajax({
        url:"brandDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Brand Successfully deleted');
            window.location.href='viewBrands.php';
          
        }
    });
}
</script>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Brand
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Brand Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="addBrands.php" method="POST">
            <div class="form-group">
              <label for="b_name">Brand Name:</label>
              <input type="text" class="form-control" name="b_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="submit" style="height:40px">Add Brand</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
</div>
     <script src="../js/bootstrap.min.js" type="text/javascript"></script>
 <?php
include('admin_footer.php');
 ?>  