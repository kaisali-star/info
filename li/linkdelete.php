<?php
function ok()
{
    require('linksfunctions.php');

    $linkdate = $_GET['date'];
    deletelink($linkdate);
    header("Location: link.php");
}
function not()
{
    header("Location: link.php");
}
ok();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Link </title>

</head>

<body>

</body>

</html>