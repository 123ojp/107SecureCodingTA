<?php
  //session_start(); <- can you open session without this?
  include("config.php");
  highlight_file(__FILE__);
  $_ = @$_GET['fox'];
  if (is_file("/tmp/sess_".$_)){
    echo $flag;
  }
?>
