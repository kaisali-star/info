<?php
require ('users.php');

$userId=$_GET['date'];
deleteUser($userId);
header ("Location: index.php");
?>
