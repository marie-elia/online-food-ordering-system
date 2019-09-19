<?php

   session_start();
if (isset($_POST['butt']))
{
  include('config.php');

    //  $comment = $_POST['comment'];
     // $conf = $_POST['config'];
      //$pricee = $_POST['Price'];

      //$_SESSION['Price'] = $pricee;
    //  $_SESSION['comment']=$comment;
      //$_SESSION['config']=$conf;

      $itemn = $_SESSION['item_name'];

      $user = $_SESSION['username'];


      $sql = "SELECT * FROM cart_item";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);



      if(!$row)
      {
        header("location: oneitem.php? error = error in condition");
      }

 else{
$sqlrest= "INSERT INTO `cart_item` (`username`, `itemId`) VALUES ('".$user."', '".$itemn."')";


         if(!mysqli_query($link,$sqlrest))
         {
           header("location: itemchosen.php? error = error");
         }
         else {
           header("location: checkout.php? msg = saved");
         }
    }



 }