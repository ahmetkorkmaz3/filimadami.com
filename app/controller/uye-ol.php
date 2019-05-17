<?php

  if($_POST) {
    global $db;
    $ad = post('ad');
    $soyad = post('soyad');
    $kullanici_adi = post('kullanici_adi');
    $email = post('email');
    $sifre = post('sifre');
    $sifre_tekrar = post('sifre_tekrar');

    if(isset($kullanici_adi) && isset($sifre) && isset($ad) && isset($soyad) && isset($email)) {
      if($sifre == $sifre_tekrar) {

        $sorgu = $db->query("SELECT kAdi, ePosta FROM members WHERE kAdi = '{$kullanici_adi}' OR ePosta = '{$email}' ")->fetch(PDO::FETCH_ASSOC);
        if($sorgu) {
          $hata = "bu kullanıcı adı veya eposta zaten kullanılıyor.";
        } else {
          $sorgu = $db->prepare("INSERT INTO members SET kAdi = ?, ad = ?, soyad = ?, ePosta = ?, sifre = ?");
          $insert = $sorgu->execute(array(
            $kullanici_adi, $ad, $soyad, $email, $sifre
          ));
          if($insert) {
            $_SESSION["signin"] = $db->lastInsertId();
            $_SESSION["signin_user"] = $kullanici_adi;
            redirect();
          } else {
            $hata = ":Kayıt olamadınız.";
          }
        }
      } else {
        $hata = "Şifreler uyumsuz";
      }
    } else {
      $hata = "Lütfen boş alan bırakmayınız.";
    }
  }

  $title = 'Üye Ol';

  include view('static/header');
  include view('uye-ol');
  include view('static/footer');
