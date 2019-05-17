<?php

function ana_yorumlar($movie_id) {
  global $db;

  $query = $db->query("SELECT * FROM comment INNER JOIN members ON comment.member_id = members.id WHERE movie_id = '{$movie_id}' AND major = 0", PDO::FETCH_ASSOC);
  if($query) {
    return $query;
  }
  return false;
}

function alt_yorumlar($movie_id, $ana_yorum) {
  global $db;

  $query = $db->query("SELECT * FROM comment INNER JOIN members ON comment.member_id = members.id WHERE movie_id = '{$movie_id}' AND major = '{$ana_yorum}'", PDO::FETCH_ASSOC);
  if($query) {
    return $query;
  }
  return false;
}

function yorum_ekle($member_id, $movie_id, $major, $comment) {
  global $db;

  $query = $db->prepare("INSERT INTO comment SET member_id = ?, movie_id = ?, major = ?, comment = ?");
  $insert = $query->execute(array(
    $member_id, $movie_id, $major, $comment
  ));
  if($insert) {
    return $insert;
  }
  return false;
}
