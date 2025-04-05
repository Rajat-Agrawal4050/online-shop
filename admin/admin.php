<?php
include("../connection.php");
$email = mysqli_real_escape_string($conn, $_POST['uname']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql="select * from admin where email='$email'";
//  echo $sql; die;
$t=mysqli_query($conn, $sql);

           if(mysqli_num_rows($t)>0)
            {

$row=mysqli_fetch_assoc($t);
if (password_verify($password, $row['password'])) {

    $_SESSION['admin_id'] = $row['user_id'];

                 include('admin_header.php');
                 $userid=$row['user_id'];
                 $u_name=$row['name'];
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                $_SESSION['admin_name']=$u_name;
                ?>
<div id="main-content" class="container allContent-section py-4" style="margin-left: 305px;">
<div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Users</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from users";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Categories</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from category";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Products</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total orders</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from `orders`";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
            </div>

        </div>
</div>         
</body>
</html>
      <?php
            }
            else{

            }
        }
            else
            { 
                 echo"<script>window.location.href='index.php'</script>";     
            }  
?>

 