<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  validateToken();
  $deleteword=filter_input(INPUT_POST, 'deleteword');
  $newdata=[];
  $i=1;
  $fp = fopen(FILENAME,'r');
  if ($fp !== false){
    while (($line = fgetcsv($fp, 1000, "|")) !== false) {
      if ($line[1] !== $deleteword){
        $newdata[]=[$i,$line[1],$line[2],$line[3],$line[4],$line[5]];
        $i+=1;
      }
    }
  }
  fclose($fp);

  $fp = fopen(FILENAME, 'w');
  foreach ($newdata as $newdatum){
    fwrite($fp, $newdatum[0]."|".$newdatum[1]."|".$newdatum[2]."|".$newdatum[3]."|".$newdatum[4]."|".$newdatum[5]."\n");
  }
  fclose($fp);

  header('Location: http://localhost:8080/web/list.php');
  exit;
}

createToken()

?>
      <div id=lists>
        <h1>単語リスト</h1>
          <ul>
          <?php 
          $oplines=[];
          if (($fp = fopen(FILENAME, "r")) !== false || count(file(FILENAME)) !==0){
            while (($line = fgetcsv($fp, 1000, "|")) !== false) {
              $oplines[]='<option value="'.$line[0].'">'.$line[0].'</option>';
              ?>
              <li><?= $line[0]."   |   ".$line[1]."   |   ".$line[2]; ?></li>
            <?php
            }
          fclose($fp);
          }
          ?>
          </ul>
        <form action="" method="POST">
          <input type="text" name="deleteword">
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          <button>delete</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>

<?php

require('../app/_parts/_footer.php');