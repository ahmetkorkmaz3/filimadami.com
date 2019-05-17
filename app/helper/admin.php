<?php

function admin_control() {
  global $db;

  if(post('username') && post('password')) {
    $admin_username = post('username');
    $admin_password = post('password');

    $query = $db->query("SELECT * FROM admin WHERE admin_username = '{$admin_username}' AND admin_password = '{$admin_password}'")->fetch(PDO::FETCH_ASSOC);
    if($query) {
      $_SESSION["admin_username"] = $admin_username;
      return $query;
    }
    return false;
  } else {
    return false;
  }
}
