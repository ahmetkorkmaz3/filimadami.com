<div class="container">
  <div class="box">

    <h1>LİSTELER</h1>

    <?php

    if($liste->rowCount()) {
      foreach ($liste as $liste_bilgileri) {
    ?>

    <div class="lists-item">
      <img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $liste_bilgileri["list_image"]; ?>">
      <a href="<?php echo base_url('liste'); ?>"><?php echo $liste_bilgileri["list_name"]; ?></a>
    </div>

    <?php
      }
    }
    ?>
  </div>
</div>
