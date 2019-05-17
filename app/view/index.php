
    <div class="container">

      <div class="box">
        <h1>Vizyondakiler</h1>

        <?php
        if($filmler->rowCount()) {
          foreach ($filmler as $film_item) {
        ?>

        <div class="vizyon-movie">
          <a href="<?php echo base_url('film/'.$film_item["id"]);  ?>">
            <img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $film_item["movie_image"]; ?>">
            <p><?php echo $film_item["name"]; ?></p>
          </a>
        </div>

        <?php
          }
        }
        ?>

      </div>

      <div class="box">
        <h1 class="display-inline">LİSTELER</h1>
        <a href="<?php echo base_url('listeler'); ?>" class="display-inline">Tüm Listeler</a>

        <div class="clear"></div>
        <?php
        if($listeler->rowCount()) {
          foreach ($listeler as $list_item) {
        ?>
        <div class="list">
          <a href="#">
            <img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $list_item["list_image"]; ?>">
            <p><?php echo $list_item["list_name"] ?></p>
          </a>
        </div>
        <?php
          }
        }

        ?>

      </div>
    </div>
