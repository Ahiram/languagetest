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
  header('Location: http://localhost:8080/web/list.php');
    exit;
}


?>
      <div>
        <h1>入力</h1>
        <form action="" method="POST">
          <label for="word"><p>Word</p></label>
          <input type="text" name="word">
          <label for="sentence"><p>Sentence</p></label>
          <input type="text" name="sentence">
          <label for="jp"><p>和訳</p></label>
          <input type="text" name="jp">
          <button>OK</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>
<?php

require('../app/_parts/_footer.php');