<div class="container">

  <div class="profile-cover">

    <div class="cover-img">
    </div>

    <div class="cover-info">
      <div class="cover-info-left">
        <a href="">
          <img src="<?php echo BASE_URL; ?>upload/profile/<?php echo $uye["user_image"]; ?>">
        </a>
        <h3><?php echo $uye["kAdi"] ?></h3>
      </div>
      <div class="cover-info-right">
        <div class="info-item">
          <p class="blue">2</p>
          <p>Takipçi</p>
        </div>
        <div class="info-item">
          <p class="blue">5</p>
          <p>Takip Ettikleri</p>
        </div>
      </div>

      <div class="profile-img">

      </div>
    </div>

  </div>

  <div class="clear"></div>

  <div class="profile-sidebar">
    <div class="box">
      <ul>
        <li>
          <a href="#">
            <i class="fas fa-plus-circle"></i> İzledikleri:
            <span class="count"><?php if($member_watched_list->rowCount()) { echo $member_watched_list->rowCount(); } ?></span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-list-ul"></i> İzleme Listesi:
            <span class="count"><?php if($member_nowatched_list->rowCount()) { echo $member_nowatched_list->rowCount(); } ?></span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="profile-content">
    <div class="box">
      <?php
      if($member_watched_list->rowCount()) {
      ?>
      <div class="profile-title">
        <h3>İZLEDİKLERİ</h3>
        <a href="<?php echo base_url('kullanici-liste/izlenen'); ?>">Tümünü Gör</a>
      </div>

      <div class="profile-movie">
      <?php
        foreach ($member_watched_list as $film) {
      ?>
      <div class="profile-movie-item">
        <a href="<?php echo base_url('film/'.$film["id"]);  ?>"><img src="<?php echo BASE_URL; ?>assets/images/movie-poster/<?php echo $film["movie_image"]; ?>"></a>
        <a href="<?php echo base_url('film/'.$film["id"]);  ?>"><?php echo $film["name"]; ?></a>
      </div>
      <?php
        }

      ?>
      </div>

      <hr/>
      <?php } ?>
      <?php
      if($member_nowatched_list->rowCount()) {
      ?>
      <div class="profile-title">
        <h3>İZLEME LİSTESİ</h3>
        <a href="<?php echo base_url('kullanici-liste/izleme'); ?>">Tümünü Gör</a>
      </div>

      <div class="profile-movie">
        <?php
          foreach ($member_nowatched_list as $film) {
        ?>
        <div class="profile-movie-item">
          <a href="<?php echo base_url('film/'.$film["id"]);  ?>"><img src="<?php echo BASE_URL; ?>assets/images/movie-poster/<?php echo $film["movie_image"]; ?>"></a>
          <a href="<?php echo base_url('film/'.$film["id"]);  ?>"><?php echo $film["name"]; ?></a>
        </div>
        <?php
          }
        ?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
