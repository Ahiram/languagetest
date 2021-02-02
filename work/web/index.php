<?php

require('../app/_parts/_headerlogin.php');
require('../app/functions.php');
createToken()
?>
      <div>
        <h1>Login</h1>
        <?= $_SERVER["DOCUMENT_ROOT"] ?>
        <form action="../web/index2.php" method="POST">
          <label for="username"><p>User</p></label>
          <input type="text" id="username" name="username">
          <label for="password"><p>Password</p></label>
          <input type="text" id="password" name="password">
          <button>Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="../js/main.js"></script>

<?php

require('../app/_parts/_footer.php');