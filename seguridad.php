<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == 0){
            header('Location: index.php');
        }
    }else{
        header('Location: index.php');
    }
?>