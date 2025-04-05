<div class="col-sm-3">
            <div class="left-sidebar">
						<h2 style="color: #FE980F;">Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products-->
<?php 

$q1="select * from `category`";
$rs=mysqli_query($con,$q1);
$rows=mysqli_num_rows($rs);

while ($rows!=0) {
$row=mysqli_fetch_assoc($rs);
$cat_id=$row['category_id'];
$cat_name=$row['category_name'];
?>
							<div class="panel panel-default">
								<div class="panel-heading" id="category_div">
									<h4 class="panel-title"><a href="javascript:void(0)" onclick="cat(this,<?php echo $cat_id;?>)" class=""><?php echo $cat_name;?></a>
									</h4>	
<?php if($cat_id<=3){?>
	<a data-toggle="collapse" data-parent="#accordian" <?php echo "href='#sportswear$cat_id'";?>>
											<span class="badge pull-right" style="background-color: #FE980F;"><i class="fa fa-plus" style="color: white;"></i></span>
</a>
										<?php }?>
								</div>
<?php if($cat_id<=3){?>
								<div <?php echo "id='sportswear$cat_id'";?> class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nikuma</a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
										</ul>
									</div>
								</div>

 <script type="text/javascript">
	  function cat(element,id){

			$(document).ready(
         function(){
         	
         			$.ajax({

         				url:'category.php', 
         				type:'post',
         				data:{value:id},  
         				success:function(msg){       

         					$(".features_items").html(msg);
         				}
         			});
         		}        
		);
	}
</script>
<?php }?>
	</div>
<?php
$rows--;	
}
?>
</div><!--/category-products-->
	<div class="brands_products"><!--brands_products-->
		<h2 style="color: #FE980F;">Brands</h2>
			<div class="brands-name" id="brand_items">
				<ul class="nav nav-pills nav-stacked">
							
<?php 
$q1="select * from `brand` limit 12";
$rs=mysqli_query($con,$q1);
$rows=mysqli_num_rows($rs);

while ($rows!=0) {
$row=mysqli_fetch_assoc($rs);
$brand_id=$row['brand_id'];
$brand_name=$row['brand_name'];

$q1="select * from `product` where brand='$brand_id'";
$rs2=mysqli_query($con,$q1);
$products_count=mysqli_num_rows($rs2);

?>
										<li class="panel-title" onclick="brand(<?php echo $brand_id;?>)"><a href="javascript:void(0)">
											<span class="pull-right">(<?php echo $products_count; ?>)</span><?php echo $brand_name;?>
										</a>
									</li>
<script type="text/javascript">
	  function brand(id){

			$(document).ready(
         function(){
         			$.ajax({

         				url:'brand.php', 
         				type:'post',
         				data:{value:id},  
         				success:function(msg){       

         					$(".features_items").html(msg);
         				}
         			});
         		}        
		);
	}
</script>
<?php $rows--;}?>
</ul>
 </div>
  </div><!--/brands_products-->
						
		<div class="price-range">    <!--price-range-->
			<h2 style="color: #FE980F;">Price Range</h2>
			  <div class="well">
								 <input type="text" id="price-field" class="span2"><br/>
								 <b style="color: #FE980F;"> 0</b> <b class="pull-right" style="color: #FE980F;"> 600</b>
							<script type="text/javascript">
	
	$(document).ready(
         function(){
         	$("#price-field").keyup(function(){

         		var price=$("#price-field").val();

         		if(price.length==0){

         		}
         		else{
         			$.ajax({

         				url:'price_range.php', 
         				type:'post',
         				data:{value:price},  
         				success:function(msg){       

         					$(".features_items").html(msg);
         				}
         			});
         		}

         	});

         }        
		);

</script>

	</div>
	  </div><!--/price-range-->			
			<div class="shipping text-center"><!--shipping-->
				<img src="images/shipping.jpg" alt="" />
				</div><!--/shipping-->			
			      </div>
				 </div>