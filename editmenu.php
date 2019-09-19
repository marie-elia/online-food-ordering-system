<?php
require('config.php');
//include("auth.php");
$menuId=$_REQUEST['menuId'];
$query = "SELECT * from menu where menuId='".$menuId."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h1>Update Menu</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$rId=$_REQUEST['rId'];
$menuId=$_REQUEST['menuId'];
//$item_name = $_REQUEST['item_name'];
//$itemId =$_REQUEST['item_id'];
$menu=$_REQUEST['menu'];
$menufrom=$_REQUEST['menufrom'];
$menuto=$_REQUEST['menuto'];
//$description=$_REQUEST['description'];
//$price=$_REQUEST['price'];
//$submittedby = $_SESSION["username"];
$update="update menu set menu='".$menu."',menufrom='".$menufrom."', menuto='".$menuto."' where menuId='".$menuId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='menucontroller.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="menu" placeholder="Enter Menu Name" 
required value="<?php echo $row['menu'];?>" /></p>
<p><input type="time" name="menufrom" placeholder="Enter Menu starting Time " 
required value="<?php echo $row['menufrom'];?>" /></p>
<p><input type="time" name="menuto" placeholder="Enter Menu ending Time" 
required value="<?php echo $row['menuto'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>