<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function datacontain()
{
  $word=h(filter_input(INPUT_POST, 'word'));
  $sentence=h(filter_input(INPUT_POST, 'sentence'));
  $jp=h(filter_input(INPUT_POST, 'jp'));
  
  $filename = '../data/data.csv';
  
  $fp = fopen($filename,'a');
  fwrite($fp, $word."|". $sentence. "|". $jp . "\n");
  fclose($fp);
}