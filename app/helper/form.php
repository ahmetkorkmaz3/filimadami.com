<?php

  function get($name){
    if(isset($_GET[$name])){
      return $_GET[$name];
    }
    return false;
  }

  function post($name){
    if(isset($_POST[$name])){
      return $_POST[$name];
    }
    return false;
  }
