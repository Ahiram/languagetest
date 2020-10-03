<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  validateToken();
  $ids=filter_input(INPUT_POST, 'ids', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
  if (empty($ids) === True);
    header('Location: http://localhost:8080/web/list.php');
    exit;
  $newdata=[];
  $i=1;
  $fp = fopen(FILENAME,'r');
  if ($fp !== false){
    while (($line = fgetcsv($fp, 1000, "|")) !== false) {
      if (in_array($line[0], $ids) !== False){
        $newdata[]=[$i,$line[1],$line[2]];
        $i+=1;
      }
    }
  }
  fclose($fp);

  $fp = fopen(FILENAME, 'w');
  fwrite($fp, $n."|".$word."|".$sentence."\n");
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
          <select name="ids[]" multiple id="selectbox">
          <?php
          foreach($oplines as $opline){
            echo $opline;
            echo "<br>";
          }
          ?>
          </select>
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          <button>delete</button>
        </form>
        <?= var_dump($ids) ?>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>

<?php

require('../app/_parts/_footer.php');