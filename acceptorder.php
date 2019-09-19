<?php

session_start();

  include('config.php');
$cartId=$_REQUEST['cartId'];

    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Items in a Cart</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Item Id </strong></th>
<th><strong>Custom ID </strong></th>
<th><strong>Customization</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$query = "SELECT * from cart_item where cartId='".$cartId."'"; 

$result = mysqli_query($link,$query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
 <td><a href="itemorder.php?itemId=<?php echo $row["itemId"];?>" align="center"><?php echo $row["itemId"]; ?></td>
 <td ><a href= "customorder.php?customId=<?php echo $row["customId"];?>" align="center"><?php echo $row["customId"]; ?></td>
<td align="center"><?php echo $row["customization"]; ?></td>





</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
    