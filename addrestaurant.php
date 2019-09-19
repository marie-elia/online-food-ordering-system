<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$charge=$bId=$city=$area_name=$cuisine=$rname=$rId=$mnumber=$opening_hour=$closing_hour='';
$charge_err=$bId_err=$city_err=$area_name_err=$cuisine_err=$rname_err=$rId_err=$mnumber_err=$opening_hour_err=$closing_hour_err='';
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["rId"])))
        {$rId_err = "Please enter restaurant id .";     
    } 
     else{
        $rId = trim($_POST["rId"]);
     }
    if(empty(trim($_POST["rname"]))){
        $rname_err = "Please enter restaurant name .";     
    } 
     else{
        // Prepare a select statement
        $sql = "SELECT rId FROM restaurant WHERE rname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_rname);
            
            // Set parameters
            $param_rname = trim($_POST["rname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $rname_err = "This restaurant is already registered.";
                } else{
                    $rname = trim($_POST["rname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
     //   mysqli_stmt_close($stmt);
    }
    
    
    //firstnane
    if(empty(trim($_POST["mnumber"]))){
        $mnumber_err = "Please enter the phone number.";     
    } 
     else{
        $mnumber = trim($_POST["mnumber"]);
    }
    if(empty(trim($_POST["opening"]))){
        $opening_hour_err = "Please enter  the nopening hour.";     
    } 
     else{
        $opening_hour = trim($_POST["opening"]);
    }
    //email
    if(empty(trim($_POST["closing"]))){
        $closing_hour_err = "Please enter  the closing hour.";     
    } 
     else{
        $closing_hour = trim($_POST["closing"]);
    }
     if(empty(trim($_POST["cuisine"]))){
        $cuisine_err = "Please enter  the cuisine type.";     
    } 
     else{
        $cuisine = trim($_POST["cuisine"]);
    }
   if(empty(trim($_POST["city"]))){
        $city_err = "Please enter  the city.";     
    } 
     else{
        $city = trim($_POST["city"]);
    }
    if(empty(trim($_POST["area"]))){
        $area_name_err = "Please enter  the area.";     
    } 
     else{
        $area_name = trim($_POST["area"]);
    }
     if(empty(trim($_POST["bid"]))){
        $bId_err = "Please enter  the branch ID.";     
    } 
     else{
        $bId = trim($_POST["area"]);
    }
    if(empty(trim($_POST["charge"]))){
        $charge_err = "Please enter  the correct charge.";     
    } 
     else{
        $charge = trim($_POST["charge"]);
    }
    
    
      
    // Check input errors before inserting in database
    if(empty($rname_err) && empty($mnumber_err)&& empty($rId_err) && empty($opening_hour_err)&& empty($closing_hour_err)&& empty($cuisine_err)&& empty($city_err)&& empty($area_name_err)&& empty($bId_err)&& empty($charge_err)){
        
        // Prepare an insert statement
        $sql = "insert into restaurant (rId, rname,mnumber,active,Opening_Hour,Closing_Hour) VALUES (?, ?,?,?,?,?)";
         $sql2="insert into restaurant_cuisine (rId, cname) VALUES (?, ?)";
        $sql3="insert into restaurant_branch (rId,city,area_name,bId) VALUES (?, ?,?,?)";
         $sql4="insert into branch_darea (rId,bId, city,area_name,delivery_charge) VALUES (?, ?,?,?,?)";

        if(($stmt = mysqli_prepare($link, $sql))&&($stmt2 = mysqli_prepare($link, $sql2))&&($stmt3 = mysqli_prepare($link, $sql3))&&($stmt4 = mysqli_prepare($link, $sql4))){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_rId, $param_rname,$param_mnumber,$param_active,$param_open,$param_close);
           mysqli_stmt_bind_param($stmt2, "ss", $param_rId, $param_cuisine);
           mysqli_stmt_bind_param($stmt3, "ssss", $param_rId, $param_city,$param_area,$param_bid);
              $rc2= mysqli_stmt_bind_param($stmt4, "sssss", $param_rId, $param_bid,$param_city,$param_area,$param_charge);


            // Set parameters
            $param_rId = $rId;
            $param_rname=$rname;
            $param_mnumber=$mnumber;
            $param_active=1;
            $param_open=$opening_hour;
            $param_close=$closing_hour;
            $param_cuisine=$cuisine;
            $param_city=$city;
            $param_area=$area_name;
            $param_bid=$bId;
            $param_charge=$charge;
            // Attempt to execute the prepared statement
            
        }
        // Close statement
       // mysqli_stmt_close($stmt);
    
         if((mysqli_stmt_execute($stmt))&&(mysqli_stmt_execute($stmt2))&&(mysqli_stmt_execute($stmt3))&&(mysqli_stmt_execute($stmt4))){
                // Redirect to login page
                header("location: admin.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
   if ( false===$rc2 ) {
  // again execute() is useless if you can't bind the parameters. Bail out somehow.
  die('bind_param() failed: ' . htmlspecialchars($stmt4->error));
}

$rc2 = $stmt4->execute();
// execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
// 2006 "server gone away" is always an option
if ( false===$rc2 ) {
  die('execute() failed: ' . htmlspecialchars($stmt4->error));
}
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADD RESTAURANT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h4>New Restaurant Registration Form</h4>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="wrap-input100 validate-input"  <?php echo (!empty($rname_err)) ? 'has-error' : ''; ?> >
                <label> Please Enter the new Restaurant's Name</label>
                <input type="text" name="rname" class="form-control"  value="<?php echo $rname; ?>">
                <span class="help-block"><?php echo $rname_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($rId_err)) ? 'has-error' : ''; ?>">
                <label>Please Enter the new Restaurant's ID</label>
                <input type="text" name="rId" class="form-control" value="<?php echo $rId; ?>">
                <span class="help-block"><?php echo $rId_err; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                <span class="help-block"><?php echo $city; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($area_name_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's area</label>
                <input type="text" name="area" class="form-control" value="<?php echo $area_name; ?>">
                <span class="help-block"><?php echo $area_name_err; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($bId_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's Branch ID</label>
                <input type="text" name="bid" class="form-control" value="<?php echo $bId; ?>">
                <span class="help-block"><?php echo $bId_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($mnumber_err)) ? 'has-error' : ''; ?>">
                <label>Please Confirm the new Restaurant's Phone Number</label>
                <input type="text" name="mnumber" class="form-control" value="<?php echo $mnumber; ?>">
                <span class="help-block"><?php echo $mnumber_err; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($opening_hour_err)) ? 'has-error' : ''; ?>">
                <label>Enter the Restaurant's Opening Hour</label>
                <input type="time" name="opening" class="form-control" value="<?php echo $opening_hour; ?>">
                <span class="help-block"><?php echo $opening_hour_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($closing_hour_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's Closing Hour</label>
                <input type="time" name="closing" class="form-control" value="<?php echo $closing_hour; ?>">
                <span class="help-block"><?php echo $closing_hour_err; ?></span>
            </div>
         <div class="form-group <?php echo (!empty($cuisine_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's cuisine</label>
                <input type="text" name="cuisine" class="form-control" value="<?php echo $cuisine; ?>">
                <span class="help-block"><?php echo $cuisine_err; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($charge_err)) ? 'has-error' : ''; ?>">
                <label>Enter the restaurant's delivery charge</label>
                <input type="number" name="charge" class="form-control" value="<?php echo $charge; ?>">
                <span class="help-block"><?php echo $charge_err; ?></span>
            </div>
     
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>