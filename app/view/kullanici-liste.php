<div class="container">
  <div class="box">
    <h3><?php echo $title; ?></h3>

    <div class="orderby">
      <ul>
        <li>
          <a href="#">YIL</a>
        </li>
        <li>
          <a href="#">SÜRE</a>
        </li>
        <li>
          <a href="#">PUAN</a>
        </li>
      </ul>
    </div>

    <div class="movie-content">

      <?php

      if($filmler->rowCount()) {
        foreach ($filmler as $film_item) {
      ?>

      <div class="movie-content-item">
        <a href="<?php echo base_url('film/'.$film_item["id"]);  ?>">
          <img src="<?php echo BASE_URL; ?>/assets/images/movie-poster/<?php echo $film_item["movie_image"]; ?>">
        </a>
        <a href="<?php echo base_url('film/'.$film_item["id"]);  ?>"><?php echo $film_item["name"]; ?><a>
        <div class="item-box">
          10 ay önce
        </div>
      </div>

      <?php
        }
      }
      ?>

    </div>
  </div>
</div>
