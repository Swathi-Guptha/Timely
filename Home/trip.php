<?php


/**************************************************************************************
WE ARE HARD-CODING THE PROJECT DUR TO NON-AVAILABILITY OF BILLABLE ACCOUNT OF GOOGLE API
A billable account would help us access more functions from the API's.
***************************************************************************************/

 
$addresses=array("3-4-428/A,1st floor near ymca circle,narayanguda,hyderabad,500029",
    "14-5-329/1,ShahInayath Gunj,BegumBazar,Hyderabad,500012",
    "14-2-189,godavari colony,ShahInayath Gunj,Begum Bazar,Hyderabad,500012",
    "jain temple, aghapura",
    "14-1-370,Flat-No:303,Bhandari Building,Aghapura,hyderabad,500001",
    "2-2-1107,Flat-No:303,Bhavyas Krishna Enclave,TilakNagar,New Nallakunta,Hyderabad,500044",
    "1-8-150/2,Behind Aurora college,Chikkadpally,Hyderabad,500020",
    "mangalhat police station",
    "1-8-45/D,Chikkadpally,Hyderabad,500020",
    "osmania medical college",
    "kacheguda post office",
    "osmangunj ginger garlic market",
    "gs melkote park,Hyderabad,500020");
$deliveryCenter="king koti palace";
$arrlength=count($addresses);
$latitude=array();
$longitude=array();

/******************************************************************************
GETTING THE LATITUDES AND LONGITUDES OF ADDRESSES THROUGH GOOGLE API
*******************************************************************************/

for($i=0; $i<$arrlength;$i++)
{
    $address=$addresses[$i];
    $address = str_replace(" ", "+", $address);
    $region = "INDIA";
    //
    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region&key=AIzaSyDdrVcu7KI3QqpQlfab1HETqxqDXVriVm0");
    $json = json_decode($json);
    $lat = $json->{'results'}['0']->{'geometry'}->{'location'}->{'lat'};;
    $long = $json->{'results'}['0']->{'geometry'}->{'location'}->{'lng'};
    $latitude[$i]=$lat;
    $longitude[$i]=$long;
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Insert title here</title>
<style>
#map{
height:440px;
width:100%;
}
#floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
 #routes{
height:100%;
width:100%;
background-color:red;
border: 2px solid white;
color:white;
Opacity:0.8;
}
#home{
float:right;
margin-left:2900px;
height:50px;
width:150px;
margin-right:10%;
background-color:red;
color:white;
font-style:bold;
font-size:2.3 em;
font-weight:5px;
}
#btn{
height:50px;
width:150px;
margin-right:70%;
background-color:white;
color:black;
font-style:bold;
font-size:2.3 em;
font-weight:5px;
}
</style>
</head>
<body>

<input type="button" value="Home" id="home" onclick="window.location.href='home/index.php'" />
<div id="map"></div>
<div id="routes">
<button id="btn">Delivery addresses in this slot are:</button>
<div id="innerHtml" style="height:100px,width:30px,background-color:white">

<!-- due to non availabilty of api key we are hardcoding thid part  -->
DELIVERY CENTER ADDRESSES: <br><br>
>>>king koti palace <br><br>
ADDRESSES:<br><br>
>>>osmaina medical college<br><br>
>>>3-4-428/A,1st floor near ymca circle,narayanguda,hyderabad,500029<br><br>
>>>central gurdwara sahib gawliguda<br><br>
>>>afzal gunj police station <br><br>
>>>14-1-370,Flat-No:303,Bhandari Building,Aghapura,hyderabad,500001<br><br>
>>>2-2-1107,Flat-No:303,Bhavyas Krishna Enclave,TilakNagar,New Nallakunta,Hyderabad,500044<br><br>
>>>14-2-189,godavari colony,ShahInayath Gunj,Begum Bazar,Hyderabad,500012<br><br>
>>>ashok market<br><br>
>>>1-8-150/2,Behind Aurora college,Chikkadpally,Hyderabad,500020<br><br>
>>>jain temple<br><br>
>>>gowtham school
</div>
</div>
<script>

function initMap(){
	var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
//Map Location	
var obj= {zoom:12,
		mapTypeId:'roadmap',
		//Dispalying the map at hydreabad(city) co-ordinates
        center: {lat:17.387140, lng:78.491684},
        //Disabling Zoom-in and Zoom-out
        minZoom:12
        /maxZoom:3,/
		 }
		 
//New Map
var map= new google.maps.Map(document.getElementById('map'),obj);
directionsDisplay.setMap(map);
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var i=0;


var marker1=new google.maps.Marker({
	position:{lat:23.3499986,lng:82.0499998},
	map:map,
	icon:'http://maps.google.com/mapfiles/kml/paddle/purple-blank.png'
});


/**********************************************************************
OBTAINING THE LATITUDE AND LONGITUDE ARRAY FROM PHP CODE
**********************************************************************/
var latitude=<?php echo json_encode($latitude, JSON_PRETTY_PRINT) ?>;
var longitude=<?php echo json_encode($longitude, JSON_PRETTY_PRINT) ?>;
var deliveryCenter="<?php echo $deliveryCenter ?>";
console.log(deliveryCenter);
    
//Creating an object array of co-ordinates
var locations=[];
for(var i=0;i<latitude.length;i++)
{
	locations.push({lat: latitude[i],lng: longitude[i]});
}

/******************************************************************
Add some markers to the map.
Note: The code uses the JavaScript Array.prototype.map() method to
create an array of markers based on a given "locations" array.
**************************************************************************/
     
    var markers = locations.map(function(location) {
      return new google.maps.Marker({
        position: location,
        label: labels[i++ % labels.length],
      });
      bounds.extend(locations[i]);
    });

    var geocoder = new google.maps.Geocoder();
    var latt;
    var lngg;
    
    geocoder.geocode( { 'address': deliveryCenter}, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {
        latt = results[0].geometry.location.lat();
        lngg = results[0].geometry.location.lng();
       } 
    }); 
/**************************************************************************
Add a marker clusterer to manage the markers.
***************************************************************************/
    
    var mcOptions = {gridSize: 50, maxZoom: 12,imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'};
    var markerCluster = new MarkerClusterer(map, markers,mcOptions);
    google.maps.event.addListener(markerCluster, 'clusterclick', function(cluster) {
    var content = '';

        // Convert lat/long from cluster object to a usable MVCObject
        var info = new google.maps.MVCObject;
        info.set('position', cluster.center_);

        
        //Get markers
        var markers = cluster.getMarkers();

        var titles = "";
        var way =[];
        
        var allmarkers=[];
        for(var i = 0; i < markers.length; i++) {
            titles += markers[i].getTitle() + "\n";
            console.log(markers[i].getPosition().lat());
            console.log(markers[i].getPosition().lng());
            allmarkers.push(new google.maps.LatLng(markers[i].getPosition().lat(),markers[i].getPosition().lng()));
      
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        var latlng = {lat: markers[i].getPosition().lat(),lng: markers[i].getPosition().lng()};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
                console.log(results[0].formatted_address+"  ----------");
                way.push({ location:results[0].formatted_address,
                             stopover:true});
                infowindow.setContent(results[0].formatted_address);
            } 
            else {
              window.alert('No results found');
            }
          }
        else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
        }
        console.log(way);
        var wayptss=[];

/************************************************************************************
        Since we are using the trial version of Distance Matrix Api api it only allows ten calls per API Key   
		Code used when access to the billable account is given
         /*while($row = $result->fetch_assoc())//fetch a result row as an associative array(key-value pair array) or returns false
		 {
         //$arr[]=$row["Address"];
         $str=$str.$row["Address"]."|";
         $visited[]=0;
		 }*/
*************************************************************************************/

		var wayptsss=[];
         wayptsss.push({
             location:"osmangunj ginger garlic market",
             stopover:true});
         wayptsss.push({
             location:"jain temple, aghapura",
             stopover:true});
         wayptsss.push({
             location:"mangalhat police station",
             stopover:true});
         wayptsss.push({
             location:"osmania medical college",
             stopover:true});
         wayptsss.push({
             location:"afzal gunj police station",
             stopover:true});
         wayptsss.push({
             location:"14-5-329/1,ShahInayath Gunj,BegumBazar,Hyderabad,500012",
             stopover:true});
         wayptsss.push({
             location:"14-1-370,Flat-No:303,Bhandari Building,Aghapura,hyderabad,500001",
             stopover:true});
         wayptsss.push({
             location:"big bazar,abids",
             stopover:true});

          directionsService.route({
             origin: deliveryCenter,
             destination:"st georges girls grammar school,abids",
             waypoints: wayptsss,
             optimizeWaypoints: true,
             travelMode: 'DRIVING'
           }, function(response, status) {
             if (status === 'OK') {
               directionsDisplay.setDirections(response);
               var route = response.routes[0];
               console.log("*******");
             } else {
               window.alert('Directions request failed due to ' + status);
             }
           });
          

          google.maps.event.addListener(markerCluster, 'clusterclick', function(cluster) {
              var wayptss=[];
          wayptss.push({
              location:"opp, YMCA Circle, Venkateshwara Colony, King Koti, Narayanguda, Hyderabad, Telangana 500029, India",
              stopover:true});
          wayptss.push({
              location:"Dr.G.S Melkote Park, Jaiswal Street, Harivihar Colony Road, Bhawani Nagar, Narayanguda, Hyderabad, Telangana 500029, India",
              stopover:true});
          wayptss.push({
              location:"1-8-19, Chikkadpally, Hyderabad, Telangana 500020, India",
              stopover:true});
          wayptss.push({
              location:"1-8-168/2/2, Chikkadpally, Hyderabad, Telangana 500020, India",
              stopover:true});
          wayptss.push({
              location:"3-4-428/A,1st floor near ymca circle,narayanguda,hyderabad,500029",
              stopover:true});
          
          wayptss.push({
              location:"kacheguda post office",
              stopover:true});
         

           directionsService.route({
              origin: deliveryCenter,
              destination:"st georges girls grammar school,abids",
              waypoints: wayptss,
              optimizeWaypoints: true,
              travelMode: 'DRIVING'
            }, function(response, status) {
              if (status === 'OK') {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
                console.log("*******");
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });

          });
          
         
 });
    
    
    google.maps.event.addListenerOnce(map, 'idle', function(){
        console.log("Total number of clusters: " + markerCluster.getTotalClusters());
    });
}



</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrVcu7KI3QqpQlfab1HETqxqDXVriVm0&callback=initMap">
</script>


</body>		
</html>