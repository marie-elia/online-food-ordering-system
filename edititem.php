<?php
require('config.php');
//include("auth.php");
$itemId=$_REQUEST['itemId'];
$query = "SELECT * from item where itemId='".$itemId."'"; 
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

<h1>Update Promo</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$rId=$_REQUEST['rId'];
$item_name = $_REQUEST['item_name'];
//$itemId =$_REQUEST['item_id'];
$menufrom=$_REQUEST['menufrom'];
$menuto=$_REQUEST['menuto'];
$description=$_REQUEST['description'];
$price=$_REQUEST['price'];
//$submittedby = $_SESSION["username"];
$update="update item set item_name='".$item_name."',itemId='".$itemId."',menufrom='".$menufrom."',description='".$description."' ,menuto='".$menuto."',price='".$price."' where itemId='".$itemId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='itemcontroller.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="item_name" placeholder="Enter Item Name" 
required value="<?php echo $row['item_name'];?>" /></p>
<p><input type="time" name="menufrom" placeholder="Enter Menu starting Time " 
required value="<?php echo $row['menufrom'];?>" /></p>
<p><input type="time" name="menuto" placeholder="Enter Menu ending Time" 
required value="<?php echo $row['menuto'];?>" /></p>
<p><input type="number" name="price" placeholder="Enter Price" 
required value="<?php echo $row['price'];?>" /></p>
<p><input type="text" name="description" placeholder="Enter Description" 
required value="<?php echo $row['description'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>