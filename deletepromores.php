
<?php


require('config.php');
$dname=$_REQUEST['dname'];

 $sql = "DELETE FROM promocode_restaurant WHERE dname='$dname'";

     $link->query($sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
