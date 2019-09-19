<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'config.php';

//$name=$_POST['item_name'];
//$nameInputEntities = htmlentities($name);



$new = $_SESSION['item4'];
$new1 = $_SESSION['price4'];

$new2 = $_SESSION['descrip4'];

//$name=$_POST['item_name'];
//if (isset($_POST['price']))
//{
//$price=$_POST['price'];
//
//} 
//if (isset($_POST['description']))
//{
//$description = $_POST['description'];

//} 

//$twos=$_SESSION['two'];
//$ta=$_SESSION['ta'];

//$price=$_POST['price'];
//$description = $_POST['description'];

$ins_query2="insert into addtocart (`item_name`,`price`,`description`)values('$new','$new1','$new2')";mysqli_query($link,$ins_query2)
    or die(mysql_error($link));
$product2=array($new,$new1,$new2);



print_r($product2);

////echo "<pre>";
//print_r($_POST);
//echo "</pre>";


echo "item has been added";?>

