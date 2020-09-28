<?php
define('USERNAME', 'ahiram');
define('PASSWORD', 'ahipass');
require('../app/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  validatepass();
} else{
  exit ('Invalid Login');
}

require('../app/_parts/_header.php');

?>
      <div>
        <h1>Top</h1>
      </div>
    </div>
  </div>
  <script src="../js/main.js"></script>

<?php

require('../app/_parts/_footer.php');