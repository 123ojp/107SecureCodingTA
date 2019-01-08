<?php
require_once("config.php");
$conn = new PDO($dsn, $dbuser, $dbpass);

// get one message
$sql = "select * from messageboard where isread=0 limit 1";
$stm = $conn->query($sql)->fetch();
$id = $stm['id'];

// set isread to 1
$sql = "UPDATE messageboard SET isread='1' WHERE id='$id'";
$conn->exec($sql);

// output message 
echo $stm['message'];
?>
