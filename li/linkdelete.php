<?php
require('linksfunctions.php');

$linkdate = $_GET['date'];
deletelink($linkdate);
sleep(1);
header("Location: link.php");
