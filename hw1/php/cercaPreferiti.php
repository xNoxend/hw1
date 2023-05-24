<?php
$utente = $_SESSION["username"];

// Connetti al database
$conn = mysqli_connect("localhost", "root", "", "royaltech");

// Query per filtrare solo i prodotti preferiti
$query = "SELECT products.id, price, img, link, product, category.id AS 'id_categoria', category.nome_categoria 
          FROM products 
          JOIN category ON category.id = products.category 
          JOIN preferiti ON products.id = preferiti.id_prodotto 
          WHERE preferiti.user = '$utente'";

$res = mysqli_query($conn, $query);

$resultArray = array();

while ($row = mysqli_fetch_assoc($res)) {
    // Aggiungi il nome della categoria come valore nell'array risultato
    $row['nome_categoria'] = $row['nome_categoria'];
    $resultArray[] = $row;
}

// Converte l'array risultato in formato JSON e restituisce il risultato
echo json_encode($resultArray);

mysqli_close($conn);
?>
