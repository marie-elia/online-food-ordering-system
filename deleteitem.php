
<?php


require('config.php');
$itemId=$_REQUEST['itemId'];

 $sql = "DELETE FROM item WHERE itemId='$itemId'";

     $link->query($sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
