<?php
    include './checkAuth.php';
    if (controlloLogin())
    {
        $user = $_SESSION["username"];
        $id_prodotto = $_GET["id_prodotto"];

        $conn = mysqli_connect('localhost', 'root', '', 'royaltech') or die(mysqli_error($conn));
        
        // Verifica se il prodotto è già presente nei preferiti dell'utente
        $query = "SELECT id_preferito FROM preferiti WHERE id_prodotto = '$id_prodotto' AND user = '$user'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($res) == 0) 
        {
            // Il prodotto non è presente nei preferiti dell'utente, quindi lo inseriamo
            $query = "INSERT INTO preferiti (id_prodotto, user) VALUES ('$id_prodotto', '$user')";
            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "Aggiunto";
            mysqli_close($conn);
            exit;
        } 
        else 
        {
            // Il prodotto è già presente nei preferiti dell'utente, quindi lo rimuoviamo
            $query = "DELETE FROM preferiti WHERE id_prodotto = '$id_prodotto' AND user = '$user' LIMIT 1";
            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "Rimosso";
            mysqli_close($conn);
            exit;
        }
    }
?>
