<?php
require('linksfunctions.php');

$linkdate = $_GET['date'];
deletelink($linkdate);
header("Location: link.php");
