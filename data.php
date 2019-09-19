<?php
//fetch.php
if(isset($_POST["action"]))
{
 $link = mysqli_connect("localhost", "root", "marie", "dbproj");
 $output = '';
 if($_POST["action"] == "city")
 {
  $query = "SELECT city_name FROM city WHERE city = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select area</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["area_name"].'">'.$row["area_name"].'</option>';
  }
 
 }
 echo $output;
}
?>