<?php
session_start();
if (isset($_SESSION['ww'])){
	$_SESSION['ww']+=1;
	if ($_SESSION['ww']>3){
		echo "WOW3";
	}
} else{
	$_SESSION['ww']=1;
}
?>

