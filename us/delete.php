<?php
require ('users.php');

$userId=$_GET['date'];
deleteUser($userId);
sleep(1);
header ("Location: index.php");
