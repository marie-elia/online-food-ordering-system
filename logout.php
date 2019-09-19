<?php
// Initialize the session
session_start();
require 'config.php';
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

 $sql = "DELETE FROM addtocart ";

     $link->query( $sql);
     var_dump($sql);
//$result = mysqli_query($link,$query) or die ( mysqli_error($link));
	 echo 'Deleted successfully.';
// Redirect to login page
header("location: login.php");
exit;
?>