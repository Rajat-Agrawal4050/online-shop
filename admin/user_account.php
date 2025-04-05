
<?php
session_start();
include("db_con.php");
 if(isset($_SESSION['email'])){
include("header.php");
?>
<script type="text/javascript">
	let tab=document.querySelector('#account_tab');
	let home_tab=document.querySelector('#home_tab');
	//tab.style.color='red';
	tab.classList.add('active');
	home_tab.classList.remove('active');
</script>
<?php
 $user_email=$_SESSION['email'];
 $sql="select * from signup where email='$user_email'";
 $result_object=mysqli_query($con, $sql);
 $rows=mysqli_num_rows($result_object);
 if($rows>0){
$data=mysqli_fetch_assoc($result_object);
$user_name=$data['name'];
$email=$data['email'];
$user_id=$data['user_id'];
$phone_number=$data['phone_number'];
$address=$data['address'];
$city=$data['city'];
$pic=$data['pic'];
 }	
?> 

<div class="features_items text-center">
<h1 class="text-center" style="color: orange; margin-bottom: 20px; font-weight: bold;">User Account :</h1>
<div style="display: flex; flex-direction: column;">

<div style="display: flex; align-items: center;">
<h2 style="margin-left: 550px; color: orange;font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700; ">User Name :</h2>
<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 35px;"><?php echo $user_name;?></h2>
</div>

<div style="display: flex;">
<h2 style="margin-left: 550px; color: orange; font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700;">Email :</h2>
<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 80px;"><?php echo $email;?></h2>
</div>

<div style="display: flex;">
<h2 style="margin-left: 550px; color: orange; font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700;">User Id :</h2>
	<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 70px;"><?php echo $user_id;?></h2>
</div>

<div style="display: flex;">
<h2 style="margin-left: 550px; color: orange; font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700;">Phone No. :</h2>
<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 40px;"><?php echo $phone_number;?></h2>
</div>

<div style="display: flex;">
<h2 style="margin-left: 550px;color: orange; font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700;">Address :</h2>
<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 55px;"><?php echo $address;?></h2>
</div>

<div style="display: flex;">
<h2 style="margin-left: 550px; color: orange; font-family: 'Roboto', sans-serif;font-size: 18px;font-weight: 700;">City :</h2>
	<h2 style="font-family: 'Roboto', sans-serif;font-size: 18px; color: #696763; font-weight: 700; margin-left: 90px;"><?php echo $city;?></h2>
</div>

<div style="height: 200px;width: 150px; position: relative;top: -298px;left: 1080px;">
	<img src="<?php echo 'images/'.$pic;?>" style="max-width: 150px; max-height: 200px;">
</div>

</div>
</div>

<?php
include("footer.php");
?>

<script type="text/javascript">
  $('footer').css("margin-top","300px");
</script>	
</body>
</html>
<?php }
else{
	header("Location: login.php");
}

 ?>