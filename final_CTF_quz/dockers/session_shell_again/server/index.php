<?php
  session_start();
  highlight_file(__FILE__);
  $_ = @$_GET['fox'];
  $_SESSION[session_id()] = 1; // -> 特殊符號88
  @include($_);
?>
