<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/lib/fontawesome.7.2-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/main.css">

    <link rel="shortcut icon" type="image/png" href="<?php echo BASE_URL; ?>/assets/images/icons/sinefil.png"/>

    <title>Sinefil.com <?php if(!empty($title)){echo ' - ' . $title; } ?></title>
  </head>
  <body>

  <div class="header">

    <div class="container">

      <div class="logo">
        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/assets/images/logo.svg"></a>
      </div>

      <div class="search-bar">
        <form action="<?php echo base_url('ara'); ?>" method="GET">
          <i class="fas fa-search"></i>
          <input type="search" name="search" placeholder="Filmler, Diziler, Aktörler ve daha fazlasını ara!">
        </form>
      </div>

      <div class="login">
        <?php
          if(isset($_SESSION["signin"])) {
        ?>
          <a href="<?php echo base_url('profil/' . $_SESSION["signin"]); ?>">Merhaba, <?php echo $_SESSION["signin_user"]; ?></a> <a href="<?php echo base_url('cikis'); ?>"><i class="fas fa-sign-out-alt"></i></a>
        <?php
          } else {
        ?>
          <a href="<?php echo base_url('giris'); ?>"><i class="fas fa-lock"></i> ÜYE GİRİŞİ</a>
        <?php
          }
        ?>
      </div>
    </div>
  </div>

  <div class="navbar">
    <div class="container">
      <div class="dropdown">
        <button class="dropbtn">
          <i class="fas fa-film"></i>
          FİLMLER
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="<?php echo base_url('filmler'); ?>">Bütün Filmler</a>
          <a href="#">Yeni Eklenenler</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">
          <i class="fas fa-tv"></i>
          DİZİLER
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">Mini Diziler</a>
          <a href="#">Duyurulanlar</a>
        </div>
      </div>

      <a href="#"><i class="fas fa-bullhorn"></i> HABERLER</a>
      <a href="#"><i class="fas fa-clock"></i> SEANSLAR</a>
      <a href="<?php echo base_url('listeler'); ?>"><i class="fas fa-list-alt"></i> LİSTELER</a>
      <a href="#"><i class="fas fa-pencil-alt"></i> SİNEKRİTİK</a>
      <a href="#"><i class="fas fa-comment"></i> FORUM</a>

    </div>
  </div>
