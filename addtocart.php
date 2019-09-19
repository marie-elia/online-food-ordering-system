<?php

   session_start();
//if (isset($_POST['first'])||isset($_POST['butt']))
//{
  include('config.php');

   //   $comment = $_POST['customization'];
   //   $conf = $_POST['config'];
      //$pricee = $_POST['Price'];

      //$_SESSION['Price'] = $pricee;
   //   $_SESSION['customization']=$comment;
    //  $_SESSION['config']=$conf;

      $itemn = $_SESSION['item_name'];
 $us=$_SESSION['username'] ;
      $usrr = $_SESSION['username'];
//$name=$_POST['item_name'];
//$price=$_POST['price'];
// $descri = $_POST['description'];
 
 
//$product=array($name,$price,$descri);
//print_r($product);
      var_dump($us);
      var_dump($itemn);

     



     


$mm="INSERT INTO `ordr` (`username`) VALUES ('".$us."')";


         
        
    



 //}
