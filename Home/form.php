<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
</head>
<script>
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
var custId=getUrlVars()["custId"];
document.write(custId)

function getCID(){
	var a=getUrlVars()["custId"];
	//document.write("heloooooooooooo")
	//document.write(a)
	return a;
}


</script>

<body>
<div class="container" >
<div class="main">
<h1 style="text-align:center;font-size:50px;background-color:red;width:100%;height:70px;border-radius:10px;padding-top:45px;color:white">
<img src="Images\timely_logo.jpeg" style="float:left">Timely</h1>
<form action="form.php" method="get" style="text-align:center">
<label class="heading">Select Your Technical Exposure:</label><br><br>
<input type="hidden" name="custId" id="cid" value="" >
<script>document.getElementById('cid').value = getCID()</script>
<input type="checkbox" name="check_list[]"value="9AM - 1PM" ><label style="color:#D3D3D3">9AM - 1PM</label><br/>
<p style="color:red">* Some time slots are unavailable due to limited resources</p>
<input type="checkbox" name="check_list[]" value="1PM - 5PM"><label>1PM - 5PM</label><br/>
<input type="checkbox" name="check_list[]" value="5PM - 9PM"><label>5PM - 9PM</label><br/>
<br/><br/>
<input type="date" name="date" >
<input type="submit" name="submit" Value="Submit" />
<!----- Including PHP Script ----->

</form>
</div>
</div>
<?php


/*$mailto = $_GET['mailto'];
 $mailSub = $_GET['mailSub'];
 $mailMsg = $_GET['mailMsg'];
 //
 $custID=$_GET['custId'];
 echo $custID.'---shdoljlhl\n';
 echo "kdl\nsn";*/


if(isset($_GET['submit'])){
    $custId=$_GET['custId'];
    echo "Dear customer your id is ".$custId;
    if(!empty($_GET['check_list'])) {
        // Counting number of checked checkboxes.
        $checked_count = count($_GET['check_list']);
        echo "You have selected following ".$checked_count." option(s): <br/>";
        // Loop to store and display values of individual checked checkbox.
        foreach($_GET['check_list'] as $selected) {
            echo "<p>".$selected ."</p>";
        }
        $date=$_GET['date'];
        echo "<p>On date ".$date ."</p>";
      }
    else{
        echo "<b>Please Select Atleast One Option.</b>";
    }
}
echo'
<script>
do{
    document.getElementById("custId").value = custId;
    document.write(custId)
document.write("ppppppppppppppppppppppppp");
}while(!window.load);
    </script>';

?>
</body>
</html>