<?php

function liked($movie_id){
  global $db;
  $member_id = $_SESSION["signin"];

  $sorgu = $db->query("SELECT * FROM liked WHERE movie_id = '{$movie_id}' AND member_id = '{$member_id}'")->fetch(PDO::FETCH_ASSOC);
  if($sorgu) {
    return $sorgu;
  }
  return false;
}

function like_count($movie_id) {
  global $db;

  $sorgu = $db->query("SELECT * FROM liked WHERE movie_id = '{$movie_id}'", PDO::FETCH_ASSOC);
  if($sorgu) {
    return $sorgu;
  }
  return false;
}

function like_people($movie_id) {
  global $db;

  $sorgu = $db->query("SELECT * FROM liked INNER JOIN members ON liked.member_id = members.id WHERE liked.movie_id = '{$movie_id}' LIMIT 3", PDO::FETCH_ASSOC);
  if($sorgu) {
    return $sorgu;
  }
  return false;
}

function son_bes_film() {
  global $db;
  $filmler = $db->query("SELECT * FROM movies ORDER BY id DESC LIMIT 5", PDO::FETCH_ASSOC);
  if($filmler) {
    return $filmler;
  }
  return false;
}

function son_bes_liste() {
  global $db;
  $listeler = $db->query("SELECT * FROM lists ORDER BY id DESC LIMIT 5", PDO::FETCH_ASSOC);
  if($listeler) {
    return $listeler;
  }
  return false;
}

function butun_filmler() {
  global $db;
  $filmler = $db->query("SELECT * FROM movies", PDO::FETCH_ASSOC);
  if($filmler) {
    return $filmler;
  }
  return false;
}

function belirli_tur_film($tur_id) {
  global $db;

  $filmler = $db->query("SELECT * FROM movies
                        INNER JOIN movie_type
                        ON movies.type LIKE '%". $tur_id . "%'
                        WHERE type_id = '{$tur_id}'",
                        PDO::FETCH_ASSOC
                      );

  if($filmler) {
    return $filmler;
  }
  return false;

}

function tur_isim_bulma($tur_id) {
  global $db;

  $tur_name = $db->query("SELECT * FROM movie_type WHERE type_id = '{$tur_id}'")->fetch(PDO::FETCH_ASSOC);
  if($tur_name) {
    return $tur_name["type_name"];
  }
  return false;
}

function butun_turler() {
  global $db;
  $turler = $db->query("SELECT * FROM movie_type", PDO::FETCH_ASSOC);
  if($turler) {
    return $turler;
  }
  return false;
}

function butun_ulkeler() {
  global $db;
  $ulkeler = $db->query("SELECT * FROM countries", PDO::FETCH_ASSOC);
  if($ulkeler) {
    return $ulkeler;
  }
  return false;
}

function film_turu($film_tur_liste) {
  global $db;
  $film_turu = explode(",", $film_tur_liste);
  foreach ($film_turu as $key) {
    $tur[$key] = $db->query("SELECT * FROM movie_type WHERE type_id ='{$key}'")->fetch(PDO::FETCH_ASSOC);
  }
  if($tur) {
    return $tur;
  }
  return false;
}

function member_watched_list($member_id) {
  global $db;
  $member_watched_list = $db->query("SELECT * FROM member_list
                                    INNER JOIN movies ON member_list.movie_id = movies.id
                                    WHERE member_list.member_id = '{$member_id}'
                                    AND member_list.watched_movie = 1",
                                    PDO::FETCH_ASSOC
                                   );

  if($member_watched_list) {
    return $member_watched_list;
  }
  return false;
}

function member_nowatched_list($member_id) {
  global $db;
  $member_nowatched_list = $db->query("SELECT * FROM member_list
                                      INNER JOIN movies ON member_list.movie_id = movies.id
                                      WHERE member_list.member_id = '{$member_id}'
                                      AND member_list.watched_movie = 0",
                                      PDO::FETCH_ASSOC
                                     );

  if($member_nowatched_list) {
    return $member_nowatched_list;
  }
  return false;
}

function film_bilgileri($film_id) {
  global $db;

  $film_bilgileri = $db->query("SELECT * FROM movies INNER JOIN countries ON countries.country_id = movies.country WHERE id = '{$film_id}'")->fetch(PDO::FETCH_ASSOC);
  if($film_bilgileri) {
    return $film_bilgileri;
  }
  return false;
}

function check_watched_list($movie_id) {
  if(isset($_SESSION["signin"])) {
    $member_id = $_SESSION["signin"];

    global $db;
    $watched = $db->query("SELECT * FROM member_list WHERE member_id = '{$member_id}' AND movie_id = '{$movie_id}'")->fetch(PDO::FETCH_ASSOC);
    if($watched) {
      return $watched["watched_movie"];
    }
    return -1;
  }
}

function add_watched_list($movie_id) {

  $member_id = $_SESSION["signin"];
  global $db;

  $islem = check_watched_list($movie_id);

  if($islem >= 0) {
    if($islem == 0){
      $yapilacak = 1;
    } else {
      $yapilacak = 0;
    }
    $query = $db->prepare("UPDATE member_list SET watched_movie = ? WHERE member_id = ? AND movie_id = ?");
    $update = $query->execute(array(
      $yapilacak, $member_id, $movie_id
    ));
    if($update) {
      return $update;
    }
    return false;
  }
  else {
    $query = $db->prepare("INSERT INTO member_list SET member_id = ?, movie_id = ?, watched_movie = ?");
    $add_watched_list = $query->execute(array(
      $member_id, $movie_id, 1
    ));

    if($add_watched_list) {
      $last_id = $db->lastInsertId();
      return $add_watched_list;
    }
    return false;
  }
}

function add_nowatched_list($movie_id) {
  $member_id = $_SESSION["signin"];
  global $db;

  $islem = check_watched_list($movie_id); //0 1 -1

  if($islem == 0) {
    $query = $db->prepare("DELETE FROM member_list WHERE member_id = ? AND movie_id = ?");
    $delete = $query->execute(array(
      $member_id, $movie_id
    ));

    if($delete) {
      return true;
    }
    return false;
  }
  elseif($islem == -1) {
    $query = $db->prepare("INSERT INTO member_list SET member_id = ?, movie_id = ?, watched_movie = ?");
    $add_nowatched_list = $query->execute(array(
      $member_id, $movie_id, 0
    ));

    if($add_nowatched_list) {
      $last_id = $db->lastInsertId();
      return $add_nowatched_list;
    }
    return false;
  }
  return false;
}

function like($movie_id){
  global $db;
  $member_id = $_SESSION["signin"];

  $liked = liked($movie_id);
  if(!$liked) {
    $query = $db->prepare("INSERT INTO liked SET member_id = ?, movie_id = ?");
    $like = $query->execute(array(
      $member_id, $movie_id
    ));
    if($like) {
      return $like;
    }
    return false;
  }
  return false;
}

function unlike($movie_id) {
  global $db;
  $member_id = $_SESSION["signin"];

  $liked = liked($movie_id);
  if($liked) {
    $query = $db->prepare("DELETE FROM liked WHERE member_id = ? AND movie_id = ?");
    $delete = $query->execute(array(
      $member_id, $movie_id
    ));
    if($delete) {
      return true;
    }
    return false;
  }
}

function bul($bul) {
  global $db;

  $filmler = $db->query("SELECT * FROM movies WHERE name LIKE '%" . $bul . "%'", PDO::FETCH_ASSOC);
  if($filmler) {
    return $filmler;
  }
  return false;
}

function survey($member_id, $movie_id, $answer) {
  global $db;

  $query = $db->prepare("INSERT INTO survey SET member_id = ?, movie_id = ?, answer = ?");
  $survey = $query->execute(array(
    $member_id, $movie_id, $answer
  ));

  if($survey) {
    return $survey;
  }
  return false;
}

function survey_answer($member_id, $movie_id) {
  global $db;

  $query = $db->query("SELECT * FROM survey WHERE member_id = '{$member_id}' AND movie_id = '{$movie_id}'")->fetch(PDO::FETCH_ASSOC);
  if($query) {
    return $query;
  }
  return false;
}
