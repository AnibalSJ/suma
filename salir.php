<?php
    session_start();
    $_SESSION['login'] = null;
    $_SESSION['nombre'] = null;
    header('Location: ./index.php')
?>