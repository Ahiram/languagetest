<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $word=h(filter_input(INPUT_POST, 'word'));
  $sentence=h(filter_input(INPUT_POST, 'sentence'));
  $jp=h(filter_input(INPUT_POST, 'jp'));

  $fp = fopen(FILENAME,'a');
  fwrite($fp, $word."|". $sentence. "|". $jp . "\n");
  fclose($fp);
} else{
  exit('Invalid Request');
}
?>

<?php
require('../app/_parts/_footer.php');