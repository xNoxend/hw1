<?php 
    // Avvia la sessione
    session_start();

    // Verifica l'esistenza di dati POST
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "royaltech");
        if (!$conn) 
        {
          die("Connessione al database fallita: " . mysqli_connect_error());
        } 
        else 
        {
          echo "Connessione al database riuscita";
        }

        // Escape dell'input
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        // Cerca l'utente con il nome utente fornito
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query);

        // Verifica la correttezza delle credenziali
        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $hashed_password = $row['password'];
            if (password_verify($_POST["password"], $hashed_password))
            {
                // Imposta la variabile di sessione
                $_SESSION["username"] = $_POST["username"];
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>';
                echo 'Swal.fire("Benvenuto '.$username.'!", "Il login è avvenuto con successo", "success").then(() => { window.location.href = "./home.php"; });';
                echo '</script>';
            }
            else
            {
                // Password errata
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>';
                echo 'Swal.fire("Errore", "Password errata", "error");';
                echo '</script>'; 
            }
        }
        else
        {
            //L'utente non esiste
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>';
            echo 'Swal.fire("Errore", "Utente non trovato", "error");';
            echo '</script>';
        }
    }
?>



<html>
    <head>
        <title>Login</title>
        <link rel='stylesheet' href='../style/hw1.css'>
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
          

    <div class="box">
        <form name='nome_form' id ='nome_form' method='post'>
            <span class="text-center">Login</span>

            <img class="form_icon_profile" src="../images/profile.png" alt="Profile Icon">
              <div class="input-container">
                <div class="input-container">
                    <input type="text" name="username" required>
                    <label>Username</label>		
                </div>

              <div class= "pw_login">
                  <a href="#" class="pw_form">
                      <img class="hover_form" src="../images/eye.png" alt="Eye Icon">
                      <img class="form_icon_pw" src="../images/close-eye.png" alt="Close-Eye Icon">
                  </a>
              </div>

              <div class="input-container">		
                  <input class="pw" type="password" name="password" required>
                  <label>Password</label>
              </div>

                <div class="input-container">		
                    <input type="submit" name="submit_button" value="Login">
                </div>

            <div class="input-container">		
              <a class="registerlink" href="./register.php">Registrati</a>
            </div>
        </form>	
    </div>
   
    <script src="../javascript/autenticazione.js" ></script>
    <script src="../javascript/menu.js" ></script>
    <script src="../javascript/showpw.js" ></script>
    
 </body>
</html>
