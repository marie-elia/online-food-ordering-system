
<?php
// Initialize the session
session_start();
                             //   $rname= $_GET['var1'];

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
$area_name= $_GET['var2'];


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
				          <li><a href="index.php">Home</a></li>
				          <li><a href="about.html">About</a></li>
				          <li><a href="gallery.html">Gallery</a></li>
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
			<section class="relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Cuisine Area		
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.html"> Cuisine</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
 <section class="menu-area section-gap" id="menu">
                <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Browse By Cuisine  and Area </h1>
							</div>
						</div>
					</div>	
   
			<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<p class="sample-text">
<ul class="filter-wrap filters col-lg-12 no-padding">
       
                                                                 <?php  echo"  <h2>Cuisine available in $area_name </h2> ";?>
                  
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
                             <div class="col-md-6  all grill ">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                             <?php        
                         //             $area_name=$_SESSION['var2'] ;<?php
               //$area_name=$_SESSION['var2'] ;

      //  echo $area_name;    
      
  $result = $link->query("select r.rname from restaurant r where r.rid=8 and r.rId in (select b.rId from restaurant_branch b where b.area_name='$area_name')" );
   
   //$result = $link->query($sql) or die($link->error);
      //   $counter_int=0;


  while ($row = $result->fetch_assoc()) 
            {
        unset( $rname );       
                  $rname= $row['rname'];
                  $ss=$rname;

     //      echo"<p class='sample-text'><a href=menu.php?var1=$rname>$rname</a></p>";
   
            
      $result = $link->query("select rc.rId, rc.cname  from restaurant_cuisine rc where rc.deleted=0 and rc.cname='Grill' and rc.rId in( Select b.rId from restaurant_branch b where b.area_name= '$area_name')group by cname ");
  //$result = mysqli_query($link,$result) or die ( mysqli_error($link));

      while ($row = $result->fetch_assoc()) 
            {
        unset( $rId, $cname);
        
        
                  $rId= $row['rId'];
                  $cname = $row['cname']; 
                  //$area_name=$row['area_name'];
                   //echo  $row['cname'];

                 // echo  $row['rId'];
               //   echo "<li  data-filter = '.grill' <a href= cuisinename >$cname </a></li>";     
                            echo"<p class='sample-text'><a href=menu.php?var1=$ss>$ss</a></p>";

            }}
                                 
            
   
           ?>         
                                                                                
      

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                             <div class="col-md-6  all FastFood ">
								<div class="single-menu">
									<div class="title-wrap d-flex justify-content-between">
                                                                             <?php        
                         //             $area_name=$_SESSION['var2'] ;
$result = $link->query("select r.rname from restaurant r where r.rId in (select b.rId from restaurant_branch b where b.area_name='$area_name')" );
   
   //$result = $link->query($sql) or die($link->error);
      //   $counter_int=0;


  while ($row = $result->fetch_assoc()) 
            {
        unset( $rname );       
                  $rname= $row['rname'];
$mm=$rname;
          // echo"<p class='sample-text'><a href=menu.php?var1=$rname>$rname</a></p>";
   
      $result = $link->query("select rc.rId, rc.cname  from restaurant_cuisine rc where rc.deleted=0 and rc.cname='Fast Food' and rc.rId in( Select b.rId from restaurant_branch b where b.area_name= '$area_name')group by cname ");
  //$result = mysqli_query($link,$result) or die ( mysqli_error($link));

      while ($row = $result->fetch_assoc()) 
            {
        unset( $rId, $cname);
        
        
                  $rId= $row['rId'];
                  $cname = $row['cname']; 
                  //$area_name=$row['area_name'];
                  // echo  $row['cname'];
//echo $mm;
          echo"<p class='sample-text'><a href=menu.php?var1=$mm>$mm</a></p>";

                 // echo  $row['rId'];
               //   echo "<li  data-filter = '.grill' <a href= cuisinename >$cname </a></li>";                      
            }  
                                 
            }
   
           ?>         
                                                                                
      

									</div>		

									<p>
                                                                            Click to see menu	
                                                                        </p>									
								</div>					                               
                            </div> 
                            
			
                            
                 
                            
     


       
					</p>
				</div>
                    </div>
			</section>
			<!-- End Sample Area -->
			<!-- Start Button -->
			
			<!-- End Button -->
			<!-- Start Align Area -->
			
			<!-- start footer Area -->		
			<body class="footer-area">
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
			</body>
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