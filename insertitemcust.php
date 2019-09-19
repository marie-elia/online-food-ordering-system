<?php
require('config.php');
//include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
     $rId =$_REQUEST['rId'];
  //  $itemId = $_REQUEST["itemId"];
   $customId = $_REQUEST["customId"];
  //  $menuId= $_REQUEST["menuId"];
   $menu=$_REQUEST["menu"];
        $customType= $_REQUEST["customType"];
        $description= $_REQUEST["description"];
                $price=$_REQUEST["price"];

    $ins_query="insert into item_custom
    (`rId`,`menu`,`customType`,`customId`,`description`,`price`)values
    ('$rId','$menu','$customType','$customId','$description','$price')";
    mysqli_query($link,$ins_query)
    or die(mysql_error($link));
    $status = "New Record Inserted Successfully.
    </br></br><a href='itemcustcontroller.php'>View Inserted Record</a>";
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
    <a href="itemcustcontroller.php">View Records</a> 

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="number" name="rId" placeholder="Enter Restaurant ID here " required /></p>
<p><input type="text" name="menu" placeholder="Enter Menu Type" required /></p>
<p><input type="text" name="customId" placeholder="Enter Custom ID  Here" required /></p>
<p><input type="text" name="customType" placeholder="Enter Custom Type Here" required /></p>

<p><input type="text" name="description" placeholder="Enter Description" required /></p>
<p><input type="number" name="price" placeholder="Enter price here " required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>