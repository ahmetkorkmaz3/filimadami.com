<?php

function listeler() {
  global $db;

  $liste = $db->query("SELECT * FROM lists", PDO::FETCH_ASSOC);
  if($liste) {
    return $liste;
  }
  return false;
}
