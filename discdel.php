<?php

session_start();





  include('config.php');

 // $discname = $_POST['dname'];
  //$discId = $_POST['promoId'];

//  "SELECT * FROM `promocode` WHERE `dname` = '$discname' AND `promoId`='$discId' ";
  //   $result = mysqli_query($db,$sql);
      // $typo = $_POST['opt_st'];

    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Promo</strong></th>
<th><strong>Start Date </strong></th>
<th><strong>End Date </strong></th>
<th><strong>Discount </strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query=  "SELECT * FROM `promocode`  ";

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["dname"]; ?></td>
<td align="center"><?php echo $row["sdate"]; ?></td>
<td align="center"><?php echo $row["edate"]; ?></td>
<td align="center"><?php echo $row["discount"]; ?></td>

<td align="center">
<a href="editpromo.php?promoId=<?php echo $row["promoId"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletepromo.php?dname=<?php echo $row["dname"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
