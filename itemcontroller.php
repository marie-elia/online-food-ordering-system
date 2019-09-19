<?php

session_start();

  include('config.php');

    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Items in a Menu</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Restaurant ID</strong></th>
<th><strong>Menu </strong></th>
<th><strong>Item ID </strong></th>
<th><strong>Item Name </strong></th>
<th><strong>Description </strong></th>
<th><strong>Price </strong></th>
<th><strong>Menu From </strong></th>
<th><strong>Menu To </strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query=  "SELECT * FROM `item`  ";

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
 <td align="center"><?php echo $row["rId"]; ?></td>
<td align="left"><?php echo $row["menu"]; ?></td>
<td align="center"><?php echo $row["itemId"]; ?></td>
<td align="center"><?php echo $row["item_name"]; ?></td>
<td align="left"><?php echo $row["description"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center"><?php echo $row["menufrom"]; ?></td>
<td align="center"><?php echo $row["menuto"]; ?></td>


<td align="center">
    <a href="edititem.php?itemId=<?php echo $row["itemId"]; ?>">Edit</a>
</td>
<td align="center">
    <a href="deleteitem.php?itemId=<?php echo $row["itemId"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
