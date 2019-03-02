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
									<a href="Home.html" class="gn-icon gn-icon-download">Home</a>
								</li>
								<li><a class="gn-icon gn-icon-cog">Trip Planning</a></li>
								<li><a href="ContactCustomers.html"class="gn-icon gn-icon-help">Contact Customers</a></li>
								<li>
									<a href="" class="gn-icon gn-icon-download">Resources</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-archive">Help</a>
								</li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><img src="Images\timely.jpeg"></li>
				<li><a class="codrops-icon codrops-icon-drop"><span>Admin</span></a></li>
	            <li><a href="login.html" class="codrops-icon codrops-icon-drop"><span>Log Out</span></a></li>
			</ul>
			<!--div class="dropdown" style="float:right;padding-right:145px;padding-top:30px">
            <span>Mouse over me</span>
             <div class="dropdown-content">
            <p>Hello World!</p>
             </div-->

			<header >
<?php
//ini_set("SMTP", "aspmx.l.google.com");
//ini_set("sendmail_from", "rlgayathri99@gmail.com");
//ini_set("SMTP","mail.gmail.com");
//ini_set("smtp_port","25");
//ini_set('sendmail_from', 'rlgayathri99@gmail.com');
$dburl = "localhost:3306/gaya3";
$dbuser = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli($dburl, $dbuser, $dbpassword,$dbname);//returns connection object
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully"."<br>";
$sql = "SELECT C.CustomerID,C.CustomerName,C.MobileNum,C.Address,C.Email FROM CustomersDetails C,CustomerMails M WHERE C.CustomerID=M.CustomerID AND M.NumOfmsg<=3";
$result = $conn->query($sql);//returns query object
session_start();
$arr=array();
if ($result->num_rows > 0) {
    // output data of each row
    echo "<html><body>";
    echo "<style>";
    echo  "table{border-bottom: 2px solid white;border-radius: 1em;;background-color:white}";
    echo "td{border-bottom: 2px solid white;color:black;padding:0 15px 0 15px;text-align: left;}";
    echo "th{border-bottom: 2px solid white;color:black}";
    echo "</style>";
    echo "<table>";
    echo "<caption style=\"font-style:bold;font-size:30px;color:black\">Message The Customers</caption>";
    echo "<tr><th>"."Selected"."</th><th>"."CustomerId"." </th>"."<th>"."CustomerName"."</th> "."<th>"."MobileNum"." </th>"."<th>"."Address"." </th>"."<th>"."Email"."</th><tr>";
    $i=0;
    while($row = $result->fetch_assoc())//fetch a result row as an associative array or returns false
    {
        
        echo "<tr><td><input type=\"checkbox\" name=\"name1\" checked/>&nbsp;</td><td>". $row["CustomerID"]."</td>"."<td>".$row["CustomerName"]."</td>"."<td>".$row["MobileNum"]."</td>"."<td>".$row["Address"]."</td>"."<td>".$row["Email"] ."</td><tr>";
        $arr[$i]=$row["CustomerID"];
        $i++;
        //$number=$row["phoneNum"];
    }
    echo "</table>";
    echo "<form action='Message.php' method='Post'><input style='margin-top:15px;margin-left:400px;' type='Submit' name='name' value='SendMessage'/></form>";   
    echo "</body></html>";
} else {
    echo "0 results";
}

$_SESSION['passed']=$arr;
$conn->close();
?>
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>
