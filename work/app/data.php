<?php

require('../app/_parts/_header.php');
require('../app/functions.php');


$word=h(filter_input(INPUT_POST, 'word'));
$sentence=h(filter_input(INPUT_POST, 'sentence'));
$jp=h(filter_input(INPUT_POST, 'jp'));

$fp = fopen(FILENAME,'a');
fwrite($fp, $word."|". $sentence. "|". $jp . "\n");
fclose($fp);

?>

<?php
  header('Location:http://localhost:8080/web/index.php');
  exit;

require('../app/_parts/_footer.php');