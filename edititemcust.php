<?php
require('config.php');
//include("auth.php");
//$itemId=$_REQUEST['itemId'];
$customId=$_REQUEST['customId'];
$query = "SELECT * from item_custom where customId='".$customId."'";
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

<h1>Update Item Custom</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$rId=$_REQUEST['rId'];
//$item_name = $_REQUEST['item_name'];
//$itemId =$_REQUEST['itemId'];
$customId=$_REQUEST['customId'];
//$menufrom=$_REQUEST['menufrom'];
$customType=$_REQUEST['customType'];
$update="update item_custom set customType='".$customType."'  where customId='".$customId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='itemcustcontroller.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="customType" placeholder="Enter Custom Type " 
required value="<?php echo $row['customType'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>