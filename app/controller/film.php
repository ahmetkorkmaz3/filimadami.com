<?php

if(isset($_url[2])) {
  if($_url[2] == "nowatched") {
    add_nowatched_list($_url[1]);
    redirect('film/' . $_url[1]);
  }
  elseif($_url[2] == "watched") {
    add_watched_list($_url[1]);
    redirect('film/' . $_url[1]);
  }
  elseif($_url[2] == "like") {
    like($_url[1]);
    redirect('film/' . $_url[1]);
  }
  elseif($_url[2] == "unlike") {
    unlike($_url[1]);
    redirect('film/' . $_url[1]);
  }
}

if($_url[1]) {
  $film_id = $_url[1];
  $film_bilgileri = film_bilgileri($film_id);
  $film_turu = film_turu($film_bilgileri["type"]);
  $kullanici_izleme_durumu = check_watched_list($film_id);
  $like_count = like_count($film_id);
  $like_people = like_people($film_id);
  if(isset($_SESSION["signin"])) {
    $uye = uyelik_bilgileri($_SESSION["signin"]);
    $survey_answer = survey_answer($_SESSION["signin"], $_url[1]);
  }

  /* Yorum İşlemleri */

  $ana_yorumlar = ana_yorumlar($_url[1]);

  if($_POST) {
    $member_id = $_SESSION["signin"];
    $movie_id = $_url[1];
    if($_POST["anketGonder"]) {
      $answer = post('anket');
      survey($member_id, $movie_id, $answer);
      redirect('film/' . $_url[1]);
    } else {
      $major = post('major');
      $comment = post('comment');

      yorum_ekle($member_id, $movie_id, $major, $comment);
      redirect('film/' . $_url[1]);
    }
  }


  if($film_bilgileri) {
    $title = $film_bilgileri["name"];
    include view('static/header');
    include view('film');
    include view('static/footer');
    } else {
      redirect();
    }
  } else {
    redirect();
}
