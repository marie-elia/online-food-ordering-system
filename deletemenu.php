
<?php


require('config.php');
$menuId=$_REQUEST['menuId'];

 $sql = "DELETE FROM menu WHERE menuId='$menuId'";

     $link->query($sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
