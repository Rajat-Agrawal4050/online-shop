<?php
include("../connection.php");
?>
<div class="container p-5">

<h3 align="center">Edit Product Detail</h3>
<?php
  
	$p_id=$_POST['record'];
  $sql="SELECT * FROM `product` WHERE id='$p_id'";
	$rs=mysqli_query($conn,$sql);
	$numberOfRow=mysqli_num_rows($rs);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($rs)){
      $catID=$row1["Category"];
?>
<form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
	
    <div class="form-group">
      <input type="hidden" id="p_id" value="<?=$row1['id']?>">
    </div>
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" id="p_name" value="<?=$row1['product_name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Product Description:</label>
      <input type="text" class="form-control" id="p_desc" value="<?=$row1['description']?>">
    </div>
    <div class="form-group">
      <label for="price">Unit Price:</label>
      <input type="number" class="form-control" id="p_price" value="<?=$row1['price']?>">
    </div>
    <div class="form-group">
      <label>Category:</label>
      <select id="category">
        <?php
          $sql="SELECT * from `category` WHERE category_name='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from `category` WHERE category_name!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         <img height='150px' src="..<?php echo $row1['pic'];?>">
         <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$row1['pic']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>


        <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    //update product after submit
function updateItems(){
    
    var p_id = $('#p_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
  
    fd.append('p_id', p_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
       // $('form').trigger('reset');
       // showProductItems();
      }
    });
}
</script>
  </body>
  </html>