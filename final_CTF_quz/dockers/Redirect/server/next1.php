<?php
  header("Location: index.php");
  function getRandomWord($len = 10) {
      $word = array_merge(range('a', 'z'), range('A', 'Z'));
      shuffle($word);
      return substr(implode($word), 0, $len);
  }
  $flag = "CTF{LoOoO".getRandomWord(6)."OOO".getRandomWord(6)."OPPPPP}";
  echo $flag;
?>
