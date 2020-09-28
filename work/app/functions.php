<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function createToken() {
  if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }
}

function validateToken() {
  if (
    empty($_SESSION['token']) ||
    $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
  ) {
    exit('Invalid post request');
  }
}

function validatepass(){
  if (
    USERNAME !== filter_input(INPUT_POST, 'username') ||
    PASSWORD !== filter_input(INPUT_POST, 'password')
  ) {
    exit('Invalid Login');
  }
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

session_start();