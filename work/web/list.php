<?php

require('../app/_parts/_header.php');
$fp = fopen(FILENAME,'r');
$data=fgetcsv($fp, "|")

?>
      <div>
        <ul>
        <?php foreach ($data as $datum): ?>
          <li><?= $datum; ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>

<?php

require('../app/_parts/_footer.php');