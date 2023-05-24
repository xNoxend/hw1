<?php 
  // Connetti al database
  $conn = mysqli_connect("localhost", "root", "", "royaltech");

  $searchTerm = $_GET['keywords'];
  $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

  $query = "SELECT products.id, price, img, link, product, category.id AS 'id_categoria', category.nome_categoria FROM products 
  JOIN category ON category.id = products.category 
  WHERE product LIKE '%$searchTerm%'";

  $res = mysqli_query($conn, $query);
  $products = array();

  while ($row = mysqli_fetch_array($res)) 
  {

      $data = array
      (
          'id' => $row["id"],
          'price' => $row["price"],
          'product' => $row["product"],
          'id_categoria' => $row["id_categoria"],
          'nome_categoria' => $row["nome_categoria"],
          'link' => $row["link"],
          'img' => $row["img"],
      );

      array_push($products, $data);
  }
  $json = json_encode($products);
  echo $json;
?>
