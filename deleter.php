<?php


require('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

{$music_number='';
$music_number =$_POST['rId'];
echo $music_number;
     $sql = "DELETE FROM restaurant WHERE rId='".$_POST['rId']."'";

     $link->query($sql);

	 echo 'Deleted successfully.';

}


?>