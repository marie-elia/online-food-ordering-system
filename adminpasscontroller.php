<?php

session_start();

 include('config.php');
    ?>
<html>
<head>
<meta charset="utf-8">
<title>View Orders </title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h2>View Admins</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Username </strong></th>
<th><strong>Password </strong></th>
<th><strong>Added By </strong></th>

<th><strong>Edit</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query=  "SELECT * FROM `usr` where usertype=1 ";

$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
 <td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>
<td align="center"><?php echo $row["added_by"]; ?></td>




<td align="center">
    <a href="editadminpass.php?username=<?php echo $row["username"]; ?>">Edit</a>
</td>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
    