<?php    
    $data = $_POST;
    $login = $data['login'];
    $password = $data['password'];
  if (!empty($data['login']) && !empty($data['password'])) {
  $mysql = new mysqli("localhost", "root", "root", "labx");
  $mysql -> query("INSERT INTO `labx` (`login`, `password`) VALUES('$login', '$password')");
  $mysql -> close();
  }