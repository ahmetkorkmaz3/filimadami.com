<?php

if(post('username') && post('password')) {
  if(admin_control()) {
    redirect('admin/home');
  } else {
    $hata = "Giriş yapılamadı";
  }
}

include view('admin/index');
