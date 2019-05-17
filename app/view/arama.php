<div class="movie-list-header">
    <div class="container">
      <div class="box">
        <h1><?php echo get('search'); ?> araması sonuçları</h1>
        <p><?php if($film->rowCount()) { echo $film->rowCount(); } ?> adet sonuç bulundu.</p>
      </div>
    </div>
  </div>

  <div class="movie-list-sidebar">
    <div class="container">

      <div class="container-md-8">
        <div class="box">
          <?php
          if($film->rowCount()) {
            foreach ($film as $film_item) {
          ?>

          <div class="list-movie-item">

            <div class="movie-list-img">
              <a href="<?php echo base_url('film/'.$film_item["id"]); ?>"><img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $film_item["movie_image"]; ?>"></a>
            </div>
            <?php

            if(isset($_SESSION["signin"])) {

            ?>

            <div class="movie-list-check">
              <a href="<?php echo base_url('filmler/'.$film_item["id"].'/nowatched');?>" class="<?php $check = check_watched_list($film_item["id"]); if($check == 0) { echo "check-item"; } ?>">
                <i class="fas fa-plus-circle"></i>
              </a>
              <a href="<?php echo base_url('filmler/'.$film_item["id"].'/watched');?>" class="<?php $check = check_watched_list($film_item["id"]); if($check == 1) { echo "check-item"; } ?>">
                <i class="fas fa-check-circle"></i>
              </a>
            </div>

            <?php

            }

            ?>
            <div class="movie-list-info">
              <div class="movie-title">
                <a href="<?php echo base_url('film/'.$film_item["id"]); ?>"><h4><?php echo $film_item["name"]; ?></h4></a>
                <p><?php echo $film_item["date"]; ?></p>
              </div>
              <div class="movie-info">
                <div class="movie-info-item">
                  <strong>Vizyon Tarihi</strong>
                  <p class="value"><?php echo $film_item["vision_date"]; ?></p>
                </div>
                <div class="movie-info-item">
                  <strong>Süre</strong>
                  <p class="value"><?php echo $film_item["time"]; ?></p>
                </div>
              </div>
            </div>
            <div class="movie-list-subject">
              <p><?php echo $film_item["subject"]; ?></p>
            </div>
          </div>

          <?
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
