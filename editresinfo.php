<?php
require('config.php');
//include("auth.php");
//$itemId=$_REQUEST['itemId'];
$bId=$_REQUEST['bId'];
$query = "SELECT * from branch_areanew where bId='".$bId."'";
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

<h1>Update Branch</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$bId=$_REQUEST['bId'];
//$rId=$_REQUEST['rId'];
$city = $_REQUEST['city'];
$area_name =$_REQUEST['area_name'];
$delivery_charge=$_REQUEST['delivery_charge'];
$cuisine = $_REQUEST['cuisine'];
$openingfrom = $_REQUEST['openingfrom'];
$closingon = $_REQUEST['closingon'];
$supported_area = $_REQUEST['supported_area'];
$address = $_REQUEST['address'];


$update="update branch_areanew set  city='".$city."', area_name='".$area_name."',delivery_charge= '".$delivery_charge."', cuisine='".$cuisine."',openingfrom='".$openingfrom."',closingon='".$closingon."',supported_area='".$supported_area."',address='".$address."' where bId='".$bId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='resinfocontroller.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="city" placeholder="Enter City  " 
required value="<?php echo $row['city'];?>" /></p>

<p><input type="text" name="area_name" placeholder="Enter Area Name " 
required value="<?php echo $row['area_name'];?>" /></p>
<p><input type="text" name="delivery_charge" placeholder="Enter Delivery Charge " 
required value="<?php echo $row['delivery_charge'];?>" /></p>
<p><input type="text" name="cuisine" placeholder="Enter cuisine Type " 
required value="<?php echo $row['cuisine'];?>" /></p>
<p><input type="time" name="openingfrom" placeholder="Enter Opening Hour " 
required value="<?php echo $row['openingfrom'];?>" /></p>
<p><input type="time" name="closingon" placeholder="Enter Closing Hour " 
required value="<?php echo $row['closingon'];?>" /></p>
<p><input type="text" name="supported_area" placeholder="Enter Supported Area " 
required value="<?php echo $row['supported_area'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address  " 
required value="<?php echo $row['address'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>