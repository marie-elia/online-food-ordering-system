<?php
require('config.php');
//include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $discount =$_REQUEST['discount'];
        $rId =$_REQUEST['rId'];
    $sdate = $_REQUEST['sdate'];
    $edate = $_REQUEST["edate"];
    $dname = $_REQUEST["dname"];
    $times= $_REQUEST["times"];
    $ins_query="insert into promocode_restaurant
    (`discount`,`sdate`,`edate`,`dname`,`times`,`rId`)values
    ('$discount','$sdate','$edate','$dname','$times','$rId')";
    mysqli_query($link,$ins_query)
    or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='promoresdelete.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Restaurant Promocode</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
    <a href="promoresdelete.php">View Records</a> 

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="number" name="rId" placeholder="Enter Restaurant ID here " required /></p>
<p><input type="number" name="discount" placeholder="Enter Discount Amount" required /></p>
<p><input type="date" name="sdate" placeholder="Enter Start Date" required /></p>
<p><input type="date" name="edate" placeholder="Enter End Date" required /></p>
<p><input type="text" name="dname" placeholder="Enter Discount Name" required /></p>
<p><input type="number" name="times" placeholder="Enter number of times" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>