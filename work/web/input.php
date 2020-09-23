<?php

require('../app/_parts/_header.php');

?>
      <div>
        <h1>入力</h1>
        <form action="../app/data.php" method="POST">
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