    <div class="container">

      <div class="content-left">

        <div class="box">

          <h1><?php echo $film_bilgileri["name"]; ?></h1>
          <p>1994</p>

          <div class="clear"></div>

          <div class="movie-img">
            <img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $film_bilgileri["movie_image"]; ?>">
          </div>

          <div class="movie-information">
            <div class="item">
              <p class="key">Vizyon Tarihi</p>
              <p class="value"><?php echo $film_bilgileri["vision_date"]; ?></p>
            </div>

            <div class="item">
              <p class="key">Süre</p>
              <p class="value"><?php echo $film_bilgileri["time"] ?></p>
            </div>

            <div class="item">
              <p class="key">Tür</p>
              <?php
              foreach ($film_turu as $item) {
              ?>
                <a href="<?php echo base_url('filmler/'.$item["type_id"]); ?>" class="value">
                  <?php echo $item["type_name"] . " "; ?>
                </a>
              <?php } ?>
            </div>

            <div class="item">
              <p class="key">Ülke</p>
              <a href="#" class="value"><?php echo $film_bilgileri["country_name"] ?></a>
            </div>

            <div class="item">
              <p class="key">Senaristler</p>
              <p class="value"><?php echo $film_bilgileri["scriptwriter"] ?></p>
            </div>

            <div class="item">
              <p class="key">Yönetmen</p>
              <p class="value"><?php echo $film_bilgileri["director"] ?></p>
            </div>
          </div>

          <div class="clear"></div>

          <div class="subject">
            <h3>KONUSU</h3>
            <p><?php echo $film_bilgileri["subject"] ?></p>

          </div>

          <div class="clear"></div>
        </div>

      </div>

      <div class="content-right">

        <div class="box">
        <?php
          if(isset($_SESSION["signin"])) {
        ?>

        <div class="movie-sidebar">

          <div class="sidebar-item <?php $check = check_watched_list($film_bilgileri["id"]); if($check == 0) { echo "sidebar-item-check"; } ?>">
            <a href="<?php echo base_url('film/'.$film_bilgileri["id"].'/nowatched'); ?>">
              <i class="fas fa-plus-circle"></i> İzleme Listeme Ekle
            </a>
          </div>

          <div class="sidebar-item <?php $check = check_watched_list($film_bilgileri["id"]); if($check == 1) { echo "sidebar-item-check"; } ?>">
            <a href="<?php echo base_url('film/'.$film_bilgileri["id"].'/watched'); ?>">
              <i class="fas fa-check-circle"></i> İzledim!
            </a>
          </div>

          <div class="sidebar-item sidebar-light">
            <p>Beğeni Sayısı : <?php if(isset($like_count)) { echo $like_count->rowCount(); } ?></p>
            <?php
            if($like_people->rowCount()) {
              foreach ($like_people as $person) {
            ?>
            <a href="<?php echo base_url('profil/' . $person["id"]); ?>" class="like-person"><?php echo $person["kAdi"] . ","; ?></a>
            <?php
              }
            }

            ?>
          </div>

          <div class="sidebar-item <?php if(liked($film_bilgileri["id"])) { echo "sidebar-item-check"; } ?>">
            <a href="<?php echo base_url('film/'.$film_bilgileri["id"].'/like'); ?>">
              <i class="fas fa-check-circle"></i> Beğen!
            </a>
          </div>

          <div class="sidebar-item">
            <a href="<?php echo base_url('film/'.$film_bilgileri["id"].'/unlike'); ?>">
              <i class="fas fa-check-circle"></i> Beğenmekten vazgeç!
            </a>
          </div>
        </div>

        <?php
          }
        ?>

        </div>

        <div class="null-box">
        <?php
          if(isset($_SESSION["signin"])) {
            if($survey_answer) {
              if($survey_answer["answer"] == 1) {
                echo "Bu ankete evet oyunu kullandınız.";
              } else {
                echo "Bu ankete hayır oyunu kullandınız.";
              }
            } else {
        ?>
          <form action="<?php echo base_url('film/' . $film_bilgileri["id"]); ?>" method="POST">
            <p>Filmi arkadaşlarınıza önerir misiniz ?</p>
            <input type="radio" name="anket" value="1" checked> Evet
            <input type="radio" name="anket" value="0"> Hayır
            <input class="anket" type="submit" name="anketGonder" value="Oyla">
          </form>

        <?php
          }
            }
        ?>

      </div>



      </div>
    </div>
    <div class="clear"></div>


    <div class="container">
      <div class="box comment">
        <h3>YORUMLAR</h3>

        <?php
        if($ana_yorumlar->rowCount()) {
          foreach ($ana_yorumlar as $yorum) {
        ?>

        <div class="comment-box">
          <div class="comment-author">
            <a href="#">
              <img src="<?php echo BASE_URL; ?>upload/profile/<?php echo $yorum["user_image"]; ?>">
            </a>
            <div class="author-text">
              <a href="<?php echo base_url('profil/' . $yorum["id"]); ?>">@<?php echo $yorum["kAdi"]; ?></a>
              <p>05 Aralık 2017'de yazdı.</p>
            </div>
          </div>
          <div class="comment-text">
            <p><?php echo $yorum["comment"]; ?></p>
          </div>
        </div>
        <?php

          $alt_yorum = alt_yorumlar($_url[1], $yorum["comment_id"]);
          if($alt_yorum->rowCount()) {
            foreach ($alt_yorum as $key) {
        ?>
        <div class="comment-minor">
          <div class="comment-author">
            <a href="#">
              <img src="<?php echo BASE_URL; ?>upload/profile/<?php echo $yorum["user_image"]; ?>">
            </a>
          </div>
          <div class="minor-comment">
            <a href="<?php echo base_url('profil/' . $key["id"]); ?>">@<?php echo $key["kAdi"]; ?></a>
            <p><?php echo $key["comment"]; ?></p>
          </div>
        </div>

        <?php
            }
          }
        if(isset($_SESSION["signin"])) {
        ?>
        <div class="comment-add comment-left">
          <form action="<?php echo base_url('film/' . $film_bilgileri["id"]); ?>" method="POST">
            <input type="hidden" name="major" value="<?php echo $yorum["comment_id"]; ?>">
            <img src="<?php echo BASE_URL; ?>upload/profile/<?php echo $uye["user_image"]; ?>">
            <div class="write">
              <textarea class="minor-textarea" name="comment" rows="2" cols="80" placeholder="Yorum yazınız.."></textarea>
            </div>
            <div class="clear"></div>
            <div class="buttons">
              <input type="submit" value="GÖNDER">
            </div>
          </form>
        </div>
        <?php
          }

          }
        }
        ?>


        <?php
          if(isset($_SESSION["signin"])) {
        ?>
        <h1>Filme Yorum Yap</h1>
        <div class="comment-add">
          <form action="<?php echo base_url('film/' . $film_bilgileri["id"]); ?>" method="POST">
            <input type="hidden" name="major" value="0">
            <img src="<?php echo BASE_URL; ?>upload/profile/<?php echo $uye["user_image"]; ?>">
            <div class="write">
              <textarea name="comment" rows="4" cols="80" placeholder="Yorum yazınız.."></textarea>
            </div>
            <div class="clear"></div>
            <div class="buttons">
              <input type="submit" value="GÖNDER">
            </div>
          </form>
        </div>
        <?php } ?>
      </div>
    </div>
