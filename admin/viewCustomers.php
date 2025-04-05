<?php
include('admin_header.php');
?>
<div id="main-content" style=" height: 550px; width: 1100px;margin-left: 340px;margin-top: 40px; overflow: auto;">
<div >
  <h2 style="text-align: center; margin-bottom: 20px;">All Customers</h2>
  <table class="table " align="center">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Address</th>
      </tr>
    </thead>
    <?php
     
      $sql="SELECT * from `users`";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["mobile"]?></td>
      <td><?=$row["address"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
</div>
</div>
</body>
</html>