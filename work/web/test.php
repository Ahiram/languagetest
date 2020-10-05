<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  validateToken();
  $ids = filter_input(INPUT_POST, 'ids', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
  $ids = empty($ids) ? [] : $ids;
  $newdata=[];
  $fp = fopen(FILENAME,'r');
  
  if ($fp !== false){

    while (($line = fgetcsv($fp, 1000, "|")) !== false) {
      if (in_array($line[0],$ids,true) === true){
        $newdata[]=[$line[0],$line[1],$line[2],$line[3]+1,$line[4]+1,strtotime("now")];
      } else {
        $newdata[]=[$line[0],$line[1],$line[2],$line[3],$line[4]+1,$line[5]];
      }
    }
  }
  
  fclose($fp);

  $fp = fopen(FILENAME, 'w');
  foreach ($newdata as $newdatum){
    fwrite($fp, $newdatum[0]."|".$newdatum[1]."|".$newdatum[2]."|".$newdatum[3]."|".$newdatum[4]."|".$newdatum[5]."\n");
  }
  fclose($fp);
}
createToken()

?>
      <div>
        <?php 
          $testlists=[];
          if (($fp = fopen(FILENAME, "r")) !== false || count(file(FILENAME)) !==0){
            while (($line = fgetcsv($fp, 1000, "|")) !== false) {
              if ($line[3] <= $line[4]*0.85){
                $testlists[]='<label><input type="checkbox" name="ids[]" value="'.$line[0].'">'.$line[2].'</label>';
              } elseif ((strtotime("now")-$line[5])/86400>=30) {
                $testlists[]='<label><input type="checkbox" name="ids[]" value="'.$line[0].'">'.$line[2].'</label>';
              } else {
                continue;
              }
            }
          }
          fclose($fp);
        ?>
        
        <form action="" method="POST">
          <ul id =test>
          <?php
          foreach ($testlists as $test){
            ?>
            <li><?= $test; ?></li>
          <?php
          }
          ?>
          </ul>
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          <button>send</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
<?php

require('../app/_parts/_footer.php');