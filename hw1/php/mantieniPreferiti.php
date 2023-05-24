<?php
include './checkAuth.php';

function mantieniPreferiti() 
{
    if (controlloLogin()) 
    {
        $user = $_SESSION["username"];
        $conn = mysqli_connect('localhost', 'root', '', 'royaltech') or die(mysqli_error($conn));
        
        $query = "SELECT id_prodotto FROM preferiti WHERE user = '$user'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        $preferiti = array();
        
        while ($row = mysqli_fetch_assoc($res)) 
        {
            $preferiti[] = $row['id_prodotto'];
        }
        
        mysqli_close($conn);
        
        echo json_encode($preferiti);
    }
}

mantieniPreferiti();
?>
