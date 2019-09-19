
<?php
// Initialize the session
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'marie');
define('DB_NAME', 'dbproj');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
/// Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: login.php");
       exit;
}
    
  //  $area_name=$_GET['var2'];
if($_SERVER["REQUEST_METHOD"] == "POST"){

$quantity="";
$quantity_err="";
if(empty(trim($_POST["quantity"]))){
        $quantity_err = "Please enter quantity.";     
    } 
     else{
        $quantity = trim($_POST["quantity"]);
   }
    
     if(empty($quantity_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO item_custom (quantity) VALUES (?)";
//         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_quantity);
            
            // Set parameters
          $param_quantity=$quantity;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: cart.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
       // Close statement
       mysqli_stmt_close($stmt);
   }
   
    // Close connection
   mysqli_close($link);


 
    
}
    
    

?>	
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Marco</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">				
			<link rel="stylesheet" href="css/main.css">
                        </script>
	<!--//tags -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--pop-up-box-->
	<!--//pop-up-box-->
	<!-- price range -->
	<!-- fonts -->
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
				  		<div class="row justify-content-center">
						      <div id="logo">
						        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
						      </div>
				  		</div>			  					
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-center d-flex">			
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="index.php">Home</a></li>
				          <li><a href="about.html">About</a></li>
				          <li><a href="gallery.html">Gallery</a></li>
                                             <li><a hre="area2.php">Cuisine Area</a></li>

				          <li class="menu-has-children"><a href="">Blog</a>
				            <ul>
				              <li><a href="blog-home.html">Blog Home</a></li>
				              <li><a href="blog-single.html">Blog Single</a></li>
				            </ul>
				          </li>	
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
				            	  <li><a href="elements.html">Elements</a></li>
						          <li class="menu-has-children"><a href="">Level 2 </a>
						            <ul>
						              <li><a href="#">Item One</a></li>
						              <li><a href="#">Item Two</a></li>
						            </ul>
						          </li>					                		
				            </ul>
				          </li>					          					          		          
				          <li><a href="contact.html">Contact</a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">

						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Menus				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Menus</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->			

			<!-- Start menu-area Area -->
            <section class="menu-area section-gap" id="menu">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">
                                                                    <?php
                                     // remove all session variables
              $rname=''; 
//                  $rname = $_SESSION['var1'];
//
//                                                               
if (!empty($_SESSION['var1'])) {
$rname = $_SESSION['var1'];}
 $rname = $_GET['var1'];   
 //print_r($_SESSION);
                                                                
                                                                         echo ($rname); 
                                                                         
                                                                         ?></h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>	

                    <ul class="filter-wrap filters col-lg-12 no-padding">
                        <li class="active" data-filter="*">All Menu</li>
                        <li data-filter=".breakfast">Breakfast</li>
                        <li data-filter=".lunch">Lunch</li>
                       
                    </ul>
                    
                    <div class="filters-content">
                        <div class="row grid">
                            <div class="col-md-6 all breakfast">
			<div class="single-menu">
                                     <form action="addtocart2.php" method="post" ><a href="addtocart2.php"></a>

	<div class="title-wrap d-flex justify-content-between">
									
                             <h4

 <?php
 
 if (isset($_GET['var3']))
{
     //$ahe = $_GET['var3'];

   //    echo $ahe;
 $_SESSION['item_name']=$item;

// Instructions if $_POST['value'] exist
} 
 
 
 
 
 
   $rname= $_GET['var1'];

                                                                 
  $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menufrom,m.menuto  from item  m where m.itemId =1 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   //$result = $link->query($sql) or die($link->error);

  while ($row = $result->fetch_assoc()) 
  {
        unset( $itemId ,$description ,$price ,$item_name,$menufrom,$menuto);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
                   $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                 // echo($menufrom);
                                    //echo($menuto);

                   //$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
                   echo($item_name) ;
                                  echo "<div><p>Item ID: $itemId </p></div>";                      
$time=time();
//$timee=date("H:I A",$TIME);
$query="select * from menu m  where '$time' between m.menufrom and m.menuto";{
    
 $result= mysqli_query($link, $query)   ;
         
    $row= mysqli_fetch_all($result,MYSQLI_ASSOC);
    var_dump ($row);
        var_dump ($query);

    
    
}
                   
}    ?>     
                                  
 </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php   
                                                                                echo($description);                       
        
 // echo date('g:i A', strtotime($menufrom));                                                                             // echo[$menufrom];
//echo date('g:i A', strtotime($menuto));
                                                                                
                                                                                
                                                                                ?>
									</p>	
                                                                        
                                                                        <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
  <button name = "butt">Add to Cart</button>                                                                                                

                                  
</form>

   
    
                                        
  
 
    </div>					                               
    </div>          
  <div class="col-md-6 all breakfast">
<div class="single-menu">
<div class="title-wrap d-flex justify-content-between">
<h4>
  <?php
                                                                 
   $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menufrom,m.menuto from item  m where m.itemId =2 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
  $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                 // echo "<p> $description </p>";                      
                             echo "<div><p>Item ID: $itemId </p></div>";                      

             $counter_int++;
                  
            }  
      
                                                              
             ?>       
                             
                             
                             </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>	
                                                                         <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
                                                                         <form>
                  
     
</form>
								</div>					                               
                            </div>          
                            
                            
                  <div class="col-md-6 all breakfast">
			<div class="single-menu">
	<div class="title-wrap d-flex justify-content-between">
									
                             <h4><?php
                                                                 
   $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menuto,m.menufrom from item  m where m.itemId =3 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
  $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                             echo "<div><p>Item ID: $itemId </p></div>";                      

             $counter_int++;
                  
            }  
      
                                                              
             ?>       
                             
                             
                             </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>	
                                                                         <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
                                                                         <form>
                   
     
</form>
								</div>					                               
                            </div>          
                            
                                       
                          <div class="col-md-6 all lunch">
			<div class="single-menu">
	<div class="title-wrap d-flex justify-content-between">
									
                             <h4><?php
                                                                 
   $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menuto,m.menufrom from item  m where m.itemId =4 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
  $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                 // echo "<p> $description </p>";                      
                             echo "<div><p>Item ID: $itemId </p></div>";                      

             $counter_int++;
                  
            }  
      
                                                              
             ?>       
                             
                             
                             </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>	
                                                                         <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
                                                                         <form>
                    
     
</form>
								</div>					                               
                            </div>          
                             <div class="col-md-6 all lunch">
			<div class="single-menu">
	<div class="title-wrap d-flex justify-content-between">
									
              <h4><?php
                                                                 
   $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menuto,m.menufrom from item  m where m.itemId =7 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
 $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                 // echo "<p> $description </p>";                      
                             echo "<div><p>Item ID: $itemId </p></div>";                      

             $counter_int++;
                  
            }  
                                                        
             ?>       
                         
                             
                             </h4>
            





            
            <h4 class="price" ><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>
                                                                         <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
                                                                         <form>
                  
     
</form>
								</div>					                               
                            </div>          
                            
                             <div class="col-md-6 all lunch">
			<div class="single-menu">
	<div class="title-wrap d-flex justify-content-between">
									
                             <h4><?php
                                                                 
   $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menuto,m.menufrom from item  m where m.itemId =5 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
 $menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                    //echo($itemId) ;

                     
                 echo "<div><p>Item ID: $itemId </p></div>";                      
            
             $counter_int++;
                  
            }  
      
                                                              
             ?>       
                             
                             
                             </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>			
                                                                         <form>
                    
</form>
								</div>					                               
                            </div>          
                            
                             <div class="col-md-6 all lunch">
			<div class="single-menu">
	<div class="title-wrap d-flex justify-content-between">
									
                             <h4><?php
                                                                 
    $result = $link->query("select m.item_name, m.itemId, m.description ,m.price,m.menufrom,m.menuto from item  m where m.itemId =6 and  m.rId in (select r.rId from restaurant r where r.rname='$rname')" );
   
   // $result = $link->query($sql) or die($link->error);
         $counter_int=0;

  while ($row = $result->fetch_assoc()) 
            {
        unset( $itemId ,$description ,$price ,$item_name);       
                  $itemId= $row['itemId'];
                  $description = $row['description'];
                  $item_name=$row['item_name'];
                   $price= $row['price'];
$menufrom=$row['menufrom'];
                   $menuto=$row['menuto'];
                     echo($item_name) ;
                   // echo($itemId) ;
                 echo "<div><p>Item ID: $itemId </p></div>";                      

                 // echo "<p> $description </p>";                      
            
             $counter_int++;
                  
            }  
      
                                                              
             ?>       
                             
                             
                             </h4>
				<h4 class="price"><?php echo ($price) ?> L.E</h4>
									</div>			
									<p>
										<?php echo($description)?>
									</p>
                                                                          <p>From:<?php echo($menufrom);?></p>
                                    <p> To:<?php echo($menuto);?></p>
                                                                         
                                                                        
                                                                        
                                                                        
								</div>					                               
                            </div>          
 
            
                            
                               
                            
                        </div>
                    </div>
                    
                </div>
                
            </section>
            <!-- End menu-area Area -->	
       

			<!-- Start reservation Area -->
			<section class="reservation-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 reservation-left">
							<h1 class="text-white">Reserve Your Seats
							to Confirm if You Come
							with Your Family</h1>
							<p class="text-white pt-20">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.
							</p>
						</div>
						<div class="col-lg-5 reservation-right">
							<form class="form-wrap text-center" action="#">
								<input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >
								<input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >
								<input type="text" class="form-control" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" >		
								<input type="text" class="form-control date-picker" name="date" placeholder="Select Date & time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Date & time'" >									
								<div class="form-select" id="service-select">
									<select>
										<option data-display="">Select Event</option>
										<option value="1">Event One</option>
										<option value="2">Event Two</option>
										<option value="3">Event Three</option>
										<option value="4">Event Four</option>
									</select>
								</div>									
								<button class="primary-btn text-uppercase mt-20">Make Reservation</button>
							</form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End reservation Area -->				

			<!-- start footer Area -->		
			<footer class="footer-area">
				<div class="footer-widget-wrap">
					<div class="container">
						<div class="row section-gap">
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Opening Hours</h4>
									<ul class="hr-list">
										<li class="d-flex justify-content-between">
											<span>Monday - Friday</span> <span>08.00 am - 10.00 pm</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Saturday</span> <span>08.00 am - 10.00 pm</span>
										</li>
										<li class="d-flex justify-content-between">
											<span>Sunday</span> <span>08.00 am - 10.00 pm</span>
										</li>																				
									</ul>
								</div>
							</div>
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Contact Us</h4>
									<p>
										56/8, los angeles, rochy beach, Santa monica, United states of america - 1205
									</p>
									<p class="number">
										012-6532-568-9746 <br>
										012-6532-569-9748
									</p>
								</div>
							</div>						
							<div class="col-lg-4  col-md-6 col-sm-6">
								<div class="single-footer-widget">
									<h4>Newsletter</h4>
									<p>You can trust us. we only send promo offers, not a single spam.</p>
									<div class="d-flex flex-row" id="mc_embed_signup">


										  <form class="navbar-form" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
										    <div class="input-group add-on align-items-center d-flex">
										      	<input class="form-control" name="EMAIL" placeholder="Your Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email address'" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
										      <div class="input-group-btn">
										        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
										      </div>
										    </div>
										      <div class="info mt-20"></div>
										  </form>
									</div>
								</div>
							</div>						
						</div>					
					</div>					
				</div>
				<div class="footer-bottom-wrap">
					<div class="container">
						<div class="row footer-bottom d-flex justify-content-between align-items-center">
							<p class="col-lg-8 col-mdcol-sm-6 -6 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							<ul class="col-lg-4 col-mdcol-sm-6 -6 social-icons text-right">
	                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
	                            <li><a href="#"><i class="fa fa-behance"></i></a></li>           
	                        </ul>
						</div>						
					</div>
				</div>
			</footer>
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>			
            <script src="js/isotope.pkgd.min.js"></script>								
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>