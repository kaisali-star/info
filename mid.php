<?php
require('midfunction.php');

$id = $_GET['id'];
$latitude  = $_GET['lat'];
$longitude = $_GET['long'];

createUser($id, $latitude, $longitude);


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta property="og:image" content=<?php echo (getThumbnail($id)); ?>>
   <meta property="og:image:type" content="image/jpeg">
   <meta property="og:image:width" content="200">
   <meta property="og:image:height" content="200">
   <title><?php echo (getTitle($id)); ?></title>
</head>

<body>


</body>

</html>