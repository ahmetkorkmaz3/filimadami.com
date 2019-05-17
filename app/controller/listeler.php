<?php

if($_url[0] == "listeler") {

  $liste = listeler();
  include view('static/header');
  include view('listeler');
  include view('static/footer');

}
