<?php

function uyelik_kontrol() {
	global $db;
	if($uye_id = $_SESSION["signin"]) {
		$kontrol = $db->query("SELECT * FROM members WHERE id = {$uye_id}")->fetch(PDO::FETCH_ASSOC);
		if($kontrol){
			return $uye_id;
		}
	}
	return false;
}

function uyelik_bilgileri($id) {
  global $db;
  $uye_bilgileri = $db->query("SELECT * FROM members WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
  if($uye_bilgileri) {
    return $uye_bilgileri;
  }
  return false;
}
