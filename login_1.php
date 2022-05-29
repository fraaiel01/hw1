<?php
    include "autentificazione.php";
    if(checkAuth()) 
        header("Location: home_1.php");
   


    if (!empty($_POST["email"]) && !empty($_POST["password"]) )
    {   
        $db = "datab1";
        $conn = mysqli_connect("localhost","root","",$db);

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $searchField = "email";

        $query = "SELECT * FROM utente WHERE $searchField = '$email'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if(mysqli_num_rows($res) > 0 ){
            $entry = mysqli_fetch_assoc($res);

            if(($_POST["password"]===$entry["password"])){
                $_SESSION["identificativo"] = $entry["identificativo"];
                $_SESSION["username"] = $_POST["email"];
                $_SESSION["nome"] = $_POST["nome"];    
                $_SESSION["cognome"] = $_POST["cognome"];    
                header("Location: home_1.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";

    }
    if(isset($error))
    echo "<div class='errore_log'>$error</div>";

        
?> 

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/log_1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    
<section>
 <div><img class="social" src="images/sociall.jpg"/></div>
    
     <div id="zona_login">

     <div id="box">
      <div id="titolo">SOCIAIEL</div> 
       <img class="utente" src="images/user.png"/>
        <div id="riquadro">
          <form name='login' method='post'>
              <div class="email">
                  <label for='email'>Email <br></label>
                  <input type='text' name='email'>
              </div>
              
              <div class="password">
                <label for='password'>Password  <br></label>
                <input type='password' name='password'>
              </div>
       
              <div class="submit">
                <input type='submit' value="Accedi">
              </div>
          </form>
          <div class="signup">Non hai un account ? <a href="Registrazione.php">Registrati !</a></div>
        </div>
       </div> 
      </div>

</section>

</body>

</html>