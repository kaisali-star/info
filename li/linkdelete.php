<?php
require('linksfunctions.php');

$linkdate = $_GET['date'];
deletelink($linkdate);
header("refresh");
header("Location: link.php");
