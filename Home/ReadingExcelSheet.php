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
								<li><a class="gn-icon"><img src="Images/trip_icon.png">Trip Planning</a></li>
								<li><a href="contactCustomers.php"class="gn-icon"><img src="Images/contact_icon.png">Contact Customers</a></li>
								<li>
									<a href="" class="gn-icon "><img src="Images/resource icon.png">Resources</a>
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
				<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $dburl = "localhost:3306/gaya3";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "project";
    $conn = new mysqli($dburl, $dbuser, $dbpassword,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo"In if";
    $CustomerId =$CustomerName=$MobileNum=$Address=$Email="";
    if ($_REQUEST['Submit']=='upload') {
            echo"In function";
            $ok = true;
            //echo $_REQUEST['choosen'];
            $file = $_FILES['choosen']['tmp_name'];
            $handle = fopen($file, "r");
            if ($file == NULL) {
                error(_('Please select a file to import'));
                redirect(page_link_to('admin_export'));
            }
            else {
                while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                {
                    $CustomerId = $filesop[0];
                    $CustomerName = $filesop[1];
                    $MobileNum = $filesop[2];
                    //echo $MobileNum."\n";
                    $Address = $filesop[3];
                    $Email = $filesop[4];
                    $query="insert into CustomersDetails(CustomerId,CustomerName,MobileNum,Address,Email) values('".$CustomerId."','".$CustomerName."','".$MobileNum."','".$Address."','".$Email."')";
                   $sql = mysqli_query($conn,$query);
                     
            /*`CustomerId`='" . mysqli_escape($CustomerId) . "',
            `CustomerName`='" . mysqli_escape($CustomerName) . "',
            `MobileNum`='" . mysqli_escape($MobileNum) . "',
            `Address`='" . mysqli_escape($Address) . "',
            `Email`='" . mysqli_escape($Email) . "',");*/
                    //}
                   $query="insert into CustomerMails(CustomerId,Email) values('".$CustomerId."','".$Email."')";
                   $sql = mysqli_query($conn,$query);
                }
                
                if ($sql) {
                    echo "You database has imported successfully!";
                    //success(_("You database has imported successfully!"));
                    //redirect(page_link_to('admin_export'));
                } else {
                    echo "Sorry! There is some problem in the import file.";
                   //error(_('Sorry! There is some problem in the import file.'));
                   //redirect(page_link_to('admin_export'));
                }
                echo "</table>";
            }
        }
        //form_submit($name, $label) Renders the submit button of a form
        //form_file($name, $label) Renders a form file box
        
       /* return page_with_title("Import Data", array(
        msg(),
        div('row', array(
        div('col-md-12', array(
        form(array(
        form_file('choosen', _("Import user data from a csv file")),
        form_submit('upload', _("Import"))
        ))
        ))
        ))
        ));*/
    
    $conn->close();
}

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="Post" enctype="multipart/form-data" style="margin-top:80px;margin-left:250px" >
<p>Upload excel file</p>
<input type="file" name="choosen"><br><br>
<input type="submit" name="Submit" value="upload">
</form>
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>
</html>



