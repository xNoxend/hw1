<?php
    
        // Avvia la sessione
        session_start();

        // Elimina la sessione
        session_destroy();

        // Vai alla pagina di login
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>;';
        echo '<script>';
        echo 'Swal.fire("Logout avvenuto con successo", "A presto!", "success").then(() => { window.location.href = "./home.php"; });';
        echo '</script>';
        exit;
?>