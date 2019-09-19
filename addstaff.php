<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$type=$username = $password = $confirm_password = $FName= $LName=$usertype=$email=$mnumber=$age=$added_by="";
$type_err=$username_err = $password_err = $confirm_password_err =$FName_err= $LName_err=$usertype_err=$email_err=$mnumber_err=$age_err=$added_by_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM usr WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
             if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: admin.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
     //   mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty(trim($_POST["addedby"]))){
        $added_by_err = "Please enterY your ID .";     
    } 
     else{
        $added_by = trim($_POST["addedby"]);
       // $usertype=1;
    }
    //firstnane
    if(empty(trim($_POST["fname"]))){
        $FName_err = "Please enter the new admin's First Name.";     
    } 
     else{
        $FName = trim($_POST["fname"]);
       // $usertype=1;
    }
    //lastname
    if(empty(trim($_POST["lname"]))){
        $LName_err = "Please enter  the new admin's LastName.";     
    } 
     else{
        $LName = trim($_POST["lname"]);
    }
    //email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter  the new admin's Email.";     
    } 
     else{
        $email = trim($_POST["email"]);
    }
    //mobile
    if(empty(trim($_POST["mnumber"]))){
        $mnumber_err = "Please enter  the new admin'smobile number.";     
    } 
     else{
        $mnumber = trim($_POST["mnumber"]);
    }
    //age
    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter  the new admin's age.";     
    } 
     else{
        $age = trim($_POST["age"]);
    }
    //type
//   if(empty(trim($_POST["Type"]))){
//        $type_err = "Please enter  the new admin's age.";     
//    } 
//     else{
//        $type = trim($_POST["Type"]);
//    }
   
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($FName_err)
            && empty($LName_err)&& empty($email_err)&& empty($mnumber_err)&& empty($age_err)&& empty($added_by_err)&& empty($type_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO usr (username, password,fname,lname,usertype,email,mnumber,age,added_by,Type) VALUES (?, ?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_password,$param_fname,$param_lname,$param_usertype,$param_email,$param_mnumber,$param_age,$param_addedby,$param_type);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fname=$FName;
            $param_lname=$LName;
            $param_usertype=3;
            $param_email=$email;
            $param_mnumber=$mnumber;
            $param_age=$age;
            $param_addedby=$added_by;
            $param_type="staff";
            // Attempt to execute the prepared statement
           
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
     if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: admin.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h4>New Admin Registration Form</h4>
        <h6>Please fill this form to create an account for the new admin.</h6>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="wrap-input100 validate-input"  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> >
                <label> Please Enter the new Ordering Staff's Username</label>
                <input type="text" name="username" class="form-control"  value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Please Enter the new Ordering Staff's Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Please Confirm the new Ordering Staff's Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
             <div class="form-group <?php echo (!empty($added_by_err)) ? 'has-error' : ''; ?>">
                <label>Enter your ID</label>
                <input type="text" name="addedby" class="form-control" value="<?php echo $added_by; ?>">
                <span class="help-block"><?php echo $added_by_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($FName_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Ordering Staff's First Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $FName; ?>">
                <span class="help-block"><?php echo $FName_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($LName_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Ordering Staff's Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo $LName; ?>">
                <span class="help-block"><?php echo $LName_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Ordering Staff's Email </label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($mnumber_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Ordering Staff's Mobile Number</label>
                <input type="text" name="mnumber" class="form-control" value="<?php echo $mnumber; ?>">
                <span class="help-block"><?php echo $mnumber_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Ordering Staff's age</label>
                <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
                <span class="help-block"><?php echo $age_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>