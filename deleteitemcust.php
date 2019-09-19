
<?php


require('config.php');
$customId=$_REQUEST['customId'];

 $sql = "DELETE FROM item_custom WHERE customId='$customId'";

     $link->query($sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
