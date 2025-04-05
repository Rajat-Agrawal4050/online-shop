<div class="container">
<table class="table table-striped" style="width: 840px !important">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
        </tr>
    </thead>
    <?php
          include("db_con.php");
        $ID= $_GET['orderID'];
        //echo $ID;
        $sql="SELECT * from `order_detail` where `order_id`='$ID'";
        $result=$con-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
            
    ?>
                <tr>
                    <td><?=$count?></td>
                    <td><img height="80px" src="images/<?php echo $row['pic'];?>"></td>
                    <td><?=$row["product_name"] ?></td>
                    <td><?=$row["qty"] ?></td>
                    <td><?=$row["price"]?></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
