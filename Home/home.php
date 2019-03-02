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
								<li><a href="trip.php" class="gn-icon"><img src="Images/trip_icon.png">Trip Planning</a></li>
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
				<li><img src="Images/timely_logo.jpeg"></li>
				<li><a class="codrops-icon codrops-icon-drop"><span>Admin</span></a></li>
	            <li><a href="login.html" class="codrops-icon codrops-icon-drop"><span>Log Out</span></a></li>
			</ul>
			<!--div class="dropdown" style="float:right;padding-right:145px;padding-top:30px">
            <span>Mouse over me</span>
             <div class="dropdown-content">
            <p>Hello World!</p>
             </div-->

			<header >
				<table style="border-bottom: 2px solid white;border-radius: 1em;;background-color:white">
				<caption style="font-style:bold;font-size:30px;color:black" >Assigned Orders</caption>
				<tr><th style="border-bottom: 2px solid white;color:black">Slot</th><th style="border-bottom: 2px solid white;color:black">CustomerID</th><th style="border-bottom: 2px solid white;color:black">CustomerName</th><th style="border-bottom: 2px solid white;color:black">Assigned To</th></tr>
				<tr><td rowspan="2" style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Morning(09:00AM-12:00PM)</td><td style="border-bottom: 2px solid white;color:black;text-align: left;">17BD1A057J</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Gayathri</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">XYZ</td></tr>
				<tr><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">17BD1A057Q</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Swathi</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">XYZ</td></tr>
				<tr><td rowspan="2" style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Afternoon(12:00PM-04:00PM)</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">17BD1A051E</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Priyal</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">PQR</td></tr>
                <tr><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">17BD1A057H</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Janani</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">PQR</td></tr> 
				<tr><td rowspan="2" style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Evening(04:00PM-08:00PM)</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">17BD1A051U</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Raechal</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">ABC</td></tr>
                <tr><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">17BD1A057M</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">Smera</td><td style="border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;">ABC</td></tr> 
				</table>	
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>