<?php

$filmler = son_bes_film();
$listeler = son_bes_liste();

if(!isset($_SESSION["signin"])) {
  if(isset($_COOKIE["username"]) && isset($_COOKIE["userpass"])) {
    $member_name = $_COOKIE["username"];
    $member_pass = $_COOKIE["userpass"];

    $sorgu = $db->query("SELECT * FROM members WHERE kAdi = '{$member_name}' AND sifre = '{$member_pass}'")->fetch(PDO::FETCH_ASSOC);
    if($sorgu) {
      $_SESSION["signin"] = $sorgu["id"];
      $_SESSION["signin_user"] = $sorgu["kAdi"];
    }
  }
}

if($filmler && $listeler) {
  include view('static/header');
  include view('index');
  include view('static/footer');
} else {
  echo "hata";
}
