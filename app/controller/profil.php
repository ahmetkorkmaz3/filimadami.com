<?php

if($_url[1]) {
  $uye_id = $_url[1];
  if($uye = uyelik_bilgileri($uye_id)) {
    $member_watched_list = member_watched_list($uye_id);
    $member_nowatched_list = member_nowatched_list($uye_id);
    include view('static/header');
    include view('profil');
    include view('static/footer');
  } else {
    redirect();
  }
} else {
  redirect();
}
