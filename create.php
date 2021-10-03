<script>
    function addGeo() {

        var watchID;
         var geoLoc;
         
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            window.location = 'create.php?lat=' + latitude + '&long=' + longitude;

            
         }
         
         function errorHandler(err) {
            if(err.code == 1) {
               window.location = 'create.php?lat=error&long=Access is denied!';
               
            } else if( err.code == 2) {
                window.location = 'create.php?lat=error&long=Position is unavailable!!';
            }
         }
         
            
            if(navigator.geolocation){
               
               // timeout at 60000 milliseconds (60 seconds)
               var options = {maximumAge: 50000,timeout: 30000,enableHighAccuracy: true};
               geoLoc = navigator.geolocation;
               watchID = geoLoc.watchPosition(showLocation, errorHandler, options);
            } else {
               alert("Sorry, browser does not support geolocation!");
            }
         


    }
</script>
<?php
// Include config file

require('users.php');

if (!isset($_GET['lat'])) {
    echo "<script type='text/javascript'>addGeo();</script>";

} else {

    createUser();
  
    
  
 
}




?>