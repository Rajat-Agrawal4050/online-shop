<?php
include("db_con.php");
$brand_id=$_POST['value'];

$query2="select * from `product` where brand='$brand_id'";
$rs2=mysqli_query($con, $query2);
		$rows=mysqli_num_rows($rs2);
			if($rows>0){
	            while($rows>0)
							{
								$row=mysqli_fetch_assoc($rs2);
								$brand= $row['brand'];
								$product_name=$row['product_name'];
								$discount=$row['discount'];
								$price=$row['price'];
		    					$pic=$row['pic'];
		    					$id=$row['id'];	
						?>
						<div class="col-sm-4"><a href="product-details.php?id=<?php echo $id;?>">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo 'images/'.$pic; ?>" alt="" style="max-width: 120px;max-height: 120px;" />
												<h2><?php echo $discount."%"; ?></h2>
											<h2 style=" font-family: 'Roboto', sans-serif;font-size: 24px;font-weight: 700;color: #FE980F; margin-top: 20px; margin-bottom: 10px;"><i class="fa fa-inr"></i> <?php echo $price;?></h2>
											<p style="margin-bottom: 11px;"><?php echo substr($product_name, 0,32);?></p>
											<a href="addcart.php?id=<?php echo $id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
											<div class="product-overlay" onclick="run(<?php echo $id;?>)">
			
										<div class="overlay-content">
											<h2><i class="fa fa-inr"></i> <?php echo $price;?></h2>
											<p><?php echo substr($product_name, 0,32);?></p>
											<a href="addcart.php?id=<?php echo $id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>

                                    <script type="text/javascript">
										function run(id){
											window.location.href=`product-details.php?id=${id}`;
										}
									</script>
										
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div></a>
						</div>
						<?php
						  $rows-=1;
						    }
						    }
						    else{
						    		echo "<span style='text-align: center;'><h3 style='color: #FE980F; font-weight: bolder; margin-top: 185px;'> No items.</h3></span>";
						    }
						    ?>	