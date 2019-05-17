<?php

if(isset($_url[1])) {
  $member_id = $_SESSION["signin"];
  if($_url[1] == "izlenen") {
    $filmler = member_watched_list($member_id);
    $title = "İZLEDİKLERİ";
  }
  elseif($_url[1] == "izleme") {
    $filmler = member_nowatched_list($member_id);
    $title = "İZLENECEK";
  }
  include view('static/header');
  include view('kullanici-liste');
  include view('static/footer');
}
