<?php session_start(); ?>

<html>
<head>
  <title>RoyalTech: Il miglior cercatore di componenti!</title>
  <link rel="stylesheet" href="../style/hw1.css"/>
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
          <img class="hover" src="../images/cuorepieno.png" alt="Favorites Icon" >
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

  <header>
    <div class="header-left">
      <img class="header-image" src="../images/rtx2060.jpg" alt="rtx2060">
    </div>
    <div class="header-right">
      <p class="header-text">Eleva il tuo gioco con la scheda grafica RTX 2060: immagini realistiche e tecnologie avanzate come il Ray Tracing e la DLSS, per un'esperienza di gioco migliorata. Non accontentarti di prestazioni inferiori, scegli la RTX 2060 e goditi la massima grafica di gioco e produttività in ambito professionale.</p>
      <a class="header-link" href="https://www.hwupgrade.it/articoli/skvideo/5336/nvidia-geforce-rtx-2060-la-scheda-turing-che-tutti-attendono_index.html" target="_blank">Scopri di più!</a>
    </div>
  </header>
  <div class="linea"></div>

  <h1 class="testoProdEv">Migliori articoli in offerta</h1>

  <div id="prodInEvidenza">
    <div class="prodotto sx" id="prodS"></div>
    <div class="prodotto cen" id="prodCentrale"></div>
    <div class="prodotto dx" id="prodD"></div>
  </div>
  <div class="linea"></div>


  <h1 class="testoCerca">Cerca i componenti che vuoi</h1>

  <div class="search-container">
      <div class="search-bar">
        <input type="text" placeholder="Cosa stai cercando?" id="search-input" name="search-input">
        <button id="search-button"><img src="../images/search1.png" alt="Icona di ricerca"></button>
      </div>
  </div>


 
  <section id="product"></section>

  <footer>
    <p>Powered by <strong>Salvatore Campisi</strong> 1000016059 <br/>
    Viale Andrea Doria 24, 95125 Catania</p>
  </footer>

  <script src="../javascript/menu.js"></script>
  <script src="../javascript/prodotti.js"></script>
</body>
</html>
