<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Google Nexus Website Menu</title>
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
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>
								<li>
									<a href="" class="gn-icon gn-icon-download">Home</a>
								</li>
								<li><a class="gn-icon gn-icon-cog">Trip Planning</a></li>
								<li><a class="gn-icon gn-icon-help">Contact Customers</a></li>
								<li>
									<a class="gn-icon gn-icon-archive">Help</a>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><img src="marg_seva_logo.jpeg"></li>
				<li><a class="codrops-icon codrops-icon-drop"><span>Admin</span></a></li>
	            <li><a class="codrops-icon codrops-icon-drop"><span>Log Out</span></a></li>
			</ul>
			<!--div class="dropdown" style="float:right;padding-right:145px;padding-top:30px">
            <span>Mouse over me</span>
             <div class="dropdown-content">
            <p>Hello World!</p>
             </div-->

			<header >
				<h1>Google Nexus Website Menu <span>A sidebar menu as seen on the <a href="http://www.google.com/nexus/index.html">Google Nexus 7</a> page</span></h1>	
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>