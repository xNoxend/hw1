<?php    
  include './checkAuth.php';
  if (controlloLogin())
  {
      $utente = $_SESSION["username"];

      $conn = mysqli_connect('localhost', 'root', '', 'royaltech') or die(mysqli_error($conn));
      
      $query = "SELECT id, price, product, category, img, link FROM products 
      join preferiti on products.id = preferiti.id_prodotto 
      where preferiti.user ='$utente'" ;

      $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

      if (mysqli_num_rows($res) > 0) 
      {
          while($entry = mysqli_fetch_assoc($res)) 
          {
            $preferiti[] = array(
                                  "id" => $entry["id"], 
                                  "product" => $entry["product"], 
                                  "price" => $entry["price"],
                                  "category" => $entry["category"], 
                                  "img" => $entry["img"],
                                  "link" => $entry["link"]);
          }
      }

      mysqli_close($conn);

      if(mysqli_num_rows($res) > 0)
      {
          echo json_encode($preferiti);
          exit;
      }
  }
  echo json_encode(1);
?>