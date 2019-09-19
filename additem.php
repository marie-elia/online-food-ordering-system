<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$price=$rId= $menu= $itemId =$item_name=$description="";
$price_err=$itemId_err=$price_err=$rId_err=$menu_err=$item_name_err=$description_err="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["rId"])))
        {$rId_err = "Please enter restaurant id .";     
    } 
     else{
        $rId = trim($_POST["rId"]);
     }
      if(empty(trim($_POST["menu"]))){
        $menu_err = "Please enter  the menu type.";     
    } 
     else{
        $menu = trim($_POST["menu"]);
    }
     if(empty(trim($_POST["itemid"]))){
        $itemId_err = "Please enter  the id.";     
    } 
     else{
        $itemId = trim($_POST["itemid"]);
    }
      if(empty(trim($_POST["itemname"]))){
        $item_name_err = "Please enter  the item name.";     
    } 
     else{
        $item_name = trim($_POST["itemname"]);
    }
     if(empty(trim($_POST["price"]))){
        $price_err = "Please enter  the price.";     
    } 
     else{
        $price = trim($_POST["price"]);
    }
     if(empty(trim($_POST["description"]))){
        $description_err = "Please enter  the description.";     
    } 
     else{
        $description = trim($_POST["description"]);
    }
     
     
    // Check input errors before inserting in database
    if(empty($rId_err) && empty($item_name_err) && empty($menu_err)&& empty($description_err)&& empty($price_err)&& empty($itemId_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO item (rId, menu, itemId, item_name,description,price) VALUES (?, ?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql))
     {
            // Bind variables to the prepared statement as parameters
       $rc=     mysqli_stmt_bind_param($stmt, "ssssss", $param_rId, $param_menu,$param_itemid,$param_itemname,$param_description,$param_price);
            
            // Set parameters
           $param_rId=$rId;
           $param_itemid=$itemId;
           $param_description=$description;
           $param_itemname=$item_name;
           $param_price=$price;
           $param_menu=$menu;
           
       }
        // Close statement
      //  mysqli_stmt_close($stmt);
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

        <h6>Please fill this form to create a new item .</h6>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="wrap-input100 validate-input"  <?php echo (!empty($rId_err)) ? 'has-error' : ''; ?> >
                <label> Please Enter the restaurant id</label>
                <input type="number" name="rId" class="form-control"  value="<?php echo $rId; ?>">
                <span class="help-block"><?php echo $rId_err; ?></span>
            </div>    
           
             <div class="form-group <?php echo (!empty($menu_err)) ? 'has-error' : ''; ?>">
                <label>Enter the  menu type </label>
                <input type="text" name="menu" class="form-control" value="<?php echo $menu; ?>">
                <span class="help-block"><?php echo $menu_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($itemId_err)) ? 'has-error' : ''; ?>">
                <label>Enter the item id</label>
                <input type="text" name="itemid" class="form-control" value="<?php echo $itemId; ?>">
                <span class="help-block"><?php echo $itemId_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($item_name_err)) ? 'has-error' : ''; ?>">
                <label>Enter the new Item Name</label>
                <input type="text" name="itemname" class="form-control" value="<?php echo $item_name; ?>">
                <span class="help-block"><?php echo $item_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Enter the description </label>
                <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                <label>Enter the item's price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $price; ?>">
                <span class="help-block"><?php echo $price_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>