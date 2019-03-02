<html>
<head>
</head>
<body>
<h1>Message sent</h1>
<?php
session_start();
if(($_POST['name'])=='SendMail'){
    var_dump($_SESSION['passed'][0])."<br>";
    //echo "size  = ".sizeof($_SESSION['passed'])."<br>";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $dburl = "localhost:3306/gaya3";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "project";
    $conn = new mysqli($dburl, $dbuser, $dbpassword,$dbname);//returns connection object
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    for ($i=0;$i<sizeof($_SESSION['passed']);$i++)
    {
        $id=$_SESSION['passed'][$i];
        //echo "Type of ".gettype($id);
        //echo "id = ".$id;
        $sql = "SELECT Email FROM CustomersDetails WHERE CustomerID='".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc())//fetch a result row as an associative array or returns false
            {
                $mailto = $row['Email'];
                $mailto=substr($mailto,0,-4);
                echo $mailto;
                $mailMsg ="Dear customer,Please select the time slot for your delivery from the provided link: http://localhost/geekDiv/Home/form.php?custId=".$mailto;
                $mail ->IsSmtp();
                $mail ->SMTPDebug = 0;
                $mail ->SMTPAuth = true;
                $mail ->SMTPSecure = 'ssl';
                $mail ->Host = "smtp.gmail.com";
                $mail ->Port = 465; // or 587
                $mail ->IsHTML(true);
                $mail ->Username = "priyal81252@gmail.com";
                $mail ->Password = "PRIyal123$";
                $mail ->SetFrom("Timely@gmail.com");
                
                $mail ->Body = $mailMsg;
                $mail ->AddAddress($mailto);
                if($mail->Send())
                {
                    echo '<script type="text/javascript">',
                    'jsfunction();',
                    '</script>'
                    ;
        
                }
                
            }
            }
}
}
?></body>
</html>