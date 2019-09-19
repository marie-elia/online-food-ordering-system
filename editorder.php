<?php
require('config.php');
//include("auth.php");
$cartId=$_REQUEST['cartId'];
$query = "SELECT * from ordr where cartId='".$cartId."'"; 
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

<h1>Update Order Status</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
//$rId=$_REQUEST['rId'];
$status=$_REQUEST['status'];

$update="update ordr set status='".$status."' where cartId='".$cartId."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="status" placeholder="Update Status Here" 
required value="<?php echo $row['status'];?>" /></p>


<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>