<?php
  $dataLog = $_POST;
  $salt = "reg297";
  $log = $dataLog["login"];
  $pass = md5($dataLog["password"] . $salt);

  $mysql = new mysqli("localhost", "root", "root", "labx");
  $check = $mysql -> query("SELECT * FROM `labx` WHERE `login` = '$log' AND `password` = '$pass' ");

  if (isset($dataLog["doLog"])) {
    $mysql = new mysqli("localhost", "root", "root", "labx");
    $check = $mysql -> query("SELECT * FROM `labx` WHERE `login` = '$log' AND `password` = '$pass' ");
    if (mysqli_num_rows($check) == 0) {
      echo '<div class="showError">Неверно введен логин или пароль</div>';
    } else {
      $mysql -> close();
      setcookie("loggedUser", $log, time() + (3600*24));
      session_start();
      $_SESSION["userSession"] = $log;
      header('Location: /src/logged.php');
    }
  }
?>

<link rel="stylesheet" type="text/css" href="/assets/style.css">

<div class="login-wrapper">
  <form action="/src/login.php" method="POST" name="logForm">
    <div class="entrance"> Вход на сайт
      <div>
        <p>Логин:</p>
        <input type="text" name="login" >
      </div>
      <div>
        <p>Пароль:</p>
        <input type="password" name="password" >
      </div>
      <div>
        <br>
        <input value="Регистарция" class="btn" name="doLog" type="submit">
      </div>
    </div>
  </form>
</div>