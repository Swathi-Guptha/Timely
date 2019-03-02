<?php
session_start();
//echo "In page";
if(($_POST['name'])=='SendMessage'){
   var_dump($_SESSION['passed'][0])."<br>";
   echo "size  = ".sizeof($_SESSION['passed'])."<br>";
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   $dburl = "localhost:3306/gaya3";
   $dbuser = "root";
   $dbpassword = "";
   $dbname = "project";
   $conn = new mysqli($dburl, $dbuser, $dbpassword,$dbname);//returns connection object
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   for ($i=0;$i<sizeof($_SESSION['passed']);$i++)
   {
       $id=$_SESSION['passed'][$i];
       echo "Type of ".gettype($id);
       echo "id = ".$id;
       $sql = "SELECT CustomerID,MobileNum FROM CustomersDetails WHERE CustomerID='".$id."'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc())//fetch a result row as an associative array or returns false
           {
               $mob_no=$row["MobileNum"];
               //$msg='hello';
               $username = "priyal81252@gmail.com";
               $hash = "d25fbf6ac98dd1e16ffd34b9f436fae00d552c1d20a9927a795ae43177b1d523";
               $test = "0";
               $sender = "TXTLCL"; // This is who the message appears to be from.
               $numbers = $mob_no; // A single number or a comma-seperated list of numbers
               $message = "This is a test message from the PHP API script.";
               $message = urlencode($message);
               $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
               $ch = curl_init('http://api.textlocal.in/send/?');
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $resultt = curl_exec($ch); // This is the result from the API
               curl_close($ch);
               //echo ($result);
           }
       }
       $sql = "SELECT * FROM CustomerMails ";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
           echo"in sec if";
           while($row = $result->fetch_assoc())//fetch a result row as an associative array or returns false
           {
               //echo gettype((int)$row['NumOfmsg']);
               if((int)$row['NumOfmsg']<3)
               {
                   $s=(int)$row['NumOfmsg']+1;
                   $sqll="UPDATE CustomerMails set NumOfmsg=".$s." WHERE CustomerID='".$id."'";
                   mysqli_query($conn, $sqll);
                   
               }
               else if($row['NumOfCalls']<3)
               {
                   $s=(int)$row['NumOfCalls']+1;
                   $sqll="UPDATE CustomerMails set NumOfCalls=".$s." WHERE CustomerID='".$id."'";
                   mysqli_query($conn, $sqll);
               }
               else if((int)$row['Ecomm']===0)
               {
                   $s=(int)$row['Ecomm']+1;
                   $sqll="UPDATE CustomerMails set Ecomm=".$s." WHERE CustomerID='".$id."'";
                   mysqli_query($conn, $sqll);
               }
                       
           }
       }
   }
   
   
   $conn->close();
    }
?>