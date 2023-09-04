<?php
    session_start();
    $_SESSION['login'] = null;
    $_SESSION['nombre'] = null;
    $_SESSION['user'] = null;
    header('Location: ./index.php')
?>