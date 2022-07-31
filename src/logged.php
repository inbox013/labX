<?php 
  session_start();
?>

<link rel="stylesheet" type="text/css" href="/assets/style.css">
      <div class="hello-user">
        <p>Авторизован! 
        <br>
        <?php echo $_SESSION["userSession"]; ?>, это ваш личный кабинет!</p>
        <br>
        <a href="/src/logout.php">Выйти</a>
      </div>