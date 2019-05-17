<div class="movie-list-header">
    <div class="container">
      <div class="box">
        <h1><?php if(isset($tur_name)) { echo strtoupper($tur_name) . " Türü Filmler"; } else { echo "Bütün Filmler"; } ?></h1>
        <p><?php if($film->rowCount()) { echo $film->rowCount(); } ?> adet sonuç bulundu.</p>
      </div>
    </div>
  </div>

  <div class="movie-list-sidebar">
    <div class="container">

      <div class="container-md-4">
        <div class="box">

          <div class="movie-list-sidebar-item">
            <h3>TÜRLER</h3>
            <ul>
              <?php
              if($turler->rowCount()) {
                foreach ($turler as $tur_item) {
                $link = "filmler/";
                if(get("yil")){
                  $link .= "?yil=" . get("yil");
                }
                if(get("ulke")){
                  if(get("yil")){
                    $link .= "&ulke=" . get("ulke");
                  }else{
                    $link .= "?ulke=" . get("ulke");
                  }
                }
                if(get("yil") || get("ulke")){
                    $link .= "&tur=" . $tur_item["type_id"];
                }else{
                    $link .= "?tur=" . $tur_item["type_id"];
                }
              ?>
              <li><a href="<?php echo base_url($link); ?>"><?php echo $tur_item["type_name"]; ?></a></li>
              <?php
                }
              }
              ?>
            </ul>

            <h3>ÜLKELER</h3>
            <ul>
              <?php
              if($ulkeler->rowCount()) {
                foreach ($ulkeler as $ulkeler_item) {
                  $link = "filmler/";
                  if(get("yil")){
                    $link .= "?yil=" . get("yil");
                  }
                  if(get("tur")){
                    if(get("yil")){
                      $link .= "&tur=" . get("tur");
                    }else{
                      $link .= "?tur=" . get("tur");
                    }
                  }
                  if(get("yil") || get("tur")){
                      $link .= "&ulke=" . $ulkeler_item["country_id"];
                  }else{
                      $link .= "?ulke=" . $ulkeler_item["country_id"];
                  }
              ?>
              <li><a href="<?php echo base_url($link); ?>"><?php echo $ulkeler_item["country_name"]; ?></a></li>
              <?php
                }
              }
              ?>
            </ul>

            <h3>YIL</h3>
            <form action="<?php echo base_url($link); ?>" method="get">
              <input type="number" max="2025" min="1930"  name="yil" <?php if(get("yil")){echo 'value="'.get("yil").'"';} ?> >
              <input type="submit" style="display:none">
              <?php if(get("tur")){ echo '<input type="hidden" name="tur" value="'.get("tur").'">'; } ?>
              <?php if(get("ulke")){ echo '<input type="hidden" name="ulke" value="'.get("ulke").'">'; } ?>
            </form>
          </div>

        </div>
      </div>

      <div class="container-md-8">
        <div class="box">
          <?php

          if($film->rowCount()) {
            foreach ($film as $film_item) {

              $film_turu = film_turu($film_item["type"]);
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
                <div class="movie-info-item">
                  <strong>Tür</strong>
                  <?php
                  foreach ($film_turu as $key) {
                  ?>
                  <a href="<?php echo base_url('filmler/'.$key["type_id"]); ?>" class="value">
                        <?php echo $key["type_name"] . " "; ?>
                  </a>
                  <?php
                  }
                  ?>
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
