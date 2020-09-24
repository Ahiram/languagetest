<?php

require('../app/_parts/_header.php');
?>
      <div>
        <ul>
        <?php 
        if (($handle = fopen(FILENAME, "r")) !== false){
          while (($line = fgetcsv($handle, 1000, "|")) !== false) {
            ?>
            <li><?= $line[0]." | ".$line[1]." | ".$line[2]; ?></li>
          <?php }
        }?>
        </ul>
      </div>
    </div>
  </div>
  <script src="js/main.js"></script>

<?php

require('../app/_parts/_footer.php');