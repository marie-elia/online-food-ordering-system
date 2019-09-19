<?php
require('config.php');
//include("auth.php");
$rId=$_REQUEST['rId'];
$query = "SELECT * from restaurant where rId='".$rId."'"; 
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

<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$rId=$_REQUEST['rId'];
//$trn_date = date("Y-m-d H:i:s");
$rname =$_REQUEST['rname'];
$mnumber =$_REQUEST['mnumber'];
$opening_hour=$_REQUEST['Opening_Hour'];
$closing_hour=$_REQUEST['Closing_Hour'];

//$submittedby = $_SESSION["username"];
$update="update restaurant set rname='".$rname."', mnumber='".$mnumber."' , Opening_Hour='".$opening_hour."' where rId ='".$rId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='viewrestaurant.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="rId" type="hidden" value="<?php echo $row['rId'];?>" />
<p><input type="text" name="rname" placeholder="Enter Restaurant Name" 
required value="<?php echo $row['rname'];?>" /></p>
<p><input type="text" name="mnumber" placeholder="Enter number" 
required value="<?php echo $row['mnumber'];?>" /></p>
<p><input type="text" name="Opening_Hour" placeholder="Enter opening hour" 
required value="<?php echo $row['Opening_Hour'];?>" /></p>
<p><input type="text" name="Closing_Hour" placeholder="Enter closing hour" 
required value="<?php echo $row['Closing_Hour'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>