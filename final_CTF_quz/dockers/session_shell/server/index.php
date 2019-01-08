<?php
  session_start();
  highlight_file(__FILE__);
  $_ = @$_GET['fox'];
  $_SESSION["fox"] = @$_GET['foxs'];
  @include($_);
?>
