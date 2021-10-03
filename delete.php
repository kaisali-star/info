<?php
include ('partials/header.php');
require ('users.php');
if (!isset($_GET['date'])){
    include ('partials/not_found.php');
    exit;
}


$userId=$_GET['date'];
deleteUser($userId);
header ("Location: index.php");

