
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
				          <li><a href="indexstaff.php">Home</a></li>
                                          <li><a href="staff.php">Staff</a></li>
				          <li><a href="newcart.php">Cart</a></li>

				          <li><a href="about.html">About</a></li>
				          <li><a href="gallery.html">Gallery</a></li>
                                          <li><a href="area2.php">Cuisine Area</a></li>
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
                                             <li><a href="logout.php">Logout</a></li>
                                              <li><a href="checkout.html">Checkout</a></li>

				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			
			<!-- start banner Area -->
			<section class="banner-area">		
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-12 banner-content">
							
							<h5 class="text-white">Browse restaurants By Area</h5>                               
                                           
 <?php                                                        
$result = $link->query("select city_id, city_name  from city where deleted=0  and city_id=1");
while ($row = $result->fetch_assoc()) 
 {
   unset( $city_id, $city_name);
                  $city_id= $row['city_id'];
                  $city_name = $row['city_name']; 
             echo "<h4 class= text-white>$city_name</h4>";                        
      $result = $link->query("select cityid, area_name  from area where deleted=0 and cityid=1 ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $cityid, $area_name);
                  $cityid= $row['cityid'];
                  $area_name = $row['area_name']; 
              echo " <li><a href=area.php?var2=$area_name>$area_name </a></li>";
              


            }  
   }
 ?>
<?php
 $result = $link->query("select city_id, city_name  from city where deleted=0  and city_id=2");
while ($row = $result->fetch_assoc()) 
 {
   unset( $city_id, $city_name);
                  $city_id= $row['city_id'];
                  $city_name = $row['city_name']; 
             echo "<h4 class= text-white>$city_name</h4>";                        
      $result = $link->query("select cityid, area_name  from area where deleted=0 and cityid=2 ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $cityid, $area_name);
                  $cityid= $row['cityid'];
                  $area_name = $row['area_name']; 
              echo " <li><a href=area2.php?var2=$area_name>$area_name </a></li>";
            }  
   }
  
   $result = $link->query("select city_id, city_name  from city where deleted=0  and city_id=3");
while ($row = $result->fetch_assoc()) 
 {
   unset( $city_id, $city_name);
                  $city_id= $row['city_id'];
                  $city_name = $row['city_name']; 
             echo "<h4 class= text-white>$city_name</h4>";                        
      $result = $link->query("select cityid, area_name  from area where deleted=0 and cityid=3 ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $cityid, $area_name);
                  $cityid= $row['cityid'];
                  $area_name = $row['area_name']; 
              echo " <li><a href=area2.php?var2=$area_name>$area_name </a></li>";
            }  
   }
     $result = $link->query("select city_id, city_name  from city where deleted=0  and city_id=4");
while ($row = $result->fetch_assoc()) 
 {
   unset( $city_id, $city_name);
                  $city_id= $row['city_id'];
                  $city_name = $row['city_name']; 
             echo "<h4 class= text-white>$city_name</h4>";                        
      $result = $link->query("select cityid, area_name  from area where deleted=0 and cityid=4 ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $cityid, $area_name);
                  $cityid= $row['cityid'];
                  $area_name = $row['area_name']; 
              echo " <li><a href=area2.php?var2=$area_name>$area_name </a></li>";
            }  
   }
     $result = $link->query("select city_id, city_name  from city where deleted=0  and city_id=5");
while ($row = $result->fetch_assoc()) 
 {
   unset( $city_id, $city_name);
                  $city_id= $row['city_id'];
                  $city_name = $row['city_name']; 
             echo "<h4 class= text-white>$city_name</h4>";                        
      $result = $link->query("select cityid, area_name  from area where deleted=0 and cityid=5 ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $cityid, $area_name);
                  $cityid= $row['cityid'];
                  $area_name = $row['area_name']; 
              echo " <li><a href=area2.php?var2=$area_name>$area_name </a></li>";
                  
                  
                  
            }  
   }
 ?>                                  
						</div>     
					</div>
				</div>					
</section>
			<!-- End banner Area -->

			<!-- Start home-about Area -->
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 home-about-left">
							<h1>About Our Story</h1>
							<p>
								Who are in extremely love with eco friendly system. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							</p>
							<a href="#" class="primary-btn">view full menu</a>
						</div>
						<div class="col-lg-6 home-about-right">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->			

			<!-- Start menu-area Area -->
            <section class="menu-area section-gap" id="menu">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Browse By Cuisine </h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>	
   

      <ul class="filter-wrap filters col-lg-12 no-padding">

<!--  <?php        
                       
      $result = $link->query("select rId, cname  from restaurant_cuisine where deleted=0 group by cname ");
  while ($row = $result->fetch_assoc()) 
            {
        unset( $rId, $cname);
                  $rId= $row['rId'];
                  $cname = $row['cname']; 
                  echo "<li  data-filter = '.cuisine' <a href= cuisinename >$cname </a></li>";                      
            }  
                                 

   
           ?>         -->
      </ul>
                    
                    <ul class="filter-wrap filters col-lg-12 no-padding">
                        <li class="active" data-filter="*">All Cuisines</li>
                        <li data-filter=".burger"></li>
                        <li data-filter=".FastFood">Fast Food</li>
                            <li data-filter=".pizza">Pizza</li>
                        <li data-filter=".texmex">Tex Mex</li>
                        <li data-filter=".japanese">Japanese</li>
                        <li data-filter=".burger">Burger</li>
                        <li data-filter=".grill">Grill</li>

                    </ul>
                    
                    <div class="filters-content">
                        <div class="row grid">
                             <div class="col-md-6  all  burger">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $br = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Burger') " );
  while ($row = $br->fetch_assoc()) 
            {
        unset( $rId, $rname);
                  $rId= $row['rId'];
                  $rname = $row['rname']; 
                                  $_SESSION['var1'] = $rname;

               //   echo "<h4><a href= menu.php >$rname </a></h4>"; 
                                                   echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";

            }  
                                                                                
                                                                                
                               ?>

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                            
                             <div class="col-md-6  all  FastFood">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $ff = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Fast Food' ) " );
  while ($row = $ff->fetch_assoc()) 
            {
        unset( $rId, $rname);
            $rId= $row['rId'];
            $rname = $row['rname'];    
            
                 echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";

            }  
  ?>

                 
									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                            
                            
                            
                            
                            <div class="col-md-6  all  pizza">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $pz = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Pizza') " );
  while ($row = $pz->fetch_assoc()) 
            {
        unset( $rId, $rname);
                  $rId= $row['rId'];
                  $rname = $row['rname']; 
                                                    $_SESSION['var1'] = $rname;

                //  echo "<h4><a href= menu.php >$rname </a></hr>";                      
            }  
                                 echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";
                                                                
                                                                                
                               ?>

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div>  
                            
                             <div class="col-md-6  all  grill">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $gr = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Grill') " );
  while ($row = $gr->fetch_assoc()) 
            {
        unset( $rId, $rname);
                  $rId= $row['rId'];
                  $rname = $row['rname']; 
                                                    $_SESSION['var1'] = $rname;

                 echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";
            }  
                                                                                
  ?>

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                           <div class="col-md-6  all  japanese">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $jp = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Japanese') " );
  while ($row = $jp->fetch_assoc()) 
            {
        unset( $rId, $rname);
                  $rId= $row['rId'];
                  $rname = $row['rname']; 
                                                    $_SESSION['var1'] = $rname;

                 echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";
            }  
                                                                                
                                                                                
                               ?>

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                             <div class="col-md-6  all  texmex">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                            <?php
                                                                                
       $tm = $link->query("select l.rId , l.rname from restaurant l where l.rId  in (select rc.rId from restaurant_cuisine rc  where rc.cname='Tex Mex') " );
  while ($row = $tm->fetch_assoc()) 
            {
        unset( $rId, $rname);
                  $rId= $row['rId'];
                  $rname = $row['rname']; 
                $_SESSION['var1'] = $rname;
                 echo"   <h4><a href= menu.php?var1=$rname >$rname </a></hr>";
            }   
?>

									</div>		

					
                                                                    <p>
                                                                            Click to see menu	
                                                                        </p>									
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
			
			<!-- Start gallery-area Area -->
            <section class="gallery-area section-gap" id="gallery">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Food and Customer Gallery</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>	
                    
                    <ul class="filter-wrap filters col-lg-12 no-padding">
                        <li class="active" data-filter="*">All Menu</li>
                        <li data-filter=".breakfast">Breakfast</li>
                        <li data-filter=".lunch">Lunch</li>
                        <li data-filter=".dinner">Dinner</li>
                        <li data-filter=".budget-meal">Budget Meal</li>
                        <li data-filter=".buffet">Buffet</li>
                    </ul>
                    
                    
                    <div class="filters-content">
                        <div class="row grid">
                            <div class="col-lg-4 col-md-6 col-sm-6 all breakfast">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g1.jpg" alt="">
                            	</div>	                          
                            </div>                           
                            <div class="col-lg-4 col-md-6 col-sm-6 all dinner">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g2.jpg" alt="">
                            	</div>                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 all budget-meal">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g3.jpg" alt="">
                            	</div>                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 all breakfast">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g4.jpg" alt="">
                            	</div>                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 all lunch">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g5.jpg" alt="">
                            	</div>                            
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 all buffet">
                            	<div class="single-gallery">
                            		<img class="img-fluid" src="img/g6.jpg" alt="">
                            	</div>                            
                            </div>                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End gallery-area Area -->			

			<!-- Start review Area -->
			<section class="review-area section-gap">
				<div class="container">
					<div class="row">
						<div class="active-review-carusel">
							<div class="single-review">
								<img src="img/user.png" alt="">
								<h4>Hulda Sutton</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>								
								</div>	
								<p>
									“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.”
								</p>
							</div>
							<div class="single-review">
								<img src="img/user.png" alt="">
								<h4>Hulda Sutton</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>								
								</div>	
								<p>
									“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.”
								</p>
							</div>	
							<div class="single-review">
								<img src="img/user.png" alt="">
								<h4>Hulda Sutton</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>								
								</div>	
								<p>
									“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.”
								</p>
							</div>
							<div class="single-review">
								<img src="img/user.png" alt="">
								<h4>Hulda Sutton</h4>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>								
								</div>	
								<p>
									“Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.”
								</p>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End review Area -->					

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Latest From Our Blog</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b1.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Cooking Perfect Fried Rice
							in minutes</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b2.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Secret of making Heart 
							Shaped eggs</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b3.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>How to check steak if 
							it is tender or not</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b4.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Seaseme and black seed
							Flavored Bun Rocks</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>							
					</div>
				</div>	
			</section>
			<!-- End blog Area -->							

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