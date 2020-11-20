<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateToken();
  
  $word=h(filter_input(INPUT_POST, 'word'));
  $sentence=h(filter_input(INPUT_POST, 'sentence'));

  $fp = fopen(FILENAME,'a');
  $n=count(file(FILENAME))+1;
  fwrite($fp, $n."|".$word."|".$sentence."|0|0|".strtotime("now")."\n");
  fclose($fp);
  header('Location: http://localhost:8080/web/list.php');
  exit;
}

createToken()

?>
      <div>
        <h1>入力</h1>
        <form action="" method="POST">
          <label for="word"><p>Word</p></label>
          <input type="text" name="word">
          <label for="sentence"><p>Sentence</p></label>
          <input type="text" name="sentence">
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          <button>OK</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
<?php

require('../app/_parts/_footer.php');