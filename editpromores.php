<?php
require('config.php');
//include("auth.php");
$dname = $_REQUEST['dname'];
$query = "SELECT * from promocode_restaurant where dname='" . $dname . "'";
$result = mysqli_query($link, $query) or die(mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Update Record</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="form">

            <h1>Update Promo for Restaurants </h1>
            <?php
            $status = "";
            if (isset($_POST['new']) && $_POST['new'] == 1) {
               // $promoId = $_REQUEST['promoId'];
                $sdate = $_REQUEST['sdate'];
                $discount = $_REQUEST['discount'];
                $edate = $_REQUEST['edate'];
                $dname = $_REQUEST['dname'];
                $times = $_REQUEST['times'];
//$submittedby = $_SESSION["username"];
                $update = "update promocode_restaurant set discount='" . $discount . "', times= '" . $times . "'  ,dname='" . $dname . "',sdate='" . $sdate . "', edate='" . $edate . "' where dname='" . $dname . "'";
                mysqli_query($link, $update) or die(mysqli_error($link));
                $status = "Record Updated Successfully. </br></br>
<a href='promoresdelete.php'>View Updated Record</a>";
                echo '<p style="color:#FF0000;">' . $status . '</p>';
            } else {
                ?>
                <div>
                    <form name="form" method="post" action=""> 
                        <input type="hidden" name="new" value="1" />
                        <p><input type="text" name="discount" placeholder="Enter Discount amount" 
                                  required value="<?php echo $row['discount']; ?>" /></p>
                        <p><input type="text" name="dname" placeholder="Enter Discount Name" 
                                  required value="<?php echo $row['dname']; ?>" /></p>
                        <p><input type="date" name="sdate" placeholder="Enter Start Date" 
                                  required value="<?php echo $row['sdate']; ?>" /></p>
                        <p><input type="date" name="edate" placeholder="Enter End Date" 
                                  required value="<?php echo $row['edate']; ?>" /></p>
                        <p><input type="number" name="times" placeholder="Enter Times to be USED" 
                                  required value="<?php echo $row['times']; ?>" /></p>
                        <p><input name="submit" type="submit" value="Update" /></p>
                    </form>
                <?php }echo $status; ?>
            </div>
        </div>
    </body>
</html>