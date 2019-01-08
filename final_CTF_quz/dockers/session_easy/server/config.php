<?php
function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$flag = "CTF{SesSPFOSDOFOSDOFOODOOOOiOO".getRandomWord(5)."KAFKAFKKLASLKF".getRandomWord(2)."youkNow}";

?>
