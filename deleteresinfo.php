
<?php


require('config.php');
$bId=$_REQUEST['bId'];

 $sql = "DELETE FROM branch_darea WHERE bId='$bId'";

     $link->query($sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
