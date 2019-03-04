<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Timely</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body style="height:100%;opacity:10">
		<div class="container" style="background-color:#ff0000">
			<ul id="gn-menu" class="gn-menu-main" style="height:75px">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li>
									<a href="home.php" class="gn-icon "><img src="Images/home-icon.jpg">Home</a>
								</li>
								<li><a href="trip.php"class="gn-icon"><img src="Images/trip_icon.png">Trip Planning</a></li>
								<li><a href="contactCustomers.php"class="gn-icon"><img src="Images/contact_icon.png">Contact Customers</a></li>
								<li>
									<a href="Resources.php" class="gn-icon "><img src="Images/resource icon.png">Resources</a>
								</li>
								<li>
									<a href="ReadingExcelSheet.php"class="gn-icon"><img src="Images/upload_icon.png">Upload</a>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><img src="Images\timely_logo.jpeg"></li>
				<li><a class="codrops-icon codrops-icon-drop"><span>Admin</span></a></li>
	            <li><a href="login.html" class="codrops-icon codrops-icon-drop"><span>Log Out</span></a></li>
			</ul>
			<!--div class="dropdown" style="float:right;padding-right:145px;padding-top:30px">
            <span>Mouse over me</span>
             <div class="dropdown-content">
            <p>Hello World!</p>
             </div-->

			<header >
				<h1>WELCOME TO TIMELY </h1>	
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>