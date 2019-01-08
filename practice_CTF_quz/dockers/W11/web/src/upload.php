<?php
if ($_FILES["file"]["error"] > 0){
$result = "Error: " . $_FILES["file"]["error"];
}else{
$result = "filename:" . $_FILES["file"]["name"]."<br/>";
$result = "filetype " . $_FILES["file"]["type"]."<br/>";
$result = "filesize: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
$result = "tempname: " . $_FILES["file"]["tmp_name"];
if (file_exists("upload/" . $_FILES["file"]["name"])){
$result = "sessus upload";}
else{
move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
}
header('Location:'."upload/".$_FILES["file"]["name"]);
echo $result;
exit;
}
?>
