
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<?php 
//$id=$_REQUEST['id'];

session_start();

include('config.php');
//$username=$_REQUEST['username'];
//echo $row['username'];
$user = $_SESSION['username'];
echo $user;
$query2="SELECT * from usr_address where username='".$user."'"; 
$result = mysqli_query($link, $query2) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$status = "";

if(isset($_POST['new']) && $_POST['new']==1)
{
$area_name=$_REQUEST['area_name'];
$address=$_REQUEST['address'];
$apartment=$_REQUEST['apartmentNo'];
$floorNo=$_REQUEST['floorNo'];
$comment=$_REQUEST['comment'];

$update2="update usr_address set address='".$address."',  area_name='".$area_name."', apartmentNo ='".$apartment."',  floorNo='".$floorNo."', comment='".$comment."'  where username='".$user."'";       


mysqli_query($link, $update2) or die(mysqli_error($link));

$status = "Record Updated Successfully. </br></br>
<a href='address.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {


?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="area_name" placeholder="Enter Area Name " 
 value="<?php echo $row['area_name'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address " 
 value="<?php echo $row['address'];?>" /></p>
<p><input type="text" name="apartmentNo" placeholder="Enter Apartment No " 
 value="<?php echo $row['apartmentNo'];?>" /></p>
<p><input type="text" name="floorNo" placeholder="Enter Floor Number " 
 value="<?php echo $row['floorNo'];?>" /></p>
<p><input type="text" name="comment" placeholder="Enter Comment " 
 value="<?php echo $row['comment'];?>" /></p>


<p class="generic-btn danger"><input name="submite" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>
