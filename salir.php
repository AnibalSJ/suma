<?php
    session_start();
    $_SESSION['login'] = null;
    $_SESSION['nombre'] = null;
<<<<<<< HEAD
    $_SESSION['user'] = null;
=======
>>>>>>> 7cbe31d2cdca01d1ca13f27306d4e2ac0aa48aa9
    header('Location: ./index.php')
?>