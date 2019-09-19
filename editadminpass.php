<?php
require('config.php');
//include("auth.php");
$username=$_REQUEST['username'];
$query = "SELECT * from usr where username='".$username."'"; 
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

<h1>Update Password Admin</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$password=$_REQUEST['password'];
$added_by=$_REQUEST['added_by'];
//$status=$_REQUEST['status'];

$update="update usr set password='".$password."',added_by='".$added_by."' where username='".$username."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='adminpasscontroller.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="password" name="password" placeholder="Update password Here" 
required value="<?php echo $row['password'];?>" /></p>
<p><input type="text" name="added_by" placeholder="Update your record" 
required value="<?php echo $row['added_by'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>