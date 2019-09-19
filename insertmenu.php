<?php
require('config.php');
//include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
     $rId =$_REQUEST['rId'];
    $menufrom = $_REQUEST["menufrom"];
    $menuto = $_REQUEST["menuto"];
  //  $menuId= $_REQUEST["menuId"];
        $menu= $_REQUEST["menu"];

    $ins_query="insert into menu
    (`rId`,`menu`,`menufrom`,`menuto`)values
    ('$rId','$menu','$menufrom','$menuto')";
   // mysqli_query($link,$ins_query)
   // or die(mysql_error());
    $status = "New Record Inserted Successfully.
    </br></br><a href='menucontroller.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Menu Configurations</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
    <a href="menucontroller.php">View Records</a> 

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="number" name="rId" placeholder="Enter Restaurant ID here " required /></p>
<p><input type="time" name="menufrom" placeholder="Enter Menu Starting Time" required /></p>
<p><input type="time" name="menuto" placeholder="Enter Menu Ending Time" required /></p>
<p><input type="text" name="menu" placeholder="Enter Menu Type" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Acme Widget Company</title>
</head>
<body style="font-family: Arial">
<h1><br>
Acme Widget Company</h1>
<p>Component Order Form</p>

<FORM ACTION="processorder.php" method=post>
<table border=0>
<tr>
<td width=150>Item<br>
&nbsp;</td>
<td width=15>Quantity<br>
&nbsp;</td>
</tr>
<tr>
<td>Bases</td>
<td align="center"><input type="text" name="qtybases" size="3" maxlength="3"></td>
</tr>
<tr>
<td>Stems</td>
<td align="center"><input type="text" name="qtystems" size="3" maxlength="3"></td>
</tr>
<tr>
<td>Tops</td>
<td align="center"><input type="text" name="qtytops" size="3" 
maxlength="3"></td>
</tr>
<tr>
<td colspan="2" align="center"><br>
<input type="submit" value="Enter Order"></td>
</tr>
</table>
</form>

</body>
</html>