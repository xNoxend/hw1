<?php session_start(); ?>

<html>
  <head>
    <title>Le novità nel mondo informatico!</title>
    <link rel="stylesheet" href="../style/hw1.css">
    <script src="../javascript/news.js" defer></script>
    <script src="../javascript/menu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <div class="search-container">
      <div class="search-bar">
        <input type="text" placeholder="Cosa stai cercando?" id="search-input" name="search-input">
        <button id="search-button"><img src="../images/search1.png" alt="Icona di ricerca"></button>
      </div>
    </div>


    <section id="news"></section>
     
   
   
  </body>
</html>