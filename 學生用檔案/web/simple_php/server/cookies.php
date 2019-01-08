<?php
setcookie("TestCookie","wow");
if(isset($_COOKIE["TestCookie"])){
	echo $_COOKIE["TestCookie"];
}
?>
