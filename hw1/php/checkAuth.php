<?php
    session_start();

    function controlloLogin() 
    {
        // Verifica se l'utente è loggato
        if (isset($_SESSION['username'])) 
        {
            return $_SESSION['username'];
        } 
        else 
        {
            echo("Non sei loggato, effettua il login per poter continuare!");
            return 0;
        }
    }

    function controlloLogin2() 
    {
        // Verifica se l'utente è loggato
        if (isset($_SESSION['username'])) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
?>
