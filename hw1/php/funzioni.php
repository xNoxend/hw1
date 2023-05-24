<?php
    function get_data_ora_corrente() 
    {
        date_default_timezone_set('Europe/Rome'); // Imposta il fuso orario
        $data_ora_corrente = date('H:i'); // Formatta l'ora
        return $data_ora_corrente;
    }

    

    function errCredenziali()
    {
        if(isset($errore))
        {
            echo "<p class='errore'>";
            echo "Credenziali non valide.";
            echo "</p>";
        }
    }

    function errRegistrazione()
    {
        if(isset($errore))
        {
            echo "<p class='errore'>";
            echo "Username o email già esistenti.";
            echo "</p>";
        }
    }

    function verificaLogin()
    {
        // Avvia la sessione
        session_start();

        // Verifica l'accesso
        if(!isset($_SESSION["username"]))
        {
            // Vai alla pagina di login
            header("Location: login.php");
            exit;
        }
    }

?>

