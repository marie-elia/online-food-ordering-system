<?php
require('config.php');
//include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
   //  $rId=$_REQUEST['rId'];
$city = $_REQUEST['city'];
$area_name =$_REQUEST['area_name'];
$delivery_charge=$_REQUEST['delivery_charge'];
$cuisine = $_REQUEST['cuisine'];
$openingfrom = $_REQUEST['openingfrom'];
$closingon = $_REQUEST['closingon'];
$supported_area = $_REQUEST['supported_area'];
$address = $_REQUEST['address'];

    $ins_query="insert into branch_darea
    (`city`,`area_name`,`delivery_charge`,`cuisine`,`openingfrom`,`closingon`,`supported_area`,`address`)values
    ($city','$area_name','$delivery_charge','$cuisine','$openingfrom','$closingon',$supported_area,$address)";
 //mysqli_query($link,$ins_query)
 //  or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='resinfocontroller.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Restaurant Info</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
    <a href="resinfocontroller.php">View Records</a> 

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p><input type="text" name="city" placeholder="Enter City here " required /></p>
<p><input type="text" name="area_name" placeholder="Enter Area Type" required /></p>
<p><input type="number" name="delivery_charge" placeholder="Enter Delivery Charge  Here" required /></p>
<p><input type="text" name="cuisine" placeholder="Enter Cuisine Type Here" required /></p>
<p><input type="time" name="openingfrom" placeholder="Enter Opening Time" required /></p>
<p><input type="time" name="closingon" placeholder="Enter Opening Time " required /></p>
<p><input type="text" name="supported_area" placeholder="Enter Supported Area Here" required /></p>
<p><input type="text" name="address" placeholder="Enter Address Here" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>