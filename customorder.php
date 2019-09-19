<?php

session_start();

  include('config.php');
$customId=$_REQUEST['customId'];

    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Item</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Custom ID </strong></th>
<th><strong>Custom Type </strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$query = "SELECT * from item_custom where customId='".$customId."'"; 

$result = mysqli_query($link,$query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["customId"]; ?></td>
<td align="center"><?php echo $row["customType"]; ?></td>







</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
    