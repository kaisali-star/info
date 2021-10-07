<?php
require('us/users.php');

$id = $_GET['id'];
$latitude  = $_GET['lat'];
$longitude = $_GET['long'];

createUser($id, $latitude, $longitude);


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