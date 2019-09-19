<?php

session_start();

  include('config.php');

    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Menu Configuration</title>
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
<th><strong>Custom ID </strong></th>

<th><strong>Custom Type </strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query=  "SELECT * FROM `item_custom`  ";

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
 <td align="center"><?php echo $row["rId"]; ?></td>
<td align="left"><?php echo $row["menu"]; ?></td>
<td align="center"><?php echo $row["itemId"]; ?></td>
<td align="center"><?php echo $row["customId"]; ?></td>

<td align="center"><?php echo $row["customType"]; ?></td>


<td align="center">
    <a href="edititemcust.php?customId=<?php echo $row["customId"]; ?> ">Edit</a>
</td>
<td align="center">
    <a href="deleteitemcust.php?customId=<?php echo $row["customId"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
