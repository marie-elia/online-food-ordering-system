<?php

session_start();

  include('config.php');
$user = $_SESSION['username'];
    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Orders </title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Username </strong></th>
<th><strong>City </strong></th>
<th><strong>Area Name </strong></th>
<th><strong>Order Id </strong></th>
<th><strong>Status </strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
//$user = $_SESSION['username'];
$username=$_REQUEST['username'];

$sel_query=  "SELECT * FROM `ordr` where username='$user'  ";
echo $user;

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
 <td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["city"]; ?></td>
<td align="center"><?php echo $row["area_name"]; ?></td>
<td><a href="acceptorder.php?cartId=<?php echo $row["cartId"];?>" align="center"><?php echo $row["orderId"]; ?></a></td>
<td align="center"><?php echo $row["status"]; ?></td>





</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
    