<?php

require('../app/_parts/_header.php');
require('../app/functions.php');

?>
      <div>
        <h1>Login</h1>
        <form action="php/process.php" method="POST">
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