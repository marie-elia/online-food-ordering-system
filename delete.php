<?php


require('config.php');


if(isset($_GET['id']))

{ $id=$_GET['id'];

     $sql = "DELETE FROM usr WHERE id=".$_GET['id'];
     $sql2="Insert into delete_usr
(`id`)values
    ('$id')";
     $link->query($sql);
     $link->query($sql2);
      $link->query($sql2);
     var_dump($sql2);

	// echo 'Deleted successfully.';

}


?>