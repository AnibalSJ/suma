<?php

$DB = new mysqli("localhost", "root", "", "");

    if ($DB->connect_errno){
        echo "No hay conexión: (".$DB->connect_errno.")".$DB->connect_error;
    }

?>