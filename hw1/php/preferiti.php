<?php 
  session_start(); 
  $conn = mysqli_connect("localhost", "root", "", "royaltech");

    if (!$conn) 
    {
      die("Connessione al database fallita: " . mysqli_connect_error());
    } 
    else 
    {
      echo "Connessione al database riuscita";
    }
  if(!isset($_SESSION["username"])) 
  {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo "<script>Swal.fire({
      icon: 'error',
      title: 'Errore',
      text: 'Devi prima effettuare il login!'
    }).then(function() {
      window.location = './login.php';
    });</script>";
  }
?>

<html>
    <head>
        <title>Lista Preferiti</title>
        <link rel='stylesheet' href='../style/hw1.css'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
  <body>
  
    <div class="logo">
      <a href="./home.php">
        <img src="../images/logo3s.png" alt="Logo RoyalTech"> 
      </a>
    </div>

    <div class="barra-nera"></div>
    
    <div class="user-icons">

        <a href="./preferiti.php" class="favorites-icon">
            <img src="../images/cuorevuoto.png" alt="Favorites Icon">
            <img class="hover" src="../images/cuorepieno.png" alt="Favorites Icon">

        </a>

        <div class="separator"></div>

        <a class="account-icon" href="#">
          <img src="../images/user3.png" alt="Account Icon">
        </a>
        <div class="account-menu"> 
          <h1 class = "nomeUser">
          <?php if(isset($_SESSION["username"])) 
           echo $_SESSION["username"]; ?></h1>
          <a href="./home.php">Home</a>
          <a href="./news.php">News</a>
          <?php if(isset($_SESSION["username"])) 
          { ?>
            <a href="./logout.php">Logout</a>
          <?php 
          } 
          else 
          { ?>
            <a href="./login.php">Accedi</a>
            <a href="./register.php">Registrati</a>
            <?php 
          } ?>
        </div>
    </div>

    <h1 class="intFiltri">Categoria</h1>
    <div class="filtri">
      <label> 
        <input type="radio" name="category" value="5">
        Case
      </label>

      <label>
        <input type="radio" name="category" value="7">
        Ventole
      </label>

      <label>
        <input type="radio" name="category" value="3">
        SSD
      </label>

      <label>
        <input type="radio" name="category" value="4">
        HDD
      </label>

      <label>
        <input type="radio" name="category" value="2">
        CPU
      </label>

      <label>
        <input type="radio" name="category" value="1">
        Schede Video
      </label>

      <button type="button" id="azzera-filtri">Azzera filtri</button>
    </div>

    <div class="lineaVerticale"></div>
    <h1 class="intPreferiti">I miei preferiti</h1>
    <section id="preferiti"></section>
    

    <script src="../javascript/menu.js"></script>
    <script src="../javascript/preferiti.js"></script>
  </body>
</html>