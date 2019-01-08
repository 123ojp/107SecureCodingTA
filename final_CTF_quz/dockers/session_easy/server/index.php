<?php
  session_start();
  include("config.php");
  highlight_file(__FILE__);
  $_ = @$_GET['fox'];
  if (is_file("/tmp/sess_".$_)){
    echo $flag;
  }
?>
