<?php

  if(isset($_SESSION["signin"])) {
    redirect();
  }

  if(isset($_COOKIE["username"]) && isset($_COOKIE["userpass"])) {
    $member_name = $_COOKIE["username"];
    $member_pass = $_COOKIE["userpass"];

    $sorgu = $db->query("SELECT * FROM members WHERE kAdi = '{$member_name}' AND sifre = '{$member_pass}'")->fetch(PDO::FETCH_ASSOC);
    if($sorgu) {
      $_SESSION["signin"] = $sorgu["id"];
      $_SESSION["signin_user"] = $sorgu["kAdi"];
      redirect();
    }
  }

  if($_POST) {
    global $db;
    $kullanici_adi = post('kullanici_adi');
    $sifre = post('sifre');
    if(!empty($kullanici_adi) && !empty($sifre)) {
      $sorgu = $db->query("SELECT * FROM members WHERE kAdi = '{$kullanici_adi}' AND sifre = '{$sifre}' ")->fetch(PDO::FETCH_ASSOC);
      if($sorgu) {
        $_SESSION["signin"] = $sorgu["id"];
        $_SESSION["signin_user"] = $sorgu["kAdi"];
        if(post('beni_hatirla')) {
          setcookie('username', $kullanici_adi, time() + (60 * 60 * 240));
          setcookie('userpass', $sifre, time() + (60 * 60 * 240));
        }
        redirect();
      } else {
        $hata = "Kullanıcı adı veya şifre hatalı";
      }
    }
  }

  $title = 'Giriş Yap';

  include view('static/header');
  include view('giris');
  include view('static/footer');
