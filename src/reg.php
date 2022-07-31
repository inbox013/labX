<?php
  $data = $_POST;
  $salt = "reg297";

  if(isset($data["doReg"])){
    if (strlen($data["login"]) < 2) {
      $error[] = "Логин слишком короткий!<br>";
    }
    if (strlen($data["login"]) > 20) {
      $error[] = "Логин слишком длинный!<br>";
    }
    if (preg_match('/[А-Яа-я!@#$%^&*\s]+/', $data["login"])) {
      $error[] = "Логин не должен содержать кириллицы, пробелов и символов!<br>";
    }
    if (!preg_match('/[\w]+/', $data["login"])) {
      $error[] = "Логин должен содержать латинские буквы и цифры!<br>";
    }
    if (strlen($data["password"]) < 5) {
      $error[] = "Пароль слишком короткий!<br>";
    }
    if (!preg_match('/[a-zA-Z!@#$%^&*]+/', $data["password"])) {
      $error[] = "Пароль должен содержать латинские буквы и символы!<br>";
    }
    if (preg_match('/[0-9]+/', $data["password"])) {
      $error[] = "Пароль не должен содержать цифры и пробелы!<br>";
    }
    if (empty($error)) {
        $login = $data["login"];
        $password = md5($data["password"] . $salt);

      echo '<div class="showReg">Регистарция прошла успешно, войдите в аккаунт <a href="/src/login.php">на этой</a> странице</div>';
    } else {
      echo '<div class="showError">'.array_shift($error).'</div>';
    }
  }
?>

<link rel="stylesheet" type="text/css" href="/assets/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $loginVal = "<?=$login ?>";
  $passVal = "<?=$password ?>";

  $.ajax({
    url: '/src/add.php',
    method: 'post',
    data: {login: $loginVal, password: $passVal},
    success: 	function(data) {
    console.log(data)}
  });
</script>

<div class="reg-wrapper">
  <form action="/src/reg.php" method="POST" name="regForm">
    <div class="entrance"> Регистарция
      <div>
        <p>Логин:</p>
        <input type="text" name="login" required>
      </div>
      <div>
        <p>Пароль:</p>
        <input type="password" name="password" required>
      </div>
      <div>
        <br>
        <input value="Регистарция" class="btn" name="doReg" type="submit">
      </div>
    </div>
  </form>
</div>