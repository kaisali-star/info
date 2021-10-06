<?php
include ('partials/header.php');
require ('linksfunctions.php');
if (!isset($_GET['date'])){
    include ('partials/not_found.php');
    exit;
}


$linkdate=$_GET['date'];
deletelink($linkdate);
header ("Location: link.php");

