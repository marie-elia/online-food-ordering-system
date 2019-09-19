
	
<?php
require('config.php');
//$rname=$_REQUEST['rname'];
$rId=$_REQUEST['rId'];

$query = "DELETE FROM restaurant WHERE rId='$rId'" ; 
$result = mysqli_query($link,$query) or die ( mysqli_error($link));
header("Location: viewrestaurant.php"); 



?>

