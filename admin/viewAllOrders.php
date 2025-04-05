<?php
include('admin_header.php');
?>
<div id="main-content" style=" height: 550px; width: 1170px;margin-left: 312px;margin-top: 40px; overflow: auto;">
<div id="ordersBtn" >
  <h2 style="margin-bottom: 40px; text-align: center;">Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th> Email</th>
        <th>Address</th>
        <th>Order Date</th>
        <th>Total Amount</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>Txn ID</th>
        <th>View Product</th>
        <th>Edit</th>
     </tr>
    </thead>
     <?php
    
      $sql="SELECT * from `orders`";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["id"]?></td>
          <td><?=$row["customer_email"]?></td>
          <td><?=$row["customer_address"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["total_amount"]?></td>
          <td><?=$row["order_status"]?></td>
          <td><?=$row["payment_status"]?></td>
          <td><?=$row["transaction_id"]?></td>
              
        <td><a class="btn btn-primary openPopup" data-href="viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        <td><a class="btn btn-success" data-href="#" href="javascript:void(0);">Edit</a></td>
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
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>


 </body>
  </html>
