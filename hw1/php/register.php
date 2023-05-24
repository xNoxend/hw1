<?php
    // Connessione al database
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
    


    // Controllo se il form è stato inviato
    if (isset($_POST['submit_button'])) 
    {
      // Prendo i dati dal form e li salvo in variabili
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
      // Controllo se l'username o l'email sono già presenti nel database
      $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) 
      {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire("Errore", "Username o email già presenti nel database", "error");';
        echo '</script>';      
      } 
      else 
      {
          // Cifratura della password
          $password_hash = password_hash($password, PASSWORD_DEFAULT);

          // Salvo i dati nel database
          $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
          mysqli_query($conn, $query);
          $_SESSION["username"] = $_POST["username"];
          echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
          echo '<script>';
          echo 'Swal.fire("Registrato!", "La registrazione è avvenuta con successo, buona navigazione!", "success").then(() => { window.location.href = "./home.php"; });';
          echo '</script>';           
      }
    }

    // Chiudo la connessione al database
    mysqli_close($conn); 
 ?>

<html>
  <head>
    <title>Registrazione</title>
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
            <img class="hover" src="../images/cuorepieno.png" alt="Favorites Icon" >
        </a>

        <div class="separator"></div>

        <a class="account-icon" href="#">
          <img src="../images/user3.png" alt="Account Icon">
        </a>
        <div class="account-menu">
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

    <div class="box">
      <form name='nome_form' method='post'>
              <span class="text-center">Registrati</span>

              <img class="form_icon_profile" src="../images/profile.png" alt="Profile Icon">
                <div class="input-container">
                    <input type="text" name="username" required>
                    <label>Username</label>		
                </div>

              <img class="form_icon_mail" src="../images/mail.png" alt="Mail Icon">
                <div class="input-container">
                    <input type="text" name="email" required>
                    <label>Email</label>		
                </div>  

              <a href="#" class="pw_form">
                    <img class="hover_form" src="../images/eye.png" alt="Eye Icon">
                    <img class="form_icon_pw" src="../images/close-eye.png" alt="Close-Eye Icon">
              </a>
                <div class="input-container">		
                    <input class="pw" type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="input-container">		
                    <input type="submit" name="submit_button" value="Registrati">
                </div>

              <div class="input-container">		
              <a class="registerlink" href="./login.php">Login</a>
              </div>
      </form>
    </div>

    
    <script src="../javascript/register.js" ></script>
    <script src="../javascript/menu.js" ></script>
    <script src="../javascript/showpw.js" ></script>

  </body>
</html>
