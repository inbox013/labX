<?php
    session_start();
    unset ($_SESSION["userSession"]);
    header("Location: /public/index.php");
?>