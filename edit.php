<?php
require('config.php');
//include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from usr where id='".$id."'"; 
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
$id=$_REQUEST['id'];
//$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['username'];
$age =$_REQUEST['Age'];
//$submittedby = $_SESSION["username"];
$update="update usr set username='".$name."', Age='".$age."' where id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error($link));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="username" placeholder="Enter Name" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name="Age" placeholder="Enter Age" 
required value="<?php echo $row['Age'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }echo $status; ?>
</div>
</div>
</body>
</html>