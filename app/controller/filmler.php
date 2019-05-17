<?php

$turler = butun_turler();
$ulkeler = butun_ulkeler();

if(isset($_url[2])) {
  if($_url[2] == "nowatched") {
    add_nowatched_list($_url[1]);
    redirect('filmler');
  }
  elseif($_url[2] == "watched") {
    add_watched_list($_url[1]);
    redirect('filmler');
  }
}

if(isset($_url[1])) {
  $film = belirli_tur_film($_url[1]);
  $tur_name = tur_isim_bulma($_url[1]);
} else {
  $film = butun_filmler();
}

include view('static/header');
include view('filmler');
include view('static/footer');
